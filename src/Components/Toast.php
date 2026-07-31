<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Toast extends Component
{
    public function __construct(
        public string $position = 'bottom-right', // top-left | top-center | top-right | bottom-left | bottom-center | bottom-right
        public int    $duration = 4000,            // ms, 0 = persistent
        public int    $limit    = 5,               // max toasts visible
    ) {}

    public function render(): View
    {
        return view('zayne::toast');
    }
}
