<?php
// Exit if accessed directly.
if (!defined('ABSPATH')){
    exit;
}

if ( ! class_exists( 'ThemeHunk_Child_Notify' ) ){

class ThemeHunk_Child_Notify{

    function __construct(){

		if(isset($_GET['notice-disable']) && $_GET['notice-disable'] == true){
		add_action('admin_init', array($this,'set_cookie'));
		}


		if(!isset($_COOKIE['thf_time'])) {
			 add_action( 'admin_notices', array($this,'notify'));

		}

		if(isset($_COOKIE['thf_time'])) {
			add_action( 'admin_notices', array($this,'unset_cookie'));
		}

	}


	function set_cookie() { 
 
		$visit_time = date('F j, Y  g:i a');

			$cok_time = time()+(86457*30);
 
		if(!isset($_COOKIE['thf_time'])) {
 
			// set a cookie for 1 year
		setcookie('thf_time', $cok_time, time()+(86457*30));
			 
		}
 
	}

		function unset_cookie(){

			$visit_time = time();
  			$cookie_time = $_COOKIE['thf_time'];

			if ($cookie_time < $visit_time) {
				setcookie('thf_time', null, strtotime('-1 day'));
			}
	}

	function notify(){

		
		  $my_theme = wp_get_theme();
		  $theme =  esc_html( $my_theme->get( 'TextDomain' ) );
		$display = isset($_GET['notice-disable'])?'none':'block'; 
		?>


          <div class="notice notice-success is-dismissible th-theme-notice">

          	<h1>
        <?php
        /* translators: %1$s: theme name, %2$s theme version */
        printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'featuredlite' ), esc_html( $my_theme->Name ), esc_html( $my_theme->Version ) );
        ?>
      </h1>

        <p><?php _e( "Get Started with ".esc_html( $my_theme->Name )." and Start customizing your website, also Install the Child theme if you want to edit the core code of the theme.", 'featuredlite' ); ?></p>
        <a href="<?php echo esc_url(admin_url('themes.php?page=thunk_started')); ?>" class="button button-primary th-blue"><?php _e('Get Started with '.esc_html( $my_theme->Name ),'featuredlite') ?></a>

        <a href="<?php echo esc_url(admin_url('themes.php?page=thunk_started')); ?>" class=" button-secondary"><?php _e('Get Child Theme Now','featuredlite') ?></a>

        <a href="?notice-disable=1"  class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>
    </div> 


 <?php } 


}

$obj = New ThemeHunk_Child_Notify();

 } // if class end ?>
