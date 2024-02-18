@php
    $conference_flyer=\App\Models\ConferenceFlyer::get();
@endphp
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Flyers</title>
    <style>
        /* Common styles for all screen sizes */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        h3 {
            color: rgb(42, 92, 255);
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            /*margin-right: 293px;*/
            margin-left: 240px;
            line-height: 26.4px;
        }

        .content-title {
            color: rgb(156, 0, 0);
            text-align: left;
            margin-left: 145px;
            font-size: 24px;
            font-weight: 900;
        }

        /* Add font-face here */

        @font-face {
            font-family: 'CustomFontRegular';
            src: url('../fonts/Avenir Light.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /* If your font includes both regular and bold variants in the same file, you don't need a separate @font-face for bold */

        p, .content-text {
            font-family: 'CustomFontRegular', Avenir Light, sans-serif; /* Use the correct font-family name */
            font-size: 23px;
            color: #701915;
            font-style: normal;
            font-variant: normal;
            line-height: 1.5em;
            text-align: justify;
            letter-spacing: 0.05em;
            text-decoration-thickness: 3px;
        }

        .content-detail {
            display: flex;
            text-align: justify;
        }

        .btn-reg {
            background-color: #ff0202;
            color: white;
            border: none;
            border-radius: 25px;
            padding-block: 12px;
            cursor: pointer;
        }

        .btn {
            background-color: #ff0202;
            color: white;
            border: none;
            font-size: 14px;
            font-weight: bold;
            padding-block: 15px;
        }

        .btn:hover {
            background-color: #074389;
            color: white;
            border: none;
            float-displace: block;
            font-size: 14px;
            transition: margin 0.2s ease-in-out;
            padding-block: 15px;
        }

        .content-description-red {
            color: #ff0202;
            text-align: center;
            font-size: 12px;
        }

        .content-members {
            font-size: 18px;
            text-align: justify;
        }

        .col-md-3 {
            flex-basis: calc(100% / 4);
            box-sizing: border-box;
            padding: 10px;
        }

        .col-md-4 {
            flex-basis: calc(100% / 3);
            box-sizing: border-box;
            padding: 10px;
            text-align: center;
        }

        .img-layout {
            max-width: 100%; /* The image will resize based on its container's width */
        }

        .carousel-caption {
            position: absolute;
            color: #fff;
            text-align: center; /* Center the text inside the caption */
        }

        .image-container {
            text-align: center;
            background-color: red; /* Add a background color to the container for debugging */
        }

        .full-width-image {
            width: 100%;
            max-width: 100%;
            height: auto;
            border: 2px solid blue; /* Add a border to the image for debugging */
        }

        /* Responsive adjustments */
        /* Desktop styles */
        @media (min-width: 1500px ) {
            .row {
                display: flex;
                flex-wrap: wrap;
                margin-right: 60px; /* Adjust the right margin for mobile */
                margin-left: 60px; /* Adjust the left margin for mobile */
            }

            .signature {
                margin-left: 193px; /* Reset the left margin for mobile */
            }

            .sign {
                max-width: 100px; /* Adjust the size of the signature image for mobile */
                left: 0; /* Reset the left position for mobile */
            }
        }

        @media (min-width: 1200px) {
            .jumbotron {
                padding: 1rem 11rem;
            }

            .carousel-item {
                display: flex;
                justify-content: center; /* Horizontally center the content */
                align-items: center; /* Vertically center the content */
                margin-left: 99px;
                margin-right: 99px;
            }

            .carousel-caption {
                position: absolute;
                color: #fff;
                text-align: center;
                margin-left: 195px;
            }

            .text-center {
                text-align: center;
            }

            .img-layout {
                max-width: 100%;
            }

            .main-heading {
                font-size: 30px;
                margin: 10px;
            }

            .collaboration-text {
                font-size: 10px;
            }

            .sub-heading {
                font-size: 30px;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                margin-right: 20px; /* Adjust the right margin for mobile */
                margin-left: 20px; /* Adjust the left margin for mobile */
            }

            hr {
                border: none;
                height: 2px;
                background-color: rgb(42, 92, 255);
                margin-left: 192px;
                margin-right: 184px;
            }

            .signature {
                margin-left: 193px; /* Reset the left margin for mobile */
            }

            .sign {
                max-width: 100px; /* Adjust the size of the signature image for mobile */
                left: 0; /* Reset the left position for mobile */
            }
        }


        /* Tablet styles */
        @media (min-width: 768px) and (max-width: 1199px) {
            .jumbotron {
                padding: 1rem 2rem;
            }

            .carousel-item {
                display: flex;
                justify-content: center; /* Horizontally center the content */
                align-items: center; /* Vertically center the content */
                /*margin-left: 99px;*/
                /*margin-right: 75px;*/
            }

            .text-center {
                text-align: center;
            }

            .img-layout {
                max-width: 100%;
            }

            .main-heading {
                font-size: 23px;
            }

            .collaboration-text {
                font-size: 10px;
            }

            .sub-heading {
                font-size: 23px;
            }

            hr {
                border: none;
                height: 2px;
                background-color: rgb(42, 92, 255);
                margin-left: 192px;
                margin-right: 184px;
            }

            .signature {
                margin-left: 193px; /* Reset the left margin for mobile */
            }

            .sign {
                max-width: 100px; /* Adjust the size of the signature image for mobile */
                left: 0; /* Reset the left position for mobile */
            }

            .btn {
                font-size: 10px;
                padding-block: 10px;
            }

            .btn:hover {
                font-size: 10px;
                padding-block: 10px;
            }
        }

        /* Mobile styles */

        @media (min-width: 320px) and (max-width: 768px) {
            .jumbotron {
                padding: 1rem 2rem; /* Adjust the padding for mobile */
            }

            .carousel-caption {
                left: 50%; /* Move the caption to the center horizontally */
                top: 25%; /* Move the caption to the center vertically */
                transform: translate(-50%, -50%); /* Center the caption using transform */
            }

            /* Adjust font sizes for mobile */
            .main-heading {
                font-size: 10px;
                text-transform: uppercase;
            }

            .collaboration-text {
                font-size: 10px;
            }

            .sub-heading {
                font-size: 10px;
            }
        }

        .btn {
            font-size: 9px;
            padding-block: 12px;
        }

        .btn:hover {
            font-size: 9px;
            padding-block: 12px;
        }

        hr {
            border: none;
            height: 2px;
            background-color: rgb(42, 92, 255);

        }

        /*.signature {*/
        /*    margin-left: auto;*/
        /*}*/

        .sign {
            max-width: 100px; /* Adjust the size of the signature image for mobile */
            left: 0; /* Reset the left position for mobile */
        }

        /*.row {*/
        /*    display: flex;*/
        /*    flex-wrap: wrap;*/
        /*    margin-right: 20px; !* Adjust the right margin for mobile *!*/
        /*    margin-left: 20px; !* Adjust the left margin for mobile *!*/
        /*}*/
        .image-full-width-image {
            margin-top: 30px; /* Adjust the margin for mobile */
            /*padding: 10px; !* Add some padding around the image for mobile *!*/
            padding-left:170px;
            padding-right:170px;
        }

        .image-full-width-image h1 {
            font-size: 24px; /* Adjust the font size for the heading */
            margin-right: 100px; /* Reduce the margin-right for the heading */
            margin-bottom: 10px; /* Add some margin below the heading */
        }

        .image-full-width-image .btn {
            font-size: 16px; /* Adjust the font size for the button */
            margin-right: 10px; /* Reduce the margin-right for the button */
            margin-bottom: 10px; /* Add some margin below the button */
        }

        .full-width-image {
            max-width: 100%; /* Make the image responsive and fit within its container */
            height: auto; /* Ensure the image maintains its aspect ratio */
        }
    </style>
</head>
<body>
<!-- Your HTML content here -->
</body>

<body>
@foreach($conference_flyer as $flyer)
    @if($flyer->id === 3)
        <div class="carousel-item">
            <div class="carousel-item">
                <img class="img-layout"
                     src="{{ asset('frontend/1. 15th Abu Dhabi Wound Care Conference Layout (1931x714p).jpg') }}"
                     alt="15th Abu Dhabi Wound Care Conference Layout">
            </div>
        </div>
        <div class="jumbotron">
            <!-- Your jumbotron content here -->
            <div class="row">
                <div class="col-md-6">
                    <p class="content-description" style="max-width: 1700px">{!! nl2br($flyer->paragraphs[0]) !!}</p>
                    <p class="content-description" style="max-width: 1700px">{!! nl2br($flyer->paragraphs[1]) !!}</p>
                    <p class="content-description" style="max-width: 1700px">{!! nl2br($flyer->paragraphs[2]) !!}</p>
                    <p class="content-description" style="max-width: 1700px">{!! nl2br($flyer->paragraphs[3]) !!}</p>
                    <div class="col-md-6">
                        <ul class="content-text">
                            {!! nl2br($flyer->paragraphs[4]) !!}
                        </ul>

                    </div>
                    <div class="col-md-6">
                        <p class="content-title"><b>WHO SHOULD ATTEND</b></p>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="content-text">
                                @php
                                    $points = explode("\n", $flyer->paragraphs[5]);
                                @endphp
                                @foreach($points as $point)
                                    <li>{!! $point !!}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="content-text">
                                @php
                                    $points = explode("\n", $flyer->paragraphs[6]);
                                @endphp
                                @foreach($points as $point)
                                    <li>{!! $point !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
                <p class="content-detail">{!! nl2br($flyer->paragraphs[7]) !!}
                </p>
            </div>
        </div>
        <div class="row1">
            <div class="signature" >
                <img src="{{asset('frontend/Hiske smar sign.jpg')}}" class="sign" alt="hiske-smart-signature"><br>
                <span class="content-name">Ms.Hiske Smart</span><br>
                <span class="content-role">Conference Chair</span><br>
                <span class="content-role">President, IIWCG</span>
            </div>
            <hr class="my-4">

            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-4">Abstract Submission Deadline : 30<sup>th</sup> November 2023</h3>
                    <br>
                    <div style="text-align: center;">
                        <button type="button" class="btn-reg">{!! nl2br($flyer->paragraphs[8]) !!}</button>
                    </div>
                    <br>
                    <div style="text-align: center;">
                        <span class="content-members"><b>{!! nl2br($flyer->paragraphs[9]) !!}</b></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-4">Standard Registration Deadline : 26<sup>th</sup> January 2024</h3>
                    <br>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <span class="content-description-red">{!! nl2br($flyer->paragraphs[10]) !!}</span>
                            <br>
                            <span class="content-members">{!! nl2br($flyer->paragraphs[11]) !!}</span>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <span class="content-description-red">Standard Fee</span>
                            <br>
                            <span class="content-description-red">1 December - 26 January 2024</span>
                            <br>
                            <span class="content-members">{!! nl2br($flyer->paragraphs[13]) !!}</span>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <span class="content-description-red">Onsite Fee</span>
                            <br>
                            <span class="content-description-red">9 & 10 March 2024</span>
                            <br>
                            <span class="content-members">{!! nl2br($flyer->paragraphs[14]) !!}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="image-full-width-image" style="margin-top: 50px;">
                    <div style="display: flex; align-items: center;">
                        <h1 class="#"
                            style="font-weight: bold; font-size: 30px; color: #0717e0;">
                            Supported By</h1>
                        <a href="https://55365aae-63fa-4ff1-8c79-59724ad6872d.usrfiles.com/ugd/55365a_5edf3b326c4c4546a3cfe253f5524d16.pdf"
                           target="_blank">
                            <button type="button" class="btn">Download PDF Flyer
                            </button>
                        </a>
                    </div>
                    <img src="{{ asset('frontend/Supporting Socoties.jpg') }}" class="full-width-image"
                         alt="Supporting Societies">
                </div>

            </div>
        </div>
        </div>
    @endif
@endforeach
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Hide all headings and paragraphs initially
        $(".content-heading, .content-paragraph").hide();

        // Add click event to the button to toggle the headings and paragraphs
        $("#toggleButton").click(function () {
            $(".content-heading, .content-paragraph").toggle();
        });
    });
</script>


</body>

