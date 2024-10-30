<?php

namespace Elementor;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

/**
 * Elementor category
 */
function htevent_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'htevent',
        [
            'title'  => 'Ht Event',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\htevent_elementor_init');

// htevent Category
function htevent_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'htevent_category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}
/**
 * Elementor Templates List
 * @return array
 */
function htevent_elementor_template() {
    $templates = Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
    $types     = [];

    if ( empty( $templates ) ) {
        $template_lists = [ '0' => __( 'Do not Saved Templates.', 'htevent' ) ];
    } else {
        $template_lists = [ '0' => __( 'Select Template', 'htevent' ) ];
        foreach ( $templates as $template ) {
            $template_lists[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
        }
    }
    return $template_lists;
}

// post ids array
function htevent_get_post_cat_ids_arr(){
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => true,
    ));

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->term_id ] = $term->name;
        }
    }

    return $options;
}

// post ids array
function htevent_get_post_tag_ids_arr(){
    $terms = get_terms( array(
        'taxonomy' => 'post_tag',
        'hide_empty' => true,
    ));
    $options = array();
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->term_id ] = $term->name;
        }
    }

    return $options;
}

// orderby options arrary
function htevent_get_post_orderby_arr(){
    $orderby = array(
        'ID'            => __('Post ID','htevent'),
        'author'        => __('Post Author','htevent'),
        'title'         => __('Title','htevent'),
        'date'          => __('Date','htevent'),
        'modified'      => __('Last Modified Date','htevent'),
        'parent'        => __('Parent Id','htevent'),
        'rand'          => __('Random','htevent'),
        'comment_count' => __('Comment Count','htevent'),
        'menu_order'    => __('Menu Order','htevent'),
    );

    return $orderby;
}


