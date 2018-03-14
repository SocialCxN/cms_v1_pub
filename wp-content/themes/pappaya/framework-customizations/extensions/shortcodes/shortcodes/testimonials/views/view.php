<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'testimonials-' );
?>

	<div class="slider-wrapper testimonials-slider outer-nav">
		<ul class="carousel-slider" data-items="2" data-items-md="1" data-items-sm="1" data-items-xs="1" data-nav="false" data-dots="false" data-auto="true" data-loop="true">
		<?php foreach ($atts['testimonials'] as $testimonial): ?>
			<li>
			<div class="testimonials-item <?php echo !empty($atts['card_style']) ? 'card' : ''; ?> clearfix">
				<div class="testimonial-contents">
					<div class="testimonials-avatar">
						<?php
						$author_image_url = !empty($testimonial['author_avatar']['url'])
											? $testimonial['author_avatar']['url']
											: fw_get_framework_directory_uri('/static/img/no-image.png');
						?>
						<img src="<?php echo esc_attr($author_image_url); ?>" alt="<?php echo esc_attr($testimonial['author_name']); ?>"/>
					</div>
					<div class="testimonial-content">
						<p><?php echo esc_html( $testimonial['content'] ); ?></p>
						<div class="testimonials-author-details">
							<strong class="author-name"><?php echo esc_html( $testimonial['author_name'] ); ?></strong>
							<span><?php echo esc_html( $testimonial['author_job'] ); ?></span>
							<span class="testimonials-url">
								<a href="<?php echo esc_attr($testimonial['site_url']); ?>"><?php echo esc_url( $testimonial['site_name'] ); ?></a>
							</span>
						</div>
					</div>
				</div>
			</div>
			</li>
		<?php endforeach; ?>
		</ul>
		<div class="slider-nav">
			<span class="nav-left waves-effect" id="<?php echo esc_attr($id); ?>-prev"><i class="fa fa-angle-left"></i></span>
			<span class="nav-right waves-effect" id="<?php echo esc_attr($id); ?>-next"><i class="fa fa-angle-right"></i></span>
		</div>
	</div>