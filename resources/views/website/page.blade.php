@extends('layouts.website')
@section('content')
<section style="padding: 100px 0">
    <div class="container">
        <div class="row">
            @if ($page->featured_image)
            <div class="col-md-6">
                <img src="{{ $page->featured_image->getUrl() }}" class="img-thumbnail">
            </div>
            @endif
            <div class="col">
                <h1>{{ $page->title }}</h1>
                @if ($page->excerpt)
                    <h4>{{ $page->excerpt }}</h4>
                @endif
                {!! $page->page_text !!}
            </div>
        </div>
    </div>
</section>
<x-contact-component />
@endsection
