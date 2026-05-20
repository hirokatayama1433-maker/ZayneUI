<?php

namespace App\View\Components\Zayne\Layout\Header;

use App\View\Components\Zayne\ZayneComponent;

class Avatar extends ZayneComponent
{
    public string $classes;

    public function __construct(
        public string  $name  = '',
        public string  $src   = '',
        public string  $alt   = '',
        public ?string $href  = null,
        public bool    $caret = true,
    ) {
        $this->classes = 'flex items-center gap-2 h-[38px] rounded-(--zayne-radius-field) cursor-pointer transition-colors duration-150 '
            . 'text-(--zayne-color-base-content)';
    }

    public function render()
    {
        return view('components.zayne.layout.header.avatar');
    }
}