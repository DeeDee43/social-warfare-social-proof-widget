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


class Social_warfare_social_proof_widget extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Social Warfare: Social Proof Widget' );
	}

	function widget( $args, $instance ) {
		extract ($args);
        $title = apply_filters( 'widget_title', $instance['title'] );




	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 	esc_html__( 'New title', 'text_domain' );

		$icons_array = apply_filters( 'swp_button_options' , $icons_array );




		?>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_attr_e( 'Title:', 'text_domain' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

		</p>
		<p>
				<label> Pick a Network: </label>
				<?php
				for( $i = 1; $i <= count( $icons_array['content'] ); $i++ ){

				if( $icons_array['content'][$i-1]['defalt'] || $icons_array['content'][$i]['premium'] ) {
					?> <input
						class="widefat"
						id="<?php $icons_array['content'][$i]; ?>"
						name="<?php $icons_array['content'][$i]['content']; ?>" 
						type="<?php $icons_array['content'][$i]['type']; ?>"
						>
					<?php
					echo $icons_array['content'][$i]['content'];
					echo "<br />";
					?>
				}

				};


		</p>
		<?php
	}
}

function social_proof_widget_register_widgets() {
	register_widget( 'Social_warfare_social_proof_widget' );
}

add_action( 'widgets_init', 'social_proof_widget_register_widgets' );
