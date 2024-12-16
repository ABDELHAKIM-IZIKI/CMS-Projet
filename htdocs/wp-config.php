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
define( 'DB_HOST', '127.0.0.1:3306' );

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
define( 'AUTH_KEY',         'zmWws%zd/|Fj4z]bWcz u)IRE(f qbu&;sww0kN$w#BoEGKxA>sHfXfxa/jr/!XO' );
define( 'SECURE_AUTH_KEY',  '5pzK}9hPlFG~@]Dbc7``]J$LlbMf]>m;[w8M~{azJd6[PZ::9}JSp#X)iWQ&>{9b' );
define( 'LOGGED_IN_KEY',    '=nR|<{iJ~C}<^qRCB6IbJ%{JJui/[os}Ff&`aUpny9e>tGu5&p-d*a)Ll-3kIff)' );
define( 'NONCE_KEY',        'E5%ZRXDGH3J[Zf:/`S!rsv_[;{8D:((kKK-c?(8]XjAV({8_w>Ie[k8fo^z;<4lu' );
define( 'AUTH_SALT',        'OYm$n<mDE5V Tn=n7#(%K;F`x^|{:^1TboSb2h?;ZqHrxgyyMz/ShXm2cWF*6d:q' );
define( 'SECURE_AUTH_SALT', 'T-svnd3+rd(HqQhInIsY<7D|SNTWc[Rw_tNUJxP#u&rO>- +k~*1l{2>oJI=?SdP' );
define( 'LOGGED_IN_SALT',   '0Hd=wBK.C-HFHBnY4}K),/1nq[yHLQ-I1-)~`_h^4UA#)fh(i`9_c/>GF|->AYp:' );
define( 'NONCE_SALT',       '*ztcub)yy^}EPGkx<y)?BQWbQijeiN}t@PE~E5Q%EA8b@fA(?Ec:&M@.bpSG7|P8' );

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
