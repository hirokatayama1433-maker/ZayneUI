# ZayneUI

A Laravel Blade component library. Install once, own everything.

---

## Requirements

- PHP 8.2+
- Laravel 11 or 12
- Tailwind CSS v4
- Vite

---

## Installation

```bash
composer require zayne/ui
php artisan zayne:install
```

The install command will:
- Copy all components, CSS, and JS into your app
- Register `App\Providers\ZayneServiceProvider` in `bootstrap/providers.php`
- Inject CSS imports into `resources/css/app.css`
- Inject the JS import into `resources/js/app.js`

---

## Setup

**1. Add to your layout `<head>`:**

```blade
@zayneStyles
```

This outputs your Vite assets and restores the saved theme + sidebar state before the first paint.

**2. Add before `</body>`:**

```blade
@zayneScripts
```

**3. Set a theme on `<html>`:**

```html
<html class="light">
<html class="dark">
<html class="abyss">
```

---

## Theming

The only file you should edit is:

```
resources/css/zayne-theme.css
```

All design tokens are CSS custom properties. Three themes are included: `light`, `dark`, and `abyss`.

| Token | Description |
|---|---|
| `--zayne-color-primary` | Brand primary |
| `--zayne-color-secondary` | Brand secondary |
| `--zayne-color-accent` | Accent color |
| `--zayne-color-base-100` | Page background |
| `--zayne-color-base-200` | Surface background |
| `--zayne-color-base-content` | Body text |
| `--zayne-color-danger` | Error / destructive |
| `--zayne-color-success` | Success state |
| `--zayne-color-warning` | Warning state |
| `--zayne-color-info` | Info state |

---

## Usage

```blade
<x-zayne.button>Save</x-zayne.button>

<x-zayne.button variant="outline" color="danger">Delete</x-zayne.button>

<x-zayne.button variant="soft" color="success" size="sm">
    <x-slot:leftIcon>...</x-slot:leftIcon>
    Saved
</x-zayne.button>
```

### Button props

| Prop | Type | Default | Values |
|---|---|---|---|
| `variant` | string | `solid` | `solid` `soft` `outline` `dashed` `ghost` `link` |
| `color` | string | `base` | `primary` `secondary` `accent` `base` `danger` `success` `warning` `info` |
| `size` | string | `md` | `xs` `sm` `md` `lg` `xl` |
| `href` | string | `null` | Renders as `<a>` when set |
| `disabled` | bool | `false` | |
| `fullWidth` | bool | `false` | |
| `square` | bool | `false` | Equal width/height (icon buttons) |

---

## JavaScript API

State is exposed globally:

```js
Zayne.Theme.set('dark')      // 'light' | 'dark' | 'abyss'
Zayne.Theme.toggle()

Zayne.Sidebar.toggle()
Zayne.Sidebar.collapse()
Zayne.Sidebar.expand()

Zayne.Subbar.toggle()
```

---

## Updating

```bash
composer update zayne/ui
php artisan zayne:install --force
```

`--force` overwrites all installed files. Your `zayne-theme.css` will be overwritten — back it up before updating if you've customised it, or keep your theme tokens in a separate file and `@import` them.

---

## Rules

- ✅ Edit `zayne-theme.css` to customise your theme
- ❌ Do not edit component PHP classes
- ❌ Do not edit Blade templates
- ❌ Do not edit `zayne-layout.css` or `zayne-overlay.css`
- ❌ Do not edit `zayne.js` or its modules

---

## License

MIT
