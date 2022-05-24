@extends('layouts.visitor')

@php

    $partners = [];

@endphp

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
    <!-- Hero section -->
    <div class="section-fullscreen bg-image parallax" data-bg-src="images/static/2.jpg">
        <div class="bg-black-05">
            <div class="container text-center">
                <div class="position-middle">
                    <div class="row margin-0">
                        <div class="col-12 col-md-10 offset-md-1 col-lg-7 margin-0">
                            <h1 class="fw-light line-height-160 margin-0">La réduction de la pauvreté en RDC tant prônée de nos jours par les pouvoirs publics passe d’abord par la prise en compte des réalités quotidiennes des populations.</h1>
                        </div>
                    </div><!-- end row -->
                </div>
                <div class="position-bottom icon-2xl margin-bottom-20">
                    <a href="#about"><i class="bi bi-arrow-down"></i></a>
                </div>
            </div><!-- end container -->
        </div><!-- end bg-black-* -->
    </div>
    <!-- end Hero section -->

    @empty(!$partners)
        @include('components.partners-banner')
    @endempty

    @include('components.about-us')

    <div class="container text-center">
        <div class="row g-4">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h2 class="fw-light line-height-160 margin-0">Les organes des Gestion Women's Space sont au nombre de quatre</h2>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->

    <!-- Services section -->
    <div class="section">
        <div class="container">
            <div class="row icon-5xl g-4">
                <div class="col-12 col-lg-3">
                    <div class="border-all padding-20">
                        <i class="bi bi-bank text-primary margin-bottom-10"></i>
                        <h6 class="fw-medium uppercase" style="font-size: 13.5px; letter-spacing: 0.7px;">Assemblée Generale</h6>
                        <small>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</small>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="border-all padding-20">
                        <i class="bi bi-people text-primary margin-bottom-10"></i>
                        <h6 class="fw-medium uppercase" style="font-size: 13.5px; letter-spacing: 0.7px;">Commuté Directeur</h6>
                        <small>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</small>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="border-all padding-20">
                        <i class="bi bi-briefcase text-primary margin-bottom-10"></i>
                        <h6 class="fw-medium uppercase" style="font-size: 13.5px; letter-spacing: 0.7px;">College des Commissaires</h6>
                        <small>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</small>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="border-all padding-20">
                        <i class="bi bi-bricks text-primary margin-bottom-10"></i>
                        <h6 class="fw-medium uppercase" style="font-size: 13.5px; letter-spacing: 0.7px;">College des Fondateurs</h6>
                        <small>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</small>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <!-- end Services setion -->

    @include('components.youtube')
@endsection
