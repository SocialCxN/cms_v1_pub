<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message'  => array(
		'label'   => esc_html__('Message', 'pappaya'),
		'desc'    => esc_html__('Enter message text.', 'pappaya'),
		'type'    => 'text',
	),
	'message_type' => array(
		'label'   => esc_html__( 'Message Type', 'pappaya' ),
		'desc'    => esc_html__( 'Seclect the Message Type.', 'pappaya' ),
		'type'    => 'select',
		'choices' => array(
			'success'	=> esc_html__('Sucess', 'pappaya'),
			'info'		=> esc_html__('Info', 'pappaya'),
			'warning' 	=> esc_html__('Warning', 'pappaya'),
			'danger' 	=> esc_html__('Danger', 'pappaya'),
			'primary'  	=> esc_html__('Primary', 'pappaya'),
			'secondary' => esc_html__('Secondary', 'pappaya'),
			'custom1' 	=> esc_html__('Custom-1', 'pappaya'),
			'custom2'  	=> esc_html__('Custom-2', 'pappaya'),
		)
	),
	'card_style' => array(
		'label'   => esc_html__( 'Card Style', 'pappaya' ),
		'desc'    => esc_html__( 'Seclect the Card / Flat Style.', 'pappaya' ),
		'type'    => 'select',
		'choices' => array(
			'flat'	=> esc_html__('Flat Style', 'pappaya'),
			'card'	=> esc_html__('Card Style', 'pappaya'),
		)
	),

	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker'   => array(
			'message_box_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Message Box Type', 'pappaya' ),
				'desc'    => esc_html__( 'Here you can select the basic classification for Message Box.', 'pappaya' ),
				'choices' => array(
					'no_close'  	=> esc_html__( 'Without Close Button', 'pappaya' ),
					'with_close'	=> esc_html__( 'With Close Button', 'pappaya'),
				)
			)
		),
		'choices'     => array(
			'with_close'	=> array(
				'icon'	=> array(
					'label'   => esc_html__('Icon', 'pappaya'),
					'desc'    => esc_html__('Select Required Icon.', 'pappaya'),
					'type'    => 'icon',
				)
			)
		)
	)
);
