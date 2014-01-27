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

	<div class="repeating_content_block clear_below"><h3><?php the_title(); ?></h3>
		<?php the_content(); ?>
		<?php edit_post_link( __( 'Edit', 'ats' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .repeating_content_block -->

</div>
</div>
<!-- End center column -->
<!-- Optional right column -->
<!-- End optional right column -->
</div>
<!-- ********** End main content ********** -->

