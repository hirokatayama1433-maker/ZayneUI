<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Select extends ZayneComponent
{
    public string $size;
    public bool $error;
    public bool $disabled;

    public string $classes;

    public function __construct(
        string $size = 'md',
        bool $error = false,
        bool $disabled = false,
    ) {
        $this->size     = $size;
        $this->error    = $error;
        $this->disabled = $disabled;

        // mergeClasses() here — $attributes.class lands on <select> directly
        $this->classes = $this->mergeClasses(
            'w-full appearance-none cursor-pointer',
            'rounded-[var(--zayne-radius-field)]',
            'border border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-100)]',
            'text-[var(--zayne-color-base-content)]',
            'outline-none focus:ring-2 focus:border-transparent',
            $error
                ? 'border-[var(--zayne-color-danger)] focus:ring-[var(--zayne-color-danger)]'
                : 'focus:ring-[var(--zayne-color-primary)]',
            'transition-colors duration-150',
            // Custom chevron via SVG background
            'bg-[image:url("data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%2020%2020%27%20fill%3D%27none%27%3E%3Cpath%20d%3D%27M6%208l4%204%204-4%27%20stroke%3D%27%236B7280%27%20stroke-width%3D%271.5%27%20stroke-linecap%3D%27round%27%20stroke-linejoin%3D%27round%27%2F%3E%3C%2Fsvg%3E")]',
            'bg-[position:right_0.5rem_center] bg-[size:1.25rem] bg-no-repeat pr-8',
            $this->sizeClasses(),
            $disabled ? 'opacity-50 cursor-not-allowed bg-[var(--zayne-color-base-200)]' : '',
        );
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'sm'    => 'h-8 pl-3 text-sm',
            'lg'    => 'h-12 pl-4 text-base',
            default => 'h-10 pl-3 text-sm',
        };
    }

    public function render()
    {
        return view('components.zayne.select');
    }
}