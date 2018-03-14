<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<div class="fw-team team-item <?php if(isset($atts['team_bg_color'])){ echo esc_attr($atts['team_bg_color']); } ?> <?php if(isset($atts['team_style_type'])){ echo esc_attr($atts['team_style_type']); } ?>">
	<?php if ( !empty( $atts['image']['url'] ) ) { ?>
		<div class="fw-team-image">
			<img src="<?php echo esc_url( $atts['image']['url'] ); ?>" alt="<?php if(isset($atts['name'])){ echo esc_attr($atts['name']); } ?>">
		</div>
	<?php } ?>
	<div class="fw-team-inner">
		<?php if(isset($atts['name']) || isset($atts['job'])){ ?>
			<div class="fw-team-name">
				<?php if(isset($atts['name']) && strlen($atts['name'])>0){ ?>
					<h5 class="heading"><?php echo esc_html( $atts['name'] ); ?></h5> <?php
				}
				if(isset($atts['job']) && strlen($atts['job'])>0){ ?>
					<span><?php echo esc_html( $atts['job'] ); ?></span>	<?php
				}	?>
			</div>
		<?php }	?>
		<ul class="social">
			<?php if(isset($atts['fb_link']) && strlen($atts['fb_link'])>0){ ?>
				<li><a href="<?php echo esc_url($atts['fb_link']);?>" class="facebook"><i class="fa fa-facebook"></i></a></li> <?php
			}
			if(isset($atts['tw_link']) && strlen($atts['tw_link'])>0){ ?>
				<li><a href="<?php echo esc_url($atts['tw_link']);?>" class="twitter"><i class="fa fa-twitter"></i></a></li> <?php
			}
			if(isset($atts['ln_link']) && strlen($atts['ln_link'])>0){ ?>
				<li><a href="<?php echo esc_url($atts['ln_link']);?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li> <?php
			}
			if(isset($atts['pin_link']) && strlen($atts['pin_link'])>0){ ?>
				<li><a href="<?php echo esc_url($atts['pin_link']);?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li> <?php
			}
			if(isset($atts['gplus_link']) && strlen($atts['gplus_link'])>0){ ?>
				<li><a href="<?php echo esc_url($atts['gplus_link']);?>" class="google-plus"><i class="fa fa-google-plus"></i></a></li> <?php
			}
			if(isset($atts['ytb_link']) && strlen($atts['ytb_link'])>0){ ?>
				<li><a href="<?php echo esc_url($atts['ytb_link']);?>" class="youtube"><i class="fa fa-youtube"></i></a></li> <?php
			}	?>
		</ul>
		<?php if(isset($atts['desc']) && strlen($atts['desc'])>0){ ?>
			<div class="fw-team-text">
				<p><?php echo esc_html( $atts['desc'] ); ?></p>
			</div>
		<?php }	?>
	</div>
</div>