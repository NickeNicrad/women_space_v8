@php

    $about_us = DB::table('abouts')->where('category', 'who-are-we')->first();
    $links = DB::table('links')->get();

@endphp


@empty(!$about_us)

<div id="about" class="section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-12 col-lg-7">
                <div class="owl-carousel owl-dots-overlay-left" data-owl-items="1" data-owl-autoplay="true">
                    @foreach(explode('|', $about_us->images) as $image)
                        <div>
                            <img src="{{ Storage::url($image) }}" style="height: 400px; width: 100%; object-fit: cover;" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <h3 class="fw-medium uppercase letter-spacing-1 text-primary">Qui sommes-nous?</h3>
                <p>{!! $about_us->content !!}</p>
                <ul class="list-inline-sm margin-top-30">

                    @foreach($links as $link)
                        <li>
                            <a class="button-circle button-circle-sm button-circle-outline-dark button-circle-hover-slide" href="{{ strtolower($link->link) }}" target="_blank">
                                <i class="bi bi-{{ strtolower($link->title) }}"></i>
                                <i class="bi bi-{{ strtolower($link->title) }}"></i>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end About section -->

@endempty
