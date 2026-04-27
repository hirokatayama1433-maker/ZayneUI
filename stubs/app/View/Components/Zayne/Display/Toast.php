<?php

namespace View\Components\Zayne\Display;

use App\View\Components\Zayne\ZayneComponent;
use App\View\Components\Zayne\Traits\HasSemanticColors;

class Toast extends ZayneComponent
{
    use HasSemanticColors;

    public string $color;
    public ?string $title;
    public ?string $duration; // ms, null = persistent

    public string $classes;

    public function __construct(
        string $color = 'info',
        ?string $title = null,
        ?string $duration = '4000',
    ) {
        $this->color    = $color;
        $this->title    = $title;
        $this->duration = $duration;

        $this->classes = $this->mergeClasses(
            'flex items-start gap-3 w-80 p-4',
            'rounded-[var(--zayne-radius-box)]',
            'border shadow-[var(--zayne-shadow)]',
            'bg-[var(--zayne-color-base-100)]',
            $this->resolveSemanticClasses(),
        );
    }

    public function render()
    {
        return view('zayne.display.toast');
    }
}