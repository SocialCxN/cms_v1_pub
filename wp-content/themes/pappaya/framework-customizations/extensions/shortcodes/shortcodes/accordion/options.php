<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'pappaya' ),
		'desc'          => esc_html__( 'Create your tabs', 'pappaya' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'   => array(
				'type'  => 'text',
				'label' => esc_html__('Title', 'pappaya')
			),
			'tab_content' => array(
				'type'  => 'textarea',
				'label' => esc_html__('Content', 'pappaya')
			),
			'icon_used'  => array(
					'type'		=> 'icon',
					'label'		=> esc_html__('Choose an Icon', 'pappaya'),
			)
		)
	),
	'is_colored' => array(
		'label'        => esc_html__('Colored', 'pappaya'),
		'type'         => 'switch',
	),
	'is_expandable' => array(
		'label'        => esc_html__('Expandable', 'pappaya'),
		'type'         => 'switch',
	),
);