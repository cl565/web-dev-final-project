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
define('DB_NAME', 'webdevclasstest');

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
define('AUTH_KEY',         'Jr]XAD--^IhwUE96i>vgZIV*xA_*p;xq<S,fi/a(-T-ZG2Wj|cgGs>P`O:Ii9Zxx');
define('SECURE_AUTH_KEY',  'Fjwb3ej8<]79DYlWwdr4dTJs0s>n7-FlL)9Yl~g#KwaVg5`0E#k|,$~n,AMLO`rc');
define('LOGGED_IN_KEY',    'nuav29+[<o-B1LlInyo:)H*Ebt|,THn|fusL3+r2]mSG{O^dk%srGJ%FkJT#9I%=');
define('NONCE_KEY',        'cW0aP;r>H?8!0RZkg@i:G0C8Ah~m.deE)*@kADftl4>z&XjiyL$X_n1%pGcTB-?m');
define('AUTH_SALT',        'CGALXcxYjEU4Y$5sh[wQ>=LJTnis,.QS^D:CQI+_dBlB=`^i~M1}@?ke+=3)8e=I');
define('SECURE_AUTH_SALT', 'vWbzxu{m5ONt&xBP|u|qZ@*6Fp+*s~1yj?Vc3HcK o$H3~@I_ZX_w9_[z.F9)8I4');
define('LOGGED_IN_SALT',   'klU{)-znlVfvmfe5^Bk2B?T.M]yq*Rq[R>S6f~P)w7Xc--1Eh}Nn+-2-MkTU#.)r');
define('NONCE_SALT',       '-+,DSeO@DWez}_31ee!PWNOMQt9V!C+^@#*pzKE^+54Qk:[`MlW;]AsMUU-}B?W.');

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
