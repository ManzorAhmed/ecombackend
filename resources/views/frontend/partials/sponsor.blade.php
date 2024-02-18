@extends('frontend.layouts.master')
@section('content')
    <style>
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
            background-color: #50130f;
        }

        .mail-link {
            margin-left: 20px;
            font-size: 16px;
            color: #701915;
            text-decoration: none;
        }

        .mail-link:hover {
            text-decoration: underline;
        }

    </style>
    @php
        $slider = \App\Models\Slider::get();
    @endphp
    <div class="container" style="padding-top: 80px;">
        <h2 class="font_2" style="font-size:65px; line-height:1.2em; text-align:center;">
                <span style="font-size:65px;">
                    <span style="color:#701915;">
                        <span style="text-decoration:underline;">
                            <span style="font-family:adobe-caslon-w01-smbd,serif;">Under Maintenance</span>
                        </span>
                    </span>
                </span>
        </h2>
        @foreach($slider as $index => $r)
            <div class="banner-wrapper{{ $index === 0 ? ' active' : '' }}">
                <a href="{{ $r->slug }}" target="_blank">
                    <img class="banner-size" src="{{ asset('uploads/gallery/'.$r->image) }}" alt="Slider Image">
                </a>
            </div>
        @endforeach
        <div class="button-wrapper">
            <a href="#" class="button">For Sponsor & Exhibitor Please Contact Us</a>
            <a href="mailto:benc@smacuae.com" class="mail-link">benc@smacuae.com</a>
        </div>
    </div>
@endsection
