<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class HeaderBrand extends Component
{
    public function __construct(
        public string  $name = '',
        public string  $src  = '',
        public string  $alt  = '',
        public ?string $href = null,
    ) {}

    public function render(): View
    {
        return view('zayne::header-brand');
    }
}
