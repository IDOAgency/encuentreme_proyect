<?php

/*
  Plugin Name: Remove 'ADD NEW POST' (from non-admin users)
  Plugin URI: http://wordpress.org/extend/plugins/wp-restrict-user-add-new-post-capability/
  Description: This plugin will disable all non-admin users from creating new posts in your blog. The "add new" page submenu item will also be hidden in the user dashboard. 
  Version: 1.0.1
  Author: RS Publishing
 */

/*
  Copyright 2012  Rynaldo Stoltz  (email : rcstoltz@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

add_action('admin_init','capa_modif');
add_action('admin_menu','men_modif');
add_action('admin_head','hide_anb');
add_action('admin_menu','ap_redir');
add_action('admin_init','redir_noti');

function capa_modif() {
	$editor_role = get_role('editor');
	$editor_role -> remove_cap('publish_posts');
	$author_role = get_role('author');
	$author_role -> remove_cap('publish_posts');
}

function men_modif() {
 	global $submenu;  
     	$submenu['edit.php'][10][1] = 'publish_posts';
}

function hide_anb() {
  global $current_screen;
  
  if($current_screen->id == 'edit-post' && !current_user_can('publish_posts'))
  {
    echo '<style>.add-new-h2{display: none;}</style>';  
  }
}

function ap_redir() {
$result = stripos($_SERVER['REQUEST_URI'], 'post-new.php');
  if ($result!==false && !current_user_can('publish_posts'))  {
    wp_redirect(get_option('siteurl') . '/wp-admin/index.php?permissions_error=true');
	}
}

function permissions_admin_notice() {
  echo "<div id='permissions-warning' class='error fade'><p><strong>".__('You do not have permission to access that page.')."</strong></p></div>";
}

function redir_noti() {
  if($_GET['permissions_error'])
  {
    add_action('admin_notices', 'permissions_admin_notice');  
  }
}

?>