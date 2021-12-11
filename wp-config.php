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
define( 'DB_NAME', 'astrolune' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`t`RC{HqkusDU#~U>6Q(BGK=N7WxhBCf<{dt3oG.4G#Lom93V}ei&f[4]MOs`WGZ' );
define( 'SECURE_AUTH_KEY',  '?w{KSwR|(XKMn](M1LEnV6(0WX#O-H#>K(*0uHQI7VA]JG*Dk|?5{gu#+5P2^Qf.' );
define( 'LOGGED_IN_KEY',    'B<S&3J}BN~HQ3&W43Bb=C+Pp/L`n%CEc?%tGdUi_nvAvD[ucxzN7DzCu5,? ~aa}' );
define( 'NONCE_KEY',        '`656G%?V54Q(=e1RR=[hGau3#p~,nE7QAHr[M)/P:q#qRM)ta%MD}qYI@xDq7wgy' );
define( 'AUTH_SALT',        '#ot_tl*ch+;|,A&Q.ca9BkF-;!A$m_1Fr1H,_=3!:TU26 `QtNoij~eWTPVl/1&T' );
define( 'SECURE_AUTH_SALT', 'kBl~(*/0qgPBJ,K[`*/|FSh4D=.UHG[HPL?1pYBEnyevy?0;Xyd2#*yl+Q`(cWH=' );
define( 'LOGGED_IN_SALT',   '!v(]lGAh+3-XE;tL]*wUUtS~jeB4@*{Bp-oPnFCowws^PmrBrk!BZ{D^O[Uig7jI' );
define( 'NONCE_SALT',       '[9C#c)LBCZ7(aD[m5wT(aM`RKjF3MdV[^3w&a;^GaZw.x8J?M!FvugnX:k6LJj i' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
