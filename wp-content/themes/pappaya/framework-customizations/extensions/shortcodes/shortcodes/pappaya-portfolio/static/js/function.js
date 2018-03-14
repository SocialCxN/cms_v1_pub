jQuery(function() {    
    jQuery('.filter_nav li').click(function() {
        jQuery('.filter_nav li').removeClass('active');
        jQuery(this).addClass('active');
    });
    jQuery('.filter_items').filterizr()
});
jQuery(window).load(function(){
	jQuery('.filter_items').filterizr();
})