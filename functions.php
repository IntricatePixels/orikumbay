<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });


    // ACF Options
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
  }
  
  add_filter('acf/settings/save_json', 'my_acf_json_save_point');
  
  function my_acf_json_save_point($path)
  {
  
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
  
  
    // return
    return $path;
  
  }
  
  add_filter('acf/settings/load_json', 'my_acf_json_load_point');
  
  function my_acf_json_load_point($paths)
  {
  
    // remove original path (optional)
    unset($paths[0]);
  
  
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
  
  
    // return
    return $paths;
  
  }
  
  function resources_breadcrumb()
  {
    global $post;
    if ($post->post_parent) {
      echo get_the_title($post->post_parent);
      echo " / ";
      echo the_title();
    }
  }
  
  
  /**
   * Register Mega Menu Navwalker
   */
  function register_navwalker()
  {
    require_once get_template_directory() . '/resources/views/desktop-navwalker.php';
    require_once get_template_directory() . '/resources/views/mobile-navwalker.php';
  }
  add_action('after_setup_theme', 'register_navwalker');
  
  
  

  /**
  * Enable WebP preview in WordPress media library.
  */
  function enable_webp_library( $data, $attachment_id ) {
    $file = get_attached_file( $attachment_id );
    $extension = pathinfo( $file, PATHINFO_EXTENSION );
  
    if ( 'webp' === $extension ) {
        $data['sizes']['thumbnail']['url'] = $data['url'];
        $data['sizes']['thumbnail']['width'] = $data['width'];
        $data['sizes']['thumbnail']['height'] = $data['height'];
    }
  
    return $data;
  }
  add_filter( 'wp_generate_attachment_metadata', 'enable_webp_library', 10, 2 );
  
  /**
  * Enable WebP preview in WordPress media library.
  */
  function enable_webp_support( $content ) {
    $content['enabled'] = true;
    return $content;
  }
  add_filter( 'wp_get_attachment_image_src', 'enable_webp_support', 10, 1 );


  function kube_customize_register( $wp_customize ) {
    // Add a new section for the custom logo
    $wp_customize->add_section( 'kube_logo_section' , array(
        'title'      => __( 'Custom Logo', 'kube' ),
        'priority'   => 30,
    ) );

    // Add a setting for the custom logo
    $wp_customize->add_setting( 'kube_logo' );

    // Add a control to upload the custom logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kube_logo', array(
        'label'    => __( 'Upload Logo', 'kube' ),
        'section'  => 'kube_logo_section',
        'settings' => 'kube_logo',
    ) ) );
}
add_action( 'customize_register', 'kube_customize_register' );


function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );

function custom_mime_types($mimes) {
  $mimes['gif'] = 'image/gif';
  return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');


function does_drawattention_id_exist($id) {
  global $wpdb;
  $post_exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->posts} WHERE ID = %d AND post_type = 'da_image'", $id));
  return $post_exists > 0;
}
