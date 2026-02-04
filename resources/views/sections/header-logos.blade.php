@php
    $logoUrl = get_theme_mod('kube_logo');
@endphp

@if ($logoUrl)
    <a href="{{ home_url('/') }}" rel="home">
        <img src="{{ esc_url($logoUrl) }}" alt="{{ esc_attr(get_bloginfo('name')) }}">
    </a>
@else
    <h1><a href="{{ home_url('/') }}" rel="home">{{ get_bloginfo('name') }}</a></h1>
    <p>{{ get_bloginfo('description') }}</p>
@endif