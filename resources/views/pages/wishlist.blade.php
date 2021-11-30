@extends('layouts.fontend_master')

@section('title')
    Wishlist
@endsection


@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    {{-- category list --}}
                    @include('pages.inc.category')
                </div>


                <div class="col-lg-9">
                    <div class="hero__search">

                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>

                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{$main->phone1}}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend') }}/img/topimage.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist Page</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Wishlist Page</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('cart_delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('cart_delete') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('cart_update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('cart_update') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="shoping__cart__table">

                        @if ($wishlists->count() > 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Cart</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($wishlists as $row)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ asset($row->product->image_one) }}"
                                                    style="height: 70px; width:70px;" alt="">
                                                <h5>{{ $row->product->product_name }}</h5>
                                            </td>

                                            <td class="shoping__cart__price">
                                                ${{ $row->product->price }}
                                            </td>

                                            <td class="shoping__cart__price">
                                                <form action="{{ url('add/to-cart/' . $row->product_id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="price" value="{{ $row->product->price }}">
                                                    <button class="btn btn-sm btn-danger">Add To Cart</button>
                                                </form>
                                            </td>

                                            <td class="shoping__cart__item__close">
                                                <a href="{{ url('wishlist/destroy/' . $row->id) }}"> <span
                                                        class="icon_close">
                                                    </span>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        @else
                            <h2 class="text-center p-5">There are no product in your <i class="fa fa-heart"></i>
                                wishlist
                            </h2>
                            <a href="{{ url('shop/page') }}" class="btn btn-outline-success float-right">Continue
                                Shopping</a>
                        @endif


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
