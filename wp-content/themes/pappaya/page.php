<?php
/**
 * The Template for displaying page.
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */
get_header(); ?>

<?php
$beforeContent = null;
$afterContent  = null;
$innerPage     = 'inner-page-heading';
if(pappaya_is_default_editor_only()){
	$beforeContent = '<div class="section section-boxed"><div class="content-holder"><div class="fw-container">';
	$afterContent  = '</div></div></div>';
	$innerPage     = null;
}
echo wp_kses($beforeContent, array('div' => array('class' => array()))); ?>

<?php
$hideTitle = pappaya_get_page_option(get_the_ID(),'pappaya_hide_page_title');
if( ($hideTitle)&&($hideTitle==1) ){ 
    $pageTitle = null;
}
else{
    if(pappaya_is_default_editor_only()){
        $pageTitle='<div class="single-page-title"><h1 class="page-heading">'.get_the_title().'</h1></div>';
    } else {
        $pageTitle='<div class="section section-head section-head2"><div class="fw-container"><div class="single-page-title"><h1 class="page-heading">'.get_the_title().'</h1></div></div></div>';
    }
}
echo wp_kses($pageTitle, array('div' => array('class' => array()), 'span' => array('class' => array()), 'span' => array('class' => array()), 'h1' => array('class' => array()),)); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
    <?php if( comments_open() && !is_front_page() ){ ?>
        <div class="wp_comments">
            <?php echo comments_template( '', true ); ?>
        </div>
    <?php } ?>
<?php endwhile; ?>
<?php endif; ?>
<?php echo wp_kses($afterContent, array('div' => array('class' => array()), 'span' => array('class' => array()),)); ?>
<?php get_footer();