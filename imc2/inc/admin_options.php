<?php
	add_action('admin_menu', 'imc_theme_menu');

	function imc_theme_menu() {
		add_menu_page(__('imc General options', 'imc'), __('General options', 'imc'), 'administrator', __FILE__, 'imc_theme_options', 'dashicons-welcome-write-blog');
		add_action('admin_init', 'register_imc_theme_menu');
	}

	function get_all_posts_dropdown($posts, $id, $name, $selected_post) {
		$html = '<select name="' . $name . '" id="' . $id . '">';
		foreach ($posts as $post) {
			$selected = ($post->ID == $selected_post) ? ' selected="selected"' : '';
			$html .= '<option value="' . $post->ID . '"' . $selected . '>' . $post->post_title . '</option>';
		}
		$html .= '</select>';
		return $html;
	}

	function register_imc_theme_menu() {
		register_setting('imc-options', 'facebook_link');
		register_setting('imc-options', 'twitter_link');
		register_setting('imc-options', 'youtube_link');
		register_setting('imc-options', 'instagram_link');
		register_setting('imc-options', 'linkedin_link');
		register_setting('imc-options', 'credit_text');
		register_setting('imc-options', 'credit_text_he');
	}

	function imc_theme_options() {
		if ( ! current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		echo '<div class="wrap">';
		echo '<h2>' . __('IMC Theme Options', 'imc') . '</h2>';
		echo '<form method="post" action="options.php" enctype="multipart/form-data">';
		settings_fields('imc-options');
		do_settings_sections('imc-options');
		echo '<table class="form-table">';
		echo '<tr>';
		echo '<th colspan="2" scope="row" style="background-color: #ccc;padding: 5px;color: #4d4d4d;"><label>' . __('Footer Social Links', 'imc') . ':</label></th>';
		echo '</tr>';
		echo '<tr>';
		echo '<th scope="row"><label for="facebook_link">' . __('Facebook Link', 'imc') . '</label></th>';
		echo '<td><input type="text" class="regular-text" id="facebook_link" name="facebook_link" value="' . esc_attr(get_option('facebook_link')) . '" /></td>';
		echo '</tr>';		
		echo '<tr>';
		echo '<th scope="row"><label for="twitter_link">' . __('Twitter Link', 'imc') . '</label></th>';
		echo '<td><input type="text" class="regular-text" id="twitter_link" name="twitter_link" value="' . esc_attr(get_option('twitter_link')) . '" /></td>';
		echo '</tr>';		
		echo '<tr>';
		echo '<th scope="row"><label for="youtube_link">' . __('Youtube Link', 'imc') . '</label></th>';
		echo '<td><input type="text" class="regular-text" id="youtube_link" name="youtube_link" value="' . esc_attr(get_option('youtube_link')) . '" /></td>';
		echo '</tr>';		
		echo '<tr>';
		echo '<th scope="row"><label for="instagram_link">' . __('Instagram Link', 'imc') . '</label></th>';
		echo '<td><input type="text" class="regular-text" id="instagram_link" name="instagram_link" value="' . esc_attr(get_option('instagram_link')) . '" /></td>';
		echo '</tr>';		
		echo '<tr>';
		echo '<th scope="row"><label for="linkedin_link">' . __('Linkedin Link', 'imc') . '</label></th>';
		echo '<td><input type="text" class="regular-text" id="linkedin_link" name="linkedin_link" value="' . esc_attr(get_option('linkedin_link')) . '" /></td>';
		echo '</tr>';		
		echo '<tr>';
		echo '<th colspan="2" scope="row" style="background-color: #ccc;padding: 5px;color: #4d4d4d;"><label>' . __('Credit Section', 'imc') . ':</label></th>';
		echo '</tr>';
		echo '<tr>';
		echo '<th scope="row"><label for="credit_text">' . __('Credit Text', 'imc') . '</label></th>';
		echo '<td><textarea class="regular-text code" id="credit_text" name="credit_text" cols="40" row="10" style="min-height: 5em;">' . esc_attr(get_option('credit_text')) . '</textarea></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<th scope="row"><label for="credit_text_he">' . __('Credit Text Hebrew', 'imc') . '</label></th>';
		echo '<td><textarea class="regular-text code" id="credit_text_he" name="credit_text_he" cols="40" row="10" style="min-height: 5em;">' . esc_attr(get_option('credit_text_he')) . '</textarea></td>';
		echo '</tr>';
		echo '</table>';
		submit_button();
		echo '</form>';
		echo '</div>';
	}
