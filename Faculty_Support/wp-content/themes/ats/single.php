<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Academic Technology Services
 */

get_header(); ?>

	<div class="outer_wrap">
	<div class="inner_wrap">
	    <div id="main_content">
			<?php get_sidebar(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #main_content -->
	</div><!-- .inner_wrap -->
	</div><!-- .outer_wrap -->
<?php get_footer(); ?>