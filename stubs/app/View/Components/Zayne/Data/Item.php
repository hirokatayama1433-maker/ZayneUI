<?php

namespace View\Components\Zayne\Data;

use Illuminate\Support\Facades\Route;
use App\View\Components\Zayne\ZayneComponent;

class Item extends ZayneComponent
{
    public function __construct(
        public ?string $href = '#',
        public ?string $icon = null,
        public ?string $label = null,
        public bool $hideTextWhenCollapsed = true,
    ) {}

    public function isActive(): bool
    {
        if (!$this->href || $this->href === '#') {
            return false;
        }

        $currentRoute = request()->getPathInfo();
        $hrefPath = parse_url($this->href, PHP_URL_PATH);

        // Exact match or starts with (for nested routes)
        return $currentRoute === $hrefPath || str_starts_with($currentRoute, $hrefPath . '/');
    }

    public function render()
    {
        return view('zayne.data.item');
    }
}
