<?php

namespace App\View\Components;

use App\Models\Country;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactComponent extends Component
{

    private $countries;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->countries = Country::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact-component')->with('countries', $this->countries);
    }
}
