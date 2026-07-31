<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Pillbox extends Component
{
    public string $style = '';

    public function __construct(
        public string  $variant     = 'outline',
        public string  $color       = 'base',
        public string  $size        = 'md',
        public ?string $name        = null,
        public ?string $placeholder = 'Add tag...',
        public array   $value       = [],
        public ?int    $max         = null,
        public bool    $disabled    = false,
        public string  $radius      = 'var(--zayne-radius-field)',
        public ?string $shadow      = null,
        public ?string $margin      = null,
        public string  $border      = 'var(--zayne-border-field)',
        public ?string $bordercolor = null,
        public string  $tagcolor    = 'primary',
        public string  $tagvariant  = 'soft',
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'outline' => [
                'base'    => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-base-border)'],
                'primary' => ['background' => 'var(--zayne-color-base-100)', 'color' => 'var(--zayne-color-base-content)', 'border-color' => 'var(--zayne-color-primary)'],
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
            'opacity'       => $this->disabled ? '0.5' : null,
            'cursor'        => $this->disabled ? 'not-allowed' : null,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::pillbox');
    }
}
