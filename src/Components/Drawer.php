<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Drawer extends Component
{
    public string $style = '';

    public function __construct(
        public string $width = '22rem',
        public string $padding = '1.5rem',
        public string $shadow = 'var(--zayne-shadow)',
        public string $background = 'var(--zayne-color-base-100)',
        public ?string $margin = null,
        public ?string $border = null,
        public ?string $bordercolor = null
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'width' => $this->width,
            'padding' => $this->padding,
            'box-shadow' => $this->shadow,
            'background' => $this->background,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
            'border-style' => 'solid',
        ]);
    }

    public function render(): View
    {
        return view('zayne::drawer');
    }
}
