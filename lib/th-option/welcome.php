
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('Setup Home Page','m-shop'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Click button to set theme default home page','m-shop'); ?></p>
     <p>
        <?php
		if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'m-shop');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'m-shop');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";


        }
        ?>
        <button style="<?php echo $Bstyle; ?>"; class="button activate-now <?PHP echo $class; ?>"><?php _e($btn_text,'m-shop'); ?></button>
        <a style="<?php echo $style; ?>";  target="_blank" href="<?php echo get_home_url(); ?>" class="button alink button-primary"><?php _e('View Home Page','m-shop'); ?></a>
		
         </p>
		 	 
		 
    <p>
        <a target="_blank" href="https://themehunk.com/docs/m-shop/#homepage-setting"><?php _e('Manually Setup','m-shop'); ?></a>
    </p>
</div>



<!--- tab second -->
<div class="theme_link">

    <h3><?php _e('Documentation','m-shop'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Our WordPress Theme is well documented, you can go with our documentation and learn to customize M Shop Theme','m-shop'); ?></p>
    <p><a target="_blank" href="https://themehunk.com/docs/m-shop/"><?php _e(' Go to docs','m-shop'); ?></a></p>

    
    
</div>
<!--- tab third -->

<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('Customize Your Website','m-shop'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('M Shop theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','m-shop'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","m-shop"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("Customizer Links","m-shop"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","m-shop"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=m-shop-gloabal-color'); ?>" class="components-button is-link"><?php _e("Global Colors","m-shop"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[panel]=woocommerce'); ?>" class="components-button is-link"><?php _e("Woocommerce","m-shop"); ?></a><hr>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=m-shop-section-header-group'); ?>" class="components-button is-link"><?php _e("Header Options","m-shop"); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[panel]=m-shop-panel-frontpage'); ?>" class="components-button is-link"><?php _e("FrontPage Sections","m-shop"); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[section]=m-shop-section-footer-group'); ?>" class="components-button is-link"><?php _e("Footer Section","m-shop"); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->