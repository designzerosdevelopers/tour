@extends('layouts.frontend.app')
@section('content')
    <main class="main">
        <section class="box-section box-breadcrumb background-100">
            <div class="container">
                <ul class="breadcrumbs">
                    <li> <a href="{{ route('home') }}">Home</a><span class="arrow-right">
                            <svg width="7" height="12" viewbox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg></span></li>
                    <li> <span class="text-breadcrumb">Terms Of Service</span></li>
                </ul>
            </div>
        </section>
        <section class="section-box box-become-video background-body">
            <div class="container">
                <div class="box-mw-824">
                    <div class="text-center">
                        <div class="d-flex justify-content-center"><span class="btn btn-brand-secondary wow fadeInUp"> <img
                                    class="mr-10" src="assets/imgs/page/homepage4/earth.svg"
                                    alt="Travile">AGREEMENT</span></div>
                        <h2 class="mt-15 mb-15 neutral-1000 wow fadeInUp">{{$pagedata->title}}</h2>
                        <p class="text-xl-medium neutral-1000 mb-55 wow fadeInUp">Last update: {{ optional($pagedata->updated_at)->format('M d, Y') ?? 'N/A' }}

                        </p>
                    </div>
                </div>
                <div class="box-mw-824">
                    <div class="box-detail-info">
                        {!! $pagedata->description !!}
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
                    src="assets/imgs/page/homepage5/media7.png" alt="Travila">
                </div>
        </section>
    </main>
@endsection
