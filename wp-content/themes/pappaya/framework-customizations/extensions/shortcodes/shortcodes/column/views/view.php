<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');
$class_sm = '';
if ( ! empty( $atts['class_col_sm'] ) ) {
	switch ($atts['width']) {
		case '1_6':
			$class_sm = ' fw-col-sm-2';
			break;
		case '1_5':
			$class_sm = ' fw-col-sm-15';
			break;
		case '1_4':
			$class_sm = ' fw-col-sm-3';
			break;
		case '1_3':
			$class_sm = ' fw-col-sm-4';
			break;
		case '1_2':
			$class_sm = ' fw-col-sm-6';
			break;
		case '2_3':
			$class_sm = ' fw-col-sm-8';
			break;
		case '3_4':
			$class_sm = ' fw-col-sm-9';
			break;
		default:
			$class_sm = ' fw-col-sm-12'; // case  1_1
			break;
	}
}

$text_color = '';
$border_color = '';
if ( ! empty( $atts['text_color'] ) ) {
	$text_color = 'color:' . $atts['text_color'] . ';';
	$border_color = 'border-color:' . $atts['text_color'] . ';';
}
$bg_color = '';
$col_extra_classes = '';
$column_extra_classes = '';
if ( ! empty( $atts['background_color'] ) ) {
	$bg_color = 'background-color:' . $atts['background_color'] . ';';
	$col_extra_classes .= 'column-bg ';
}
$bg_image = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
	$col_extra_classes .= 'column-bg ';
}
$padding = '';
if ( ! empty( $atts['column_padding'] )  ) {
	$padding = 'padding:' . $atts['column_padding'] . ';';
	$column_extra_classes .= 'column-padding ';
}
$min_height = '';
if ( ! empty( $atts['min_height'] )  ) {
	$min_height = 'min-height:' . $atts['min_height'] . 'px;';
}

$vertical_center = '';
if ( ! empty( $atts['vertical_center'] )  ) {
	$column_extra_classes .= 'v-center ';
}

$column_style   = ( $text_color||$border_color||$bg_color||$bg_image) ? 'style="' . esc_attr($text_color . $border_color . $bg_color . $bg_image) . '"' : '';

$col_style   = ( $padding||$min_height ) ? 'style="' . esc_attr($padding . $min_height) . '"' : '';

?>
<div class="fw-col <?php echo esc_attr($class); ?><?php echo esc_attr($class_sm); ?> <?php echo esc_attr($atts['text_align']); ?> <?php echo esc_attr($col_extra_classes) ?> " <?php echo ( $column_style ); ?>>
	<div class="column-contents <?php echo esc_attr($column_extra_classes) ?>"<?php echo ( $col_style ); ?>>
		<?php echo !empty($atts['vertical_center']) ? '<div class="col-centered">' : ''; ?>
			<?php echo do_shortcode($content); ?>
		<?php echo !empty($atts['vertical_center']) ? '</div>' : ''; ?>
	</div>
</div>
