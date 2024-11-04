@if ($services)
    
<!-- Services Section -->
<section id="services" class="services section" style="padding-top: 0px;">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item  position-relative">
                    <div class="icon">
                        {!! $service->icon !!}
                    </div>
                    <a href="{{ $service->link }}" class="stretched-link">
                        <h3>{{ $service->title }}</h3>
                    </a>
                    <p>{{ $service->text }}</p>
                </div>
            </div><!-- End Service Item -->
            @endforeach
        </div>

    </div>

</section><!-- /Services Section -->

@endif