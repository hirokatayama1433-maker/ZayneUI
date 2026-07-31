<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class TimePicker extends Component
{
    public string $style      = '';
    public string $panelStyle = '';

    public function __construct(
        public ?string $name        = null,
        public ?string $value       = null,      // HH:MM or HH:MM:SS
        public string  $placeholder = 'Pick a time',
        public bool    $seconds     = false,     // include seconds column
        public bool    $meridiem    = false,     // 12-hour with AM/PM toggle
        public int     $step        = 1,         // minute step: 1, 5, 10, 15, 30
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
            'overflow'      => 'hidden',
        ]);
    }

    public function render(): View
    {
        return view('zayne::time-picker');
    }
}
