<?php
/*
Template Name: Order Product
*/
__( 'Order Product', 'imc' );
get_header();
if( isset( $product_id ) ) { 
    $product_title = get_the_title($product_id);
}
/* ACF fields */
?>

<div id="content">
	<section id="order-product" class="first-section">
		<div class="container position-relative">
			<!-- Order Recieved -->
			<div class="order-received text-center">
				<h1><?php echo __('We received your order','imc'); ?></h1>
				<p><?php echo __('We&#39;ll contact you shortly to confirm your order','imc'); ?></p>
				<a class="btn" href="<?php echo get_permalink($product_id); ?>"><?php echo __('Back to product','imc'); ?></a>
			</div>
			<!-- End Order Recieved -->
			<div class="row">
				<div class="col-md-6">
					<?php
					echo '<h1>'. __('Set ordering','imc') .'</h1>';
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					<?php 
						echo do_shortcode('[contact-form-7 id="244" title="Order Product" html_id="order-form"]');
					?>
				</div>
				<div class="col-md-6">
					<?php
						if( isset( $product_id )) {
							$product_image = get_field('product_image',$product_id); 
							echo '<img src="'. wp_get_attachment_image_url($product_image['id'],'full') .'" alt="">';
						} 
					?>
				</div>
			</div>
		</div>
	</section>
</div><!--#content-->
<?php
get_footer();


