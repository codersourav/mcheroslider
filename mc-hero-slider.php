<?php
/**
 * Plugin Name: MC Hero Slider
 * Description: Elementor Hero Slider widget with tab navigation buttons.
 * Version: 1.0.0
 * Author: Sourav Das
 * Text Domain: mc-hero-slider
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'MC_HERO_SLIDER_PATH', plugin_dir_path( __FILE__ ) );
define( 'MC_HERO_SLIDER_URL',  plugin_dir_url( __FILE__ ) );

final class MC_Hero_Slider_Plugin {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	public function init() {
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', function() {
				echo '<div class="notice notice-warning"><p>MC Hero Slider requires Elementor to be installed and active.</p></div>';
			} );
			return;
		}
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	public function register_widgets( $widgets_manager ) {
		require_once MC_HERO_SLIDER_PATH . 'widgets/hero-slider-widget.php';
		$widgets_manager->register( new \MC_Hero_Slider_Widget() );
	}

	public function enqueue_assets() {
		wp_enqueue_style(
			'mc-hero-slider',
			MC_HERO_SLIDER_URL . 'assets/hero-slider.css',
			[],
			'1.0.0'
		);
		wp_enqueue_script(
			'mc-hero-slider',
			MC_HERO_SLIDER_URL . 'assets/hero-slider.js',
			[],
			'1.0.0',
			true  // load in footer, after DOM is ready
		);
	}
}

MC_Hero_Slider_Plugin::instance();
