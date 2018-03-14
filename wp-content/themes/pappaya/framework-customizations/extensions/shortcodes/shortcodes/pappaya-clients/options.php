<?php if (!defined('FW')) die('Forbidden');

$options = array(
	// 'slider_title' => array(
	// 	'type'    => 'text',
	// 	'label'   => esc_html__('Slider Title', 'pappaya')
	// ),
	'slider_type'  => array(
		'type'    => 'select',
		'label'   => esc_html__('Slider Type', 'pappaya'),
		'choices' => array(
			6   => '6 Columns',
			4 	=> '4 Columns',
			3 	=> '3 Columns',
			2 	=> '2 Columns'
		)
	),
	'client_images' => array(
		'label'         => esc_html__( 'Client Images', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Client Images', 'pappaya' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Images for Client Image Slider.', 'pappaya' ),
		'type'          => 'addable-popup',
		'template'      => '{{- client_image_alt}}',
		'popup-options' => array(
			'client_image'   => array(
				'label' => esc_html__( 'Client Image', 'pappaya' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pappaya' ),
				'type'  => 'upload',
			),
			'client_image_alt' => array(
				'label' => esc_html__( 'Client Image alt text', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the alternalte text(alt attribute of img tag ) for Client Image here', 'pappaya' ),
				'type'  => 'text'
			)
		)
	)
);