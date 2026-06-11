<?php

namespace Zayne\UI\Components\Layout\Header;
use Illuminate\View\Component;
use Illuminate\View\View;

class Avatar extends Component
{
    public function __construct(
        public string  $name  = '',
        public string  $src   = '',
        public string  $alt   = '',
        public ?string $href  = null,
        public bool    $caret = true,
    ) {}

    public function render(): View
    {
        return view('zayne::layout.header.avatar');
    }
}