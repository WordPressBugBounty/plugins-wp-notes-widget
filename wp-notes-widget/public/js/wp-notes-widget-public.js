 
var wpNotesWidget = (function() {
 
    // Private variables and functions
    var sizeNewWindow = function(link, w, h) {
            // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        window.open(link, '_blank', 'width=' + w + ', height='+ h +', top='+top+', left='+left);   
    };

    var registerSocialShareLinkOpen = function() {
      jQuery('a.wp-notes-widget-tweet').on('click', function(e) { 
        e.preventDefault();
        $this = jQuery(this);
        if (!$this.hasClass('disabled')) {
          sizeNewWindow($this.attr('href'), 600, 350);
        }
      });
    }; 
 
    // Public API
    return {
        sizeNewWindow: sizeNewWindow,
        registerSocialShareLinkOpen: registerSocialShareLinkOpen
    };
})();
 
jQuery( document ).ready(function() {
	wpNotesWidget.registerSocialShareLinkOpen();
});
