@extends('layouts.frontend.app')
@section('title', '404')
@section('content')
    <main class="main">
        <section class="box-section block-banner-tourlist" style="background-image:url(assets/imgs/page/tour/banner3.png)">
            <div class="container">
                <div class="text-center">
                    <h1>Journey with Travila - Begin Your Story!</h1>
                    <h3 class="heading-6-medium">Easily search for top tours offered by our professional network</h3>
                </div>
                <div class="box-search-advance box-search-advance-3 background-card mt-30 wow fadeInUp"
                    style="max-width: 600px; margin: 0 auto;">
                    <div class="box-bottom-search justify-content-center">
                        <div class="w-75">
                            <label class="text-sm-bold neutral-500">Tour name</label>
                            <div class="dropdown">
                                <input type="text" id="tourSearch" class="form-control" style="width: 100%;"
                                    placeholder="What are you looking for?" autocomplete="off">
                                <ul class="dropdown-menu" id="tourDropdown" style="width:100%; display: none;">
                                </ul>
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
                                    <span class="text-sm-bold neutral-500 number-found"> </span>
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
                            <div class="row" id="tour-container">
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            </ul>
                        </nav>
                    </div>
                    <div class="content-left order-lg-first filters-list d-none d-lg-block">
                        <div class="sidebar-left border-1 background-body">
                            <div class="box-filters-sidebar">
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">Filter Price </h6>
                                    <div class="box-collapse scrollFilter">
                                        <div class="pt-20">
                                            <div class="box-slider-range">
                                                <div class="box-value-price">
                                                    <div class="row"
                                                        style="display: flex; gap: 20px; justify-content: center;">
                                                        <input type="number" id="minPriceRange" placeholder="Min"
                                                            style="width:40%;">
                                                        <input type="number" id="maxPriceRange" placeholder="Max"
                                                            style="width:40%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">By Activities</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox activity-list">

                                        </ul>
                                    </div>
                                </div>
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">By Attractions</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox attraction-list">
                                        </ul>
                                    </div>
                                </div>
                                <div class="block-filter border-1">
                                    <h6 class="text-lg-bold item-collapse neutral-1000">By Destiations</h6>
                                    <div class="box-collapse scrollFilter">
                                        <ul class="list-filter-checkbox destination-list">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-media background-body">
            <div class="container-media wow fadeInUp"> <img src="assets/imgs/page/homepage5/media.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media2.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media3.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media4.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media5.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media6.png" alt="Travila"><img
                    src="assets/imgs/page/homepage5/media7.png" alt="Travila"></div>
        </section>
    </main>
@endsection
