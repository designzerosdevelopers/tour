@extends('layouts.adminpanel.app')
@section('title', '404')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">Admin</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li> <a class="icon-home" href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li><span></span>Index</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-heading-right"> <a class="btn btn-brand-secondary" href="#">
                <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 0C8.82441 0 6.69767 0.645139 4.88873 1.85383C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048C0.00476617 8.80047 -0.213071 11.0122 0.211367 13.146C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782C4.76021 20.3166 6.72022 21.3642 8.85401 21.7886C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113C21.3549 15.3023 22 13.1756 22 11C21.9966 8.08367 20.8365 5.28778 18.7744 3.22563C16.7122 1.16347 13.9163 0.00344047 11 0ZM16 12H12V16C12 16.2652 11.8946 16.5196 11.7071 16.7071C11.5196 16.8946 11.2652 17 11 17C10.7348 17 10.4804 16.8946 10.2929 16.7071C10.1054 16.5196 10 16.2652 10 16V12H6C5.73479 12 5.48043 11.8946 5.2929 11.7071C5.10536 11.5196 5 11.2652 5 11C5 10.7348 5.10536 10.4804 5.2929 10.2929C5.48043 10.1054 5.73479 10 6 10H10V6C10 5.73478 10.1054 5.48043 10.2929 5.29289C10.4804 5.10536 10.7348 5 11 5C11.2652 5 11.5196 5.10536 11.7071 5.29289C11.8946 5.48043 12 5.73478 12 6V10H16C16.2652 10 16.5196 10.1054 16.7071 10.2929C16.8946 10.4804 17 10.7348 17 11C17 11.2652 16.8946 11.5196 16.7071 11.7071C16.5196 11.8946 16.2652 12 16 12Z"
                        fill=""></path>
                </svg>Add new tour</a></div>
    </div>
    <div class="section-box box-statistical">
        <div class="row">
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img
                                src="{{ asset('assets/admin/assets/imgs/template/icons/book.svg') }}" alt="Travilla"></span>
                    </div>
                    <div class="card-info">
                        <div class="card-title">
                            <h3 class="text-xl-bold neutral-1000"><span class="count">{{ $booking['paid'] }}</span><span
                                    class="text-sm-medium neutral-500 status up">25%</span>
                            </h3>
                        </div>
                        <p class="text-sm-medium neutral-500">30 Days Bookings</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img
                                src="{{ asset('assets/admin/assets/imgs/template/icons/earn.svg') }}" alt="Travilla"></span>
                    </div>
                    <div class="card-info">
                        <div class="card-title">
                            <h3 class="text-xl-bold neutral-1000"><span class="count">{{ $booking['totalAmount'] }} </span>
                                AED<span class="text-sm-medium neutral-500 status up">5%</span>
                            </h3>
                        </div>
                        <p class="text-sm-medium neutral-500">30 Days Amount</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img
                                src="{{ asset('assets/admin/assets/imgs/template/icons/user.svg') }}" alt="Travilla"></span>
                    </div>
                    <div class="card-info">
                        <div class="card-title">
                            <h3 class="text-xl-bold neutral-1000"><span class="count">{{ $booking['unpaid'] }}</span><span
                                    class="text-sm-medium neutral-500 status up">12%</span>
                            </h3>
                        </div>
                        <p class="text-sm-medium neutral-500">30 Days Inquiries</p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img
                                src="{{ asset('assets/admin/assets/imgs/template/icons/tour2.svg') }}"
                                alt="Travilla"></span></div>
                    <div class="card-info">
                        <div class="card-title">
                            <h3 class="text-xl-bold neutral-1000"><span class="count">285</span><span
                                    class="text-sm-medium neutral-500 status up">5%</span>
                            </h3>
                        </div>
                        <p class="text-sm-medium neutral-500">Application Sent</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img
                                src="{{ asset('assets/admin/assets/imgs/template/icons/hotel2.svg') }}"
                                alt="Travilla"></span></div>
                    <div class="card-info">
                        <div class="card-title">
                            <h3 class="text-xl-bold neutral-1000"><span class="count">165</span><span
                                    class="text-sm-medium neutral-500 status up">15%</span>
                            </h3>
                        </div>
                        <p class="text-sm-medium neutral-500">Profile Viewed</p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img
                                src="{{ asset('assets/admin/assets/imgs/template/icons/property2.svg') }}"
                                alt="Travilla"></span></div>
                    <div class="card-info">
                        <div class="card-title">
                            <h3 class="text-xl-bold neutral-1000"><span class="count">156</span><span
                                    class="font-sm status down">- 2%</span>
                            </h3>
                        </div>
                        <p class="text-sm-medium neutral-500">New Messages</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-xxxl-8 col-xxl-7 col-xl-12">
            <div class="section-box">
                <div class="container">
                    <div class="">
                        <div class="">
                            <div class="table-responsive">
                                <table class="table table-stripped table-mybooking table-responsive rounded">
                                    <thead>
                                        <tr>
                                            {{-- <th class="mw-76"></th> --}}
                                            <th class="mw-145"><span class="sort">User name</span></th>
                                            <th class="mw-145"><span class="sort">status</span></th>
                                            <th class="mw-145"><span class="sort">phone</span></th>
                                            <th class="mw-145"><span class="sort">Create Date</span></th>
                                            <th class="mw-76"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($inquiries->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center">No inquiries available.</td>
                                            </tr>
                                        @else
                                            @foreach ($inquiries as $inquiry)
                                                <tr>
                                                    {{-- <td class="text-center">
                                    <input class="cb-select" type="checkbox">
                                </td> --}}
                                                    <td>
                                                        <div class="card-tour">
                                                            {{-- <a href="#"><img src="{{ asset($post->vehicle_images) }}" alt="Travilla"></a> --}}
                                                            <a class="{{ $inquiry->checked === 0 ? 'text-md-bold neutral-1000' : 'text-md-medium neutral-500' }}"
                                                                href="{{ route('inquiry.show', $inquiry->id) }}">{{ $inquiry->name }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="card-tour">
                                                            <div class="text-md-bold neutral-1000">
                                                                @if ($inquiry->paid)
                                                                    <span class="btn btn-status">Paid</span>
                                                                @else
                                                                    <span class="btn btn-status pending">Unpaid</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="card-tour">
                                                            <a class="text-md-bold neutral-500"
                                                                href="#">{{ $inquiry->phone }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="text-md-medium neutral-500">{{ $inquiry->created_at }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="{{ route('inquiry.destroy', $inquiry->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                style="padding: 2px 5px; font-size: 12px;"
                                                                onclick="return confirm('Are you sure you want to delete this inquiry?');">
                                                                Delete
                                                            </button>
                                                        </form>

                                                        <a class="btn btn-secondary"
                                                            href="{{ route('inquiry.show', $inquiry->id) }} "
                                                            style="padding: 2px 5px; font-size: 12px;">View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @if ($inquiries->hasPages())
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($inquiries->onFirstPage())
                                            <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                                <span class="page-link" aria-hidden="true">
                                                    <svg width="12" height="12" viewbox="0 0 12 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668"
                                                            stroke="" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $inquiries->previousPageUrl() }}"
                                                    aria-label="@lang('pagination.previous')">
                                                    <span aria-hidden="true">
                                                        <svg width="12" height="12" viewbox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668"
                                                                stroke="" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($inquiries->links()->elements as $element)
                                            @if (is_string($element))
                                                <li class="page-item disabled" aria-disabled="true"><span
                                                        class="page-link">{{ $element }}</span></li>
                                            @endif

                                            {{-- Array Of Links --}}
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    @if ($page == $inquiries->currentPage())
                                                        <li class="page-item active" aria-current="page"><span
                                                                class="page-link">{{ $page }}</span></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link"
                                                                href="{{ $url }}">{{ $page }}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($inquiries->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $inquiries->nextPageUrl() }}"
                                                    aria-label="@lang('pagination.next')">
                                                    <span aria-hidden="true">
                                                        <svg width="12" height="12" viewbox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                                                stroke="" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                                                <span class="page-link" aria-hidden="true">
                                                    <svg width="12" height="12" viewbox="0 0 12 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                                            stroke="" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="section-box">
                <div class="container">
                    <div class="panel-white">
                        <div class="panel-head">
                            <h6 class="text-xl-bold neutral-1000">Earning Statistics</h6><a class="menudrop"
                                id="dropdownMenu2" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-display="static"></a>
                            <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                aria-labelledby="dropdownMenu2">
                                <li><a class="dropdown-item active" href="#">Add new</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Actions</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="col-xxxl-4 col-xxl-5 col-xl-12">
            <div class="section-box">
                <div class="container">
                    <div class="panel-white">
                        <div class="panel-head">
                            <h6 class="text-xl-bold neutral-1000">Latest Tour Booking</h6><a class="menudrop"
                                id="dropdownMenu3" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-display="static"></a>
                            <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                aria-labelledby="dropdownMenu3">
                                <li><a class="dropdown-item active" href="#">Add new</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Actions</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="box-list-tours list-tours wow fadeIn">
                                <div class="card-journey-small background-card">
                                    <div class="card-image"> <a class="wish" href="#">
                                            <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                                    stroke="" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg></a><img
                                            src="{{ asset('assets/admin/assets/imgs/page/tours/tour1.png') }}"
                                            alt="Travila"></div>
                                    <div class="card-info background-card">
                                        <div class="card-rating">
                                            <div class="card-left"> </div>
                                            <div class="card-right"> <span class="rating">4.96 <span
                                                        class="text-sm-medium neutral-500">(672 reviews)</span></span>
                                            </div>
                                        </div>
                                        <div class="card-title"> <a class="text-lg-bold neutral-1000" href="#">From
                                                Paris: Day Trip to Champagne with 8 Tastings &amp; Lunch</a></div>
                                        <div class="card-program">
                                            <div class="card-duration-tour">
                                                <p class="icon-duration text-sm-medium neutral-500">2 days, 3 nights</p>
                                                <p class="icon-guest text-sm-medium neutral-500">6-8 guest</p>
                                            </div>
                                            <div class="endtime">
                                                <div class="card-price">
                                                    <h6 class="heading-6 neutral-1000">$48.25</h6>
                                                </div>
                                                <div class="card-button"> <a class="btn btn-gray" href="#">Book
                                                        Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-journey-small background-card">
                                    <div class="card-image"> <a class="wish" href="#">
                                            <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                                    stroke="" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg></a><img
                                            src="{{ asset('assets/admin/assets/imgs/page/tours/tour2.png') }}"
                                            alt="Travila"></div>
                                    <div class="card-info background-card">
                                        <div class="card-rating">
                                            <div class="card-left"> </div>
                                            <div class="card-right"> <span class="rating">4.96 <span
                                                        class="text-sm-medium neutral-500">(672 reviews)</span></span>
                                            </div>
                                        </div>
                                        <div class="card-title"> <a class="text-lg-bold neutral-1000" href="#">From
                                                Paris: Day Trip to Champagne with 8 Tastings &amp; Lunch</a></div>
                                        <div class="card-program">
                                            <div class="card-duration-tour">
                                                <p class="icon-duration text-sm-medium neutral-500">2 days, 3 nights</p>
                                                <p class="icon-guest text-sm-medium neutral-500">6-8 guest</p>
                                            </div>
                                            <div class="endtime">
                                                <div class="card-price">
                                                    <h6 class="heading-6 neutral-1000">$48.25</h6>
                                                </div>
                                                <div class="card-button"> <a class="btn btn-gray" href="#">Book
                                                        Now</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"
                                            aria-label="Previous"><span aria-hidden="true">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link active" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                aria-hidden="true">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-box">
                <div class="container">
                    <div class="panel-white">
                        <div class="panel-head">
                            <h6 class="text-xl-bold neutral-1000"> Queries by search</h6><a class="menudrop"
                                id="dropdownMenu6" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-display="static"></a>
                            <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                aria-labelledby="dropdownMenu6">
                                <li><a class="dropdown-item active" href="#">Add new</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Actions</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="card-style-5">
                                <div class="card-title">
                                    <h6 class="text-md-medium neutral-1000">Tourism</h6>
                                </div>
                                <div class="card-progress">
                                    <div class="number text-md-medium neutral-1000">2635</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-style-5">
                                <div class="card-title">
                                    <h6 class="text-md-medium neutral-1000">Destination</h6>
                                </div>
                                <div class="card-progress">
                                    <div class="number text-md-medium neutral-1000">1658</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-style-5">
                                <div class="card-title">
                                    <h6 class="text-md-medium neutral-1000">Vacation</h6>
                                </div>
                                <div class="card-progress">
                                    <div class="number text-md-medium neutral-1000">1452</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-style-5">
                                <div class="card-title">
                                    <h6 class="text-md-medium neutral-1000">Journey</h6>
                                </div>
                                <div class="card-progress">
                                    <div class="number text-md-medium neutral-1000">1325</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-style-5">
                                <div class="card-title">
                                    <h6 class="text-md-medium neutral-1000">Adventure</h6>
                                </div>
                                <div class="card-progress">
                                    <div class="number text-md-medium neutral-1000">985</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-style-5">
                                <div class="card-title">
                                    <h6 class="text-md-medium neutral-1000">Sightseeing</h6>
                                </div>
                                <div class="card-progress">
                                    <div class="number text-md-medium neutral-1000">920</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-style-5">
                                <div class="card-title">
                                    <h6 class="text-md-medium neutral-1000">Accommodation</h6>
                                </div>
                                <div class="card-progress">
                                    <div class="number text-md-medium neutral-1000">853</div>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-box">
                <div class="container">
                    <div class="panel-white">
                        <div class="panel-head">
                            <h6 class="text-xl-bold neutral-1000">March 2024</h6><a class="menudrop" id="dropdownMenu5"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-display="static"></a>
                            <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end"
                                aria-labelledby="dropdownMenu5">
                                <li><a class="dropdown-item active" href="#">Add new</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Actions</a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="box-calendar-events">
                                <div id="calendar-events" data-provide="datepicker-inline"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
