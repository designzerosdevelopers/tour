@extends('layouts.adminpanel.app')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">SEO & SETTINGS</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class="icon-home" href="{{route('admin.index')}}">Dashboard</a></li>
                        <li><span>Settings</span></li>
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
        <div class="">
            <div class="table-responsive">
                <table class="table table-stripped table-mybooking table-responsive">
                    <thead>
                        <tr>
                            {{-- <th class="mw-76"></th> --}}
                            <th class="mw-145"><span class="sort">Page</span></th>
                            <th class="mw-145"><span class="sort">Create Date</span></th>
                            <th class="mw-76"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pageseo as $page)
                            <tr>
                                {{-- <td class="text-center">
                                    <input class="cb-select" type="checkbox">
                                </td> --}}
                                <td>
                                    <div class="card-tour">
                                        {{-- <a href="#"><img src="{{ asset($post->vehicle_images) }}" alt="Travilla"></a> --}}
                                        <a class="text-md-bold neutral-1000"
                                            href="#">{{ $page->title }}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-md-medium neutral-500">{{ $page->updated_at }}</span>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-secondary" href="{{ route('setting.edit', $page->id) }} "
                                        style="padding: 2px 5px; font-size: 12px;">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <form method="post" action="{{ route('setting.store') }}">
                    @csrf
                    <div class="box-form-add">
                        <h5 class="neutral-1000 mb-12">Head Elements</h5>
                        <div class="box-border-bottom">
                            <div class="">
                                <div class="form-group">
                                    <textarea class="form-control" name="HeadElement" rows="6">{{ settings('HeadElement') }}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-dark">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-12">
                <form method="post" action="{{ route('setting.store') }}">
                    @csrf
                    <div class="box-form-add">
                        <h5 class="neutral-1000 mb-12">News</h5>
                        <div class="box-border-bottom">
                            <div class="">
                                <div class="form-group">
                                    <textarea class="form-control" name="NEWS" rows="3">{{ settings('NEWS') }}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-dark">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
