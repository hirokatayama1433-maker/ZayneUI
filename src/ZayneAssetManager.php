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

        return '<link rel="stylesheet" href="' . url('/zayne/zayne.css?v=' . $version) . '">';
    }

    public static function renderScripts(): string
    {
        $version = filemtime(__DIR__ . '/../stubs/resources/js/zayne.js');

        return '<script src="' . url('/zayne/zayne.js?v=' . $version) . '" defer></script>';
    }

    public static function renderAppearance(): string
    {
        return <<<HTML
<script>
    (function() {
        var saved = localStorage.getItem('zayne.theme') || 'light';
        document.documentElement.className = saved;
    })();
</script>
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
