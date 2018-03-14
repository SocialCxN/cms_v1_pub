<?php
/**
 * The Portfolio Archive template file.
 *
 * It is used to display an archive page  for "fw-portfolio" post type.
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */

get_header(); ?>

<section class="section">
	<div class="fw-container">
		<div class="fw-row">
			<div class="fw-col-md-12">
				
				<?php if ( have_posts() ) : ?>

					<div class="column-contents">
						<div class="filter-gallery-wrap">
							<div id="filter-gallery" class="filter-gallery">
								<ul id="filter_items" class="filter_items">

									<?php while ( have_posts() ) : the_post();
										if( has_post_thumbnail() ) {
				                            $portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'pappaya-portfolio-gallary-thumb' , false );
				                            $portfolio_img_url = $portfolio_image[0];
				                        }
				                        elseif (fw_ext_portfolio_get_gallery_images()) {
				                             $portfolio_image = fw_ext_portfolio_get_gallery_images();
				                             $portfolio_image = wp_get_attachment_image_src( $portfolio_image[0]['attachment_id'], 'pappaya-portfolio-gallary-thumb' , false );
				                             $portfolio_img_url = $portfolio_image[0];
				                        }
				                        if (isset($portfolio_img_url)&&strlen($portfolio_img_url)>0) { ?>
										
											<li class="filtr-item fw-col-md-4 fw-col-sm-6 fw-col-xs-1">
												<div class="thumb-wrap">
													<img alt="<?php esc_html_e('Portfolio Image', 'pappaya'); ?>" src="<?php echo esc_url($portfolio_img_url); ?>">
													<a href="<?php the_permalink(); ?>" class="thumb-hover">
														<span class="thumb-title"><?php echo get_the_title('',false); ?></span>
														<span class="thumb-date"><?php echo get_the_date(get_option('date_format')); ?> <?php the_author(); ?></span>
													</a>
												</div>
											</li>
										
										<?php }

									endwhile; ?>

								</ul>
							</div>
						</div>
					</div>

				<?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>

			</div>
		</div>
	</div>
</section>

<?php get_footer();