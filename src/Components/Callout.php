<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Callout extends Component
{
    public string $style       = '';
    public string $accentStyle = '';
    public string $iconColor   = '';

    public function __construct(
        public string  $variant = 'soft',    // soft | outline | solid
        public string  $color   = 'info',    // info | success | warning | danger | base
        public ?string $title   = null,
        public ?string $icon    = null,
        public string  $padding = '1rem 1.25rem',
        public string  $radius  = 'var(--zayne-radius-box)',
        public ?string $shadow  = null,
        public ?string $margin  = null,
    ) {
        $this->buildStyle();
    }

    protected function buildStyle(): void
    {
        $tokens = [
            'info'    => 'var(--zayne-color-info)',
            'success' => 'var(--zayne-color-success)',
            'warning' => 'var(--zayne-color-warning)',
            'danger'  => 'var(--zayne-color-danger)',
            'base'    => 'var(--zayne-color-base-content)',
        ];

        $accentToken = $tokens[$this->color] ?? $tokens['info'];

        $variantStyles = [
            'soft' => [
                'info'    => ['background' => 'color-mix(in oklch, var(--zayne-color-info) 10%, transparent)',    'color' => 'var(--zayne-color-base-content)', 'border-left' => '3px solid var(--zayne-color-info)'],
                'success' => ['background' => 'color-mix(in oklch, var(--zayne-color-success) 10%, transparent)', 'color' => 'var(--zayne-color-base-content)', 'border-left' => '3px solid var(--zayne-color-success)'],
                'warning' => ['background' => 'color-mix(in oklch, var(--zayne-color-warning) 14%, transparent)', 'color' => 'var(--zayne-color-base-content)', 'border-left' => '3px solid var(--zayne-color-warning)'],
                'danger'  => ['background' => 'color-mix(in oklch, var(--zayne-color-danger) 10%, transparent)',  'color' => 'var(--zayne-color-base-content)', 'border-left' => '3px solid var(--zayne-color-danger)'],
                'base'    => ['background' => 'var(--zayne-color-base-200)',                                       'color' => 'var(--zayne-color-base-content)', 'border-left' => '3px solid var(--zayne-color-base-border)'],
            ],
            'outline' => [
                'info'    => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-info)'],
                'success' => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-success)'],
                'warning' => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-warning)'],
                'danger'  => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-danger)'],
                'base'    => ['background' => 'transparent', 'color' => 'var(--zayne-color-base-content)', 'border' => '1px solid var(--zayne-color-base-border)'],
            ],
            'solid' => [
                'info'    => ['background' => 'var(--zayne-color-info)',    'color' => 'var(--zayne-color-info-content)'],
                'success' => ['background' => 'var(--zayne-color-success)', 'color' => 'var(--zayne-color-success-content)'],
                'warning' => ['background' => 'var(--zayne-color-warning)', 'color' => 'var(--zayne-color-warning-content)'],
                'danger'  => ['background' => 'var(--zayne-color-danger)',  'color' => 'var(--zayne-color-danger-content)'],
                'base'    => ['background' => 'var(--zayne-color-base-200)','color' => 'var(--zayne-color-base-content)'],
            ],
        ];

        $resolved = $variantStyles[$this->variant][$this->color]
            ?? $variantStyles[$this->variant]['base']
            ?? $variantStyles['soft']['info'];

        $this->iconColor = $this->variant === 'solid' ? ($resolved['color'] ?? 'currentColor') : $accentToken;

        $this->style = Zayne::styleString(array_merge([
            'padding'       => $this->padding,
            'border-radius' => $this->radius,
            'box-shadow'    => $this->shadow,
            'margin'        => $this->margin,
            'box-sizing'    => 'border-box',
        ], $resolved));
    }

    public function render(): View
    {
        return view('zayne::callout');
    }
}
