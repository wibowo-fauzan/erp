@php
    $authBackground = 'images/auth-background.JPEG';
@endphp

@if (file_exists(public_path($authBackground)))
    <img class="auth-bg" src="{{ asset($authBackground) }}" alt="" aria-hidden="true">
@else
    @include('partials.auth-decor-svg')
@endif
