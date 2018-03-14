<?php if (!defined('FW')) die('Forbidden');
/**
 * @var $atts The shortcode attributes
 */

$div_class    = '';
$ul_data_nav  = '';
$ul_data_dots = '';
if($atts['slider_looped']==1){ $ul_data_loop = 'true'; }
else{ $ul_data_loop = 'false'; }
if( isset($atts['slider_type']) && $atts['slider_type'] == 'arrow_always' ){
    $div_class    = ' outer-nav';
    $ul_data_nav  = 'true';
    $ul_data_dots = 'false';
}
elseif( isset($atts['slider_type']) && $atts['slider_type'] == 'arrow_hover' ){
    $div_class    = ' nav-on-hover';
    $ul_data_nav  = 'true';
    $ul_data_dots = 'true';
}
elseif( isset($atts['slider_type']) && $atts['slider_type'] == 'arrow_hide' ){
    $ul_data_nav  = 'false';
    $ul_data_dots = 'false';
}
elseif( isset($atts['slider_type']) && $atts['slider_type'] == 'dots_nav' ){
    $ul_data_nav  = 'false';
    $ul_data_dots = 'true';
}


if (isset($atts['slider_images']) && !empty($atts['slider_images'])) { ?>

	<div class="slider-wrapper custom-slider<?php echo esc_attr($div_class); ?>">
		<div class="carousel-slider" data-items="1" data-nav="<?php echo esc_attr($ul_data_nav); ?>" data-dots="<?php echo esc_attr($ul_data_dots); ?>" data-loop="<?php echo esc_attr($ul_data_loop); ?>" >
			
			<?php foreach ($atts['slider_images'] as $image => $imageValue) { ?>    

				<div class="slider-item">
					<div class="fw-row">

						<?php $content_flag = 0; $content_image_class = 6;
						if ( (isset($imageValue['slide_title'])&&strlen($imageValue['slide_title'])>0)||(isset($imageValue['slide_sub_title']) && strlen($imageValue['slide_sub_title'])>0)||
							(isset($imageValue['slide_content']) && strlen($imageValue['slide_content'])>0)||
							(isset($imageValue['slide_fb'])&&strlen($imageValue['slide_fb'])>0)||(isset($imageValue['slide_twt']) && strlen($imageValue['slide_twt'])>0)||
							(isset($imageValue['slide_lin']) && strlen($imageValue['slide_lin'])>0)||(isset($imageValue['slide_pin']) && strlen($imageValue['slide_pin'])>0)||
							(isset($imageValue['slide_gp']) && strlen($imageValue['slide_gp'])>0)||(isset($imageValue['slide_ytb']) && strlen($imageValue['slide_ytb'])>0) ) {

							$content_flag = 1;
							if ( !isset($imageValue['slider_image']['attachment_id']) || strlen($imageValue['slider_image']['attachment_id'])<1 ) { $content_image_class = 12; } ?>
							<div class="fw-col fw-col-md-<?php echo esc_attr($content_image_class); ?>">
								<div class="column-contents">
									<!-- <div class="col-centered"> -->
										<?php if ( isset($imageValue['slide_title']) && strlen($imageValue['slide_title'])>0 ) { ?>
											<div class="fw-heading fw-team-lg">
												<span class="fw-special-title"><?php echo esc_html($imageValue['slide_title']); ?></span>	
											</div>
										<?php }
										if ( isset($imageValue['slide_sub_title']) && strlen($imageValue['slide_sub_title'])>0 ) { ?>
											<div class="fw-sub-heading">
												<h6><?php echo esc_html($imageValue['slide_sub_title']); ?></h6>
											</div>
										<?php }
										if ( isset($imageValue['slide_content']) && strlen($imageValue['slide_content'])>0 ) { ?>
											<div class="text-block">
												<p><?php echo esc_html($imageValue['slide_content']); ?></p>
											</div>
										<?php }
										if ( (isset($imageValue['slide_fb'])&&strlen($imageValue['slide_fb'])>0)||(isset($imageValue['slide_twt'])&&strlen($imageValue['slide_twt'])>0)||
											(isset($imageValue['slide_lin'])&&strlen($imageValue['slide_lin'])>0)||(isset($imageValue['slide_pin']) && strlen($imageValue['slide_pin'])>0)||
											(isset($imageValue['slide_gp'])&&strlen($imageValue['slide_gp'])>0)||(isset($imageValue['slide_ytb']) && strlen($imageValue['slide_ytb'])>0) ) { ?>
											<ul class="social social-medium">
				                                <?php if ( isset($imageValue['slide_fb']) && strlen($imageValue['slide_fb'])>0 ) { ?>
				                                	<li><a href="<?php echo esc_attr($imageValue['slide_fb']); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
				                                <?php }
				                                if ( isset($imageValue['slide_twt']) && strlen($imageValue['slide_twt'])>0 ) { ?>
				                                	<li><a href="<?php echo esc_attr($imageValue['slide_twt']); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
				                                <?php }
				                                if ( isset($imageValue['slide_lin']) && strlen($imageValue['slide_lin'])>0 ) { ?>
				                                	<li><a href="<?php echo esc_attr($imageValue['slide_lin']); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
				                                <?php }
				                                if ( isset($imageValue['slide_pin']) && strlen($imageValue['slide_pin'])>0 ) { ?>
				                                	<li><a href="<?php echo esc_attr($imageValue['slide_pin']); ?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
				                                <?php }
				                                if ( isset($imageValue['slide_gp']) && strlen($imageValue['slide_gp'])>0 ) { ?>
				                                	<li><a href="<?php echo esc_attr($imageValue['slide_gp']); ?>" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
				                                <?php }
				                                if ( isset($imageValue['slide_ytb']) && strlen($imageValue['slide_ytb'])>0 ) { ?>
				                                	<li><a href="<?php echo esc_attr($imageValue['slide_ytb']); ?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
				                                <?php } ?>
				                        	</ul>
				                        <?php } ?>
									<!-- </div> -->
								</div>
							</div>
						<?php }

						if ( isset($imageValue['slider_image']['attachment_id']) && strlen($imageValue['slider_image']['attachment_id'])>0 ) {

						if ($content_flag == 0) { $content_image_class = 12; } ?>
							<div class="fw-col fw-col-md-<?php echo esc_attr($content_image_class); ?>">
								<div class="column-contents">
									<div class="centered">
										<?php $imgSrc=wp_get_attachment_image_src($imageValue['slider_image']['attachment_id'],'full'); ?>
										<img src="<?php echo esc_url($imgSrc[0]); ?>" alt="">
									</div>
								</div>

							</div>
						<?php } ?>

					</div>
				</div>

			<?php } ?>

		</div>
	</div>

<?php }