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

		//network instances
		$googlePlus = $instance['googlePlus'];
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$linkedIn = $instance['linkedIn'];
		$pinterest= $instance['pinterest'];
		$stumbleupon = $instance['stumbleupon'];
		$tumblr = $instance['tumblr'];
		$reddit = $instance['reddit'];
		$yummly = $instance['yummly'];
		$buffer = $instance['buffer'];
		$hacker_news = $instance['hacker_news'];
		$flipboard = $instance['flipboard'];



		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo $after_widget;

		//var_dump($instance);

	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['googlePlus'] = strip_tags($new_instance['googlePlus']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		$instance['linkedIn'] = strip_tags($new_instance['linkedIn']);
		$instance['pinterest'] = strip_tags($new_instance['pinterest']);
		$instance['stumbleupon'] = strip_tags($new_instance['stumbleupon']);
		$instance['tumblr'] = strip_tags($new_instance['tumblr']);
		$instance['reddit'] = strip_tags($new_instance['reddit']);
		$instance['yummly'] = strip_tags($new_instance['yummly']);
		$instance['buffer'] = strip_tags($new_instance['buffer']);
		$instance['hacker_news'] = strip_tags($new_instance['hacker_news']);
		$instance['flipboard'] = strip_tags($new_instance['flipboard']);
        return $instance;
	}

	function form( $instance ) {
		// Output admin widget options form

		$title = esc_attr( $instance['title'] );
		/*
		$twitter = esc_attr( $instance['twitter'] );
		$facebook = esc_attr($instance['facebook']);
		$linkedIn = esc_attr($instance['linkedIn']);
		$pinterest= esc_attr($instance['pinterest']);
		$stumbleupon = $instance['stumbleupon'];
		$tumblr = $instance['tumblr'];
		$reddit = $instance['reddit'];
		$yummly = $instance['yummly'];
		$buffer = $instance['buffer'];
		$hacker_news = $instance['hacker_news'];
		$flipboard = $instance['flipboard'];
		*/
		$icons_array = apply_filters( 'swp_button_options' , $icons_array );

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

				var_dump($button);
				var_dump($network);

				?>
				<input class="widefat"
					id="<?php echo $this->get_field_id('$button');?>" name="<?php echo $this->get_field_name('$button'); ?>" type="checkbox"
					value= "1"  <?php checked($button,1 ); ?> >
				<?php
				echo $network['content'];
				echo "<br />";
			endforeach;
			?>
		</p>
		<?php
	}
}

function social_proof_widget_register_widgets() {
	register_widget( 'Social_warfare_social_proof_widget' );
}

add_action( 'widgets_init', 'social_proof_widget_register_widgets' );
