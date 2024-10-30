<?php 
/**
 * Adds short description Widget.
 */
 if( !class_exists('htevent_description_Widget') ){
	class htevent_description_Widget extends WP_Widget{
		/**
		 * Register widget with WordPress.
		 */
		function __construct(){
			$widget_ops = array( 'description' => __('Our short description  .','htevent'),'customize_selective_refresh' => true, );
			parent:: __construct('htevent_description_Widget', __('HT Event: Short Description','htevent'),$widget_ops );
		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){
			$image   = isset( $instance['image'] ) ? $instance['image'] : '';
			$text = isset( $instance['text'] ) ? $instance['text'] : '';
			?>
			<?php echo wp_kses_post( $args['before_widget'] ); ?>
				<?php if( $image ): ?>
				<div class="footer-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-footer">
						<img src="<?php echo esc_url( $image ) ; ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
					</a>
				</div>	
				<?php endif; ?>

				<div class="single-footer-text">
					<p><?php echo wp_kses_post( $text ); ?></p>
				</div>


			<?php echo wp_kses_post( $args['after_widget'] ); ?>

			<?php
		}
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance){
			$instace = array();
			$instance['image']   = ( !empty( $new_instance['image'] ) ) ? strip_tags ( $new_instance['image'] ) : '';
			
			if ( current_user_can( 'unfiltered_html' ) ) {
					$instance['text'] = $new_instance['text'];
			} else {
					$instance['text'] = wp_kses_post( $new_instance['text'] );
			}


			return $instance;
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form($instance){
			$image 		 = !empty($instance['image']) ? $instance['image'] : '';
			$text = !empty($instance['text']) ? $instance['text'] : '';
				
		?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e('Upload Image:','htevent');?></label>
				
					<img class="custom_media_image" src="<?php if(!empty($image)){echo esc_html($image);} ?>" style="margin:0;padding:0;max-width:100px;display:inline-block" />
					<input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')); ?>" value="<?php echo esc_attr($image); ?>">
					<a href="#" id="custom_media_button" style="margin-top:10px;" class="button button-primary custom_media_button"><?php esc_html_e('Upload', 'htevent'); ?></a>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php esc_html_e('Content:' ,'htevent') ?></label>
				<textarea id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" rows="10" class="widefat"><?php echo esc_textarea( $text ); ?></textarea>
			</p>

			
		<?php
		}
	}
}
// register Short description widget
function htevent_description_Widget() {
    register_widget( 'htevent_description_Widget' );
}
add_action( 'widgets_init', 'htevent_description_Widget' );