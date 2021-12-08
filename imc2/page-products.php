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
__('Cherry', 'imc');
__('Blueberry', 'imc');
__('Sweet', 'imc');
__('Cheesy', 'imc');
__('Spicy', 'imc');
__('Super Spicy', 'imc');
__('Citrus Fruits', 'imc');
__('Earthy', 'imc');
__('Ice Cream', 'imc');
__('Citrusy', 'imc');
__('Coffee', 'imc');
__('Piney', 'imc');
__('Woody', 'imc');
__('Smoky', 'imc');
__('Fresh', 'imc');
__('Herbal', 'imc');
__('Lemon', 'imc');
__('Inflorescence', 'imc');
__('Pre-Rolled Cigarettes', 'imc');
__('Sheredded', 'imc');
__('Oil', 'imc');
__('Fruity', 'imc');
get_header();

/* ACF fields */
$products_main_title = get_field( 'products_main_title' );
$strains_title       = get_field( 'strains_title' );
$strains             = get_field( 'strains' );
$all_filters_title   = get_field( 'all_filters_title' );
$product_flavors 	= get_field('product_flavors');
$type = get_field_object('field_5dbed28a6d49d');
$feel_and_effect_acf = get_field_object('field_5d8921870b535');
$medical_status_acf = get_field_object('field_5d8922af0b538');
$currLang = get_bloginfo('language');
?>
        <section id="products-hero" class="first-section">
            <div class="container-fluid wrap-background">
                <h1><?php echo $products_main_title; ?></h1>
                <section id="filter">
                    <div class="container">
                        <form action="<?php 
                            if($currLang == 'he-IL'){
                                echo get_permalink( 515 );
                            } elseif($currLang == 'en-US'){
                                echo get_permalink( 123 );
                            }
                         ?>">
                            <div class="row align-itmes-center justify-content-center">
                                <div class="col-md-5 px-2 p-sm-0 mb-2 mb-sm-0">
                                    <select id="feel-effect"
                                            class="form-control"
                                            name="fe[]"
                                            placeholder="<?php echo __('Feel &#38; Effect','imc') . ' : ' . __('All','imc'); ?>"
                                            placeholder="<?php echo __('Feel &#38; Effect','imc') . ' : ' . __('All','imc'); ?>"
                                            searchable="<?php echo __('Feel &#38; Effect','imc') . ' : ' . __('All','imc'); ?>" multiple>
        		                        <?php
        		                        foreach( $feel_and_effect_acf['choices'] as $value => $label ) {
        			                        echo '<option value="'.$value.'">'.__($label, 'imc').'</option>';
        		                        }
        		                        ?>
                                    </select>
                                </div>
                                <div class="col-md-5 px-2 p-sm-0 mb-2 mb-sm-0">
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
        </section>
    <section id="strains-and-oils">
        <div class="container">
            <h2><?php echo $strains_title; ?></h2>
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
				echo '<div class="item">';
				echo '<img src="' . wp_get_attachment_image_url( $product_thumbnail['id'], 'full' ) . '" alt="">';
				echo '<h4>' . $title . '</h4>';
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
				$product_ingredients = get_field( 'product_ingredients', $post->ID );
				echo '<div class="row d-flex">';
				echo '<div class="col-md-6">';
				echo '<div class="item">';
				echo '<h3>' . $title . '</h3>';
				echo '<p>' . $content . '</p>';
				echo '<a class="btn btn-blue" href="' . get_the_permalink() . '">' . __( 'View Product',
						'imc' ) . '</a>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-md-6 mt-3 mt-sm-0">';
				echo '<table class="table">';
				echo '<tr>';
				echo '<th>'. __('Values','imc') .'</th>';
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
				echo '<tr>';
				echo '<th>'. __('Feel &#38; Effect','imc') .'</th>';
				echo '<td>' . $effects . '</td>';
				echo '</tr>'; 
				// if($terpenes_description) {
				// echo '<tr>';
				// echo '<th>'. pll_e('Terpenes') .'</th>';
				// echo '<td>' . $terpenes_description . '</th>';
				// echo '</tr>';
				// }


				if ( $product_flavors ) {
				echo '<tr>';
				echo '<th>'. __('Flavors','imc') .'</th>';
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
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			?>
 
        </div>
 
    </section>
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
	            	<div class="filters-menu">
	                    <?php
	                    	// Feel and Effect Menu
	                        echo '<h3>'. __('Feel &#38; Effect','imc') .'</h3>';
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
	                    	// Feel and Effect Menu
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
<?php
get_footer();


