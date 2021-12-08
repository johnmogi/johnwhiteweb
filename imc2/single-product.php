<?php
get_header();
// Translate Filter Select Options
__('Berry', 'imc');
__('Cherry', 'imc');
__('Blueberry', 'imc');
__('Sweet', 'imc');
__('Cheesy', 'imc');
__('Spicy', 'imc');
__('Super Spicy', 'imc');
__('Citrus Fruits', 'imc');
//__('Soil', 'imc');
__('Earthy', 'imc');
__('Ice Cream', 'imc');
__('Coffee', 'imc');
__('Lemon', 'imc');
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
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full' );
$featured_image_mobile = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'product-thumb-mobile' );
/* ACF fields */
$color_scheme = get_field('color_scheme');
$product_image = get_field('product_image');
$product_cat_image = get_field('product_category_img');
$product_thumbnail = get_field('product_thumbnail');
$product_ribbon = get_field('$product_ribbon');
$product_effect = get_field('product_effect');
$product_appear = get_field('product_appear');
$product_feel_effect = get_field('product_feel_effect');
$product_about = get_field('product_about');
$product_characteristics = get_field('product_characteristics');
$product_form = get_field('product_form');
$is_product_oil = get_field('is_product_oil');
$product_flavors = get_field('product_flavors');
$terpenes_description = get_field('terpenes_description');
$product_ingredients = get_field('product_ingredients');
$product_type = get_field('product_type');
$product_type_text 	= get_field('product_type_text');
$product_pic_1 = get_field('product_pic_1');
$product_pic_2 = get_field('product_pic_2');
$product_pic_3 = get_field('product_pic_3');
$opinion_title = get_field('opinion_title');
$opinion = get_field('opinion');
$related_title = get_field('related_title');
$related_carousel = get_field('related_carousel');
$tips_title = get_field('tips_title');
$tips_cards = get_field('tips_cards');
$currLang = get_bloginfo('language'); 
$cannbis_pop_up_button = get_field('cannbis_pop_up_button');
?>
<style>
	#product-details .tabs li a{
		background-color: #ffffff;
		color: <?php echo $color_scheme; ?>;
	}
	#product-details .tabs li a.active{
		background-color: <?php echo $color_scheme; ?>;
		color: #ffffff;
	}
</style>

<div id="content">
	<section id="product-hero" class="first-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 text position-relative">
					<?php if($currLang == 'he-IL'){ ?>
						<a href="<?php echo get_permalink(513); ?>" class="back d-print-none" title="חזרה לעמוד מוצרים"><?php echo __('Back','imc'); ?></a>
					<?php } elseif ($currLang == 'en-US') { ?>
						<a href="<?php echo get_permalink(63); ?>" class="back d-print-none" title="Back to Products Page"><?php echo __('Back','imc'); ?></a>
					<?php } ?>
					<h1><?php the_title(); ?></h1>
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile; // End of the loop.
					?>	
				</div>
				<!-- <?php //if($featured_image){ ?>
					<div class="col-md-12 picture">
						<img class="desktop-only" src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>">
						<img class="mobile-only" src="<?php echo $featured_image_mobile[0]; ?>" alt="<?php the_title(); ?>">
					</div>
				<?php //} ?> -->
			</div>
		</div>
	</section>
	<section id="product-details">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<?php /*
						<img src="<?php echo wp_get_attachment_image_url($product_image['id'],'full'); ?>" alt="">
					*/ ?>
					<?php 
						if($product_form){
							$i = 1;
							echo '<div class="tab-content">';
							foreach ($product_form as $tab) {
								$product_image = $tab['product_image'];
								$tab_content = $tab['tab_content'];
								$first_tab = ($i == 1) ? ' class="tab-pane active show"' : ' class="tab-pane"' ;
								echo '<div id="product'. $i .'"'. $first_tab .'>';
									echo '<img src="'. wp_get_attachment_image_url($product_image['id'],'full') .'" alt="'.get_the_title($post->ID) . ' - ' .$tab_content.'">';
								echo '</div>';
							$i++;
							}
							echo '</div>';
						} 
						// Case Oil
						if($is_product_oil){
							echo '<img src="'. wp_get_attachment_image_url($product_image['id'],'full') .'">';
						}
					?>
				 <?php 
                if(pll_current_language() == 'en') {
					echo '<p style="font-size: 11px;">This information does not constitute a binding opinion and should not be relied on. It is an overview only, and not in lieu of a professional medical opinion. IMC cannot guarantee and is not responsible for the described effects, or similar effects felt among patients. The foregoing should not be construed as advertising and/or a recommendation and/or encouragement to use cannabis for non-medical purposes, which is prohibited by law. The use of medical cannabis is at the recommendation of a specialist and according to an appropriate license from the Ministry of Health in accordance with the law.</p>';
                } else if(pll_current_language() == 'he') {
                    echo '<p style="font-size: 11px;">*מידע זה אינו מהווה חוות דעת מחייבת ואין להסתמך עליו אלא כסקירה כללית בלבד, שאינה מהווה תחליף לחוות דעת רפואית מקצועית. IMC אינה יכולה להבטיח ואינה אחראית לכך שההשפעות המתוארות, או השפעות דומות יורגשו בקרב המטופלים. אין לראות באמור פרסום ו/או המלצה ו\או עידוד לשימוש בקנאביס שלא למטרות רפואיות, שהינו שימוש אסור לפי חוק. השימוש בקנאביס רפואי הינו בהמלצת רופא מומחה ובהתאם לרישיון מתאים ממשרד הבריאות עפ"י חוק.</p>'; 
                }  
        		 ?>  

					
				</div>
				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table">
							<!-- <?php if($product_form) { ?>
								<tr>
									<th><?php echo __('Form','imc'); ?></th>
									<td>
										<ul class="nav tabs"
											<?php if($color_scheme){
												echo ' style="border-color: '. $color_scheme .';"';
											} ?>
										>
											<?php
												if($product_form ){
													$i = 1;
													foreach ($product_form as $tab) {
														$icon = $tab['icon'];
														if($icon == 'inflorescences'){
															$tabIcon = 'inflorescences';
														} elseif($icon == 'handfull'){
															$tabIcon = 'handfull';												
														} elseif($icon == 'rolling'){
															$tabIcon = 'rolling';												
														} elseif($icon == 'oil'){
															$tabIcon = 'oil';												
														} else {
															$tabIcon = '';												
														}
														$first = ($i == 1) ? ' class="active"' : '' ;
														echo '<li class="nav-item '. $tabIcon .'">';
															echo '<a'. $first .' data-toggle="tab" data-target="#product'. $i .', #menu'. $i .'">';
															echo '</a>';
														echo '</li>';
														$i++;
													}
												} 
											?>
										</ul>
										<div class="tab-content">
											<?php
												// Second Loop
												if($product_form ){
													$i = 1;
													foreach ($product_form as $tab) {
														# fields...
														$tab_content = $tab['tab_content'];
														$first_tab = ($i == 1) ? ' class="tab-pane active show"' : ' class="tab-pane fade"' ;
														echo '<div id="menu'. $i .'"'. $first_tab .'>';
															echo '<p>'. $tab_content .'</p>';
														echo '</div>';
														$i++;
													}

												} 
											?>
										</div>
									</td>
								</tr>
							<?php } ?> -->
							<tr>

							<?php if($product_ingredients) { ?>
							<th><?php pll_e('Active ingredients and values'); ?></th>
								<td>
										<?php 
										$ingredients = explode("\n", $product_ingredients);
										if ( !empty($ingredients) ) {
										echo '<div class="ingredients d-flex">';
										foreach ( $ingredients as $item ) {
											echo '<span>'. trim( $item ) .'</span>';
										}
										echo '</div>';
										}
									?>
								</td>
							</tr>
							<?php } ?>

							<?php if($product_type) { ?>
							<tr>
							<th><?php pll_e('Category'); ?></th>
								<td><?php echo $product_type; ?>  
								<!-- <?php //var_dump ($product_cat_image); ?> -->
								<!-- <?php //echo '<img src="'. wp_get_attachment_image_url($product_cat_image['id'],'full') .'">'; ?> -->
								<?php echo '<img src="'. wp_get_attachment_image_url($product_cat_image['id'],'full') .'">'; ?>
								<p><?php echo $product_type_text; ?> </p>
								<!-- <?php //$image_alt2 = get_post_meta($product_cat_image['id'], '_wp_attachment_image_alt', TRUE);?> -->
							  
								</td>
							</tr>
							<?php } ?>
							<tr>
 
							<?php if($product_feel_effect) { ?>
							<tr>
							<th><?php pll_e('Feel and effect'); ?></th>
								<td><?php echo $product_feel_effect; ?></td>
							</tr> 
							<?php } ?>

							<?php if($terpenes_description) { ?>
							<tr>
							<th><?php pll_e('Terpenes'); ?></th>
								<td style="white-space: nowrap;direction: ltr;"><?php echo $terpenes_description; ?></td>
							</tr>
							<?php } ?>

						 
							<?php if($product_flavors) { ?>
							<tr>
								<th><?php pll_e('Aroma and taste'); ?></th>
								<td>
									<?php if($product_flavors){
										echo '<div class="flavors d-flex">';
										foreach ($product_flavors as $flavor) {
											$flavor_value = $flavor['value'];
											$flavor_label = $flavor['label'];
											echo '<span class="flavor-'. $flavor_value .'">'. __($flavor_label,'imc') .'</span>';
										}
										echo '</div>';
									} ?>
								</td>
							</tr>
							<?php } ?>

							

						</table>
 						<?php if($cannbis_pop_up_button) { ?> 
						<?php echo '<a target="_blank" class="cannbis-pop-up-button" href="'. $cannbis_pop_up_button. '"><img src="https://imcannabis.com/wp-content/themes/dev-theme/images/cannbis-search-button.png" width="259" height="48" alt="search button"></a>';?>
						 <?php } ?>
						<!-- <div class="cannbis-pop-up" style="display:none;"> 
							<div id="cannbis-search-widget"></div>
							<script src="https://cannbis.co.il/widget/a1.js"></script>
							<script src="https://cannbis.co.il/widget/a2.js"></script>
							<script>window.cannbisWidgetId="a8gc44d3"</script>
							<script src="https://cannbis.co.il/widget/a3.js"></script> 
							 <a href="#" class="close-popup">X</a>
						</div> -->
					 
					 <!-- <style>
						 .cannbis-pop-up{
							position: fixed;
							top: 10%;
							left: 40%;
							right: auto;
							background-color: #fff;
							z-index: 9;
						 }
						 .cannbis-pop-up .close-popup{
							position: absolute;
							left: 9px;
							top: 8px;
							color: rgb(51, 56, 99);
							font-size: 18px;
							font-weight: bold;
							z-index: 10;
						 }
					 </style>
						<script>
							jQuery( "a.cannbis-pop-up-button" ).click(function( event ) {
							event.preventDefault();
							jQuery( ".cannbis-pop-up" ).show();
							});

							jQuery( ".cannbis-pop-up .close-popup" ).click(function( event ) { 
							event.preventDefault(); 
							jQuery( ".cannbis-pop-up" ).hide(); 
							});
						</script> -->
						  

					</div>
					<a class="btn d-none" href="<?php echo get_permalink(249) . '?product_id='. $post->ID .''; ?>"
						<?php if($color_scheme){
							echo ' style="background-color: '. $color_scheme .'; border-color: '. $color_scheme .';"';
						} ?>
					>
						<?php echo __('Set order','imc'); ?>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- <?php if($product_pic_1 || $product_pic_2 || $product_pic_3) { ?>
		<section id="pictures">
			<div class="container">
				<div class="row align-items-sm-center justify-content-center">
					<div class="left">
						<?php if($product_pic_1){ 
							$image_alt1 = get_post_meta($product_pic_1['id'], '_wp_attachment_image_alt', TRUE);?>
							<img src="<?php echo wp_get_attachment_image_url($product_pic_1['id'],'product-pic-1'); ?>" alt="<?php echo $image_alt1; ?>">
						<?php } else { ?>
							<img src="<?php getImage('down-pic1.jpg'); ?>" alt="">
						<?php } ?>
						<?php if($product_pic_3){
							$image_alt3 = get_post_meta($product_pic_3['id'], '_wp_attachment_image_alt', TRUE);?>
							<img src="<?php echo wp_get_attachment_image_url($product_pic_3['id'],'product-pic-3'); ?>" alt="<?php echo $image_alt3; ?>">
						<?php } else { ?>
							<img src="<?php getImage('down-pic3.jpg'); ?>" alt="">
						<?php } ?>
					</div>
					<div class="right">
						<?php if($product_pic_2){ 
							$image_alt2 = get_post_meta($product_pic_2['id'], '_wp_attachment_image_alt', TRUE);?>
							<img src="<?php echo wp_get_attachment_image_url($product_pic_2['id'],'product-pic-2'); ?>" alt="<?php echo $image_alt2; ?>">
						<?php } else { ?>
							<img src="<?php getImage('down-pic2.jpg'); ?>" alt="">
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?> -->

	<section id="opinion" class="d-print-none">
		<div class="container">
			<h2><?php echo $opinion_title; ?></h2>
			<?php 
				if($opinion){
					echo '<div class="carousel">';
						foreach ($opinion as $item) {
							# fields...
							$name = $item['name'];
							$text = $item['text'];
								echo '<div class="item">';
									echo '<h3>'. $name .'</h3>';
									echo '<p>'. $text .'</p>';
								echo '</div>';
						}				
					echo '</div>';				
				}
			?>
		</div>
	</section>
	
	<section id="other-related-products" class="d-print-none">
		<div class="container">
			<h2><?php echo __('Other Related Products','imc'); ?></h2>
			<?php 
				$terms = wp_get_object_terms( $post->ID, 'products', array('fields' => 'ids') );
				$args = array(
				'posts_per_page' => -1,
				'post_type'   => 'product',
				'tax_query' => array(
						array(
							'taxonomy' => 'products',
							'field' => 'id',
							'terms' => $terms
						)
					),
				'post__not_in' => array( $post->ID )
				);
				
				$products = get_posts( $args );
				echo '<div class="carousel">';
				foreach ($products as $post) {
					# fields...
					$title = get_the_title();
					$effects = get_field('product_effect' ,$post->ID);
					$ingredients = get_field('product_ingredients' ,$post->ID);
					$product_thumbnail = get_field('product_thumbnail' ,$post->ID);
					$product_ribbon = get_field('product_ribbon' ,$post->ID);
					$product_flavors = get_field('product_flavors' ,$post->ID);
					$product_url = get_permalink($post->ID);
					// $content = $post->post_content;
					echo '<a href="'. $product_url .'" class="item">';
						echo '<div class="wrap-image">';
							echo '<div class="overlay-info d-flex align-items-center justify-content-center flex-column">';
							if($product_flavors){
//							echo '<h3>'. __('Flavors','imc') .'</h3>';
								echo '<div class="flavors d-flex">';
								foreach ($product_flavors as $flavor) {
									$flavor_value = $flavor['value'];
									$flavor_label = $flavor['label'];
									echo '<span class="flavor-'. $flavor_value .'">'. __($flavor_label,'imc') .'</span>';
								}
								echo '</div>';
							}
							echo '</div>';
							echo '<div class="ribbon">';
								if($product_ribbon){
									echo '<img src="';
											if($product_ribbon == 'indica'){
												getImage('indika-ribbon.svg');
											} elseif ($product_ribbon == 'sativa') {
												getImage('sativa-ribbon.svg');
											} 
									echo '">';
										if($product_ribbon == 'indica'){
											echo 'alt="Indica">';
										} elseif ($product_ribbon == 'sativa') {
											echo 'alt="Sativa">';
										}  elseif ($product_ribbon == 'hybrid') {
											echo 'alt="Hybrid">';
										}
								}
							echo '</div>';
							echo '<img src="'. wp_get_attachment_image_url($product_thumbnail['id'],'product-related-thumb') .'" alt="'.$title.'">';
						echo '</div>';
						echo '<h3>'. $title .'</h3>';
						echo '<p>'. $effects .'</p>';
						// echo '<p class="ingredients">'. $ingredients .'</p>';
					echo '</a>';
				}				
				echo '</div>';
			?>
			
		</div>
	</section>
	<?php get_template_part('template-parts/relevant-info'); ?>
	<section id="tips" class="d-print-none">
		<div class="container">
			<h2><?php
				if($tips_title){
					echo $tips_title;
				} else {
					echo __('Tips for best usage','imc');
				}
				?>	
			</h2>
			<?php if($tips_cards){
				$i = 0;
				echo '<div class="row">';
				foreach ($tips_cards as $item) {
					$i++;
					// limit items to 3
					if( $i > 3 ) {
						break;
					}
					# fields...
					$picture = $item['picture'];
					$text = $item['text'];
					$link = $item['link'];
					echo '<div class="col-md-4">';
						echo '<div class="card">';
							echo '<span class="pic" style="background-image: url('. wp_get_attachment_image_url($picture['id'],'full') .');"></span>';
								echo '<p>'. $text .'</p>';
							echo '<a href="'. $link .'">';
								echo __('View full tip','imc') . ' >';
							echo '</a>';
						echo '</div>';
					echo '</div>';

				}
				echo '</div>';

			} ?>
		</div>
	</section>
</div><!--#content-->
<?php
get_footer();
