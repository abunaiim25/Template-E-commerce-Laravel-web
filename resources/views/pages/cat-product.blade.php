@extends('layouts.fontend_master')

@section('title')
Category Wise Product
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

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('fontend') }}/img/topimage.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">

                        <div class="sidebar__item">

                            <h4>Categories</h4>
                            <ul>
                                @foreach ($categories as $cat)
                                    <li><a href="{{url('category/product-show/'.$cat->id)}}">{{ $cat->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($lts_p as $product)
                                            <a href="{{ url('proudct/details/' . $product->id) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset($product->image_one) }}" style="height: 40px; width:40px;"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $product->product_name }} </h6>
                                                    <span>${{ $product->price }}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>


                                    <div class="latest-prdouct__slider__item">
                                        @foreach ($lts_p as $product)
                                            <a href="{{ url('proudct/details/' . $product->id) }}" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ asset($product->image_one) }}" style="height: 40px; width:40px;"
                                                        alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>{{ $product->product_name }} </h6>
                                                    <span>${{ $product->price }}</span>
                                                </div>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg=" {{ asset($product->image_one) }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{ url('add/to-wishlist/' . $product->id) }}"><i
                                                class="fa fa-heart"></i></a></li>
                                                
                                                <li><a href="{{ url('proudct/details/' . $product->id) }}"><i
                                                    class="far fa-eye"></i></a></li>

                                    <form action="{{ url('add/to-cart/' . $product->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                        {{--<li><a class="btn " href="#" type="submit" role="submit"><i class="fa fa-shopping-cart"></i></a></li>--}}
                                    </form>

                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="#">{{ $product->product_name }}</a></h6>
                                        <h5>${{ $product->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-danger">No Product Found</h4>
                        @endforelse
                    </div>

                    {{ $products->links() }}

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
