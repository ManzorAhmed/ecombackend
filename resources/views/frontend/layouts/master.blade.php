<!doctype html>
<html lang="en">
<head>
    @include('frontend.partials.head')
</head>
<body>
<header class="section-header">
    @include('frontend.partials.header')
    @include('frontend.partials.styles')
</header>

{{--@include('frontend.partials.header')--}}
@yield('content')
{{--@include('frontend.partials.script')--}}
@include('frontend.partials.footer')
@yield('scripts')
</body>

</html>

