@php
    $slider=\App\Models\Slider::get();
@endphp

<style>
    .carousel-caption {
        position: absolute;
        right: 15%;
        bottom: 113px;
        left: 25%;
        z-index: 10;
        padding-top: 10px;
        padding-bottom: 1px;
        color: #fff;
        text-align: center;
    }

    /* Media Query for Mobile */
    @media (max-width: 767px) {
        .carousel-caption {
            right: 0;
            left: 0;
            bottom: 6px;
            text-align: center;
        }
    }

    p {
        margin-top: 0;
        /* margin-bottom: 1rem; */
    }

    .main-heading {
        font-size: 50px;
        text-transform: uppercase;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        font-weight: bold;
    }

    .collaboration-text {

        font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        font-size: 20px;
    }

    .sub-heading {
        font-size: 45px;
        text-transform: uppercase;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        font-weight: bold;
    }

    .button-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .button {
        display: inline-block;
        padding: 12px 20px;
        background-color: #C74300;
        color: #fff;
        font-size: 16px;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #c10797;
        color: white;
    }


    /* Media Queries */
    @media (max-width: 767px) {
        .main-heading {
            text-transform: uppercase;
            font-size: 13px;
        }

        .collaboration-text {
            font-size: 10px;
            text-transform: uppercase;
        }

        .sub-heading {
            font-size: 10px;
            text-transform: uppercase;
        }

        .button {
            font-size: 10px;
        }

        .button-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
        }

        .button {
            display: inline-block;
            padding: 4px 8px;
            background-color: #C74300;
            color: #fff;
            font-size: 12px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #c10797;
            color: white;
        }

    }

    .how-section1 {
        margin-top: -15%;
        padding: 10%;

    }

    .how-section1 h4 {
        color: #0961e2;
        font-weight: bold;
        font-size: 40px;
    }

    .how-section1 .subheading {
        color: #3931af;
        font-size: 20px;
    }

    .how-section1 .row {
        margin-top: 7%;
    }

    .how-img {
        text-align: center;
    }

    .how-img img {
        width: 100%;
    }
    @media (max-width: 767px) {
        .how-section1 {
            margin-top: -15%;
            padding: 10%;

        }

        .how-section1 h4 {
            color: #0961e2;
            font-weight: bold;
            font-size: 30px;
        }

        .how-section1 .subheading {
            color: #3931af;
            font-size: 20px;
        }

        .how-section1 .row {
            margin-top: 7%;
        }

        .how-img {
            text-align: center;
        }

        .how-img img {
            width: 100%;
        }
    }
</style>

<div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
    <div class="carousel-inner">
        <!-- Single item -->
        @php $isFirstItem = true; @endphp
        @foreach($slider as $r)
            <div class="carousel-item{{ $isFirstItem ? ' active' : '' }}">
                <a href="{{ $r->slug }}" target="_blank">
                    <img class="banner-size" src="{{ asset('uploads/gallery/'.$r->image) }}" alt="Slider Image">
                </a>
                <div class="carousel-caption">
                    <h1 class="main-heading">15<sup>th</sup> Abu-Dhabi <span style="color: #59c718;">Woundcare</span>
                        Conference</h1>
                    <p class="collaboration-text">in Collaboration with</p>
                    <h1 class="sub-heading">International Interprofessional</h1>
                    <h1 class="sub-heading">Wound Care Group</h1>
                    <div class="button-wrapper">
                        <a href="{{ $r->slug }}" target="_blank" class="button">Registration Now!</a>
                    </div>
                </div>


            </div>
            @php $isFirstItem = false; @endphp
        @endforeach
    </div>
</div>
@include('frontend.partials.count')
<div class="how-section1">
    <div class="row">
        <div class="col-md-6 how-img">
            <img src="{{ asset('frontend/img/15th ADWCC Theme.png') }}" alt="confernce image">
        </div>
        <div class="col-md-6">
            <h4>Introduction</h4>
            <h4 class="subheading"></h4>
            <button type="button" class="btn btn-primary btn-lg btn-block" style="text-align: justify">The 15th Abu
                Dhabi Wound Care Conference, in collaboration with the International Inter-professional Wound Care Group
                (IIWCG), is an esteemed platform dedicated to promoting knowledge exchange, research advancements, and
                interdisciplinary collaboration in the field of wound care. This conference brings together renowned
                experts, healthcare professionals, researchers, and industry leaders from around the world to discuss
                the latest trends, innovations, and best practices in wound management. With a focus on improving
                patient outcomes and enhancing the quality of wound care, this event promises to be an exceptional
                learning experience.
            </button>
            <h4>Conference Objective</h4>
            <button type="button" class="btn btn-success btn-lg btn-block" style="text-align: justify">Promote interdisciplinary collaboration: The
                conference aims to foster collaboration among various healthcare disciplines involved in wound care,
                including physicians, nurses, podiatrists, researchers, and industry professionals. By facilitating
                interdisciplinary interactions, the conference strives to enhance holistic wound management approaches.
            </button>
        </div>
    </div>
</div>

