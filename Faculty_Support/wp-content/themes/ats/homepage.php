<?php
/**
 * The template for displaying homepage.
 *
 *
 * @package Academic Technology Services
 *
 Template Name: Homepage
 */

get_header(); ?>
<div class="outer_wrap">
 <div class="inner_wrap">
    <div id="main_content">
		<?php get_sidebar(); ?>
		<!-- ********** Main content section ********** -->
			<div id="main_section" role="main">
				<!-- Center column (primary content) -->
				<div id="center_column">
    				<div id="center_column_inner_wrap">
        			<!-- ********** Page title ********** -->
        
        		<!-- ********** End page title ********** -->
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

				<?php endwhile; // end of the loop. ?>
				</div>
			</div>
		<!-- End center column -->

		<!-- Optional right column -->

		<!-- End optional right column -->
				</div>
			<!-- ********** End main content ********** -->
		</div><!-- #main_content -->
	</div><!-- .inner wrap -->
</div><!-- .outer wrap -->

<?php get_footer(); ?>
