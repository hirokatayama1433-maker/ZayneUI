<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Badge extends ZayneComponent
{
    use HasColorVariants;

    public string $variant;
    public string $color;
    public string $size;
    public bool $pill;
    public bool $dot;

    public string $classes;

    public function __construct(
        string $variant = 'soft',
        ?string $color = null,
        string $size = 'md',
        bool $pill = false,
        bool $dot = false,
    ) {
        $this->variant = $variant;
        $this->color   = $color ?? 'base';
        $this->size    = $size;
        $this->pill    = $pill;
        $this->dot     = $dot;

        $this->classes = $this->mergeClasses(
            $this->baseClasses(),
            $this->sizeClasses(),
            $this->resolveVariant(),
        );
    }

    protected function baseClasses(): string
    {
        $radius = $this->pill
            ? 'rounded-full'
            : 'rounded-[var(--zayne-radius-field)]';

        return "inline-flex items-center gap-1.5 font-medium {$radius}";
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'xs' => 'px-1.5 py-0.5 text-[10px] text-center',
            'sm' => 'px-2 py-0.5 text-xs',
            'md' => 'px-2.5 py-1 text-xs',
            'lg' => 'px-3 py-1 text-sm',
            default => 'px-2.5 py-1 text-xs',
        };
    }

    protected function dotColorClass(): string
    {
        // Reuse the color token to tint the dot
        return match ($this->color) {
            'primary'   => 'bg-[var(--zayne-color-primary)]',
            'secondary' => 'bg-[var(--zayne-color-secondary)]',
            'accent'    => 'bg-[var(--zayne-color-accent)]',
            'danger'    => 'bg-[var(--zayne-color-danger)]',
            'success'   => 'bg-[var(--zayne-color-success)]',
            'warning'   => 'bg-[var(--zayne-color-warning)]',
            'info'      => 'bg-[var(--zayne-color-info)]',
            default     => 'bg-[var(--zayne-color-base-content)]',
        };
    }

    public function render()
    {
        return view('components.zayne.display.badge', [
            'dotColorClass' => $this->dotColorClass(),
        ]);
    }
}