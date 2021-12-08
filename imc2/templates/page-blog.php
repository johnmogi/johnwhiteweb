<?php
/*
Template Name: Blog
*/
__( 'Blog', 'imc' );
get_header();
$categories = get_categories();
/* ACF fields */

?>

<div class="container blog-categories-wrapper">
	<div class="row">
		<div class="col-md-12">
			<nav class="blog-categories">
				<ul class="d-flex">
					<?php 
					echo '<li class="current"><a href="'. get_permalink(129) .'">'. __('All','imc') .'</a></li>';
					foreach($categories as $category) {
					echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
					} ?>
				</ul>	
			</nav>		
		</div>
	</div>
</div>

<div id="content">
	<?php /*
	<section id="blog-hero" class="first-section">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			
		</div>
	</section> */ ?>

	<section id="blog-posts">
		<div class="container">
			<div class="row featured-posts-wrapper">
				<?php
					$main_post = get_field('main_post');
					$featured_post1 = get_field('featured_post1');
					$featured_post2 = get_field('featured_post2');

					$main_post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $main_post->ID ), 'single-post-thumb' );
					$main_post_image_mob = wp_get_attachment_image_src( get_post_thumbnail_id( $main_post->ID ), 'blog-post-thumb' );
					$featured_post1_image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post1->ID ), 'blog-post-thumb' );
					$featured_post2_image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post2->ID ), 'blog-post-thumb' );
				?>
				<div class="main-post">
					<a href="<?php echo get_the_permalink($main_post); ?>" id="post-<?php echo $main_post->ID; ?>" class="post-item">
						<span class="wrap-image">
							<img class="post-thumb desktop-only" src="<?php echo $main_post_image[0]; ?>" alt="<?php echo get_the_title($main_post); ?>">
							<img class="post-thumb mobile-only" src="<?php echo $main_post_image_mob[0]; ?>" alt="<?php echo get_the_title($main_post); ?>">
						</span>
						<h3><span><?php echo get_the_title($main_post); ?></span></h3>
					</a>	
				</div>

				<div class="featured-posts">
					<a href="<?php echo get_the_permalink($featured_post1); ?>" id="post-<?php echo $featured_post1->ID; ?>" class="post-item">
						<span class="wrap-image">
							<img class="post-thumb" src="<?php echo $featured_post1_image[0]; ?>" alt="<?php echo get_the_title($featured_post1); ?>">
						</span>
						<h3><span><?php echo get_the_title($featured_post1); ?></span></h3>
					</a>	
					<a href="<?php echo get_the_permalink($featured_post2); ?>" id="post-<?php echo $featured_post2->ID; ?>" class="post-item">
						<span class="wrap-image">
							<img class="post-thumb" src="<?php echo $featured_post2_image[0]; ?>" alt="<?php echo get_the_title($featured_post2); ?>">
						</span>
						<h3><span><?php echo get_the_title($featured_post2); ?></span></h3>
					</a>	
				</div>
			</div><!--.row-->
			<div id="posts-feed-container">
				<div id="posts-feed-flow">
					<div class="row posts-flow">
						<?php
							$hide_posts_arr = [/*812,773,742,*/$main_post->ID, $featured_post1->ID, $featured_post2->ID];
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
									'post_type' => 'post',
									'post__not_in' => $hide_posts_arr,
									'paged' => $paged
							);
							$query = new WP_Query( $args );
							if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
							$query->the_post(); 
							if ( $paged < $query->max_num_pages )
								$next_page_num = $paged + 1;
							else if ( $paged == $query->max_num_pages ) 
								$next_page_num = false;
							// Fields
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-thumb' );
							// Start Posts
							?>
								<div class="col-sm-6 col-md-4">
									<a href="<?php echo get_the_permalink(); ?>" id="post-<?php the_ID(); ?>" class="post-item">
										<span class="wrap-image">
											<img class="post-thumb" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
										</span>
										<h3><span><?php the_title(); ?></span></h3>
									</a>	
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
					<div class="row">
						<div class="col-md-12 text-center py-2 py-sm-5">
							<?php
								if($query->max_num_pages > 1 && $next_page_num != false ){
									echo '<a href="'.$_SERVER["REQUEST_URI"].'/page/'.$next_page_num.'" data-page="1" data-max-pages="'. $query->max_num_pages .'" id="load-more" class="btn">'. __('Load More') .'</a>';
								} 
							?>
						</div>
					</div>
					<div class="append-posts-feed-flow"></div>
				</div>
			</div>
		</div>
	</section>
</div><!--#content-->

<script>
	jQuery(document).ready(function() {
		$mainHeight = jQuery('#blog-posts .featured-posts .post-item:eq(1) img').position().top  + jQuery('#blog-posts .featured-posts .post-item:eq(1) img').height();
		//jQuery('#blog-posts .main-post .post-item').height($mainHeight);
	});
</script>

<?php
get_footer();


