<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class ColorPicker extends Component
{
    public string $style       = '';
    public string $swatchStyle = '';

    public function __construct(
        public ?string $name      = null,
        public string  $value     = '#6366f1',
        public array   $swatches  = [],         // custom swatch palette, empty = built-in palette
        public bool    $showhex   = true,       // show hex input
        public bool    $showswatch = true,      // show swatch grid
        public bool    $shownative = false,     // also show native <input type="color">
        public bool    $disabled  = false,
        public string  $radius    = 'var(--zayne-radius-field)',
        public ?string $margin    = null,
    ) {
        $this->buildStyle();
    }

    public function resolvedSwatches(): array
    {
        if (!empty($this->swatches)) {
            return $this->swatches;
        }

        // Default 24-color palette — HSL-sampled across hue wheel, two lightness steps
        return [
            '#ef4444','#f97316','#eab308','#22c55e','#06b6d4','#3b82f6',
            '#8b5cf6','#ec4899','#f43f5e','#84cc16','#10b981','#14b8a6',
            '#6366f1','#a855f7','#d946ef','#fb923c','#facc15','#4ade80',
            '#ffffff','#e5e7eb','#9ca3af','#6b7280','#374151','#000000',
        ];
    }

    protected function buildStyle(): void
    {
        $this->style = Zayne::styleString([
            'display'         => 'flex',
            'flex-direction'  => 'column',
            'gap'             => '0.75rem',
            'margin'          => $this->margin,
            'opacity'         => $this->disabled ? '0.5' : null,
            'pointer-events'  => $this->disabled ? 'none' : null,
        ]);

        $this->swatchStyle = Zayne::styleString([
            'display'               => 'grid',
            'grid-template-columns' => 'repeat(8, 1fr)',
            'gap'                   => '0.375rem',
        ]);
    }

    public function render(): View
    {
        return view('zayne::color-picker');
    }
}
