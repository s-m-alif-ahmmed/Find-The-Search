@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

    <!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="{{ isset($systemSetting->favicon) && !empty($systemSetting->favicon) ? asset($systemSetting->favicon) : asset('frontend/logo.svg') }}" />

<!-- All Plugins CSS -->
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/plugins/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/plugins/nice-select.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/plugins/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/plugins/skeletabs.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>

<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/helper.css') }}" />
<link rel="stylesheet" href="{{ asset('/frontend/assets/css/style.css') }}" />
<link rel="stylesheet" href="https://unpkg.com/lenis@1.1.16/dist/lenis.css"/>

<link rel="stylesheet" href="{{ asset('/frontend/assets/css/responsive.css') }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

{{--Toast--}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

@stack('styles')
