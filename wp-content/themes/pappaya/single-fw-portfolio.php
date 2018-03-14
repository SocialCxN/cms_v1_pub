<?php
/**
 * The Template for displaying portfolio single posts.
 *
 * It is used to display a single page  for "fw-portfolio" post type.
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */
get_header(); ?>

<section class="section">
	<div class="fw-container">
		<div class="fw-row">

			<?php if ( have_posts() ) : ?>
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post();
			
					$project_details_col = 12;
					if( has_post_thumbnail() || fw_ext_portfolio_get_gallery_images() ) {
						$project_details_col = 4; ?>
						<div class="fw-col-md-8">
							<?php if( ( has_post_thumbnail()&&fw_ext_portfolio_get_gallery_images() )||( count(fw_ext_portfolio_get_gallery_images()) ) ) { ?>
							<div class="slider-frame">
								<div class="slider-wrapper trans-nav outer-nav">
									<ul class="carousel-slider" data-items="1" data-nav="true" data-dots="false" data-auto="true" data-loop="true">
							<?php }
							else{ ?>
							<div>
								<div class="portfolio-alt">
									<ul>
							<?php } ?>
										<?php if( has_post_thumbnail() ) {
				                            $portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'pappaya-portfolio-gallary-wide' , false );
				                            $portfolio_img_url = $portfolio_image[0];
				                            if (isset($portfolio_img_url)&&strlen($portfolio_img_url)>0) { ?>
					                            <li>
					                            	<img src="<?php echo esc_url($portfolio_img_url); ?>" alt="<?php esc_attr_e('slider images','pappaya'); ?>">
					                            </li>
					                        <?php }
				                        }
				                        if (fw_ext_portfolio_get_gallery_images()) {
                             				$portfolio_gallery_images = fw_ext_portfolio_get_gallery_images();
                             				foreach ($portfolio_gallery_images as $portfolio_gallery_image) {
                             					$portfolio_image2 = wp_get_attachment_image_src( $portfolio_gallery_image['attachment_id'], 'pappaya-portfolio-gallary-wide' , false );
                             					$portfolio_gallery_img_url = $portfolio_image2[0];
                             					if (isset($portfolio_gallery_img_url)&&strlen($portfolio_gallery_img_url)>0) { ?>
						                            <li>
						                            	<img src="<?php echo esc_url($portfolio_gallery_img_url); ?>" alt="<?php esc_attr_e('slider images','pappaya'); ?>">
						                            </li>
						                        <?php }
                             				}
                        				} ?>
									</ul>
						       </div>
							</div>
						</div>
					<?php } ?>

					<div class="fw-col-md-<?php echo esc_attr($project_details_col); ?>">
						<div class="page-details">
							<div class="page-note">
								<?php the_content(); ?>
							</div>
							<?php $portfolio_cats = get_the_terms(get_the_ID(), 'fw-portfolio-category');
							if(!empty($portfolio_cats)){
								$flag_data_cat=0; ?>
								<div class="page-category">
									<?php esc_html_e('Categories: ','pappaya');
									foreach ($portfolio_cats as $portfolio_cat){
										$cat_id = $portfolio_cat->term_id;
										$cat_id = (int) $cat_id;;
										if($flag_data_cat==0){
											echo '<a href="'.get_term_link($cat_id,'fw-portfolio-category').'">'.esc_attr($portfolio_cat->name).'</a>';
											$flag_data_cat=1;
										}
										else{
											echo ', <a href="'.get_term_link($cat_id,'fw-portfolio-category').'">'.esc_attr($portfolio_cat->name).'</a>';
										}
									}	?>
								</div>
							<?php }	?>
						</div>
					</div>


				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<!-- Posts Navigation -->
			<div class="fw-col-md-12">
				<div class="button-list">
					<?php if( get_permalink(get_adjacent_post(false,'',false)) != get_permalink() ){ ?>
						<a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>" class="waves-effect waves-light btn  btn-flat">
							<?php esc_html_e("Prev project","pappaya"); ?>
						</a>
					<?php }
					if( get_permalink(get_adjacent_post(false,'',true)) != get_permalink() ){ ?>
						<a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>" class="waves-effect waves-light btn  btn-flat">
							<?php esc_html_e("Next Project","pappaya"); ?>
						</a>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
</section>

<?php get_footer();