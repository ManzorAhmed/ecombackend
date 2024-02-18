@extends('frontend.layouts.master')
<head>
    <style>
        .products-grid .item {
            width: 22%;
            display: inline-block;
            vertical-align: top;
            box-sizing: border-box;
            /*padding: 10px;*/
        }


        /*.item {*/
        /*    flex: 1 1 240px;*/
        /*    margin: 4px;*/
        /*    width: 22%;*/
        /*}*/
    </style>
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMAC MEDICAL Equipment</title>
    <!-- Standard Favicon -->
    <link href="favicon.ico" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/bootstrap.min.css')}}">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/fontawesome.min.css')}}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/ionicons.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/animate.min.css')}}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/owl.carousel.min.css')}}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/jquery-ui-range-slider.min.css')}}">
    <!-- Utility -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/utility.css')}}">
    <!-- Main -->
    <link rel="stylesheet" href="{{asset('frontend/Product/css/bundle.css')}}">

    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <!-- Modernizr-JS -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/vendor/modernizr-custom.min.js')}}"></script>
    <!-- NProgress -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/nprogress.min.js')}}"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/bootstrap.min.js')}}"></script>
    <!-- Popper -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/popper.min.js')}}"></script>
    <!-- ScrollUp -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Elevate Zoom -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.elevatezoom.min.js')}}"></script>
    <!-- jquery-ui-range-slider -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery-ui.range-slider.min.js')}}"></script>
    <!-- jQuery Slim-Scroll -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.slimscroll.min.js')}}"></script>
    <!-- jQuery Resize-Select -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.resize-select.min.js')}}"></script>
    <!-- jQuery Custom Mega Menu -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.custom-megamenu.min.js')}}"></script>
    <!-- jQuery Countdown -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/jquery.custom-countdown.min.js')}}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/owl.carousel.min.js')}}"></script>
    <!-- Main -->
    <script type="text/javascript" src="{{asset('frontend/Product/js/app.js')}}"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/newcss/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>


@section('content')

    <!DOCTYPE html>
<html>
<body>

<div class="container">

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>

                        @foreach((array) session('cart') as $id => $product)
                            <?php
                            if (isset($product['price'])) {
                                $total = 0;
                                $total += $product['price'] * $product['qty'];
                            }
                            ?>
                        @endforeach


                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $product)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    @if(isset($product['image']))
                                        <img src="{{ $product['image'] }}" width="100" height="100"
                                             class="img-responsive"/>
                                    @endif
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">


                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container page">
    @yield('content')
</div>

@yield('scripts')

</body>
</html>
@endsection
