<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type' => 'icon',
		'label' => esc_html__( 'Icon', 'pappaya' )
	),
	'title'    => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'pappaya' ),
		'desc'  => esc_html__( 'Icon title', 'pappaya' ),
	),
	'icon_size'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Icon size', 'pappaya'),
		'choices' => array(
			'icon-large' => esc_html__('Large', 'pappaya'),
			'icon-medium' => esc_html__('Medium', 'pappaya'),
		)
	),
	'icon_type'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Icon type', 'pappaya'),
		'choices' => array(
			'flat' => esc_html__('Flat', 'pappaya'),
			'card' => esc_html__('Raised', 'pappaya'),
		)
	),
	'icon_color' => array(
		'label' => esc_html__('Icon Color', 'pappaya'),
		'desc'  => esc_html__('Please select the icon color', 'pappaya'),
		'type'  => 'color-picker',
	),
	'background_color' => array(
		'label' => esc_html__('Background Color', 'pappaya'),
		'desc'  => esc_html__('Please select the icon background color', 'pappaya'),
		'type'  => 'color-picker',
	),
);