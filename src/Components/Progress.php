<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Progress extends Component
{
    public string $style    = '';
    public string $barStyle = '';

    public function __construct(
        public int    $value     = 0,
        public string $color     = 'primary',
        public bool   $showvalue = false,
        public string $format    = 'percent',
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $colors = [
            'primary'   => 'var(--zayne-color-primary)',
            'secondary' => 'var(--zayne-color-secondary)',
            'danger'    => 'var(--zayne-color-danger)',
            'success'   => 'var(--zayne-color-success)',
            'warning'   => 'var(--zayne-color-warning)',
            'info'      => 'var(--zayne-color-info)',
            'base'      => 'var(--zayne-color-base-content)',
        ];

        $barColor = $colors[$this->color] ?? $colors['primary'];
        $width    = max(0, min(100, $this->value));

        $this->style = Zayne::styleString([
            'width'         => '100%',
            'height'        => '8px',
            'border-radius' => '999px',
            'background'    => 'var(--zayne-color-base-300)',
            'overflow'      => 'hidden',
        ]);

        $this->barStyle = Zayne::styleString([
            'height'        => '100%',
            'width'         => $width . '%',
            'border-radius' => '999px',
            'background'    => $barColor,
            'transition'    => 'width 300ms ease',
        ]);
    }

    public function render(): View
    {
        return view('zayne::progress');
    }
}