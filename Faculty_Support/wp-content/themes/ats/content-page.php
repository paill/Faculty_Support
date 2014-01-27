<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Academic Technology Services
 */
?>

<div class="repeating_content_block clear_below" id="post-<?php the_ID(); ?>">
<h3><?php the_title(); ?></h3>
	<?php the_content(); ?>
<?php edit_post_link( __( 'Edit', 'ats' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</div>
