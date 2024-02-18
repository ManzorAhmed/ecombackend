<style>
    @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    @import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");

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

{{--    <h2 class="text-center">International Speaker</h2>--}}

<h2 class="font_2" style="font-size:65px; line-height:1.2em; text-align:center;"><span style="font-size:65px;"><span
            style="color:#701915;"><span style="text-decoration:underline;"><span
                    style="font-family:adobe-caslon-w01-smbd,serif;">International Faculty</span></span></span></h2>

<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Afsaneh alavi.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">USA</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Afsaneh Alavi (USA)</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="First-model" data-toggle="modal">Prof.Afsaneh Alavi</button>

                    </div>
                    <div class="clearfix mb-1">


                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/hari2.jpg') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">Malaysia</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_3" data-toggle="modal">Prof. Harikrishna K. R. Nair
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Prof-kylie_sandy-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">Australia</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Kylie Sandy-Hodgetts</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_2." data-toggle="modal">Prof. Kylie Sandy-Hodgetts</button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/gary-sibbald-.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">CANADA</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. R. Gary Sibbald </h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_1" data-toggle="modal">Prof. R. Gary Sibbald</button>
                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Elizabeth_Ayello-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">USA</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Elizabeth A. Ayello</h2>--}}
                    {{--                        --}}{{--                            <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">
                        <button data-target="simpleModal_13" data-toggle="modal">Dr.Elizabeth A. Ayello</button>
                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>

        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Prof keith.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">UK</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Keith Harding </h2>--}}
                    {{--                        --}}{{--                            <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">
                        <button data-target="simpleModal_6" data-toggle="modal">Prof. Keith Harding</button>
                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/chabel__laurent-.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#"> Switzerland</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Mr. Laurent Chabal</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_2" data-toggle="modal">Mr. Laurent Chabal
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Mariam-Botros--.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">Canada</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Ms. Mariam Botros </h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_21" data-toggle="modal">Ms. Mariam Botros
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Dr._Shailesh_Ranade-.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">INDIA</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Dr. Shailesh Ranade</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_7" data-toggle="modal">Dr. Shailesh Ranade</button>
                    </div>
                    <div class="clearfix mb-1">


                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Terry-Swanson-.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">Australia</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Ms. Terry Swanson</h2>--}}
                    {{--                        --}}{{--                            <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">
                        <button data-target="simpleModal_8" data-toggle="modal">Ms. Terry Swanson</button>
                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Karen_Ousay-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">UK</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Ms. Karen Ousey</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_9" data-toggle="modal">Prof. Karen Ousey
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Johlen_sander-.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">South Africa</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof.Johlene Sander</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_10" data-toggle="modal">Prof.Johlene Sander
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Dr-Suhail-Chughtai-.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">UK</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Dr.Suhail Chughtai</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_11" data-toggle="modal">Dr.Suhail Chughtai</button>
                    </div>
                    <div class="clearfix mb-1">


                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/febe_bruwer-.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">South Africa</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Febe Bruwer</h2>--}}
                    {{--                        --}}{{--                            <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">
                        <button data-target="simpleModal_12" data-toggle="modal">Ms. Febe Bruwer</button>
                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Guido_CIPRANDI_.png') }}" class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">Italy</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof Guido Ciprandi</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_5" data-toggle="modal">Prof Guido Ciprandi</button>
                    </div>
                    <div class="clearfix mb-1">


                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/bharat-kotru-_-.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

                <div class="label-top shadow-sm">
                    <a class="text-white" href="#">INDIA</a>
                </div>
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Dr. Bharat Kotru</h2>--}}
                    {{--                        --}}{{--                            <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">
                        <button data-target="simpleModal_14" data-toggle="modal">Dr. Bharat Kotru</button>
                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="font_2" style="font-size:65px; line-height:1.2em; text-align:center;"><span style="font-size:65px;"><span
            style="color:#701915;"><span style="text-decoration:underline;"><span
                    style="font-family:adobe-caslon-w01-smbd,serif;">Regional Faculty</span></span></span></h2>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Hiske_Smart_-_photo_new__1_-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">Bahrain</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Afsaneh Alavi (USA)</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_16" data-toggle="modal">Ms.Hiske Smart</button>

                    </div>
                    <div class="clearfix mb-1">


                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Huda_Al_Dubaib-.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">Kuwait</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Afsaneh Alavi (USA)</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_24" data-toggle="modal">Dr. Huda Aldhubaib

                        </button>

                    </div>
                    <div class="clearfix mb-1">


                    </div>
                </div>
            </div>
        </div>

        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Mr. Mousa Asiri.jpg') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">KSA</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_22" data-toggle="modal">Mr. Mousa Asiri
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Kommu_Ruth_Mary.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">KSA</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_23" data-toggle="modal">Ms Ruth Mary Aruna
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/eseya__1_-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">KSA</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_25" data-toggle="modal">Ms. Eseya Abbas
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Kodange_Chaitany.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">BAHRAIN</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_26" data-toggle="modal">Dr. Chaitanya Kodange
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Hani_Badahdah-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">KSA</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_17" data-toggle="modal">Dr. Hani Mohammed Badahdah
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Local faculty--}}
<h2 class="font_2" style="font-size:65px; line-height:1.2em; text-align:center;"><span style="font-size:65px;"><span
            style="color:#701915;"><span style="text-decoration:underline;"><span
                    style="font-family:adobe-caslon-w01-smbd,serif;">Local Faculty</span></span></span></h2>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Jassin-.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Afsaneh Alavi (USA)</h2>--}}
                    {{--                        --}}{{--                            <p>Do not miss anything topic about the event</p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_18" data-toggle="modal">Dr. jasin Hamed</button>

                    </div>
                    <div class="clearfix mb-1">


                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/AMIN_EL_TAHIR.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_19" data-toggle="modal">Dr.Amin El Tahir
                        </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>

        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Abbas__1_-.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_20" data-toggle="modal">Mr. Abbas Abdul Hassan</button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/dr-francesco- serino-2021.jpg') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">

                    {{--                    <div class="section-title">--}}
                    {{--                        <h2>Prof. Harikrishna K. R. Nair </h2>--}}
                    {{--                        <p>{{ get_static_option('speaker_heading_one') }} </p>--}}
                    {{--                    </div>--}}
                    {{--                        <h5 class="card-title">--}}
                    {{--                            <a target="_blank" href="#">ASUS TUF FX505DT Gaming Laptop- 15.6", 120Hz Full HD, AMD Ryzen--}}
                    {{--                                5 R5-3550H Processor, GeForce GTX 1650 Graphics, 8GB DDR4, 256GB PCIe SSD, RGB Keyboard,--}}
                    {{--                                Windows 10 64-bit - FX505DT-AH51</a>--}}
                    {{--                        </h5>--}}

                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_27" data-toggle="modal">Dr. Francesco Serino</button>
                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">

{{--        <div class="col hp">--}}
{{--            <div class="card h-100 shadow-sm">--}}
{{--                <a href="#">--}}
{{--                    <img src="{{ asset('frontend/img/speaker/Ms ayesha.png') }}"--}}
{{--                         class="card-img-top"--}}
{{--                         alt="product.title"/>--}}
{{--                </a>--}}

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="d-grid gap-2 my-4">--}}

{{--                        <button data-target="simpleModal_28" data-toggle="modal">Ms. Aysha Ali Al Mahri </button>--}}

{{--                    </div>--}}
{{--                    <div class="clearfix mb-1">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/Dr kavita sangatwadia.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">
                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_29" data-toggle="modal">Dr. Kavita Singatwadiai</button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/prudhomme-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">
                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_30" data-toggle="modal">Dr. Golnar Prudhomme</button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/ruth_choudhry-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">
                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_31" data-toggle="modal">Dr. Elizabeth Ruth Choudhry</button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col hp">
            <div class="card h-100 shadow-sm">
                <a href="#">
                    <img src="{{ asset('frontend/img/speaker/baguneid-1-removebg-preview.png') }}"
                         class="card-img-top"
                         alt="product.title"/>
                </a>

{{--                <div class="label-top shadow-sm">--}}
{{--                    <a class="text-white" href="#">UAE</a>--}}
{{--                </div>--}}
                <div class="card-body">
                    <div class="d-grid gap-2 my-4">

                        <button data-target="simpleModal_32" data-toggle="modal">Prof. Mohamed Baguneid </button>

                    </div>
                    <div class="clearfix mb-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-trasparent my-4 p-3" style="position: relative">
    <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">



    </div>
</div>





<div id="simpleModal_1" class="modal">
    <div class="modal-window">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>R. Gary Sibbald </h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Dr. R. Gary Sibbald BSc, MD FRCPC (Med, Derm), MACP, FAAD, MEd, FAPWCA, D.Sc. (Hons)
        Dr Sibbald is a dermatologist and internist with a special interest in wound care and education. He is a
        professor of Medicine and Public Health at the University of Toronto and an international wound care key
        opinion leader (educator, clinician and clinical researcher). Dr Sibbald is co-founder of the Canadian
        Association of Wound Care (1995), chairperson (1995-2000) and was the former Director of the Wound
        Healing Clinic, Women’s College Hospital (1994-2009). He is also a previous president of the World Union
        of Wound Healing Societies (2008 – 2012). In 1999 he co-developed the International Interprofessional
        Wound Care Course and has been the director for 40 courses worldwide. Professor Sibbald received the
        Queen Elizabeth II Diamond Jubilee medal in 2013 and Honorary Doctor of Science from Excelsior College
        in 2014. Investigator, Institute for Better Health at Trillium Health Partners. Currently he is the
        project ECHO lead (2018) for Ontario Skin and Wound to develop interprofessional teams for all 14
        Ontario Local Integrated Health Networks. He has over 200 publications and is co-editor and chapter
        author of the Chronic Wound Care 5 textbook. Currently he is the Co-editor in chief of Advances in Skin
        & Wound Care.</p>
    <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
<div id="simpleModal_2" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Mr. Laurent Chabal</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Laurent Chabal was the Vice-President of the Swiss Association for Woundcare (SAfW). Currently, he is the
        acting Vice-President of WCET™. He is also acting Chairperson in WCET™ Publications & Communications
        since 2014. He completed his University Degree in Cell Biology and Physiology from Paris in 1989, Nurse
        Diploma from Geneva in 1995. He received specialized certificate in Oncology and Palliative care from
        Geneva in1997, University Diploma of Wound care from Paris in 2003 and Clinic Certificate of
        Stomatherapy (ETNEP) from Bordeaux in2005. He was presently serving as Nurse in Morges’ Hospital since
        1995 and has experience in internal Medicine, Oncology and Pain control care, as Stoma therapist Nurse
        since 2003 in the EHC, Morges and scientific collaborator in HEdS, Geneva from 2009-2012.</p>
    since 2003 in the EHC, Morges and scientific collaborator in HEdS, Geneva from 2009-2012.</p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>

</div>
<div id="simpleModal_5" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Prof. Guido Ciprandi</h3>
        <div class="modal-footer"
        ">
    </div>

    <p>GUIDO CIPRANDI is PEDIATRIC and PLASTIC SURGEON at Bambino Gesu’ Children’s Hospital in Rome, Italy and
        MANAGING DIRECTOR for ULCERS, BURNS and COMPLEX PEDIATRIC WOUNDS
        He’s PROFESSOR OF SURGERY and WOUND CARE at the UNIVERSITIES of ROME, FLORENCE and MILAN,
        FOUNDING PRESIDENT for the ISPeW, International Society for Pediatric Wound Care, TRUSTEES and MEMBER of the
        SCIENTIFIC COMMITTEE in EPUAP
        Appointed OPBG 2020 INNOVATIVE AWARD and EPUAP 2022 EXPERIENCED INVESTIGATOR AWARD
        He’s AUTHOR of more than 100 PUBLICATIONS and of the first NEONATAL and PEDIATRIC WOUND CARE BOOK
    </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>

</div>

<div id="simpleModal_3" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Prof. Harikrishna K. R. Nair</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>PROFESSOR DR. HARIKRISHNA K.R.NAIR S.I.S KMN
        MD, FRCPI FCWCS OSH(NIOSH),OHD(DOH),CMIA(MAL) ,CHM(USA)
        ESWT(Austria, Germany) FMSWCP, ICW (Germany)
        PG in Wound Healing and Tissue Repair (Cardiff, UK)
        CHAIRMAN WOUNDS MALAYSIA,
        Head, Wound Care Unit , Dept. of Internal Medicine , Kuala Lumpur Hospital, Malaysia
        Chairman, ASEAN Wound Council
        National Advisor Primary Health, Ministry of Health Malaysia
        Adjunct Professor, Dept of Surgery, Institute of Medical Sciences, Banares Hindu University, INDIA
        Professor, Institute of Health Management, Austria
        Associate Professor of Research, Perdana University, Malaysia
        Chairman, Pressure Injury Prevention Committee, Kuala Lumpur Hospital
        Founding President, Malaysian Society of Wound Care Professionals,
        Vice President of the Asian Wound Care Association AWCA
        Member of the Board of the International Biotherapy Society,
        President Elect of the Asia Pacific Association on Diabetic Limb Problems
        Member of the National Technical Committee on Wound Care MOH
        Editor in Chief, Wounds Asia Journal and the JWC Silk Road Supplement
        Board member of the Journal of Wound Care UK,
        Member of the EWMA International Partner Organisation Board,
        Faculty member of the National Diabetic Institute (NADI) and Chairman DCOM
        Country Representative of D-Foot International
        One of the recipients of the WHO DR.LEE JON WOK MEMORIAL award 2018.</p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>


<div id="simpleModal_21" class="modal">
    <div class="modal-window">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Ms. Mariam Botros (Canada)</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Mariam is a clinician, educator and health leader.
        As CEO of Wounds Canada, Mariam is responsible for both the strategic direction and day-to-day
        operations of the organization. She is a chiropodist and diabetes educator and completed a Master’s
        in
        Educational Leadership degree. Mariam has also published, developed and lectured in multiple
        programs
        both nationally and internationally in the area of diabetic foot complications and amputation
        prevention. Through her different roles as an executive director, health-care practitioner and
        educator,
        researcher and faculty member for many well-recognized organizations, Mariam has extensive practical
        and
        professional experience. As a health leader Mariam is collaborative, creative, empathetic and
        persistent.</p>
    <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
<div id="simpleModal_2." class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Prof. Kylie Sandy-Hodgetts</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Director Skin Integrity Research Institute (SKINRI), UWA Senior Research Fellow, School of Biomedical
        Sciences, Burn Injury Research Unit, University of Western Australia Founder and President, International
        Surgical Wound Complications Advisory Panel (ISWCAP) (global NFP) Australian National Lead, Australian
        Health Research Alliance Wound Initiative (Federal Gov); surgical wound complications advisory panel Past
        Chair, Board Wounds Australia (2017-2019) (NFP) Inaugural Deputy Chair, Board Wounds Australia (2016-2017)
        International Committee Board Member, World Union of Wound Healing Societies (2015-present) Council Member
        European Wound Management (EWMA) (2015-2018) Board Member EWMA Cooperating Organisations (2015-2018) Board
        Member, Institute of Skin Infection and Prevention, University of Huddersfield Honorary Senior Lecturer,
        Cardiff University Dr Sandy-Hodgetts is a Senior Research Fellow, Clinical trialist and Chief Investigator
        of a programme of research into early identification and prevention of surgical wound complications. Dr
        Sandy-Hodgetts research programme is multi-centred and is conducted across national and international
        healthcare settings. The programme of research conducted at the Skin Integrity Research Institute (SKINRI)
        comprises Phase I-IV clinical trials with bedside translation and validation of research findings. She has
        recently founded the International Surgical Wound Complications Advisory Panel (ISWCAP), a global not for
        profit organisation to raise awareness of the early identification and prevention of surgical wound
        complications around the globe. As the founder of ISWACP, she has established a panel of directors that span
        the Asia-Pacific Rim, Australasia, Canada, Europe, UK, India, Africa and the US to drive change in research
        and clinical practice in surgical wound healing. Dr Sandy-Hodgetts co-chaired the WUWHS International
        Consensus document; surgical wound dehiscence improving prevention and outcomes, launched in 2017, as a
        result of her doctoral research. She has since co-authored two other consensus documents in the surgical
        wound healing field and has participated as invited expert reviewer for over 4 international clinical
        guidelines. She has over 20 peer-reviewed publications as first author and is an editorial board member for
        the Journal of Wound Care and is a regular peer reviewer for BMJ Open, JWC, IWJ. Dr Sandy-Hodgetts was
        recognised for her contribution to the field of wound healing research in 2018 as the recipient of the
        Journal of Wound Care Best Clinical Research 2018 Award, an international peer reviewed award as well as
        second placing for Innovation in Surgical Site Infection 2019. More recently, she has lead the development
        of the ISWCAP Best Practice Statement on early identification and prevention of surgical wound
        complications, launched in March 2020 and currently being translated into Spanish and Portuguese.</p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>

</div>
<div id="First-model" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Prof. Afsaneh Alavi (USA)</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Dr. Alavi is a dermatologist at Mayo clinic in Rochester Minnesota. Dr. Alavi completed her residency in
        dermatology, a 2-year fellowship in Wound Healing and a Master’s of Science in Community Health at the
        University of Toronto.Her wound care journey started from IIWCC course in Toronto in 2004-2005. She served
        as the Director of the Wound Healing Fellowship at University of Toronto 2014-2020 and was running a
        sub-specialty HS and PG clinic in Toronto. She is currently a senior consultant and the medical director of
        clinical trial unit at department of dermatology at Mayo clinic in Rochester , Minnesota, United states .
        Her research interests include wound healing with focus on inflammatory wounds such as hidradenitis
        suppurativa, and pyoderma gangrenosum. Dr. Alavi has received multiple awards including the Practitioner of
        the Year Award from the Canadian Dermatology Association in 2017, and the Hidradenitis Suppurativa Award for
        HSF foundation in recognition of her work in HS (2019). She has been Principle Investigator on more than 50
        clinical trials and has published extensively in peer-reviewed journals.</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>

</div>

<div id="simpleModal_6" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Prof. Keith Harding</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Professor Harding has had a longstanding interest in wound healing. He was appointed as the first
        Director of the Wound Healing Research Unit in 1991. From September 2013 to December 2018 he was Dean of
        Clinical Innovation at Cardiff University and in 2014 was appointed as Medical Director of the Welsh
        Wound Innovation Centre. His clinical practice is exclusively focused on treating patients with wound
        healing problems with a wide range of aetiologies. He holds external professorial appointments at
        universities in the UK, Australia and Singapore. He has authored over 350 publications in the field of
        wound healing and has written a number of chapters and books in this area. He is the Editor-in-Chief of
        the International Wound Journal. He was awarded the CBE in the New Year Honours list in January 2013 for
        Services to Medicine and Health Care. In 2013 he was awarded £4.2 million to set up the Welsh Wound
        Innovation Initiative part of which has enabled the setting up of the first Wound Healing Centre in the
        World. In 2014 he was awarded The Learned Society of Wales Fellowship. In 2018 he, with others, was
        awarded a £24 million European grant to establish a Clinical Innovation ecosystem across South Wales. In
        2018 he was appointed as a Senior Clinical Research Director at the A Star Institute in Singapore and is
        part of a SG$28 million wound programme grant.</p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>

</div>
</div>
</div>
<div id="simpleModal_7" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Shailesh Ranade</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Place Content Here</p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>

<div id="simpleModal_8" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Ms. Terry Swanson</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Terry Swanson completed her undergraduate nursing studies in the USA before immigrating to Australia in 1988.
        She was endorsed in 2004 as one of the first Nurse Practitioners in her state and specialty of wound
        management in Australia. Terry was admitted as a Fellow of the Australian Wound Management Association in
        2010 for her significant contribution to wound management at a state, national and international level. She
        is the current Vice Chair of the International Wound Infection Institute (IWII) and chaired the development
        and publication of the 2016 IWII Consensus Document Update on Wound Infection. Terry served as the Chair of
        IWII from 2012 until 2015.

        Terry has published and presented on chronic wounds and wound infection nationally and internationally. As
        co- editor and author, Terry led the team to publish the book Wound Management for the Advanced Practitioner
        in 2014. Terry was the Scientific Chair of the 2018 Wounds Australia National Conference and has held
        positions of responsibility of various nursing and wound related boards locally, nationally and
        internationally.</p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>

<div id="simpleModal_9" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Ms. Karen Ousey</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Karen is Professor and Director for the Institute of Skin Integrity and Infection Prevention, University of
        Huddersfield. She is Visiting Professor, Queensland University of Technology, Brisbane, Australia, Royal College
        of Surgeons, Dublin and Swinburne University of Technology, Melbourne, Australia. She is elected chair of the
        International Wound Infection Institute (IWII) and President Elect for the International Skin Tears Advisory
        Panel (ISTAP).

        Her research interests focus on skin integrity, infection prevention, management of surgical site complications
        and improving access to education for all health care professionals and service users. She is widely published
        and has edited 2 text books
        <a href="https://www.futurelearn.com/courses/antimicrobial-stewardship-in-wound-management">antimicrobial-stewardship-in-wound-management</a>
    </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_10" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Prof. Johlene Sander</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Johlene continued her nursing education by doing a Post-basic Diploma in Midwifery and a Postgraduate Diploma
        Nursing Administration at University of Stellenbosch The Holistic Wound Management Course at University of Free
        State, and Interdisciplinary International Wound Care Course (University of Toronto).
        She is currently appointed as The Wound Care Practitioner at 2 Military Hospital, Cape Town, South Africa. She
        commissioned the new wound care clinic and is consulting patients in need of advanced care on a daily basis. She
        also performs duties as a Military Nurse (e.g. deployment to operational areas). She is part of the Executive
        Board of the Wound Healing Association of Southern Africa (WHASA) and elected as the International
        Representative for WHASA
    </p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_11" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr.Suhail Chughtai</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Dr SUHAIL CHUGHTAI FRCS QUALIFICATIONS Fellowship in Surgery, Royal College of Physicians & Surgeons, Glasgow
        Microsoft Certified Specialist (USA) Certified in e-Health – Sydney University, Australia Fellow of Faclty
        of Forensic and Legal Medicine, UK
        In progress: Masters in e-Health Management & Telemedicine – University of Rome, Italy Certification in
        Computer Science – Harvard Medical School, USA PROFESSIONALS ROLES Orthopaedic Surgeon & Medico.legal
        Examiner, Harley Street, London International Telehealth Expert, Telemedicine Software Designer/Instructor
        Lead Faculty of Health Informatics & Telehealth, Univ of Health Sciences, Pakistan Founding Chairman:
        Medical City Online, London, UK (Telehealth Software and Consulting Firm) M L Professionals, London, UK
        (Business Award Winning Medico Legal Examination Firm) Director Digital Health & Telemedicine for:

    <ul>Association of Pak Physicians & Surgeons UK
        <ul>
            <ul>Conservative Friends of NHS UK</ul>
            <ul>Adam Global Healthcare Division, UAE</ul>
            Chairman: Pan Arab Telemedicine & Artificial Intelligence Conference 2019, UAE International Ambassador:
            Patientory Association, Atlanta, USA (Healthcare Blockchain Firm) AWARDS & RECOGNITION Awards &
            Recognition
            for Setting up Telemedicine Helpline in Fight against Covid19 Pandemic
            Foreign Minister Honours, by Govt of Pakistan
            Governor Punjab Honours, Pakistan
            British Pakistani Foundation, UK
            Association of Pakistani Physician & Surgeons, UK
            University of Health Sciences, Pakistan
            Ravians Society, GC University, Pakistan
            Alumni Allama Iqbal Medical College, UK
            Changing Lives of People through Telemedicine – By World Peace & Prosperity Foundation, UK Commonwealth
            Award for Innovative Software for Telemedicine and Online Education Innovation in Telemedicine Software
            – By
            APPNA (USA) White Swan Award – For Creation of Digital TVapex for multi-cultural harmony in UK
            </p>
            <div class="modal-footer"
            ">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_12" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Febe Bruwer</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Febe Bruwer is a Registered Nurse, Nurse Specialist (B. Cur, MSocSci, MSc, IIWCC).
        She has been the owner of Nianwi Health Care, a wound care and wellness clinic in Johannesburg, South
        Africa, from 2001 to date.
         
        Febe holds two master’s degrees and is currently enrolled as a PhD candidate at the University of the Free
        State in South Africa. She is the current President of the Wound Healing Association of Southern Africa
        (WHASA) and is involved in developing an accreditation system for wound care practitioners in South Africa.
        She has extensive post-basic training and research experience and is currently engaged in several research
        projects and product development.
         
        Febe is regarded as a key opinion leader in wound management and is passionate about standardisation and
        wound management education. She has several publications in peer-reviewed journals like Advances in Skin and
        Wound care, Wounds International and Wound Healing SA.
         
        Febe loves training and education, sharing knowledge and empowering Nurses to be the best they can be. She
        strives to live by the motto “Do the best you can until you know better, then do better” Maya Angelo.
    </p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_13" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>DR. Elizabeth A. Ayello</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Elizabeth A. Ayello, PhD, MS, BSN, ETN, RN, CWON, MAPWCA, FAAN is a board certified wound and ostomy nurse
        from New York USA, who is Internationally known as an educator, researcher, clinician, prolific author,
        editor, and mentor. Dr. Ayello is a Co-Editor in Chief for the journal Advances in Skin and Wound Care,
        President of Ayello Harris and Associates Inc., President of the World Council of Enterostomal Therapists
        (WCET) 2018-2022, Faculty Emerita Excelsior College School of Nursing , Faculty at the International
        Interprofessional Wound Care Course (IIWCC) in Toronto and Abu Dhabi and Founder/Director of the WoundPedia
        Basic and Intermediate courses in Manila, the Philippines. A past president of the National Pressure Injury
        Advisory Panel and member of the MDRPI working group for the 2019 EPUAP NPIAP PPPIA Pressure Injury
        International Guideline, Dr. Ayello and has over 200 peer-reviewed journal articles, is co-author/co-editor
        of two wound care books – Wound Care Essentials Practice Principles 5th edition, Pocket Guide to Pressure
        Ulcers 4th edition, as well as the WCET® International Ostomy Guideline 1st and 2nd editions, and the WCET®
        Pocket Guides on Ostomy Complications and Stoma Siting.
    </p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_14" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Bharat Kotru</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Bharat Kotru is a Podiatrist, Wound Care Specialist and Head of Department of Podiatry and Wound care at Max
        Hospital. He has done his Podiatry from Uk. He pursued International Interprofessional wound care course
        (IIWCC) University of Toronto (Canada) in 2015 at the end of course he was awarded with IIWCC best Selective
        award on ‘’Effect of intensive Education and selfcare on wound healing trajectory”. He has done MSc Clinical
        Skin integrity and wound Management from University of Hertfordshire (UK). He has Done Diabetic Foot
        Foundation Course from Michener, Ontario. He has completed his PhD on diabetes and its complications, he
        also attained training at Amrita Institute of Medical Sciences in Department of Podiatry on Diabetic foot,
        He is presently faculty of IIWCC, University of Toronto and Faculty for Project ‘’TAAC’’ Ethiopia besides
        this he attained various International and National certificate courses on Diabetic foot and Diabetes. He
        has got various publications in National and International journals. He is first Podiatrist in Punjab region
        to convert his practice to Biomechanics and Orthotic therapy. He worked on research Project of Indian
        Council of Medical Research (ICMR) in collaboration with WHO on “Hypertension & Diabetes. He works in
        collaboration with other healthcare professionals to bring the highest level of assessment, management and
        treatment of lower limb pathology and develop the cost effective orthotic and offloading devices along with
        foot Examination tools for developing countries.
    </p>
    <div class="modal-footer"
    ">

    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>

<!-- Regional Faculty -->
<div id="simpleModal_16" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Ms. Hiske Smart</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Hiske Smart is a clinical nurse specialist working in the Kingdom of Bahrain at the King Hamad University
        Hospital. She is responsible for hospital wide skin injury prevention and managing the ambulatory Wound care
        and Hyperbaric oxygen therapy unit. She completed her nursing studies in South Africa to Master’s degree
        level, where after she specialized in advanced wound care with a Postgraduate Diploma in Wound Healing and
        Tissue Repair at the University of Cardiff (UK) in 1999 followed by the International Interprofessional
        Wound Care course at the University of Toronto (Canada) in 2008. She received the Campbell MacFarlane award
        from the South African Undersea and Hyperbaric Medical Association in 2010 for her role in combining
        hyperbaric oxygen therapy into the interprofessional clinical wound care domain. She also received the
        University of the Free State (RSA) Alumni award in 2014 for advancing the field of nursing on an
        international level. A life time achievement award from WHASA was awarded in 2018 for her work in advancing
        wound care in Southern Africa. She is teaching faculty for the International Interprofessional Wound Care
        Course in Toronto and Abu Dhabi and the mother of two awesome daughters, Jansie and Sally Anne, the biggest
        gift of her life.</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_17" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Hani Mohammed Badahdah</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Dr. Hani Mohammed Badahdah</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_18" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Jasin Hamed</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Dr. Jassin Hamed, Consultant – Internal Medicine, has over 30 years of experience across various fields of
        medicine in UAE, UK and Germany. He completed his Medical Degree from the University of Hamburg, Germany in
        1991. He was granted Facharzt in Internal Medicine by Medical Association of Schleswig- Holstein, Germany in
        2006. Additionally, he has also completed the International Inter-professional Wound Care Course from the
        University of Toronto, Canada and several other certification courses in Diabetology, Emergency Medicine and
        Nutritional Medicine.
        He worked as Head of Wound Care and Senior Consultant at Sheikh Khalifa Medical City, Abu Dhabi and with Burjeel
        Hospital as Senior Consultant Internal Medicine. He took charge of Medical Director of a specialized
        Rehabilitation Center in Abu Dhabi as well. In Germany, he worked with Paracelsus Klinik, Henstedt-Ulzburg,
        Schleswig-Holstein as Consultant Internal Medicine. Dr. Jassin has been an active academician and worked as
        Adjunct Assistant Professor at UAE University, College of Medicine and Health Science, Abu Dhabi.
    </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_19" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr.Amin El Tahir</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Content place Here</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_20" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Mr. Abbas Abdul Hassan </h3>
        <div class="modal-footer"
        ">

    </div>
    <p>He is the Manager of Clinical Performance team in Nursing Department at Sheikh Khalifa Medical City (SKMC)
        with years of experience in Healthcare. Seven of these years are in senior position in healthcare quality
        and 11 years in healthcare administration. He is treasurer of IWCG for Past 6 years. He is a JCIA expert,
        EFQM, OSHAD lead auditor. He is a Public Health PhD student, Master Degree Quality Management (MQM), Master
        Degree in Clinical Psychology (MsPsy). He is an American Board of Medical Quality (CMQ) holder, Certified
        Professional in Healthcare Quality (CPHQ), Six Sigma Black Belt Certified (SSBBC) from American Association
        of Quality (ASQ) and a Project Management Professional (PMP). He is a data management specialist, part of
        SEHA’s NIHQM (National Inpatient Hospital Quality Measures) implementation and part of SKMC NDNQI (National
        Database for Nursing Quality Indicators) team that has established and maintained this initiative as the
        first hospital in the UAE. He spoke in, participated and led planning for multiple international
        conferences. He has created and delivered several healthcare quality courses for internationally accredited
        universities and centers in UAE, USA, and UK. He has conducted and participated and published several
        research studies and educational booklets and guidelines.</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>

</div>
<div id="simpleModal_22" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Mr. Mousa Asiri </h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Director, IIWCG KSA
        Wound Care PSMMC
        Wound and Skin Management
        KSA</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_23" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Ms Ruth Mary Aruna </h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Director IIWCG KSA
        Senior Clinical Specialist ,Wound & Ostomy at King Faisal Specialist Hospital and Research Centre </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_24" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Huda Aldhubaib</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Director, IIWCG Kuwait
        General Surgeon and
        Diabetic Foot Specialist
        Working Committee </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_25" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Ms. Eseya Abbas</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Director IIWCG KSA
        Senior Clinical Specialist ,Wound &
        Ostomy KSA </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_26" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Chaitanya Kodange
        </h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Scientific & Ethic Member IIWCG

        Consultant in Hyperbaric OxygenTherapy for Wound Healing Unit King Hamad University Hospital Kingdom of
        Bahrain </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_27" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Francesco Serino</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Dr. Francesco Serino, MD, is a Staff Physician in the Heart and Vascular Institute at Cleveland Clinic Abu Dhabi.

        Prior to joining Cleveland Clinic Abu Dhabi, Dr. Serino held multiple roles at the Istituto Dermopatico
        Immacolata IRCCS, Rome, Italy, where he also established and later directed the Endovascular Program. The
        program pioneered several procedures, including aortic endograft surgery, hybrid endo bypass surgery and gene
        therapy. The center also performed the first AneuRX graft implant in the country and launched the first clinical
        research program on therapeutic angiogenesis. He also set up one of the most active centers for diabetic foot
        revascularization and limb salvage, performing innovative techniques, such as laser endarterectomy, absorbable
        stent technology and crioplasty.

        While working at Istituto Dermopatico Immacolata IRCCS, Dr. Serino performed more than 3,000 vascular
        interventions, served as Site Principal Investigator of twelve clinical research projects, completed 212
        publications and presented as faculty in 128 national or international medical meetings.

        He also held roles as an Assistant Professor and Associate Consultant at the Catholic University Hospital, Rome.
        During his time serving at the Catholic University Hospital, Dr. Serino started one of the first diabetic foot
        surgery programs in Italy and the first endovascular program in Rome.

        Dr. Serino graduated with honors from the Catholic University School of Medicine, Rome, Italy and completed his
        residency in General Surgery at the Università La Sapienza. </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_28" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Ms. Aysha Ali Al Mahri</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Group Nursing & Allied Health Director
        SSMC
        Abu Dhabi – UAE </p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>

</div>
<div id="simpleModal_29" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Kavita Singatwadiai</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Place Content here</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_30" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Golnar Prudhomme</h3>
        <div class="modal-footer"
        ">

    </div>
    <p>Associate Physician/ Podiatrist
        Heart and Vascular Institute – Cleveland Clinic
        Abu Dhabi – UAE</p>
    <div class="modal-footer"
    ">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_31" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>Dr. Elizabeth Ruth Choudhry</h3>
        <div class="modal-footer"">
    </div>
    <p>Senior Podiatrist
        SSMC Hospital
        Abu Dhabi – UAE</p>
    <div class="modal-footer"">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
<div id="simpleModal_32" class="modal">
    <div class="modal-window small">
        <span class="close" data-dismiss="modal">&times;</span>
        <h3>
            Prof. Mohamed Baguneid</h3>
        <div class="modal-footer"">
    </div>
    <p>Chair of Surgical Institute,
        Al Ain Hospital, UAE</p>
    <div class="modal-footer"">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
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



