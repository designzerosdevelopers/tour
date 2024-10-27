@extends('layouts.frontend.app')
@section('content')
    <main class="main">
        <section class="box-section block-banner-tourlist block-banner-car">
            <div class="container">
                <div class="text-center">
                    <h1 class="mb-15">Rent Your Perfect Ride Anytime, Anywhere</h1>
                    <h3 class="heading-6-medium">Search and find your best car rental with easy way</h3>
                </div>
                {{-- <div class="box-search-advance box-search-advance-3 background-card wow fadeInUp">
                    <div class="box-bottom-search background-card">
                        <div class="item-search">
                            <label class="text-sm-bold neutral-500">Location</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-dropdown-search location-search"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">New York, USA</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Sydney, Australia</a></li>
                                    <li><a class="dropdown-item" href="#">London, England</a></li>
                                    <li><a class="dropdown-item" href="#">New York City, USA</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item-search item-search-2">
                            <label class="text-sm-bold neutral-500">Check In</label>
                            <div class="box-calendar-date">
                                <input class="search-input datepicker" type="text" placeholder=""
                                    value="02 January 2024">
                            </div>
                        </div>
                        <div class="item-search item-search-3">
                            <label class="text-sm-bold neutral-500">Check Out</label>
                            <div class="box-calendar-date">
                                <input class="search-input datepicker" type="text" placeholder=""
                                    value="02 January 2024">
                            </div>
                        </div>
                        <div class="item-search bd-none">
                            <label class="text-sm-bold neutral-500">Guest</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-dropdown-search passenger-search"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">2 adults, 2
                                    children</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2 adults, 1 children</a></li>
                                    <li><a class="dropdown-item" href="#">2 adults, 2 children</a></li>
                                    <li><a class="dropdown-item" href="#">2 adults, 3 children</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="item-search bd-none d-flex justify-content-end">
                            <button class="btn btn-black-lg">
                                <svg width="20" height="20" viewbox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 19L14.6569 14.6569M14.6569 14.6569C16.1046 13.2091 17 11.2091 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17C11.2091 17 13.2091 16.1046 14.6569 14.6569Z"
                                        stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>Search
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <section class="section-box box-logos-2 box-logos-car background-body">
            <div class="container">
                <div class="box-swiper pt-0">
                    <div class="swiper-container swiper-group-payment-9 wow fadeInUp">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/lexus.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="assets/imgs/page/homepage8/lexus-dark.svg" alt="Travila">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/mercedes.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="{{ asset('assets/imgs/page/homepage8/mercedes-dark.svg') }}"
                                        alt="Travila"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/bugatti.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="{{ asset('assets/imgs/page/homepage8/bugatti-dark.svg') }}"
                                        alt="Travila"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/jaguar.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="{{ asset('assets/imgs/page/homepage8/jaguar-dark.svg') }}"
                                        alt="Travila"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/honda.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="{{ asset('assets/imgs/page/homepage8/honda-dark.svg') }}"
                                        alt="Travila"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/chevrolet.svg') }}" alt="Travila"><img
                                        class="dark-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/chevrolet-dark.svg') }}" alt="Travila">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/acura.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="{{ asset('assets/imgs/page/homepage8/acura-dark.svg') }}"
                                        alt="Travila"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/bmw.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="{{ asset('assets/imgs/page/homepage8/bmw-dark.svg') }}"
                                        alt="Travila"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="item-logo-payment"> <img class="light-mode"
                                        src="{{ asset('assets/imgs/page/homepage8/toyota.svg') }}" alt="Travila"><img
                                        class="dark-mode" src="{{ asset('assets/imgs/page/homepage8/toyota-dark.svg') }}"
                                        alt="Travila"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="box-section block-content-tourlist background-body">
            <div class="container">
                <div class="box-content-main pt-20">
                    <div class="content-right">
                        <div class="box-filters mb-25 pb-5 border-bottom border-1">
                            <div class="row align-items-center">
                                <div class="col-xl-4 col-md-4 mb-10 text-lg-start text-center">
                                    <div class="box-view-type"><a class="display-type display-grid" href="tour-grid.html">
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
                                            </svg></a><a class="display-type display-list active" href="tour-list.html">
                                            <svg width="21" height="21" viewbox="0 0 21 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M4.788 0H1.09497C0.491194 0 0 0.486501 0 1.08456V4.74269C0 5.34075 0.491194 5.82729 1.09497 5.82729H4.788C5.39177 5.82729 5.88297 5.34075 5.88297 4.74269V1.08456C5.88297 0.486501 5.39177 0 4.788 0ZM4.80951 4.74273C4.80951 4.75328 4.79865 4.76404 4.788 4.76404H1.09497C1.08432 4.76404 1.07345 4.75328 1.07345 4.74273V1.08456C1.07345 1.07401 1.08432 1.06329 1.09497 1.06329H4.788C4.79865 1.06329 4.80951 1.07401 4.80951 1.08456V4.74273ZM7.53412 1.32686C7.53412 1.03321 7.77444 0.795211 8.07084 0.795211H20.4632C20.7596 0.795211 21 1.03321 21 1.32686C21 1.62046 20.7596 1.8585 20.4632 1.8585H8.07084C7.77444 1.8585 7.53412 1.62046 7.53412 1.32686ZM21 4.50043C21 4.79408 20.7597 5.03208 20.4633 5.03208H8.07084C7.77444 5.03208 7.53412 4.79408 7.53412 4.50043C7.53412 4.20683 7.77444 3.96879 8.07084 3.96879H20.4632C20.7597 3.96879 21 4.20683 21 4.50043ZM4.788 7.58633H1.09497C0.491194 7.58633 0 8.07283 0 8.67089V12.329C0 12.9271 0.491194 13.4136 1.09497 13.4136H4.788C5.39177 13.4136 5.88297 12.9271 5.88297 12.329V8.67089C5.88297 8.07288 5.39177 7.58633 4.788 7.58633ZM4.80951 12.3291C4.80951 12.3396 4.79865 12.3504 4.788 12.3504H1.09497C1.08432 12.3504 1.07345 12.3396 1.07345 12.3291V8.67094C1.07345 8.66039 1.08432 8.64967 1.09497 8.64967H4.788C4.79865 8.64967 4.80951 8.66039 4.80951 8.67094V12.3291ZM4.788 15.1727H1.09497C0.491194 15.1727 0 15.6592 0 16.2573V19.9154C0 20.5135 0.491194 21 1.09497 21H4.788C5.39177 21 5.88297 20.5135 5.88297 19.9154V16.2573C5.88297 15.6592 5.39177 15.1727 4.788 15.1727ZM4.80951 19.9154C4.80951 19.926 4.79865 19.9368 4.788 19.9368H1.09497C1.08432 19.9368 1.07345 19.926 1.07345 19.9154V16.2573C1.07345 16.2468 1.08432 16.236 1.09497 16.236H4.788C4.79865 16.236 4.80951 16.2468 4.80951 16.2573V19.9154ZM21 12.0868C21 12.3805 20.7597 12.6185 20.4633 12.6185H8.07084C7.77444 12.6185 7.53412 12.3805 7.53412 12.0868C7.53412 11.7932 7.77444 11.5552 8.07084 11.5552H20.4632C20.7597 11.5552 21 11.7932 21 12.0868ZM21 8.91328C21 9.20688 20.7597 9.44492 20.4633 9.44492H8.07084C7.77444 9.44492 7.53412 9.20688 7.53412 8.91328C7.53412 8.61963 7.77444 8.38163 8.07084 8.38163H20.4632C20.7597 8.38163 21 8.61963 21 8.91328ZM21 16.4996C21 16.7932 20.7597 17.0313 20.4633 17.0313H8.07084C7.77444 17.0313 7.53412 16.7932 7.53412 16.4996C7.53412 16.206 7.77444 15.968 8.07084 15.968H20.4632C20.7597 15.968 21 16.206 21 16.4996ZM21 19.6732C21 19.9668 20.7597 20.2048 20.4633 20.2048H8.07084C7.77444 20.2048 7.53412 19.9668 7.53412 19.6732C7.53412 19.3796 7.77444 19.1415 8.07084 19.1415H20.4632C20.7597 19.1415 21 19.3796 21 19.6732Z"
                                                    fill=""></path>
                                            </svg></a><span class="text-sm-bold neutral-500 number-found"> cars
                                            found</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-grid-tours wow fadeIn">
                            <div class="row" id="vehicle-container">

                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                            </ul>
                        </nav>
                    </div>
                    <div class="content-left order-lg-first filters-list d-none d-lg-block" >
                        {{-- <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Show on map</h6>
                                    <div class="box-collapse scrollFilter mb-15">
                                        <div class="pt-0">
                                            <div class="box-map-small">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5249.611419370571!2d2.3406913487788334!3d48.86191519358772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e18a5f84801%3A0x6eb5daa624bdebd2!2sLes%20Halles%2C%2075001%20Pa%20ri%2C%20Ph%C3%A1p!5e0!3m2!1svi!2s!4v1711728202093!5m2!1svi!2s"
                                                    width="100%" height="160" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Filter Price </h6>
                                    <div class="box-collapse scrollFilter">
                                        <div class="pt-20">
                                            <div class="box-slider-range">
                                                <div id="slider-range"></div>
                                                <div class="box-value-price"><span
                                                        class="text-md-medium neutral-1000">0</span><span
                                                        class="text-md-medium neutral-1000">20k</span></div>
                                                <input type="hidden" id="price_range" name="price_range">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Vehicle type</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox" id="vehicle-types">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Seats</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox" id="vehicle-seats">
                                            <li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Fuel Type</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Plug-in Hybrid
                                                        (PHEV)</span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Hybrid
                                                        (HEV)</span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Electric Vehicle
                                                        (EV)</span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Diesel</span><span
                                                        class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span
                                                        class="text-sm-medium">Gasoline/Petrol</span><span
                                                        class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Review Score </h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="{{ asset('assets/imgs/template/icons/star-yellow.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"><img
                                                            src="{{ asset('assets/imgs/template/icons/star-grey.svg') }}"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Booking Location</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Maldives
                                                        Haven</span><span class="checkmark"></span>
                                                </label><span class="number-item">198</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Santorini
                                                        Retreat</span><span class="checkmark"></span>
                                                </label><span class="number-item">32</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Parisian
                                                        Plaza</span><span class="checkmark"></span>
                                                </label><span class="number-item">13</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Tokyo Tower
                                                        View</span><span class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Caribbean
                                                        Cove</span><span class="checkmark"></span>
                                                </label><span class="number-item">35</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Swiss Alps
                                                        Lodge</span><span class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">New York
                                                        Cityscape</span><span class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Dubai
                                                        Oasis</span><span class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Barcelona
                                                        Beachfront</span><span class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">London
                                                        Luxe</span><span class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                        </ul>
                                        <div class="box-see-more"> <a class="link-see-more" href="#">See more
                                                <svg width="8" height="6" viewbox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.89553 1.02367C7.75114 0.870518 7.50961 0.864815 7.35723 1.00881L3.9998 4.18946L0.642774 1.00883C0.490387 0.86444 0.249236 0.870534 0.104474 1.02369C-0.0402885 1.17645 -0.0338199 1.4176 0.118958 1.56236L3.73809 4.99102C3.81123 5.06036 3.90571 5.0954 3.9998 5.0954C4.0939 5.0954 4.18875 5.06036 4.26191 4.99102L7.88104 1.56236C8.03382 1.41758 8.04029 1.17645 7.89553 1.02367Z"
                                                        fill=""></path>
                                                </svg></a></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="section-box box-our-services-car background-body">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-8 col-md-8 mb-30 text-center text-lg-start wow fadeInUp">
                        <h2 class="neutral-1000">Our Services</h2>
                        <p class="text-xl-medium neutral-500">Just 4 easy and quick steps</p>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-30 wow fadeInUp">
                        <div class="d-flex justify-content-center justify-content-md-end"><a class="btn btn-black-lg"
                                href="#">View More
                                <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></a></div>
                    </div>
                </div>
                <div class="box-list-featured">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInDown">
                            <div class="card-spot background-card">
                                <div class="card-image"> <a href="#"><img
                                            src="{{ asset('assets/imgs/page/homepage8/service.png') }}"
                                            alt="Travila"></a></div>
                                <div class="card-info background-card">
                                    <div class="card-left">
                                        <div class="card-title"> <a class="text-lg-bold neutral-1000"
                                                href="#">Chauffeur Hailing</a></div>
                                        <div class="card-desc"> <a class="text-sm neutral-500" href="#">17
                                                services</a></div>
                                    </div>
                                    <div class="card-right">
                                        <div class="card-button"> <a href="#">
                                                <svg width="10" height="10" viewbox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInDown">
                            <div class="card-spot background-card">
                                <div class="card-image"> <a href="#"><img
                                            src="assets/imgs/page/homepage8/service2.png" alt="Travila"></a></div>
                                <div class="card-info background-card">
                                    <div class="card-left">
                                        <div class="card-title"> <a class="text-lg-bold neutral-1000"
                                                href="#">Airport Transfer</a></div>
                                        <div class="card-desc"> <a class="text-sm neutral-500" href="#">17
                                                services</a></div>
                                    </div>
                                    <div class="card-right">
                                        <div class="card-button"> <a href="#">
                                                <svg width="10" height="10" viewbox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInDown">
                            <div class="card-spot background-card">
                                <div class="card-image"> <a href="#"><img
                                            src="{{ asset('assets/imgs/page/homepage8/service3.png') }}"
                                            alt="Travila"></a></div>
                                <div class="card-info background-card">
                                    <div class="card-left">
                                        <div class="card-title"> <a class="text-lg-bold neutral-1000"
                                                href="#">Corporate Fleet</a></div>
                                        <div class="card-desc"> <a class="text-sm neutral-500" href="#">17
                                                services</a></div>
                                    </div>
                                    <div class="card-right">
                                        <div class="card-button"> <a href="#">
                                                <svg width="10" height="10" viewbox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInDown">
                            <div class="card-spot background-card">
                                <div class="card-image"> <a href="#"><img
                                            src="{{ asset('assets/imgs/page/homepage8/service4.png') }}"
                                            alt="Travila"></a></div>
                                <div class="card-info background-card">
                                    <div class="card-left">
                                        <div class="card-title"> <a class="text-lg-bold neutral-1000"
                                                href="#">One-Way Rentals</a></div>
                                        <div class="card-desc"> <a class="text-sm neutral-500" href="#">17
                                                services</a></div>
                                    </div>
                                    <div class="card-right">
                                        <div class="card-button"> <a href="#">
                                                <svg width="10" height="10" viewbox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
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
    </main>
@endsection
