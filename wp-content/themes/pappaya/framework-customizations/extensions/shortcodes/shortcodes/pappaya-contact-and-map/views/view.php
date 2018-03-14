<?php if (!defined('FW')) die('Forbidden');
/**

 * @var $atts The shortcode attributes

 */
?>
        <div class="fw-row equal-height">
            <div class="fw-col-lg-6 col">
                <div class="column-contents column-bg column-contact"<?php if(get_theme_mod('pappaya_footer_top_contact_background')&&strlen(get_theme_mod('pappaya_footer_top_contact_background'))>0){ ?> style="background-image:url(<?php echo esc_url(get_theme_mod('pappaya_footer_top_contact_background')); ?>);"<?php } ?>>
                    <?php if( isset($atts['contact_title']) && strlen($atts['contact_title'])>0 ){ ?>
                        <div class="fw-heading fw-heading-h4">
                            <h2 class="fw-special-title">
                                <?php echo esc_html($atts['contact_title']); ?>
                            </h2> 
                        </div>
                    <?php } ?>
                    <div class="fw-row">

                        <!-- Contact Form -->
                        <div class="fw-col-md-6">
                            <form class="pappaya-contact-form">
                                <div class="pappaya-contact-success alert alert-success" style="display:none;"></div>
                                <div class="field-holder">
                                    <div class="pappaya-c-name form-alert alert alert-danger"></div>
                                    <div class="input-field">
                                        <input type="text" name="c-name" id="c-name">
                                        <label><?php esc_html_e('Name','pappaya');?></label>
                                    </div>
                                </div>
                                <div class="field-holder">
                                    <div class="pappaya-c-email form-alert alert alert-danger"></div>
                                    <div class="input-field">
                                        <input type="text" name="c-email" id="c-email">
                                        <label><?php esc_html_e('Email','pappaya');?></label>
                                    </div>
                                </div>
                                <div class="field-holder">
                                    <div class="pappaya-c-message form-alert alert alert-danger"></div>
                                    <div class="input-field">
                                        <textarea  class="materialize-textarea" name="c-message" id="c-message"></textarea>
                                        <label><?php esc_html_e('Message','pappaya');?></label>
                                    </div>
                                </div>
                                <input type="submit" value="<?php esc_html_e('Send Message','pappaya');?>" class="btn btn-flat">
                            </form>
                        </div>

                        <!-- Contact Details of site owner (From Customizer) -->
                        <div class="fw-col-md-6">
                            <ul class="image-listing">
                                <?php if(strlen(get_theme_mod('pappaya_contact_phone'))>0) { ?>
                                    <li>
                                        <?php if(strlen(get_theme_mod('pappaya_footer_top_contact_phone_img'))>0) { ?>
                                            <div class="il-img">
                                                <img src="<?php echo esc_url( get_theme_mod('pappaya_footer_top_contact_phone_img') ); ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <div class="il-content">
                                            <div class="il-title"><?php esc_html_e('Phone','pappaya');?></div>
                                            <?php echo esc_html(get_theme_mod('pappaya_contact_phone')); ?>
                                        </div>
                                    </li>
                                <?php }
                                if(strlen(get_theme_mod('pappaya_contact_email'))>0) {   ?>
                                    <li>
                                        <?php if(strlen(get_theme_mod('pappaya_footer_top_contact_email_img'))>0) { ?>
                                            <div class="il-img">
                                                <img src="<?php echo esc_url( get_theme_mod('pappaya_footer_top_contact_email_img') ); ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <div class="il-content">
                                            <div class="il-title"><?php esc_html_e('Email','pappaya');?></div>
                                            <?php echo esc_html(get_theme_mod('pappaya_contact_email')); ?>
                                        </div>
                                    </li>
                                <?php }
                                if(strlen(get_theme_mod('pappaya_contact_address'))>0) { ?>
                                    <li>
                                        <?php if(strlen(get_theme_mod('pappaya_footer_top_contact_address_img'))>0) { ?>
                                            <div class="il-img">
                                                <img src="<?php echo esc_url( get_theme_mod('pappaya_footer_top_contact_address_img') ); ?>" alt="">
                                            </div>
                                        <?php } ?>
                                        <div class="il-content">
                                            <div class="il-title"><?php esc_html_e('Address','pappaya');?></div>
                                            <?php echo esc_html(get_theme_mod('pappaya_contact_address')); ?>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="fw-col-lg-6 col">
                <div class="map-wrap">
                    <div id="pappaya-map-canvas" style="width:100%; height:100%;"></div>   
                </div>
            </div>
        </div>