<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class ListItem extends ZayneComponent
{
    public bool $hoverable;
    public bool $divided;
    public bool $active;
    public string $classes;

    public function __construct(
        bool $hoverable = true,
        bool $divided = true,
        bool $active = false,
    ) {
        $this->hoverable = $hoverable;
        $this->divided   = $divided;
        $this->active    = $active;

        $this->classes = $this->mergeClasses(
            'flex items-center gap-3 px-4 py-3 w-full',
            $divided  ? 'border-t border-[var(--zayne-color-base-border)] first:border-t-0' : '',
            $hoverable ? 'hover:bg-[var(--zayne-color-base-hover)] transition-colors duration-100' : '',
            $active    ? 'bg-[var(--zayne-color-base-hover)]' : '',
        );
    }

    public function render()
    {
        return view('components.zayne.listitem');
    }
}
