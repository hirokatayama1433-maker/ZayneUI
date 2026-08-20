<?php

namespace Zayne\UI\Components\Picker;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Color extends Component
{
    public string $pickerId;
    public ?string $style;
    public array $defaultSwatches;
    public array $expandedSwatches;

    public function __construct(
        public ?string $value       = null,
        public string  $name        = 'color',
        public string  $format      = 'hex',
        public bool    $alpha       = false,
        public array   $swatches    = [],
        public ?bool   $closeButton = null,
        public ?bool   $clearButton = null,
        public string  $mode        = 'popover',
        public string  $layout      = 'vertical',
        public ?string $placeholder = null,
        public string  $theme       = 'light',
    ) {
        $this->pickerId = 'zayne_clr_' . uniqid();
        $this->style    = Zayne::styleString([
            '--zayne-picker-value' => $this->value ?? 'transparent',
            'display' => $this->mode === 'popover' ? 'inline-block' : 'block',
            'position' => 'relative',
        ]);

        $this->defaultSwatches  = $this->buildDefaultSwatches();
        $this->expandedSwatches = $this->buildExpandedSwatches();
    }

    protected function buildDefaultSwatches(): array
    {
        if (!empty($this->swatches)) {
            return $this->swatches;
        }

        return [
            '#ffb3ba','#ffdfba','#ffffba','#baffc9','#bae1ff','#c9baff','#ffbaff',
            '#ff5252','#ff9800','#ffeb3b','#76ff03','#18ffff','#448aff','#e040fb',
            '#b71c1c','#e65100','#f57f17','#33691e','#00695c','#1a237e','#4a148c',
            '#ffffff','#e0e0e0','#bdbdbd','#9e9e9e','#757575','#616161','#000000'
        ];
    }

    protected function buildExpandedSwatches(): array
    {
        $colors = [];
        $hues   = [0, 20, 40, 60, 80, 100, 120, 140, 160, 180, 200, 220, 240, 260, 280, 300, 320, 340];
        $rows   = [
            ['l' => 95, 's' => 90], ['l' => 85, 's' => 95], ['l' => 72, 's' => 100],
            ['l' => 58, 's' => 100], ['l' => 48, 's' => 100], ['l' => 38, 's' => 90],
            ['l' => 28, 's' => 80],  ['l' => 15, 's' => 70],
        ];

        foreach ($rows as $row) {
            $rowColors = [];
            foreach ($hues as $h) {
                $rowColors[] = $this->hslToHex($h, $row['s'], $row['l']);
            }
            $rowColors[] = $this->hslToHex(0, 0, $row['l']);
            $colors = array_merge($colors, $rowColors);
        }

        return $colors;
    }

    protected function hslToHex(int $h, int $s, int $l): string
    {
        $l /= 100;
        $a  = $s * min($l, 1 - $l) / 100;

        $f = function (int $n) use ($h, $l, $a): string {
            $k     = ($n + (int) round($h / 30)) % 12;
            $color = $l - $a * max(min($k - 3, 9 - $k, 1), -1);

            return str_pad(
                dechex(max(0, min(255, (int) round(255 * $color)))),
                2,
                '0',
                STR_PAD_LEFT
            );
        };

        return '#' . $f(0) . $f(8) . $f(4);
    }

    public function render(): View
    {
        // Explicitly expose every variable the Blade view expects.
        // This guarantees $defaultSwatches and $expandedSwatches are
        // always defined, even if Laravel's automatic extraction hiccups.
        return view('zayne::picker.color', [
            'pickerId'         => $this->pickerId,
            'style'            => $this->style,
            'defaultSwatches'  => $this->defaultSwatches,
            'expandedSwatches' => $this->expandedSwatches,
            'value'            => $this->value,
            'name'             => $this->name,
            'format'           => $this->format,
            'alpha'            => $this->alpha,
            'closeButton'      => $this->closeButton,
            'clearButton'      => $this->clearButton,
            'mode'             => $this->mode,
            'layout'           => $this->layout,
            'placeholder'      => $this->placeholder,
            'theme'            => $this->theme,
        ]);
    }
}