<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'pappaya_page_othertitle' => array(
		'label' => esc_html__( 'Page Header Title', 'pappaya' ),
		'type'  => 'text',
		'desc'  => esc_html__( 'Page Header Title','pappaya' ),
		),
	'pappaya_hide_page_title' => array(
		'label' => esc_html__( 'Hide Page Title', 'pappaya' ),
		'type'  => 'checkbox',
		'desc'  => esc_html__( 'Hide Page Title.(The main page title, At top of middle area)','pappaya' ),
		),
	/*'pappaya_hide_header_title_breadcrumb' => array(
		'label' => esc_html__( 'Hide Header Title, Breadcrumb and Mini-Shopping cart', 'pappaya' ),
		'type'  => 'checkbox',
		'desc'  => esc_html__( 'By enabling this we will hide the Breadcrumb in header area, 
								nearby page title and Mini-Shopping cart at the right side(Whole in header)','pappaya' ),
		),*/
	'pappaya_header_overlay' => array(
		'label' => esc_html__( 'Header overlay', 'pappaya' ),
		'type'  => 'checkbox',
		'desc'  => esc_html__( 'Enable Header overlay 
					(Normally we use this option with - page builder "section" and its option "Remove top and bottom padding" as checked,    
					section backgeround or image,slider etc.. element inside this section - as the first page element.
				    Then the Header Lay above the first page element, also it removes Header bottom section.)','pappaya' ),
		),
	);