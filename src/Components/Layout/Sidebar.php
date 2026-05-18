<?php

namespace Zayne\UI\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Sidebar extends Component
{
    public function __construct(
        public string $background = 'var(--zayne-custom-sidebar)',
        public string $padding = '1rem',
        public string $gap = '0.75rem',
        public string $shadow = 'unset',
        public string $radius = 'unset',
        public string $border = 'unset',
        public string $bordertop = 'unset',
        public string $borderbottom = 'unset',
        public string $borderleft = 'unset',
        public string $borderright = 'unset',
        public string $bordercolor = 'unset',
        public string $margin = 'unset',
        public string $margintop = 'unset',
        public string $marginbottom = 'unset',
        public string $marginleft = 'unset',
        public string $marginright = 'unset'
    ) {
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar');
    }
}
