<?php

namespace App\View\Components\Zayne\Layout;
use App\View\Components\Zayne\ZayneComponent;


class Main extends ZayneComponent
{
    public function __construct(
        public string $margin           = 'null',
        public string $marginleft       = 'null',
        public string $marginright      = 'null',
        public string $margintop        = 'null',
        public string $marginbottom     = 'null',
        public string $padding          = '50px',
        public string $background       = 'null',
    )
    {}   
    public function render()
    {
        return view('components.zayne.layout.main');
    }
}
