<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransmissionRequest;
use App\Http\Requests\UpdateTransmissionRequest;
use App\Http\Resources\Admin\TransmissionResource;
use App\Models\Transmission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransmissionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transmission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransmissionResource(Transmission::all());
    }

    public function store(StoreTransmissionRequest $request)
    {
        $transmission = Transmission::create($request->all());

        return (new TransmissionResource($transmission))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Transmission $transmission)
    {
        abort_if(Gate::denies('transmission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransmissionResource($transmission);
    }

    public function update(UpdateTransmissionRequest $request, Transmission $transmission)
    {
        $transmission->update($request->all());

        return (new TransmissionResource($transmission))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Transmission $transmission)
    {
        abort_if(Gate::denies('transmission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transmission->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
