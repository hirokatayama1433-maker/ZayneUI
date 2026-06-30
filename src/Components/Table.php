<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Table extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'solid',
        public bool $striped = false,
        public string $radius = 'var(--zayne-radius-box)',
        public ?string $shadow = null,
        public ?string $margin = null,
        public string $border = 'var(--zayne-border-box)',
        public string $bordercolor = 'var(--zayne-color-base-border)'
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'solid' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)'],
            'soft' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)'],
        ];

        $resolved = $variantStyles[$this->variant] ?? $variantStyles['solid'];

        $this->style = Zayne::styleString(array_merge([
            'border-radius' => $this->radius,
            'box-shadow' => $this->shadow,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::table');
    }
}
