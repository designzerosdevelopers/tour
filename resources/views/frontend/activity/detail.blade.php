@extends('layouts.frontend.app')
@section('content')
    <main class="main background-body">
        <section class="box-section box-breadcrumb background-body">
            <div class="container">
                <ul class="breadcrumbs">
                    <li> <a href="{{ route('home') }}">Home</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <a href="{{ route('activities.index') }}">Activities</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <span class="text-breadcrumb">{{ $activity->title }} </span></li>
                </ul>
            </div>
        </section>
        {{--   <section class="box-section box-content-tour-detail background-body">
            <div class="container mb-65">
                <div class="tour-header">
                    <div class="tour-rate">
                        <div class="rate-element"><span class="rating">4.96 <span class="text-sm-medium neutral-500">(672
                                    reviews)</span></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="tour-title-main">
                                <h4 class="neutral-1000">{{ $activity->title }} </h4>
                            </div>
                        </div>
                    </div>
                    <div class="tour-metas">
                        <div class="tour-meta-left">
                            <p class="text-md-medium neutral-500 mr-20 tour-location">
                                <svg width="12" height="16" viewbox="0 0 12 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z"
                                        fill=""></path>
                                </svg> {{ $activity->location }}
                            </p><a class="text-md-medium neutral-1000 mr-30" href="#">Show on map</a>
                            <p class="text-md-medium neutral-500 tour-code mr-15">
                                <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.2729 0.273646C13.4097 0.238432 13.5538 0.24262 13.6884 0.28573L18.5284 1.83572L18.5474 1.84209C18.8967 1.96436 19.1936 2.19167 19.4024 2.4875C19.5891 2.75202 19.7309 3.08694 19.7489 3.46434C19.7494 3.47622 19.7497 3.4881 19.7497 3.49998V15.5999C19.7625 15.8723 19.7102 16.1395 19.609 16.3754C19.6059 16.3827 19.6026 16.39 19.5993 16.3972C19.476 16.6613 19.3017 16.8663 19.1098 17.0262C19.1023 17.0324 19.0947 17.0385 19.087 17.0445C18.8513 17.2258 18.5774 17.3363 18.2988 17.3734L18.2927 17.3743C18.0363 17.4063 17.7882 17.3792 17.5622 17.3133C17.5379 17.3081 17.5138 17.3016 17.4901 17.294L13.4665 16.0004L6.75651 17.7263C6.62007 17.7614 6.47649 17.7574 6.34221 17.7147L1.47223 16.1647C1.46543 16.1625 1.45866 16.1603 1.45193 16.1579C1.0871 16.0302 0.813939 15.7971 0.613929 15.5356C0.608133 15.528 0.602481 15.5203 0.596973 15.5125C0.395967 15.2278 0.277432 14.8905 0.260536 14.5357C0.259972 14.5238 0.259689 14.5119 0.259689 14.5V2.39007C0.246699 2.11286 0.301239 1.83735 0.420015 1.58283C0.544641 1.31578 0.724533 1.10313 0.942417 0.93553C1.17424 0.757204 1.45649 0.6376 1.7691 0.61312C2.03626 0.583264 2.30621 0.616234 2.56047 0.712834L6.56277 1.99963L13.2729 0.273646ZM13.437 1.78025L6.72651 3.50634C6.58929 3.54162 6.44493 3.53736 6.31011 3.49398L2.08011 2.13402C2.06359 2.1287 2.04725 2.12282 2.03113 2.11637C2.00054 2.10413 1.96854 2.09972 1.93273 2.10419C1.91736 2.10611 1.90194 2.10756 1.88649 2.10852C1.88649 2.10852 1.88436 2.10866 1.88088 2.11001C1.8771 2.11149 1.86887 2.11532 1.85699 2.12447C1.81487 2.15686 1.79467 2.18421 1.77929 2.21715C1.76189 2.25446 1.75611 2.28942 1.75823 2.32321C1.7592 2.33879 1.75969 2.35439 1.75969 2.36999V14.4772C1.76448 14.5336 1.78316 14.5879 1.81511 14.6367C1.86704 14.7014 1.90866 14.7272 1.94108 14.7398L6.59169 16.2199L13.3028 14.4937C13.44 14.4584 13.5844 14.4626 13.7192 14.506L17.8938 15.8482C17.9184 15.8537 17.9428 15.8605 17.9669 15.8685C18.0209 15.8865 18.0669 15.8902 18.1034 15.8862C18.1214 15.8833 18.1425 15.8759 18.1629 15.8623C18.1981 15.8309 18.2196 15.8024 18.2346 15.7738C18.2473 15.7399 18.2533 15.7014 18.2511 15.6668C18.2502 15.6512 18.2497 15.6356 18.2497 15.62V3.52464C18.2453 3.48222 18.2258 3.42174 18.1769 3.3525C18.147 3.3102 18.1062 3.2784 18.0582 3.26022L13.437 1.78025Z"
                                        fill=""></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.55957 2.02002C6.97375 2.02002 7.30957 2.3558 7.30957 2.77002V16.92C7.30957 17.3343 6.97375 17.67 6.55957 17.67C6.14533 17.67 5.80957 17.3343 5.80957 16.92V2.77002C5.80957 2.3558 6.14533 2.02002 6.55957 2.02002Z"
                                        fill=""></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13.4893 0.330078C13.9035 0.330078 14.2393 0.665862 14.2393 1.08008V15.2301C14.2393 15.6443 13.9035 15.9801 13.4893 15.9801C13.0751 15.9801 12.7393 15.6443 12.7393 15.2301V1.08008C12.7393 0.665862 13.0751 0.330078 13.4893 0.330078Z"
                                        fill=""></path>
                                </svg>Tour Code:
                            </p><a class="text-md-medium neutral-1000" href="#">LVA-4125</a>
                        </div>
                        <div class="tour-meta-right"> <a class="btn btn-share" href="#">
                                <svg width="16" height="18" viewbox="0 0 16 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 11.5332C12.012 11.5332 11.1413 12.0193 10.5944 12.7584L5.86633 10.3374C5.94483 10.0698 6 9.79249 6 9.49989C6 9.10302 5.91863 8.72572 5.77807 8.37869L10.7262 5.40109C11.2769 6.04735 12.0863 6.46655 13 6.46655C14.6543 6.46655 16 5.12085 16 3.46655C16 1.81225 14.6543 0.466553 13 0.466553C11.3457 0.466553 10 1.81225 10 3.46655C10 3.84779 10.0785 4.20942 10.2087 4.54515L5.24583 7.53149C4.69563 6.90442 3.8979 6.49989 3 6.49989C1.3457 6.49989 0 7.84559 0 9.49989C0 11.1542 1.3457 12.4999 3 12.4999C4.00433 12.4999 4.8897 11.9996 5.4345 11.2397L10.147 13.6529C10.0602 13.9331 10 14.2249 10 14.5332C10 16.1875 11.3457 17.5332 13 17.5332C14.6543 17.5332 16 16.1875 16 14.5332C16 12.8789 14.6543 11.5332 13 11.5332Z"
                                        fill=""></path>
                                </svg>Share</a><a class="btn btn-wishlish" href="#">
                                <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.2222 2.3638C4.34203 0.243977 7.65342 0.0419426 10.0004 1.7577C12.3473 0.0419426 15.6587 0.243977 17.7786 2.3638C20.1217 4.70695 20.1217 8.50594 17.7786 10.8491L12.1217 16.5059C10.9501 17.6775 9.05063 17.6775 7.87906 16.5059L2.2222 10.8491C-0.120943 8.50594 -0.120943 4.70695 2.2222 2.3638Z"
                                        fill=""></path>
                                </svg>Wishlish</a></div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="box-section block-banner-tour-detail-4 background-card pt-45">
            <div class="box-banner-tour-detail-4">
                <div class="box-banner-tour-detail-4-inner">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-1">
                            <div class="swiper-wrapper">
                                @foreach ($activity->images as $image)
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
                            <h1 class="color-white">{{ $activity->title }}</h1>
                        </div>
                        <div class="tour-metas">
                            <div class="tour-meta-left">
                                <p class="text-md-medium color-white mr-20 tour-location">
                                    <svg width="12" height="16" viewbox="0 0 12 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.99967 0C2.80452 0 0.205078 2.59944 0.205078 5.79456C0.205078 9.75981 5.39067 15.581 5.61145 15.8269C5.81883 16.0579 6.18089 16.0575 6.38789 15.8269C6.60867 15.581 11.7943 9.75981 11.7943 5.79456C11.7942 2.59944 9.1948 0 5.99967 0ZM5.99967 8.70997C4.39211 8.70997 3.0843 7.40212 3.0843 5.79456C3.0843 4.187 4.39214 2.87919 5.99967 2.87919C7.6072 2.87919 8.91502 4.18703 8.91502 5.79459C8.91502 7.40216 7.6072 8.70997 5.99967 8.70997Z"
                                            fill=""></path>
                                    </svg>{{ $activity->location }}
                                </p>
                                {{-- <a class="text-md-medium color-white mr-30" href="#">Show on
                                        map</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row mt-65">
                <div class="col-lg-8">
                    <div class="box-info-tour">
                        <div class="tour-info-group">
                            <div class="icon-item">
                                <svg width="18" height="19" viewbox="0 0 18 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.5312 1.8828H13.8595V1.20312C13.8595 0.814789 13.5448 0.5 13.1564 0.5C12.7681 0.5 12.4533 0.814789 12.4533 1.20312V1.8828H5.55469V1.20312C5.55469 0.814789 5.2399 0.5 4.85156 0.5C4.46323 0.5 4.14844 0.814789 4.14844 1.20312V1.8828H3.47678C1.55967 1.8828 0 3.44247 0 5.35954V15.0232C0 16.9403 1.55967 18.5 3.47678 18.5H14.5313C16.4483 18.5 18.008 16.9403 18.008 15.0232V5.35954C18.008 3.44247 16.4483 1.8828 14.5312 1.8828ZM3.47678 3.28905H4.14844V4.66014C4.14844 5.04848 4.46323 5.36327 4.85156 5.36327C5.2399 5.36327 5.55469 5.04848 5.55469 4.66014V3.28905H12.4533V4.66014C12.4533 5.04848 12.7681 5.36327 13.1565 5.36327C13.5448 5.36327 13.8596 5.04848 13.8596 4.66014V3.28905H14.5313C15.6729 3.28905 16.6018 4.21788 16.6018 5.35954V6.03124H1.40625V5.35954C1.40625 4.21788 2.33508 3.28905 3.47678 3.28905ZM14.5312 17.0938H3.47678C2.33508 17.0938 1.40625 16.1649 1.40625 15.0232V7.43749H16.6018V15.0232C16.6018 16.1649 15.6729 17.0938 14.5312 17.0938ZM6.24611 10.2031C6.24611 10.5915 5.93132 10.9062 5.54298 10.9062H4.16018C3.77184 10.9062 3.45705 10.5915 3.45705 10.2031C3.45705 9.81479 3.77184 9.5 4.16018 9.5H5.54298C5.93128 9.5 6.24611 9.81479 6.24611 10.2031ZM14.551 10.2031C14.551 10.5915 14.2362 10.9062 13.8479 10.9062H12.4651C12.0767 10.9062 11.7619 10.5915 11.7619 10.2031C11.7619 9.81479 12.0767 9.5 12.4651 9.5H13.8479C14.2362 9.5 14.551 9.81479 14.551 10.2031ZM10.3945 10.2031C10.3945 10.5915 10.0798 10.9062 9.69142 10.9062H8.30862C7.92028 10.9062 7.60549 10.5915 7.60549 10.2031C7.60549 9.81479 7.92028 9.5 8.30862 9.5H9.69142C10.0797 9.5 10.3945 9.81479 10.3945 10.2031ZM6.24611 14.3516C6.24611 14.7399 5.93132 15.0547 5.54298 15.0547H4.16018C3.77184 15.0547 3.45705 14.7399 3.45705 14.3516C3.45705 13.9632 3.77184 13.6484 4.16018 13.6484H5.54298C5.93128 13.6484 6.24611 13.9632 6.24611 14.3516ZM14.551 14.3516C14.551 14.7399 14.2362 15.0547 13.8479 15.0547H12.4651C12.0767 15.0547 11.7619 14.7399 11.7619 14.3516C11.7619 13.9632 12.0767 13.6484 12.4651 13.6484H13.8479C14.2362 13.6484 14.551 13.9632 14.551 14.3516ZM10.3945 14.3516C10.3945 14.7399 10.0798 15.0547 9.69142 15.0547H8.30862C7.92028 15.0547 7.60549 14.7399 7.60549 14.3516C7.60549 13.9632 7.92028 13.6484 8.30862 13.6484H9.69142C10.0797 13.6484 10.3945 13.9632 10.3945 14.3516Z"
                                        fill=""></path>
                                </svg>
                            </div>
                            <div class="info-item">
                                <p class="text-sm-medium neutral-600">Duration</p>
                                <p class="text-lg-bold neutral-1000">{{ $activity->duration }}</p>
                            </div>
                        </div>
                        <div class="tour-info-group">
                            <div class="icon-item background-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 100 125"
                                    x="0px" y="0px">
                                    <path
                                        d="M50,44.09a12,12,0,1,0-12-12A12,12,0,0,0,50,44.09Zm0-21a9,9,0,1,1-9,9A9,9,0,0,1,50,23.1Z" />
                                    <path
                                        d="M24.07,50.91a9.47,9.47,0,1,0-9.46-9.47A9.47,9.47,0,0,0,24.07,50.91Zm0-15.93a6.47,6.47,0,1,1-6.46,6.46A6.47,6.47,0,0,1,24.07,35Z" />
                                    <path
                                        d="M75.93,50.91a9.47,9.47,0,1,0-9.46-9.47A9.47,9.47,0,0,0,75.93,50.91Zm0-15.93a6.47,6.47,0,1,1-6.46,6.46A6.47,6.47,0,0,1,75.93,35Z" />
                                    <path
                                        d="M75.93,52.49a16.88,16.88,0,0,0-9,2.6,21.9,21.9,0,0,0-33.78,0l-.06,0a17,17,0,0,0-26,14.44v.91a1.5,1.5,0,0,0,3,0v-.91a14,14,0,0,1,21.28-12,21.84,21.84,0,0,0-3.28,11.53v1.21a1.5,1.5,0,0,0,3,0V69.06a18.93,18.93,0,0,1,37.86,0,1.5,1.5,0,0,0,3,0,21.78,21.78,0,0,0-3.28-11.52,13.85,13.85,0,0,1,7.28-2,14,14,0,0,1,14,14,1.5,1.5,0,1,0,3,0A17,17,0,0,0,75.93,52.49Z" />
                                </svg>
                            </div>
                            <div class="info-item">
                                <p class="text-sm-medium neutral-600">Group Size</p>
                                <p class="text-lg-bold neutral-1000"> {{ $activity->no_of_people }} People</p>
                            </div>
                        </div>
                        <div class="tour-info-group">
                            <div class="icon-item background-7">
                                <svg width="21" height="21" viewbox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 2.25C13.4142 2.25 13.75 1.91421 13.75 1.5C13.75 1.08579 13.4142 0.75 13 0.75H9.9548C8.1182 0.74999 6.67861 0.74999 5.53648 0.87373C4.37094 1.00001 3.42656 1.26232 2.62024 1.84815C2.13209 2.20281 1.70281 2.63209 1.34815 3.12023C0.76232 3.92656 0.50001 4.87094 0.37373 6.03648C0.24999 7.17861 0.24999 8.6182 0.25 10.4548V10.5452C0.24999 12.3818 0.24999 13.8214 0.37373 14.9635C0.50001 16.1291 0.76232 17.0734 1.34815 17.8798C1.70281 18.3679 2.13209 18.7972 2.62023 19.1518C3.42656 19.7377 4.37094 20 5.53648 20.1263C6.67859 20.25 8.1182 20.25 9.9547 20.25H10.0453C11.8818 20.25 13.3214 20.25 14.4635 20.1263C15.6291 20 16.5734 19.7377 17.3798 19.1518C17.8679 18.7972 18.2972 18.3679 18.6518 17.8798C19.2377 17.0734 19.5 16.1291 19.6263 14.9635C19.75 13.8214 19.75 12.3818 19.75 10.5453V7.5C19.75 7.08579 19.4142 6.75 19 6.75C18.5858 6.75 18.25 7.08579 18.25 7.5V10.5C18.25 12.3916 18.249 13.75 18.135 14.802C18.0225 15.8399 17.8074 16.4901 17.4383 16.9981C17.1762 17.3589 16.8589 17.6762 16.4981 17.9383C15.9901 18.3074 15.3399 18.5225 14.302 18.635C13.25 18.749 11.8916 18.75 10 18.75C8.1084 18.75 6.74999 18.749 5.69804 18.635C4.66013 18.5225 4.00992 18.3074 3.50191 17.9383C3.14111 17.6762 2.82382 17.3589 2.56168 16.9981C2.19259 16.4901 1.97745 15.8399 1.865 14.802C1.75103 13.75 1.75 12.3916 1.75 10.5C1.75 8.6084 1.75103 7.24999 1.865 6.19805C1.97745 5.16013 2.19259 4.50992 2.56168 4.00191C2.82382 3.64111 3.14111 3.32382 3.50191 3.06168C4.00992 2.69259 4.66013 2.47745 5.69805 2.365C6.74999 2.25103 8.1084 2.25 10 2.25H13Z"
                                        fill=""></path>
                                    <path
                                        d="M4.32682 13.0267C4.1444 13.3986 4.29799 13.848 4.66987 14.0304C5.04175 14.2128 5.4911 14.0592 5.67352 13.6873L7.13386 10.7103C7.58649 9.78749 8.91687 9.83259 9.30597 10.7839C10.1852 12.9329 13.1906 13.0347 14.2132 10.9501L15.6736 7.97305C15.856 7.60116 15.7024 7.15181 15.3305 6.9694C14.9586 6.78698 14.5093 6.94057 14.3268 7.31245L12.8665 10.2895C12.4139 11.2123 11.0835 11.1672 10.6944 10.2159C9.81517 8.06687 6.80972 7.96506 5.78715 10.0497L4.32682 13.0267Z"
                                        fill=""></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.5 2.5C15.5 3.88071 16.6193 5 18 5C19.3807 5 20.5 3.88071 20.5 2.5C20.5 1.11929 19.3807 0 18 0C16.6193 0 15.5 1.11929 15.5 2.5ZM17 2.5C17 3.05228 17.4477 3.5 18 3.5C18.5523 3.5 19 3.05228 19 2.5C19 1.94772 18.5523 1.5 18 1.5C17.4477 1.5 17 1.94772 17 2.5Z"
                                        fill=""></path>
                                </svg>
                            </div>
                            <div class="info-item">
                                <p class="text-sm-medium neutral-600">Tour Type</p>
                                <p class="text-lg-bold neutral-1000">{{ $activity->activity_type }}</p>
                            </div>
                        </div>
                        <div class="tour-info-group">
                            <div class="icon-item background-3">
                                <svg width="24" height="25" viewbox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_652_10262)">
                                        <path
                                            d="M21.5993 9.98724C22.2546 8.57953 22.7344 7.10443 22.7344 5.80109C22.7344 2.87799 20.3571 0.5 17.4351 0.5C15.3765 0.5 13.5884 1.6803 12.7114 3.39984C12.4056 3.37347 12.0963 3.35938 11.7891 3.35938C5.9469 3.35938 1.21875 8.08698 1.21875 13.9297C1.21875 19.7719 5.94635 24.5 11.7891 24.5C17.6312 24.5 22.3594 19.7724 22.3594 13.9297C22.3594 12.6126 22.123 11.2964 21.5993 9.98724ZM17.4351 1.90625C19.5817 1.90625 21.3281 3.65344 21.3281 5.80109C21.3281 8.57275 18.605 12.5386 17.4124 14.1425C15.8795 12.0587 13.5421 8.38324 13.5421 5.80109C13.5419 3.65344 15.2884 1.90625 17.4351 1.90625ZM5.05829 7.71765L9.77563 10.0762L9.23492 12.7796L7.3678 14.0244C7.17224 14.1547 7.05469 14.3743 7.05469 14.6094V17.6237L3.9613 18.6904C3.11389 17.3019 2.625 15.6719 2.625 13.9297C2.625 11.5349 3.54895 9.35187 5.05829 7.71765ZM4.82538 19.8799L7.98706 18.7897C8.27069 18.6919 8.46094 18.4249 8.46094 18.125V14.9857L10.2572 13.7881C10.4123 13.6847 10.5201 13.5239 10.5566 13.341L11.2597 9.82538C11.322 9.51447 11.1683 9.20044 10.8847 9.05872L6.16553 6.69904C7.888 5.35632 10.0206 4.67059 12.2355 4.77679C11.7907 7.03979 13.0248 9.73877 14.1724 11.7544L12.2307 13.365C11.9421 13.6045 11.8922 14.0282 12.1172 14.3281L13.3828 16.0156H10.5703C10.1819 16.0156 9.86719 16.3304 9.86719 16.7188V20.9375C9.86719 21.3259 10.1819 21.6406 10.5703 21.6406H13.7891L14.4481 22.6999C11.0292 23.7385 7.24127 22.703 4.82538 19.8799ZM15.7798 22.1782L14.7766 20.566C14.6483 20.3598 14.4227 20.2344 14.1797 20.2344H11.2734V17.4219H14.7891C15.3671 17.4219 15.6989 16.7599 15.3516 16.2969L13.6439 14.02L14.9059 12.9731C15.8904 14.5264 16.7787 15.6379 16.8618 15.741C17.1422 16.0889 17.6722 16.0903 17.9544 15.7439C18.0595 15.615 19.4385 13.909 20.6884 11.7328C20.8641 12.4469 20.9531 13.1819 20.9531 13.9297C20.9531 17.5532 18.8392 20.692 15.7798 22.1782Z"
                                            fill="black"></path>
                                        <path
                                            d="M17.436 8.2724C18.7959 8.2724 19.9022 7.16571 19.9022 5.8056C19.9022 4.44531 18.7957 3.33862 17.436 3.33862C16.076 3.33862 14.9697 4.44531 14.9697 5.8056C14.9697 7.16571 16.076 8.2724 17.436 8.2724ZM17.436 4.74487C18.0204 4.74487 18.496 5.22076 18.496 5.8056C18.496 6.39026 18.0204 6.86615 17.436 6.86615C16.8515 6.86615 16.376 6.39026 16.376 5.8056C16.376 5.22076 16.8515 4.74487 17.436 4.74487Z"
                                            fill="black"></path>
                                    </g>
                                    <defs>
                                        <clippath id="clip0_652_10262">
                                            <rect width="24" height="24" fill="white"
                                                transform="translate(0 0.5)"></rect>
                                        </clippath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="info-item">
                                <p class="text-sm-medium neutral-600">Languages</p>
                                @if (json_decode($activity->languages))
                                    @foreach (json_decode($activity->languages) as $language)
                                        <p class="text-lg-bold neutral-1000">
                                            {{ $language }}
                                        </p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
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
                                        {!! $activity->description !!}
                                    </p>


                                </div>
                            </div>
                        </div>

                        @if (json_decode($activity->includes)[0] != null || json_decode($activity->excludes)[0] != null)
                            <div class="group-collapse-expand">
                                <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseIncluded" aria-expanded="false"
                                    aria-controls="collapseIncluded">
                                    <h2>Included/Excluded</h2>
                                    <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                <div class="collapse show" id="collapseIncluded">
                                    <div class="card card-body">
                                        <div class="row">
                                            @if (json_decode($activity->includes)[0] != null)
                                                <div class="col-lg-6">
                                                    <p class="text-md-bold">Included:</p>
                                                    <ul>
                                                        @foreach (json_decode($activity->includes) as $include)
                                                            <li>{{ $include }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            @if (json_decode($activity->excludes)[0] != null)
                                                <div class="col-lg-6">
                                                    <p class="text-md-bold">Excluded:</p>
                                                    <ul>
                                                        @foreach (json_decode($activity->excludes) as $excludes)
                                                            <li>{{ $excludes }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($activity->other_info)
                            
                      
                        <div class="group-collapse-expand">
                            <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseDuration" aria-expanded="false"
                                aria-controls="collapseDuration">
                                <h2>Know More about this Tour</h2>
                                <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <div class="collapse show" id="collapseDuration">
                                <div class="card card-body">
                                   {!!  $activity->other_info  !!}
                                </div>
                            </div>
                        </div>

                        @endif

                        @if (!empty($activity->qna) && count($activity->qna) > 0)
                            <div class="group-collapse-expand">
                                <button class="btn btn-collapse" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseQuestion" aria-expanded="false"
                                    aria-controls="collapseQuestion">
                                    <h2>Question & Answers</h2>
                                    <svg width="12" height="7" viewbox="0 0 12 7" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                                <div class="collapse show" id="collapseQuestion">
                                    <div class="card card-body">
                                        <div class="list-questions">
                                            @foreach ($activity->qna as $index => $item)
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
                <div class="col-lg-4">
                    <form id="bookingForm" action="{{ route('payments.store') }}" method="post" class="booking-form">
                        @csrf
                        <div class="head-booking-form">
                            <p class="text-xl-bold neutral-1000">Booking Form</p>
                        </div>

                        <div class="content-booking-form">
                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <div class="item-line-booking"> <strong class="text-md-bold neutral-1000">From:</strong>
                                <div class="input-calendar">
                                    <input class="form-control calendar-date" type="text" name="date_booking"
                                        value="25/07/2024" id="selected-date">
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


                            <div class="item-line-booking name-field"> <strong class="text-md-bold neutral-1000">Name<span
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

                            <div class="item-line-booking">
                                <div class="box-tickets"><strong class="text-md-bold neutral-1000">Tickets:</strong>
                                    <div class="line-booking-tickets"
                                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                        <div class="item-ticket">
                                            <p class="text-md-medium neutral-500"
                                                style="margin-right: 10px; white-space: nowrap;">Adult (18+ years)</p>
                                            <p class="text-md-medium neutral-500" style=" white-space: nowrap;"
                                                id="adult-price" data-price="{{ $activity->adult_price }}">
                                                {{ $activity->adult_price }} {{ session('currency', 'AED') }}
                                            </p>
                                        </div>
                                        <div class="tickets-section" style="text-align: right;">
                                            <input type="number" name="adult_tickets" class="w-75" id="adult_tickets"
                                                value="1" min="1" placeholder="1" />
                                        </div>
                                    </div>


                                    <div class="line-booking-tickets"
                                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                        <div class="item-ticket">
                                            <p class="text-md-medium neutral-500"
                                                style="margin-right: 10px; white-space: nowrap;">Child (< 6 years)</p>
                                                    <p class="text-md-medium neutral-500" style="white-space: nowrap;"
                                                        id="child-price" data-price="{{ $activity->child_price }}">
                                                        {{ $activity->child_price }} {{ session('currency', 'AED') }}
                                                    </p>
                                        </div>

                                        <div class="tickets-section" style="text-align: right;">
                                            <input type="number" name="child_tickets" class="w-75" id="child_tickets"
                                                min="0" value="0" placeholder="1" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="item-line-booking">
                                <div class="box-tickets"><strong class="text-md-bold neutral-1000">Add Extra:</strong>
                                    <div class="line-booking-tickets">
                                        <div class="item-ticket">
                                            <ul class="list-filter-checkbox">
                                                <li>
                                                    <label class="cb-container">
                                                        <input type="checkbox" name="private_transport" value="1"
                                                            id="check-private-transport">
                                                        <span class="text-sm-medium">Add private transport for
                                                        </span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="include-price">
                                            <p class="text-md-bold neutral-1000">
                                                {{ $activity->private_transport_extra_cost }}
                                                {{ session('currency', 'AED') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-line-booking last-item"> <strong
                                    class="text-md-bold neutral-1000">Total:</strong>
                                <div class="line-booking-right">
                                    <p class="text-xl-bold neutral-1000" id="totalAmount">
                                    </p>&nbsp;
                                    <input type="hidden" name="currency" value="{{ session('currency', 'AED') }}">
                                    <input type="hidden" name="amount" id="total-cost">
                                    <input type="hidden" name="url" value="{{ url()->full() }}">
                                    <p class="text-xl-mediem neutral-1000"> {{ session('currency', 'AED') }}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between" style="gap:3px;">
                                <a href="https://wa.me/0123456789?text={{ url()->full() }}" class="btn btn-light p-1"
                                    target="_blank">
                                    <svg fill="#075E54" height="35px" width="50px" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        viewBox="0 0 308 308" xml:space="preserve">
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
                                src="{{ asset('assets/imgs/page/tour-detail/banner-ads.png') }}" alt="Travila"></a>
                    </div>
                    <div class="sidebar-banner"> <a href="#"><img
                                src="{{ asset('assets/imgs/page/tour-detail/banner-ads2.png') }}" alt="Travila"></a>
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
                            <p class="text-xl-medium neutral-500">Favorite destinations based on customer reviews</p>
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
                                                    <img src="{{ asset($post->images->first()->path . $post->images->first()->file) }}"
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
            var adultTickets = $('#adult_tickets').val();
            var childTickets = $('#child_tickets').val();
            var valuePrivateTransport = $('#add-private-transport').val();
            var privateTransport = $('input[name="private_transport"]').is(':checked') ? 1 : 0;

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
                adult_tickets: adultTickets,
                child_tickets: childTickets,
                private_transport: privateTransport,
            };

            $.ajax({
                url: '{{ route('send.inquiry') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function(response) {
                    console.log('submited');
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

        /* Papulating time slots on calender for tour avaiablity */
        $(document).ready(function() {
            const timeSlotsArray = @json(json_decode($activity->public_activity_timings));
            const $dateInput = $('#selected-date');
            const $timeSlotsDropdown = $('#time-slots');

            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            $dateInput.attr('min', today);

            function populateTimeSlots() {
                $timeSlotsDropdown.empty(); // Clear existing options
                const dateValue = $dateInput.val() || today; // Use today's date if input is empty
                console.log('Selected date:', dateValue);

                if (dateValue) {
                    timeSlotsArray.forEach(time => {
                        $timeSlotsDropdown.append(new Option(time, time));
                    });
                }
            }

            $dateInput.on('change', populateTimeSlots);
            populateTimeSlots(); // Initial population on page load

            /* Tour avaiablity time slots cod end*/


        });

        $(document).ready(function() {
            function calculateTotal() {
                var adultPrice = parseFloat("{{ $activity->adult_price }}");
                var childPrice = parseFloat("{{ $activity->child_price }}");
                var privateTransportCost = parseFloat("{{ $activity->private_transport_extra_cost }}");

                function updateTotalCost() {
                    var adultTickets = parseInt($('#adult_tickets').val()) || 0;
                    var childTickets = parseInt($('#child_tickets').val()) || 0;
                    var checkbox = document.getElementById('check-private-transport');

                    var totalCost = (adultTickets * adultPrice) + (childTickets * childPrice);

                    if (checkbox.checked) {
                        totalCost += privateTransportCost;
                    }

                    $('#totalAmount').text(totalCost.toFixed(2));
                    document.getElementById('total-cost').value = totalCost.toFixed(2);

                }

                // Initial calculation
                updateTotalCost();

                // Add event listeners
                $('#adult_tickets, #child_tickets').on('input', updateTotalCost);
                $('#check-private-transport').on('change', updateTotalCost);
            }

            // Call calculateTotal function on page load or whenever necessary
            $(document).ready(function() {
                calculateTotal();
            });
        });
    </script>
@endsection
