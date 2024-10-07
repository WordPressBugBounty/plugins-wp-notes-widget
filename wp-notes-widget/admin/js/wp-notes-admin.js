(function( $ ) {
  

  wpNotesMediaControls = function() {
    var add_image_frame; // Wordpress media frame which controls the selection, change, or removal of an image
    var add_download_frame; // Wordpress media frame which controls the selection, change, or removal of download file
    var fade_time = 200; // The fade time (in milliseconds) of the link type background change, and image selection or removal


     /*============================================================================
       IMAGE SELECTION FROM MEDIA GALLERY
     ==============================================================================*/

    jQuery('#wp-notes-add-image-button').on('click', function(e) { 
      e.preventDefault(); // Prevents page from jumping to top of screen when clicked
      
      if ( $(this).hasClass('disabled') ) {
          return;
      }

      add_image_frame = wp.media({
         title      : translations.image_choose,
         frame      : 'select',
         multiple   : false,
         library    : { type : 'image' },
         button     : { text : translations.image_add }
      });

      add_image_frame.on('close',function() {
        var selection = add_image_frame.state().get('selection');
        var url, is, alt;

        if (!selection.length) {
          wpNotesRemoveImage();
          return;
        }

        // although the selection will only be 1 image, it is treated like an array in case future version feature a gallery of images
        selection.each(function(attachment) {
          url   = attachment.attributes.url;
          id    = attachment.attributes.id;
          alt   = attachment.attributes.alt;
          wpNotesShowImage(url, alt, id);
        });

      });

      add_image_frame.on('open', function() {   
          
        var $image_id = jQuery('#WP_Notes_image_id');
        var selection = add_image_frame.state().get('selection');
          
        ids = $image_id.val().split(',');
        ids.forEach(function(id) {
           attachment = wp.media.attachment(id);
          attachment.fetch();
          selection.add( attachment ? [ attachment ] : [] );
        });

      });

      add_image_frame.open();

    });


     /*============================================================================
       AUDIO SELECTION FROM MEDIA GALLERY
     ==============================================================================*/
    jQuery('#wp-notes-add-audio-button').on('click', function(e) { 
      e.preventDefault(); // Prevents page from jumping to top of screen when clicked
      
      if ( $(this).hasClass('disabled') ) {
          return;
      }

      add_audio_frame = wp.media({
         title    : translations.audio_choose,
         frame    : 'select',
         multiple : false,
         library  : { type : 'audio' },
         button   : { text : translations.audio_add }
      });

      add_audio_frame.on('close',function() {
        var selection = add_audio_frame.state().get('selection');
        var url, is, alt;

        if (!selection.length) {
          wpNotesRemoveAudio();
          return;
        }

        // although the selection will only be 1 image, it is treated like an array in case future version feature a gallery of images
        selection.each(function(attachment) {
          
          url = attachment.attributes.url;
          id = attachment.attributes.id;
          wpNotesShowAudio(url, id);
          
        });

      });

      add_audio_frame.on('open', function() {   
          
        var $audio_id = jQuery('#WP_Notes_audio_id');
        var selection = add_audio_frame.state().get('selection');
          
        ids = $audio_id.val().split(',');
        ids.forEach(function(id) {
          attachment = wp.media.attachment(id);
          attachment.fetch();
          selection.add( attachment ? [ attachment ] : [] );
        });

      });

      add_audio_frame.open();

    });


    /*============================================================================
      DOWNLOAD ATTACHMENT SELECTION FROM MEDIA GALLERY
    ==============================================================================*/

    jQuery('#wp-notes-add-download').on('click', function(e) { 
      e.preventDefault();
      if ( $(this).hasClass('disabled') ) {
          return;
      }

      add_download_frame = wp.media({
        title     : translations.download_choose,
        frame     : 'select',
        multiple  : false,
        button    : { text : translations.download_add }
      });

      add_download_frame.on('close',function() {
        var $download_link  = $('input#WP_Notes_download_link');
        var $download_id    = $('input#WP_Notes_download_id');
        var selection       = add_download_frame.state().get('selection');
        var url, id;

        if (!selection.length) {
          $download_link.attr('value', '');
          $download_id.attr('value', '');
          return;
        }
        
        selection.each(function(attachment) {
          url = attachment.attributes.url;
          id = attachment.attributes.id;
          $download_link.attr('value', url);
          $download_id.attr('value', id);
        });

      });

      add_download_frame.on('open', function() {   
        var selection = add_download_frame.state().get('selection');

        if (vals = jQuery('#WP_Notes_download_id').val()) {
            
          ids = vals.split(',');
          ids.forEach(function(id) {
            attachment = wp.media.attachment(id);
            attachment.fetch();
            selection.add( attachment ? [ attachment ] : [] );
          });

        }
      });

      add_download_frame.open();

    });
    


    /*============================================================================
      ACTION LINK CONTROLS ON NOTES POST PAGE
    ==============================================================================*/

    var $action_link_control    = $('.wp-notes-action-link-control');
    var $link_component_container = $('.wp-notes-link-component-container');

    $('input[name=WP_Notes_action_link_type]').on('change', function(e) {
      var $this     = $(e.target);
      var panel_id  = $this.data('content-panel-id');
      var $panel    = $('#' + panel_id);
      //if the 'plain link' option is chosen we want to hide all download elements and display 'plain link' elements
      if ($this.is(':checked') ) {

        $action_link_control.removeClass('checked');
        $this.parent().addClass('checked');

        $link_component_container.not('#' + panel_id) .fadeOut( fade_time, function() {
          $link_component_container.not('#' + panel_id).addClass('wp-notes-hidden');
          $panel.removeClass('wp-notes-hidden');
          $panel.addClass('wp-notes-show');
          $panel.fadeIn( fade_time, function() {});
        });

      }

    });


    /*============================================================================
      MEDIA CONTROLS ON NOTES POST PAGE
    ==============================================================================*/

    var $media_option_control    = $('.wp-notes-media-option-control');
    var $media_component_container = $('.wp-notes-media-component-container');

    $('input[name=WP_Notes_media_type]').on('change', function(e) {
      var $this = $(e.target);
      var panel_id = $this.data('content-panel-id');
      var $panel = $('#' + panel_id);
      //if the 'plain link' option is chosen we want to hide all download elements and display 'plain link' elements
      if ($this.is(':checked') ) {

        $media_option_control.removeClass('checked');
        $this.parent().addClass('checked');

        $media_component_container.not('#' + panel_id) .fadeOut( fade_time, function() {
          $media_component_container.not('#' + panel_id).addClass('wp-notes-hidden');
          $panel.removeClass('wp-notes-hidden');
          $panel.addClass('wp-notes-show');
          $panel.fadeIn( fade_time, function() {});
        });

      }

    });



    /*============================================================================
      AUDIO REMOVAL/SHOW ON NOTE POST PAGE
    ==============================================================================*/

    $('#wp-notes-remove-audio-button').on('click', function(e) {
      e.preventDefault();
      if ( $(this).hasClass('disabled') ) {
        return;
      }
      wpNotesRemoveAudio();
    });

    var $audio_container      = $('.wp-notes-audio-container .audio');
    var $no_audio_container   = $('.wp-notes-audio-container .no-audio');
    var $audio                = $('audio#WP_Notes_audio');
    var $audio_id             = $('input#WP_Notes_audio_id');
    var $remove_audio_button  = $('#wp-notes-remove-audio-button');

    //removes the image and displays a 'no image selected' box
    function wpNotesRemoveAudio() {

      $audio_container.fadeOut( fade_time, function() {
        $audio_container.addClass('wp-notes-hidden');
        $no_audio_container.removeClass('wp-notes-hidden');
        $audio.attr('src', '');
        $audio_id.attr('value', '');
        $no_audio_container.fadeIn( fade_time, function() {
          $remove_audio_button.addClass('disabled');
        });
      });

    }

    //removes the 'no image selected' box and displays the new image
    function wpNotesShowAudio(url, id) {

      $no_audio_container.fadeOut( fade_time, function() {
        $no_audio_container.addClass('wp-notes-hidden');
        $audio_container.removeClass('wp-notes-hidden');
        $audio.attr('src', url);
        $audio_id.attr('value', id);
        $audio_container.fadeIn( fade_time, function() {
          $remove_audio_button.removeClass('disabled');
        });
      });

    }


    /*============================================================================
      IMAGE REMOVAL/SHOW ON NOTE POST PAGE
    ==============================================================================*/

    $('#wp-notes-remove-image-button').on('click', function(e) {
      e.preventDefault();
      if ( $(this).hasClass('disabled') ) {
        return;
      }
      wpNotesRemoveImage();
    });

    //removes the image and displays a 'no image selected' box
    function wpNotesRemoveImage() {
      var $image_container      = $('.wp-notes-image-container .image');
      var $no_image_container   = $('.wp-notes-image-container .no-image');
      var $image                = $('img#WP_Notes_image');
      var $image_id             = $('input#WP_Notes_image_id');
      var $remove_image_button  = $('#wp-notes-remove-image-button');

      $image_container.fadeOut( fade_time, function() {
        $image_container.addClass('wp-notes-hidden');
        $no_image_container.removeClass('wp-notes-hidden');
        $image.attr('src', '');
        $image.attr('alt', '');
        $image_id.attr('value', '');
        $no_image_container.fadeIn( fade_time, function() {
          $remove_image_button.addClass('disabled');
        });
      });

    }

    //removes the 'no image selected' box and displays the new image
    function wpNotesShowImage(url, alt, id) {
      var $image_container      = $('.wp-notes-image-container .image');
      var $no_image_container   = $('.wp-notes-image-container .no-image');
      var $image                = $('img#WP_Notes_image');
      var $image_id             = $('input#WP_Notes_image_id');
      var $remove_image_button  = $('#wp-notes-remove-image-button');

      $no_image_container.fadeOut( fade_time, function() {
        $no_image_container.addClass('wp-notes-hidden');
        $image_container.removeClass('wp-notes-hidden');
        $image.attr('src', url);
        $image.attr('alt', alt);
        $image_id.attr('value', id);
        $image_container.fadeIn( fade_time, function() {
          $remove_image_button.removeClass('disabled');
        });
      });

    }


    /*============================================================================
      DYNAMIC UPDATE OF VIDEO IFRAME
    ==============================================================================*/

    function get_video_id(url) {
      var vimeo_Reg     = /https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:(channels|ondemand)\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/;
      var youtube_reg   = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;      
      var vimeo_match   = url.match(vimeo_Reg);
      var youtube_match = url.match(youtube_reg);

      if (vimeo_match) {

        return {
          type: 'vimeo',
          id: vimeo_match[4]
        };

      } else {
        
        if (youtube_match) {
          return {
            type: 'youtube',
            id: youtube_match[1]
          };
        } else {
          return false;
        }

      }
    }


    function update_video_preview() {
      video_embed = get_video_id( $('#WP_Notes_video_embed_link').val() );
      embed_url = '';
      switch (video_embed.type) {
        case 'vimeo' :
          embed_url = 'http://player.vimeo.com/video/' + video_embed.id;
          break;
        case 'youtube' :
          embed_url = 'http://www.youtube.com/embed/' + video_embed.id;
          break;
        default :

          break;
      }
      $('#WP_Notes_video_embed_preview').attr('src', embed_url);      
    }

    $('input#WP_Notes_video_embed_link').on('change', function(){
      update_video_preview();
    });


    update_video_preview();
  }





  /*============================================================================
    TWITTER COUNT AND LIVE FEEDBACK
  ==============================================================================*/

  var wpNotesTwitterControls = function() {
    var $tweet_body         = $('#WP_Notes_tweet_body');
    var $action_link        = $('#WP_Notes_action_link');
    var $download_link      = $('#WP_Notes_download_link');
    var $over_limit_text    = $('#WP_Notes_twitter_over_limit_text');
    
    $('#WP_Notes_twitter_copy_text').on('click', function(e) {
      
      //copy text from the main note body into the tweet body
      e.preventDefault();
      $tweet_body.val( $('#WP_Notes_text').val() );
      $tweet_body.trigger('propertychange');
    });

    $tweet_body.on('input propertychange', function(e) {
       var remaining_length       = 140;
       var tweet_body_text        = $tweet_body.val();
       var url_length             = 0;
       var target_url             = '';
       var $plain_link_radio      = $("#WP_Notes_action_link_type_plain");
       var $download_link_radio   = $("#WP_Notes_action_link_type_download");
       var $chars_remaining       = $('#WP_Notes_twitter_chars_remaining');
       var $video_link            = $('#WP_Notes_video_embed_link');


      if (tweet_body_text.indexOf("*url*") != -1) {
        // if a URL is detected in the tweet

        // check if we are dealing with a download link or a plain link
        if ($plain_link_radio.is(':checked') ) {
          target_url = $action_link.val();     
        } else if ($download_link_radio.is(':checked') ) {
          target_url = $download_link.val();
        }

        // links starting with https:// take up 1 more character compared to http://
        if (/^((https):\/\/)/i.test(target_url)) {
          url_length = wp_notes_widget_twitter_url_short_length_https;
        } else if (target_url.length) {
          //if https:// is not at the start, we assume we are dealing with a http:// link
          url_length = wp_notes_widget_twitter_url_short_length;
        }

        remaining_length -= (tweet_body_text.length + url_length);
      } else {
        remaining_length -= tweet_body_text.length;
      }


      if (tweet_body_text.indexOf("*video*") != -1) {
        // if a video URL is detected in the tweet

        // check if we are dealing with a download link or a plain link
        target_url = $video_link.val();
        
        // links starting with https:// take up 1 more character compared to http://
        if (/^((https):\/\/)/i.test(target_url)) {
          url_length = wp_notes_widget_twitter_url_short_length_https;
        } else if (target_url.length) {
          //if https:// is not at the start, we assume we are dealing with a http:// link
          url_length = wp_notes_widget_twitter_url_short_length;
        }

        remaining_length -= url_length;
      } 

      if (remaining_length < 0) {
        // if tweet text is over the limit, make the appropriate UI changes
        $chars_remaining.addClass('over-limit');
        $over_limit_text.slideDown(); 
      } else {
        $chars_remaining.removeClass('over-limit');
        $over_limit_text.slideUp(); 
      }

      $chars_remaining.html(remaining_length);

    });

    //on page load update the tweet count
    $tweet_body.trigger('propertychange');

    //we listen to the link inputs for changes. If they change, we notify the tweet count to check it's count again.
    $action_link.on('input propertychange', function(e) {
      $tweet_body.trigger('propertychange');
    });    
    $download_link.on('input propertychange', function(e) {
      $tweet_body.trigger('propertychange');
    });
    
    if (typeof wp_notes_widget_twitter_over_limit_text != 'undefined' ) {
      $over_limit_text.text('( ' + wp_notes_widget_twitter_over_limit_text + ' )');
    }
    
  }

  $( document ).ready(function() {
    wpNotesMediaControls();            
    wpNotesTwitterControls();
  });
  

})( jQuery );


