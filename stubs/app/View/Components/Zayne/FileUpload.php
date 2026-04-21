<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class FileUpload extends ZayneComponent
{
    public bool $multiple;
    public ?string $accept;
    public bool $disabled;
    public string $size;

    public string $zoneClasses;
    public string $inputClasses;

    public function __construct(
        bool $multiple = false,
        ?string $accept = null,
        bool $disabled = false,
        string $size = 'md',
    ) {
        $this->multiple  = $multiple;
        $this->accept    = $accept;
        $this->disabled  = $disabled;
        $this->size      = $size;

        $this->zoneClasses = $this->mergeClasses(
            'relative flex flex-col items-center justify-center gap-2',
            'rounded-[var(--zayne-radius-box)]',
            'border-2 border-dashed border-[var(--zayne-color-base-border)]',
            'bg-[var(--zayne-color-base-100)]',
            'cursor-pointer transition-colors duration-150',
            'hover:border-[var(--zayne-color-primary)] hover:bg-[color-mix(in_oklch,var(--zayne-color-primary)_5%,transparent)]',
            $this->sizeClasses(),
            $disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : '',
        );

        $this->inputClasses = 'absolute inset-0 w-full h-full opacity-0 cursor-pointer';
    }

    protected function sizeClasses(): string
    {
        return match ($this->size) {
            'sm'    => 'py-6 px-4',
            'lg'    => 'py-14 px-8',
            default => 'py-10 px-6',
        };
    }

    public function render()
    {
        return view('components.zayne.file-upload');
    }
}