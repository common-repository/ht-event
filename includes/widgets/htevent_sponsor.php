<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Event_Sponsor extends Widget_Base {

    public function get_name() {
        return 'htevent-event-sponsor-addons';
    }
    public function get_title() {
        return __( 'HT Event: Sponsor', 'htevent' );
    }
    public function get_icon() {
        return 'eicon-image-box';
    }
    public function get_categories() {
        return [ 'htevent' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'htevent_sponsor',
            [
                'label' => __( 'HTevent', 'htevent' ),
            ]
        );
            $this->add_control(
                'sponsor_style',
                [
                    'label'   => __( 'Sponsor', 'htevent' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        "style1"    => __( 'Sponsor Style One', 'htevent' ),
                        "style2"    => __( 'Sponsor Style Two', 'htevent' ),
                    ],
                ]
            );
            $this->add_control(
                'sponsor_column',
                [
                    'label'     => __( 'Columns', 'htevent' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 4,
                    'options'   => [
                        '2'     => __( '2 Column', 'htevent' ),
                        '3'     => __( '3 Column', 'htevent' ),
                        '4'     => __( '4 Column', 'htevent' ),
                        '5'     => __( '5 Column', 'htevent' ),
                        '6'     => __( '6 Column', 'htevent' ),
                    ]
                ]
            );
        $this->end_controls_section(); // Content Section End
          //start style 1
        $this->start_controls_section(
            'switch_one_content',
            [
                'label'     => __( 'Switcher One', 'htevent' ),
                'condition' =>[
                    'sponsor_style'=>'style1',
                ],
            ]
        );
            $this->add_control(
                'switch_one_title',
                [
                    'label'     => __( 'Title', 'htevent' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => __( 'Switch One' , 'htevent' ),
                    'title'     => __( 'Switcher Title', 'htevent' ),
                    'dynamic'   => [ 'active' => true ],
                ]
            );
            $this->add_control(
                'switcher_one_icon',
                [
                    'label'     => __( 'Icon', 'htevent' ),
                    'type'      => Controls_Manager::ICONS,
                    'title'     => __( 'Switcher Title Icon', 'htevent' ),
                    'default' => [
                        'value' => 'fa fa-tree',
                        'library' => 'solid',
                    ],
                ]
            );
            $this->add_control(
                'switcher_one_content_source',
                [
                    'label'     => __( 'Select Content Source', 'htevent' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'image',
                    'options'   => [
                        'image'     => __( 'Image', 'htevent' ),
                        'custom'    => __( 'Custom', 'htevent' ),
                        "elementor" => __( 'Elementor Template', 'htevent' ),
                    ],
                ]
            );


            $repeater = new Repeater();

             $repeater->add_control(
                'sponsor_img1',
                [
                    'label'     => __( 'Slider Image', 'htevent' ),
                    'type'      => Controls_Manager::MEDIA,
                    'default'   => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
             $repeater->add_control(
                'sponsorlink',
                [
                    'label'         => __( 'link', 'htevent' ),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => __( 'https://your-link.com', 'htevent' ),
                    'show_external' => true,
                    'default'       => [
                        'url'       => '',
                        'is_external'=> true,
                        'nofollow'   => true,
                    ],
                ]
            );

           $this->add_control(
                'htevent_sopsor_switch1',
                [
                    'label'     => __( 'Slider', 'htevent' ),
                    'type'      => Controls_Manager::REPEATER,
                    'fields'    => $repeater->get_controls(),
                    'condition' => [
                        'switcher_one_content_source' => "image"
                    ],
                    'default'   => [
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                    ],
                ]
            );

           

            $this->add_control(
                'switcher_one_template_id',
                [
                    'label'       => __( 'Content', 'htevent' ),
                    'type'        => Controls_Manager::SELECT,
                    'default'     => '0',
                    'options'     => htevent_elementor_template(),
                    'condition'   => [
                        'switcher_one_content_source' => "elementor"
                    ],
                ]
            );
            $this->add_control(
                'switcher_one_custom_content',
                [
                    'label'         => __( 'Content', 'htevent' ),
                    'show_label'    =>false,
                    'type'          => Controls_Manager::WYSIWYG,
                    'title'         => __( 'Content', 'htevent' ),
                    'dynamic'       => [ 'active' => true ],
                    'condition'     => [
                        'switcher_one_content_source' =>'custom',
                    ],
                    'default' =>__('Switcher Content One','htevent'),
                ]
            );

        $this->end_controls_section(); // Switcher One tab end
        // Switcher Two tab start
        $this->start_controls_section(
            'switch_two_content',
            [
                'label'     => __( 'Switcher Two', 'htevent' ),
                'condition' =>[
                    'sponsor_style'=>'style1',
                ],
            ]
        );
            $this->add_control(
                'switch_two_title',
                [
                    'label'     => __( 'Title', 'htevent' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => __( 'Switch Two' , 'htevent' ),
                    'title'     => __( 'Switcher Title', 'htevent' ),
                    'dynamic'   => [ 'active' => true ],
                ]
            );
            $this->add_control(
                'switcher_two_icon',
                [
                    'label'     => __( 'Icon', 'htevent' ),
                    'type'      => Controls_Manager::ICONS,
                    'title'     => __( 'Switcher Title Icon', 'htevent' ),
                    'default' => [
                        'value' => 'fa fa-tree',
                        'library' => 'solid',
                    ],
                ]
            );
            $this->add_control(
                'switcher_two_content_source',
                [
                    'label'   => __( 'Select Content Source', 'htevent' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'image',
                    'options' => [
                        'image'     => __( 'Image', 'htevent' ),
                        'custom'    => __( 'Custom', 'htevent' ),
                        "elementor" => __( 'Elementor Template', 'htevent' ),
                    ],
                ]
            );


            $repeater = new Repeater();

            $repeater->add_control(
                'sponsor_img1',
                [
                    'label'     => __( 'Slider Image', 'htevent' ),
                    'type'      => Controls_Manager::MEDIA,
                    'default'   => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
             $repeater->add_control(
                'sponsorlink',
                [
                    'label'         => __( 'link', 'htevent' ),
                    'type'          => Controls_Manager::URL,
                    'placeholder'   => __( 'https://your-link.com', 'htevent' ),
                    'show_external' => true,
                    'default'       => [
                        'url'       => '',
                        'is_external'=> true,
                        'nofollow'   => true,
                    ],
                ]
            );

            $this->add_control(
                'htevent_sopsor_switch2',
                [
                    'label'     => __( 'Slider', 'htevent' ),
                    'type'      => Controls_Manager::REPEATER,
                    'fields'    => $repeater->get_controls(),
                    'condition' => [
                        'switcher_two_content_source' => "image"
                    ],
                    'default'   => [
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_img1'    => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                    ],
                ]
            );

            $this->add_control(
                'switcher_two_template_id',
                [
                    'label'       => __( 'Content', 'htevent' ),
                    'type'        => Controls_Manager::SELECT,
                    'default'     => '0',
                    'options'     => htevent_elementor_template(),
                    'condition'   => [
                        'switcher_two_content_source' => "elementor"
                    ],
                ]
            );

            $this->add_control(
                'switcher_two_custom_content',
                [
                    'label'         => __( 'Content', 'htevent' ),
                    'show_label'    =>false,
                    'type'          => Controls_Manager::WYSIWYG,
                    'title'         => __( 'Content', 'htevent' ),
                    'dynamic'       => [ 'active' => true ],
                    'condition'     => [
                        'switcher_two_content_source' =>'custom',
                    ],
                    'default'       =>__('Switcher Content Two','htevent'),
                ]
            );

        $this->end_controls_section();
           //end style 1
          //start style 2
            $this->start_controls_section(
                'content_section2',
                [
                    'label'     => __( 'Sponsor Style 2', 'htevent' ),
                    'condition' =>[
                        'sponsor_style'=>'style2',
                     ],
                    'tab' => Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new Repeater();
            $repeater->add_control(
                'sponsor_logo2', [
                    'label'         => __( 'Sponsor Brand Logo', 'htevent' ),
                    'type'          => Controls_Manager::MEDIA,
                    'default'   => [
                        'url'   => Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'sponsorlink',
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
                'htevent_sponsor_style2',
                [
                    'label' => __( 'Repeater List', 'htevent' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default'   => [
                        [
                            'sponsor_logo2' => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_logo2' => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_logo2' => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                        [
                            'sponsor_logo2' => __( '', 'htevent' ),
                            'sponsorlink'  => __( '#', 'htevent' ),
                        ],
                    ]
                ]
            );


            $this->end_controls_section();
           //end style 2
        // Css Style1 start
        $this->start_controls_section(
            'htevent_style',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs( 'htevent_style_style_tabs' );
                $this->add_control(
                    'tab_menu_color',
                    [
                        'label'         => __( 'Tab Font Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#282828',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-partner-tab-list a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'tabmenutypography',
                        'label'     => __( 'Tab Font Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-partner-tab-list a',
                    ]
                );

                $this->add_control(
                    'tab_menu_color_active',
                    [
                        'label'         => __( 'Tab Font Active Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-partner-tab-list a.active' => 'color: {{VALUE}} !important;',
                        ],
                    ]
                );
                $this->add_control(
                    'tab_menu_color_active_bg',
                    [
                        'label'         => __( 'Tab Font Active Background', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-partner-tab-list a.active' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
            $this->end_controls_tabs();
        $this->end_controls_section(); // css Style1 end
    }
    protected function render( $instance = [] ) {
        $settings   = $this->get_settings_for_display();
        $style   =$settings['sponsor_style'];
        $column   =$settings['sponsor_column'];
  
    ?>
 <div class="row">
    <?php if(  $style == 'style1'){ ?>
        <!-- Partner Tab List Start -->
        <div class="text-center col-12 mb-70">
            <div class="htevent-partner-tab-list nav">
                <a class="nav-link active show" data-toggle="tab" href="#glod-sponsor<?php echo $this->get_id(); ?>">
                    <?php
                        if( $settings['switcher_one_icon'] != ''){
							
                           echo HTevent_Icon_manager::render_icon( $settings['switcher_one_icon'], [ 'aria-hidden' => 'true' ] ) .esc_html__( $settings['switch_one_title'],'htevent' );
							
                        }else{
                            echo esc_html__( $settings['switch_one_title'],'htevent' );
                        }
                    ?>
                </a>
                <a class="nav-link" data-toggle="tab" href="#silver-sponsor<?php echo $this->get_id(); ?>">
                    <?php
                        if( $settings['switcher_two_icon'] != ''){
                            echo HTevent_Icon_manager::render_icon( $settings['switcher_two_icon'], [ 'aria-hidden' => 'true' ] ) .esc_html__( $settings['switch_two_title'],'htevent' );
                        }else{
                            echo esc_html__( $settings['switch_two_title'],'htevent' );
                        }
                    ?>
                </a>
            </div>
        </div><!-- Partner Tab List End -->
        <!-- Partner Tab Content Start -->
        <div class="htevent-partner-tab-content tab-content col-12">
            
            <!-- Partner Tab Pane Start -->
            <div class="partner-tab-pane text-center tab-pane fade show active" id="glod-sponsor<?php echo $this->get_id(); ?>">
                <div class="row">

                    <?php if( !empty( $settings['switcher_one_template_id'] ) ){
                        echo Plugin::instance()->frontend->get_builder_content_for_display( $settings['switcher_one_template_id'] );
                    }elseif( !empty( $settings['switcher_one_custom_content'] )){
                        echo '<div class="htevent_switcher_content">'.wp_kses_post( $settings['switcher_one_custom_content'] ).'</div>';
                    }elseif( $settings['htevent_sopsor_switch1'] ){ 
                        foreach( $settings['htevent_sopsor_switch1'] as $item ):

                            $image = $item['sponsor_img1']['url'];
                            $image_alt = get_post_meta( $item['sponsor_img1']['id'], '_wp_attachment_image_alt', true);
                            $target = $item['sponsorlink']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $item['sponsorlink']['nofollow'] ? ' rel="nofollow"' : '';            
                    ?>
                    <div class="htevent-single-partner htevent-sponsor-column-<?php echo esc_attr( $column ); ?>">
                        <?php  echo '<a href="'.esc_url( $item['sponsorlink']['url'] ).'" '.$target.' '.$nofollow.'>'; ?>
                           <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                        </a>
                    </div>
                <?php endforeach; } ?>
                </div>
            </div>
            <!-- Partner Tab Pane Start -->
            <div class="partner-tab-pane text-center tab-pane fade" id="silver-sponsor<?php echo $this->get_id(); ?>">
                <div class="row">
                    <?php if( !empty( $settings['switcher_two_template_id'] ) ){
                        echo Plugin::instance()->frontend->get_builder_content_for_display( $settings['switcher_two_template_id'] );
                    }elseif ( !empty( $settings['switcher_two_custom_content'] ) ) {
                       echo '<div class="htevent_switcher_content">'.wp_kses_post( $settings['switcher_two_custom_content'] ).'</div>';

                    }elseif( $settings['htevent_sopsor_switch2'] ){ 
                        foreach( $settings['htevent_sopsor_switch2'] as $item ):
                            $image = $item['sponsor_img1']['url'];
                            $image_alt = get_post_meta( $item['sponsor_img1']['id'], '_wp_attachment_image_alt', true);

                            $target = $item['sponsorlink']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $item['sponsorlink']['nofollow'] ? ' rel="nofollow"' : '';            
                    ?>
                    <div class="htevent-single-partner htevent-sponsor-column-<?php echo esc_attr( $column ); ?>">
                        <?php  echo '<a href="'.esc_url( $item['sponsorlink']['url'] ).'" '.$target.' '.$nofollow.'>'; ?>
                           <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                        </a>

                    </div>
                <?php endforeach; } ?>
                </div>
            </div>
            
        </div>
    <?php }else{ ?>
        <?php if( $settings['htevent_sponsor_style2'] ){ 
            foreach( $settings['htevent_sponsor_style2'] as $item ):

                $image = $item['sponsor_logo2']['url'];
                $image_alt = get_post_meta( $item['sponsor_logo2']['id'], '_wp_attachment_image_alt', true);

                $target = $item['sponsorlink']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $item['sponsorlink']['nofollow'] ? ' rel="nofollow"' : '';            
        ?>
        <div class="htevent-single-partner htevent-sponsor-column-<?php echo esc_attr( $column ); ?>">
            <?php  echo '<a href="'.esc_url( $item['sponsorlink']['url'] ).'" '.$target.' '.$nofollow.'>'; ?>
                <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
            </a>
        </div>
        <?php endforeach; } ?>
    <?php } ?>
   </div>
    <?php }
}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Event_Sponsor() );