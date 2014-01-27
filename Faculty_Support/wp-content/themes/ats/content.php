<?php
/**
 * @package Academic Technology Services
 */
?>

<!-- ********** Main content section ********** -->
<div id="main_section" role="main">
<!-- Center column (primary content) -->
<div id="center_column">
<div id="center_column_inner_wrap">
  <!-- ********** Page title ********** -->
  
  <!-- ********** End page title ********** -->
  
<div class="repeating_content_block clear_below"><h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<?php if ( is_search() || is_category()) : // Only display Excerpts for Search ?>
<p class="entry-summary">
	<?php the_excerpt(); ?>
</p><!-- .entry-summary -->
<?php else : ?>
	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ats' ) ); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'ats' ),
			'after'  => '</div>',
		) );
	?>
</p><!-- .entry-content -->
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'ats' ), '<span class="edit-link">', '</span>' ); ?>

</div>
  
</div>
</div>
<!-- End center column -->

<!-- Optional right column -->

<!-- End optional right column -->
</div>
<!-- ********** End main content ********** -->

