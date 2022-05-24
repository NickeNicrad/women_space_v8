@php

    $posts = DB::table('posts')->get();

@endphp

<div class="section">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-4 col-lg-2">
                <h2 class="fw-light margin-0"><span class="counter">{{ $posts->count() }}</span></h2>
                <p>Actualités</p>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <h2 class="fw-light margin-0"><span class="counter">4</span></h2>
                <p>Partenaires</p>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <h2 class="fw-light margin-0"><span class="counter">1</span></h2>
                <p>Projets Réaliser</p>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
