<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp-lwhh');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '1},wl3b?bG7<xEIe;U-0^aBY)~m3feMKr2lqGL>`{]_]I&k7oNG+W2d7h iT(Vxu');
define('SECURE_AUTH_KEY',  'kWD:(F1BRt.ZU_#J} j(AA:X@e&Xq|oU_D|j977n[E!|PuQ0Gf]a|&f6cXl%)h-k');
define('LOGGED_IN_KEY',    'YO~?}NsV}zdt}-F-KpF5<fhywFBQ}sM`$cDV~,k#lP<r@r^I7Ny+3IsFNgg=5QF|');
define('NONCE_KEY',        ')UG>P&(t?UCw?Sl#xj-r};K,RFVPE9-j:=zOMd#nuARg),{AsG~3|`!t+Oc7,I}}');
define('AUTH_SALT',        'Ak^=nIo@-f~Se5>*8*S%}=%Y>moJ]V!DFm,wR0n17mCM?%-Tq5PR]7kLF9:GoMD ');
define('SECURE_AUTH_SALT', ',7H` OZK_iR-{f1m(&2_dV<sd(ZAU/{-(i+&JtatRvTHu@AEDo3K;L9]01Li:E:6');
define('LOGGED_IN_SALT',   '8,Apb?Ez*O;I&:2:,^1=jASdsp:F#!}r[V%L<jBmc QlBpze$TzPqoZ9Rub!K#}y');
define('NONCE_SALT',       'rOe`i8fuZS^T^JkY#WF,*. ^tUflsVaVP@G8[*kodeY;6^t0a`k^U0 /-=G:TlZ?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';
define('ACF_EARLY_ACCESS', '5');

define('FS_METHOD', 'direct');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
