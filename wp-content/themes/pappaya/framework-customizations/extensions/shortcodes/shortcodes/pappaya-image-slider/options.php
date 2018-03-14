<?php if (!defined('FW')) die('Forbidden');
$options = array(
	'slider_type' => array(
		'label'         => esc_html__( 'Slider Type', 'pappaya' ),
		'desc'          => esc_html__( 'Select the slider type here.', 'pappaya' ),
		'type'          => 'select',
		'choices' => array(
			'arrow_always'  => esc_html__( 'Show arrows always', 'pappaya' ),
			'arrow_hover'   => esc_html__( 'Show arrows on hover', 'pappaya' ),
			'arrow_hide'  	=> esc_html__( 'Hide arrows', 'pappaya' ),
			'dots_nav'   	=> esc_html__( 'Dots navigation', 'pappaya' ),
			'thumbnail_nav' => esc_html__( 'Slider with thumbnail', 'pappaya' )
		)
	),
	'slider_looped' => array(
		'type'    => 'switch',
		'label'   => esc_html__('Repeat Slider Loop', 'pappaya'),
	),
	'slider_image_size' => array(
		'type'    => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker'   => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Select Image Size', 'pappaya'),
				'desc'    => esc_html__( 'Select "Default" for uploaded image size and "Custom" for custom size', 'pappaya'),
				'choices' => array(
					'default'  	=> esc_html__( 'Default (uploaded image itself)', 'pappaya'),
					'custom'	=> esc_html__( 'Custom', 'pappaya'),
				)
			)
		),
		'choices'     => array(
			'custom' => array(
				'size'   => array(
					'type'    => 'group',
					'options' => array(
						'width'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Width', 'pappaya' ),
							'desc'  => esc_html__( 'Set image width', 'pappaya' ),
							'value' => 570
						),
						'height' => array(
							'type'  => 'text',
							'label' => esc_html__( 'Height', 'pappaya' ),
							'desc'  => esc_html__( 'Set image height', 'pappaya' ),
							'value' => 375
						)
					)
				),
			)
		)
	),
	'slider_images' => array(
		'label'         => esc_html__( 'Slider Images', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Slider Images', 'pappaya' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Images for Image Slider.', 'pappaya' ),
		'type'          => 'addable-popup',
		'template'      => '{{- slider_image_alt}}',
		'popup-options' => array(
			'slider_image'   => array(
				'label' => esc_html__( 'Slider Image', 'pappaya' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pappaya' ),
				'type'  => 'upload',
			),
			'slider_image_alt' => array(
				'label' => esc_html__( 'Slider Image alt text', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the alternalte text(alt attribute of img tag) for Gallery Image here', 'pappaya' ),
				'type'  => 'text'
			),
		)
	)
);
