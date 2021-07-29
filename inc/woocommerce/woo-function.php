<?php 
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package  M Shop WordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
	   return;
}
if ( ! function_exists( 'is_plugin_active' ) ){
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/*******************************/
/** Sidebar Add Cart Product **/
/*******************************/
if ( ! function_exists( 'm_shop_cart_total_item' ) ){
  /**
   * Cart Link
   * Displayed a link to the cart including the number of items present and the cart total
   */
 function m_shop_cart_total_item(){
   global $woocommerce; 
  ?>
 <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','m-shop' ); ?>">
  <i class="fa fa-shopping-basket"></i> 
  <span class="count-item"><?php echo WC()->cart->get_cart_contents_count();?></span>
  <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
</a>
  <?php }
}


if ( ! function_exists( 'm_shop_menu_cart_view' ) ){

//cart view function
function m_shop_menu_cart_view($cart_view){
	global $woocommerce;
    $cart_view= m_shop_cart_total_item();
    return $cart_view;
}
add_action( 'm_shop_cart_icon','m_shop_menu_cart_view');
}

if ( ! function_exists( 'm_shop_woo_cart_product' ) ){

function m_shop_woo_cart_product(){
global $woocommerce;
?>
<div class="cart-overlay"></div>
<div id="open-cart" class="open-cart">
<div class="cart-widget-heading">
  <h4><?php _e('Shopping Cart','m-shop');?></h4>
  <a class="cart-close-btn"><?php _e('close','m-shop');?></a></div>  
<div class="open-quickcart-dropdown">
<?php 
woocommerce_mini_cart(); 
?>
</div>
<?php if ($woocommerce->cart->is_empty() ) : ?>
<a class="button return wc-backward" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"> <?php _e( 'Return to shop', 'm-shop' ) ?> </a>
<?php endif;?>
</div>
    <?php
}
add_action( 'm_shop_woo_cart', 'm_shop_woo_cart_product' );
add_filter('woocommerce_add_to_cart_fragments', 'm_shop_add_to_cart_dropdown_fragment');

}


if ( ! function_exists( 'm_shop_add_to_cart_dropdown_fragment' ) ){
function m_shop_add_to_cart_dropdown_fragment( $fragments ){
   global $woocommerce;
   ob_start();
   ?>
   <div class="open-quickcart-dropdown">
       <?php woocommerce_mini_cart(); ?>
   </div>
   <?php $fragments['div.open-quickcart-dropdown'] = ob_get_clean();
   return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'm_shop_add_to_cart_fragment');
}

if ( ! function_exists( 'm_shop_add_to_cart_fragment' ) ){
function m_shop_add_to_cart_fragment($fragments) {
        ob_start();?>

        <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','m-shop' ); ?>">
          <i class="fa fa-shopping-basket"></i> 
          <span class="count-item"><?php echo WC()->cart->get_cart_contents_count();?></span>
          <span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
        </a>

       <?php  $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
  }

 if ( ! function_exists( 'm_shop_add_to_cart_url' ) ){ 
/***********************************************/
//Sort section Woocommerce category filter show
/***********************************************/
function m_shop_add_to_cart_url($product){
 $cart_url =  apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button th-button %s %s"><span>%s</span></a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        esc_attr( isset( $quantity ) ? $quantity : 1 ),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
        $product->is_purchasable() && $product->is_in_stock() && $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        esc_html( $product->add_to_cart_text() )
    ),$product );
 return $cart_url;
}
}

if ( ! function_exists( 'm_shop_whishlist_url' ) ){ 
          function m_shop_whishlist_url(){
          $wishlist_page_id =  get_option( 'yith_wcwl_wishlist_page_id' );
          $wishlist_permalink = get_the_permalink( $wishlist_page_id );
          return $wishlist_permalink ;
          }
    }

 if ( ! function_exists( 'm_shop_account' ) ){ 
/** My Account Menu **/
function m_shop_account(){
 if ( is_user_logged_in() ){
  $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><i class="fa fa-user-o" aria-hidden="true"></i><span class="tooltiptext">'.__('Account','m-shop').'</span></a>';
  } 
 else {
  $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><i class="fa fa-lock" aria-hidden="true"></i><span class="tooltiptext">'.__('Register','m-shop').'</span></a>';
  }
 echo $return;
 }
}

 if ( ! function_exists( 'm_shop_product_list_categories_pan' ) ){ 
function m_shop_product_list_categories_pan( $args = '' ){
    $term = get_theme_mod('m_shop_sidepan_exclde_category','');
    if(!empty($term['0'])){
      $exclude_id = $term;
      }else{
      $exclude_id = '';
     }
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 5,
        'echo'                => 0,
        'exclude'             => $exclude_id,
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories','m-shop' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
     
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="thunk-product-cat-list pan" data-menu-style="accordion">'.$html.'</ul>';
  }

}

//To integrate with a theme, please use bellow filters to hide the default buttons. hide default wishlist button on product archive page
add_filter( 'woosw_button_position_archive', function() {
    return '0';
} );
//hide default compare button on product archive page
add_filter( 'filter_wooscp_button_archive', function() {
    return '0';
} );