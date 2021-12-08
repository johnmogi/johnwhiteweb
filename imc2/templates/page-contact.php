<?php
/*
Template Name: Contact
*/
__( 'Contact', 'imc' );
get_header();

/* ACF fields */
$contact_phone = get_field('contact_phone');
$contact_email = get_field('contact_email');
$contact_fax = get_field('contact_fax');
$currLang = get_bloginfo('language');
?>

<div id="content">
	<section id="contact-page" class="first-section">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php 
				// Contact Form
				if($currLang == 'he-IL'){
				echo do_shortcode('[contact-form-7 id="585" title="Contact form 1 Hebrew"]');
				} elseif ($currLang == 'en-US'){
				echo do_shortcode('[contact-form-7 id="8" title="Contact form"]');
				}
			?>
			<div class="general-info d-block d-sm-flex align-items-sm-center justify-content-sm-between text-center text-sm-left">
				<div class="whatsapp py-3 py-sm-0">
					<img class="mr-2" src="<?php getImage('contact-whatsapp-ico.svg'); ?>" width="20" height="20" alt="">
					<a href="#">058-6683040<br>Whatsapp</a>
				</div>
				<script>
					jQuery('.general-info .whatsapp a').click(function(){
						window.location.href ='https://api.whatsapp.com/send?phone=+9720586683040';
						return false;
					});
				</script>
				<div class="phone py-3 py-sm-0">
					<img class="mr-2" src="<?php getImage('contact-phone-ico.svg'); ?>" alt="">
					<a href="tel:<?php echo $contact_phone; ?>"><?php echo $contact_phone; ?></a>
				</div>
				<div class="email py-3 py-sm-0">
					<img class="mr-2" src="<?php getImage('email-ico.svg'); ?>" alt="">
					<a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
				</div>
				<div class="fax py-3 py-sm-0">
					<img class="mr-2" src="<?php getImage('fax-ico.svg'); ?>" alt="">
					<span><?php echo $contact_fax; ?></span>
				</div>
			</div>
		</div>
	</section>
</div><!--#content-->
<script>
$(document).ready(function(){
    $('.wpcf7-submit').on('click', function (e) {
		if($('[name="full-name"]').val() == '' || $('[name="your-email"]').val() == ''){
			console.log('error');
			setTimeout(function(){
				jQuery('#contact-page form .wpcf7-not-valid').first().focus();
			},2000);
			setTimeout(function(){
				jQuery('#contact-page form .wpcf7-not-valid').first().focus();
			},4000);
		}
		if(grecaptcha.getResponse() == "") {
			if(!($('#contact-page .agree [name="agree[]"]').is(':checked'))){
				$('#contact-page .agree .wpcf7-form-control').addClass('wpcf7-not-valid');
			}
			
			if($('#contact-page [name="full-name"]').val() != '' && $('#contact-page [name="your-email"]').val() != ''){
				$('#contact-page .cf7sr-g-recaptcha-invalid').show().html('Are you a robot? :)').css({'color': 'red'});
				return false;
			}
			//wpcf7-not-valid
        }
    
    });
});
</script>

<?php
get_footer();


