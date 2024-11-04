@extends('layouts.website')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')
<section id="agents" class="agents section" style="padding-top: 150px;">
    <div class="container">
        <div class="container section-title" data-aos="fade-up">
            <h2>Vehicles</h2>
        </div>
        <div class="row" id=ajax></div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    (() => {
        $.get('/vehicles/ajax/{{ $brand_id }}/{{ $car_model_id }}/0/0/0').then((resp) => {
            $('#ajax').html(resp);
        });
    })();
    changeBrand = () => {
        let brand_id = $('#brand_id').val();
        $.get('/vehicles/ajax/' + brand_id + '/0/0/0/0').then((resp) => {
            $('#ajax').html(resp);
            replaceUrl();
        });
    }
    changeModel = () => {
        let brand_id = $('#brand_id').val();
        let car_model_id = $('#car_model_id').val();
        $.get('/vehicles/ajax/' + brand_id + '/' + car_model_id + '/0/0/0').then((resp) => {
            $('#ajax').html(resp);
            replaceUrl();
        });
    }
    filter = () => {
        let brand_id = $('#brand_id').val();
        let car_model_id = $('#car_model_id').val();
        let year_id = $('#year_id').val();
        let fuel_id = $('#fuel_id').val();
        let transmission_id = $('#transmission_id').val();
        $.get('/vehicles/ajax/' + brand_id + '/' + car_model_id + '/' + year_id + '/' + fuel_id + '/' + transmission_id + '').then((resp) => {
            $('#ajax').html(resp);
            replaceUrl();
        });
    }
    resetFilters = () => {
        $.get('/vehicles/ajax/0/0/0/0/0').then((resp) => {
            $('#ajax').html(resp);
            replaceUrl();
        });
    }

    replaceUrl = () => {
        let url = $('#url').val();
        history.pushState(null, null, url);
    }

</script>
@endsection
