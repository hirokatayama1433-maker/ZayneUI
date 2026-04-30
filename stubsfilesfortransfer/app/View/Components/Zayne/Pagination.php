<?php

namespace App\View\Components\Zayne;

use App\View\Components\Zayne\ZayneComponent;

class Pagination extends ZayneComponent
{
    public int $currentPage;
    public int $totalPages;
    public int $siblings; // pages shown either side of current
    public string $classes;

    public array $pageNumbers; // resolved page number list with null = ellipsis

    public function __construct(
        int $currentPage = 1,
        int $totalPages = 1,
        int $siblings = 1,
    ) {
        $this->currentPage = max(1, $currentPage);
        $this->totalPages  = max(1, $totalPages);
        $this->siblings    = $siblings;

        $this->classes = $this->mergeClasses(
            'flex items-center gap-1',
        );

        $this->pageNumbers = $this->buildPageNumbers();
    }

    protected function buildPageNumbers(): array
    {
        $pages   = [];
        $current = $this->currentPage;
        $total   = $this->totalPages;
        $sib     = $this->siblings;

        $rangeStart = max(2, $current - $sib);
        $rangeEnd   = min($total - 1, $current + $sib);

        $pages[] = 1;

        if ($rangeStart > 2) {
            $pages[] = null; // ellipsis
        }

        for ($i = $rangeStart; $i <= $rangeEnd; $i++) {
            $pages[] = $i;
        }

        if ($rangeEnd < $total - 1) {
            $pages[] = null; // ellipsis
        }

        if ($total > 1) {
            $pages[] = $total;
        }

        return $pages;
    }

    public function render()
    {
        return view('components.zayne.pagination');
    }
}