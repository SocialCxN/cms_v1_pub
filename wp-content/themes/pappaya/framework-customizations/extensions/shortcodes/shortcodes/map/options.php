<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 *	Unyson Map shortcode editted with fullwidth map option(Remove left and right padding for this selection)
 */

$map_shortcode = fw_ext('shortcodes')->get_shortcode('map');
$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'pappaya'),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'pappaya' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
	),
	'gmap-key' => array_merge(
		array(
			'label' => esc_html__( 'Google Maps API Key', 'pappaya' ),
			'desc' => sprintf(
				esc_html__( 'Create an application in %sGoogle Console%s and add the Key here.', 'pappaya' ),
				'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
				'</a>'
			),
		),
		version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
		? array(
			'type' => 'gmap-key',
		)
		: array(
			'type' => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
	'map_type' => array(
		'type'  => 'select',
		'label' => esc_html__('Map Type', 'pappaya'),
		'desc'  => esc_html__('Select map type', 'pappaya'),
		'choices' => array(
			'roadmap'   => esc_html__('Roadmap', 'pappaya'),
			'terrain' => esc_html__('Terrain', 'pappaya'),
			'satellite' => esc_html__('Satellite', 'pappaya'),
			'hybrid'    => esc_html__('Hybrid', 'pappaya')
		)
	),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'pappaya'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'pappaya'),
		'type'  => 'text'
	),
	'disable_scrolling' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Disable zoom on scroll', 'pappaya'),
		'desc'  => esc_html__('Prevent the map from zooming when scrolling until clicking on the map', 'pappaya'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Yes', 'pappaya'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('No', 'pappaya'),
		),
	),
	'fullwidth_map' => array(
		'type'	=> 'switch',
		'label' => esc_html__('Use as a Full-width map', 'pappaya'),
		'desc'  => esc_html__('Remove left and right padding by selecting this', 'pappaya'),
		'value' => false,
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('No', 'pappaya'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('Yes', 'pappaya'),
		),
	),
);