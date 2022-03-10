<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #main-container div and all content after.
 */
?>

</div><!-- #main-container -->


<footer>
  <div class="container">

    <div class="footer-widget-area">
      <div class="row">

        <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
          <div class="col-md-4 col-sm-12 footer-widget first" role="complementary">
            <?php dynamic_sidebar( 'footer-widget-1' ); ?>
          </div><!-- .footer-widget .first -->
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
          <div class="col-md-4 col-sm-12 footer-widget second" role="complementary">
            <?php dynamic_sidebar( 'footer-widget-2' ); ?>
          </div><!-- .footer-widget .second -->
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
          <div class="col-md-4 col-sm-12 footer-widget third" role="complementary">
            <?php dynamic_sidebar( 'footer-widget-3' ); ?>
          </div><!-- .footer-widget .third -->
        <?php endif; ?>


      </div>
    </div>

      <div class="row" id="main-footer">       
         <div class="col col-12 copyright-text">&copy; <?php echo date('Y');?> KA | <a href="#">Privacy Policy</a></div>

    </div> 


</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>