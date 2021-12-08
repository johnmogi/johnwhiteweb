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
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>
					 <div class="modal-body">

					 <div class="accordion accordion-flush" id="accordionFlushExample">


					 <div class="accordion-item">
					   <h2 class="accordion-header" id="flush-headingOne">
						 <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . (get_the_ID()) . '1" aria-expanded="false" aria-controls="flush-collapseOne">
						 Full resolution source image
						 </p>
					   </h2>
					   <div id="flush-collapse' . (get_the_ID()) . '1" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
					 <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse-' . (get_the_ID()) . '44" aria-expanded="false" aria-controls="flush-collapse-' . (get_the_ID()) . '">
					 NDVI map of the source image
					 </p>
				   </h2>
				   <div id="flush-collapse-' . (get_the_ID()) . '44" class="accordion-collapse collapse" aria-labelledby="flush-heading-' . (get_the_ID()) . '" data-bs-parent="#accordionFlushExample">
					 <div class="accordion-body">
					 <img src="' . esc_attr($ndvi) . '" alt="">
					 </div>
					 </div>
				 </div>

				   <div class="accordion-item">
				   <h2 class="accordion-header" id="flush-heading-' . (get_the_ID()) . '">
					 <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse-' . (get_the_ID()) . '4" aria-expanded="false" aria-controls="flush-collapse-' . (get_the_ID()) . '">
					 Phenomenon Multispectral signature
					 </p>
				   </h2>
				   <div id="flush-collapse-' . (get_the_ID()) . '4" class="accordion-collapse collapse" aria-labelledby="flush-heading-' . (get_the_ID()) . '" data-bs-parent="#accordionFlushExample">
					 <div class="accordion-body">
					 <img src="' . esc_attr($signature) . '" alt="">
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


				 
<div class="accordion-item">
<h2 class="accordion-header" id="flush-heading-' . (get_the_ID()) . '">
	<p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . (get_the_ID()) . '7" aria-expanded="false" aria-controls="flush-collapse-' . (get_the_ID()) . '">
		Before After
	</p>
</h2>
<div id="flush-collapse' . (get_the_ID()) . '7" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
	<div class="accordion-body">

	<div class="ba-slider">
	<img src="' . esc_attr($before) . '" alt="">
	<div class="resize">
	<img src="' . esc_attr($after) . '" alt="">
	</div>
	<span class="handle"></span>
</div>


	</div>
</div>
</div>


			

				

				   </div> <!-- accordion -->
	
				</div>
  			</div>
	
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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














	</main>


	<head>
		<style>
			.ba-slider {
				position: relative;
				overflow: hidden;
			}

			.ba-slider img {
				width: 100% !important;
				display: block;
				height: auto;

			}

			.ba-slider .resize {
				position: absolute;
				top: 0;
				left: 0;
				height: 100%;
				width: 50%;
				overflow: hidden;
			}

			.handle {
				position: absolute;
				left: 50%;
				top: 0;
				bottom: 0;
				width: 4px;
				margin-left: -2px;

				background: rgba(0, 0, 0, .5);
				cursor: ew-resize;
			}

			.handle:after {
				position: absolute;
				top: 50%;
				width: 64px;
				height: 64px;
				margin: -32px 0 0 -32px;

				content: '\21d4';
				color: white;
				font-weight: bold;
				font-size: 36px;
				text-align: center;
				line-height: 64px;

				background: #ffb800;
				/* @orange */
				border: 1px solid #e6a600;
				/* darken(@orange, 5%) */
				border-radius: 50%;
				transition: all 0.3s ease;
				box-shadow:
					0 2px 6px rgba(0, 0, 0, .3),
					inset 0 2px 0 rgba(255, 255, 255, .5),
					inset 0 60px 50px -30px #ffd466;
				/* lighten(@orange, 20%)*/
			}

			.handle.draggable:after {
				width: 48px;
				height: 48px;
				margin: -24px 0 0 -24px;
				line-height: 50px;
				font-size: 30px;
			}
		</style>
		<!-- <script src="https://unpkg.com/beerslider/dist/BeerSlider.js"></script> -->

		<script>
			// new BeerSlider(document.getElementById('beer-slider'));

			jq2 = jQuery.noConflict();

			jq2(function($) {
				$(".btn-link").click(function() {
					$(this).toggleClass("collapsed");
				});


				$(document).ready(function() {
					$('.ba-slider').each(function() {
						var cur = $(this);
						// Adjust the slider
						var width = cur.width() + 'px';
						cur.find('.resize img').css('width', width);
						// Bind dragging events
						drags(cur.find('.handle'), cur.find('.resize'), cur);
					});

					function drags(dragElement, resizeElement, container) {

						// Initialize the dragging event on mousedown.
						dragElement.on('mousedown touchstart', function(e) {

							dragElement.addClass('draggable');
							resizeElement.addClass('resizable');

							// Check if it's a mouse or touch event and pass along the correct value
							var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

							// Get the initial position
							var dragWidth = dragElement.outerWidth(),
								posX = dragElement.offset().left + dragWidth - startX,
								containerOffset = container.offset().left,
								containerWidth = container.outerWidth();

							// Set limits
							minLeft = containerOffset + 10;
							maxLeft = containerOffset + containerWidth - dragWidth - 10;

							// Calculate the dragging distance on mousemove.
							dragElement.parents().on("mousemove touchmove", function(e) {

								// Check if it's a mouse or touch event and pass along the correct value
								var moveX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

								leftValue = moveX + posX - dragWidth;

								// Prevent going off limits
								if (leftValue < minLeft) {
									leftValue = minLeft;
								} else if (leftValue > maxLeft) {
									leftValue = maxLeft;
								}

								// Translate the handle's left value to masked divs width.
								widthValue = (leftValue + dragWidth / 2 - containerOffset) * 100 / containerWidth + '%';

								// Set the new values for the slider and the handle. 
								// Bind mouseup events to stop dragging.
								$('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function() {
									$(this).removeClass('draggable');
									resizeElement.removeClass('resizable');
								});
								$('.resizable').css('width', widthValue);
							}).on('mouseup touchend touchcancel', function() {
								dragElement.removeClass('draggable');
								resizeElement.removeClass('resizable');
							});
							e.preventDefault();
						}).on('mouseup touchend touchcancel', function(e) {
							dragElement.removeClass('draggable');
							resizeElement.removeClass('resizable');
						});
					}
				});

				// Update sliders on resize.
				// We all do it: i.imgur.com/YkbaV.gif


			});
		</script>
	</head>
</div>
<?php
wp_reset_query();
