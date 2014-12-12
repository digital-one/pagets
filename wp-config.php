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
define('DB_NAME', 'pagets');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '>F.?cF.L04xu*-$gf4Rs<RAf%Ky&X93b+~*xkGI!_(B{4:ZPV4Yq{NI|:XK6^okV');
define('SECURE_AUTH_KEY',  '[~%A8i}T*7HCu]mb%!f(q26p}<-|[rU|Ale4Xg;0T38EVF0+Ew?*n?%7VHL-#SuN');
define('LOGGED_IN_KEY',    '2T-uNVoLrpra1!rQN!(6C*=N<fWe+:V/!iI2w55[g{!@fe3V,j_Xu(1r[$wGDj,0');
define('NONCE_KEY',        'yKkp43`+ig5430B3bRY07V`O{9H5gqN.XaxD%3Hl8Q&y2#9PX[}v-?UQ@S!:j,O4');
define('AUTH_SALT',        'CQ A$h+gzv9-fy*&>)+iiirij(9nzn|018~js?qr+JTeS#,0U)vx}?P-xHFajIMA');
define('SECURE_AUTH_SALT', 'P Ea`G(2~pFdv8y@Q#Wp:q1uLLYo$v&%O8K-]SZ(#w$q+I~@aqOz|A />1m%TQXJ');
define('LOGGED_IN_SALT',   'TW41m =O(k3cUahI .3A=g23vEQMMT|y x0l]wtJftVMw,6h*p7;Y&@*~itBNBzm');
define('NONCE_SALT',       'Z!KP:/gJ!dHHKB7s-7n`[^UYE|@Uc;?ayT&?FW!Z3K$rQOvZmObSGwb[K3XJ[^UZ');

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
