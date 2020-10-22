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
define( 'DB_NAME', 'store' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'n-?C[{0T@S sQD?PfjD{Fn^|O:)W{2|72.B.8h%R%{=9bHF<RjZo[d?nAP(8:>)<' );
define( 'SECURE_AUTH_KEY',  'Vhh0JSE=<XIvny%q 3qoHNo5EtcvQu251%_}W0IJ=qM4B_l^~YadF;DPd;SfQ[&[' );
define( 'LOGGED_IN_KEY',    'i!;&7YB1~iA]Q&Osn[!Qj5F}ArzywG|4QbS!atAc1>x2+M->m^C8Tc6ck$fXTZlF' );
define( 'NONCE_KEY',        ':$Gxb[#yJ9SR/rxW?z<MZOfh}N8;Q;:X*F$sEZ5D/w#S1Hu8%`wWEm3g{wrW=luC' );
define( 'AUTH_SALT',        '=ti%~,:2cIInjRI]-napbzrH]mT?ToJLn -J)jD_<eObJz=EBAMJz~/r[ojG$:Yz' );
define( 'SECURE_AUTH_SALT', '~Ln_-T;}k8[ 3i!X=#G4;h@Ru*GB4[Cbe6YZ)SL^{Jv<rO7$b]/E|PF`uebpdJZ2' );
define( 'LOGGED_IN_SALT',   'z6:d<W`Z?!H)R=@{V#-z6n43+no*S3euN(phhV_U~<q;E-b!2%GnIUb@`Td+T,9+' );
define( 'NONCE_SALT',       'rQFPN;AVkLfp}2e`g3*0H.,xg`W_lVmZ^owiVTWdRY=H0eJ$B?ZiljC* ,}[iu@o' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
// define('RELOCATE', true);
define('WP_HOME','http://engzny.net/');
define('WP_SITEURL','http://engzny.net/');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
