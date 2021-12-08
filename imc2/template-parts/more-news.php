<?php

/**

 * Template part for more news

 *

 */

?>

<section id="more-news">

	<div class="container">

		<h2><?php echo __('More News and Articles','imc'); ?></h2>

			<div class="row">

				<?php 

					$args = array(

							'post_type' => 'post',

							'post__not_in' => array($post->ID,812),

							'posts_per_page' => 3

					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {

					while ( $query->have_posts() ) {

					$query->the_post(); 

					// Fields

					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-thumb' );

					// Start Posts

					?>

						<div class="col-sm-6 col-md-4">

							<div id="post-<?php the_ID(); ?>" class="post-item">

								<a class="wrap-image" href="<?php echo get_the_permalink(); ?>">

									<img class="post-thumb" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">

								</a>

								<h3><?php the_title(); ?></h3>

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

	</div>

</section>