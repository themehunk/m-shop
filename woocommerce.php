<?php 
/**
 * The WooCommerce template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#woocommerce
 * @package  M Shop
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
get_header();
do_action('m_shop_asidebar');
?>
   <main>
   <div id="content">
          <div class="content-wrap" >
            <div class="container">
              <div class="main-area">
                <div id="primary" class="primary-content-area">
                  <div class="primary-content-wrap">
                    <div class="page-head">
                   <?php m_shop_get_page_title();?>
                   <?php woocommerce_breadcrumb();?>
                    </div>
                         <?php woocommerce_content();?> 
                  </div>  <!-- end primary-content-wrap-->
                </div>  <!-- end primary primary-content-area-->
                
              </div> <!-- end main-area -->
            </div>
          </div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
      </main>
<?php get_footer();