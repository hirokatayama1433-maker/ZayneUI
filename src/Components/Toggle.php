<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Toggle extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'soft',
        public string $color = 'primary',
        public bool $checked = false,
        public string $padding = '0.125rem',
        public string $radius = '999px',
        public string $shadow = 'unset',
        public string $margin = 'unset',
        public string $border = 'unset',
        public string $bordercolor = 'unset'
    ) {
    }

    public function mount(): void
    {
        $variantStyles = [
            'soft' => [
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 18%, var(--zayne-color-base-300))', 'color' => 'var(--zayne-color-primary)'],
                'success' => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 18%, var(--zayne-color-base-300))', 'color' => 'var(--zayne-color-success)'],
                'base' => ['background' => 'var(--zayne-color-base-300)', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'solid' => [
                'primary' => ['background' => 'var(--zayne-color-primary)', 'color' => 'var(--zayne-color-primary-content)'],
                'success' => ['background' => 'var(--zayne-color-success)', 'color' => 'var(--zayne-color-success-content)'],
                'base' => ['background' => 'var(--zayne-color-base-content)', 'color' => 'var(--zayne-color-base-100)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['soft']['primary'];

        if (! $this->checked) {
            $resolved['background'] = 'var(--zayne-color-base-300)';
            $resolved['color'] = 'var(--zayne-color-base-content-muted)';
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
        return view('zayne::toggle');
    }
}
