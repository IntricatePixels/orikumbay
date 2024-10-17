<?php
/**
 * Template Name: Search Page
 */
?>
@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col">
          @include('partials.content-page')
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <form role="search" method="get" id="searchpage-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="input-group mb-3">
            <div class="input-group">
              <input type="search" class="form-control border-0" placeholder="Search" aria-label="search" name="s" id="searchpage-input" value="<?php echo esc_attr( get_search_query() ); ?>">
                <div class="input-group-append align-items-center">
                  <span class="input-group-append ">
                    <button type="submit" class="btn px-4">
                      <img width="30" height="30" loading="eager" src="@asset('images/arrow-right-circle.svg')" alt="Search Our Site" style="width: 30px; height: 30px;">
                    </button>
                  </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
