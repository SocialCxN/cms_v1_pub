<?php if (!defined('FW')) die('Forbidden');

/**



 * @var $atts The shortcode attributes



 */

?>



<?php if (isset($atts['client_images']) && !empty($atts['client_images'])) { ?>

    <div class="slider-wrapper outer-nav">

        <ul class="carousel-slider" data-items="<?php if(isset($atts['slider_type']) && strlen($atts['slider_type'])>0){echo esc_attr($atts['slider_type']);}else{echo 6;}?>" data-items-md="4" data-items-sm="3" data-items-xs="1" data-dots="false">

            <?php foreach ($atts['client_images'] as $image => $imageValue) { ?>    

                <?php if (isset($imageValue['client_image']['attachment_id']) && strlen($imageValue['client_image']['attachment_id'])>0) {

                    $imgSrc=wp_get_attachment_image_src($imageValue['client_image']['attachment_id'],'full');//,'thumbnail' ?>

                    <li>

                        <div class="item">

                            <img src="<?php echo esc_url($imgSrc[0]); ?>" alt="<?php if ( isset($imageValue['client_image_alt']) && strlen($imageValue['client_image_alt']) ) { echo esc_attr($imageValue['client_image_alt']); }?>">

                        </div>

                    </li>

                <?php }

            } ?>

        </ul>

        <div class="slider-nav">

            <div class="nav-left waves-effect"><i class="fa fa-angle-left"></i></div>

            <div class="nav-right waves-effect"><i class="fa fa-angle-right"></i></div>

        </div>

    </div>

<?php }