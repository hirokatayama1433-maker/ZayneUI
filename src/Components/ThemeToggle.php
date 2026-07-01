<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ThemeToggle extends Component
{
    public function render(): View
    {
        return view('zayne::theme-toggle');
    }
}
