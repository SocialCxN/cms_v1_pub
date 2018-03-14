<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text_align'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Text align', 'pappaya'),
		'choices' => array(
			'text-left' => esc_html__('left', 'pappaya'),
			'text-center' => esc_html__('center', 'pappaya'),
			'text-right' => esc_html__('right', 'pappaya')
		)
	),
	'text_color' => array(
		'label' => esc_html__('Text Color', 'pappaya'),
		'desc'  => esc_html__('Please select the text color', 'pappaya'),
		'type'  => 'color-picker',
	),
	'background_color' => array(
		'label' => esc_html__('Background Color', 'pappaya'),
		'desc'  => esc_html__('Please select the background color', 'pappaya'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => esc_html__('Background Image', 'pappaya'),
		'desc'    => esc_html__('Please select the background image', 'pappaya'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'column_padding' => array(
		'label'			=> esc_html__('Enable Column Padding', 'pappaya'),
		'desc'		  	=> wp_kses( __('Use <a target="_blank" href="http://www.w3schools.com/css/css_padding.asp">shorthand padding</a>.', 'pappaya'), array('a' => array( 'target' => array(), 'href' => array('url') )) ),
		'type'         	=> 'text',
	),
	'vertical_center' => array(
		'label'        => esc_html__('Align contents to vertically center', 'pappaya'),
		'type'         => 'switch',
	),
	'min_height' => array(
		'label'        => esc_html__('Minimum height', 'pappaya'),
		'type'         => 'text',
	),
	'class_col_sm' => array(
		'label'        => esc_html__('Maintain column width on tablets (782-991px)', 'pappaya'),
		'type'         => 'checkbox',
		'value'		   => false,
		'desc'		   => esc_html__('Adds corresponding class[fw-col-sm-(colum divisin number)] to column div', 'pappaya'),
	),
);