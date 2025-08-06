<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="The Search">
    <meta name="keywords" content="The Search">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    @include('frontend.partials.styles')
</head>

<body>
{{-- Header --}}
@include('frontend.partials.header')
{{-- Header --}}

<!-- =============================================== Main Start Hare ================================== -->
<main>
    @yield('content')
</main>
<!-- =============================================== Main End Hare ================================== -->

{{-- Header --}}
@include('frontend.partials.footer')
{{-- Header --}}

@include('frontend.partials.scripts')
</body>

</html>
