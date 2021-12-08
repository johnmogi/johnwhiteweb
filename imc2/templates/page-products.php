<?php
/*
Template Name: Products
*/
__( 'Products', 'imc' );
// Translate Filter Select Options
__('Manage Migraine', 'imc');
__('Pain Relieve', 'imc');
__('Reduce Stress & Anxiety', 'imc');
__('Manage Sleep Disorders', 'imc');
__('Muscles Relaxation', 'imc');
__('Manage Eating Disorder', 'imc');
__('Inspire Easiness / Relaxation', 'imc');
__('Provide Energy', 'imc');
__('Oncology', 'imc');
__('PTSD', 'imc');
__('Epilepsy', 'imc');
__('Crohn&#39;s &#38; Colitis', 'imc');
__('ALS', 'imc');
__('Fibromyalgia', 'imc');
__('Multiple Sclerosis', 'imc');
__('Parkinson\'s', 'imc');
__('Tourette', 'imc');
__('Chronic Pain', 'imc');
__('Eating Disorder', 'imc');
// Translate Filter Select Options
__('Berry', 'imc');
__('Blueberry', 'imc');
__('Sweet', 'imc');
__('Cheesy', 'imc');
__('Spicy', 'imc');
__('Super Spicy', 'imc');
__('Citrus Fruits', 'imc');
__('Earthy', 'imc');
__('Ice Cream', 'imc');
__('Coffee', 'imc');
__('Lemon', 'imc'); 
__('Inflorescence', 'imc');
__('Pre-Rolled Cigarettes', 'imc');
__('Sheredded', 'imc');
__('Oil', 'imc');
__('Citrusy', 'imc');
__('Piney', 'imc');
__('Woody', 'imc');
__('Smoky', 'imc');
__('Fresh', 'imc');
__('Herbal', 'imc');
__('Fruity', 'imc');
__('Floral', 'imc');
__('Nutty', 'imc');
__('Sour', 'imc');
__('Active ingredients and values', 'imc');
__('Category', 'imc');
__('About', 'imc');
__('Flower Appearance', 'imc');
__('Feel and effect', 'imc');
__('Aroma and taste', 'imc');
__('Characteristics of cannabis cultivation', 'imc');
get_header();

/* ACF fields */
$products_hero_image = get_field( 'products_hero_image' );
$products_hero_image_m = get_field( 'products_hero_image_m' );
$products_main_title = get_field( 'products_main_title' );
$strains_title       = get_field( 'strains_title' ); 
$product_ribbon 	 = get_field('$product_ribbon');
$strains             = get_field( 'strains' );
$all_filters_title   = get_field( 'all_filters_title' );
$type = get_field_object('field_5dbed28a6d49d');
$feel_and_effect_acf = get_field_object('field_5d8921870b535');
$medical_status_acf = get_field_object('field_5d8922af0b538');
$currLang = get_bloginfo('language');
?>
	<div id="content">
		<?php /*
		<section id="products-hero" class="first-section d-print-none">
        	<div class="container-fluid">
	            <div class="wrap-background">
	            	<div class="d-none d-sm-block bgimage"
		                <?php if($products_hero_image){
		                    echo ' style="background-image: url('. wp_get_attachment_image_url($products_hero_image['id'],'full') .');"';
		                } ?>
		            >
		            </div>
		            <div class="d-block d-sm-none bgimage"
		                <?php if($products_hero_image_m){
		                    echo ' style="background-image: url('. wp_get_attachment_image_url($products_hero_image_m['id'],'full') .');"';
		                } ?>
		            >
		            </div>
	                <h1><?php echo $products_main_title; ?></h1>
	                <section id="filter">
	                    <div class="container pm-0">
	                        <form action="<?php 
	                            if($currLang == 'he-IL'){
	                                echo get_permalink( 515 );
	                            } elseif($currLang == 'en-US'){
	                                echo get_permalink( 123 );
	                            }
	                         ?>">
	                            <div class="row align-itmes-center justify-content-center">
	                                <div class="col-md-5 p-sm-0 mb-2 mb-sm-0">
	                                    <select id="feel-effect"
	                                            class="form-control"
	                                            name="fe[]"
	                                            placeholder="<?php echo __('Feel and effect','imc') . ' : ' . __('All','imc'); ?>"
	                                            placeholder="<?php echo __('Feel and effect','imc') . ' : ' . __('All','imc'); ?>"
	                                            searchable="<?php echo __('Feel and effect','imc') . ' : ' . __('All','imc'); ?>" multiple>
	        		                        <?php
	        		                        foreach( $feel_and_effect_acf['choices'] as $value => $label ) {
	        			                        echo '<option value="'.$value.'">'.__($label, 'imc').'</option>';
	        		                        }
	        		                        ?>
	                                    </select>
	                                </div>
	                                <div class="col-md-5 p-sm-0 mb-2 mb-sm-0">
	                                    <select id="medical-status"
	                                            class="form-control"
	                                            name="ms[]"
	                                            placeholder="<?php echo __('Medical Status','imc') . ' : ' . __('All','imc'); ?>"
	                                            searchable="<?php echo __('Medical Status','imc') . ' : ' . __('All','imc'); ?>" multiple>
	        		                        <?php
	        		                        foreach( $medical_status_acf['choices'] as $value => $label ) {
	        			                        echo '<option value="'.$value.'">'.__($label, 'imc').'</option>';
	        		                        }
	        		                        ?>
	                                    </select>
	                                </div>
	                                <div class="col-md-2 p-sm-0 text-center text-sm-left">
	                                    <button class="btn btn-blue" type="submit" class="btn btn-primary"><?php echo __('Search','imc') ?></button>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </section>
	            </div>
            </div>
        </section> */ ?>
		
		<section id="strains-and-oils">
			<div class="container">
				<h1><?php echo $strains_title; ?></h1>
				<?php
				echo '<div class="carousel">';
				$args     = array(
					'posts_per_page' => - 1,
					'orderby' => 'menu_order',
					'post_type'      => 'product',
				);
				$products = get_posts( $args );

				foreach ( $products as $post ) {
					$title             = get_the_title();
					$product_thumbnail = get_field( 'product_thumbnail', $post->ID );
					$product_flavors     = get_field( 'product_flavors', $post->ID );
					echo '<div class="item">';
					echo '<div class="wrap-image">';
						echo '<div class="overlay-info d-flex align-items-center justify-content-center flex-column">';
						if($product_flavors){
					// 	echo '<h3>'. __('Flavors','imc') .'</h3>';
							// echo '<div class="flavors d-flex">';
							// foreach ($product_flavors as $flavor) {
							// 	$flavor_value = $flavor['value'];
							// 	$flavor_label = $flavor['label'];
							// 	echo '<span class="flavor-'. $flavor_value .'">'. __($flavor_label,'imc') .'</span>';
							// }
							// echo '</div>';
						}
						echo '</div>';
					echo '</div>';

					echo '<img src="' . wp_get_attachment_image_url( $product_thumbnail['id'], 'full' ) . '" alt="'. $title .'">';
					// echo '<h4>' . $title . '</h4>';
					echo '</div>';
				}
				echo '</div>';
				// Info
				echo '<div class="info">';
				foreach ( $products as $post ) {
					# fields...
					$title               = get_the_title();
					$content             = $post->post_content;
					$effects             = get_field( 'product_effect', $post->ID );
					$terpenes_description= get_field( 'terpenes_description', $post->ID );
					$product_flavors     = get_field( 'product_flavors', $post->ID );
					$product_cat_image = get_field('product_category_img', $post->ID);
					$flowers_for_main_product = get_field('flowers_for_main_product', $post->ID);
					$product_about     		= get_field( 'product_about', $post->ID );
					$product_about    		 = get_field( 'product_appear', $post->ID );
					$product_feel_effect     = get_field( 'product_feel_effect', $post->ID );
					$product_characteristics = get_field( 'product_characteristics', $post->ID );
					$product_type 			= get_field('product_type', $post->ID );
					$product_type_text 			= get_field('product_type_text', $post->ID );
					$product_ribbon     = get_field( 'product_ribbon', $post->ID );
					$product_ingredients = get_field( 'product_ingredients', $post->ID );
					
					echo '<div class="row d-flex">';
					echo '<div class="col-md-6">';
					echo '<div class="item">';
					echo '<h3>' . $title . '</h3>';
					echo '<p>' . $content . '</p>';
					if(! empty($flowers_for_main_product)) { 
						echo '<img class="flow-pic" src="' . wp_get_attachment_image_url( $flowers_for_main_product['id'], 'full' ) . '" alt="'. $title .'">';
					}
					echo '<a class="btn btn-blue" href="' . get_the_permalink() . '">' . __( 'View Product',
							'imc' ) . '</a>';
					echo '</div>';
					echo '</div>';
					echo '<div class="col-md-6 mt-3 mt-sm-0">';
					echo '<table class="table">';

					if(! empty($product_ingredients)) { 
					echo '<tr>';
					echo '<th>';
					pll_e('Active ingredients and values');
					echo '</th>'; 
					echo '<td>';
					$ingredients = explode( "\n", $product_ingredients );
					if ( ! empty( $ingredients ) ) {
						echo '<div class="ingredients d-flex">';
						foreach ( $ingredients as $item ) {
							echo '<span>' . trim( $item ) . '</span>';
						}
						echo '</div>';
					}
					echo '</td>';
					echo '</tr>';
					}


					if(! empty($product_type)) { 
					echo '<tr>';
					echo '<th>';
					pll_e('Category');
					echo '</th>'; 

					// echo '<td>' . $product_type . '<img src="' . wp_get_attachment_image_url( $product_cat_image['id'], 'full' ) . '" alt="'. $title .'"><p>' . $product_type_text . '</p></td>';
					
					echo '<td>' . $product_type;
					if(! empty($product_cat_image)) { 
						echo '<img src="' . wp_get_attachment_image_url( $product_cat_image['id'], 'full' ) . '" alt="'. $title .'">';
					}
					'<p>' . $product_type_text . '</p></td>';
					echo '</tr>';
				}

				if(! empty($product_feel_effect)) { 
					echo '<tr>';
					echo '<th>';
					pll_e('Feel and effect');
					echo '</th>'; 
					echo '<td>' . $product_feel_effect . '</td>';
					echo '</tr>'; 
				}

					if($terpenes_description) {
					echo '<tr>';
					echo '<th>';
					pll_e('Terpenes');
					echo '</th>'; 
					echo '<td>' . $terpenes_description . '</th>';
					echo '</tr>'; 
					}
					if ( $product_flavors ) {
					echo '<tr>';
					echo '<th>';
					pll_e('Aroma and taste');
					echo '</th>'; 
					echo '<td>';
						echo '<div class="flavors d-flex">';
						foreach ( $product_flavors as $flavor ) {
							$flavor_value = $flavor['value'];
							$flavor_label = $flavor['label'];
							echo '<span class="flavor-' . $flavor_value . '">' . __($flavor_label,'imc') . '</span>';
						}
						echo '</div>';
					echo '</td>';
					echo '</tr>';
					}
					echo '</table>';

				 
					if(pll_current_language() == 'en') {
							// echo '<p><span style="font-weight: 600;">Would you like us to reserve the product for you in pharmacies?</span><br> Contact us for customer service  
							// <a href="#" target="_blank">
							// 	<img style="display: inline-block;" src="https://imcannabis.com/wp-content/themes/dev-theme/images/whatsapp-footer.svg" width="20" height="20" alt="Whatsapp">
							// </a></p>';
					} else if(pll_current_language() == 'he') {
						echo '<p class="wats-p" ><span class="wats-q">
						תרצו שנשריין עבורכם את המוצר בבתי המרקחת?</span><br>
						<a href="https://api.whatsapp.com/send?phone=+9720586683040" target="_blank">
						<span class="linked">פנו אלינו לשירות הלקוחות </span>   
							<img style="display: inline-block;" src="https://imcannabis.com/wp-content/themes/dev-theme/images/whatsapp-footer.svg" width="20" height="20" alt="Whatsapp">
						</a></p>'; 
					}  
				 

					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
				?>

			</div>
		</section>
		
		<?php /*
		<section id="all-filters">
			<div class="container">
				<h2><?php echo __( 'All filters', 'imc' ); ?></h2>
				<div class="row">
					<div class="wrap-filters">
						<div class="filters-menu">
							<?php
								// Medical Status Menu
								echo '<h3>'. __('Medical status','imc') .'</h3>';
								echo '<ul>';
								foreach( $medical_status_acf['choices'] as $value => $label ) {
									if($currLang == 'he-IL'){
										echo '<li><a href="'. get_permalink(515) .'?ms[]='. $value .'">'. __($label,'imc') .'</a></li>';
									} elseif($currLang == 'en-US'){
										echo '<li><a href="'. get_permalink(123) .'?ms[]='. $value .'">'. __($label,'imc') .'</a></li>';
									}
								}
								echo '</ul>';
							?>	            		
						</div>
						<div class="filters-menu" class="d-print-none">
							<?php
								// Feel and effect Menu
								echo '<h3>'. __('Feel and effect','imc') .'</h3>';
								echo '<ul>';
								foreach( $feel_and_effect_acf['choices'] as $value => $label ) {
									if($currLang == 'he-IL'){
										echo '<li><a href="'. get_permalink(515) .'?fe[]='. $value .'">'. __($label,'imc') .'</a></li>';
									} elseif($currLang == 'en-US'){
										echo '<li><a href="'. get_permalink(123) .'?fe[]='. $value .'">'. __($label,'imc') .'</a></li>';
									}
								}
								echo '</ul>';
							?>	            		
						</div>
						<div class="filters-menu">
							<?php
								// Feel and effect Menu
								echo '<h3>'. __('Type','imc') .'</h3>';
								echo '<ul>';
								foreach( $type['choices'] as $value => $label ) {
									if($currLang == 'he-IL'){
										echo '<li><a href="'. get_permalink(515) .'?type[]='. $value .'">'. __($label,'imc') .'</a></li>';
									} elseif($currLang == 'en-US'){
										echo '<li><a href="'. get_permalink(123) .'?type[]='. $value .'">'. __($label,'imc') .'</a></li>';
									}
								}
								echo '</ul>';
							?>	            		
						</div>
					</div>
				</div>
			</div>
		</section>
		*/ ?>
	</div><!--#content-->
<?php
get_footer();


