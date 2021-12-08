<?php
/**
 * Template part for all articles
 *
 */
?>
<div class="row medical-cannabis-flow">
	<?php 
		$args = array(
				'post_type' => 'post',
				//'post__not_in' => array(812),
				'posts_per_page' => 6,
				'meta_query' => array(
					array(
					  'key' => 'show_in_homepage_all',
					  'value' => '1',
					  'compare' => '==' // not really needed, this is the default
					)
				  )
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
		$query->the_post(); 
		// Fields
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-thumb' );
		$bg_image = ($image) ? ' style="background-image: url('. $image[0] .') ;"' : '';
		// Start Posts
		?>
			<div class="col-6 col-lg-4 mb-sm-4 item">
				<div class="card">
					<div id="post-<?php the_ID(); ?>"
						<?php if($bg_image){
							echo 'class="post-item"' . $bg_image;
						} else {
							echo 'class="post-item no-background"';
						} 
						?>
					>
							<div class="card-body">
								<h3 class="mb-auto"><?php the_title(); ?></h3>
								<a href="<?php echo get_the_permalink(); ?>"><?php echo __('Read More','imc') . '<span class="sr-only">'. __('about', 'imc') . ' ' .get_the_title().'</span> >'; ?></a>
							</div>
					</div>	
				</div>	
			</div>	
		<?php
		// End Posts
		}} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
	?>
</div>