<?php
/**
Template Name: sliderOferta

*/
?>

<?php get_header(); ?>
<div class="container-fluid">

  <?php

  /* Start the Loop */
  while ( have_posts() ) : the_post();
		echo "<div class='row structurePostDescription'>";
		echo "<div class='col-md-12'>";
		the_post_thumbnail('full',array( 'class' => 'my_thumbnailInPost' ));
		echo "<div class='descriptionPost'>";
		the_content();
		echo "</div>";
		echo "</div>";
		echo "</div>";
  endwhile;
  ?>
</div><!-- /.container -->
<?php get_footer(); ?>
