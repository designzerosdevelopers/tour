@extends('layouts.adminpanel.app')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">Vehicle</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class="icon-home" href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li><span>Vehicle list</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-heading-right"> <a class="btn btn-brand-secondary" href="{{ route('vehicle-attribute.create') }}">
                <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11 0C8.82441 0 6.69767 0.645139 4.88873 1.85383C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048C0.00476617 8.80047 -0.213071 11.0122 0.211367 13.146C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782C4.76021 20.3166 6.72022 21.3642 8.85401 21.7886C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113C21.3549 15.3023 22 13.1756 22 11C21.9966 8.08367 20.8365 5.28778 18.7744 3.22563C16.7122 1.16347 13.9163 0.00344047 11 0ZM16 12H12V16C12 16.2652 11.8946 16.5196 11.7071 16.7071C11.5196 16.8946 11.2652 17 11 17C10.7348 17 10.4804 16.8946 10.2929 16.7071C10.1054 16.5196 10 16.2652 10 16V12H6C5.73479 12 5.48043 11.8946 5.2929 11.7071C5.10536 11.5196 5 11.2652 5 11C5 10.7348 5.10536 10.4804 5.2929 10.2929C5.48043 10.1054 5.73479 10 6 10H10V6C10 5.73478 10.1054 5.48043 10.2929 5.29289C10.4804 5.10536 10.7348 5 11 5C11.2652 5 11.5196 5.10536 11.7071 5.29289C11.8946 5.48043 12 5.73478 12 6V10H16C16.2652 10 16.5196 10.1054 16.7071 10.2929C16.8946 10.4804 17 10.7348 17 11C17 11.2652 16.8946 11.5196 16.7071 11.7071C16.5196 11.8946 16.2652 12 16 12Z"
                        fill="black"></path>
                </svg>Add new vehicle</a></div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="section-box">
        <div class="">
            <div class="table-responsive">
                <table class="table table-stripped table-mybooking table-responsive">
                    <thead>
                        <tr>
                            {{-- <th class="mw-76"></th> --}}
                            <th class="mw-145"><span class="sort">Model</span></th>
                            <th class="mw-145"><span class="sort">Make</span></th>
                            <th class="mw-145"><span class="sort">Year</span></th>
                            {{-- <th class="mw-145"><span class="sort">Status</span></th> --}}
                            <th class="mw-76"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                {{-- <td class="text-center">
                                    <input class="cb-select" type="checkbox">
                                </td> --}}
                                <td>
                                    <div class="card-tour">
                                        {{-- <a href="#"><img src="{{ asset($vehicle->image) }}" alt="Travilla"></a> --}}
                                        <a class="text-md-bold neutral-1000" href="#">{{ $vehicle->model }}</a>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-md-medium neutral-500">{{ $vehicle->make }}</span>
                                </td>
                                <td>
                                    <span class="text-md-medium neutral-500">{{ $vehicle->year }}</span>
                                </td>

                                <td class="text-center">
                                    {{-- <a class="btn btn-primary" href="{{ route('vehicle-attribute.show', $vehicle->id) }}"
                                        style="padding: 2px 5px; font-size: 12px;">View</a> --}}
                                    <a class="btn btn-secondary" href="{{ route('vehicle-attribute.edit', $vehicle->id) }} "
                                        style="padding: 2px 5px; font-size: 12px;">Edit</a>
                                    <form action="{{ route('vehicle-attribute.destroy', $vehicle->id) }}" method="post"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            style="padding: 2px 5px; font-size: 12px;"
                                            onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @if ($vehicles->hasPages())
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($vehicles->onFirstPage())
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
                        <a class="page-link" href="{{ $vehicles->previousPageUrl() }}" aria-label="@lang('pagination.previous')">
                            <span aria-hidden="true">
                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668"
                                        stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($vehicles->links()->elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $vehicles->currentPage())
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
                @if ($vehicles->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $vehicles->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true">
                                <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                        stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </li>
                @else
                    <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">
                            <svg width="12" height="12" viewbox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992"
                                    stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
@stop
