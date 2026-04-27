<?php

namespace App\View\Components\Zayne\Layout;

use App\View\Components\Zayne\ZayneComponent;

class Divider extends ZayneComponent
{
    public string $orientation;
    public string $variant;
    public ?string $label;
    public string $align;

    public string $classes;
    public string $lineClasses;

    public function __construct(
        string $orientation = 'horizontal',
        string $variant = 'solid',
        ?string $label = null,
        string $align = 'center',
    ) {
        $this->orientation = $orientation;
        $this->variant     = $variant;
        $this->label       = $label;
        $this->align       = $align;

        $borderStyle = match ($variant) {
            'dashed' => 'border-dashed',
            'dotted' => 'border-dotted',
            default  => 'border-solid',
        };

        if ($orientation === 'vertical') {
            $this->classes = $this->mergeClasses(
                'inline-block self-stretch',
                'border-l border-[var(--zayne-color-base-border)]',
                $borderStyle,
                'mx-2',
            );
            $this->lineClasses = '';
        } else {
            $this->classes = $this->mergeClasses(
                'flex items-center w-full',
                'text-xs text-[var(--zayne-color-base-content-muted)]',
                'gap-3',
            );
            $this->lineClasses = implode(' ', [
                'flex-1 border-t border-[var(--zayne-color-base-border)]',
                $borderStyle,
            ]);
        }
    }

    public function render()
    {
        return view('components.zayne.layout.divider');
    }
}