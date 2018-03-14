<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'  => array(
		'label' => esc_html__( 'Button Label', 'pappaya' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'pappaya' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'   => array(
		'label' => esc_html__( 'Button Link', 'pappaya' ),
		'desc'  => esc_html__( 'Where should your button link to', 'pappaya' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target' => array(
		'type'  => 'switch',
		'label'   => esc_html__( 'Open Link in New Window', 'pappaya' ),
		'desc'    => esc_html__( 'Select here if you want to open the linked page in a new window', 'pappaya' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__('Yes', 'pappaya'),
		),
		'left-choice' => array(
			'value' => '_self',
			'label' => esc_html__('No', 'pappaya'),
		),
	),
	'color'  => array(
		'label'   => esc_html__( 'Button Color', 'pappaya' ),
		'desc'    => esc_html__( 'Choose a color for your button', 'pappaya' ),
		'type'    => 'select',
		'choices' => array(
			''      => esc_html__('Primary', 'pappaya'),
			'secondary' => esc_html__( 'Secondary', 'pappaya' ),
			'white'   => esc_html__( 'White', 'pappaya' ),
			'light'   => esc_html__( 'Light', 'pappaya' ),
			'gray'   => esc_html__( 'Gray', 'pappaya' ),
			'dark'   => esc_html__( 'Dark', 'pappaya' ),
		)
	),
	'type'  => array( 
		'label'   => esc_html__( 'Button type', 'pappaya' ),
		'desc'    => esc_html__( 'Choose a button type', 'pappaya' ),
		'type'    => 'select',
		'choices' => array(
			'flat'      => esc_html__('Flat', 'pappaya'),
			'text' => esc_html__( 'Text', 'pappaya' ),
		)
	),
	'icon'    => array(
		'type'  => 'icon',
		'label' => esc_html__('Choose an Icon', 'pappaya'),
	),
);