<?php if (!defined('FW')) die('Forbidden');
	$options = array(
		'is_counter' => array(
			'label'        => esc_html__('Count to gadget', 'pappaya'),
			'type'         => 'switch',
	),
	'gadget_title' => array(
		'type'  => 	'text',
		'label' => 	esc_html__('Heading', 'pappaya'),
	),
	'title_size' => array(
		'type'    => 'select',
		'label'   => esc_html__('Title Size', 'pappaya'),
		'choices' => array(
			'span' => 'default',
			'h1' => 'H1',
			'h2' => 'H2',
			'h3' => 'H3',
			'h4' => 'H4',
			'h5' => 'H5',
			'h6' => 'H6',
		)
	),
	'gadget_sub_title' => array(
		'type'  => 	'text',
		'label' => 	esc_html__('Sub title', 'pappaya'),
	),
	'icon'    => array(
		'type'  => 'icon',
		'label' => esc_html__('Choose an Icon', 'pappaya'),
	),
	'gadget_content' => array(
		'type' 	=> 	'textarea',
		'label'	=> 	esc_html__('Content', 'pappaya'),
		'desc'  =>	esc_html__("Gadget Section Count","pappaya"),
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
	'padding' => array(
		'type'  => 	'text',
		'label' => 	esc_html__('Add padding', 'pappaya'),
		'desc'  =>	esc_html__("Gadget padding","pappaya"),
	),
);
