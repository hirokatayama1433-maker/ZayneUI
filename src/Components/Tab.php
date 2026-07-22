<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Tab extends Component
{
    public string $wrapperStyle;
    public string $listStyle;
    public string $panelsStyle;
    public string $accentColor;

    public function __construct(
        public string  $default      = '',
        public string  $orientation  = 'horizontal', // horizontal | vertical
        public string  $variant      = 'underline',   // underline | pill | soft | solid | segmented
        public ?string $color        = null,
        public ?string $radius       = null,           // active-pill radius override (segmented container etc.)
        public bool    $muted        = false,
        public bool    $fill         = false,            // wrapper takes 100% of its parent's height
        public bool    $scrollable   = false,             // panels box scrolls internally (needs height/maxheight)
        public bool    $sticky       = false,              // tab list sticks in place while panels scroll
        public string  $stickyoffset = '0px',                // top offset for sticky (e.g. below a fixed header)

        // ── panel box sizing (fixes the "can't constrain it" issue) ──
        public ?string $width        = null,
        public ?string $height       = null,
        public ?string $maxheight    = null,
        public ?string $maxwidth     = null,
        public ?string $background   = null,
        public ?string $panelradius  = null,
        public ?string $padding      = null,
        public ?string $margin       = null,
        public ?string $border       = null,
    ) {
        $this->accentColor = $color ?? 'var(--zayne-color-accent)';

        $this->wrapperStyle = Zayne::styleString([
            'display'            => 'flex',
            'flex-direction'     => $orientation === 'vertical' ? 'row' : 'column',
            'width'              => '100%',
            'height'             => $fill ? '100%' : null,
            '--zayne-tab-accent' => $this->accentColor,
        ]);

        $this->listStyle = Zayne::styleString([
            'border-radius' => $variant === 'segmented' ? ($radius ?? 'var(--zayne-radius-field)') : null,
            'position'      => $sticky ? 'sticky' : null,
            'top'           => $sticky ? $stickyoffset : null,
            'align-self'    => $sticky ? 'flex-start' : null,
        ]);

        $this->panelsStyle = Zayne::styleString([
            'width'         => $width,
            'height'        => $height,
            'max-height'    => $maxheight,
            'max-width'     => $maxwidth,
            'background'    => $background,
            'border-radius' => $panelradius,
            'padding'       => $padding,
            'margin'        => $margin,
            'border'        => $border,
            'overflow'      => $scrollable ? 'auto' : null,
            'min-height'    => '0',
            'min-width'     => '0',
        ]);
    }

    public function render(): View
    {
        return view('zayne::tab');
    }
}   