<?php if (!defined('FW')) die('Forbidden');
/**

 * @var $atts The shortcode attributes

 */
$bg_color = '';
if ( ! empty( $atts['background_color'] ) ) {
    $bg_color = 'background-color:' . $atts['background_color'] . ';';
}
$text_color = '';
if ( ! empty( $atts['text_color'] ) ) {
    $text_color = 'color:' . $atts['text_color'] . ';';
}
$padding = '';
if ( ! empty( $atts['padding'] ) ) {
    $padding = 'padding:' . esc_attr( $atts['padding'] ) . ';';
}
$gadget_style       = ( $bg_color || $text_color ) ? 'style="' . esc_attr($bg_color . $text_color) . '"' : '';
$gadget_title_class = ( isset( $atts['is_counter'] ) && $atts['is_counter'] ) ? 'gadget-title count-to' : 'gadget-title';
?>

<div class="wn-gadget" <?php echo ( $gadget_style ); if( isset( $atts['is_counter'] )&&$atts['is_counter'] ){ echo ' data-count="'. esc_attr($atts['gadget_title']) .'"'; } ?>>
    <div class="gadget-contents" style="<?php echo ( $padding ); ?>">
        <div class="icon">
            <i class="<?php echo esc_attr($atts['icon']); ?>"></i>
        </div>
        <?php if(isset($atts['gadget_title'])&& (strlen($atts['gadget_title'])>0) ){ ?>
        	<div class="counter <?php echo esc_attr($gadget_title_class); ?>">
                <?php if (isset($atts['title_size'])&&strlen($atts['title_size'])>0){ ?>
                    <<?php echo esc_html($atts['title_size']); ?>>
                        <?php if( isset( $atts['is_counter'] ) && $atts['is_counter'] ){ ?>
                            <span class="countdown"><?php echo esc_html($atts['gadget_title']); ?></span>
                        <?php }
                        else { echo esc_html($atts['gadget_title']); } ?>
                        
                    </<?php echo esc_html($atts['title_size']); ?>><?php
                }
                else{   echo esc_html($atts['gadget_title']); } ?>
            </div> 
        <?php } ?>
        <?php if(isset($atts['gadget_sub_title'])&& (strlen($atts['gadget_sub_title'])>0) ){ ?>
            <div class="gadget-sub-title"><?php echo esc_html($atts['gadget_sub_title']); ?></div> 
        <?php } ?>
    	<?php if(isset($atts['gadget_content'])&& (strlen($atts['gadget_content'])>0) ){ ?>
    		<div class="gadget-content"><?php echo esc_html($atts['gadget_content']); ?></div> 
    	<?php } ?>
    </div>
</div>
