<?php

namespace App\View\Components;

use App\Models\ContentPage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterComponent extends Component
{

    private $content_pages;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->content_pages = ContentPage::whereHas('categories', function($query) {
            $query->where('id', 1);
        })->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer-component')->with('content_pages', $this->content_pages);
    }
}
