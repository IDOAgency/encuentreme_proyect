<?php


if(!class_exists('dcoptions')) :

// DEFINE PLUGIN ID
define('dcoptions_ID', 'wp-dashboard-customizer');
// DEFINE PLUGIN NICK
define('dcoptions_NICK', 'WP Dashboard Customizer');

    class dcoptions
    {
		/** function/method
		* Usage: return absolute file path
		* Arg(1): string
		* Return: string
		*/
		public static function file_path($file)
		{
			return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
		}
		/** function/method
		* Usage: hooking the plugin options/settings
		* Arg(0): null
		* Return: void
		*/
		public static function register()
		{
			register_setting(dcoptions_ID.'_options', 'dbc_screen_options' );
			register_setting(dcoptions_ID.'_options', 'dbc_help_tab' );
			register_setting(dcoptions_ID.'_options', 'dbc_right_now' );
			register_setting(dcoptions_ID.'_options', 'dbc_recent_comments' );
			register_setting(dcoptions_ID.'_options', 'dbc_recent_drafts' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_plugins' );
			register_setting(dcoptions_ID.'_options', 'dbc_incoming_links' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_quickpress' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_wpblog' );
			register_setting(dcoptions_ID.'_options', 'dbc_other_wp_news' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_admin_bar' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_wp_logo' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_about_wplink' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_wporg_link' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_doc_link' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_support_link' );
			register_setting(dcoptions_ID.'_options', 'dbc_remove_feedback_link' );
			register_setting(dcoptions_ID.'_options', 'dbc_restrict_post_view' );
			register_setting(dcoptions_ID.'_options', 'dbc_restrict_media_view' );
			register_setting(dcoptions_ID.'_options', 'dbc_thumb_in_dash' );
			register_setting(dcoptions_ID.'_options', 'dbc_display_cut_paste' );
			register_setting(dcoptions_ID.'_options', 'dbc_login_logo' );
			register_setting(dcoptions_ID.'_options', 'dbc_custom_reg_message' );
			register_setting(dcoptions_ID.'_options', 'dbc_custom_login_message' );
			register_setting(dcoptions_ID.'_options', 'bdc_ip_lock_enable' );
			register_setting(dcoptions_ID.'_options', 'dbc_post_views' );
			register_setting(dcoptions_ID.'_options', 'dbc_view_in_editor' );
			register_setting(dcoptions_ID.'_options', 'dbc_post_view_pos' );
		}
		/** function/method
		* Usage: hooking (registering) the plugin menu
		* Arg(0): null
		* Return: void
		*/
		public static function menu()
		{
			// Create menu tab
			add_options_page('WP Dashboard Customizer', 'Wp DB Customizer', 'manage_options', dcoptions_ID, array('dcoptions', 'options_page'));
		}
		/** function/method
		* Usage: show options/settings form page
		* Arg(0): null
		* Return: void
		*/
		public static function options_page()
		{ 
			if (!current_user_can('manage_options')) 
			{
				wp_die( __('You do not have sufficient permissions to access this page.') );
			}
			
			$plugin_id = dcoptions_ID;
			
			// display options page
			include(self::file_path('options.php'));
		}
		/** function/method
		* Usage: filtering the content
		* Arg(1): string
		* Return: string
		*/
    }
	
	if ( is_admin() )
	{
		add_action('admin_init', array('dcoptions', 'register'));
		add_action('admin_menu', array('dcoptions', 'menu'));
	}

endif;


function dbc_script() {

wp_enqueue_style('dbc_style',plugins_url( '/style.css' , __FILE__ ));
wp_enqueue_script('jquery');
wp_enqueue_script('dbc_uploader',plugins_url( '/upload.js' , __FILE__ ));
wp_enqueue_style( 'thickbox' );
wp_enqueue_script( 'thickbox' );
wp_enqueue_script( 'media-upload' );
wp_enqueue_script('dbc_custom_scripts',plugins_url( '/db-customize.js' , __FILE__ ));

}
add_action('admin_init', 'dbc_script');


?>