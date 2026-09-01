<?php

namespace Zayne\UI;

class ZayneThemeRegistry
{
    protected const BUILTIN_THEMES = ['light', 'dark', 'abyss'];

    protected static ?array $themeNames = null;

    protected static string $default = 'zaynetheme-neutral-light-minimalist';

    public static function getThemeNames(): array
    {
        if (static::$themeNames !== null) {
            return static::$themeNames;
        }

        $css = @file_get_contents(__DIR__ . '/../stubs/resources/css/zayne.css') ?: '';
        preg_match_all('/^\.([a-z0-9_-]+)\s*\{/mi', $css, $matches);

        $names = array_values(array_unique(array_merge(
            static::BUILTIN_THEMES,
            array_filter($matches[1] ?? [], static fn (string $name): bool => str_starts_with($name, 'zaynetheme'))
        )));

        static::$themeNames = $names;

        return static::$themeNames;
    }

    public static function getDefault(): string
    {
        return static::$default;
    }

    public static function setDefault(string $theme): void
    {
        static::$default = $theme;
    }

    public static function javascriptThemeNames(): string
    {
        return json_encode(static::getThemeNames(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
