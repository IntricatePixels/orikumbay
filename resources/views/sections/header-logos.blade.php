@php
    $logoUrl = get_theme_mod('kube_logo');
@endphp

@if ($logoUrl)
    <a href="{{ $blog_id == '1' ? '/al/' : '/' }}" rel="home">
        <img src="{{ esc_url($logoUrl) }}" alt="{{ esc_attr(get_bloginfo('name')) }}">
    </a>

@else
    <h1><a href="{{ $blog_id == '1' ? '/al/' : '/' }}" rel="home">{{ bloginfo('name') }}</a></h1>
    <p>{{ bloginfo('description') }}</p>
@endif