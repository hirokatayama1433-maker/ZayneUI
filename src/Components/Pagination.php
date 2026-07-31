<?php

namespace Zayne\UI\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Zayne\UI\Zayne;

class Pagination extends Component
{
    public string $style    = '';
    public string $btnBase  = '';
    public array  $pages    = [];

    public function __construct(
        public int     $current  = 1,
        public int     $total    = 1,       // total pages
        public int     $siblings = 1,       // pages shown each side of current
        public string  $variant  = 'outline', // outline | solid | ghost
        public string  $size     = 'md',    // sm | md | lg
        public ?string $href     = null,    // base URL — appends ?page=N; null = Alpine only
        public string  $param    = 'page',  // query param name
        public ?string $margin   = null,
    ) {
        $this->pages = $this->buildPages();
        $this->buildStyle();
    }

    protected function buildPages(): array
    {
        if ($this->total <= 1) return [];

        $range  = [];
        $delta  = $this->siblings;
        $left   = max(2, $this->current - $delta);
        $right  = min($this->total - 1, $this->current + $delta);

        $range[] = 1;

        if ($left > 2)             $range[] = '...';
        for ($i = $left; $i <= $right; $i++) $range[] = $i;
        if ($right < $this->total - 1) $range[] = '...';

        if ($this->total > 1) $range[] = $this->total;

        return $range;
    }

    protected function buildStyle(): void
    {
        $heights = ['sm' => '2rem', 'md' => '2.5rem', 'lg' => '3rem'];
        $fonts   = ['sm' => '0.8125rem', 'md' => '0.875rem', 'lg' => '1rem'];
        $paddings= ['sm' => '0 0.625rem', 'md' => '0 0.875rem', 'lg' => '0 1.125rem'];

        $this->style = Zayne::styleString([
            'display'     => 'flex',
            'align-items' => 'center',
            'gap'         => '0.25rem',
            'flex-wrap'   => 'wrap',
            'margin'      => $this->margin,
        ]);

        $this->btnBase = Zayne::styleString([
            'display'       => 'inline-flex',
            'align-items'   => 'center',
            'justify-content'=> 'center',
            'height'        => $heights[$this->size] ?? $heights['md'],
            'min-width'     => $heights[$this->size] ?? $heights['md'],
            'padding'       => $paddings[$this->size] ?? $paddings['md'],
            'font-size'     => $fonts[$this->size] ?? $fonts['md'],
            'font-family'   => 'inherit',
            'font-weight'   => '500',
            'border-radius' => 'var(--zayne-radius-field)',
            'cursor'        => 'pointer',
            'transition'    => 'background 150ms ease, color 150ms ease, border-color 150ms ease',
            'text-decoration'=> 'none',
            'border'        => 'none',
            'box-sizing'    => 'border-box',
            'user-select'   => 'none',
        ]);
    }

    public function pageUrl(int $page): string
    {
        if (!$this->href) return '#';
        $sep = str_contains($this->href, '?') ? '&' : '?';
        return $this->href . $sep . $this->param . '=' . $page;
    }

    public function render(): View
    {
        return view('zayne::pagination');
    }
}
