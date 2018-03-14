<?php if (!defined('FW')) die('Forbidden');

  
$sliderArray = pappaya_get_rev_sliders();

$slideDesc 	 = (isset($sliderArray)&& count($sliderArray)>0)?esc_html__('Select the rev slider to insert','pappaya'):esc_html__('You have not set any slider!','pappaya');

$options = array(
	'slider'   => array(
		'type'    => 'select',
		'label'   => esc_html__('Rev-Slider', 'pappaya'),
		'choices' => $sliderArray,
		'desc'    => $slideDesc,
		),
	'slider_shortcode'   => array(
		'type'    => 'text',
		'label'   => esc_html__('Slider ShortCode', 'pappaya'),
		'desc'    =>  esc_html__('Enter the Slider ShortCode', 'pappaya'),
		),
	'rev_priority' =>array(
		'type'  => 'checkbox',
		'label' => esc_html__('Use Slider ShortCode instead of Rev Slider','pappaya'),
		'desc'  => esc_html__('If checked, Slider shortcode get more priority than Rev Slider.(Unchecked means priority for Rev slider)','pappaya'),
		)
);
