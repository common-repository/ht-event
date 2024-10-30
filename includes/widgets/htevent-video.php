<?php 
namespace Elementor;

if( !defined ( 'ABSPATH' ) )exit;

class HTevent_Elementor_Widget_Video extends Widget_Base{
	public function get_name(){
		return 'htevent_video';
	}
	public function get_title(){
		return __('HT Event: Video','htevent');
	}
	public function get_icon(){
		return 'eicon-youtube';
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
            'htevent-video',
            [
                'label' => __( 'Video', 'htevent' ),
            ]
        );

        $this->add_control(
            'htevent_video_style',
            [
                'label'     => __( 'Video style', 'htevent' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => '1',
                'options'   => [
                    '1' => __( 'Style One', 'htevent' ),
                    '2' => __( 'Style Two', 'htevent' ),
                    '3' => __( 'Style Three', 'htevent' ),
                ],
            ]
        );
        //style one style start
        $this->add_control(
            'video_link_one',
            [
                'label'     => __( 'Enter video link', 'htevent' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'https://www.youtube.com/watch?v=kuceVNBTJio',
                'condition' => [
                    'htevent_video_style' => '1'
                ],
            ]
        );
        $this->add_control(
            'video_link_one_text',
            [
                'label'     => __( 'Enter short text', 'htevent' ),
                'type'      => Controls_Manager::TEXT,
                'condition' => [
                    'htevent_video_style' => '1'
                ],
            ]
        );

        $this->add_control(
            'video_link_one_image',
            [
                'label'     => __( 'Enter video image', 'htevent' ),
                'type'      => Controls_Manager::MEDIA,
                'condition' => [
                    'htevent_video_style' => '1'
                ],
            ]
        );
        //style one style end


        //style two style start
        $repeater = new Repeater();

        $repeater->add_control(
            'list_title', [
                'label'       => __( 'Title', 'htevent' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_date', [
                'label'       => __( 'Date', 'htevent' ),
                'type'        => Controls_Manager::DATE_TIME,
                'label_block' => true,
                'picker_options'=>[
                    'dateFormat'=>'j M Y',
                ]
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

        $repeater->add_control(
            'list_video_link', [
                'label'         => __( 'Video Link', 'htevent' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'list_image', [
                'label'         => __( 'Image', 'htevent' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label'     => __( 'Repeater List', 'htevent' ),
                'type'      => Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),  
                'condition' => [
                    'htevent_video_style' => '2'
                ],
                'default'   => [
                    [
                        'list_title'    => __( 'Growup Yor Business, Improve Poductivety', 'htevent' ),
                        'list_date'     => __( '', 'htevent' ),
                        'list_desc'     => __( 'Lorem Ipsum is simply dummy the printing ypesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.', 'htevent' ),
                        'list_name'     => __( 'Brittany Cruz', 'htevent' ),
                        'list_position' => __( 'CEO Tomas BD', 'htevent' ),
                        'list_video_link' => __( 'https://www.youtube.com/watch?v=kuceVNBTJio', 'htevent' ),
                        'list_image'      =>[ 'url'   => Utils::get_placeholder_image_src(),]
                
                    ],
                ],

                'title_field' => '{{{ list_title }}}',
            ]
        );
        //style two style end



        //style one style start
        $this->add_control(
            'video_link_three',
            [
                'label'     => __( 'Enter video link', 'htevent' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 'https://www.youtube.com/watch?v=kuceVNBTJio',
                'condition' => [
                    'htevent_video_style' => '3'
                ],
            ]
        );
        $this->add_control(
            'video_link_three_image',
            [
                'label'     => __( 'Video Background Image', 'htevent' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'htevent_video_style' => '3'
                ],
            ]
        );
        $this->add_control(
            'video_link_three_title',
            [
                'label'     => __( 'Title', 'htevent' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __('Powerful Event concept, Use for Multipurpose','htevent'),
                'condition' => [
                    'htevent_video_style' => '3'
                ],
            ]
        );
        $this->add_control(
            'video_link_three_desc',
            [
                'label'     => __( 'Description', 'htevent' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default'   => __('There are many variations passages of Lorem Ipsum available, the majority suffered alteration in some form, by injected humour, randomised words which don\'t look even slightly believable.','htevent'),
                'condition' => [
                    'htevent_video_style' => '3'
                ],
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
                'condition'=>[
                    'htevent_video_style' => '1'
                ],
            ]
        );
            
            $this->start_controls_tabs( 'htevent_style1_tabs' );
                // Normal tab Start
                $this->add_control(
                    'title_color1',
                    [
                        'label'         => __( 'Text Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-play-video span' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography1',
                        'label'     => __( 'Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-play-video span',
                    ]
                );

            $this->end_controls_tabs();

        $this->end_controls_section(); 
        //style one end

        //style css three start
        $this->start_controls_section(
            'htevent_style3',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'htevent_video_style' => '3'
                ],
            ]
        );
            
        $this->start_controls_tabs( 'htevent_style3_tabs' );
            // Normal tab Start


            //title start
        $this->add_control(
            'title3_options',
            [
                'label' => __( 'Title', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
            $this->add_control(
                'title_color3',
                [
                    'label'         => __( ' Color', 'htevent' ),
                    'type'          => Controls_Manager::COLOR,
                    'default'		=>'#333333',
                    'selectors'     => [
                        '{{WRAPPER}} .htevent-about-content-five h2' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'titletypography3',
                    'label'     => __( 'Typography', 'htevent' ),
                    'selector'  => '{{WRAPPER}} .htevent-about-content-five h2',
                ]
            );

        $this->add_responsive_control(
            'htevent_title3_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-about-content-five h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );


        //end title
        //start description
        $this->add_control(
            'desc3_options',
            [
                'label' => __( 'Description', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 

         // Normal tab Start
            $this->add_control(
                'desc_color3',
                [
                    'label'         => __( 'Color', 'htevent' ),
                    'type'          => Controls_Manager::COLOR,
                    'default'		=> '#333333',
                    'selectors'     => [
                        '{{WRAPPER}} .htevent-about-content-five p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'      => 'desctypography3',
                    'label'     => __( 'Typography', 'htevent' ),
                    'selector'  => '{{WRAPPER}} .htevent-about-content-five p',
                ]
            );

            $this->add_responsive_control(
                'htevent_content3_margin',
                [
                    'label'         => __( 'Margin', 'htevent' ),
                    'type'          => Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em' ],
                    'selectors'     => [
                        '{{WRAPPER}} .htevent-about-content-five p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    ],
                ]
            );

        //end description
               
        $this->end_controls_tabs();

        $this->end_controls_section(); 
        //style three end

        //style css  two start
		$this->start_controls_section(
            'htevent_video_style_tab',
            [
                'label'  => __('Style','htevent'),
                'tab'    => Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'htevent_video_style' => '2'
                ],
            ]
        );
        $this->start_controls_tabs(
            'video_style_tab'
        );

        //style start
        $this->add_control(
            'content_options',
            [
                'label' => __( 'Syle', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        ); 
        $this->add_responsive_control(
            'htevent_content_padding',
            [
                'label'         => __( 'Content Area Padding', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-about-content-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        //style end
        //tilet start
        $this->add_control(
            'title_options',
            [
                'label' => __( 'Title', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'htevent_title',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'	=> '#0056ff',
                'selectors' => [
                    '{{WRAPPER}} .htevent-about-content-two h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'title_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-about-content-two h1',
            ]
        );
        $this->add_responsive_control(
            'htevent_title_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-about-content-two h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        //end title

        //date start
        $this->add_control(
            'date_options',
            [
                'label' => __( 'Date', 'htevent' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'htevent_date',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'	=> '#0056ff',
                'selectors' => [
                    '{{WRAPPER}} .htevent-about-content-two h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'date_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-about-content-two h3',
            ]
        );
        $this->add_responsive_control(
            'htevent_date_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-about-content-two h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        //end date
        //description start
        $this->add_control(
            'desc_options',
            [
                'label' => __( 'Description', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'htevent_desc',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'	=> '#717171',
                'selectors' => [
                    '{{WRAPPER}} .htevent-about-content-two p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'desc_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-about-content-two p',
            ]
        );
        $this->add_responsive_control(
            'htevent_desc_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-about-content-two p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        //end description

        //name start
        $this->add_control(
            'name_options',
            [
                'label' => __( 'Name', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'htevent_name',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
               'default'	=> '#717171',
                'selectors' => [
                    '{{WRAPPER}} .htevent-about-content-two .info h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'name_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-about-content-two .info h5',
            ]
        );
        $this->add_responsive_control(
            'htevent_name_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-about-content-two .info h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        //end name

        //position start
        $this->add_control(
            'position_options',
            [
                'label' => __( 'Position', 'htevent' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'htevent_position',
            [
                'label'     => __( 'Color', 'htevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'	=> '#717171',
                'selectors' => [
                    '{{WRAPPER}} .htevent-about-content-two .info h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'position_typography',
                'label'     => __( 'Typography', 'htevent' ),
                'selector'  => '{{WRAPPER}} .htevent-about-content-two .info h6',
            ]
        );
        $this->add_responsive_control(
            'htevent_position_margin',
            [
                'label'         => __( ' Margin', 'htevent' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .htevent-about-content-two .info h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        //end position


        $this->end_controls_section();

        //style css two end

	}
	protected function render(){ 
		$settings = $this->get_settings_for_display();

        

		if( $settings['htevent_video_style']== '1' ):
		?>
        <?php //if( $settings['video_link_one'] ): ?>
       <a href="<?php echo esc_url( $settings['video_link_one'] ); ?>" class="htevent-play-video video-popup"> 
            <img src="<?php echo $settings['video_link_one_image']['url']; ?>" alt="<?php esc_attr_e('image','htevent'); ?>"> 
            <?php if( $settings['video_link_one_text'] ): ?>
            <span><?php echo esc_html( $settings['video_link_one_text'] ); ?></span> 
        <?php endif; ?>
        </a> 
        <?php //endif; ?>

		<?php 
            elseif( $settings['htevent_video_style']== '2' ): ?>

            <?php if( $settings['list'] ): ?>
            <div class="htevent-about-video-slider">

                <?php foreach( $settings['list'] as $item ): ?>
                <div class="item">
                    <div class="row">
                        <!-- About Image -->
                        <div class="htevent-about-image-two col-md-6 col-12 mb-30">
                            <div class="about-image-two-wrapper overlay-blue overlay-opacity-40">
                                <?php if( $item['list_image']['url'] ): ?>
                                <img src="<?php echo esc_url( $item['list_image']['url'] ) ; ?>" alt="<?php esc_attr_e('image','htevent'); ?>">
                            <?php endif; ?>
                                <?php if( !empty( $item['list_video_link'] ) ): ?>
                                <a href="<?php echo esc_url( $item['list_video_link'] ) ?>" class="video-popup">
                                    <i class="pe-7s-play"></i>
                                </a>
                            <?php endif; ?>
                            </div>
                        </div>

                        <!-- About Content -->
                        <div class="col-md-6 col-12 mb-30">
                        <div class="htevent-about-content-two ">
                            <?php 
                               
                            ?>

                            <h3><?php echo $item['list_date']; ?></h3>
                            <?php if(  $item['list_title'] ){
                                echo sprintf('<h1>%s</h1>',wp_kses_post( $item['list_title'] ) );
                            }
                            if(  $item['list_desc'] ){
                               echo sprintf('<p>%s</p>', wp_kses_post( $item['list_desc'] ) );
                            }
                            ?>
                            
                            <div class="info">
                                <?php 
                                    if( $item['list_name'] ){
                                        echo sprintf('<h5>%s</h5>',wp_kses_post( $item['list_name'] ) );
                                    } 
                                    if( $item['list_position'] ){
                                        echo sprintf('<h6>%s</h6>',wp_kses_post( $item['list_position'] ) );
                                    }
                                    ?>
                            </div>

                        </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
           </div>

            <?php endif; ?>


      <?php  else: ?> 

        <div class="row">
            <!-- About Image -->
            <div class="htevent-about-image-five col-lg-7 col-12 mb-30">
                <div class="image">
                <?php if(!empty( $settings['video_link_three_image']['url'] ) ): ?>

                    <img src="<?php echo esc_url( $settings['video_link_three_image']['url']) ?>" alt="<?php esc_attr_e('image','htevent'); ?>">
                <?php endif; ?>
                    <?php if(!empty( $settings['video_link_three'] ) ): ?>
                    <a href="<?php echo esc_url( $settings['video_link_three'] ); ?>" class="video-popup"><i class="pe-7s-play"></i></a>
                <?php endif; ?>
                </div>
            </div>
            <!-- About Content -->
             <div class="htevent-about-content-five align-self-center col-lg-5 col-12 mb-30">
                <?php 
                    if( !empty( $settings['video_link_three_title']) ){
                        echo sprintf('<h2>%s</h2>', wp_kses_post( $settings['video_link_three_title'] ) );
                    }
                    if ( !empty( $settings['video_link_three_desc'] ) ) {
                        echo sprintf('<p>%s</p>',wp_kses_post( $settings['video_link_three_desc'] ) );
                    }
                 ?>
            </div>
        </div>
   
        <?php endif; 
	}
	
}
htevent_widget_register_manager( new HTevent_Elementor_Widget_Video() );