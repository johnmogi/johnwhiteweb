<?php
/*
Template Name: Page Tsuriel
*/
get_header();
?>

<head>

    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        .ptsd_section {
            max-width: 1330px;
            margin: 0 auto;
            position: relative;
        }

        h2.ptsd_title {
            font-family: "Heebo";
            font-weight: 300;
            font-size: 52px;
            margin-top: 100px;
            text-align: right;
            direction: rtl;
        }

        .ptsd_sub_title h3 {
            font-family: "Heebo";
            text-align: right;
            font-size: 40px;
            font-weight: 700;
            margin-top: 100px;
            position: relative;
            line-height: 1.8;
        }

        .ptsd_sub_title h3::after {
            content: "";
            width: 160px;
            height: 4px;
            background-color: #0033A5;
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 4;
            display: block;
        }

        .ptsd_sub_title p {
            font-family: "Heebo";
            font-size: 21px;
            text-align: right;
            font-weight: 500;
            direction: rtl;
        }

        .about_me_ptsd {
            display: flex;
            justify-content: space-between;
        }

        .about_me_text {

            text-align: right;
        }

        .about_me_text h4 {
            text-align: right;
            font-family: "Heebo";
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .about_me_text a {
            font-size: 18px;
            font-family: "Heebo";
        }

        .download_ptsd,
        .about_me_text p,
        .right_contact_us p {
            text-align: right;
            font-family: "Heebo";
            font-size: 18px;
            font-weight: normal;
            direction: rtl;
        }

        /* .about_me_ptsd img {
        position: absolute;
        top: calc(50% - 450px);
    } */

        .download_ptsd {
            margin-bottom: 90px;
            margin-top: 70px;
            margin-bottom: 90px;
        }

        .download_ptsd h4 {
            font-family: "Heebo";
            font-weight: 500;
            font-size: 24px;
            margin-bottom: 34px;
            direction: rtl;
        }

        .download_ptsd button {
            background: #0033A5;
            border-radius: 50px;
            font-size: 21px;
            max-width: 442px;
            height: 66px;
            display: flex;
            flex-direction: row-reverse;
            margin: 0 auto;
            align-items: center;
            justify-content: center;
            padding: 0 120px;
        }

        .download_ptsd a {
            color: #FFFFFF;
            font-family: "Heebo";
            font-weight: 500;
            font-size: 21px;
            text-decoration: unset;
        }

        .download_ptsd button img {
            margin-left: 10px;
        }

        .form_background {
            background-color: #E8EFF9;
        }

        .form_ptsd_section {
            max-width: 1330px;
            margin: 0 auto;
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-around;
            padding-top: 110px;
            padding-bottom: 110px;
        }

        .right_contact_us {
            text-align: right;
            width: 45%;
        }

        .right_contact_us h3 {
            font-family: "Heebo";
            font-weight: bold;
            font-size: 40px;
            position: relative;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .right_contact_us h3::after {
            content: "";
            width: 170px;
            height: 4px;
            background-color: #0033A5;
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 4;
            display: block;
        }

        .right_contact_us a {
            display: flex;
            flex-direction: row-reverse;
            margin: 0 auto 15px;
            align-items: center;
            line-height: 5;
            font-family: "Heebo";
            font-weight: normal;
            font-size: 21px;
            color: #000000;
            padding: 0px 25px;
            border: 2px solid transparent;
        }

        .right_contact_us a img {
            margin-left: 30px;
        }

        .right_contact_us a:hover {
            border: 2px solid #0033A5;
            border-radius: 15px;
            background: rgba(0, 51, 165, 0.05);
            text-decoration: unset;
        }

        .left_form_us {
            text-align: right;
            background: #fff;
            max-width: 696px;
            height: 811px;
            padding: 80px;
            position: relative;
        }

        .left_form_us h3 {
            font-family: "Heebo";
            font-weight: bold;
            font-size: 24px;
        }

        .left_form_us p {
            font-family: "Heebo";
            font-weight: normal;
            font-size: 24px;
        }

        .left_form_us input {
            padding: 30px;
        }

        .left_form_us .form-control {
            font-family: "Heebo";
            font-weight: normal;
            font-size: 18px;
            text-align: right;
            border-radius: 15px;
            margin-top: 10px;
        }

        .left_form_us label {
            font-family: "Heebo";
            font-weight: normal;
            font-size: 15px;
        }

        .left_form_us input::placeholder {
            padding: 10px;
            color: rgba(51, 51, 51, 0.4);
        }

        label.checkbox_ptsd {
            display: flex;
            flex-direction: row;
            justify-content: end;
            font-size: 18px;
        }

        .checkbox_ptsd input {
            height: 25px;
            width: 25px;
            vertical-align: middle;
        }

        input#sumbit-patient {
            width: 195px;
            height: 55px;
            padding: 0;
            text-align: center;
            background: #0033A5;
            border-radius: 50px;
            color: #fff;
            margin: 0 auto;
        }

        label.sumbit_ptsd {
            display: block;
            width: 100%;
            margin-top: 75px;
        }

        .wpcf7 form.sent .wpcf7-response-output {
            display: none !important;
        }

        #form_popup_ptsd {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #form_popup_ptsd::before {
            content: '';
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            display: block;
            z-index: 3;
        }

        #form_popup_ptsd div.popup-inner-ptsd {
            position: absolute;
            width: 480px;
            height: 316px;
            z-index: 4;
            top: calc(50% - 158px);
            left: calc(50% - 240px);
            background: #fff;
        }

        .popup_top_ptsd {
            background-color: #18EB9F;
            height: 141px;
            display: flex;
            align-items: center;
        }

        .popup-inner-ptsd h4 {
            text-align: center;
            direction: rtl;
            font-family: 'Heebo';
            font-size: 24px;
            font-weight: bold;
            padding-top: 40px;
        }

        .popup-inner-ptsd p {
            text-align: center;
            direction: rtl;
            font-weight: normal;
            font-size: 18px;
            font-family: 'Heebo';
        }

        .popup_top_ptsd img {
            margin: 0 auto;
        }

        #close_popup_btn_ptsd {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: solid 1px #fff;
            background: #fff;
            font-size: 20px;
            position: absolute;
            top: -10px;
            right: -10px;
        }

        footer#footer {
            margin-top: 0;
        }

        @media only screen and (max-width: 1024px) {
            .about_me_ptsd {
                flex-direction: column-reverse;
            }

            .form_ptsd_section {
                display: unset;
            }

            h2.ptsd_title {
                font-size: 30px;
                line-height: 1.5;
                text-align: center;
                direction: rtl;
            }

            .ptsd_sub_title h3 {
                margin-top: 43px;
                font-size: 24px;
            }

            .ptsd_sub_title p {
                font-size: 18px;
                direction: rtl;
            }

            .about_me_text {
                width: 100%;
            }

            .about_me_text h4 {
                font-size: 16px;
            }

            .about_me_text p {
                font-size: 14px;
                margin-bottom: 0;
            }

            .about_me_text a {
                font-size: 14px;
            }

            .ptsd_section {
                padding: 15px;
            }

            img.img_ptsd {
                height: 350px !important;
                width: 350px !important;
                margin-top: 50px;
            }

            .download_ptsd {
                margin-top: 55px;
                margin-bottom: 36px;
            }

            .download_ptsd h4 {
                font-size: 18px;
                direction: rtl;
            }

            .download_ptsd button {
                padding: 0 80px;
            }

            .download_ptsd a {
                font-size: 16px;
            }

            .download_ptsd button img {
                width: 27px !important;
                height: 27px !important;
            }

            .right_contact_us h3 {
                font-size: 21px;
                margin-bottom: 35px;
                padding-top: 34px;
                padding-right: 13px;
            }

            .right_contact_us {
                width: 100%;
                padding-left: 0;
            }

            .right_contact_us h3::after {
                content: unset;
            }

            .form_background {
                background-color: unset;
            }

            .right_contact_us {
                background-color: #E8EFF9;
                padding-bottom: 60px;
            }

            .right_contact_us a {
                line-height: 3;
                padding-right: 30px;
                font-size: 18px;
            }

            .left_form_us {
                padding: 32px 13px 58px 13px;
            }

            .left_form_us h3 {
                font-size: 21px;
            }

            .left_form_us p {
                font-size: 16px;
                margin-bottom: 40px;
            }

            label.sumbit_ptsd {
                margin-top: 59px;
            }

            #form_popup_ptsd div.popup-inner-ptsd {
                width: 320px;
                left: calc(50% - 160px);
            }

            .about_me_ptsd img {
                position: unset;
                top: unset;
            }
        }
    </style>
</head>
<main>
    <div class="ptsd_section">
        <h2 class="ptsd_title"><?php the_field('title_ptsd'); ?></h2>
        <div class="about_me_ptsd row">
            <div class="col-7">
                <img class="img_ptsd" style="width:100%;margin-top: 110px;" src="<?php echo get_field('image_left_ptsd'); ?>" alt="<?php echo get_field('image_left_ptsd'); ?>">
            </div>
            <div class="col">
                <div class="ptsd_sub_title">
                    <h3><?php the_field('sub_title_ptsd'); ?></h3>
                    <p><?php the_field('sub_title_about_ptsd'); ?></p>
                </div>
                <div class="about_me_text ">
                    <h4><?php the_field('title_right_ptsd'); ?></h4>
                    <p><?php the_field('text_right_ptsd'); ?></p>
                    <a href="<?php the_field('join_me_link'); ?>"><?php the_field('join_me_text'); ?></a>
                </div>
            </div>
        </div>
        <div class="download_ptsd">
            <?php if (the_field('title_download')) { ?>
                <h4><?php the_field('title_download'); ?></h4>

                <button type="button"><img style="width: 33px; height: 33px;" src="https://imcannabis.com/wp-content/uploads/2021/09/bx_bxs-download.png" alt="download"><a href="<?php the_field('button_file_ptsd'); ?>"><?php the_field('button_text_ptsd'); ?></a></button>
            <? } ?>
        </div>
    </div>
    <div class="form_background">
        <div class="form_ptsd_section">
            <div class="right_contact_us">
                <h3><?php the_field('contact_us_title_ptsd'); ?></h3>
                <p><?php the_field('contact_text'); ?></p>

                <?php if (have_rows('contact_us_options_ptsd')) {
                    while (have_rows('contact_us_options_ptsd')) {
                        the_row(); ?>
                        <a href="<?php the_sub_field('contact_us_options_link'); ?>"><img style="width: 38px; height: 33px;" src="<?php echo get_sub_field('icon_contact_us_options'); ?>" alt="<?php echo get_sub_field('icon_contact_us_options'); ?>"><?php the_sub_field('text_contact_us_options'); ?></a>

                <?php }
                } ?>
                <p><?php the_field('contact_info'); ?></p>


            </div>
            <div class="left_form_us">
                <h3><?php the_field('title_left_form_us'); ?></h3>
                <p><?php the_field('text_left_form_us'); ?></p>
                <div class="short_code_form">
                    <?php echo do_shortcode('[contact-form-7 id="2579" title="PTSD"]'); ?>
                </div>
                <div id="form_popup_ptsd">
                    <div class="popup-inner-ptsd">
                        <button type="button" id="close_popup_btn_ptsd">X</button>
                        <div class="popup_top_ptsd">
                            <img style="width: 78px; height: 78px;" src="<?php echo get_field('popup_image_top_ptsd'); ?>" alt="<?php echo get_field('popup_image_top_ptsd'); ?>">
                        </div>
                        <h4><?php the_field('popup_title_ptsd'); ?></h4>
                        <p><?php the_field('popup_text_ptsd'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('wpcf7mailsent', function(event) {
        if ('2579' == event.detail.contactFormId) { // Change 123 to the ID of the form 
            jQuery('#form_popup_ptsd').show(); //this is the bootstrap modal popup id
        }
    }, false);

    jQuery('#close_popup_btn_ptsd').click(function() {
        jQuery('#form_popup_ptsd').hide();
    })
</script>
<?php
get_footer();
?>