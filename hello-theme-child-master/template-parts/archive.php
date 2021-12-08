<?php

/**
 * The template for displaying archive pages.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
// distinguish parent and children...

global $post;

$postID = $post->ID;

$posts = get_posts(array());


?>
<div class="container mt-3">



	<main <?php post_class('site-main'); ?> role="main">


		<div class="page-content">

			<?php the_content(); ?>

			<?php
			$term = get_queried_object();

			$children = get_terms($term->taxonomy, array(
				'parent'    => $term->term_id,
				'hide_empty' => false,

			));
			// var_dump($term->name);
			$currentcat = get_category($term->term_id);

			if (!$currentcat->parent) {

				echo do_shortcode('[elementor-template id="274"]');


				if ($children) {
					echo '<div class="row">';

					foreach ($children as $subcat) {
						$image_id = get_term_meta($subcat->term_id, 'category-image-id', true);

						echo '<div class="post col-2"> ';

						//printf('<h2 class="%s">%s</h2>', 'entry-title', $post_link, esc_html(get_the_title()));
						printf('<a href="%s">%s</a>', esc_url(get_term_link($subcat, $subcat->taxonomy)), wp_get_attachment_image($image_id, 'thumbnail'));
						echo '<a href="' . esc_url(get_term_link($subcat, $subcat->taxonomy)) . '">' . $subcat->name . '</a>';
						//	printf('<a href="%s">%s</a>', esc_url($post_link), get_the_post_thumbnail($post, 'large'));
						// the_excerpt();
						echo '</div>';
					}
					echo '</div> ';
				}
			} else {
				echo do_shortcode('[elementor-template id="73"]');
				echo '<div class="row">';

				$args = array('cat' => $term->term_id);
				$category_posts = new WP_Query($args);
				if ($category_posts->have_posts()) :
					while ($category_posts->have_posts()) :
						$category_posts->the_post();

						#$title =  get_field("title", get_the_ID());
						$exif =  get_field("exif",  get_the_ID());
						$fullImage =  get_field("full_resolution_image",  get_the_ID());
						$ndvi =  get_field("ndvi_image",  get_the_ID());
						$signature =  get_field("signature_image",  get_the_ID());
						$before =  get_field("before_image",  get_the_ID());
						$after =  get_field("after_image",  get_the_ID());
						$gmplng =  get_field("gmplng",  get_the_ID());
						$gmplat =  get_field("gmplat",  get_the_ID());

			?>
						<div class="post col-2 card">
							<?php
							echo '
								<a href="#" data-toggle="modal" data-bs-target="#myModal-' . (get_the_ID()) . '"  data-bs-toggle="modal">' . get_the_post_thumbnail($post, 'large') . '</a>';
							echo '<a href="' . esc_attr($post_link2) . '" >' . esc_attr(the_title()) . '</a>';
							?>
						</div>
					<?php
						echo '
			<div class="modal right fade" id="myModal-' . (get_the_ID()) . '"
			 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
			 <div class="modal-dialog" role="document">
			 	<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
					 <div class="modal-body">

					 <div class="accordion accordion-flush" id="accordionFlushExample">

					 <div class="accordion-item">
<h2 class="accordion-header" id="flush-heading-' . (get_the_ID()) . '">
	<p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . (get_the_ID()) . '7" aria-expanded="false" aria-controls="flush-collapse-' . (get_the_ID()) . '">
	Phenomenon Multispectral signature
	</p>
</h2>
<div id="flush-collapse' . (get_the_ID()) . '7" class="accordion-collapse collapse show" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
	<div class="accordion-body">
	<script>
	jq2 = jQuery.noConflict();
	jq2(function($) {
		$(document).ready(function() {
	new BeerSlider(document.getElementById("beer-slider-' . (get_the_ID()) . '"));
});
}); </script>
	<div id="beer-slider-' . (get_the_ID()) . '" class="beer-slider" data-beer-label="before">
	<img src="' . esc_attr($before) . '" alt="">
	<div class="beer-reveal" data-beer-label="after">
		<img src="' . esc_attr($after) . '" alt="">
	</div>
</div>


	</div>
</div>
</div>


					 <div class="accordion-item">
					   <h2 class="accordion-header" id="flush-headingOne">
						 <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . (get_the_ID()) . '1" aria-expanded="false" aria-controls="flush-collapseOne">
						 Full resolution source image
						 </p>
					   </h2>
					   <div id="flush-collapse' . (get_the_ID()) . '1" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
						 <div class="accordion-body">
						 <div class="card-body">
						 <img src="' . esc_attr($fullImage) . '" alt="">

					 		</div>
					 		 </div>
					 </div>

					 <div class="accordion-item">
					 <h2 class="accordion-header" id="flush-heading-' . (get_the_ID()) . '">
					   <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . (get_the_ID()) . '4" aria-expanded="false" aria-controls="flush-collapse-' . (get_the_ID()) . '">
					   EXIF- image info
					   </p>
					 </h2>
					 <div id="flush-collapse' . (get_the_ID()) . '4" class="accordion-collapse collapse" aria-labelledby="flush-heading-' . (get_the_ID()) . '" data-bs-parent="#accordionFlushExample">
					   <div class="accordion-body">
					   <p>' . esc_attr($exif) . '</p>
					   </div>
					   </div>
				   </div>



				   <div class="accordion-item">
				   <h2 class="accordion-header" id="flush-heading-' . (get_the_ID()) . '">
					 <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . (get_the_ID()) . '6" aria-expanded="false" aria-controls="flush-collapse-' . (get_the_ID()) . '">
					 Present on Google Maps
					 </p>
				   </h2>
				   <div id="flush-collapse' . (get_the_ID()) . '6" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
					 <div class="accordion-body">
					 <iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=' . esc_attr($gmplat) . ',' . esc_attr($gmplng) . '&hl=en&z=15&amp;output=embed">
					  </iframe>				   </div>
					 </div>
				 </div>


				 



			

				

				   </div> <!-- accordion -->
	
				</div>
  			</div>
	
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
    	</div>
  	</div>
  </div>';

					endwhile;
				else :
					?>

					Oops, there are no posts.

			<?php
				endif;
				echo '<div class="row">';
			}

			?>




			<!-- 
			<div id="slider1" class="beer-slider" data-beer-label="before" data-start="25">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/dogs-before.jpg" alt="Dogs - before, unprocessed image">
				<div class="beer-reveal" data-beer-label="after">
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/dogs-after.jpg" alt="Dogs - after, processed photo">
				</div>
			</div>
			<div id="slider2" class="beer-slider beer-slider-wlabels" data-beer-label="before" data-start="75">
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/original-baltic.jpg" alt="Original baltic seashore">
				<div class="beer-reveal" data-beer-label="after">
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/74321/warmsphere-baltic.jpg" alt="Baltic seashore - processed image Warmsphere preset">
				</div>
			</div> -->







	</main>


	<head>
		<style>

		</style>
		<link rel="stylesheet" href="https://unpkg.com/beerslider/dist/BeerSlider.css">

		<script src="https://unpkg.com/beerslider/dist/BeerSlider.js"></script>

		<script>
			new BeerSlider(document.getElementById('slider1'));


			jq2 = jQuery.noConflict();

			jq2(function($) {
				$(document).ready(function() {

					//new BeerSlider(document.querySelector(".beer-slider"));

					$(".btn-link").click(function() {
						$(this).toggleClass("collapsed");
					});

				});




			});
		</script>
	</head>
</div>
<?php
wp_reset_query();
