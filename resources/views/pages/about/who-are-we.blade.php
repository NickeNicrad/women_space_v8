@extends('layouts.visitor')

@php

    $about = DB::table('abouts')->where('category', 'who-are-we')->first();

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
<div class="section-xl bg-image parallax" data-bg-src="/images/static/1.jpg">
    <div class="bg-black-06">
        <div class="container text-center">
            <div class="row g-4">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h1 class="display-5 margin-0">QUI SOMMES-NOUS?</h1>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end bg-black-* -->
</div>

@include('components.stats')

<div class="section padding-top-0">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-7">
                <div class="owl-carousel owl-dots-overlay-left" data-owl-items="1" data-owl-autoplay="true">
                    @foreach(explode('|', $about->images) as $image)
                        <div>
                            <img src="{{ Storage::url($image) }}" style="height: 400px; width: 100%; object-fit: cover;" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-5 icon-5xl">
                <div class="row g-4">
                    <h3 class="fw-light text-primary">{{ $about->title }}</h3>
                    {!! $about->content !!}
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
@endempty

@endsection
