<?php

namespace View\Components\Zayne\Data;

use App\View\Components\Zayne\ZayneComponent;

class Datalist extends ZayneComponent
{
    public string $divided;     // always | hover | never
    public bool $hoverable;
    public bool $flush;         // flush = no border / rounded (for use inside card)
    public string $classes;

    public function __construct(
        bool $hoverable = true,
        bool $flush = false,
        string $divided = 'always',
    ) {
        $this->hoverable = $hoverable;
        $this->flush     = $flush;
        $this->divided   = $divided;

        $this->classes = $this->mergeClasses(
            'w-full',
            $flush
                ? ''
                : 'rounded-[var(--zayne-radius-box)] border border-[var(--zayne-color-base-border)] bg-[var(--zayne-color-base-100)] overflow-hidden',
        );
    }

    public function render()
    {
        return view('zayne.data.datalist');
    }
}
