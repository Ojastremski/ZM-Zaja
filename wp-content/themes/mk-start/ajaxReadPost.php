<?php 
/**
Template Name: ajaxReadPost

*/

	$query_AllID = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'category_name' => 'aktualnosci',		
	);
		
	$counter = 0;
	$allPostsID = array();
	$execute_query1 = new WP_Query( $query_AllID ); 
	while ( $execute_query1->have_posts() ) : $execute_query1->the_post();
			$allPostsID[$counter] = get_the_ID();
			$counter++;
			
	endwhile;
	wp_reset_query();

	$division_into_sections = array_chunk($allPostsID,4);
	$length_array_sections = count($division_into_sections);
	//echo json_encode($division_into_sections);
	if ($_POST['action'] < $length_array_sections){
		$posts_to_display = array();
		$j = 0;
	
		$single_section = array(
			'post__in'	=> $division_into_sections[$_POST['action']],
			'post_status' => 'publish',
			'post_type' => 'post',
			'category_name' => 'aktualnosci',
			'order' => 'DESC'
		);
		$execute_query2 = new WP_Query( $single_section );
		while ( $execute_query2->have_posts() ) : $execute_query2->the_post();
				$posts_to_display[$j]['link'] = get_the_permalink();
				$posts_to_display[$j]['title'] = get_the_title();
				$posts_to_display[$j]['day'] = get_the_date('d');
				$posts_to_display[$j]['month'] = get_the_date('m');
				$posts_to_display[$j]['photo'] = get_the_post_thumbnail_url();
				$j++;
		endwhile;
		wp_reset_query();
		echo json_encode($posts_to_display);
	}
	else {
		$btn_section_active = "yes";
		echo json_encode($btn_section_active);
	}
?>