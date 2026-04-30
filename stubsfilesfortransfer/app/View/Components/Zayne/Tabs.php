<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Tabs extends ZayneComponent
{
    public string $variant;  // underline | pills | boxed
    public string $size;     // sm | md | lg
    public string $classes;
    public string $listClasses;
    public string $tabClasses;
    public string $activeTabClasses;

    public function __construct(
        string $variant = 'underline',
        string $size    = 'md',
    ) {
        $this->variant = $variant;
        $this->size    = $size;

        $sizePadding = match ($size) {
            'sm'    => 'px-3 py-1.5 text-xs',
            'lg'    => 'px-5 py-3 text-base',
            default => 'px-4 py-2.5 text-sm',
        };

        $this->classes = $this->mergeClasses('w-full');

        $this->listClasses = match ($variant) {
            'pills' => 'inline-flex gap-1 p-1 rounded-[var(--zayne-radius-field)] bg-[var(--zayne-color-base-200)]',
            'boxed' => 'flex border-b border-[var(--zayne-color-base-border)]',
            default => 'flex border-b border-[var(--zayne-color-base-border)]',
        };

        $this->tabClasses = match ($variant) {
            'pills' => "inline-flex items-center gap-2 {$sizePadding} font-medium rounded-[var(--zayne-radius-field)] text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-base-content)] transition-colors cursor-pointer whitespace-nowrap",
            default => "inline-flex items-center gap-2 {$sizePadding} font-medium border-b-2 border-transparent text-[var(--zayne-color-base-content-muted)] hover:text-[var(--zayne-color-base-content)] -mb-px transition-colors cursor-pointer whitespace-nowrap",
        };

        $this->activeTabClasses = match ($variant) {
            'pills' => 'bg-[var(--zayne-color-base-100)] text-[var(--zayne-color-base-content)] shadow-sm',
            default => 'border-[var(--zayne-color-primary)] text-[var(--zayne-color-primary)]',
        };
    }

    public function render()
    {
        return view('components.zayne.tabs');
    }
}
