<?php

namespace App\View\Components\Zayne\Form;

use App\View\Components\Zayne\ZayneComponent;

class Radio extends ZayneComponent
{
    public string $size;
    public string $color;
    public bool $disabled;
    public ?string $label;

    public string $inputClasses;
    public string $labelClasses;

    public function __construct(
        string $size = 'md',
        string $color = 'primary',
        bool $disabled = false,
        ?string $label = null,
    ) {
        $this->size     = $size;
        $this->color    = $color;
        $this->disabled = $disabled;
        $this->label    = $label;

        // mergeClasses() — $attributes (wire:model etc.) land on <input> directly
        $this->inputClasses = $this->mergeClasses(
            'rounded-full cursor-pointer',
            'border border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-100)]',
            'transition-colors duration-150',
            'focus:outline-none focus:ring-2 focus:ring-offset-1',
            $this->sizeClasses(),
            $this->accentClasses(),
            $disabled ? 'opacity-50 cursor-not-allowed' : '',
        );

        $this->labelClasses = implode(' ', array_filter([
            'text-sm text-[var(--zayne-color-base-content)] cursor-pointer select-none',
            $disabled ? 'opacity-50 cursor-not-allowed' : '',
        ]));
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'sm'    => 'w-3.5 h-3.5',
            'lg'    => 'w-5 h-5',
            default => 'w-4 h-4',
        };
    }

    protected function accentClasses(): string
    {
        return match ($this->color) {
            'secondary' => 'accent-[var(--zayne-color-secondary)] focus:ring-[var(--zayne-color-secondary)]',
            'accent'    => 'accent-[var(--zayne-color-accent)] focus:ring-[var(--zayne-color-accent)]',
            'danger'    => 'accent-[var(--zayne-color-danger)] focus:ring-[var(--zayne-color-danger)]',
            'success'   => 'accent-[var(--zayne-color-success)] focus:ring-[var(--zayne-color-success)]',
            'warning'   => 'accent-[var(--zayne-color-warning)] focus:ring-[var(--zayne-color-warning)]',
            'info'      => 'accent-[var(--zayne-color-info)] focus:ring-[var(--zayne-color-info)]',
            default     => 'accent-[var(--zayne-color-primary)] focus:ring-[var(--zayne-color-primary)]',
        };
    }

    public function render()
    {
        return view('components.zayne.form.radio');
    }
}