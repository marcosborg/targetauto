<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CarModel;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchSectionController extends Controller
{
    public function getModels($brand_id)
    {
        $car_models = CarModel::where([
            'brand_id' => $brand_id
        ])->orderBy('name')->get();

        return $car_models;
    }

    public function search(Request $request)
    {
        $brand_id = $request->search_section_brand_id;
        $car_model_id = $request->search_section_car_model_id;

        $brand = Brand::find($brand_id);
        $car_model = CarModel::find($car_model_id);

        return redirect(
            '/vehicles/' .
                $brand_id . '/' .
                $car_model_id . '/' .
                ($brand ? Str::slug($brand->name) : 'all-brands') . '/' .
                ($car_model ? Str::slug($car_model->name) : 'all-models')
        );
    }
}
