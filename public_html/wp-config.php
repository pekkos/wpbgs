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
define('DB_NAME', '151987-wordpress-wd53402');

/** MySQL database username */
define('DB_USER', '151987_wd53402');

/** MySQL database password */
define('DB_PASSWORD', 'vl3680UY');

/** MySQL hostname */
define('DB_HOST', 'wordpress-wd53402-151987.mysql.binero.se');

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
define('AUTH_KEY',         'eQL13QAjZVfva5tFT9kHFm68J15NB8SqB6cfJy9dnL8Isilhs7Y6hTUyNrux16Jh');
define('SECURE_AUTH_KEY',  'PmAOhDxV4iN1P85rovWjD4VGaUHEQkfA27Y2gnvqk4JwwoZsdYTVQLuBJGR0MR4k');
define('LOGGED_IN_KEY',    'iP26qOnOJdBfaxRw2ihzWivBGeYnJlcReqRCYH5mAuAybtjfJgVcAB0jSqKZYfpz');
define('NONCE_KEY',        '9YuIysmamNbFQr84KpqX8LVb76KtoD7HoYsN4LIft2WjySBQjx5FIip04AwE6xEC');
define('AUTH_SALT',        'r96EeAvTTL0pKgOSxOhTYWtSbPFV7q2jGguNSRtHPYR9E3WF6IQFrDCeyAmBkLUy');
define('SECURE_AUTH_SALT', '5tG8HvcWwc8AnyjKmIqdTWQXhUQcP8CRhqEq4jDrACsVIHjWTDwz0Fwm1Ntmt7rF');
define('LOGGED_IN_SALT',   'eMUyHvYUd10gMRIqSuf6Xb4it1iMezkjS04ku9KEgzybrVFcsegYzmdbahmOsUxO');
define('NONCE_SALT',       'TWtr46BjBUhXoTRcnkw60zEGHxatctnmEgdXGUWApVzRbZxdK9WtxjAUJeBIR7WM');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
define('WPLANG', 'sv_SE');

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
