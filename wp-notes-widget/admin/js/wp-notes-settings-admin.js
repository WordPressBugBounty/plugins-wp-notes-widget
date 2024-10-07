jQuery(document).ready(function() {
	var hash = window.location.hash.substr(1);
	jQuery('#wp-notes-widget__settings-tab-list a[href="#'+ hash +'"]').tab('show');

});
