@extends('layouts.visitor')

@section('title', 'WS | ' . ucwords($post->title))
@section('keywords', $post->category->title)

@section('ws_meta')
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ ucwords($post->title) }}">
    <meta property="og:author" content="{{ $post->author->name ?: 'Nix, inc' }}" />
    <meta property="og:image" content="{{ Storage::url(explode('|', $post->images)[0]) }}">
    <meta property="og:description" content="{{ $post->content }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="article" />
@endsection

@section('content')

<div class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-lg-8">
                <!-- Blog Post box 1 -->
                <div class="margin-bottom-0">
                    <div class="owl-carousel owl-nav-overlay" data-owl-items="1" data-owl-nav="true" data-owl-dots="false">
                        @foreach(explode('|', $post->images) as $image)
                            <img src="{{ Storage::url($image) }}" style="height: 390px; width: 100%; object-fit: cover;" alt="">
                        @endforeach
                    </div>
                    <div class="margin-top-30">
                        <div class="d-flex justify-content-between margin-bottom-10">
                            <div class="d-inline-flex">
                                <a class="font-family-tertiary font-small fw-normal uppercase" href="#">
                                    {{ucfirst($post->category->title)}}
                                </a>
                            </div>
                            <div class="d-inline-flex gap-3">
                                <span class="font-small">
                                    <a href="#">{{$post->author->name}}</a> - {{ date('M d, Y', strtotime($post->created_at)) }}
                                </span>
                                <span class="font-small">
                                    <a href="#"><i class="bi bi-share"></i> Partager</a>
                                </span>
                            </div>
                        </div>
                        <h5><a href="#" onclick="return func(0)">{{ ucwords($post->title) }}</a></h5>
                        <p>{!! ucfirst($post->content) !!}</p>
                        <div class="margin-top-0">
                            <a class="button-text-1" href="#">Lire Plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Blog Posts -->

            <!-- Blog Sidebar -->
            <div class="col-12 col-lg-4 sidebar-wrapper">
                <!-- Sidebar box 3 - Popular Posts -->
                <div class="sidebar-box" style="padding: 15px;">
                    <h6 class="font-small fw-normal uppercase">Autres Articles</h6>

                    @foreach($posts as $item)
                        <div class="popular-post">
                            <a href="{{ url('actualité/' . $item->slug) }}">
                                <img src="{{ Storage::url(explode('|', $item->images)[0]) }}" style="height: 60px; object-fit: cover; border-radius: 0.2rem;" alt="">
                            </a>
                            <div>
                                <h6 class="font-small fw-medium">
                                    <a href="{{ url('actualité/' . $item->slug) }}" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">{{ ucwords($item->title) }}</a>
                                </h6>
                                <small>{{ date('M d, Y', strtotime($item->created_at)) }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="sidebar-box">
                    <h6 class="font-small fw-normal uppercase">Categories</h6>
                    <ul class="list-category">
                        @foreach($categories as $category)
                            <li><a href="#">{{ucwords($category->title)}} <span>{{$category->posts->count()}}</span></a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Sidebar box 6 - Facebook Like box -->
                <div class="sidebar-box text-center">
                    <h6 class="font-small fw-normal uppercase">Suivez-nous Sur</h6>
                    <ul class="list-inline">
                        @foreach($links as $link)
                            <li>
                                <a href="{{strtolower($link->link)}}" target="_blank"><i class="bi bi-{{strtolower($link->title)}}"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- end Blog Sidebar -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>

@endsection
