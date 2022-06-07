@extends('layouts.visitor')

@section('ws_meta')
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Page d'acceuil de Women Space">
    <meta property="og:image" content="{{ asset('/log/baseLogo.png') }}">
    <meta property="og:description" content="Page d'acceuil de Women Space avec toute les informations brievement detaillé">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="page" />
@endsection

@section('content')
    <div class="section-fullscreen bg-image parallax" data-bg-src="images/static/2.jpg">
        <div class="bg-black-05">
            <div class="container text-center">
                <div class="position-middle">
                    <div class="row margin-0">
                        <div class="col-12 col-md-10 offset-md-1 col-lg-7 margin-0">
                            <h1 class="fw-light line-height-160 margin-0">
                                <p>Woman's Space</p>
                                <p>Connecter, Motiver, Encourager, Inspirer, Soutenir</p>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="position-bottom icon-2xl margin-bottom-20">
                    <a href="#about"><i class="bi bi-arrow-down"></i></a>
                </div>
            </div>
        </div>
    </div>

    @include('components.partners-banner')

    @include('components.about-us')

    @include('components.section-card')

    @include('components.youtube')
@endsection
