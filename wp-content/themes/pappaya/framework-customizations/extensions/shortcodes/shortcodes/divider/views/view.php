<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$color_class = '';

if( 'line' === $atts['style']['ruler_type'] ){
	if( $atts['style']['line']['line_color'] === 'primary' ){
		$color_class = 'divider-primary';
	}
	elseif( $atts['style']['line']['line_color'] === 'secondary' ){
		$color_class = 'divider-secondary';
	}
	elseif( $atts['style']['line']['line_color'] === 'light' ){
		$color_class = 'divider-light';
	}
	elseif( $atts['style']['line']['line_color'] === 'gray' ){
		$color_class = 'divider-gray';
	}
	?>
	<div class="wn-divider <?php echo esc_attr($color_class);?>">
		<span class="divider-left"><span></span></span>
		<div class="divider-line"></div>
		<span class="divider-right"><span></span></span>
	</div>
	<?php
}

if( 'with_text' === $atts['style']['ruler_type'] ){
	if( $atts['style']['with_text']['text_color'] === 'primary' ){
		$color_class = 'divider-primary';
	}
	elseif( $atts['style']['with_text']['text_color'] === 'secondary' ){
		$color_class = 'divider-secondary';
	}
	elseif( $atts['style']['with_text']['text_color'] === 'light' ){
		$color_class = 'divider-light';
	}
	elseif( $atts['style']['with_text']['text_color'] === 'gray' ){
		$color_class = 'divider-gray';
	}
	$text = isset($atts['style']['with_text']['text_used']) ? $atts['style']['with_text']['text_used'] : '';
	?>
	<div class="wn-divider decorated-divider <?php echo esc_attr($color_class);?>">
		<span class="divider-left"><span></span></span>
		<div class="divider-line"> <?php echo esc_html($text);?></div>
		<span class="divider-right"><span></span></span>
	</div>
	<?php
}

if( 'with_icon' === $atts['style']['ruler_type'] ){
	if( $atts['style']['with_icon']['icon_color'] === 'primary' ){
		$color_class = 'divider-primary';
	}
	elseif( $atts['style']['with_icon']['icon_color'] === 'secondary' ){
		$color_class = 'divider-secondary';
	}
	elseif( $atts['style']['with_icon']['icon_color'] === 'light' ){
		$color_class = 'divider-light';
	}
	elseif( $atts['style']['with_icon']['icon_color'] === 'gray' ){
		$color_class = 'divider-gray';
	}
	$icon = isset($atts['style']['with_icon']['icon_used']) ? $atts['style']['with_icon']['icon_used'] : '';
	?>
	<div class="wn-divider decorated-divider <?php echo esc_attr($color_class);?>">
		<span class="divider-left"><span></span></span>
		<div class="divider-line"><i class="fa <?php echo esc_attr($icon);?>"></i></div>
		<span class="divider-right"><span></span></span>
	</div>
	<?php
}	


if ( 'space' === $atts['style']['ruler_type'] ): ?>
	<div class="wn-divider-space" style="padding-top: <?php echo (int) $atts['style']['space']['height']; ?>px;"></div>
<?php endif; ?>