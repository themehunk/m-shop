<?php
/**
 * View General
 *
 * @package Themehunk
 * @subpackage  Top Store
 * @since 1.0.0
 */
?>
<div class="m-shop-container m-shop-welcome">
		<div id="poststuff">
			<div id="post-body" class="columns-1">
				<div id="post-body-content">
					<!-- All WordPress Notices below header -->
					<h1 class="screen-reader-text"><?php esc_html_e( 'Top Store', 'm-shop' ); ?> </h1>
					<div class="tabs-list">
					<a href="#m-shop-recommend-plugins" class="tab active" data-id="recommend"><?php esc_html_e( 'Recommend Plugins', 'm-shop' ); ?></a> 
					<a href="#m-shop-useful-plugins" class="tab" data-id="useful"><?php esc_html_e( 'Useful Plugins', 'm-shop' ); ?></a>
					</div>
						<?php do_action( 'm_shop_welcome_page_content_before' ); ?>
                        <div class="m-shop-content">
						<?php do_action( 'm_shop_welcome_page_main_content' ); ?>
                         </div>
						<?php do_action( 'm_shop_welcome_page_content_after' ); ?>
				</div>
			</div>
			<!-- /post-body -->
			<br class="clear">
		</div>


</div>
