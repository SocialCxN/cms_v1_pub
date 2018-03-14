<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */

get_header(); ?>
            
    <!-- Middle -->
    <div class="middle">				
		<div class="content-area">
			<div class="section">
				<div class="fw-container">
					<div class="wrap-404">
						<div class="title-404"><?php esc_html_e('404','pappaya'); ?></div>
						<div class="sub-title-404"><?php esc_html_e('Error 404 - page not found','pappaya'); ?></div>
						<p><?php esc_html_e('Sorry! page is no longer there','pappaya'); ?></p>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- End middle -->

<?php get_footer();