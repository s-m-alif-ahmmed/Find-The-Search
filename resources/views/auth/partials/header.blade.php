@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

<div class="col col-login mx-auto text-center">
    <a href="{{ route('welcome') }}">
        <img src="{{ isset($systemSetting->logo) && !empty($systemSetting->logo) ? asset($systemSetting->logo) : asset('frontend/logo.svg') }}"
            class="header-brand-img" alt="">
    </a>
</div>
