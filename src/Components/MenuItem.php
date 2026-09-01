<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MenuItem extends Component
{
    public string $fg;
    public string $hoverBg;
    public string $hoverFg;

    /**
     * Supported colors: base | primary | danger | success | warning
     */
    public function __construct(
        public ?string $name    = null,
        public ?string $icon    = null,
        public ?string $href    = null,
        public string  $color   = 'base',
        public bool    $active  = false,
        public bool    $disabled = false,
    ) {
        $colorMap = [
            'base'    => 'var(--zayne-color-base-content)',
            'primary' => 'var(--zayne-color-primary)',
            'danger'  => 'var(--zayne-color-danger)',
            'success' => 'var(--zayne-color-success)',
            'warning' => 'var(--zayne-color-warning)',
        ];

        $hoverBgMap = [
            'base'    => 'var(--zayne-color-base-200)',
            'primary' => 'color-mix(in oklch, var(--zayne-color-primary) 12%, transparent)',
            'danger'  => 'color-mix(in oklch, var(--zayne-color-danger) 10%, transparent)',
            'success' => 'color-mix(in oklch, var(--zayne-color-success) 10%, transparent)',
            'warning' => 'color-mix(in oklch, var(--zayne-color-warning) 10%, transparent)',
        ];

        $this->fg      = $colorMap[$color]   ?? $colorMap['base'];
        $this->hoverBg = $hoverBgMap[$color] ?? $hoverBgMap['base'];
        $this->hoverFg = $this->fg;
    }

    public function render(): View
    {
        return view('zayne::menu-item');
    }
}