<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      0.1.0
 *
 * @package    WP_Notes
 * @subpackage WP_Notes/includes
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    WP_Notes
 * @subpackage WP_Notes/admin
 */
class WP_Notes_Public {

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
   * @var      string    $name       The name of the plugin.
   * @var      string    $version    The version of this plugin.
   */
  public function __construct( $name, $version ) {

    $this->name = $name;
    $this->version = $version;

  }

  
  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    0.1.0
   */
  public function enqueue_styles() {

    /**
     *
     * An instance of this class should be passed to the run() function
     * defined in WP_Notes_Public_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The WP_Notes_Public_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */
    
    wp_enqueue_style( $this->name . '-style', plugin_dir_url( __FILE__ ) . 'css/wp-notes-public.css', array(), $this->version, 'all' );

  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    0.1.0
   */
  public function enqueue_scripts() {

    /**
     *
     * An instance of this class should be passed to the run() function
     * defined in WP_Notes_Public_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The WP_Notes_Public_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     *
     * Currently there are no scripts to include
     */
    wp_enqueue_style( $this->name . '-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), $this->version, 'all' );

    wp_enqueue_script( $this->name, plugin_dir_url( __FILE__ ) . 'js/wp-notes-widget-public.js', array( 'jquery' ), filemtime(plugin_dir_path( __FILE__ ) . 'js/wp-notes-widget-public.js'), false );

  }


  public static function get_video_embed_link($raw_url) {
    $url = $raw_url;

    // Google video
    if(preg_match("/video.google.com(.+)docid=([^&]+)/", $url)) {
      preg_match("/docid=([^&]+)/", $url, $matches);
      if(isset($matches[1])) {
        $url = 'https://video.google.com/googleplayer.swf?docId='.$matches[1].'&hl=en';
      }
    }

    // Vimeo video
    else if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url)) {
      preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $matches);
      if(isset($matches[5])) {
        $url = 'https://player.vimeo.com/video/'.$matches[5];
      }
    }

    else if (preg_match("/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/", $url)) {
      preg_match("/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/", $url, $matches);
      if(isset($matches[7])) {
        $url = 'https://www.youtube.com/embed/'.$matches[7];
      }      
    }

    return $url;
  }
}
