<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( $upsells ) : ?>

	<div class="upsells products">
		<div class="fw-heading"><h4><?php esc_html_e( 'You may also like&hellip;', 'pappaya' ) ?></h4></div><div class="slider-wrapper">
			<div class="products carousel-slider" data-items="4" data-items-md="3" data-items-sm="2"  data-items-xs="1" data-nav="false" data-dots="false" data-auto="true" data-loop="true">

				<?php foreach ( $upsells as $upsell ) : ?>

					<?php
					 	$post_object = get_post( $upsell->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object );

						wc_get_template_part( 'content', 'product' ); ?>

				<?php endforeach; ?>

			</div>
		</div>
	</div>
	<span class="clearfix"></span>

<?php endif;

wp_reset_postdata();