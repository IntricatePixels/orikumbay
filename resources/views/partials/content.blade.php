<article @php post_class('bordered h-100' ) @endphp>
    <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('medium', ['class' => 'perspectives-thumb col-block']); ?>
    </a>
    <?php endif; ?>
    <div class="post-cat"><?php echo get_post_type(); ?></div>
    <div class="perspective-card-content p-3 <?php echo get_post_type(); ?>">
        <header>
            <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
        </header>
        <div class="entry-summary">
            @php the_excerpt() @endphp
        </div>
        <a class="card-cont-read" href="<?php the_permalink(); ?>">Continue Reading
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
              <path fill="currentColor"
                  d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
          </svg></a>
    </div>
</article>
