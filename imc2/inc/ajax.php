<?php

function load_more_posts() {
	$paged = $_POST["page"]+1;
	$args = array(
		'post_type' => 'post',
		'paged' => $paged
	);
	$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
		$query->the_post(); 
		// Fields
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-thumb' );
		// Start Posts
		?>
			<div class="col-md-4">
				<div id="post-<?php the_ID(); ?>" class="post-item">
					<a class="wrap-image" href="<?php echo get_the_permalink(); ?>">
						<img class="post-thumb" src="<?php echo $image[0]; ?>" alt="">
					</a>
					<h3><?php the_title(); ?></h3>
				</div>	
			</div>		
		<?php
		// End Posts
		}} else {
			// no posts found
	}
	wp_reset_postdata();
	die();
}

add_action( 'wp_ajax_load_more_posts', 'load_more_posts' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts' );


