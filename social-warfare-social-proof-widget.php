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
		$icons_array = apply_filters( 'swp_button_options' , $icons_array );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		echo $before_title . $title . $after_title;

		//foreach( $icons_array['content'] as $button => $network ) :

		//endforeach;

		//var_dump($instance);
		echo $after_widget;


	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

		foreach( $icons_array['content'] as $button => $network ) :
			$instance['button'] = strip_tags($new_instance['button']);
		endforeach;
        return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form
		$title = esc_attr( $instance['title'] );
		$icons_array = apply_filters( 'swp_button_options' , $icons_array );
		$title = ! empty( $instance['title'] ) ? $instance['title'] : 	esc_html__( 'New title', 'text_domain' );
		?>
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_attr_e( 'Title:', 'text_domain' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label> Pick a Network: </label></br>
			<?php

			foreach( $icons_array['content'] as $button => $network ) :
			 	$instance['button'] = $button;
				$instance['network'] = $network['content'];
			?>
				<input class="widefat" type="checkbox" id="<?php echo esc_attr( $this->get_field_id('button') );?>" name="<?php echo esc_attr( $this->get_field_name('button') );?>" value= "<?php echo esc_attr($button); ?>" <?php if(checked($button,1)):
					echo 'checked = "checked"';
				endif; ?>
				 >
				<label for = "<?php echo esc_attr( $this->get_field_id('button') );?>">
					<?php echo $network['content'] . "<br />"; ?>
				</label>

					<?php
			endforeach;
				//echo $instance;
				?>
		</p>
		<?php

	}
}

function social_proof_widget_register_widgets() {
	register_widget( 'Social_warfare_social_proof_widget' );
}

add_action( 'widgets_init', 'social_proof_widget_register_widgets' );
