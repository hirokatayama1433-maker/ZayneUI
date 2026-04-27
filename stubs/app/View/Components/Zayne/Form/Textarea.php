<?php

namespace View\Components\Zayne\Form;

use App\View\Components\Zayne\ZayneComponent;

class Textarea extends ZayneComponent
{
    public string $size;
    public bool $error;
    public bool $disabled;
    public int $rows;

    public string $classes;

    public function __construct(
        string $size = 'md',
        bool $error = false,
        bool $disabled = false,
        int $rows = 4,
    ) {
        $this->size     = $size;
        $this->error    = $error;
        $this->disabled = $disabled;
        $this->rows     = $rows;

        // mergeClasses() is called here — $attributes.class lands on the <textarea> directly
        $this->classes = $this->mergeClasses(
            'w-full resize-y bg-[var(--zayne-color-base-100)]',
            'text-[var(--zayne-color-base-content)]',
            'placeholder:text-[var(--zayne-color-base-content-muted)]',
            'rounded-[var(--zayne-radius-field)]',
            'border border-[var(--zayne-color-base-border)]',
            'transition-colors duration-150',
            'outline-none focus:ring-2 focus:border-transparent',
            $error
                ? 'border-[var(--zayne-color-danger)] focus:ring-[var(--zayne-color-danger)]'
                : 'focus:ring-[var(--zayne-color-primary)]',
            $this->paddingClasses(),
            $disabled ? 'opacity-50 cursor-not-allowed bg-[var(--zayne-color-base-200)]' : '',
        );
    }

    protected function paddingClasses(): string
    {
        return match ($this->size) {
            'sm'    => 'px-3 py-2 text-sm',
            'lg'    => 'px-4 py-3 text-base',
            default => 'px-3 py-2.5 text-sm',
        };
    }

    public function render()
    {
        return view('zayne.form.textarea');
    }
}