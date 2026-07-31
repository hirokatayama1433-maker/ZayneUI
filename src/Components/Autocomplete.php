<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Autocomplete extends Component
{
    public string $style = '';

    public function __construct(
        public string  $variant      = 'outline',
        public string  $color        = 'base',
        public string  $size         = 'md',
        public ?string $name         = null,
        public ?string $value        = null,
        public ?string $placeholder  = 'Search...',
        public array   $options      = [],   // static options — ['label' => 'PHP', 'value' => 'php'] or flat strings
        public bool    $disabled     = false,
        public bool    $clearable    = true,
        public bool    $freetext     = false,  // allow typing values not in the list
        public string  $radius       = 'var(--zayne-radius-field)',
        public ?string $shadow       = null,
        public ?string $margin       = null,
        public string  $border       = 'var(--zayne-border-field)',
        public ?string $bordercolor  = null,
        public string  $emptytext    = 'No results found',
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'outline' => [
                'base'    => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-base-border)'],
                'primary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-primary)'],
                'success' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-success)'],
                'danger'  => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-danger)'],
            ],
            'soft' => [
                'base'    => ['background' => 'var(--zayne-color-base-200)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
                'primary' => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 10%, var(--zayne-color-base-100))', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'transparent'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['outline']['base'];

        $this->style = Zayne::styleString(array_merge([
            'border-radius' => $this->radius,
            'box-shadow'    => $this->shadow,
            'margin'        => $this->margin,
            'border-width'  => $this->border,
            'border-color'  => $this->bordercolor ?? $resolved['border-color'],
            '--zayne-input-focus-border' => $this->bordercolor ?? $resolved['border-color'],
            'opacity'       => $this->disabled ? '0.5' : null,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::autocomplete');
    }
}
