<?php
get_header();
$categories = get_categories();
$category = get_queried_object();
$category_id = $category->term_id;

/* ACF fields */
$current_cat_ID = get_query_var('cat');
?>

<div class="container blog-categories-wrapper">
	<div class="row">
		<div class="col-md-12">
			<nav class="blog-categories">
				<ul class="d-flex">
					<?php 
					echo '<li><a href="'. get_permalink(129) .'">'. __('All','imc') .'</a></li>';
					foreach($categories as $category) {
						$cat_ID = get_category_link($category->term_id);
						// get active category
						$active = (($category->term_id) == $category_id) ? ' class="current"' : '';
						
						echo '<li'. $active .'><a href="' . $cat_ID . '">' . $category->name . '</a></li>';
					} ?>
				</ul>	
			</nav>		
		</div>
	</div>
</div>
<section id="blog-hero" class="first-section">
	<div class="container">
		<h1><?php single_cat_title(); ?></h1>
	</div>
</section>

<section id="blog-posts">
	<div class="container">
		<div class="row">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
						'post_type' => 'post',
						//'post__not_in' => [812,773,742],
						'posts_per_page' => -1,
				    	'cat' => $current_cat_ID,
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
							<h3><span><?php the_title(); ?></span></h3>
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
    
<?php
get_footer();
