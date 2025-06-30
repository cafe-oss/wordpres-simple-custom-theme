<?php
define( 'WP_CACHE', false ); 
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', 'root' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '~&)C lUe`t.*M_$t*BOf{~lz7H[oa+sLUy2QnoloQt+LTa)kinh[:>|~u)6_2O@@' );
define( 'SECURE_AUTH_KEY',   '8/&A|@cN>Dt(VCrDtZa:p-AFuF{J{^cHZ@WX:0-w,1)h=pmb! qA3bfg(d|-IA/]' );
define( 'LOGGED_IN_KEY',     'az9!Ca#Q9ZbQ5*$:(P:@}a>G6~W?/;-@}cfr-eK[j.cmj|4>Y2JX|U[W]c`&|V<!' );
define( 'NONCE_KEY',         'j6gRxz3KNy01H#7?[2|KB/(OyX4[>72 fORm&Q^-%o9Ym5>Xk(~=me^,MHgVMrrK' );
define( 'AUTH_SALT',         'P2=UsR/hWA}ux:>yilAwu$DAnB dr4*o/p$;To,<4J<fR.+?QoswQJGniLxa*xTH' );
define( 'SECURE_AUTH_SALT',  '%XFq,V;nf39-x`VLZ(RaIKHyeBod1}$T&g,.{yS*Z3g@QOYd!MY<du1W7Ryy59=M' );
define( 'LOGGED_IN_SALT',    'bwgd_f b204Y3bNI1}-V9;}J#1+}[nAzggeS<{sFvu`&fCKXREz$AmUUGs_5{R]i' );
define( 'NONCE_SALT',        'uzs!oeKx{0C4bI+bVe*JB!eNqZ:E3h;,aNMz%J)OkYfl>XP(y}t508le}_mI*/h~' );
define( 'WP_CACHE_KEY_SALT', 'IK!y~yXr!nm1SFD)@[cOB2jaP|cm]ogo0jJOPPUXpZPlcPc%=l6/F*C>Os6Qf(!<' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/* Add any custom values between this line and the "stop editing" line. */
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true);
define( 'WP_DEBUG_LOG', true);
// @ini_set('display_errors', 1);
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';