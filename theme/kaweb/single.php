<?php
/**
 * Default Kaweb single post template
 */

get_header(); ?>
<div id="content">
   <div class="container">     
      <div class="row align-items-center">
         <div class="col-12 col-lg-5 single-left">
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

   <div class="col-12 col-lg-7 single-right text-center">
      <?php
      if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <img src="<?php echo $image[0];?>" alt="<?php the_title();?>"/>
     <?php endif;?>
     </div>

  </div>
</div>

<?php
get_footer(); 
?>