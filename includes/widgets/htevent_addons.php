<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Event extends Widget_Base {

    public function get_name() {
        return 'htevent-event-addons';
    }
    
    public function get_title() {
        return __( 'HT Event: Event', 'htevent' );
    }

    public function get_icon() {
        return 'eicon-import-kit';
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
            'htevent_content',
            [
                'label' => __( 'HTevent', 'htevent' ),
            ]
        );

            $this->add_control(
                'event_style',
                [
                    'label'   => __( 'Content Source', 'htevent' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        "style1"    => __( 'Event Style One', 'htevent' ),
                        "style2"    => __( 'Event Style Two', 'htevent' ),
                        "style3"    => __( 'Event Style Three', 'htevent' ),
                        "style4"    => __( 'Event Style Four', 'htevent' ),
                        "style5"    => __( 'Event Style Five', 'htevent' ),
                        "style6"    => __( 'Event Style Six', 'htevent' ),
                    ],
                ]
            );
            $this->add_control(
                'htevent_categories_per_page',
                [
                    'label'   => __( 'Show Post Per Page', 'htevent' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => 4,
                    'min'     => 1,
                    'max'     => 100,
                    'step'    => 1,
                ]
            );

            $this->add_control(
                'categoy_style2',
                [
                    'label'         => __( 'Category', 'htevent' ),
                    'type'          => Controls_Manager::SELECT2,
                    'label_block'   => true,
                    'multiple'      => true,
                    'options'       => htevent_categories(),
                    'condition'     => [
                        'event_style' => array( 'style2','style3','style4'),
                    ],
                ]
            );

            //repeater
            $repeater = new Repeater();

            $repeater->add_control(
                'catgory_title', [
                    'label'       => __( 'Title', 'htevent' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'categoy_content', [
                    'label'         => __( 'Category', 'htevent' ),
                    'label'         => __( 'Category', 'htevent' ),
                    'type'          => Controls_Manager::SELECT2,
                    'label_block'   => true,
                    'multiple'      => true,
                    'options'       => htevent_categories(),
                ]
            );

            $this->add_control(
                'htevent_content_list',
                [
                    'label'     => __( 'Repeater List', 'htevent' ),
                    'type'      => Controls_Manager::REPEATER,
                    'fields'    => $repeater->get_controls(),
                    'condition'=>[
                        'event_style'=> array('style1','style6'),
                    ],
                    'default'   => [
                        [
                            'catgory_title'     => __( 'day-01<span>02-01-2021</span>', 'htevent' ),
                            'categoy_content'   => __( '', 'htevent' ),
                        ],
                        [
                            'catgory_title'     => __( 'day-02 <span>03-03-2021</span>', 'htevent' ),
                            'categoy_content'   => __( '', 'htevent' ),
                           
                        ],
                    ],

                    'title_field' => '{{{ catgory_title }}}',
                ]
            );
        //end repeater

        $this->end_controls_section(); // Content Section End


         // Slider Button stle
            $this->start_controls_section(
                'htevent-slider-controller-style',
                [
                    'label'             => __( 'Slider Controller Style', 'htevent' ),
                    'condition'         => [
                        'event_style'   => 'style4',
                    ]
                ]
            );

                $this->start_controls_tabs(
                    'htevent_sliderbtn_style_tabs'
                );

                    // Slider Button style Normal
                    $this->start_controls_tab(
                        'htevent_sliderbtn_style_normal_tab',
                        [
                            'label' => __( 'Normal', 'htevent' ),
                        ]
                    );

                        $this->add_control(
                            'button_style_heading',
                            [
                                'label'     => __( 'Navigation Arrow', 'htevent' ),
                                'type'      => Controls_Manager::HEADING,
                                'separator' => 'before',
                            ]
                        );

                        $this->add_control(
                            'button_color',
                            [
                                'label'     => __( 'Color', 'htevent' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .upcoming-event-wrapper button.slick-arrow' => 'color: {{VALUE}};',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_border_color',
                            [
                                'label'     => __( 'Border Color', 'htevent' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .upcoming-event-wrapper button.slick-arrow' => 'border-color: {{VALUE}};',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_bg_color',
                            [
                                'label'     => __( 'Background Color', 'htevent' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .upcoming-event-wrapper button.slick-arrow' => 'background-color: {{VALUE}};',
                                ],
                            ]
                        );

                        

                        $this->add_control(
                            'button_style_dots_heading',
                            [
                                'label'     => __( 'Navigation Dots', 'htevent' ),
                                'type'      => Controls_Manager::HEADING,
                                'separator' => 'before',
                            ]
                        );

                            $this->add_control(
                                'dots_bg_color',
                                [
                                    'label'     => __( 'Background Color', 'htevent' ),
                                    'type'      => Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .upcoming-event-wrapper ul.slick-dots li' => 'background-color: {{VALUE}} !important;',
                                    ],
                                ]
                            );


                    $this->end_controls_tab();// Normal button style end

                    // Button style Hover
                    $this->start_controls_tab(
                        'product_sliderbtn_style_hover_tab',
                        [
                            'label' => __( 'Hover', 'htevent' ),
                        ]
                    );


                        $this->add_control(
                            'button_style_arrow_heading',
                            [
                                'label'     => __( 'Navigation', 'htevent' ),
                                'type'      => Controls_Manager::HEADING,
                                'separator' => 'before',
                            ]
                        );

                        $this->add_control(
                            'button_hover_color',
                            [
                                'label'     => __( 'Color', 'htevent' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .upcoming-event-wrapper button.slick-arrow:hover' => 'color: {{VALUE}};',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_border_hover_color',
                            [
                                'label'     => __( 'Border Color', 'htevent' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .upcoming-event-wrapper button.slick-arrow:hover' => 'border-color: {{VALUE}};',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_hover_bg_color',
                            [
                                'label'     => __( 'Background', 'htevent' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .upcoming-event-wrapper button.slick-arrow:hover' => 'background-color: {{VALUE}} !important;',
                                ],
                            ]
                        );

                        $this->add_control(
                            'button_style_dotshov_heading',
                            [
                                'label'     => __( 'Navigation Dots', 'htevent' ),
                                'type'      => Controls_Manager::HEADING,
                                'separator' => 'before',
                            ]
                        );

                        $this->add_control(
                            'dots_hover_bg_color',
                            [
                                'label'     => __( 'Background Color', 'htevent' ),
                                'type'      => Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .upcoming-event-wrapper ul.slick-dots li:hover' => 'background-color: {{VALUE}} !important;',
                                ],
                            ]
                        );

                    $this->end_controls_tab();// Hover button style end

                $this->end_controls_tabs();

            $this->end_controls_section(); // Tab option end

        // Css Style1 start
        $this->start_controls_section(
            'htevent_style',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_style'=> 'style1',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'htevent_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );

                $this->add_control(
                    'tab_font_heading',
                    [
                        'label'     => __( 'Tab Font Color', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $this->add_control(
                    'tab_menu_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=>'#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-one-schedule-tab-content.nav a ' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                   
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'tabmenutypography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-one-schedule-tab-content.nav a',
                    ]
                );
                $this->add_control(
                    'tab_font_heading_day_designation',
                    [
                        'label'     => __( 'Day Category Designatin', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'day_cat_des_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=>'#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-one-schedule-list .htevent-one-single-schedule h5,.htevent-one-schedule-tab-content a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
  
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'daycatdestypography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-one-schedule-list .htevent-one-single-schedule h5,.category-title h5 a',
                    ]
                );
                $this->add_control(
                    'tab_font_heading_speaker_designation',
                    [
                        'label'     => __( 'Time Title Spacker', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'time_title_spacker_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=>'#282828',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-one-schedule-list .htevent-one-single-schedule h4,.htevent-one-schedule-list .htevent-one-single-schedule h4 a,.htevent-one-schedule-list .htevent-one-single-schedule h4 a,.htevent-one-schedule-list .htevent-one-single-schedule h4,.category-title h4 a' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'timetitlespackertypography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-one-schedule-list .htevent-one-single-schedule h4,.htevent-one-schedule-list .htevent-one-single-schedule h4 a,.htevent-one-schedule-list .htevent-one-single-schedule h4 a,.htevent-one-schedule-list .htevent-one-single-schedule h4,.category-title h4 a',
                    ]
                );

                $this->add_control(
                    'tab_font_heading_button_designation',
                    [
                        'label'     => __( 'Button', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'tab_button_color',
                    [
                        'label'         => __( ' Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default' 		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-one-schedule-list .buy-button a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'buttontypography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-one-schedule-list .buy-button a',
                    ]
                );

                $this->add_control(
                    'htevent_button_color',
                    [
                        'label'     => __( 'Background', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'    =>'#78a3f8',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-one-schedule-list .buy-button a' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'htevent_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );
                $this->add_control(
                    'time_title_hover_color',
                    [
                        'label'         => __( 'Title', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .category-title h4 a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'tab_menu_hover_color',
                    [
                        'label'         => __( 'Button Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-one-schedule-list .buy-button a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );    
                $this->add_control(
                    'htevent_button_hover_color',
                    [
                        'label'     => __( 'Button Background', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'		=> '#ff0042',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-one-schedule-list .buy-button a:hover' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // css Style1 end

        // Css Style2 start
        $this->start_controls_section(
            'htevent_style2',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_style'=> 'style2',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style2_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'htevent_style2_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );

                $this->add_control(
                    'day_cat_des_color2',
                    [
                        'label'         => __( 'Background', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#f9f9f9',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-two-schedule-list .htevent-two-single-item' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'day_cat_bg_color2',
                    [
                        'label'         => __( 'Background', 'htevent' ),
                        'type'          => Controls_Manager::MEDIA,
                        
                    ]
                );

                $this->add_control(
                    'ttyle2_title_typography',
                    [
                        'label'     => __( 'Title', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
 
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography2',
                        'label'     => __( 'Title', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-two-single-item .htevent-title h4 a',
                    ]
                );
                $this->add_control(
                    'style2_title_color2',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#282828',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-two-single-item .htevent-title h4 a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'ttyle2_speaker_typography',
                    [
                        'label'     => __( 'Speaker', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'spackertypography2',
                        'label'     => __( 'Speaker', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .speaker_text h4',
                    ]
                );

                $this->add_control(
                    'style2_speaker_color2',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#282828',
                        'selectors'     => [
                            '{{WRAPPER}} .speaker_text h4 a' => 'color: {{VALUE}};',
                        ],
                    ]
                );


                $this->add_control(
                    'ttyle2_designation_typography',
                    [
                        'label'     => __( 'Designatin', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $this->add_control(
                    'style2_designation_color2',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#282828',
                        'selectors'     => [
                            '{{WRAPPER}} .speaker_text p' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'cattypography2',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .speaker_text p',
                    ]
                );

                $this->add_control(
                    'ttyle2_time_typography',
                    [
                        'label'     => __( 'Time & Location', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $this->add_control(
                    'style2_time_location_color2',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#282828',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-location h5' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'timelocationtypography2',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-location h5',
                    ]
                );


                $this->add_control(
                    'ttyle2_button_typography',
                    [
                        'label'     => __( 'Button', 'htevent' ),
                        'type'      => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $this->add_control(
                    'tab_button_color2',
                    [
                        'label'         => __( 'Button Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-two-schedule-list .buy-button a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'buttontypography2',
                        'label'     => __( ' Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-two-schedule-list .buy-button a',
                    ]
                );

                $this->add_control(
                    'htevent_button_color2',
                    [
                        'label'     => __( 'Background', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'defaul'	=> '#0056ff',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-two-schedule-list .buy-button a' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'htevent_style_hover_tab2',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                $this->add_control(
                    'tab_menu_hover_color2',
                    [
                        'label'         => __( 'Button Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                          'selectors'     => [
                            '{{WRAPPER}} .htevent-two-schedule-list .buy-button a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );    
                $this->add_control(
                    'htevent_button_hover_color2',
                    [
                        'label'     => __( 'Button Background', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#ff0042',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-two-schedule-list .buy-button a:hover' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
 
                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // css Style2 end

        // Css Style3 start
        $this->start_controls_section(
            'htevent_style3',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_style'=> 'style3',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style3_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'htevent_style3_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );

                $this->add_control(
                    'style3_time',
                    [
                        'label'         => __( 'Time, Location & Designatin', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );

                $this->add_control(
                    'location_color3',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#282828',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-three-single-item ul li p' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'time_location_typography3',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-three-single-item ul li p',
                    ]
                );

                $this->add_control(
                    'style3_title',
                    [
                        'label'         => __( 'Title', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );

                $this->add_control(
                    'title_color3',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#000000',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-three-single-item ul li h4 a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography3',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-three-single-item ul li h4 a',
                    ]
                );

                $this->add_control(
                    'style3_speaker',
                    [
                        'label'         => __( 'Speaker', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );
                $this->add_control(
                    'spacker_color3',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .speaker_text h4' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'spackertypography3',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .speaker_text h4',
                    ]
                );

                $this->add_control(
                    'style3_button',
                    [
                        'label'         => __( 'Button', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );
                $this->add_control(
                    'tab_button_color3',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-three-single-item ul li .buy-button a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'buttontypography3',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-three-single-item ul li .buy-button a',
                    ]
                );

                $this->add_control(
                    'htevent_button_color3',
                    [
                        'label'     => __( 'Border Color', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .htevent-three-single-item ul li .buy-button a' => 'border-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'htevent_style_hover_tab3',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                $this->add_control(
                    'title_hover_color3',
                    [
                        'label'         => __( 'Title Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-three-single-item ul li h4 a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'tab_menu_hover_color3',
                    [
                        'label'         => __( 'Button Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-three-single-item ul li .buy-button a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );    
                $this->add_control(
                    'htevent_button_hover_color3',
                    [
                        'label'     => __( 'Button Background', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#ff0042',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-three-single-item ul li .buy-button a:hover' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
 
                $this->add_control(
                    'htevent_button_border_hover3',
                    [
                        'label'     => __( 'Button Background', 'htevent' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'	=> '#ff0042',
                        'selectors' => [
                            '{{WRAPPER}} .htevent-three-single-item ul li .buy-button a:hover' => 'border-color: {{VALUE}};',
                        ],
                    ]
                ); 
                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // css Style3 end

        // Css Style4 start
        $this->start_controls_section(
            'htevent_style4',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_style'=> 'style4',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style4_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'htevent_style4_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );

                $this->add_control(
                    'title_color4',
                    [
                        'label'         => __( 'Title Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .single-upcoming-event .content .title a' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography4',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .single-upcoming-event .content .title a',
                    ]
                );

                $this->add_control(
                    'date_bg4',
                    [
                        'label'         => __( 'Date Background Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ff0042',
                        'selectors'     => [
                            '{{WRAPPER}} .single-upcoming-event .date' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );


                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'htevent_style_hover_tab4',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                $this->add_control(
                    'title_hover_color4',
                    [
                        'label'         => __( 'Title Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ff0042',
                        'selectors'     => [
                            '{{WRAPPER}} .single-upcoming-event .content .title a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
 

                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // css Style4 end


        // Css Style5 start
        $this->start_controls_section(
            'htevent_style5',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_style'=> 'style5',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style5_tabs' );

               $this->add_control(
                    'title5_options',
                    [
                        'label' => __( 'Title', 'htevent' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $this->add_control(
                    'title_color5',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-event-category .content .cat-name' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography5',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-single-event-category .content .cat-name',
                    ]
                );
                $this->add_control(
                    'bg_color5',
                    [
                        'label'         => __( 'Background', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-event-category::before' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'title5_icon',
                    [
                        'label' => __( 'Icon', 'htevent' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'icon_color5',
                    [
                        'label'         => __( ' Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-event-category .content i' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'icon_size',
                [
                    'label'      => __( 'Font size', 'htevent' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'selectors'  => [
                        '{{WRAPPER}} .htevent-single-event-category .content i' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->end_controls_tabs();

        $this->end_controls_section(); // css Style4 end

        // Css Style6 start
        $this->start_controls_section(
            'htevent_style6',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'event_style'=> 'style6',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style6_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'htevent_style6_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );
                //tab start
                $this->add_control(
                    'tab6_header',
                    [
                        'label'         => __( 'Tab', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );

                $this->add_control(
                    'tab6_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#717171',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-schedule-tab-list a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'tab6_color_active',
                    [
                        'label'         => __( 'Acrive Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-schedule-tab-list a.active' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'tab6_typography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-schedule-tab-list a',
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'      => 'tab6_border',
                        'label'     => __( 'Border', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-schedule-tab-list a',
                    ]
                );
                //tab end

                //title start
                $this->add_control(
                    'tab6_title',
                    [
                        'label'         => __( 'Title', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );
                $this->add_control(
                    'title6_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#717171',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .head h4 a' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'title6_typography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-single-schedule .head h4',
                    ]
                );
                $this->add_control(
                    'title6_margin',
                    [
                        'label' => __( 'Margin', 'htevent' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .head h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                //title end

                //location
                $this->add_control(
                    'tab6_location',
                    [
                        'label'         => __( 'Location', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );
                $this->add_control(
                    'location6_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#717171',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .head h5' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'loacation6_typography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-single-schedule .head h5',
                    ]
                );
                $this->add_control(
                    'loacation6_margin',
                    [
                        'label' => __( 'Margin', 'htevent' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .head h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                //lacation end

                //button start
                $this->add_control(
                    'buynow6_header',
                    [
                        'label'         => __( 'Button', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );

                $this->add_control(
                    'buynow6_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .button-text a' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'buynow6_typography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-single-schedule .button-text a',
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'      => 'buynow6_border',
                        'label'     => __( 'Border', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-single-schedule .button-text a',
                    ]
                );
                //button end
                //name
                $this->add_control(
                    'name6',
                    [
                        'label'         => __( 'Name', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );
                $this->add_control(
                    'name6_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#717171',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .footer h4 a' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'name6_typography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-single-schedule .footer h4',
                    ]
                );
                $this->add_control(
                    'name6_margin',
                    [
                        'label' => __( 'Margin', 'htevent' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .footer h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                //name end

                //position
                $this->add_control(
                    'position6',
                    [
                        'label'         => __( 'Position', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );
                $this->add_control(
                    'position6_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#717171',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .footer h5' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'position6_typography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-single-schedule .footer h5',
                    ]
                );
                $this->add_control(
                    'position6_margin',
                    [
                        'label' => __( 'Margin', 'htevent' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .footer h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
                //position end

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'htevent_style_hover_tab6',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                //title
                $this->add_control(
                    'title6_hover',
                    [
                        'label'         => __( 'Title', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );

                $this->add_control(
                    'title_hover_color6',
                    [
                        'label'         => __( ' Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .head h4 a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                //button
                $this->add_control(
                    'button6_hover',
                    [
                        'label'         => __( 'Button', 'htevent' ),
                        'type'          => Controls_Manager::HEADING,
                        'separator'     => 'after'
                        
                    ]
                );

                $this->add_control(
                    'button_hover_color6',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .button-text a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'buttonbg_hover_color6',
                    [
                        'label'         => __( 'Background Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-event-three-single-schedule .button-text a:hover' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'      => 'button6_border_hover',
                        'label'     => __( 'Border', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-event-three-single-schedule .button-text a:hover',
                    ]
                );

                
                
 
                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // css Style6 end


    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $event_style   =$settings['event_style'];
        $event_style2_cat  =$settings['categoy_style2'];
        $event_post_per_page   =$settings['htevent_categories_per_page'];
        $event_tabs   =$settings['htevent_content_list'];

        $style2 = array(
            'post_type'     =>  array('htevent', 'speaker' ),
            'posts_per_page'  => $event_post_per_page,
        );

        $grid_cats = str_replace(' ', '', $event_style2_cat);

        if (  !empty( $event_style2_cat ) ) {
            if( is_array($grid_cats) && count($grid_cats) > 0 ){
                $field_name = is_numeric( $grid_cats[0] ) ? 'term_id' : 'slug';
                $style2['tax_query'] = array(
                    array(
                        'taxonomy' => 'htevent_category',
                        'terms' => $grid_cats,
                        'field' => $field_name,
                        'include_children' => false
                    )
                );
            }
        }

        $items = new \WP_Query( $style2 );


        if( $event_style == 'style1' ){ ?>
<div class="htevent-style-one">
    <div class="htevent-one-schedule-tab-content nav">

        <?php 
            $count= 0; foreach( $event_tabs as $event_tab ){ 
                $count++;
            ?>
            <a class="<?php if( $count=='1'){echo 'active';}  ?>" data-toggle="tab" href="#event-<?php echo $this->get_id(); ?>-<?php echo $count; ?>"> 
                <?php echo wp_kses_post( $event_tab['catgory_title'] ); ?> </a>
        <?php } ?>
    </div>

        <div class="htevent-one-schedule-tab-content tab-content">
            <?php 
                $count= 0; foreach( $event_tabs as $event_tab ){ 
                $count++;
                $event_style1_cat = $event_tab['categoy_content'];
                $grid_cats = str_replace(' ', '', $event_style1_cat);
                if (  !empty( $event_style1_cat ) ) {
                    if( is_array($grid_cats) && count($grid_cats) > 0 ){
                        $field_name = is_numeric( $grid_cats[0] ) ? 'term_id' : 'slug';
                        $style2['tax_query'] = array(
                            array(
                                'taxonomy' => 'htevent_category',
                                'terms' => $grid_cats,
                                'field' => $field_name,
                                'include_children' => false
                            )
                        );
                    }
                }
                $item1 = new \WP_Query( $style2 );

            ?>

        <div class="htevent-one-schedule-tab-pane tab-pane fade <?php if( $count=='1'){echo 'active show';}  ?> " id="event-<?php echo $this->get_id(); ?>-<?php echo $count; ?>" >
            <ul class="htevent-one-schedule-list">

               <?php while( $item1->have_posts() ): $item1->the_post();  
                    $htevent_week = get_post_meta(get_the_ID(),'_htevent_day',true);
                    $htevent_time = get_post_meta(get_the_ID(),'_htevent_time',true);
                    $htevent_spacker = get_post_meta(get_the_ID(),'_htevent_spacker_name',true);

                    $htevent_designation = get_post_meta($htevent_spacker,'_htevent_position',true);
                    $htevent_button_text = get_post_meta(get_the_ID(),'_htevent_ticket',true);
                    $htevent_button_link = get_post_meta(get_the_ID(),'_htevent_ticket_link',true);


                ?>
                <li class="htevent-one-single-schedule">
                   <ul> 
                    <?php if( $htevent_week || $htevent_time  ): ?>
                        <li class="day-time">
                            <?php if( $htevent_week ): ?>
                                <h5><?php echo wp_kses_post( $htevent_week ); ?></h5>
                            <?php endif; ?>
                            <?php if( $htevent_time ): ?>
                                <h4><?php echo wp_kses_post( $htevent_time ); ?></h4>
                            <?php endif; ?>
                        </li>

                    <?php endif; ?>
                   
                    <li class="category-title">
                <?php echo get_the_term_list( get_the_ID(),'htevent_category','<h5>', ',</h5><h5>', '</h5>' ); ?>
                    <?php the_title('<h4><a href="'.esc_url( get_permalink() ).'">','</a></h4>'); ?>
                    </li>

                    <li class="spacker-text">
                    <?php if( $htevent_designation ): ?>
                        <h5><?php echo wp_kses_post( $htevent_designation ); ?></h5>
                    <?php endif; ?>

                    <?php if( $htevent_spacker ): ?>
                        <h4><a href="<?php echo get_the_permalink( $htevent_spacker ); ?>"><?php echo get_the_title( $htevent_spacker ); ?></a></h4>
                    <?php endif; ?>
                    </li>

                   <?php if( $htevent_button_text ): ?>
                    <li class="buy-button ">
                        <a href="<?php echo $htevent_button_link; ?>"><?php echo wp_kses_post( $htevent_button_text  ); ?></a>
                    </li>
                    <?php endif; ?>
                    </ul>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>
        <?php
        }elseif( $event_style == 'style2' ){ ?>

        <div class="htevent-style-two">

            <ul class="htevent-two-schedule-list">

               <?php while( $items->have_posts() ): $items->the_post();
                $htevent_week = get_post_meta(get_the_ID(),'_htevent_day',true);
                $htevent_time = get_post_meta(get_the_ID(),'_htevent_time',true);
                $htevent_location = get_post_meta(get_the_ID(),'_htevent_location',true);
                $htevent_spacker = get_post_meta(get_the_ID(),'_htevent_spacker_name',true);

                $htevent_designation = get_post_meta($htevent_spacker,'_htevent_position',true);
                $htevent_button_text = get_post_meta(get_the_ID(),'_htevent_ticket',true);
                $htevent_button_link =  get_post_meta(get_the_ID(),'_htevent_ticket_link',true);
           $htevent_spacker_image = wp_get_attachment_image_src( get_post_thumbnail_id( $htevent_spacker ), array(150,150 ) );

            if( $settings ['day_cat_bg_color2']['url'] ){
                $background = 'background-image:url('.$settings['day_cat_bg_color2']['url'].')';
            }


                ?>  
                <li class="htevent-two-single-item" style="<?php echo $background; ?>">
                    <ul>
                        <li class="htevent-title">
                            <?php the_title('<h4><a href="'.esc_url( get_permalink()).'">','</a></h4>'); ?>

                        </li>

                        <?php if(  $htevent_spacker_image || $htevent_spacker ): ?>
                        <li class="htevent-spacker">
                            <?php if( $htevent_spacker_image ): ?>
                            <div class="htevent-two-spacker">
                                <img src="<?php echo $htevent_spacker_image[0]; ?>" alt="<?php esc_attr_e('Spacker Image','htevent'); ?>">
                            </div>
                            <?php endif; ?>
                            <?php if( $htevent_spacker ): ?>
                            <div class="speaker_text">
                                <h4><a href="<?php echo get_the_permalink( $htevent_spacker ); ?>"><?php echo get_the_title( $htevent_spacker ); ?></a></h4>
                                <p><?php echo wp_kses_post( $htevent_designation ); ?></p>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endif; ?>

                        <?php if(  $htevent_time || $htevent_location ): ?>
                            <li class="htevent-location">
                                <h5><?php echo wp_kses_post(  $htevent_time ); ?></h5> 
                                <h5><?php echo wp_kses_post(  $htevent_location ); ?></h5> 
                            </li>
                        <?php endif; ?>

                        <?php if( $htevent_button_text  ): ?>
                        <li class="htevent-buy-now">
                            <div class="buy-button">
                                <a href="<?php echo esc_url( $htevent_button_link ); ?>"><?php echo wp_kses_post( $htevent_button_text  ); ?></a>
                            </div>  
                        </li>
                        <?php endif; ?>

                    </ul>
                </li>

                <?php endwhile; wp_reset_postdata(); ?>
            </ul>

        </div>

        <?php
        }elseif( $event_style == 'style3' ){  ?>
            <div class="htevent-style-three">
                
                <ul class="htevent-three-schedule-list">

                <?php while( $items->have_posts() ): $items->the_post();
                    $htevent_week = get_post_meta(get_the_ID(),'_htevent_day',true);
                    $htevent_time = get_post_meta(get_the_ID(),'_htevent_time',true);
                    $htevent_location = get_post_meta(get_the_ID(),'_htevent_location',true);
                    $htevent_spacker = get_post_meta(get_the_ID(),'_htevent_spacker_name',true);

                    $htevent_designation = get_post_meta($htevent_spacker,'_htevent_position',true);
                    $htevent_button_text = get_post_meta(get_the_ID(),'_htevent_ticket',true);
                    $htevent_button_link =  get_post_meta(get_the_ID(),'_htevent_ticket_link',true);

                    $htevent_spacker_imae = wp_get_attachment_image_src( get_post_thumbnail_id( $htevent_spacker ), array(150,150 ) );

                ?>  
                    <li class="htevent-three-single-item">
                        <ul>
                            <li class="htevent-three-title">
                            <?php if( $htevent_time || $htevent_location ): ?>
                            <p><?php echo wp_kses_post( $htevent_time ); ?> <?php if( $htevent_time && $htevent_location ): ?> | <?php endif; ?><?php echo wp_kses_post( $htevent_location ); ?> </p>
                        <?php endif; ?>
                            <?php the_title('<h4><a href="'.esc_url( get_permalink() ).'">','</a></h4>'); ?>

                        <?php echo get_the_term_list( get_the_ID(), 'htevent_category', '<h5>',',</h5><h5>','</h5>' ); ?>

                            </li>

                            <?php if(  $htevent_spacker_imae || $htevent_spacker ): ?>
                            <li class="htevent-three-spacker">
                                <div class="spacker-img">
                                    <?php if(  $htevent_spacker_imae ): ?>
                                    <div class="speaker_thumb">
                                        <img src="<?php echo $htevent_spacker_imae[0]; ?>" alt="<?php esc_attr_e('Spacker Image','htevent'); ?>">
                                    </div>
                                <?php endif; ?>
                                    <div class="speaker_text">
                                        <h4>
                                            <a href="<?php echo get_the_permalink( $htevent_spacker ); ?>"><?php echo get_the_title( $htevent_spacker ); ?></a>
                                        </h4>
                                        <p><?php echo wp_kses_post( $htevent_designation ); ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if( $htevent_button_text ): ?>
                            <li class="htevent-buy-now">
                                <div class="buy-button">
                                    <a href="<?php echo esc_url( $htevent_button_link ); ?>">
                                        <?php echo wp_kses_post( $htevent_button_text  ); ?>  
                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </li>
                    
                    <?php endwhile; wp_reset_postdata(); ?>

                </ul>
            </div>
        <?php
        }elseif( $event_style == 'style4' ){ ?>
            <!-- Upcoming Event Wrapper -->
            <div class="upcoming-event-wrapper col">
                <div class="upcoming-event-slider">
                  <?php 
                    while( $items->have_posts() ): $items->the_post(); 
                    $htevent_date = get_post_meta(get_the_ID(),'_htevent_date',true);
                    ?>
                    <div class="item col">
                        <div class="single-upcoming-event">
                            <?php the_post_thumbnail( array(320,350) ); ?>
                            <?php if($htevent_date): ?>
                            <span class="date"><?php echo  wp_kses_post( $htevent_date ); ?></span>
                        <?php endif; ?>

                            <div class="content">
                                <?php the_title('<h4 class="title"><a href="'.esc_url( get_permalink()).'">','</a></h4>') ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php
        }elseif( $event_style == 'style5' ){ ?>

        <div class="event-category-wrapper col">
            <div class="htevent-category-slider">
            <?php
                $cats = get_terms('htevent_category');
                foreach ( $cats  as $items ):
                $icon = get_term_meta($items->term_id, 'cat_showicon_option', true);
                $image_id = get_term_meta($items->term_id, 'category-image-id', true);
                $category_link = get_category_link( $items->term_id );
             ?>
                <div class="item col">
                    <a href="<?php echo esc_url( $category_link ); ?>" class="htevent-single-event-category fix">
                        <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                        <div class="content text-center">
                            <i class="<?php echo esc_attr($icon); ?>"></i>
                            <h4 class="cat-name"><?php echo esc_html($items->name); ?></h4>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
                
        <?php
           
        }else{ ?>

         <div class="htevent-event-three-schedule-tab-list nav">

           <?php 
                $count= 0; foreach( $event_tabs as $event_tab ){ 
                    $count++;
            ?>
            <a class="<?php if( $count=='1'){echo 'active';}  ?>" data-toggle="tab" href="#event-three-day-<?php echo $this->get_id(); ?>-<?php echo $count; ?>"> 
            <?php echo wp_kses_post( $event_tab['catgory_title'] ); ?> </a>
            <?php } ?>

        </div>
                
        <div class="htevent-event-three-schedule-tab-content tab-content">
            <?php 
                $count = 0; foreach( $event_tabs as $event_tab ){ 
                $count++;
                $event_style1_cat = $event_tab['categoy_content'];
                $grid_cats = str_replace(' ', '', $event_style1_cat);
                if (  !empty( $event_style1_cat ) ) {
                    if( is_array($grid_cats) && count($grid_cats) > 0 ){
                        $field_name = is_numeric( $grid_cats[0] ) ? 'term_id' : 'slug';
                        $style2['tax_query'] = array(
                            array(
                                'taxonomy' => 'htevent_category',
                                'terms' => $grid_cats,
                                'field' => $field_name,
                                'include_children' => false
                            )
                        );
                    }
             
                $item1 = new \WP_Query( $style2 );

            ?>
                    
                    <!-- Event Three Tab Pane Start -->
                <div class="event-three-schedule-tab-pane tab-pane fade <?php if( $count == 1 ){echo 'active show';}  ?>" id="event-three-day-<?php echo $this->get_id(); ?>-<?php echo $count; ?>" >
                       
                    <div class="row text-center">

                        <?php while( $item1->have_posts() ): $item1->the_post();  
                        $htevent_location = get_post_meta(get_the_ID(),'_htevent_location',true);
                        $htevent_spacker = get_post_meta(get_the_ID(),'_htevent_spacker_name',true);
                        $htevent_designation = get_post_meta($htevent_spacker,'_htevent_position',true);
                        $htevent_button_text = get_post_meta(get_the_ID(),'_htevent_ticket',true);
                        $htevent_button_link =  get_post_meta(get_the_ID(),'_htevent_ticket_link',true);

                        ?>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="htevent-event-three-single-schedule">
                                    <div class="head">
                                    <?php the_title('<h4><a href="'.esc_url(get_permalink()).'">','</a></h4>'); ?>

                                    <?php if( !empty( $htevent_location ) ){
                                        echo '<h5>' .esc_html(  $htevent_location  ).'</h5>';
                                    } ?>
                                </div>
                                <div class="image">
                                    <?php the_post_thumbnail(); ?>
                                    <div class="button-text">
                                        <a href="<?php echo esc_url( $htevent_button_link ); ?>">
                                            <?php echo esc_html( $htevent_button_text ); ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="footer">
                                    <h4><a href="<?php the_permalink( $htevent_spacker ) ?>"><?php echo get_the_title($htevent_spacker) ?></a></h4>
                                    <h5><?php echo esc_html( $htevent_designation ) ?></h5>
                                   
                                </div>
                            </div>
                        </div>
                           
                        <?php endwhile; wp_reset_postdata(); ?> 

                    </div>
                        
                </div><!-- Event One Tab Pane End -->
        <?php } } ?>

                    
        </div><!-- Event Three Tab Content End -->
  

    <?php
        }

    }
}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Event() );