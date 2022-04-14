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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_CAA_db' );

/** MySQL database username */
define( 'DB_USER', 'wp_CAA_user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp_CAA_pw' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1:8889' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'q.+*tT!(h{}$r%g]xdHu ;<ri-0>3K0ZR[S.m<(.Y5dq,^./ui`N&f{s094+/jj]' );
define( 'SECURE_AUTH_KEY',   'C?@m6uP0v~)y}#IvPQT^1@Em##q]VJm0vnt(_tjw|uT=jW},2tlrO~b2X,V7Up%/' );
define( 'LOGGED_IN_KEY',     'HU3nNp`/*3Lo5a!9AI*Q9HpJ}49<8)eAhGJN+Y}RE-4c#)Z}BF3%&46?MBSGiP1.' );
define( 'NONCE_KEY',         'eqMy~41dw4:6ORG.w&j_]EDeqOm-{n37w_Dc#B0oS6_]On2W1- E-8XJCb*<v~ 3' );
define( 'AUTH_SALT',         'b:~#>rMnl&dBnp-05C*n&Wb;[EO `fyVwW@H(K|9#]M/g4lj3*0ILNHlm1Ei*FzW' );
define( 'SECURE_AUTH_SALT',  'H4bpDt$o:R/IjB>bPzx(1O6>16-t!4fPPqFd0/uR7qpYR#x9ZCPbHbj7|&71|Oe9' );
define( 'LOGGED_IN_SALT',    'Bu.O,KScAbw4hy=%h.PqJH>&[HDF2nOoe+Z&Ubf3H^gTs:sk2Zmv~Xqk0DN%v>>q' );
define( 'NONCE_SALT',        'XQ>Di@!-;Q}DCRpf>Bs- @QK8B<i2%^Hy+.mq<q_f)~k0}lU%a8fG)q]`ILyvCTA' );
define( 'WP_CACHE_KEY_SALT', 'tkBn)~7Qv;SpMeI*g7Qc8rsb{b&y<.xG2;CM]uHq2tE=e.25[NYT28mFJgN,aGp:' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
