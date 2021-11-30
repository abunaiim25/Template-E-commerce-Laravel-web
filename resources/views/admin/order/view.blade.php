@extends('layouts.admin_master')

@section('orders') active @endsection

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Admin</a>
            <span class="breadcrumb-item active">Order-view</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">


                <div class="card w-100 pd-20">
                    <h6 class="card-body-title">Order Item</h6>
                    <div class="form-layout">
                        <div class="table-wrapper">
                            <table id="" class="table display responsive nowrap ">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Image</th>
                                        <th class="wd-15p">Poduct Name</th>
                                        <th class="wd-15p">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orderItems as $row)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($row->product->image_one) }}" height="50px;"
                                                    width="50px;" alt="img">
                                            </td>
                                            <td>
                                                {{ $row->product->product_name }}
                                            </td>

                                            <td>
                                                {{ $row->product_qty }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- form-layout -->
                </div><!-- card -->



                <div class="card pd-20 pd-sm-40 w-100 mt-4">
                    <h6 class="card-body-title">Orders</h6>
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Invoice NO: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="{{ $order->invoice_no }}" readonly>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Payment Type: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="lastname" placeholder="Enter lastname"
                                        value="{{ $order->payment_type }}" readonly>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Total: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" \
                                        placeholder="Enter email address" value="{{ $order->total }}" readonly>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Total: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" placeholder="Enter email address"
                                        value="{{ $order->subtotal }}" readonly>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Coupon Discoun: <span
                                            class="tx-danger">*</span></label>
                                    @if ($order->coupon_discount == null)
                                        <span class="badge badge-pill badge-danger">NO</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">{{ $order->coupon_discount }}%</span>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                    </div><!-- form-layout -->
                </div><!-- card -->

                


                <div class="card w-100 pd-20 pd-sm-40 mt-4">
                    <h6 class="card-body-title">Shipping Address</h6>
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Firstname: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="{{ $shipping->shipping_first_name }}" readonly
                                        placeholder="Enter firstname">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Lastname: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="lastname" placeholder="Enter lastname"
                                        value="{{ $shipping->shipping_last_name }}" readonly>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email address: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" \
                                        placeholder="Enter email address" value="{{ $shipping->shipping_email }}"
                                        readonly>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Shipping PHone: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" placeholder="Enter email address"
                                        value="{{ $shipping->shipping_phone }}" readonly>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">SHippng Address: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" placeholder="Enter email address"
                                        value="{{ $shipping->address }}" readonly>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">State: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" placeholder="Enter email address"
                                        value="{{ $shipping->state }}" readonly>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Post Code: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" placeholder="Enter email address"
                                        value="{{ $shipping->post_code }}" readonly>
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                    </div><!-- form-layout -->
                </div><!-- card -->





            </div>

        </div>
    @endsection
