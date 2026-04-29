<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Sidebar extends ZayneComponent
{
    public string $side;     // left | right
    public string $width;
    public bool $collapsed;
    public string $classes;
    public string $state;
    public string $collapsedState;
    public string $styles;

    public function __construct(
        string $side = 'left',
        string $width = 'w-60',
        bool $collapsed = false,
        string $collapsedstate = 'visibleicons',
        ?string $sidebarmargin = null,
        ?string $sidebarpadding = null,
        ?string $sidebarradius = null,
        ?string $sidebarborder = null,
    ) {
        $this->side      = $side;
        $this->width     = $width;
        $this->collapsed = $collapsed;
        $this->state     = $collapsed ? 'collapsed' : 'expanded';
        $this->collapsedState = $this->normalizeCollapsedState($collapsedstate);
        $this->styles = $this->buildStyles([
            'margin' => $sidebarmargin,
            'padding' => $sidebarpadding,
            'border-width' => $sidebarborder,
            'border-radius' => $sidebarradius,
        ]);

        $this->classes = $this->mergeClasses(
            'group flex h-full flex-col shrink-0 overflow-hidden zaynesidebar',
            $collapsed ? 'w-14' : $width,
            'bg-[var(--zayne-custom-sidebar)] text-[var(--zayne-custom-sidebar-content)]',
            $side === 'right'
                ? 'border-l border-[var(--zayne-custom-sidebar-content)]/10'
                : 'border-r border-[var(--zayne-custom-sidebar-content)]/10',
            'transition-all duration-200',
        );
    }

    public function render()
    {
        return view('components.zayne.sidebar');
    }

    protected function normalizeCollapsedState(string $value): string
    {
        $value = strtolower(trim($value));

        return $value === 'fullclosed' ? 'fullclosed' : 'visibleicons';
    }

    protected function buildStyles(array $styles): string
    {
        $declarations = [];

        foreach ($styles as $property => $value) {
            if ($value === null || trim($value) === '') {
                continue;
            }

            $declarations[] = $property . ': ' . $this->normalizeCssValue($value);
        }

        return implode('; ', $declarations);
    }

    protected function normalizeCssValue(string $value): string
    {
        $value = trim($value);

        if (str_starts_with($value, '[') && str_ends_with($value, ']')) {
            return substr($value, 1, -1);
        }

        return $value;
    }
}
