<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker'   => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'pappaya' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'pappaya' ),
				'choices' => array(
					'line'  	=> esc_html__( 'Line', 'pappaya' ),
					'with_text'	=> esc_html__( 'Line with Text', 'pappaya'),
					'with_icon'	=> esc_html__( 'Line with Icon', 'pappaya'),
					'space' 	=> esc_html__( 'Whitespace', 'pappaya' ),
				)
			)
		),
		'choices'     => array(
			'line'		=> array(
				'line_color' => array(
					'label'   => esc_html__( 'Line Color', 'pappaya' ),
					'desc'    => esc_html__( 'Seclect the Color for line', 'pappaya' ),
					'type'    => 'select',
					'choices' => array(
						'default'	=> esc_html__('Default', 'pappaya'),
						'primary'	=> esc_html__('Primary', 'pappaya'),
						'secondary' => esc_html__('Secondary', 'pappaya'),
						'light' 	=> esc_html__('Light', 'pappaya'),
						'gray'  	=> esc_html__('Gray', 'pappaya'),
						)
				)
			),
			'with_text'	=> array(
				'text_used'  => array(
					'label'   => esc_html__('Text Used', 'pappaya'),
					'desc'    => esc_html__('Enter text', 'pappaya'),
					'type'    => 'text',
				),
				'text_color' => array(
					'label'   => esc_html__( 'Text Color', 'pappaya' ),
					'desc'    => esc_html__( 'Seclect the Color for Text & line', 'pappaya' ),
					'type'    => 'select',
					'choices' => array(
						'default'	=> esc_html__('Default', 'pappaya'),
						'primary'	=> esc_html__('Primary', 'pappaya'),
						'secondary' => esc_html__('Secondary', 'pappaya'),
						'light' 	=> esc_html__('Light', 'pappaya'),
						'gray'  	=> esc_html__('Gray', 'pappaya'),
						)
				)
			),
			'with_icon'	=> array(
				'icon_used'  => array(
					'type'		=> 'icon',
					'label'		=> esc_html__('Choose an Icon', 'pappaya'),
				),
				'icon_color' => array(
					'label'   => esc_html__( 'Icon Color', 'pappaya' ),
					'desc'    => esc_html__( 'Seclect the Color for Icon & line', 'pappaya' ),
					'type'    => 'select',
					'choices' => array(
						'default'	=> esc_html__('Default', 'pappaya'),
						'primary'	=> esc_html__('Primary', 'pappaya'),
						'secondary' => esc_html__('Secondary', 'pappaya'),
						'light'		=> esc_html__('Light', 'pappaya'),
						'gray'		=> esc_html__('Gray', 'pappaya'),
						)
				)
			),
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'pappaya' ),
					'desc'  => esc_html__( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'pappaya' ),
					'type'  => 'text',
					'value' => '50'
				)
			)
		)
	)
);
