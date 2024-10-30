<?php
/**
 * Speaker Single Page
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
			 <?php the_content(); ?>
            <?php endwhile; ?>
		</div>
	</div>
</div>
<?php
get_footer();