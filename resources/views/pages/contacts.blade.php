@extends('layouts.visitor')

@section('ws_meta')
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Contactez-nous">
    <meta property="og:image" content="{{ asset('/log/baseLogo.png') }}">
    <meta property="og:description" content="Veillez nous contacter pour plus d'information sur Women Space">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="contacts" />
@endsection

@section('content')

@empty(!$address)

<!-- Google Maps -->
<div class="section padding-lg-40">
	<div class="container">
        <iframe src="https://www.google.com/maps/embed/v1/place?q=<?php echo $address->location ?>&amp;key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4" style="width: 100%; height: 450px; overflow:hidden; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>
<!-- end Google Maps -->

<!-- Contact section -->
<div class="section padding-top-0" style="padding-bottom: 25px;">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="contact-form text-sm-end">
                    <form action="route('contacts.store')" method="POST" id="contactform" style="font-size: 11px;">
                        <div class="row gx-3 gy-0">
                            <div class="col-12 col-sm-6">
                                <input style="border-radius: 0.2rem; font-size: 12px;" type="text" id="name" name="name" placeholder="Votre Nom" required>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input style="border-radius: 0.2rem; font-size: 12px;" type="email" id="email" name="email" placeholder="E-Mail" required>
                            </div>
                        </div>
                        <input style="border-radius: 0.2rem; font-size: 12px;" type="text" id="subject" name="subject" placeholder="Objet" required>
                        <textarea style="border-radius: 0.2rem; font-size: 12px;" name="message" id="message" placeholder="Message"></textarea>
                        <button style="border-radius: 0.2rem; font-size: 12px;" class="button button-sm button-outline-dark-2" type="submit">Envoyer</button>
                    </form>
                    <!-- Submit result -->
                    <div class="submit-result">
                        <span id="success">Thank you! Your Message has been sent.</span>
                        <span id="error">Something went wrong, Please try again!</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-1">
            </div>

            <div class="col-12 col-md-5">
                <div class="d-flex gap-2 margin-bottom-30">
                    <div>
                        <a class="button-circle button-circle-sm button-circle-outline-dark button-circle-hover-slide" href="#" target="_blank">
                            <i class="bi bi-telephone"></i>
                            <i class="bi bi-telephone"></i>
                        </a>
                    </div>
                    <div style="border-radius: 0.2rem; font-size: 13px;">
                        <h6 class="fw-normal margin-0">Téléphone:</h6>
                        <p>{{ $address->phone }}</p>
                    </div>
                </div>
                <div class="d-flex gap-2 margin-bottom-30">
                    <div>
                        <a class="button-circle button-circle-sm button-circle-outline-dark button-circle-hover-slide" href="#" target="_blank">
                            <i class="bi bi-envelope"></i>
                            <i class="bi bi-envelope"></i>
                        </a>
                    </div>
                    <div style="border-radius: 0.2rem; font-size: 13px;">
                        <h6 class="fw-normal margin-0">Adresse Electronique:</h6>
                        <p>{{ $address->email }}</p>
                    </div>
                </div>
                <div class="d-flex gap-2 margin-bottom-30">
                    <div>
                        <a class="button-circle button-circle-sm button-circle-outline-dark button-circle-hover-slide" href="#" target="_blank">
                            <i class="bi bi-geo-alt"></i>
                            <i class="bi bi-geo-alt"></i>
                        </a>
                    </div>
                    <div style="border-radius: 0.2rem; font-size: 13px;">
                        <h6 class="fw-normal margin-0">Adresse Physique:</h6>
                        <p>{{ ucfirst($address->address) }}</p>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Contact section -->

@endempty
@endsection
