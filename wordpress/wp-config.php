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
define( 'DB_NAME', 'wordpress_cms' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         ':ZYxlnF22EfmTM)J._Vb</LEFVC3t<]uZtvXyx@O=f!ki|[7Dt6a!)^Y1-[FP)2[' );
define( 'SECURE_AUTH_KEY',  'kfp_$N~]*#T-OX},*< B [:;J;==*1cWn}#c9oI6oICQ~&klhJcRKD;A-Xk7LRVA' );
define( 'LOGGED_IN_KEY',    '?<`:*`0Wz=^;Nz{}Q[JdwUY+wv-R:sQ@-p9l7q}iiO?f~>%WO&ThF0!lfDBzYh9C' );
define( 'NONCE_KEY',        '9,p^7;p.)zn@V>^!8EB, p8#Kcd_Z,~z/]<nWS!{/8:KKArAGKwMA5WK.Ov@qz(8' );
define( 'AUTH_SALT',        'F6!+X}H?cgHV!d?BU?7W(,_yB11>O_#L27Nq4u]F56# *cOBUAj!!]y<>C9f)P.}' );
define( 'SECURE_AUTH_SALT', 'LId59<4v?|%|2N0hvvXoLUGQKG9SAh$syXa[g20.mPKOBLa]>NNDG[gH/bOhY#q9' );
define( 'LOGGED_IN_SALT',   '0/Q(>T~fFitqv9=K?T4WAb);S(he%&m5@X jp>Ev4IkO)(%dzSJak@j&rd4l16AK' );
define( 'NONCE_SALT',       '@I=i)!8ZGt!VxGQO^6EG3YNX|w>h+m$sEKxk6h%u-9*=V*A`?1,?qgih[a7so-N*' );

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
