<?php
	/*

	Template Name: Tag

	*/
	__( 'Tag', 'imc' );
    get_header();
    $tag = get_queried_object();
    $current_tag = $tag->term_id;

    // ACF
    $tag_main_text = get_field('tag_main_text');
    $tag_main_title_boxes = get_field('tag_main_title_boxes');
    ?>
    <div class="secondary-header">
		<div class="container">
			<?php the_breadcrumb(); ?>
		</div>
	</div>	
	<!--Content Area Start-->
			<div class="content amazing-beach">
				<div class="about-bnr alighncenter">
					<?php get_template_part( 'template-parts/top', 'title' ); ?>
				</div>
				<div class="amazing-des-wrp">
					<div class="container">
						<div class="about-us-des alighnright">
							<p><?php echo $tag_main_text; ?></p>
						</div>
					</div>
				</div>
				<div class="amazing-images-wrp alighnright">
					<div class="container">
						<h2 class="alighncenter"><?php echo $tag_main_title_boxes; ?></h2>
						<div class="what-experience">
							<ul class="experince-list">
								<?php
						        $args = array( 
						                'post_type' => 'trip',
						                'tag_id' => $current_tag,
						                //'paged' => $paged,
						                'posts_per_page' => -1,
						                'order' => 'DESC'
						            );
						            $query = new WP_Query( $args );
						                if ( $query->have_posts() ) {
						                    while ( $query->have_posts() ) {

						                    $query->the_post();
						                    // Fields
						                    $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'trip-thumb' );
						        	?>
										<li>
											<a href="<?php the_permalink(); ?>">
												<figure>
													<img src="<?php echo $image_thumb[0]; ?>" alt=""/>
													<figcaption>
														<h4><?php the_title(); ?></h4>
														<p><?php excerpt(25); ?></p>
													</figcaption>
												</figure>
											</a>
										</li>
								<?php 
								            }} else {
								                  // no posts found
								                }
							            wp_reset_postdata();
							    ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="amazing-images-wrp2 alighnright">
					<div class="container">
						<h2 class="alighncenter"><?php echo __('Our Special','imc') ?></h2>
						<div class="what-experience">
							<ul class="experince-list">
								<?php
						        $args = array( 
						                'post_type' => 'trip',
						                'tag_id' => 13,
						                //'paged' => $paged,
						                'posts_per_page' => -1,
						                'order' => 'DESC'
						            );
						            $query = new WP_Query( $args );
						                if ( $query->have_posts() ) {
						                    while ( $query->have_posts() ) {

						                    $query->the_post();
						                    // Fields
						                    $image_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'trip-thumb' );
						        	?>
									<li>
										<a href="<?php the_permalink(); ?>">
											<figure>
											<img src="<?php echo $image_thumb[0]; ?>" alt=""/>
												<figcaption>
													<h4><?php the_title(); ?></h4>
													<p><?php excerpt(25); ?></p>
												</figcaption>
											</figure>
									</a>
									</li>
								<?php 
								            }} else {
								                  // no posts found
								                }
							            wp_reset_postdata();
							    ?>

							</ul>
						</div>
					</div>
				</div>
				<?php get_template_part( 'template-parts/footer', 'form' ); ?>
			</div>
			<!--Content Area End-->
			<?php
	get_footer();

