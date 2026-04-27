<?php

namespace View\Components\Zayne\Overlay;

use App\View\Components\Zayne\ZayneComponent;

class Modal extends ZayneComponent
{
    public string $id;
    public ?string $title;
    public string $size;
    public bool $dismissible;
    public string $classes;
    public string $panelClasses;

    public function __construct(
        string $id = 'modal',
        ?string $title = null,
        string $size = 'md',
        bool $dismissible = true,
    ) {
        $this->id          = $id;
        $this->title       = $title;
        $this->size        = $size;
        $this->dismissible = $dismissible;

        $this->classes = $this->mergeClasses(
            'fixed inset-0 z-50 flex items-center justify-center p-4',
        );

        $this->panelClasses = implode(' ', [
            'relative w-full flex flex-col max-h-[90vh]',
            $this->resolveSize(),
            'rounded-[var(--zayne-radius-box)]',
            'border border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-100)]',
            'shadow-[var(--zayne-shadow)]',
        ]);
    }

    protected function resolveSize(): string
    {
        return match ($this->size) {
            'sm'   => 'max-w-sm',
            'lg'   => 'max-w-2xl',
            'xl'   => 'max-w-4xl',
            'full' => 'max-w-full h-full',
            default => 'max-w-lg',
        };
    }

    public function render()
    {
        return view('zayne.overlay.modal');
    }
}