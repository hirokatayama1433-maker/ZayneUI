<?php

namespace Zayne\UI\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Sidebar extends Component
{
    public function __construct(
        public string $mode             = 'collapsible', // 'collapsible' | 'static'
        public string $collapse         = 'viewicons',   // 'viewicons' | 'full'
        public string $toggleLabel      = 'Collapse',
        public ?string $margin           = null,
        public ?string $marginleft       = null,
        public ?string $marginright      = null,
        public ?string $margintop        = null,
        public ?string $marginbottom     = null,
        public string $padding          = '6px',
        public ?string $radius           = null,
        public ?string $radiustop        = null,
        public ?string $radiusbottom     = null,
        public ?string $radiusleft       = null,
        public ?string $radiusright      = null,
        public ?string $border           = '0px',
        public ?string $bordertop        = null,
        public ?string $borderbottom     = null,
        public ?string $borderleft       = null,
        public ?string $borderright      = null,
        public ?string $gap              = null,
        public string $shadow           = 'var(--zayne-custom-layout-shadow)',
        public string $background       = 'var(--zayne-custom-sidebar)',
        public ?string $bordercolor      = 'var(--zayne-color-base-border)',
    ) {}

    public function render(): View
    {
        return view('zayne::layout.sidebar');
    }
}