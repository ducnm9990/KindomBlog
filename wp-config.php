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
define('DB_NAME', 'wp_kindom');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'oeisdabest');

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
define('AUTH_KEY',         'B*R=JQ8S~nOwm,s 2.5QX#_N&<q|4*R],[fzM7L-_L9$dHYau{Z<W{,trc9;lAhy');
define('SECURE_AUTH_KEY',  '}pcRAB^S6c[Q/ZvUH%?,@<]mIIi2RCKr/B(}4iZ&Z]0]]J1,sd7cfc6#T9x`QGyT');
define('LOGGED_IN_KEY',    '_fRKc&4UdD>A~`$Z2Vaw0y^##{ieT-Oq,,_n^]o+m1AOxzmTZ/Fo>`VUJHyGE6%S');
define('NONCE_KEY',        ';[QJX1XtMELpKMbNKVD9FOSsr.n5O`Mk!ynHDRng^2o0%`81j*wb0M{zV%vEKX4r');
define('AUTH_SALT',        '>Lz:,.SD3>mim,y`<&_lsBaAukp^XCJ$OmGxZH6o2I2mxqx(EM4fNQm]g-GEVs}R');
define('SECURE_AUTH_SALT', 'e`:XtVw l/z0x}k<h.sB%jU+SFyLv:ApN1a(@[uc4=:63<dS/s33Ioou}AbuC&.!');
define('LOGGED_IN_SALT',   '4(03CT3{R1I-WIV3a5hs/;O*Ge#Ml[.YI{j.g_QQ-^FeYnw_]r]t2mX0Zm<#dR4-');
define('NONCE_SALT',       'c|0tOuW[oL7q,<dtlGorld+5Y@f>Sa:z(5Me~HOxL%t!<P5^!Dv^vS/0m7#>zP^/');

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
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');