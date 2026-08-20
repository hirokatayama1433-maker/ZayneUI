<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class TabPanel extends Component
{
    public string $style;

    public function __construct(
        public string  $value,
        public ?string $width      = null,
        public ?string $height     = null,
        public ?string $maxheight  = null,
        public ?string $background = null,
        public ?string $radius     = null,
        public ?string $padding    = null,
        public ?string $margin     = null,
    ) {
        $this->style = Zayne::styleString([
            'width'         => $width,
            'height'        => $height,
            'max-height'    => $maxheight,
            'background'    => $background,
            'border-radius' => $radius,
            'padding'       => $padding,
            'margin'        => $margin,
        ]);
    }

    public function render(): View
    {
        return view('zayne::tab-panel');
    }
}