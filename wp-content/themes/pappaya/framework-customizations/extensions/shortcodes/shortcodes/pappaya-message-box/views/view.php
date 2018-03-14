<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$message_box_type = '';
$message_type 	  = ( isset($atts['message_type']) ) ? $atts['message_type'] : '';
$card_style   	  = ( isset($atts['card_style']) ) ? $atts['card_style'] : '';
$message 		  = ( isset($atts['message']) ) ? $atts['message'] : '';
$icon 			  = '';

if( 'with_close' === $atts['style']['message_box_type'] ){
	$message_box_type = 'with_close';
	$icon 			  = $atts['style']['with_close']['icon'];
 }


if( isset($message) && strlen($message)>0 ){ ?>
	<div class="alert<?php if(isset($message_type)&&strlen($message_type)>0){ ?> alert-<?php echo esc_attr($message_type);}if($card_style=='card'){ ?> card<?php } ?>" role="alert">
		<?php if( ($message_box_type=='with_close')&&(isset($icon))&&(strlen($icon)>0) ){ ?>
			<span class="alert-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></span>
		<?php } ?>
		<div class="alert-content"><?php echo esc_html( $message ); ?></div>
		<?php if( $message_box_type == 'with_close' ){ ?>
			<span class="alert-close">&times;</span>
		<?php } ?>
	</div>
<?php }