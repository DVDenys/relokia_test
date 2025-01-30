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
define( 'DB_NAME', 'relokia' );

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
// define( 'WP_HOME', 'http://relokia.zzz.com.ua' );
// define( 'WP_SITEURL', 'http://relokia.zzz.com.ua' );

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
define( 'AUTH_KEY',         'd5j^SnG>t}^ik C|IuTy=9HG(H2jMlim+=)gF5.t.rL{L4 3R& k)`1X@j,Xr0:[' );
define( 'SECURE_AUTH_KEY',  '*P!?Wl$j84Ez[^H.q/_#L5{d-tnJ_+ ~N!_B;i6KTX^CF=)x+u2YWL.{U`DWfBq3' );
define( 'LOGGED_IN_KEY',    ';p_m4S<+9++HO$E*kb=}r-(D21z?_? 4Wj^Jgn?ivRkjmq4K]3[6,PmRg.H%fI(v' );
define( 'NONCE_KEY',        'ZFbxz<$7.@u28u1t^88}g#o]jFdi*2gR6#E&S_Vq(l?iMrdNMHY;n=;yz2$6}A=4' );
define( 'AUTH_SALT',        '}L>_Z+o6v(;)mn!MsG}p,pHN)vx{85i#:^8zDG&T}-  lnd(1.U[H{,$,Ne}9Dqn' );
define( 'SECURE_AUTH_SALT', '.OjK$b(Cb*1NZwQ&a^ZTf$Nxi9j8S`A a*[XsUI-w_0dyUX*}=8JRr&5w%@#.j -' );
define( 'LOGGED_IN_SALT',   'qd(#/On9jZk:,e&]V?29@1]c ysT&=)W8w5T;lp=Gba4HSTxM2NJ9UeoWB-$Yzh?' );
define( 'NONCE_SALT',       'MyPl6utL)PMs)?LSv%GwAiWfBHC*$fdY*pjjsie?yS(I+(>Ia9M<(f1a([x92ozb' );

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
