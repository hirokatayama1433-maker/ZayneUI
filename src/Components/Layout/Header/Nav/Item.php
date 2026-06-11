<?php

namespace Zayne\UI\Components\Layout\Header\Nav;
use Illuminate\View\Component;
use Illuminate\View\View;

class Item extends Component
{
    public function __construct(
        public ?string $href   = null,
        public bool    $active = false,
    ) {}

    public function render(): View
    {
        return view('zayne::layout.header.nav.item');
    }
}