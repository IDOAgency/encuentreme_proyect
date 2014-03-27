<?php

/*
	Plugin Name: Wp Dashboard Customizer
	Plugin URI: http://codeilike.com/wp-dashboard-customizer
	Description: Customize your WordPress Dashboard easily. This plugin specially created for public blog/website.
	Version: 0.1
	Author: Ifty Rahman
	Author URI: http://ifty.info
	Version: 0.1
	License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
	
require dirname( __FILE__ ) . '/panel.php';


// Custom Register Message

if (get_option('dbc_custom_reg_message')):
function dbc_custom_register_message(){
	echo '<div style="margin:5px 0 15px 0;border:1px solid #e5e5e5;padding:10px">
			<p style="margin:5px 0;">
				'.get_option("dbc_custom_reg_message").'
			</p> 
		</div>';
}
add_action('register_form', 'dbc_custom_register_message');
endif;

// Custom Login Message

if (get_option('dbc_custom_login_message')):
function dbc_custom_login_message(){
	echo '<div style="margin:5px 0 15px 0;border:1px solid #e5e5e5;padding:10px">
			<p style="margin:5px 0;">
				'.get_option("dbc_custom_login_message").'
			</p> 
		</div>';
}
add_action('login_form', 'dbc_custom_login_message');
endif;

// Custom Login Logo

if (get_option('dbc_login_logo')):
function dbc_login_logo(){
	echo'<style type="text/css">
		h1 a { background-image: url("'.get_option('dbc_login_logo').'") !important; }
	</style>';
	}
add_action('login_head', 'dbc_login_logo');
endif;


// Hide Screen Options

if (get_option('dbc_screen_options')):
function dbc_hide_screen_option() {
    echo '<style type="text/css">
          #screen-options-link-wrap {display: none;}
         </style>';
}
add_action('admin_head', 'dbc_hide_screen_option');
endif;


// Hide help Options

if (get_option('dbc_help_tab')):
function dbc_hide_help() {
    echo '<style type="text/css">
           #contextual-help-link-wrap { display: none !important; }
         </style>';
}
add_action('admin_head', 'dbc_hide_help');
endif;


// Remove Quickpress

if (get_option('dbc_remove_quickpress')):
function dbc_remove_quickpress() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
}
add_action('wp_dashboard_setup', 'dbc_remove_quickpress' );
endif;


// Remove Right Now

if (get_option('dbc_right_now')):
function dbc_hide_right_now() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
}
add_action('wp_dashboard_setup', 'dbc_hide_right_now' );
endif;


// Remove Recent Comment

if (get_option('dbc_recent_comments')):
function dbc_hide_recent_comments() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
}
add_action('wp_dashboard_setup', 'dbc_hide_recent_comments' );
endif;


// Remove Recent Drafts

if (get_option('dbc_recent_drafts')):
function dbc_hide_recent_drafts() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}
add_action('wp_dashboard_setup', 'dbc_hide_recent_drafts' );
endif;

// Remove Plugins

if (get_option('dbc_remove_plugins')):
function dbc_hide_plugins() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}
add_action('wp_dashboard_setup', 'dbc_hide_plugins' );
endif;


// Remove Incoming Link

if (get_option('dbc_incoming_links')):
function dbc_hide_incoming_links() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
}
add_action('wp_dashboard_setup', 'dbc_hide_incoming_links' );
endif;


// Remove WordPress Blog

if (get_option('dbc_remove_wpblog')):
function dbc_hide_wordpress_blog() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
}
add_action('wp_dashboard_setup', 'dbc_hide_wordpress_blog' );
endif;


// Remove Other WordPress News

if (get_option('dbc_other_wp_news')):
function dbc_hide_other_wpnews() {
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'dbc_hide_other_wpnews' );
endif;


// Disable WordPress admin bar excerpt admin

if (get_option('dbc_remove_admin_bar')):
function dbc_remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
add_action('init', 'dbc_remove_admin_bar');
endif;


// Remove wp logo from WordPress admin bar

if (get_option('dbc_remove_wp_logo')):
function dbc_wp_admin_bar() {
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'dbc_wp_admin_bar' );
endif;


// Remove wordpress about from WordPress admin bar

if (get_option('dbc_remove_about_wplink')):
function dbc_remove_about_wordpress() {
    global $wp_admin_bar;
	 $wp_admin_bar->remove_menu('about');
}
add_action( 'wp_before_admin_bar_render', 'dbc_remove_about_wordpress' );
endif;


// Remove wordpress about from WordPress admin bar

if (get_option('dbc_remove_wporg_link')):
function dbc_remove_wordpress_org_link() {
    global $wp_admin_bar;
	 $wp_admin_bar->remove_menu('wporg');
}
add_action( 'wp_before_admin_bar_render', 'dbc_remove_wordpress_org_link' );
endif;


// Remove wordpress documentation from WordPress admin bar

if (get_option('dbc_remove_doc_link')):
function dbc_remove_documentation_link() {
    global $wp_admin_bar;
	 $wp_admin_bar->remove_menu('documentation');
}
add_action( 'wp_before_admin_bar_render', 'dbc_remove_documentation_link' );
endif;


// Remove support forum link from WordPress admin bar

if (get_option('dbc_remove_support_link')):
function dbc_remove_support_link() {
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('support-forums');
}
add_action( 'wp_before_admin_bar_render', 'dbc_remove_support_link' );
endif;


// Remove feedback link from WordPress admin bar

if (get_option('dbc_remove_feedback_link')):
function dbc_remove_feedback_link() {
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('feedback');
}
add_action( 'wp_before_admin_bar_render', 'dbc_remove_feedback_link' );
endif;




//show thumbnail in dashboard

if (get_option('dbc_thumb_in_dash')):
if ( !function_exists('dash_thumb') && function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails', array( 'post', 'page' ) );
	
	function dash_thumb($cols) {
		$cols['thumbnail'] = __('Thumbnail');
		return $cols;
	}
	function dashthumbvalue($column_name, $post_id) {
			$width = (int) 50;
			$height = (int) 50;
			if ( 'thumbnail' == $column_name ) {
				$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
				$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
				if ($thumbnail_id)
					$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
				elseif ($attachments) {
					foreach ( $attachments as $attachment_id => $attachment ) {
						$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
					}
				}
					if ( isset($thumb) && $thumb ) {
						echo $thumb;
					} else {
						echo __('None');
					}
			}
	}
	
	// for posts
	add_filter( 'manage_posts_columns', 'dash_thumb' );
	add_action( 'manage_posts_custom_column', 'dashthumbvalue', 10, 2 );
	
}
endif;


// Enable Cut Copy

if (get_option('dbc_display_cut_paste')):
function enable_more_buttons($buttons) {
  $buttons[] = 'copy';
  $buttons[] = 'cut';
  $buttons[] = 'paste';
return $buttons;
}
add_filter("mce_buttons_2", "enable_more_buttons");
endif;

//Restrict author to view all posts

if (get_option('dbc_restrict_post_view')):
function dbc_author_post_only($query) {
        global $pagenow;
    if( 'edit.php' != $pagenow || !$query->is_admin )
        return $query;
    if( !current_user_can( 'manage_options' ) ) {
       global $user_ID;
       $query->set('author', $user_ID );
     }
     return $query;
}
add_filter('pre_get_posts', 'dbc_author_post_only');
endif;


//Restrict author to view all posts

if (get_option('dbc_restrict_media_view')):
function dbc_author_media_only( $wp_query ) {
	//are we looking at the Media Library or the Posts list?
	if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/upload.php' ) !== false
	|| strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
		//user level 5 converts to Editor
		if ( !current_user_can( 'level_5' ) ) {
			//restrict the query to current user
			global $current_user;
			$wp_query->set( 'author', $current_user->id );
		}
	}
}
add_filter('parse_query', 'dbc_author_media_only' );
endif;


function dbc_remove_footer_thnaks (){
	echo "<style>#wpfooter{display:none}</style>";
}
add_action('admin_head','dbc_remove_footer_thnaks');
?>