<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Button extends Component
{
    public string $style = '';

    public function __construct(
        public string  $variant       = 'solid',
        public string  $color         = 'primary',
        public string  $size          = 'md',
        public ?string $href          = null,
        public ?string $icon          = null,
        public ?string $iconTrailing  = null,
        public ?string $padding       = null,
        public string  $radius        = 'var(--zayne-radius-field)',
        public ?string $shadow        = null,
        public string  $gap           = 'var(--zayne-gap-button)',
        public ?string $margin        = null,
        public ?string $border        = null,
        public ?string $bordercolor   = null,
        public ?string $background    = null,
        public ?string $textcolor     = null,
        public bool    $fullwidth     = false,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $variantStyles = [
            'solid' => [
                'primary'   => ['background' => 'var(--zayne-color-primary)',   'color' => 'var(--zayne-color-primary-content)'],
                'accent'    => ['background' => 'var(--zayne-color-accent)',    'color' => 'var(--zayne-color-accent-content)'],
                'secondary' => ['background' => 'var(--zayne-color-secondary)', 'color' => 'var(--zayne-color-secondary-content)'],
                'danger'    => ['background' => 'var(--zayne-color-danger)',    'color' => 'var(--zayne-color-danger-content)'],
                'success'   => ['background' => 'var(--zayne-color-success)',   'color' => 'var(--zayne-color-success-content)'],
                'warning'   => ['background' => 'var(--zayne-color-warning)',   'color' => 'var(--zayne-color-warning-content)'],
                'info'      => ['background' => 'var(--zayne-color-info)',      'color' => 'var(--zayne-color-info-content)'],
                'base'      => ['background' => 'var(--zayne-color-base-200)',  'color' => 'var(--zayne-color-base-content)'],
            ],
            'soft' => [
                'primary'   => ['background' => 'color-mix(in oklch, var(--zayne-color-primary) 15%, transparent)',   'color' => 'var(--zayne-color-primary)'],
                'secondary' => ['background' => 'color-mix(in oklch, var(--zayne-color-secondary) 15%, transparent)', 'color' => 'var(--zayne-color-secondary)'],
                'danger'    => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 15%, transparent)',    'color' => 'var(--zayne-color-danger)'],
                'success'   => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 15%, transparent)',   'color' => 'var(--zayne-color-success)'],
                'warning'   => ['background' => 'color-mix(in oklch, var(--zayne-color-warning) 15%, transparent)',   'color' => 'var(--zayne-color-warning)'],
                'info'      => ['background' => 'color-mix(in oklch, var(--zayne-color-info) 15%, transparent)',      'color' => 'var(--zayne-color-info)'],
                'base'      => ['background' => 'var(--zayne-color-base-200)',                                        'color' => 'var(--zayne-color-base-content)'],
            ],
            'outline' => [
                'primary'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-primary)',   'border' => '1px solid var(--zayne-color-primary)'],
                'secondary' => ['background' => 'transparent', 'color' => 'var(--zayne-color-secondary)', 'border' => '1px solid var(--zayne-color-secondary)'],
                'danger'    => ['background' => 'transparent', 'color' => 'var(--zayne-color-danger)',    'border' => '1px solid var(--zayne-color-danger)'],
                'success'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-success)',   'border' => '1px solid var(--zayne-color-success)'],
                'warning'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-warning)',   'border' => '1px solid var(--zayne-color-warning)'],
                'info'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-info)',      'border' => '1px solid var(--zayne-color-info)'],
                'base'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-base-border)'],
            ],
            'ghost' => [
                'primary'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-primary)'],
                'secondary' => ['background' => 'transparent', 'color' => 'var(--zayne-color-secondary)'],
                'danger'    => ['background' => 'transparent', 'color' => 'var(--zayne-color-danger)'],
                'success'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-success)'],
                'warning'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-warning)'],
                'info'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-info)'],
                'base'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)'],
            ],
            'link' => [
                'primary'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-primary)',   'text-decoration' => 'underline'],
                'secondary' => ['background' => 'transparent', 'color' => 'var(--zayne-color-secondary)', 'text-decoration' => 'underline'],
                'danger'    => ['background' => 'transparent', 'color' => 'var(--zayne-color-danger)',    'text-decoration' => 'underline'],
                'success'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-success)',   'text-decoration' => 'underline'],
                'warning'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-warning)',   'text-decoration' => 'underline'],
                'info'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-info)',      'text-decoration' => 'underline'],
                'base'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'text-decoration' => 'underline'],
            ],
            'dashed' => [
                'primary'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-primary)',   'border' => '1.5px dashed var(--zayne-color-primary)'],
                'secondary' => ['background' => 'transparent', 'color' => 'var(--zayne-color-secondary)', 'border' => '1.5px dashed var(--zayne-color-secondary)'],
                'danger'    => ['background' => 'transparent', 'color' => 'var(--zayne-color-danger)',    'border' => '1.5px dashed var(--zayne-color-danger)'],
                'success'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-success)',   'border' => '1.5px dashed var(--zayne-color-success)'],
                'warning'   => ['background' => 'transparent', 'color' => 'var(--zayne-color-warning)',   'border' => '1.5px dashed var(--zayne-color-warning)'],
                'info'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-info)',      'border' => '1.5px dashed var(--zayne-color-info)'],
                'base'      => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1.5px dashed var(--zayne-color-base-border)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['solid']['primary'];

        if ($this->background) $resolved['background'] = $this->background;
        if ($this->textcolor)  $resolved['color']       = $this->textcolor;

        $this->style = Zayne::styleString(array_merge([
            'padding'         => $this->padding,
            'border-radius'   => $this->radius,
            'gap'             => $this->gap,
            'box-shadow'      => $this->shadow,
            'margin'          => $this->margin,
            'border-width'    => $this->border,
            'border-color'    => $this->bordercolor,
            'width'           => $this->fullwidth ? '100%' : null,
            'justify-content' => $this->fullwidth ? 'flex-start' : null,
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::button');
    }
}