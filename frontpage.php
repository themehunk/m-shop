<?php 
/**
 * Template Name: Homepage Template
 * @package ThemeHunk
 * @subpackage M Shop
 * @since 1.0.0
 */
get_header();
do_action('m_shop_asidebar');?>
   <main>
   <div id="content">
        	<div class="content-wrap" >
            <div class="container">
        			<div class="main-area">
        				<div id="primary" class="primary-content-area m-shop-frontpage">
        					
                        <?php
                          if(shortcode_exists( 'm-shop' ) ){
                             do_shortcode("[m-shop section='m_shop_show_frontpage']");
                          }
                        ?>
        				</div>  <!-- end primary primary-content-area-->	
        			</div> <!-- end main-area -->
            </div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
      </main>
<?php get_footer();