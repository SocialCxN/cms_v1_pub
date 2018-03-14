<?php
/**
 * The template for displaying single page content
 *
 * Used for single
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article-item'); ?>>
	<?php $thumbID=get_post_thumbnail_id(get_the_ID());
    $image = wp_get_attachment_image_src( $thumbID,'pappaya-img-landscape'); ?>
    <?php if ( $image && isset($image[0]) ) {
        $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
        <div class="article-image">
            <a href="<?php the_permalink(); ?>">
                <?php echo '<img src="' . $image[0] . '" alt="'.esc_attr($alt).'" />'; ?>
            </a>
        </div>
    <?php } ?>
    <heading class="fw-heading">
    	<h1 class="blog-single-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </heading>
    <div class="article-details">
    	<span class="bp-date"><?php the_date(get_option('date_format')); ?></span>  
    	<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?></a>
    </div>
    <div class="article-content">
    	<?php the_content(); ?>
        <?php
            wp_link_pages( array(
                "before"=>"<div class='pappaya-post-pagination'>",
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
        <?php the_tags(); ?> <br/>
        <?php esc_html_e('Categories: ','pappaya'); ?><?php the_category(', '); ?>
    </div>
</article>