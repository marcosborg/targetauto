<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Slide;

class HeroComponent extends Component
{

    private $heros;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->heros = Slide::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-component')->with('heros', $this->heros);
    }
}
