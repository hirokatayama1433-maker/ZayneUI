<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Dropdown extends Component
{
    public string $style = '';

    public function __construct(
        public string $padding = '0.5rem',
        public string $radius = 'var(--zayne-radius-box)',
        public string $shadow = 'var(--zayne-shadow)',
        public string $background = 'var(--zayne-color-base-100)',
        public string $minwidth = '12rem',
        public string $margin = 'unset',
        public string $border = 'unset',
        public string $bordercolor = 'unset'
    ) {
    }

    public function mount(): void
    {
        $this->style = Zayne::styleString([
            'padding' => $this->padding,
            'border-radius' => $this->radius,
            'box-shadow' => $this->shadow,
            'background' => $this->background,
            'min-width' => $this->minwidth,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
            'border-style' => 'solid',
        ]);
    }

    public function render(): View
    {
        return view('zayne::dropdown');
    }
}
