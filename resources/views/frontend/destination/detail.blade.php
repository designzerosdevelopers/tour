@extends('layouts.frontend.app')
@section('content')
    <main class="main">
        <section class="box-section box-breadcrumb background-body">
            <div class="container">
                <ul class="breadcrumbs">
                    <li> <a href="{{ route('home') }}">Home</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <a href="{{ route('destinations.index') }}">Destinations</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <span class="text-breadcrumb">{{ $destination->title }} </span></li>
                </ul>
            </div>
        </section>
        <section class="box-section block-banner-tour-detail-4 background-card">
            <div class="box-banner-tour-detail-4">
                <div class="box-banner-tour-detail-4-inner">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="box-banner-tour-4"><img
                                            src="{{ asset($destination->image->path . $destination->image->file) }}"
                                            alt="{{ $destination->image->alt }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-header-on-top">
                <div class="container">
                    <div class="tour-header tour-header-on-top">
                        <div class="tour-title-main w-lg-75">
                            <h1 class="color-white">{{ $destination->title }}</h1>
                        </div>
                        <div class="tour-metas">
                            <div class="tour-meta-left">
                                <p class="text-md-medium color-white mr-20 tour-location">
                                    <svg width="12" height="16" viewbox="0 0 12 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z"
                                            fill=""></path>
                                    </svg>{{ $destination->country->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="box-section block-content-tourlist background-body">
            <div class="container">
                <div class="box-content-main">
                    <div class="content-right">
                        <div class="box-filters mb-25 pb-5 border-bottom border-1">
                            <div class="row align-items-center">
                                <div class="col-xl-4 col-md-4 mb-10 text-lg-start text-center">
                                    <div class="box-view-type"><a class="display-type display-grid active" href="tour-grid.html">
                                            <svg width="22" height="22" viewbox="0 0 22 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20 8V2.75C20 2.3375 19.6625 2 19.25 2H14C13.5875 2 13.25 2.3375 13.25 2.75V8C13.25 8.4125 13.5875 8.75 14 8.75H19.25C19.6625 8.75 20 8.4125 20 8ZM19.25 0.5C20.495 0.5 21.5 1.505 21.5 2.75V8C21.5 9.245 20.495 10.25 19.25 10.25H14C12.755 10.25 11.75 9.245 11.75 8V2.75C11.75 1.505 12.755 0.5 14 0.5H19.25Z"
                                                    fill=""></path>
                                                <path
                                                    d="M20 19.25V14C20 13.5875 19.6625 13.25 19.25 13.25H14C13.5875 13.25 13.25 13.5875 13.25 14V19.25C13.25 19.6625 13.5875 20 14 20H19.25C19.6625 20 20 19.6625 20 19.25ZM19.25 11.75C20.495 11.75 21.5 12.755 21.5 14V19.25C21.5 20.495 20.495 21.5 19.25 21.5H14C12.755 21.5 11.75 20.495 11.75 19.25V14C11.75 12.755 12.755 11.75 14 11.75H19.25Z"
                                                    fill=""></path>
                                                <path
                                                    d="M8 8.75C8.4125 8.75 8.75 8.4125 8.75 8V2.75C8.75 2.3375 8.4125 2 8 2H2.75C2.3375 2 2 2.3375 2 2.75V8C2 8.4125 2.3375 8.75 2.75 8.75H8ZM8 0.5C9.245 0.5 10.25 1.505 10.25 2.75V8C10.25 9.245 9.245 10.25 8 10.25H2.75C1.505 10.25 0.5 9.245 0.5 8V2.75C0.5 1.505 1.505 0.5 2.75 0.5H8Z"
                                                    fill=""></path>
                                                <path
                                                    d="M8 20C8.4125 20 8.75 19.6625 8.75 19.25V14C8.75 13.5875 8.4125 13.25 8 13.25H2.75C2.3375 13.25 2 13.5875 2 14V19.25C2 19.6625 2.3375 20 2.75 20H8ZM8 11.75C9.245 11.75 10.25 12.755 10.25 14V19.25C10.25 20.495 9.245 21.5 8 21.5H2.75C1.505 21.5 0.5 20.495 0.5 19.25V14C0.5 12.755 1.505 11.75 2.75 11.75H8Z"
                                                    fill=""></path>
                                            </svg></a>
                                            <span class="text-sm-bold neutral-500 number-found"> tours
                                            found</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-list-tours wow fadeIn">
                            <div class="row">
                                @foreach ($destination->tours as $tour)
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <a href="">
                                            <div class="card-journey-small background-card">
                                                <div class="card-image"> <a class="wish" href="#">
                                                        <svg width="20" height="18" viewbox="0 0 20 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                                                stroke="" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg></a>
                                                    @if ($tour->images->isNotEmpty())
                                                        <img src="{{ asset($tour->images->first()->path . $tour->images->first()->file) }}"
                                                            alt="Travila">
                                                    @endif

                                                </div>
                                                <div class="card-info background-card">
                                                    <div class="card-rating">
                                                        <div class="card-left"> </div>
                                                    </div>
                                                    <div class="card-title"> <a class="text-lg-bold neutral-1000"
                                                            href="{{ route('tours.show', $tour->slug) }}">{{ $tour->title }}
                                                        </a></div>
                                                    <div class="card-program">
                                                        <div class="card-duration-tour">
                                                            <p class="icon-duration text-sm-medium neutral-500">
                                                                {{ $tour->duration }} </p>
                                                            <p class="icon-guest text-sm-medium neutral-500">
                                                                {{ $tour->no_of_people }}</p>
                                                        </div>
                                                        <div class="endtime">
                                                            <div class="card-price">
                                                                <h4 class="heading-4 neutral-1000">
                                                                    {{ $tour->adult_price }}
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
                                @foreach ($destination->activities as $activity)
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <a href="">
                                            <div class="card-journey-small background-card">
                                                <div class="card-image"> <a class="wish" href="#">
                                                        <svg width="20" height="18" viewbox="0 0 20 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                                                stroke="" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg></a>
                                                    @if ($activity->images->isNotEmpty())
                                                        <img src="{{ asset($activity->images->first()->path . $activity->images->first()->file) }}"
                                                            alt="Travila">
                                                    @endif

                                                </div>
                                                <div class="card-info background-card">
                                                    <div class="card-rating">
                                                        <div class="card-left"> </div>
                                                    </div>
                                                    <div class="card-title"> <a class="text-lg-bold neutral-1000"
                                                            href="{{ route('tours.show', $activity->slug) }}">{{ $activity->title }}
                                                        </a></div>
                                                    <div class="card-program">
                                                        <div class="card-duration-tour">
                                                            <p class="icon-duration text-sm-medium neutral-500">
                                                                {{ $activity->duration }} </p>
                                                            <p class="icon-guest text-sm-medium neutral-500">
                                                                {{ $activity->no_of_people }}</p>
                                                        </div>
                                                        <div class="endtime">
                                                            <div class="card-price">
                                                                <h2 class="heading-2 neutral-1000">
                                                                    {{ $activity->adult_price }}
                                                                </h2>
                                                            </div>
                                                            <div class="card-button"> <a class="btn btn-gray"
                                                                    href="{{ route('tours.show', $activity->slug) }}">Book
                                                                    Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                @endforeach
                                <!-- Dynamic end !-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="box-section box-content-tour-detail background-body">
            <div class="container">
                <div class="row mt-65">
                    <div class="col-lg-12">
                        <div class="box-collapse-expand">
                            <div class="group-collapse-expand">
                                <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOverview" aria-expanded="false"
                                    aria-controls="collapseOverview">
                                    <h2>Overview</h2>
                                    <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                <div class="collapse show" id="collapseOverview">
                                    <div class="card card-body">
                                        <p>
                                            {!! $destination->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if (!empty($destination->qna) && count($destination->qna) > 0)
                                <div class="group-collapse-expand">
                                    <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseQuestion" aria-expanded="false"
                                        aria-controls="collapseQuestion">
                                        <h6>Question & Answers</h6>
                                        <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    <div class="collapse show" id="collapseQuestion">
                                        <div class="card card-body">
                                            <div class="list-questions">
                                                @foreach ($destination->qna as $index => $item)
                                                    <div class="item-question">
                                                        <div class="head-question">
                                                            <p class="text-md-bold neutral-1000">{{ $item->question }}</p>
                                                        </div>
                                                        <div class="content-question">
                                                            <p class="text-sm-medium neutral-800">{{ $item->answer }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-media background-body">
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

        <div class="container">
            <!-- Modal -->
            <div class="modal fade modal-center" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                            <h4 class="modal-title">Booking is in progress</h4>
                        </div>
                        <div class="modal-body">
                            <p>Your booking in progress, we will back to you shortly via email/whatsapp/call.</p>
                        </div>
                        {{-- 
                           --}}
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
