<?php
   /*
   Plugin Name: Replace Howdy with Welcome
   Plugin URI: http://www.cohesivewebdesigns.com
   Description: This plugin will replace "Howdy" with "Welcome" in the top right corner of your Wordpress dashboard.
   Version: 1.0
   Author: Cohesive
   Author URI: http://www.cohesivewebdesigns.com
   License: GPL2
   */

function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Welcome,', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );

?>