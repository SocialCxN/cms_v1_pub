<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
	$bg_color = '';
	$section_extra_classes = '';
	if ( ! empty( $atts['background_color'] ) ) {
		$bg_color = 'background-color:' . $atts['background_color'] . ';';
		$section_extra_classes .= 'dynamic-bg';
	}
	$text_color = '';
	if ( ! empty( $atts['text_color'] ) ) {
		$text_color = 'color:' . $atts['text_color'] . ';';
	}

	$bg_image = '';
	if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
		$bg_image = 'background-image:url(' . $atts['background_image']['data']['icon'] . ');';
	}
	$call_to_action_style   = ( $bg_color || $text_color || $bg_image ) ? 'style="' . esc_attr($bg_color . $text_color . $bg_image) . '"' : '';
 ?>
<div class="fw-call-to-action" <?php echo ( $call_to_action_style ); ?>>

	<div class="fw-full fw-action-content">
		<?php if (!empty($atts['title'])): ?>
			<h3><?php echo esc_html( $atts['title'] ); ?></h3>
		<?php endif;
		if (!empty($atts['message'])){ ?>
			<p><?php echo esc_html( $atts['message'] ); ?></p>
		<?php } ?>
	</div>
	<div class="fw-full fw-action-btn" >
		<a href="<?php echo esc_attr($atts['button_link']); ?>" class="btn waves-effect waves-light" target="<?php echo esc_attr($atts['button_target']); ?>"<?php if(!empty($atts['button_color'])){echo ' style="background-color:'.esc_attr($atts['button_color']).';"';} ?> >
			<span><?php echo esc_html( $atts['button_label'] ); ?></span>
		</a>
	</div>

</div>