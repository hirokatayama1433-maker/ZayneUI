<?php

namespace Zayne\UI\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public function __construct(
        public string $padding      = '0px 1rem',
        public string $radius       = '0px',
        public string $gap          = '0px',
        public string $border       = 'null',
        public string $bordertop    = 'null',
        public string $borderbottom = 'null',
        public string $borderleft   = 'null',
        public string $borderright  = 'null',
        public string $bordercolor  = 'null',
        public string $margin       = 'null',
        public string $margintop    = 'null',
        public string $marginbottom = 'null',
        public string $marginleft   = 'null',
        public string $marginright  = 'null',
        public string $shadow       = 'var(--zayne-custom-layout-shadow)',
        public string $background   = 'var(--zayne-custom-header)',
        
    ) {}

    public function render(): View
    {
        return view('zayne::layout.header');
    }
}