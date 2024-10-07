<?php

  /**
   * Default Settings Header Content
   *
   * @since 1.0.0  
   */
  function wp_notes_widget_default_settings_callback(  ) { 
    ?>
    
    <p class="wp-notes-widget-limit-width" >
      <?php esc_html_e( 'Default settings for the widget and shortcode.', 'wp-notes-widget' ); ?>
    </p>

    <?php
  }

  /**
   * Default Shortcode Settings Header Content
   *
   * @since 1.0.0   
   */
  function wp_notes_widget_default_shortcode_settings_callback(  ) { 
    ?>
    <div class="alert alert-info" role="alert">
      <i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo sprintf('Shortcodes allow you to insert notes into posts and pages. Shortcodes are available in %s. Shortcodes will not be rendered.', '<a href="'. WP_NOTES_WIDGET_PRO_LINK .'?utm_source=wp-notes-widget-plugin&utm_medium=settings-shortcode-tab" target="_blank" >WP Notes Widget PRO</a>'); ?> 
    </div>
    <p class="wp-notes-widget-limit-width" >
      <?php esc_html_e( 'Default shortcode specific settings.', 'wp-notes-widget' ); ?>
    </p>

    <?php
  }
   

  /*============================================================================
    TWITTER SETTINGS FIELDS AND CALLBACKS
  ==============================================================================*/

  // If the twitter credential options don't exist, create them.
  if( false == get_option( 'wp_notes_widget_twitter_credentials' ) ) {  
    add_option( 'wp_notes_widget_twitter_credentials' );
  } 

  /**
   * Twitter Credentials Settings Header Content
   *
   * @since 1.0.0   
   */
  function wp_notes_widget_twitter_credentials_callback(  ) { 
    ?>
    
    <p class="wp-notes-widget-limit-width" >
      <?php esc_html_e( 'Enter the credentials from the Twitter application you have set up. You can set up a new application on the 
        <a href="https://apps.twitter.com" target="_blank" >Twitter Application Management</a> 
        page. You will need these credentials in order to automatically post your notes to your Twitter account. 
        Be sure to allow for read <strong>and write</strong> privileges. 
        ', 'wp-notes-widget' ); ?>
    </p>

    <?php
  }


  /**
   * Twitter API field key callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_twitter_key_callback(  ) { 

    $options = get_option( 'wp_notes_widget_twitter_credentials' );  
    if (!$options) {
      $options = array();
    }
    if (!isset($options['api_key'])){
      $options['api_key'] = '';
    }
    ?>
      
      <div class="form-group">
        <label for="wp_notes_widget_twitter_credentials__api_key"><?php esc_html_e('API Key','wp-notes-widget'); ?></label>
        <input type='text' id="wp_notes_widget_twitter_credentials__api_key" name='wp_notes_widget_twitter_credentials[api_key]' value='<?php echo $options['api_key']; ?>' class="wp-notes-widget-long" />
      </div>

    <?php
  }

  /**
   * Twitter API field secret callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_twitter_secret_callback(  ) { 

    $options = get_option( 'wp_notes_widget_twitter_credentials' );
    if (!$options) {
      $options = array();
    }
    if (!isset($options['api_secret'])){
      $options['api_secret'] = '';
    }
    ?>
      
      <div class="form-group">
        <label for="wp_notes_widget_twitter_credentials__api_secret"><?php esc_html_e('API Secret','wp-notes-widget'); ?></label>
        <input type='text' id="wp_notes_widget_twitter_credentials__api_secret" name='wp_notes_widget_twitter_credentials[api_secret]' value='<?php echo $options['api_secret']; ?>' class="wp-notes-widget-long" />
      </div>

    <?php
  }

  /**
   * Twitter API field token callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_twitter_token_callback(  ) { 

    $options = get_option( 'wp_notes_widget_twitter_credentials' );
    if (!$options) {
      $options = array();
    }
    if (!isset($options['token'])){
      $options['token'] = '';
    }
    ?>
      
      <div class="form-group">
        <label for="wp_notes_widget_twitter_credentials__access-token"><?php esc_html_e('Access Token','wp-notes-widget'); ?></label>
        <input type='text' name='wp_notes_widget_twitter_credentials[token]' value='<?php echo $options['token']; ?>' class="wp-notes-widget-long" />
      </div>

    <?php
  }

  /**
   * Twitter API field token secret callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_twitter_token_secret_callback(  ) { 

    $options = get_option( 'wp_notes_widget_twitter_credentials' );
    if (!$options) {
      $options = array();
    }
    if (!isset($options['token_secret'])){
      $options['token_secret'] = '';
    }
    ?>
      
      <div class="form-group">
        <label for="wp_notes_widget_twitter_credentials__token-secret"><?php esc_html_e('Token Secret','wp-notes-widget'); ?></label>
        <input type='text' name='wp_notes_widget_twitter_credentials[token_secret]' value='<?php echo $options['token_secret']; ?>' class="wp-notes-widget-long" >
      </div>

    <?php
  }


  // First, we register a section. 
  add_settings_section(
    'wp_notes_widget_twitter_credentials',              // ID used to identify this section and with which to register options
     esc_html__('Twitter API Credentials','wp-notes-widget'),   // Title to be displayed on the administration page
    'wp_notes_widget_twitter_credentials_callback',     // Callback used to render the description of the section
    'wp_notes_widget_twitter_settings_page_partial'     // Page on which to add this section of options
  );
  

  // Add fields to our section
  add_settings_field( 
    'wp_notes_widget_twitter_key',                  // ID used to identify the field throughout the theme
    '<small class="text-muted" >'.esc_html__('API Key for your Twitter application','wp-notes-widget').'</small>',                                      // The label to the left of the option interface element
    'wp_notes_widget_twitter_key_callback',         // The name of the function responsible for rendering the option interface
    'wp_notes_widget_twitter_settings_page_partial',     // The page on which this option will be displayed
    'wp_notes_widget_twitter_credentials'           // The name of the section to which this field belongs      
  );
  
  add_settings_field( 
    'wp_notes_widget_twitter_secret',                     
    '<small class="text-muted" >'.esc_html__('API Secret for your Twitter application','wp-notes-widget').'</small>',              
    'wp_notes_widget_twitter_secret_callback',  
    'wp_notes_widget_twitter_settings_page_partial',                    
    'wp_notes_widget_twitter_credentials'               
  );

  add_settings_field( 
    'wp_notes_widget_twitter_token',                     
    '<small class="text-muted" >'.esc_html__('Access Token for your Twitter application','wp-notes-widget').'</small>',              
    'wp_notes_widget_twitter_token_callback',  
    'wp_notes_widget_twitter_settings_page_partial',                    
    'wp_notes_widget_twitter_credentials'               
  );

  add_settings_field( 
    'wp_notes_widget_twitter_token_secret',                     
    '<small class="text-muted" >'.esc_html__('Token Secret for your Twitter application','wp-notes-widget').'</small>',              
    'wp_notes_widget_twitter_token_secret_callback',  
    'wp_notes_widget_twitter_settings_page_partial',                    
    'wp_notes_widget_twitter_credentials'               
  );   
   
  register_setting(
    'wp_notes_widget_settings_page',
    'wp_notes_widget_twitter_credentials'
  );



  /*============================================================================
    DEFAULT SETTINGS FIELDS AND CALLBACKS
  ==============================================================================*/

  if( false == get_option( 'wp_notes_widget_defaults' ) ) {  
    add_option( 'wp_notes_widget_defaults' );
  } 

  /**
   * Default Thumb Tack Color Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_thumb_tack_color_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['thumb_tack_colour'])){
      $default_val['thumb_tack_colour'] = WP_NOTES::get_plugin_default_setting('thumb_tack_colour');
    }
    ?>
      <label for="wp_notes_widget_defaults--thumb_tack_color" ><?php esc_html_e('Thumb Tack Color', 'wp-notes-widget' ) ?></label>
      <select id="wp_notes_widget_defaults--thumb_tack_color" name='wp_notes_widget_defaults[thumb_tack_colour]' >
        <option value="red"     <?php selected( $default_val['thumb_tack_colour'], 'red' ); ?> >     <?php esc_html_e('Red', 'wp-notes-widget' ) ?></option>
        <option value="blue"    <?php selected( $default_val['thumb_tack_colour'], 'blue' ); ?> >    <?php esc_html_e('Blue', 'wp-notes-widget' ) ?></option>
        <option value="green"   <?php selected( $default_val['thumb_tack_colour'], 'green' ); ?> >   <?php esc_html_e('Green', 'wp-notes-widget' ) ?></option>
        <option value="gray"    <?php selected( $default_val['thumb_tack_colour'], 'gray' ); ?> >    <?php esc_html_e('Gray', 'wp-notes-widget' ) ?></option>
        <option value="orange"  <?php selected( $default_val['thumb_tack_colour'], 'orange' ); ?> >  <?php esc_html_e('Orange', 'wp-notes-widget' ) ?></option>
        <option value="pink"    <?php selected( $default_val['thumb_tack_colour'], 'pink' ); ?> >     <?php esc_html_e('Pink', 'wp-notes-widget' ) ?></option>
        <option value="teal"    <?php selected( $default_val['thumb_tack_colour'], 'teal' ); ?> >    <?php esc_html_e('Teal', 'wp-notes-widget' ) ?></option>
        <option value="yellow"  <?php selected( $default_val['thumb_tack_colour'], 'yellow' ); ?> >  <?php esc_html_e('Yellow', 'wp-notes-widget' ) ?></option>
      </select>
      
    <?php
  }    

  /**
   * Default Background Color Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_background_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['background_colour'])){
      $default_val['background_colour'] = WP_NOTES::get_plugin_default_setting('background_colour');
    }
    ?>
      <label for="wp_notes_widget_defaults--background_color" ><?php esc_html_e('Background Color', 'wp-notes-widget' ) ?></label>
      <select id="wp_notes_widget_defaults--background_color" name='wp_notes_widget_defaults[background_colour]' >
        <option value="yellow"      <?php selected( $default_val['background_colour'], 'yellow' ); ?> >    <?php esc_html_e('Yellow', 'wp-notes-widget' ) ?>      </option>
        <option value="blue"        <?php selected( $default_val['background_colour'], 'blue' ); ?> >      <?php esc_html_e('Blue', 'wp-notes-widget' ) ?>        </option>
        <option value="green"       <?php selected( $default_val['background_colour'], 'green' ); ?> >     <?php esc_html_e('Green', 'wp-notes-widget' ) ?>      </option>
        <option value="pink"        <?php selected( $default_val['background_colour'], 'pink' ); ?> >      <?php esc_html_e('Pink', 'wp-notes-widget' ) ?>        </option>
        <option value="orange"      <?php selected( $default_val['background_colour'], 'orange' ); ?> >    <?php esc_html_e('Orange', 'wp-notes-widget' ) ?>      </option>
        <option value="white"       <?php selected( $default_val['background_colour'], 'white' ); ?> >     <?php esc_html_e('White', 'wp-notes-widget' ) ?>      </option>
        <option value="dark-grey"   <?php selected( $default_val['background_colour'], 'dark-grey' ); ?> > <?php esc_html_e('Dark Grey', 'wp-notes-widget' ) ?>  </option>
        <option value="light-grey"  <?php selected( $default_val['background_colour'], 'light-grey' ); ?> ><?php esc_html_e('Light Grey', 'wp-notes-widget' ) ?>  </option>
      </select>
      
    <?php
  } 

  /**
   * Default Text Color Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_text_color_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['text_colour'])){
      $default_val['text_colour'] = WP_NOTES::get_plugin_default_setting('text_colour');
    }
    ?>
      <label for="wp_notes_widget_defaults--text_color" ><?php esc_html_e('Text Color', 'wp-notes-widget' ) ?></label>
      <select id="wp_notes_widget_defaults--text_color" name='wp_notes_widget_defaults[text_colour]' >
        <option value="red"         <?php selected( $default_val['text_colour'], 'red' ); ?> >  <?php esc_html_e('Red', 'wp-notes-widget' ) ?>        </option>
        <option value="blue"        <?php selected( $default_val['text_colour'], 'blue' ); ?> >  <?php esc_html_e('Blue', 'wp-notes-widget' ) ?>        </option>
        <option value="black"       <?php selected( $default_val['text_colour'], 'black' ); ?> >  <?php esc_html_e('Black', 'wp-notes-widget' ) ?>      </option>
        <option value="pink"        <?php selected( $default_val['text_colour'], 'pink' ); ?> >  <?php esc_html_e('Pink', 'wp-notes-widget' ) ?>        </option>
        <option value="white"       <?php selected( $default_val['text_colour'], 'white' ); ?> >  <?php esc_html_e('White', 'wp-notes-widget' ) ?>      </option>
        <option value="dark-grey"   <?php selected( $default_val['text_colour'], 'dark-grey' ); ?> >  <?php esc_html_e('Dark Grey', 'wp-notes-widget' ) ?>  </option>
        <option value="light-grey"  <?php selected( $default_val['text_colour'], 'light-grey' ); ?> >  <?php esc_html_e('Light Grey', 'wp-notes-widget' ) ?>  </option>
      </select>
      
    <?php
  }

  /**
   * Default Font Size Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_font_size_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['font_size'])){
      $default_val['font_size'] = WP_NOTES::get_plugin_default_setting('font_size');
    }
    ?>
      <div class="form-group">
        <label for="wp_notes_widget_defaults--font_size" ><?php esc_html_e('Font Size', 'wp-notes-widget' ) ?></label>
        <select id="wp_notes_widget_defaults--font_size" name='wp_notes_widget_defaults[font_size]' >
          <option value="minus-50" <?php selected( $default_val['font_size'], 'minus-50' ); ?> > <?php esc_html_e('50% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-45" <?php selected( $default_val['font_size'], 'minus-45' ); ?> > <?php esc_html_e('45% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-40" <?php selected( $default_val['font_size'], 'minus-40' ); ?> > <?php esc_html_e('40% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-35" <?php selected( $default_val['font_size'], 'minus-35' ); ?> > <?php esc_html_e('35% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-30" <?php selected( $default_val['font_size'], 'minus-30' ); ?> > <?php esc_html_e('30% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-25" <?php selected( $default_val['font_size'], 'minus-25' ); ?> > <?php esc_html_e('25% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-20" <?php selected( $default_val['font_size'], 'minus-20' ); ?> > <?php esc_html_e('20% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-15" <?php selected( $default_val['font_size'], 'minus-15' ); ?> > <?php esc_html_e('15% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-10" <?php selected( $default_val['font_size'], 'minus-10' ); ?> > <?php esc_html_e('10% smaller', 'wp-notes-widget' ) ?>  </option>
          <option value="minus-5"  <?php selected( $default_val['font_size'], 'minus-5' ); ?> > <?php esc_html_e('5% smaller', 'wp-notes-widget' ) ?>  </option>
          
          <option value="normal" <?php selected( $default_val['font_size'], 'normal' ); ?> >    <?php esc_html_e('Normal', 'wp-notes-widget' ) ?></option>
          
          <option value="plus-5"  <?php selected( $default_val['font_size'], 'plus-5' ); ?> >   <?php esc_html_e('5% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-10" <?php selected( $default_val['font_size'], 'plus-10' ); ?> >  <?php esc_html_e('10% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-15" <?php selected( $default_val['font_size'], 'plus-15' ); ?> >  <?php esc_html_e('15% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-20" <?php selected( $default_val['font_size'], 'plus-20' ); ?> >  <?php esc_html_e('20% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-25" <?php selected( $default_val['font_size'], 'plus-25' ); ?> >  <?php esc_html_e('25% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-30" <?php selected( $default_val['font_size'], 'plus-30' ); ?> >  <?php esc_html_e('30% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-35" <?php selected( $default_val['font_size'], 'plus-35' ); ?> >  <?php esc_html_e('35% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-40" <?php selected( $default_val['font_size'], 'plus-40' ); ?> >  <?php esc_html_e('40% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-45" <?php selected( $default_val['font_size'], 'plus-45' ); ?> >  <?php esc_html_e('45% larger', 'wp-notes-widget' ) ?>  </option>
          <option value="plus-50" <?php selected( $default_val['font_size'], 'plus-50' ); ?> >  <?php esc_html_e('50% larger', 'wp-notes-widget' ) ?>  </option>
        </select>
      </div>
    <?php
  }

  /**
   * Default Display Date Boolean Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_display_date_callback() { 

    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['show_date'])){
      $default_val['show_date'] = WP_NOTES::get_plugin_default_setting('show_date');
    }
    ?>
      <div class="checkbox">
        <label >
        <input type='checkbox' id="wp_notes_widget_defaults--display_date" <?php checked($default_val['show_date'], 'checked'); ?> name='wp_notes_widget_defaults[show_date]' value='checked' ><?php esc_html_e('Display Date','wp-notes-widget'); ?></label>
      </div>
    <?php
  }

  /**
   * Default Use Own CSS Boolean Settings Callback
   *
   * @since 1.0.0   
   */
  function wp_notes_widget_default_use_own_css_callback() { 

    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['use_custom_style'])){
      $default_val['use_custom_style'] = WP_NOTES::get_plugin_default_setting('use_custom_style');
    }
    ?>
      <div class="checkbox">
        <label for="wp_notes_widget_defaults--use_own_css" >
        <input type='checkbox' id="wp_notes_widget_defaults--use_own_css" <?php checked($default_val['use_custom_style'], 'checked'); ?> name='wp_notes_widget_defaults[use_custom_style]' value='checked' ><?php esc_html_e('Use Custom CSS','wp-notes-widget'); ?></label>
      </div>
    <?php
  }

  /**
   * Default Hide if Empty Boolean Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_hide_if_empty_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['hide_if_empty'])){
      $default_val['hide_if_empty'] = WP_NOTES::get_plugin_default_setting('hide_if_empty');
    }
    ?>

      <div class="checkbox">
        <label><input type='checkbox' id="wp_notes_widget_defaults--hide_if_empty" <?php checked($default_val['hide_if_empty'], 'checked'); ?> name='wp_notes_widget_defaults[hide_if_empty]' value='checked' ><?php esc_html_e('Hide if Empty','wp-notes-widget'); ?></label>
      </div>

    <?php
  }

  /**
   * Default Use Individual Notes Boolean Settings Callback
   *
   * @since 1.0.0   
   */
  function wp_notes_widget_default_use_individual_notes_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['multiple_notes'])){
      $default_val['multiple_notes'] = WP_NOTES::get_plugin_default_setting('multiple_notes');
    }
    ?>
      <div class="checkbox">
        <label for="wp_notes_widget_defaults--use_individual_notes" >
        <input type='checkbox' id="wp_notes_widget_defaults--use_individual_notes" <?php checked($default_val['multiple_notes'], 'checked'); ?> name='wp_notes_widget_defaults[multiple_notes]' value='checked' ><?php esc_html_e('Use Individual Notes','wp-notes-widget'); ?></label>
      </div>
    <?php
  }

  /**
   * Default Enable Social Sharing Boolean Settings Callback
   *
   * @since 1.0.0   
   */
  function wp_notes_widget_default_enable_social_sharing_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['enable_social_share'])){
      $default_val['enable_social_share'] = WP_NOTES::get_plugin_default_setting('enable_social_share');
    }
    ?>
      <div class="checkbox">
        <label for="wp_notes_widget_defaults--enable_social_sharing" >
        <input type='checkbox' id="wp_notes_widget_defaults--enable_social_sharing" <?php checked($default_val['enable_social_share'], 'checked'); ?> name='wp_notes_widget_defaults[enable_social_share]' value='checked' ><?php esc_html_e('Enable Social Sharing','wp-notes-widget'); ?></label>
      </div>
    <?php
  }

  /**
   * Default Do Not Force Uppercase Boolean Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_do_not_force_uppercase_callback() { 
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['do_not_force_uppercase'])){
      $default_val['do_not_force_uppercase'] = WP_NOTES::get_plugin_default_setting('do_not_force_uppercase');
    }
    ?>

      <div class="checkbox">
        <label><input type='checkbox' id="wp_notes_widget_defaults--do_not_force_uppercase" <?php checked($default_val['do_not_force_uppercase'], 'checked'); ?> name='wp_notes_widget_defaults[do_not_force_uppercase]' value='checked' ><?php esc_html_e('Do not Force Uppercase Letters','wp-notes-widget'); ?></label>
      </div>

    <?php
  }

  /**
   * Default Font Style Settings Callback
   *
   * @since 1.0.0    
   */
  function wp_notes_widget_default_font_style_callback() { 
    
    $default_val = get_option( 'wp_notes_widget_defaults' );
    if (!$default_val) {
      $default_val = array();
    }
    if (!isset($default_val['font_style'])){
      $default_val['font_style'] = WP_NOTES::get_plugin_default_setting('font_style');
    }
    ?>
      <div class="font-style-selection-container" >
        <?php

          $font_mapping = array(
            'kalam'                   => 'Kalam',
            'dancing-script'          => 'Dancing Script',
            'kaushan-script'          => 'Kaushan Script',
            'gloria-hallelujah'       => 'Gloria Hallelujah',
            'covered-by-your-grace'   => 'Covered By Your Grace',
            'courgette'               => 'Courgette',
            'coming-soon'             => 'Coming Soon',
            'satisfy'                 => 'Satisfy',
            'permanent-marker'        => 'Permanent Marker',
            'shadows-into-light-two'  => 'Shadows Into Light Two',
            'rock-salt'               => 'Rock Salt',
            'cookie'                  => 'Cookie',
            'handlee'                 => 'Handlee',
            'tangerine'               => 'Tangerine',
            'great-vibes'             => 'Great Vibes'
          );
        ?>
        <ul class="wp-notes-widget-font-list" >
          <?php
            foreach ($font_mapping as $key => $font_mapping_item) {
              ?>
              <li class="wp-notes-widget__settings__radio-checkbox-input-item font-style-item font-<?php echo $key ?>" >
                <input type="radio" id="<?php echo  $key ; ?>" <?php checked($default_val['font_style'], $key); ?> name="wp_notes_widget_defaults[font_style]" value="<?php echo $key ?>" />          
                <label for="<?php echo $key ; ?>" id="font-selection-<?php echo $key ?>-label"  ><?php esc_html_e('Font Style','wp-notes-widget'); ?> - <?php echo $font_mapping_item ?></label>
              </li>
              <?php
            }
          ?>
        </ul>
      </div> 
    <?php
  }

  /**
   *
   * Default Settings
   *
   */
  add_settings_section(
    'wp_notes_widget_default_settings',                 // ID used to identify this section and with which to register options
    esc_html__('Default Settings','wp-notes-widget'),                                 // Title to be displayed on the administration page
    'wp_notes_widget_default_settings_callback',        // Callback used to render the description of the section
    'wp_notes_widget_default_settings_page_partial'                     // Page on which to add this section of options
  );


  add_settings_field( 
    'wp_notes_widget_default_thumb_tack_color',           // ID used to identify the field throughout the theme
    '<small class="text-muted" >'.esc_html__('Thumb tack color for notes','wp-notes-widget').'</small>',                                   // The label to the left of the option interface element
    'wp_notes_widget_default_thumb_tack_color_callback',  // The name of the function responsible for rendering the option interface
    'wp_notes_widget_default_settings_page_partial',                      // The page on which this option will be displayed
    'wp_notes_widget_default_settings'                    // The name of the section to which this field belongs      
  );

  add_settings_field( 
    'wp_notes_widget_default_background_color',
    '<small class="text-muted" >'.esc_html__('Background color for notes','wp-notes-widget').'</small>',
    'wp_notes_widget_default_background_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'    
  );

  add_settings_field( 
    'wp_notes_widget_default_text_color',
    '<small class="text-muted" >'.esc_html__('Text color for notes','wp-notes-widget').'</small>',
    'wp_notes_widget_default_text_color_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'    
  );

  add_settings_field( 
    'wp_notes_widget_default_font_size',
    '<small class="text-muted" >'.esc_html__('Font size for notes','wp-notes-widget').'</small>',
    'wp_notes_widget_default_font_size_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'      
  );

  add_settings_field( 
    'wp_notes_widget_default_display_date',
    '<small class="text-muted" >'.esc_html__('Display the publish date of the note','wp-notes-widget').'</small>',
    'wp_notes_widget_default_display_date_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'     
  );

  add_settings_field( 
    'wp_notes_widget_default_use_own_css',
    '<small class="text-muted" >'.esc_html__('Do not include the built in CSS for the notes','wp-notes-widget').'</small>',
    'wp_notes_widget_default_use_own_css_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'   
  );

  add_settings_field( 
    'wp_notes_widget_default_hide_if_empty',
    '<small class="text-muted" >'.esc_html__('If there are no notes to display, hide the note container','wp-notes-widget').'</small>',
    'wp_notes_widget_default_hide_if_empty_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'    
  );

  add_settings_field( 
    'wp_notes_widget_default_use_individual_notes',
    '<small class="text-muted" >'.esc_html__('Instead of one tall note, show multiple individual notes','wp-notes-widget').'</small>',
    'wp_notes_widget_default_use_individual_notes_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'  
  );

  add_settings_field( 
    'wp_notes_widget_default_enable_social_sharing',
    '<small class="text-muted" >'.esc_html__('Display a Twitter link below each note','wp-notes-widget').'</small>',
    'wp_notes_widget_default_enable_social_sharing_callback',
    'wp_notes_widget_default_settings_page_partial',
    'wp_notes_widget_default_settings'     
  );

  add_settings_field( 
    'wp_notes_widget_default_do_not_force_uppercase',
    '<small class="text-muted" >'.esc_html__('Do not convert all the text to uppercase letters','wp-notes-widget').'</small>', 
    'wp_notes_widget_default_do_not_force_uppercase_callback',       
    'wp_notes_widget_default_settings_page_partial',   
    'wp_notes_widget_default_settings'                             
  );
  add_settings_field( 
    'wp-notes-widget_default_font_style',
    '<small class="text-muted" >'.esc_html__('Font style for the note','wp-notes-widget').'</small>', 
    'wp_notes_widget_default_font_style_callback',       
    'wp_notes_widget_default_settings_page_partial',   
    'wp_notes_widget_default_settings'                             
  );


  register_setting(
    'wp_notes_widget_settings_page',
    'wp_notes_widget_defaults' 
  );


  /*============================================================================
    SHORTCODE DEFAULT SETTINGS FIELDS AND CALLBACKS
  ==============================================================================*/

  if( false == get_option( 'wp_notes_widget_default_shortcode_settings' ) ) {  
    add_option( 'wp_notes_widget_default_shortcode_settings' );
  } 

  /**
   *
   * Shortcode Default Max Width Setting
   *
   * @since 1.0.0 
   */
  function wp_notes_widget_default_shortcode__max_width_callback() { 
    $default_setting_val = get_option( 'wp_notes_widget_default_shortcode_settings' );
    if (!$default_setting_val) {
      $default_setting_val = array();
    }
    if (!isset($default_setting_val['max_width'])){
      $default_setting_val['max_width'] = WP_NOTES::get_plugin_default_shortcode_setting('max_width');
    }
    ?>

      <div class="form-group">
        <label for="wp_notes_widget__shortcode-defaults__max-width"><?php esc_html_e('Max Width','wp-notes-widget'); ?></label>
        <input type='number' min="1" id="wp_notes_widget__shortcode-defaults__max-width" name='wp_notes_widget_default_shortcode_settings[max_width]' value='<?php echo $default_setting_val['max_width'] ?>' >
      </div>

    <?php
  }

  /**
   *
   * Shortcode Default Max Width Units Setting
   *
   * @since 1.0.0 
   */
  function wp_notes_widget_default_shortcode__max_width_units_callback() { 
    $default_setting_val = get_option( 'wp_notes_widget_default_shortcode_settings' );
    if (!$default_setting_val) {
      $default_setting_val = array();
    }
    if (!isset($default_setting_val['max_width_units'])){
      $default_setting_val['max_width_units'] = WP_NOTES::get_plugin_default_shortcode_setting('max_width_units');
    }
    ?>
    <div class="form-group">
      <label for="wp_notes_widget__shortcode-defaults__max-width-units" ><?php esc_html_e('Max Width Units','wp-notes-widget'); ?></label>
      
      <select id="wp_notes_widget__shortcode-defaults__max-width-units" name='wp_notes_widget_default_shortcode_settings[max_width_units]' >
        <option value="px" <?php selected( $default_setting_val['max_width_units'], 'px' ); ?> >  px</option>
        <option value="em" <?php selected( $default_setting_val['max_width_units'], 'em' ); ?> >  em</option>
        <option value="rem" <?php selected( $default_setting_val['max_width_units'], 'rem' ); ?> >rem</option>
        <option value="percent" <?php selected( $default_setting_val['max_width_units'], 'percent' ); ?> >    %</option>
      </select>
    </div>

    <?php
  }

  /**
   *
   * Shortcode Default Alignment Setting
   *
   * @since 1.0.0 
   */
  function wp_notes_widget_default_shortcode__alignment_callback() { 
    $default_setting_val = get_option( 'wp_notes_widget_default_shortcode_settings' );
    if (!$default_setting_val) {
      $default_setting_val = array();
    }
    if (!isset($default_setting_val['alignment'])){
      $default_setting_val['alignment'] = WP_NOTES::get_plugin_default_shortcode_setting('alignment');
    }
    ?>
    <label for="wp-notes-widget__settings__alignment-container" ><?php esc_html_e('Alignment','wp-notes-widget'); ?></label>
    <div id="wp-notes-widget__settings__alignment-container" >
      <label class="radio-inline"><input type="radio" name="wp_notes_widget_default_shortcode_settings[alignment]" <?php checked( $default_setting_val['alignment'], 'left' ); ?> value="left"><?php esc_html_e('Left','wp-notes-widget'); ?></label>
      <label class="radio-inline"><input type="radio" name="wp_notes_widget_default_shortcode_settings[alignment]" <?php checked( $default_setting_val['alignment'], 'center' ); ?> value="center"><?php esc_html_e('Center','wp-notes-widget'); ?></label>
      <label class="radio-inline"><input type="radio" name="wp_notes_widget_default_shortcode_settings[alignment]" <?php checked( $default_setting_val['alignment'], 'right' ); ?> value="right"><?php esc_html_e('Right','wp-notes-widget'); ?></label>
    </div>

    <?php
  }

  /**
   *
   * Shortcode Default Direction Setting
   *
   * @since 1.0.0 
   */
  function wp_notes_widget_default_shortcode__direction_callback() { 
    $default_setting_val = get_option( 'wp_notes_widget_default_shortcode_settings' );
    if (!$default_setting_val) {
      $default_setting_val = array();
    }
    if (!isset($default_setting_val['direction'])){
      $default_setting_val['direction'] = WP_NOTES::get_plugin_default_shortcode_setting('direction');
    }
    ?>
    <label for="wp-notes-widget__settings__direction-options" ><?php esc_html_e('Direction','wp-notes-widget'); ?></label>
    <div class="wp-notes-widget__settings__direction-options">
      <label class="radio-inline"><input type="radio" name="wp_notes_widget_default_shortcode_settings[direction]" <?php checked( $default_setting_val['direction'], 'vertical' ); ?> value="vertical"><?php esc_html_e('Vertical','wp-notes-widget'); ?></label>
      <label class="radio-inline"><input type="radio" name="wp_notes_widget_default_shortcode_settings[direction]" <?php checked( $default_setting_val['direction'], 'horizontal' ); ?> value="horizontal"><?php esc_html_e('Horizontal','wp-notes-widget'); ?></label>
    </div>

    <?php
  }

  add_settings_section(
    'wp_notes_widget_default_shortcode_settings',                 // ID used to identify this section and with which to register options
     esc_html__('Default Shortcode Settings','wp-notes-widget'),                                // Title to be displayed on the administration page
    'wp_notes_widget_default_shortcode_settings_callback',        // Callback used to render the description of the section
    'wp_notes_widget_default_shortcode_settings_page_partial'     // Page on which to add this section of options
  );
  
  add_settings_field( 
    'wp_notes_widget_default_shortcode__max_width',
    '<small class="text-muted" >'.esc_html__('Max width of the note container','wp-notes-widget').'</small>',
    'wp_notes_widget_default_shortcode__max_width_callback',
    'wp_notes_widget_default_shortcode_settings_page_partial',
    'wp_notes_widget_default_shortcode_settings'     
  );

  add_settings_field( 
    'wp_notes_widget_default_shortcode__max_width_units',
    '<small class="text-muted" >'.esc_html__('CSS units of the max width note container','wp-notes-widget').'</small>', 
    'wp_notes_widget_default_shortcode__max_width_units_callback',       
    'wp_notes_widget_default_shortcode_settings_page_partial',   
    'wp_notes_widget_default_shortcode_settings'                             
  );
  add_settings_field( 
    'wp_notes_widget_default_shortcode__alignment',
    '<small class="text-muted" >'.esc_html__('Alignment of the note container','wp-notes-widget').'</small>', 
    'wp_notes_widget_default_shortcode__alignment_callback',       
    'wp_notes_widget_default_shortcode_settings_page_partial',   
    'wp_notes_widget_default_shortcode_settings'                             
  );
  add_settings_field( 
    'wp_notes_widget_default_shortcode__direction',
    '<small class="text-muted" >'.esc_html__('Direction flow of the notes','wp-notes-widget').'</small>', 
    'wp_notes_widget_default_shortcode__direction_callback',       
    'wp_notes_widget_default_shortcode_settings_page_partial',   
    'wp_notes_widget_default_shortcode_settings'                             
  );

  register_setting(
    'wp_notes_widget_settings_page',
    'wp_notes_widget_default_shortcode_settings'
  );
