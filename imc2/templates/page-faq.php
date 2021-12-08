<?php
/*
Template Name: Faq
*/
__( 'Faq', 'imc' );
get_header();

/* ACF fields */
 

?>

<div id="content">
	<section id="about-hero" class="first-section">
	<div class="container-fluid">
			<div style="min-height: 300px;" class="d-flex justify-content-center justify-content-lg-start flex-column wrap-background">
			<?php 	
			$image = get_field('cover_image_desctop');
				if( !empty( $image ) ): ?> 
					<div class="d-none d-sm-block bgimage" style="background-image: url(<?php echo esc_url($image['url']); ?>);">
								</div>
				<?php endif; ?>

				<?php 
				$image_m = get_field('cover_image_mob');
				if( !empty( $image_m ) ): ?> 
					<div class="d-block d-sm-none bgimage" style="background-image: url(<?php echo esc_url($image_m['url']); ?>);">
								</div>
				<?php endif; ?>
 
				<div class="wrap-text">
					<h1 style="color:#fff;"><?php the_field('title'); ?></h1>       
					<p style="color:#fff;"><?php the_field('subtitle'); ?></p>        
				</div>
			</div>
		</div>
	</section>

<section class="faq">

	<div class="inner-width"> 

	<?php if( have_rows('question-answer') ): ?>
    <ul class="accordion-container">
    <?php while( have_rows('question-answer') ): the_row();  
        ?> 
		<div class="set">
			<a href="#" class="question"> <?php the_sub_field('question'); ?> 
			<i class="fa fa-plus"></i>
			</a>
			<div class="content">
			<p><?php the_sub_field('answer'); ?></p>
			</div>
		</div>

    <?php endwhile; ?>
    </ul>
<?php endif; ?>
  
</div><!--#content-->
 
  
<?php wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '1.0' ); ?>
 
<?php
get_template_part('template-parts/relevant-info');
get_footer();


