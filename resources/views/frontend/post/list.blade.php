@extends('layouts.frontend.app')
@section('content')
    <main class="main">
        <section class="box-section box-breadcrumb background-body">
            <div class="container">
                <ul class="breadcrumbs">
                    <li> <a href="{{route('home')}}">Home</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <a href="{{route('posts.index')}}">Blog</a></li>
                </ul>
            </div>
        </section>
        <section class="section-box box-news box-news-blog-2 background-9">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-6 mb-30 wow fadeInLeft">
                        <h1 class="neutral-1000">Recent Posts</h1>
                        <p class="text-lg-medium neutral-500">Favorite destinations based on customer reviews</p>
                    </div>
                </div>
                <div class="box-list-news wow fadeInUp">
                    <div class="row">

                        @foreach ($posts as $post)
                            <div class="col-lg-4 col-md-6 mb-30">
                                <div class="card-news background-card hover-up">
                                    <div class="card-image">
                                        <label class="label">
                                            {{ $post->category->title ?? 'Uncategorised' }}
                                        </label>
                                        
                                        {{-- <a class="wish" href="#">
                                        <svg width="20" height="18" viewbox="0 0 20 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                        d="M17.071 10.1422L11.4141 15.7991C10.6331 16.5801 9.36672 16.5801 8.58568 15.7991L2.92882 10.1422C0.9762 8.1896 0.9762 5.02378 2.92882 3.07116C4.88144 1.11853 8.04727 1.11853 9.99989 3.07116C11.9525 1.11853 15.1183 1.11853 17.071 3.07116C19.0236 5.02378 19.0236 8.1896 17.071 10.1422Z"
                                        stroke="" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                        </svg>
                                            </a> --}}
                                        @foreach ($post->images as $image)
                                            <img src="{{ asset($image->path . $image->file) }}" {{ $image->alt }}
                                                style="height: 300px; object-fit: cover;">
                                        @endforeach
                                    </div>
                                    <div class="card-info">
                                        <div class="card-meta"> <span
                                                class="post-date neutral-1000">{{ $post->created_at ? $post->created_at->format('d M Y') : 'N/A' }}

                                            </span>
                                            {{-- <span class="post-time neutral-1000">6 mins</span>
                                        <span class="post-comment neutral-1000">38 comments</span> --}}
                                        </div>
                                        <div class="card-title"> <a class="text-xl-bold neutral-1000"
                                                href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></div>
                                        <div class="card-program">
                                            <div class="endtime">
                                                <div class="card-author">
                                                    {{-- <img src="assets/imgs/page/homepage1/avatar.png"alt="Travila"> --}}
                                                    {{-- <p class="text-sm-bold neutral-1000">Jimmy Dave</p> --}}
                                                </div>
                                                <div class="card-button"> <a class="btn btn-gray"
                                                        href="{{ route('posts.show', $post->slug) }}">Keep Reading</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if ($posts->hasPages())
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{-- Previous Page Link --}}
                                @if ($posts->onFirstPage())
                                    <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                        <span class="page-link" aria-hidden="true">
                                            <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668"
                                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $posts->previousPageUrl() }}"
                                            aria-label="@lang('pagination.previous')">
                                            <span aria-hidden="true">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($posts->links()->elements as $element)
                                    @if (is_string($element))
                                        <li class="page-item disabled" aria-disabled="true"><span
                                                class="page-link">{{ $element }}</span></li>
                                    @endif

                                    {{-- Array Of Links --}}
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $posts->currentPage())
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
                                @if ($posts->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $posts->nextPageUrl() }}"
                                            aria-label="@lang('pagination.next')">
                                            <span aria-hidden="true">
                                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                                        stroke="" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                                        <span class="page-link" aria-hidden="true">
                                            <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </section>
        <div class="pb-90 background-card"></div>
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
