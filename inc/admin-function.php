<?php 
/**
 * Common Function for M ShopTheme.
 *
 * @package     big store
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2019, big store
 * @since       big store 1.0.0
 */
 if ( ! function_exists( 'm_shop_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function m_shop_custom_logo(){
    if ( function_exists( 'the_custom_logo' ) ){?>
    	<div class="thunk-logo">
        <?php the_custom_logo();?>
        </div>
   <?php  }
}
endif;
/*********************/
// Menu 
/*********************/
function m_shop_header_menu_style(){
 $m_shop_main_header_layout = get_theme_mod('m_shop_main_header_layout');
        	$menustyle='horizontal';	
        	return $menustyle;
		}
function m_shop_add_classes_to_page_menu( $ulclass ){
  return preg_replace( '/<ul>/', '<ul class="m-shop-menu" data-menu-style='.esc_attr(m_shop_header_menu_style()).'>', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'm_shop_add_classes_to_page_menu' );		
     // This theme uses wp_nav_menu() in two locations.
	  function openm_shop_custom_menu(){
		     register_nav_menus(array(
		    'm-shop-above-menu'       => esc_html__( 'Header Above Menu', 'm-shop' ),
			'm-shop-main-menu'        => esc_html__( 'Main', 'm-shop' ),
			'm-shop-sticky-menu'        => esc_html__( 'Sticky', 'm-shop' ),
			'm-shop-footer-menu'  => esc_html__( 'Footer Menu', 'm-shop' ),
		) );
	  }
	  add_action( 'after_setup_theme', 'openm_shop_custom_menu' );
	  // MAIN MENU
           function m_shop_main_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'm-shop-main-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="m-shop-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="m-shop-menu" class="m-shop-menu" data-menu-style='.esc_attr(m_shop_header_menu_style()).'>%3$s</ul>',
             ));
         }
          //STICKY MENU
           function m_shop_stick_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'm-shop-sticky-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="m-shop-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="m-shop-stick-menu" class="m-shop-menu" data-menu-style='.esc_attr(m_shop_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // HEADER ABOVE MENU
         function m_shop_abv_nav_menu(){
              wp_nav_menu( array('theme_location' => 'm-shop-above-menu', 
              'container'   => false, 
              'link_before' => '<span class="m-shop-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="open-above-menu" class="m-shop-menu" data-menu-style='.esc_attr(m_shop_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // FOOTER TOP MENU
         function m_shop_footer_nav_menu(){
              wp_nav_menu( array('theme_location' => 'm-shop-footer-menu', 
              'container'   => false, 
              'link_before' => '<span class="m-shop-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="open-footer-menu" class="open-bottom-menu">%3$s</ul>',
             ));
         }
function m_shop_add_classes_to_page_menu_default( $ulclass ){
return preg_replace( '/<ul>/', '<ul class="m-shop-menu" data-menu-style="horizontal">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'm_shop_add_classes_to_page_menu_default' );
/************************/
// description Menu
/************************/
function m_shop_nav_description( $item_output, $item, $depth, $args ){
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . esc_html($item->description) . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'm_shop_nav_description', 10, 4 );

/*********************/
/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'm_shop_check_is_ie' ) ) :
	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function m_shop_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'm_shop_check_is_ie', $is_ie );
	}

endif;
/**
 * ratia image
 */
if ( ! function_exists( 'm_shop_replace_header_attr' ) ) :
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function m_shop_replace_header_attr( $attr, $attachment, $size ){
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id == $attachment->ID ){
			$attach_data = array();
			if ( ! is_customize_preview() ){
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'open-logo-size' );


				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];
			if ( 'svg' == $file_extension ) {
				$attr['class'] = 'open-logo-svg';
			}
			$retina_logo = get_theme_mod( 'm_shop_header_retina_logo' );
			$attr['srcset'] = '';
			if ( apply_filters( 'open_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if (m_shop_check_is_ie() ){
					// Replace header logo url to retina logo url.
					$attr['src'] = $retina_logo;
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';

			}
		}

		return apply_filters( 'm_shop_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'm_shop_replace_header_attr', 10, 3 );

/********************************/
// responsive slider function
/*********************************/
if ( ! function_exists( 'm_shop_responsive_slider_funct' ) ) :
function m_shop_responsive_slider_funct($control_name,$function_name){
  $custom_css='';
           $control_value = get_theme_mod( $control_name );
           if ( empty( $control_value ) ){
                return '';
             }  
        if ( m_shop_is_json( $control_value ) ){
    $control_value = json_decode( $control_value, true );
    if ( ! empty( $control_value ) ) {

      foreach ( $control_value as $key => $value ){
        $custom_css .= call_user_func( $function_name, $value, $key );
      }
    }
    return $custom_css;
  }  
}
endif;
/********************************/
// responsive slider function add media query
/********************************/
if ( ! function_exists( 'm_shop_add_media_query' ) ) :
function m_shop_add_media_query( $dimension, $custom_css ){
  switch ($dimension){
      case 'desktop':
      $custom_css = '@media (min-width: 769px){' . $custom_css . '}';
      break;
      break;
      case 'tablet':
      $custom_css = '@media (max-width: 768px){' . $custom_css . '}';
      break;
      case 'mobile':
      $custom_css = '@media (max-width: 550px){' . $custom_css . '}';
      break;
  }

      return $custom_css;
}
endif;
/**
 * Display Sidebars
 */
if ( ! function_exists( 'm_shop_get_sidebar' ) ){
	/**
	 * Get Sidebar
	 *
	 * @since 1.0.1.1
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function m_shop_get_sidebar( $sidebar_id ){
		 return $sidebar_id;
	}
}

/**
 * Display Sidebars
 */
if ( ! function_exists( 'm_shop_class_sidebar' ) ){
	/**
	 * Get Sidebar
	 *
	 * @since 1.0.1.1
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function m_shop_class_sidebar(){
		
		if(class_exists( 'WooCommerce') && (is_shop() || is_product_category())){
         $shop_page_id = get_option( 'woocommerce_shop_page_id' );
         $sidebar_clss = get_post_meta( $shop_page_id, 'm_shop_sidebar_dyn', true );
           if($sidebar_clss==''){
              $sidebar_cls ='default';
           }else{
           	  $sidebar_cls = $sidebar_clss;
           }
         }else{
		    $sidebar_clss  = get_post_meta( get_the_ID(), 'm_shop_sidebar_dyn', true );
		   if($sidebar_clss==''){
              $sidebar_cls='default';

		   }else{
		   	  $sidebar_cls  = $sidebar_clss;

		   }
		 }
		 return $sidebar_cls;
	}
}
// section is_customize_preview
/**
 * This function display a shortcut to a customizer control.
 *
 * @param string $class_name        The name of control we want to link this shortcut with.
 */
function m_shop_display_customizer_shortcut( $class_name ){
	if ( ! is_customize_preview() ) {
		return;
	}
	$icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path>
        </svg>';
	echo'<span class="open-focus-section customize-partial-edit-shortcut customize-partial-edit-shortcut-' . esc_attr( $class_name ) . '">
            <button class="customize-partial-edit-shortcut-button">
                ' . $icon . '
            </button>
        </span>';
}

/*************************/
//Get Page Title
/*************************/
function m_shop_get_page_title(){ ?>
			<?php if(is_search()){ ?> 
            <h2 class="thunk-page-top-title entry-title">
              	<?php printf( __( 'Search Results for: %s', 'm-shop' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>

			<?php }elseif (m_shop_is_blog() && !is_single() && !is_archive()){
				if( !(is_front_page()) ){
                    $our_title = get_the_title( get_option('page_for_posts', true) );
			echo '<h1 class="thunk-page-top-title entry-title">'.esc_html($our_title).'</h1>'; ?>
			<?php }else{
			echo'<h1 class="thunk-page-top-title entry-title">'.esc_html__('Blog','m-shop').'</h1>'; ?>
			<?php }	 
			 }elseif(is_archive() && (class_exists( 'WooCommerce' ) && !is_shop())){
                   echo the_archive_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php }elseif(class_exists( 'WooCommerce' ) && is_shop()) { ?>
				<h1 class="thunk-page-top-title entry-title"><?php woocommerce_page_title(); ?></h1> 
			<?php }elseif(is_page()) { 
				echo the_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php } ?>
   <?php 
}

/**************************/
// Dynamic Social Link
/**************************/
function m_shop_social_links(){
$social='';
$original_color = get_theme_mod('m_shop_social_original_color',false);
if($original_color==true){
$class_original='original-social-icon';
}else{
$class_original='';	
}
$social.='<ul class="social-icon ' .esc_attr($class_original). ' ">';
if($f_link = get_theme_mod('social_shop_link_facebook','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($f_link).'"><i class="fa fa-facebook"></i></a></li>';
endif;
if($l_link = get_theme_mod('social_shop_link_linkedin','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($l_link).'"><i class="fa fa-linkedin"></i></a></li>';
endif;
if($p_link = get_theme_mod('social_shop_link_pintrest','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($p_link).'"><i class="fa fa-pinterest"></i></a></li>';
endif;
if($t_link = get_theme_mod('social_shop_link_twitter','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($t_link).'"><i class="fa fa-twitter"></i></a></li>';
endif;
if($insta_link = get_theme_mod('social_shop_link_insta','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($insta_link).'"><i class="fa fa-instagram"></i></a></li>';
endif;
if($tum_link = get_theme_mod('social_shop_link_tumblr','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($tum_link).'"><i class="fa fa-tumblr"></i></a></li>';
endif;
if($y_link = get_theme_mod('social_shop_link_youtube','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($y_link).'"><i class="fa fa-youtube-play"></i></a></li>';
endif;
if($stumb_link = get_theme_mod('social_shop_link_stumbleupon','#')):
	$social.='<li><a target="_blank" href="'.esc_url($stumb_link).'">
	 <i class="fa fa-stumbleupon"></i></a></li>';
endif;
if($dribble_link = get_theme_mod('social_shop_link_dribble','#')):
	$social.='<li><a target="_blank" href="'.esc_url($dribble_link).'">
	 <i class="fa fa-dribbble"></i></a></li>';
endif;
if($skype_link = get_theme_mod('social_shop_link_skype','#')):
	$social.='<li><a target="_blank" href="'.esc_url($skype_link).'">
	 <i class="fa fa-skype"></i></a></li>';
endif;
$social.='</ul>';
return $social;
}
/******************************/
//Sticky sidebar function
/******************************/
function m_shop_stick_sidebar($class){
            $m_shop_sticky_sidebar = get_theme_mod( 'm_shop_sticky_sidebar');
            if ($m_shop_sticky_sidebar){
                $class = 'bigstr-sticky-sidebar';
            }
            return $class;
}
add_filter( 'm_shop_stick_sidebar_class','m_shop_stick_sidebar', 999 );
/*****************************/
//add class active
function m_shop_body_classes( $classes ){
if(class_exists( 'WooCommerce' )):
$classes[] = 'woocommerce';
endif;
$m_shop_color_scheme = get_theme_mod( 'm_shop_color_scheme','opn-light' );
        
          if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){
                 $classes[] = 'm-shop-wishlist-activate';
         } 

return $classes;
}
add_filter( 'body_class', 'm_shop_body_classes' );

// default size in upload image
function m_shop_attachment_display_settings() {
    update_option( 'image_default_size', 'large' );
}
add_action( 'after_setup_theme', 'm_shop_attachment_display_settings' );


//testimonials content output function
function m_shop_testimonials_content( $m_shop_testimonials_content_id, $default ) {
//passing the setting ID and Default Values

	$m_shop_testimonials_content= get_theme_mod( $m_shop_testimonials_content_id, $default );
		
		if ( ! empty( $m_shop_testimonials_content ) ) :
			$m_shop_testimonials_content = json_decode( $m_shop_testimonials_content );
			
			if ( ! empty( $m_shop_testimonials_content ) ) {
				foreach ( $m_shop_testimonials_content as $testimonials_item ) :

					$image = ! empty( $testimonials_item->image_url ) ? apply_filters( 'm_shop_translate_single_string', $testimonials_item->image_url, 'Testimonials section' ) : '';

					$title  = ! empty( $testimonials_item->title ) ? apply_filters( 'm_shop_translate_single_string', $testimonials_item->title, 'Testimonials section' ) : '';

					$subtitle  = ! empty( $testimonials_item->subtitle ) ? apply_filters( 'm_shop_translate_single_string', $testimonials_item->subtitle, 'Testimonials section' ) : '';

					$text   = ! empty( $testimonials_item->text ) ? apply_filters( 'm_shop_translate_single_string', $testimonials_item->text, 'Testimonials section' ) : '';
					$link   = ! empty( $testimonials_item->link ) ? apply_filters( 'm_shop_translate_single_string', $testimonials_item->link, 'Testimonials section' ) : '';
					?>
				<div class="th-testimonial-list">
					<div class="th-testimonial-img-wrap">
                    <div class="th-testimonial-img">
                    <img src="<?php echo esc_url($image); ?>"/>
                    </div>
                    <div class="th-testimonial-cnt">
                    <h2 class="th-testimonial-name"><a href="<?php echo esc_url($link);?>"><?php echo esc_html($title); ?></a></h2>
                    <span><?php echo esc_html($subtitle); ?></span>
                    </div>
                	</div>
                    <div class="th-cont-wrap">
                    <p class="th-testimonial-content">
                       <?php echo esc_html($text); ?>
                    </p>
                    
                	</div>
                </div>
	
			<?php		
				endforeach;			
			} // End if().
		
	endif;	
}
/*************************/
//Category page url
/*************************/
if(!function_exists('m_shop_get_blog_url')){
  function m_shop_get_blog_url($category_slug){
  $link='';
  $category_id = get_category_by_slug($category_slug);
  if($category_id=='0'){
  $link = get_permalink( get_option( 'page_for_posts' ) );
  }else{
  $id = $category_id->term_id;
  $link = get_category_link($id);
  }
  return $link;
  }
}
/*************************/
//Porduct Cat page url
/*************************/
if(!function_exists('m_shop_get_prdct_url')){
  function m_shop_get_prdct_url($category_slug){	
  $link='';
  if($category_slug =='0'){
  $link = get_permalink(wc_get_page_id( 'shop' ) );
  }else{
  $link = get_term_link($category_slug, 'product_cat' );
  }
  return $link;
  }
}
/************************/
//Side pan row one 
/************************/
if(!function_exists('m_shop_side_pan_row_one')){
function m_shop_side_pan_row_one(){
 $row1_lay = get_theme_mod('m_shop_pan_row1_set','none');
 if($row1_lay =='text'){?>
  <div class="side-pan-text">
         <?php echo esc_html(get_theme_mod('m_shop_row1_texthtml'));?>
 </div>
 <?php }elseif($row1_lay =='callto'){?>
     <div class="support-wrap">
              <div class="support-content">
              	<div class="suppot">
                 <i class="fa fa-headphones" aria-hidden="true"></i>
                <span class="sprt-tel"><b><?php echo esc_html(get_theme_mod('m_shop_row1_calto_txt','Call To')); ?></b> 
                  <a href="tel:<?php echo esc_html(get_theme_mod('m_shop_row1_calto_num')); ?>"><?php echo esc_html(get_theme_mod('m_shop_row1_calto_num')); ?></a>
                </span> 
              </div>
                  <div class="support-email">
                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <span class="sprt-email"> 
                	 <b>Email</b>
                	
                  <a href="mailto:<?php echo esc_html(get_theme_mod('m_shop_row1_calto_email')); ?>"><?php echo esc_html(get_theme_mod('m_shop_row1_calto_email')); ?></a>
                </span>
            </div>
              </div>
          </div>

 <?php }elseif($row1_lay =='widget'){?>
              <div class="header-widget-wrap">
                 <?php
                  if( is_active_sidebar('side-pan-1-widget') ){
                       dynamic_sidebar('side-pan-1-widget');
                   }
                  ?>
               </div>
 <?php }elseif($row1_lay =='social'){?>
<div class="content-social">
<?php echo m_shop_social_links();?>
</div>
 <?php }elseif($row1_lay =='button'){?>

 	<a href="<?php echo esc_url(get_theme_mod('m_shop_row1_btn_lnk','#')); ?>" class="btn-main-header"><?php echo esc_html(get_theme_mod('m_shop_row1_btn_txt','Button Text')); ?></a>
 <?php }


 }
}

/************************/
//Side pan row one 
/************************/
if(!function_exists('m_shop_side_pan_row_two')){
function m_shop_side_pan_row_two(){
 $row2_lay = get_theme_mod('m_shop_pan_row2_set','none');
 if($row2_lay =='text'){?>
  <div class="side-pan-text">
         <?php echo esc_html(get_theme_mod('m_shop_row2_texthtml'));?>
 </div>
 <?php }elseif($row2_lay =='callto'){?>
     <div class="header-support-wrap">
              <div class="header-support-content">
                 <i class="fa fa-phone" aria-hidden="true"></i>
                <span class="sprt-tel"><b><?php echo esc_html(get_theme_mod('m_shop_row2_calto_txt','Call To')); ?></b> 
                  <a href="tel:<?php echo esc_html(get_theme_mod('m_shop_row2_calto_num')); ?>"><?php echo esc_html(get_theme_mod('m_shop_row2_calto_num')); ?></a>
                </span> 
                <span class="sprt-email"> 
                  <a href="mailto:<?php echo esc_html(get_theme_mod('m_shop_row2_calto_email')); ?>"><?php echo esc_html(get_theme_mod('m_shop_row2_calto_email')); ?></a>
                </span>
              </div>
          </div>

 <?php }elseif($row2_lay =='widget'){?>
              <div class="header-widget-wrap">
                 <?php
                  if( is_active_sidebar('side-pan-2-widget') ){
                       dynamic_sidebar('side-pan-2-widget');
                   }
                  ?>
               </div>
 <?php }elseif($row2_lay =='social'){?>
<div class="content-social">
<?php echo m_shop_social_links();?>
</div>
 <?php }elseif($row2_lay =='button'){?>

 	<a href="<?php echo esc_url(get_theme_mod('m_shop_row2_btn_lnk','#')); ?>" class="btn-main-header"><?php echo esc_html(get_theme_mod('m_shop_row2_btn_txt','Button Text')); ?></a>
 <?php }


 }
}