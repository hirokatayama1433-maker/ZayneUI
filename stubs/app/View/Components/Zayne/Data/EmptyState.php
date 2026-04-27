<?php

namespace View\Components\Zayne\Data;

use App\View\Components\Zayne\ZayneComponent;

class EmptyState extends ZayneComponent
{
    public ?string $title;
    public ?string $description;
    public string $classes;

    public function __construct(
        ?string $title = 'Nothing here yet',
        ?string $description = null,
    ) {
        $this->title       = $title;
        $this->description = $description;

        $this->classes = $this->mergeClasses(
            'flex flex-col items-center justify-center gap-4',
            'py-16 px-6 text-center',
        );
    }

    public function render()
    {
        return view('zayne.data.empty-state');
    }
}