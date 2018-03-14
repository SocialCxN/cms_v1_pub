<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'testimonials' => array(
		'label'         => esc_html__( 'Testimonials', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'pappaya' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'pappaya' ),
		'type'          => 'addable-popup',
		'template'      => '{{=author_name}}',
		'popup-options' => array(
			'content'       => array(
				'label' => esc_html__( 'Quote', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the testimonial here', 'pappaya' ),
				'type'  => 'textarea',
			),
			'author_avatar' => array(
				'label' => esc_html__( 'Image', 'pappaya' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pappaya' ),
				'type'  => 'upload',
			),
			'author_name'   => array(
				'label' => esc_html__( 'Name', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'pappaya' ),
				'type'  => 'text'
			),
			'author_job'    => array(
				'label' => esc_html__( 'Position', 'pappaya' ),
				'desc'  => esc_html__( 'Can be used for a job description', 'pappaya' ),
				'type'  => 'text'
			),
			'site_name'     => array(
				'label' => esc_html__( 'Website Name', 'pappaya' ),
				'desc'  => esc_html__( 'Linktext for the above Link', 'pappaya' ),
				'type'  => 'text'
			),
			'site_url'      => array(
				'label' => esc_html__( 'Website Link', 'pappaya' ),
				'desc'  => esc_html__( 'Link to the Persons website', 'pappaya' ),
				'type'  => 'text'
			)
		)
	),
	'card_style' => array(
		'label'        => esc_html__('Card Style', 'pappaya'),
		'type'         => 'switch',
	),
);