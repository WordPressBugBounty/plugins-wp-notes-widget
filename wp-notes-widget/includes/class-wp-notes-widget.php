<?php
  
  // Prevent direct file access
  if ( ! defined ( 'ABSPATH' ) ) {
    exit;
  }

  /**
   * Extension of WP_Widget class in accordance with standard Wordpress practice to create widgets.
   *
   * @since      0.1.0
   * @package    WP_Notes
    * @subpackage WP_Notes/includes
   */
  class WP_Notes_Widget extends WP_Widget {

      /**
       * The variable name is used as the text domain when internationalizing strings
       * of text. Its value should match the Text Domain file header in the main
       * widget file.
       *
       * @since    0.1.0
       * @var      string
       */
      protected $widget_slug = 'wp-notes-class';


    /*--------------------------------------------------*/
    /* Constructor
    /*--------------------------------------------------*/

    /**
     * Specifies the classname and description, instantiates the widget,
     * loads localization files, and includes necessary stylesheets and JavaScript.
     */
    public function __construct() {
      
      $widget_slug            = $this->get_widget_slug();
      $widget_title           = esc_html__( 'WP Notes Widget', $this->get_widget_slug() );
      $widget_description     = esc_html__( 'Displays all of the published notes in a "sticky note" styling.', $this->get_widget_slug() );
      $widget_ops             = array( 
        'classname'   =>  $this->get_widget_slug().'-widget',
        'description' => $widget_description 
      );
      $control_ops            = array( 
        'width'   => 700, 
        'height'  => 600 
      );
      
      parent::__construct( $widget_slug, $widget_title, $widget_ops, $control_ops );

      // Refreshing the widget's cached output with each new post
      add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
      add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
      
    } // end constructor


    /**
     * Return the widget slug.
     *
     * @since    0.1.0
     * @return   Plugin slug variable.
     */
    public function get_widget_slug() {
        return $this->widget_slug;
    }


    /*--------------------------------------------------*/
    /* Widget API Functions
    /*--------------------------------------------------*/    
    /**
     * Outputs the content of the widget.
     *
     * @since    0.1.0
     * @param array args  The array of form elements
     * @param array instance The current instance of the widget
     */
    public function widget( $args, $instance ) {

      /**
       *
       * @since    0.1.0
       * @var      int    $hide_if_empty    Flag to determine if widget should still be displayed when there are no published posts.
       */
      $hide_if_empty;

      /**
       *
       * @since    0.1.0
       * @var      array    $wp_notes_data    A multidimensional associative array containing all the data for the notes (title, text, date).
       */
      $wp_notes_data = array();

      include( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wp-notes-post-data.php' );
      include( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wp-notes-widget-data.php' );
      $widget_data = getNotesWidgetData($instance);
      extract( $widget_data, EXTR_SKIP );

      switch($post_adjustment_type) {
        case 'hide' :
          $note_query_args =   array (  
            'post_type'         => 'nw-item', 
            'posts_per_page'    => -1,
            'order'             => 'ASC',
            'orderby'           => 'menu_order date',
            'post__not_in'      => $post_adjustment_list
          );
          break;
        case 'show' :
          $note_query_args =   array (  
            'post_type'         => 'nw-item', 
            'posts_per_page'    => -1,
            'order'             => 'ASC',
            'orderby'           => 'menu_order date',
            'post__in'          => $post_adjustment_list
          );
          break;
        case 'none' :
        default :
          $note_query_args =   array (  
            'post_type'         => 'nw-item', 
            'posts_per_page'    => -1,
            'order'             => 'ASC',
            'orderby'           => 'menu_order date'
          );
          break;
      }


      /**
       * Since we need to run WP_Query to determine the number of active notes, we iterate through the results and store the 
       * values in $wp_notes_data to be used later. This prevents the need to run WP_Query again later. 
       */
      $note_query = new WP_Query( $note_query_args );
      global $post;
      $count = 0;
      if ( $note_query->have_posts()  ) {
        while ( $note_query->have_posts() ) : $note_query->the_post();

          $wp_notes_data[$count]['data']  = getNotePostData( $post->ID);
          $wp_notes_data[$count]['title'] = get_the_title();
          $wp_notes_data[$count]['date']  = get_the_date();

          $count++;

        endwhile;
      } else if ($hide_if_empty) {
        return;
      }
      wp_reset_postdata();  
      // Check if there is a cached output
      $cache = wp_cache_get( $this->get_widget_slug(), 'widget' );

      if ( !is_array( $cache ) )
        $cache = array();

      if ( ! isset ( $args['widget_id'] ) )
        $args['widget_id'] = $this->id;

      if ( isset ( $cache[ $args['widget_id'] ] ) )
        return print $cache[ $args['widget_id'] ];
      
      extract( $args, EXTR_SKIP );

      $widget_string = '';

      if ((bool)$multiple_notes) {
        ob_start();
        if ( $note_query->have_posts() ) {
          $note_count = 0;
          foreach($wp_notes_data as $wp_note_data ) {

            echo ((bool)$wrap_widget) ?  $before_widget : '';
            include( plugin_dir_path( dirname( __FILE__ ) ) . 'public/public-widget-single-view.php' );
            echo ((bool)$wrap_widget) ?  $after_widget : '';
            $note_count++;

          }
        } else {

          echo ((bool)$wrap_widget) ?  $before_widget : '';
          include( plugin_dir_path( dirname( __FILE__ ) ) . 'public/public-widget-empty-view.php' );
          echo ((bool)$wrap_widget) ?  $after_widget : '';

        }

        $widget_string .= ob_get_clean();
        $cache[ $args['widget_id'] ] = $widget_string;
        wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );

      } else {

        $widget_string = ((bool)$wrap_widget) ?  $before_widget : '';
        ob_start();
        include( plugin_dir_path( dirname( __FILE__ ) ) . 'public/public-widget-view.php' );
        $widget_string .= ob_get_clean();
        $widget_string .= ((bool)$wrap_widget) ?  $after_widget : '';
        $cache[ $args['widget_id'] ] = $widget_string;
        wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );  

      }

      print $widget_string;
      wp_reset_postdata();
    } // end widget
    
    

    public function flush_widget_cache() 
    {
        wp_cache_delete( $this->get_widget_slug(), 'widget' );
    }


    /**
     * Processes the widget's options to be saved.
     *
     * @since 0.1.0  
     * @param array new_instance The new instance of values to be generated via the update.
     * @param array old_instance The previous instance of values before the update.
     */
    public function update( $new_instance, $old_instance ) {

      $instance = $old_instance;

      $instance = array();

      $instance['title']                    = ( !empty($new_instance['title'])                    ? sanitize_text_field( $new_instance['title']) : '' );
      $instance['thumb_tack_colour']        = ( !empty($new_instance['thumb_tack_colour'])        ? sanitize_text_field( $new_instance['thumb_tack_colour']) : '' );
      $instance['text_colour']              = ( !empty($new_instance['text_colour'])              ? sanitize_text_field( $new_instance['text_colour']) : '' );
      $instance['background_colour']        = ( !empty($new_instance['background_colour'])        ? sanitize_text_field( $new_instance['background_colour']) : '' );
      $instance['use_custom_style']         = ( !empty($new_instance['use_custom_style'])         ? sanitize_text_field( $new_instance['use_custom_style']) : '' );
      $instance['hide_if_empty']            = ( !empty($new_instance['hide_if_empty'])            ? sanitize_text_field( $new_instance['hide_if_empty']) : '' );
      $instance['wrap_widget']              = ( !empty($new_instance['wrap_widget'])              ? sanitize_text_field( $new_instance['wrap_widget']) : '' );
      $instance['multiple_notes']           = ( !empty($new_instance['multiple_notes'])           ? sanitize_text_field( $new_instance['multiple_notes']) : '' );
      $instance['show_date']                = ( !empty($new_instance['show_date'])                ? sanitize_text_field( $new_instance['show_date']) : '' );
      $instance['enable_social_share']      = ( !empty($new_instance['enable_social_share'])      ? sanitize_text_field( $new_instance['enable_social_share']) : '' );
      $instance['font_size']                = ( !empty($new_instance['font_size'])                ? sanitize_text_field( $new_instance['font_size']) : 'normal' );
      $instance['font_style']               = ( !empty($new_instance['font_style'])               ? sanitize_text_field( $new_instance['font_style']) : 'kalam' );
      $instance['do_not_force_uppercase']   = ( !empty($new_instance['do_not_force_uppercase'])   ? sanitize_text_field( $new_instance['do_not_force_uppercase']) : '' );
      $instance['post_adjustment_type']     = ( !empty($new_instance['post_adjustment_type'])     ? sanitize_text_field( $new_instance['post_adjustment_type']) : 'none' );
      
      if (!empty($new_instance['post_adjustment_list']) ) {
        $sanitized_adjustment_posts = array();
        $post_adjustment_list = $new_instance['post_adjustment_list'];
        foreach ($post_adjustment_list as &$post_adjustment_id) {
          $sanitized_adjustment_posts[] = sanitize_text_field($post_adjustment_id);
        }
        $instance['post_adjustment_list']     =  serialize($sanitized_adjustment_posts);        
      } else {
        $instance['post_adjustment_list']     =  serialize(array()); 
      }
      


      do_action( 'wp_editor_widget_update', $new_instance, $instance );

      return apply_filters( 'wp_editor_widget_update_instance', $instance, $new_instance );


    } // end update


    /**
     * Generates the administration form for the widget.
     *
     * @since  0.1.0
     * @param array instance The array of keys and values for the widget.
     */
    public function form( $instance ) {

      $instance = wp_parse_args(
        (array) $instance
      );
      
      include( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wp-notes-widget-data.php' );

      $widget_data = getNotesWidgetData($instance);

      extract( $widget_data, EXTR_SKIP );
      // Display the admin form
      include( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin-widget-view.php' );

    } // end form

  } // end wp-notes-widget class



/**
 * Since PHP can't have nested classes we needed to have this wrapper as a separate class
 *
 * @since  0.1.0
 * @package    WP_Notes
 * @subpackage WP_Notes/includes
 */
class WP_Notes_Widget_Container {

  /**
   * The ID of this plugin.
   *
   * @since    0.1.0
   * @access   private
   * @var      string    $name    The ID of this plugin.
   */
  private $name;

  /**
   * The version of this plugin.
   *
   * @since    0.1.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @since    0.1.0
   * @var      string    $name       The name of this plugin.
   * @var      string    $version    The version of this plugin.
   */
  public function __construct( $name, $version ) {

    $this->name = $name;
    $this->version = $version;

  }

  function register_wp_notes_widget() {
    register_widget( 'WP_Notes_Widget' );
  }

} //end WP_Notes_Widget_Container class