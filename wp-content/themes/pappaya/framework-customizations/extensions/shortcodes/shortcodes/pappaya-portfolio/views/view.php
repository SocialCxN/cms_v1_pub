<?php if (!defined('FW')) die('Forbidden');
/**

 * @var $atts The shortcode attributes

 */

$portfolio_categories = get_terms( array(
                    'taxonomy' => 'fw-portfolio-category',
                    'hide_empty' => true,
                ) );
$porfolios = array(
                'posts_per_page' => $atts['max_number_of_projects'],
                'post_type' => 'fw-portfolio'
            );
$porfolio_query = new WP_Query($porfolios); 
if ( ($porfolio_query->have_posts()) && (!empty($portfolio_categories)) ) { ?>
    <div class="filter-gallery-wrap">
        <div class="portfolio-nav">
            <ul class="filter_nav">
                <li class="all active" data-filter="all">All</li>
                <?php
                if ( (!empty($portfolio_categories)) ){
                    foreach ($portfolio_categories as $portfolio_category) {

                        $flag_cat_with_img = 0;
                        $porfoliosC = array(
                            'post_type' => 'fw-portfolio',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'fw-portfolio-category',
                                    'field'    => 'term_id',
                                    'terms'    => $portfolio_category->term_id,
                                ),
                            )
                        );
                        $porfolio_queryC = new WP_Query($porfoliosC); 
                        if ($porfolio_queryC->have_posts()):
                            while ($porfolio_queryC->have_posts()):
                                $porfolio_queryC->the_post();
                                if( has_post_thumbnail() || fw_ext_portfolio_get_gallery_images() ) {
                                    $flag_cat_with_img = 1;
                                    break;
                                }
                            endwhile;
                        endif;

                        if($flag_cat_with_img == 1) { ?>
                            <li data-filter="<?php echo esc_attr($portfolio_category->term_id); ?>"><?php echo esc_html($portfolio_category->name); ?></li>
                        <?php }
                    }
                } ?>
            </ul>   
        </div>
        <div id="filter-gallery" class="filter-gallery">
            <ul id="filter_items" class="filter_items">
                <?php
                if ($porfolio_query->have_posts()):
                    while ($porfolio_query->have_posts()):
                        $porfolio_query->the_post();
                        if( has_post_thumbnail() ) {
                            $portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'pappaya-portfolio-gallary-thumb' , false );
                            $portfolio_img_url = $portfolio_image[0];
                        }
                        elseif (fw_ext_portfolio_get_gallery_images()) {
                             $portfolio_image = fw_ext_portfolio_get_gallery_images();
                             $portfolio_image = wp_get_attachment_image_src( $portfolio_image[0]['attachment_id'], 'pappaya-portfolio-gallary-thumb' , false );
                             $portfolio_img_url = $portfolio_image[0];
                        }
                        if (isset($portfolio_img_url)&&strlen($portfolio_img_url)>0) {
                            $portfolio_cats = get_the_terms(get_the_ID(), 'fw-portfolio-category'); ?>
                            <li class="filtr-item fw-col-md-4 fw-col-sm-6 fw-col-xs-1" data-category="<?php if(!empty($portfolio_cats)){ $flag_data_cat=0;foreach ($portfolio_cats as $portfolio_cat){ if($flag_data_cat==0){ echo esc_attr($portfolio_cat->term_id);$flag_data_cat=1; }else{ echo ', '.esc_attr($portfolio_cat->term_id); } } }else{ echo 'all';} ?>">
             
                                <div class="thumb-wrap">
                                    <img alt="<?php esc_html_e('Portfolio Image', 'pappaya'); ?>" src="<?php echo esc_url($portfolio_img_url); ?>">
                                    <a href="<?php the_permalink(); ?>"  class="thumb-hover">
                                        <span class="thumb-title"><?php echo get_the_title(); ?></span>
                                        <span class="thumb-date"><?php echo get_the_date(get_option('date_format')); ?> <?php the_author(); ?></span>
                                    </a>
                                </div>

                            </li>
                        <?php } ?>
                    <?php endwhile;
                endif; ?>
            </ul>
        </div>
        <?php if( isset($atts['view_more_link'])&&strlen($atts['view_more_link'])>0 ){ ?>
            <a href="<?php echo esc_url($atts['view_more_link']); ?>" class="btn btn-secondary">
                <?php if( isset($atts['view_more_text'])&&strlen($atts['view_more_text'])>0 ){
                    echo esc_html( $atts['view_more_text'] );
                }
                else{ esc_html_e('View More Projects', 'pappaya'); } ?>
            </a>
        <?php } ?>
    </div>
<?php }
else{
    esc_html_e('Add Projects (Portfolio) with Categories to work Project Gallery Properly', 'pappaya');
}