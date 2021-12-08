<?php
	function imc_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}

	add_action( 'customize_register', 'imc_customize_register' );

	function imc_customize_preview_js() {
		wp_enqueue_script( 'imc_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
	}

	add_action( 'customize_preview_init', 'imc_customize_preview_js' );
