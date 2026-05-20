<?php

namespace Zayne\UI\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;


class Main extends Component
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
    public function render(): View
    {
        return view('zayne::layout.main');
    }
}
