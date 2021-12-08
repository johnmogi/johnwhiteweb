<?php
/*
Template Name: Patient Inquiry1
*/
get_header();
?>
<main>
    <div class="list-patient-inquiry">
        <?php the_content(); ?>
    </div>
<?php echo do_shortcode('[contact-form-7 id="2198" title="Patient Inquiry"]'); ?>
    <div id="form_popup">
        <div class="popup-inner">
            <button type="button" id="close_popup_btn">X</button>
            <h4><?php the_field('patient_inquiry_pop_up_title'); ?></h4>
            <p><?php the_field('patient_inquiry_pop_up_text'); ?></p>
        </div>
    </div>
    <div id="image_popup">
        <div class="popup-inner">
            <button type="button" id="close_popup_image">X</button>
            <img width="400" src="<?php echo get_field('image_popup')['url']; ?>" alt="<?php echo get_field('image_popup')['alt']; ?>">
        </div>
    </div>
</main>
     <script type="text/javascript">
         document.addEventListener( 'wpcf7mailsent', function( event ) {
         if ( '2198' == event.detail.contactFormId ) { // Change 123 to the ID of the form 
            jQuery('#form_popup').show('slow'); //this is the bootstrap modal popup id
         }
        }, false );
         jQuery("#close_popup_btn").click(function () { 
            jQuery('#form_popup').hide('slow');
         });
         jQuery("#sample_image").click(function () { 
            jQuery('#image_popup').show('slow');
         });
          jQuery("#close_popup_image").click(function () { 
            jQuery('#image_popup').hide('slow');
         });
         jQuery("#image_popup").click(function () { 
            jQuery('#image_popup').hide('slow');
         });
     </script>
<?php
get_footer();
?>