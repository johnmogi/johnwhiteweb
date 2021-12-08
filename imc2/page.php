<?php
get_header();
/* ACF fields */
// $top_banner_image = get_field('top_banner_image');
?>

<div id="primary" class="content-area">
	<main id="main" class="container">
		<div class="col-md-12">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>			
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
