<?php
/**
 * @package QuickPress_Fullscreen
 * @version 2.0
 */
/*
Plugin Name: QuickPress Fullscreen
Plugin URI: http://wordpress.org/extend/plugins/quickpress-fullscreen/
Description: Turn QuickPress in WordPress Dashboard into fullscreen when expanded.
Author: Rio Purnomo
Version: 2.0
Author URI: http://siriokun.com/
*/

// Make QuickPress fullscreen when expanded
if ( ! function_exists( 'quickpress_fullscreen' ) ) {
		function quickpress_fullscreen() {
			wp_register_style( 'quickpress-fullscreen', plugins_url('style.css', __FILE__) );
			wp_enqueue_style( 'quickpress-fullscreen' );
		}
}
// Make that style above only load in Dashboard
add_action( 'admin_head-index.php', 'quickpress_fullscreen' );

?>
