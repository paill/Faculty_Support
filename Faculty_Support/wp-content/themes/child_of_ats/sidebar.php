<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Academic Technology Services
 */
?>
<?php do_action( 'before_sidebar' ); ?>

<!-- ********** Main sidebar ********** -->
<div id="main_sidebar">
<div id="main_sidebar_inner_wrap">
<h2 class="semantic_column_header">Secondary navigation and site ownership</h2>

<div class="nav_second" role="navigation"><h3><a href="<?php echo get_permalink($post->post_parent) ?>"><?php echo get_the_title($post->post_parent); ?></a></h3>

<ul>
<?php
$output = wp_list_pages('echo=0&depth=1&title_li=&exclude='.$post->ID);
if (is_page( )) {
  $page = $post->ID;
  if ($post->post_parent) {
    $page = $post->post_parent;
  }
  $children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );
  if ($children) {
    $output = wp_list_pages ('echo=0&child_of=' . $page . '&title_li=');
  }
}
echo $output;
?>
</ul></div>
<div class="quick_links">	
<h3>Related Links</h3>
<?php get_template_part('quicklinks'); ?> <!--- Imports quicklinks.php -->
</div>
<?php $options = get_option('ats_theme_settings'); ?>
<?php if($options){ ?>
<div id="ownership">
<h4><?php if($options['dept_name']!="") {echo $options['dept_name'];} ?></h4>
<p><?php if($options['dept_address']!="") {echo $options['dept_address'];} ?><br />
<?php if($options['dept_phone']!="") {echo $options['dept_phone'];} ?><br />
<?php if($options['dept_email']!=""){ ?> <a href="mailto:<?php echo $options['dept_email']; ?>"><?php echo $options['dept_email']; ?></a><?php } ?></p></div>
<?php } ?>
</div>
</div>

<!-- ********** End main sidebar ********** -->



