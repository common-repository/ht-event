<?php

	add_action('cmb2_meta_boxes','htevent_meta_boxes');
	if( ! function_exists('htevent_meta_boxes') ){

		/**
		* Get Custom Post Type 
		*/
		function eneget_posttype_optionss($argument) {
		    $get_post_args = array(
		        'post_type' => $argument,
		        'posts_per_page' => -1
		    );
		    $options = array();
		    array_push( $options, __( '--- Select Speaker Name---', 'htevent' ) );
		    foreach ( get_posts( $get_post_args ) as $post ) {
		        $title = get_the_title( $post->ID );
		        $options[$post->ID] =  $title;
		    }
		    return $options;
		}

		function htevent_meta_boxes(){
			$prefix = '_htevent_';
			//htevent
			$htevent = new_cmb2_box( array(
				'id'           		 => $prefix . '_htevent_product_page',
				'title'        		 => __( 'Htevent Option', 'htevent' ),
				'object_types' 		 => array( 'htevent'),
				'context'      		 => 'normal',
				'priority'     		 => 'high',
				'show_names'         => true,
			) );
			//day style 
			$htevent->add_field( array(
				'name'               =>  __( 'Event day', 'htevent' ),
				'id'                 => $prefix.'day',
				'type'        		 => 'text',
				'desc'               => __( 'If you want event week day?', 'htevent'),
			) );
			//time style 
			$htevent->add_field( array(
				'name'               =>  __( 'Event Time', 'htevent' ),
				'id'                 => $prefix.'time',
				'type'        		 => 'text',
				'desc'               => __( 'If you want time?', 'htevent'),
			) );
			//date style 
			$htevent->add_field( array(
				'name'               =>  __( 'Event Date', 'htevent' ),
				'id'                 => $prefix.'date',
				'type'        		 => 'text_date',
				'desc'               => __( 'If you want date?', 'htevent'),
			) );
			//location style 
			$htevent->add_field( array(
				'name'               =>  __( 'Event Location', 'htevent' ),
				'id'                 => $prefix.'location',
				'type'        		 => 'text',
				'desc'               => __( 'If you want event location?', 'htevent'),
			) );
			//spacker name style 
			$htevent->add_field( array(
				'name'               =>  __( 'Speaker Name', 'htevent' ),
				'id'                 => $prefix.'spacker_name',
				'type'        		 => 'select',
				'desc'               => __( 'If you want event speaker name?', 'htevent'),
				'options' 			=> eneget_posttype_optionss('speaker'),
			) );
			//Ticket style 
			$htevent->add_field( array(
				'name'               =>  __( ' Ticket Text', 'htevent' ),
				'id'                 => $prefix.'ticket',
				'type'        		 => 'text',
				'desc'               => __( 'If you want event speaker ticket text?', 'htevent'),
			) );
			//Ticket link style 
			$htevent->add_field( array(
				'name'               =>  __( ' Ticket Link', 'htevent' ),
				'id'                 => $prefix.'ticket_link',
				'type'        		 => 'text_url',
				'desc'               => __( 'If you want event speaker ticket link?', 'htevent'),
			) );
			//htevent speaker
			$htevent_speaker = new_cmb2_box( array(
				'id'           		 => $prefix . '_htevent_speaker',
				'title'        		 => __( 'Speaker Information', 'htevent' ),
				'object_types' 		 => array( 'speaker'),
				//'context'      		 => 'side',
				'priority'     		 => 'low',
				'show_names'         => true,
			) );
			//speaker position
			$htevent_speaker->add_field( array(
				'name'               =>  __( 'Speaker Designatin', 'htevent' ),
				'id'                 => $prefix.'position',
				'type'        		 => 'text',
				'desc'               => __( 'If you want speaker designation?', 'htevent'),
			) );
			//speaker info
			$htevent_speaker->add_field( array(
				'name'               =>  __( 'Speaker Info', 'htevent' ),
				'id'                 => $prefix.'speaker_info',
				'type'        		 => 'textarea_small',
				'desc'               => __( 'If you want speaker information? only show style one', 'htevent'),
			) );

			$group_field_id = $htevent_speaker->add_field( array(
				'id'          => $prefix.'repeat_group',
				'type'        => 'group',
				'description' => __( 'Social icon show only for style 2', 'htevent' ),
				'options'     => array(
					'group_title'   => __( 'Entry {#}', 'htevent' ), // since version 1.1.4, {#} gets replaced by row number
					'add_button'    => __( 'Add Social Entry', 'htevent' ),
					'remove_button' => __( 'Remove Entry', 'htevent' ),
					'sortable'      => true, // beta
				),
			) );

			$htevent_speaker->add_group_field( $group_field_id, array(
				'name' 				 => __('Add Social icon here','htevent'),
				'id'   				 =>'icon',
				'type' 				 => 'text',
				'desc'               => __( 'Add social icon ex:(fa fa-facebook)', 'htevent'),
			) );

			$htevent_speaker->add_group_field( $group_field_id, array(
				'name' 				=> __('Add Social icon link','htevent'),
				'description' 		=>  __( 'Add social icon link', 'htevent'),
				'id'   				=> 'icon_link',
				'type' 				=> 'text_url',
			) );

			
	}
}


