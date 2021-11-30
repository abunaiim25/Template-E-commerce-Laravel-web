@extends('layouts.admin_master')

@section('main') active @endsection

@section('title')
    Main
@endsection


@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Admin</a>
            <span class="breadcrumb-item active">Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title"> Main</h6>

                        <form action="{{ url('admin-main-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT' )}}
                            <div class="row">
            
                                <div class="form-group col-md-5 mt-3">
                                    <h4>Front Image</h4>
                                    <img style="height: 30vh" src="{{ url($main->font_img) }}" class="img-thumbnail" alt="">
                                    <input class="mt-3" type="file" name="font_img" id="font_img">
                                </div>

                                <div class="form-group col-md-7 mt-3">
                                    <h4>Front Second Image</h4>
                                    <img style="height: 30vh" src="{{ url($main->second_font_img) }}" class="img-thumbnail" alt="">
                                    <input class="mt-3" type="file" name="second_font_img" id="second_font_img">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{$main->email}}">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="phone1">
                                        <h4>Phone Number 1</h4>
                                    </label>
                                    <input type="text" class="form-control " id="phone1" name="phone1" value="{{$main->phone1}}">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="phone2">
                                        <h4>Phone Number 2</h4>
                                    </label>
                                    <input type="text" class="form-control" id="phone2" name="phone2" value="{{$main->phone2}}">
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="address">
                                        <h4>Address</h4>
                                    </label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{$main->address}}">
                                </div>
            
                               
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary mt-4">
                        </form>


                    </div>
                </div>
            </div>
        @endsection
