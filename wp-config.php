
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
define('DB_NAME', 'gloatme');

/** MySQL database username */
define('DB_USER', 'root');


/** MySQL database password */
define('DB_PASSWORD', '12345');


/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'w(1Xug|uMUQ3sj<}?iwd;E@s7F6=(HK,{M(u-t`WT7M1[VZrt|6b5IioN#f ]rSa');
define('SECURE_AUTH_KEY',  'U#ZM;;~8E<z[t:Y(9Gz&DyM]Mx!nA=m2$$a+l5N[hl .-`nA)xp]+4R^8`MWh$Ev');
define('LOGGED_IN_KEY',    '9|`CE.DE:Z@XKVB}vup,8djq&Z@K*LL*SnCIa; JVO^ZNDA~U$I1Y@8c)L)`D-g?');
define('NONCE_KEY',        '$@0gTr%`=ZsDBT]tJ4gD=@Q?BwM(Q~U6ES@X%U1xTN:]vLm@flFnlmdHa!},LtPs');
define('AUTH_SALT',        '?u5ta{Zg8N{}YVGpg|S,i,MFws9v? OJ3Q*~!Y`EBk=B yi|W^(E:|[ icfw1HIO');
define('SECURE_AUTH_SALT', 'lq]P&++}[ZHcO5Zsm64HRWTQt7j:8{UVH}CA`K6@~T:|[u{<^_y5zZpLt_V1zZKx');
define('LOGGED_IN_SALT',   'Hb&KYbP6HBHsac6q`}BM4tE)<k.~Q$0>(m#*}BPn4)[:PkI}5CY$9>5oC[[u5}k*');
define('NONCE_SALT',       'OZpxMHq$GcxS{vB`!@ng5f&< s|e~/NS|LoKkh!3tL sj,c%,<Rdyx([jmi#[aFo');

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
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY',false);
define('SAVEQUERIES', true);



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');