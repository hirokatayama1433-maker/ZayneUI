<?php

namespace App\View\Components\Zayne\Timeline;

use App\View\Components\Zayne\ZayneComponent;

class Item extends ZayneComponent
{
    public string $color;   // primary | success | danger | warning | info | base
    public bool $last;
    public string $dotClasses;
    public string $lineClasses;

    public function __construct(
        string $color = 'primary',
        bool $last = false,
    ) {
        $this->color = $color;
        $this->last  = $last;

        $dotColor = match ($color) {
            'success' => 'bg-[var(--zayne-color-success)]',
            'danger'  => 'bg-[var(--zayne-color-danger)]',
            'warning' => 'bg-[var(--zayne-color-warning)]',
            'info'    => 'bg-[var(--zayne-color-info)]',
            'base'    => 'bg-[var(--zayne-color-base-content-muted)]',
            default   => 'bg-[var(--zayne-color-primary)]',
        };

        $this->dotClasses = $this->mergeClasses(
            'relative z-10 flex items-center justify-center',
            'w-8 h-8 rounded-full shrink-0',
            'bg-[color-mix(in_oklch,' . $this->dotColorVar($color) . '_15%,transparent)]',
            'border-2',
            $this->dotBorderClass($color),
        );

        $this->lineClasses = $last
            ? ''
            : 'absolute left-4 top-8 bottom-0 w-px bg-[var(--zayne-color-base-border)] -translate-x-1/2';
    }

    protected function dotColorVar(string $color): string
    {
        return match ($color) {
            'success' => 'var(--zayne-color-success)',
            'danger'  => 'var(--zayne-color-danger)',
            'warning' => 'var(--zayne-color-warning)',
            'info'    => 'var(--zayne-color-info)',
            'base'    => 'var(--zayne-color-base-300)',
            default   => 'var(--zayne-color-primary)',
        };
    }

    protected function dotBorderClass(string $color): string
    {
        return match ($color) {
            'success' => 'border-[var(--zayne-color-success)]',
            'danger'  => 'border-[var(--zayne-color-danger)]',
            'warning' => 'border-[var(--zayne-color-warning)]',
            'info'    => 'border-[var(--zayne-color-info)]',
            'base'    => 'border-[var(--zayne-color-base-border)]',
            default   => 'border-[var(--zayne-color-primary)]',
        };
    }

    public function render()
    {
        return view('components.zayne.timeline.item');
    }
}
