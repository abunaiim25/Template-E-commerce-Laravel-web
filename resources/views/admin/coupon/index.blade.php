@extends('layouts.admin_master')

@section('coupon') active @endsection

@section('title')
Coupon 
@endsection


@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Admin</a>
            <span class="breadcrumb-item active">coupon</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">coupon list</h6>


                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('status') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session('status_inactive'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('status_inactive')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          @endif
                        @if (session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('delete') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        
                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Sl</th>
                                        <th class="wd-15p">Coupon Name</th>
                                        <th class="wd-15p">Coupon Discount</th>
                                        <th class="wd-20p">Status</th>
                                        <th class="wd-25p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($coupons as $row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->coupon_name }}</td>
                                            <td>{{ $row->discount }}%</td>
                                            <td>
                                                @if ($row->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/coupon/edit/' . $row->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('admin/coupon/delete/' . $row->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('are you shure to delete')"><i
                                                        class="fa fa-trash"></i></a>
                                                @if ($row->status == 1)
                                                    <a href="{{ url('admin/coupon/inactive/' . $row->id) }}"
                                                        class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{ url('admin/coupon/active/' . $row->id) }}"
                                                        class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand
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

                            <form action="{{ url('store-coupon') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Coupon Name</label>
                                    <input type="text" name="coupon_name"
                                        class="form-control @error('coupon_name') is-invalid @enderror"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter coupon">

                                    @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Coupon Discount</label>
                                    <input type="text" name="discount"
                                        class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="enter coupon discount %">

                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Add coupon</button>
                            </form>




                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
