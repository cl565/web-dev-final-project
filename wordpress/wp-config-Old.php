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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         'cv(#<6UUej^2rd^gW@:JhtJB,mg-ioG<76gC2_|;W*Glt5~a`|B)DiNHD?.={pa<');
define('SECURE_AUTH_KEY',  'k1+O7sd*plh4rcgq,=-pF4Kt@<FMT]4M?y|b]V{J(GnFQ]D29&<NR8F);x.)X!aj');
define('LOGGED_IN_KEY',    '1n;rM+mpD_:y~%OY1OuDH|@7]8n+U5-O-nQ6hX=OImps|kc&T_0T1we8#Z|rX[8;');
define('NONCE_KEY',        'Ua;D,4%|,`IE+MCs`Li1@SNa4d-SJ<>8QX%6~Bo>I{ex|L%^V--%o!#yzx<,~B%!');
define('AUTH_SALT',        'gy_TMfWqi*1:7nULa[o|QgBxqat1N5A5IvFzE~RE393F*v1|a)}9HU;f6@#@#6n<');
define('SECURE_AUTH_SALT', 'v0|79}k2JMg.VeFJpgNDq5m`-| -R ;E%x43@h)Q&sQK dlJjv|8*$6z.jP6h3gU');
define('LOGGED_IN_SALT',   '1WA 5j0u0D}__2 $14]#&UWIe0tq3#B6;dRQeyk1T_< [4RD+Sx:X-r_;=2)#m2;');
define('NONCE_SALT',       'ZQC<G{:-4@0zB?*KVQFvN+tPGi1X:J*9m^e(ulhBNVXCP/(vwJp%/K]H?A;#aaxK');

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
