<?php

namespace App\Http\Requests;

use App\Models\Transmission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransmissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transmission_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
