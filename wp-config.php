<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mystore' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3308' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '|&`^UHH9Nj9Om> q1gL#LT[i/6kC2.N7wxao8UTheTN5P%wZEL}A}J%%O(F],&Nl' );
define( 'SECURE_AUTH_KEY',  'LjY[L-,[Ex_|;Hzto6OLnX7K1G7ji K+l8gPw|]=1b/bs`)B+NV;-cJ8c`rK<pDv' );
define( 'LOGGED_IN_KEY',    '2aLyA9:w!Bd5&UU!)Ry>6RLyppr%q9ugW}]SaNu /m>B(flpb#$/.`H#<Q~DS)j|' );
define( 'NONCE_KEY',        'ynlEB[g9zb5#(:]fhFox4AdP@A)e:w6A0id5zeb5nY8IRrziKh`lN!|ga9;TAQ8*' );
define( 'AUTH_SALT',        'C$]W{TP5qx+DX8ZJRjc<s `65`H-^{~P]0o?W|M+aw6--~%/nd<}^X8o`[n)i_a_' );
define( 'SECURE_AUTH_SALT', '<>syYJ-F@*ogSdTm ?@Mve -rkIF:I]8GJbIzqRMpUd+y8WokOE*5flkaO<Mq(#B' );
define( 'LOGGED_IN_SALT',   'B O$[BW6JK?a,QptZ`WvU([pu LX=68xVA?2z0-ud<7KYrz@%v?jFrWT(AbR-bhN' );
define( 'NONCE_SALT',       '63|JB 7A6N2Bzx(CQ-l f*g])qs-,exc[}sq4HVvxhWtR&=uXy,I1mH/9h*9iM`B' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
