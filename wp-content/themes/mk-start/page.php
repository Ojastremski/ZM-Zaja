<?php get_header(); ?>
<div class="container-fluid">
<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
?>
</div><!-- /.container -->
<?php get_footer(); ?>
