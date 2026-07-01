<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Democode extends Component
{
    public function render(): View
    {
        return view('zayne::democode');
    }
}
