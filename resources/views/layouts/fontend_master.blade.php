<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/style.css" type="text/css">
    <!-- contact -->
    <link rel="stylesheet" href="{{ asset('contact') }}/css/style.css">
    <!-- profile -->
    <link rel="stylesheet" href="{{ asset('profile/profile.css') }}">

</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ url('/') }}">{{-- <img src="{{ asset('fontend') }}/img/logo.png" alt=""> --}} <h2><b>E-Shop</b></h2></a>
        </div>
        <div class="humberger__menu__cart">

            @php
                $total = App\Models\Cart::all()
                    ->where('user_ip', request()->ip())
                    ->sum(function ($t) {
                        return $t->price * $t->qty;
                    });
                $quantity = App\Models\Cart::where('user_ip', request()->ip())->sum('qty');
                $wishqty = App\Models\Wishlist::where('user_id', Auth::id())->get();
            @endphp
            <ul>
                <li><a href="{{ url('wishlist') }}"><i class="fa fa-heart"></i>
                        <span>{{ count($wishqty) }}</span></a></li>
                <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i>
                        <span>{{ $quantity }}</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>${{ $total }}</span></div>
        </div>
        <div class="humberger__menu__widget">

            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>

        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('shop/page') }}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{url('user.order')}}">My Orders</a></li>
                        <li><a href="{{ url('cart') }}">Shoping Cart</a></li>
                        <li><a href="{{ url('wishlist') }}">Wistlist</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('contactView') }}">Contact</a></li>
                <li><a href="{{ url('/home') }}">Profile</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> {{ $main->email }}</li>
                <li>Free Shipping for all Order of {{ $main->phone2 }}</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>{{ $main->email }}</li>
                                <li>Free Shipping for all Order of {{ $main->phone2 }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>


                            <div class="header__top__right__auth">
                                @auth

                                    <li style="list-style-type:none;" class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('home') }}">
                                                    My Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>

                                @else
                                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                @endauth
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>


        @if (session('cart'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('cart') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}">{{-- <img src="{{ asset('fontend') }}/img/logo.png" alt=""> --}}<h2><b>E-Shop</b></h2></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('shop/page') }}">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{url('user.order')}}">My Orders</a></li>
                                    <li><a href="{{ url('cart') }}">Shoping Cart</a></li>
                                    <li><a href="{{ url('wishlist') }}">Wistlist</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('contactView') }}">Contact</a></li>
                            <li><a href="{{ url('/home') }}">Profile</a></li>
                        </ul>
                    </nav>
                </div>

                {{-- ===========cart wishqty up======================= --}}
                <div class="col-lg-3">
                    <div class="header__cart">
                        @php
                            $total = App\Models\Cart::all()
                                ->where('user_ip', request()->ip())
                                ->sum(function ($t) {
                                    return $t->price * $t->qty;
                                });
                            $quantity = App\Models\Cart::where('user_ip', request()->ip())->sum('qty');
                            $wishqty = App\Models\Wishlist::where('user_id', Auth::id())->get();
                        @endphp
                        <ul>
                            <li><a href="{{ url('wishlist') }}"><i class="fa fa-heart"></i>
                                    <span>{{ count($wishqty) }}</span></a></li>
                            <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i>
                                    <span>{{ $quantity }}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>${{ $total }}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->



    <main class="">
        @yield('content')
    </main>


    {{-- footer --}}
    @include('layouts.inc_fontend.footer')




    <!-- Js Plugins -->
    <script src="{{ asset('fontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('fontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('fontend') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('fontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('fontend') }}/js/main.js"></script>

    {{-- contact --}}
    <script src="{{ asset('contact') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('contact') }}/js/popper.min.js"></script>
    <script src="{{ asset('contact') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('contact') }}/js/jquery.validate.min.js"></script>
    <script src="{{ asset('contact') }}/js/main.js"></script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!--https://sweetalert.js.org/guides/-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif

</body>

</html>
