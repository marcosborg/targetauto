<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_create');
    }

    public function rules()
    {
        return [
            'car_model_id' => [
                'required',
                'integer',
            ],
            'year_id' => [
                'required',
                'integer',
            ],
            'price' => [
                'required',
            ],
            'fuel_id' => [
                'required',
                'integer',
            ],
            'transmission_id' => [
                'required',
                'integer',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'bodywork' => [
                'string',
                'nullable',
            ],
            'power' => [
                'string',
                'nullable',
            ],
            'cylinder' => [
                'string',
                'nullable',
            ],
            'weight' => [
                'string',
                'nullable',
            ],
            'license_plate' => [
                'string',
                'nullable',
            ],
            'quilometers' => [
                'string',
                'nullable',
            ],
            'colour' => [
                'string',
                'nullable',
            ],
            'vat_margin' => [
                'string',
                'nullable',
            ],
            'average_consumption' => [
                'string',
                'nullable',
            ],
            'consumption_city' => [
                'string',
                'nullable',
            ],
            'highway_consumption' => [
                'string',
                'nullable',
            ],
            'co_2_emissions' => [
                'string',
                'nullable',
            ],
            'photos' => [
                'array',
            ],
        ];
    }
}
