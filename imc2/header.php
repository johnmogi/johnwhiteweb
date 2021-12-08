<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-68209648-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-68209648-2');
</script>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php bloginfo( 'name' ); ?> | <?php is_front_page() ? bloginfo( 'description' ) : wp_title( '' ); ?></title>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>
		<!-- <link rel="stylesheet" href="https://imcannabis.com/wp-content/themes/dev-theme/style-custom.css?v=<?php echo time(); ?>"> -->
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
            <header class="d-print-none">
                <div class="container-fluid">
					<a href="#content" class="skip-links sr-only"><?php echo __('Skip Links', 'imc'); ?></a>
					<?php $currLang = get_bloginfo('language'); ?>
					<?php if($currLang == 'he-IL'){  ?>
						<!-- <a href="<?php //echo get_permalink(442); ?>" class="hidden-sm header-contact-btn">
							<?php //echo __('Contact Us','imc'); ?>
						</a> -->
					<?php } elseif ($currLang == 'en-US'){  ?>
						<a href="<?php echo get_permalink(221); ?>" class="hidden-sm header-contact-btn">
							<?php echo __('Contact Us','imc'); ?>
						</a>
					<?php }  ?>
					<?php 
						echo '<div class="d-none d-lg-block">';
							imc_polylang_languages();
						echo '</div>';
					?>
					<a href="<?php echo get_bloginfo( 'url' ) ?>" class="visible-sm navbar-brand logo">
						<img class="logo-normal" src="<?php getImage( 'logo.svg' ); ?>" alt="logo"/>
					</a>
					<div class="wrap-nav-mobile">
						<a href="<?php echo get_bloginfo( 'url' ) ?>" class="hidden-sm navbar-brand logo">
							<img src="<?php getImage( 'logo.svg' ); ?>" alt="logo"/>
						</a>
						<nav>
							<?php
								wp_nav_menu( array(
									'menu'           => 'primary',
									'menu_class'     => 'primary',
									'theme_location' => 'primary',
									'container'      => false,
									'$depth'         => 2,
								) );
							?>
						</nav>
					</div>
					<div class="hamburger d-lg-none">
						<span class="bar1"></span>
						<span class="bar2"></span>
						<span class="bar3"></span>
					</div>
					<div class="lang-m d-block d-lg-none">
						<?php 
							imc_polylang_languages();
						?>                                
					</div>
                </div>
            </header>
