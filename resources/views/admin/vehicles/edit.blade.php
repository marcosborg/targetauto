@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.vehicle.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vehicles.update", [$vehicle->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('api') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="api" value="0">
                    <input class="form-check-input" type="checkbox" name="api" id="api" value="1" {{ $vehicle->api || old('api', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="api">{{ trans('cruds.vehicle.fields.api') }}</label>
                </div>
                @if($errors->has('api'))
                    <div class="invalid-feedback">
                        {{ $errors->first('api') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.api_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="car_model_id">{{ trans('cruds.vehicle.fields.car_model') }}</label>
                <select class="form-control select2 {{ $errors->has('car_model') ? 'is-invalid' : '' }}" name="car_model_id" id="car_model_id" required>
                    @foreach($car_models as $id => $entry)
                        <option value="{{ $id }}" {{ (old('car_model_id') ? old('car_model_id') : $vehicle->car_model->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('car_model'))
                    <div class="invalid-feedback">
                        {{ $errors->first('car_model') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.car_model_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="year_id">{{ trans('cruds.vehicle.fields.year') }}</label>
                <select class="form-control select2 {{ $errors->has('year') ? 'is-invalid' : '' }}" name="year_id" id="year_id" required>
                    @foreach($years as $id => $entry)
                        <option value="{{ $id }}" {{ (old('year_id') ? old('year_id') : $vehicle->year->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('year'))
                    <div class="invalid-feedback">
                        {{ $errors->first('year') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.vehicle.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $vehicle->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fuel_id">{{ trans('cruds.vehicle.fields.fuel') }}</label>
                <select class="form-control select2 {{ $errors->has('fuel') ? 'is-invalid' : '' }}" name="fuel_id" id="fuel_id" required>
                    @foreach($fuels as $id => $entry)
                        <option value="{{ $id }}" {{ (old('fuel_id') ? old('fuel_id') : $vehicle->fuel->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('fuel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fuel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.fuel_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transmission_id">{{ trans('cruds.vehicle.fields.transmission') }}</label>
                <select class="form-control select2 {{ $errors->has('transmission') ? 'is-invalid' : '' }}" name="transmission_id" id="transmission_id" required>
                    @foreach($transmissions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('transmission_id') ? old('transmission_id') : $vehicle->transmission->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transmission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transmission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.transmission_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.vehicle.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', $vehicle->type) }}">
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bodywork">{{ trans('cruds.vehicle.fields.bodywork') }}</label>
                <input class="form-control {{ $errors->has('bodywork') ? 'is-invalid' : '' }}" type="text" name="bodywork" id="bodywork" value="{{ old('bodywork', $vehicle->bodywork) }}">
                @if($errors->has('bodywork'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bodywork') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.bodywork_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="power">{{ trans('cruds.vehicle.fields.power') }}</label>
                <input class="form-control {{ $errors->has('power') ? 'is-invalid' : '' }}" type="text" name="power" id="power" value="{{ old('power', $vehicle->power) }}">
                @if($errors->has('power'))
                    <div class="invalid-feedback">
                        {{ $errors->first('power') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.power_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cylinder">{{ trans('cruds.vehicle.fields.cylinder') }}</label>
                <input class="form-control {{ $errors->has('cylinder') ? 'is-invalid' : '' }}" type="text" name="cylinder" id="cylinder" value="{{ old('cylinder', $vehicle->cylinder) }}">
                @if($errors->has('cylinder'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cylinder') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.cylinder_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="weight">{{ trans('cruds.vehicle.fields.weight') }}</label>
                <input class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" type="text" name="weight" id="weight" value="{{ old('weight', $vehicle->weight) }}">
                @if($errors->has('weight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="license_plate">{{ trans('cruds.vehicle.fields.license_plate') }}</label>
                <input class="form-control {{ $errors->has('license_plate') ? 'is-invalid' : '' }}" type="text" name="license_plate" id="license_plate" value="{{ old('license_plate', $vehicle->license_plate) }}">
                @if($errors->has('license_plate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('license_plate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.license_plate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quilometers">{{ trans('cruds.vehicle.fields.quilometers') }}</label>
                <input class="form-control {{ $errors->has('quilometers') ? 'is-invalid' : '' }}" type="text" name="quilometers" id="quilometers" value="{{ old('quilometers', $vehicle->quilometers) }}">
                @if($errors->has('quilometers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quilometers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.quilometers_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="colour">{{ trans('cruds.vehicle.fields.colour') }}</label>
                <input class="form-control {{ $errors->has('colour') ? 'is-invalid' : '' }}" type="text" name="colour" id="colour" value="{{ old('colour', $vehicle->colour) }}">
                @if($errors->has('colour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('colour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.colour_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat_margin">{{ trans('cruds.vehicle.fields.vat_margin') }}</label>
                <input class="form-control {{ $errors->has('vat_margin') ? 'is-invalid' : '' }}" type="text" name="vat_margin" id="vat_margin" value="{{ old('vat_margin', $vehicle->vat_margin) }}">
                @if($errors->has('vat_margin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vat_margin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.vat_margin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="average_consumption">{{ trans('cruds.vehicle.fields.average_consumption') }}</label>
                <input class="form-control {{ $errors->has('average_consumption') ? 'is-invalid' : '' }}" type="text" name="average_consumption" id="average_consumption" value="{{ old('average_consumption', $vehicle->average_consumption) }}">
                @if($errors->has('average_consumption'))
                    <div class="invalid-feedback">
                        {{ $errors->first('average_consumption') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.average_consumption_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="consumption_city">{{ trans('cruds.vehicle.fields.consumption_city') }}</label>
                <input class="form-control {{ $errors->has('consumption_city') ? 'is-invalid' : '' }}" type="text" name="consumption_city" id="consumption_city" value="{{ old('consumption_city', $vehicle->consumption_city) }}">
                @if($errors->has('consumption_city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('consumption_city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.consumption_city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="highway_consumption">{{ trans('cruds.vehicle.fields.highway_consumption') }}</label>
                <input class="form-control {{ $errors->has('highway_consumption') ? 'is-invalid' : '' }}" type="text" name="highway_consumption" id="highway_consumption" value="{{ old('highway_consumption', $vehicle->highway_consumption) }}">
                @if($errors->has('highway_consumption'))
                    <div class="invalid-feedback">
                        {{ $errors->first('highway_consumption') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.highway_consumption_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="co_2_emissions">{{ trans('cruds.vehicle.fields.co_2_emissions') }}</label>
                <input class="form-control {{ $errors->has('co_2_emissions') ? 'is-invalid' : '' }}" type="text" name="co_2_emissions" id="co_2_emissions" value="{{ old('co_2_emissions', $vehicle->co_2_emissions) }}">
                @if($errors->has('co_2_emissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('co_2_emissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.co_2_emissions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.vehicle.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $vehicle->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photos">{{ trans('cruds.vehicle.fields.photos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
                </div>
                @if($errors->has('photos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vehicle.fields.photos_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.vehicles.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $vehicle->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.vehicles.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($vehicle) && $vehicle->photos)
      var files = {!! json_encode($vehicle->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection