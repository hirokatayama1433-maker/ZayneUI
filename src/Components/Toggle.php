<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Toggle extends Component
{
    public string $trackStyle = '';
    public string $thumbStyle = '';

    public function __construct(
        public string $color    = 'primary',
        public bool   $checked  = false,
        public bool   $disabled = false,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $colors = [
            'primary' => 'var(--zayne-color-primary)',
            'success' => 'var(--zayne-color-success)',
            'danger'  => 'var(--zayne-color-danger)',
            'warning' => 'var(--zayne-color-warning)',
        ];

        $accent = $colors[$this->color] ?? $colors['primary'];

        $this->trackStyle = Zayne::styleString([
            'display'         => 'inline-flex',
            'align-items'     => 'center',
            'width'           => '44px',
            'height'          => '24px',
            'border-radius'   => '999px',
            'position'        => 'relative',
            'cursor'          => $this->disabled ? 'not-allowed' : 'pointer',
            'opacity'         => $this->disabled ? '0.5' : '1',
            'transition'      => 'background 200ms ease',
            'background'      => $this->checked ? $accent : 'var(--zayne-color-base-300)',
            'box-sizing'      => 'border-box',
        ]);

        $this->thumbStyle = Zayne::styleString([
            'position'        => 'absolute',
            'top'             => '3px',
            'left'            => $this->checked ? '23px' : '3px',
            'width'           => '18px',
            'height'          => '18px',
            'border-radius'   => '999px',
            'background'      => '#ffffff',
            'transition'      => 'left 180ms var(--ease-out-smooth)',
            'pointer-events'  => 'none',
        ]);
    }

    public function render(): View
    {
        return view('zayne::toggle');
    }
}