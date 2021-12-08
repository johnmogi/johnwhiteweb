<?php
/**
 * Template part for relevant info widget
 *
 */
$home_id = get_option( 'page_on_front' );
$relevant_title = get_field('relevant_title', $home_id);
$relevant_cards = get_field('relevant_cards', $home_id);
$postID = get_queried_object_id();
$the_url = get_permalink( $postID )

?>
<section id="relevant-info-widget" class="widget">
	<h2><?php echo __('Relevant Info','imc'); ?></h2>
		<?php if($relevant_cards){
			$i = 0;
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
				$link_id = url_to_postid($link);
				$hide_post = ($postID == $link_id) ? 'd-none' : 'd-flex';
				echo '<div class="item '. $hide_post .' align-items-center">';
					echo '<a href="'. $link .'" class="item d-flex align-items-center">';
						echo '<img src="'. wp_get_attachment_image_url($icon['id'],'full') .'" alt="">';
						echo '<h3>'. $text .'</h3>';
					echo '</a>';
				echo '</div>';
			}
		} ?>
</section>