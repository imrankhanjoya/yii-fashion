<?php
/*
Nudge_Upgrade_Theme_Customize_Section is based on Justin Tadlock's '"Pro" theme section examples for the customizer'
https://github.com/justintadlock/trt-customizer-pro, (C) 2016 Justin Tadlock.
'"Pro" theme section examples for the customizer' is distributed under the terms of the GNU GPL v2 or later.
*/
class Nudge_Add_Upgrade_Customize_Section {

	static public function init(){
		self::add_actions();
	}

	static protected function add_actions(){
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( get_called_class(), 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( get_called_class(), 'enqueue_control_scripts' ), 0 );
	}

	public static function enqueue_control_scripts() {

		wp_enqueue_script( 'nudge-upgrade-theme-customize-section', get_template_directory_uri(). '/inc/nudge-upgrade-theme/customize-section.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'nudge-upgrade-theme-customize-section', get_template_directory_uri(). '/inc/nudge-upgrade-theme/customize-section.css' );
	}

	public static function sections( $manager ) {

		// Load custom sections.
		require_once( get_template_directory() . '/inc/nudge-upgrade-theme/customize-section.php' );

		// Register custom section types.
		$manager->register_section_type( 'Nudge_Upgrade_Customize_Section' );

		// Register sections.
		$manager->add_section(
			new Nudge_Upgrade_Customize_Section(
				$manager,
				'nudge-upgrade-theme',
				array(
					'title'    => esc_html__( 'Perle Theme', 'simple-perle' ),
					'pro_text' => esc_html__( 'Upgrade',     'simple-perle' ),
					'pro_url'  => 'https://nudgethemes.com/wordpress-themes/perle-theme/'
				)
			)
		);
	}
}

Nudge_Add_Upgrade_Customize_Section::init();