<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @since      0.1.0
 *
 * @package    WP_Notes
 * @subpackage WP_Notes/includes
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    WP_Notes
 * @subpackage WP_Notes/admin
 */
class WP_Notes_Admin {

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


  /**
   * Create the Notes post type
   * 
   * @since 0.1.0
   */
    function notes_post_type_init() {

      $labels = array(
      'name'               => _x( 'Notes', 'post type general name', 'wp-notes-widget' ),
      'singular_name'      => _x( 'Note', 'post type singular name', 'wp-notes-widget' ),
      'menu_name'          => _x( 'Notes', 'admin menu', 'wp-notes-widget' ),
      'name_admin_bar'     => _x( 'Note', 'add new on admin bar', 'wp-notes-widget' ),
      'add_new'            => _x( 'Add New', 'nw-item', 'wp-notes-widget' ),
      'add_new_item'       => esc_html__( 'Add New Note', 'wp-notes-widget' ),
      'new_item'           => esc_html__( 'New Note', 'wp-notes-widget' ),
      'edit_item'          => esc_html__( 'Edit Note', 'wp-notes-widget' ),
      'view_item'          => esc_html__( 'View Note', 'wp-notes-widget' ),
      'all_items'          => esc_html__( 'All Notes', 'wp-notes-widget' ),
      'search_items'       => esc_html__( 'Search Notes', 'wp-notes-widget' ),
      'parent_item_colon'  => esc_html__( 'Parent Notes:', 'wp-notes-widget' ),
      'not_found'          => esc_html__( 'No notes found.', 'wp-notes-widget' ),
      'not_found_in_trash' => esc_html__( 'No notes found in Trash.', 'wp-notes-widget' )
    );

    $args = array(
      'labels'                => $labels,
      'public'                => false,
      'publicly_queryable'    => false,
      'exclude_from_search'   => true,
      'show_ui'               => true, 
      'show_in_menu'          => true, 
      'query_var'             => true,
      'rewrite'               => false,
      'capability_type'       => 'post',
      'has_archive'           => false, 
      'hierarchical'          => false,
      'menu_position'         => null,
      'supports'              => array('title','page-attributes')
    ); 

    register_post_type('nw-item',$args);

  } // end notes_post_type_init



  /**
   * Create new image size for image displayed in note
   * 
   * @since    0.1.3
   */
  function add_notes_image_size() {
    add_image_size( 'wp-notes-widget-image', 400 );
  }


  /**
   * Notes admin update messages.
   *
   * See /wp-admin/edit-form-advanced.php
   * @since    0.1.3
   * @param array $messages Existing post update messages.
   * @return array Amended post update messages with new Note update messages.
   */
  function notes_post_updated_messages( $messages ) {

    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );
    
    $messages['nw-item'] = array(
      0  => '', // Unused. Messages start at index 1.
      1  => esc_html__( 'Note updated.' ),
      2  => esc_html__( 'Note details updated.' ),
      3  => esc_html__( 'Note details deleted.'),
      4  => esc_html__( 'Note updated.' ),
      /* translators: %s: date and time of the revision */
      5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Note restored to revision from %s.' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6  => esc_html__( 'Note published.' ),
      7  => esc_html__( 'Note saved.' ),
      8  => esc_html__( 'Note submitted.' ),
      9  => sprintf(
        esc_html__( 'Note scheduled for: <strong>%1$s</strong>.' ),
        // translators: Publish box date format, see http://php.net/date
        date_i18n( esc_html__( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )
      ),
      10 => esc_html__( 'Note draft updated.' )
    );
   
    return $messages;
  } // end notes_post_updated_messages



  /*============================================================================
    DISPLAY NOTE META BOXES
  ==============================================================================*/

  /**
  * Adds the meta box below the post content editor on the post edit dashboard.
  * 
  * @since    0.1.0
  */
  function add_note_metabox() {

    add_meta_box(
      'WP_Notes_item_content',
      esc_html__( 'Note Content', 'wp-notes-widget' ),
      array( $this, 'WP_Notes_meta_display' ),
      'nw-item',
      'normal',
      'high'
    );

    add_meta_box(
      'WP_Notes_item_twitter',
      esc_html__( 'Auto Twitter Post', 'wp-notes-widget' ),
      array( $this, 'WP_Notes_twitter_post_display' ),
      'nw-item',
      'side',
      'high'
    );

  }


  /**
   * meta_box for Tweet related fields.
   *
   * @since    0.2.0
   */
  function WP_Notes_twitter_post_display( $post ) {
    
    $twitter_credentials = get_option( 'wp_notes_widget_twitter_credentials' );  

    if (!empty($twitter_credentials['api_key']) && 
      !empty($twitter_credentials['api_secret']) && 
      !empty($twitter_credentials['token']) && 
      !empty($twitter_credentials['token_secret']) ) { 
      //if Twitter API credentials are set

      if ( get_transient('twit_url_short') && get_transient('twit_url_short_s') ) {
        //check to see if cached copy of url lengths are still valid

        $twitter_url_short_length       = get_transient('twit_url_short');
        $twitter_url_short_length_https = get_transient('twit_url_short_s');  
      
      } else {
        //if cached copy of url lengths are too old, we need to contact twitter and get these values again


        /*==========  LOAD AND SET UP TWITTER API LIBRARY  ==========*/

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/codebird/src/codebird.php';
        
        $twitter_credentials['api_key']       = trim($twitter_credentials['api_key']);
        $twitter_credentials['api_secret']    = trim($twitter_credentials['api_secret']);
        $twitter_credentials['token']         = trim($twitter_credentials['token']); 
        $twitter_credentials['token_secret']  = trim($twitter_credentials['token_secret']);

        WP_Notes_Widget_Codebird::setConsumerKey($twitter_credentials['api_key'], $twitter_credentials['api_secret']); // static, see 'Using multiple Codebird instances'
        $cb = WP_Notes_Widget_Codebird::getInstance();
        $cb->setToken($twitter_credentials['token'], $twitter_credentials['token_secret']);

        $reply = $cb->help_configuration();
        
        $twitter_url_short_length       = !empty($reply->short_url_length) ? $reply->short_url_length : 22;
        $twitter_url_short_length_https = !empty($reply->short_url_length_https) ? $reply->short_url_length_https : 23;        

        set_transient( 'twit_url_short', $twitter_url_short_length,  (60 * 60 * 24) );
        set_transient( 'twit_url_short_s', $twitter_url_short_length_https,  (60 * 60 * 24) );

      }

      include( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wp-notes-post-data.php' );
      
      $wp_notes_twitter_data    = getNotePostTwitterData( $post->ID);
      $wp_notes_tweet_history   = getNotePostTweetHistory( $post->ID);
      
      ob_start();
      include( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin-post-twitter-view.php' );
      $html = ob_get_clean();
      echo $html;

    } else {

      include( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin-post-twitter-no-credentials-view.php' );

    }
  }


  /**
   * Renders the nonce, textarea, and text inputs for the note.
   *
   * @since   0.1.0
   * @param   $post   current post object 
   */
  function WP_Notes_meta_display( $post ) {
    
    include( plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wp-notes-post-data.php' );
    
    $wp_notes_data = getNotePostData( $post->ID);

    function WP_Notes_get_hidden_class_output($action_link_type,  $link_type, $is_default = 0 ) {
      if ($is_default && empty($action_link_type) ) {
        return;
      }
      if (empty($action_link_type) || ($action_link_type != $link_type) ) {
        echo 'wp-notes-hidden';
      }

    }

    function WP_Notes_get_selected_output($action_link_type, $link_type, $is_default = 0  ) {
      if ($is_default && empty($action_link_type) ) {
        echo 'checked';
        return;
      }
      if ($action_link_type == $link_type ) {
        echo 'checked';
      }
    }

    wp_nonce_field( plugin_basename( __FILE__ ), 'WP_Notes_nonce' );
    ob_start();
    include( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin-post-view.php' );
    $html = ob_get_clean();
    echo $html;

  } // end WP_Notes_meta_display



  /*============================================================================
    SAVE NOTE ACTIONS
  ==============================================================================*/

   /**
   * Saves the note for the given post.
   *
   * @since    0.1.0
   * @param  $post_id  The ID of the post that we're serializing
   */
  function save_note( $post_id ) {

    if( isset( $_POST['WP_Notes_nonce'] ) && isset( $_POST['post_type'] ) ) {

      // Don't save if the user hasn't submitted the changes
      if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
      } 

      // Verify that the input is coming from the proper form
      if( ! wp_verify_nonce( $_POST['WP_Notes_nonce'], plugin_basename( __FILE__ ) ) ) {
        return;
      } 

      // Make sure the user has permissions to post
      if( 'nw-item' == $_POST['post_type']) {
        if( ! current_user_can( 'edit_post', $post_id ) ) {
          return;
        } 
      } 

    
      /*==========  SAVE NOTE META DATA  ==========*/

      //sanitize all of the POST data and place it into an array. 
      $wp_notes_data = array();
      $wp_notes_data['text']                 = isset( $_POST['WP_Notes_text'] ) ?  implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $_POST['WP_Notes_text'] ) ))  : '';
      //the filter for this text only allows for newline characters as well as regular characters

      $wp_notes_data['action_text']         = isset( $_POST['WP_Notes_action_text'] )           ? sanitize_text_field($_POST['WP_Notes_action_text']) : '';
      $wp_notes_data['action_link']         = isset( $_POST['WP_Notes_action_link'])            ? wpnw_addhttp( sanitize_text_field($_POST['WP_Notes_action_link'])) : '';
      $wp_notes_data['image_id']            = isset( $_POST['WP_Notes_image_id'] )              ? sanitize_text_field($_POST['WP_Notes_image_id']) : '';
      $wp_notes_data['download_id']         = isset( $_POST['WP_Notes_download_id'] )           ? sanitize_text_field($_POST['WP_Notes_download_id']) : '';
      $wp_notes_data['plain_link_new_tab']  = isset( $_POST['WP_Notes_plain_link_new_tab'] )    ? sanitize_text_field($_POST['WP_Notes_plain_link_new_tab']) : '';
      $wp_notes_data['action_link_type']    = isset( $_POST['WP_Notes_action_link_type'] )      ? sanitize_text_field($_POST['WP_Notes_action_link_type']) : '';
      
      $wp_notes_data['media_embed_type']    = isset( $_POST['WP_Notes_media_type'] )            ? sanitize_text_field($_POST['WP_Notes_media_type']) : '';
      $wp_notes_data['media_video_link']    = isset( $_POST['WP_Notes_video_embed_link'] )      ? sanitize_text_field($_POST['WP_Notes_video_embed_link']) : '';
      $wp_notes_data['media_audio_id']      = isset( $_POST['WP_Notes_audio_id'] )              ? sanitize_text_field($_POST['WP_Notes_audio_id']) : '';

      //Wordpress automatically serializes the data and updates database with the new values.
      update_post_meta( $post_id, 'WP_Notes_data', $wp_notes_data );
      


      /*==========  PARSE AND SAVE TWITTER RELATED DATA  ==========*/
      
      $push_tweet = 0;
      if (isset($_POST['WP_Notes_push_tweet'])) {
        $push_tweet = 1;
      }

      $wp_notes_twitter_data['push_tweet']       = null; //set this value to null so user will have to manually check the checkbox again if they want to send another tweet
      $wp_notes_twitter_data['tweet_body']       = isset( $_POST['WP_Notes_tweet_body'] )     ? sanitize_text_field($_POST['WP_Notes_tweet_body']) : '';
      
      //Wordpress automatically serializes the data and updates database with the new values.
      update_post_meta( $post_id, 'WP_Notes_twitter_data', $wp_notes_twitter_data );



      /*==========  TWITTER POSTING  ==========*/
      
      if ($push_tweet) {
        
        $twitter_credentials = get_option( 'wp_notes_widget_twitter_credentials' );  
        if (!empty($twitter_credentials['api_key']) && 
          !empty($twitter_credentials['api_secret']) && 
          !empty($twitter_credentials['token']) && 
          !empty($twitter_credentials['token_secret']) ) { 
          //if Twitter credentials are set

          //clean up potential whitespace. 
          $twitter_credentials['api_key']       = trim($twitter_credentials['api_key']);
          $twitter_credentials['api_secret']    = trim($twitter_credentials['api_secret']);
          $twitter_credentials['token']         = trim($twitter_credentials['token']);
          $twitter_credentials['token_secret']  = trim($twitter_credentials['token_secret']);

          require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/codebird/src/codebird.php';
          
          WP_Notes_Widget_Codebird::setConsumerKey($twitter_credentials['api_key'], $twitter_credentials['api_secret']); // static, see 'Using multiple Codebird instances'
          $cb = WP_Notes_Widget_Codebird::getInstance();
          $cb->setToken($twitter_credentials['token'], $twitter_credentials['token_secret']);

          // Parse status content and embed link, if needed
          switch ($wp_notes_data['action_link_type']) {
            case "plain":
              $embed_link = $wp_notes_data['action_link'];

              break;
            case "download":

              if ((bool)$wp_notes_data['download_id']) {
                $embed_link = wp_get_attachment_url( $wp_notes_data['download_id'] );
              } else {
                $embed_link = '';  
              }

              break;
            default:
              $embed_link = '';

              break;
          }

          $tweet_text =str_replace("*url*", $embed_link, $wp_notes_twitter_data['tweet_body']);
          
          // Check if a video url has been entered and insert into tweet if present
          if (!empty($wp_notes_data['media_video_link'])) {
            $tweet_text =str_replace("*video*", $wp_notes_data['media_video_link'], $tweet_text);
          } else {

            // if video placeholder is being used, but video url is not present, remove video placeholder from tweet body
            $tweet_text =str_replace("*video*", '', $tweet_text);
          }

          //send the tweet to twitter
          if (empty($wp_notes_data['image_id'] )) {
            $reply = $cb->statuses_update('status=' . $tweet_text);
          
          } else {
            
            $file = wp_get_attachment_image_src( $wp_notes_data['image_id'], array(600,600) );
            $file = $file[0];
            $reply = $cb->media_upload(array(
                'media' => $file
            ));

            $media_id = $reply->media_id_string;
            $reply = $cb->statuses_update(array(
                'status' => $tweet_text,
                'media_ids' => $media_id
            ));

          }

          //set up appropriate notice based on twitter response
          $status_class = substr($reply->httpstatus,0, 1); 
          switch ($status_class) {
            case "2":

              $wp_notes_tweet_history = get_post_meta( $post_id, 'WP_Notes_tweet_history', true );
              
              //if tweet is sent successfully, we add a timestamp to the tweet history
              if (empty($wp_notes_tweet_history)) {
                $wp_notes_tweet_history = array();
              }
              array_push($wp_notes_tweet_history, current_time('timestamp') );
              update_post_meta( $post_id, 'WP_Notes_tweet_history', $wp_notes_tweet_history );

              add_filter( 'redirect_post_location', array( $this, 'add_notice_twitter_success' ), 99 );
              break;
            case "4":
              add_filter( 'redirect_post_location', array( $this, 'add_notice_twitter_error' ), 99 );
              break;
            case "5":
              add_filter( 'redirect_post_location', array( $this, 'add_notice_twitter_down' ), 99 );
              break;
            
          }
        }
      }
    } // end if

  } // end save_note



  /*============================================================================
    ADMIN NOTICES FROM TWITTER POST RESPONSE
  ==============================================================================*/

  public function add_notice_twitter_success( $location ) {
     remove_filter( 'redirect_post_location', array( $this, 'add_notice_twitter_success' ), 99 );
     return add_query_arg( array( 'twitter_update_status' => '2' ), $location );
  }

  public function add_notice_twitter_error( $location ) {
     remove_filter( 'redirect_post_location', array( $this, 'add_notice_twitter_error' ), 99 );
     return add_query_arg( array( 'twitter_update_status' => '4' ), $location );
  }

  public function add_notice_twitter_down( $location ) {
     remove_filter( 'redirect_post_location', array( $this, 'add_notice_twitter_down' ), 99 );
     return add_query_arg( array( 'twitter_update_status' => '5' ), $location );
  }

  public function twitter_admin_notices() {
     if ( ! isset( $_GET['twitter_update_status'] ) ) {
       return;
     } else {

       switch ($_GET['twitter_update_status']) {
        case "2":
          ?>
           <div class="updated">
            <p><?php _e('Tweet successfully posted.', 'wp-notes-widget') ?></p>
           </div>

          <?php
          break;
        case "4":
          ?>
           <div class="error">
            <p><?php _e('There was an error posting your Tweet. Check your configuration and ensure your Tweet is not a recent duplicate, and does not exceed 140 characters.', 'wp-notes-widget') ?></p>
           </div>

          <?php
          break;
        case "5":
           ?>
           <div class="error">
            <p><?php _e('Twitter is currently experiencing technical difficulties and your Tweet cannot be sent right now. Please try again later.', 'wp-notes-widget') ?></p>
           </div>

           <?php
          break;
        
      }
     }
  }



  /*============================================================================
    SETTINGS PAGE
  ==============================================================================*/

  /**
   *
   * Add Settings Page to menu
   *
   * @since 1.0.0 
   */
  function wp_notes_add_settings_page() {
 
    add_submenu_page(
      'options-general.php',
      'WP Notes Widget Settings',                           // The title to be displayed in the browser window for this page.
      'WP Notes Widget',                                    // The text to be displayed for this menu item
      'manage_options',                                     // Which type of users can see this menu item
      'wp-notes-widget-settings',                           // The unique ID - that is, the slug - for this menu item
       array( $this, 'wp_notes_widget_settings_display')    // The name of the function to call when rendering this menu's page
    );
   
  } 
 
  /**
   *
   * Output default settings page content
   *
   * @since 1.0.0 
   */
  function wp_notes_widget_settings_display() {

    require plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin-settings-page-promo-sidebar.php';

  } 

  /**
  * Setup of Twitter credentials page
  * 
  * @since 0.2.0
  */ 
  function wp_notes_initialize_settings() {
    require plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin-settings-page-setup.php';
  } //end wp_notes_initialize_settings
  

 
  /*============================================================================
    FEEDBACK ADMIN NOTICE
  ==============================================================================*/

  /**
  * Create the notice that will ask users for feedback. 
  * 
  * @since 0.1.4
  */
  function add_feedback_notice() {
    global $current_user;
    $userid = $current_user->ID;

    if ( !get_user_meta( $userid, 'dismiss_wp_notes_widget_notice' )  ) {
      echo '
        <div class="updated">
          <p>Thanks for downloading/updating WP Notes Widget!
          What features would you like to see? 
          Let us know on the <a href="https://wordpress.org/support/plugin/wp-notes-widget" target="_blank" >support forums</a> or <a href="https://twitter.com/webrockstar_net" target="_blank" >Twitter</a>. <a href="?dismiss_wp_notes_widget_notice=yes" class="button-primary" >Dismiss</a></p>
        </div>';
    } 

  } // end add_feedback_notice


  /**
  * To ensure the notice is not displayed after it is dismissed, a flag is set in the metadata for the user.
  * 
  * @since 0.1.4
  */
  function dismiss_feedback_notice() {
    
    global $current_user;
    $userid = $current_user->ID;
    
    // If "Dismiss" link has been clicked, user meta field is added
    if ( isset( $_GET['dismiss_wp_notes_widget_notice'] ) && 'yes' == $_GET['dismiss_wp_notes_widget_notice'] ) {
      add_user_meta( $userid, 'dismiss_wp_notes_widget_notice', 'yes', true );
    }

  } // end dismiss_feedback_notice



  /*============================================================================
    ENQUEUE SCRIPTS AND STYLES
  ==============================================================================*/

  /**
   * Register the stylesheets for the Dashboard.
   *
   * @since    0.1.0
   */
  public function enqueue_styles($hook) {

    /**
     *
     * An instance of this class should be passed to the run() function
     * defined in WP_Notes_Admin_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The WP_Notes_Admin_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */
    if ('settings_page_wp-notes-widget-settings' == $hook || 'post.php' == $hook || 'post-new.php' == $hook ) {
      //wp_enqueue_style( 'wp-notes-bootstrap-theme-css', plugin_dir_url( __FILE__ ) . 'css/wp-ace-bootstrap-theme.css', array(), $this->version, 'all' );
      wp_enqueue_style( 'wp-notes-bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap-4.5.3.css', array(), $this->version, 'all' );
      wp_enqueue_style( 'wp-notes-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all' );
    }

    wp_enqueue_style( $this->name, plugin_dir_url( __FILE__ ) . 'css/wp-notes-admin.css', array(), filemtime(plugin_dir_path( __FILE__ ) . 'css/wp-notes-admin.css'), 'all' );
  }


  /**
   * Register the JavaScript for the dashboard.
   *
   * @since    0.1.0
   */
  public function enqueue_scripts($hook) {

    /**
     *
     * An instance of this class should be passed to the run() function
     * defined in WP_Notes_Admin_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The WP_Notes_Admin_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     *
     * Need to evaluate best approach for enqueing js/css files needed to select media.
     * wp_enqueue_media() works, but it breaks the consistency of how hooks are queued in the plugin. 
     */

    if   ( 
      ('post-new.php' == $hook && isset($_GET['post_type']) && $_GET['post_type'] == 'nw-item' ) || 
      ('post.php' == $hook && isset($_GET['post']) && get_post_type( $_GET['post'] ) == 'nw-item' ) 
      ) { 

      wp_enqueue_media();
       
      wp_enqueue_script( $this->name, plugin_dir_url( __FILE__ ) . 'js/wp-notes-admin.js', array( 'jquery' ), $this->version, false );

      // Localize the script with new data
      $translation_array = array(
        'audio_choose'    => esc_html__( 'Choose an audio file for the note', 'wp-notes-widget' ),
        'audio_add'       => esc_html__( 'Add Audio', 'wp-notes-widget' ),
        'image_choose'    => esc_html__( 'Choose an image for the note', 'wp-notes-widget' ),
        'image_add'       => esc_html__( 'Add Image', 'wp-notes-widget' ),
        'download_choose' => esc_html__( 'Choose an file to attach as a download', 'wp-notes-widget' ),
        'download_add'    => esc_html__( 'Add Download', 'wp-notes-widget' )
      );

      wp_localize_script( $this->name, 'translations', $translation_array );

    } elseif ('widgets.php' == $hook) {
      wp_enqueue_script( 'wpnw-admin-widget', plugin_dir_url( __FILE__ ) . 'js/wp-notes-widget-admin.js', array( 'jquery' ), $this->version, false );
    } elseif ('settings_page_wp-notes-widget-settings' == $hook ) {
      wp_enqueue_script('jquery');
      wp_enqueue_script( 'wp-notes-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap-4.5.3.bundle.min.js', array( 'jquery' ), $this->version, false );
      wp_enqueue_script( 'wp-notes-settings-js', plugin_dir_url( __FILE__ ) . 'js/wp-notes-settings-admin.js', array( 'jquery' ), filemtime(plugin_dir_path( __FILE__ ) . 'js/wp-notes-settings-admin.js'), false ); 
    } elseif (('post.php' == $hook && isset($_GET['post'])) || 'post-new.php' == $hook ) {
      wp_enqueue_script( 'wp-notes-sc-editor', plugin_dir_url( __FILE__ ) . 'js/shortcode-editor.js', array( 'jquery' ), filemtime(plugin_dir_path( __FILE__ ) . 'js/shortcode-editor.js'), false );
      wp_enqueue_script('jquery');
      wp_enqueue_script( 'wp-ace-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap-4.5.3.bundle.min.js', array( 'jquery' ), $this->version, false );
    }

  }


  /**
   * Store plugin version for future reference and use 
   *
   * @since  0.5.0
   */
  function version_check() {
    $cur_version = get_option('wpnw_version');
    if ($cur_version != $this->version) {
      // if versions do not match a new version of the plugin is running
      
      update_option( 'wpnw_version', $this->version);
    }
  }


  /**
   * Add Shortcode editor modal activation button to content editor interface 
   *
   * @since  1.0.0 
   */
  function shortcode_editor_button() {
    $screen = get_current_screen();
    if ( $screen->parent_base == 'edit' ) {
    ?>
      <a href="#" id="insert-wp-notes-widget-shortcode" class="button">
        <span>
          <?php _e('Add WP Notes', 'wp-notes-widget'); ?>
        </span>
      </a>
    <?php
    }
  }


  /**
   * Shortcode editor modal content output
   *
   * @since  1.0.0  
   */
  function shortcode_editor_modal() {
    $screen = get_current_screen();
    if ($screen->base == 'post' ) {
    
      $default_val = get_option( 'wp_notes_widget_defaults' );
      if (!$default_val) {
        $default_val = array();
      }

      if (!isset($default_val['thumb_tack_colour'])){
        $default_val['thumb_tack_colour'] = WP_NOTES::get_plugin_default_setting('thumb_tack_colour');
      }
      if (!isset($default_val['background_colour'])){
        $default_val['background_colour'] = WP_NOTES::get_plugin_default_setting('background_colour');
      }
      if (!isset($default_val['text_colour'])){
        $default_val['text_colour'] = WP_NOTES::get_plugin_default_setting('text_colour');
      }
      if (!isset($default_val['font_size'])){
        $default_val['font_size'] = WP_NOTES::get_plugin_default_setting('font_size');
      }
      if (!isset($default_val['show_date'])){
        $default_val['show_date'] = WP_NOTES::get_plugin_default_setting('show_date');
      }
      if (!isset($default_val['use_custom_style'])){
        $default_val['use_custom_style'] = WP_NOTES::get_plugin_default_setting('use_custom_style');
      }
      if (!isset($default_val['hide_if_empty'])){
        $default_val['hide_if_empty'] = WP_NOTES::get_plugin_default_setting('hide_if_empty');
      }
      if (!isset($default_val['multiple_notes'])){
        $default_val['multiple_notes'] = WP_NOTES::get_plugin_default_setting('multiple_notes');
      }
      if (!isset($default_val['enable_social_share'])){
        $default_val['enable_social_share'] = WP_NOTES::get_plugin_default_setting('enable_social_share');
      }
      if (!isset($default_val['do_not_force_uppercase'])){
        $default_val['do_not_force_uppercase'] = WP_NOTES::get_plugin_default_setting('do_not_force_uppercase');
      }
      if (!isset($default_val['font_style'])){
        $default_val['font_style'] = WP_NOTES::get_plugin_default_setting('font_style');
      }
      
      $default_setting_val = get_option( 'wp_notes_widget_default_shortcode_settings' );
      if (!$default_setting_val) {
        $default_setting_val = array();
      }
      if (!isset($default_setting_val['max_width'])){
        $default_setting_val['max_width'] = WP_NOTES::get_plugin_default_shortcode_setting('max_width');
      }
      if (!isset($default_setting_val['max_width_units'])){
        $default_setting_val['max_width_units'] = WP_NOTES::get_plugin_default_shortcode_setting('max_width_units');
      }
      if (!isset($default_setting_val['alignment'])){
        $default_setting_val['alignment'] = WP_NOTES::get_plugin_default_shortcode_setting('alignment');
      }
      if (!isset($default_setting_val['direction'])){
        $default_setting_val['direction'] = WP_NOTES::get_plugin_default_shortcode_setting('direction');
      }

      require plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/admin-post-shortcode-editor-modal.php';
    }

  }
}
