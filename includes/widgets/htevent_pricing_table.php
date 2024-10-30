<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Pricing_Table extends Widget_Base {

    public function get_name() {
        return 'htevent-pricing-table-addons';
    }
    
    public function get_title() {
        return __( 'HT Event: Pricing Table', 'htevent' );
    }

    public function get_icon() {
        return 'htevent-icon eicon-price-table';
    }
    public function get_categories() {
        return [ 'htevent' ];
    }

    protected function register_controls() {

         // Layout Fields tab start
        $this->start_controls_section(
            'htevent_pricing_layout',
            [
                'label' => __( 'Layout', 'htevent' ),
            ]
        );
            $this->add_control(
                'htevent_pricing_style',
                [
                    'label' => __( 'Style', 'htevent' ),
                    'type'  => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Style One', 'htevent' ),
                        '2'   => __( 'Style Two', 'htevent' ),
                    ],
                ]
            );
            $this->add_control(
                'htevent_pricing_style_active',
                [
                    'label'         => __( 'Active', 'htevent' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'return_value'  => 'active',
                    'condition'     =>[
                        'htevent_pricing_style' => '2'
                    ]
                ]
            );

        $this->end_controls_section(); // Layout Fields tab end

        // Header Fields tab start
        $this->start_controls_section(
            'htevent_pricing_header',
            [
                'label' => __( 'Header', 'htevent' ),
            ]
        );
        
            $this->add_control(
                'pricing_title',
                [
                    'label' => __( 'Title', 'htevent' ),
                    'type'  => Controls_Manager::TEXT,
                    'placeholder'   => __( 'Standard', 'htevent' ),
                    'default'       => __( 'Standard', 'htevent' ),
                    'title'         => __( 'Enter your service title', 'htevent' ),
                ]
            );

        $this->end_controls_section(); // Header Fields tab end

        // Pricing Fields tab start
        $this->start_controls_section(
            'htevent_pricing_price',
            [
                'label' => __( 'Pricing', 'htevent' ),
            ]
        );
        $this->add_control(
            'htevent_symbol_price',
            [
                'label'   => __( 'Price Currency Symbol', 'htevent' ),
                'type'    => Controls_Manager::TEXT,
                'condition'     =>[
                    'htevent_pricing_style' => '2'
                ]
            ]
        );
        $this->add_control(
            'htevent_price',
            [
                'label'   => __( 'Price', 'htevent' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '$ 450',
            ]
        );

        $this->end_controls_section(); // Pricing Fields tab end

        // Features tab start
        $this->start_controls_section(
            'htevent_pricing_features',
            [
                'label' => __( 'Features', 'htevent' ),
            ]
        );
            $this->add_control(
                'htevent_price_details',
                [
                    'label'     => __( 'Price Details', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => 'Eantry, Normal Seat, T-shirt, Single Day. Some Features Also, Free Coffee.',
                    'condition' => [
                        'htevent_pricing_style' => '2'
                    ]
                ]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'htevent_features_title',
                [
                    'label'   => __( 'Title', 'htevent' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'Features Tilte', 'htevent' ),
                    
                ]
            );
            $repeater->add_control(
                'htevent_old_features',
                [
                    'label'        => __( 'Old Features', 'htevent' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                ]
            );
            $this->add_control(
                'htevent_features_list',
                [
                    'type'      => Controls_Manager::REPEATER,
                    'condition' =>[
                        'htevent_pricing_style' => '1'
                    ],
                    'fields'  => array_values( $repeater->get_controls() ),
                    'default' => [
                        [
                            'htevent_features_title' => __( 'Marketing Metup', 'htevent' ),
                        ],
                        [
                            'htevent_features_title' => __( 'Free Coffy.', 'htevent' ),
                        ],
                        [
                            'htevent_features_title' => __( 'Support Papers', 'htevent' ),
                        ],
                        [
                            'htevent_features_title' => __( 'Policy System', 'htevent' ),
                        ],
                        [
                            'htevent_features_title' => __( 'One Time Support', 'htevent' ),
                        ],
                    ],
                    'title_field' => '{{{ htevent_features_title }}}',
                ]
            );
        $this->end_controls_section(); // Features Fields tab end

        // Footer tab start
        $this->start_controls_section(
            'htevent_pricing_footer',
            [
                'label' => __( 'Footer', 'htevent' ),
            ]
        );
            
            $this->add_control(
                'htevent_button_text',
                [
                    'label'   => __( 'Button Text', 'htevent' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( 'BUY TICKET', 'htevent' ),
                ]
            );

            $this->add_control(
                'htevent_button_link',
                [
                    'label'       => __( 'Link', 'htevent' ),
                    'type'        => Controls_Manager::URL,
                    'placeholder' => 'http://your-link.com',
                    'default'     => [
                        'url'     => '#',
                    ],
                ]
            );

        $this->end_controls_section(); // Footer Fields tab end

        // Style tab section start
        $this->start_controls_section(
            'htevent_pricing_style_section',
            [
                'label' => __( 'Style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'pricing_area_background_color',
                [
                    'label'     => __( 'Area Background Color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htevent-single-pricing-one' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .htevent-single-pricing-two' => 'background-color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_control(
                'pricing_active_background_color',
                [
                    'label'     => __( 'Active Background Color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'condition' => [
                       'htevent_pricing_style' => '2'
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htevent-single-pricing-two.active' => 'background-color: {{VALUE}}',
                    ]
                ]
            );

        $this->end_controls_section(); // Style tab section end 

        // Header style tab start
        $this->start_controls_section(
            'htevent_header_style',
            [
                'label'     => __( 'Header', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            

            $this->add_control(
                'pricing_header_heading_title',
                [
                    'label'     => __( 'Title', 'htevent' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_title_color',
                [
                    'label'     => __( 'Color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htevent-single-pricing-one .price-head h4' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .htevent-single-pricing-two .price-title h4' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'pricing_header_title_typography',
                    'selector' =>'{{WRAPPER}} .htevent-single-pricing-one .price-head h4',
                'condition' => [
                    'htevent_pricing_style' => '1'
                ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'pricing_header2_title_typography',
                    'selector' =>'{{WRAPPER}} .htevent-single-pricing-two .price-title h4',
                'condition' => [
                    'htevent_pricing_style' => '2'
                ],
                ]
            );

            $this->add_control(
                'pricing_header_heading_price',
                [
                    'label'     => __( 'Price', 'htevent' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'pricing_header_price_color',
                [
                    'label'     => __( 'Color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htevent-single-pricing-one .price-head h1' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .htevent-single-pricing-two .pricing-price h1' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'pricing_header_price_typography',
                    'selector' =>'{{WRAPPER}} .htevent-single-pricing-one .price-head h1',
                    'condition' => [
                    'htevent_pricing_style' => '1'
                ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'pricing_header2_price_typography',
                    'selector' => '{{WRAPPER}} .htevent-single-pricing-two .pricing-price h1',
                    'condition' => [
                    'htevent_pricing_style' => '2'
                ],
                ]
            );

        $this->end_controls_section(); // Header style tab end

        // Features style tab start
        $this->start_controls_section(
            'htevent_features_style',
            [
                'label'     => __( 'Features', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name'  => 'pricing_features_area_background',
                    'label' => __( 'Background', 'htevent' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htevent-single-pricing-one .price-details',
                      'condition' => [
                    'htevent_pricing_style' => '1'
                ],
                ]
            );

            $this->add_control(
                'pricing_features_item_color',
                [
                    'label'     => __( 'Color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htevent-single-pricing-one .price-details ul li' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .htevent-single-pricing-two .price-details p' => 'color: {{VALUE}}',
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'pricing_features_item_typography',
                    'selector' =>'{{WRAPPER}} .htevent-single-pricing-one .price-details ul li',
                      'condition' => [
                    'htevent_pricing_style' => '1'
                ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'pricing_features2_item_typography',
                    'selector' =>'{{WRAPPER}} .htevent-single-pricing-two .price-details p',
                    'condition' => [
                    'htevent_pricing_style' => '2'
                ],
                ]
            );

            $this->add_responsive_control(
                'pricing_features_item_padding',
                [
                    'label' => __( 'Padding', 'htevent' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htevent-single-pricing-one .price-details ul ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .htevent-single-pricing-two .price-details p ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

            $this->add_responsive_control(
                'pricing_features_item_margin',
                [
                    'label' => __( 'Margin', 'htevent' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htevent-single-pricing-one .price-details ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .htevent-single-pricing-two .price-details p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );

        $this->end_controls_section(); // Features style tab end

        // Footer style tab start
        $this->start_controls_section(
            'htevent_pricing_footer_style',
            [
                'label'     => __( 'Footer', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'pricing_footer_style_tabs');

                // Pricing Normal tab start
                $this->start_controls_tab(
                    'style_pricing_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );

                    $this->add_control(
                        'pricing_footer_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-single-pricing-one .price-details .button' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-single-pricing-two.active .button a' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-single-pricing-two .button a' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'pricing_footer_typography',
                            'selector' => '{{WRAPPER}} .htevent-single-pricing-one .price-details .button',
                            'condition' => [
                                    'htevent_pricing_style' => '1'
                                ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'pricing_footer2_typography',
                            'selector' => '{{WRAPPER}} .htevent-single-pricing-two .button a',
                            'condition' => [
                                'htevent_pricing_style' => '2'
                            ]
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_padding',
                        [
                            'label' => __( 'Padding', 'htevent' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htevent-single-pricing-one .price-details .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .htevent-single-pricing-two .button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'pricing_footer_border',
                            'label'     => __( 'Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-single-pricing-one .price-details .button',
                            'condition' => [
                                'htevent_pricing_style' => '1'
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'pricing_footer2_border',
                            'label'     => __( 'Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-single-pricing-two .button a',
                            'condition' => [
                                'htevent_pricing_style' => '2'
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_radius',
                        [
                            'label' => __( 'Border Radius', 'htevent' ),
                            'type'  => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-single-pricing-one .price-details .button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .htevent-single-pricing-two .button a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .htevent-single-pricing-two.active .button a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'      => 'pricing_footer_background',
                            'label'     => __( 'Background', 'htevent' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} .htevent-single-pricing-one .price-details .button',
                            'condition' => [
                                'htevent_pricing_style' => '1'
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'      => 'pricing_footer2_background',
                            'label'     => __( 'Background', 'htevent' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} .htevent-single-pricing-two .button a',
                            'condition' => [
                                'htevent_pricing_style' => '2'
                            ],
                        ]
                    );


                $this->end_controls_tab(); // Pricing Normal tab end

                // Pricing Hover tab start
                $this->start_controls_tab(
                    'style_pricing_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                    $this->add_control(
                        'pricing_footer_hover_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-single-pricing-one .price-details .button:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-single-pricing-two .button a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-single-pricing-two.active .button a:hover' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'pricing_footer_hover_border',
                            'label' => __( 'Border', 'htevent' ),
                            'selector' => '{{WRAPPER}} .htevent-single-pricing-one .price-details .button:hover',
                            'condition'     =>[
                                'htevent_pricing_style' => '1'
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'pricing_footer2_hover_border',
                            'label'     => __( 'Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-single-pricing-two .button a:hover',
                            'condition'     =>[
                                'htevent_pricing_style' => '2'
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'pricing_footer_hover_radius',
                        [
                            'label' => __( 'Border Radius', 'htevent' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-single-pricing-one .price-details .button:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                                '{{WRAPPER}} .htevent-single-pricing-two .button a:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                     $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'      => 'pricing_footer_background_hover',
                            'label'     => __( 'Background', 'htevent' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} .htevent-single-pricing-one .price-details .button:hover',
                            'condition' => [
                                'htevent_pricing_style' => '1'
                            ],
                        ]
                    );
                     $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name'      => 'pricing_footer2_background_hover',
                            'label'     => __( 'Background', 'htevent' ),
                            'types'     => [ 'classic', 'gradient' ],
                            'selector'  => '{{WRAPPER}} .htevent-single-pricing-two .button a:hover',
                            'condition' => [
                                'htevent_pricing_style' => '2'
                            ],
                        ]
                    );
                $this->end_controls_tab(); // Pricing Hover tab end
            $this->end_controls_tabs();
        $this->end_controls_section(); // Footer style tab end
    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $header_title = $settings['pricing_title'];
        $price = $settings['htevent_price'];
        $target = $settings['htevent_button_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['htevent_button_link']['nofollow'] ? ' rel="nofollow"' : '';
        $active = isset($settings['htevent_pricing_style_active']) ? $settings['htevent_pricing_style_active']: '';
        
        ?>

        <?php if( $settings['htevent_pricing_style'] == 2 ):?>

            <!-- Single Pricing Two -->
            <div class="htevent-single-pricing-two text-center <?php echo esc_attr( $active ); ?>">
                <?php 
                    if( !empty( $header_title ) ){ 
                       echo sprintf(' <div class="price-title"> <h4> %s </h4> </div>', esc_html( $header_title  ));
                     }
                     if( !empty( $price ) ){
                        echo sprintf('<div class="pricing-price"><h1><span>%s</span>%s</h1></div>',esc_html($settings['htevent_symbol_price']),esc_html( $price ) );
                     }
                     if( !empty($settings['htevent_price_details'] ) ){
                        echo sprintf('<div class="price-details"><p>%s</p></div>',esc_html( $settings['htevent_price_details'] ));
                     }
                 ?>
                <div class="button">
                    <?php if( !empty( $settings['htevent_button_text'] ) ):
                        echo '<a href="'.esc_url( $settings['htevent_button_link']['url'] ).'" '.$target.' '.$nofollow.'>' . esc_html( $settings['htevent_button_text'] ).'</a>'; 
                    endif;
                    ?>
                </div>
            </div>

            <?php else:?>

            <div class="pricing-one-wrapper">
                <div class="htevent-single-pricing-one">
                    <!-- Price Head -->
                    <div class="price-head">
                        <?php if( !empty( $header_title ) ){
                            echo '<h4>'.esc_html( $header_title ).'</h4>';
                        }if( !empty( $price ) ){
                            echo '<h1>'.esc_html( $price ).'</h1>';
                        } ?>
                    </div>
                    <!-- Price Details -->
                    <div class="price-details">
                        <?php if( $settings['htevent_features_list'] ){
                            echo '<ul>';
                            foreach(  $settings['htevent_features_list'] as $item ){
                            if( $item['htevent_old_features'] == 'yes' ){
                                $old_price = '<li class="off">';
                            }else{
                                $old_price = '<li>';
                            }
                           echo  $old_price.  esc_html($item['htevent_features_title']).'</li>';
                        }
                            echo '</ul>';
                        } 

                        ?>
                        <?php if( !empty( $settings['htevent_button_text'] ) ):
                            echo '<a class="button" href="'.esc_url( $settings['htevent_button_link']['url'] ).'" '.$target.' '.$nofollow.'>' . esc_html($settings['htevent_button_text']).'</a>'; 
                        endif;
                        ?>
                    </div>
                </div>
            </div>
           
            <?php endif; ?>

        <?php
    }
	
}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Pricing_Table() );