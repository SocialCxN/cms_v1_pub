<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'title'   => esc_html__('Page Options','pappaya'),
		'type'    => 'box',
		'options' => array(
			fw()->theme->get_options( 'page-box' ),
		),
	),
);