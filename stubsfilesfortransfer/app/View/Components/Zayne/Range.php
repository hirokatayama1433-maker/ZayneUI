<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Range extends ZayneComponent
{
    public string $size;
    public string $color;
    public bool $disabled;

    public string $classes;

    public function __construct(
        string $size = 'md',
        string $color = 'primary',
        bool $disabled = false,
    ) {
        $this->size     = $size;
        $this->color    = $color;
        $this->disabled = $disabled;

        // mergeClasses() — $attributes land on <input type="range"> directly
        $this->classes = $this->mergeClasses(
            'w-full appearance-none cursor-pointer bg-transparent',
            // Track
            '[&::-webkit-slider-runnable-track]:rounded-full [&::-webkit-slider-runnable-track]:bg-[var(--zayne-color-base-200)]',
            '[&::-moz-range-track]:rounded-full [&::-moz-range-track]:bg-[var(--zayne-color-base-200)]',
            // Thumb base
            '[&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:rounded-full',
            '[&::-webkit-slider-thumb]:border-0 [&::-webkit-slider-thumb]:shadow-sm [&::-webkit-slider-thumb]:cursor-pointer',
            '[&::-moz-range-thumb]:rounded-full [&::-moz-range-thumb]:border-0 [&::-moz-range-thumb]:cursor-pointer',
            'focus:outline-none',
            $this->sizeClasses(),
            $this->colorClasses(),
            $disabled ? 'opacity-50 cursor-not-allowed [&::-webkit-slider-thumb]:cursor-not-allowed' : '',
        );
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'sm'    => '[&::-webkit-slider-runnable-track]:h-1 [&::-webkit-slider-thumb]:w-3 [&::-webkit-slider-thumb]:h-3 [&::-webkit-slider-thumb]:-mt-1 [&::-moz-range-track]:h-1 [&::-moz-range-thumb]:w-3 [&::-moz-range-thumb]:h-3',
            'lg'    => '[&::-webkit-slider-runnable-track]:h-2 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:-mt-1.5 [&::-moz-range-track]:h-2 [&::-moz-range-thumb]:w-5 [&::-moz-range-thumb]:h-5',
            default => '[&::-webkit-slider-runnable-track]:h-1.5 [&::-webkit-slider-thumb]:w-4 [&::-webkit-slider-thumb]:h-4 [&::-webkit-slider-thumb]:-mt-[5px] [&::-moz-range-track]:h-1.5 [&::-moz-range-thumb]:w-4 [&::-moz-range-thumb]:h-4',
        };
    }

    protected function colorClasses(): string
    {
        return match ($this->color) {
            'secondary' => '[&::-webkit-slider-thumb]:bg-[var(--zayne-color-secondary)] [&::-moz-range-thumb]:bg-[var(--zayne-color-secondary)]',
            'accent'    => '[&::-webkit-slider-thumb]:bg-[var(--zayne-color-accent)] [&::-moz-range-thumb]:bg-[var(--zayne-color-accent)]',
            'danger'    => '[&::-webkit-slider-thumb]:bg-[var(--zayne-color-danger)] [&::-moz-range-thumb]:bg-[var(--zayne-color-danger)]',
            'success'   => '[&::-webkit-slider-thumb]:bg-[var(--zayne-color-success)] [&::-moz-range-thumb]:bg-[var(--zayne-color-success)]',
            'warning'   => '[&::-webkit-slider-thumb]:bg-[var(--zayne-color-warning)] [&::-moz-range-thumb]:bg-[var(--zayne-color-warning)]',
            'info'      => '[&::-webkit-slider-thumb]:bg-[var(--zayne-color-info)] [&::-moz-range-thumb]:bg-[var(--zayne-color-info)]',
            default     => '[&::-webkit-slider-thumb]:bg-[var(--zayne-color-primary)] [&::-moz-range-thumb]:bg-[var(--zayne-color-primary)]',
        };
    }

    public function render()
    {
        return view('components.zayne.range');
    }
}