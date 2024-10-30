<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class HTevent_Elementor_Widget_Testimonial extends Widget_Base{
	public function get_name(){
		return 'htevent_testimonial';
	}
	public function get_title(){
		return __('HT Event: Testimonial','htevent');
	}
	public function get_icon(){
		return 'eicon-testimonial';
	}
	public function get_categories(){
		return ['htevent'];
	}

    public function get_script_depends() {
        return [
            'slick.min',
            'htevent-widgets-active',
        ];
    }
	protected function register_controls(){
		$this->start_controls_section(
            'htevent-testimonial',
            [
                'label' => __( 'Tesstimonial', 'htevent' ),
            ]
        );

        $this->add_control(
            'htevent_testimonial_style',
            [
                'label' => __( 'Testimonial style', 'htevent' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __( 'Style One', 'htevent' ),
                    '2' => __( 'Style Two', 'htevent' ),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_icon', [
                'label'       => __( 'Social Icon', 'htevent' ),
                'type'        => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-tree',
					'library' => 'solid',
				],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_desc', [
                'label'         => __( 'Description', 'htevent' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( 'List Title' , 'htevent' ),
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'list_name', [
                'label'         => __( 'Name', 'htevent' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'List Title' , 'htevent' ),
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'list_position', [
                'label'         => __( 'Position', 'htevent' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => __( 'List Title' , 'htevent' ),
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Repeater List', 'htevent' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_icon'     => __( '', 'htevent' ),
                        'list_desc'     => __( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or  which don\'t look even slightly believable.', 'htevent' ),
                        'list_name'     => __( 'Rey Martin', 'htevent' ),
                        'list_position' => __( 'Social Media Manager', 'htevent' ),
                    ],
                    [
                        'list_icon'     => __( '', 'htevent' ),
                        'list_desc'     => __( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or  which don\'t look even slightly believable.', 'htevent' ),
                        'list_name'     => __( 'Rey Martin', 'htevent' ),
                        'list_position' => __( 'Social Media Manager', 'htevent' ),
                    ],
                ],

                'title_field' => '{{{ list_name }}}',
            ]
        );
    
        $this->end_controls_section();

        //style css
		$this->start_controls_section(
            'htevent_testimonial_style_tab',
            [
                'label'  => __('Style','htevent'),
                'tab'    => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs(
            'testimonial_style_tab'
        );

        $this->add_control(
            'name_options',
            [
                'label' => __( 'Name', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'htevent_name',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'	=> '#333333',
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-testimonial-one h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .htevent-single-testimonial-two h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'name_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-single-testimonial-one h4,.htevent-single-testimonial-two h5',
            ]
        );
        $this->add_responsive_control(
            'htevent_name_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-single-testimonial-one h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .htevent-single-testimonial-two h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'position_options',
            [
                'label' => __( 'Position', 'htevent' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'htevent_position',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                 'default'	=> '#333333',
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-testimonial-one h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .htevent-single-testimonial-two h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'position_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-single-testimonial-one h5,.htevent-single-testimonial-two h6',
            ]
        );

        $this->add_responsive_control(
            'htevent_position_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-single-testimonial-one h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .htevent-single-testimonial-two h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'description_options',
            [
                'label' => __( 'Description', 'htevent' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'htevent_description',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                 'default'	=> '#333333',
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-testimonial-one p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .htevent-single-testimonial-two p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'description_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-single-testimonial-one p,.htevent-single-testimonial-two p',
            ]
        );
        $this->add_responsive_control(
            'htevent_desc_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-single-testimonial-one p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .htevent-single-testimonial-two p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'icon_options',
            [
                'label' => __( 'Icon', 'htevent' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'htevent_icon',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                 'default'	=> '#333333',
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-testimonial-one i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .htevent-single-testimonial-two i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'htevent_icon_size',
            [
                'label' => __( 'Font Size', 'htevent' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-testimonial-one i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .htevent-single-testimonial-two i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'htevent_icon_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-single-testimonial-one i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .htevent-single-testimonial-two i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->end_controls_section();

	}
	protected function render(){ 

		$settings = $this->get_settings_for_display();

		if( $settings['htevent_testimonial_style']== '1' ):
		?>

        <div class="row">
            <!-- Testimonial Slider One -->
            <div class="testimonial-slider-one text-center col-lg-8 ml-auto mr-auto">
                <?php 
                    if( $settings['list'] ): 
                    foreach( $settings['list'] as $item ): ?>
                    <div class="htevent-single-testimonial-one">
                        <?php 
                            if(!empty( $item['list_icon'] ) ){
                                //echo '<i class=" '.$item['list_icon'].'"></i>';
								\Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] );
                            } 
                            if(!empty( $item['list_desc'] ) ){
                                echo '<p>'.esc_html( $item['list_desc'] ) .'</p>';
                            }
                            if(!empty( $item['list_name'] ) ){
                                echo '<h4>'.esc_html( $item['list_name'] ).'</h4>';
                            }
                            if(!empty( $item['list_position'] ) ){
                                echo '<h5>'.esc_html( $item['list_position'] ).'</h5>';
                            }
                        ?>
                    </div>
                <?php 
                    endforeach; endif; 
                ?>  
            </div>
        </div>
		<?php else: ?> 
        <div class="row">
            <!-- Testimonial Two Wrapper -->
            <div class="testimonial-two-wrapper col-lg-11 col-12 ml-auto mr-auto">
                <!-- Testimonial Slider Two -->
                <div class="testimonial-slider-two text-center">
                    <?php 
                        if( $settings['list'] ): 
                        foreach( $settings['list'] as $item ): 
                    ?>
                    <div class="htevent-single-testimonial-two">
                        <?php 
                            if(!empty( $item['list_icon'] ) ){
                                \Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] );
                            } 
                            if(!empty( $item['list_name'] ) ){
                                echo '<h5>'.esc_html( $item['list_name'] ).'</h5>';
                            }
                            if(!empty( $item['list_position'] ) ){
                                echo '<h6>'.esc_html( $item['list_position'] ).'</h6>';
                            }
                            if(!empty( $item['list_desc'] ) ){
                                echo '<p>'.esc_html( $item['list_desc'] ) .'</p>';
                            }                        
                        ?>
                    </div>
                    <?php 
                        endforeach; endif; 
                    ?>
                </div>
            </div>
        </div>
        <?php endif; 

	}

}
htevent_widget_register_manager( new HTevent_Elementor_Widget_Testimonial() );