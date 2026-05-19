<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Tooltip extends Component
{
    public string $style = '';

    public function __construct(
        public string $text = 'Tooltip',
        public string $padding = '0.5rem 0.75rem',
        public string $radius = 'var(--zayne-radius-selector)',
        public string $shadow = 'var(--zayne-shadow)',
        public string $background = 'var(--zayne-color-base-300)',
        public string $color = 'var(--zayne-color-base-content)'
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'padding' => $this->padding,
            'border-radius' => $this->radius,
            'box-shadow' => $this->shadow,
            'background' => $this->background,
            'color' => $this->color,
        ]);
    }

    public function render(): View
    {
        return view('zayne::tooltip');
    }
}
