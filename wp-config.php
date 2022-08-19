<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'element' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         ':~hJNa7c2<O;h,($id,7iz?&oy?i1A>$R2RyCj]|fxZjd`Tg%:HqvoF9=6bAuew<' );
define( 'SECURE_AUTH_KEY',  'dOPHXH&)8ymq@J^k>=V 6{O;0M.|0?2;K~vjf5biT!~7n6- /JQz<.g]6Hh._S2~' );
define( 'LOGGED_IN_KEY',    'HqkOc]Vh@]6_l<*zj/XuzglU1Q}{;IH6Gk=L-0CC4QHG=j+PAos$(KD;^i`$XrG7' );
define( 'NONCE_KEY',        'jOPzq(NZOT|=Tj?h61bfs]{Xx=5;|?TUR)#(Pm*GBR=F/BEtox`fn rdUD8$=h9(' );
define( 'AUTH_SALT',        ']=uxqiPX&NmN}jM(w:oI-Tlc@RtwA$`~_]w]`{+2pAGlA@e6>4/7bx|$A(3GvHCD' );
define( 'SECURE_AUTH_SALT', 'K[k&rX8k/s%:O*dpLq6y9_N]{  S?aZpLyCo_<?f,>6Pl}{d*Mg}8xn4a;x0<Mpr' );
define( 'LOGGED_IN_SALT',   'lGJq>b mC,}zLJXn<L|8DZRhy+7dedx:mnJX4%{[Fw1Fat35Q3B_);WuizP:uLX-' );
define( 'NONCE_SALT',       'F3|H8xnM!f@aed1k<e)My4z*ay16a0WRyyk4!|>uT3Uo~ZhTzcT_/_bTDs_yq_;@' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
