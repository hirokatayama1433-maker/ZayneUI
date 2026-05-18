<?php

namespace Zayne\UI;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;

class ZayneServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ZayneManager::class);
        $this->app->alias(ZayneManager::class, 'zayne');

        $loader = AliasLoader::getInstance();
        $loader->alias('Zayne', Zayne::class);
    }

    public function boot(): void
    {
        $this->bootComponents();
        $this->bootTagCompiler();
        $this->bootAssetManager();
        $this->bootDirectives();
        $this->bootMacros();
        $this->bootCommands();
    }

    protected function bootComponents(): void
    {
        Blade::componentNamespace('Zayne\\UI\\Components', 'zayne');

        if (function_exists('resource_path') && file_exists(resource_path('views/components/zayne'))) {
            Blade::anonymousComponentPath(resource_path('views/components/zayne'), 'zayne');
        }

        Blade::anonymousComponentPath(__DIR__ . '/../stubs/resources/views/components/zayne', 'zayne');
    }

    protected function bootTagCompiler(): void
    {
        $compiler = new ZayneTagCompiler(
            app('blade.compiler')->getClassComponentAliases(),
            app('blade.compiler')->getClassComponentNamespaces(),
            app('blade.compiler')
        );

        app()->bind('zayne.compiler', fn () => $compiler);

        app('blade.compiler')->precompiler(function ($value) use ($compiler) {
            return $compiler->compile($value);
        });
    }

    protected function bootAssetManager(): void
    {
        ZayneAssetManager::boot();
    }

    protected function bootDirectives(): void
    {
        Blade::directive('zayneStyles', fn () => "<?php echo app('zayne')->renderStyles(); ?>");
        Blade::directive('zayneScripts', fn () => "<?php echo app('zayne')->renderScripts(); ?>");
        Blade::directive('zayneAppearance', fn () => "<?php echo app('zayne')->renderAppearance(); ?>");
    }

    protected function bootMacros(): void
    {
        ComponentAttributeBag::macro('pluck', function ($key, $default = null) {
            $result = $this->get($key);
            unset($this->attributes[$key]);

            return $result ?? $default;
        });
    }

    protected function bootCommands(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\InstallCommand::class,
            Console\PublishCommand::class,
        ]);
    }
}
