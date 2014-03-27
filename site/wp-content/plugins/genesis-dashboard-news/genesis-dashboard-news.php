<?php
/**
 * Main plugin file.
 * Adds a new dashboard widget to your WordPress Admin Dashboard that pulls in items of the News Planet
 * for the Genesis Framework and its ecosystem.
 *
 * @package   Genesis Dashboard News
 * @author    David Decker
 * @link      http://twitter.com/deckerweb
 * @copyright Copyright 2011-2012, David Decker - DECKERWEB
 *
 * Plugin Name: Genesis Dashboard News
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/genesis-dashboard-news/
 * Description: Adds a new dashboard widget to your WordPress Admin Dashboard that pulls in items of the News Planet for the Genesis Framework and its ecosystem.
 * Version: 1.6.1
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPLv2 or later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: genesis-dashboard-news
 * Domain Path: /languages/
 *
 * Copyright 2011-2012 David Decker - DECKERWEB
 *
 *     This file is part of Genesis Dashboard News,
 *     a plugin for WordPress.
 *
 *     Genesis Dashboard News is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Genesis Dashboard News is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Setting constants
 *
 * @since 1.5.0
 */
/** Plugin directory */
define( 'GDBN_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'GDBN_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );


add_action( 'init', 'ddw_gdbn_init' );
/**
 * Load the text domain for translation of the plugin
 * 
 * @since 1.4.0
 */
function ddw_gdbn_init() {

	/** Include plugin functions within "wp-admin" */
	if ( is_admin() ) {

		/** First look in WordPress' "languages" folder = custom & update-secure! */
		load_plugin_textdomain( 'genesis-dashboard-news', false, GDBN_PLUGIN_BASEDIR . '/../../languages/genesis-dashboard-news/' );

		/** Then look in plugin's "languages" folder = default */
		load_plugin_textdomain( 'genesis-dashboard-news', false, GDBN_PLUGIN_BASEDIR . '/languages' );

		/**
		 * Register the new dashboard widget into the 'wp_dashboard_setup' action hook
		 * 
		 * @since 1.0.0
		 */
		require_once( GDBN_PLUGIN_DIR . '/includes/gdbn-dashboard-widget.php' );
		add_action( 'wp_dashboard_setup', 'ddw_gdbn_add_dashboard_widgets' );

		/** Include plugin admin helper functions */
		require_once( GDBN_PLUGIN_DIR . '/includes/gdbn-admin.php' );
		require_once( GDBN_PLUGIN_DIR . '/includes/gdbn-help.php' );

	}  // end-if

	/** Add "Dashbord" link to plugin page */
	if ( is_admin() && current_user_can( 'manage_options' ) ) {

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , 'ddw_gdbn_dashboard_link' );

	}  // end-if

}  // end of function ddw_gdbn_init


/**
 * Returns current plugin's header data in a flexible way.
 *
 * @since 1.6.0
 *
 * @uses get_plugins()
 *
 * @param $gdbn_plugin_value
 * @param $gdbn_plugin_folder
 * @param $gdbn_plugin_file
 *
 * @return string Plugin version
 */
function ddw_gdbn_plugin_get_data( $gdbn_plugin_value ) {

	if ( ! function_exists( 'get_plugins' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	$gdbn_plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$gdbn_plugin_file = basename( ( __FILE__ ) );

	return $gdbn_plugin_folder[ $gdbn_plugin_file ][ $gdbn_plugin_value ];

}  // end of function ddw_gdbn_plugin_get_data
