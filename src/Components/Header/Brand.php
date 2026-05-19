<?php

namespace Zayne\UI\Components\Header;

use Illuminate\View\Component;
use Illuminate\View\View;

class Brand extends Component
{
    public function __construct(
        public string $name = 'Zayne UI',
        public ?string $href = null
    ) {
    }

    public function render(): View
    {
        return view('zayne::header.brand');
    }
}
