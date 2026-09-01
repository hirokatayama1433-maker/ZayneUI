<?php

namespace Zayne\UI;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ZayneAssetManager
{
    public static function boot(): void
    {
        $instance = new static();
        $instance->registerRoutes();
    }

    protected function registerRoutes(): void
    {
        Route::get('/zayne/zayne.css', [static::class, 'css']);
        Route::get('/zayne/zayne.js', [static::class, 'js']);
    }

    public function css(): mixed
    {
        return $this->pretendResponseIsFile(__DIR__ . '/../stubs/resources/css/zayne.css', 'text/css');
    }

    public function js(): mixed
    {
        return $this->pretendResponseIsFile(__DIR__ . '/../stubs/resources/js/zayne.js', 'text/javascript');
    }

    public static function renderStyles(): string
    {
        $version = filemtime(__DIR__ . '/../stubs/resources/css/zayne.css');
        $appearance = static::appearanceScript();
        $criticalTheme = static::criticalThemeStyles();

        return $appearance . "\n" . $criticalTheme . "\n" . '<link rel="stylesheet" href="' . url('/zayne/zayne.css?v=' . $version) . '">';
    }

    public static function renderScripts(): string
    {
        $version = filemtime(__DIR__ . '/../stubs/resources/js/zayne.js');

        return '<script src="' . url('/zayne/zayne.js?v=' . $version) . '" defer></script>';
    }

    public static function renderAppearance(): string
    {
        return static::appearanceScript();
    }

    protected static function appearanceScript(): string
    {
        $themes = ZayneThemeRegistry::javascriptThemeNames();
        $default = ZayneThemeRegistry::getDefault();

        return <<<HTML
<script data-zayne-appearance>
    (function() {
        var root = document.documentElement;
        var themes = {$themes};

        if (root.hasAttribute('data-zayne-appearance-ready')) {
            return;
        }

        root.setAttribute('data-zayne-appearance-ready', 'true');
        window.ZayneThemeNames = themes;

        var savedTheme = localStorage.getItem('zayne-theme')
            || localStorage.getItem('zayne.theme')
            || '{$default}';

        root.classList.remove.apply(root.classList, themes);
        root.classList.add(themes.indexOf(savedTheme) >= 0 ? savedTheme : '{$default}');

        if (localStorage.getItem('zayne-sidebar') === 'true') {
            root.classList.add('sidebar-collapsed');
        } else {
            root.classList.remove('sidebar-collapsed');
        }
    })();
</script>
HTML;
    }

    protected static function criticalThemeStyles(): string
    {
        return <<<'HTML'
<style data-zayne-critical-theme>
    
</style>
HTML;
    }

    protected function pretendResponseIsFile(string $file, string $contentType): mixed
    {
        $lastModified = filemtime($file);

        return $this->cachedFileResponse(
            $file,
            $contentType,
            $lastModified,
            fn ($headers) => response()->file($file, $headers)
        );
    }

    protected function cachedFileResponse(string $filename, string $contentType, int $lastModified, callable $downloadCallback): mixed
    {
        $expires = strtotime('+1 year');
        $cacheControl = 'public, max-age=31536000';

        if ($this->matchesCache($lastModified)) {
            return response('', 304, [
                'Expires' => $this->httpDate($expires),
                'Cache-Control' => $cacheControl,
            ]);
        }

        return $downloadCallback([
            'Content-Type' => $contentType,
            'Expires' => $this->httpDate($expires),
            'Cache-Control' => $cacheControl,
            'Last-Modified' => $this->httpDate($lastModified),
        ]);
    }

    protected function matchesCache(int $lastModified): bool
    {
        $ifModifiedSince = app(Request::class)->header('if-modified-since');

        return $ifModifiedSince !== null && @strtotime($ifModifiedSince) === $lastModified;
    }

    protected function httpDate(int $timestamp): string
    {
        return sprintf('%s GMT', gmdate('D, d M Y H:i:s', $timestamp));
    }
}
