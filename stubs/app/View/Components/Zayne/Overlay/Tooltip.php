<?php

namespace View\Components\Zayne\Overlay;

use App\View\Components\Zayne\ZayneComponent;

class Tooltip extends ZayneComponent
{
    public string $position; // top | bottom | left | right
    public string $classes;
    public string $tipClasses;

    public function __construct(
        string $position = 'top',
    ) {
        $this->position = $position;

        $this->classes = $this->mergeClasses(
            'relative inline-flex',
        );

        $positionClasses = match ($position) {
            'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
            'left'   => 'right-full top-1/2 -translate-y-1/2 mr-2',
            'right'  => 'left-full top-1/2 -translate-y-1/2 ml-2',
            default  => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        };

        $this->tipClasses = implode(' ', [
            'absolute z-50 w-max max-w-xs px-2.5 py-1.5',
            'text-xs font-medium leading-tight',
            'rounded-[var(--zayne-radius-field)]',
            'bg-[var(--zayne-color-base-content)] text-[var(--zayne-color-base-100)]',
            'pointer-events-none whitespace-nowrap',
            $positionClasses,
        ]);
    }

    public function render()
    {
        return view('zayne.overlay.tooltip');
    }
}