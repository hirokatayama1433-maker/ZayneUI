<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Input extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'outline',
        public string $color = 'base',
        public string $type = 'text',
        public string $value = 'unset',
        public string $placeholder = 'unset',
        public string $padding = '0 0.875rem',
        public string $radius = 'var(--zayne-radius-field)',
        public string $shadow = 'unset',
        public string $margin = 'unset',
        public string $border = 'var(--zayne-border-field)',
        public string $bordercolor = 'var(--zayne-color-base-border)'
    ) {
    }

    public function mount(): void
    {
        $variantStyles = [
            'outline' => [
                'base' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)'],
                'primary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-primary)'],
            ],
            'soft' => [
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 10%, var(--zayne-color-base-100))', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['outline']['base'];

        $this->style = Zayne::styleString(array_merge([
            'padding' => $this->padding,
            'border-radius' => $this->radius,
            'box-shadow' => $this->shadow,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::input');
    }
}
