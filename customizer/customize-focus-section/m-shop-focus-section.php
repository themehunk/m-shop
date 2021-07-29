<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
if( ! class_exists( 'WP_Customize_Control' ) ){
	return;
}
add_action( 'customize_preview_init', 'm_shop_focus_section_enqueue');
add_action( 'customize_controls_init', 'm_shop_focus_section_helper_script_enqueue' );
function m_shop_focus_section_enqueue(){
	   wp_enqueue_style( 'm-shop-focus-section-style',M_SHOP_THEME_URI . 'customizer/customize-focus-section/css/focus-section.css');
		wp_enqueue_script( 'm-shop-focus-section-script',M_SHOP_THEME_URI . 'customizer/customize-focus-section/js/focus-section.js', array('jquery'),'',false);
	}
function m_shop_focus_section_helper_script_enqueue(){
		wp_enqueue_script( 'm-shop-focus-section-addon-script', M_SHOP_THEME_URI . 'customizer/customize-focus-section/js/addon-focus-section.js', array('jquery'),'',false);
	}

