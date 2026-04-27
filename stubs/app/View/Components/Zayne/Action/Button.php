<?php

namespace App\View\Components\Zayne\Action;

use App\View\Components\Zayne\ZayneComponent;
use App\View\Components\Zayne\Traits\HasColorVariants;

class Button extends ZayneComponent
{
    use HasColorVariants;

    public string $variant;
    public string $color;
    public string $size;
    public ?string $href;
    public bool $disabled;
    public string $type;
    public bool $fullWidth;
    public bool $square;

    public string $tag;
    public string $classes;

    public function __construct(
        string $variant = 'solid',
        ?string $color = null,
        string $size = 'md',
        ?string $href = null,
        bool $disabled = false,
        string $type = 'button',
        bool $fullWidth = false,
        bool $square = false,
    ) {
        $this->variant   = $variant;
        $this->color     = $color ?? 'base';
        $this->size      = $size;
        $this->href      = $href;
        $this->disabled  = $disabled;
        $this->type      = $type;
        $this->fullWidth = $fullWidth;
        $this->square    = $square;

        $this->tag = $href ? 'a' : 'button';

        $this->classes = $this->mergeClasses(
            $this->baseClasses(),
            $this->sizeClasses(),
            $this->resolveVariant(),
            $this->stateClasses(),
        );
    }

    protected function baseClasses(): string
    {
        return '
            inline-flex items-center justify-center gap-2
            font-medium
            rounded-[var(--zayne-radius-field)]
            shadow-[var(--zayne-shadow)]
            transition-all duration-200 ease-in-out
            focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2
        ';
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'xs'            => $this->square ? 'h-6 w-6 text-xs'    : 'h-6 px-2 text-xs',
            'sm'            => $this->square ? 'h-8 w-8 text-sm'    : 'h-8 px-3 text-sm',
            'md', 'default' => $this->square ? 'h-10 w-10 text-sm'  : 'h-10 px-4 text-sm',
            'lg'            => $this->square ? 'h-12 w-12 text-base' : 'h-12 px-6 text-base',
            'xl'            => $this->square ? 'h-14 w-14 text-lg'   : 'h-14 px-8 text-lg',
            default         => $this->square ? 'h-10 w-10 text-sm'  : 'h-10 px-4 text-sm',
        };
    }

    protected function stateClasses(): string
    {
        return collect([
            $this->fullWidth ? 'w-full' : '',
            $this->disabled
                ? 'opacity-50 cursor-not-allowed pointer-events-none'
                : 'active:translate-y-[2px]',
        ])->implode(' ');
    }

    public function render()
    {
        return view('components.zayne.action.button');
    }
}