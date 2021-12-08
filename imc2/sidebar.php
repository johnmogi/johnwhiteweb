<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imc2
 */
 $show_related_products = get_field('show_related_products');
?>

<aside id="sidebar" class="widget-area" role="complementary">
<!-- Social Widget -->
<?php if($show_related_products === true) { ?>
	<section id="related-products" class="widget">
		<h2><?php echo __('Related Products','imc'); ?></h2>
		<?php 
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 3,
				'meta_key'		=> 'display_in_sidebar',
				'meta_value'	=> true
			);
			$products = get_posts( $args );
			if ( $products ) {
			    foreach ( $products as $post ) {
			        $product_thumbnail = get_field('product_thumbnail' ,$post->ID);
			        setup_postdata( $post );
			        	echo '<a href="'. get_the_permalink() .'" class="item d-flex align-items-center">';
			        			echo '<img src="'. wp_get_attachment_image_url($product_thumbnail['id'],'full') .'" alt="">';
					        	echo '<h3>'. get_the_title() .'</h3>';
			        	echo '</a>';
				 } 
			    wp_reset_postdata();
			}
		?>
	</section>
<?php } ?>
<?php
	get_template_part('template-parts/relevant-info-widget');
	if ( is_active_sidebar( 'sidebar-1' ) ) {
			dynamic_sidebar( 'sidebar-1' );
	}
?>
</aside>

