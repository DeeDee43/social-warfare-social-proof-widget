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
    }//close __construct()

    /**
	 * Outputs the content of the widget
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
    function widget( $args, $instance ) {
        echo args['before_widget'];
        if( ! empty( $instance['title'] )){
            echo $args['before_title'] .
                apply_filters( 'widget_title', $instance['title']) .
                $args['after_title'];
        }//close if()
        echo apply_filters('widget_categories', $instance['dropdown']);

        echo $args['after_widget'];
    }//close widget()

    /**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php

        ?>
		<form>
            <p>Check networks to show sitewide shares.</p>
            <!--core-->
            <?php
                if(defined('SWP_VERSION')){
             ?>
                <input type="checkbox" name="core[]" id="twitter" value="twitter"><label for="twitter"> Twitter</label><br>
                <input type="checkbox" name="core[]" id="facebook" value="facebook"><label for="facebook"> Facebook</label><br>
                <input type="checkbox" name="core[]" id="pintrest" value="pintrest"><label for="pintrest"> Pintrest</label><br>
                <input type="checkbox" name="core[]" id="googlePlus" value="googlePlus"><label for="googlePlus"> Google+</label><br>
                <input type="checkbox" name="core[]" id="linkedIn" value="linkedIn"><label for="linkedIn"> LinkedIn</label><br>
                <input type="checkbox" name="core[]" id="stumbleupon" value="stumbleupon"><label for="stumbleupon"> StumbleUpon</label><br>
            <?php
                }
                if(defined('SWPP_VERSION')){
            ?>
            <!--pro-->
            <input type="checkbox" name="pro[]" id="buffer" value="buffer"><label for="buffer"> Buffer</label><br>
            <input type="checkbox" name="pro[]" id="hacker_news" value="hacker_news"><label for="hacker_news"> Hacker News</label><br>
            <input type="checkbox" name="pro[]" id="reddit" value="reddit"><label for="reddit"> Reddit</label><br>
            <input type="checkbox" name="pro[]" id="tumblr" value="tumblr"><label for="tumblr"> Tumblr</label><br>
            <input type="checkbox" name="pro[]" id="yummly" value="yummly"><label for="yummly"> Yummly</label><br>
            <?php
                }
             ?>
        </form>
        <?php
    }//close form()

    /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}//class close

add_action( 'widgets_init', function(){
	register_widget( 'Social_Warfare_social_proof_widget' );
});
