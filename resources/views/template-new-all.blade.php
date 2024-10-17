{{--
  Template Name: New Main Template
  Template Post Type: post, page
--}}

@extends('layouts.app')

@section('content')
    @if (have_posts())
        @while (have_posts())
            @php the_post() @endphp
            @include('partials.page-header')
            @include('partials.content-blocks-new')
            <div class="container">
                @include('partials.content-page')
            </div>
        @endwhile
    @endif
@endsection
