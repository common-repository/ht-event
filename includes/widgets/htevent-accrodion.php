<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class HTevent_Elementor_Widget_Accrodion extends Widget_Base{
	public function get_name(){
		return 'htevent_accrodion';
	}
	public function get_title(){
		return __('HT Event: Accrodion','htevent');
	}
	public function get_icon(){
		return 'eicon-accordion';
	}
	public function get_categories(){
		return ['htevent'];
	}
	protected function register_controls(){
		$this->start_controls_section(
            'htevent-accrodion',
            [
                'label' => __( 'Accordion', 'htevent' ),
            ]
        );

        $this->add_control(
            'htevent_accrodion_style',
            [
                'label' 	=> __( 'Accrodion style', 'htevent' ),
                'type' 		=> Controls_Manager::SELECT,
                'default' 	=> '1',
                'options' 	=> [
                    '1' => __( 'Style One', 'htevent' ),
                    '2' => __( 'Style Two', 'htevent' ),
                    '3' => __( 'Style Three', 'htevent' ),
                    '4' => __( 'Style Four', 'htevent' ),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label'         => __( 'Title', 'htevent' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'list_desc', [
                'label'         => __( 'Description', 'htevent' ),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Accordion List', 'htevent' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_desc'     => __( 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'htevent' ),
                        'list_title'     => __( 'Title one', 'htevent' ),
                    ],
                    [
                        'list_desc'     => __( 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.', 'htevent' ),
                        'list_title'     => __( 'Title Two', 'htevent' ),
                    ],
                ],

                'title_field' => '{{{ list_title }}}',
            ]
        );
    
        $this->end_controls_section();

        // style tab start
        $this->start_controls_section(
            'htevent_accroding_style',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs( 'hevent_accroding_style_tabs');

                // Normal tab start
                $this->start_controls_tab(
                    'accroding_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );
                    //start title
                    $this->add_control(
                        'title_options',
                        [
                            'label'     => __( 'Title', 'htevent' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $this->add_control(
                        'title_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-accordion-header h5 a' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-accordion-header-two h5 a' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent.nav-tab a' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent.nav-tab-two a' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'title_typography',
                            'selector' => '{{WRAPPER}} .htevent-accordion-header h5 a, .htevent-accordion-header-two h5 a, .htevent.nav-tab a, .htevent.nav-tab-two a',
                        ]
                    );
                    $this->add_control(
                        'title_bg_color',
                        [
                            'label'     => __( 'Background', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,                            
                            'condition' =>[
                                'htevent_accrodion_style'      => array('1','2'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htevent-accordion-header h5 a.collapsed' => 'background-color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-accordion-header-two h5 a.collapsed' => 'background-color: {{VALUE}}',
                            ]
                        ]
                    );
                    $this->add_control(
                        'title_bg_active_color',
                        [
                            'label'     => __( 'Active Background', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'condition' =>[
                                'htevent_accrodion_style'      => array('1','2'),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htevent-accordion-header h5 a' => 'background-color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-accordion-header-two h5 a' => 'background-color: {{VALUE}}',
                            ]
                        ]
                    );

                    //end title
                    //start content
                    $this->add_control(
                        'content_options',
                        [
                            'label'     => __( 'Content', 'htevent' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                     $this->add_control(
                        'content_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .tab-pane p' => 'color: {{VALUE}}',
                            ]
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name'     => 'content_typography',
                            'selector' => '{{WRAPPER}} .accordion-body p,.tab-pane p',
                        ]
                    );

                    $this->add_responsive_control(
                        'content_padding',
                        [
                            'label'         => __( 'Padding', 'htevent' ),
                            'type'          => Controls_Manager::DIMENSIONS,
                            'size_units'    => [ 'px', '%', 'em' ],
                            'selectors'     => [
                                '{{WRAPPER}} .accordion-body p,.tab-pane p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ]
                        ]
                    );
                    //end content

                $this->end_controls_tab(); // Normal tab end

                // Hover tab start
                $this->start_controls_tab(
                    'style_accrodion_hover_tab',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );

                    //title start
                    $this->add_control(
                        'title_hover_options',
                        [
                            'label'     => __( 'Title', 'htevent' ),
                            'type'      => Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );

                    $this->add_control(
                        'title_hover_color',
                        [
                            'label'     => __( 'Color', 'htevent' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htevent-accordion-header h5 a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent-accordion-header-two h5 a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent.nav-tab a:hover' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htevent.nav-tab-two a:hover' => 'color: {{VALUE}}',
                            ]
                        ]
                    );
                    //end title

                $this->end_controls_tab(); // Hover tab end
            $this->end_controls_tabs();
        $this->end_controls_section(); // style tab end

	}
	protected function render(){ 

		$settings = $this->get_settings_for_display();

		
		?>
<div class="row">

	<?php if( $settings['htevent_accrodion_style']== '1' ): ?>
                
    <div class="col-12">
        
        <div id="accordion-<?php echo $this->get_id(); ?>" role="tablist">
        	<?php 
        		if( $settings['list'] ): 
        		$i = 0;
        		foreach( $settings['list'] as $item ):
        		$i++;
        	?>
            <div class="htevent-single-accordion">
                <div class="htevent-accordion-header" role="tab">
                    <h5>
                    	<a <?php if( $i !==1){echo 'class="collapsed"';} ?> data-toggle="collapse" href="#collapse-<?php echo $i; ?>">
                    <?php echo esc_html( $item['list_title'] ); ?></a>
                </h5>
                </div>
                <div id="collapse-<?php echo $i; ?>" class="collapse <?php if($i == 1){echo 'show'; } ?>" data-parent="#accordion-<?php echo $this->get_id(); ?>">
                    <div class="accordion-body">
                        <p><?php echo wp_kses_post( $item['list_desc'] ); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; ?>
        </div>
    </div>

    <?php elseif( $settings['htevent_accrodion_style']== '2' ): ?>
                
        <div class="col-12">
            <div id="accordiontwo-<?php echo $this->get_id(); ?>" role="tablist">
            	<?php 
	        		if( $settings['list'] ): 
	        		$i = 0;
	        		foreach( $settings['list'] as $item ):
	        		$i++;
	        	?>
                <div class="htevent-single-accordion">
                    <div class="htevent-accordion-header-two" role="tab">
                        <h5><a <?php if( $i !==1){echo 'class="collapsed"';} ?> data-toggle="collapse" href="#collapseTwo-<?php echo $i; ?>">
                        	<?php echo esc_html($item['list_title']); ?>
                        </a></h5>
                    </div>
                    <div id="collapseTwo-<?php echo $i; ?>" class="collapse <?php if($i == 1){echo 'show'; } ?>" data-parent="#accordiontwo-<?php echo $this->get_id(); ?>">
                        <div class="accordion-body">
                             <p><?php echo esc_html($item['list_desc']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>

    <?php elseif( $settings['htevent_accrodion_style']== '3' ): ?>
                
        <div class="col-12">

            <?php 
	        	if( $settings['list'] ): 
	        ?>
            <nav class="nav htevent nav-tab">
            	<?php 
            		$i = 0;
	        		foreach( $settings['list'] as $item ):
	        		$i++; ?>

                   <a <?php if($i == 1){echo 'class="active"'; } ?> data-toggle="tab" href="#tabOne-<?php echo $i; ?>">
                   		<?php echo esc_html($item['list_title']); ?>
                   	</a>
               <?php endforeach;  ?>
            </nav>
            <div class="tab-content">
                <?php 
            		$i = 0;
	        		foreach( $settings['list'] as $item ):
	        		$i++; 
	        	?>
                <div class="tab-pane fade <?php if($i == 1){echo 'show active'; } ?>" id="tabOne-<?php echo $i; ?>">
                    <p><?php echo esc_html( $item['list_desc'] ); ?></p>
                </div>
                <?php endforeach;  ?>
            </div>
        <?php endif; ?>
            
        </div>
    <?php else: ?>
                
    <div class=" col-12">
        <?php 
	        if( $settings['list'] ): 
	    ?>
        <nav class="nav htevent nav-tab-two">
            <?php 
        		$i = 0;
        		foreach( $settings['list'] as $item ):
        		$i++; 
        	?>
            <a <?php if($i == 1){echo 'class="active"'; } ?> data-toggle="tab" href="#tabTwo-<?php echo $i; ?>">
            	<?php echo esc_html( $item['list_title'] ); ?>
        	</a>
            <?php endforeach; ?>
        </nav>
        <div class="htevent-tab-tow tab-content">
            <?php 
            	$i = 0;
	        	foreach( $settings['list'] as $item ):
	        	$i++; 
	        ?>
            <div class="tab-pane tab-pane-border fade <?php if($i == 1){echo 'show active'; } ?>" id="tabTwo-<?php echo $i; ?>">
                <p><?php echo esc_html( $item['list_desc'] ); ?></p>
            </div>
        	<?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
	<?php endif; ?>              
</div>

    <?php 

	}

}
htevent_widget_register_manager( new HTevent_Elementor_Widget_Accrodion() );