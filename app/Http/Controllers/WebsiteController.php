<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Fuel;
use App\Models\Transmission;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Models\ContentPage;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class WebsiteController extends Controller
{

    public function index()
    {
        return view('website.index');
    }

    public function vehicle($vehicle_id, $slug)
    {

        $vehicle = Vehicle::find($vehicle_id)->load('car_model.brand');
        $countries = Country::all();

        return view('website.vehicle', compact('vehicle', 'countries'));
    }

    public function page($cms_id, $slug)
    {

        $page = ContentPage::find($cms_id);

        return view('website.page', compact('page'));
    }

    public function vehicles($brand_id, $car_model_id, $brand_slug, $car_model_slug)
    {
        session()->put([
            'brand_id' => $brand_id,
            'car_model_id' => $car_model_id
        ]);

        return view('website.vehicles', compact('brand_id', 'car_model_id'));
    }

    public function ajax($brand_id, $car_model_id, $year_id, $fuel_id, $transmission_id)
    {
        $filter = [];
        if ($year_id != 0) {
            $filter['year_id'] = $year_id;
        }
        if ($fuel_id != 0) {
            $filter['fuel_id'] = $fuel_id;
        }
        if ($transmission_id != 0) {
            $filter['transmission_id'] = $transmission_id;
        }

        if ($brand_id == 0 && $car_model_id == 0) {
            //ALL CARS
            $vehicles = Http::get(env('API_URL') . '/api/vehicles/all-cars/' . $year_id . '/' . $fuel_id . '/' . $transmission_id)->json() ?? [];
            $models = Http::get(env('API_URL') . '/car-models/0')->json() ?? [];
        } elseif ($brand_id != 0 && $car_model_id == 0) {
            //ALL CARS FROM A BRAND
            $vehicles = Http::get(env('API_URL') . '/api/vehicles/cars-from-a-brand/' . $brand_id . '/' . $year_id . '/' . $fuel_id . '/' . $transmission_id)->json() ?? [];
            $models = Http::get(env('API_URL') . '/api/car-models/' . $brand_id)->json() ?? [];
        } elseif ($car_model_id != 0) {
            $model = Http::get(env('API_URL') . '/api/car-model/' . $car_model_id)->json() ?? [];
            $brand_id = $model['brand_id'];
            $vehicles = Http::get(env('API_URL') . '/api/vehicles/cars-from-a-model/' . $car_model_id . '/' . $year_id . '/' . $fuel_id . '/' . $transmission_id)->json() ?? [];
            $models = Http::get(env('API_URL') . '/api/car-models/' . $brand_id)->json() ?? [];
        } else {
            //CARS FROM A MODEL
            $vehicles = Http::get(env('API_URL') . '/api/vehicles/cars-from-a-model/' . $car_model_id . '/' . $year_id . '/' . $fuel_id . '/' . $transmission_id)->json() ?? [];
            $models = Http::get(env('API_URL') . '/car-models/0')->json() ?? [];
        }

        $brands = Brand::orderBy('name')->get();
        $years = Year::orderBy('number', 'desc')->get();
        $fuels = Fuel::orderBy('name')->get();
        $transmissions = Transmission::orderBy('name')->get();

        $brand = Brand::find($brand_id);
        $car_model = CarModel::find($car_model_id);
        $url = '/vehicles/' . $brand_id . '/' . $car_model_id . '/' . ($brand ? Str::slug($brand->name) : 'all-brands') . '/' . ($car_model ? Str::slug($car_model->name) : 'all-models');

        return view('website.ajax', compact('vehicles', 'brands', 'models', 'years', 'fuels', 'transmissions', 'brand_id', 'car_model_id', 'year_id', 'fuel_id', 'transmission_id', 'url'));
    }
}
