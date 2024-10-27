@extends('layouts.adminpanel.app')
@section('content')
    <div class="box-heading">
        <div class="box-heading-left">
            <div class="box-title">
                <h4 class="neutral-1000 mb-15">Category</h4>
            </div>
            <div class="box-breadcrumb">
                <div class="breadcrumbs">
                    <ul>
                        
                        <li> <a class="icon-home" href="{{route('admin.index')}}">Dashboard</a></li>
                        <li><span>Add new category</span></li>
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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="section-box">
        <div class="">
            <div class="table-responsive">
                <table class="table table-stripped table-mybooking">
                    <thead>
                        {{-- <th class="mw-76"></th> --}}
                        <th class="mw-450"><span class="sort">Title</span></th>
                        <th class="mw-76"></th>
                    </thead>
                    <tbody> </tbody>
                    @foreach ($categories as $category)
                        <tr>
                            {{-- <td class="text-center">
                                <input class="cb-select" type="checkbox">
                            </td> --}}

                            <td> <span class="text-md-medium neutral-500">{{ $category->title }}</span></td>

                            <td class="text-center">
                                <a class="btn btn-secondary" href="{{ route('category.edit', $category->id) }}"
                                    style="padding: 2px 5px; font-size: 12px;">Edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding: 2px 5px; font-size: 12px;"
                                        onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-form-add">
                        @if (empty($cat->title))
                            <h5 class="neutral-1000 mb-12">Category Form</h5>
                            <form method="post" action="{{ route('category.store') }}">
                                @csrf
                                <div class="box-border-bottom">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="title"
                                                    placeholder="Title" value="{{ old('title') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-button-save">
                                    <button type="submit" class="btn btn-black">Save</button>
                                </div>
                            </form>
                        @else
                            <h5 class="neutral-1000 mb-12">Edit</h5>
                            <form method="post" action="{{ route('category.update', $cat->id) }}">
                                @csrf
                                @method('PUT') {{-- This is important for Laravel to recognize the update method --}}
                                <div class="box-border-bottom">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="title"
                                                    value="{{ $cat->title }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-button-save">
                                    <button type="submit" class="btn btn-black">Save</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
