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
</main>
<?php
get_footer();
?>