(function( $ ) {
	
	var disable_post_adjustment_container = function($container, $cat_container) {
		$container.removeClass('hidden');
		$container.addClass('disabled ');
		$cat_container.addClass('hidden');
	};

	var enable_post_adjustment_container = function($container, $cat_container) {
		$container.removeClass('disabled hidden');
		$cat_container.addClass('hidden');
	};

	var show_category_selector_list = function($post_container, $cat_container) {
		$post_container.addClass('hidden');
		$cat_container.removeClass('hidden');
	};

	$(document).on('change', 'input.wp-notes-widget-post-adjustment-radio', function () {
	  var $post_container = $(this).closest('.wp-notes-widget-admin-third').find('.wp-notes-widget-adjustment-list-container--notes');
	  var $cat_container = $(this).closest('.wp-notes-widget-admin-third').find('.wp-notes-widget-adjustment-list-container--category');

	  if ($(this).val() == 'none' && $(this).is(':checked')) {
	  	disable_post_adjustment_container($post_container, $cat_container); 
	  } else if  ($(this).val() == 'category' && $(this).is(':checked')) {
	  	show_category_selector_list($post_container, $cat_container);
	 	} else {
	  	enable_post_adjustment_container($post_container, $cat_container); 
	  }
	});

	$(document).on('click', '.wp-notes-widget-adjustment-list-container.disabled input[type=checkbox]', function (e) {
		e.preventDefault();
		e.stopPropagation();
		return;
	});
	
})( jQuery );
