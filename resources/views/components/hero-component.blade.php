@if ($heros)
<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        @foreach ($heros as $key => $hero)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ $hero->image->getUrl() }}" alt="">
            <div class="carousel-container">
                <div>
                    <p>{{ $hero->subtitle }}</p>
                    <h2>{{ $hero->title }}</h2>
                    <a href="{{ $hero->link }}" class="btn-get-started">{{ $hero->button }}</a>
                </div>
            </div>
        </div><!-- End Carousel Item -->
        @endforeach



        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

    </div>

</section><!-- /Hero Section -->
@endif
