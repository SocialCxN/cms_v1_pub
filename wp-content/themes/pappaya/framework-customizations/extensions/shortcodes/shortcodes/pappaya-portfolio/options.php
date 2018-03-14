<?php if (!defined('FW')) die('Forbidden');
$options = array(
	'max_number_of_projects'   => array(
		'type'    => 'text',
		'label'   => esc_html__('Maximum Number of Projects', 'pappaya'),
		'desc'    => esc_html__('Enter the Number. 
						Featured image(if not,take the first gallery image) for each project(Unyson Portfolio) will shows in the gallery', 'pappaya'),
	),
	'view_more_link'   => array(
		'type'    => 'text',
		'label'   => esc_html__('View More Projects Link', 'pappaya'),
		'desc'    =>  esc_html__('Enter the View More Projects Link. 
						Make this field blank to remove that link.', 'pappaya'),
	),
	'view_more_text'   => array(
		'type'    => 'text',
		'label'   => esc_html__('View More Projects Text', 'pappaya'),
		'desc'    =>  esc_html__('Enter the View More Projects Text.', 'pappaya'),
	),
);
