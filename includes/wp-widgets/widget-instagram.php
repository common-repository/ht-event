<?php
/**
 * Recent Post Widget
 */
class htevent_Widget_Instagram extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'htevent_widget_instagram single__wedget instagram',
			'description' => __( 'Your site&#8217;s Instagram','htevent' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'htevent-instagram', __( 'HT Event: Instagram','htevent' ), $widget_ops );
		$this->alt_option_name = 'htevent_widget_instagram';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}


		$id = ( ! empty( $instance['user_id'] ) ) ? $instance['user_id'] : '6665768655';

		$token = ( ! empty( $instance['access_token'] ) ) ? $instance['access_token'] : '6665768655.1677ed0.313e6c96807c45d8900b4f680650dee5';

		$limit = isset( $number ) ? $number : '';
		$transient_var = $id . '_' . $limit;

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Instagram','htevent' );
		$new_tab = isset( $instance['new_tab'] ) ? $instance['new_tab'] : true;
		$new_tab_attr = $new_tab ? ' target="_balnk" ' : '';

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$per_page = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : $limit;
		if ( ! $per_page ) {
			$per_page = 5;
		}

		
		?>
		<?php echo wp_kses_post( $args['before_widget'] ); ?>
		<?php
		if ( $title ) {
			echo wp_kses_post( $args['before_title'] ) . $title . wp_kses_post( $args['after_title'] );
		}


		if ( false === ( $items = get_transient( $transient_var ) ) ) {
			$response = wp_remote_get( 'https://api.instagram.com/v1/users/' . esc_attr( $id ) . '/media/recent/?access_token=' . esc_attr( $token ) . '&count=' . esc_attr( $limit ) );
			
			if ( ! is_wp_error( $response ) ) {
		
				$response_body = json_decode( $response['body'] );
				
				

				$items_as_objects = $response_body->data;
				$items = array();
				foreach ( $items_as_objects as $item_object ) {
					$item['link'] = $item_object->link;
					$item['src']  = $item_object->images->standard_resolution->url;
					$item['caption']  = isset($item_object->caption->text) ? $item_object->caption->text : '';
					$items[]      = $item;
				}
				set_transient( $transient_var, $items, 0 * 0 );
			}
		}

		if ( isset( $items ) && !empty($items) && is_array($items)):
		?>
		<!-- Markup here-->

		<div class="footer-instagram">
	    	<?php
	    		$i = 0;
	    		foreach ( $items as $item ): $i++;
		    		$link  = $item['link'];
		    		$image = $item['src'];
		    		$caption = $item['caption'];

		    		if($i > $per_page) {
		    			break;
		    		}
	    	?>
		        <div class="thumb">
		            <a <?php echo esc_attr($new_tab_attr); ?> href="<?php echo esc_url($link) ?>"><img src="<?php echo esc_url($image) ?>" alt="htevent images"></a>
		        </div>
			<?php endforeach; ?>
		</div>
		<?php
		endif; // wrapper condition
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['user_id'] = sanitize_text_field( $new_instance['user_id'] );
		$instance['access_token'] = sanitize_text_field( $new_instance['access_token'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['new_tab'] = isset( $new_instance['new_tab'] ) ? (bool) $new_instance['new_tab'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

		$user_id     = isset( $instance['user_id'] ) ? esc_attr( $instance['user_id'] ) : '';
		$access_token     = isset( $instance['access_token'] ) ? esc_attr( $instance['access_token'] ) : '';

		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;
		$new_tab = isset( $instance['new_tab'] ) ? (bool) $instance['new_tab'] : false;
?>

		<p><label for="<?php echo wp_kses_post( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:','htevent' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo wp_kses_post( $title ); ?>" /></p>

		<p><label for="<?php echo wp_kses_post( $this->get_field_id( 'user_id' ) ); ?>"><?php _e( 'Instagram user ID:','htevent' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'user_id' ) ); ?>" name="<?php echo esc_attr(  $this->get_field_name( 'user_id' ) ); ?>" type="text" value="<?php echo wp_kses_post( $user_id ); ?>" /></p>

		<p><label for="<?php echo wp_kses_post( $this->get_field_id( 'access_token' ) ); ?>"><?php _e( 'Instagram Access Token:','htevent' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'access_token' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'access_token' ) ); ?>" type="text" value="<?php echo wp_kses_post( $access_token ); ?>" /></p>

		<p><label for="<?php echo wp_kses_post( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of image:','htevent' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo wp_kses_post( $number ); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $new_tab ); ?> id="<?php echo esc_attr( $this->get_field_id( 'new_tab' ) ); ?>" name="<?php echo esc_attr(  $this->get_field_name( 'new_tab' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'new_tab' ) ); ?>"><?php _e( 'Open Links in New Tab?','htevent' ); ?></label></p>
<?php
	}
}

function htevent_instagram(){
	register_widget('htevent_Widget_Instagram');
}
add_action('widgets_init','htevent_instagram');