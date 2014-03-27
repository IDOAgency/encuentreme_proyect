<?php
/**
 * Helper functions for the admin - help tabs.
 *
 * @package    Genesis Dashboard News
 * @subpackage Admin Help
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2011-2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-dashboard-news/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.4.0
 */

add_action( 'wp_dashboard_setup', 'ddw_gdbn_dashboard_help' );
/**
 * Load plugin help tab after core help tabs on Dashboard admin page.
 *
 * @since 1.5.0
 *
 * @global mixed $pagenow, $gdbn_filter_capability
 */
function ddw_gdbn_dashboard_help() {

	global $pagenow, $gdbn_filter_capability;

	/** Add help tab on Dashboard only if set capability is met */
	if ( current_user_can( $gdbn_filter_capability ) ) {

		add_action ( 'admin_head-' . $pagenow, 'ddw_gdbn_dashboard_help_tab' );

	}  // end-if

}  // end of function ddw_gdbn_dashboard_help


add_action( 'load-toplevel_page_genesis', 'ddw_gdbn_dashboard_help_tab', 16 );			// Genesis Core
add_action( 'load-genesis_page_seo-settings', 'ddw_gdbn_dashboard_help_tab', 16 );		// Genesis SEO
add_action( 'load-genesis_page_genesis-import-export', 'ddw_gdbn_dashboard_help_tab', 16 );	// Genesis Import/Export
add_action( 'load-genesis_page_design-settings', 'ddw_gdbn_dashboard_help_tab', 16 );		// Prose Child Theme
add_action( 'load-genesis_page_prose-custom', 'ddw_gdbn_dashboard_help_tab', 16 );		// Prose Custom Section
add_action( 'load-genesis_page_dynamik-settings', 'ddw_gdbn_dashboard_help_tab', 16 );		// Dynamik Child Theme
add_action( 'load-genesis_page_dynamik-design', 'ddw_gdbn_dashboard_help_tab', 16 );		// Dynamik Child Design
add_action( 'load-genesis_page_dynamik-custom', 'ddw_gdbn_dashboard_help_tab', 16 );		// Dynamik Custom Section
/**
 * Create and display plugin help tab content.
 *
 * @since 1.5.0
 *
 * @global mixed $gdbn_dashboard_screen, $pagenow
 *
 * @param $gdbn_help_tab_title
 */
function ddw_gdbn_dashboard_help_tab() {

	global $gdbn_dashboard_screen, $pagenow;

	$gdbn_dashboard_screen = get_current_screen();

	/** Display help tabs only for WordPress 3.3 or higher */
	if ( ! class_exists( 'WP_Screen' )
		|| ! $gdbn_dashboard_screen
	) {
		return;
	}

	/** Add the new help tab */
	$gdbn_dashboard_screen->add_help_tab( array(
		'id'      => 'gdbn-dashboard-help',
		'title'   => apply_filters( 'gdbn_filter_help_tab_title', esc_attr__( 'Genesis Dashboard News', 'genesis-dashboard-news' ) ),
		//'content' => apply_filters( 'gdbn_filter_help_tab_content', $gdbn_dashboard_area_help, 'gdbn-dashboard-help' ),
		'callback' => 'ddw_gdbn_dashboard_help_content',
	) );

	/** Add help sidebar */
	if ( $pagenow != 'index.php' ) {

		$gdbn_dashboard_screen->set_help_sidebar(
			'<p><strong>' . __( 'More about the plugin author', 'genesis-dashboard-news' ) . '</strong></p>' .
			'<p>' . __( 'Social:', 'genesis-dashboard-news' ) . '<br /><a href="http://twitter.com/deckerweb" target="_blank" title="@ Twitter">Twitter</a> | <a href="http://www.facebook.com/deckerweb.service" target="_blank" title="@ Facebook">Facebook</a> | <a href="http://deckerweb.de/gplus" target="_blank" title="@ Google+">Google+</a> | <a href="' . esc_url_raw( ddw_gdbn_plugin_get_data( 'AuthorURI' ) ) . '" target="_blank" title="@ deckerweb.de">deckerweb</a></p>' .
			'<p><a href="' . esc_url_raw( GDBN_URL_WPORG_PROFILE ) . '" target="_blank" title="@ WordPress.org">@ WordPress.org</a></p>'
		);

	}  // end-if $pagehook check

}  // end of function ddw_gdbn_dashboard_help_tab


/**
 * Create and display plugin help tab content.
 *
 * @since 1.6.0
 *
 * @uses ddw_gdbn_plugin_get_data() To display various data of this plugin.
 */
function ddw_gdbn_dashboard_help_content() {

	echo '<h3>' . __( 'Plugin', 'genesis-dashboard-news' ) . ': ' . __( 'Genesis Dashboard News', 'genesis-dashboard-news' ) . ' <small>v' . esc_attr( ddw_gdbn_plugin_get_data( 'Version' ) ) . '</small></h3>';
	
	echo '<p>' . sprintf( __( 'Just a simple dashboard news widget regarding the %1$sGenesis Theme Framework%2$s - all plugin info and support could be found at %3$sGenesisThemes.de%4$s. Thanx for using this plugin! <em>&mdash;David Decker of deckerweb.de</em>', 'genesis-dashboard-news' ), '<a href="http://deckerweb.de/go/genesis/" target="_new" title="Genesis Framework ...">', '</a>', '<a href="http://genesisthemes.de/en/wp-plugins/genesis-dashboard-news/" target="_new">', '</a>' ) . '</p>';

	echo '<ul>' . 
			'<li>' . __( 'Subscribe to the Genesis News Planet', 'genesis-dashboard-news' ) . ': <a href="http://friendfeed.com/genesisnews" target="_blank" title="' . __( 'via FriendFeed service', 'genesis-dashboard-news' ) . '">' . __( 'via FriendFeed service', 'genesis-dashboard-news' ) . '</a> &ndash; <a href="http://friendfeed.com/genesisnews?format=atom" target="_blank" title="' . __( 'or via feed reader RSS/ATOM', 'genesis-dashboard-news' ) . '">' . __( 'or via feed reader RSS/ATOM', 'genesis-dashboard-news' ) . '</a></li>' .
			'<li><a href="http://wordpress.org/extend/plugins/genesis-dashboard-news/faq/" target="_blank" title="' . __( 'FAQ', 'genesis-dashboard-news' ) . '">' . __( 'How to change the RSS cache lifetime in WordPress which also effects this plugin\'s dashboard widget...', 'genesis-dashboard-news' ) . '</a></li>' .
			'<li><a href="http://genesisfinder.com/" target="_blank" title="GenesisFinder.com"><strong><em>GenesisFinder.com</em></strong> &ndash; ' . __( 'Find then Create. Your Genesis Framework Search Engine.', 'genesis-dashboard-news' ) . '</a></li>' .
		'</ul>';

	echo '<p><strong>' . __( 'Important plugin links:', 'genesis-dashboard-news' ) . '</strong>' . 
		'<br /><a href="' . esc_url_raw( GDBN_URL_PLUGIN ) . '" target="_new" title="' . __( 'Plugin website', 'genesis-dashboard-news' ) . '">' . __( 'Plugin website', 'genesis-dashboard-news' ) . '</a> | <a href="' . esc_url_raw( GDBN_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-dashboard-news' ) . '">' . __( 'FAQ', 'genesis-dashboard-news' ) . '</a> | <a href="' . esc_url_raw( GDBN_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-dashboard-news' ) . '">' . __( 'Support', 'genesis-dashboard-news' ) . '</a> | <a href="' . esc_url_raw( GDBN_URL_SNIPPETS ) . '" target="_new" title="' . __( 'Code Snippets for Customizing', 'genesis-dashboard-news' ) . '">' . __( 'Code Snippets', 'genesis-dashboard-news' ) . '</a> | <a href="' . esc_url_raw( GDBN_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-dashboard-news' ) . '">' . __( 'Translations', 'genesis-dashboard-news' ) . '</a> | <a href="' . esc_url_raw( GDBN_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-dashboard-news' ) . '">' . __( 'Donate', 'genesis-dashboard-news' ) . '</a></p>';

	echo '<p><a href="http://www.opensource.org/licenses/gpl-license.php" target="_new" title="' . esc_attr( GDBN_PLUGIN_LICENSE ). '">' . esc_attr( GDBN_PLUGIN_LICENSE ). '</a> &copy; 2011-' . date( 'Y' ) . ' <a href="' . esc_url_raw( ddw_gdbn_plugin_get_data( 'AuthorURI' ) ) . '" target="_new" title="' . esc_attr__( ddw_gdbn_plugin_get_data( 'Author' ) ) . '">' . esc_attr__( ddw_gdbn_plugin_get_data( 'Author' ) ) . '</a></p>';

}  // end of function ddw_gdbn_dashboard_help_content
