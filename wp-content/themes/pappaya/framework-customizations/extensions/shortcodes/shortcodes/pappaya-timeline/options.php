<?php if (!defined('FW')) die('Forbidden');
$options = array(
	'timelines' => array(
		'label'         => esc_html__( 'Timelines', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Timelines', 'pappaya' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Timeline Slider.', 'pappaya' ),
		'type'          => 'addable-popup',
		'template'      => '{{- timeline_title}}',
		'popup-options' => array(
			'timeline_title'   => array(
				'label' => esc_html__( 'Timeline Title', 'pappaya' ),
				'desc'  => esc_html__( 'Enter Your Timeline Title. (For example, enter "2016" for 2016 time line - this will show up similar to an icon in front end.)', 'pappaya' ),
				'type'  => 'text',
			),
			'timeline_content_title' => array(
				'label' => esc_html__( 'Timeline Content Title', 'pappaya' ),
				'desc'  => esc_html__( 'Enter Your Timeline Content Title.', 'pappaya' ),
				'type'  => 'text'
			),
			'timeline_content' => array(
				'label' => esc_html__( 'Timeline Content', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Timeline Content', 'pappaya' ),
				'type'  => 'textarea'
			)
		)
	)
);
