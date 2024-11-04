<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class HeaderComponent extends Component
{

    private $links;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = Menu::orderBy('position')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-component')->with('links', $this->links);
    }
}
