<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Badge extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'soft',
        public string $color = 'base',
        public string $size = 'md',
        public ?string $padding = null,
        public string $radius = 'var(--zayne-radius-selector)',
        public ?string $shadow = null,
        public string $gap = '0.25rem',
        public ?string $margin = null,
        public ?string $border = null,
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
                'danger' => ['background' => 'var(--zayne-color-danger)', 'color' => 'var(--zayne-color-danger-content)'],
                'success' => ['background' => 'var(--zayne-color-success)', 'color' => 'var(--zayne-color-success-content)'],
                'warning' => ['background' => 'var(--zayne-color-warning)', 'color' => 'var(--zayne-color-warning-content)'],
                'info' => ['background' => 'var(--zayne-color-info)', 'color' => 'var(--zayne-color-info-content)'],
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'soft' => [
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 18%, transparent)', 'color' => 'var(--zayne-color-primary)'],
                'secondary' => ['background' => 'color-mix(in oklch, var(--zayne-color-secondary) 18%, transparent)', 'color' => 'var(--zayne-color-secondary)'],
                'danger' => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 18%, transparent)', 'color' => 'var(--zayne-color-danger)'],
                'success' => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 18%, transparent)', 'color' => 'var(--zayne-color-success)'],
                'warning' => ['background' => 'color-mix(in oklch, var(--zayne-color-warning) 18%, transparent)', 'color' => 'var(--zayne-color-warning)'],
                'info' => ['background' => 'color-mix(in oklch, var(--zayne-color-info) 18%, transparent)', 'color' => 'var(--zayne-color-info)'],
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'outline' => [
                'primary' => ['background' => 'transparent', 'color' => 'var(--zayne-color-primary)', 'border' => '1px solid var(--zayne-color-primary)'],
                'secondary' => ['background' => 'transparent', 'color' => 'var(--zayne-color-secondary)', 'border' => '1px solid var(--zayne-color-secondary)'],
                'danger' => ['background' => 'transparent', 'color' => 'var(--zayne-color-danger)', 'border' => '1px solid var(--zayne-color-danger)'],
                'success' => ['background' => 'transparent', 'color' => 'var(--zayne-color-success)', 'border' => '1px solid var(--zayne-color-success)'],
                'warning' => ['background' => 'transparent', 'color' => 'var(--zayne-color-warning)', 'border' => '1px solid var(--zayne-color-warning)'],
                'info' => ['background' => 'transparent', 'color' => 'var(--zayne-color-info)', 'border' => '1px solid var(--zayne-color-info)'],
                'base' => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-base-border)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['soft']['base'];

        $base = [
            'padding' => $this->padding,
            'border-radius' => $this->radius,
            'gap' => $this->gap,
            'box-shadow' => $this->shadow,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
        ];

        $this->style = Zayne::styleString(array_merge($base, $resolved));
    }

    public function render(): View
    {
        return view('zayne::badge');
    }
}
