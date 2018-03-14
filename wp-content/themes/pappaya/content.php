<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article-item'); ?>>
    <?php $thumbID=get_post_thumbnail_id(get_the_ID());
    $image = wp_get_attachment_image_src( $thumbID,'pappaya-img-landscape'); ?>
    <?php if ( $image && isset($image[0]) ) {$alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
    <div class="article-image">
    	<a href="<?php the_permalink(); ?>">
	        <?php echo '<img src="' . $image[0] . '" alt="'.esc_attr($alt).'" />'; ?>
        </a>
    </div>
    <?php } ?>
    <div class="fw-heading">
    	<h3 class="section-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php if ( is_sticky() && is_home() && !is_paged() ) { ?>
                <span class="featured"><?php esc_html_e('Featured post','pappaya'); ?></span>
            <?php } ?>
        </h3>
    </div>
    <div class="article-details">
    	<a href="<?php the_permalink(); ?>" class="bp-date"><?php echo get_the_date(get_option('date_format')); ?></a>  
    	<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?></a>
    </div>
    <div class="article-content">
    	<?php the_content(); //the_excerpt(); // Use "the_excerpt()" for excerpt to show, More tag will work with "the_content()" ?>
        <?php
            wp_link_pages( array(
                'before'=>"<div class='pappaya-post-page-links'><span class='page-links-title'>" . esc_html__( 'Pages:', 'pappaya' ) . "</span>",
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>
</article>