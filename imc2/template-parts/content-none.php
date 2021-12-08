<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package imc
 */

?>

<section class="no-results not-found">
	<div id="content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started imc</a>.', 'imc' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<h3><?php echo __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.
', 'imc' ); ?></h3>
			<?php
				?>
					<form role="search" method="get" class="serch-input d-flex search-normal" action="<?php echo home_url( '/' ); ?>">
                        <button>
                            <img src="<?php getImage( 'search.png' ); ?>" alt="search" />
                        </button>
                        <input type="search" class="header-txt" placeholder="<?php echo __('Please Search','imc'); ?>" value="<?php echo get_search_query() ?>" name="s" />
                    </form>
				<?php

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'imc' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
