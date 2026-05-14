<?php

namespace App\View\Components\Zayne\Layout;

use App\View\Components\Zayne\ZayneComponent;

class Sidebar extends ZayneComponent
{
    public function __construct(
        // Props for desktop collapsing behavior, used by sidebar.js
        public string $mode             = 'collapsible', // 'collapsible' | 'static'
        public string $collapse         = 'viewicons',   // 'viewicons' | 'full'
        
        // General styling props - adjusted defaults to use 'unset' or tokens
        public string $padding          = 'var(--zayne-padding-sidebar, 1rem)', // Using a token, adjust if needed. '10px' was hardcoded.
        public string $margin           = 'unset',
        public string $marginleft       = 'unset',
        public string $marginright      = 'unset',
        public string $margintop        = 'unset',
        public string $marginbottom     = 'unset',
        public string $radius           = 'var(--zayne-radius-card, 0.5rem)', // Using a token, adjust if needed. 'null' was invalid.
        public string $border           = 'unset',
        public string $bordercolor      = 'unset',
        public string $bordertop        = 'unset',
        public string $borderbottom     = 'unset',
        public string $borderleft       = 'unset',
        public string $borderright      = 'unset',
        public string $shadow           = 'var(--zayne-custom-layout-shadow)',
        public string $background       = 'var(--zayne-custom-sidebar)',
    ) {}

    public function render()
    {
        // This view will use the props for inline styles and data attributes for JS.
        // Mobile behavior is handled by the parent layout's Alpine.js and zayne-layout.css.
        return view('components.zayne.layout.sidebar');
    }
}
