<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleRequest;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\CarModel;
use App\Models\Fuel;
use App\Models\Transmission;
use App\Models\Vehicle;
use App\Models\Year;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Vehicle::with(['car_model', 'year', 'fuel', 'transmission'])->select(sprintf('%s.*', (new Vehicle)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'vehicle_show';
                $editGate      = 'vehicle_edit';
                $deleteGate    = 'vehicle_delete';
                $crudRoutePart = 'vehicles';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('api', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->api ? 'checked' : null) . '>';
            });
            $table->addColumn('car_model_name', function ($row) {
                return $row->car_model ? $row->car_model->name : '';
            });

            $table->addColumn('year_number', function ($row) {
                return $row->year ? $row->year->number : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->addColumn('fuel_name', function ($row) {
                return $row->fuel ? $row->fuel->name : '';
            });

            $table->addColumn('transmission_name', function ($row) {
                return $row->transmission ? $row->transmission->name : '';
            });

            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : '';
            });
            $table->editColumn('bodywork', function ($row) {
                return $row->bodywork ? $row->bodywork : '';
            });
            $table->editColumn('power', function ($row) {
                return $row->power ? $row->power : '';
            });
            $table->editColumn('cylinder', function ($row) {
                return $row->cylinder ? $row->cylinder : '';
            });
            $table->editColumn('weight', function ($row) {
                return $row->weight ? $row->weight : '';
            });
            $table->editColumn('license_plate', function ($row) {
                return $row->license_plate ? $row->license_plate : '';
            });
            $table->editColumn('quilometers', function ($row) {
                return $row->quilometers ? $row->quilometers : '';
            });
            $table->editColumn('colour', function ($row) {
                return $row->colour ? $row->colour : '';
            });
            $table->editColumn('vat_margin', function ($row) {
                return $row->vat_margin ? $row->vat_margin : '';
            });
            $table->editColumn('average_consumption', function ($row) {
                return $row->average_consumption ? $row->average_consumption : '';
            });
            $table->editColumn('consumption_city', function ($row) {
                return $row->consumption_city ? $row->consumption_city : '';
            });
            $table->editColumn('highway_consumption', function ($row) {
                return $row->highway_consumption ? $row->highway_consumption : '';
            });
            $table->editColumn('co_2_emissions', function ($row) {
                return $row->co_2_emissions ? $row->co_2_emissions : '';
            });
            $table->editColumn('photos', function ($row) {
                if (! $row->photos) {
                    return '';
                }
                $links = [];
                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'api', 'car_model', 'year', 'fuel', 'transmission', 'photos']);

            return $table->make(true);
        }

        $car_models    = CarModel::get();
        $years         = Year::get();
        $fuels         = Fuel::get();
        $transmissions = Transmission::get();

        return view('admin.vehicles.index', compact('car_models', 'years', 'fuels', 'transmissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_models = CarModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $years = Year::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fuels = Fuel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transmissions = Transmission::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicles.create', compact('car_models', 'fuels', 'transmissions', 'years'));
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicle->id]);
        }

        return redirect()->route('admin.vehicles.index');
    }

    public function edit(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $car_models = CarModel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $years = Year::pluck('number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fuels = Fuel::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transmissions = Transmission::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle->load('car_model', 'year', 'fuel', 'transmission');

        return view('admin.vehicles.edit', compact('car_models', 'fuels', 'transmissions', 'vehicle', 'years'));
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

        if (count($vehicle->photos) > 0) {
            foreach ($vehicle->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $vehicle->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.vehicles.index');
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->load('car_model', 'year', 'fuel', 'transmission', 'vehicleContacts');

        return view('admin.vehicles.show', compact('vehicle'));
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleRequest $request)
    {
        $vehicles = Vehicle::find(request('ids'));

        foreach ($vehicles as $vehicle) {
            $vehicle->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_create') && Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vehicle();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
