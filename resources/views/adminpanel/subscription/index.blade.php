@extends('layouts.adminpanel.app')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">Subscription</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class="icon-home" href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li><span>Subscriptions list</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="section-box">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-stripped table-mybooking table-responsive">
                    <thead>
                        <tr>

                            <th class="mw-450"><span class="sort">Email</span></th>
                            <th class="mw-145"><span class="sort">Create Date</span></th>
                            <th class="mw-76"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                {{-- <td class="text-center">
                                    <input class="cb-select" type="checkbox">
                                </td> --}}
                                <td>
                                    <div class="card-tour">
                                        {{-- <a href="#"><img src="{{ asset($subscription->image) }}" alt="Travilla"></a> --}}
                                        <a class="text-md-bold neutral-1000" href="#">{{ $subscription->email }}</a>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-md-medium neutral-500">{{ $subscription->created_at }}</span>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('subscription.destroy', $subscription->id) }}"
                                        method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            style="padding: 2px 5px; font-size: 12px;"
                                            onclick="return confirm('Are you sure you want to delete this subscription?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($subscriptions->hasPages())
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($subscriptions->onFirstPage())
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
                        <a class="page-link" href="{{ $subscriptions->previousPageUrl() }}" aria-label="@lang('pagination.previous')">
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
                @foreach ($subscriptions->links()->elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span
                                class="page-link">{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $subscriptions->currentPage())
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
                @if ($subscriptions->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $subscriptions->nextPageUrl() }}" aria-label="@lang('pagination.next')">
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
