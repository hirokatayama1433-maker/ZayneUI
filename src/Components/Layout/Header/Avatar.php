<?php

namespace Zayne\UI\Components\Layout\Header;
use Illuminate\View\Component;
use Illuminate\View\View;

class Avatar extends Component
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

    public function render(): View
    {
        return view('zayne::layout.header.avatar');
    }
}