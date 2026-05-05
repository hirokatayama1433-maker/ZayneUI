<?php

namespace Zayne\UI\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    protected $signature = 'zayne:install
                            {--force : Overwrite existing files}';

    protected $description = 'Install ZayneUI — copies all components, CSS, and JS into your Laravel app.';

    protected Filesystem $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle(): int
    {
        $this->components->info('Installing ZayneUI...');
        $this->newLine();

        $force = $this->option('force');

        // 1. Ensure TailwindMerge is installed
        if (! $this->ensureTailwindMerge()) {
            return self::FAILURE;
        }

        // 2. Ensure Alpine.js dependency is installed
        if (! $this->ensureAlpineJs()) {
            return self::FAILURE;
        }

        // 3. Copy all stubs into the app
        $this->publishStubs($force);

        // 4. Register the app-side service provider
        $this->registerServiceProvider();

        // 5. Inject CSS imports into app.css
        $this->injectCssImports();

        // 6. Inject JS imports + Alpine bootstrap into app.js
        $this->injectJsImport();

        // 7. Remove duplicate Alpine CDN script tags in default welcome view
        $this->removeAlpineCdnFromWelcomeView();

        $this->newLine();
        $this->components->info('ZayneUI installed successfully.');
        $this->newLine();
        $this->line('  <fg=gray>Next steps:</>');
        $this->line('  <fg=gray>1.</> Add <fg=cyan>@zayneStyles</> inside your <fg=cyan><head></>');
        $this->line('  <fg=gray>2.</> Add <fg=cyan>@zayneScripts</> before your <fg=cyan></body></>');
        $this->line('  <fg=gray>3.</> Set your theme on <html>: <fg=cyan>class="light"</>, <fg=cyan>class="dark"</>, or <fg=cyan>class="abyss"</>');
        $this->newLine();

        return self::SUCCESS;
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  TailwindMerge check
    // ─────────────────────────────────────────────────────────────────────────

    protected function ensureTailwindMerge(): bool
    {
        $package = 'gehrisandro/tailwind-merge-laravel';

        if (class_exists(\TailwindMerge\Laravel\TailwindMergeServiceProvider::class)) {
            $this->components->twoColumnDetail(
                '<fg=green>Found</> TailwindMerge',
                '<fg=gray>gehrisandro/tailwind-merge-laravel</>',
            );
            return true;
        }

        $this->components->warn("ZayneUI requires {$package}.");
        $this->newLine();

        if (! $this->confirm("Install {$package} now?", true)) {
            $this->newLine();
            $this->components->error('Installation cancelled.');
            $this->line("  Run <fg=cyan>composer require {$package}</> then try again.");
            $this->newLine();
            return false;
        }

        $this->components->info("Running composer require {$package}...");
        $this->newLine();

        passthru("composer require {$package}", $exitCode);

        if ($exitCode !== 0) {
            $this->newLine();
            $this->components->error("Composer failed. Install {$package} manually and re-run zayne:install.");
            return false;
        }

        $this->newLine();
        $this->components->twoColumnDetail(
            '<fg=green>Installed</> TailwindMerge',
            '<fg=gray>gehrisandro/tailwind-merge-laravel</>',
        );

        return true;
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  Alpine.js check
    // ─────────────────────────────────────────────────────────────────────────

    protected function ensureAlpineJs(): bool
    {
        $packageJsonPath = base_path('package.json');
        $package = 'alpinejs';

        if (! $this->files->exists($packageJsonPath)) {
            $this->components->warn('package.json not found. Install Alpine.js manually: npm install alpinejs');
            return true;
        }

        $decoded = json_decode($this->files->get($packageJsonPath), true);

        if (! is_array($decoded)) {
            $this->components->warn('Could not parse package.json. Install Alpine.js manually: npm install alpinejs');
            return true;
        }

        $dependencies = $decoded['dependencies'] ?? [];
        $devDependencies = $decoded['devDependencies'] ?? [];
        $hasAlpine = array_key_exists($package, $dependencies) || array_key_exists($package, $devDependencies);

        if ($hasAlpine) {
            $this->components->twoColumnDetail(
                '<fg=green>Found</> Alpine.js',
                '<fg=gray>alpinejs</>',
            );
            return true;
        }

        $this->components->warn('ZayneUI interactive components require alpinejs.');
        $this->newLine();

        if (! $this->confirm("Install {$package} now?", true)) {
            $this->newLine();
            $this->components->error('Installation cancelled.');
            $this->line("  Run <fg=cyan>npm install {$package}</> then try again.");
            $this->newLine();
            return false;
        }

        $installCommand = $this->detectNodeInstallCommand($package);
        $this->components->info("Running {$installCommand}...");
        $this->newLine();

        passthru($installCommand, $exitCode);

        if ($exitCode !== 0) {
            $this->newLine();
            $this->components->error("Failed to install {$package}. Install it manually, then re-run zayne:install.");
            return false;
        }

        $this->newLine();
        $this->components->twoColumnDetail(
            '<fg=green>Installed</> Alpine.js',
            '<fg=gray>alpinejs</>',
        );

        return true;
    }

    protected function detectNodeInstallCommand(string $package): string
    {
        if ($this->files->exists(base_path('pnpm-lock.yaml'))) {
            return "pnpm add {$package}";
        }

        if ($this->files->exists(base_path('yarn.lock'))) {
            return "yarn add {$package}";
        }

        return "npm install {$package}";
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  Stub copying
    // ─────────────────────────────────────────────────────────────────────────

    protected function publishStubs(bool $force): void
    {
        $stubsPath = __DIR__ . '/../../stubs';
        $basePath  = base_path();

        $files = $this->files->allFiles($stubsPath);

        $copied  = 0;
        $skipped = 0;

        foreach ($files as $file) {
            $relativePath = $file->getRelativePathname();
            $destination  = $basePath . DIRECTORY_SEPARATOR . $relativePath;

            if ($this->files->exists($destination) && ! $force) {
                $skipped++;
                continue;
            }

            $this->files->ensureDirectoryExists(dirname($destination));
            $this->files->copy($file->getPathname(), $destination);
            $copied++;
        }

        if ($copied > 0) {
            $this->components->twoColumnDetail(
                "<fg=green>Copied</> {$copied} file(s)",
                '<fg=gray>app/ + resources/</>',
            );
        }

        if ($skipped > 0) {
            $this->components->twoColumnDetail(
                "<fg=yellow>Skipped</> {$skipped} existing file(s)",
                '<fg=gray>use --force to overwrite</>',
            );
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  Service provider registration
    // ─────────────────────────────────────────────────────────────────────────

    protected function registerServiceProvider(): void
    {
        $bootstrapPath = base_path('bootstrap/providers.php');

        if (! $this->files->exists($bootstrapPath)) {
            // Laravel < 11 — skip, developer registers manually
            $this->components->warn('bootstrap/providers.php not found. Register App\\Providers\\ZayneServiceProvider manually.');
            return;
        }

        $contents = $this->files->get($bootstrapPath);
        $provider = 'App\\Providers\\ZayneServiceProvider::class';

        if (Str::contains($contents, $provider)) {
            $this->components->twoColumnDetail(
                '<fg=yellow>Skipped</> ZayneServiceProvider',
                '<fg=gray>already registered</>',
            );
            return;
        }

        // Insert before the closing bracket of the return array
        $contents = Str::replaceLast(
            '];',
            "    {$provider},\n];",
            $contents,
        );

        $this->files->put($bootstrapPath, $contents);

        $this->components->twoColumnDetail(
            '<fg=green>Registered</> ZayneServiceProvider',
            '<fg=gray>bootstrap/providers.php</>',
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  CSS imports
    // ─────────────────────────────────────────────────────────────────────────

    protected function injectCssImports(): void
    {
        $cssPath = resource_path('css/app.css');

        if (! $this->files->exists($cssPath)) {
            $this->components->warn('resources/css/app.css not found. Add these imports manually:');
            $this->line("  @import './zayne-theme.css';");
            $this->line("  @import './zayne-layout.css';");
            $this->line("  @import './zayne-overlay.css';");
            return;
        }

        $contents = $this->files->get($cssPath);

        $imports = [
            "@import './zayne-theme.css';",
            "@import './zayne-layout.css';",
            "@import './zayne-overlay.css';",
        ];

        $toAdd = [];
        foreach ($imports as $import) {
            if (! Str::contains($contents, $import)) {
                $toAdd[] = $import;
            }
        }

        if (empty($toAdd)) {
            $this->components->twoColumnDetail(
                '<fg=yellow>Skipped</> CSS imports',
                '<fg=gray>already present</>',
            );
            return;
        }

        $contents .= "\n" . implode("\n", $toAdd) . "\n";
        $this->files->put($cssPath, $contents);

        $this->components->twoColumnDetail(
            '<fg=green>Injected</> CSS imports',
            '<fg=gray>resources/css/app.css</>',
        );
    }

    // ─────────────────────────────────────────────────────────────────────────
    //  JS import
    // ─────────────────────────────────────────────────────────────────────────

    protected function injectJsImport(): void
    {
        $jsPath = resource_path('js/app.js');

        if (! $this->files->exists($jsPath)) {
            $this->components->warn('resources/js/app.js not found. Add these lines manually:');
            $this->line("  import Alpine from 'alpinejs';");
            $this->line("  import './zayne.js';");
            $this->line('  window.Alpine = Alpine;');
            $this->line('  Alpine.start();');
            return;
        }

        $contents = $this->files->get($jsPath);
        $changed = false;

        if (! preg_match('/^\s*import\s+Alpine\s+from\s+[\'"]alpinejs[\'"]\s*;?\s*$/m', $contents)) {
            $contents = "import Alpine from 'alpinejs';\n" . ltrim($contents);
            $changed = true;
        }

        if (! preg_match('/^\s*import\s+[\'"]\.\/zayne\.js[\'"]\s*;?\s*$/m', $contents)) {
            $contents = rtrim($contents) . "\nimport './zayne.js';\n";
            $changed = true;
        }

        if (! preg_match('/^\s*window\.Alpine\s*=\s*Alpine\s*;?\s*$/m', $contents)) {
            $contents = rtrim($contents) . "\nwindow.Alpine = Alpine;\n";
            $changed = true;
        }

        if (! preg_match('/^\s*Alpine\.start\(\)\s*;?\s*$/m', $contents)) {
            $contents = rtrim($contents) . "\nAlpine.start();\n";
            $changed = true;
        }

        if (! $changed) {
            $this->components->twoColumnDetail(
                '<fg=yellow>Skipped</> JS bootstrap',
                '<fg=gray>Alpine + Zayne already wired</>',
            );
            return;
        }

        $this->files->put($jsPath, $contents);

        $this->components->twoColumnDetail(
            '<fg=green>Injected</> JS bootstrap',
            '<fg=gray>resources/js/app.js</>',
        );
    }

    protected function removeAlpineCdnFromWelcomeView(): void
    {
        $welcomePath = resource_path('views/welcome.blade.php');

        if (! $this->files->exists($welcomePath)) {
            return;
        }

        $contents = $this->files->get($welcomePath);
        $updated = preg_replace(
            '/^\s*<script[^>]+alpinejs[^>]*><\/script>\s*$/mi',
            '',
            $contents,
        );

        if (! is_string($updated) || $updated === $contents) {
            $this->components->twoColumnDetail(
                '<fg=yellow>Skipped</> Alpine CDN cleanup',
                '<fg=gray>no alpinejs script tag in welcome.blade.php</>',
            );
            return;
        }

        $this->files->put($welcomePath, $updated);
        $this->components->twoColumnDetail(
            '<fg=green>Removed</> Alpine CDN script',
            '<fg=gray>resources/views/welcome.blade.php</>',
        );
    }
}
