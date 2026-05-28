<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Select extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'outline',
        public string $color = 'base',
        public bool $disabled = false,
        public string $padding = '0 0.875rem',
        public string $radius = 'var(--zayne-radius-field)',
        public ?string $shadow = null,
        public ?string $margin = null,
        public string $border = 'var(--zayne-border-field)',
        public string $bordercolor = 'var(--zayne-color-base-border)'
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'outline' => [
                'base' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)'],
                'primary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-primary)'],
                'success' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-success)'],
                'danger' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-danger)'],
            ],
            'soft' => [
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 10%, var(--zayne-color-base-100))', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
                'success' => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 10%, var(--zayne-color-base-100))', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
                'danger' => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 10%, var(--zayne-color-base-100))', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
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
            '--zayne-input-focus-border' => $resolved['border-color'] ?? $this->bordercolor,
            'opacity' => $this->disabled ? '0.5' : null,
            'cursor' => $this->disabled ? 'not-allowed' : null,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::select');
    }
}
