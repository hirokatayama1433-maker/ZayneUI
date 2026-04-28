<?php

namespace App\View\Components\Zayne;

use Closure;
use Illuminate\Contracts\View\View;
use App\View\Components\Zayne\ZayneComponent;

class Group extends ZayneComponent
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
        return view('components.zayne.group');
    }
}
