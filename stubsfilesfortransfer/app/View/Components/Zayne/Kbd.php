<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Kbd extends ZayneComponent
{
    public string $size;
    public string $classes;

    public function __construct(
        string $size = 'md',
    ) {
        $this->size = $size;

        $this->classes = $this->mergeClasses(
            'inline-flex items-center justify-center',
            'font-mono font-medium',
            'rounded-[var(--zayne-radius-field)]',
            'border border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-200)]',
            'text-[var(--zayne-color-base-content)]',
            'shadow-[0_2px_0_var(--zayne-color-base-border)]', // keycap shadow
            $this->sizeClasses(),
        );
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'xs'  => 'px-1 py-0.5 text-[10px] min-w-[18px]',
            'sm'  => 'px-1.5 py-0.5 text-xs min-w-[22px]',
            'md'  => 'px-2 py-1 text-xs min-w-[28px]',
            'lg'  => 'px-2.5 py-1 text-sm min-w-[34px]',
            default => 'px-2 py-1 text-xs min-w-[28px]',
        };
    }

    public function render()
    {
        return view('components.zayne.kbd');
    }
}