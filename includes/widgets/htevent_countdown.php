<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Countdown extends Widget_Base {

    public function get_name() {
        return 'htevent-countdown';
    }
    
    public function get_title() {
        return __( 'HT Event: Countdown', 'htevent' );
    }

    public function get_icon() {
        return 'htevent-icon eicon-countdown';
    }
    public function get_categories() {
        return [ 'htevent' ];
    }

    public function get_script_depends() {
        return [
            'htevent-countdown',
            'htevent-widgets-active',
        ];
    }

    protected function register_controls() {

        // Start Date option tab 
        $this->start_controls_section(
            'countdown_content',
            [
                'label' => __( 'Countdown', 'htevent' ),
            ]
        );

            $this->add_control(
                'target_date',
                [
                    'label'       => esc_html__( 'Due Date', 'htevent' ),
                    'type'        => Controls_Manager::DATE_TIME,
                    'picker_options'=>array(
                        'dateFormat' =>"Y/m/d",
                    ),
                    'default'     => date( 'Y/m/d', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
                ]
            );

        $this->end_controls_section(); // Date Optiin end

        // Style tab section
        $this->start_controls_section(
            'htevent_countdown_style',
            [
                'label' => __( 'Count Area', 'htevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'time_color',
                [
                    'label'     => __( ' Color', 'ene' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'	=>'#0056ff',
                    'selectors' => [
                        '{{WRAPPER}} .htevent-about-countdown .cdown .time-count' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'time_typography',
                    'selector'  => '{{WRAPPER}} .htevent-about-countdown .cdown .time-count',
                ]
            );

            $this->add_control(
                'hour_count',
                [
                    'label'     => __( 'Label', 'htevent' ),
                    'type'      => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'minute_color',
                [
                    'label'     => __( ' Color', 'ene' ),
                    'type'      => Controls_Manager::COLOR,
                     'default'	=>'#717171',
                    'selectors' => [
                        '{{WRAPPER}} .htevent-about-countdown .cdown p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'minute_typography',
                    'selector'  => '{{WRAPPER}} .htevent-about-countdown .cdown p',
                   
                ]
            );

        $this->end_controls_section(); // Section style tab end

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display(); ?>
        <div class="htevent-about-countdown" data-countdown="<?php echo date_format( date_create( $settings['target_date']),"Y/m/d"); ?>"></div>
        
    <?php }

}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Countdown() );