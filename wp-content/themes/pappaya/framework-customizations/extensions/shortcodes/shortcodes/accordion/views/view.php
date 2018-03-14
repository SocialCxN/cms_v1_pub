<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
  <ul class="collapsible <?php echo !empty($atts['is_expandable']) ? 'expandable' : 'accordion'; ?> <?php echo !empty($atts['is_colored']) ? 'collapsible-colored' : ''; ?>" data-collapsible="<?php echo !empty($atts['is_expandable']) ? 'expandable' : 'accordion'; ?>">
	<?php foreach ( $atts['tabs'] as $tab ) : ?>
    <li>
      	<div class="collapsible-header">
      		<?php if (isset($tab['icon_used']) && strlen($tab['icon_used'])>0) {
      			?>
      			<i class="fa <?php echo esc_attr($tab['icon_used']); ?>"></i>
      			<?php
      		}
      		if (isset($tab['tab_title']) && strlen($tab['tab_title'])>0) {
      			echo esc_html($tab['tab_title']);
      		} ?> 
      		<span class="waves-effect">
      			<i class="fa fa-angle-right"></i>
      		</span>
      	</div>
      	<?php if (isset($tab['tab_content']) && strlen($tab['tab_content'])>0) {	?>
      		<div class="collapsible-body">
	      		<p>
	      			<?php echo esc_html( $tab['tab_content'] ); ?>
	      		</p>
	      	</div>
      	<?php 	} ?> 
    </li>
	<?php endforeach; ?>
  </ul>