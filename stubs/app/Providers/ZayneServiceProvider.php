<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ZayneServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::directive('zayneStyles', function () {
            return implode("\n", [
                '<?php echo app(\Illuminate\Foundation\Vite::class)(["resources/css/app.css", "resources/js/app.js"]); ?>',
                '<script>',
                '    (function() {',
                '        if (localStorage.getItem("zayne-sidebar") === "true")',
                '            document.documentElement.classList.add("sidebar-collapsed");',
                '        var _t = localStorage.getItem("zayne-theme") || "light";',
                '        document.documentElement.classList.add(_t);',
                '        window.Theme = {',
                '            current: _t,',
                '            set: function(t) {',
                '                document.documentElement.classList.remove("light","dark","abyss");',
                '                document.documentElement.classList.add(this.current = t);',
                '                localStorage.setItem("zayne-theme", t);',
                '            }',
                '        };',
                '    })();',
                '</script>',
            ]);
        });

        Blade::directive('zayneScripts', function () {
            return Blade::compileString("@stack('scripts')");
        });
    }
}