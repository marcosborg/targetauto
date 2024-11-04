@extends('layouts.website')
@section('content')
<section id="vehicle">
    <div class="container">
        <div class="page-title" data-aos="fade">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><a href="/vehicles/0/0/all-brands/all-models">Vehicles</a></li>
                        <li class="current">{{ $vehicle->car_model->brand->name }} {{ $vehicle->car_model->name }} - {{ $vehicle->year->number }}</li>
                    </ol>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- Main Slider -->
                <div class="swiper main-swiper">
                    <div class="swiper-wrapper">
                        <!-- Main Slides -->
                        @foreach ($vehicle->photos as $photo)
                        <div class="swiper-slide">
                            <!-- Swiper Zoom Container -->
                            <div class="swiper-zoom-container">
                                <img src="{{ $photo->getUrl() }}" class="img-fluid">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation Buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

                <!-- Thumbnail Slider -->
                <div class="swiper thumbnail-swiper mt-3">
                    <div class="swiper-wrapper">
                        <!-- Thumbnail Slides -->
                        @foreach ($vehicle->photos as $photo)
                        <div class="swiper-slide">
                            <img src="{{ $photo->getUrl() }}" class="img-fluid thumbnail-img">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Additional content can go here -->
                <div class="vehicle-info">
                    <!-- Model and Year -->
                    <h2>{{ $vehicle->car_model->brand->name }} {{ $vehicle->car_model->name }} - {{ $vehicle->year->number }}</h2>

                    <!-- Price -->
                    <p><strong>Price:</strong> {{ number_format($vehicle->price, 0, ',', '.') }}€</p>

                    <!-- Basic Info -->
                    <ul class="list-unstyled">
                        <li><strong>Fuel:</strong> {{ $vehicle->fuel->name }}</li>
                        <li><strong>Transmission:</strong> {{ $vehicle->transmission->name }}</li>
                        <li><strong>Type:</strong> {{ $vehicle->type }}</li>
                        <li><strong>Bodywork:</strong> {{ $vehicle->bodywork }}</li>
                    </ul>

                    <!-- Performance -->
                    <h4>Performance</h4>
                    <ul class="list-unstyled">
                        <li><strong>Power:</strong> {{ $vehicle->power }}</li>
                        <li><strong>Cylinder:</strong> {{ $vehicle->cylinder }}</li>
                        <li><strong>Weight:</strong> {{ $vehicle->weight }} kg</li>
                    </ul>

                    <!-- Vehicle Details -->
                    <h4>Vehicle Details</h4>
                    <ul class="list-unstyled">
                        <li><strong>License Plate:</strong> {{ $vehicle->license_plate }}</li>
                        <li><strong>Kilometers:</strong> {{ $vehicle->quilometers }}</li>
                        <li><strong>Colour:</strong> {{ $vehicle->colour }}</li>
                        <li><strong>VAT/Margin:</strong> {{ $vehicle->vat_margin }}</li>
                    </ul>

                    <!-- Consumption -->
                    <h4>Fuel Consumption</h4>
                    <ul class="list-unstyled">
                        <li><strong>Average Consumption:</strong> {{ $vehicle->average_consumption }}</li>
                        <li><strong>City Consumption:</strong> {{ $vehicle->consumption_city }}</li>
                        <li><strong>Highway Consumption:</strong> {{ $vehicle->highway_consumption }}</li>
                        <li><strong>CO2 Emissions:</strong> {{ $vehicle->co_2_emissions }}</li>
                    </ul>

                    <button class="btn btn-theme btn-lg" data-bs-toggle="modal" data-bs-target="#contact_vehicle">Contact for vehicle</button>
                    <br>
                    <a href="/pdf/{{ $vehicle->id }}" target="_new" class="btn btn-primary mt-4">Make PDF</a>

                    <!-- Modal -->
                    <div class="modal fade" id="contact_vehicle" tabindex="-1" aria-labelledby="contact_vehicle_label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="contact_vehicle_label">Contact for vehicle</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/forms/vehicle_contact" method="post" id="vehicle_contact">
                                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                                    @csrf
                                    <div class="modal-body row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <select class="form-control" name="country" id="country" required="" onchange="selectCountry()">
                                                <option selected disabled>Select</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name }}|{{ $country->short_code }}">{{ $country->name }} ({{ $country->short_code }})</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="phone_code">+###</span>
                                                <input type="text" class="form-control" name="phone" placeholder="Your Phone Number" required="">
                                            </div>
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-theme">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    #vehicle {
        padding-top: 150px;
    }

    /* Main Swiper */
    .main-swiper {
        width: 100%;
        height: auto;
    }

    .main-swiper .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Thumbnail Swiper */
    .thumbnail-swiper {
        width: 100%;
        height: 100px;
        /* Adjust the height of the thumbnail swiper */
    }

    .thumbnail-swiper .swiper-slide {
        width: auto;
        /* Adjust the width of the thumbnails */
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.4;
        /* Default opacity */
    }

    .thumbnail-swiper .swiper-slide-thumb-active {
        opacity: 1;
        /* Opacity for active thumbnail */
    }

    /* Adjust image styles */
    .main-swiper .swiper-slide img {
        max-width: 100%;
        height: auto;
    }

    .thumbnail-img {
        max-width: 100%;
        height: auto;
    }

    /* Custom Swiper Styles */
    /* Pagination Dots */
    .swiper-pagination-bullet {
        background-color: #cc6600;
        /* Custom color for pagination dots */
    }

    .swiper-pagination-bullet-active {
        background-color: #cc6600;
        /* Custom color for the active pagination dot */
    }

    /* Navigation Arrows */
    .swiper-button-next,
    .swiper-button-prev {
        color: #cc6600;
        /* Custom color for navigation arrows */
    }

    /* Adjust the size of the navigation arrows */
    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 20px;
    }

</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Initialize the thumbnail swiper
    const thumbnailSwiper = new Swiper('.thumbnail-swiper', {
        spaceBetween: 10
        , slidesPerView: 4, // Number of thumbnails visible
        freeMode: true
        , watchSlidesVisibility: true
        , watchSlidesProgress: true
    , });

    // Initialize the main swiper and link it with the thumbnail swiper
    const mainSwiper = new Swiper('.main-swiper', {
        loop: true
        , spaceBetween: 10,

        // Enable Zoom
        zoom: {
            maxRatio: 5, // Maximum zoom level
        },

        // Pagination
        pagination: {
            el: '.swiper-pagination'
            , clickable: true
        , },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next'
            , prevEl: '.swiper-button-prev'
        , },

        // Link with the thumbnail swiper
        thumbs: {
            swiper: thumbnailSwiper
        , }
    , });

    $(() => {
        $('#vehicle_contact').ajaxForm({
            beforeSubmit: () => {
                $.LoadingOverlay('show');
            }
            , success: () => {
                $.LoadingOverlay('hide');
                Swal.fire("Send successfuly!").then(() => {
                    location.reload();
                });
            }
            , error: (error) => {
                console.log(error);
            }
        });
    });

    selectCountry = () => {
        var data = $('#country').val();
        var splitData = data.split('|');
        var country_name = splitData[0];
        var country_code = splitData[1];
        $('#phone_code').text(country_code);
    }

</script>
@endsection
