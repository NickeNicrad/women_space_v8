@extends('layouts.visitor')

@section('title', "WS | Toute l'Actualité")

@section('ws_meta')
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Toute l'Actualité">
    <meta property="og:image" content="{{ asset('/log/baseLogo.png') }}">
    <meta property="og:description" content="Toute l'Actualité de Women Space en Exclusivité">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="articles" />
@endsection

@section('content')

<div class="section">
    <div class="container">
        <div class="margin-bottom-30">
            <div class="row g-4">
                <div class="col-12 text-center">
                    <h2>Toute l'actualité</h2>
                </div>
            </div>
        </div>

        <div class="filter filter-style-3 text-center">
            <ul>
                <li data-filter="all">All</li>
                @foreach($categories as $category)
                    <li data-filter=".{{$category->title}}">{{$category->title}}</li>
                @endforeach
            </ul>
        </div>

        <div class="row portfolio-wrapper spacing-10 hover-style-2">

            @foreach($posts as $post)

                <div class="col-12 col-md-6 col-xl-4 portfolio-item {{$post->category->title}}">
                    <div class="portfolio-box">
                        <div style="border-radius: 10px;" class="portfolio-img">
                            <img style="border-radius: 10px; height: 230px; object-fit: cover;" src="{{ Storage::url(explode('|', $post->images)[0]) }}" alt="">
                        </div>
                        <a href="{{ url('actualité/' . $post->slug) }}"></a>
                        <div class="portfolio-title">
                            <div>
                                <span class="font-small">{{ $post->category->title }}</span>
                                <h5 class="fw-normal" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">{{ ucwords($post->title) }}</h5>
                            </div>
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

        <nav>
            <ul class="pagination justify-content-center margin-top-70">
                {!! $posts->render("pagination::bootstrap-4") !!}
            </ul>
        </nav>

    </div>
</div>

@endsection
