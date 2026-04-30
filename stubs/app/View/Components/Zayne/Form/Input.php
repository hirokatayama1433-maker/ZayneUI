<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Input extends ZayneComponent
{
    public string $size;
    public string $type;
    public string $labelPosition; // top | float
    public bool $error;
    public bool $disabled;

    public string $wrapperClasses;
    public string $inputClasses;
    public string $floatLabelClasses;
    public string $affixDividerClasses;

    public function __construct(
        string $size = 'md',
        string $type = 'text',
        string $labelPosition = 'top',
        bool $error = false,
        bool $disabled = false,
    ) {
        $this->size          = $size;
        $this->type          = $type;
        $this->labelPosition = $labelPosition;
        $this->error         = $error;
        $this->disabled      = $disabled;

        $this->wrapperClasses      = $this->buildWrapperClasses();
        $this->inputClasses        = $this->buildInputClasses();
        $this->floatLabelClasses   = $this->buildFloatLabelClasses();
        $this->affixDividerClasses = $this->buildAffixDividerClasses();
    }

    protected function buildWrapperClasses(): string
    {
        $height = match ($this->size) {
            'sm'    => 'h-8',
            'lg'    => 'h-12',
            default => 'h-10',
        };

        $ring = $this->error
            ? 'border border-[var(--zayne-color-danger)] focus-within:ring-1 focus-within:ring-[var(--zayne-color-danger)]'
            : 'border border-[var(--zayne-color-base-border)] focus-within:border-[var(--zayne-color-primary)] focus-within:ring-1 focus-within:ring-[var(--zayne-color-primary)]';

        return implode(' ', array_filter([
            'relative w-full flex items-center overflow-hidden',
            'rounded-[var(--zayne-radius-field)]',
            'bg-[var(--zayne-color-base-100)]',
            'transition-all duration-150 cursor-text',
            $height,
            $ring,
            $this->disabled ? 'opacity-50 cursor-not-allowed' : '',
        ]));
    }

    protected function buildInputClasses(): string
    {
        // mergeClasses() is intentionally NOT used here.
        // $attributes (including wire:model, wire:loading, class overrides) must land
        // directly on the <input> element in blade — not on the wrapper.
        // The wrapper gets its own static classes; the input gets these + $attributes.
        $padding = match ($this->size) {
            'sm'    => 'px-3 text-sm placeholder:text-xs',
            'lg'    => 'px-4 text-base placeholder:text-sm',
            default => 'px-3 text-sm placeholder:text-sm',
        };

        return implode(' ', array_filter([
            'peer w-full h-full bg-transparent outline-none',
            'text-[var(--zayne-color-base-content)]',
            'placeholder:text-[var(--zayne-color-base-content-muted)]',
            $padding,
            $this->disabled ? 'cursor-not-allowed' : '',
        ]));
    }

    protected function buildFloatLabelClasses(): string
    {
        $floatedTop = match ($this->size) {
            'sm'    => '-top-2',
            'lg'    => '-top-3',
            default => '-top-2.5',
        };

        $focusColor = $this->error
            ? 'peer-focus:text-[var(--zayne-color-danger)]'
            : 'peer-focus:text-[var(--zayne-color-primary)]';

        $filledColor = $this->error
            ? 'peer-[&:not(:placeholder-shown)]:text-[var(--zayne-color-danger)]'
            : 'peer-[&:not(:placeholder-shown)]:text-[var(--zayne-color-primary)]';

        return implode(' ', [
            // Base position — centered vertically at rest
            'absolute left-3 top-1/2 -translate-y-1/2',
            'text-sm pointer-events-none select-none',
            'transition-all duration-200',
            'bg-[var(--zayne-color-base-100)] px-1 rounded-sm',
            // Resting (empty input)
            'peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2',
            'peer-placeholder-shown:text-sm peer-placeholder-shown:text-[var(--zayne-color-base-content-muted)]',
            // Focused
            "peer-focus:{$floatedTop} peer-focus:-translate-y-7 peer-focus:text-xs z-99",
            $focusColor,
            // Filled (not empty)
            "peer-[&:not(:placeholder-shown)]:{$floatedTop} peer-[&:not(:placeholder-shown)]:translate-y-0 peer-[&:not(:placeholder-shown)]:text-xs",
            $filledColor,
        ]);
    }

    protected function buildAffixDividerClasses(): string
    {
        return match ($this->size) {
            'sm'    => 'h-4 text-xs',
            'lg'    => 'h-6 text-base',
            default => 'h-5 text-sm',
        };
    }

    public function render()
    {
        return view('components.zayne.input');
    }
}
