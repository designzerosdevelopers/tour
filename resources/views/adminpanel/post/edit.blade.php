@extends('layouts.adminpanel.app')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">Blog</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        <li><a class="icon-home" href="{{route('admin.index')}}">Dashboard</a></li>
                        <li><a class="icon-home" href="{{route('post.index')}}">Blog Posts</a></li>
                        <li><span>Edit blog post</span></li>
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
                <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-12">
                        <div class="box-form-add">
                            <h5 class="neutral-1000 mb-12">Blog Post Form</h5>

                            <div class="box-border-bottom">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="title"
                                                value="{{ $post->title }}" placeholder="Title" value="{{ old('title') }}">
                                        </div>
                                    </div>

                                    <!-- Tags Field -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="{{ $post->tags }}" name="tags"  placeholder="Tags">              
                                        </div>
                                    </div>

                                    <!-- Category ID Field -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" name="category_id" id="category_id">
                                                <option value="0" {{ $post->category_id == 0 ? 'selected' : '' }}>
                                                    Uncategorised</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <!-- Content Field -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control bg-dark" name="content" rows="6" id="editor1">{{ $post->content }}</textarea>
                                        </div>
                                    </div>

                                    @if (!empty($post->qna) && count($post->qna) > 0)
                                        <div class="col-lg-12 mb-3">
                                            <p class="text-md-bold neutral-1000 mb-12">Question & Answer</p>
                                            <div class="box-extra-services2" id="faq2">
                                                @foreach ($post->qna as $qna)
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
                                                            <svg width="22" height="23" viewbox="0 0 22 23"
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
                                                            <p class="text-sm-medium neutral-500">Upload featured Image</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Bootstrap Modal -->


                                            <div class="preview-images">
                                                <div class="list-preview" id="imagePreviewContainer">
                                                    @foreach ($post->images as $image)
                                                        <div class="image-preview" id="imagePreview_{{ $image->id }}">
                                                            <div class="box-image-preview position-relative">
                                                                    <img src="{{ asset($image->path . $image->file) }}"
                                                                        alt="{{ $image->alt }}"
                                                                        class="img-fluid rounded mb-1">
                                                                    <a class="remove-link btn-delete-image" href="#"
                                                                        onclick="event.preventDefault(); deletePostImage({{ $post->id }}, {{ $image->id }})">

                                                                        <svg width="16" height="16"
                                                                            viewBox="0 0 16 16" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M9.3335 7.33333V11.3333"
                                                                                stroke="" stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                            <path d="M6.6665 7.33333V11.3333"
                                                                                stroke="" stroke-linecap="round"
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
                                </div>
                            </div>
                            <div class="box-button-save">
                                <button type="submit" name="published" value="1"
                                    class="btn btn-black">Update</button>
                                <button type="submit" name="published" value="0"
                                    class="btn btn-black">Draft</button>
                            </div>
                        </div>
                    </div>
                    @include('adminpanel.seo')
                </form>

            </div>
        </div>
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
        function deletePostImage(PostId, imageId) {
            const url = `/admin/post/${PostId}/image/${imageId}`;

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

@stop
