<?php
/*
Template Name: Products Search Results
*/
__( 'Products Search Results', 'imc' );
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
__('Coffee', 'imc');
__('Lemon', 'imc');
__('Inflorescence', 'imc');
__('Pre-Rolled Cigarettes', 'imc');
__('Sheredded', 'imc');
__('Oil', 'imc');
get_header();

/* ACF fields */
$feel_and_effect_acf = get_field_object( 'field_5d8921870b535' );
$medical_status_acf  = get_field_object( 'field_5d8922af0b538' );
$type = get_field_object('field_5dbed28a6d49d');
$fe_values           = get_query_var( 'fe' );
$ms_values           = get_query_var( 'ms' );
$type_values           = get_query_var( 'type' );
$currLang = get_bloginfo('language');
?>
    <section id="products-hero" class="first-section">
        <div class="container">
            <h1><?php echo __( 'Search reasults', 'imc' ); ?></h1>
        </div>
    </section>
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
                    <div class="col-md-5 p-sm-0">
                        <select id="feel-effect"
                                class="form-control"
                                name="fe[]"
                                placeholder="<?php echo __('Feel &#38; Effect','imc') . ' : ' . __('All','imc'); ?>"
                                searchable="<?php echo __('Feel &#38; Effect','imc') . ' : ' . __('All','imc'); ?>" multiple>
							<?php
							foreach ( $feel_and_effect_acf['choices'] as $value => $label ) {
								$selected = in_array( $value, $fe_values ) ? ' selected' : '';
								echo '<option value="' . $value . '"' . $selected . '>' . __($label, 'imc') . '</option>';
							}
							?>
                        </select>
                    </div>
                    <div class="col-md-5 p-sm-0">
                        <select id="medical-status"
                                class="form-control"
                                name="ms[]"
                                placeholder="<?php echo __('Medical Status','imc') . ' : ' . __('All','imc'); ?>"
                                searchable="<?php echo __('Medical Status','imc') . ' : ' . __('All','imc'); ?>" multiple>
							<?php
							foreach ( $medical_status_acf['choices'] as $value => $label ) {
								$selected = in_array( $value, $ms_values ) ? ' selected' : '';
								echo '<option value="' . $value . '"' . $selected . '>' . __($label, 'imc') . '</option>';
							}
							?>
                        </select>
                    </div>
                    <div class="col-md-2 p-sm-0">
                        <button class="btn btn-blue" type="submit" class="btn btn-primary"><?php echo __('Search','imc') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section id="products-results">
        <div class="container">
			<?php
			$args       = [
				'posts_per_page' => - 1,
				'post_type'      => 'product',
				'lang'           => pll_current_language(),
			];
			$meta_query = [];
			if ( ! empty( $fe_values ) ) {
				$fe_array = [
					'relation' => 'OR',
				];
				foreach ( $fe_values as $v ) {
					array_push( $fe_array,
						[
							'key'     => 'feel_and_effect',
							'value'   => $v,
							'compare' => 'LIKE',
						] );
				}
				$meta_query[] = $fe_array;
			}
			if ( ! empty( $ms_values ) ) {
				$ms_array = [
					'relation' => 'OR',
				];
				foreach ( $ms_values as $v ) {
					array_push( $ms_array,
						[
							'key'     => 'medical_status',
							'value'   => $v,
							'compare' => 'LIKE',
						] );
				}
				$meta_query[] = $ms_array;
			}
			if ( ! empty( $type_values ) ) {
				$type_array = [
					'relation' => 'OR',
				];
				foreach ( $type_values as $v ) {
					array_push( $type_array,
						[
							'key'     => 'type',
							'value'   => $v,
							'compare' => 'LIKE',
						] );
				}
				$meta_query[] = $type_array;
			}
			//			if ( ! empty( $ms_values ) && ! empty( $fe_values ) ) {
			//				$args['meta_query']['relation'] = 'AND';
			//			} else {
			//				$args['meta_query']['relation'] = 'OR';
			//			}
			$args['meta_query'][] = $meta_query;
			$products             = get_posts( $args );
			echo '<div class="row">';
			foreach ( $products as $post ) {
				# fields...
				$title             = get_the_title();
				$effects           = get_field( 'product_effect', $post->ID );
				$ingredients       = get_field( 'product_ingredients', $post->ID );
				$product_thumbnail = get_field( 'product_thumbnail', $post->ID );
				$product_ribbon    = get_field( 'product_ribbon', $post->ID );
				$product_flavors   = get_field( 'product_flavors', $post->ID );
				$product_url       = get_permalink( $post->ID );

				// $content = $post->post_content;
				echo '<div class="col-md-4 mb-sm-5">';
				echo '<a href="' . $product_url . '" class="item">';
				echo '<div class="wrap-image">';
				echo '<div class="overlay-info d-flex align-items-center justify-content-center flex-column">';
				if ( $product_flavors ) {
					echo '<h3>' . __( 'Flavors', 'imc' ) . '</h3>';
					echo '<div class="flavors d-flex">';
					foreach ( $product_flavors as $flavor ) {
						$flavor_value = $flavor['value'];
						$flavor_label = $flavor['label'];
						echo '<span class="flavor-' . $flavor_value . '">' . __($flavor_label,'imc') . '</span>';
					}
					echo '</div>';
				}
				echo '</div>';
				echo '<div class="ribbon">';
				if($product_ribbon){
					echo '<img src="';
					if ( $product_ribbon == 'indica' ) {
						getImage( 'indika-ribbon.svg' );
					} elseif ( $product_ribbon == 'sativa' ) {
						getImage( 'sativa-ribbon.svg' );
					} else {
						getImage( 'sativa-ribbon.svg' );
					}
					echo '">';					
				}
				echo '</div>';
				echo '<img src="' . wp_get_attachment_image_url( $product_thumbnail['id'], 'full' ) . '">';
				echo '</div>';
				echo '<h3>' . $title . '</h3>';
				echo '<p>' . $effects . '</p>';
				echo '<p class="ingredients">' . $ingredients . '</p>';
				echo '</a>';
				echo '</div>';
			}
			echo '</div>';
			?>
        </div>
    </section>
<?php
get_footer();


