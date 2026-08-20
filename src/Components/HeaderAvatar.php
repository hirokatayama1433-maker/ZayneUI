<?php

namespace Zayne\UI\Components;
use Illuminate\View\Component;
use Illuminate\View\View;

class HeaderAvatar extends Component
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
        return view('zayne::header-avatar');
    }
}
