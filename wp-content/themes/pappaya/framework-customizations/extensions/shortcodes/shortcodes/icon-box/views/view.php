<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */

/*
 * `.fw-iconbox` supports 3 styles:
 * `fw-iconbox-1`, `fw-iconbox-2` and `fw-iconbox-3`
 */

$icon_color = '';
if ( ! empty( $atts['icon_color'] ) ) {
	$icon_color = 'color:' . $atts['icon_color'] . ';';
}
$bg_color = '';
$bg_class = '';
if ( ! empty( $atts['background_color'] ) ) {
	$bg_color = 'background-color:' . $atts['background_color'] . ';';
	$bg_class =  'bg-filled';
} 
$icon_style   = ( $bg_color || $icon_color) ? 'style="' . esc_attr($icon_color . $bg_color) .'"' : '';

?>
<div class="fw-iconbox material-icon clearfix <?php echo esc_attr($atts['style']); ?> <?php echo esc_attr($atts['icon_size']); ?> <?php echo esc_attr($bg_class) ?> ">
	<div class="icon <?php echo esc_attr($atts['icon_type']); ?>" <?php echo ( $icon_style ); ?>>
		<i class="<?php echo esc_attr($atts['icon']); ?>"></i>
	</div>
	<div class="fw-iconbox-aside">
		<div class="icon-title"><?php echo esc_html($atts['title']); ?></div>
		<div class="fw-iconbox-text">
			<p><?php echo esc_html($atts['content']); ?></p>
		</div>
	</div>
</div>