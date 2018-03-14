<?php if (!defined('FW')) die('Forbidden');
$options = array(
	'barchart_heading' => array(
		'type' 	=> 	'text',
		'label'	=> 	esc_html__('Heading', 'pappaya'),
		'desc'  =>	esc_html__('Barchart Heading','pappaya'),
	),
	'barchart_count' => array(
		'type'  => 	'text',
		'label' => 	esc_html__('Count', 'pappaya'),
		'desc'  =>	esc_html__('Barchart percentage count','pappaya'),
	),
	'color' => array(
		'label' => esc_html__('Color', 'pappaya'),
		'desc'  => esc_html__('Please select the color', 'pappaya'),
		'type'  => 'color-picker',
	)
);