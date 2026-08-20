<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Checkbox extends Component
{
    public string $style = '';
    public string $uncheckedBackground = '';
    public string $uncheckedColor = '';
    public string $checkedBackground = '';
    public string $checkedColor = '';

    public function __construct(
        public string $variant = 'outline',
        public string $color = 'primary',
        public bool $checked = false,
        public bool $disabled = false,
        public ?string $padding = null,
        public string $radius = 'var(--zayne-radius-selector)',
        public ?string $shadow = null,
        public ?string $margin = null,
        public string $border = 'var(--zayne-border-selector)',
        public string $bordercolor = 'var(--zayne-color-base-border)'
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'outline' => [
                'primary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-primary)', 'border-color' => 'var(--zayne-color-primary)'],
                'secondary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-secondary)', 'border-color' => 'var(--zayne-color-secondary)'],
                'base' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-base-border)'],
                'success' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-success)', 'border-color' => 'var(--zayne-color-success)'],
                'danger' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-danger)', 'border-color' => 'var(--zayne-color-danger)'],
                'warning' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-warning)', 'border-color' => 'var(--zayne-color-warning)'],
                'info' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-info)', 'border-color' => 'var(--zayne-color-info)'],
            ],
            'soft' => [
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 20%, transparent)', 'color' => 'var(--zayne-color-primary)', 'border-color' => 'transparent'],
                'secondary' => ['background' => 'color-mix(in oklch, var(--zayne-color-secondary) 20%, transparent)', 'color' => 'var(--zayne-color-secondary)', 'border-color' => 'transparent'],
                'base' => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
                'success' => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 20%, transparent)', 'color' => 'var(--zayne-color-success)', 'border-color' => 'transparent'],
                'danger' => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 20%, transparent)', 'color' => 'var(--zayne-color-danger)', 'border-color' => 'transparent'],
                'warning' => ['background' => 'color-mix(in oklch, var(--zayne-color-warning) 20%, transparent)', 'color' => 'var(--zayne-color-warning)', 'border-color' => 'transparent'],
                'info' => ['background' => 'color-mix(in oklch, var(--zayne-color-info) 20%, transparent)', 'color' => 'var(--zayne-color-info)', 'border-color' => 'transparent'],
            ],
        ];

        $unchecked = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['outline']['primary'];

        $activeColors = [
            'base' => ['background' => 'var(--zayne-color-base-content)', 'color' => 'var(--zayne-color-base-100)'],
            'primary' => ['background' => 'var(--zayne-color-primary)', 'color' => 'var(--zayne-color-primary-content)'],
            'secondary' => ['background' => 'var(--zayne-color-secondary)', 'color' => 'var(--zayne-color-secondary-content)'],
            'success' => ['background' => 'var(--zayne-color-success)', 'color' => 'var(--zayne-color-success-content)'],
            'danger' => ['background' => 'var(--zayne-color-danger)', 'color' => 'var(--zayne-color-danger-content)'],
            'warning' => ['background' => 'var(--zayne-color-warning)', 'color' => 'var(--zayne-color-warning-content)'],
            'info' => ['background' => 'var(--zayne-color-info)', 'color' => 'var(--zayne-color-info-content)'],
        ];

        $checkedState = $activeColors[$this->color] ?? $activeColors['primary'];

        $this->uncheckedBackground = $unchecked['background'];
        $this->uncheckedColor = $unchecked['color'];
        $this->checkedBackground = $checkedState['background'];
        $this->checkedColor = $checkedState['color'];

        if ($this->checked) {
            $resolved = array_merge($unchecked, $checkedState);
        } else {
            $resolved = $unchecked;
        }

        $this->style = Zayne::styleString(array_merge([
            'padding' => $this->padding,
            'border-radius' => $this->radius,
            'box-shadow' => $this->shadow,
            'margin' => $this->margin,
            'border-width' => $this->border,
            'border-color' => $this->bordercolor,
            'opacity' => $this->disabled ? '0.5' : null,
            'cursor' => $this->disabled ? 'not-allowed' : null,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::checkbox');
    }
}
