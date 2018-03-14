<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'pappaya' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pappaya' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'pappaya' ),
				'desc'  => esc_html__( 'Set image width', 'pappaya' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'pappaya' ),
				'desc'  => esc_html__( 'Set image height', 'pappaya' ),
				'value' => 200
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'pappaya' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'pappaya' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Link in New Window', 'pappaya' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'pappaya' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'pappaya' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'pappaya' ),
				),
			),
		)
	)
);

