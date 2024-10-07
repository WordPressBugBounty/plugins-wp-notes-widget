var shortcode_settings = {};
var stripHTML = function(dirtyString) {
 	cleanString = dirtyString.replace(/<\/?[^>]+(>|$)/g, "");
 	return cleanString;
}

var renderShortcode = function(changed_input_name) {

	/**
	 *
	 * Initialize variables
	 *
	 */
	
	shortcode_settings.title									= jQuery('input#wp-notes-widget__settings__title').val();
	shortcode_settings.max_width 							= jQuery('input#wp-notes-widget__settings__max-width').val();
	shortcode_settings.max_width_units 				= jQuery('select#wp-notes-widget__settings__max-width-units').val();
	shortcode_settings.alignment 							= jQuery('input[name=wp-notes-widget__settings__alignment]:checked').val();
	shortcode_settings.direction							= jQuery('input[name=wp-notes-widget__settings__direction]:checked').val();
	shortcode_settings.thumb_tack_color 			= jQuery('select#wp-notes-widget__settings__thumb-tack-color').val();
	shortcode_settings.background_color 			= jQuery('select#wp-notes-widget__settings__background-color').val();
	shortcode_settings.text_color 						= jQuery('select#wp-notes-widget__settings__text-color').val();
	shortcode_settings.font_size 							= jQuery('select#wp-notes-widget__settings__font-size').val();
	shortcode_settings.show_type 							= jQuery('input[name=wp-notes-widget__settings__show-type]').val();
	shortcode_settings.show_notes 						= jQuery("input[name='wp-notes-widget__settings__select-post[]']") .map(function(){if (jQuery(this).is(':checked')) return jQuery(this).val();}).get().join();
	shortcode_settings.show_date 							= jQuery('input[name=wp-notes-widget__settings__display-date]:checked').val();
	shortcode_settings.use_own_css 						= jQuery('input[name=wp-notes-widget__settings__use-own-css]:checked').val();
	shortcode_settings.hide_if_empty 					= jQuery('input[name=wp-notes-widget__settings__hide-if-empty]:checked').val();
	shortcode_settings.display_single_notes 	= jQuery('input[name=wp-notes-widget__settings__display-single-notes]:checked').val();
	shortcode_settings.display_social_sharing = jQuery('input[name=wp-notes-widget__settings__enable-social-sharing]:checked').val();
	shortcode_settings.no_uppercase 					= jQuery('input[name=wp-notes-widget__settings__no-uppercase]:checked').val();
	shortcode_settings.font_style	 						= jQuery("input[name='wp-notes-widget__settings__font']:checked").val();

	if (!shortcode_settings.show_date) {
		shortcode_settings.show_date = 'false';
	}
	if (!shortcode_settings.use_own_css) {
		shortcode_settings.use_own_css = 'false';
	}
	if (!shortcode_settings.hide_if_empty) {
		shortcode_settings.hide_if_empty = 'false';
	}
	if (!shortcode_settings.display_single_notes) {
		shortcode_settings.display_single_notes = 'false';
	}
	if (!shortcode_settings.display_social_sharing) {
		shortcode_settings.display_social_sharing = 'false';
	}
	if (!shortcode_settings.no_uppercase) {
		shortcode_settings.no_uppercase = 'false';
	}

	shortcode_string = '';

	/**
	 *
	 * Create shortcode output string
	 *
	 */
	
	if (changed_input_name == 'wp-notes-widget__settings__title') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">title="' + shortcode_settings.title + '"</span> ';
	} else {
		shortcode_string += ' title="' + shortcode_settings.title + '" ';
	}
	
	if (changed_input_name == 'wp-notes-widget__settings__thumb-tack-color') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">thumb-tack-color="' + shortcode_settings.thumb_tack_color + '"</span> ';
	} else {
		shortcode_string += ' thumb-tack-color="' + shortcode_settings.thumb_tack_color + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__text-color') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">text-color="' + shortcode_settings.text_color + '"</span> ';
	} else {
		shortcode_string += ' text-color="' + shortcode_settings.text_color + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__background-color') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">background-color="' + shortcode_settings.background_color + '"</span> ';
	} else {
		shortcode_string += ' background-color="' + shortcode_settings.background_color + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__font-size') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">font-size="' + shortcode_settings.font_size + '"</span> ';
	} else {
		shortcode_string += ' font-size="' + shortcode_settings.font_size + '" ';
	}

	switch (shortcode_settings.show_type) {
		case 'notes' :
			if (changed_input_name == 'wp-notes-widget__settings__select-post[]') {
				shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">show-notes="' + shortcode_settings.show_notes + '"</span> ';
			} else {
				shortcode_string += ' show-notes="' + shortcode_settings.show_notes + '" ';
			}
			break;
		case 'category' :

			break;
	}

	if (changed_input_name == 'wp-notes-widget__settings__display-date') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">show-date="' + shortcode_settings.show_date + '"</span> ';
	}	else {
		shortcode_string += ' show-date="' + shortcode_settings.show_date + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__use-own-css') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">use-own-css="' + shortcode_settings.use_own_css + '"</span> ';
	} else {
		shortcode_string += ' use-own-css="' + shortcode_settings.use_own_css + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__hide-if-empty') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">hide-if-empty="' + shortcode_settings.hide_if_empty + '"</span> ';
	} else {
		shortcode_string += ' hide-if-empty="' + shortcode_settings.hide_if_empty + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__display-single-notes') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">multiple-notes="' + shortcode_settings.display_single_notes + '"</span> ';
	} else {
		shortcode_string += ' multiple-notes="' + shortcode_settings.display_single_notes + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__enable-social-sharing') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">social-sharing="' + shortcode_settings.display_social_sharing + '"</span> ';
	} else {
		shortcode_string += ' social-sharing="' + shortcode_settings.display_social_sharing + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__no-uppercase') {		
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">no-uppercase="' + shortcode_settings.no_uppercase + '"</span> ';
	} else {
		shortcode_string += ' no-uppercase="' + shortcode_settings.no_uppercase + '" ';
	}

	if (changed_input_name == 'wp-notes-widget__settings__font') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">font-style="' + shortcode_settings.font_style + '"</span> ';
	} else {
		shortcode_string += ' font-style="' + shortcode_settings.font_style + '" ';
	}

	if (shortcode_settings.max_width_units == 'percent') {
		shortcode_settings.max_width_units = '%';
	}
	if (changed_input_name == 'wp-notes-widget__settings__max-width' || changed_input_name == 'wp-notes-widget__settings__max-width-units') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">max-width="' + shortcode_settings.max_width + shortcode_settings.max_width_units + '"</span> ';
	} else {
		shortcode_string += ' max-width="' + shortcode_settings.max_width + shortcode_settings.max_width_units + '" ';
	}
	
	if (changed_input_name == 'wp-notes-widget__settings__alignment') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">alignment="' + shortcode_settings.alignment + '"</span> ';
	} else {
		shortcode_string += ' alignment="' + shortcode_settings.alignment + '" ';
	}
	
	if (changed_input_name == 'wp-notes-widget__settings__direction') {
		shortcode_string += ' <span class="wp-notes-widget__shortcode__display--settings-change">direction="' + shortcode_settings.direction + '"</span> ';
	} else {
		shortcode_string += ' direction="' + shortcode_settings.direction + '" ';
	}
		
	jQuery("#wp-notes-widget__rendered-shortcode").html('[wp-notes-widget ' + shortcode_string + ' ]');
	
};

var initShortcodeSettingsChangeListeners = function() {
	// Visual Settings
	jQuery('input[type=checkbox],input[type=number],input[type=radio],input[type=text],select').on('change keyup', function(e){
		console.log('input changed');
		renderShortcode(jQuery(e.target).attr('name'));
	});	
	renderShortcode();
};

var initShortcodeModalScrollDisplay = function(){
	jQuery('.wp-notes-widget--tab-content-container .tab-pane').each( function( index, element ){
	  $this = jQuery(this);
	  if (this.scrollHeight > $this.outerHeight() ) {
	  	$this.find('a.wp-notes-widget__scroll-to-bottom').removeClass('hidden');
	  } else {
	  	$this.find('a.wp-notes-widget__scroll-to-bottom').addClass('hidden');
	  }
	});
};

var initScrollListeners = function() {
	jQuery('a.wp-notes-widget__scroll-to-bottom').click(function(e){
		$this = jQuery(this);
		$tab_pane = $this.parent();
		$tab_pane
    $tab_pane.animate({
        scrollTop: $tab_pane[0].scrollHeight
    }, 1000);
    $this.fadeOut( 1000, function() {
	    
	  });
	});
};

jQuery(function($) {
	jQuery('#insert-wp-notes-widget-shortcode').on('click', function(){
		jQuery('#wp-notes-widget__shortcode-editor-modal').modal('show');
	});

	jQuery('#wp-notes-widget--insert-shortcode').on('click', function(){
		wp.media.editor.insert('[wp-notes-widget ' + stripHTML(shortcode_string) + ' ]');
		jQuery('#wp-notes-widget__shortcode-editor-modal').modal('hide');
	});

	jQuery(document).on('change','input[name=wp-notes-widget__settings__show-type]' ,function(){
		var content_id = jQuery(this).data('content-id');
		jQuery('.wp-notes-widget__settings__show-notes-container').addClass('hidden');
		jQuery('#' + content_id).removeClass('hidden'); 
	});

	$("#wp-notes-widget__shortcode-editor-modal").on('shown.bs.modal', function () {
    	initShortcodeModalScrollDisplay();
	});

	$("#wp-notes-widget__shortcode-editor-modal a[data-toggle='tab']").on('shown.bs.tab', function () {
		initShortcodeModalScrollDisplay();
	});

	initShortcodeSettingsChangeListeners();
	initScrollListeners();

});