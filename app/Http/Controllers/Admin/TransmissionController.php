<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransmissionRequest;
use App\Http\Requests\StoreTransmissionRequest;
use App\Http\Requests\UpdateTransmissionRequest;
use App\Models\Transmission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransmissionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transmission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transmissions = Transmission::all();

        return view('admin.transmissions.index', compact('transmissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('transmission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transmissions.create');
    }

    public function store(StoreTransmissionRequest $request)
    {
        $transmission = Transmission::create($request->all());

        return redirect()->route('admin.transmissions.index');
    }

    public function edit(Transmission $transmission)
    {
        abort_if(Gate::denies('transmission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transmissions.edit', compact('transmission'));
    }

    public function update(UpdateTransmissionRequest $request, Transmission $transmission)
    {
        $transmission->update($request->all());

        return redirect()->route('admin.transmissions.index');
    }

    public function show(Transmission $transmission)
    {
        abort_if(Gate::denies('transmission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transmissions.show', compact('transmission'));
    }

    public function destroy(Transmission $transmission)
    {
        abort_if(Gate::denies('transmission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transmission->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransmissionRequest $request)
    {
        $transmissions = Transmission::find(request('ids'));

        foreach ($transmissions as $transmission) {
            $transmission->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
