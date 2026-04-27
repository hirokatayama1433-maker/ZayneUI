<?php

namespace App\View\Components\Zayne\Overlay;

use App\View\Components\Zayne\ZayneComponent;

class Dropdown extends ZayneComponent
{
    public string $position;  // bottom-start | bottom-end | top-start | top-end
    public string $width;
    public string $classes;
    public string $menuClasses;

    public function __construct(
        string $position = 'bottom-start',
        string $width = 'w-48',
    ) {
        $this->position   = $position;
        $this->width      = $width;

        $this->classes = $this->mergeClasses('relative inline-flex');

        $positionClasses = match ($position) {
            'bottom-end' => 'top-full right-0 mt-1',
            'top-start'  => 'bottom-full left-0 mb-1',
            'top-end'    => 'bottom-full right-0 mb-1',
            default      => 'top-full left-0 mt-1',
        };

        $this->menuClasses = implode(' ', [
            'absolute z-50',
            $width,
            $positionClasses,
            'rounded-[var(--zayne-radius-box)]',
            'border border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-100)]',
            'shadow-[var(--zayne-shadow)]',
            'py-1 overflow-hidden',
        ]);
    }

    public function render()
    {
        return view('components.zayne.overlay.dropdown');
    }
}