<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class HTevent_Elementor_Widget_Section_Title extends Widget_Base{
	public function get_name(){
		return 'htevent_title';
	}
	public function get_title(){
		return __('HT Event: Title','htevent');
	}
	public function get_icon(){
		return 'eicon-site-title';
	}
	public function get_categories(){
		return ['htevent'];
	}
	protected function register_controls(){
		$this->start_controls_section(
            'htevent-title',
            [
                'label' => __( 'Title', 'htevent' ),
            ]
        );
       $this->add_control(
            'title_style',
            [
                'label'     => __( 'Title Position', 'htevent' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'center',
                'options'   => [
                    'left'    => __( 'Text Left', 'htevent' ),
                    'center'  => __( 'Text Center', 'htevent' ),
                    'right'   => __( 'Text Right', 'htevent' ),
                ],
            ]
        );
       $this->add_control(
            'show_border',
            [
                'label'     => __( 'Show Border', 'htevent' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value'  => 'border-bg',
                'default' => 'border-bg',
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label'     => __( 'Title', 'htevent' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __('Section Title','htevent'),
            ]
        );
        $this->add_control(
            'section_desc',
            [
                'label'     => __( 'Description', 'htevent' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default'   => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,','htevent'),
            ]
        );
        //style one style end
        $this->end_controls_section();

        //style css one start
        $this->start_controls_section(
            'htevent_style1',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style1_tabs' );


                //title start
                $this->add_control(
                    'title_options',
                    [
                        'label' => __( 'Title', 'htevent' ),
                        'type' =>Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'title_color',
                    [
                        'label'         => __( 'Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-section-title-one h1' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'title_color_border',
                    [
                        'label'         => __( 'Border Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-section-title-one.border-bg h1::before' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-section-title-one h1',
                    ]
                );
                $this->add_responsive_control(
                    'title_margin',
                    [
                        'label' => __( 'Margin', 'htevent' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-section-title-one h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );

                //title end

                //description start
                $this->add_control(
                    'desc_options',
                    [
                        'label' => __( 'Description', 'htevent' ),
                        'type' =>Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );
                $this->add_control(
                    'desc_color',
                    [
                        'label'         => __( ' Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-section-title-one p' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'desctypography',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-section-title-one p',
                    ]
                );

                $this->add_responsive_control(
                    'desc_margin',
                    [
                        'label' => __( 'Margin', 'htevent' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .htevent-section-title-one p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ]
                    ]
                );
                //description end
                
            $this->end_controls_tabs();

        $this->end_controls_section(); 
        //style one end

	}
	protected function render(){ 
		$settings = $this->get_settings_for_display();?>
        
        <div class="htevent-section-title-one <?php echo esc_attr( $settings['show_border'] ); ?> <?php echo esc_attr( $settings['title_style'] ); ?>">
            <?php 
                if( !empty( $settings['section_title'] )){
                    echo sprintf('<h1>%s</h1>',esc_html( $settings['section_title'] ));
                } 
                if( !empty( $settings['section_desc'] )){
                    echo sprintf('<p>%s</p>',esc_html( $settings['section_desc'] ));
                } 
            ?>
        </div>

    <?php }

}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Section_Title() );