<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package M Shop
 * @since 1.0.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('m_shop_mobile_header_clr','#fff')); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	 <?php wp_body_open();?>
<?php do_action('m_shop_site_preloader'); ?>
<div id="page" class="m-store-site  <?php echo esc_attr(m_shop_class_sidebar());?>">
<header>
		<a class="skip-link screen-reader-text" href="#content">
			<?php _e( 'Skip to content', 'm-shop' ); ?>	
		</a>	
        <?php do_action( 'm_shop_main_header' ); ?> 
           
</header> 
<div class="header-pan-icon" >
			<a href="#" class="pan-icon" ></a>
	    </div>	
<!-- end header -->