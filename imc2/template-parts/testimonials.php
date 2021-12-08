<?php
/**
 * Template part for testimonials slider
 *
 */
$testimonials = get_field('testimonials');
?>
<section id="testimonials" class="d-flex align-items-center">
	<div class="container">
		<?php 
			if($testimonials){
				echo '<div class="carousel">';
					foreach ($testimonials as $item) {
						# fields...
						$text = $item['text'];
						$name = $item['name'];
							echo '<div class="item">';
								echo '<img class="quote" src="';
									getImage('testimonials-quote-ico.svg');
								echo '">';
								echo '<p>'. $text .'</p>';
								echo '<h4>'. $name .'</h4>';
							echo '</div>';
					}				
				echo '</div>';				
			}
		?>
	</div>
</section>