<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Academic Technology Services
 */
?>

	</div><!-- #content -->

<!-- ******************** Footer ******************** -->
<div id="footer">
  <div class="outer_wrap">
      <div class="inner_wrap">
          <div id="footer_content">
              <!-- ********** Optional footer links ********** -->
              
              <!-- ********** End optional footer links ********** -->

              <!-- ********** Optional footer extras ********** -->
              
              <!-- ********** End optional footer extras ********** -->

              <!-- ********** Standard footer content ********** -->
              <div id="standard_footer" role="contentinfo">
                  <div class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></div>
                  <p><a href="mailto:<?php echo esc_attr( get_bloginfo( 'admin_email', 'display' ) ); ?>">Questions and comments?</a> | <a href="http://ucdavis.edu/help/privacy-accessibility.html">Privacy &amp; Accessibility</a> | Last update: Jan. 22, 2014</p>
                  <p>Copyright &#169; The Regents of the University of California, Davis campus. All rights reserved.</p>
              </div>
              <!-- ********** End standard footer content ********** -->
          </div>
      </div>
  </div>
</div>
<!-- ******************** End footer ******************** -->



<?php wp_footer(); ?>

</body>
</html>