<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Progress extends Component
{
    public string $style = '';

    public string $barStyle = '';

    public function __construct(
        public string $variant = 'solid',
        public string $color = 'primary',
        public int|string $value = 0,
        public string $height = '8px',
        public string $radius = '999px',
        public string $shadow = 'unset',
        public string $margin = 'unset'
    ) {
    }

    public function mount(): void
    {
        $variantStyles = [
            'solid' => [
                'primary' => ['background' => 'var(--zayne-color-primary)'],
                'secondary' => ['background' => 'var(--zayne-color-secondary)'],
                'danger' => ['background' => 'var(--zayne-color-danger)'],
                'success' => ['background' => 'var(--zayne-color-success)'],
                'warning' => ['background' => 'var(--zayne-color-warning)'],
                'info' => ['background' => 'var(--zayne-color-info)'],
                'base' => ['background' => 'var(--zayne-color-base-content)'],
            ],
            'soft' => [
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 70%, white)'],
                'secondary' => ['background' => 'color-mix(in oklch, var(--zayne-color-secondary) 70%, white)'],
                'danger' => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 70%, white)'],
                'success' => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 70%, white)'],
                'warning' => ['background' => 'color-mix(in oklch, var(--zayne-color-warning) 70%, white)'],
                'info' => ['background' => 'color-mix(in oklch, var(--zayne-color-info) 70%, white)'],
                'base' => ['background' => 'var(--zayne-color-base-content-muted)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['solid']['primary'];

        $this->style = Zayne::styleString([
            'height' => $this->height,
            'border-radius' => $this->radius,
            'box-shadow' => $this->shadow,
            'margin' => $this->margin,
        ]);

        $this->barStyle = Zayne::styleString(array_merge([
            'width' => max(0, min(100, (int) $this->value)) . '%',
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::progress');
    }
}
