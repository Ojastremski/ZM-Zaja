// Skrypt zwija menu bez przeladowania strony
/*
jQuery(document).on('click','.navbar-collapse.in',function(e) {
    if( jQuery(e.target).is('a') ) {
        jQuery(this).collapse('hide');
    }
});
*/
/*
jQuery( document ).ready(function() {
    jQuery('#menu-main-menu').addClass('nav');
});
*/

jQuery( document ).ready(function() {
    jQuery("#mySlider1").AnimatedSlider( { prevButton: "#btn_prev1",
        nextButton: "#btn_next1",
        visibleItems: 3,
        infiniteScroll: true,
        willChangeCallback: function(obj, item) {
            jQuery('.name-jacht').hide();
            jQuery('.cena-od').hide();
        },
        changedCallback: function(obj, item) {
            jQuery('.current_item .name-jacht').show("slow");
            jQuery('.current_item .cena-od').show("slow");
        }
    });
    jQuery("#mySlider1").children("li").eq(1).find(".name-jacht").show();
    jQuery("#mySlider1").children("li").eq(1).find(".cena-od").show();
});



jQuery( document ).ready(function() {
    jQuery(".container-post").find('a').hover(
        function(){
            jQuery(this).next().hide('slow');
        },
        function(){
            jQuery(this).next().show('slow');
        });
});
