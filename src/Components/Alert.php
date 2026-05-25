<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Alert extends Component
{
    public string $style = '';

    public function __construct(
        public string $variant = 'soft',
        public string $color = 'info',
        public string $padding = '1rem',
        public string $radius = 'var(--zayne-radius-box)',
        public ?string $shadow = null,
        public string $gap = '0.75rem',
        public ?string $margin = null,
        public ?string $border = '1px',
        public ?string $bordercolor = null
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'solid' => [
                'danger' => ['background' => 'var(--zayne-color-danger)', 'color' => 'var(--zayne-color-danger-content)', 'border' => '0px'],
                'success' => ['background' => 'var(--zayne-color-success)', 'color' => 'var(--zayne-color-success-content)','border' => '0px'],
                'warning' => ['background' => 'var(--zayne-color-warning)', 'color' => 'var(--zayne-color-warning-content)','border' => '0px'],
                'info' => ['background' => 'var(--zayne-color-info)', 'color' => 'var(--zayne-color-info-content)','border' => '0px'],
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)','border' => '0px'],
            ],
            'soft' => [
                'danger' => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 14%, transparent)', 'color' => 'var(--zayne-color-danger)'],
                'success' => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 14%, transparent)', 'color' => 'var(--zayne-color-success)'],
                'warning' => ['background' => 'color-mix(in oklch, var(--zayne-color-warning) 18%, transparent)', 'color' => 'var(--zayne-color-warning)'],
                'info' => ['background' => 'color-mix(in oklch, var(--zayne-color-info) 16%, transparent)', 'color' => 'var(--zayne-color-info)'],
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'outline' => [
                'danger' => ['background' => 'transparent', 'color' => 'var(--zayne-color-danger)', 'border' => '1px solid var(--zayne-color-danger)'],
                'success' => ['background' => 'transparent', 'color' => 'var(--zayne-color-success)', 'border' => '1px solid var(--zayne-color-success)'],
                'warning' => ['background' => 'transparent', 'color' => 'var(--zayne-color-warning)', 'border' => '1px solid var(--zayne-color-warning)'],
                'info' => ['background' => 'transparent', 'color' => 'var(--zayne-color-info)', 'border' => '1px solid var(--zayne-color-info)'],
                'base' => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-base-border)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['soft']['info'];

        $this->style = Zayne::styleString(array_merge([
            'padding' => $this->padding,
            'border-radius' => $this->radius,
            'box-shadow' => $this->shadow,
            'gap' => $this->gap,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::alert');
    }
}
