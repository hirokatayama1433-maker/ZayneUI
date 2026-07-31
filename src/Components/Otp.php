<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Otp extends Component
{
    public string $style     = '';
    public string $boxStyle  = '';

    public function __construct(
        public int     $length      = 6,
        public string  $variant     = 'outline',
        public string  $color       = 'base',
        public string  $type        = 'numeric',   // numeric | alphanumeric | password
        public ?string $name        = null,
        public bool    $disabled    = false,
        public bool    $autofocus   = false,
        public string  $size        = 'md',        // sm | md | lg
        public string  $radius      = 'var(--zayne-radius-field)',
        public ?string $gap         = null,
        public ?string $margin      = null,
        public ?string $shadow      = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $sizes = [
            'sm' => ['width' => '2.25rem', 'height' => '2.25rem', 'font-size' => '0.9375rem'],
            'md' => ['width' => '2.75rem', 'height' => '2.75rem', 'font-size' => '1.125rem'],
            'lg' => ['width' => '3.25rem', 'height' => '3.25rem', 'font-size' => '1.375rem'],
        ];

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

        $sz = $sizes[$this->size] ?? $sizes['md'];
        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['outline']['base'];

        $this->style = Zayne::styleString([
            'display'         => 'flex',
            'align-items'     => 'center',
            'gap'             => $this->gap ?? '0.5rem',
            'margin'          => $this->margin,
        ]);

        $this->boxStyle = Zayne::styleString(array_merge($sz, [
            'border-radius'   => $this->radius,
            'border-width'    => 'var(--zayne-border-field)',
            'border-style'    => 'solid',
            'box-shadow'      => $this->shadow,
            'text-align'      => 'center',
            'font-weight'     => '600',
            'font-family'     => 'inherit',
            'caret-color'     => 'var(--zayne-color-primary)',
            'transition'      => 'border-color 150ms ease, box-shadow 150ms ease, background 150ms ease',
            'box-sizing'      => 'border-box',
            'outline'         => 'none',
            'opacity'         => $this->disabled ? '0.5' : null,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::otp');
    }
}
