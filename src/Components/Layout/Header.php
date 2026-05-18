<?php

namespace Zayne\UI\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public function __construct(
        public string $background = 'var(--zayne-custom-header)',
        public string $shadow = 'var(--zayne-shadow)',
        public string $padding = 'var(--zayne-padding-header)',
        public string $gap = 'var(--zayne-gap-header)',
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
        return view('zayne::layout.header');
    }
}
