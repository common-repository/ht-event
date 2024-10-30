<?php 

namespace Elementor;

if( !defined('ABSPATH'))exit;

class Htevent_Wooproduct_Tabs extends Widget_Base{
	public function get_name(){
		return 'htevent_wooproduct_style';
	}
	public function get_title(){
		return __('HT Event: Woocommerce Product','htevent');
	}
	public function get_icon(){
		return 'eicon-products';
	}
	public function get_categories(){
		return ['htevent'];
	}

	protected function register_controls(){
		$this->start_controls_section(
            'htevent-products',
            [
                'label' => __( 'Product Settings', 'htevent' ),
            ]
        );

		$this->add_control(
			'htevent_product_grid_product_filter',
			[
				'label'		    => __('Filter By Style','htevent'),
				'type'		    => Controls_Manager::SELECT,
				'default'	    => 'recent-products',
				'options'	    => [
                'recent' 		=> __( 'Recent Products', 'htevent' ),
                'featured' 	    => __( 'Featured Products', 'htevent' ),
                'best-selling'  => __( 'Best Selling Products', 'htevent' ),
                'sale'			=> __( 'Sale Products', 'htevent' ),
                'top' 			=> __( 'Top Rated Products', 'htevent' ),
				]
			]
		);

        $this->add_control(
            'htevent_product_grid_categories',
            [
                'label' 		=> __( 'Product Categories', 'htevent' ),
                'type' 			=> Controls_Manager::SELECT2,
                'label_block' 	=> true,
                'multiple' 		=> true,
                'options' 		=> htevent_woocommerce_product_categories(),
            ]
        );
        $this->add_control(
            'custom_order',
            [
                'label' 		=> __( 'Custom order', 'htevent' ),
                'type' 			=> Controls_Manager::SWITCHER,
                'return_value' 	=> 'yes',
                'default' 		=> 'no',
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' 	=> __( 'Orderby', 'htevent' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> 'none',
                'options' 	=> [
                    'none'          => __('None','htevent'),
                    'ID'            => __('ID','htevent'),
                    'date'          => __('Date','htevent'),
                    'name'          => __('Name','htevent'),
                    'title'         => __('Title','htevent'),
                    'comment_count' => __('Comment count','htevent'),
                    'rand'          => __('Random','htevent'),
                	],
                'condition' 		=> [
                    'custom_order' 	=> 'yes',
                ]
            ]
        );
        $this->add_control(
            'order',
            [
                'label' 	=> __( 'order', 'htevent' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> 'DESC',
                'options' 	=> [
                    'DESC'  		=> __('Descending','htevent'),
                    'ASC'   		=> __('Ascending','htevent'),
                ],
                'condition' 		=> [
                    'custom_order' 	=> 'yes',
                ]
            ]
        );

		$this->end_controls_section();






            // Style tab section
            $this->start_controls_section(
                'product_style',
                [
                    'label' => __( 'Style', 'htevent' ),
                    'tab' 	=> Controls_Manager::TAB_STYLE,
                ]
            );

            $this->start_controls_tabs(
                'style_tabs'
            );

                // Normal style tab
                $this->start_controls_tab(
                    'style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );

                    $this->add_control(
                        'htevent_product_title_heading',
                        [
                            'label' => __( 'Title', 'htevent' ),
                            'type' 	=> Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );
                    $this->add_control(
                        'title_color',
                        [
                            'label' 	=> __( 'Title color', 'htevent' ),
                            'type' 		=> Controls_Manager::COLOR,
                            'default'	=> '#202020',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .content .details h4 a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );


                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'      => 'titletypography',
                            'selector'  => '{{WRAPPER}} .product-item .content .details h4',
                        ]
                    );

                    $this->add_control(
                        'htevent_product_price_heading',
                        [
                            'label' => __( 'Product Price', 'htevent' ),
                            'type' => Controls_Manager::HEADING,
                            'separator' => 'after',
                        ]
                    );

                    $this->add_control(
                        'price_color',
                        [
                            'label' 	=> __( 'Color', 'htevent' ),
                            'type' 		=> Controls_Manager::COLOR,
                            'default'	=> '#202020',
                            'selectors' => [
                                '{{WRAPPER}} .product-item .content .details span' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                    'price_font_size',
                    [
                        'label' => __( 'Font Size', 'htevent' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                            '{{WRAPPER}} .product-item .content .details span' => 'font-size: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'htevent_wishlist_cart_heading',
                    [
                        'label' => __( 'Wishlist & Cart', 'htevent' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'cart_wishlist_color',
                    [
                        'label'     => __( 'Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .product-item .content a.button' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .product-item .wishlist i' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'cart_wishlist_bg_color',
                    [
                        'label'     => __( 'Background Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#202020',
                        'selectors' => [
                            '{{WRAPPER}} .product-item .content a.button' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .product-item .wishlist' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );



                $this->end_controls_tab();

                // Hover Style tab
                $this->start_controls_tab(
                    'style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );
                    $this->add_control(
                        'title_hovercolor',
                        [
                            'label' 	=> __( 'Title color', 'htevent' ),
                            'type' 		=> Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .product-item .content .details h4 a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();



        $this->end_controls_section();



	}
	protected function render(){
		$settings           = $this->get_settings_for_display();
        $product_type       = $this->get_settings_for_display('htevent_product_grid_product_filter');
        $slider_col         = $this->get_settings_for_display('htevent_product_slider_grid_column');
        $custom_order_ck    = $this->get_settings_for_display('custom_order');
        $orderby            = $this->get_settings_for_display('orderby');
        $order              = $this->get_settings_for_display('order');
        $tabuniqid          = $this->get_settings_for_display('tabuniqid');
        $product_arrow      = $this->get_settings_for_display('htevent_product_arrow_style');


        // WooCommerce Category
        $args = array(
            'post_type'             => 'product',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => -1,
        );

        if( $custom_order_ck == 'yes' ){
            $args['orderby'] = $orderby;
            $args['order'] = $order;
        }
        switch( $product_type ){

            case 'sale':
                $args['meta_query'][] = array(
                    'key'           => '_sale_price',
                    'value'        	=>  0,
                    'compare'      	=> '>',
                    'type'         	=> 'NUMERIC',
                );
            break;

            case 'featured':
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );
            break;

            case 'best_selling':
                $args['meta_key']   = 'total_sales';
                $args['orderby']    = 'meta_value_num';
                $args['order']      = 'desc';
            break;

            case 'top_rated': 
                $args['meta_key']   = '_wc_average_rating';
                $args['orderby']    = 'meta_value_num';
                $args['order']      = 'desc';          
            break;

            case 'mixed_order':
                $args['orderby']    = 'rand';
            break;

            default: /* Recent */
                $args['orderby']    = 'date';
                $args['order']      = 'desc';
            break;
        }

        $get_product_categories = $settings['htevent_product_grid_categories']; // get custom field value
        $product_cats = str_replace(' ', '', $get_product_categories);

        if ( "0" != $get_product_categories) {
            if( is_array($product_cats) && count($product_cats) > 0 ){
                $field_name = is_numeric($product_cats[0])?'term_id':'slug';
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => $product_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        $products = new \WP_Query( $args );

        ?>


        <div class="woocommerce product-slider carousel_slide">

			<?php if( is_array( $product_cats ) && (count( $product_cats ) > 0) ): ?>
		
            
            	<?php
                    $j=0;
                    foreach( $product_cats as $cats ):
                    $j++;
                    $field_name = is_numeric($product_cats[0])?'term_id':'slug';
                    $args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_cat',
                            'terms' => $cats,
                            'field' => $field_name,
                            'include_children' => false
                        )
                    );
                    $products = new \WP_Query( $args );
                    ?>

                     
                            
                                <?php
                                    $k=1;
                                    if( $products->have_posts() ):
                                        while( $products->have_posts() ): $products->the_post();
                                    $terms = get_the_terms( get_the_ID(),'product_cat');

                                global $product;

                                ?>

                                <div class="col">
                                    <div class="product-item">
                                        <a href="<?php the_permalink(); ?>" class="image">
                                            <?php woocommerce_template_loop_product_thumbnail(); ?>
                                        </a>
                                        <?php woocommerce_show_product_loop_sale_flash(); ?>
                                         <?php if( class_exists('YITH_WCWL_Shortcode') && function_exists('htevent_wishlist_shortcode') ){ htevent_wishlist_shortcode(); }?>
                                        <div class="content fix">
                                            <div class="details float-left">
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                 <?php woocommerce_template_loop_price(); ?>
                                            </div>
                                             <?php woocommerce_template_loop_add_to_cart(); ?>
                                        </div>
                                    </div>
                                </div>

                                <?php endwhile; endif; wp_reset_postdata(); ?>
                          

                <?php endforeach;?>

			<?php else:?>
				<?php
                    $k=1;
                    if( $products->have_posts() ):
                       while( $products->have_posts() ): $products->the_post();
                        $terms = get_the_terms( get_the_ID(),'product_cat');
                ?>

                        <div class="col">
                            <div class="product-item">
                                <a href="<?php the_permalink(); ?>" class="image">
                                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                                </a>
                                <?php woocommerce_show_product_loop_sale_flash(); ?>
                                 <?php if( class_exists('YITH_WCWL_Shortcode') && function_exists('htevent_wishlist_shortcode') ){ htevent_wishlist_shortcode(); }?>
                                <div class="content fix">
                                    <div class="details float-left">
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                         <?php woocommerce_template_loop_price(); ?>
                                    </div>
                                     <?php woocommerce_template_loop_add_to_cart(); ?>
                                </div>
                            </div>
                        </div>



            <?php endwhile; wp_reset_postdata();  endif; ?>
			</div>
			<?php endif;?>
	
 
        <?php
	}

}
htevent_widget_register_manager( new Htevent_Wooproduct_Tabs() );