<?php if (!defined('FW')) die( 'Forbidden' );

$tabs_id = uniqid('fw-tabs-');

/*
 * the `.fw-tabs-container` div also supports
 * a `tabs-justified` class, that strethes the tabs
 * to the width of the whole container
 */

if (isset($atts['tabs']) && !empty($atts['tabs'])) { ?>
	<div class="tab-wrap<?php if( isset($atts['tab_type']) && strlen($atts['tab_type']) && $atts['tab_type'] != 'default' ) { echo ' '.esc_attr($atts['tab_type']); } ?>">
		<?php if($atts['tab_type'] == 'tab-right') { ?>
			<div class="tab-contents">
				<?php foreach ( $atts['tabs'] as $key => $tab ) :
					if( isset($tab['tab_content'])&&strlen($tab['tab_content']) ){ ?>
						<div class="tab-content" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
							<?php echo do_shortcode( $tab['tab_content'] ) ?>
						</div>
					<?php }
				endforeach; ?>
			</div>
			<div class="tab-nav">
				<ul class="tabs">
					<?php foreach ($atts['tabs'] as $key => $tab) : 
						if( (isset($tab['tab_title'])&&strlen($tab['tab_title'])) || (isset($tab['tab_icon'])&&strlen($tab['tab_icon'])) ){ ?>
							<li class="tab">
								<a href="#<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
									<?php if(isset($tab['tab_icon'])&&strlen($tab['tab_icon'])) { ?>
										<i class="fa <?php echo esc_attr($tab['tab_icon']); ?>"></i>
									<?php }
									if(isset($tab['tab_title'])&&strlen($tab['tab_title'])) {
										echo esc_html($tab['tab_title']);
									} ?>
								</a>
							</li>
						<?php }
					endforeach; ?>
				</ul>
			</div>
		<?php }
		else { ?>
			<div class="tab-nav">
				<ul class="tabs">
					<?php foreach ($atts['tabs'] as $key => $tab) : 
						if( (isset($tab['tab_title'])&&strlen($tab['tab_title'])) || (isset($tab['tab_icon'])&&strlen($tab['tab_icon'])) ){ ?>
							<li class="tab">
								<a href="#<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
									<?php if(isset($tab['tab_icon'])&&strlen($tab['tab_icon'])) { ?>
										<i class="fa <?php echo esc_attr($tab['tab_icon']); ?>"></i>
									<?php }
									if(isset($tab['tab_title'])&&strlen($tab['tab_title'])) {
										echo esc_html($tab['tab_title']);
									} ?>
								</a>
							</li>
						<?php }
					endforeach; ?>
				</ul>
			</div>
			<div class="tab-contents">
				<?php foreach ( $atts['tabs'] as $key => $tab ) :
					if( isset($tab['tab_content'])&&strlen($tab['tab_content']) ){ ?>
						<div class="tab-content" id="<?php echo esc_attr($tabs_id . '-' . ($key + 1)); ?>">
							<?php echo do_shortcode( $tab['tab_content'] ) ?>
						</div>
					<?php }
				endforeach; ?>
			</div>
		<?php } ?>
	</div>
<?php }