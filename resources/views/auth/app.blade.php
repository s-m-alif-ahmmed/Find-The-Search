<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="The Search">
    <meta name="keywords" content="The Search">

    <title>@yield('title')</title>

    @include('auth.partials.styles')
</head>

<body>

@yield('content')

@include('auth.partials.scripts')

</body>

</html>
