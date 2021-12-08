<?php
get_header();
global $wp_query;
$count = $wp_query->post_count;
?>


<section class="content" id="search-results">
	<div class="banner-wrap donate-banner">
		<div class="banner-content d-flex">
			<div class="container">
				<h1><?php echo __( 'Search Results', 'imc') . ':'; ?></h1>
				<h2><?php echo __( 'We have found', 'imc') . ' ' . $count . ' ' . __( 'Results for', 'imc') . ' &quot;' . get_search_query() . '&quot;'; ?></h2>
					<?php
							if ( have_posts() ) : while ( have_posts() ) : the_post();
								$image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-search' );
								?>
									<article class="clearfix">
					                    <div class="image">
					                        <?php
					                            echo '<a href="'. get_the_permalink() .'">';
					                            if($image_thumb){
					                                echo '<img src="'. $image_thumb[0] .'">';
					                            } else {
					                                echo '<img src="';
					                                	getImage('search-thumb-default.jpg');
					                                echo '" alt="">';
					                            }
					                            echo '</a>';
					                        ?>
					                    </div>
					                    <div class="content">
						                        <h2><?php the_title(); ?></h2>
						                        <p><?php excerpt(30); ?>...</p>
												<a href="<?php the_permalink(); ?>">
													<?php echo __('Continue Reading','imc') . ' &gt;'; ?>
												</a>
					                    </div>
					                </article>
						<?php endwhile;
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
						?>

			</div>
		</div>
	</div>

</section>


<?php 
	get_footer();
