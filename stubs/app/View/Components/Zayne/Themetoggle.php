<?php

namespace App\View\Components\Zayne;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Themetoggle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.zayne.themetoggle');
    }
}
