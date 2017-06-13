<?php
/**
 * Plugin Name: Social Warfare - Social Proof Widget
 * Plugin URI:  http://warfareplugins.com
 * Description: A Social Warfare widget that shows sitewide shares of selected social media networks.
 * Version:     1.0.0
 * Author:      Warfare Plugins
 * Author URI:  http://warfareplugins.com
 * Text Domain: social-warfare
*/

defined( 'WPINC' ) || die;

/**
 * Define plugin constants for use throughout the plugin (Version and Directories)
 *
 */
define( 'SW_SPW_VERSION' , '1.0.0' );
define( 'SW_SPW_PLUGIN_FILE', __FILE__ );
define( 'SW_SPW_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'SW_SPW_PLUGIN_DIR', dirname( __FILE__ ) );
