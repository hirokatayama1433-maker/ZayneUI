<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Avatar extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'soft',
        public string $color = 'base',
        public string $size = 'md',
        public ?string $src = null,
        public string $alt = 'Avatar',
        public string $radius = '999px',
        public ?string $shadow = null,
        public ?string $margin = null,
        public ?string $border = '0px',
        public ?string $bordercolor = null
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'solid' => [
                'primary' => ['background' => 'var(--zayne-color-primary)', 'color' => 'var(--zayne-color-primary-content)'],
                'secondary' => ['background' => 'var(--zayne-color-secondary)', 'color' => 'var(--zayne-color-secondary-content)'],
                'base' => ['background' => 'var(--zayne-color-base-300)', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'soft' => [
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 18%, transparent)', 'color' => 'var(--zayne-color-primary)'],
                'secondary' => ['background' => 'color-mix(in oklch, var(--zayne-color-secondary) 18%, transparent)', 'color' => 'var(--zayne-color-secondary)'],
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['soft']['base'];

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
        return view('zayne::avatar');
    }
}
