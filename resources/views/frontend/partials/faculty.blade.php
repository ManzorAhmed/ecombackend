@extends('frontend.layouts.master')
@section('content')
    <!DOCTYPE html>
<html lang="en">
@php
    $speaker=\App\Models\Speaker::get();
@endphp
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>15th Abu-Dhabi Wound Care Conference in Collaboration with International Interprofessional Wound Care Group
        |</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900"
        rel="stylesheet">

    <link href="{{asset('frontend/faculty/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/faculty/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/faculty/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/faculty/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/faculty/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/faculty/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/faculty/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('froentend/faculty/frontend/css/style.css')}}" rel="stylesheet">

    <!-- Vendor CSS Files -->

</head>

<body>

<a href="https://eu.eventscloud.com/ereg/index.php?eventid=200250489">
    <img src="{{asset('frontend/2-15th Abu Dhabi Wound Care Conference Layout rev01.png')}}"
         style="width: 100%">
</a>
<!-- ======= About Lists Section ======= -->
<style>
    /*@import  url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');*/
    /*@import  url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');*/
    /*@import  url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');*/
    /*@import  url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");*/

    :root {
        --font1: 'Heebo', sans-serif;
        --font2: 'Fira Sans Extra Condensed', sans-serif;
        --font3: 'Roboto', sans-serif;

        --btnbg: #ffcc00;
        --btnfontcolor: rgb(61, 61, 61);
        --btnfontcolorhover: rgb(255, 255, 255);
        --btnbghover: #ffc116;
        --btnactivefs: rgb(241, 195, 46);


        --label-index: #960796;
        --danger-index: #5bc257;
        /* PAGINATE */
        --link-color: #000;
        --link-color-hover: #fff;
        --bg-content-color: #ffcc00;

    }

    .container-fluid {
        max-width: 1400px;

    }

    .card {
        background: #fff;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        border: 0;
        border-radius: 1rem;
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: calc(1rem - 1px);
        border-top-right-radius: calc(1rem - 1px);
    }


    .card h5 {
        overflow: hidden;
        height: 55px;
        font-weight: 300;
        font-size: 1rem;
    }

    .card h5 a {
        color: black;
        text-decoration: none;
    }

    .card-img-top {
        width: 100%;
        min-height: 250px;
        max-height: 250px;
        object-fit: contain;
        /*padding: 30px;*/
    }

    .card h2 {
        font-size: 1rem;
    }


    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    /* Centered text */
    .label-top {
        position: absolute;
        background-color: var(--label-index);
        color: #fff;
        top: 8px;
        right: 8px;
        padding: 5px 10px 5px 10px;
        font-size: .7rem;
        font-weight: 600;
        border-radius: 3px;
        text-transform: uppercase;
    }

    .top-right {
        position: absolute;
        top: 24px;
        left: 24px;

        width: 90px;
        height: 90px;
        border-radius: 50%;
        font-size: 1rem;
        font-weight: 900;
        background: #8bc34a;
        line-height: 90px;
        text-align: center;
        color: white;
    }

    .top-right span {
        display: inline-block;
        vertical-align: middle;
        /* line-height: normal; */
        /* padding: 0 25px; */
    }

    .aff-link {
        /* text-decoration: overline; */
        font-weight: 500;
    }

    .over-bg {
        background: rgba(53, 53, 53, 0.85);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(0.0px);
        -webkit-backdrop-filter: blur(0.0px);
        border-radius: 10px;
    }

    .bold-btn {

        font-size: 1rem;
        font-weight: 500;
        text-transform: uppercase;
        padding: 5px 50px 5px 50px;
    }

    .box .btn {
        font-size: 1.5rem;
    }

    @media (max-width: 1025px) {
        .btn {
            padding: 5px 40px 5px 40px;
        }
    }

    @media (max-width: 250px) {
        .btn {
            padding: 5px 30px 5px 30px;
        }
    }

    /* START BUTTON */
    .btn-warning {
        background: var(--btnbg);
        color: var(--btnfontcolor);
        fill: #ffffff;
        border: none;
        text-decoration: none;
        outline: 0;
        /* box-shadow: -1px 6px 19px rgba(247, 129, 10, 0.25); */
        border-radius: 100px;
    }

    .btn-warning:hover {
        background: var(--btnbghover);
        color: var(--btnfontcolorhover);
        /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
    }

    .btn-check:focus + .btn-warning, .btn-warning:focus {
        background: var(--btnbghover);
        color: var(--btnfontcolorhover);
        /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
    }

    .btn-warning:active:focus {
        box-shadow: 0 0 0 0.25rem var(--btnactivefs);
    }

    .btn-warning:active {
        background: var(--btnbghover);
        color: var(--btnfontcolorhover);
        /* box-shadow: -1px 6px 13px rgba(255, 150, 43, 0.35); */
    }

    /* END BUTTON */

    .bg-success {
        font-size: 1rem;
        background-color: var(--btnbg) !important;
        color: var(--btnfontcolor) !important;
    }

    .bg-danger {
        font-size: 1rem;
    }


    .price-hp {
        font-size: 1rem;
        font-weight: 600;
        color: darkgray;
    }

    .amz-hp {
        font-size: .7rem;
        font-weight: 600;
        color: darkgray;
    }

    .fa-question-circle:before {
        /* content: "\f059"; */
        color: darkgray;
    }

    .fa-heart:before {
        color: crimson;
    }

    .fa-chevron-circle-right:before {
        color: darkgray;
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: none;
        overflow: auto;
        background-color: #000000;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 9999;
    }

    .modal-window {
        position: relative;
        background-color: #FFFFFF;
        width: 50%;
        margin: 10% auto;
        padding: 20px;
    }

    .modal-window.small {
        width: 75%;
    }

    .modal-window.large {
        width: 75%;
    }

    .close {
        position: absolute;
        top: 0;
        right: 0;
        color: rgba(0, 0, 0, 0.3);
        height: 30px;
        width: 30px;
        font-size: 30px;
        line-height: 30px;
        text-align: center;
    }

    .close:hover,
    .close:focus {
        color: #000000;
        cursor: pointer;
    }

    .open {
        display: block;
    }

    button {
        padding: 15px;
        font-size: 12px;
        background: #960796;
        color: #FFF;
        margin-left: 32px;
        border-block-style: none;
    }

    button:hover {
        background-color: black;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        transform: translateY(-7px);

    }

    button {
        width: 76%;
    }

    button.btn.btn-danger {
        width: auto;
    }

    .subheading {
        font-style: italic
    }

</style>

<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    @php
        $titles = $speaker->unique('title')->pluck('title');
    @endphp

    @foreach($titles as $title)
        <h2 class="font_2" style="font-size:65px; line-height:1.2em; text-align:center;">
            <span style="font-size:65px;">
                <span style="color:#701915;">
                    <span style="text-decoration:underline;">
                        <span style="font-family:adobe-caslon-w01-smbd,serif;">
                            {{ $title }}
                        </span>
                    </span>
                </span>
            </span>
        </h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
            @foreach($speaker->where('title', $title) as $r)
                <div class="col hp">
                    <div class="card h-100 shadow-sm">
                        <a href="#">
                            <img src="{{ asset('uploads/faculty/'.$r->image) }}" class="card-img-top"
                                 alt="{{ $r->name }}"/>
                        </a>

                        @if($r->country)
                            <div class="label-top shadow-sm">
                                <a class="text-white" href="#">{{$r->country}}</a>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-grid gap-2 my-4">
                                <button data-target="{{ $r->id }}" data-toggle="modal">{{ $r->name }}</button>
                            </div>
                            <div class="clearfix mb-1"></div>
                        </div>
                    </div>
                </div>

                <div id="{{ $r->id }}" class="modal">
                    <div class="modal-window">
                        <span class="close" data-dismiss="modal">&times;</span>
                        <h3>{{ $r->name }}</h3>
                        <div class="modal-footer">
                            <p>{{ $r->paragraph }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

<script>

    document.addEventListener('click', function (e) {
        e = e || window.event;
        var target = e.target || e.srcElement;

        if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'modal') {
            if (target.hasAttribute('data-target')) {
                var m_ID = target.getAttribute('data-target');
                document.getElementById(m_ID).classList.add('open');
                e.preventDefault();
            }
        }

        // Close modal window with 'data-dismiss' attribute or when the backdrop is clicked
        if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'modal') || target.classList.contains('modal')) {
            var modal = document.querySelector('[class="modal open"]');
            modal.classList.remove('open');
            e.preventDefault();
        }
    }, false);
</script>


<!-- Footer Section End -->
<script src="{{asset('frontend/faculty/vendor/purecounter/purecounter.js')}}"></script>
<script src="{{asset('frontend/faculty/vendor/aos/aos.js')}}"></script>
<script src="{{asset('frontend/faculty/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/faculty/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('frontend/faculty/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/faculty/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<!-- <script src= "https://adwcc.mrtech360.com/frontend/assets/vendor/php-email-form/validate.js"></script> -->

<!-- Template Main JS File -->
<script src="{{asset('frontend/faculty/js/main.js')}}"></script>


</main><!-- End #main -->

</body>

</html>
<script language='javascript'>
    if (window.opener == null) {
        window.opener = null;
        window.close();
        window.open('default.aspx', '', 'toolbar=no,menubar=no,location=no,status=no');
    }
</script>
@endsection
