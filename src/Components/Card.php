<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Card extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'solid',
        public string $color = 'base',
        public string $padding = '1.25rem',
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
            'solid' => [
                'base' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)'],
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 8%, var(--zayne-color-base-100))', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'soft' => [
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)'],
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 12%, var(--zayne-color-base-100))', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'outline' => [
                'base' => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-base-border)'],
                'primary' => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-primary)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['solid']['base'];

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
        return view('zayne::card');
    }
}
