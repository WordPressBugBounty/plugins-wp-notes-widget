  <div class="wp-notes-post-admin-container" >
    <h4><?php esc_html_e('Tweet History and Settings', 'wp-notes-widget'); ?></h4>
    <div class="content-segment">
      
      <script>
        var wp_notes_widget_twitter_url_short_length         = <?php echo $twitter_url_short_length; ?>;
        var wp_notes_widget_twitter_url_short_length_https   = <?php echo $twitter_url_short_length_https; ?>;
        var wp_notes_widget_twitter_over_limit_text         = "<?php esc_html_e('Too long. Tweet won\'t be sent.', 'wp-notes-widget'); ?>";  
      </script>

      <div class="wp-notes-margin-bottom" >
        <input type="checkbox" id="WP_Notes_push_tweet" name="WP_Notes_push_tweet" for="" value="checked" <?php checked($wp_notes_twitter_data['push_tweet'], 'checked' ) ?> />
        <label for="WP_Notes_push_tweet" ><strong><?php esc_html_e('Send Tweet on Publish or Update?', 'wp-notes-widget') ?></strong></label>
      </div>

      <?php if(empty($wp_notes_tweet_history)) { ?>
        <p><?php esc_html_e('WP Notes Widget has not tweeted this note yet.','wp-notes-widget'); ?></p>

      <?php } else { ?>
        <p><?php esc_html_e('WP Notes Widget has tweeted this note on:', 'wp-notes-widget'); ?></p>  
        <ul class="tweet-history-list faded">
          <?php
            foreach ($wp_notes_tweet_history as &$wp_notes_tweet_history_item) {
              echo '<li>' . $wp_notes_tweet_history_item . '</li>'; 
            }
          ?>
        </ul>        

      <?php } ?>
    </div>

    <h4><?php esc_html_e('Tweet Content', 'wp-notes-widget'); ?></h4>
    <div class="content-segment">
      <button id="WP_Notes_twitter_copy_text" class="button button-secondary wp-notes-margin-bottom"><?php esc_html_e('Copy Content From Notes Text', 'wp-notes-widget'); ?></button>
      <p class="wp-notes-no-margin-bottom" ><?php esc_html_e('Characters Remaining:', 'wp-notes-widget'); ?> <span id="WP_Notes_twitter_chars_remaining"></span><span id="WP_Notes_twitter_over_limit_text" ></span></p>
        
      <textarea id="WP_Notes_tweet_body" name="WP_Notes_tweet_body" class="wp-notes-textarea" placeholder="<?php esc_html_e('Here is a tweet with a link to *url*. Also, check out this cool video *video*', 'wp-notes-widget'); ?>" ><?php echo $wp_notes_twitter_data['tweet_body']; ?></textarea>
      <ul class="faded" >
        <li><?php esc_html_e('Enter *url* in tweet body to attach the action or download link.', 'wp-notes-widget'); ?></li> 
        <li><?php esc_html_e('Enter *video* in tweet body to attach the video link.', 'wp-notes-widget'); ?></li>         
        <li><?php esc_html_e('If an image is attached to the note, it will automatically be included in your Tweet.', 'wp-notes-widget'); ?> </li>
      </ul>
      
    </div>  
  </div>
