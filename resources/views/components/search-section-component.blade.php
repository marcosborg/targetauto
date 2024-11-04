<section id="search-section">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <!-- Added mx-auto class here -->
            <form action="/search-section/search" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select name="search_section_brand_id" class="form-control" id="search_section_brand_id" onchange="searchSectionGetModels()">
                                <option value="0">All brands</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand['id'] }}">{{ $brand['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <select name="search_section_car_model_id" id="search_section_car_model_id" class="form-control">
                                <option value="0">Models</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme form-control">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@section('scripts')
@parent
<script>
    searchSectionGetModels = () => {
        let section = $('#search-section');
        section.LoadingOverlay('show');
        let brand_id = $('#search_section_brand_id');
        let car_model_id = $('#search_section_car_model_id');
        if (brand_id == 0) {
            setTimeout(() => {
                let html = '<option value="0">Models</option>';
                car_model_id.html(html);
                section.LoadingOverlay('hide');
            }, 500);
        } else {
            $.get('/search-section/get-models/' + brand_id.val()).then((resp) => {
                console.log(resp);
                let html = '<option value="0">Models</option>';
                $.each(resp, function(index, model) {
                    html += '<option value="' + model.id + '">' + model.name + '</option>';
                });
                car_model_id.html(html);
                section.LoadingOverlay('hide');
            });
        }

    }

</script>
@endsection
