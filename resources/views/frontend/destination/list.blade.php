@extends('layouts.frontend.app')
@section('content')
    <main class="main">

        <section class="box-section box-banner-destination background-body pt-70">
            <div class="block-banner-destination">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="block-banner-destination-inner">
                                    <img src="assets/imgs/page/destination/banner2.png" alt="Travile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-popular-destinations background-body pt-70">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6 mb-30 text-center text-lg-start">
                        <h1 class="neutral-1000">Popular Destinations</h1>
                        <p class="text-lg-medium neutral-500">Favorite destinations based on customer reviews</p>
                    </div>
                </div>
                <div class="box-list-populars">
                    <div class="row">
                        @foreach ($destinations as $destination)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-popular background-card hover-up">
                                    <div class="card-image"> <a
                                            href="{{ route('destinations.show', $destination->slug) }}"><img
                                                src="{{ asset($destination->image->path . $destination->image->file) }}"
                                                alt="{{ $destination->image->alt }}"></a></div>
                                    <div class="card-info"> <a class="card-title"
                                            href="{{ route('destinations.show', $destination->slug) }}">{{ $destination->title }}</a>
                                        <div class="card-meta">
                                            <div class="meta-links"> <a
                                                    href="{{ route('destinations.show', $destination->slug) }}">{{ $destination->tours->count() }}
                                                    Tours, </a><a
                                                    href="{{ route('destinations.show', $destination->slug) }}">{{ $destination->activities->count() }}
                                                    Activities</a></div>
                                            <div class="card-button"> <a
                                                    href="{{ route('destinations.show', $destination->slug) }}">
                                                    <svg width="10" height="10" viewbox="0 0 10 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011"
                                                            stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box box-popular-destinations background-body">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6 mb-30 text-center text-lg-start wow fadeInUp">
                        <h1 class="neutral-1000">Featured Europe Tours </h1>
                        <p class="text-lg-medium neutral-500">Favorite destinations based on customer reviews</p>
                    </div>
                </div>
                <div class="box-list-featured">
                    <div class="row">
                        @foreach (getModel('Tour') as $tour)
                            <div class="col-lg-3 col-md-6 wow fadeIn">
                                <div class="card-journey-small background-card">
                                    <div class="card-image">
                                        {{-- <a class="label saleoff" href="#">25% Off</a><a
                                        class="wish" href="#">
                                        <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                                stroke="" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg></a> --}}
                                        @if ($tour->images->isNotEmpty())
                                            <img src="{{ $tour->images->first()->path . $tour->images->first()->file }}"
                                                alt="{{ $tour->images->first()->alt }}">
                                        @endif

                                    </div>
                                    <div class="card-info background-card">
                                        <div class="card-rating">
                                            <div class="card-left"> </div>
                                            {{-- <div class="card-right"> <span class="rating">4.96 <span
                                                    class="text-sm-medium neutral-500">(672 reviews)</span></span>
                                        </div> --}}
                                        </div>
                                        <div class="card-title"> <a class="heading-6 neutral-1000"
                                                href="{{ route('tours.show', $tour->slug) }}">{{ $tour->title }}</a>
                                        </div>
                                        <div class="card-program">
                                            <div class="card-duration-tour">
                                                <p class="icon-duration text-md-medium neutral-500">7 days 6 nights</p>
                                                <p class="icon-guest text-md-medium neutral-500">{{ $tour->no_of_people }}
                                                    guest</p>
                                            </div>
                                            <div class="endtime">
                                                <div class="card-price">
                                                    <h4 class="heading-4 neutral-1000">{{ $tour->adult_price }}
                                                        <p class="text-md-medium neutral-500">/ person</p>
                                                    </h4>
                                                </div>
                                                <div class="card-button"> <a class="btn btn-gray"
                                                        href="{{ route('tours.show', $tour->slug) }}">Book
                                                        Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center"><a class="btn btn-black-lg"
                            href="{{ route('tours.index') }}">
                            See More Tours</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-skyward background-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-30 wow fadeInUp">
                        <div class="box-image-sky">
                            <div class="col-sky-1"><img class="w-100" src="assets/imgs/page/homepage10/sky.png"
                                    alt="Travila"><img class="w-100" src="assets/imgs/page/homepage10/sky2.png"
                                    alt="Travila"></div>
                            <div class="col-sky-2"><img class="w-100" src="assets/imgs/page/homepage10/sky3.png"
                                    alt="Travila"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30 wow fadeInUp">
                        <div class="box-right-skyward"><span class="btn btn-tag-white">Takes You Skyward</span>
                            <h4 class="title-why mb-25 mt-10 neutral-1000">Your Premier Destination for Unmatched Flight
                                Experiences</h4>
                            <p class="text-lg-medium mb-25 neutral-1000">Experience stress-free travel planning with our
                                website where you can easily book flights, check in an make changes to your itinerary with
                                just a few clicks</p>
                            <div class="payment-method mt-60">
                                <div class="box-swiper mt-30">
                                    <div class="swiper-container swiper-group-payment">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="assets/imgs/template/icons/paypal.png" alt="Travila"></div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="assets/imgs/template/icons/stripe.png" alt="Travila"></div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="assets/imgs/template/icons/mastercard.png" alt="Travila">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="assets/imgs/template/icons/skrill.png" alt="Travila"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-subscriber box-subscriber-destination background-body">
            <div class="container">
                <div class="block-subscriber">
                    <div class="subscriber-left"><span class="btn btn-brand-secondary">Join our newsletter</span>
                        <h5 class="mt-15 mb-30 neutral-1000">Subscribe to see secret deals prices drop the moment you sign
                            up!</h5>
                        <form class="form-subscriber" action="#">
                            <input class="form-control" type="text" placeholder="Your Email">
                            <input class="btn btn-submit" type="submit" value="Subscribe">
                        </form>
                        <p class="text-sm-medium neutral-500 mt-15">No ads. No trails. No commitments</p>
                    </div>
                    <div class="subscriber-right"></div>
                </div>
            </div>
        </section>
        <section class="section-box box-image background-body">
            <div class="container-media wow fadeInUp">
                <img src="{{ asset('assets/imgs/page/homepage5/media.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media2.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media3.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media4.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media5.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media6.png') }}" alt="Travila">
                <img src="{{ asset('assets/imgs/page/homepage5/media7.png') }}" alt="Travila">
            </div>
        </section>
    </main>

@stop
