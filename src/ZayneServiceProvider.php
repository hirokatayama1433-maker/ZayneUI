<?php

namespace Zayne\UI;

use Illuminate\Support\ServiceProvider;
use Zayne\UI\Console\InstallCommand;

class ZayneServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
// test