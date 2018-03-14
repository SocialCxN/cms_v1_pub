<?php if (!defined('FW')) die('Forbidden');

// find the uri to the shortcode folder
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/pappaya-portfolio');
$porfolios = array( 'post_type' => 'fw-portfolio' );
$portfolio_categories = get_terms( array(
                    'taxonomy' => 'fw-portfolio-category',
                    'hide_empty' => true,
                ) );
$porfolio_query = new WP_Query($porfolios); 
if ( ($porfolio_query->have_posts()) && (!empty($portfolio_categories)) ) {
	wp_enqueue_script('fw-modernizr',  $uri . '/static/js/jquery.filterizr.js', array('jquery'));
	wp_enqueue_script('fw-function',  $uri . '/static/js/function.js', array('jquery'));
}