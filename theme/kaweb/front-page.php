<?php
/**
 * Default page template
 */

get_header(); ?>
<div id="content">
 <div class="container">    
  <div class="row">

   <div class="pagetitle">
    <div class="heading text-left"><h1><?php the_title();?></h1></div>
  </div>
</div>

<?php
      /**
       * Get page content
       */
      
      while (have_posts()) : the_post();
       the_content();
     endwhile;
     wp_reset_query();
     ?>

   </div>
 </div>
</div>
<?php
get_footer(); 
?>