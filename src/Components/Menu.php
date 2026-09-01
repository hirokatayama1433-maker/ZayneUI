<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Menu extends Component
{
    public function __construct(
        public ?string $label   = null,
        public string  $padding = '0.375rem',
        public string  $gap     = '2px',
    ) {}

    public function render(): View
    {
        return view('zayne::menu');
    }
}