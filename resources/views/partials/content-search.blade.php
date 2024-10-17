<div class="col-lg-3 mb-4">
    <a href="{{ get_permalink() }}">
        <article @php post_class('bordered h-100' ) @endphp>
            @if (has_post_thumbnail())
                @php the_post_thumbnail('medium', ['class' => 'perspectives-thumb col-block']) @endphp
            @endif
            <div class="searchpost-cat mb-3"><?php echo get_post_type(); ?></div>
            <header class="px-3">
                <h2 class="entry-title">{!! get_the_title() !!}</h2>
            </header>
            <div class="px-3 entry-summary">
                @php the_excerpt() @endphp
            </div>
        </article>
    </a>
</div>
