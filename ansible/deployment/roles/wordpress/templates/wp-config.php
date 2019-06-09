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
define( 'WPCACHEHOME', '/srv/wordpress/wp-content/plugins/wp-super-cache/' );
define('WP_CACHE', true);
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

/** MySQL hostname */
define('DB_HOST', 'database');

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

/* Salt is hardcoded to avoid cluster member desync */
define('AUTH_KEY',         'iYpSUXc80j<#/j&[6I42{DC-rK;3{`>|0Wo=2FX<sUkh[[Iw}-[.,@p|GAhgYPFk');
define('SECURE_AUTH_KEY',  '_s2So}[Ls=Y`XM1PW#N_o< ^x#|U-v;]_=XJn+kHHyMZSj=S.u>]dD<#A$SK $B?');
define('LOGGED_IN_KEY',    '|l$ec-GG+;nRT@0v~jE[9)#*LOYZ(`Sko-#biYSWdd)1R/Ey|I-j)?[e|Zfrhs8/');
define('NONCE_KEY',        'LM&P-<si.+XbH)F[(+NWY]&lji@2=#|XfS}:n-EW[Rx-:jM,q3rq4q>7yD5RsIRp');
define('AUTH_SALT',        'GSAMuyp%x:%n!ra[CTy_VShk~n:x%7u6qYk;aKGb+7<m5YIo}YxWNzb~]$;A~B$s');
define('SECURE_AUTH_SALT', '@XGwHxRP3t2e>B7[W>@U_(_.4V2)jg:l~?XsMR0];MrNtMJdLq8p1*TzGK>cA@!$');
define('LOGGED_IN_SALT',   '6d4gh7,dcGy~vYJ9Ks1-dl;Z@>=w/[th/6D./@E$KQ(-9H-|Az{Jo-.yl)>CAN]y');
define('NONCE_SALT',       'dk)lWgO!^1jXabb^`= 4[.D|0yi}dcptK9#&GZw+V^1:M.|#IaWS1vS`:c-vvZYO');

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
define('WP_DEBUG', False);

/** Disable Automatic Updates Completely */
define( 'AUTOMATIC_UPDATER_DISABLED', True );

/** Define AUTOMATIC Updates for Components. */
define( 'WP_AUTO_UPDATE_CORE', False );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
