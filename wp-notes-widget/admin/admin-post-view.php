
<div class="wp-notes-post-admin-container">

  <h4><?php esc_html_e('Notes Text','wp-notes-widget') ?></h4>
  <div class="content-segment">
    
    <label class="wp-notes-label wp-notes-hidden" for="WP_Notes_text"><?php esc_html_e('Notes Text', 'wp-notes-widget') ?></label>
    <textarea  class="wp-notes-textarea"  id="WP_Notes_text" name="WP_Notes_text" placeholder="<?php esc_html_e( 'Enter your note here.', 'wp-notes-widget' ) ?>"><?php echo $wp_notes_data['text'] ?></textarea>
    
  </div>
  
  <h4><?php esc_html_e('Add Media', 'wp-notes-widget') ?> <span class="secondary-text" >(<?php esc_html_e('optional','wp-notes-widget'); ?>)</span> </h4>
  <div class="content-segment">

    <div class="wp-notes-action-link-management">

      <div class="wp-notes-media-option-controls wp-notes-radio-option-controls">
        <div class="wp-notes-media-option-control wp-notes-radio-option-control <?php WP_Notes_get_selected_output($wp_notes_data['media_embed'] ,'image', 1); ?>">
          <input type="radio" name="WP_Notes_media_type" id="WP_Notes_media_type_image" value="image" <?php WP_Notes_get_selected_output($wp_notes_data['media_embed'] ,'image',1); ?>  data-content-panel-id="wp-notes-image-components"  />
          <label class="wp-notes-option-label" for="WP_Notes_media_type_image"><?php esc_html_e('Image', 'wp-notes-widget') ?></label>
        </div>
        
        <div class="wp-notes-media-option-control wp-notes-radio-option-control <?php WP_Notes_get_selected_output($wp_notes_data['media_embed'],'video'); ?>">
          <input type="radio" name="WP_Notes_media_type" id="WP_Notes_media_type_video" value="video" <?php WP_Notes_get_selected_output($wp_notes_data['media_embed'],'video'); ?> data-content-panel-id="wp-notes-video-components"  />
          <label class="wp-notes-option-label" for="WP_Notes_media_type_video"><?php esc_html_e('Video', 'wp-notes-widget') ?></label>
        </div>

        <div class="wp-notes-media-option-control wp-notes-radio-option-control <?php WP_Notes_get_selected_output($wp_notes_data['media_embed'],'audio'); ?>">
          <input type="radio" name="WP_Notes_media_type" id="WP_Notes_media_type_audio" value="audio" <?php WP_Notes_get_selected_output($wp_notes_data['media_embed'],'audio'); ?> data-content-panel-id="wp-notes-audio-components"  />
          <label class="wp-notes-option-label" for="WP_Notes_media_type_audio"><?php esc_html_e('Audio', 'wp-notes-widget') ?></label>
        </div>

      </div>

      <div class="wp-notes-radio-field-container ">
        <div id="wp-notes-image-components" class="wp-notes-media-component-container wp-notes-radio-component-container  <?php WP_Notes_get_hidden_class_output($wp_notes_data['media_embed'],'image',1); ?>">

          <div class="wp-notes-image-management">
            <div>
              <a href="#" id="wp-notes-add-image-button" class="button" ><?php esc_html_e('Add Image', 'wp-notes-widget') ?></a>
              <a href="#" id="wp-notes-remove-image-button" class="button <?php if ( !($wp_notes_data['image_id'] ) ) { echo 'disabled'; } ?>" ><?php esc_html_e('Remove Image', 'wp-notes-widget') ?></a>
            </div>

            <div class="wp-notes-image-container">
              
              <div class="image <?php if ( !(bool)($wp_notes_data['image_id'] ) ) { echo 'wp-notes-hidden'; } ?>">
                <img id="WP_Notes_image" src="<?php echo $wp_notes_data['image_meta']['src'] ?>" alt="<?php echo $wp_notes_data['image_meta']['alt'] ?>" />
              </div>
              
              <div class="no-image <?php if ( (bool)($wp_notes_data['image_id'] ) ) { echo 'wp-notes-hidden'; } ?>">
                <div class="no-image-box">
                  <div class="text"><?php esc_html_e('No Image Set', 'wp-notes-widget'); ?></div>
                  <div class="no-image-shim"></div>
                </div>
              </div>

            </div>
            
            <input type="hidden" id="WP_Notes_image_id" name="WP_Notes_image_id" value="<?php echo $wp_notes_data['image_id'] ?>" />

          </div>
        
        </div>
        
        <div id="wp-notes-video-components" class="wp-notes-media-component-container wp-notes-radio-component-container  <?php WP_Notes_get_hidden_class_output($wp_notes_data['media_embed'],'video'); ?>">
          <label for="WP_Notes_video_embed_link" >
            <?php esc_html_e('Enter a video page link from Youtube or Vimeo', 'wp-notes-widget'); ?> <br />
            <small><?php esc_html_e('WP Notes Widget will automatically convert it to the embedded format.', 'wp-notes-widget'); ?></small>
          </label>
          <input type="text" class="wp-notes-text full-width"  id="WP_Notes_video_embed_link" name="WP_Notes_video_embed_link" placeholder="https://www.youtube.com/watch?v=EYs_FckMqow" value="<?php echo $wp_notes_data['media_video_link'] ?>" /> 
          <iframe id="WP_Notes_video_embed_preview" src="" ></iframe>
        
        </div>
        <div id="wp-notes-audio-components" class="wp-notes-media-component-container wp-notes-radio-component-container  <?php WP_Notes_get_hidden_class_output($wp_notes_data['media_embed'],'audio'); ?>">
          
          <div class="wp-notes-audio-management">
            
            <div>
              <a href="#" id="wp-notes-add-audio-button" class="button" ><?php esc_html_e('Add Audio File', 'wp-notes-widget') ?></a>
              <a href="#" id="wp-notes-remove-audio-button" class="button <?php if ( !($wp_notes_data['media_audio_id'] ) ) { echo 'disabled'; } ?>" ><?php esc_html_e('Remove Audio File', 'wp-notes-widget') ?></a>
            </div>

            <div class="wp-notes-audio-container">
              
              <div class="audio <?php if ( !(bool)($wp_notes_data['media_audio_id'] ) ) { echo 'wp-notes-hidden'; } ?>">
                <audio id="WP_Notes_audio" src="<?php echo $wp_notes_data['media_audio_src'] ?>" controls >
                  <p><?php esc_html_e('Your browser does not support HTML5 audio.', 'wp-notes-widget'); ?></p>
                </audio>
              </div>
              
              <div class="no-audio <?php if ( (bool)($wp_notes_data['media_audio_id'] ) ) { echo 'wp-notes-hidden'; } ?>">
                <p><?php esc_html_e('No Audio File Set', 'wp-notes-widget'); ?></p>
              </div>

            </div>
            
            <input type="hidden" id="WP_Notes_audio_id" name="WP_Notes_audio_id" value="<?php echo $wp_notes_data['media_audio_id'] ?>" />

          </div>

        </div>      
      </div>


    </div>



    

  </div>

  <h4><?php esc_html_e('Include a Link', 'wp-notes-widget'); ?> <span class="secondary-text" >(<?php esc_html_e('optional','wp-notes-widget'); ?>)</span></h4>
  <div class="content-segment">
    
    <p>
      <label  class="wp-notes-label"  for="WP_Notes_action_text"><?php esc_html_e('Action Text', 'wp-notes-widget') ?></label>
      <input type="text" class="wp-notes-text"   id="WP_Notes_action_text" name="WP_Notes_action_text" placeholder="<?php esc_html_e('Action Link Text', 'wp-notes-widget') ?>"  value="<?php echo $wp_notes_data['action_text'] ?>" />  
    </p>

    <div class="wp-notes-action-link-management">
      <p class="wp-notes-label no-margin-below" ><?php esc_html_e('Action Link', 'wp-notes-widget') ?></p>

      <div class="wp-notes-radio-option-controls ">
        <div class="wp-notes-action-link-control wp-notes-radio-option-control <?php WP_Notes_get_selected_output($wp_notes_data['action_link_type'] ,'plain', 1); ?>">
          <input type="radio" name="WP_Notes_action_link_type" data-content-panel-id="wp-notes-plain-link-components" id="WP_Notes_action_link_type_plain" value="plain" <?php WP_Notes_get_selected_output($wp_notes_data['action_link_type'],'plain',1); ?> />
          <label class="wp-notes-option-label" for="WP_Notes_action_link_type_plain"><?php esc_html_e('Regular Link', 'wp-notes-widget') ?></label>
        </div>
        
        <div class="wp-notes-action-link-control wp-notes-radio-option-control <?php WP_Notes_get_selected_output($wp_notes_data['action_link_type'],'download'); ?>">
          <input type="radio" name="WP_Notes_action_link_type" data-content-panel-id="wp-notes-download-components" id="WP_Notes_action_link_type_download" value="download" <?php WP_Notes_get_selected_output($wp_notes_data['action_link_type'],'download'); ?> />
          <label class="wp-notes-option-label" for="WP_Notes_action_link_type_download"><?php esc_html_e('Download Link', 'wp-notes-widget') ?></label>
        </div>

      </div>

      <div class="wp-notes-radio-field-container ">
        
        <div id="wp-notes-plain-link-components" class="wp-notes-link-component-container wp-notes-radio-component-container <?php WP_Notes_get_hidden_class_output($wp_notes_data['action_link_type'],'plain', 1); ?>">
          <input type="text" class="wp-notes-text full-width" id="WP_Notes_action_link" name="WP_Notes_action_link" placeholder="http://example.com" value="<?php echo $wp_notes_data['action_link'] ?>" />  
          <input type="checkbox" id="WP_Notes_plain_link_new_tab" name="WP_Notes_plain_link_new_tab" value="new_tab" <?php if ((bool)$wp_notes_data['plain_link_new_tab']) { echo 'checked'; } ?>/>
          <label class="wp-notes-option-label" for="WP_Notes_plain_link_new_tab"><?php esc_html_e('Open this link in a new tab', 'wp-notes-widget') ?></label>
        </div>
        
        <div id="wp-notes-download-components" class="wp-notes-link-component-container wp-notes-radio-component-container <?php WP_Notes_get_hidden_class_output($wp_notes_data['action_link_type'],'download'); ?>">
          <a href="#" id="wp-notes-add-download" class="button" ><?php esc_html_e('Add Download','wp-notes-widget'); ?></a>
          <input type="text" class="wp-notes-text" id="WP_Notes_download_link" style="width:100%" readonly="readonly" value="<?php echo $wp_notes_data['download_link'] ?>" />  
          <input type="hidden" id="WP_Notes_download_id" name="WP_Notes_download_id" value="<?php echo $wp_notes_data['download_id'] ?>" />
        </div>
      
      </div>
    </div>
  </div>
</div>