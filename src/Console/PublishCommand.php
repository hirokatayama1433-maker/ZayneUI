<?php

namespace Zayne\UI\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'zayne:publish')]
class PublishCommand extends Command
{
    protected $signature = 'zayne:publish
                            {components?* : Component name(s) to publish}
                            {--all : Publish all components}
                            {--force : Overwrite existing files}';

    protected $description = 'Publish Zayne UI components for customization.';

    protected Filesystem $files;

    protected array $publishableComponents = [
        'button', 'badge', 'alert', 'avatar', 'card', 'progress',
        'modal', 'drawer', 'dropdown', 'tooltip', 'popover',
        'input', 'textarea', 'select', 'checkbox', 'radio', 'range', 'file', 'toggle', 'fieldset',
        'layout/header', 'layout/main', 'layout/sidebar',
        'header/brand', 'header/avatar', 'header/nav',
        'sidebar/brand', 'sidebar/avatar', 'sidebar/label',
        'sidebar/navitem', 'sidebar/navtree', 'sidebar/navtreeitem',
    ];

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle(): int
    {
        $targets = $this->option('all')
            ? $this->publishableComponents
            : ($this->argument('components') ?: $this->askWhichComponent());

        foreach ($targets as $component) {
            $this->publishComponent($component);
        }

        return self::SUCCESS;
    }

    protected function askWhichComponent(): array
    {
        $choice = $this->choice('Which component would you like to publish?', $this->publishableComponents);

        return [$choice];
    }

    protected function publishComponent(string $component): void
    {
        $force = $this->option('force');

        $bladeSrc = __DIR__ . '/../../stubs/resources/views/components/zayne/' . $component . '.blade.php';
        $bladeDest = resource_path('views/components/zayne/' . $component . '.blade.php');

        if ($this->files->exists($bladeSrc)) {
            if ($this->files->exists($bladeDest) && ! $force) {
                $this->components->twoColumnDetail("<fg=yellow>Skipped</> {$component}.blade.php", '<fg=gray>use --force to overwrite</>');
            } else {
                $this->files->ensureDirectoryExists(dirname($bladeDest));
                $this->files->copy($bladeSrc, $bladeDest);
                $this->components->twoColumnDetail("<fg=green>Published</> {$component}.blade.php", '<fg=gray>resources/views/components/zayne/</>');
            }
        }

        $className = $this->componentToClassName($component);
        $phpSrc = __DIR__ . '/../Components/' . $className . '.php';
        $phpDest = app_path('View/Components/Zayne/' . $className . '.php');

        if ($this->files->exists($phpSrc)) {
            if ($this->files->exists($phpDest) && ! $force) {
                $this->components->twoColumnDetail("<fg=yellow>Skipped</> {$className}.php", '<fg=gray>use --force to overwrite</>');
            } else {
                $this->files->ensureDirectoryExists(dirname($phpDest));
                $contents = str_replace(
                    'namespace Zayne\\UI\\Components',
                    'namespace App\\View\\Components\\Zayne',
                    $this->files->get($phpSrc)
                );
                $this->files->put($phpDest, $contents);
                $this->components->twoColumnDetail("<fg=green>Published</> {$className}.php", '<fg=gray>app/View/Components/Zayne/</>');
            }
        }
    }

    protected function componentToClassName(string $component): string
    {
        return collect(explode('/', $component))
            ->map(fn ($part) => str($part)->studly())
            ->implode('/');
    }
}
