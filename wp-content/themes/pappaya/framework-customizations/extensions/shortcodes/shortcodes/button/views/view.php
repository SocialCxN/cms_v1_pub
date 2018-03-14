<?php if (!defined('FW')) die( 'Forbidden' ); ?>
<?php $color_class = !empty($atts['color']) ? "btn-{$atts['color']}" : ''; ?>
<?php $type_class = !empty($atts['type']) ? "btn-{$atts['type']}" : ''; ?>
<a href="<?php echo esc_attr($atts['link']) ?>" target="<?php echo esc_attr($atts['target']) ?>" class="waves-effect waves-light btn <?php echo esc_attr($color_class); ?> <?php echo esc_attr($type_class); ?>">
	<?php if(!empty($atts['icon'])) { ?><i class="<?php echo esc_attr($atts['icon']); ?>"> </i><?php } ?>
	<span><?php echo esc_html( $atts['label'] ); ?></span>
</a>