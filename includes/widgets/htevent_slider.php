<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Event_Slider extends Widget_Base {

    public function get_name() {
        return 'htevent-slider';
    }
    
    public function get_title() {
        return __( 'HT Event: Slider', 'htevent' );
    }

    public function get_icon() {
        return 'eicon-post-slider';
    }
    public function get_categories() {
        return [ 'htevent' ];
    }
    public function get_script_depends() {
        return [
            'slick.min',
            'htevent-widgets-active',
        ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'slider_content_setting',
            [
                'label' => __( 'Slider Content', 'htevent' ),
            ]
        );

        $this->add_control(
            'slider_style',
            [
                'label'   => __( 'slider Style', 'htevent' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'   => __( 'Style One', 'htevent' ),
                    '2'   => __( 'Style Two', 'htevent' ),
                    '3'   => __( 'Style Three', 'htevent' ),
                    '4'   => __( 'Style Four', 'htevent' ),
                ],
            ]
        );
        //slider style 1 start
        $repeater = new Repeater();

            $repeater->add_control(
                'slimage',
                [
                    'label'     => __( 'Slider Image', 'htevent' ),
                    'type'      => Controls_Manager::MEDIA,
                    'default'   => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'slider_bg_color',
                [
                    'label'        => __( 'Slider Overlay Color', 'htevent' ),
                    'type'         => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htevent-item::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );   
            
            $repeater->add_control(
                'topsltitle',
                [
                    'label'     => __( 'Top Title (HTML tag supported)', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'title'     => __( 'Enter slider title', 'htevent' ),
                ]
            );

            $repeater->add_control(
                'sltitle',
                [
                    'label'     => __( 'Title (HTML tag supported)', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'title'     => __( 'Enter slider title', 'htevent' ),
                ]
            );
            $repeater->add_control(
                'slsubtitle',
                [
                    'label'         => __( 'Bottom Sub title (HTML tag supported)', 'htevent' ),
                    'type'          => Controls_Manager::TEXTAREA,
                    'default'       => '',
                    'label_block'   => 'true',
                    'title'         => __( 'Enter slider title', 'htevent' ),
                ]
            );

            $repeater->add_control(
                'slbutton',
                [
                    'label'     => __( 'Button Text', 'htevent' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => '',
                    'title'     => __( 'Enter slider button text', 'htevent' ),
                ]
            );

            $repeater->add_control(
                'slbuttonlink',
                [
                    'label'             => __( 'Link', 'htevent' ),
                    'type'              => Controls_Manager::URL,
                    'placeholder'       => __( 'https://your-link.com', 'htevent' ),
                    'show_external'     => true,
                    'default'           => [
                        'url'           => '',
                        'is_external'   => true,
                        'nofollow'      => true,
                    ],
                ]
            );

            $this->add_control(
                'sliders_list',
                [
                    'label'     => __( 'Slider', 'htevent' ),
                    'type'      => Controls_Manager::REPEATER,
                    'fields'    => $repeater->get_controls(),
                    'condition' => [
                        'slider_style' => '1',
                    ],
                    'default'   => [
                        [
                            'topsltitle'    => __( '7th Biggest', 'htevent' ),
                            'sltitle'       => __( 'Business Conference 2022', 'htevent' ),
                            'slsubtitle'    => __( '10 to 13 February, 2022', 'htevent' ),
                            'slbutton'      => __( 'Buy Ticket', 'htevent' ),
                            'slbuttonlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'topsltitle'    => __( '7th Biggest', 'htevent' ),
                            'sltitle'       => __( 'Business Conference 2023', 'htevent' ),
                            'slsubtitle'    => __( '10 to 13 February, 2023', 'htevent' ),
                            'slbutton'      => __( 'Buy Ticket', 'htevent' ),
                            'slbuttonlink'  => __( '#', 'htevent' ),
                        ],
                    ],
                    'title_field' => '{{{ sltitle }}}',
                ]
            );

            //slider style 1 end


        //slider style 2 start
        $repeater = new Repeater();
            $repeater->add_control(
                'title',
                [
                    'label'     => __( ' Title (HTML tag supported)', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                ]
            );

            $repeater->add_control(
                'slbutton',
                [
                    'label'     => __( 'Button Text', 'htevent' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => '',
                ]
            );

            $repeater->add_control(
                'slbuttonlink',
                [
                    'label'             => __( 'Link', 'htevent' ),
                    'type'              => Controls_Manager::URL,
                    'placeholder'       => __( 'https://your-link.com', 'htevent' ),
                    'show_external'     => true,
                    'default'           => [
                        'url'           => '',
                        'is_external'   => true,
                        'nofollow'      => true,
                    ],
                ]
            );
            $repeater->add_control(
                'name',
                [
                    'label'     => __( 'Name', 'htevent' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => '',
                ]
            );
            $repeater->add_control(
                'position',
                [
                    'label'     => __( 'Position', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'default'   => '',
                ]
            );

            $repeater->add_control(
                'slider_bg_color',
                [
                    'label'        => __( 'Image Overlay Color', 'htevent' ),
                    'type'         => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htevent-hero-two-image:before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );  
            $repeater->add_control(
                'slimage',
                [
                    'label'     => __( 'Slider Image', 'htevent' ),
                    'type'      => Controls_Manager::MEDIA,
                    'default'   => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'slider2_list',
                [
                    'label'     => __( 'Slider', 'htevent' ),
                    'type'      => Controls_Manager::REPEATER,
                    'fields'    => $repeater->get_controls(),
                    'condition' => [
                        'slider_style' => '2',
                    ],
                    'default'   => [
                        [
                            'title'       => __( 'Financial Improvement for Company', 'htevent' ),
                            'name'        => __( 'Mickel Jackbar', 'htevent' ),
                            'position'    => __( '(Business Consultent)', 'htevent' ),
                            'slbutton'    => __( 'read more', 'htevent' ),
                            'slbuttonlink'=> __( '#', 'htevent' ),
                        ],
                        [
                            'title'       => __( 'Financial Improvement for Company', 'htevent' ),
                            'name'        => __( 'Mickel Jackbar', 'htevent' ),
                            'position'    => __( '(Business Consultent)', 'htevent' ),
                            'slbutton'    => __( 'read more', 'htevent' ),
                            'slbuttonlink'=> __( '#', 'htevent' ),
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

            //slider style 2 end


        //slider style 3 start
        $repeater = new Repeater();
            $repeater->add_control(
                'title',
                [
                    'label'     => __( 'Title (HTML tag supported)', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                ]
            );

            $repeater->add_control(
                'date',
                [
                    'label'     => __( 'Date', 'htevent' ),
                    'type'      => Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'location_icon',
                [
                    'label'     => __( 'Location Icon', 'htevent' ),
                    'type'      => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa fa-tree',
                        'library' => 'solid',
                    ],
                ]
            );
            $repeater->add_control(
                'location',
                [
                    'label'     => __( 'Location', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                ]
            );

            $repeater->add_control(
                'slider3_bg_color',
                [
                    'label'        => __( 'Image Overlay Color', 'htevent' ),
                    'type'         => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-slider-2.htevent-hero-slider-three .item:before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );  
            $repeater->add_control(
                'slimage', 
                [
                    'label'     => __( 'Slider Image', 'htevent' ),
                    'type'      => Controls_Manager::MEDIA,
                    'default'   => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'slider3_list',
                [
                    'label'     => __( 'Slider', 'htevent' ),
                    'type'      => Controls_Manager::REPEATER,
                    'fields'    => $repeater->get_controls(),
                    'condition' => [
                        'slider_style' => '3',
                    ],
                    'default'   => [
                        [
                            'title'       => __( 'New Concert Comming soon', 'htevent' ),
                            'date'        => __( '13 feb 2021  @12.00 am', 'htevent' ),
                            'location'    => __( 'Sweet Gallery, USA', 'htevent' ),
                        ],
                        [
                            'title'       => __( 'New Concert Comming soon', 'htevent' ),
                            'date'        => __( '13 feb 2022  @12.00 am', 'htevent' ),
                            'location'    => __( 'Sweet Gallery, USA', 'htevent' ),
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

            //slider style 3 end


        //slider style 4 start
        $repeater = new Repeater();
            $repeater->add_control(
                'title',
                [
                    'label'     => __( 'Title (HTML tag supported)', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                ]
            );

            $repeater->add_control(
                'date',
                [
                    'label'     => __( 'Date', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                ]
            );

            $repeater->add_control(
                'slider3_bg_color',
                [
                    'label'        => __( 'Image Overlay Color', 'htevent' ),
                    'type'         => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htevent-hero-slider-four .item:before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );  
            $repeater->add_control(
                'slimage', 
                [
                    'label'     => __( 'Slider Image', 'htevent' ),
                    'type'      => Controls_Manager::MEDIA,
                    'default'   => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'slider4_list',
                [
                    'label'     => __( 'Slider', 'htevent' ),
                    'type'      => Controls_Manager::REPEATER,
                    'fields'    => $repeater->get_controls(),
                    'condition' => [
                        'slider_style' => '4',
                    ],
                    'default'   => [
                        [
                            'title'       => __( 'All Event Tickets, Choose Yours And Buy Tickets', 'htevent' ),
                            'date'        => __( '13 Feb, 2021  -  Total 5000 Tickets', 'htevent' ),
                        ],
                        [
                            'title'       => __( 'All Event Tickets, Choose Yours And Buy Tickets', 'htevent' ),
                            'date'        => __( '13 Feb, 2022  -  Total 5000 Tickets', 'htevent' ),
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

            //slider style 4 end

        $this->end_controls_section();
        // content tab

        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',
            [
                'label' => __( 'Slider Option', 'htevent' ),
                'condition' => [
                    'slider_style' => '1',
                ],
            ]
        );

        $this->add_responsive_control(
                'slider_height',
                [
                    'label' => __( 'Slider Height', 'htevent' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => [
                        'px'        => [
                            'min'   => 50,
                            'max'   => 1000,
                        ],
                    ],
                    'devices'   => [ 'desktop', 'tablet', 'mobile' ],
                    'desktop_default' => [
                        'size'  => 790,
                        'unit'  => 'px',
                    ],
                    'tablet_default' => [
                        'size' => 500,
                        'unit' => 'px',
                    ],
                    'mobile_default' => [
                        'size' => 350,
                        'unit' => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htevent-hero-slider.htevent-hero-slider-one .htevent-item' => 'min-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            ); 
            $this->add_control(
                'slautoplay',
                [
                    'label'         => __( 'Auto play', 'htevent' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'return_value'  => 'yes',
                    'default'       => 'yes',
                ]
            );

            $this->add_control(
                'slautoplayspeed',
                [
                    'label'             => __( 'Auto play speed', 'htevent' ),
                    'type'              => Controls_Manager::NUMBER,
                    'min'               => 5,
                    'min'               => 300,
                    'step'              => 100,
                    'default'           => 5000,
                    'condition'         => [
                        'slautoplay'    => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label'         => __( 'Arrow', 'htevent' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'return_value'  => 'yes',
                    'default'       => 'yes',
                ]
            );

            $this->add_control(
                'sldots',
                [
                    'label'         => __( 'Dots', 'htevent' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'return_value'  => 'yes',
                    'default'       => 'yes',
                ]
            );

        $this->end_controls_section();

        // Top Title Style tab section
        $this->start_controls_section(
            'slider_style_top',
            [
                'label' => __( 'Top Title style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_style' => '1',
                ],
            ]
        );

            $this->add_control(
                'slider_title_heading_top',
                [
                    'label' => __( 'Title', 'htevent' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color_top',
                [
                    'label'     => __( 'Title color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'	=> '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htevent-item h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'titletypography_top',
                    'selector'  => '{{WRAPPER}} .htevent-item h2',
                ]
            );

            $this->add_responsive_control(
                'titlemargin_top',
                [
                    'label'      => __( 'Margin', 'htevent' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .htevent-item h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();


        // style one start
        $this->start_controls_section(
            'slider_style_css',
            [
                'label' => __( 'Title style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_style' => '1',
                ],
            ]
        );

            $this->add_control(
                'slider_title_heading',
                [
                    'label' => __( 'Title', 'htevent' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => __( 'Title color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'	=> '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htevent-item h1' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'titletypography',
                    'selector'  => '{{WRAPPER}} .htevent-item h1',
                ]
            );

            $this->add_responsive_control(
                'titlemargin',
                [
                    'label'      => __( 'Margin', 'htevent' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors'  => [
                        '{{WRAPPER}} .htevent-item h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Sub title style tab section
        $this->start_controls_section(
            'subtitle_style',
            [
                'label' => __( 'Sub title style', 'htevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_style' => '1',
                ],
            ]
        );  

            $this->add_control(
                'subtitle_color',
                [
                    'label'     => __( 'Sub Title color', 'htevent' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'	=> '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .htevent-item h3' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'subtitletypography',
                    'selector'  => '{{WRAPPER}} .htevent-item h3',
                ]
            );

            $this->add_responsive_control(
                'subtitlemargin',
                [
                    'label' => __( 'Margin', 'htevent' ),
                    'type'  => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em' ],
                    'selectors'     => [
                        '{{WRAPPER}} .htevent-item h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Button style tab section
        $this->start_controls_section(
            'slbutton_style',
            [
                'label' => __( 'Button style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_style' => '1',
                ],
            ]
        );


            $this->start_controls_tabs(
                'btnstyle_tabs'
            );

                $this->start_controls_tab(
                    'btnstyle_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );

                    $this->add_control(
                        'slbtn_color',
                        [
                            'label'     => __( 'Button background color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'	=> '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .htevent-item a' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'      => 'btntypography',
                            'selector'  => '{{WRAPPER}} .htevent-item a',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'border',
                            'label'     => __( 'Button Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-item a, .htevent-item a::before',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label'     => __( 'Border Radius', 'htevent' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-item a,.htevent-item a::before' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'buttonpadding',
                        [
                            'label'     => __( 'Padding', 'htevent' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units'=> [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htevent-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                    $this->add_responsive_control(
                        'buttonmargin',
                        [
                            'label'         => __( 'Margin', 'htevent' ),
                            'type'          => Controls_Manager::DIMENSIONS,
                            'size_units'    => [ 'px', '%', 'em' ],
                            'selectors'     => [
                                '{{WRAPPER}} .htevent-item a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Hover tab for button
                $this->start_controls_tab(
                    'btnstyle_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                    $this->add_control(
                        'slbtnhov_color',
                        [
                            'label'     => __( 'Button background color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'	=> '#ff0042',
                            'selectors' => [
                                '{{WRAPPER}} .htevent-item a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slbtnhov_bordercolor',
                        [
                            'label'     => __( 'Button border color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'	=> '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .htevent-item a:hover,.htevent-item a:hover::before' => 'border-color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();// End tab hover

            $this->end_controls_tabs();// tabs end

        $this->end_controls_section();

        //end style one

        // style style2
        $this->start_controls_section(
            'slider_style2',
            [
                'label' => __( 'Style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_style' => '2',
                ],
            ]
        );

                //title start
               $this->add_control(
                    'slider2_heading',
                    [
                        'label'     => __( 'Title', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ]
                );

               $this->add_control(
                    'slider2_color',
                    [
                        'label'     => __( 'Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#333333',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-two-content h1' => 'color: {{VALUE}};',
                        ],
                    ]
                );
               $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'slider2_typography',
                        'selector'  => '{{WRAPPER}} .htevent-hero-two-content h1',
                    ]
                );
                $this->add_responsive_control(
                    'slider2_title_margin',
                    [
                        'label'     => __( 'Margin', 'htevent' ),
                        'type'      => Controls_Manager::DIMENSIONS,
                        'size_units'=> [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-two-content h1' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
               //title end

                //name start
               $this->add_control(
                    'slider2_name_heading',
                    [
                        'label'     => __( 'Name & Position', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ]
                );

               $this->add_control(
                    'slider2_name_color',
                    [
                        'label'     => __( 'Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#333333',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-two-image .details h4' => 'color: {{VALUE}};',
                        ],
                    ]
                );
               $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'slider2_name_typography',
                        'selector'  => '{{WRAPPER}} .htevent-hero-two-image .details h4',
                    ]
                );
               //name end

                   //button start
                   $this->add_control(
                        'slider2_button_heading',
                        [
                            'label'     => __( 'Button', 'htevent' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before'
                        ]
                    );

                    $this->start_controls_tabs(
		                'slider_style2_css'
		            );

                $this->start_controls_tab(
                    'slider2_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );
                   $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'      => 'slider2_button_typography',
                            'selector'  => '{{WRAPPER}} .htevent-hero-two-content a',
                        ]
                    );

                   $this->add_control(
                        'slider2_button_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'	=> '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .htevent-hero-two-content a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                   $this->add_control(
                        'slider2_buttonbg_color',
                        [
                            'label'     => __( 'Background', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'	=> '#0056ff',
                            'selectors' => [
                                '{{WRAPPER}} .htevent-hero-two-content a' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'slider2_button_border',
                            'label'     => __( 'Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-hero-two-content a',
                        ]
                    );

                    $this->add_responsive_control(
                        'slider2_button_border_radius',
                        [
                            'label'     => __( 'Border Radius', 'htevent' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-hero-two-content a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'slider2_buttonpadding',
                        [
                            'label'     => __( 'Padding', 'htevent' ),
                            'type'      => Controls_Manager::DIMENSIONS,
                            'size_units'=> [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htevent-hero-two-content a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'slider2_buttonmargin',
                        [
                            'label'         => __( 'Margin', 'htevent' ),
                            'type'          => Controls_Manager::DIMENSIONS,
                            'size_units'    => [ 'px', '%', 'em' ],
                            'selectors'     => [
                                '{{WRAPPER}} .htevent-hero-two-content a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Hover tab for button
                $this->start_controls_tab(
                    'slider_style2_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                    $this->add_control(
                        'slider2_slbtnhov_color',
                        [
                            'label'     => __( 'color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'	=> '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .htevent-hero-two-content a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'slider2_bghover_color',
                        [
                            'label'     => __( ' Background', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'default'	=> '#ff0042',
                            'selectors' => [
                                '{{WRAPPER}} .htevent-hero-two-content a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name'      => 'slider2_buttonhover_border',
                            'label'     => __( 'Border', 'htevent' ),
                            'selector'  => '{{WRAPPER}} .htevent-hero-two-content a:hover',
                        ]
                    );

                   

                $this->end_controls_tab();// End tab hover

            $this->end_controls_tabs();// tabs end

        $this->end_controls_section();

        //style two end

        // style style3
        $this->start_controls_section(
            'slider_style3',
            [
                'label' => __( 'Style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_style' => '3',
                ],
            ]
        );


            $this->start_controls_tabs(
                'slider_style3_css'
            );
                //title start
               $this->add_control(
                    'slider3_heading',
                    [
                        'label'     => __( 'Title', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ]
                );

               $this->add_control(
                    'slider3_color',
                    [
                        'label'     => __( 'Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-three h1' => 'color: {{VALUE}};',
                        ],
                    ]
                );
               $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'slider3_typography',
                        'selector'  => '{{WRAPPER}} .htevent-hero-content-three h1',
                    ]
                );
                $this->add_responsive_control(
                    'slider3_title_margin',
                    [
                        'label'     => __( 'Margin', 'htevent' ),
                        'type'      => Controls_Manager::DIMENSIONS,
                        'size_units'=> [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-three h1' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
               //title end
               //locatin start
               $this->add_control(
                    'slider3_location_heading',
                    [
                        'label'     => __( 'Location', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ]
                );

               $this->add_control(
                    'slider3_location_color',
                    [
                        'label'     => __( 'Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-three ul li' => 'color: {{VALUE}};',
                        ],
                    ]
                );
               $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'slider3_location_typography',
                        'selector'  => '{{WRAPPER}} .htevent-hero-content-three ul li',
                    ]
                );
                $this->add_responsive_control(
                    'slider3_location_margin',
                    [
                        'label'     => __( 'Margin', 'htevent' ),
                        'type'      => Controls_Manager::DIMENSIONS,
                        'size_units'=> [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-three ul li' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
               //title end

            $this->end_controls_tabs();// tabs end

        $this->end_controls_section();
        //style3 end


        // style style4
        $this->start_controls_section(
            'slider_style4',
            [
                'label' => __( 'Style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_style' => '4',
                ],
            ]
        );


            $this->start_controls_tabs(
                'slider_style4_css'
            );
                //title start
               $this->add_control(
                    'slider4_heading',
                    [
                        'label'     => __( 'Title', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ]
                );

               $this->add_control(
                    'slider4_color',
                    [
                        'label'     => __( 'Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                         'default'	=> '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-four h1' => 'color: {{VALUE}};',
                        ],
                    ]
                );
               $this->add_control(
                    'slider4_border_color',
                    [
                        'label'     => __( 'Border', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                         'default'	=> '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-four h1::before' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
               $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'slider4_typography',
                        'selector'  => '{{WRAPPER}} .htevent-hero-content-four h1',
                    ]
                );
                $this->add_responsive_control(
                    'slider4_title_margin',
                    [
                        'label'     => __( 'Margin', 'htevent' ),
                        'type'      => Controls_Manager::DIMENSIONS,
                        'size_units'=> [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-four h1' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
               //title end
               //locatin start
               $this->add_control(
                    'slider4_date_heading',
                    [
                        'label'     => __( 'Date', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ]
                );

               $this->add_control(
                    'slider4_date_color',
                    [
                        'label'     => __( 'Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                          'default'	=> '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-four h4' => 'color: {{VALUE}};',
                        ],
                    ]
                );
               $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'slider4_date_typography',
                        'selector'  => '{{WRAPPER}} .htevent-hero-content-four h4',
                    ]
                );
                $this->add_responsive_control(
                    'slider4_date_margin',
                    [
                        'label'     => __( 'Margin', 'htevent' ),
                        'type'      => Controls_Manager::DIMENSIONS,
                        'size_units'=> [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-hero-content-four h4' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
               //title end

            $this->end_controls_tabs();// tabs end

        $this->end_controls_section();
        //style4 end






    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();

        // Slider Option
        $slider_style = $settings['slider_style'];

        $sliders = $settings['sliders_list'];

        //slider button
        $slider_settings = [
            'arrows'    => ('yes' === $settings['slarrows']),
            'dots'      => ('yes' === $settings['sldots']),
            'autoplay'  => ('yes' === $settings['slautoplay']),
            'autoplay_speed' => absint($settings['slautoplayspeed']),
        ];
        $this->add_render_attribute( 'slider_attr', 'class', 'htevent-hero-slider htevent-hero-slider-one' );
        $this->add_render_attribute( 'slider_attr', 'data-settings', wp_json_encode($slider_settings) );
    ?>

    <?php if( $slider_style == '1' ): ?>
        
        <div <?php echo $this->get_render_attribute_string( 'slider_attr' ); ?>>

            <?php foreach ( $sliders as $item ):
            $image = $item['slimage'];
            if( $item['slimage']['url'] ){
                $background = 'background-image:url('.$item['slimage']['url'].')';
            }
            $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';  
            ?>
            <div class="htevent-item" style="<?php echo $background; ?>">
                <div class="container">
                    <div class="row">
                        <!-- Hero One Content Start -->
                        <div class="hero-one-content text-center col-12">
                            <?php if( !empty($item['topsltitle'] ) ): ?>
                            <h2><?php echo wp_kses_post( $item['topsltitle'] ); ?></h2>
                        <?php endif; if( !empty( $item['sltitle'] ) ): ?>
                            <h1><?php echo wp_kses_post( $item['sltitle'] ); ?></h1>
                        <?php endif; if( !empty( $item['slsubtitle'] ) ): ?>
                            <h3><?php echo wp_kses_post( $item['slsubtitle'] ); ?></h3>
                        <?php endif; if( !empty( $item['slbutton'] ) ): ?>
                            <?php  echo '<a href="'.esc_url( $item['slbuttonlink']['url'] ).'" '.$target.' '.$nofollow.'>' . $item['slbutton'].'</a>'; ?>
                        <?php endif; ?>
                        </div><!-- Hero One Content End -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div><!-- Hero Section End -->

    <?php 
        elseif($slider_style == '2'): ?>
        <div class="htevent-hero-slider2 htevent-hero-slider-two hero-section section">
            <?php 
                if( $settings['slider2_list'] ): 
                foreach ( $settings['slider2_list'] as $item ):
                $target = $item['slbuttonlink']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $item['slbuttonlink']['nofollow'] ? ' rel="nofollow"' : '';  
            ?>

            <div class="item bg-light-gray container-fluid">
                <div class="row flex-row-reverse">

                    <!-- Hero Two Content Start -->
                    <div class="htevent-hero-two-image col-lg-6 col-12">

                        <img src="<?php echo  $item['slimage']['url'] ; ?>" alt="<?php esc_attr_e( 'image', 'htevent'); ?>">
                        <div class="details">
                            <?php if( !empty( $item['name'] ) ){
                                echo sprintf('<h4>%s</h4>',esc_html( $item['name'] ) );
                            } ?>
                            <?php if( !empty( $item['position'] ) ){
                                echo sprintf('<h4>%s</h4>',esc_html( $item['position'] ) );
                            } ?>
                        </div>
                    </div><!-- Hero Two Content End -->
                    <!-- Hero Two Content Start -->
                    <div class="htevent-hero-two-content col-lg-6 col-12">
                        <?php if( !empty( $item['title'] )){
                            echo sprintf('<h1>%s</h1>',esc_html( $item['title'] ));
                        } ?>
                       <?php  if( !empty( $item['slbutton'] ) ): ?>
                            <?php  echo '<a href="'.esc_url( $item['slbuttonlink']['url'] ).'" '.$target.' '.$nofollow.'>' . $item['slbutton'].'</a>'; ?>
                        <?php endif; ?>

                    </div><!-- Hero Two Content End -->
                </div>
            </div>

        <?php endforeach; endif; ?>
    </div>
    

    <?php
    elseif($slider_style == '3'):  ?>

         <!-- Hero Slider Three With Slider Two Activation Class -->
    <div class="hero-slider-2 htevent-hero-slider-three">

       
        <?php if(!empty( $settings['slider3_list'] ) ): 
            foreach( $settings['slider3_list'] as $item ):

                if( $item['slimage']['url'] ){
                    $background = 'background-image:url('.$item['slimage']['url'].')';
                }
        ?>

        <div class="item" style="<?php echo $background; ?>">

            <!-- Hero One Content Start -->
            <div class="htevent-hero-content-three text-center">
                <?php 
                    if(!empty( $item['title']) ){
                        echo sprintf('<h1>%s</h1>', esc_html( $item['title'] ) );
                 } 
                ?>
                <ul>
                    <?php 
                        if( !empty( $item['date'] ) ){
                        echo sprintf('<li>%s</li>', esc_html( $item['date'] ) );
                        }
                        if( !empty( $item['location'] ) ){
                        echo sprintf('<li>%s%s</li>',HTevent_Icon_manager::render_icon( $item['location_icon'], [ 'aria-hidden' => 'true' ] ) ,esc_html( $item['location'] ) );
                        }
                     ?>
                </ul>

            </div><!-- Hero One Content End -->

        </div>
        <?php endforeach; endif;  ?>

    </div><!-- Hero Section End -->

    <?php
    else: ?>

 <!-- Hero Slider Four With Slider Two Activation Class -->
    <div class="hero-slider-2 htevent-hero-slider-four">

        <?php 
            if( $settings['slider4_list'] ): 
            foreach( $settings['slider4_list'] as $item ):

            if( $item['slimage']['url'] ){
                $background = 'background-image:url('.$item['slimage']['url'].')';
            }

        ?>
        <div class="item" style="<?php echo $background; ?>">
            <div class="htevent-hero-content-four align-items-end text-center container">
                <?php 
                    if( !empty( $item['title']) ){
                        echo sprintf('<h1>%s</h1>',esc_html( $item['title'] ) );
                    } 
                    if( !empty( $item['date']) ){
                        echo sprintf('<h4>%s</h4>',esc_html( $item['date'] ) );
                    } 
                ?>
            </div>
        </div>

    <?php endforeach; endif; ?>

        </div>
    </div><!-- Hero Section End -->

    <?php

    endif; ?>

    <?php

    }
}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Event_Slider() );