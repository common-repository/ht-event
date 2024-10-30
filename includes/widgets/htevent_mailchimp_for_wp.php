<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Htevent_Elementor_Widget_Mailchimp_Wp extends Widget_Base {

    public function get_name() {
        return 'htevent-mailchimp-wp-addons';
    }
    
    public function get_title() {
        return __( 'HT Event: Mailchimp for wp', 'htevent' );
    }

    public function get_icon() {
        return 'htevent-icon eicon-mailchimp';
    }
    public function get_categories() {
        return [ 'htevent' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'htevent_mailchimp',
            [
                'label' => __( 'Mailchimp', 'htevent' ),
            ]
        );
        
            $this->add_control(
                'htevent_mailchimp_form_style',
                [
                    'label' => __( 'Style', 'htevent' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Style One', 'htevent' ),
                        '2'   => __( 'Style Two', 'htevent' ),
                    ],
                ]
            );
            $this->add_control(
                'htevent_mailchimp_id',
                [
                    'label'       => __( 'Mailchimp ID', 'htevent' ),
                    'type'        => Controls_Manager::TEXT,
                    'placeholder' => __( '294', 'htevent' ),
                    'description' => __( 'For show ID <a href="admin.php?page=mailchimp-for-wp-forms" target="_blank"> Click here </a>', 'htevent' ),
                    'label_block' => true,
                    'separator'   => 'before',
                ]
            );
            $this->add_control(
                'section_title',
                [
                    'label'     => __( 'Title', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'condition' => [
                    'htevent_mailchimp_form_style' => array('1','2'),
                    ],
                ]
            );
            $this->add_control(
                'section_desc',
                [
                    'label'     => __( 'Sub Title', 'htevent' ),
                    'type'      => Controls_Manager::TEXTAREA,
                    'condition' => [
                    'htevent_mailchimp_form_style' => '1',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'htevent_mailchimp_section_style',
            [
                'label' => __( 'Style', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //title
        $this->add_control(
            'title_options',
            [
                'label'     => __( 'Title', 'htevent' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
         $this->add_control(
            'title_color',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe-content-one h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .subscribe-content-two p ' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .subscribe-content-one h2,.subscribe-content-two p ',
            ]
        );
        //end title

        //sub title
        $this->add_control(
            'subtitle_options',
            [
                'label'     => __( 'Sub Title', 'htevent' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
         $this->add_control(
            'subtitle_color',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subscribe-content-two h3' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .subscribe-content-two h3',
            ]
        );
        //end sub title

        $this->end_controls_section();


        // Input submit button style tab start
        $this->start_controls_section(
            'htevent_mailchimp_inputsubmit_style',
            [
                'label'     => __( 'Button', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs('htevent_submit_style_tabs');

                // Button Normal tab start
                $this->start_controls_tab(
                    'htevent_submit_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );


                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'htevent_input_submit_typography',
                            'selector' => '{{WRAPPER}} .htevent-mailchimp-style-2 .htevent-newsletter button,.htevent-mailchimp-style-1 .htevent-newsletter button ',
                        ]
                    );

                    $this->add_control(
                        'htevent_input_submit_text_color',
                        [
                            'label'     => __( 'Text Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-mailchimp-style-2 .htevent-newsletter button, .htevent-mailchimp-style-1 .htevent-newsletter button '  => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'htevent_input_submit_background_color',
                        [
                            'label'     => __( 'Background Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-mailchimp-style-2 .htevent-newsletter button, .htevent-mailchimp-style-1 .htevent-newsletter button '  => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );



                $this->end_controls_tab(); // Button Normal tab end

                // Button Hover tab start
                $this->start_controls_tab(
                    'htevent_submit_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                    $this->add_control(
                        'htevent_input_submithover_text_color',
                        [
                            'label'     => __( 'Text Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-mailchimp-style-2 .htevent-newsletter button :hover, .htevent-mailchimp-style-1 .htevent-newsletter button:hover'  => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'htevent_input_submithover_background_color',
                        [
                            'label'     => __( 'Background Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-mailchimp-style-2 .htevent-newsletter button:hover, .htevent-mailchimp-style-1 .htevent-newsletter button:hover'  => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Button Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // Input submit button style tab end

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();

        $this->add_render_attribute( 'mailchimp_area_attr', 'class', 'htevent-mailchimp' );
        $this->add_render_attribute( 'mailchimp_area_attr', 'class', 'htevent-mailchimp-style-'.$settings['htevent_mailchimp_form_style'] );
       
        ?>
            <?php if( $settings['htevent_mailchimp_form_style'] =='1' ){ ?>
            <div class="row align-items-center">
                
                <!-- Subscribe Content Two -->
                <div class="subscribe-content-two text-right col-md-6 col-12 ">
                    <?php if( $settings['section_title'] ): ?>
                    <p><?php echo wp_kses_post( $settings['section_title'] ); ?></p>
                <?php endif; if( $settings['section_desc'] ): ?>
                    <h3><?php echo wp_kses_post( $settings['section_desc'] ); ?></h3>
                <?php endif; ?>
                </div>
                
                <!-- Subscribe Form Two -->
                <div class="subscribe-form-two col-md-6 col-12 mb-30">
                    
                    <div <?php echo $this->get_render_attribute_string( 'mailchimp_area_attr' ); ?> >
                        <div class="htevent-input-box">
                            <?php echo do_shortcode( '[mc4wp_form  id="'.$settings['htevent_mailchimp_id'].'"]' ); ?>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <?php }else{ ?>
                 <div class="row">
                
                <!-- Subscribe Content One -->
                <div class="subscribe-content-one col-lg-6 col-12 mb-30">
                    <?php if( $settings['section_title'] ): ?>
                    <h2><?php echo wp_kses_post( $settings['section_title'] ); ?></h2>
                <?php endif; ?>
                </div>
                
                <!-- Subscribe Form One -->
                <div class="subscribe-form-one col-lg-6 col-12 mb-30">
                    
                    <div <?php echo $this->get_render_attribute_string( 'mailchimp_area_attr' ); ?> >
                        <div class="htevent-input-box">
                            <?php echo do_shortcode( '[mc4wp_form  id="'.$settings['htevent_mailchimp_id'].'"]' ); ?>
                        </div>
                    </div>

                </div>
                
            </div>

            <?php  } ?>
			
        <?php
    }

}

htevent_widget_register_manager( new Htevent_Elementor_Widget_Mailchimp_Wp() );