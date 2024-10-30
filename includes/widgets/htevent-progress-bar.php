<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class HTevent_Elementor_Widget_Progress extends Widget_Base{
	public function get_name(){
		return 'htevent_progress';
	}
	public function get_title(){
		return __('HT Event: Progress Bar','htevent');
	}
	public function get_icon(){
		return 'eicon-skill-bar';
	}
	public function get_categories(){
		return ['htevent'];
	}
	protected function register_controls(){
		$this->start_controls_section(
            'htevent_prgress_bar',
            [
                'label' => __( 'Progress', 'htevent' ),
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
            'list_percent', [
                'label'         => __( 'Percent (please type % )', 'htevent' ),
                'type'          => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'list_color', [
                'label'         => __( 'Background', 'htevent' ),
                'type'          => Controls_Manager::COLOR,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Progress List', 'htevent' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'list_title'     => __( 'Title', 'htevent' ),
                        'list_percent'   => __( '70%', 'htevent' ),
                        'list_color'   	 => '#1A1A1A ',
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
                        '{{WRAPPER}} .single-skill .title' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single-skill .percent' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'title_typography',
                    'selector' => '{{WRAPPER}} .single-skill .title,.single-skill .percent',
                ]
            );
            //end title   
            $this->end_controls_tabs();
        $this->end_controls_section(); // style tab end

	}
	protected function render(){ 
		$settings = $this->get_settings_for_display();
	?>

	<?php if( $settings['list'] ):
		foreach ( $settings['list'] as $item ) {
			
	 ?>
		<div class="single-skill clearfix">
            <span class="title"><?php echo esc_html( $item['list_title'] ); ?></span>
            <span class="percent">(<?php echo esc_html( $item['list_percent'] ); ?>)</span>
            <div class="progress"><div class="bar bg-dark" style="width: <?php echo esc_html( $item['list_percent'] ); ?>; background-color:<?php echo esc_html( $item['list_color'] ); ?>!important;"></div></div>
        </div>
    <?php } endif; ?>
                
    <?php 

	}

}
htevent_widget_register_manager( new HTevent_Elementor_Widget_Progress() );