<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
?>
<?php 
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
<span class="fw-icon material-icon <?php echo esc_attr($atts['icon_size']); ?> <?php echo esc_attr($bg_class) ?>">
	<span class="icon <?php echo esc_attr($atts['icon_type']); ?>" <?php echo ( $icon_style ); ?>>
		<i class="<?php echo esc_attr($atts['icon']); ?>"></i>
	</span>
	<?php if (!empty($atts['title'])): ?>
		<span class="icon-title"><?php echo esc_html($atts['title']); ?></span>
	<?php endif; ?>
</span>