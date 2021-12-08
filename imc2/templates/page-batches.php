<?php
/*
Template Name: Batches
*/
__( 'Batches', 'imc' );
get_header();

/* ACF fields */
//$contact_phone = get_field('contact_phone');
//$contact_email = get_field('contact_email');
//$contact_fax = get_field('contact_fax');
//$currLang = get_bloginfo('language');
?>

<div id="content">
	<section id="batches-page" class="first-section">
		<div class="container">
			<h1><?php the_title(); ?></h1> 
			<h2><?php the_field('batch_subtitle'); ?></h2>
			<p><?php the_field('batch_search_text'); ?></p>
  
			<div class="search-form">
				<form action="" method="get">
					<input type="text" name="batch">
					<input type="submit" value="חפש">
				</form>
			</div>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<div class="search-results">
				<?php if( isset($_GET['batch']) && $_GET['batch'] != '' ) {
					$batch_title = $_GET['batch'];
					$args = [
						'post_type' => 'batch',
						'posts_per_page' => '-1',
						'post_status' => 'all',
						'title' => $batch_title
					];
					$batches = get_posts($args);
					if(count($batches) > 0){ ?>
						<h2 class="results-title"><?php the_field('batch_results_title'); ?></h2>
						<?php foreach($batches as $batch){ ?>
							<a href="<?php echo get_field('pdf_file', $batch); ?>" class="batch-item" target="_blank" title="Open batch file (PDF)">
								<?php echo get_the_title($batch); ?>
							</a>
						<?php }
					}
					
				} ?>
			</div>
		</div>
	</section>
</div><!--#content-->

<?php
get_footer();


