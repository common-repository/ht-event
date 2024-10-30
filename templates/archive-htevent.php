<?php
/**
 * Template Name: Htevent Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package htevent
 */

get_header();

?>
<div class="htevent-area">
	<div class="container">
		<div class="row">
			<?php
				if ( have_posts() ) :  
            ?>
            <div class="htevent-style-three">
                <ul class="htevent-three-schedule-list">
                <?php while( have_posts() ):the_post();
                    $htevent_week = get_post_meta(get_the_ID(),'_htevent_day',true);
                    $htevent_time = get_post_meta(get_the_ID(),'_htevent_time',true);
                    $htevent_location = get_post_meta(get_the_ID(),'_htevent_location',true);

                    $htevent_spacker = get_post_meta(get_the_ID(),'_htevent_spacker_name',true);

                    $htevent_spacker_imae = get_post_meta(get_the_ID(),'_htevent_spacker_image',true);
                    $htevent_designation = get_post_meta($htevent_spacker,'_htevent_position',true);
                    $htevent_button_text = get_post_meta(get_the_ID(),'_htevent_ticket',true);
                    $htevent_button_link = get_post_meta(get_the_ID(),'_htevent_ticket_link',true);
                ?>  
                    <li class="htevent-three-single-item">
                        <ul>
                            <li class="htevent-three-title">
                            <?php if( $htevent_time || $htevent_location ): ?>
                            <p><?php echo wp_kses_post( $htevent_time ); ?> <?php if( $htevent_location ): ?> | <?php echo wp_kses_post( $htevent_location ); ?> <?php endif; ?></p>
                        <?php endif; ?>
                            <?php the_title('<h4><a href="'.esc_url( get_permalink() ).'">','</a></h4>'); ?>

                        <?php echo get_the_term_list( get_the_ID(), 'htevent_category', '<h5>',',</h5><h5>','</h5>' ); ?>

                            </li>

                            <?php if(  $htevent_spacker_imae || $htevent_spacker ): ?>
                            <li class="htevent-three-spacker">
                                <div class="spacker-img">
                                    <?php if(  $htevent_spacker_imae ): ?>
                                    <div class="speaker_thumb">
                                        <img src="<?php echo esc_url($htevent_spacker_imae); ?>" alt="<?php esc_attr_e('Spacker Image','htevent'); ?>">
                                    </div>
                                <?php endif; ?>
                                    <div class="speaker_text">
                                        <h4><a href="<?php echo get_the_permalink( $htevent_spacker ); ?>"><?php echo get_the_title( $htevent_spacker ); ?></a></h4>
                                        <p><?php echo wp_kses_post( $htevent_designation ); ?></p>

                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                            <?php if( $htevent_button_text ): ?>
                            <li>
                                <div class="buy-button">
                                    <a href="<?php echo esc_url( $htevent_button_link ); ?>">
                                        <?php echo wp_kses_post( $htevent_button_text  ); ?>  
                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </li>
                    
                    <?php endwhile; wp_reset_postdata(); ?>

                </ul>
            </div>

			<?php endif; ?>
        </div>
	</div>
</div>

<?php

get_footer();