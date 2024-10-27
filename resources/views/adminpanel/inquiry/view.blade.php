@extends('layouts.adminpanel.app')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">Inquiry</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class="icon-home" href="{{route('admin.index')}}">Dashboard</a></li>
                        <li><a class="icon-home" href="{{route('inquiry.index')}}">Inquiries</a></li>
                        <li><span>Inquiry Details</span></li>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-form-add card p-4">
                        <h5 class="neutral-1000 mb-12">Inquiry Detail Form</h5>
                        <div class="box-border-bottom">
                            <div class="row">
                                <!-- Title Field -->
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <p class="form-control-plaintext">{{ $inquiry->name ?? 'N/A' }}</p>
                                    </div>
                                </div>
    
                                <!-- Tags Field -->
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">status</label>
                                        <p class="form-control-plaintext">{{ $inquiry->paid == 1 ? 'Paid' : 'Unpaid' }}</p>

                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <p class="form-control-plaintext">{{ $inquiry->email ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <p class="form-control-plaintext">{{ $inquiry->phone ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Packge Url</label>
                                        <a href="{{ $inquiry->url ?? '#' }}" class="form-control-plaintext">{{ $inquiry->url ?? 'N/A' }}</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Created</label>
                                        <p class="form-control-plaintext">{{ $inquiry->created_at ?? 'N/A' }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop
