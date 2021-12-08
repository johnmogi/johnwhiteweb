<?php
	get_header();
?>


<div class="error-404 not-found text-center first-section">
		<h1 class="page-title"><?php _e( '404', 'imc' ); ?></h1>

	<div class="page-content">
		<p><?php echo __( 'Something went wrong', 'imc' ) . '...'; ?></p>
		<a class="btn" href="<?php echo get_bloginfo( 'url' ) ?>"><?php echo __('Back to Homepage','imc'); ?></a>
	</div><!-- .page-content -->
</div><!-- .error-404 -->


<?php
get_footer();
