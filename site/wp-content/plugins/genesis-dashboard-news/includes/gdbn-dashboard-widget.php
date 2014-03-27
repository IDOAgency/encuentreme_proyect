<?php
/**
 * Dashboard widget functions for the admin.
 *
 * @package    Genesis Dashboard News
 * @subpackage Dashboard Widget
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright 2011-2012, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-dashboard-news/
 * @link       http://twitter.com/deckerweb
 *
 * @since 1.0.0
 */

/**
 * Creates the Genesis News dashboard feed box.
 * Adds extra line below feed box with RSS and other plugin related links.
 * 
 * @since 1.0.0
 *
 * @global mixed $gdbn_widget_title
 *
 * @param $widget_options
 * @param $gdbn_feed_source
 */
function ddw_gdbn_dashboard_output() {

	global $gdbn_widget_title;

	/** Get number of items */
	$widget_options = ddw_gdbn_dashboard_options();

	/** Loading Genesis News Planet feed - allows custom filtering */
	$gdbn_feed_source_url = apply_filters( 'gdbn_filter_feed_source_url', 'http://friendfeed.com/genesisnews?format=atom' );

	/** Set Dashboard widget parameters, plus the widget markup */
	echo '<div id="genesisnews-rss-widget" class="rss-widget">';
		wp_widget_rss_output( array(
			'url'          => esc_url( $gdbn_feed_source_url ),	// allows for custom filtering
			'title'        => esc_attr__( $gdbn_widget_title ),	// allows for custom filtering
			'meta'         => array( 'target' => '_blank' ),
			'items'        => $widget_options['posts_number'],
            		'show_summary' => 0,	// 0 = false and 1 = true
            		'show_author'  => 0,	// 0 = false and 1 = true
           		'show_date'    => 1	// 0 = false and 1 = true
		) );

	$gdbn_widget_footer_info =
		'<div class="gdbn-footer-info" style="border-top: 1px solid #ddd; padding-top: 10px !important; font-size: 11px;">' .

		'<a href="http://friendfeed.com/genesisnews?format=atom" target="_new" title="' . __( 'RSS/Atom Feed Genesis News Planet', 'genesis-dashboard-news' ) . '"><img style="vertical-align: middle; margin-bottom: 2px;" src="/wp-includes/images/rss.png" width="11" height="11" alt="' . __( 'RSS/Atom Feed Genesis News Planet', 'genesis-dashboard-news' ) . '" title="' . __( 'RSS/Atom Feed Genesis News Planet', 'genesis-dashboard-news' ) . '" /> '. __( 'RSS Feed', 'genesis-dashboard-news' ) . '</a> | ' .

		'<a href="http://genesisfinder.com/" target="_new" title="GenesisFinder.com &ndash; ' . __( 'Find then Create. Your Genesis Framework Search Engine.', 'genesis-dashboard-news' ) . '"><strong>GenesisFinder</strong></a> | ' .

		'<a href="' . __( 'http://genesisthemes.de/en/wp-plugins/', 'genesis-dashboard-news' ) . '" target="_new" title="' . __( 'Genesis &amp; WordPress Plugins', 'genesis-dashboard-news' ) . ' ...">' . __( 'Genesis Plugins', 'genesis-dashboard-news' ) . '</a> | ' .

		'<a href="' . __( 'http://genesisthemes.de/en/genesis-child-themes/', 'genesis-dashboard-news' ) . '" targe="_new" title="' . __( 'Free &amp; Premium Child Themes for Genesis Framework', 'genesis-dashboard-news' ) . ' ...">' . __( 'Genesis Themes', 'genesis-dashboard-news' ) . '</a>' .

 		'</div><!-- custom styling -->';

	echo apply_filters( 'gdbn_filter_widget_footer_info', $gdbn_widget_footer_info );

	echo '</div><!-- .rss-widget #genesisnews-rss-widget -->';

}  // end of function ddw_gdbn_dashboard_output


/**
 * Function used in the dashboard action hook.
 * 
 * @since 1.0.0
 *
 * @global mixed $gdbn_filter_capability, $gdbn_widget_title
 */
function ddw_gdbn_add_dashboard_widgets() {
	
	global $gdbn_filter_capability, $gdbn_widget_title;

	/** Set filter for Dashboard widget title */
	$gdbn_widget_title = apply_filters( 'gdbn_filter_widget_title', __( 'Genesis News Planet', 'genesis-dashboard-news' ) );

	/**
	 * Set filter for registering the whole Dashboard widget.
	 *    Default capability: 'read'
	 */
	$gdbn_filter_capability = apply_filters( 'gdbn_filter_capability_all', 'read' );

	/** Register the Dashboard widget */
	if ( current_user_can( $gdbn_filter_capability ) ) {

		wp_add_dashboard_widget( 'genesisnews_dashboard_feed', esc_attr__( $gdbn_widget_title ), 'ddw_gdbn_dashboard_output', 'ddw_gdbn_dashboard_setup' );

	}  // end-if cap check

}  // end of function ddw_gdbn_add_dashboard_widgets


/**
 * Setting default dashboard option.
 * 
 * @since 1.0.0
 *
 * @param $options
 * @param $defaults
 */
function ddw_gdbn_dashboard_options() {
	
	$defaults = array( 'posts_number' => 5 );  // Default number of feed items

	if ( ( ! $options = get_option( 'genesisnews_dashboard_feed' ) ) || ! is_array( $options ) ) {
		$options = array();
	}

	return array_merge( $defaults, $options );

}  // end of function ddw_gdbn_dashboard_options


/**
 * Dashboard setup, setting option functionality.
 * 
 * @since 1.0.0
 *
 * @param $options
 */
function ddw_gdbn_dashboard_setup() {
 
	/** Get number of items */
	$options = ddw_gdbn_dashboard_options();
 
	/** Logic for option setting */
	if ( 'post' == strtolower( $_SERVER['REQUEST_METHOD'] ) && isset( $_POST['widget_id'] ) && 'genesisnews_dashboard_feed' == $_POST['widget_id'] ) {

		foreach ( array( 'posts_number' ) as $key ) {
				$options[$key] = $_POST[$key];
		}  // end-for

		update_option( 'genesisnews_dashboard_feed', $options );

	}  // end-if
 
	/** Markup for widget configuring */
	echo '<p><label for="posts_number">' . __( 'How many items would you like to display?', 'genesis-dashboard-news' ) .
		'<select id="posts_number" name="posts_number">';
			for ( $i = 3; $i <= 20; $i = $i + 1 ) {
				echo '<option value="' . $i . '"' . ( $options['posts_number'] == $i ? ' selected="selected"' : '""' ) . '>' . $i . '</option>';
			}  // end-for
	echo '</select></label></p>';

}  // end of function ddw_gdbn_dashboard_setup
