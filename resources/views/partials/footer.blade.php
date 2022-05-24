@php

    $address = DB::table('addresses')->latest()->first();
    $links = DB::table('links')->get();

@endphp

@empty(!$address)

<footer>
    <div class="section-sm padding-lg-40 bg-dark">
        <div class="container">
            <div class="row g-3" style="font-size: 13px;">
                <div class="col-12 col-sm-12 col-lg-3">
                    <img src="/log/baseLogo.png" style="height: 140px; width: 100%; object-fit: cover;" alt="">
                </div>
                <div class="col-12 col-sm-12 col-lg-3">
                    <h6 class="font-small fw-normal uppercase">Contacts</h6>
                    <ul class="list-unstyled">
                        <li class="d-flex"><i class="bi bi-geo-alt margin-right-10"></i> {{ $address->address }}</li>
                        <li><i class="bi bi-envelope margin-right-10"></i> {{ $address->email }}</li>
                        <li><i class="bi bi-telephone margin-right-10"></i> {{ $address->phone }}</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-12 col-lg-3">
                    <h6 class="font-small fw-normal uppercase">A Propos</h6>
                    <ul class="list-dash">
                        <li>
                            <a href="/a-propos/qui-sommes-nous">Qui Sommes-nous?</a>
                        </li>
                        <li>
                            <a href="/a-propos/notre-vision">Notre Vision</a>
                        </li>
                        <li>
                            <a href="/a-propos/rayon-activité">Rayon d'Activité</a>
                        </li>
                        <li>
                            <a href="/a-propos/motivation-de-creation">Motivation de Creation</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-12 col-lg-3">
                    <h6 class="font-small fw-normal uppercase">Actualités</h6>
                    <ul class="list-unstyled">
                        <li><a href="/actualités">Tous Actualités</a></li>
                    </ul>
                </div>
            </div>

            <hr class="margin-top-20 margin-bottom-20">

            <div class="row g-2">
                <div class="col-12 col-md-6 text-center text-md-start">
                    <small>&copy; <a href="https://web.facebook.com/nix.netwok/" target="_blank">2022 Nix inc, All Rights Reserved.</a></small>
                </div>
                <div class="col-12 col-md-6 text-center text-md-end">
                    <ul class="list-inline">
                        @foreach($links as $link)
                            <li>
                                <a href="{{strtolower($link->link)}}" target="_blank"><i class="bi bi-{{strtolower($link->title)}}"></i></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div><!-- end row(2) -->
        </div><!-- end container -->
    </div>
</footer>

@endempty
