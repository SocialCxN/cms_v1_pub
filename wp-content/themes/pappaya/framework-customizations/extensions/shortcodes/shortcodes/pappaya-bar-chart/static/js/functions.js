jQuery(document).ready(function(){
    jQuery('.bar-chart').each(function(){
        jQuery(this).appear(function(){
	        var count = jQuery(this).data('count');
	        percent   = count+('%');
    		jQuery(this).find('.bar-chart-count').css({'margin-left':'-82px'})
            jQuery(this).find('.progress-line').css({'width':percent});
            jQuery(this).find('.bar-chart-count').css({'left':percent}).animate({ Counter: count}, {
                duration: 800,
                easing: 'swing',
                step: function () {
                    jQuery(this).text(Math.ceil(this.Counter)+('%'));
                }
            }).addClass('animated');
        });
    })
});