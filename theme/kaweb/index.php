<?php
/**
* Main template file, generic template for pages when no specific template exists
*/

get_header(); ?>
<div id="content">
	<div class="container">     
		<div class="pagetitle">
			<div class="heading text-left"><h1><?php the_title();?></h1></div>
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

<?php
get_footer(); 
?>