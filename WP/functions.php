<?php

// define( 'GOOGLE_MAP_API_KEY', 'AIzaSyBq8T0grrvbnouwR67pmaBEnVgUmo4SMgI' );

if ( ! function_exists( '	_setup' ) ) {
	function imc_setup() {
		load_theme_textdomain( 'imc',
			get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'acf-admin-image', 50, 50, true );
		add_image_size( 'blog-post-thumb', 350, 188, true );
		add_image_size( 'single-post-thumb', 769, 405, true );
		add_image_size( 'product-related-thumb', 538, 560, true );
		add_image_size( 'product-thumb-mobile', 738, 365, true );
		add_image_size( 'product-pic-1', 728, 328, true );
		add_image_size( 'product-pic-2', 418, 444, true );
		add_image_size( 'product-pic-3', 538, 322, true );

		// Menus
		register_nav_menus(
			[
				'primary'      => esc_html__( 'Primary', 'imc' ),
				'footer_links' => esc_html__( 'Footer links', 'imc' ),
			]
		);

		// add_theme_support( 'custom-logo', [
		// 	'height'      => 36,
		// 	'width'       => 88,
		// 	'flex-height' => true,
		// 	'flex-width'  => true,
		// 	'header-text' => [ 'site-title', 'site-description' ],
		// ] );


	}
}

add_filter( 'image_size_names_choose', 'gallery_thumb' );

function gallery_thumb( $sizes ) {
	return array_merge( $sizes,
		array(
			'rooms-thumb' => __( 'Gallery Thumb' ),
		) );
}

// Disable Gutenberg
// disable for posts
// add_filter( 'use_block_editor_for_post', '__return_false', 10 );

// disable for post types
// add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );

// Add auto responsivness to embedded youtube videos
add_filter( 'embed_oembed_html', 'wrap_embed_with_div', 10, 3 );

function wrap_embed_with_div( $html, $url, $attr ) {
	return "<div class=\"responsive-container\">" . $html . "</div>";
}


function custom_body_class( $classes ) {
	if ( is_page_template( 'templates/page-gallery.php' ) ) {
		$classes[] = 'page-gallery';
	}

	return $classes;
}

// Allow SVG Upload
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

function imc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'imc_content_width', 1200 );
}

function imc_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'imc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets imc.', 'imc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
	register_sidebar(
		[
			'name'          => esc_html__( 'Footer menu 1', 'imc' ),
			'id'            => 'footer-menu-1',
			'description'   => esc_html__( 'Add widgets imc.', 'imc' ),
			'before_widget' => '<div id="%1$s" class="widget textwidget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		]
	);
	register_sidebar(
		[
			'name'          => esc_html__( 'Footer menu 2', 'imc' ),
			'id'            => 'footer-menu-2',
			'description'   => esc_html__( 'Add widgets imc.', 'imc' ),
			'before_widget' => '<div id="%1$s" class="widget textwidget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		]
	);
	register_sidebar(
		[
			'name'          => esc_html__( 'Footer menu 3', 'imc' ),
			'id'            => 'footer-menu-3',
			'description'   => esc_html__( 'Add widgets imc.', 'imc' ),
			'before_widget' => '<div id="%1$s" class="widget textwidget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		]
	);
	register_sidebar(
		[
			'name'          => esc_html__( 'Footer menu 4', 'imc' ),
			'id'            => 'footer-menu-4',
			'description'   => esc_html__( 'Add widgets imc.', 'imc' ),
			'before_widget' => '<div id="%1$s" class="widget textwidget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		]
	);
}

function is_blog() {
	return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() ) && 'post' == get_post_type();
}

function imc_scripts() {
	$src_files = ( defined( 'WP_DEBUG' ) && WP_DEBUG === true ) ? '/src' : '';
	wp_enqueue_style(
		'imc-typekit-css',
		'https://use.typekit.net/hyn0hln.css',
		false,
		''
	);
	wp_enqueue_style(
		'imc-bootstrap-css',
		get_template_directory_uri() . '/css/bootstrap.min.css',
		false,
		''
	);
	wp_enqueue_style(
		'imc-main-dev-css',
		'/wp-content/themes/dev-theme/style.css',
		false,
		'1.0.0.0.0.2.3'
	);
	 wp_enqueue_style(
		'imc-custom-css',
		get_template_directory_uri() . '/style-custom25.css',
		time() 
	); 
	 wp_enqueue_style( 'imc-main-css', get_template_directory_uri() . '/style.css', array(), '1.0.0.0.0.2' );
	// wp_enqueue_style( 'imc-custom-css', get_template_directory_uri() . '/style-custom.css', array(), '1.0' );
	wp_enqueue_style(
		'imc-jquery-multiselect-css',
		get_template_directory_uri() . '/css/jquery.multiselect.css',
		false,
		''
	);
	// Load Jquery
	if ( ! is_admin() ) {
		wp_deregister_script( 'wp-embed' );
		wp_deregister_script( 'jquery' );
		wp_register_script(
			'jquery',
			get_template_directory_uri() . '/js/jquery-3.4.1.min.js'
		);
		wp_enqueue_script( 'jquery' );
	}
	// Load slick
	wp_enqueue_script(
		'imc-owl-js',
		get_template_directory_uri() . '/js/slick.min.js',
		[ 'jquery' ],
		'',
		true
	);

	wp_enqueue_script(
		'bootstrap',
		get_template_directory_uri() . '/js/bootstrap.min.js',
		[ 'jquery' ],
		'',
		true
	);
	wp_enqueue_script(
		'jquery-multiselect',
		get_template_directory_uri() . '/js/jquery.multiselect.js',
		[ 'jquery' ],
		'',
		true
	);
	wp_enqueue_script(
		'imc-main-scripts',
		get_template_directory_uri() . $src_files . '/js/scripts8.js',
		[ 'jquery' ],
		'1.0.0.0.6',
		true
	);
	wp_enqueue_script(
		'imc-scripts-tps',
		get_template_directory_uri() . '/src/js/new-scripts2.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'imc-scripts-tps',
		get_template_directory_uri() . '/src/js/scripts.js',
		array( 'jquery' )
	);
	wp_localize_script(
		'imc-main-scripts',
		'imc',
		[
			'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
			'currLang'     => get_bloginfo('language'),
			'current_page' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
		]
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}


/*** Some general useful functions ***/
function imc_polylang_languages($class = '') {

    if ( ! function_exists('pll_the_languages')) {
        return;
    }

    // Gets the pll_the_languages() raw code
    $languages = pll_the_languages(
        array(
            'display_names_as'       => 'slug',
            'hide_if_no_translation' => 1,
            'raw'                    => true,
        )
    );

    $output = '';

    // Checks if the $languages is not empty
    if ( ! empty($languages)) {

        // Creates the $output variable with languages container
        // $output = '<div class="languages' . ( $class ? ' ' . $class : '' ) . '">';

        // Runs the loop through all languages
        foreach ($languages as $language) {

            // Variables containing language data
            $id = $language['id'];
            $slug = $language['slug'];
            $url = $language['url'];
            $current = $language['current_lang'] ? ' current-lang' : '';
            $no_translation = $language['no_translation'];

            // Checks if the page has translation in this language
            if ( ! $no_translation) {
                // Check if it's current language
                if ($current) {
                    // Output the language in a <span> tag so it's not clickable
                    $output .= '<span class="lang'. $current .'" href="#">'. $slug .'</span>';
                } else {
                    // Output the language in an anchor tag
                    $output .= '<a href="'.$url.'" class="lang clickable '. $current .'" href="#">'. $slug .'</a>';
                }
            }

        }

        // $output .= '</div>';

    }

    echo $output;
}
// Make sure Polylang copies the content when creating a translation
function jb_editor_content( $content ) {
	// Polylang sets the 'from_post' parameter
	if ( isset( $_GET['from_post'] ) ) {
		$my_post = get_post( $_GET['from_post'] );
		if ( $my_post ) {
			return $my_post->post_content;
		}
	}

	return $content;
}

// Translae Select Choices
pll_register_string("manage_migraine", "Manage Migraine", "Single Product", "Our strains and Oils" );


// Remove the <div> surrounding the dynamic navigation to cleanup markup
function imc_wp_nav_menu_args( $args = '' ) {
	$args['container'] = false;

	return $args;
}


// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function imc_css_attributes_filter( $var ) {
	return is_array( $var ) ? [] : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list( $thelist ) {
	return str_replace( 'rel="category tag"', 'rel="tag"', $thelist );
}


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
// function imc_pagination() {
// 	global $wp_query;
// 	$big = 999999999;
// 	echo paginate_links(
// 		[
// 			'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
// 			'format'  => '?paged=%#%',
// 			'current' => max( 1, get_query_var( 'paged' ) ),
// 			'total'   => $wp_query->max_num_pages,
// 		]
// 	);
// }


// Remove 'text/css' from our enqueued stylesheet
function imc_style_remove( $tag ) {
	return preg_replace( '~\s+type=["\'][^"\']++["\']~', '', $tag );
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

	return $html;
}

function getImage( $image_name ) {
	echo get_template_directory_uri() . '/images/' . $image_name;
}


// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}


// remove WP version from scripts
function imc_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}

	return $src;
}

// remove injected CSS for recent comments widget
function imc_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function imc_remove_recent_comments_style() {
	global $wp_widget_factory;
	if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
		remove_action(
			'wp_head',
			[
				$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
				'recent_comments_style',
			]
		);
	}
}

// ACF Extras
function my_acf_admin_head5() {
	?>
    <style type="text/css">
        .acf-tab-group li {
            /*float: right;*/
        }

        .general-h1 {
            color: #0073aa;
            font-family: 'Ubuntu', sans-serif;
        }

        .acf_postbox .field textarea {
            min-height: 0 !important;
        }
    </style>
	<?php

}

function get_custom_var( $var, $default = '' ) {
	return ( isset( $_GET[ $var ] ) && $_GET[ $var ] ) ? $_GET[ $var ] : $default;
}


function hide_acf_menu() {
	$current_user  = wp_get_current_user();
	$allowed_users = [
		'hamergil@gmail.com',
		'hamergil@imcannabis.com',
		'alina@webstickprojects.co.il',
		'avirec@gmail.com',
		'projects@webstick.co.il',
		'tshpizer@gmail.com'
	];
	if ( ! in_array( $current_user->user_email, $allowed_users ) ) {
		remove_menu_page( 'edit.php?post_type=acf-field-group' );
	}
}


// remove injected CSS from gallery
function bones_gallery_style( $css ) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bones_filter_ptags_on_images( $content ) {
	return preg_replace(
		'/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU',
		'\1\2\3',
		$content
	);
}

// Get image width & height
function get_image_width_height( $post, $size ) {
	$post_thumbnail_id = get_post_meta( $post->ID, '_thumbnail_id', true );
	if ( ! $post_thumbnail_id ) {
		return false;
	}
	$image  = wp_get_attachment_image_src( $post_thumbnail_id, $size, false );
	$width  = isset( $image['1'] ) ? $image['1'] : false;
	$height = isset( $image['2'] ) ? $image['2'] : false;

	return [
		'width'  => $width,
		'height' => $height,
	];
}

function new_excerpt_more( $more ) {
	return '';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

function custom_excerpt_length( $length ) {
	return 15;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/* Custom Exceprt */
function excerpt( $num ) {
	$limit   = $num + 1;
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	array_pop( $excerpt );
	$excerpt = implode( " ", $excerpt );
	echo $excerpt;
}

// function imc_acf_google_map_api( $api ) {

// 	$api['key'] = GOOGLE_MAP_API_KEY;

// 	return $api;

// }

function wpcf7_add_product_hidden() {
	wpcf7_add_form_tag( 'hidden_product', 'wpcf7_hidden_product_handler', true );
}

function wpcf7_hidden_product_handler( $tag ) {
	$product_id = get_query_var('product_id');
	$product = get_post((int)$product_id);
	$product_name = $product->post_title;
	$html = '<input type="hidden" name="product_id" value="'. $product_id .'">';
	$html .= '<input type="hidden" name="product_name" value="'. $product_name .'">';
	return $html;
}

add_action( 'wpcf7_init', 'wpcf7_add_product_hidden' );

function add_form_query_vars( $vars ) {
	$vars[] = "fe";
	$vars[] = "ms";
	$vars[] = "type";
	$vars[] = "product_id";

	return $vars;
}

add_filter( 'query_vars', 'add_form_query_vars' );

/*** Apply general functions (filter and action) ***/
// add_action( 'init', 'imc_pagination' );
add_action( 'acf/input/admin_head', 'my_acf_admin_head5' );
add_action( 'wp_enqueue_scripts', 'imc_scripts' );
add_action( 'widgets_init', 'imc_widgets_init' );
add_action( 'after_setup_theme', 'imc_content_width', 0 );
add_action( 'after_setup_theme', 'imc_setup' );
add_action( 'admin_init', 'hide_acf_menu' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10 );
remove_action( 'wp_head', 'start_post_rel_link', 10 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_generator' );

add_filter( 'body_class', 'custom_body_class' );
add_filter( 'wpseo_metabox_prio', 'yoasttobottom' );
add_filter( 'default_content', 'jb_editor_content' );
add_filter( 'wp_nav_menu_args', 'imc_wp_nav_menu_args' );
add_filter( 'the_category', 'remove_category_rel_from_category_list' );
add_filter( 'style_loader_tag', 'imc_style_remove' );
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
add_filter( 'style_loader_src', 'imc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'imc_remove_wp_ver_css_js', 9999 );
// add_filter( 'acf/fields/google_map/api', 'imc_acf_google_map_api' );
// add_filter( 'template_include', 'mobile_template', 99 );

remove_filter(
	'the_excerpt',
	'wpautop'
); // Remove <p> tags from Excerpt altogether

/*** External files ***/
require_once get_template_directory() . '/inc/admin_options.php';
require_once get_template_directory() . '/inc/cpt.php';
require_once get_template_directory() . '/inc/ajax.php';
// require get_template_directory() . '/inc/customizer.php';

/**
 * Add Webstick Logo in admin login
 */
add_action( 'login_enqueue_scripts', 'acfi_login_enqueue_scripts' );

add_filter( 'login_headerurl', 'acfi_login_headerurl' );

add_filter( 'login_headertext', 'acfi_login_headertitle' );

function acfi_login_enqueue_scripts() {
	?>
    <style type="text/css">
        .login h1 a {
            width: auto !important;
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/webstick.png') !important;
            background-size: contain !important;
        }
    </style>
<?php }

function acfi_login_headerurl() {
	return 'https://webstick.co.il';
}

function acfi_login_headertitle() {
	return 'Powered by Webstick';
}

// function get_client_ip() {
// 	$ipaddress = '';
// 	if (getenv('HTTP_CLIENT_IP'))
// 		$ipaddress = getenv('HTTP_CLIENT_IP');
// 	else if(getenv('HTTP_X_FORWARDED_FOR'))
// 		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
// 	else if(getenv('HTTP_X_FORWARDED'))
// 		$ipaddress = getenv('HTTP_X_FORWARDED');
// 	else if(getenv('HTTP_FORWARDED_FOR'))
// 		$ipaddress = getenv('HTTP_FORWARDED_FOR');
// 	else if(getenv('HTTP_FORWARDED'))
// 	   $ipaddress = getenv('HTTP_FORWARDED');
// 	else if(getenv('REMOTE_ADDR'))
// 		$ipaddress = getenv('REMOTE_ADDR');
// 	else
// 		$ipaddress = 'UNKNOWN';
// 	return $ipaddress;
// }

// function imc_geo_redirect() {
// 	if(!is_admin()){
		
// 		if(!isset($_COOKIE['countryCode'])){
// 			$apiKey = '1ca069453246288ee1362b6617fce733f0b6c54f072e638678203a65af6ab31d';
// 			$response = json_decode(@file_get_contents('http://api.ipinfodb.com/v3/ip-country?key=' . $apiKey . '&ip=' . get_client_ip() . '&format=json'));
// 			//echo $response->countryCode;
// 			setcookie('countryCode', $response->countryCode, time() + (86400 * 30), "/");
// 			if($response->countryCode == 'IL' && ICL_LANGUAGE_CODE !== 'he' && (!isset($_COOKIE['la_switched']) || $_COOKIE['la_switched'] == 'he')){
// 				$actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// 				$post_id = url_to_postid($actual_url);
// 				//echo get_the_permalink($post_id);
// 				$wpml_permalink = apply_filters( 'wpml_permalink', get_the_permalink($post_id) , 'he' );
// 				if(wp_redirect($wpml_permalink)) {
// 					exit;
// 				}
// 			} else if(ICL_LANGUAGE_CODE == 'he' ){
// 				//echo '~~';
// 				$actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// 				$post_id = url_to_postid($actual_url);
// 				$wpml_permalink = apply_filters( 'wpml_permalink', get_the_permalink($post_id) , 'en' );
// 				//echo $post_id.'*';
// 				if(wp_redirect($wpml_permalink)) {
// 					exit;
// 				}
// 			}
// 		} else {
			
// 			if($_COOKIE['countryCode'] == 'IL' && ICL_LANGUAGE_CODE !== 'he' && (!isset($_COOKIE['la_switched']) || $_COOKIE['la_switched'] == 'he')){
// 				$actual_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// 				$post_id = url_to_postid($actual_url);
// 				//echo get_the_permalink($post_id);
// 				$wpml_permalink = apply_filters( 'wpml_permalink', get_the_permalink($post_id) , 'he' );
// 				if(wp_redirect($wpml_permalink)) {
// 					exit;
// 				}
// 			}
// 		}
// 	}
// }
// add_action( 'get_header', 'imc_geo_redirect' );


// add_action('wpcf7_mail_sent', function ($cf7) {
 
// $wpcf = WPCF7_ContactForm::get_current();
// $wpccfid=$wpcf->id;
 
// 	 if ( 585 == $wpccfid ) { 
// echo '<div id="popup-join" class="show">
// 	<div class="overlay"></div>
// 	<div class="popup-content">
// 		<a href="#" class="close-btn" title="Close Popup">X</a>
// 		<div class="form-wrapper text-center">
//  THANK YOU
//  </div>		</div>
// 	</div>
// </div>
// ';
// 	}
// });


// define the wpcf7_mail_sent callback 
// function action_wpcf7_mail_sent( $contact_form ) { 
// 	
// 	if ( 585 == $contact_form->id() ) {
// 		echo '<div id="popup-join" class="show">
// 			<div class="overlay"></div>
// 			<div class="popup-content">
// 				<a href="#" class="close-btn" title="Close Popup">X</a>
// 				<div class="form-wrapper text-center">
// 		 THANK YOU
// 		 </div>		</div>
// 			</div>
// 		</div>
// 		';
// 	}
// }; 
			  
// add_action( 'wpcf7_mail_sent', 'action_wpcf7_mail_sent', 10, 1 ); 

  add_action( 'wp_footer', 'mycustom_wp_footer' );
function mycustom_wp_footer() {
?>
     <script type="text/javascript"> 
				document.addEventListener( 'wpcf7mailsent', function( event ) {
							if ( '585' == event.detail.contactFormId ){ 
								jQuery('#popup-thankyou').toggleClass('show'); 
					} else if ( '1445' == event.detail.contactFormId ) { 
						jQuery('#popup-thankyou-he').toggleClass('show'); 
						jQuery('#popup-join').removeClass('show');
					}  else if ( '8' == event.detail.contactFormId ){
						jQuery('#popup-thankyou').toggleClass('show');
					} else if ( '1447' == event.detail.contactFormId ) { 
						jQuery('#popup-thankyou-he').toggleClass('show'); 
						jQuery('#popup-join').removeClass('show');
					}
					
			}, false );
         </script>
       <?php  }  

add_action('init', function() {
	pll_register_string('sing-product-terpenes', 'Terpenes');
	pll_register_string('sing-product-cat-val', 'Active ingredients and values');
	pll_register_string('sing-product-cat-ind-sat', 'Category');
	pll_register_string('sing-product-cat-ind-sat', 'Indica or Sativa');
	pll_register_string('sing-product-cat-about', 'About');
	pll_register_string('sing-product-cat-flower', 'Flower Appearance');
	pll_register_string('sing-product-cat-feel', 'Feel and effect');
	pll_register_string('sing-product-cat-aroma', 'Aroma and taste');
	pll_register_string('sing-product-cat-char', 'Characteristics of cannabis cultivation');
	pll_register_string('sing-product-flavors-floral', 'Floral');
	pll_register_string('sing-product-flavors-nutty', 'Nutty');
	pll_register_string('home-hero-btn-oils', 'Our flowers and Oils');  
});
 