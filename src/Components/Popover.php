<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Popover extends Component
{
    public string $style = '';

    public function __construct(
        public string $padding = '1rem',
        public string $radius = 'var(--zayne-radius-box)',
        public string $shadow = 'var(--zayne-shadow)',
        public string $background = 'var(--zayne-color-base-100)',
        public string $minwidth = '16rem',
        public ?string $margin = null,
        public ?string $border = null,
        public ?string $bordercolor = null
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
            'min-width' => $this->minwidth,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
            'border-style' => 'solid',
        ]);
    }

    public function render(): View
    {
        return view('zayne::popover');
    }
}
