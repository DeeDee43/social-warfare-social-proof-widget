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

/**
 * The Plugin Update checker
 *
 * @since 2.0.0
 * @access public
 */
/*require_once SW_SPW_PLUGIN_DIR . '/update-checker/plugin-update-checker.php';
$sw_spw_github_checker = swp_PucFactory::getLatestClassVersion('PucGitHubChecker');
$sw_spw_update_checker = new $swpp_github_checker(
    'https://github.com/warfare-plugins/social-warfare-social-proof-widget/',
    __FILE__,
    'master'
);*/

class Social_Warfare_social_proof_widget extends WP_Widget {

    /**
     * Sets up Widget name and starting options
     */
    function __construct(){
        $options = array(
            'classname' => 'social_warfare_social_proof_widget',
            'description' => 'Shows sitewide shares of selected social media'
        );
        parent::__construct( 'social_warfare_social_proof_widget', 'Social Proof widget', $options );
    }//close construct
}//class close

add_action( 'widgets_init', function(){
	register_widget( 'Social_Warfare_social_proof_widget' );
});
