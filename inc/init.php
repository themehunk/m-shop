<?php 
/**
 * all file includeed
 *
 * @param  
 * @return mixed|string
 */
get_template_part( 'inc/admin-function');
get_template_part( 'inc/header-function');
get_template_part( 'inc/footer-function');
get_template_part( 'inc/blog-function');
// theme-option
include_once(ABSPATH.'wp-admin/includes/plugin.php');
if ( !is_plugin_active('m-shop-pro/m-shop-pro.php') ) {
get_template_part( 'lib/theme-option/class-m-shop-admin-settings');
get_template_part( 'lib/theme-option/theme-option-function');
}
//breadcrumbs
get_template_part( 'lib/breadcrumbs/breadcrumbs');
//page-post-meta
get_template_part( 'lib/page-meta-box/m-shop-page-meta-box');
//custom-style
get_template_part( 'inc/m-shop-custom-style');

// customizer
get_template_part('customizer/models/class-m-shop-singleton');
get_template_part('customizer/models/class-m-shop-defaults-models');
get_template_part('customizer/repeater/class-m-shop-repeater');
get_template_part('customizer/extend-customizer/class-m-shop-wp-customize-panel');
get_template_part('customizer/extend-customizer/class-m-shop-wp-customize-section');
get_template_part('customizer/customizer-radio-image/class/class-m-shop-customize-control-radio-image');
get_template_part('customizer/customizer-range-value/class/class-m-shop-customizer-range-value-control');
get_template_part('customizer/customizer-scroll/class/class-m-shop-customize-control-scroll');
get_template_part('customizer/customize-focus-section/m-shop-focus-section');
get_template_part('customizer/color/class-control-color');
get_template_part('customizer/customize-buttonset/class-control-buttonset');
get_template_part('customizer/sortable/class-open-control-sortable');
get_template_part('customizer/background/class-m-shop-background-image-control');
get_template_part('customizer/customizer-tabs/class-m-shop-customize-control-tabs');
get_template_part('customizer/customizer-toggle/class-m-shop-toggle-control');

get_template_part('customizer/custom-customizer');
get_template_part('customizer/customizer-constant');
get_template_part('customizer/customizer');
/******************************/
// woocommerce
/******************************/
get_template_part( 'inc/woocommerce/woo-core');
get_template_part( 'inc/woocommerce/woo-function');
get_template_part('inc/woocommerce/woocommerce-ajax');
