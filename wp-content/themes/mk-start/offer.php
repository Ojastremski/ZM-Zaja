<?php
/**
Template Name: offer
*/
?>

<?php get_header(); ?>

<div class="container">
<div class="row">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>

<?php
	$offers = array(
			'post_type' => 'post',
			'order' => 'ASC',
			'post_status' => 'publish',
			'category_name' => 'produkty-oferta'
	);
	$execute_query1 = new WP_Query( $offers );
	while ( $execute_query1->have_posts() ) : $execute_query1->the_post();
		echo "<div class='col-lg-4 col-md-4  col-sm-6 col-xs-12 column'>";
		echo "<div class='test2'>";
?>
		<a href="<?php the_permalink(); ?>" class="aclass">
			<?php
				the_post_thumbnail('full',array( 'class' => 'img-responsive' ));
				the_title("<div class='title'>","</div>");
			?>
		</a>
<?php
		echo "</div>";
		echo "</div>";
	endwhile;
?>

</div>
</section>
<div style="height: 101px;"></div>
</div>

<?php get_footer(); ?>