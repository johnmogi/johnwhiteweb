<?php



/**
 * Template Name: vegtables top Page
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */



if (!defined('ABSPATH')) {

	exit; // Exit if accessed directly.

}






get_header();


global $post;

$postID = $post->ID;

$posts = get_posts(array());

$Show_top_section = get_field("title", $postID);





?>
<div class="container mt-3">
	<main <?php post_class('site-main'); ?> role="main">
		<!-- <div class="row">
			<div class="col-8">

				<h1>Choose crop</h1>
			</div>
			<div class="col-4">

				<form>
					<div class="form-group row">
						<label for="inputPassword" class="col-sm-2 col-form-label">crop</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="cropSelect" placeholder="">
						</div>
					</div>
				</form>
			</div>
		</div>
		<hr /> -->
		<?php if (apply_filters('hello_elementor_page_title', true)) : ?>
			<header class="page-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>
		<?php endif; ?>
		<div class="page-content">

			<?php the_content(); ?>

			<div class="row">
				<?php
				$categories = get_categories(array(
					'parent' => '0', //get top level categories only
					'hide_empty'      => false,
					'orderby' => 'date',
					'order'   => 'DESC'
				));

				foreach ($categories as $category) {
					// $category = get_category(get_query_var('cat'));
					$cat_id = $category->cat_ID;
					// Get the image ID for the category
					$image_id = get_term_meta($cat_id, 'category-image-id', true);
					// Echo the image
					// $category_link = sprintf(
					// 	'<a href="%1$s" alt="%2$s">%3$s</a>',
					// 	esc_url(get_category_link($category->term_id)),
					// 	esc_attr(sprintf(__('%s', 'textdomain'), $category->name)),
					// 	esc_html($category->name)
					// );
					echo '<div class="col-2"><a href="' . esc_url(get_category_link($category->term_id)) . '">';
					// echo sprintf(esc_html__('%s', 'textdomain'), $category_link);
					echo sprintf(wp_get_attachment_image($image_id, 'large', 'class-demo'), $category_link);


					echo '</a></div>';
				}
				?>
			</div>
		</div>

	</main>
</div>


<?php



wp_reset_query();

get_footer();
