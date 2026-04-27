<?php

namespace View\Components\Zayne\Layout;

use App\View\Components\Zayne\ZayneComponent;

class Card extends ZayneComponent
{
    public bool $divided;   // show dividers between header/body/footer
    public bool $shadow;
    public string $padding;

    public string $classes;

    public function __construct(
        bool $divided = true,
        bool $shadow = true,
        string $padding = 'md',
    ) {
        $this->divided  = $divided;
        $this->shadow   = $shadow;
        $this->padding  = $padding;

        $this->classes = $this->mergeClasses(
            'flex flex-col w-full',
            'rounded-[var(--zayne-radius-box)]',
            'border-(--zayne-border-layout) border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-200)]',
            $shadow ? 'shadow-[var(--zayne-shadow)]' : '',
        );
    }

    public function paddingClasses(): string
    {
        return match ($this->padding) {
            'sm'    => 'p-3',
            'lg'    => 'p-6',
            'none'  => 'p-0',
            default => 'p-4',
        };
    }

    public function render()
    {
        return view('zayne.layout.card');
    }
}
