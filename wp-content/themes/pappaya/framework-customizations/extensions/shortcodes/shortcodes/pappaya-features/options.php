<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'features' => array(
		'label'         => esc_html__( 'Features', 'pappaya' ),
		'popup-title'   => esc_html__( 'Add/Edit Features', 'pappaya' ),
		'desc'          => esc_html__( 'Here you can add, remove and edit your Features for Features Listing.', 'pappaya' ),
		'type'          => 'addable-popup',
		'template'      => '{{=feature_heading}}',
		'popup-options' => array(
			'feature_heading' => array(
				'label' => esc_html__( 'Feature Heading', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the feature heading here', 'pappaya' ),
				'type'  => 'text'
				),
			'feature_image'   => array(
				'label' => esc_html__( 'Feature Image', 'pappaya' ),
				'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pappaya' ),
				'type'  => 'upload',
				),
			'feature_content' => array(
				'label' => esc_html__( 'Content', 'pappaya' ),
				'desc'  => esc_html__( 'Enter the Content for the feature', 'pappaya' ),
				'type'  => 'textarea',
				'teeny' => true
				),
			)
		)
);