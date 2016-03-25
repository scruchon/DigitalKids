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
define('DB_NAME', 'mucm_digitalkids');

/** MySQL database username */
define('DB_USER', 'mucm_egle');

/** MySQL database password */
define('DB_PASSWORD', '123DigitalKids');

/** MySQL hostname */
define('DB_HOST', 'mucm.myd.infomaniak.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bX>+r.fnG^/.+j-&@4HLS(O8|=3[,C52KEh-(&@5{0;u4yh-|DGh>O)j<W[RPz$3');
define('SECURE_AUTH_KEY',  'sswN#95RXL-ylzMq?7PNlP1B4-<y?<M5)vA9>wQn*uH)66<5nNN+.lt%(,Me}1`z');
define('LOGGED_IN_KEY',    '`Cl7PTvhprPQ^Ti5^Qyzn-_X$*VTQPHsiz@+!(2a%r^r6=Xn;#|y2)}Q7bkrC|O+');
define('NONCE_KEY',        'Na|L]A6(&lpTbA-/{8nky{(VoB.Lo B`L~o}eok`!E@c?A1+g*ZzGc;R[BJ2[Fpy');
define('AUTH_SALT',        'h,S[7(:xhXr6KVqYi?/Ytg 2rGDTCB1=?3v3k7cm-U`w5muS|:dtg7XQMP2L[UD_');
define('SECURE_AUTH_SALT', 'mXP`Utp=}|i%e3/t}5z3q6)kke.5;5Wk m+%834-QJj[!q17>+u|[tWZ#}FM]=K|');
define('LOGGED_IN_SALT',   '>b51U5PMGBbp1rGcAZ;$@--&)@E]tVz+q~**T]bH*^H+*vlRoiE}nRY+EV+)ZST3');
define('NONCE_SALT',       'n|fmx+3&#:r&) My.E+v)Y;v6V`vPoli-Aau+I1]F,BjYZ:Q3 lxM]:!*tH-p}|2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
