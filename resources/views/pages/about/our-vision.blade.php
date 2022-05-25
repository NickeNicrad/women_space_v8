@extends('layouts.visitor')

@php

    $about = DB::table('abouts')->where('category', 'our-vision')->first();

@endphp

@section('ws_meta')
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Aprops de Women Space | {{ $about->title }}">
    <meta property="og:image" content="{{ asset('/log/baseLogo.png') }}">
    <meta property="og:description" content="{{ $about->content }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="about" />
@endsection

@section('content')

@empty(!$about)
<!-- About section -->
<div class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-5">
                <h3 class="fw-light text-primary">{{ ucwords($about->title) }}</h3>
                <div>{!! $about->content !!}</div>
                <a class="button button-lg button-rounded button-reveal-right-dark margin-top-30" href="/contacts"><span>Entrer en Contact</span><i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="col-12 col-lg-7">
                <div class="row gallery-wrapper g-2">
                    @foreach(explode('|', $about->images) as $image)
                        <div class="col-12 col-md-6 gallery-box">
                            <div class="gallery-img">
                                <a href="{{ Storage::url($image) }}" data-gallery-title="{{ ucwords($about->title) }}">
                                    <img src="{{ Storage::url($image) }}" style="height: 400px; width: 100%; object-fit: cover;" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div><!-- end row/gallery-wrapper -->
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
@endempty

@endsection
