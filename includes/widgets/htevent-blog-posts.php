<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Blog_Post  extends Widget_Base {
	public function get_name() {
	    return 'htevent_blog_posts';
	}
	public function get_title() {
	    return __( 'HT Event: Blog Posts', 'htevent' );
	}

	public function get_icon() {
	    return 'eicon-post';
	}
	public function get_categories() {
	    return [ 'htevent' ];
	}

	public function htevent_content_fields(){
		$this->start_controls_section(
		    'content_section',
		    [
		        'label' => __( 'Blog Posts Options', 'htevent' ),
		    ]
		);

			$this->add_control(
				'blog_layout',
				[
					'label' => __( 'Select Column', 'htevent' ),
					'type' => Controls_Manager::SELECT,
					'options'	=> [
						'2'	=> __('2 Column','htevent'),						
						'3'	=> __('3 Column','htevent'),						
						'4'	=> __('4 Column','htevent'),						
					],
					'default' => '3',
				]
			);
			$this->add_control(
				'per_page',
				[
					'label'        => __( 'Number of posts to load', 'htevent' ),
					'type'         => Controls_Manager::NUMBER,
					'label_block' => true,
					'default'     => 3,
				]
			);
	        $this->add_control(
	            'category',
	            [
	                'label' => __( 'Categories', 'htevent' ),
	                'type' => Controls_Manager::SELECT2,
					'label_block' => true,
					'multiple' => true,
					'options' => htevent_get_post_cat_ids_arr()
	            ]
			);
	        $this->add_control(
	            'tag',
	            [
	                'label'        => __( 'Tags', 'htevent' ),
	                'type'         => Controls_Manager::SELECT2,
					'label_block'  => true,
					'multiple'     => true,
					'options'      => htevent_get_post_tag_ids_arr()
	            ]
			);
			$this->add_control(
			    'order',
			    [
			        'label'      => __( 'Order', 'htevent' ),
			        'type'       => Controls_Manager::SELECT,
			        'options'    => [
			            'asc'    => __('Ascending','htevent'),
			            'desc'   => __('Descending','htevent'),
			        ],
			        'default'    => 'desc',
			    ]
			);
			$this->add_control(
			    'orderby',
			    [
			        'label'      => __( 'Order By', 'htevent' ),
			        'type'       => Controls_Manager::SELECT,
			        'options'    => htevent_get_post_orderby_arr(),
			        'default'    => 'date',
			    ]
			);
			$this->add_control(
			    'pagination',
			    [
			        'label' => __( 'Pagination', 'htevent' ),
			        'type' => Controls_Manager::SWITCHER,
			    ]
			);
			$this->add_control(
			    'title_length',
			    [
			        'label'      => __( 'Title Length', 'htevent' ),
			        'type'       => Controls_Manager::NUMBER,
			        'default'    => 5,
			    ]
			);
			$this->add_control(
			    'excerpt_length',
			    [
			        'label'      => __( 'Excerpt Length', 'htevent' ),
			        'type'       => Controls_Manager::NUMBER,
			        'default'    => 15,
			    ]
			);
	 

		$this->end_controls_section();
	}

	// style fields
	public function htevent_style_fields(){
		// style tab start
        $this->start_controls_section(
            'htevent_blog_style',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'blog_style_tabs');

                // Normal tab start
                $this->start_controls_tab(
                    'blog_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );
                    //start author
                    $this->add_control(
                        'author_options',
                        [
                            'label'     => __( 'Author', 'htevent' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );
                     $this->add_control(
                        'author_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .blog-author-info h4 a' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'author_typography',
                            'selector' => '{{WRAPPER}} .blog-author-info h4',
                        ]
                    );
                    //end author
                	//start date
                    $this->add_control(
			            'date_options',
			            [
			                'label' 	=> __( 'Date', 'htevent' ),
			                'type' 		=> Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
			         $this->add_control(
                        'date_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item .blog-author-info p.blog-author-date' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'date_typography',
                            'selector' => '{{WRAPPER}} .htevent-blog-item .blog-author-info p.blog-author-date',
                        ]
                    );
			        //end date

                    //start title
                    $this->add_control(
			            'title_options',
			            [
			                'label' 	=> __( 'Title', 'htevent' ),
			                'type' 		=> Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
			         $this->add_control(
                        'title_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item .content .title a' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'title_typography',
                            'selector' => '{{WRAPPER}} .htevent-blog-item .content .title a',
                        ]
                    );

                    $this->add_responsive_control(
                        'title_padding',
                        [
                            'label' 		=> __( 'Padding', 'htevent' ),
                            'type'  		=> Controls_Manager::DIMENSIONS,
                            'size_units' 	=> [ 'px', '%', 'em' ],
                            'selectors' 	=> [
                                '{{WRAPPER}} .htevent-blog-item .content .title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );
			        //end title
                    //start content
                    $this->add_control(
			            'content_options',
			            [
			                'label' 	=> __( 'Content', 'htevent' ),
			                'type' 		=> Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
			         $this->add_control(
                        'content_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item .content p' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'content_typography',
                            'selector' => '{{WRAPPER}} .htevent-blog-item .content p',
                        ]
                    );

                    $this->add_responsive_control(
                        'content_padding',
                        [
                            'label' 		=> __( 'Padding', 'htevent' ),
                            'type'  		=> Controls_Manager::DIMENSIONS,
                            'size_units' 	=> [ 'px', '%', 'em' ],
                            'selectors' 	=> [
                                '{{WRAPPER}} .htevent-blog-item .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );
			        //end content
                    //start read more
                    $this->add_control(
			            'read_more_options',
			            [
			                'label' 	=> __( 'Link, View, Comments', 'htevent' ),
			                'type' 		=> Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
			         $this->add_control(
                        'read_more_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .blog-footer-meta span a, .blog-footer-meta span' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'read_more_typography',
                            'selector' => '{{WRAPPER}} .blog-footer-meta span a, .blog-footer-meta span',
                        ]
                    );
                    $this->add_responsive_control(
                        'read_more_padding',
                        [
                            'label' 		=> __( 'Padding', 'htevent' ),
                            'type'  		=> Controls_Manager::DIMENSIONS,
                            'size_units' 	=> [ 'px', '%', 'em' ],
                            'selectors' 	=> [
                                '{{WRAPPER}} .blog-footer-meta span a, .blog-footer-meta span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );
			        //end read more
                    //start pagination
                    $this->add_control(
			            'pagination_options',
			            [
			                'label' 	=> __( 'Pagination', 'htevent' ),
			                'type' 		=> Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
			         $this->add_control(
                        'pagination_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item ul span.current, .htevent-blog-item ul li a' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
			        $this->add_control(
                        'pagination_bg',
                        [
                            'label'     => __( 'Background', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item ul span.current, .htevent-blog-item ul li a' => 'background-color: {{VALUE}}',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'pagination_border',
                            'label'     => __( 'Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-blog-item ul span.current, .htevent-blog-item ul li a',
                        ]
                    );

                    $this->add_responsive_control(
                        'pagination_padding',
                        [
                            'label' 		=> __( 'Padding', 'htevent' ),
                            'type'  		=> Controls_Manager::DIMENSIONS,
                            'size_units' 	=> [ 'px', '%', 'em' ],
                            'selectors' 	=> [
                                '{{WRAPPER}} .htevent-blog-item ul span.current, .htevent-blog-item ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );
			        //end pagination
                $this->end_controls_tab(); //  Normal tab end

                // Hover tab start
                $this->start_controls_tab(
                    'style_blog_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );
                 	//title start
                    $this->add_control(
			            'title_hover_options',
			            [
			                'label' 	=> __( 'Title', 'htevent' ),
			                'type' 		=> Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );

			        $this->add_control(
                        'title_hover_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item .content .title a:hover' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
                    //end title
                 	//start pagination
                    $this->add_control(
			            'pagination_hover_options',
			            [
			                'label' 	=> __( 'Pagination', 'htevent' ),
			                'type' 		=> Controls_Manager::HEADING,
			                'separator' => 'after',
			            ]
			        );
			        $this->add_control(
                        'pagination_hover_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item ul span.current, .htevent-blog-item ul li a:hover' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

			        $this->add_control(
                        'pagination_bg_hover',
                        [
                            'label'     => __( 'Background', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-blog-item ul span.current, .htevent-blog-item ul li a:hover' => 'background-color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'pagination_hover_border',
                            'label'     => __( 'Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-blog-item ul span.current, .htevent-blog-item ul li a:hover',
                        ]
                    );

                    //end pagination
                $this->end_controls_tab(); // Hover tab end
            $this->end_controls_tabs();
        $this->end_controls_section(); // style tab end
	}

	protected function register_controls() {

		$this->htevent_content_fields();
		$this->htevent_style_fields();
	}

	protected function render( $instance = [] ) {

	    $settings = $this->get_settings_for_display();

	    //post query
	    $args = array();
	    $args['post_type']		= 'post';
	    $args['post_status']	= 'publish';
	    $args['posts_per_page']	= $settings['per_page'] == 0 ? '-1' : $settings['per_page'];
	    $args['orderby']		= $settings['orderby'];
	    $args['order']			= $settings['order'];
	    $args['category__in'] 	= $settings['category'];
	    $args['tag__in'] 		= $settings['tag'];
	    $args['ignore_sticky_posts'] 	= 1;

	    $posts_query = new \WP_Query($args);

	    ob_start();

	    if(	$settings['blog_layout'] =='2' ){
			$column = 'col-md-6 col-12';
		}elseif ($settings['blog_layout'] =='4') {
			$column = 'col-lg-3 col-md-6';
		}else{
			$column = 'col-lg-4 col-md-6';	
		}

	    echo '<div class="row htevent-blog-item">';

	    if($posts_query->have_posts()): $i = 0;
	    	while($posts_query->have_posts()): $posts_query->the_post();
	    		$i++; 
	    		$content_title = isset( $settings['title_length'] ) ? $settings['title_length']:'';
	    		$content_word = isset( $settings['excerpt_length'] ) ? $settings['excerpt_length']:'';
	    	?>


	    		<div class="htevent-blog-item <?php echo esc_attr( $column); ?>">
                   <article class="post">     
                    
                    <!-- Image -->
                    <a href="<?php the_permalink(); ?>" class="image">
                        <?php the_post_thumbnail( array(370,270) ) ?>
                    </a>
                    
                    <!-- Content -->
                    <div class="content clarfix">  
                        <div class="blog-author-meta clarfix">
                            <div class="blog-author-image">
                                <?php echo get_avatar( '', '55' ); ?> 
                            </div>
                            <div class="blog-author-info">
                                <h4>
                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>">
                                        <?php the_author(); ?>
                                    </a>
                                </h4>
                                <p class="blog-author-date">
                                    <?php echo esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ) . esc_html__(' ago','htevent'); ?>
                                </p>
                            </div>
                        </div>
                        <h3 class="title">
                        	<a href="<?php the_permalink(); ?>">
                        	<?php echo wp_trim_words( get_the_title(), $content_title, '' ); ?>
                        	</a>
                        </h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), $content_word, '' ); ?></p>

                        <div class="blog-footer-meta">
                            <?php if(function_exists('htevent_getPostLikeLink')):?>
                                <span> <?php echo htevent_getPostLikeLink( get_the_ID() ); ?></span>
                            <?php endif; ?>
                            <?php if(function_exists('htevent_getPostViews')):?>
                                <span class="meta-item view">
                                    <?php  echo htevent_getPostViews(get_the_ID());; ?>
                                </span>
                            <?php endif; ?>
                            <span class="post-comments"><?php comments_popup_link(); ?></span>
                        </div>
                    </div>
                    </article>
                </div>
	    <?php	
    		endwhile;

    		if($settings['pagination'] == 'yes'){
    			if ( get_query_var('paged') ) { 
    				$paged = get_query_var('paged');
    			} else if ( get_query_var('page') ) {   
    				$paged = get_query_var('page'); 
    			} else {  
    				$paged = 1; 
    			}

    			$count_posts = wp_count_posts();
    			$published_posts = $count_posts->publish;
    			
    			$page_total = ceil( ( $published_posts - 0 ) / $settings['per_page'] );
    			if ( $page_total > 1 ) {
    			    $big        = 999999999;
    			    echo paginate_links( array(
    			        'base'      => str_replace( $big, '%#%',get_pagenum_link( 999999999, false ) ),
    			        'format'    => '?paged=%#%',
    			        'current'   => max( 1, $paged ),
    			        'total'     => $page_total,
    			        'prev_next' => true,
    			        'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
    			        'next_text' => '<i class="fa fa-long-arrow-right"></i>',
    			        'end_size'  => 1,
    			        'mid_size'  => 2,
    			        'type'      => 'list'
    			        ));
    			}
    		}
    		wp_reset_postdata();
    		else:
	    ?>

	    	<p class="text-center"><?php echo esc_html__( 'No posts found!', 'htevent' ); ?></p>

	   </div>

	    <?php
	    endif; //endif have posts
	    echo ob_get_clean();

	}
}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Blog_Post () ); 