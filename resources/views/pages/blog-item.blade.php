@extends('layouts.visitor')

@section('title', 'WS | ' . ucwords($post->title))
@section('keywords', $post->category->title)

@section('ws_meta')
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ ucwords($post->title) }}">
    <meta property="og:author" content="{{ $post->author->name ?: 'Nix, inc' }}">
    <meta property="og:image" content="{{ asset(Storage::url(explode('|', $post->images)[0])) }}">
    <meta property="og:description" content="{{ ucfirst($post->content) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="article">
@endsection

@section('content')
<div class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-lg-8">
                <div class="margin-bottom-0">
                    <div class="owl-carousel owl-nav-overlay" data-owl-items="1" data-owl-nav="true" data-owl-dots="false">
                        @foreach(explode('|', $post->images) as $image)
                            <img src="{{ Storage::url($image) }}" style="height: 390px; width: 100%; object-fit: cover;" alt="">
                        @endforeach
                    </div>
                    <div class="margin-top-30">
                        <div class="d-inline-flex">
                            <a class="font-family-tertiary font-small fw-bold uppercase" href="#">
                                {{ucfirst($post->category->title)}}
                            </a>
                        </div>
                        <div class="d-flex gap-3 justify-content-between margin-bottom-10">
                            <div class="font-small">
                                <span>{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                                <span>  <a href="#">{{$post->author->name}}</a></span>
                            </div>
                            <span class="font-large d-flex gap-3">
                                <small class="font-small d-block d-lg-none">Partager</small>
                                <a target="_blank" href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo urlencode(ucwords($post->title)); ?>&amp;p[summary]=<?php echo urlencode(ucfirst($post->content)) ?>&amp;p[url]=<?php echo urlencode(url()->current()); ?>&amp;p[images][0]=<?php echo urlencode(asset(Storage::url(explode('|', $post->images)[0]))); ?>"><i class="bi bi-facebook"></i></a>
                                <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo ucwords($post->title) ?>&amp;url={{ url()->current() }}"><i class="bi bi-twitter"></i></a>
                                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url()->current() }}&amp;title={{ ucwords($post->title) }}&amp;summary={{ ucfirst($post->content) }}"><i class="bi bi-linkedin"></i></a>
                                <a target="_blank" href="https://wa.me/?text={{ url()->current() }}"><i class="bi bi-whatsapp"></i></a>
                            </span>
                        </div>
                        <h5><a href="#" onclick="return func(0)">{{ ucwords($post->title) }}</a></h5>
                        <div>{!! ucfirst($post->content) !!}</div>
                        <div class="margin-top-0">
                            <a class="button-text-1" href="#">Lire Plus</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 sidebar-wrapper">
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
        </div>
    </div>
</div>
@endsection
