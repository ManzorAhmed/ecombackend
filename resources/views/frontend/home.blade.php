<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('frontend.partials.head')
</head>

<body>
<!-- Page Preloder -->
 <div id="preloder">
    <div class="loader">
        @if (!empty(get_static_option('site_logo')))
            {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
        @else
            <img src="{{ asset('frontend/img/logo/AIR-RITE-WEB-LOGO-PNG-EDITED') }}" alt="">
        @endif
    </div>
</div>
@include('frontend.partials.header')

<!-- Header Section Begin -->
@include('frontend.partials.slider')
@include('frontend.partials.sponsor')
{{--@include('frontend.partials.footer')--}}
<!-- Footer Section End -->
@include('frontend.partials.scripts')
</body>

</html>
