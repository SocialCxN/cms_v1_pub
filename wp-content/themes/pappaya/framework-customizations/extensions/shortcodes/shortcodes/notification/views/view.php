<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<div class="alert alert-<?php echo esc_attr($atts['type']); ?>">
	<?php
	switch ( $atts['type'] ) {
		case 'success' :
			echo '<span class="alert-icon"><i class="fa fa-check-circle"></i></span>';
			echo '<div class="alert-content">' . esc_html__('Congratulations!', 'pappaya');
			break;
		case 'info' :
			echo '<span class="alert-icon"><i class="fa fa-exclamation-circle"></i></span>';
			echo '<div class="alert-content">' . esc_html__('Information!', 'pappaya');
			break;
		case 'warning' :
			echo '<span class="alert-icon"><i class="fa fa-warning"></i></span>';
			echo '<div class="alert-content">' . esc_html__('Alert!', 'pappaya');
			break;
		case 'danger' :
			echo '<span class="alert-icon"><i class="fa fa-times-circle"></i></span>';
			echo '<div class="alert-content">' . esc_html__('Error!', 'pappaya');
			break;
	}
	echo esc_html( $atts['message'] );
	?>
	</div>
</div>