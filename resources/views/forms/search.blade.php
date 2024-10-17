<form role="search" method="get" class="search-form" action="{{ home_url('/') }}">
  <label>

    <input
      type="search"
      placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'sage') !!}"
      value="{{ get_search_query() }}"
      name="s"
      class="form-control"
    >
  </label>

  <button class="btn btn-secondary">{{ _x('Search', 'submit button', 'sage') }}</button>
</form>
