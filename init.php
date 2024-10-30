<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

if ( ! function_exists('is_plugin_active')) { include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }

class Htevent_Custom_Function{

    public function __construct(){
        // Init Widgets
        if ( htevent_is_elementor_version( '>=', '3.5.0' ) ) {
            add_action( 'elementor/widgets/register', array( $this, 'htevent_includes_widgets' ) );
        }else{
            add_action( 'elementor/widgets/widgets_registered', array( $this, 'htevent_includes_widgets' ) );
        }        
        add_action( 'admin_menu', array ( $this, 'htevent_add_adminbar_menu' ), 10 );
        add_action( 'elementor/frontend/after_register_styles', array ( $this, 'htevent_register_frontend_styles' ), 10 );
        add_action( 'elementor/frontend/after_enqueue_styles', array ( $this, 'htevent_enqueue_frontend_styles' ), 10 );
        add_action( 'wp_enqueue_scripts', array ( $this, 'htevent_register_frontend_custom_styles' ), 10 );
        add_action( 'wp_enqueue_scripts', array ( $this, 'htevent_enqueue_frontend_custom_styles' ), 10 );
        add_action( 'elementor/frontend/after_register_scripts', array ( $this, 'htevent_register_frontend_scripts' ), 10 );
        add_action( 'elementor/frontend/after_enqueue_scripts', array ( $this, 'htevent_enqueue_frontend_scripts' ), 10 );
        add_action( 'init', array ( $this, 'htevent_image_size' ), 10 );
    }

    public function htevent_includes_widgets(){
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_addons.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_gallery.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_sponsor.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_speaker.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_slider.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_pricing_table.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_countdown.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-testimonial.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-blog-posts.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-accrodion.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-progress-bar.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-work-process.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-singer.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-video.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-section-title.php';
        require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_user_register_form.php';
		include_once HTEVENT_ADDONS_PL_PATH.'includes/class.wppolitic-icon-manager.php';

        if( is_plugin_active('woocommerce/woocommerce.php') ) {
        	require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent-product.php';
        }
        if ( is_plugin_active('mailchimp-for-wp/mailchimp-for-wp.php') ){
        	require_once HTEVENT_ADDONS_PL_PATH.'includes/widgets/htevent_mailchimp_for_wp.php';
        }

    }

     public function htevent_add_adminbar_menu(){
        $menu = 'add_menu_' . 'page';
            $menu( 
                'htevent_panel', 
                __( 'HT Event', 'htevent' ), 
                'read', 
                'htevent', 
                NULL, 
                'dashicons-calendar-alt', 
                40 
            );
    }

    public function htevent_register_frontend_styles(){
        wp_register_style(
            'bootstrap',
            HTEVENT_ADDONS_PL_URL . 'assets/css/bootstrap.min.css'
        ); 
    }

    public function htevent_enqueue_frontend_styles(){
        wp_enqueue_style( 'bootstrap' ); 
    }

    public function htevent_register_frontend_custom_styles(){
        //awesome css
        wp_register_style(
            'font-awesome',
            HTEVENT_ADDONS_PL_URL . 'assets/css/font-awesome.min.css'
        );
        //pe-icon 7 css
        wp_register_style(
            'pe-icon-7-stroke',
            HTEVENT_ADDONS_PL_URL . 'assets/css/pe-icon-7-stroke.css'
        );

        //magnific popup css
        wp_register_style(
            'magnific-popup',
            HTEVENT_ADDONS_PL_URL . 'assets/css/magnific-popup.css'
        );
        //slick css
        wp_register_style(
            'slick',
            HTEVENT_ADDONS_PL_URL . 'assets/css/slick.css'
        );
        //custom css
        wp_register_style(
            'htevent-widgets',
            HTEVENT_ADDONS_PL_URL . 'assets/css/htevent-widgets.css'
        );
        //slick js
        wp_enqueue_script(
            'slick',
            HTEVENT_ADDONS_PL_URL . 'assets/js/slick.min.js',array('jquery'), '', true 
        );
        //modernizr js
        wp_enqueue_script(
            'modernizr',
            HTEVENT_ADDONS_PL_URL . 'assets/js/modernizr-2.8.3.min.js',array('jquery'), '', true 
        );

        //magnific-popup js 
        wp_enqueue_script(
            'magnific-popup',
            HTEVENT_ADDONS_PL_URL . 'assets/js/magnific-popup.js',array('jquery'), '', true 
        );

        //coundown js 
        wp_enqueue_script(
            'htevent-countdown',
            HTEVENT_ADDONS_PL_URL . 'assets/js/htevent-countdown.js',array('jquery'), '', true 
        );

        //hover js
        wp_enqueue_script(
            'jquery-hoverdir',
            HTEVENT_ADDONS_PL_URL . 'assets/js/jquery.hoverdir.js',array('jquery'), '', true 
        );

        //active js
        wp_enqueue_script(
            'htevent-widgets-active',
            HTEVENT_ADDONS_PL_URL . 'assets/js/htevent-widgets-active.js',array('jquery'), '1.0.0', true 
        );
    }
    public function htevent_enqueue_frontend_custom_styles(){
        wp_enqueue_style( 'font-awesome' );
        wp_enqueue_style( 'pe-icon-7-stroke' );
        wp_enqueue_style( 'magnific-popup' );
        wp_enqueue_style( 'slick' );
        wp_enqueue_style( 'htevent-widgets' );
    }
    public function htevent_register_frontend_scripts(){
        wp_register_script(
            'popper',
            HTEVENT_ADDONS_PL_URL . 'assets/js/popper.min.js',
            array('jquery'),
            HTEVENT_VERSION,
            TRUE
        ); 
        wp_register_script(
            'bootstrap',
            HTEVENT_ADDONS_PL_URL . 'assets/js/bootstrap.min.js',
            array('jquery'),
            HTEVENT_VERSION,
            TRUE
        );    
    }

    public function htevent_enqueue_frontend_scripts(){
      wp_enqueue_script( 'popper' );  
      wp_enqueue_script( 'bootstrap' );      
    }

    public function htevent_image_size(){
        add_image_size('htevent_img1200x500',1200,500,true);
    }

}
new Htevent_Custom_Function();
