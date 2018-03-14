<?php if (!defined('FW')) die('Forbidden');
/**

 * @var $atts The shortcode attributes

 */

$div_class    = '';
$ul_data_nav  = '';
$ul_data_dots = '';
$ul_data_loop = !empty($atts['slider_looped']) ? 'true' : 'false';
if( isset($atts['slider_type']) && $atts['slider_type'] == 'arrow_always' ){
    $div_class    = ' outer-nav';
    $ul_data_nav  = 'true';
    $ul_data_dots = 'false';
}
elseif( isset($atts['slider_type']) && $atts['slider_type'] == 'arrow_hover' ){
    $div_class    = ' nav-on-hover';
    $ul_data_nav  = 'true';
    $ul_data_dots = 'true';
}
elseif( isset($atts['slider_type']) && $atts['slider_type'] == 'arrow_hide' ){
    $ul_data_nav  = 'false';
    $ul_data_dots = 'false';
}
elseif( isset($atts['slider_type']) && $atts['slider_type'] == 'dots_nav' ){
    $ul_data_nav  = 'false';
    $ul_data_dots = 'true';
}
elseif( isset($atts['slider_type']) && $atts['slider_type'] == 'thumbnail_nav' ){
    $ul_data_nav  = 'false';
    $ul_data_dots = 'false';
    $ul_data_loop = 'false';
}


if (isset($atts['slider_images']) && !empty($atts['slider_images'])) { ?>

    <div class="slider-wrapper trans-nav<?php echo esc_attr($div_class); ?>">
        <ul class="carousel-slider" data-items="1" data-nav="<?php echo esc_attr($ul_data_nav); ?>" data-dots="<?php echo esc_attr($ul_data_dots); ?>" data-auto="true" data-loop="<?php echo esc_attr($ul_data_loop); ?>">
            <?php if( 'default' === $atts['slider_image_size']['ruler_type'] ){
                foreach ($atts['slider_images'] as $image => $imageValue) { ?>    
                    <?php if (isset($imageValue['slider_image']['attachment_id']) && strlen($imageValue['slider_image']['attachment_id'])>0) {
                        $imgSrc=wp_get_attachment_image_src($imageValue['slider_image']['attachment_id'],'full'); ?>
                        <li>
                            <img src="<?php echo esc_url($imgSrc[0]); ?>" alt="<?php if ( isset($imageValue['slider_image_alt']) && strlen($imageValue['slider_image_alt']) ) { echo esc_attr($imageValue['slider_image_alt']); }?>">
                        </li>
                    <?php }
                }
            }
            if( 'custom' === $atts['slider_image_size']['ruler_type'] ){
                $width  = ( is_numeric( $atts['slider_image_size']['custom']['width'] ) && ( $atts['slider_image_size']['custom']['width'] > 0 ) ) ? $atts['slider_image_size']['custom']['width'] : '';
                $height = ( is_numeric( $atts['slider_image_size']['custom']['height'] ) && ( $atts['slider_image_size']['custom']['height'] > 0 ) ) ? $atts['slider_image_size']['custom']['height'] : '';
                if ( ! empty( $width ) && ! empty( $height ) ) {
                    foreach ($atts['slider_images'] as $image => $imageValue) {    
                        if (isset($imageValue['slider_image']['attachment_id']) && strlen($imageValue['slider_image']['attachment_id'])>0) {
                            $imgSrc = fw_resize( $imageValue['slider_image']['attachment_id'], $width, $height, true ); ?>
                            <li>
                                <img src="<?php echo esc_url($imgSrc); ?>" alt="<?php if ( isset($imageValue['slider_image_alt']) && strlen($imageValue['slider_image_alt']) ) { echo esc_attr($imageValue['slider_image_alt']); }?>">
                            </li> <?php
                        }
                    }
                }
                else
                {
                    foreach ($atts['slider_images'] as $image => $imageValue) { ?>    
                        <?php if (isset($imageValue['slider_image']['attachment_id']) && strlen($imageValue['slider_image']['attachment_id'])>0) {
                            $imgSrc=wp_get_attachment_image_src($imageValue['slider_image']['attachment_id'],'full'); ?>
                            <li>
                                <img src="<?php echo esc_url($imgSrc[0]); ?>" alt="<?php if ( isset($imageValue['slider_image_alt']) && strlen($imageValue['slider_image_alt']) ) { echo esc_attr($imageValue['slider_image_alt']); }?>">
                            </li>
                        <?php }
                    }
                }
            }   ?>
        </ul>
        <?php if( isset($atts['slider_type']) && $atts['slider_type'] == 'thumbnail_nav' ){ ?>
            <ul class="thumb-nav" data-items="6" data-auto="false" data-loop="false">
                <?php foreach ($atts['slider_images'] as $image => $imageValue) { ?>    
                    <?php if (isset($imageValue['slider_image']['attachment_id']) && strlen($imageValue['slider_image']['attachment_id'])>0) {
                        $imgSrc=wp_get_attachment_image_src($imageValue['slider_image']['attachment_id'],'full');//'pappaya-image-slider-thumb' ?>
                        <li>
                            <img src="<?php echo esc_url($imgSrc[0]); ?>" alt="<?php if ( isset($imageValue['slider_image_alt']) && strlen($imageValue['slider_image_alt']) ) { echo esc_attr($imageValue['slider_image_alt']).'-'; }?>thumb">
                        </li>
                    <?php }
                }   ?>
            </ul>
        <?php } ?>
    </div>
<?php }