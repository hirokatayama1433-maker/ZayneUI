<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Sidebar extends ZayneComponent
{
    public string $side;     // left | right
    public string $width;
    public bool $collapsed;
    public string $classes;

    public function __construct(
        string $side = 'left',
        string $width = 'w-60',
        bool $collapsed = false,
    ) {
        $this->side      = $side;
        $this->width     = $width;
        $this->collapsed = $collapsed;

        $this->classes = $this->mergeClasses(
            'flex flex-col h-full shrink-0',
            $collapsed ? 'w-14' : $width,
            'bg-[var(--zayne-color-base-100)]',
            $side === 'right'
                ? 'border-l border-[var(--zayne-color-base-border)]'
                : 'border-r border-[var(--zayne-color-base-border)]',
            'transition-all duration-200',
        );
    }

    public function render()
    {
        return view('components.zayne.layout.sidebar');
    }
}