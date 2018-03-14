<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tab_type'  => array(
		'type'    => 'select',
		'label'   => esc_html__('Tab Type', 'pappaya'),
		'choices' => array(
			'default'   => 'Default',
			'tab-left' 	=> 'Tab-Left',
			'tab-right' => 'Tab-Right'
		)
	),
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Tab', 'pappaya' ),
		'desc'          => esc_html__( 'Create your tabs', 'pappaya' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'   => array(
				'type'  	=> 'text',
				'label' 	=> esc_html__('Title', 'pappaya')
			),
			'tab_icon'    => array(
				'type'		=> 'icon',
				'label'		=> esc_html__('Choose an Icon', 'pappaya'),
				),
			'tab_content' => array(
				'type'  	=> 'textarea',
				'label' 	=> esc_html__('Content', 'pappaya')
			)
		),
	)
);