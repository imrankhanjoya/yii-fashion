<?PHP
/*se configuration for WordPress
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
define('AUTH_KEY',         'p&`%c1HLHL(bj9*r>&mYCEv`XU^?4}AuQ_#v/dIoR0?6PA-+d]cy>)<wf5kmT)`E');
define('SECURE_AUTH_KEY',  '[}F+Ar8Ct3*x6(8o$7e:/>t2fAV[^fw,w3|0cu=Tt]Nc!%Ia3Xh/Cm!mN,,}fA_`');
define('LOGGED_IN_KEY',    'a_RsVxXz1owBbNh/5l=Yj=U13WRy3^uKj4TdH]nnOtnf,FNc;HvKKin8nyWk=ULM');
define('NONCE_KEY',        'P=xFwHGP,UDm467_V_:p)Abh!;rp:@q2cdiT.kr8Wk:kB+c#L:~K|GQL.;BS6Xnz');
define('AUTH_SALT',        'sB:q6*pWLpRB($;pC bCAf!4G6M{AY-Oj(E?jxCCaBW*^0F])3Xp{Tv@F)j)yNlx');
define('SECURE_AUTH_SALT', '{7dI6F4N$7m*nb=YmDXD_$q_G{d49FSQ$4|u.jl5r|shI<!]>fwlwZn4O9lV8Q+k');
define('LOGGED_IN_SALT',   'k~s@<+0jB{+/PWWf7[&}kc28zs;N$Gv+.roV<TkuyxMqSrX~.aaYeQS2*z%%H|4*');
define('NONCE_SALT',       'pQDq&+-ubJSy@<m z$1;~_Ls>GX%XUe,Cq80D$t8}t!Y56x@kB!}?O1q<}yDc#a/');

/**#@-*/
define('WP_HOME','http://dis.deideo.com/');
define('WP_SITEURL','http://dis.deideo.com/');
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