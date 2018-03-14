<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => esc_html__('Full Width', 'pappaya'),
		'type'         => 'switch',
	),
	'no_padding' => array(
		'label'        => esc_html__('Remove Padding', 'pappaya'),
		'type'         => 'switch',
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
	'video' => array(
		'label' => esc_html__('Background Video', 'pappaya'),
		'desc'  => esc_html__('Insert Video URL to embed this video', 'pappaya'),
		'type'  => 'text',
	)
);
