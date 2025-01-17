<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package imc
 */

?>

	<div id="post-<?php the_ID(); ?>" class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'imc' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
