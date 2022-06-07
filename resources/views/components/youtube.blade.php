@php
    $youtube = DB::table('links')->where('title', 'youtube')->get()->first();
@endphp

@empty(!$youtube)
<div class="section-2xl bg-image parallax" data-bg-src="images/static/4.jpg">
    <div class="bg-black-05">
        <div class="container text-center">
            <a class="button-circle button-circle-xl button-circle-outline-white button-hover-shrink button-circle-animation-drop icon-xl margin-top-20 lightbox-media-link" href="{{$youtube->link}}"><i class="bi bi-play"></i></a>
        </div>
    </div>
</div>
@endempty
