<?php
/**
 * Helper functions for the admin - plugin links.
 *
 * @package    Genesis Dashboard News
 * @subpackage Admin
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2011-2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-dashboard-news/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.0.0
 */

/**
 * Setting internal plugin helper links constants.
 *
 * @since 1.6.0
 */
define( 'GDBN_URL_TRANSLATE',		'http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-dashboard-news' );
define( 'GDBN_URL_WPORG_FAQ',		'http://wordpress.org/extend/plugins/genesis-dashboard-news/faq/' );
define( 'GDBN_URL_WPORG_FORUM',		'http://wordpress.org/support/plugin/genesis-dashboard-news' );
define( 'GDBN_URL_WPORG_PROFILE',	'http://profiles.wordpress.org/daveshine/' );
define( 'GDBN_URL_SNIPPETS',		'https://gist.github.com/2597190' );
define( 'GDBN_PLUGIN_LICENSE', 		'GPLv2+' );
if ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) {
	define( 'GDBN_URL_DONATE', 	'http://genesisthemes.de/spenden/' );
	define( 'GDBN_URL_PLUGIN',	'http://genesisthemes.de/plugins/genesis-dashboard-news/' );
} else {
	define( 'GDBN_URL_DONATE', 	'http://genesisthemes.de/en/donate/' );
	define( 'GDBN_URL_PLUGIN',	'http://genesisthemes.de/en/wp-plugins/genesis-dashboard-news/' );
}


/**
 * Add "Dashboard" link to plugin page.
 *
 * @since 1.5.0
 *
 * @param  $gdbn_links
 * @param  $gdbn_dashboard_link
 * @return strings Dashboard link
 */
function ddw_gdbn_dashboard_link( $gdbn_links ) {

	$gdbn_dashboard_link = sprintf( '<a href="%s" title="%s">%s</a>' , admin_url( 'index.php#genesisnews_dashboard_feed' ) , __( 'Go to the Dashboard page', 'genesis-dashboard-news' ) , __( 'Dashboard', 'genesis-dashboard-news' ) );
	
	array_unshift( $gdbn_links, $gdbn_dashboard_link );

	return $gdbn_links;

}  // end of function ddw_gdbn_dashboard_link


add_filter( 'plugin_row_meta', 'ddw_gdbn_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page.
 *
 * @since 1.5.0
 *
 * @param  $gdbn_links
 * @param  $gdbn_file
 * @return strings plugin links
 */
function ddw_gdbn_plugin_links( $gdbn_links, $gdbn_file ) {

	/** Capability Check */
	if ( ! current_user_can( 'install_plugins' ) ) {
		return $gdbn_links;
	}

	/** Add additional plugin links */
	if ( $gdbn_file == GDBN_PLUGIN_BASEDIR . '/genesis-dashboard-news.php' ) {

		$gdbn_links[] = '<a href="' . esc_url_raw( GDBN_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-dashboard-news' ) . '">' . __( 'FAQ', 'genesis-dashboard-news' ) . '</a>';
		$gdbn_links[] = '<a href="' . esc_url_raw( GDBN_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-dashboard-news' ) . '">' . __( 'Support', 'genesis-dashboard-news' ) . '</a>';
		$gdbn_links[] = '<a href="' . esc_url_raw( GDBN_URL_SNIPPETS ) . '" target="_new" title="' . __( 'Code Snippets for Customizing', 'genesis-dashboard-news' ) . '">' . __( 'Code Snippets', 'genesis-dashboard-news' ) . '</a>';
		$gdbn_links[] = '<a href="' . esc_url_raw( GDBN_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-dashboard-news' ) . '">' . __( 'Translations', 'genesis-dashboard-news' ) . '</a>';
		$gdbn_links[] = '<a href="' . esc_url_raw( GDBN_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-dashboard-news' ) . '">' . __( 'Donate', 'genesis-dashboard-news' ) . '</a>';

	}  // end-if plugin links

	/** Output the links */
	return $gdbn_links;

}  // end of function ddw_gdbn_plugin_links
