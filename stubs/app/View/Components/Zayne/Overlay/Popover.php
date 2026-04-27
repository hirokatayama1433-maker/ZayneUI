<?php

namespace App\View\Components\Zayne\Overlay;

use App\View\Components\Zayne\ZayneComponent;

class Popover extends ZayneComponent
{
    public string $position;
    public string $width;
    public string $classes;
    public string $panelClasses;

    public function __construct(
        string $position = 'bottom-start',
        string $width = 'w-72',
    ) {
        $this->position = $position;
        $this->width    = $width;

        $this->classes = $this->mergeClasses('relative inline-flex');

        $positionClasses = match ($position) {
            'bottom-end' => 'top-full right-0 mt-2',
            'top-start'  => 'bottom-full left-0 mb-2',
            'top-end'    => 'bottom-full right-0 mb-2',
            default      => 'top-full left-0 mt-2',
        };

        $this->panelClasses = implode(' ', [
            'absolute z-50',
            $width,
            $positionClasses,
            'rounded-[var(--zayne-radius-box)]',
            'border border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-100)]',
            'shadow-[var(--zayne-shadow)]',
            'p-4',
        ]);
    }

    public function render()
    {
        return view('components.zayne.overlay.popover');
    }
}