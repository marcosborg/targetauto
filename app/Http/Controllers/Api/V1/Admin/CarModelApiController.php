<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;
use App\Http\Resources\Admin\CarModelResource;
use App\Models\CarModel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarModelApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('car_model_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarModelResource(CarModel::with(['brand'])->get());
    }

    public function store(StoreCarModelRequest $request)
    {
        $carModel = CarModel::create($request->all());

        return (new CarModelResource($carModel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CarModel $carModel)
    {
        abort_if(Gate::denies('car_model_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CarModelResource($carModel->load(['brand']));
    }

    public function update(UpdateCarModelRequest $request, CarModel $carModel)
    {
        $carModel->update($request->all());

        return (new CarModelResource($carModel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CarModel $carModel)
    {
        abort_if(Gate::denies('car_model_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carModel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
