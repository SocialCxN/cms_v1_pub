<?php if (!defined('FW')) die('Forbidden');
/**

 * @var $atts The shortcode attributes

 */
$color = '';
$bg_color = '';
if ( ! empty( $atts['color'] ) ) {
    $bg_color = 'background-color:' . $atts['color'] . ';';
    $color = 'color:' . $atts['color'] . ';';
}
$bar_style       = ( $bg_color ) ? 'style="' . esc_attr($bg_color) . '"' : '';
$bar_color       = ( $color ) ? 'style="' . esc_attr($color) . '"' : '';
if ( (isset($atts['barchart_heading']) && strlen($atts['barchart_heading'])>0)||(isset($atts['barchart_count']) && strlen($atts['barchart_count'])>0) ){
?>

	<div class="bar-chart" data-count="<?php if(isset($atts['barchart_count'])&&strlen($atts['barchart_count'])>0){echo esc_attr($atts['barchart_count']);} ?>">
			<div class="bar-chart-head">
				<?php if (isset($atts['barchart_heading']) && strlen($atts['barchart_heading'])>0 ) { ?>
		        	<span class="bar-chart-title"><?php echo esc_html($atts['barchart_heading']); ?></span>
				<?php } ?>
		        <span class="bar-chart-count" <?php echo ( $bar_color ); ?>>00</span>
		    </div>
	    <div class="bar-chart-progress">
	        <div class="progress-line" <?php echo ( $bar_style ); ?>></div>
	    </div>
	</div>
<?php }