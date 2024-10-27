@extends('layouts.frontend.app')
@section('title', '404')
@section('content')
    <main class="main">
        <section class="box-section block-banner-tourlist" style="background-image:url(assets/imgs/page/tour/banner3.png)">
            <div class="container">
                <div class="text-center">
                    <h1>Journey with Travila - Begin Your Story!</h1>
                    <h3 class="heading-2-medium">Easily search for top tours offered by our professional network</h3>
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
        <section class="box-section block-content-tourlist background-body">
            <div class="container">
                <div class="box-content-main">
                    <div class="content-right">
                        <div class="box-filters mb-25 pb-5 border-bottom border-1">
                            <div class="row align-items-center">
                                <div class="col-xl-4 col-md-4 mb-10 text-lg-start text-center">
                                    <div class="box-view-type"><a class="display-type display-grid active"
                                            href="tour-grid.html">
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
                                <div class="col-xl-8 col-md-8 mb-10 text-lg-end text-center">
                                    <div class="box-item-sort">
                                        <div class="item-sort border-1">
                                            <span class="text-xs-medium neutral-500 mr-5">Sort by:</span>
                                            <div class="dropdown dropdown-sort border-1">
                                                <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span id="selectedSortOption">Recently added</span> <!-- Display selected value -->
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort" style="margin: 0px;">
                                                    <li><a class="dropdown-item" href="#" data-sort="high-low">High - Low price</a></li>
                                                    <li><a class="dropdown-item" href="#" data-sort="low-high">Low - High price</a></li>
                                                    <li><a class="dropdown-item" href="#" data-sort="recently-added">Recently added</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-list-tours wow fadeIn">
                            <div class="row" id="activity-container">
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            </ul>
                        </nav>
                    </div>

                    <div class="content-left order-lg-first filters-list d-none">
                        <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Filter Price </h6>
                                    <div class="box-collapse scrollFilter">
                                        <div class="pt-20">
                                            <div class="box-slider-range">
                                                <div id="slider-range"></div>
                                                <div class="box-value-price"><span
                                                        class="text-md-medium neutral-1000">$0</span><span
                                                        class="text-md-medium neutral-1000">$500</span></div>
                                                <input class="value-money" type="hidden">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">By Activities</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">All </span><span
                                                        class="checkmark"></span>
                                                </label><span class="number-item">198</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">City
                                                        Tours</span><span class="checkmark"></span>
                                                </label><span class="number-item">32</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Explore Ruins
                                                    </span><span class="checkmark"></span>
                                                </label><span class="number-item">13</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Beach Snorkel
                                                    </span><span class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Mountain
                                                        Trek</span><span class="checkmark"></span>
                                                </label><span class="number-item">35</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Food
                                                        Tour</span><span class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">River
                                                        Cruise</span><span class="checkmark"></span>
                                                </label><span class="number-item">76</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">By Attractions</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Machu Picchu
                                                    </span><span class="checkmark"></span>
                                                </label><span class="number-item">32</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Great
                                                        Wall</span><span class="checkmark"></span>
                                                </label><span class="number-item">13</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Eiffel
                                                        Tower</span><span class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Statue of
                                                        Liberty</span><span class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Taj
                                                        Mahal</span><span class="checkmark"></span>
                                                </label><span class="number-item">35</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Taj
                                                        Mahal</span><span class="checkmark"></span>
                                                </label><span class="number-item">56</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Taj
                                                        Mahal</span><span class="checkmark"></span>
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
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">By Durations</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">0 - 3 hours
                                                    </span><span class="checkmark"></span>
                                                </label><span class="number-item">98</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">5-7
                                                        hours</span><span class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Full
                                                        day</span><span class="checkmark"></span>
                                                </label><span class="number-item">16</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Multi
                                                        days</span><span class="checkmark"></span>
                                                </label><span class="number-item">87</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Review Score </h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium"> <img
                                                            src="assets/imgs/template/icons/star-yellow.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"><img
                                                            src="assets/imgs/template/icons/star-grey.svg"
                                                            alt="Travila"></span><span class="checkmark"></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">By Language </h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox">
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">0 - 3 hours
                                                    </span><span class="checkmark"></span>
                                                </label><span class="number-item">98</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">5-7
                                                        hours</span><span class="checkmark"></span>
                                                </label><span class="number-item">23</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Full
                                                        day</span><span class="checkmark"></span>
                                                </label><span class="number-item">16</span>
                                            </li>
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox"><span class="text-sm-medium">Multi
                                                        days</span><span class="checkmark"></span>
                                                </label><span class="number-item">87</span>
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
                        </div>
                        {{-- <div class="sidebar-left border-1 background-body">
                            <h6 class="text-lg-bold neutral-1000">Popular Tours</h6>
                            <div class="box-popular-posts">
                                <ul>
                                    <li>
                                        <div class="card-post">
                                            <div class="card-image"> <a href="#"> <img
                                                        src="assets/imgs/page/tour/post.png" alt="Travila"></a></div>
                                            <div class="card-info"> <a class="text-xs-bold" href="#">Singapore
                                                    Skylines: Urban Exploration</a><span
                                                    class="price text-sm-bold neutral-1000">$48.25</span><span
                                                    class="price-through text-sm-bold neutral-500">$60.75</span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-post">
                                            <div class="card-image"> <a href="#"> <img
                                                        src="assets/imgs/page/tour/post2.png" alt="Travila"></a></div>
                                            <div class="card-info"> <a class="text-xs-bold" href="#">Singapore
                                                    Skylines: Urban Exploration</a><span
                                                    class="price text-sm-bold neutral-1000">$48.25</span><span
                                                    class="price-through text-sm-bold neutral-500">$60.75</span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-post">
                                            <div class="card-image"> <a href="#"> <img
                                                        src="assets/imgs/page/tour/post3.png" alt="Travila"></a></div>
                                            <div class="card-info"> <a class="text-xs-bold" href="#">Singapore
                                                    Skylines: Urban Exploration</a><span
                                                    class="price text-sm-bold neutral-1000">$48.25</span><span
                                                    class="price-through text-sm-bold neutral-500">$60.75</span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-post">
                                            <div class="card-image"> <a href="#"> <img
                                                        src="assets/imgs/page/tour/post4.png" alt="Travila"></a></div>
                                            <div class="card-info"> <a class="text-xs-bold" href="#">Singapore
                                                    Skylines: Urban Exploration</a><span
                                                    class="price text-sm-bold neutral-1000">$48.25</span><span
                                                    class="price-through text-sm-bold neutral-500">$60.75</span></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="card-post">
                                            <div class="card-image"> <a href="#"> <img
                                                        src="assets/imgs/page/tour/post5.png" alt="Travila"></a></div>
                                            <div class="card-info"> <a class="text-xs-bold" href="#">Singapore
                                                    Skylines: Urban Exploration</a><span
                                                    class="price text-sm-bold neutral-1000">$48.25</span><span
                                                    class="price-through text-sm-bold neutral-500">$60.75</span></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="box-see-more mt-20 mb-25"> <a class="link-see-more" href="#">See more
                                    <svg width="8" height="6" viewbox="0 0 8 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.89553 1.02367C7.75114 0.870518 7.50961 0.864815 7.35723 1.00881L3.9998 4.18946L0.642774 1.00883C0.490387 0.86444 0.249236 0.870534 0.104474 1.02369C-0.0402885 1.17645 -0.0338199 1.4176 0.118958 1.56236L3.73809 4.99102C3.81123 5.06036 3.90571 5.0954 3.9998 5.0954C4.0939 5.0954 4.18875 5.06036 4.26191 4.99102L7.88104 1.56236C8.03382 1.41758 8.04029 1.17645 7.89553 1.02367Z"
                                            fill=""></path>
                                    </svg></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-media background-body">
            <div class="container-media wow fadeInUp"> <img src="assets/imgs/page/homepage5/media.png"
                    alt="Travila"><img src="assets/imgs/page/homepage5/media2.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media3.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media4.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media5.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media6.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media7.png" alt="Travila"></div>
        </section>
    </main>
@endsection
