/**
 * Created by Nikita on 04.11.2015.
 */
    jQuery(window).load(function() {
        window.scrollTo(0,0);
        jQuery( "#loader" ).animate({
            opacity: 0
        }, 500, function() {
            jQuery("#loader").hide();
        });
    });