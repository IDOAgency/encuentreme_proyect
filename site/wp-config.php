<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home2/ivagueba/public_html/encuentreme/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'ivagueba_wrdp14');

/** MySQL database username */
define('DB_USER', 'ivagueba_wrdp14');

/** MySQL database password */
define('DB_PASSWORD', 'Q9u4Gw9LLgjcnQ');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|HuNOpXffUckg#o\`;Q6N8nfizvf$Ruq|jRpAHwf/z1bx\`fB_c_Rb\`I_Y7#t9(');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '1/J~Gn|hfmL4BL7p6aNibf>n)x3K>afcWhT37BCJEQR*ptV!?VUm_Z@am_7wKJ_WVgP!');
define('NONCE_KEY',        'C(?qtn<~YQGHezon4ZXS#b6=X7tBE$h:2HNhP>TEb_sMBCoj79KP');
define('AUTH_SALT',        '29p#YI3_b90Z~u;Q:3LmB9RuNwspv<!~C)k!?3V*)mbuep5E5@9ybGcIbw;ud_gg^rBR?rK0e');
define('SECURE_AUTH_SALT', '$QLT~Yr=RV9dl*;kM0s>@x3Dj6<c)35r>8wPa#C*-YcSnyZN6h~woy@W!Y9VP|dCQ_~R80bw(95Il8lytxiL');
define('LOGGED_IN_SALT',   '8~tTa\`G:<lthS*?rRN95_\`Z>(S_7G3T~)SvqQ$wjavDNi1BNX5C4EHM0^LJmB5IwuxEHZw');
define('NONCE_SALT',       '8r_~wUdOvY/7/d4gb$jp)3PV@sXS:PZy$C9I^f<zi-7f3y1fQz7_:q_Ili;m_v93fF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
