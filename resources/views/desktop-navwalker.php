<?php
class Mimeo_Navwalker extends Walker_Nav_Menu {

    public $megaMenuID;

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? 'sub-menu' : '';

        if ($depth < 1 ) {
          // - depth two column 2, depth 3 column 3
          $output .= "\n$indent<ul id='mimeoMegaDropdown' aria-labelledby='mimeoMegaMenuDropdown' class=\"dropdown-menu shadow border border-white p-3 pb-4 depth_$depth $submenu\" ><div class=\"container\"><div class=\"row gx-5\">\n";
          } else {
            if ($depth != 2 ) {
              $output .= "\n$indent<ul class=\"$submenu depth_$depth\" >\n";
            }
            else {
              $output .= "\n$indent<ul class=\"depth-3\" >\n";
            }
          }

        $this->megaMenuID = 0;
    }

    public function end_lvl (&$output, $depth = 0, $args = array()){
      if ($this->megaMenuID != 0){
        $output .= "</ul></li>";
      }

      $output .= "</ul>";
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        if ($this->megaMenuID === intval($item->ID)){
          $this->megaMenuID = 0;
        }

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $divider_class_position = array_search('divider', $classes);
        if ($divider_class_position !== false) {
            $output .= "<li class=\"divider\"></li>\n";
            unset($classes[$divider_class_position]);
        }

        if(array_search('mega-menu', $classes) !== false ){
          $this->megaMenuID = $item->ID;
        }

        if ($depth < 1 ) {
        $classes[] = ($args->has_children) ? 'dropdown' : '';
        }
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-'.$item->ID;
        if ($depth && $args->has_children) {
            $classes[] = 'dropdown-submenu';
        }

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="'.esc_attr($class_names).'"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen($id) ? ' id="'.esc_attr($id).'"' : '';

        $output .= $indent.'<li'.$id.$value.$class_names.$li_attributes.'>';

        $attributes = !empty($item->attr_title) ? ' title="'.esc_attr($item->attr_title).'"' : '';
        $attributes .= !empty($item->target) ? ' target="'.esc_attr($item->target).'"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="'.esc_attr($item->xfn).'"' : '';
        $attributes .= !empty($item->url) ? ' href="'.esc_attr($item->url).'"' : '';

        if ($depth < 1 ) {
        $attributes .= ($args->has_children) ? ' id="mimeoMegaMenuDropdown" class="dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside"' : '';
        } elseif ($depth > 1 ) {
          $attributes .= !empty($item->url) ? ' class="sublink"' : '';
        }

        $item_output = $args->before;
        $item_output .= '<a'.$attributes.'>';
        $item_output .= $args->link_before.apply_filters('the_title', $item->title, $item->ID).$args->link_after;

        // add support for menu item title
        if (strlen($item->attr_title) > 2) {
            $item_output .= '<h3 class="title">'.$item->attr_title.'</h3>';
        }
        
          if (strlen($item->description) > 2) {
              $item_output .= '<div class="sub">'.$item->description.'</div></a>';
          }
        
            
        $item_output .= (($depth == 0 || 1) && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
        //$item_output .= $item->description;

        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
        if (!$element) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if (is_array($args[0])) {
            $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
        } elseif (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }

        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {
            foreach ($children_elements[ $id ] as $child) {
                if (!isset($newlevel)) {
                    $newlevel = true;
              //start the child delimiter
              $cb_args = array_merge(array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
            }
            unset($children_elements[ $id ]);
        }

        if (isset($newlevel) && $newlevel) {
            //end the child delimiter
          $cb_args = array_merge(array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        //end this element
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
    }
}