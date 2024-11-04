@extends('layouts.admin')
@section('content')
@can('vehicle_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.vehicles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vehicle.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vehicle.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Vehicle">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.api') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.car_model') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.year') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.fuel') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.transmission') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.bodywork') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.power') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.cylinder') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.weight') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.license_plate') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.quilometers') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.colour') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.vat_margin') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.average_consumption') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.consumption_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.highway_consumption') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.co_2_emissions') }}
                    </th>
                    <th>
                        {{ trans('cruds.vehicle.fields.photos') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($car_models as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($years as $key => $item)
                                <option value="{{ $item->number }}">{{ $item->number }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($fuels as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($transmissions as $key => $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('vehicle_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vehicles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.vehicles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'api', name: 'api' },
{ data: 'car_model_name', name: 'car_model.name' },
{ data: 'year_number', name: 'year.number' },
{ data: 'price', name: 'price' },
{ data: 'fuel_name', name: 'fuel.name' },
{ data: 'transmission_name', name: 'transmission.name' },
{ data: 'type', name: 'type' },
{ data: 'bodywork', name: 'bodywork' },
{ data: 'power', name: 'power' },
{ data: 'cylinder', name: 'cylinder' },
{ data: 'weight', name: 'weight' },
{ data: 'license_plate', name: 'license_plate' },
{ data: 'quilometers', name: 'quilometers' },
{ data: 'colour', name: 'colour' },
{ data: 'vat_margin', name: 'vat_margin' },
{ data: 'average_consumption', name: 'average_consumption' },
{ data: 'consumption_city', name: 'consumption_city' },
{ data: 'highway_consumption', name: 'highway_consumption' },
{ data: 'co_2_emissions', name: 'co_2_emissions' },
{ data: 'photos', name: 'photos', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Vehicle').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection