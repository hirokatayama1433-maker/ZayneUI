<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;
use App\View\Components\Zayne\Traits\HasSemanticColors;

class Alert extends ZayneComponent
{
    use HasSemanticColors;

    public string $color;
    public bool $dismissible;
    public ?string $title;

    public string $classes;
    public string $colorClasses;

    public function __construct(
        string $color = 'info',
        bool $dismissible = false,
        ?string $title = null,
    ) {
        $this->color       = $color;
        $this->dismissible = $dismissible;
        $this->title       = $title;

        $this->colorClasses = $this->resolveSemanticClasses();

        $this->classes = $this->mergeClasses(
            'relative w-full flex gap-3 p-4',
            'rounded-[var(--zayne-radius-box)]',
            'border',
            $this->colorClasses,
        );
    }

    public function render()
    {
        return view('components.zayne.alert');
    }
}