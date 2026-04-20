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

        // 1. Copy all stubs into the app
        $this->publishStubs($force);

        // 2. Register the app-side service provider
        $this->registerServiceProvider();

        // 3. Inject CSS imports into app.css
        $this->injectCssImports();

        // 4. Inject JS import into app.js
        $this->injectJsImport();

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
            $this->components->warn('resources/js/app.js not found. Add this import manually:');
            $this->line("  import './zayne.js';");
            return;
        }

        $contents = $this->files->get($jsPath);
        $import   = "import './zayne.js';";

        if (Str::contains($contents, $import)) {
            $this->components->twoColumnDetail(
                '<fg=yellow>Skipped</> JS import',
                '<fg=gray>already present</>',
            );
            return;
        }

        $contents .= "\n{$import}\n";
        $this->files->put($jsPath, $contents);

        $this->components->twoColumnDetail(
            '<fg=green>Injected</> JS import',
            '<fg=gray>resources/js/app.js</>',
        );
    }
}
