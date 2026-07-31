<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class DatePicker extends Component
{
    public string $style     = '';
    public string $panelStyle = '';

    public function __construct(
        public ?string $name        = null,
        public ?string $value       = null,     // YYYY-MM-DD
        public ?string $min         = null,     // YYYY-MM-DD
        public ?string $max         = null,     // YYYY-MM-DD
        public string  $placeholder = 'Pick a date',
        public string  $format      = 'MMM D, YYYY',  // display format label only
        public bool    $disabled    = false,
        public bool    $clearable   = true,
        public string  $variant     = 'outline',
        public string  $color       = 'base',
        public string  $radius      = 'var(--zayne-radius-field)',
        public ?string $shadow      = null,
        public ?string $margin      = null,
        public string  $border      = 'var(--zayne-border-field)',
        public ?string $bordercolor = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'outline' => [
                'base'    => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-base-border)'],
                'primary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-primary)'],
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

        $this->panelStyle = Zayne::styleString([
            'background'    => 'var(--zayne-color-base-100)',
            'border-radius' => 'var(--zayne-radius-box)',
            'box-shadow'    => 'var(--zayne-shadow)',
            'border'        => '1px solid var(--zayne-color-base-border)',
            'padding'       => '0.875rem',
            'min-width'     => '18rem',
        ]);
    }

    public function render(): View
    {
        return view('zayne::date-picker');
    }
}
