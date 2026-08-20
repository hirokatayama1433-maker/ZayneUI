<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Main extends Component
{
    public function __construct(
        public ?string $margin        = null,
        public ?string $marginleft    = null,
        public ?string $marginright   = null,
        public ?string $margintop     = null,
        public ?string $marginbottom  = null,
        public string  $padding       = '10px',
        // public ?string $background    = 'var(--zayne-color-base-300)',
        public ?string $width         = '100%',
        public ?string $mobileWidth   = '100%',
    ) {}

    public function render(): View
    {
        return view('zayne::main');
    }
}
