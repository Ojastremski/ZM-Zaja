<?php
/*
	Template Name: news
*/
?>
<?php get_header(); ?>

<div class="container-fluid">
<section id="sectionNews">
<div class="row structurePostDescription">
<div class="col-lg-12">
	<div class="col-lg-6">
		<div class="sectionNews">
			<div class="sectionTitleNews"></div>
		</div>
	</div>
</div>
<div class="row structurePostDescription">
<div class="col-lg-12">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>

<?php
	$firstPostSection = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 4,
			'category_name' => 'aktualnosci',
			'order' => 'DESC'
	);
		
	$execute_query1 = new WP_Query( $firstPostSection ); 
	$months = array(
			'01' =>	'sty',
			'02' =>	'lut',
			'03' =>	'mar',
			'04' => 'kwi',
			'05' =>	'maj',
			'06' =>	'cze',
			'07' =>	'lip',
			'08' =>	'sie',
			'09' =>	'wrz',
			'10' =>	'paź',
			'11' => 'lis',
			'12' => 'gru'
	);

	$counter = 1;
	while ( $execute_query1->have_posts() ) : $execute_query1->the_post();
		echo "<div class='col-lg-6'>";
		if ($counter %2 == 0){
			echo "<div class='tileNews tileLeftAlign center'>";
		}
		else {
			echo "<div class='tileNews tileRightAlign center'>"; 
		}
		echo "<div class='blockDatePublish'>";
		echo "<span class='month'>".$months[get_the_date('m')]."</span>";
		echo "<span class='day'>".get_the_date('d')."</span>";
		echo "</div>";
		echo "<div class='separatorInNewsTile'></div>";
		?>
		<a href="<?php the_permalink(); ?>">
		<?php
		echo "<div class='blockThumbnail'>";
		the_post_thumbnail('full',array( 'class' => 'my_thumbnail' ));
		echo "<div class='blockTitle'>";
		the_title('<span class=titleText>','</span>')."</span>";
		echo "</div>";
		echo "</div>";
		?>
		</a>
		<?php
		echo "</div>";
		if ($counter %2 == 0){
			echo "<div class='separatorRow'></div>";
		}
		else {
			echo "<div class='separatorMobileRow'></div>";
		}
		echo "</div>";
		$counter++;
	endwhile;
?>
<div id="nextSection"></div>
<button id="oldPost" class="oldPost btn btn-default" type="button">Starsze</button>
<?php wp_reset_postdata();?>
</div></div></div>
</section>
<?php get_footer(); ?>