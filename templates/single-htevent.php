<?php
/**
 * htevent Single Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 
 */
get_header();?>
<div class="htevent-area">
	<div class="container">
		<div class="row">
    		<?php 
    			while( have_posts() ): the_post();
    		?>
			<div class="htevent-single-wrapper col-12"> 
                <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
		</div>
	</div>
</div>
<?php
get_footer();