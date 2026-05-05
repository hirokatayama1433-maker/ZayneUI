<?php

namespace App\View\Components\Zayne\Layout;

use App\View\Components\Zayne\ZayneComponent;

class Sidebar extends ZayneComponent
{
    public function __construct(
        public string $mode     = 'collapsible', // 'collapsible' | 'static'
        public string $collapse = 'viewicons',   // 'viewicons' | 'full'
        public string $margin   = 'null',
        public string $marginleft  = 'null',
        public string $marginright = 'null',
        public string $margintop   = 'null',
        public string $marginbottom = 'null',
        public string $padding  = '10px',
        public string $radius   = '0px',
        public string $border       = 'null',
        public string $bordercolor       = 'null',
        public string $bordertop    = 'null',
        public string $borderbottom = 'null',
        public string $borderleft   = 'null',
        public string $borderright  = 'null',
        public string $shadow  =      'null',
        
    ) {}

    public function render()
    {
        return view('components.zayne.layout.sidebar');
    }
}