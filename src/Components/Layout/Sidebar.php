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
        public ?string $shadow = null,
        public ?string $radius = null,
        public ?string $border = null,
        public ?string $bordertop = null,
        public ?string $borderbottom = null,
        public ?string $borderleft = null,
        public ?string $borderright = null,
        public ?string $bordercolor = null,
        public ?string $margin = null,
        public ?string $margintop = null,
        public ?string $marginbottom = null,
        public ?string $marginleft = null,
        public ?string $marginright = null
    ) {
    }

    public function render(): View
    {
        return view('zayne::layout.sidebar');
    }
}
