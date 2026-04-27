<?php

namespace App\View\Components\Zayne\Display;

use App\View\Components\Zayne\ZayneComponent;

class Progress extends ZayneComponent
{
    public int $value;       // 0–100
    public string $size;
    public string $color;
    public bool $striped;
    public bool $animated;
    public ?string $label;

    public string $trackClasses;
    public string $barClasses;
    public string $barColor;

    public function __construct(
        int $value = 0,
        string $size = 'md',
        string $color = 'primary',
        bool $striped = false,
        bool $animated = false,
        ?string $label = null,
    ) {
        $this->value    = min(max($value, 0), 100);
        $this->size     = $size;
        $this->color    = $color;
        $this->striped  = $striped;
        $this->animated = $animated;
        $this->label    = $label;

        $this->trackClasses = $this->mergeClasses(
            'w-full overflow-hidden rounded-full bg-[var(--zayne-color-base-200)]',
            $this->sizeClasses(),
        );

        $this->barClasses = collect([
            'h-full rounded-full transition-all duration-500 ease-out',
            $this->barColorClass(),
            $striped  ? 'bg-[repeating-linear-gradient(45deg,rgba(255,255,255,0.15)_0,rgba(255,255,255,0.15)_10px,transparent_10px,transparent_20px)]' : '',
            $animated ? 'animate-pulse' : '',
        ])->filter()->implode(' ');

        $this->barColor = $this->barColorClass();
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'xs' => 'h-1',
            'sm' => 'h-2',
            'md' => 'h-3',
            'lg' => 'h-4',
            'xl' => 'h-6',
            default => 'h-3',
        };
    }

    protected function barColorClass(): string
    {
        return match ($this->color) {
            'primary'   => 'bg-[var(--zayne-color-primary)]',
            'secondary' => 'bg-[var(--zayne-color-secondary)]',
            'accent'    => 'bg-[var(--zayne-color-accent)]',
            'danger'    => 'bg-[var(--zayne-color-danger)]',
            'success'   => 'bg-[var(--zayne-color-success)]',
            'warning'   => 'bg-[var(--zayne-color-warning)]',
            'info'      => 'bg-[var(--zayne-color-info)]',
            default     => 'bg-[var(--zayne-color-primary)]',
        };
    }

    public function render()
    {
        return view('components.zayne.display.progress');
    }
}