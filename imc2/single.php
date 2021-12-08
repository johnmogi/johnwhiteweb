<?php
get_header();
/* Fields */
$post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumb' );
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
$add_contact_form = get_field('add_contact_form');
$currLang = get_bloginfo('language');
?>

<div id="content">
	<section id="post-area" class="first-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-9 position-relative pr-lg-5">
					<a href="<?php echo $previous; ?>" class="back" title="<?php echo __('Back to Previous Page', 'imc'); ?>"><?php echo __('Back','imc'); ?></a>
					<?php
						if($post_thumb){
							echo '<img class="post-thumb" src="'. $post_thumb[0] .'" alt="'. get_the_title() .'">';
							if($img_caption = get_field('featured_image_caption')){
								echo '<div class="img-caption">'.$img_caption.'</div>';
							}
						}
					?>
					<h1 class="post-title"><?php the_title(); ?></h1>
					<?php if($subtitle = get_field('subtitle')){ ?>
						<h2 class="post-subtitle"><?php echo $subtitle; ?></h2>
					<?php } ?>
					<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile; // End of the loop.
						// Optional - contact form
						if ($add_contact_form == true){
								echo '<h3 class="post-form-title">'. __('leave your details and we will get back to you soon','imc') .'</h3>';
								if($currLang == 'he-IL'){
									echo do_shortcode('[contact-form-7 id="620" title="Single Post Form Hebrew" html_id="single-post-form"]');
								} elseif ($currLang == 'en-US'){
									echo do_shortcode('[contact-form-7 id="254" title="Single Post Form" html_id="single-post-form"]');									
								}
						} else
					?>
								
				</div>
				<div class="col-sm-6 col-md-3">
					<?php get_sidebar(); ?>			
				</div>			
			</div>
		</div>
	</section><!-- #main -->
</div><!--#content-->

	<script>
	$(document).ready(function(){
		$('.wpcf7-submit').on('click', function (e) {
		if($('[name="full-name"]').val() == '' || $('[name="your-email"]').val() == ''){
			console.log('error');
			setTimeout(function(){
				jQuery('#post-area #single-post-form .wpcf7-not-valid').first().focus();
			},2000);
			setTimeout(function(){
				jQuery('#post-area #single-post-form .wpcf7-not-valid').first().focus();
			},4000);
		}
		if(grecaptcha.getResponse() == "") {
			if($('[name="full-name"]').val() != '' && $('[name="your-email"]').val() != ''){
				$('.recap-error').show().html('Are you a robot? :)');
				return false;
			}
        }
    
    });
	});
	</script>

<?php
get_template_part('template-parts/more-news');
get_footer();
