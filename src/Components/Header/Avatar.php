<?php

namespace Zayne\UI\Components\Header;

use Illuminate\View\Component;
use Illuminate\View\View;

class Avatar extends Component
{
    public function __construct(
        public ?string $src = null,
        public string $alt = 'Avatar',
        public ?string $label = null
    ) {
    }

    public function render(): View
    {
        return view('zayne::header.avatar');
    }
}
