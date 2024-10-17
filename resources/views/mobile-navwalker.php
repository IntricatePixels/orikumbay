<?php
class Mobile_Nav_Walker extends Walker_Nav_Menu {
  // Add classes to ul sub-menus
  function start_lvl( &$output, $depth = 0, $args = null ) {
      // Depth-dependent classes
      $indent = str_repeat( "\t", $depth ); // code indent
      $display_depth = $depth + 1; // because it counts the first submenu as 0
      $classes = array(
          'sub-menu',
          'dropdown-menu',
          ( $display_depth >= 2 ? 'dropdown-submenu' : '' ),
          'submenu-depth-' . $display_depth // Specific class for submenu depth
      );

      if ($depth === 1) {
          $classes[] = 'ps-3 pt-2 pb-0';
      }

      $class_names = implode( ' ', $classes );

      // Add px-3 class if depth is zero
      if ($depth === 0) {
          $class_names .= ' px-3 pt-0 pb-3 pe-0';
      }

      // Build HTML for output
      $output .= "\n$indent<ul class=\"$class_names\">\n";
  }

  // Add main/sub classes to li's and links
  function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
      $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

      // Depth-dependent classes
      $depth_classes = array(
          ( $depth == 0 ? 'nav-item' : '' ),
          ( $depth >= 2 ? 'dropdown-submenu' : '' ),
          ( $depth > 0 ? 'dropdown-item' : 'nav-link' ),
      );
      $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

      // Unique class for links based on depth
      $link_depth_class = 'link-depth-' . $depth;

      if ($depth === 1) {
          $depth_class_names .= ' ps-3 pt-2 pb-2';
      }

      if ($depth === 2) {
          $depth_class_names .= ' ps-3 pb-3';
      }

      // Passed classes
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' ' . esc_attr( $class_names ) : '';

      // Check if the current item has children
      $has_children = !empty($args->has_children) ? ' menu-item-has-children' : '';

      // Add py-3 class if depth is zero
      if ($depth === 0) {
          $depth_class_names .= ' p-3';
      }

      // Build HTML
      $output .= $indent . '<li class="nav-item' . $class_names . $has_children . '">';

      // Link attributes
      $attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

      // Build HTML output and pass through the proper filters.
      $item_output = $args->before;
      $item_output .= '<a class="nav-link ' . $depth_class_names . ' ' . $link_depth_class . '"' . $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;

      // Output
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
