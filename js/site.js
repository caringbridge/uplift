(function($) {
    $(document).ready(function() {
        if (Modernizr.svg) {
            var $logo = jQuery('.uplift-logo-container a img');
            $logo.attr('src', $logo.data('svg'));
        }
    });
})(jQuery);
