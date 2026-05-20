<?php

namespace App\View\Components\Zayne\Layout\Header;

use App\View\Components\Zayne\ZayneComponent;

class Nav extends ZayneComponent
{
    public function __construct() {}

    public function render()
    {
        return view('components.zayne.layout.header.nav');
    }
}