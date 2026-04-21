<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Gallery extends ZayneComponent
{
    public string $cols;    // 2 | 3 | 4 | 5 | auto
    public string $gap;     // sm | md | lg
    public string $classes;

    public function __construct(
        string $cols = '3',
        string $gap = 'md',
    ) {
        $this->cols = $cols;
        $this->gap  = $gap;

        $colClasses = match ($cols) {
            '2'    => 'grid-cols-2',
            '4'    => 'grid-cols-2 sm:grid-cols-4',
            '5'    => 'grid-cols-2 sm:grid-cols-3 md:grid-cols-5',
            'auto' => 'grid-cols-[repeat(auto-fill,minmax(200px,1fr))]',
            default => 'grid-cols-2 sm:grid-cols-3',
        };

        $gapClasses = match ($gap) {
            'sm'  => 'gap-2',
            'lg'  => 'gap-6',
            default => 'gap-4',
        };

        $this->classes = $this->mergeClasses('grid', $colClasses, $gapClasses);
    }

    public function render()
    {
        return view('components.zayne.gallery');
    }
}
