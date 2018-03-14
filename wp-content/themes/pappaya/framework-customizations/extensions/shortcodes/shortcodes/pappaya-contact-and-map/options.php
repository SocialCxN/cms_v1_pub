<?php if(!defined('FW')) die('Forbidden');

$options = array(
	'contact_title' => array(
		'type'  => 'text',
		'label'	=> esc_html__('Contact Title', 'pappaya'),
		'desc'  => esc_html__('This will be the title of contact section. 
							Contact details will be taken from Customizer Contact section and 
							other details from Customizer Footer Settings.', 'pappaya'),
	),
);