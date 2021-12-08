<?php
    // Footer
	$facebook_link = get_option( 'facebook_link' );
	$twitter_link = get_option( 'twitter_link' );
	$youtube_link = get_option( 'youtube_link' );
	$instagram_link = get_option( 'instagram_link' );
	$linkedin_link = get_option( 'linkedin_link' );
	$currLang = get_bloginfo('language');
?>

<div id="popup-join" class="">
	<div class="overlay"></div>
	<div class="popup-content">
		<a href="#" class="close-btn" title="Close Popup">X</a>
		<div class="form-wrapper text-center">
			<!-- <div class="form-title"><?php //echo __('Join our newsletter','imc') . '!'; ?></div> -->
			<?php
				if($currLang == 'he-IL'){ ?>
						<!-- <div class="form-title" style="margin-bottom: 0;">נשמח להיות חברים</div>
					<p style="text-align: center;">השאירו פרטים כאן ואנחנו נדאג לשמור אתכם מעודכנים. </p> -->
					<div class="form-title" style="margin-bottom: 0;font-weight: 700;">I am Up to date</div>
					<p style="font-weight: 700; text-align: center;">רוצים להישאר מעודכנים?</p>
					<p style="text-align: center; max-width: 218px; margin: 0 auto 15px;">מלאו את הפרטים הבאים ונשמח <br>
					לשלוח לכם פעם בחודש, עדכונים מיוחדים וחדשות רלוונטיות</p>
					<?php	echo do_shortcode('[contact-form-7 id="1445" title="Newsletter Hebrew" html_class="form-inline" html_id="newsletter-form1"]');
				// <small class="d-i-block">	אני מסכימ/ה לקבל הודעות, מבצעים, דיוור ועדכונים על חברת פוקוס צמחי מרפא בע"מ ("החברה") ופעילותה בתחום הקנביס הרפואי, בדוא"ל ו/או במסרון לטלפון הנייד. אני אהיה רשאי/ת לחזור בי מהסכמתי בכל עת על ידי פניה בכתב לחברה בדוא"ל <a href="mailto:info@imcannabis.com">info@imcannabis.com</a></small>
				} else { ?>
					<div style="text-align:center;">
					<div class="form-title">Let's be friends</div>
					<p>Want to stay informed?</p>
					<p>Fill the form to receive special monthly updates and news.</p></div>
					<?php	echo do_shortcode('[contact-form-7 id="1447" title="Newsletter" html_class="form-inline" html_id="newsletter-form2"]');
				}
				// I agree to receive via email and/or text message, information and/or materials and/or promotional updates relating to the activity and/or service of Focus Medical Herbs Ltd (“Focus”) and/or its affiliate and/or third parties that Focus may collaborate with. I acknowledge that I can ask to be unsubscribed
			?>
		</div>
	</div>
</div>

<div id="popup-thankyou">
<div class="overlay"></div>
 			<div class="popup-content">
 				<a href="#" class="close-btn" title="Close Popup">X</a>
					<div class="form-wrapper text-center">

					<?php 
                if(pll_current_language() == 'he') {
									echo '<h3>תודה על פנייתך!<h3>
								<p style="text-align:center;font-size: 24px;">נציגנו יחזרו אלייך בהקדם</p>';
							} else if(pll_current_language() == 'en') {
								echo '<h3>Your request has been<br>
								received.<h3> '; 
							}   ?>
					</div>		
			</div>
 </div>
 <div id="popup-thankyou-he">
	<div class="overlay"></div>
				<div class="popup-content">
					<a href="#" class="close-btn" title="Close Popup">X</a>
						<div class="form-wrapper text-center">
						<?php 
                if(pll_current_language() == 'he') {
									echo '<h3>תודה לך!<h3>
								<p style="text-align: center;font-size: 24px;">הפרטים התקבלו בהצלחה</p>';
							} else if(pll_current_language() == 'en') {
								echo '<h3>Thanks.<h3>
								<p style="text-align: center;font-size: 24px;">Registration is complete</p>'; 
							}   ?>
						</div>		
				</div>
 </div>

<footer id="footer" class="d-print-none">
	<div class="container">
		<div class="row">
			<div class="col-md-12 newsletter text-center">
				<!-- <h2><?php //echo __('Join our newsletter','imc') . '!'; ?></h2> -->
				<?php
					if($currLang == 'he-IL'){ ?>
					<h2 class="form-title" style="margin-bottom: 0rem;">נשמח להיות חברים</h2>
					<p style="text-align: center;">השאירו פרטים כאן ואנחנו נדאג לשמור אתכם מעודכנים. </p>
					<?php	echo do_shortcode('[contact-form-7 id="1445" title="Newsletter Hebrew" html_class="form-inline" html_id="newsletter-form1"]');
					} elseif ($currLang == 'en-US'){ ?>
						<h2 class="form-title"> Join our newsletter</h2> 
					<?php	echo do_shortcode('[contact-form-7 id="1447" title="Newsletter" html_class="form-inline" html_id="newsletter-form2"]');
					}
			  	?>
			</div>
		</div>
		<div class="row">
			<div class="col-6 col-sm mb-5 mb-sm-0 widget">
				<?php dynamic_sidebar( 'footer-menu-1' ); ?>
			</div>
			<div class="col-6 col-sm mb-5 mb-sm-0 widget">
				<?php dynamic_sidebar( 'footer-menu-2' ); ?>
			</div>
			<div class="col-6 col-sm widget">
				<?php dynamic_sidebar( 'footer-menu-3' ); ?>
			</div>
			<div class="col-6 col-sm widget">
				<?php dynamic_sidebar( 'footer-menu-4' ); ?>
			</div>
			<div class="col-6 col-sm widget mt-5 mt-sm-0 ">
				<?php /* <h3><?php echo __('Social','imc'); ?></h3>*/ ?>
				
				<div style="margin-bottom:20px;">
				<?php
					if($currLang == 'he-IL'){ ?>
						<h3>שותפים עסקיים</h3>
						<ul>
							<li>חוות Evergreen</li>
							<li>מפעל Panaxia</li>
							<li>רשת סופר פארם</li>
						</ul> 
						<?php } elseif ($currLang == 'en-US'){ ?>
						<h3>Business Partners</h3>
						<ul>
							<li>Evergreen Cultivation</li>
							<li>Panaxia – Pharmaceutical Industries</li>
							<li>Super Pharm Chain Store</li>
						</ul> 
						<?php }
			  	?> 
				</div>

				<ul class="social d-flex">
					<?php if($facebook_link){ ?>
						<li>
							<a href="<?php echo $facebook_link; ?>" target="_blank">
								<img src="<?php getImage('facebook-ico.svg'); ?>" alt="Facebook">
							</a>
						</li>
					<?php } ?>
					<li class="whatsapp">
						<a href="#" target="_blank">
							<img src="<?php getImage('whatsapp-footer.svg'); ?>" width="20" height="20" alt="Whatsapp">
						</a>
					</li>
					<script>
						jQuery('li.whatsapp a').click(function(){
							window.location.href ='https://api.whatsapp.com/send?phone=+9720586683040';
							return false;
						});
					</script>
					<?php if($twitter_link){ ?>
						<li>
							<a href="<?php echo $twitter_link; ?>" target="_blank">
								<img src="<?php getImage('twitter-ico.svg'); ?>" alt="Twitter">
							</a>
						</li>
					<?php } ?>
					<?php if($youtube_link){ ?>
						<li>
							<a href="<?php echo $youtube_link; ?>" target="_blank">
								<img src="<?php getImage('youtube-ico.svg'); ?>" alt="Youtube">
							</a>
						</li>
					<?php } ?>
					<?php if($instagram_link){ ?>
						<li>
							<a href="<?php echo $instagram_link; ?>" target="_blank">
								<img src="<?php getImage('instagram-ico.svg'); ?>" alt="Instagram">
							</a>
						</li>
					<?php } ?>
					<?php if($linkedin_link){ ?>
						<li>
							<a href="<?php echo $linkedin_link; ?>" target="_blank">
								<img src="<?php getImage('linkedin-ico.svg'); ?>" alt="Linkedin">
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</footer>
<div id="credit" class="d-print-none">
	<div class="container">
		<hr>
		<div class="row">
			<div class="col-md-6">
				<p class="copy">
					<?php
						if($currLang == 'he-IL'){
							echo get_option( 'credit_text_he' );
						} elseif($currLang == 'en-US'){
							echo get_option( 'credit_text' );
						}
					?>
				</p>

			</div>
			<div class="col-md-6 text-sm-right credits mt-3 mt-sm-0">
				<a href="https://www.muze-studio.co.il/" target="_blank">
					<?php echo __('Designed by Muze','imc'); ?>
				</a>
				<span class="d-none d-sm-block mx-sm-1">|</span>
				<a href="https://www.webstick.co.il/" target="_blank">
					<?php echo __('Powered by Webstick','imc'); ?>
				</a>
			</div>			
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function() {
		setTimeout(function() {
			if(sessionStorage["PopupShown"] != 'yes'){ 
				jQuery('#popup-join').addClass('show');
         		//e.preventDefault();
     		}
		}, 5000);

		jQuery('#popup-join .overlay, #popup-join .close-btn').click(function() {
			jQuery('#popup-join').removeClass('show');
			sessionStorage["PopupShown"] = 'yes';
			return false;
		});
	});
</script>

<?php
wp_footer();
?>
</body>
</html>