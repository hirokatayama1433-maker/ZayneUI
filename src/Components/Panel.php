<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Panel extends Component
{
    public string $style = '';
    public string $primaryStyle = '';
    public string $secondaryStyle = '';

    public function __construct(
        // Layout / division
        public string  $division    = 'none',        // none | fixed | resizable | toggleable
        public string  $direction   = 'horizontal',  // horizontal | vertical
        public string  $split       = '1fr 1fr',     // CSS grid-template value for the two panes

        // Visual
        public string  $background  = 'var(--zayne-color-base-100)',
        public string  $radius      = 'var(--zayne-radius-box)',
        public string  $border      = '1px solid var(--zayne-color-base-border)',
        public ?string $shadow      = null,
        public string  $padding     = '0',
        public ?string $width       = null,
        public ?string $height      = null,
        public ?string $margin      = null,

        // Divider
        public string  $dividercolor = 'var(--zayne-color-base-border)',
        public string  $dividersize  = '1px',

        // Toggleable
        public bool    $showsecondary = true,
        public ?string $togglelabel   = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $isHorizontal = $this->direction === 'horizontal';

        $this->style = Zayne::styleString([
            'background'    => $this->background,
            'border-radius' => $this->radius,
            'border'        => $this->border,
            'box-shadow'    => $this->shadow,
            'padding'       => $this->padding,
            'width'         => $this->width,
            'height'        => $this->height,
            'margin'        => $this->margin,
            'display'       => 'flex',
            'flex-direction' => $isHorizontal ? 'row' : 'column',
            'overflow'      => 'hidden',
            'position'      => 'relative',
        ]);

        $this->primaryStyle = Zayne::styleString([
            'flex'     => '1 1 0%',
            'overflow' => 'auto',
            'min-width'  => $isHorizontal ? '0' : null,
            'min-height' => $isHorizontal ? null : '0',
        ]);

        $this->secondaryStyle = Zayne::styleString([
            'flex'     => '1 1 0%',
            'overflow' => 'auto',
            'min-width'  => $isHorizontal ? '0' : null,
            'min-height' => $isHorizontal ? null : '0',
        ]);
    }

    public function render(): View
    {
        return view('zayne::panel');
    }
}