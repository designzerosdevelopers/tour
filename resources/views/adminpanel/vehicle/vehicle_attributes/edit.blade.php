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
                        <li><a class="icon-home" href="{{ route('vehicle-attribute.index') }}">Vehicle List</a></li>
                        <li><span>Edit vehicle</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="section-box">
        <div class="">
            <div class="row">
                <form method="post" action="{{ route('vehicle-attribute.update', $vehicle->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="box-form-add">
                                    <h5 class="neutral-1000 mb-12">Edit Vehicle</h5>
                                    <div class="box-border-bottom">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="make"
                                                        value="{{ $vehicle->make }}" name="make" placeholder="Make">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="model"
                                                        value="{{ $vehicle->model }}" name="model" placeholder="Model">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="number" id="year"
                                                        value="{{ $vehicle->year }}" name="year" placeholder="Year">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="color" name="color"
                                                        placeholder="Color" value="{{ $vehicle->color }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="number" id="seats" name="seats"
                                                        placeholder="Seats" value="{{ $vehicle->seats }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="number" id="mileage" name="mileage"
                                                        placeholder="Mileage" value="{{ $vehicle->mileage }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="fuel_type"
                                                        name="fuel_type" placeholder="Fuel Type"
                                                        value="{{ $vehicle->fuel_type }}">
                                                </div>
                                            </div>

                                            <!-- type ID Field -->
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <select class="form-control" name="vehicle_type" id="type_id">
                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id }}"
                                                                @if ($vehicle->vehicle_type == $type->id) selected @endif>
                                                                {{ $type->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="box-button-save">
                                        <button type="submit" class="btn btn-black">Save</button>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="box-form-add">
                                    <h5 class="neutral-1000 mb-12">Custom Fields</h5>
                                    <div class="row">

                                    </div>
                                    <p class="text-md-bold neutral-1000 mb-12">Edit Fields</p>
                                    <div class="box-extra-services">

                                        @if ($vehicle->dynamic_fields && is_array(json_decode($vehicle->dynamic_fields, true)))
                                            @foreach (json_decode($vehicle->dynamic_fields, true) as $key => $value)
                                                <div class="item-extra-service">
                                                    <div class="item-extra-1">
                                                        <input class="form-control" name="key[]"
                                                            value="{{ $key }}" type="text" placeholder="Key">
                                                    </div>
                                                    <div class="item-extra-2">
                                                        <input class="form-control" name="value[]"
                                                            value="{{ $value }}" type="text"
                                                            placeholder="Value">
                                                    </div>
                                                    <div class="item-extra-3"><a class="btn-remove" href="#">
                                                            <svg width="22" height="22" viewbox="0 0 22 22"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.7778 10.1111V15.4444" stroke=""
                                                                    stroke-width="1.33333" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path d="M9.22217 10.1111V15.4444" stroke=""
                                                                    stroke-width="1.33333" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path
                                                                    d="M5.66699 6.55556V17.2222C5.66699 18.2041 6.46293 19 7.44477 19H14.5559C15.5377 19 16.3337 18.2041 16.3337 17.2222V6.55556"
                                                                    stroke="" stroke-width="1.33333"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M3.88916 6.55556H18.1114" stroke=""
                                                                    stroke-width="1.33333" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                                <path d="M6.55566 6.55556L8.33344 3H13.6668L15.4446 6.55556"
                                                                    stroke="" stroke-width="1.33333"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg></a></div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="item-extra-service">
                                                <div class="item-extra-1">
                                                    <input class="form-control" name="key[]" value=""
                                                        type="text" placeholder="Key">
                                                </div>
                                                <div class="item-extra-2">
                                                    <input class="form-control" name="value[]" value=""
                                                        type="text" placeholder="Value">
                                                </div>
                                                <div class="item-extra-3"><a class="btn-remove" href="#">
                                                        <svg width="22" height="22" viewbox="0 0 22 22"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.7778 10.1111V15.4444" stroke=""
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path d="M9.22217 10.1111V15.4444" stroke=""
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M5.66699 6.55556V17.2222C5.66699 18.2041 6.46293 19 7.44477 19H14.5559C15.5377 19 16.3337 18.2041 16.3337 17.2222V6.55556"
                                                                stroke="" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M3.88916 6.55556H18.1114" stroke=""
                                                                stroke-width="1.33333" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path d="M6.55566 6.55556L8.33344 3H13.6668L15.4446 6.55556"
                                                                stroke="" stroke-width="1.33333"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg></a></div>
                                            </div>
                                        @endif
                                    </div><a class="btn btn-addmore" href="#">Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
