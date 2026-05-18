<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Checkbox extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'outline',
        public string $color = 'primary',
        public bool $checked = false,
        public string $padding = 'unset',
        public string $radius = 'var(--zayne-radius-selector)',
        public string $shadow = 'unset',
        public string $margin = 'unset',
        public string $border = 'var(--zayne-border-selector)',
        public string $bordercolor = 'var(--zayne-color-base-border)'
    ) {
    }

    public function mount(): void
    {
        $variantStyles = [
            'outline' => [
                'primary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-primary)', 'border-color' => 'var(--zayne-color-primary)'],
                'base' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-base-border)'],
            ],
            'soft' => [
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 20%, transparent)', 'color' => 'var(--zayne-color-primary)', 'border-color' => 'transparent'],
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['outline']['primary'];

        if ($this->checked) {
            $resolved['background'] = $this->color === 'base' ? 'var(--zayne-color-base-content)' : 'var(--zayne-color-primary)';
            $resolved['color'] = $this->color === 'base' ? 'var(--zayne-color-base-100)' : 'var(--zayne-color-primary-content)';
        }

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
        return view('zayne::checkbox');
    }
}
