@extends('layouts.visitor')

@php

    $posts = DB::table('posts')->latest()->paginate(9);
    $categories = DB::table('categories')->orderBy('title', 'asc')->get();

@endphp

@section('ws_meta')
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Galérie des images de Women Space">
    <meta property="og:image" content="{{ asset('/log/baseLogo.png') }}">
    <meta property="og:description" content="Toute les images de l'Actualité et des Evenements de Women Space en Exclusivité">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="gallery" />
@endsection

@section('content')
<div id="gallery" class="section bg-dark-lighter">
    <div class="container">

        <div class="filter filter-style-3 text-center">
            <ul>
                <li data-filter="all">All</li>
                @foreach($categories as $category)
                    <li data-filter=".category-{{$category->id}}">{{$category->title}}</li>
                @endforeach
            </ul>
        </div>

        <div class="row gallery-wrapper portfolio-wrapper hover-style-2 g-2">

            @foreach($posts as $post)
                @foreach(explode('|', $post->images) as $image)
                    <div class="col-12 col-md-4 gallery-box portfolio-item category-{{ $post->category_id }}">
                        <div class="gallery-img">
                            <a href="{{ Storage::url($image) }}" data-gallery-title="{{ $post->title }}">
                                <img style="height: 230px; object-fit: cover;" src="{{ Storage::url($image) }}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
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
