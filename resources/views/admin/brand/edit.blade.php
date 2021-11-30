@extends('layouts.admin_master')

@section('brand') active @endsection

@section('title')
Brand Edit
@endsection


@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Admin</a>
            <span class="breadcrumb-item active">Brand</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-6 m-auto">
                    <div class="card">
                        <div class="card-header">Update Brand
                        </div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ url('update-brand') }}" method="POST">
                                @csrf
                                {{--id taken--}}
                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brand Name</label>
                                    <input type="text" name="brand_name"
                                        class="form-control @error('brand_name') is-invalid @enderror"
                                        id="exampleInputEmail1" value="{{ $brand->brand_name }}"
                                        aria-describedby="emailHelp">

                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>




                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
