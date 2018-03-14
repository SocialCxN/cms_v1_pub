<?php
/**
 * pappaya contact us widget
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */

add_action('widgets_init', 'pappaya_contact_address_widget');

function pappaya_contact_address_widget()
{
	register_widget('pappaya_contact_address_widget');
}

class pappaya_contact_address_widget extends WP_Widget {

	function __construct()
	{
		$widget_ops = array('classname' => 'pappaya_contact_address_widget', 'description' => esc_html__('Contact Address','pappaya'));
		$control_ops = array('id_base' => 'pappaya_contact_address_widget');
		parent::__construct('pappaya_contact_address_widget', esc_html__('Pappaya contact address','pappaya'), $widget_ops, $control_ops);
	}
	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		echo ($before_widget);
		?>
		<div class="widget">
			<?php echo wp_kses($before_title,array('h5' => array())); ?> <?php echo esc_html($title); ?>  <?php echo wp_kses($after_title,array('h5' => array())); ?> 
			
			<div class="widget-address">
                <!-- Contact Details of site owner (From Customizer) -->
                <ul class="image-listing">
                    <?php if(strlen(get_theme_mod('pappaya_contact_phone'))>0) { ?>
                        <li>
                        	<?php if(strlen(get_theme_mod('pappaya_footer_top_contact_widget_phone_img'))>0) { ?>
                            	<div class="il-img">
                            		<img src="<?php echo esc_url( get_theme_mod('pappaya_footer_top_contact_widget_phone_img') ); ?>" alt="">
                            	</div>
                            <?php } ?>
                            <div class="il-content">
                                <div class="il-title"><?php esc_html_e('Phone','pappaya');?></div>
                                <?php echo esc_html(get_theme_mod('pappaya_contact_phone')); ?>
                            </div>
                        </li>
                    <?php } if(strlen(get_theme_mod('pappaya_contact_email'))>0) { ?>
                        <li>
                            <?php if(strlen(get_theme_mod('pappaya_footer_top_contact_widget_email_img'))>0) { ?>
                            	<div class="il-img">
                            		<img src="<?php echo esc_url( get_theme_mod('pappaya_footer_top_contact_widget_email_img') ); ?>" alt="">
                            	</div>
                            <?php } ?>
                            <div class="il-content">
                                <div class="il-title"><?php esc_html_e('Email','pappaya');?></div>
                                <?php echo esc_html(get_theme_mod('pappaya_contact_email')); ?>
                            </div>
                        </li>
                    <?php } if(strlen(get_theme_mod('pappaya_contact_address'))>0) { ?>
                        <li>
                            <?php if(strlen(get_theme_mod('pappaya_footer_top_widget_contact_address_img'))>0) { ?>
                            	<div class="il-img">
                            		<img src="<?php echo esc_url( get_theme_mod('pappaya_footer_top_widget_contact_address_img') ); ?>" alt="">
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
		<?php
		echo ($after_widget);
	}
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}
	function form($instance)
	{
		$defaults = array('title' => esc_html__('Contact Address',"pappaya"));
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title','pappaya');?>:</label>
			<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<?php }

	}