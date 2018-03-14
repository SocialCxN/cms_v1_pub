<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Box Style', 'pappaya'),
		'choices' => array(
			'fw-iconbox-1' => esc_html__('Icon above title', 'pappaya'),
			'fw-iconbox-2' => esc_html__('Icon in line with title', 'pappaya')
		)
	),
	'icon'    => array(
		'type'  => 'icon',
		'label' => esc_html__('Choose an Icon', 'pappaya'),
	),
	'title'   => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'pappaya' ),
	),
	'content' => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Content', 'pappaya' ),
		'desc'  => esc_html__( 'Enter the desired content', 'pappaya' ),
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