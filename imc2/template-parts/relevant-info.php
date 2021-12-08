<?php
/**
 * Template part for relevant info
 *
 */
$home_id = get_option( 'page_on_front' );
$relevant_title = get_field('relevant_title', $home_id);
$relevant_cards = get_field('relevant_cards', $home_id);
?>
<section id="relevant-info" class="d-print-none">
	<div class="container">
		<h2><?php echo $relevant_title; ?></h2>
		<?php if($relevant_cards){
			$i = 0;
			echo '<div class="row wrap-content justify-content-sm-center">';
			foreach ($relevant_cards as $item) {
				$i++;
				// limit items to 4
				if( $i > 4 ) {
					break;
				}
				# fields...
				$icon = $item['icon'];
				$text = $item['text'];
				$link = $item['link'];
				echo '<div class="col-6 col-md-3 mb-1 mb-sm-0 p-1 p-sm-0">';
					echo '<a href="'. $link .'" class="card text-center">';
						echo '<img src="'. wp_get_attachment_image_url($icon['id'],'full') .'" alt="">';
						echo '<p>'. $text .'</p>';
					echo '</a>';
				echo '</div>';

			}
			echo '</div>';

		} ?>
	</div>
</section>