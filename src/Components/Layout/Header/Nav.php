<?php

namespace Zayne\UI\Components\Layout\Header;
use Illuminate\View\Component;
use Illuminate\View\View;


class Nav extends Component
{
    public function __construct() {}

    public function render(): View
    {
        return view('zayne::layout.header.nav');
    }
}