<?php

namespace App\View\Components\Zayne\Data;

use App\View\Components\Zayne\ZayneComponent;

class Table extends ZayneComponent
{
    public bool $selectable;   // show checkbox column
    public bool $striped;
    public bool $hoverable;
    public bool $loading;
    public string $classes;
    public string $wrapperClasses;
    public string $rowClasses;

    public function __construct(
        bool $selectable = false,
        bool $striped = false,
        bool $hoverable = true,
        bool $loading = false,
    ) {
        $this->selectable = $selectable;
        $this->striped    = $striped;
        $this->hoverable  = $hoverable;
        $this->loading    = $loading;

        $this->wrapperClasses = $this->mergeClasses(
            'w-full overflow-x-auto',
            'rounded-[var(--zayne-radius-box)]',
            'border border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-100)]',
        );

        $this->classes = 'w-full text-sm text-left border-collapse';

        $this->rowClasses = implode(' ', array_filter([
            'border-t border-[var(--zayne-color-base-border)]',
            $hoverable ? 'hover:bg-[var(--zayne-color-base-hover)] transition-colors duration-100' : '',
        ]));
    }

    public function render()
    {
        return view('components.zayne.data.table');
    }
}