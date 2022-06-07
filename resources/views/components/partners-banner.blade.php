@php
    $partners = DB::table('partners')->latest()->get();
@endphp

@if($partners->count() > 0)
    <div class="section-sm bg-grey-lighter padding-10">
        <div class="container">
            <div class="owl-carousel" data-owl-nav="true" data-owl-dots="false" data-owl-margin="50" data-owl-autoplay="true" data-owl-xs="1" data-owl-sm="2" data-owl-md="3" data-owl-lg="4" data-owl-xl="5">
                @foreach($partners as $partner)
                    <div class="client-box">
                        <a href="{{$partner->link}}" target="_blank">
                            <img src="{{Storage::url($partner->logo)}}" alt="{{$partner->name}}" style="width: 80px; height: 80px; object-fit: cover;">
                        </a>
                    </div>
                @endforeach
            </div><!-- end owl-carousel -->
        </div><!-- end container -->
    </div>
@endif
