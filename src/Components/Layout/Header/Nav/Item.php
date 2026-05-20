<?php

namespace App\View\Components\Zayne\Layout\Header\Nav;

use App\View\Components\Zayne\ZayneComponent;

class Item extends ZayneComponent
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

    public function render()
    {
        return view('components.zayne.layout.header.nav.item');
    }
}