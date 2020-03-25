<?php get_header(); ?>
<div class="container-fluid">

  <?php
  //echo 'jestem w front-page';

  // args
  $args = array(
      'posts_per_page'   => -1,
      'order'            => 'ASC',
      'post_type'        => 'page',
      'post_status'      => 'publish',
      'meta_query' => array(
          array(
              'key'     => 'front-page',
              'value'   => 'tak',
              'compare' => '=',
          ),
      ),

  );

  // query
  $the_query = new WP_Query( $args );

  ?>
  <?php if( $the_query->have_posts() ): ?>
      <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php the_content(); ?>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

</div><!-- /.container -->
<?php get_footer(); ?>
