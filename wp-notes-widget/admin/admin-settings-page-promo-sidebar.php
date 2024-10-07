<!-- Create a header in the default WordPress 'wrap' container -->
<div class="wrap">
 
  <div id="icon-themes" class="icon32"></div>
  <div class="wp-notes-widget-bootstrap" >
    <div class="row">
      <div class="col-lg-9 col-md-8">
        <section>
          <h2><?php esc_html_e('WP Notes Widget Settings','wp-notes-widget'); ?></h2>
          
          <form method="post" action="options.php">
          
            <?php settings_fields( 'wp_notes_widget_settings_page' ); ?>
            
            <div class="" >
              
              <!-- Nav tabs -->
              <ul id="wp-notes-widget__settings-tab-list" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item" ><a class="active nav-link" href="#general" aria-controls="home" role="tab" data-toggle="tab"><?php esc_html_e('General','wp-notes-widget'); ?></a></li>
                <li role="presentation" class="nav-item" ><a class="nav-link" href="#shortcode" aria-controls="shortcode" role="tab" data-toggle="tab"><?php esc_html_e('Shortcode','wp-notes-widget'); ?></a></li>
                <li role="presentation" class="nav-item" ><a class="nav-link" href="#twitter" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Twitter','wp-notes-widget'); ?></a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <section role="tabpanel" class="tab-pane active" id="general">
                  <?php do_settings_sections( 'wp_notes_widget_default_settings_page_partial' ); ?>
                  <div class="wp-notes-widget__submit-button-container">
                    <?php submit_button(); ?>
                  </div>
                </section>
                <section role="tabpanel" class="tab-pane" id="shortcode">
                  <?php do_settings_sections( 'wp_notes_widget_default_shortcode_settings_page_partial' ); ?>
                  <div class="wp-notes-widget__submit-button-container">
                    <?php submit_button(); ?>
                  </div>
                </section>
                <section role="tabpanel" class="tab-pane" id="twitter">
                  <?php do_settings_sections( 'wp_notes_widget_twitter_settings_page_partial' ); ?>
                  <div class="wp-notes-widget__submit-button-container">
                    <?php submit_button(); ?>
                  </div>
                </section>
              </div>

            </div>

          </form>
        </section>
      </div>
      <div class="col-lg-3 col-md-4">

        <div class="panel panel-default wp-notes-widget__sidebar-callout">
          <div class="panel-heading ">
            <h4>
              <i class="fa fa-question-circle-o" aria-hidden="true"></i> Want More Features?
            </h4>
          </div>
          <div class="panel-body">
            <p>WP Notes Widget PRO offers the following additional features:</p>
            <ul class="wp-notes-widget-callout-list" >
              <li>Note Categories</li>
              <li>Shortcodes</li>
              <li>Insert notes in posts, pages, and other post types (not just widget areas)</li>
              <li>Order notes in ascending or descending order</li>
              <li>Ability to remove all Web Rockstar branding and callouts in WordPress admin</li>
            </ul>

            <p><a href='<?php echo WP_NOTES_WIDGET_PRO_LINK ?>?utm_source=wp-notes-widget-plugin&utm_medium=settings-callout' target="_blank" class="btn btn-primary" >Get WP Notes Widget PRO</a></p>
            <p>Save 20% by using discount code <strong>GOPRO20</strong> !</p>
            
          </div>
        </div>         
        <div class="panel panel-default wp-notes-widget__sidebar-callout">
          <div class="panel-heading">
            <h4>
            <i class="fa fa-info-circle" aria-hidden="true"></i> You Might Also Like...
            </h4>
          </div>
          
          <div class="panel-body">
            <p>WP Notes Widget is built by <a target="_blank" href='http://webrockstar.net?utm_source=wp-notes-widget-plugin&utm_medium=settings-callout'>Web Rockstar</a>. Web Rockstar also offers several other free plugins:</p>
            <div class="">
              
              <!-- Notes Widget Wrapper Promo Item -->
              <div class="wp-notes-widget__plugin-promo-item">
                <a target="_blank" href='https://wordpress.org/plugins/notes-widget-wrapper/' >
                  <h4>Notes Widget Wrapper</h4>
                  <div class="wp-notes-widget__plugin-promo-item__banner" id="promo-banner--notes-widget-wrapper" ></div>
                </a>
              </div>

              <!-- Admin Code Editor Promo Item -->
              <div class="wp-notes-widget__plugin-promo-item">
                <a target="_blank" href='https://github.com/spuddick/admin-code-editor' >
                  <h4>Admin Code Editor</h4>
                  <div class="wp-notes-widget__plugin-promo-item__banner" id="promo-banner--admin-code-editor" ></div>
                </a>
              </div>

              <!-- Custom Ratings Promo Item -->
              <div class="wp-notes-widget__plugin-promo-item">
                <a target="_blank" href='https://wordpress.org/plugins/custom-ratings/' >
                  <h4>Custom Ratings</h4>
                  <div class="wp-notes-widget__plugin-promo-item__banner" id="promo-banner--custom-ratings" ></div>
                </a>
              </div>

            </div>
          </div>
        </div>
      
      </div> 
    </div>

  </div>
       
</div><!-- /.wrap -->