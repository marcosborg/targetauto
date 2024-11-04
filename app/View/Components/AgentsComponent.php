<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class AgentsComponent extends Component
{

    private $vehicles;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $response = Http::get('http://127.0.0.1:8001/api/vehicles/latest-stock');

        if ($response->successful()) {
            // Obter os dados dos veículos e garantir que as fotos estejam acessíveis
            $this->vehicles = $response->json() ?? [];
        } else {
            // Em caso de erro, inicializa como um array vazio
            $this->vehicles = [];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.agents-component')->with('vehicles', $this->vehicles);
    }
}
