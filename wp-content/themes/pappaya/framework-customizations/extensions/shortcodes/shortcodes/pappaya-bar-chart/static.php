<?php if (!defined('FW')) die('Forbidden');

// find the uri to the shortcode folder
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/pappaya-bar-chart');
wp_enqueue_script('fw-appear',  $uri . '/static/js/jquery.appear.js', array('jquery'));
wp_enqueue_script('fw-functions',  $uri . '/static/js/functions.js', array('jquery'));