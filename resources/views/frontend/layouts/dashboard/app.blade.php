<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>

    @include('frontend.partials.styles')

</head>
<body>
<!-- Dashboard Main -->
<main>
    <div class="dashboard--wrapper">
        <!-- DASHBOARD LEFT -->
        @if (request()->routeIs('user.dashboard') || request()->routeIs('user.dashboard.*'))
        @include('frontend.layouts.dashboard.partials.left-side')
        @endif
        @if (request()->routeIs('dashboard.rank') || request()->routeIs('dashboard.rank.*'))
        @include('frontend.layouts.dashboard.partials.left-side')
        @endif
        @if (request()->routeIs('dashboard.setting') || request()->routeIs('dashboard.setting.*'))
        @include('frontend.layouts.dashboard.partials.left-side')
        @endif

        <!-- DASHBOARD MAIN -->
        @yield('content')

        <!-- DASHBOARD RIGHT -->
        @include('frontend.layouts.dashboard.partials.right-side')

    </div>
</main>
<!-- Dashboard Main -->

<!-- Notification -->
@include('frontend.layouts.dashboard.partials.notification')
@if (request()->routeIs('dashboard.rank') || request()->routeIs('dashboard.rank.*'))
@include('frontend.layouts.dashboard.partials.vote-user')
@endif
@if (request()->routeIs('dashboard.rank') || request()->routeIs('dashboard.rank.*'))
@include('frontend.layouts.dashboard.partials.announcement')
@endif
@if (request()->routeIs('user.dashboard') || request()->routeIs('user.dashboard.*'))
@include('frontend.layouts.dashboard.partials.announcement')
@endif

<!-- Javascript Links -->
@include('frontend.layouts.dashboard.partials.scripts')

</body>
</html>
