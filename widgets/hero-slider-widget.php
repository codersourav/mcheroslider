<?php
if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Utils;

class MC_Hero_Slider_Widget extends Widget_Base {

	public function get_name()  { return 'mc_hero_slider'; }
	public function get_title() { return 'MC Hero Slider'; }
	public function get_icon()  { return 'eicon-slideshow'; }
	public function get_categories() { return [ 'general' ]; }

	public function get_script_depends() { return []; }
	public function get_style_depends()  { return []; }

	protected function register_controls() {

		/* ─────────────────────────────────────────
		 * SECTION: Slides (Repeater)
		 * ───────────────────────────────────────── */
		$this->start_controls_section( 'section_slides', [
			'label' => __( 'Slides', 'mc-hero-slider' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		] );

		$repeater = new Repeater();

		// Tab / Button label
		$repeater->add_control( 'tab_label', [
			'label'       => __( 'Tab Button Label', 'mc-hero-slider' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Modern Car', 'mc-hero-slider' ),
			'label_block' => true,
		] );

		// Background image
		$repeater->add_control( 'slide_image', [
			'label'   => __( 'Background Image', 'mc-hero-slider' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => [ 'url' => Utils::get_placeholder_image_src() ],
		] );

		// Overlay colour
		$repeater->add_control( 'overlay_color', [
			'label'   => __( 'Overlay Color', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => 'rgba(0,0,0,0.45)',
		] );

		// Tagline
		$repeater->add_control( 'tagline', [
			'label'       => __( 'Tagline', 'mc-hero-slider' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( '— Limousine services since 1970', 'mc-hero-slider' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'tagline_color', [
			'label'   => __( 'Tagline Color', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#ffffff',
		] );

		$repeater->add_control( 'tagline_size', [
			'label'   => __( 'Tagline Font Size (px)', 'mc-hero-slider' ),
			'type'    => Controls_Manager::SLIDER,
			'range'   => [ 'px' => [ 'min' => 10, 'max' => 40 ] ],
			'default' => [ 'size' => 15, 'unit' => 'px' ],
		] );

		// Heading
		$repeater->add_control( 'heading', [
			'label'       => __( 'Heading', 'mc-hero-slider' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __('"Rethinking Transportation"', 'mc-hero-slider' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'heading_color', [
			'label'   => __( 'Heading Color', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#ffffff',
		] );

		$repeater->add_control( 'heading_size', [
			'label'   => __( 'Heading Font Size (px)', 'mc-hero-slider' ),
			'type'    => Controls_Manager::SLIDER,
			'range'   => [ 'px' => [ 'min' => 20, 'max' => 100 ] ],
			'default' => [ 'size' => 52, 'unit' => 'px' ],
		] );

		// Description
		$repeater->add_control( 'description', [
			'label'       => __( 'Description', 'mc-hero-slider' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => __( 'Service de chauffeur haut de gamme pour les entreprises, diplomates et personnalités.', 'mc-hero-slider' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'description_color', [
			'label'   => __( 'Description Color', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#eeeeee',
		] );

		$repeater->add_control( 'description_size', [
			'label'   => __( 'Description Font Size (px)', 'mc-hero-slider' ),
			'type'    => Controls_Manager::SLIDER,
			'range'   => [ 'px' => [ 'min' => 12, 'max' => 36 ] ],
			'default' => [ 'size' => 17, 'unit' => 'px' ],
		] );

		// CTA Button
		$repeater->add_control( 'btn_text', [
			'label'       => __( 'Button Text', 'mc-hero-slider' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Découvrez nos secteurs →', 'mc-hero-slider' ),
			'label_block' => true,
		] );

		$repeater->add_control( 'btn_url', [
			'label'         => __( 'Button URL', 'mc-hero-slider' ),
			'type'          => Controls_Manager::URL,
			'placeholder'   => 'https://example.com',
			'show_external' => true,
			'default'       => [ 'url' => '#', 'is_external' => false ],
		] );

		$repeater->add_control( 'btn_bg_color', [
			'label'   => __( 'Button Background', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#cc1818',
		] );

		$repeater->add_control( 'btn_text_color', [
			'label'   => __( 'Button Text Color', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#ffffff',
		] );

		$repeater->add_control( 'btn_font_size', [
			'label'   => __( 'Button Font Size (px)', 'mc-hero-slider' ),
			'type'    => Controls_Manager::SLIDER,
			'range'   => [ 'px' => [ 'min' => 10, 'max' => 30 ] ],
			'default' => [ 'size' => 15, 'unit' => 'px' ],
		] );

		// Tab button colours (per-slide)
		$repeater->add_control( 'tab_bg_color', [
			'label'     => __( 'Tab Background Color', 'mc-hero-slider' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#ffffff',
			'separator' => 'before',
		] );

		$repeater->add_control( 'tab_text_color', [
			'label'   => __( 'Tab Text Color', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#222222',
		] );

		$repeater->add_control( 'tab_active_bg_color', [
			'label'   => __( 'Tab Active Background', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#cc1818',
		] );

		$repeater->add_control( 'tab_active_text_color', [
			'label'   => __( 'Tab Active Text Color', 'mc-hero-slider' ),
			'type'    => Controls_Manager::COLOR,
			'default' => '#ffffff',
		] );

		$repeater->add_control( 'tab_font_size', [
			'label'   => __( 'Tab Font Size (px)', 'mc-hero-slider' ),
			'type'    => Controls_Manager::SLIDER,
			'range'   => [ 'px' => [ 'min' => 10, 'max' => 28 ] ],
			'default' => [ 'size' => 14, 'unit' => 'px' ],
		] );

		$this->add_control( 'slides', [
			'label'       => __( 'Slides', 'mc-hero-slider' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => [
				[
					'tab_label'   => 'Modern Car 1',
					'tagline'     => '— Limousine services since 1970',
					'heading'     => '"Rethinking Transportation"',
					'description' => 'Service de chauffeur haut de gamme pour les entreprises, diplomates et personnalités. Discrétion, élégance et ponctualité absolue.',
					'btn_text'    => 'Découvrez nos secteurs →',
				],
				[
					'tab_label'   => 'Modern Car 2',
					'tagline'     => '— Premium Service',
					'heading'     => '"Excellence on Every Road"',
					'description' => 'Tailored transport solutions for discerning clients worldwide.',
					'btn_text'    => 'Discover More →',
				],
				[
					'tab_label'   => 'Modern Car 3',
					'tagline'     => '— Since 1970',
					'heading'     => '"Your Journey, Our Passion"',
					'description' => 'Reliable, stylish and on-time — every single time.',
					'btn_text'    => 'Book Now →',
				],
			],
			'title_field' => '{{{ tab_label }}}',
		] );

		$this->end_controls_section();

		/* ─────────────────────────────────────────
		 * SECTION: Slider Settings
		 * ───────────────────────────────────────── */
		$this->start_controls_section( 'section_settings', [
			'label' => __( 'Slider Settings', 'mc-hero-slider' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'transition', [
			'label'   => __( 'Slide Transition', 'mc-hero-slider' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'fade',
			'options' => [
				'ltr'  => __( 'Left to Right', 'mc-hero-slider' ),
				'rtl'  => __( 'Right to Left', 'mc-hero-slider' ),
				'fade' => __( 'Fade',          'mc-hero-slider' ),
				'spin' => __( 'Spin',          'mc-hero-slider' ),
			],
		] );

		$this->add_control( 'slider_height', [
			'label'   => __( 'Slider Height', 'mc-hero-slider' ),
			'type'    => Controls_Manager::SLIDER,
			'range'   => [ 'px' => [ 'min' => 300, 'max' => 1000 ] ],
			'default' => [ 'size' => 620, 'unit' => 'px' ],
			'selectors' => [
				'{{WRAPPER}} .mc-slides-wrapper' => 'min-height: {{SIZE}}{{UNIT}};',
			],
		] );

		$this->add_control( 'autoplay', [
			'label'        => __( 'Autoplay', 'mc-hero-slider' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Yes', 'mc-hero-slider' ),
			'label_off'    => __( 'No', 'mc-hero-slider' ),
			'return_value' => 'yes',
			'default'      => 'yes',
		] );

		$this->add_control( 'autoplay_speed', [
			'label'     => __( 'Autoplay Speed (ms)', 'mc-hero-slider' ),
			'type'      => Controls_Manager::NUMBER,
			'default'   => 5000,
			'min'       => 1000,
			'max'       => 15000,
			'condition' => [ 'autoplay' => 'yes' ],
		] );

		$this->add_control( 'show_arrows', [
			'label'        => __( 'Show Arrow Navigation', 'mc-hero-slider' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Yes', 'mc-hero-slider' ),
			'label_off'    => __( 'No', 'mc-hero-slider' ),
			'return_value' => 'yes',
			'default'      => 'yes',
		] );

		$this->add_control( 'content_align', [
			'label'   => __( 'Content Alignment', 'mc-hero-slider' ),
			'type'    => Controls_Manager::CHOOSE,
			'options' => [
				'left'   => [ 'title' => 'Left',   'icon' => 'eicon-text-align-left' ],
				'center' => [ 'title' => 'Center', 'icon' => 'eicon-text-align-center' ],
				'right'  => [ 'title' => 'Right',  'icon' => 'eicon-text-align-right' ],
			],
			'default' => 'center',
		] );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$slides   = $settings['slides'] ?? [];

		if ( empty( $slides ) ) return;

		$widget_id   = $this->get_id();
		$autoplay    = $settings['autoplay'] === 'yes' ? 'true' : 'false';
		$auto_speed  = intval( $settings['autoplay_speed'] ?? 5000 );
		$show_arrows = $settings['show_arrows'] === 'yes';
		$align       = $settings['content_align'] ?? 'center';
		$transition  = $settings['transition'] ?? 'fade';
		?>
		<div class="mc-hero-slider" id="mc-slider-<?php echo esc_attr( $widget_id ); ?>"
		     data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
		     data-speed="<?php echo esc_attr( $auto_speed ); ?>"
		     data-transition="<?php echo esc_attr( $transition ); ?>">

			<!-- Slides -->
			<div class="mc-slides-wrapper">
				<?php foreach ( $slides as $index => $slide ) :
					$is_active   = $index === 0 ? ' mc-slide--active' : '';
					$img_url     = $slide['slide_image']['url'] ?? '';
					$overlay     = $slide['overlay_color'] ?? 'rgba(0,0,0,0.45)';
					$btn_target  = ( $slide['btn_url']['is_external'] ?? false ) ? '_blank' : '_self';
					$btn_rel     = ( $slide['btn_url']['nofollow'] ?? false ) ? 'nofollow' : '';
					$btn_href    = $slide['btn_url']['url'] ?? '#';
				?>
				<div class="mc-slide<?php echo esc_attr( $is_active ); ?>" data-index="<?php echo esc_attr( $index ); ?>">

					<!-- Background image -->
					<?php if ( $img_url ) : ?>
					<div class="mc-slide__bg" style="background-image:url('<?php echo esc_url( $img_url ); ?>');">
					<?php else : ?>
					<div class="mc-slide__bg mc-slide__bg--placeholder">
					<?php endif; ?>
						<div class="mc-slide__overlay" style="background:<?php echo esc_attr( $overlay ); ?>;"></div>
					</div>

					<!-- Content -->
					<div class="mc-slide__content mc-align-<?php echo esc_attr( $align ); ?>">

						<?php if ( ! empty( $slide['tagline'] ) ) : ?>
						<p class="mc-slide__tagline" style="
							color:<?php echo esc_attr( $slide['tagline_color'] ?? '#fff' ); ?>;
							font-size:<?php echo esc_attr( $slide['tagline_size']['size'] ?? 15 ); ?>px;">
							<?php echo esc_html( $slide['tagline'] ); ?>
						</p>
						<?php endif; ?>

						<?php if ( ! empty( $slide['heading'] ) ) : ?>
						<h2 class="mc-slide__heading" style="
							color:<?php echo esc_attr( $slide['heading_color'] ?? '#fff' ); ?>;
							font-size:<?php echo esc_attr( $slide['heading_size']['size'] ?? 52 ); ?>px;">
							<?php echo esc_html( $slide['heading'] ); ?>
						</h2>
						<?php endif; ?>

						<?php if ( ! empty( $slide['description'] ) ) : ?>
						<p class="mc-slide__description" style="
							color:<?php echo esc_attr( $slide['description_color'] ?? '#eee' ); ?>;
							font-size:<?php echo esc_attr( $slide['description_size']['size'] ?? 17 ); ?>px;">
							<?php echo esc_html( $slide['description'] ); ?>
						</p>
						<?php endif; ?>

						<?php if ( ! empty( $slide['btn_text'] ) ) : ?>
						<a href="<?php echo esc_url( $btn_href ); ?>"
						   target="<?php echo esc_attr( $btn_target ); ?>"
						   <?php if ( $btn_rel ) echo 'rel="' . esc_attr( $btn_rel ) . '"'; ?>
						   class="mc-slide__btn"
						   style="
							background:<?php echo esc_attr( $slide['btn_bg_color'] ?? '#cc1818' ); ?>;
							color:<?php echo esc_attr( $slide['btn_text_color'] ?? '#fff' ); ?>;
							font-size:<?php echo esc_attr( $slide['btn_font_size']['size'] ?? 15 ); ?>px;">
							<?php echo esc_html( $slide['btn_text'] ); ?>
						</a>
						<?php endif; ?>

					</div><!-- .mc-slide__content -->
				</div><!-- .mc-slide -->
				<?php endforeach; ?>
			</div><!-- .mc-slides-wrapper -->

			<!-- Arrow navigation -->
			<?php if ( $show_arrows ) : ?>
			<button class="mc-arrow mc-arrow--prev" aria-label="Previous slide">&#8249;</button>
			<button class="mc-arrow mc-arrow--next" aria-label="Next slide">&#8250;</button>
			<?php endif; ?>

			<!-- Tab navigation -->
			<div class="mc-tabs">
				<?php foreach ( $slides as $index => $slide ) :
					$is_active_tab = $index === 0 ? ' mc-tab--active' : '';
					$tab_bg        = $slide['tab_bg_color']          ?? '#fff';
					$tab_tc        = $slide['tab_text_color']         ?? '#222';
					$tab_abg       = $slide['tab_active_bg_color']    ?? '#cc1818';
					$tab_atc       = $slide['tab_active_text_color']  ?? '#fff';
					$tab_fs        = $slide['tab_font_size']['size']  ?? 14;
				?>
				<button
					class="mc-tab<?php echo esc_attr( $is_active_tab ); ?>"
					data-target="<?php echo esc_attr( $index ); ?>"
					data-bg="<?php echo esc_attr( $tab_bg ); ?>"
					data-tc="<?php echo esc_attr( $tab_tc ); ?>"
					data-abg="<?php echo esc_attr( $tab_abg ); ?>"
					data-atc="<?php echo esc_attr( $tab_atc ); ?>"
					style="
						background:<?php echo esc_attr( $index === 0 ? $tab_abg : $tab_bg ); ?>;
						color:<?php echo esc_attr( $index === 0 ? $tab_atc : $tab_tc ); ?>;
						font-size:<?php echo esc_attr( $tab_fs ); ?>px;">
					<?php echo esc_html( $slide['tab_label'] ?? 'Slide' ); ?>
				</button>
				<?php endforeach; ?>
			</div><!-- .mc-tabs -->

		</div><!-- .mc-hero-slider -->
		<?php
	}
}
