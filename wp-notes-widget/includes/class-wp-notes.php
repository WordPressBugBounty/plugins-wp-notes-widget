<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @since      0.1.0
 *
 * @package    WP_Notes
 * @subpackage WP_Notes/includes
 */

if(!defined("WP_NOTES_WIDGET_PRO_LINK")){
  define("WP_NOTES_WIDGET_PRO_LINK",     "http://webrockstar.net/downloads/wp-notes-widget-pro");
}

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    WP_Notes
 * @subpackage WP_Notes/includes
 */
class WP_Notes {

  /**
   * The loader that's responsible for maintaining and registering all hooks that power
   * the plugin.
   *
   * @since    0.1.0
   * @access   protected
   * @var      WP_Notes_Loader    $loader    Maintains and registers all hooks for the plugin.
   */
  protected $loader;

  /**
   * The unique identifier of this plugin.
   *
   * @since    0.1.0
   * @access   protected
   * @var      string    $WP_Notes    The string used to uniquely identify this plugin.
   */
  protected $WP_Notes;

  /**
   * The current version of the plugin.
   *
   * @since    0.1.0
   * @access   protected
   * @var      string    $version    The current version of the plugin.
   */
  protected $version;

  /**
   * Define the core functionality of the plugin.
   *
   * Set the plugin name and the plugin version that can be used throughout the plugin.
   * Load the dependencies, define the locale, and set the hooks for the Dashboard and
   * the public-facing side of the site.
   *
   * @since    0.1.0
   */
  public function __construct() {

    $this->WP_Notes = 'wp-notes';
    $this->version = '1.0.6';

    $this->load_dependencies();
    $this->set_locale();
    $this->define_admin_hooks();
    $this->define_public_hooks();
    $this->define_widget();

  }

  /**
   * Load the required dependencies for this plugin.
   *
   * Include the following files that make up the plugin:
   *
   * - WP_Notes_Loader. Orchestrates the hooks of the plugin.
   * - WP_Notes_i18n. Defines internationalization functionality.
   * - WP_Notes_Admin. Defines all hooks for the dashboard.
   * - WP_Notes_Public. Defines all hooks for the public side of the site.
   * - WP_Notes_Widget. Defines all widget functionality with respect to register_widget
   * 
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   *
   * @since    0.1.0
   * @access   private
   */
  private function load_dependencies() {

    /**
     * The class responsible for orchestrating the actions and filters of the
     * core plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-notes-loader.php';

    /**
     * The class responsible for defining internationalization functionality
     * of the plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-notes-i18n.php';

    /**
     * The class responsible for defining all actions that occur in the Dashboard.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wp-notes-admin.php';

    /**
     * The class responsible for defining all actions that occur in the public-facing
     * side of the site.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wp-notes-public.php';


    /**
     * The class responsible for extending WP_Widget as per standard wordpress practice to create widgets
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-notes-widget.php';


    $this->loader = new WP_Notes_Loader();

  }

  /**
   * Define the locale for this plugin for internationalization.
   *
   * Uses the WP_Notes_i18n class in order to set the domain and to register the hook
   * with WordPress.
   *
   * @since    0.1.0
   * @access   private
   */
  private function set_locale() {

    $plugin_i18n = new WP_Notes_i18n();
    $plugin_i18n->set_domain( $this->get_WP_Notes() );

    $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

  }


  /**
   * 
   *
   * @since    0.1.0
   * @access   private
   */
  private function define_widget() {

    $plugin_widget = new WP_Notes_Widget_Container( $this->get_WP_Notes(), $this->get_version() );

    $this->loader->add_action( 'widgets_init', $plugin_widget, 'register_wp_notes_widget' );

  }


  /**
   * Register all of the hooks related to the dashboard functionality
   * of the plugin.
   *
   * @since    0.1.0
   * @access   private
   */
  private function define_admin_hooks() {

    $plugin_admin = new WP_Notes_Admin( $this->get_WP_Notes(), $this->get_version() );
    
    $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
    $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
    $this->loader->add_action( 'add_meta_boxes',        $plugin_admin, 'add_note_metabox' );
    $this->loader->add_action( 'save_post',             $plugin_admin, 'save_note' );
    $this->loader->add_action( 'init',                  $plugin_admin, 'version_check');
    $this->loader->add_action( 'init',                  $plugin_admin, 'notes_post_type_init');
    $this->loader->add_action( 'init',                  $plugin_admin, 'add_notes_image_size'); 
    $this->loader->add_action( 'admin_notices',         $plugin_admin, 'add_feedback_notice'); 
    $this->loader->add_action( 'admin_init',            $plugin_admin, 'dismiss_feedback_notice');
    $this->loader->add_action( 'admin_notices',         $plugin_admin, 'twitter_admin_notices'); 
    $this->loader->add_action( 'admin_menu',            $plugin_admin, 'wp_notes_add_settings_page'); 
    $this->loader->add_action( 'admin_init',            $plugin_admin, 'wp_notes_initialize_settings'); 
    $this->loader->add_filter( 'post_updated_messages', $plugin_admin, 'notes_post_updated_messages');
    if (is_admin()) {
      $this->loader->add_filter( 'media_buttons',         $plugin_admin, 'shortcode_editor_button', 99);
    }
    $this->loader->add_filter( 'admin_footer',          $plugin_admin, 'shortcode_editor_modal');  
    
  }

  /**
   * Register all of the hooks related to the public-facing functionality
   * of the plugin.
   *
   * @since    0.1.0
   * @access   private
   */
  private function define_public_hooks() {

    $plugin_public = new WP_Notes_Public( $this->get_WP_Notes(), $this->get_version() );

    $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
    $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since    0.1.0
   */
  public function run() {
    $this->loader->run();
  }

  /**
   * The name of the plugin used to uniquely identify it within the context of
   * WordPress and to define internationalization functionality.
   *
   * @since     0.1.0
   * @return    string    The name of the plugin.
   */
  public function get_WP_Notes() {
    return $this->WP_Notes;
  }

  /**
   * The reference to the class that orchestrates the hooks with the plugin.
   *
   * @since     0.1.0
   * @return    WP_Notes_Loader    Orchestrates the hooks of the plugin.
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * Retrieve the version number of the plugin.
   *
   * @since     0.1.0
   * @return    string    The version number of the plugin.
   */
  public function get_version() {
    return $this->version;
  }

  /**
   * Retrieve plugin level default values
   *
   * @since     
   * @return    string    Value for default setting. Returns false if key is invalid.
   */
  public static function get_plugin_default_setting($key) {

    switch($key) {
      case 'thumb_tack_colour':
        return "red";
        break;
      case 'text_colour':
        return "red";
        break;
      case 'background_colour':
        return "yellow";
        break;
      case 'use_custom_style':
        return false;
        break;
      case 'show_date':
        return false;
        break;
      case 'multiple_notes':
        return false;
        break;
      case 'hide_if_empty':
        return false;
        break;
      case 'font_size':
        return "normal";
        break;
      case 'enable_social_share':
        return false;
        break;
      case 'font_style':
        return "kalam";
        break;
      case 'do_not_force_uppercase':
        return false;
        break;
      default:
        return false;
        break;
    }

  }

  /**
   * Retrieve plugin level shortcode default values
   *
   * @since     
   * @return    string    Value for shortcode default setting. Returns false if key is invalid.
   */
  public static function get_plugin_default_shortcode_setting($key) {

    switch($key) {
      case 'max_width':
        return "100";
        break;
      case 'max_width_units':
        return "percent";
        break;
      case 'alignment':
        return "left";
        break;
      case 'direction':
        return "vertical";
        break;
      default:
        return false;
        break;
    }

  }

}
