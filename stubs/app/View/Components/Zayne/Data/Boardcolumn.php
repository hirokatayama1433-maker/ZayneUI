<?php

namespace App\View\Components\Zayne\Data;

use App\View\Components\Zayne\ZayneComponent;

class BoardColumn extends ZayneComponent
{
    public ?string $title;
    public ?int $count;
    public string $width;
    public string $classes;

    public function __construct(
        ?string $title = null,
        ?int $count = null,
        string $width = 'w-72',
    ) {
        $this->title = $title;
        $this->count = $count;
        $this->width = $width;

        $this->classes = $this->mergeClasses(
            'flex flex-col gap-3 shrink-0',
            $width,
        );
    }

    public function render()
    {
        return view('components.zayne.data.boardcolumn');
    }
}
