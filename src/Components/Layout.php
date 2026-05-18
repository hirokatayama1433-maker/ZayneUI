<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Layout extends Component
{
    public function __construct()
    {
    }

    public function render(): View
    {
        return view('zayne::layout');
    }
}
