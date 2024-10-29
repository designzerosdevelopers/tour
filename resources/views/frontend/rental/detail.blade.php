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
                    <li> <a href="{{ route('rentals.index') }}">Cars Rental</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <span class="text-breadcrumb">{{ $post->vehicle_attributes->make }}
                            {{ $post->vehicle_attributes->model }} </span></li>
                </ul>
            </div>
        </section>
        <section class="box-section block-banner-tour-detail-4 background-card pt-45">
            <div class="box-banner-tour-detail-4">
                <div class="box-banner-tour-detail-4-inner">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-1">
                            <div class="swiper-wrapper">
                                @foreach ($post->images as $image)
                                    <div class="swiper-slide">
                                        <div class="box-banner-tour-4"><img src="{{ asset($image->path . $image->file) }}"
                                                alt="{{ $image->alt }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-group-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M7.99992 3.33325L3.33325 7.99992M3.33325 7.99992L7.99992 12.6666M3.33325 7.99992H12.6666"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-group-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                fill="none">
                                <path d="M7.99992 12.6666L12.6666 7.99992L7.99992 3.33325M12.6666 7.99992L3.33325 7.99992"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-header-on-top">
                <div class="container">
                    <div class="tour-header tour-header-on-top">
                        {{-- <div class="tour-rate">
                              <div class="rate-element"><span class="rating">4.96 <span
                                          class="text-sm-medium neutral-500">(672 reviews)</span></span>
                              </div>
                          </div> --}}
                        <div class="tour-title-main w-lg-75">
                            <h1 class="color-white">{{ $post->title }}</h1>
                        </div>
                        <div class="tour-metas">
                            <div class="tour-meta-left">
                                <p class="text-md-medium color-white mr-20 tour-location">
                                    <svg width="12" height="16" viewbox="0 0 12 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z"
                                            fill=""></path>
                                    </svg>{{ $post->location }}
                                </p>
                                {{-- <a class="text-md-medium color-white mr-30" href="#">Show on
                                        map</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="box-section box-content-tour-detail background-body pb-10">
            <div class="container">
                <div class="tour-header">
                    <div class="row mt-30">
                        <div class="col-lg-8">
                            <div class="box-info-tour">
                                <div class="tour-info-group">
                                    <div class="icon-item">
                                        <img src="{{ asset('assets/imgs/page/car/km.png') }}" alt="Travila">
                                    </div>
                                    <div class="info-item">
                                        <p class="text-sm-medium neutral-600">Mileage</p>
                                        <p class="text-lg-bold neutral-1000">{{ $post->vehicle_attributes->mileage }}</p>
                                    </div>
                                </div>
                                <div class="tour-info-group">
                                    <div class="icon-item">
                                        <img src="{{ asset('assets/imgs/page/car/diesel.png') }}" alt="Travila">
                                    </div>
                                    <div class="info-item">
                                        <p class="text-sm-medium neutral-600">Fuel</p>
                                        <p class="text-lg-bold neutral-1000"> {{ $post->vehicle_attributes->fuel_type }}
                                        </p>
                                    </div>
                                </div>
                                <div class="tour-info-group">
                                    <div class="icon-item pt-1">
                                        <img src="{{ asset('assets/imgs/page/car/seat.png') }}" alt="Travila">
                                    </div>
                                    <div class="info-item">
                                        <p class="text-sm-medium neutral-600">Seats</p>
                                        <p class="text-lg-bold neutral-1000">{{ $post->vehicle_attributes->seats }}</p>
                                    </div>
                                </div>
                                <div class="tour-info-group">
                                    <div class="icon-item pt-1">
                                        <img src="{{ asset('assets/imgs/page/car/suv.png') }}" alt="Travila">
                                    </div>
                                    <div class="info-item">
                                        <p class="text-sm-medium neutral-600">Type</p>

                                        <p class="text-lg-bold neutral-1000">
                                            {{ $post->vehicle_type }}
                                        </p>

                                    </div>
                                </div>
                            </div>

                            {{-- <div class="box-feature-car">
                                <div class="list-feature-car row">
                                    <div class="item-feature-car">
                                        <div class="item-feature-car-inner">
                                            <div class="feature-image"> <img
                                                    src="{{ asset('assets/imgs/page/car/km.png') }}" alt="Travila">
                                            </div>
                                            <div class="feature-info">
                                                <p class="text-md-medium neutral-1000">
                                                    {{ $post->vehicle_attributes->mileage }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-feature-car">
                                        <div class="item-feature-car-inner">
                                            <div class="feature-image"> <img
                                                    src="{{ asset('assets/imgs/page/car/diesel.png') }}" alt="Travila">
                                            </div>
                                            <div class="feature-info">
                                                <p class="text-md-medium neutral-1000">
                                                    {{ $post->vehicle_attributes->fuel_type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-feature-car">
                                        <div class="item-feature-car-inner">
                                            <div class="feature-image"> <img
                                                    src="{{ asset('assets/imgs/page/car/seat.png') }}" alt="Travila">
                                            </div>
                                            <div class="feature-info">
                                                <p class="text-md-medium neutral-1000">
                                                    {{ $post->vehicle_attributes->seats }} seats</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-feature-car">
                                        <div class="item-feature-car-inner">
                                            <div class="feature-image"> <img
                                                    src="{{ asset('assets/imgs/page/car/suv.png') }}" alt="Travila">
                                            </div>
                                            <div class="feature-info">
                                                <p class="text-md-medium neutral-1000">{{ $post->vehicle_type }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            @if (!empty($post->vehicle_attributes->dynamic_fields) && count($post->vehicle_attributes->dynamic_fields) > 0)
                                <div class="box-feature-car">
                                    <div class="list-feature-car">
                                        @foreach ($post->vehicle_attributes->dynamic_fields as $key => $value)
                                            <div class="item-feature-car">
                                                <div class="item-feature-car-inner">
                                                    <div class="feature-info">
                                                        <p class="text-md-medium neutral-1000">{{ $key }}:
                                                            {{ $value }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="box-collapse-expand">
                                <div class="group-collapse-expand">
                                    <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOverview" aria-expanded="false"
                                        aria-controls="collapseOverview">
                                        <h2>Overview</h2>
                                        <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    <div class="collapse show" id="collapseOverview">
                                        <div class="card card-body">
                                            <p> {{ $post->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    // Ensure more_fields['values'] is an array or an empty array
                                    $values = $post->more_fields['values'] ?? [];

                                    // Filter out null or empty values
                                    $filteredValues = array_filter($values, function ($value) {
                                        return $value !== null && $value !== '';
                                    });
                                @endphp

                                @if (!empty($filteredValues))
                                    <div class="group-collapse-expand">
                                        <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseItinerary" aria-expanded="false"
                                            aria-controls="collapseItinerary">
                                            <h2>Included in the price</h2>
                                            <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                        <div class="collapse show" id="collapseItinerary">
                                            <div class="card card-body">
                                                <ul class="list-checked-green">
                                                    @foreach ($filteredValues as $field)
                                                        <li>{{ $field }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @php
                                    // Ensure more_fields['qna'] is an array or an empty array
                                    $qna = $post->more_fields['qna'] ?? [];

                                    // Filter out null or empty values
                                    $filteredQna = array_filter($qna, function ($item) {
                                        // Check if both 'question' and 'answer' are non-null and non-empty
                                        return !empty($item['question']) && !empty($item['answer']);
                                    });
                                @endphp

                                @if (!empty($filteredQna))
                                    <div class="group-collapse-expand">
                                        <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseQuestion" aria-expanded="false"
                                            aria-controls="collapseQuestion">
                                            <h2>Question & Answers</h2>
                                            <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                        <div class="collapse show" id="collapseQuestion">
                                            <div class="card card-body">
                                                <div class="list-questions">
                                                    @foreach ($filteredQna as $qna)
                                                        <div class="item-question">
                                                            <div class="head-question">
                                                                <p class="text-md-bold neutral-1000">
                                                                    {{ $qna['question'] }}</p>
                                                            </div>
                                                            <div class="content-question">
                                                                <p class="text-sm-medium neutral-800">{{ $qna['answer'] }}
                                                                </p>
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
                        <div class="col-lg-4">
                            <form id="bookingForm" action="{{ route('payments.store') }}" method="post"
                                class="booking-form">
                                @csrf
                                <div class="head-booking-form">
                                    <p class="text-xl-bold neutral-1000">Booking Form</p>
                                </div>

                                <div class="content-booking-form">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">

                                    <div class="item-line-booking"> <strong
                                            class="text-md-bold neutral-1000">From:</strong>
                                        <div class="input-calendar">
                                            <input class="form-control calendar-date" type="text" value="25/07/2024"
                                                id="selected-date">
                                            <svg width="18" height="18" viewbox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14.5312 1.3828H13.8595V0.703125C13.8595 0.314789 13.5448 0 13.1564 0C12.7681 0 12.4533 0.314789 12.4533 0.703125V1.3828H5.55469V0.703125C5.55469 0.314789 5.2399 0 4.85156 0C4.46323 0 4.14844 0.314789 4.14844 0.703125V1.3828H3.47678C1.55967 1.3828 0 2.94247 0 4.85954V14.5232C0 16.4403 1.55967 18 3.47678 18H14.5313C16.4483 18 18.008 16.4403 18.008 14.5232V4.85954C18.008 2.94247 16.4483 1.3828 14.5312 1.3828ZM3.47678 2.78905H4.14844V4.16014C4.14844 4.54848 4.46323 4.86327 4.85156 4.86327C5.2399 4.86327 5.55469 4.54848 5.55469 4.16014V2.78905H12.4533V4.16014C12.4533 4.54848 12.7681 4.86327 13.1565 4.86327C13.5448 4.86327 13.8596 4.54848 13.8596 4.16014V2.78905H14.5313C15.6729 2.78905 16.6018 3.71788 16.6018 4.85954V5.53124H1.40625V4.85954C1.40625 3.71788 2.33508 2.78905 3.47678 2.78905ZM14.5312 16.5938H3.47678C2.33508 16.5938 1.40625 15.6649 1.40625 14.5232V6.93749H16.6018V14.5232C16.6018 15.6649 15.6729 16.5938 14.5312 16.5938ZM6.24611 9.70312C6.24611 10.0915 5.93132 10.4062 5.54298 10.4062H4.16018C3.77184 10.4062 3.45705 10.0915 3.45705 9.70312C3.45705 9.31479 3.77184 9 4.16018 9H5.54298C5.93128 9 6.24611 9.31479 6.24611 9.70312ZM14.551 9.70312C14.551 10.0915 14.2362 10.4062 13.8479 10.4062H12.4651C12.0767 10.4062 11.7619 10.0915 11.7619 9.70312C11.7619 9.31479 12.0767 9 12.4651 9H13.8479C14.2362 9 14.551 9.31479 14.551 9.70312ZM10.3945 9.70312C10.3945 10.0915 10.0798 10.4062 9.69142 10.4062H8.30862C7.92028 10.4062 7.60549 10.0915 7.60549 9.70312C7.60549 9.31479 7.92028 9 8.30862 9H9.69142C10.0797 9 10.3945 9.31479 10.3945 9.70312ZM6.24611 13.8516C6.24611 14.2399 5.93132 14.5547 5.54298 14.5547H4.16018C3.77184 14.5547 3.45705 14.2399 3.45705 13.8516C3.45705 13.4632 3.77184 13.1484 4.16018 13.1484H5.54298C5.93128 13.1484 6.24611 13.4632 6.24611 13.8516ZM14.551 13.8516C14.551 14.2399 14.2362 14.5547 13.8479 14.5547H12.4651C12.0767 14.5547 11.7619 14.2399 11.7619 13.8516C11.7619 13.4632 12.0767 13.1484 12.4651 13.1484H13.8479C14.2362 13.1484 14.551 13.4632 14.551 13.8516ZM10.3945 13.8516C10.3945 14.2399 10.0798 14.5547 9.69142 14.5547H8.30862C7.92028 14.5547 7.60549 14.2399 7.60549 13.8516C7.60549 13.4632 7.92028 13.1484 8.30862 13.1484H9.69142C10.0797 13.1484 10.3945 13.4632 10.3945 13.8516Z"
                                                    fill=""></path>
                                            </svg>
                                        </div>
                                    </div>


                                    <div class="item-line-booking">
                                        <strong class="text-md-bold neutral-1000">Select Time:</strong>
                                        <div class="input-calendar" style="width: 210px;">
                                            <select class="form-control time-slots" id="time-slots">
                                            </select>
                                        </div>
                                    </div>


                                    <div class="item-line-booking name-field"> <strong
                                            class="text-md-bold neutral-1000">Name<span
                                                class="text-danger">*</span></strong>
                                        <div class="line-booking-right">
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}" placeholder="Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="item-line-booking"> <strong class="text-md-bold neutral-1000">Email<span
                                                class="text-danger">*</span></strong>
                                        <div class="line-booking-right">
                                            <input class="form-control" type="email" name="email"
                                                value="{{ old('email') }}" placeholder="Email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="item-line-booking"> <strong class="text-md-bold neutral-1000">Phone<span
                                                class="text-danger">*</span></strong>
                                        <div class="line-booking-right">
                                            <input class="form-control" type="text" name="phone" value=""
                                                placeholder="Mobile No">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="item-line-booking last-item"> <strong
                                            class="text-md-bold neutral-1000">Total:</strong>
                                        <div class="line-booking-right">
                                            <p class="text-xl-bold neutral-1000">{{ $post->price }}
                                            </p>&nbsp;
                                            <p class="text-xl-mediam neutral-1000"> {{ session('currency', 'AED') }}</p>

                                            <input type="hidden" name="currency"
                                                value="{{ session('currency', 'AED') }}">
                                            <input type="hidden" name="amount" value="{{ $post->price }} ">
                                            <input type="hidden" name="url" value="{{ url()->full() }}">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between" style="gap:3px;">
                                        <a href="https://wa.me/123456789?text={{ url()->full() }}"
                                            class="btn btn-light p-1" target="_blank">
                                            <svg fill="#075E54" height="35px" width="50px" version="1.1"
                                                id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 308"
                                                xml:space="preserve">
                                                <g id="XMLID_468_">
                                                    <path id="XMLID_469_"
                                                        d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156
                                                                                                                                c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687
                                                                                                                                c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887
                                                                                                                                c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153
                                                                                                                                c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348
                                                                                                                                c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802
                                                                                                                                c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922
                                                                                                                                c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0
                                                                                                                                c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458
                                                                                                                                C233.168,179.508,230.845,178.393,227.904,176.981z" />
                                                    <path id="XMLID_470_"
                                                        d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716
                                                                                                                                c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396
                                                                                                                                c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z
                                                                                                                                M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188
                                                                                                                                l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677
                                                                                                                                c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867
                                                                                                                                C276.546,215.678,222.799,268.994,156.734,268.994z" />
                                                </g>
                                            </svg>
                                        </a>
                                        <button type="submit" class="box-button-book btn btn-book">Buy</button>
                                        <button type="button" id="cust_btn"
                                            class="box-button-book btn btn-book">Inquiry</button>
                                    </div>

                                    <div class="box-need-help"> <a href="#">
                                            <svg width="12" height="14" viewbox="0 0 12 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.83366 3.66667C2.83366 1.92067 4.25433 0.5 6.00033 0.5C7.74633 0.5 9.16699 1.92067 9.16699 3.66667C9.16699 5.41267 7.74633 6.83333 6.00033 6.83333C4.25433 6.83333 2.83366 5.41267 2.83366 3.66667ZM8.00033 7.83333H4.00033C1.88699 7.83333 0.166992 9.55333 0.166992 11.6667C0.166992 12.678 0.988992 13.5 2.00033 13.5H10.0003C11.0117 13.5 11.8337 12.678 11.8337 11.6667C11.8337 9.55333 10.1137 7.83333 8.00033 7.83333Z"
                                                    fill=""></path>
                                            </svg>Need some help?</a></div>
                                </div>
                            </form>

                            <div class="sidebar-banner"> <a href="#"><img
                                        src="{{ asset('assets/imgs/page/car/banner-ads.png') }}" alt="Travila"></a>
                            </div>
                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.thumbnail-image');
            const mainBannerImage = document.getElementById('main-banner-image');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const newSrc = this.getAttribute('src');
                    mainBannerImage.setAttribute('src', newSrc);
                });
            });

        });



        $('#cust_btn').on('click', function(e) {
            e.preventDefault();

            // Clear previous error messages
            $('.error').remove();

            // Get form values
            var name = $('input[name="name"]').val();
            var url = $('input[name="url"]').val();
            var email = $('input[name="email"]').val();
            var phone = $('input[name="phone"]').val();
            var selectedDate = $('#selected-date').val();
            var timeSlot = $('#time-slots').val();

            // Validation
            var isValid = true;

            // Name validation
            if (name === '') {
                isValid = false;
                $('input[name="name"]').after('<p class="error text-danger">Name is required</p>');
            }

            // Email validation
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (email === '') {
                isValid = false;
                $('input[name="email"]').after('<p class="error text-danger">Email is required</p>');
            } else if (!emailPattern.test(email)) {
                isValid = false;
                $('input[name="email"]').after('<p class="error text-danger">Enter a valid email</p>');
            }

            // Phone validation
            var phonePattern = /^[0-9]{10}$/;
            if (phone === '') {
                isValid = false;
                $('input[name="phone"]').after('<p class="error text-danger">Phone number is required</p>');
            } else if (!phonePattern.test(phone)) {
                isValid = false;
                $('input[name="phone"]').after('<p class="error text-danger">Enter a valid phone number</p>');
            }

            if (!isValid) {
                return;
            }

            // Show the loader
            $('#preloader-active').show();

            var formData = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                name: name,
                url: url,
                email: email,
                phone: phone,
                selected_date: selectedDate,
                time_slot: timeSlot,
            };

            $.ajax({
                url: '{{ route('send.inquiry') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function(response) {
                    $('#preloader-active').hide();
                    $('#inquirySuccessModal').modal('show');
                    setTimeout(function() {
                        $('#inquirySuccessModal').modal('hide');
                    }, 4000);

                },
                error: function(error) {
                    console.error('Error sending inquiry:', error);
                    $('#preloader-active').hide();

                }
            });
        });

        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const action = urlParams.get('action');
            const productUrl = window.location.origin + window.location.pathname;

            if (action === 'success') {
                $('#paymentSuccessModal').modal('show');

                const newUrl = productUrl;
                window.history.replaceState(null, null, newUrl);

                setTimeout(function() {
                    $('#paymentSuccessModal').modal('hide');
                }, 4000);
            }

            if (action === 'fail') {
                $('#paymentFailModal').modal('show');

                const newUrl = productUrl;
                window.history.replaceState(null, null, newUrl);

                setTimeout(function() {
                    $('#paymentFailModal').modal('hide');
                }, 4000);
            }
        });
    </script>
@endsection
