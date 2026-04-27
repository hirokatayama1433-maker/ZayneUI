<?php

namespace View\Components\Zayne\Display;

use App\View\Components\Zayne\ZayneComponent;

class Skeleton extends ZayneComponent
{
    public string $shape;   // line | circle | box
    public ?string $width;
    public ?string $height;
    public string $classes;

    public function __construct(
        string $shape = 'line',  // line | circle | box
        ?string $width = null,
        ?string $height = null,
    ) {
        $this->shape  = $shape;
        $this->width  = $width;
        $this->height = $height;

        $this->classes = $this->mergeClasses(
            'animate-pulse bg-[var(--zayne-color-base-300)]',
            $this->shapeClasses(),
        );
    }

    protected function shapeClasses(): string
    {
        return match ($this->shape) {
            'circle' => 'rounded-full',
            'box'    => 'rounded-[var(--zayne-radius-field)]',
            default  => 'rounded-[var(--zayne-radius-field)] h-4 w-full', // line
        };
    }

    public function render()
    {
        return view('zayne.display.skeleton');
    }
}