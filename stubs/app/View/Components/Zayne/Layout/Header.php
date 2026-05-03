<?php

namespace App\View\Components\Zayne\Layout;

use App\View\Components\Zayne\ZayneComponent;

class Header extends ZayneComponent
{
    public bool $sticky;
    public string $classes;

    public function __construct(
        bool $sticky = false,
    ) {
        $this->sticky = $sticky;

        $this->classes = $this->mergeClasses(
            'w-full z-30',
            'flex items-center justify-between',
            'px-4 h-14',
            'bg-[var(--zayne-color-base-100)]',
            'border-b border-[var(--zayne-color-base-border)]',
            $sticky ? 'sticky top-0' : '',
        );
    }

    public function render()
    {
        return view('components.zayne.layout.header');
    }
}