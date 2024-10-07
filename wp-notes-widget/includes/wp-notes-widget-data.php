<?php
  /**
   * Usually not best practice to use nested functions in PHP because of how PHP stores functions at compile.
   * However, a function_exists wrapper seems to be suitable.
   * This file will be included inside other functions. This approach seems to works best with how the Wordpress callback 
   * functions work for hooks.
   */
  if (!function_exists('getNotesWidgetData')) {
    
    /**
     * Fetches all of the note widget data. Packages everything in an array for easy access
     *
     * @since  0.1.3
     * @param  array   $instance       The data associated with this widget
     * @return array   $widget_data    An array of all the required data for the widget, sanitized and ajusted as needed
     */
    function getNotesWidgetData($instance) {

      $widget_data = array();
      $default_val = get_option( 'wp_notes_widget_defaults' );
      
      if (isset($instance['thumb_tack_colour'])) {
        // if this is set, the widget had already existed
        $thumb_tack_colour_set = true;
      } else {
        $thumb_tack_colour_set = false;
      }

      $widget_data['title']                   = (isset( $instance['title'])                     ? sanitize_text_field($instance['title']) : '');
      //$widget_data['thumb_tack_colour']       = (isset($instance['thumb_tack_colour'])          ? sanitize_text_field($instance['thumb_tack_colour']) : '');
      if (isset($instance['thumb_tack_colour'])) {
        $widget_data['thumb_tack_colour'] = sanitize_text_field($instance['thumb_tack_colour']);
      } else {
        if (isset($default_val['thumb_tack_colour'])) {
          $widget_data['thumb_tack_colour'] = $default_val['thumb_tack_colour'];
        } else {
          $widget_data['thumb_tack_colour'] = WP_NOTES::get_plugin_default_setting('thumb_tack_colour');
        }
        
      }

      //$widget_data['text_colour']             = (isset($instance['text_colour'])                ? sanitize_text_field($instance['text_colour']) : '');
      if (isset($instance['text_colour'])) {
        $widget_data['text_colour'] = sanitize_text_field($instance['text_colour']);
      } else {
        if (isset($default_val['text_colour'])) {
          $widget_data['text_colour'] = $default_val['text_colour'];
        } else {
          $widget_data['text_colour'] = WP_NOTES::get_plugin_default_setting('text_colour');
        }
        
      }

      //$widget_data['background_colour']       = (isset($instance['background_colour'])          ? sanitize_text_field($instance['background_colour']) : '');
      if (isset($instance['background_colour'])) {
        $widget_data['background_colour'] = sanitize_text_field($instance['background_colour']);
      } else {
        if (isset($default_val['background_colour'])) {
          $widget_data['background_colour'] = $default_val['background_colour'];
        } else {
          $widget_data['background_colour'] = WP_NOTES::get_plugin_default_setting('background_colour');
        }
        
      }


      //$widget_data['use_custom_style']        = (!empty($instance['use_custom_style'])          ? sanitize_text_field($instance['use_custom_style']) : '');
      if ($thumb_tack_colour_set) {
        $widget_data['use_custom_style'] = (bool)sanitize_text_field($instance['use_custom_style']);
      } else {
        if (!empty($instance['use_custom_style'])) {
          $widget_data['use_custom_style'] = sanitize_text_field($instance['use_custom_style']);
        } else {
          if (isset($default_val['use_custom_style'])) {
            $widget_data['use_custom_style'] = $default_val['use_custom_style'];
          } else {
            $widget_data['use_custom_style'] = WP_NOTES::get_plugin_default_setting('use_custom_style');
          }
          
        }        
      }



      $widget_data['wrap_widget']             = (!empty($instance['wrap_widget'] )              ? sanitize_text_field($instance['wrap_widget']) : '');
      

      //$widget_data['show_date']               = (!empty($instance['show_date'] )                ? sanitize_text_field($instance['show_date']) : '');
      if ($thumb_tack_colour_set) {
        $widget_data['show_date']  = (bool)sanitize_text_field($instance['show_date']);
      } else {
        if (!empty($instance['show_date'] )) {
          $widget_data['show_date']  = sanitize_text_field($instance['show_date']);
        } else {
          if (isset($default_val['show_date'])) {
            $widget_data['show_date']  = $default_val['show_date'];
          } else {
            $widget_data['show_date']  = WP_NOTES::get_plugin_default_setting('show_date');
          }
          
        }        
      }


      //$widget_data['multiple_notes']          = (!empty($instance['multiple_notes'] )           ? sanitize_text_field($instance['multiple_notes']) : '');
      if ($thumb_tack_colour_set) {
        $widget_data['multiple_notes'] = (bool)sanitize_text_field($instance['multiple_notes']);
      } else {
        if (!empty($instance['multiple_notes'] ))  {
          $widget_data['multiple_notes'] = sanitize_text_field($instance['multiple_notes']);
        } else {
          if (isset($default_val['multiple_notes'])) {
            $widget_data['multiple_notes'] = $default_val['multiple_notes'];
          } else {
            $widget_data['multiple_notes'] = WP_NOTES::get_plugin_default_setting('multiple_notes');
          }
          
        }        
      }


      //$widget_data['hide_if_empty']           = (!empty($instance['hide_if_empty'])             ? 1 : 0);
      if ($thumb_tack_colour_set) {
        $widget_data['hide_if_empty'] = (bool)$instance['hide_if_empty'];
      } else {
        if (!empty($instance['hide_if_empty']))  {
          $widget_data['hide_if_empty'] = true;
        } else {
          if (isset($default_val['hide_if_empty'])) {
            $widget_data['hide_if_empty'] = $default_val['hide_if_empty'];
          } else {
            $widget_data['hide_if_empty'] = WP_NOTES::get_plugin_default_setting('hide_if_empty');
          }
          
        }        
      }


      //$widget_data['font_size']               = (!empty($instance['font_size'] )                ? sanitize_text_field($instance['font_size']) : 'normal');
      if (!empty($instance['font_size'] )) {
        $widget_data['font_size'] = sanitize_text_field($instance['font_size']);
      } else {
        if (isset($default_val['font_size'])) {
          $widget_data['font_size'] = $default_val['font_size'];
        } else {
          $widget_data['font_size'] = WP_NOTES::get_plugin_default_setting('font_size');
        }
        
      }

      //$widget_data['enable_social_share']     = (!empty($instance['enable_social_share'])       ? 1 : 0);
      if ($thumb_tack_colour_set) {
        $widget_data['enable_social_share'] = (bool)$instance['enable_social_share'];
      } else {
        if (!empty($instance['enable_social_share'])) {
          $widget_data['enable_social_share'] = true;
        } else {
          if (isset($default_val['enable_social_share'])) {
            $widget_data['enable_social_share'] = $default_val['enable_social_share'];
          } else {
            $widget_data['enable_social_share'] = WP_NOTES::get_plugin_default_setting('enable_social_share');
          }
        }        
      }


      //$widget_data['font_style']              = (!empty($instance['font_style'] )               ? sanitize_text_field($instance['font_style']) : 'kalam');
      if (!empty($instance['font_style'] )) {
        $widget_data['font_style']  = sanitize_text_field($instance['font_style']);
      } else {
        if (isset($default_val['font_style'])) {
          $widget_data['font_style']  = $default_val['font_style'];
        } else {
          $widget_data['font_style']  = WP_NOTES::get_plugin_default_setting('font_style');
        }
      }

      //$widget_data['do_not_force_uppercase'] = (!empty($instance['do_not_force_uppercase'])   ? 1 : 0);
      if ($thumb_tack_colour_set) {
        $widget_data['do_not_force_uppercase'] = (bool)$instance['do_not_force_uppercase'];
      } else {
        if (!empty($instance['do_not_force_uppercase'])) {
          $widget_data['do_not_force_uppercase'] = true;
        } else {
          if (isset($default_val['do_not_force_uppercase'])) {
            $widget_data['do_not_force_uppercase'] = $default_val['do_not_force_uppercase'];
          } else {
            $widget_data['do_not_force_uppercase'] = WP_NOTES::get_plugin_default_setting('do_not_force_uppercase');
          }
          
        }        
      }


      $widget_data['post_adjustment_type']    = (!empty($instance['post_adjustment_type'])      ? sanitize_text_field($instance['post_adjustment_type']) : 'none');
      


      if (!empty($instance['post_adjustment_list']) ) {
        $sanitized_adjustment_posts = array();
        $post_adjustment_list = unserialize($instance['post_adjustment_list']);
        
        foreach ($post_adjustment_list as &$post_adjustment_id) {
          $sanitized_adjustment_posts[] = sanitize_text_field($post_adjustment_id);
        }

        $widget_data['post_adjustment_list'] =  $sanitized_adjustment_posts;        
      } else {
        $widget_data['post_adjustment_list'] = array();
      }
      

      return $widget_data;

    }
  }