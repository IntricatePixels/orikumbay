<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
    <?php the_field('preload_fonts', 'option'); ?>
    <?php the_field('preload_fonts', 'option'); ?>
    <?php the_field('gtm', 'option'); ?>
  </head>

  <body <?php body_class(); ?>>
  <?php the_field('gtm_body', 'option'); ?>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
