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


// $args = array();
//      if ( $product ){
//       $defaults = array(
//         'quantity'   => 1,
//         'class'      => implode(
//           ' ',
//           array_filter(
//             array(
//               'button th-button',
//               'product_type_' . $product->get_type(),
//               $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
//               $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
//             )
//           )
//         ),
//         'attributes' => array(
//           'data-product_id'  => $product->get_id(),
//           'data-product_sku' => $product->get_sku(),
//           'aria-label'       => $product->add_to_cart_description(),
//           'rel'              => 'nofollow',
//         ),
//       );

//       $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

//       if ( isset( $args['attributes']['aria-label'] ) ) {
//         $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
//       }

//       wc_get_template( 'loop/add-to-cart.php', $args );
//     }
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

//for shop page
remove_action('woocommerce_init','th_compare_add_action_shop_list');