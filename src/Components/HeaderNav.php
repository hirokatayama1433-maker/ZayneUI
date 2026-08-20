<?php

namespace Zayne\UI\Components;
use Illuminate\View\Component;
use Illuminate\View\View;


class HeaderNav extends Component
{
    public function __construct() {}

    public function render(): View
    {
        return view('zayne::header-nav');
    }
}
