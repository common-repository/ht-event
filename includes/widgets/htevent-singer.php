<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class HTevent_Elementor_Widget_Singer extends Widget_Base{
	public function get_name(){
		return 'htevent_singer';
	}
	public function get_title(){
		return __('HT Event: Singer','htevent');
	}
	public function get_icon(){
		return 'eicon-user-preferences';
	}
	public function get_categories(){
		return ['htevent'];
	}
	protected function register_controls(){
		$this->start_controls_section(
            'htevent-testimonial',
            [
                'label' => __( 'Singer', 'htevent' ),
            ]
        );

        $this->add_control(
            'htevent_singer_image',
            [
                'label' => __( 'Singer Image', 'htevent' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'htevent_singer_name',
            [
                'label'     => __( 'Singer Name', 'htevent' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'BILLY TAYLOR'
            ]
        );
        $this->add_control(
            'htevent_singer_type',
            [
                'label'     => __( 'Singer Type', 'htevent' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'AURTHOHIN'
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_icon', [
                'label'       => __( 'Social Icon', 'htevent' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
				'default' => [
					'value' => 'fa fa-tree',
					'library' => 'solid',
				],
            ]
        );
        $repeater->add_control(
            'icon_link', [
                'label'         => __( 'Link', 'htevent' ),
                'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'htevent' ),
                'show_external' => true,
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
                        'icon_link'     => __( '#', 'htevent' ),
                    ],
                ],
            ]
        );
    
        $this->end_controls_section();

        //style css
		$this->start_controls_section(
            'htevent_singer_style_tab',
            [
                'label'  => __('Style','htevent'),
                'tab'    => Controls_Manager::TAB_STYLE
            ]
        );
        $this->start_controls_tabs(
            'singer_style_tab'
        );
        //name
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
                'default'	=> '#333',
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-singer .content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'name_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-single-singer .content h4',
            ]
        );
        $this->add_responsive_control(
            'htevent_name_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-single-singer .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'htevent_bg',
            [
                'label'     => __( 'Background Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'	=> '#0056ff',
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-singer .image::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        //single type
        $this->add_control(
            'position_options',
            [
                'label'     => __( 'Singer Type', 'htevent' ),
                'type'      => Controls_Manager::HEADING,
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
                    '{{WRAPPER}} .htevent-single-singer .content span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'position_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-single-singer .content span',
            ]
        );

        $this->add_responsive_control(
            'htevent_position_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-single-singer .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'icon_options',
            [
                'label'     => __( 'Icon', 'htevent' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'htevent_icon',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'	=> '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .htevent-single-singer .image .social a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'htevent_icon_size',
            [
                'label'      => __( 'Font Size', 'htevent' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .htevent-single-singer .image .social a i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

	}
	protected function render(){ 
		$settings = $this->get_settings_for_display();
        $image = $settings['htevent_singer_image']['url'];
	?>
         <!-- Single Single -->
        <div class="htevent-single-singer text-center">
            <!-- Image -->
            <div class="image">
                <?php if(!empty( $settings['htevent_singer_image']['url'] ) ): ?>
                <img src="<?php echo esc_url( $settings['htevent_singer_image']['url'] ); ?>" alt="<?php esc_attr_e('single','htevent'); ?>">
                <?php endif; ?>
                <!-- Social -->
                <?php if( $settings['list'] ): ?>
                <div class="social">
                <?php foreach( $settings['list'] as $item ){ 
                    $target = $item['icon_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $item['icon_link']['nofollow'] ? ' rel="nofollow"' : '';
                    echo '<a href="'.esc_url( $item['icon_link']['url'] ).'" '.$target.' '.$nofollow.'> 
                    '.HTevent_Icon_manager::render_icon( $item['list_icon'] ).'</a>'; 
                    } 
                ?>
                </div>
                <?php endif; ?>
            </div>
            <!-- Content -->
            <?php 
                if( !empty( $settings['htevent_singer_name'] ) || !empty( $settings['htevent_singer_type'] ) ): 
            ?>
            <div class="content">
                <?php 
                    if( !empty( $settings['htevent_singer_name'] )){
                      echo ' <h4>'.esc_html( $settings['htevent_singer_name'] ).'</h4>';  
                    }
                    if( !empty( $settings['htevent_singer_type'] ) ){
                        echo ' <span>'.esc_html( $settings['htevent_singer_type'] ).'</span>';
                    }
                ?>
            </div>
        <?php endif; ?>
            
        </div>
    <?php 

	}

}
htevent_widget_register_manager( new HTevent_Elementor_Widget_Singer() );