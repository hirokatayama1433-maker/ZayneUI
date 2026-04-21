<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Drawer extends ZayneComponent
{
    public string $id;
    public ?string $title;
    public string $side;   // left | right | top | bottom
    public string $size;
    public bool $dismissible;
    public string $panelClasses;
    public string $enterStart;
    public string $enterEnd;

    public function __construct(
    string $id = 'drawer',
    ?string $title = null,
    string $side = 'right',
    string $size = 'md',
    bool $dismissible = true,
) {
    $this->id          = $id;
    $this->title       = $title;
    $this->side        = $side;
    $this->size        = $size;        // <-- add this line
    $this->dismissible = $dismissible;

    [$panelBase, $enterStart, $enterEnd] = $this->resolveSide($side, $size);

    $this->panelClasses = implode(' ', [
        $panelBase,
        'fixed z-50 flex flex-col',
        'bg-[var(--zayne-color-base-100)]',
        'border-[var(--zayne-color-base-border)]',
        'shadow-[var(--zayne-shadow)]',
    ]);

    $this->enterStart = $enterStart;
    $this->enterEnd   = $enterEnd;
}

    protected function resolveSide(string $side, string $size): array
    {
        $sizes = [
            'sm' => ['w-64',  'h-48'],
            'md' => ['w-80',  'h-64'],
            'lg' => ['w-96',  'h-80'],
            'xl' => ['w-[480px]', 'h-96'],
        ];

        [$w, $h] = $sizes[$size] ?? $sizes['md'];

        return match ($side) {
            'left'   => ["inset-y-0 left-0 {$w} border-r",  '-translate-x-full', 'translate-x-0'],
            'top'    => ["inset-x-0 top-0 {$h} border-b",   '-translate-y-full', 'translate-y-0'],
            'bottom' => ["inset-x-0 bottom-0 {$h} border-t", 'translate-y-full',  'translate-y-0'],
            default  => ["inset-y-0 right-0 {$w} border-l", 'translate-x-full',  'translate-x-0'],
        };
    }

    public function render()
    {
        return view('components.zayne.overlay.drawer', [
            'enterStart' => $this->enterStart,
            'enterEnd'   => $this->enterEnd,
        ]);
    }
}