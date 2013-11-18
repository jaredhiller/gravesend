<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gravesend');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8888');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'J%B30OqM f]5>)9`,hU6u5y:M/+A<^G |~|WJIazE}W(}3F=K.|5o;z[+Un!83i1');
define('SECURE_AUTH_KEY',  'iI)u:d^:I?|w$+xCgxB!} I@V9e2I-UgFdO!N1Z4`qzh-MOIt`Ghf~nF0^(&vOMF');
define('LOGGED_IN_KEY',    '@1T Y:W)~|m4U.%RY~xCh!_:OM<o[.YWKdOq%:uWFXuH-iTmb5B>o *cF-It5}7w');
define('NONCE_KEY',        '&[y[u)_.s[oPBQIe[_SQdA`p5dM$20rV@#dw|XraHY_=@H3BRiq,jpU%vg}8X?0B');
define('AUTH_SALT',        '0{$O`Xgy[!z7&?W)K)n&W.p<zH{.?nnZ9&eVNw3:QX`lM+G%u0pee[z&bUp+.9}E');
define('SECURE_AUTH_SALT', '|fLY*OY.|Nj<}/QLIi+ :E/Vn%@^a*EN89nC/uuB6`>%62T{~E3y^*clcp&v1so1');
define('LOGGED_IN_SALT',   'M]O,NyRO|d2&dIL~PeeXo`>zFevQ .9<o-ITTu!CXY%|=)#K@r]i%&(T(~ :?OoK');
define('NONCE_SALT',       'SVtfN[d8X}iVr1`<4jE(ZHWcphO2N|[DH+-:Gen5*0&9/1bn{--l-a[TuO]S;J&Q');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// Heroku Postgres settings
if (isset($_ENV["DATABASE_URL"])) 
{
    $db = parse_url($_ENV["DATABASE_URL"]);
    define('DB_NAME', trim($db["path"],"/"));
    define('DB_USER', $db["user"]);
    define('DB_PASSWORD', $db["pass"]);
    define('DB_HOST', $db["host"]);
} 
else 
{
    die("Can't determine database settings from DATABASE_URL\n");
}
