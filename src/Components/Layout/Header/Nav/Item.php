<?php

namespace Zayne\UI\Components\Layout\Header\Nav;
use Illuminate\View\Component;
use Illuminate\View\View;

class Item extends Component
{
    public string $classes;

    public function __construct(
        public ?string $href   = null,
        public bool    $active = false,
    ) {
        $this->classes = 'relative h-full flex items-center gap-2 px-3 h-[38px] text-sm cursor-pointer transition-colors duration-150 '
            . ($active
                ? 'text-(--zayne-color-primary-content) font-medium'
                : 'text-(--zayne-color-primary-content)/40 hover:text-(--zayne-color-primary-content)/60'
            );
    }

    public function render(): View
    {
        return view('zayne::layout.header.nav.item');
    }
}