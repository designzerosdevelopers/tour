@extends('layouts.frontend.app')
@section('content')
    <main class="main">
        <section class="box-section box-banner-destination background-body pt-70">
            <div class="block-banner-destination">
                <div class="box-swiper">
                    <div class="swiper-container swiper-group-1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="block-banner-destination-inner"><img
                                        src="{{ asset('assets/imgs/page/destination/banner2.png') }}" alt="Travile"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-popular-attractions background-body pt-70">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6 mb-30 text-center text-lg-start">
                        <h1 class="neutral-1000">Popular Attractions</h1>
                        <p class="text-lg-medium neutral-500">Favorite attractions based on customer reviews</p>
                    </div>
                </div>
                <div class="box-list-populars">
                    <div class="row">
                        @foreach ($attractions as $attraction)
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-popular background-card hover-up">
                                    <div class="card-image"> <a
                                            href="{{ route('attractions.show', $attraction->slug) }}"><img
                                                src="{{ asset($attraction->images->first()->path . $attraction->images->first()->file) }}"
                                                alt="{{ $attraction->images->first()->alt }}"></a></div>
                                    <div class="card-info"> <a class="card-title"
                                            href="{{ route('attractions.show', $attraction->slug) }}">{{ $attraction->title }}</a>
                                        <div class="card-meta">
                                            <div class="meta-links"> <a
                                                    href="{{ route('attractions.show', $attraction->slug) }}">{{ $attraction->tours->count() }}
                                                    Tours,
                                                </a><a
                                                    href="{{ route('attractions.show', $attraction->slug) }}">{{ $attraction->activities->count() }}
                                                    Activities</a>
                                            </div>
                                            <div class="card-button"> <a
                                                    href="{{ route('attractions.show', $attraction->slug) }}">
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

        <section class="section-box box-popular-attractions background-body pb-20">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-6 mb-30 text-center text-lg-start wow fadeInUp">
                        <h1 class="neutral-1000">Featured Europe Tours </h1>
                        <p class="text-lg-medium neutral-500">Favorite attractions based on customer reviews</p>
                    </div>
                </div>
                <div class="box-list-featured">
                    <div class="row">
                        @foreach (getModel('Tour') as $tour)
                            <div class="col-lg-3 col-md-6 wow fadeIn">
                                <div class="card-journey-small background-card">
                                    <div class="card-image">
                                        @if ($tour->images->isNotEmpty())
                                            <img src="{{ asset($tour->images->first()->path . $tour->images->first()->file) }}"
                                                alt="{{ $tour->images->first()->alt }}">
                                        @endif

                                    </div>
                                    <div class="card-info background-card">
                                        <div class="card-rating">
                                            <div class="card-left"> </div>
                                        </div>
                                        <div class="card-title"> <a class="heading-4 neutral-1000"
                                                href="{{ route('tours.show', $tour->slug) }}">{{ $tour->title }}</a>
                                        </div>
                                        <div class="card-program">
                                            <div class="card-duration-tour">
                                                <p class="icon-duration text-md-medium neutral-500">{{ $tour->duration }}
                                                </p>
                                                <p class="icon-guest text-md-medium neutral-500">{{ $tour->no_of_people }}
                                                    guest</p>
                                            </div>
                                            <div class="endtime">
                                                <div class="card-price">
                                                    <h4 class="heading-4 neutral-1000">{{ $tour->adult_price }}
                                                        <p class="text-sm-medium neutral-500">/person</p>
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
                            <div class="col-sky-1"><img class="w-100"
                                    src="{{ asset('assets/imgs/page/homepage10/sky.png') }}" alt="Travila"><img
                                    class="w-100" src="{{ asset('assets/imgs/page/homepage10/sky2.png') }}"
                                    alt="Travila"></div>
                            <div class="col-sky-2"><img class="w-100"
                                    src="{{ asset('assets/imgs/page/homepage10/sky3.png') }}" alt="Travila"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30 wow fadeInUp">
                        <div class="box-right-skyward"><span class="btn btn-tag-white">Takes You Skyward</span>
                            <h4 class="title-why mb-25 mt-10 neutral-1000">Your Premier attraction for Unmatched Flight
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
                                                        src="{{ asset('assets/imgs/template/icons/paypal.png') }}"
                                                        alt="Travila"></div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="{{ asset('assets/imgs/template/icons/stripe.png') }}"
                                                        alt="Travila"></div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="{{ asset('assets/imgs/template/icons/mastercard.png') }}"
                                                        alt="Travila">
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="{{ asset('assets/imgs/template/icons/skrill.png') }}"
                                                        alt="Travila"></div>
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
        <section class="section-box box-subscriber box-subscriber-attraction background-body pt-50">
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
        <section class="section-box box-media background-body">
            <div class="container-media wow fadeInUp"> <img src="{{ asset('assets/imgs/page/homepage5/media.png') }}"
                    alt="Travila"><img src="{{ asset('assets/imgs/page/homepage5/media2.png') }}" alt="Travila"><img
                    src="{{ asset('assets/imgs/page/homepage5/media3.png') }}" alt="Travila"><img
                    src="{{ asset('assets/imgs/page/homepage5/media4.png') }}" alt="Travila"><img
                    src="{{ asset('assets/imgs/page/homepage5/media5.png') }}" alt="Travila"><img
                    src="{{ asset('assets/imgs/page/homepage5/media6.png') }}" alt="Travila"><img
                    src="{{ asset('assets/imgs/page/homepage5/media7.png') }}" alt="Travila"></div>
        </section>
    </main>

@stop
