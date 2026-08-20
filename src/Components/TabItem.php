<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class TabItem extends Component
{
    public function __construct(
        public string $value,
        public bool   $disabled = false,
    ) {}

    public function render(): View
    {
        return view('zayne::tab-item');
    }
}