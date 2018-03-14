<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
get_header(); 
?>
<div class="shop-page">
		<?php
			/**
			 * woocommerce_before_main_content hook
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			// do_action( 'woocommerce_before_main_content' );
		?>

        <!-- Prodect Options     -->
        <div class="section section-boxed">
            <div class="fw-container">
            	<div class="fw-row">

            		<?php  $pappaya_shop_layout = get_theme_mod('pappaya_shop_layout','right');
	            	if(isset( $pappaya_shop_layout ) && $pappaya_shop_layout == 'left' && is_active_sidebar( 'shop-left-sidebar' ) )
	            	{	?>
	            	 	<div class="fw-col-md-3 shop-sidebar">
							<?php dynamic_sidebar( 'shop-left-sidebar' ); ?>
						</div>
	            	<?php } ?>
	            	
					<?php $fw_col_md = 9;
					if (isset( $pappaya_shop_layout ) && $pappaya_shop_layout == 'right' && is_active_sidebar( 'shop-right-sidebar' )) {
					 	$fw_col_md = 9;
					}
					elseif (isset( $pappaya_shop_layout ) && $pappaya_shop_layout == 'left' && is_active_sidebar( 'shop-left-sidebar' )) {
					 	$fw_col_md = 9;
					}
					else{ $fw_col_md = 12; }  ?>
            		<div class="fw-col-md-<?php echo esc_attr( $fw_col_md ); ?>">
						<?php 
							if ( ! defined( 'ABSPATH' ) ) {
							exit; // Exit if accessed directly
							}
							get_header( 'shop' ); ?>
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<div class="products-header">
								<div class="right">										
	                                <?php $void = woocommerce_catalog_ordering(); ?>
								</div>
								<?php $hideTitle = pappaya_get_page_option(wc_get_page_id('shop'),'pappaya_hide_page_title');
                                if( $hideTitle!=1 ){ ?>
									<div class="single-page-title">
										<h1 class="page-heading"><?php woocommerce_page_title(); ?></h1>							
									</div>
								<?php } ?>
							</div>
						<?php endif; ?>
						<?php //do_action( 'woocommerce_archive_description' ); ?>
						<?php if ( have_posts() ) : ?>


						<div id="product-view" class="grid_view">
							<?php woocommerce_product_loop_start(); ?>
							<div class="products sub-categories">
								<?php woocommerce_product_subcategories(); ?>
							</div>
							<div class="products products-listing">
								<?php while ( have_posts() ) : the_post(); ?>
								<?php wc_get_template_part( 'content', 'product' ); ?>
								<?php endwhile; // end of the loop. ?>
							</div>
							<span class="clearfix"></span>
							<?php woocommerce_product_loop_end(); ?>
						</div>
						<?php
							/**
							 * woocommerce_after_shop_loop hook
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>
						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
						<?php wc_get_template( 'loop/no-products-found.php' ); ?>
						<?php endif; ?>
						<span class="clearfix"></span>
					</div>

					<?php if(isset( $pappaya_shop_layout ) && $pappaya_shop_layout == 'right' && is_active_sidebar( 'shop-right-sidebar' ) ){ ?>
	            	 	<div class="fw-col-md-3">
	            	 		<div class="sidebar">
								<?php dynamic_sidebar( 'shop-right-sidebar' ); ?>
							</div>
						</div>
	            	<?php } ?>

						<?php
							/**
							 * woocommerce_after_main_content hook
							 *
							 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
							 */
							//do_action( 'woocommerce_after_main_content' );
						?>
				</div>
			</div>
		</div>
	</div>
	<?php get_footer( 'shop' ); ?>
