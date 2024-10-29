@extends('layouts.adminpanel.app')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">Activity</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li> <a class="icon-home" href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li><a class="icon-home" href="{{ route('activity.index') }}">Activity</a></li>
                        <li><span>Edit activity</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section-box">
        <form action="{{ route('activity.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="box-form-add">
                            <h5 class="neutral-1000 mb-12">Activity Form</h5>
                            <div class="box-border-bottom">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> Activity name
                                            </label>
                                            <input class="form-control" type="text" name="title"
                                                value="{{ old('title', $activity->title) }}" placeholder="activity Name">
                                            @if ($errors->has('title'))
                                                <div class="error">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class=" text-md-medium neutral-500"> Activity description
                                        </label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" rows="6" id="editor1">{{ old('description', $activity->description) }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> Duration
                                            </label>
                                            <input class="form-control" type="text" name="duration"
                                                value="{{ old('duration', $activity->duration) }}"
                                                placeholder="i.e 2-3 hours">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> No of People
                                            </label>
                                            <input class="form-control" type="text" name="no_of_people"
                                                value="{{ old('no_of_people', $activity->no_of_people) }}"
                                                placeholder="single or 1-4">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> activity Transport
                                            </label>
                                            <select name="activity_transport" class="form-control">
                                                <option value="shared">Shared</option>
                                                <option value="private">Private</option>
                                            </select>
                                            @if ($errors->has('activity_transport'))
                                                <div class="error">{{ $errors->first('activity_transport') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> Extra cost for Private Transport
                                            </label>
                                            <input class="form-control" type="number" name="private_transport_extra_cost"
                                                placeholder="Private/Shared">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> activity type
                                            </label>
                                            <select name="activity_type" class="form-control">
                                                <option value="Full Day" {{ old('activity_type', $activity->activity_type) === 'Full Day' ? 'selected' : '' }}>Full Day</option>
                                                <option value="Half Day" {{ old('activity_type', $activity->activity_type) === 'Half Day' ? 'selected' : '' }}>Half Day</option>
                                            </select>
                                            
                                            @if ($errors->has('activity_type'))
                                                <div class="error">{{ $errors->first('activity_type') }}</div>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> activity Price (Adult)
                                            </label>
                                            <input class="form-control" type="text" name="adult_price"
                                                value="{{ $activity->adult_price }}" placeholder="Price">
                                            @if ($errors->has('adult_price'))
                                                <div class="error">{{ $errors->first('adult_price') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> activity Price (Child)
                                            </label>
                                            <input class="form-control" type="text" name="child_price"
                                                value="{{ $activity->child_price }}" placeholder="Price">
                                            @if ($errors->has('child_price'))
                                                <div class="error">{{ $errors->first('child_price') }}</div>
                                            @endif
                                        </div>
                                    </div>




                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class=" text-md-medium neutral-500"> Location
                                            </label>
                                            <input class="form-control" type="text" name="location"
                                                value="{{ old('location', $activity->location) }}"
                                                placeholder="Union Dubai UAE">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <label class="text-md-medium neutral-500">Languages</label>
                                        <div class="row">
                                            @php
                                                $languages = json_decode($activity->languages, true) ?? [];
                                            @endphp
                                            <div class="col-lg-4">
                                                <label class="lbl-checkbox text-md-medium neutral-500">
                                                    <input type="checkbox" name="languages[]" value="English"
                                                        {{ in_array('English', $languages) ? 'checked' : '' }}>English
                                                </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="lbl-checkbox text-md-medium neutral-500">
                                                    <input type="checkbox" name="languages[]" value="Hindi"
                                                        {{ in_array('Hindi', $languages) ? 'checked' : '' }}>Hindi
                                                </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="lbl-checkbox text-md-medium neutral-500">
                                                    <input type="checkbox" name="languages[]" value="Chinese"
                                                        {{ in_array('Chinese', $languages) ? 'checked' : '' }}>Chinese
                                                </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="lbl-checkbox text-md-medium neutral-500">
                                                    <input type="checkbox" name="languages[]" value="Spanish"
                                                        {{ in_array('Spanish', $languages) ? 'checked' : '' }}>Spanish
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>


                                    {{-- 
                  <div class="col-lg-12">
                    <label class="text-md-medium neutral-500">Upload Images</label>
                    <div class="list-image-upload">
                        <div class="box-upload-image">
                            <div class="item-upload-image">
                                <input type="file" name="images[]" multiple id="file-input">
                                @if ($errors->has('images'))
                                    <span class="text-danger">{{ $errors->first('images') }}</span>
                                @endif
                                <div class="upload-info">
                                    <div class="icon-upload">
                                        <!-- SVG Icon -->
                                    </div>
                                    <div class="text-upload">
                                        <p class="text-sm-medium neutral-500">Upload Images</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="preview-images">
                            <div class="list-preview" id="preview-list">
                                @foreach ($activity->images as $image)
                                    <div class="image-preview">
                                        <div class="box-image-preview">
                                            <img src="{{ asset('assets/'. $image->image_path) }}" alt="Image Preview">
                                            <a class="btn-delete-image" href="#" data-index="{{ $loop->index }}">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.3335 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.6665 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4 4.66667V12.6667C4 13.403 4.59695 14 5.33333 14H10.6667C11.403 14 12 13.403 12 12.6667V4.66667M1.3335 4.66667H14.6668" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}


                                    @if (!empty($activity->qna) && count($activity->qna) > 0)
                                        <div class="col-lg-12 mb-3">
                                            <p class="text-md-bold neutral-1000 mb-12">Question & Answer</p>
                                            <div class="box-extra-services2" id="faq2">
                                                @foreach ($activity->qna as $qna)
                                                    <div class="item-extra-service2" id="faq">
                                                        <div class="item-extra-2">
                                                            <input class="form-control" name="question[]" type="text"
                                                                placeholder="Question" value="{{ $qna->question }}">
                                                        </div>
                                                        <div class="item-extra-2">
                                                            <input class="form-control" name="answer[]" type="text"
                                                                placeholder="Answer" value="{{ $qna->answer }}">
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
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                    <path d="M3.88916 6.55556H18.1114" stroke=""
                                                                        stroke-width="1.33333" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                    <path
                                                                        d="M6.55566 6.55556L8.33344 3H13.6668L15.4446 6.55556"
                                                                        stroke="" stroke-width="1.33333"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </svg></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div><a class="btn btn-dark btn-addquestion" href="#">Add More</a>
                                        </div>
                                    @else
                                        <div class="col-lg-12 mb-3">
                                            <p class="text-md-bold neutral-1000 mb-12">Question & Answer</p>
                                            <div class="box-extra-services2" id="faq2">
                                                <div class="item-extra-service2" id="faq">
                                                    <div class="item-extra-2">
                                                        <input class="form-control" name="question[]" type="text"
                                                            placeholder="Question">
                                                    </div>
                                                    <div class="item-extra-2">
                                                        <input class="form-control" name="answer[]" type="text"
                                                            placeholder="Answer">
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
                                                            </svg></a>
                                                    </div>
                                                </div>
                                            </div><a class="btn btn-dark btn-addquestion" href="#">Add More</a>
                                        </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="list-image-upload">
                                            <div class="box-upload-image">
                                                <div class="item-upload-image" style="cursor: pointer;">
                                                    <div class="upload-info">
                                                        <div class="icon-upload">
                                                            <svg width="22" height="23" viewBox="0 0 22 23"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8 10.25C6.48 10.25 5.25 9.02 5.25 7.5C5.25 5.98 6.48 4.75 8 4.75C9.52 4.75 10.75 5.98 10.75 7.5C10.75 9.02 9.52 10.25 8 10.25ZM8 6.25C7.31 6.25 6.75 6.81 6.75 7.5C6.75 8.19 7.31 8.75 8 8.75C8.69 8.75 9.25 8.19 9.25 7.5C9.25 6.81 8.69 6.25 8 6.25Z"
                                                                    fill=""></path>
                                                                <path
                                                                    d="M14 22.25H8C2.57 22.25 0.25 19.93 0.25 14.5V8.5C0.25 3.07 2.57 0.75 8 0.75H12C12.41 0.75 12.75 1.09 12.75 1.5C12.75 1.91 12.41 2.25 12 2.25H8C3.39 2.25 1.75 3.89 1.75 8.5V14.5C1.75 19.11 3.39 20.75 8 20.75H14C18.61 20.75 20.25 19.11 20.25 14.5V9.5C20.25 9.09 20.59 8.75 21 8.75C21.41 8.75 21.75 9.09 21.75 9.5V14.5C21.75 19.93 19.43 22.25 14 22.25Z"
                                                                    fill=""></path>
                                                                <path
                                                                    d="M17 8.24994C16.59 8.24994 16.25 7.90994 16.25 7.49994V1.49994C16.25 1.19994 16.43 0.919939 16.71 0.809939C16.99 0.699939 17.31 0.759939 17.53 0.969939L19.53 2.96994C19.82 3.25994 19.82 3.73994 19.53 4.02994C19.24 4.31994 18.76 4.31994 18.47 4.02994L17.75 3.30994V7.49994C17.75 7.90994 17.41 8.24994 17 8.24994Z"
                                                                    fill=""></path>
                                                                <path
                                                                    d="M14.9999 4.24994C14.8099 4.24994 14.6199 4.17994 14.4699 4.02994C14.1799 3.73994 14.1799 3.25994 14.4699 2.96994L16.4699 0.969941C16.7599 0.679941 17.2399 0.679941 17.5299 0.969941C17.8199 1.25994 17.8199 1.73994 17.5299 2.02994L15.5299 4.02994C15.3799 4.17994 15.1899 4.24994 14.9999 4.24994Z"
                                                                    fill=""></path>
                                                                <path
                                                                    d="M1.6698 19.2001C1.4298 19.2001 1.1898 19.0801 1.0498 18.8701C0.819805 18.5301 0.909805 18.0601 1.2498 17.8301L6.1798 14.5201C7.2598 13.8001 8.7498 13.8801 9.7298 14.7101L10.0598 15.0001C10.5598 15.4301 11.4098 15.4301 11.8998 15.0001L16.0598 11.4301C17.1198 10.5201 18.7898 10.5201 19.8598 11.4301L21.4898 12.8301C21.7998 13.1001 21.8398 13.5701 21.5698 13.8901C21.2998 14.2001 20.8198 14.2401 20.5098 13.9701L18.8798 12.5701C18.3798 12.1401 17.5398 12.1401 17.0398 12.5701L12.8798 16.1401C11.8198 17.0501 10.1498 17.0501 9.0798 16.1401L8.7498 15.8501C8.2898 15.4601 7.52981 15.4201 7.01981 15.7701L2.0998 19.0801C1.9598 19.1601 1.8098 19.2001 1.6698 19.2001Z"
                                                                    fill=""></path>
                                                            </svg>
                                                        </div>
                                                        <div class="text-upload">
                                                            <p class="text-sm-medium neutral-500">Upload Featured Image</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Bootstrap Modal -->

                                            <div class="preview-images">
                                                <div class="list-preview" id="imagePreviewContainer">
                                                    @foreach ($activity->images as $image)
                                                        <div class="image-preview" id="imagePreview_{{ $image->id }}">
                                                            <div class="box-image-preview position-relative">
                                                                <img src="{{ asset($image->path . $image->file) }}"
                                                                    alt="{{ $image->alt }}"
                                                                    class="img-fluid rounded mb-1">
                                                                <a class="remove-link btn-delete-image" href="#"
                                                                    onclick="event.preventDefault(); deleteactivityImage({{ $activity->id }}, {{ $image->id }})">

                                                                    <svg width="16" height="16"
                                                                        viewBox="0 0 16 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M9.3335 7.33333V11.3333" stroke=""
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path d="M6.6665 7.33333V11.3333" stroke=""
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path
                                                                            d="M4 4.66667V12.6667C4 13.403 4.59695 14 5.33333 14H10.6667C11.403 14 12 13.403 12 12.6667V4.66667M1.3335 4.66667H14.6668"
                                                                            stroke="" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    {{-- <div class="col-lg-12">
                      <div class="list-image-upload"> 
                        <div class="box-upload-image">
                          <div class="item-upload-image"> 
                            <input type="file" name="file">
                            <div class="upload-info">
                              <div class="icon-upload"> 
                                <svg width="22" height="23" viewbox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8 10.25C6.48 10.25 5.25 9.02 5.25 7.5C5.25 5.98 6.48 4.75 8 4.75C9.52 4.75 10.75 5.98 10.75 7.5C10.75 9.02 9.52 10.25 8 10.25ZM8 6.25C7.31 6.25 6.75 6.81 6.75 7.5C6.75 8.19 7.31 8.75 8 8.75C8.69 8.75 9.25 8.19 9.25 7.5C9.25 6.81 8.69 6.25 8 6.25Z" fill=""></path>
                                  <path d="M14 22.25H8C2.57 22.25 0.25 19.93 0.25 14.5V8.5C0.25 3.07 2.57 0.75 8 0.75H12C12.41 0.75 12.75 1.09 12.75 1.5C12.75 1.91 12.41 2.25 12 2.25H8C3.39 2.25 1.75 3.89 1.75 8.5V14.5C1.75 19.11 3.39 20.75 8 20.75H14C18.61 20.75 20.25 19.11 20.25 14.5V9.5C20.25 9.09 20.59 8.75 21 8.75C21.41 8.75 21.75 9.09 21.75 9.5V14.5C21.75 19.93 19.43 22.25 14 22.25Z" fill=""></path>
                                  <path d="M17 8.24994C16.59 8.24994 16.25 7.90994 16.25 7.49994V1.49994C16.25 1.19994 16.43 0.919939 16.71 0.809939C16.99 0.699939 17.31 0.759939 17.53 0.969939L19.53 2.96994C19.82 3.25994 19.82 3.73994 19.53 4.02994C19.24 4.31994 18.76 4.31994 18.47 4.02994L17.75 3.30994V7.49994C17.75 7.90994 17.41 8.24994 17 8.24994Z" fill=""></path>
                                  <path d="M14.9999 4.24994C14.8099 4.24994 14.6199 4.17994 14.4699 4.02994C14.1799 3.73994 14.1799 3.25994 14.4699 2.96994L16.4699 0.969941C16.7599 0.679941 17.2399 0.679941 17.5299 0.969941C17.8199 1.25994 17.8199 1.73994 17.5299 2.02994L15.5299 4.02994C15.3799 4.17994 15.1899 4.24994 14.9999 4.24994Z" fill=""></path>
                                  <path d="M1.6698 19.2001C1.4298 19.2001 1.1898 19.0801 1.0498 18.8701C0.819805 18.5301 0.909805 18.0601 1.2498 17.8301L6.1798 14.5201C7.2598 13.8001 8.7498 13.8801 9.7298 14.7101L10.0598 15.0001C10.5598 15.4301 11.4098 15.4301 11.8998 15.0001L16.0598 11.4301C17.1198 10.5201 18.7898 10.5201 19.8598 11.4301L21.4898 12.8301C21.7998 13.1001 21.8398 13.5701 21.5698 13.8901C21.2998 14.2001 20.8198 14.2401 20.5098 13.9701L18.8798 12.5701C18.3798 12.1401 17.5398 12.1401 17.0398 12.5701L12.8798 16.1401C11.8198 17.0501 10.1498 17.0501 9.0798 16.1401L8.7498 15.8501C8.2898 15.4601 7.52981 15.4201 7.01981 15.7701L2.0998 19.0801C1.9598 19.1601 1.8098 19.2001 1.6698 19.2001Z" fill=""></path>
                                </svg>
                              </div>
                              <div class="text-upload"> 
                                <p class="text-sm-medium neutral-500">Upload Image</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="preview-images"> 
                          <div class="list-preview">
                            <div class="image-preview"> 
                              <div class="box-image-preview"><img src="{{asset('assets/admin/assets/imgs/page/add-activity/activity.png')}}" alt="Travilla"><a class="btn-delete-image" href="#"> 
                                  <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.3335 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6.6665 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4 4.66667V12.6667C4 13.403 4.59695 14 5.33333 14H10.6667C11.403 14 12 13.403 12 12.6667V4.66667" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2.6665 4.66667H13.3332" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4.6665 4.66667L5.99984 2H9.99984L11.3332 4.66667" stroke="" stroke-linecap="round" stroke-linejoin="round"> </path>
                                  </svg></a></div>
                            </div>
                            <div class="image-preview"> 
                              <div class="box-image-preview"><img src="{{asset('assets/admin/assets/imgs/page/add-activity/activity2.png')}}" alt="Travilla"><a class="btn-delete-image" href="#"> 
                                  <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.3335 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6.6665 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4 4.66667V12.6667C4 13.403 4.59695 14 5.33333 14H10.6667C11.403 14 12 13.403 12 12.6667V4.66667" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2.6665 4.66667H13.3332" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4.6665 4.66667L5.99984 2H9.99984L11.3332 4.66667" stroke="" stroke-linecap="round" stroke-linejoin="round"> </path>
                                  </svg></a></div>
                            </div>
                            <div class="image-preview"> 
                              <div class="box-image-preview"><img src="{{asset('assets/admin/assets/imgs/page/add-activity/activity3.png')}}" alt="Travilla"><a class="btn-delete-image" href="#"> 
                                  <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.3335 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6.6665 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4 4.66667V12.6667C4 13.403 4.59695 14 5.33333 14H10.6667C11.403 14 12 13.403 12 12.6667V4.66667" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M2.6665 4.66667H13.3332" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4.6665 4.66667L5.99984 2H9.99984L11.3332 4.66667" stroke="" stroke-linecap="round" stroke-linejoin="round"> </path>
                                  </svg></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> --}}
                                </div>
                            </div>
                            {{-- <h5 class="neutral-1000 mb-12">Location</h5> --}}
                            {{-- <div class="box-border-bottom">
                  <div class="row"> 
                    <div class="col-lg-12">
                      <div class="form-group"> 
                        <input class="form-control" type="text" placeholder="Country">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group"> 
                        <input class="form-control" type="text" placeholder="Country">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group"> 
                        <input class="form-control" type="text" placeholder="State">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group"> 
                        <input class="form-control" type="text" placeholder="City">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group"> 
                        <input class="form-control" type="text" placeholder="Address">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group"> 
                        <input class="form-control" type="text" placeholder="Address 2">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group"> 
                        <div class="map-activity"> 
                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120835.65146929219!2d2.5873635107259836!3d47.992147406516835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5878d50e09eab%3A0x40b82c3688c4a20!2s77460%20Souppes-sur-Loing%2C%20Ph%C3%A1p!5e0!3m2!1svi!2s!4v1715095452879!5m2!1svi!2s" width="100%" height="363" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  --}}
                        </div>
                    </div>
                    <div class="col-lg-5">


                        <div class="box-form-add">
                            <h5 class="neutral-1000 mb-12">Included</h5>

                            <p class="text-md-bold neutral-1000 mb-12">Extra Services</p>
                            @if (json_decode($activity->includes))
                                @foreach (json_decode($activity->includes) as $include)
                                    <div class="box-extra-includes box-extra-services">
                                        <div class="item-extra-include">
                                            <div class="item-extra-1 inc-exc-field-width">
                                                <input class="form-control" type="text" name="includes[]"
                                                    value="{{ old('include', $include) }}"
                                                    placeholder="Includes title 1">
                                            </div>
                                            <div class="item-extra-3">
                                                <a class="btn-remove-include" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                                        width="22px" height="22px">
                                                        <path
                                                            d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <a class="btn btn-addmore-include btn-gray" href="#">Add Includes</a>

                            <br><br>
                            <h5 class="neutral-1000 mb-12">Excluded</h5>
                            @if (json_decode($activity->excludes))
                                @foreach (json_decode($activity->excludes) as $exclude)
                                    <div class="box-extra-excludes">
                                        <div class="item-extra-exclude">
                                            <div class="item-extra-1 inc-exc-field-width">
                                                <input class="form-control" type="text" name="excludes[]"
                                                    value="{{ old('exclude', $exclude) }}"
                                                    placeholder="Excludes title 1">
                                            </div>
                                            <div class="item-extra-3">
                                                <a class="btn-remove-exclude" href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                                        width="22px" height="22px">
                                                        <path
                                                            d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <a class="btn btn-addmore-exclude btn-gray" href="#">Add Excludes</a>
                            <br><br>

                            <h5 class="neutral-1000 mb-12">Select time for public activities</h5>
                            <div class="row">
                                @php
                                    // Decode the public activity timings into an array
                                    $availableActivityTimings = json_decode($activity->public_activity_timings, true); // Use true for associative array
                                @endphp

                                @foreach ($activityTimes as $activityTime)
                                    <div class="col-lg-3">
                                        <label class="lbl-checkbox text-md-medium neutral-500">
                                            <input type="checkbox" name="public_activity_timings[]"
                                                value="{{ $activityTime }}"
                                                @if (is_array($availableActivityTimings) && in_array($activityTime, $availableActivityTimings)) checked @endif>
                                            {{ $activityTime }}
                                        </label>
                                    </div>
                                @endforeach
                                @if ($errors->has('public_activity_timings'))
                                    <div class="text-danger">{{ $errors->first('public_activity_timings') }}</div>
                                @endif
                            </div>



                            <div class="row">

                                <div class="box-button-save mt-15">
                                    <div class="col-lg-12">
                                        <label class=" text-md-medium neutral-500"> Other Information
                                        </label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="other_info" rows="6" id="editor2"> {{ old('other_info', $activity->other_info) }}</textarea>
                                            @if ($errors->has('other_info'))
                                                <span class="text-danger">{{ $errors->first('other_info') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="text-md-medium neutral-500">Add in attraction</label>
                                    <select class="form-control" id="attraction_id" name="attraction_id">
                                        <option value="0" {{ $activity->attraction_id == 0 ? 'selected' : '' }}>No
                                            attraction</option>
                                        @foreach ($attractions_list as $attraction)
                                            <option value="{{ $attraction->id }}"
                                                {{ $activity->attraction_id == $attraction->id ? 'selected' : '' }}>
                                                {{ $attraction->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="text-md-medium neutral-500">Add in destination</label>
                                    <select class="form-control" id="destination_id" name="destination_id">
                                        <option value="0" {{ $activity->destination_id == 0 ? 'selected' : '' }}>No
                                            Destination</option>
                                        @foreach ($destinations_list as $destination)
                                            <option value="{{ $destination->id }}"
                                                {{ $activity->destination_id == $destination->id ? 'selected' : '' }}>
                                                {{ $destination->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            {{-- <div class="box-form-add"> 
                <h5 class="neutral-1000 mb-12">Pricing</h5>
                <div class="row"> 
                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <input class="form-control" type="text" placeholder="activity price ($)">
                    </div>
                  </div>
                </div>
                <p class="text-md-bold neutral-1000 mb-12">Extra Services</p>
                <div class="box-extra-services"> 
                  <div class="item-extra-service"> 
                    <div class="item-extra-1"> 
                      <input class="form-control" type="text" placeholder="Service title 1">
                    </div>
                    <div class="item-extra-2"> 
                      <input class="form-control" type="text" placeholder="Price ($)">
                    </div>
                    <div class="item-extra-3"><a class="btn-remove" href="#">
                        <svg width="22" height="22" viewbox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12.7778 10.1111V15.4444" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M9.22217 10.1111V15.4444" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M5.66699 6.55556V17.2222C5.66699 18.2041 6.46293 19 7.44477 19H14.5559C15.5377 19 16.3337 18.2041 16.3337 17.2222V6.55556" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M3.88916 6.55556H18.1114" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                          <path d="M6.55566 6.55556L8.33344 3H13.6668L15.4446 6.55556" stroke="" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a></div>
                  </div>
                </div><a class="btn btn-addmore" href="#">Add More</a>
                <div class="box-button-save mt-35"> 
                  <button class="btn btn-gray">Save Changes</button>
                </div>
              </div> --}}
                        </div>
                    </div>
                    @php
                        $meta = $activity->metadata;
                    @endphp
                    @include('adminpanel.seo')

                    <div class="box-button-save">
                        <input type="submit" class="btn btn-black" value="Save Changes"></button>
                    </div>
                </div>
        </form>
    </div>
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <!-- Change to modal-xl for extra large -->
            <div class="modal-content">
                <div class="modal-body">
                    @include('adminpanel.media.mediabox')
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file-input');
            const previewList = document.getElementById('preview-list');
            let selectedFiles = [];

            function updatePreview() {
                previewList.innerHTML = '';
                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imagePreview = document.createElement('div');
                        imagePreview.className = 'image-preview';
                        imagePreview.innerHTML = `
                          <div class="box-image-preview">
                              <img src="${e.target.result}" alt="Image Preview">
                              <a class="btn-delete-image" href="#" data-id="${index}">
                                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M9.3335 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                      <path d="M6.6665 7.33333V11.3333" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                      <path d="M4 4.66667V12.6667C4 13.403 4.59695 14 5.33333 14H10.6667C11.403 14 12 13.403 12 12.6667V4.66667M1.3335 4.66667H14.6668" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                              </a>
                          </div>
                      `;
                        previewList.appendChild(imagePreview);
                    };
                    reader.readAsDataURL(file);
                });
            }

            function updateFileInput() {
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });
                fileInput.files = dataTransfer.files;
            }

            fileInput.addEventListener('change', function() {
                const files = Array.from(fileInput.files);
                selectedFiles.push(...files);
                updatePreview();
                updateFileInput();
            });

            previewList.addEventListener('click', function(e) {
                const target = e.target.closest('.btn-delete-image');
                if (!target) return;
                e.preventDefault();
                const id = parseInt(target.dataset.id);
                selectedFiles.splice(id, 1);
                updatePreview();
                updateFileInput();
            });
        });





        /* Adds more input boxes for extra includes */
        $(".btn-addmore-include").click(function(e) {
            e.preventDefault();
            var number = $(".item-extra-include").length + 1;
            var html = '<div class="item-extra-include">' +
                '<div class="item-extra-1 inc-exc-field-width"> <input class="form-control" type="text" name="includes[]" placeholder="Includes title ' +
                number + '" /></div>' +
                '<div class="item-extra-3"><a class="btn-remove-include" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="22px" height="22px"><path d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z"/></svg></a></div>' +
                '</div>';
            $(".box-extra-includes").append(html);
            setPlaceholderInclude();
        });

        /* Removes an input box for includes */
        $(document).on("click", ".btn-remove-include", function(e) {
            e.preventDefault();
            if ($(".item-extra-include").length > 1) {
                var _this = $(this).closest(".item-extra-include");
                _this.remove();
                setPlaceholderInclude();
            }
        });

        /* Updates the placeholder text for all includes input boxes */
        function setPlaceholderInclude() {
            $(".item-extra-include").each(function(index) {
                $(this).find("input").attr("placeholder", "Includes title " + (index + 1));
            });
        }

        /* Adds more input boxes for extra excludes */
        $(".btn-addmore-exclude").click(function(e) {
            e.preventDefault();
            var number = $(".item-extra-exclude").length + 1;
            var html = '<div class="item-extra-exclude">' +
                '<div class="item-extra-1 inc-exc-field-width"> <input class="form-control" type="text" name="excludes[]" placeholder="Excludes title ' +
                number + '" /></div>' +
                '<div class="item-extra-3"><a class="btn-remove-exclude" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="22px" height="22px"><path d="M 20.5 4 A 1.50015 1.50015 0 0 0 19.066406 6 L 14.640625 6 C 12.803372 6 11.082924 6.9194511 10.064453 8.4492188 L 7.6972656 12 L 7.5 12 A 1.50015 1.50015 0 1 0 7.5 15 L 8.2636719 15 A 1.50015 1.50015 0 0 0 8.6523438 15.007812 L 11.125 38.085938 C 11.423352 40.868277 13.795836 43 16.59375 43 L 31.404297 43 C 34.202211 43 36.574695 40.868277 36.873047 38.085938 L 39.347656 15.007812 A 1.50015 1.50015 0 0 0 39.728516 15 L 40.5 15 A 1.50015 1.50015 0 1 0 40.5 12 L 40.302734 12 L 37.935547 8.4492188 C 36.916254 6.9202798 35.196001 6 33.359375 6 L 28.933594 6 A 1.50015 1.50015 0 0 0 27.5 4 L 20.5 4 z M 14.640625 9 L 33.359375 9 C 34.196749 9 34.974746 9.4162203 35.439453 10.113281 L 36.697266 12 L 11.302734 12 L 12.560547 10.113281 A 1.50015 1.50015 0 0 0 12.5625 10.111328 C 13.025982 9.4151428 13.801878 9 14.640625 9 z M 11.669922 15 L 36.330078 15 L 33.890625 37.765625 C 33.752977 39.049286 32.694383 40 31.404297 40 L 16.59375 40 C 15.303664 40 14.247023 39.049286 14.109375 37.765625 L 11.669922 15 z"/></svg></a></div>' +
                '</div>';
            $(".box-extra-excludes").append(html);
            setPlaceholderExclude();
        });

        /* Removes an input box for excludes */
        $(document).on("click", ".btn-remove-exclude", function(e) {
            e.preventDefault();
            if ($(".item-extra-exclude").length > 1) {
                var _this = $(this).closest(".item-extra-exclude");
                _this.remove();
                setPlaceholderExclude();
            }
        });

        /* Updates the placeholder text for all excludes input boxes */
        function setPlaceholderExclude() {
            $(".item-extra-exclude").each(function(index) {
                $(this).find("input").attr("placeholder", "Excludes title " + (index + 1));
            });
        }
    </script>




    <style>
        .inc-exc-field-width {
            width: 80% !important
        }

        .box-extra-includes .item-extra-include {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .box-extra-excludes .item-extra-exclude {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
    </style>

    <script>
        function deleteactivityImage(attractionPostId, imageId) {
            const url = `/admin/activity/${attractionPostId}/image/${imageId}`;

            axios.delete(url)
                .then(response => {
                    console.log(response.data.message);

                    // Remove the image preview from the DOM
                    const imagePreviewElement = document.getElementById(`imagePreview_${imageId}`);
                    if (imagePreviewElement) {
                        imagePreviewElement.remove();
                    }
                })
                .catch(error => {
                    console.error('Error deleting image:', error);
                    showToast(document.getElementById('errorToast'), 'An error occurred while deleting the image.');
                });
        }
    </script>

@endsection
