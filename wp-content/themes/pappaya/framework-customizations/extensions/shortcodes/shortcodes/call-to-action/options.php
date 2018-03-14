<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'pappaya' ),
		'desc'  => esc_html__( 'This can be left blank', 'pappaya' )
	),
	'message'       => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Content', 'pappaya' ),
		'desc'  => esc_html__( 'Enter some content for this Info Box', 'pappaya' )
	),
	'button_label'  => array(
		'label' => esc_html__( 'Button Label', 'pappaya' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'pappaya' ),
		'type'  => 'text',
		'value' => 'Click'
	),
	'button_link'   => array(
		'label' => esc_html__( 'Button Link', 'pappaya' ),
		'desc'  => esc_html__( 'Where should your button link to', 'pappaya' ),
		'type'  => 'text',
		'value' => '#'
	),
	'button_target' => array(
		'type'    => 'switch',
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
	'background_color' => array(
		'label' => esc_html__('Background Color', 'pappaya'),
		'desc'  => esc_html__('Please select the background color', 'pappaya'),
		'type'  => 'color-picker',
	),
	'text_color' => array(
		'label' => esc_html__('Text Color', 'pappaya'),
		'desc'  => esc_html__('Please select the text color', 'pappaya'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => esc_html__('Background Image', 'pappaya'),
		'desc'    => esc_html__('Please select the background image', 'pappaya'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'button_color' => array(
		'label' => esc_html__('Button Color', 'pappaya'),
		'desc'  => esc_html__('Please select the button color', 'pappaya'),
		'type'  => 'color-picker',
	),
);