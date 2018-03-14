<?php if (!defined('FW')) die('Forbidden');

if (isset($atts['features']) && !empty($atts['features'])) { ?>
    <ul class="image-listing">
        <?php foreach ($atts['features'] as $feature => $featureValue) { ?>
            <li>
                <?php if (isset($featureValue['feature_image']['attachment_id']) && strlen($featureValue['feature_image']['attachment_id'])>0) {
                    $imgSrc=wp_get_attachment_image_src($featureValue['feature_image']['attachment_id'],'thumbnail'); ?>
                    <div class="il-img">
                        <img src="<?php echo esc_url($imgSrc[0]); ?>" alt="<?php esc_attr_e('Feature Image','pappaya');?>">
                    </div>
                <?php }
                if ( ( isset($featureValue['feature_heading']) && strlen($featureValue['feature_heading']) ) || ( isset($featureValue['feature_content']) && strlen($featureValue['feature_content']) ) ) { ?>
                    <div class="il-content">
                        <?php if ( isset($featureValue['feature_heading']) && strlen($featureValue['feature_heading']) ) { ?>
                            <div class="il-title">
                                <?php echo esc_html($featureValue['feature_heading']); ?>
                            </div>
                        <?php }
                        if( isset($featureValue['feature_content']) && strlen($featureValue['feature_content']) ) {
                            echo esc_html($featureValue['feature_content']);
                        } ?>
                    </div>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
