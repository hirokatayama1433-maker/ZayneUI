<?php

namespace View\Components\Zayne\Data;

use App\View\Components\Zayne\ZayneComponent;

class GalleryItem extends ZayneComponent
{
    public string $aspect;   // square | video | auto
    public bool $overlay;    // show hover overlay
    public string $classes;
    public string $mediaClasses;

    public function __construct(
        string $aspect = 'square',
        bool $overlay = false,
    ) {
        $this->aspect  = $aspect;
        $this->overlay = $overlay;

        $aspectClass = match ($aspect) {
            'video' => 'aspect-video',
            'auto'  => '',
            default => 'aspect-square',
        };

        $this->classes = $this->mergeClasses(
            'group relative overflow-hidden',
            'rounded-[var(--zayne-radius-field)]',
            'bg-[var(--zayne-color-base-200)]',
            $aspectClass,
        );

        $this->mediaClasses = implode(' ', [
            'w-full h-full object-cover',
            'transition-transform duration-300 ease-in-out',
            'group-hover:scale-105',
        ]);
    }

    public function render()
    {
        return view('zayne.data.galleryitem');
    }
}
