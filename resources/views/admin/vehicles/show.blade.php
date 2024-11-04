@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vehicle.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.id') }}
                        </th>
                        <td>
                            {{ $vehicle->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.api') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vehicle->api ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.car_model') }}
                        </th>
                        <td>
                            {{ $vehicle->car_model->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.year') }}
                        </th>
                        <td>
                            {{ $vehicle->year->number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.price') }}
                        </th>
                        <td>
                            {{ $vehicle->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.fuel') }}
                        </th>
                        <td>
                            {{ $vehicle->fuel->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.transmission') }}
                        </th>
                        <td>
                            {{ $vehicle->transmission->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.type') }}
                        </th>
                        <td>
                            {{ $vehicle->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.bodywork') }}
                        </th>
                        <td>
                            {{ $vehicle->bodywork }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.power') }}
                        </th>
                        <td>
                            {{ $vehicle->power }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.cylinder') }}
                        </th>
                        <td>
                            {{ $vehicle->cylinder }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.weight') }}
                        </th>
                        <td>
                            {{ $vehicle->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.license_plate') }}
                        </th>
                        <td>
                            {{ $vehicle->license_plate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.quilometers') }}
                        </th>
                        <td>
                            {{ $vehicle->quilometers }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.colour') }}
                        </th>
                        <td>
                            {{ $vehicle->colour }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.vat_margin') }}
                        </th>
                        <td>
                            {{ $vehicle->vat_margin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.average_consumption') }}
                        </th>
                        <td>
                            {{ $vehicle->average_consumption }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.consumption_city') }}
                        </th>
                        <td>
                            {{ $vehicle->consumption_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.highway_consumption') }}
                        </th>
                        <td>
                            {{ $vehicle->highway_consumption }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.co_2_emissions') }}
                        </th>
                        <td>
                            {{ $vehicle->co_2_emissions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.description') }}
                        </th>
                        <td>
                            {!! $vehicle->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vehicle.fields.photos') }}
                        </th>
                        <td>
                            @foreach($vehicle->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#vehicle_contacts" role="tab" data-toggle="tab">
                {{ trans('cruds.contact.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vehicle_contacts">
            @includeIf('admin.vehicles.relationships.vehicleContacts', ['contacts' => $vehicle->vehicleContacts])
        </div>
    </div>
</div>

@endsection