@extends('layouts.fontend_master')


@section('title')
Contact Us
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
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!--form-->
    <section class="">
        <div class="content">

            <div class="container">
                <div class="row align-items-stretch no-gutters contact-wrap">
                    <div class="col-md-8">
                        <div class="form h-100">
                            <h3>Send us a message</h3>
                            <form action="{{ route('contact.store') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group mb-5">
                                        <label for="" class="col-form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Your name"  value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-md-6 form-group mb-5">
                                        <label for="" class="col-form-label">Email *</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Your email"  value="{{ Auth::user()->email }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-5">
                                        <label for="" class="col-form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Phone #">
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group mb-5">
                                        <label for="message" class="col-form-label">Message *</label>
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="4"
                                            placeholder="Write your message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-outline-success">Submit</button>

                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>

                            <div id="form-message-warning mt-4"></div>
                            <div id="form-message-success">
                                Your message was sent, thank you!
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-info h-100">
                            <h3>Contact Information</h3>
                            
                            <ul class="list-unstyled">
                                <li class="d-flex">
                                    <span class="wrap-icon icon-room mr-3"></span>
                                    <span class="text">{{$main->address}}</span>
                                </li>
                                <li class="d-flex">
                                    <span class="wrap-icon icon-phone mr-3"></span>
                                    <span class="text">{{$main->phone1}}</span>
                                </li>
                                <li class="d-flex">
                                    <span class="wrap-icon icon-phone mr-3"></span>
                                    <span class="text">{{$main->phone2}}</span>
                                </li>
                                <li class="d-flex">
                                    <span class="wrap-icon icon-envelope mr-3"></span>
                                    <span class="text">{{$main->email}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

