<?php
/*
Template Name: Homepage
*/
__( 'Homepage', 'imc' );
get_header();

/* ACF fields */
$home_hero_image = get_field( 'home_hero_image' );
$home_hero_image_m = get_field( 'home_hero_image_m' );
$home_hero_title = get_field( 'home_hero_title' );
$home_hero_text = get_field( 'home_hero_text' );
$home_hero_link_products = get_field( 'home_hero_link_products' );
$home_hero_link_about = get_field( 'home_hero_link_about' );
$highlights_title = get_field( 'highlights_title' );
$highlights = get_field( 'highlights' );
$home_testimonial_image = get_field( 'home_testimonial_image' );
$home_testimonial_title = get_field( 'home_testimonial_title' );
$home_testimonial_text = get_field( 'home_testimonial_text' );
$home_testimonial_image_sig = get_field( 'home_testimonial_image_sig' );
$home_testimonial_name = get_field( 'home_testimonial_name' );
$home_testimonial_link = get_field( 'home_testimonial_link' );
$home_about_image = get_field( 'home_about_image' );
$home_about_title = get_field( 'home_about_title' );
$home_about_text = get_field( 'home_about_text' );
$home_about_link = get_field( 'home_about_link' );
$medical_cannabis_title = get_field( 'medical_cannabis_title' );
$medical_cannabis_text = get_field( 'medical_cannabis_text' );

?>

<div id="content">
	<section id="home-hero" class="first-section">
		<div class="container-fluid">
			<div class="d-flex justify-content-center justify-content-lg-start flex-column wrap-background">
				<div class="d-none d-sm-block bgimage"
					<?php if($home_hero_image){
						echo ' style="background-image: url('. wp_get_attachment_image_url($home_hero_image['id'],'full') .');"';
					} ?>
				>
				</div>
				<div class="d-block d-sm-none bgimage"
					<?php if($home_hero_image_m){
						echo ' style="background-image: url('. wp_get_attachment_image_url($home_hero_image_m['id'],'full') .');"';
					} ?>
				>
				</div>
				<div class="wrap-text">
					<h1><?php echo $home_hero_title; ?></h1>
					<p><?php echo $home_hero_text; ?></p>
					<div class="buttons"> 
    					<a class="btn btn-blue" href="<?php echo $home_hero_link_products; ?>"><?php pll_e('Our flowers and Oils'); ?></a>
				  
						<a class="btn btn-blue" href="<?php echo $home_hero_link_about; ?>" class="d-none d-sm-inline-block"><?php echo __('About IMC','imc'); ?></a>
					</div>               
				</div>
			</div>
		</div>
	</section>

	<section id="highlights">
		<div class="container">
			<h2><?php echo $highlights_title; ?></h2>
			<?php if($highlights){
				$i = 1;
				foreach ($highlights as $row) {
					$flip = ($i % 2 == 0) ? 'flex-row-reverse' : '';
					# fields...
					$picture = $row['picture'];
					$title = $row['title'];
					$text = $row['text'];
					$button_text = $row['button_text'];
					$button_url = $row['button_url'];
					// Start ROW
						echo '<div class="item row align-items-center';
						if($flip){
							echo ' ' . $flip;
						}
						echo '">';
							echo '<div class="col-md-6 p-sm-0">';
								echo '<img src="'. wp_get_attachment_image_url($picture['id'],'full') .'" alt="">';
							echo '</div>';
							echo '<div class="col-md-6 px-5">';
								echo '<h3>'. $title .'</h3>';
								echo '<p>'. $text .'</p>';
								echo '<a class="btn" href="'. $button_url .'">'. $button_text .'<span class="sr-only">'. __('about', 'imc') .' '. $title .'</span></a>';
							echo '</div>';
						echo '</div>';
					// End ROW
					$i++;
				}
			} ?>
		</div>
	</section>
	<!-- <section id="testimonials-about" class="d-flex text-center">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-6 mb-3 mb-sm-0">
					<div class="testimonials d-flex flex-column align-items-center">
						<img class="face" src="<?php echo wp_get_attachment_image_url($home_testimonial_image['id'],'thumbnail') ?>" alt="<?php echo $home_testimonial_title; ?>">
						<h2><?php echo $home_testimonial_title; ?></h2>
						<p><?php echo $home_testimonial_text; ?></p>
						<img class="signature" src="<?php echo wp_get_attachment_image_url($home_testimonial_image_sig['id'],'full') ?>" alt="">
						<h3><?php echo $home_testimonial_name; ?></h3>
						<a class="btn btn-black mt-auto" href="<?php echo $home_testimonial_link; ?>"><?php echo __('Read More','imc'); ?><span class="sr-only"><?php echo __('about', 'imc') . ' ' . $home_testimonial_title; ?></span></a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="about d-flex flex-column align-items-center">
						<img class="face" src="<?php echo wp_get_attachment_image_url($home_about_image['id'],'thumbnail') ?>" alt="<?php echo $home_about_title; ?>">
						<h2><?php echo $home_about_title; ?></h2>
						<p><?php echo $home_about_text; ?></p>
						<a class="btn btn-black mt-auto" href="<?php echo $home_about_link; ?>"><?php echo __('About IMC','imc'); ?></a>					
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<section id="medical-cannabis">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2 class="px-5 px-sm-0"><?php echo $medical_cannabis_title; ?></h2>
					<p class="intro px-5 px-sm-0"><?php echo $medical_cannabis_text; ?></p>
					<form>
						<select id="tabs-select" class="form-control d-none d-sm-none mb-3">
							<option value='0'><?php echo __('All','imc'); ?></option>
							<?php if(have_rows('categories_to_show')) { 
								$options_counter = 1;
								while(have_rows('categories_to_show')) { 
									the_row();
									$mag_cat = get_sub_field('category');
									$catinfo = get_category($mag_cat);
								?>
									<option value='<?php echo $options_counter; ?>'><?php echo $catinfo->name; ?></option>
								<?php $options_counter++; }
							} ?>
						</select>
					</form>
					<ul class="nav d-none d-sm-block tabs" role="tablist">
						<li class="">
							<a class="active" data-toggle="tab" href="#tabs-1" role="tab"><?php echo __('All','imc'); ?></a>
						</li>
						<?php if(have_rows('categories_to_show')) { 
								$tabs_counter = 2;
								while(have_rows('categories_to_show')) { 
									the_row();
									$mag_cat = get_sub_field('category');
									$catinfo = get_category($mag_cat);
							?>
									<li class="">
										<div style="display: none;"><?php var_dump($catinfo); ?></div>
										<a class="" data-toggle="tab" href="#tabs-<?php echo $tabs_counter; ?>" role="tab"><?php echo $catinfo->name; ?></a>
									</li>
							<?php $tabs_counter++; }
						} ?>
						
					</ul>
				</div><!--col-md-6-->

				<div class="col-md-6 py-4 py-sm-0">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tabs-1" role="tabpanel">
							<!-- <p>All Articles</p> -->
							<?php get_template_part('template-parts/medical-cannabis/all-articles'); ?>
						</div>
						<?php if(have_rows('categories_to_show')) { 
							$tabs_counter = 2;
							while(have_rows('categories_to_show')) { 
								the_row();
								$mag_cat = get_sub_field('category');
								$catinfo = get_category($mag_cat);
								$cat_id = $catinfo->term_id;

									?>
						
							<div class="tab-pane fade" id="tabs-<?php echo $tabs_counter; ?>" role="tabpanel">
								<div class="row medical-cannabis-flow">
									<?php 
										$args = array(
												'post_type' => 'post',
												//'post__not_in' => array(812),
												'cat' => $cat_id,
												'posts_per_page' => 6,
												//'post_status' => 'any',
												'meta_query' => array(
													array(
													  'key' => 'show_in_homepage',
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
											}
										} else {
											// no posts found
										}

										// Restore original Post Data
										wp_reset_postdata();
									?>
								</div><!--.row-->
							</div><!--.tab-pane-->
							<?php $tabs_counter++; } 
						} ?>
					</div><!--.tab-content-->
				</div><!--.col-md-6-->
			</div><!--.row-->
		</div><!--.container-->
	</section><!--#medical-cannabis-->
<div><!--#content-->

<?php
// get_template_part('template-parts/testimonials');
get_template_part('template-parts/relevant-info');
get_footer();


