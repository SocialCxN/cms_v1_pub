<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'pappaya' ),
		'desc'  => esc_html__( 'Name of the person', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'pappaya' ),
		'desc'  => esc_html__( 'Job title of the person.', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	),
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'pappaya' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pappaya' ),
		'type'  => 'upload'
	),
	'desc'  => array(
		'label' => esc_html__( 'Team Member Description', 'pappaya' ),
		'desc'  => esc_html__( 'Enter a few words that describe the person', 'pappaya' ),
		'type'  => 'textarea',
		'value' => ''
	),
	'team_bg_color' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Select color', 'pappaya' ),
		'desc'    => esc_html__( 'Here you can set the color of the Team Member', 'pappaya' ),
		'choices' => array(
			'bg-primary'  	=> esc_html__( 'Primary Background', 'pappaya' ),
			'bg-secondary'	=> esc_html__( 'Secondary Background', 'pappaya'),
			'bg-custom-1'	=> esc_html__( 'Custom color-1 Background', 'pappaya'),
			'bg-custom-2' 	=> esc_html__( 'Custom color-2 Background', 'pappaya' ),
			'bg-custom-3'	=> esc_html__( 'Custom color-3 Background', 'pappaya'),
			'bg-light'	 	=> esc_html__( 'Custom color-4 (Light) Background', 'pappaya' ),
		)
	),
	'team_style_type' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Team Member Type', 'pappaya' ),
		'desc'    => esc_html__( 'Here you can set the styling of the Team Member', 'pappaya' ),
		'choices' => array(
			'flat'  	=> esc_html__( 'Flat', 'pappaya' ),
			'card'	=> esc_html__( 'Card', 'pappaya'),
		)
	),
	'fb_link'   => array(
		'label' => esc_html__( 'Facebook Link', 'pappaya' ),
		'desc'  => esc_html__( 'Facebook Link of the person.', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	),
	'tw_link'   => array(
		'label' => esc_html__( 'Twitter Link', 'pappaya' ),
		'desc'  => esc_html__( 'Twitter Link of the person.', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	),
	'ln_link'   => array(
		'label' => esc_html__( 'Linkedin Link', 'pappaya' ),
		'desc'  => esc_html__( 'Linkedin Link of the person.', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	),
	'pin_link'   => array(
		'label' => esc_html__( 'Pinterest Link', 'pappaya' ),
		'desc'  => esc_html__( 'Pinterest Link of the person.', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	),
	'gplus_link'   => array(
		'label' => esc_html__( 'Google-plus Link', 'pappaya' ),
		'desc'  => esc_html__( 'Google-plus Link of the person.', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	),
	'ytb_link'   => array(
		'label' => esc_html__( 'Youtube Link', 'pappaya' ),
		'desc'  => esc_html__( 'Youtube Link of the person.', 'pappaya' ),
		'type'  => 'text',
		'value' => ''
	)
);