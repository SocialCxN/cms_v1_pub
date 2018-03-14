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
		)
	),
	'slider_looped' => array(
		'type'    => 'switch',
		'label'   => esc_html__('Repeat Slider Loop', 'pappaya'),
		'left-choice' => array(
	        'value' => 1,
	        'label' => esc_html__('Yes', 'pappaya'),
	    ),
	    'right-choice' => array(
	        'value' => 0,
	        'label' => esc_html__('No', 'pappaya'),
	    ),
	),
	'slider_images' => array(
		'label'         => esc_html__( 'Slider Images', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Slider Images', 'pappaya' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Images for Image Slider.', 'pappaya' ),
		'type'          => 'addable-popup',
		'template'      => '{{- slide_title}}',
		'popup-options' => array(
			'slider_image'   => array(
				'label' => esc_html__( 'Slider Image', 'pappaya' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pappaya' ),
				'type'  => 'upload',
			),
			'slide_title' => array(
				'label' => esc_html__( 'Slide Title', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Title(for example, Team Member "Name" if the slider used for team members).', 'pappaya' ),
				'type'  => 'text'
			),
			'slide_sub_title' => array(
				'label' => esc_html__( 'Slide Sub-Title', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Sub-Title(for example, Team Member "Position" if the slider used for team members).', 'pappaya' ),
				'type'  => 'text'
			),
			'slide_content' => array(
				'label' => esc_html__( 'Slide Content', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Content text block.', 'pappaya' ),
				'type'  => 'textarea'
			),
			'slide_fb'  => array(
				'label' => esc_html__( 'Slide Facebook', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Facebook Link.', 'pappaya' ),
				'type'  => 'text'
			),
			'slide_twt' => array(
				'label' => esc_html__( 'Slide Twitter', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Twitter Link.', 'pappaya' ),
				'type'  => 'text'
			),
			'slide_lin' => array(
				'label' => esc_html__( 'Slide Linkedin', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Linkedin Link.', 'pappaya' ),
				'type'  => 'text'
			),
			'slide_pin' => array(
				'label' => esc_html__( 'Slide Pinterest', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Pinterest Link.', 'pappaya' ),
				'type'  => 'text'
			),
			'slide_gp'  => array(
				'label' => esc_html__( 'Slide Google-Plus', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Google-Plus Link.', 'pappaya' ),
				'type'  => 'text'
			),
			'slide_ytb' => array(
				'label' => esc_html__( 'Slide Youtube', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Slide Youtube Link.', 'pappaya' ),
				'type'  => 'text'
			),
		)
	)
);