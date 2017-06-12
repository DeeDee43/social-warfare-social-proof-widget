<?php
/**
 * Plugin Name: Social Warfare - Social Proof Widget
 * Plugin URI:  http://warfareplugins.com
 * Description: A plugin that adds fun and useful shortcodes for the Social Warfare plugin.
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

/**
 * The Plugin Update checker
 *
 * @since 2.0.0
 * @access public
 */
require_once SW_SPW_PLUGIN_DIR . '/update-checker/plugin-update-checker.php';
$swps_github_checker = swp_PucFactory::getLatestClassVersion('PucGitHubChecker');
$sw_SPW_update_checker = new $swpp_github_checker(
    'https://github.com/warfare-plugins/social-warfare-shortcodes/',
    __FILE__,
    'master'
);

class sw_spw_plugin extends WP_Widget {

}
