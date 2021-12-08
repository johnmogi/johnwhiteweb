<?php
/*
Template Name: About
*/
__( 'About', 'imc' );
get_header();

/* ACF fields */
$about_hero_image = get_field( 'about_hero_image' );
$about_hero_image_m = get_field( 'about_hero_image_m' );
$about_hero_title = get_field( 'about_hero_title' );
$about_hero_sub_title = get_field( 'about_hero_sub_title' );
$text_boxes = get_field( 'text_boxes' );
$process_title = get_field( 'process_title' );
$process_intro = get_field( 'process_intro' );
$process = get_field( 'process' );

$about_testimonial_image = get_field( 'about_testimonial_image' );
$about_testimonial_title = get_field( 'about_testimonial_title' );
$about_testimonial_text = get_field( 'about_testimonial_text' );
$about_testimonial_image_sig = get_field( 'about_testimonial_image_sig' );
$about_testimonial_name = get_field( 'about_testimonial_name' );
$about_testimonial_button_link = get_field( 'about_testimonial_button_link' );
$about_explore_image = get_field( 'about_explore_image' );
$about_explore_title = get_field( 'about_explore_title' );
$about_explore_text = get_field( 'about_explore_text' );
$about_explore_link = get_field( 'about_explore_link' );

?>

<div id="content">
	<section id="about-hero" class="first-section">
		<div class="container-fluid">
			<div class="d-flex justify-content-center justify-content-lg-start flex-column wrap-background">
				<div class="d-none d-sm-block bgimage"
					<?php if($about_hero_image){
						echo ' style="background-image: url('. wp_get_attachment_image_url($about_hero_image['id'],'full') .');"';
					} ?>
				>
				</div>
				<div class="d-block d-sm-none bgimage"
					<?php if($about_hero_image_m){
						echo ' style="background-image: url('. wp_get_attachment_image_url($about_hero_image_m['id'],'full') .');"';
					} ?>
				>
				</div>
				<div class="wrap-text">
					<h1><?php echo $about_hero_title; ?></h1>
					<p><?php echo $about_hero_sub_title; ?></p>                
				</div>
			</div>
		</div>
	</section>

	<section id="text-boxes">
		<div class="container">
			<?php if($text_boxes){
				$i = 1;
				foreach ($text_boxes as $row) {
					$flip = ($i % 2 == 0) ? 'flex-row-reverse' : 'row-normal';
					# fields...
					$picture = $row['picture'];
					$title = $row['title'];
					$text = $row['text'];
					$image_alt = get_post_meta($picture['id'], '_wp_attachment_image_alt', TRUE);

					// Start ROW
						echo '<div class="item row align-items-center';
						if($flip){
							echo ' ' . $flip;
						}
						echo '">';
							echo '<div class="col-md-6">';
								echo '<h3>'. $title .'</h3>';
								echo '<p>'. $text .'</p>';
							echo '</div>';
							echo '<div class="col-md-6">';
								echo '<img src="'. wp_get_attachment_image_url($picture['id'],'full') .'" alt="'.$image_alt.'">';
							echo '</div>';
						echo '</div>';
					// End ROW
					$i++;
				}
			} ?>
		</div>
	</section>
	<section id="process" class="text-center">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="bg-process">
						<div class="container">
							<h2><?php echo $process_title; ?></h2>
							<div class="intro"><?php echo $process_intro; ?></div>
								<?php if($process){
									echo '<div class="row process-boxes">';
									foreach ($process as $row) {
										# fields...
										$title = $row['title'];
										$text = $row['text'];
										// Start ROW
												echo '<div class="col-md-4 text-left">';
													echo '<h3>'. $title .'</h3>';
													echo '<p>'. $text .'</p>';
												echo '</div>';

										// End ROW
										$i++;
									}
									echo '</div>';
								} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="testimonials-about" class="d-flex text-center">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-6 mb-3 mb-sm-0">
					<div class="testimonials d-flex flex-column align-items-center">
						<?php 
							$t_image_alt = get_post_meta($about_testimonial_image['id'], '_wp_attachment_image_alt', TRUE); 
							$t_sig_image_alt = get_post_meta($about_testimonial_image_sig['id'], '_wp_attachment_image_alt', TRUE); 
						?>
						<img class="face" src="<?php echo wp_get_attachment_image_url($about_testimonial_image['id'],'thumbnail') ?>" alt="<?php echo $t_image_alt; ?>">
						<h2><?php echo $about_testimonial_title; ?></h2>
						<p><?php echo $about_testimonial_text; ?></p>
						<img class="signature" src="<?php echo wp_get_attachment_image_url($about_testimonial_image_sig['id'],'full') ?>" alt="<?php echo $t_sig_image_alt; ?>">
						<h3><?php echo $about_testimonial_name; ?></h3>
						<a class="btn btn-black mt-auto" href="<?php echo $about_testimonial_button_link; ?>"><?php echo __('Read More','imc'); ?><span class="sr-only"><?php echo __('about', 'imc') . ' ' . $about_testimonial_title; ?></span></a>           
					</div>
				</div>
				<div class="col-md-6">
					<div class="about d-flex flex-column align-items-center">
						<?php $about_image_alt = get_post_meta($about_explore_image['id'], '_wp_attachment_image_alt', TRUE); ?>
						<img class="face" src="<?php echo wp_get_attachment_image_url($about_explore_image['id'],'thumbnail') ?>" alt="<?php echo $about_image_alt; ?>">
						<h2><?php echo $about_explore_title; ?></h2>
						<p><?php echo $about_explore_text; ?></p>
						<a class="btn btn-black mt-auto" href="<?php echo $about_explore_link; ?>"><?php echo __('Explore Articles','imc'); ?></a>                    
					</div>
				</div>
			</div>
		</div>
	</section>
</div><!--#content-->

<?php
get_template_part('template-parts/relevant-info');
get_footer();


