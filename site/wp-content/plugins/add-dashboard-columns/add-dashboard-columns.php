<?php
/*
Plugin Name: Add Dashboard Columns
Plugin URI: http://wordpress.org/plugins/add-dashboard-columns/
Description: Enable Dashboard Columns in WordPress after version 3.8
Author: Sergio P.A. ( 23r9i0 )
Version: 0.2.1
Author URI: http://dsergio.com/
*/
/*  Copyright 2014  Sergio Prieto Alvarez  ( email : info@dsergio.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General License as published by
    the Free Software Foundation; either version 2 of the License, or
    ( at your option ) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General License for more details.

    You should have received a copy of the GNU General License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_head-index.php', 'add_dashboard_columns' );	
function add_dashboard_columns() {
    add_screen_option( 'layout_columns', array( 'max' => 4, 'default' => 3 ) );
}
add_action( 'admin_enqueue_scripts', 'add_dashboard_columns_style' );
function add_dashboard_columns_style( $hook ) {
	if ( 'index.php' != $hook ) return;
	$dev = ( defined( 'DSWPDEV' ) && ( false !== DSWPDEV ) ) ? '' : '.min';
	wp_register_style( 'add-dashboard-columns', plugins_url( 'assets/css/add-dashboard-columns' . $dev . '.css', __FILE__ ), false, '0.2' );
	wp_enqueue_style( 'add-dashboard-columns' );
}
