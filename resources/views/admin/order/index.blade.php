@extends('layouts.admin_master')

@section('orders') active @endsection

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      <span class="breadcrumb-item active">Order</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">
        <div class="col-md-12">    
              <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order list</h6>    
                
                  @if(session('status'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{session('status')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif  
                  @if(session('delete'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>{{session('delete')}}</strong>
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
                        <th class="wd-15p">Invoice No</th>
                        <th class="wd-15p">Payment Type</th>
                        <th class="wd-20p">Sub Total</th>
                        <th class="wd-20p">Total</th> 
                        <th class="wd-20p">Discount</th>    
                        <th class="wd-25p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                    @foreach ($orders as $row)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>#{{ $row->invoice_no }}</td>
                        <td>{{ $row->payment_type }}</td>
                        <td>{{ $row->subtotal }}$</td>
                        <td>{{ $row->total }}$</td>
                        <td>
                            @if($row->coupon_discount == NULL)
                            <span class="badge badge-danger">No</span>
                            @else 
                            <span class="badge badge-success">Yes</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/orders/view/'.$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{ url('admin/coupon/delete/'.$row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you shure to delete')"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- table-wrapper -->
              </div><!-- card -->
        </div>
    </div>

</div>
@endsection