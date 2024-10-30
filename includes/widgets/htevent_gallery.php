<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTevent_Elementor_Widget_Event_Gallery extends Widget_Base {

    public function get_name() {
        return 'htevent-event-gallery-addons';
    }
    
    public function get_title() {
        return __( 'HT Event: Gallery', 'htevent' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'htevent' ];
    }

    public function get_script_depends() {
        return [
            'jquery.hoverdir',
            'htevent-widgets-active',
        ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'htevent_gallery_section',
            [
                'label' => __( 'Gallery', 'htevent' ),
            ]
        );
           

        $this->add_control(
            'htevent_gallery',
            [
                'label'         => __( 'Add Images', 'htevent' ),
                'type'          => Controls_Manager::GALLERY,
                'show_label'    => false,
                'dynamic'       => [
                    'active'    => true,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'imagesize',
                'exclude'   => [ 'custom' ],
                'separator' => 'none',
            ]
        );


        $this->add_control(
            'gallery_columns',
            [
                'label'     => __( 'Columns', 'htevent' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 3,
                'options'   => [
                    '2'     => __( '2 Column', 'htevent' ),
                    '3'     => __( '3 Column', 'htevent' ),
                    '4'     => __( '4 Column', 'htevent' ),
                    '6'     => __( '6 Column', 'htevent' ),
                ],
            ]
        );

        $this->add_control(
            'open_lightbox',
            [
                'label'         => __( 'Image Hover', 'htevent' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'htevent-single-gallery',
                'options'       => [
                    'htevent-single-gallery' => __( 'Yes', 'htevent' ),
                    'hide-gallery'  => __( 'No', 'htevent' ),
                ],
            ]
        );

        //end repeater
        $this->end_controls_section(); // Content Section End

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
                    'htevent_gallery_hover_color',
                    [
                        'label'         => __( 'Gallery Hover Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> 'rgba(0, 86, 255, 0.8)',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-gallery .hover ' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );
                   
                $this->add_control(
                    'gallery_icon_hover_color',
                    [
                        'label'         => __( 'Gallery Hover Icon Color', 'htevent' ),
                        'type'          => Controls_Manager::COLOR,
                        'default'		=> '#ffffff',
                        'selectors'     => [
                            '{{WRAPPER}} .htevent-single-gallery:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                   
            $this->end_controls_tabs();

        $this->end_controls_section(); // css Style1 end

    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $galleries   =$settings['htevent_gallery'];
        $column   =$settings['gallery_columns'];

        $light_box  =$settings['open_lightbox'];
       if ( $column == '2' ) {
           $column = 'col-lg-6 col-md-6 col-12';
       }elseif ($column == '3') {
            $column = 'col-lg-4 col-md-6 col-12';
       }elseif ($column == '4') {
            $column = 'col-lg-3 col-md-6 col-12';
       }else{
            $column = 'col-lg-2 col-md-6 col-12';
       }

    ?>
<div class="gallery-wrapper row">

    <?php foreach( $galleries as  $gallery ): 
        $image = $gallery['url'];
        $images = wp_get_attachment_image_src( $gallery['id'], $settings['imagesize_size'] ) ;
        $image_alt = get_post_meta( $gallery['id'], '_wp_attachment_image_alt', true);

        if ( !empty( $image_alt ) ) {
          $image_alt = $image_alt ;
        }
    ?>

    <div class="<?php echo esc_attr( $column ) ?> ht-mb-30">
        <a href="<?php echo $image; ?>" class="<?php echo esc_attr( $light_box  ); ?> popup-gallery">
            
            <img src="<?php echo esc_url( $images[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">

        <div class="hover"></div></a>
    </div>
    <?php endforeach; ?>
</div>
       
    <?php
        
    }
}

htevent_widget_register_manager( new HTevent_Elementor_Widget_Event_Gallery() );