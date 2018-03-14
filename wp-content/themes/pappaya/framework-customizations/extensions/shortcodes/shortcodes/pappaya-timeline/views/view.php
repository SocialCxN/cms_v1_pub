<?php if (!defined('FW')) die('Forbidden');
/**

 * @var $atts The shortcode attributes

 */

if (isset($atts['timelines']) && !empty($atts['timelines'])) { ?>
    <div class="slider-wrapper trans-nav timeline-slider">
        <ul class="thumb-nav timeline-nav" data-items="3" data-auto="false" data-loop="false">
            <?php foreach ($atts['timelines'] as $timeline => $timelineValue) {
                if ( isset($timelineValue['timeline_title']) && strlen($timelineValue['timeline_title']) ) { ?>
                    <li>
                        <span class="ts-item waves-effect">
                            <?php echo esc_html($timelineValue['timeline_title']); ?>
                        </span>
                    </li> <?php
                }
            }   ?>
        </ul>
        <ul class="carousel-slider carousel-timeline" data-items="1" data-nav="false" data-dots="false" data-auto="false" data-loop="false">
            <?php foreach ($atts['timelines'] as $timeline => $timelineValue) {
                if ( (isset($timelineValue['timeline_content_title']) && strlen($timelineValue['timeline_content_title']))||(isset($timelineValue['timeline_content']) && strlen($timelineValue['timeline_content'])) ) { ?>
                    <li>
                        <?php if ( isset($timelineValue['timeline_content_title']) && strlen($timelineValue['timeline_content_title']) ){ ?>
                            <div class="fw-heading">
                                <h4><?php echo esc_html($timelineValue['timeline_content_title']); ?></h4>   
                            </div>
                        <?php }
                        if( isset($timelineValue['timeline_content']) && strlen($timelineValue['timeline_content']) ) { ?>
                            <p><?php echo esc_html($timelineValue['timeline_content']); ?></p>
                        <?php } ?>
                    </li>
                <?php }
            }   ?>
        </ul>
    </div>
<?php }