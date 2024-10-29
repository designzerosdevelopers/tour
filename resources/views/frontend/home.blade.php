@extends('layouts.frontend.app')
@section('title', '404')
@section('content')
    <style>
        .sllider-container {
            position: relative;
            overflow: hidden;
            max-width: 100%;
            height: 450px;
        }

        .sllide {
            display: none;
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .sllide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .fadee {
            animation: fadeEffect 1s ease-in-out;
        }

        @keyframes fadeEffect {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Navigation Arrows */
        .navigation-arrows {
            position: absolute;
            bottom: 2%;
            right: 2%;
            display: flex;
        }

        .navigation-arrows span {
            cursor: pointer;
            color: rgba(255, 255, 255, 0.8);
            padding: 5px;
            font-size: 26px;
            border-radius: 50%;
            user-select: none;
            transition: background-color 0.3s ease;
        }

        .navigation-arrows span:hover {
            color: rgb(255, 255, 255);
        }

        /* Responsive search box */
        .box-search-advance {
            background-color: rgba(253, 253, 253, 0.8);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            width: 550px;
            /* Default width */
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .box-search-advance {
                width: 90%;
                /* Make it wider on mobile */
                padding: 20px;
                /* Adjust padding */
            }

            .navigation-arrows {
                bottom: 5%;
                /* Adjust arrow position */
                right: 5%;
                /* Adjust arrow position */
            }
        }

        @media (max-width: 480px) {
            .box-search-advance {
                width: 95%;
                /* Full width for very small screens */
                padding: 15px;
                /* Adjust padding */
            }

            #searchButton {
                margin-top: 5px;
            }
        }
    </style>

    <main class="main">
        <section class="section-box background-body">
            <div class="sllider-container">
                <div class="box-search-advance box-search-advance-3-col ">
                    <div class="box-top-search">
                        <div class="left-top-search">
                            <a class="category-link btn-click active" data-category="tours" href="#">Tours</a>
                            <a class="category-link btn-click" data-category="tickets" href="#">Tickets</a>
                            <a class="category-link btn-click" data-category="rentals" href="#">Rental</a>
                            <a class="category-link btn-click" data-category="activities" href="#">Activities</a>
                        </div>
                        <div class="right-top-search">
                            <a class="text-sm-medium need-some-help" href="#">Need some help?</a>
                        </div>
                    </div>
                    <div class="row mt-2" style="background-color:rgba(253, 253, 253, 0);">
                        <div class="col-md-8">
                            <div class="item-search">
                                <div class="dropdown">
                                    <input type="text" id="locationSearch" class="form-control"
                                        style="background: rgba(255, 255, 255, 0.445)"
                                        placeholder="What are you looking for?" autocomplete="off">
                                    <ul class="dropdown-menu" id="locationDropdown"
                                        style="width:100%; display: none; background-color:rgba(253, 253, 253, 0);">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="item-search bd-none d-flex justify-content-center">
                                <button class="btn btn-black-lg" id="searchButton">
                                    <svg width="30" height="20" viewbox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 19L14.6569 14.6569M14.6569 14.6569C16.1046 13.2091 17 11.2091 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17C11.2091 17 13.2091 16.1046 14.6569 14.6569Z"
                                            stroke="" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                    </svg>Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @if (empty($Homeimages) || $Homeimages->isEmpty())
                <div class="sllide fadee" style="background: linear-gradient(45deg, rgb(255, 0, 0), navy);">
                </div>
                @else
                    @foreach ($Homeimages as $image)
                        <div class="sllide fadee">
                            <img class="lazy" src="https://via.placeholder.com/600x400?text=Loading..."
                            data-original="{{ asset($image['path'] . $image['file']) }}" alt="{{ $image['alt'] }}">
                        </div>
                    @endforeach
                @endif



                <!-- Arrows for navigation -->
                <div class="navigation-arrows">
                    <span class="prev"><i class="fas fa-chevron-circle-left"></i></span>
                    <span class="next"><i class="fas fa-chevron-circle-right"></i></span>
                </div>
            </div>
        </section>
        <script>
            let currentIndex = 0;
            const sllides = document.getElementsByClassName('sllide');

            function showsllides(index) {
                for (let i = 0; i < sllides.length; i++) {
                    sllides[i].style.display = 'none'; // Hide all sllides
                }

                currentIndex += index;

                // Reset if out of bounds
                if (currentIndex >= sllides.length) {
                    currentIndex = 0;
                } else if (currentIndex < 0) {
                    currentIndex = sllides.length - 1;
                }

                sllides[currentIndex].style.display = 'block'; // Show the current sllide
            }

            // Initial call to show the first sllide
            showsllides(0);

            // Automatically change sllides every 5 seconds
            let autosllide = setInterval(function() {
                showsllides(1);
            }, 5000);

            // Change sllides on arrow click
            function changesllide(index) {
                clearInterval(autosllide); // Stop automatic sliding when arrows are clicked
                showsllides(index);
                autosllide = setInterval(function() {
                    showsllides(1);
                }, 3000); // Resume automatic sliding
            }

            // Attach event listeners to the navigation arrows
            document.querySelector('.prev').addEventListener('click', function() {
                changesllide(-1);
            });

            document.querySelector('.next').addEventListener('click', function() {
                changesllide(1);
            });
        </script>
        {{-- <section class="section-box box-banner-home4 background-body">
            <div class="banner-marker wow fadeInUp"> <img class="mr-10 light-mode"
                    src="assets/imgs/page/homepage4/marker.svg" alt="Travile"><img class="mr-10 dark-mode"
                    src="assets/imgs/page/homepage4/marker.svg" alt="Travile">
            </div>
            <div class="banner-plus wow fadeInUp"> <img class="mr-10 light-mode" src="assets/imgs/page/homepage4/plus.svg"
                    alt="Travile"><img class="mr-10 dark-mode" src="assets/imgs/page/homepage4/plus-dark.svg"
                    alt="Travile"></div>
            <div class="banner-fly wow fadeInUp"><img class="mr-10 light-mode" src="assets/imgs/page/homepage4/fly.svg"
                    alt="Travile"><img class="mr-10 dark-mode" src="assets/imgs/page/homepage4/fly-dark.svg"
                    alt="Travile"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 wow fadeInUp"><span class="btn btn-brand-secondary"> <img class="mr-10"
                                src="assets/imgs/page/homepage4/earth.svg" alt="Travile">Explore the World</span>
                        <h1 class="mt-20 mb-15 neutral-1000 hero-title">Unveil the
                            Beauty <br class="d-none d-lg-block"> of the World
                            Every Day</h1>
                        <h2 class="heading-2-medium neutral-500 mb-30 hero-description">Travel Without Limits Browse, Book,
                            Explore</h2>
                        <div class="box-search-advance box-search-advance-3-col background-card">
                            <div class="box-top-search">
                                <div class="left-top-search">
                                    <a class="category-link btn-click active" data-category="tours" href="#">Tours</a>
                                    <a class="category-link btn-click" data-category="tickets" href="#">Tickets</a>
                                    <a class="category-link btn-click" data-category="rentals" href="#">Rental</a>
                                    <a class="category-link btn-click" data-category="activities"
                                        href="#">Activities</a>
                                </div>
                                <div class="right-top-search"><a class="text-sm-medium need-some-help"
                                        href="#">Need
                                        some help?</a></div>
                            </div>
                            <div class="box-bottom-search background-card">
                                <div class="item-search">
                                    <label class="text-sm-bold neutral-500">Location</label>
                                    <div class="dropdown">
                                        <input type="text" id="locationSearch" class="form-control"
                                            placeholder="What are you looking for?" autocomplete="off">
                                        <ul class="dropdown-menu" id="locationDropdown"
                                            style="width:100%; display: none;">
                                        </ul>
                                    </div>
                                </div>
                                <div class="item-search bd-none d-flex justify-content-center">
                                    <button class="btn btn-black-lg" id="searchButton">
                                        <svg width="30" height="20" viewbox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19 19L14.6569 14.6569M14.6569 14.6569C16.1046 13.2091 17 11.2091 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17C11.2091 17 13.2091 16.1046 14.6569 14.6569Z"
                                                stroke="" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-image-banner-home4"><img src="assets/imgs/page/homepage4/banner.png" alt="Travila">
                    <div class="shape-rate"> <img class="light-mode" src="assets/imgs/page/homepage4/review.png"
                            alt="Travila"><img class="dark-mode" src="assets/imgs/page/homepage4/review-dark.png"
                            alt="Travila"></div>
                    <div class="shape-phone"><img class="light-mode" src="assets/imgs/page/homepage4/hotline.png"
                            alt="Travila"><img class="dark-mode" src="assets/imgs/page/homepage4/hotline-dark.png"
                            alt="Travila"></div>
                </div>
            </div>
        </section> --}}
        <section class="section-box box-popular-destinations background-body">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <h1 class="neutral-1000">Our Featured Tours</h1>
                    <p class="text-lg-medium neutral-500">Favorite destinations based on customer reviews</p>
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
                                            <img class="lazy" src="https://via.placeholder.com/600x400?text=Loading..."
                                                data-original="{{ $tour->images->first()->path . $tour->images->first()->file }}"
                                                alt="{{ $tour->images->first()->alt }}">
                                        @endif


                                    </div>
                                    <div class="card-info background-card" style="padding: 22px 22px">
                                        <div class="card-rating">
                                            <div class="card-left"> </div>
                                            {{-- <div class="card-right"> <span class="rating">4.96 <span
                                                        class="text-sm-medium neutral-500">(672 reviews)</span></span>
                                            </div> --}}
                                        </div>
                                        <div class="card-title"> <a class="heading-3 neutral-1000"
                                                href="{{ route('tours.show', $tour->slug) }}">{{ $tour->title }}</a></div>
                                        <div class="card-program">
                                            <div class="card-duration-tour">
                                                <p class="icon-duration text-md-medium neutral-500">7 days 6 nights</p>
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
        @if (getModel('Destination')->isNotEmpty())
            <section class="section-box box-popular-destinations background-body mt-0 pt-0">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-lg-6 mb-30 text-center text-lg-start">
                            <h1 class="neutral-1000">Popular Destinations</h2>
                            <p class="text-lg-medium neutral-500">Favorite destinations based on customer reviews</p>
                        </div>
                    </div>
                    <div class="box-list-populars">
                        <div class="row">
                            @foreach (getModel('Destination') as $destination)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="card-popular background-card hover-up">
                                        <div class="card-image">
                                            <a href="{{ route('destinations.show', $destination->slug) }}">
                                                <img class="lazy"
                                                    src="https://via.placeholder.com/600x400?text=Loading..."
                                                    data-original="{{ asset($destination->image->path . $destination->image->file) }}"
                                                    alt="{{ $destination->image->alt }}">
                                            </a>
                                        </div>

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
                                                        <svg width="10" height="10" viewbox="0 0 10 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011"
                                                                stroke="" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                        </svg></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-3 col-sm-6">
                                <div class="card-popular-2">
                                    <div class="card-info">
                                        <h1 class="neutral-500">Crafting Your Perfect Travel Experience</h2>
                                        <div class="card-meta">
                                            <div class="meta-links">Browse <br>All destinations</div>
                                            <div class="card-button hover-up"> <a
                                                    href="{{ route('destinations.index') }}">
                                                    <svg width="10" height="10" viewbox="0 0 10 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.00011 9.08347L9.08347 5.00011L5.00011 0.916748M9.08347 5.00011L0.916748 5.00011"
                                                            stroke="" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (getModel('Attraction')->isNotEmpty())
            <section class="section-box box-slide-banner background-body">
                <div class="container">
                    <div class="box-swiper mt-30">
                        <div class="swiper-container swiper-group-3 swiper-group-journey">
                            <div class="swiper-wrapper">
                                @foreach (getModel('Attraction') as $attraction)
                                    <div class="swiper-slide">
                                        <div class="card-banner-slide card-banner-slide-3 wow fadeInUp">
                                            @if ($attraction->images->isNotEmpty())
                                                <a href="{{ route('attractions.show', $attraction->slug) }}">
                                                    <div class="card-image"
                                                        style="position: relative; overflow: hidden; width: 100%; height: 100%;">
                                                        <img class="lazy"
                                                            src="https://via.placeholder.com/600x400?text=Loading..."
                                                            data-original="{{ asset($attraction->images->first()->path . $attraction->images->first()->file) }}"
                                                            alt="{{ $attraction->alt }}"
                                                            style="width: 100%; height: 300px; max-width: 100%; object-fit: cover; display: block;">
                                                    </div>

                                                </a>
                                            @endif
                                            <div class="card-info">
                                                <div class="box-title-top">
                                                    @if (!empty($attraction->status))
                                                        <p class="text-md-bold">{{ $attraction->status }}</p>
                                                    @endif

                                                </div>
                                                <a href="{{ route('attractions.show', $attraction->slug) }}">
                                                    <div class="box-title-middle">
                                                        @php
                                                            $title = $attraction->title;
                                                            $maxLength = 20;
                                                            $wrappedTitle = wordwrap($title, $maxLength, "\n", true);
                                                        @endphp

                                                        @foreach (explode("\n", $wrappedTitle) as $line)
                                                            <h6 style=" display: inline-block; color:white;">
                                                                {{ $line }}</h6>
                                                            <br>
                                                        @endforeach
                                                    </div>
                                                </a>
                                                <div class="box-button"><a class="btn btn-brand-secondary"
                                                        href="{{ route('attractions.index') }}">View
                                                        More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="box-button-slider box-button-slider-team">
                            <div class="swiper-button-prev swiper-button-prev-style-1 swiper-button-prev-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewbox="0 0 16 16" fill="none">
                                    <path
                                        d="M7.99992 3.33325L3.33325 7.99992M3.33325 7.99992L7.99992 12.6666M3.33325 7.99992H12.6666"
                                        stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="swiper-button-next swiper-button-next-style-1 swiper-button-next-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewbox="0 0 16 16" fill="none">
                                    <path
                                        d="M7.99992 12.6666L12.6666 7.99992L7.99992 3.33325M12.6666 7.99992L3.33325 7.99992"
                                        stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <section class="section-box box-how-it-work background-body">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <h2 class="neutral-1000">How It Work?</h2>
                    <p class="text-lg-medium neutral-500">Competitive fares for your route-specific searches.</p>
                </div>
                <div class="row mt-60 align-items-center">
                    <div class="col-lg-6 wow fadeInUp">
                        <div class="box-image-how">
                            <div class="image-top-how"> <img src="assets/imgs/page/homepage4/img-how.png" alt="TRavila">
                            </div>
                            <div class="image-bottom-how"> <img src="assets/imgs/page/homepage4/img-how2.png"
                                    alt="TRavila"><img src="assets/imgs/page/homepage4/img-how3.png" alt="TRavila">
                                <div class="shape"> <img class="light-mode" src="assets/imgs/page/homepage4/wave.png"
                                        alt="TRavila"><img class="dark-mode"
                                        src="assets/imgs/page/homepage4/wave-dark.png" alt="TRavila"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-why-travel card-why-travel-2 background-1 wow fadeInUp">
                            <div class="card-image"> <img src="assets/imgs/page/homepage2/security.svg" alt="Travila">
                            </div>
                            <div class="card-info"> <a class="text-xl-bold card-title" href="#">Find Your
                                    Destination</a>
                                <p class="text-sm-medium neutral-500 card-desc">Choose your destination based on weather,
                                    activities, and budget. Check travel advisories, visa requirements, and safety concerns.
                                </p><a class="text-sm-medium card-link" href="#">Learn More
                                    <svg width="11" height="10" viewbox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.50011 9.08347L9.58347 5.00011L5.50011 0.916748M9.58347 5.00011L1.41675 5.00011"
                                            stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="card-why-travel card-why-travel-2 background-2 wow fadeInUp">
                            <div class="card-image"> <img src="assets/imgs/page/homepage2/support.svg" alt="Travila">
                            </div>
                            <div class="card-info"> <a class="text-xl-bold card-title" href="#">Book a Ticket</a>
                                <p class="text-sm-medium neutral-500 card-desc">Choose reputable platforms or book
                                    directly. Read reviews and understand cancellation policies.</p><a
                                    class="text-sm-medium card-link" href="#">Learn More
                                    <svg width="11" height="10" viewbox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.50011 9.08347L9.58347 5.00011L5.50011 0.916748M9.58347 5.00011L1.41675 5.00011"
                                            stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="card-why-travel card-why-travel-2 background-3 wow fadeInUp">
                            <div class="card-image"> <img src="assets/imgs/page/homepage2/policy.svg" alt="Travila">
                            </div>
                            <div class="card-info"> <a class="text-xl-bold card-title" href="#">Pay and Go</a>
                                <p class="text-sm-medium neutral-500 card-desc">Ensure secure transactions. Save and print
                                    confirmation emails. Consider travel insurance for unforeseen events.</p><a
                                    class="text-sm-medium card-link" href="#">Learn More
                                    <svg width="11" height="10" viewbox="0 0 11 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.50011 9.08347L9.58347 5.00011L5.50011 0.916748M9.58347 5.00011L1.41675 5.00011"
                                            stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box box-payments box-payments-2 background-body">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-30 wow fadeInUp">
                        <div class="box-left-payment"><span class="btn btn-tag">Easy payment</span>
                            <h2 class="title-why mb-25 mt-10 neutral-1000">Discover Dream Destinations with Ease</h2>
                            <ul class="list-check">
                                <li>Security Assurance</li>
                                <li>Customer Support</li>
                                <li>Transparent Policies</li>
                                <li>Reputable Affiliations</li>
                            </ul>
                            {{-- <div class="payment-method">
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
                                                        alt="Travila"></div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="btn btn-payment"><img
                                                        src="{{ asset('assets/imgs/template/icons/skrill.png') }}"
                                                        alt="Travila"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-5 mb-30 text-center text-lg-end wow fadeInUp">
                        <div class="box-video-payment">
                            <div class="dot-payment"> <img src="assets/imgs/page/homepage4/dot-payment.png"
                                    alt="Travila"></div>
                            <div class="img-sm-payment"> <img src="assets/imgs/page/homepage4/img-payment-sm.png"
                                    alt="Travila"></div>
                            <div class="review-payment"> <img class="light-mode"
                                    src="assets/imgs/page/homepage4/img-review.png" alt="Travila"><img class="dark-mode"
                                    src="assets/imgs/page/homepage4/img-review-dark.png" alt="Travila"></div>
                            <div class="card-video">
                                <div class="card-image"><a class="btn btn-play popup-youtube"
                                        href="https://www.youtube.com/watch?v=JXMWOmuR1hU"></a><img
                                        src="assets/imgs/page/homepage4/img-payment.png" alt="Travila"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if (getModel('5-Posts')->isNotEmpty())
            <section class="section-box box-news background-body">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-md-6 mb-30 wow fadeInLeft">
                            <h2 class="neutral-1000">News, Tips & Guides</h2>
                            <p class="text-lg-medium neutral-500">Favorite destinations based on customer reviews</p>
                        </div>
                        <div class="col-md-6 mb-30 wow fadeInRight">
                            <div class="d-flex justify-content-center justify-content-md-end"><a class="btn btn-black-lg"
                                    href="{{ route('posts.index') }}">View More
                                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg></a></div>
                        </div>
                    </div>
                    <div class="box-list-news wow fadeInUp">
                        <div class="box-swiper mt-30">
                            <div class="swiper-container swiper-group-3">
                                <div class="swiper-wrapper">
                                    @foreach (getModel('5-Posts') as $post)
                                        <div class="swiper-slide">
                                            <div class="card-news background-card hover-up">
                                                <div class="card-image">
                                                    <label class="label">{{ $post->category->title ?? '' }}</label>
                                                    <img class="lazy"
                                                        src="https://via.placeholder.com/600x400?text=Loading..."
                                                        data-original="{{ asset($post->images->first()->path . $post->images->first()->file) }}"
                                                        alt="{{ $post->images->first()->alt }}"
                                                        style="height: 300px; object-fit: cover;">
                                                </div>

                                                <div class="card-info">
                                                    <div class="card-meta"> <span
                                                            class="post-date neutral-1000">{{ $post->created_at ? $post->created_at->format('d M Y') : 'N/A' }}</span>
                                                    </div>
                                                    <div class="card-title"> <a class="text-xl-bold neutral-1000"
                                                            href="#">{{ $post->title }}</a></div>
                                                    <div class="card-program">
                                                        <div class="endtime">
                                                            <div class="card-author">
                                                            </div>
                                                            <div class="card-button"> <a class="btn btn-gray"
                                                                    href="{{ route('posts.show', $post->slug) }}">Keep
                                                                    Reading</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if (getModel('Home-qna'))
            <section class="section-box box-faqs background-body">
                <div class="box-faqs-inner">
                    <div class="container">
                        <div class="text-center">
                            <h2 class="neutral-1000 wow fadeInLeft">Frequently Asked Questions</h2>
                            <p class="text-lg-medium neutral-500 wow fadeInLeft">You need to come at least once in your
                                life</p>
                        </div>
                        <div class="block-faqs w-75">
                            <div class="accordion" id="accordionFAQ">
                                <div class="accordion-item wow fadeInUp">
                                    @foreach (getModel('Home-qna') as $index => $item)
                                        <h5 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button text-heading-5" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                                aria-controls="collapse{{ $index }}">
                                                <h3>{{ $index + 1 }}</h3>
                                                <p>{{ $item->question }}</p>
                                            </button>
                                        </h5>
                                        <div class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                            id="collapse{{ $index }}"
                                            aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionFAQ">
                                            <div class="accordion-body">
                                                {{ $item->answer }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
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
