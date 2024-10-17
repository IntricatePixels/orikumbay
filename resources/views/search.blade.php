@extends('layouts.app')

@section('content')
  @include('partials.page-header')
<div class="container my-4">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center mx-auto my-4">You searched for <?php the_search_query(); ?></h2>
      <div class="max-width-8 mx-auto text-center mb-2">
        Enter the keywords, products, services, or solutions you want to explore.
      </div>
    </div>
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif

      @while(have_posts()) @php the_post() @endphp
        @include('partials.content-search')
      @endwhile
      {!! get_the_posts_navigation() !!}
  </div>
</div>
@endsection
