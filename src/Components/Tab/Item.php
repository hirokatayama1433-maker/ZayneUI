<?php

namespace Zayne\UI\Components\Tab;

use Illuminate\View\Component;
use Illuminate\View\View;

class Item extends Component
{
    public function __construct(
        public string $value,
        public bool   $disabled = false,
    ) {}

    public function render(): View
    {
        return view('zayne::tab.item');
    }
}