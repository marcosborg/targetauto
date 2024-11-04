<!-- Agents Section -->
<section id="agents" class="agents section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Latest stock</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-5">

            @foreach ($vehicles as $vehicle)
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="pic"><img src="{{ $vehicle['photos'][0]['url'] }}" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h3>{{ $vehicle['car_model']['brand']['name'] }} {{ $vehicle['car_model']['name'] }}</h3>
                        <span>{{ $vehicle['type'] }}</span>
                        <h4>{{ number_format($vehicle['price'], 0, ',', '.') }}€</h4>
                        <div class="d-grid gap-2">
                            <a href="/vehicle/{{ $vehicle['id'] }}/{{ Str::slug($vehicle['car_model']['brand']['name'] . ' ' . $vehicle['car_model']['name'] . ' ' . $vehicle['type']) }}" class="btn btn-theme btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div><!-- End Team Member -->
            @endforeach
        </div>

    </div>

</section><!-- /Agents Section -->
