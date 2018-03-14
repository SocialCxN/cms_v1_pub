<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');
wp_enqueue_style(
	'fw-shortcode-tabs',
	$shortcodes_extension->get_uri('/shortcodes/tabs/static/css/styles.css')
);