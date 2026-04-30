<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Avatar extends ZayneComponent
{
    public string $size;
    public ?string $src;
    public ?string $alt;
    public ?string $initials;
    public string $shape;
    public string $color;

    public string $classes;
    public string $initialsClasses;
    public string $imageClasses;

    public function __construct(
        string $size = 'md',
        ?string $src = null,
        ?string $alt = null,
        ?string $initials = null,
        string $shape = 'circle',  // circle | square
        string $color = 'base',
    ) {
        $this->size     = $size;
        $this->src      = $src;
        $this->alt      = $alt;
        $this->initials = $initials ? strtoupper($initials) : null;
        $this->shape    = $shape;
        $this->color    = $color;

        $shapeClass = $shape === 'square'
            ? 'rounded-[var(--zayne-radius-field)]'
            : 'rounded-full';

        $this->classes = $this->mergeClasses(
            'relative inline-flex items-center justify-center shrink-0 overflow-hidden',
            $shapeClass,
            $this->sizeClasses(),
            $this->colorClasses(),
        );

        $this->imageClasses  = 'w-full h-full object-cover';
        $this->initialsClasses = 'font-semibold leading-none select-none ' . $this->initialsTextSize();
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'xs'  => 'w-6 h-6',
            'sm'  => 'w-8 h-8',
            'md'  => 'w-10 h-10',
            'lg'  => 'w-12 h-12',
            'xl'  => 'w-16 h-16',
            '2xl' => 'w-20 h-20',
            default => 'w-10 h-10',
        };
    }

    protected function initialsTextSize(): string
    {
        return match ($this->size) {
            'xs'  => 'text-[10px]',
            'sm'  => 'text-xs',
            'md'  => 'text-sm',
            'lg'  => 'text-base',
            'xl'  => 'text-lg',
            '2xl' => 'text-xl',
            default => 'text-sm',
        };
    }

    protected function colorClasses(): string
    {
        return match ($this->color) {
            'primary'   => 'bg-[color-mix(in_oklch,var(--zayne-color-primary)_20%,transparent)] text-[var(--zayne-color-primary)]',
            'secondary' => 'bg-[color-mix(in_oklch,var(--zayne-color-secondary)_20%,transparent)] text-[var(--zayne-color-secondary)]',
            'accent'    => 'bg-[color-mix(in_oklch,var(--zayne-color-accent)_20%,transparent)] text-[var(--zayne-color-accent)]',
            'danger'    => 'bg-[color-mix(in_oklch,var(--zayne-color-danger)_20%,transparent)] text-[var(--zayne-color-danger)]',
            'success'   => 'bg-[color-mix(in_oklch,var(--zayne-color-success)_20%,transparent)] text-[var(--zayne-color-success)]',
            'warning'   => 'bg-[color-mix(in_oklch,var(--zayne-color-warning)_20%,transparent)] text-[var(--zayne-color-warning)]',
            'info'      => 'bg-[color-mix(in_oklch,var(--zayne-color-info)_20%,transparent)] text-[var(--zayne-color-info)]',
            default     => 'bg-[var(--zayne-color-base-200)] text-[var(--zayne-color-base-content)]',
        };
    }

    public function render()
    {
        return view('components.zayne.avatar');
    }
}