<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Toggle extends ZayneComponent
{
    public string $size;
    public string $color;
    public bool $disabled;
    public ?string $label;
    public string $labelPosition; // left | right

    public string $trackClasses;
    public string $thumbClasses;
    public string $labelClasses;
    public string $thumbTranslate;

    public function __construct(
        string $size = 'md',
        string $color = 'primary',
        bool $disabled = false,
        ?string $label = null,
        string $labelPosition = 'right',
    ) {
        $this->size          = $size;
        $this->color         = $color;
        $this->disabled      = $disabled;
        $this->label         = $label;
        $this->labelPosition = $labelPosition;

        // mergeClasses() on trackClasses — $attributes land on the hidden <input> inside blade
        $this->trackClasses = $this->mergeClasses(
            'relative inline-flex shrink-0 items-center',
            'rounded-full border-2 border-transparent',
            'cursor-pointer transition-colors duration-200 ease-in-out',
            'focus-within:ring-2 focus-within:ring-offset-2',
            $this->trackSizeClasses(),
            $this->trackColorClasses(),
            $disabled ? 'opacity-50 cursor-not-allowed' : '',
        );

        $this->thumbClasses = implode(' ', [
            'pointer-events-none inline-block rounded-full bg-white shadow-sm',
            'transform transition-transform duration-200 ease-in-out',
            $this->thumbSizeClasses(),
        ]);

        $this->thumbTranslate = $this->resolveThumbTranslate();

        $this->labelClasses = implode(' ', array_filter([
            'text-sm text-[var(--zayne-color-base-content)] select-none',
            $disabled ? 'opacity-50' : '',
        ]));
    }

    protected function trackSizeClasses(): string
    {
        return match ($this->size) {
            'sm'    => 'w-8 h-4',
            'lg'    => 'w-12 h-6',
            default => 'w-10 h-5',
        };
    }

    protected function thumbSizeClasses(): string
    {
        return match ($this->size) {
            'sm'    => 'w-3 h-3',
            'lg'    => 'w-4 h-4',
            default => 'w-3.5 h-3.5',
        };
    }

    protected function resolveThumbTranslate(): string
    {
        return match ($this->size) {
            'sm'    => 'peer-checked:translate-x-4',
            'lg'    => 'peer-checked:translate-x-6',
            default => 'peer-checked:translate-x-5',
        };
    }

    protected function trackColorClasses(): string
    {
        $focusRing = match ($this->color) {
            'secondary' => 'focus-within:ring-[var(--zayne-color-secondary)]',
            'accent'    => 'focus-within:ring-[var(--zayne-color-accent)]',
            'danger'    => 'focus-within:ring-[var(--zayne-color-danger)]',
            'success'   => 'focus-within:ring-[var(--zayne-color-success)]',
            'warning'   => 'focus-within:ring-[var(--zayne-color-warning)]',
            'info'      => 'focus-within:ring-[var(--zayne-color-info)]',
            default     => 'focus-within:ring-[var(--zayne-color-primary)]',
        };

        $checkedBg = match ($this->color) {
            'secondary' => '[&:has(input:checked)]:bg-[var(--zayne-color-secondary)]',
            'accent'    => '[&:has(input:checked)]:bg-[var(--zayne-color-accent)]',
            'danger'    => '[&:has(input:checked)]:bg-[var(--zayne-color-danger)]',
            'success'   => '[&:has(input:checked)]:bg-[var(--zayne-color-success)]',
            'warning'   => '[&:has(input:checked)]:bg-[var(--zayne-color-warning)]',
            'info'      => '[&:has(input:checked)]:bg-[var(--zayne-color-info)]',
            default     => '[&:has(input:checked)]:bg-[var(--zayne-color-primary)]',
        };

        return "bg-[var(--zayne-color-base-300)] {$checkedBg} {$focusRing}";
    }

    public function render()
    {
        return view('components.zayne.toggle');
    }
}