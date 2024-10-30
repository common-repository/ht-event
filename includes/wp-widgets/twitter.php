<?php
add_action('widgets_init', 'htevent_twitter_load_widgets');

function htevent_twitter_load_widgets()
{
	register_widget('htevent_Twitter_Widget');
}

if(!class_exists('htevent_Twitter_Widget')){
	class htevent_Twitter_Widget extends WP_Widget {

		function __construct(){
			$widgetOps = array('classname' => 'htevent-twitter-widget', 'description' => esc_html__('Display latest tweets', 'htevent'));
			parent::__construct('htevent_twitter', esc_html__('HT Event - Twitter', 'htevent'), $widgetOps);
		}

		function widget( $args, $instance ) {
			
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			if( strlen(trim($instance['username'])) == 0 || !class_exists('TwitterOAuth') ){
				return;
			}
			
			$username 			= esc_attr($instance['username']);
			$limit 				= esc_attr($instance['limit']);
			$exclude_replies 	= empty($instance['exclude_replies'])?'false':'true';
			$cache_time 		= absint($instance['cache_time']);
			
			if( $cache_time == 1 ){
				$cache_time = 0;
			}
			
			$consumer_key 			= empty($instance['consumer_key'])?'':$instance['consumer_key'];
			$consumer_secret 		= empty($instance['consumer_secret'])?'':$instance['consumer_secret'];
			$access_token 			= empty($instance['access_token'])?'':$instance['access_token'];
			$access_token_secret 	= empty($instance['access_token_secret'])?'':$instance['access_token_secret'];
			$username 	= empty($instance['username'])?'':$instance['username'];
			
			if( $consumer_key == '' || $consumer_secret == '' || $access_token == '' || $access_token_secret == '' || $username == ''){
				$consumer_key 			= "qhwSleIMtLeRbqYY2kabwLCc0";
				$consumer_secret 		= "00WTXq2fxd0W7i3mHqBsT6Bjm81eIYvNFbCcoHfW2bIIvVxDQX";
				$access_token 			= "3750582733-C9SXrSxDNLTWF6QWShAoKZfxqR5xQ0yfNzgQu6X";
				$access_token_secret	= "SclQ7mmInfFUqhL0dEQf561g6tkOXLNEzWmei9g1qtePf";
				$username 				= "devitemsllc";
			}
			
			echo $before_widget; 
			if( $title ){
				echo $before_title . $title . $after_title; 
			}
			
			unset($instance['title']);
			unset($instance['consumer_key']);
			unset($instance['consumer_secret']);
			unset($instance['access_token']);
			unset($instance['access_token_secret']);
			$transient_key = 'twitter_'.implode('', $instance);
			
			//$cache = get_transient($transient_key);
			$cache = false;
			
			if( $cache !== false ){
				echo $cache;
			} 
			else{
				$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
				$tweets = $connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count='.$limit.'&exclude_replies='.$exclude_replies);
				if( !isset($tweets->errors) && is_array($tweets) ){
					ob_start();
					echo '<div class="footer-tweet">';
					echo '<ul>';
					foreach( $tweets as $tweet ){
						$tweet_link = 'http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id;
						$user_link = 'http://twitter.com/'.$tweet->user->screen_name;
						$tweet_short_link = $this->get_short_link($tweet_link);

						?>
						
								<li>
									<!-- <span class="twitter-feed__icon"><i class="fa fa-twitter"></i></span> -->
									<div class="twitter-feed__content">
										<span class="author"> 
											<a href="<?php echo esc_url($user_link); ?>" target="_blank"><?php echo esc_html($tweet->user->name); ?></a> <?php echo $tweet->text; //wp_trim_words( $tweet->text, 17, ' ' ); ?> 
										</span>
									</div>
								</li>
						
						<?php
					}
					echo '</ul>';
					echo '</div>';
					
					$output = ob_get_clean();
					echo $output;
					set_transient($transient_key, $output, $cache_time * HOUR_IN_SECONDS);
				}
			}
			echo $after_widget;
		}
		
		function relative_time($time){
			$second = 1;
			$minute = 60 * $second;
			$hour = 60 * $minute;
			$day = 24 * $hour;
			$month = 30 * $day;

			$delta = strtotime('+0 hours') - strtotime($time);
			if ($delta < 2 * $minute) {
				return esc_html__('1 min ago', 'htevent');
			}
			if ($delta < 45 * $minute) {
				return floor($delta / $minute) . esc_html__(' min ago', 'htevent');
			}
			if ($delta < 90 * $minute) {
				return esc_html__('1 hour ago', 'htevent');
			}
			if ($delta < 24 * $hour) {
				return floor($delta / $hour) . esc_html__(' hours ago', 'htevent');
			}
			if ($delta < 48 * $hour) {
				return esc_html__('yesterday', 'htevent');
			}
			if ($delta < 30 * $day) {
				return floor($delta / $day) . esc_html__(' days ago', 'htevent');
			}
			if ($delta < 12 * $month) {
				$months = floor($delta / $day / 30);
				return $months <= 1 ? esc_html__('1 month ago', 'htevent') : $months . esc_html__(' months ago', 'htevent');
			} else {
				$years = floor($delta / $day / 365);
				return $years <= 1 ? esc_html__('1 year ago', 'htevent') : $years . esc_html__(' years ago', 'htevent');
			}
		}
		
		function date_format($time){
			return mysql2date(get_option('time_format'), $time) . ' - ' . mysql2date(get_option('date_format'), $time);
		}
		
		function get_short_link($url){
			$result = wp_remote_post( add_query_arg( 'key', apply_filters( 'googl_api_key', 'AIzaSyBEPh-As7b5US77SgxbZUfMXAwWYjfpWYg' ), 'https://www.googleapis.com/urlshortener/v1/url' ), array(
				'body' => json_encode( array( 'longUrl' => esc_url_raw( $url ) ) ),
				'headers' => array( 'Content-Type' => 'application/json' ),
			) );

			/* Return the URL if the request got an error. */
			if( is_wp_error( $result ) ){
				return '';
			}

			$result = json_decode( $result['body'] );
			$shortlink = (isset($result->id) ? $result->id : '');
			if( $shortlink ){
				return $shortlink;
			}

			return '';
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;	
			$instance['title'] 					=  strip_tags($new_instance['title']);
			$instance['username'] 				=  $new_instance['username'];
			$instance['limit'] 					=  absint($new_instance['limit']);
			$instance['exclude_replies'] 		=  $new_instance['exclude_replies'];
			$instance['cache_time'] 			=  absint($new_instance['cache_time']);															
			$instance['consumer_key'] 			=  $new_instance['consumer_key'];
			$instance['consumer_secret'] 		=  $new_instance['consumer_secret'];
			$instance['access_token'] 			=  $new_instance['access_token'];
			$instance['access_token_secret'] 	=  $new_instance['access_token_secret'];															
			return $instance;
		}

		function form( $instance ) {
			$array_default = array(
				'title'					=> 'Latest Tweets'
				,'username'				=> ''
				,'limit'				=> 2
				,'exclude_replies'		=> 1
				,'cache_time'			=> 12
				,'consumer_key'			=> ''
				,'consumer_secret'		=> ''
				,'access_token'			=> ''
				,'access_token_secret'	=> ''
			);
							
			$instance = wp_parse_args( (array) $instance, $array_default );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Enter your title', 'htevent'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('username'); ?>"><?php esc_html_e('Username', 'htevent'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo esc_attr($instance['username']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('limit'); ?>"><?php esc_html_e('Limit', 'htevent'); ?> : </label>
				<input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" min="1" value="<?php echo esc_attr($instance['limit']); ?>" />
			</p>
			<p>
				<input value="1" class="" type="checkbox" id="<?php echo $this->get_field_id('exclude_replies'); ?>" name="<?php echo $this->get_field_name('exclude_replies'); ?>" <?php checked(1, $instance['exclude_replies']); ?> />
				<label for="<?php echo $this->get_field_id('exclude_replies'); ?>"><?php esc_html_e('Exclude replies', 'htevent'); ?></label>
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id('cache_time'); ?>"><?php esc_html_e('Cache time (hours)', 'htevent'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('cache_time'); ?>" name="<?php echo $this->get_field_name('cache_time'); ?>" type="number" min="1" value="<?php echo esc_attr($instance['cache_time']); ?>" />
			</p>
			<hr>
			<p>
				<strong>API Keys: </strong> if you don't input your API Keys, it will use our API Keys.
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('consumer_key'); ?>"><?php esc_html_e('Consumer key', 'htevent'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('consumer_key'); ?>" name="<?php echo $this->get_field_name('consumer_key'); ?>" type="text" value="<?php echo esc_attr($instance['consumer_key']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('consumer_secret'); ?>"><?php esc_html_e('Consumer secret', 'htevent'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('consumer_secret'); ?>" name="<?php echo $this->get_field_name('consumer_secret'); ?>" type="text" value="<?php echo esc_attr($instance['consumer_secret']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('access_token'); ?>"><?php esc_html_e('Access token', 'htevent'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" type="text" value="<?php echo esc_attr($instance['access_token']); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('access_token_secret'); ?>"><?php esc_html_e('Access token secret', 'htevent'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('access_token_secret'); ?>" name="<?php echo $this->get_field_name('access_token_secret'); ?>" type="text" value="<?php echo esc_attr($instance['access_token_secret']); ?>" />
			</p>
			<?php }
	}
}

