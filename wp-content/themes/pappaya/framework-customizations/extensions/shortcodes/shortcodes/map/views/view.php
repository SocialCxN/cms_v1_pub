<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $map_data_attr
 * @var $atts
 * @var $content
 * @var $tag
 */
?>
<div class="fw-map"<?php if($atts['fullwidth_map']){echo "style='margin : 0 -15px;'";} ?> <?php echo fw_attr_to_html($map_data_attr); ?>>
	<div class="fw-map-canvas"></div>
</div>