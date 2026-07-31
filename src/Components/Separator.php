<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Separator extends Component
{
    public string $style = '';
    public string $lineStyle = '';
    public string $labelStyle = '';

    public function __construct(
        public string  $orientation = 'horizontal', // horizontal | vertical
        public ?string $label       = null,
        public string  $align       = 'center',     // start | center | end
        public string  $color       = 'var(--zayne-color-base-border)',
        public string  $thickness   = '1px',
        public ?string $margin      = null,
        public string  $spacing     = '1rem',       // gap between label and lines
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $isVertical = $this->orientation === 'vertical';

        $this->style = Zayne::styleString([
            'display'         => 'flex',
            'align-items'     => 'center',
            'flex-direction'  => $isVertical ? 'column' : 'row',
            'gap'             => $this->label ? $this->spacing : null,
            'margin'          => $this->margin,
            'width'           => $isVertical ? null : '100%',
            'height'          => $isVertical ? '100%' : null,
            'min-height'      => $isVertical ? '1rem' : null,
        ]);

        $this->lineStyle = Zayne::styleString([
            'flex'            => '1',
            'border'          => 'none',
            'background'      => $this->color,
            'height'          => $isVertical ? null : $this->thickness,
            'width'           => $isVertical ? $this->thickness : null,
            'min-height'      => $isVertical ? '1rem' : null,
            'min-width'       => $isVertical ? null : '1rem',
        ]);

        $this->labelStyle = Zayne::styleString([
            'font-size'       => '0.75rem',
            'font-weight'     => '500',
            'color'           => 'var(--zayne-color-base-content)',
            'opacity'         => '0.5',
            'white-space'     => 'nowrap',
            'flex-shrink'     => '0',
        ]);
    }

    public function render(): View
    {
        return view('zayne::separator');
    }
}
