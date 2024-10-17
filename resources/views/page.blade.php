@extends('layouts.app')

@section('content')
    @if (have_posts())
        @while (have_posts())
            @php(the_post())
            <div class="container">
                @include('partials.page-header')
                @includeFirst(['partials.content-page', 'partials.content'])
            </div>
        @endwhile
    @endif
@endsection
