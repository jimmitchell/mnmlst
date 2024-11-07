<?php

function mnmlst_customize_register( $wp_customize ) {
 
	//* Color Scheme
	$wp_customize -> add_section( 'themecolors', array(
	'title' => 'Theme Colors',
	) );
	
	$theme_colors[] = array(
		'slug' => 'bg_color',
		'default' => '#ffffff',
		'label' => 'Background Color'
	);
	$theme_colors[] = array(
		'slug' => 'text_main_color',
		'default' => '#55585b',
		'label' => 'Main Text Color'
	);
 	$theme_colors[] = array(
		'slug' => 'link_color',
		'default' => '#00a1e0',
		'label' => 'Link Color'
	);
	$theme_colors[] = array(
		'slug' => 'link_color_hover',
		'default' => '#111112',
		'label' => 'Link Color Hover'
	);
	$theme_colors[] = array(
		'slug' => 'accent_color_1',
		'default' => '#f4f4f5',
		'label' => 'Accent Color 1'
	);
	$theme_colors[] = array(
		'slug' => 'accent_color_2',
		'default' => '#dbdbdc',
		'label' => 'Accent Color 2'
	);
	$theme_colors[] = array(
		'slug' => 'accent_color_3',
		'default' => '#cccccd',
		'label' => 'Accent Color 3'
	);
	$theme_colors[] = array(
		'slug' => 'accent_color_4',
		'default' => '#b7b8b9',
		'label' => 'Accent Color 4'
	);
	$theme_colors[] = array(
		'slug' => 'accent_color_5',
		'default' => '#999a9c',
		'label' => 'Accent Color 5'
	);
	$theme_colors[] = array(
		'slug' => 'accent_color_6',
		'default' => '#7a7b7c',
		'label' => 'Accent Color 6'
	);
	$theme_colors[] = array(
		'slug' => 'warning_color',
		'default' => '#cd4b3d',
		'label' => 'Warning Color'
	);

	//* add the settings and controls for each color
	foreach( $theme_colors as $txtcolor ) {
	
		// SETTINGS
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' => $txtcolor['default'],
				'type' => 'option', 
				'capability' =>  'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			)
		);

		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$txtcolor['slug'], 
				array('label' => $txtcolor['label'], 
				'section' => 'themecolors',
				'settings' => $txtcolor['slug'])
			)
		);
	}
}
add_action( 'customize_register', 'mnmlst_customize_register' );


function mnmlst_customize_colors() {
 
 	$bg_color = get_option( 'bg_color', '#ffffff' );
 	$text_main_color = get_option( 'text_main_color', '#55585b' );
 	$link_color = get_option( 'link_color', '#00a1e0' );
 	$link_color_hover = get_option( 'link_color_hover', '#111112' );
 	$accent_color_1 = get_option( 'accent_color_1', '#f4f4f5' );
 	$accent_color_2 = get_option( 'accent_color_2', '#dbdbdc' );
 	$accent_color_3 = get_option( 'accent_color_3', '#cccccd' );
 	$accent_color_4 = get_option( 'accent_color_4', '#b7b8b9' );
 	$accent_color_5 = get_option( 'accent_color_5', '#999a9c' );
 	$accent_color_6 = get_option( 'accent_color_6', '#7a7b7c' );
 	$warning_color = get_option( 'warning_color', '#cd4b3d' );

	echo '<style type="text/css">:root {--background-color:' . $bg_color . ';--text-main-color:' . $text_main_color . ';--link-color:' . $link_color . ';--link-color-rgba:' . $link_color . '99;--link-color-hover:' . $link_color_hover . ';--accent-color-1:' . $accent_color_1 . ';--accent-color-2:' . $accent_color_2 . ';--accent-color-3:' . $accent_color_3 . ';--accent-color-4:' .$accent_color_4 . ';--accent-color-5:' . $accent_color_5 . ';--accent-color-6:' . $accent_color_6 . ';--accent-color-7:' . $link_color . '10' . ';--warning-color:' . $warning_color . ';</style>';
}
add_action( 'wp_head', 'mnmlst_customize_colors' );

?>