<?php
define( 'WP_CACHE', true );


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
define( 'DB_NAME', 'developmenttes_kurtain' );

/** Database username */
define( 'DB_USER', 'developmenttes_blindtex2018admin' );

/** Database password */
define( 'DB_PASSWORD', 'blindtex2018admin' );

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
define( 'AUTH_KEY',         'Tk$=E-PgNDKPS2g9TaHW0jmMa> C680K48;qMA<MZr~0a_Je1 e=$:4ct7XcvnjR' );
define( 'SECURE_AUTH_KEY',  'on}ckWG=Zbui9Yr>ENx%GFAy;G0q,@9d2->y8&j[:-aWxx6oL7OS5IZ/ la4Z-<T' );
define( 'LOGGED_IN_KEY',    'kiY0r9371N3;hdsY.ak/jPhb#C3p@$0uIa!KLZpByOWsG1jXT$4QpRo&4!Q_r&}^' );
define( 'NONCE_KEY',        '8rw#A4PzY6*<F+SuDI}Yy4qj1$HFfn1QR >%nJ}Gl*qNlyR-J3ojfqTc.N*}K/|{' );
define( 'AUTH_SALT',        'ey]8t-z(u?J7ld{J?8`u;13X#i S),>Nn%mR<9HLDHgjRyWwp2U?Ls})[5cC@_rV' );
define( 'SECURE_AUTH_SALT', '^=VDlPG>(Xaey&%PS)MrR?w&ZStJ`]Y^ZlU?PcxtcIDn!1tkm&e1c,cjqQtlVV+M' );
define( 'LOGGED_IN_SALT',   'I05S/=C.h]1A|N&HIj}:]&fPnS_j?;i[7)Xd_@;s{Hy3LpBbdY{RHr~>zJf},QBx' );
define( 'NONCE_SALT',       'WTRyz=)>&(ES{f~ya)%1g}h?xZfN/js@>24M!i#DBj,MZyf<@~RUw!7&>v>TUuV9' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */


 define('WP_DEBUG', true);
 define('WP_DEBUG_LOG', true);
 define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
