<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Event_Speaker extends Widget_Base {

    public function get_name() {
        return 'htevent-speaker';
    }
    
    public function get_title() {
        return __( 'HT Event: Speaker', 'htevent' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return [ 'htevent' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'htevent_content',
            [
                'label' => __( 'HTevent', 'htevent' ),
            ]
        );
            $this->add_control(
                'speaker_style',
                [
                    'label'     => __( 'Style', 'htevent' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => '1',
                    'options'   => [
                        '1'     => __('Style One','htevent'),
                        '2'     => __('Style Two','htevent'),
                    ]
                ]
            );

            $this->add_control(
                'order',
                [
                    'label'     => __( 'order', 'htevent' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'DESC',
                    'options'   => [
                        'DESC'  => __('Descending','htevent'),
                        'ASC'   => __('Ascending','htevent'),
                    ]
                ]
            );


            $this->add_control(
                'per_page',
                [
                    'label'         => __( 'Number of posts to load', 'htevent' ),
                    'type'          => Controls_Manager::NUMBER,
                    'label_block'   => true,
                    'default'       => 6,
                ]
            );

        //end repeater
        $this->end_controls_section(); // Content Section End
        // Slider Option
        $this->start_controls_section(
            'slider_option_setting',

            [
                'label'         => __( 'Slider Option', 'htevent' ),
                'condition'     => [
                'speaker_style' => '1',
            ],
            ]
        );
            $this->add_control(
                'slautoplay',
                [
                    'label'         => __( 'Auto play', 'htevent' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'return_value'  => 'yes',
                    'default'       => 'yes',
                ]
            );

            $this->add_control(
                'slautoplayspeed',
                [
                    'label'             => __( 'Auto play speed', 'htevent' ),
                    'type'              => Controls_Manager::NUMBER,
                    'min'               => 100,
                    'min'               => 300,
                    'step'              => 100,
                    'default'           => 4000,
                    'condition'         => [
                        'slautoplay'    => 'yes',
                    ]
                ]
            );
            $this->add_control(
                'slarrows',
                [
                    'label'         => __( 'Arrow', 'htevent' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'return_value'  => 'yes',
                    'default'       => 'no',
                ]
            );
            $this->add_control(
                'sldots',
                [
                    'label'         => __( 'Dots', 'htevent' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'return_value'  => 'yes',
                    'default'       => 'no',
                ]
            );
        $this->end_controls_section();
    // Slider Option end
        // Css Style1 start
        $this->start_controls_section(
            'htevent_speaker_style',
            [
                'label'     => __( 'Style', 'htevent' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->start_controls_tabs( 'htevent_speaker_style_tabs' );
                // Normal tab Start
                $this->start_controls_tab(
                    'htevent_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'htevent' ),
                    ]
                );
                $this->add_control(
                    'name_options',
                    [
                        'label' => __( 'Name', 'htevent' ),
                        'type'  => Controls_Manager::HEADING,
                    ]
                );
                $this->add_control(
                    'speakder_title',
                    [
                        'label'         => __( 'Name Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-speaker-one .content h4 a' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .single-speaker-two .content .details h4 a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'titletypography',
                        'label'     => __( 'Name Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-single-speaker-one .content h4,.single-speaker-two .content .details h4',
                    ]
                );
                //position

                $this->add_control(
                    'position_options',
                    [
                        'label' => __( 'Position', 'htevent' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );
                $this->add_control(
                    'speakder_position',
                    [
                        'label'         => __( 'Position Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#333333',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-speaker-one .content h6' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .single-speaker-two .content .details h6' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'          => 'titlepositiontypography',
                        'label'         => __( 'Position Typography', 'htevent' ),
                        'selector'      => '{{WRAPPER}} .htevent-single-speaker-one .content h6,.single-speaker-two .content .details h6',
                    ]
                );
                $this->add_control(
                    'speakder_bg_color',
                    [
                        'label'         => __( 'Background Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-speaker-one .content' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                $this->end_controls_tab(); // Normal tab end
                // Hover tab Start
                $this->start_controls_tab(
                    'htevent_style_hover_speaker',
                    [
                        'label' => __( 'Hover', 'htevent' ),
                    ]
                );
                $this->add_control(
                    'speaker_title_hover',
                    [
                        'label'         => __( 'Name Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-speaker-one .content h4 a:hover' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .single-speaker-two .content .details h4 a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'speaker_contnt',
                    [
                        'label'         => __( 'Content Text Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'       =>'#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-speaker-one .image .hover-content h5' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .htevent-single-speaker-one .image .hover-content h5 span' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'contenttypography',
                        'label'     => __( 'Content Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-single-speaker-one .image .hover-content h5',
                    ]
                );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'      => 'contentspantypography',
                        'label'     => __( 'Content Span Typography', 'htevent' ),
                        'selector'  => '{{WRAPPER}} .htevent-single-speaker-one .image .hover-content h5 span',
                    ]
                );
                $this->add_control(
                    'image_bg_color',
                    [
                        'label'         => __( 'Image Background', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#0056ff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-speaker-one .image .hover-content' => 'background-color: {{VALUE}};',
                        ],
                    ] 
                );  
                $this->end_controls_tab(); // Hover tab end
            $this->end_controls_tabs();
        $this->end_controls_section(); // css Style1 end
    }
    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $order      =$settings['order'];
        $per_page   =$settings['per_page'];

         //slider option
        $slider_settings = [
            'arrows'    => ('yes' === $settings['slarrows']),
            'dots'      => ('yes' === $settings['sldots']),
            'autoplay'  => ('yes' === $settings['slautoplay']),
            'autoplay_speed' => absint($settings['slautoplayspeed']),
        ];

        if( $settings['speaker_style'] =='1' ){
            $this->add_render_attribute( 'slider_attr', 'class', 'htevent-speaker-one-slider row' );
            $this->add_render_attribute( 'slider_attr', 'data-settings', wp_json_encode($slider_settings) );
        }
        $args = new \WP_Query(array(
            'post_type'         => 'speaker',
            'posts_per_page'    => $per_page,
            'order'             => $order,
        ));

        if( $settings['speaker_style'] =='1' ){

        ?>

    <div <?php echo $this->get_render_attribute_string( 'slider_attr' ); ?>>
    <?php }else{ ?>

    <div class="row">
    <?php } ?>

    <?php 

        if( $args->have_posts() ): 
        while ( $args->have_posts() ):$args->the_post();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array('270','300'), true );
        $speaker_position = get_post_meta( get_the_ID(), '_htevent_position', 'true' );
        $speaker_info = get_post_meta( get_the_ID(), '_htevent_speaker_info', 'true' );

        $social_info = get_post_meta( get_the_ID(), '_htevent_repeat_group',true );

        if( $settings['speaker_style'] =='1' ):
    ?>
       
        <div class="col">
            <div class="htevent-single-speaker-one">
                <!-- Image -->
                <div class="image">
                    <?php the_post_thumbnail( array(270, 300) ); ?>
                    <!-- Hover Content -->
                    <div class="hover-content">
                        <!-- Image -->
                        <div class="img" style="background-image: url(<?php echo $image[0]; ?>)"></div>

                        <?php 
                            if( !empty( $speaker_info )){
                                echo '<h5>'.$speaker_info.'</h5>';
                            } 
                        ?>
                    </div>
                </div>
                <!-- Content -->
                <div class="content">
                    <?php the_title('<h4><a href="'.esc_url( get_permalink( )).'">','</a></h4>') ?>
                    <?php if( !empty( $speaker_position  ) ){
                        echo '<h6>'.esc_html( $speaker_position ) .'</h6>';
                    } ?>

                </div>
            </div>
        </div>

        <?php else: ?>

        <div class="col-lg-4 col-md-6 col-12 mb-30">
            <div class="single-speaker-two">

                <!-- Image -->
                <div class="image">
                    <?php the_post_thumbnail( array(370, 280) ); ?>
                </div>

                <!-- Content -->
                <div class="content">
                    <!-- Details -->
                    <div class="details float-left">
                         <?php the_title('<h4><a href="'.esc_url( get_permalink( )).'">','</a></h4>') ?>

                        <?php if( !empty( $speaker_position  ) ){
                            echo '<h6>'.esc_html( $speaker_position ) .'</h6>';
                        } ?>
                    </div>
                    <!-- Social Share -->
                    <?php if( $social_info  ):  ?>
                    <div class="share-wrap float-right">
                        <button class="speaker-share-toggle"><i class="pe-7s-share"></i></button>
                        <div class="share">
                            <?php 
                                foreach( $social_info as $key => $item ):
                             ?>
                            <a href="<?php echo esc_url( $item['icon_link'] ); ?>"><span class="i <?php echo esc_html($item['icon'] ); ?>"></span></a>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <?php endif; ?>

    <?php endwhile; wp_reset_postdata(); endif; ?>

    </div>

        <?php
        

    }
}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Event_Speaker() );