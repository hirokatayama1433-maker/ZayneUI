<?php

namespace App\View\Components\Zayne\Board;

use App\View\Components\Zayne\ZayneComponent;

class Card extends ZayneComponent
{
    public string $classes;

    public function __construct()
    {
        $this->classes = $this->mergeClasses(
            'rounded-[var(--zayne-radius-field)]',
            'bg-[var(--zayne-color-base-100)]',
            'border border-[var(--zayne-color-base-border)]',
            'shadow-[var(--zayne-shadow)]',
            'p-3 flex flex-col gap-2',
            'hover:shadow-md transition-shadow duration-150 cursor-grab active:cursor-grabbing',
        );
    }

    public function render()
    {
        return view('components.zayne.board.card');
    }
}
