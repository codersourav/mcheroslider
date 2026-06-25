/* MC Hero Slider */
(function () {
	'use strict';

	var ANIM_DURATION = 600; // ms — must match the longest CSS animation

	function initSlider(wrapper) {
		if (!wrapper || wrapper._mcInit) return;
		wrapper._mcInit = true;

		var slides   = wrapper.querySelectorAll('.mc-slide');
		var tabs     = wrapper.querySelectorAll('.mc-tab');
		var prevBtn  = wrapper.querySelector('.mc-arrow--prev');
		var nextBtn  = wrapper.querySelector('.mc-arrow--next');
		var autoplay = wrapper.dataset.autoplay === 'true';
		var speed    = parseInt(wrapper.dataset.speed, 10) || 5000;
		var current  = 0;
		var total    = slides.length;
		var timer    = null;
		var busy     = false; // prevent overlapping transitions

		if (!total) return;

		function applyTabStyle(tab, isActive) {
			if (!tab) return;
			if (isActive) {
				tab.style.background = tab.dataset.abg || '#cc1818';
				tab.style.color      = tab.dataset.atc || '#ffffff';
				tab.classList.add('mc-tab--active');
			} else {
				tab.style.background = tab.dataset.bg  || '#ffffff';
				tab.style.color      = tab.dataset.tc  || '#222222';
				tab.classList.remove('mc-tab--active');
			}
		}

		function cleanSlide(slide) {
			slide.classList.remove('mc-slide--animate-in', 'mc-slide--animate-out', 'mc-slide--active');
		}

		function goTo(index) {
			if (busy) return;
			if (index < 0)      index = total - 1;
			if (index >= total) index = 0;
			if (index === current) return;

			busy = true;

			var outSlide = slides[current];
			var inSlide  = slides[index];

			// ── 1. Reset both slides to a clean state ──
			cleanSlide(inSlide);
			outSlide.classList.remove('mc-slide--animate-in', 'mc-slide--animate-out');

			// Force reflow so CSS picks up the cleared state before re-adding classes
			void inSlide.offsetWidth;

			// ── 2. Kick off exit on outgoing slide ──
			outSlide.classList.remove('mc-slide--active');
			outSlide.classList.add('mc-slide--animate-out');

			// ── 3. Kick off enter on incoming slide ──
			inSlide.classList.add('mc-slide--active', 'mc-slide--animate-in');

			// ── 4. Update tabs ──
			applyTabStyle(tabs[current], false);
			current = index;
			applyTabStyle(tabs[current], true);

			// ── 5. Clean up after animation completes ──
			setTimeout(function () {
				outSlide.classList.remove('mc-slide--animate-out');
				inSlide.classList.remove('mc-slide--animate-in');
				busy = false;
			}, ANIM_DURATION);

			resetAutoplay();
		}

		function startAutoplay() {
			if (!autoplay) return;
			timer = setInterval(function () { goTo(current + 1); }, speed);
		}

		function resetAutoplay() {
			clearInterval(timer);
			startAutoplay();
		}

		// Tab clicks
		tabs.forEach(function (tab) {
			tab.addEventListener('click', function () {
				var target = parseInt(this.dataset.target, 10);
				if (!isNaN(target)) goTo(target);
			});
		});

		// Arrows
		if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1); });
		if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1); });

		// Pause on hover
		wrapper.addEventListener('mouseenter', function () { clearInterval(timer); });
		wrapper.addEventListener('mouseleave', function () { startAutoplay(); });

		// Touch swipe
		var touchStartX = 0;
		wrapper.addEventListener('touchstart', function (e) {
			touchStartX = e.changedTouches[0].screenX;
		}, { passive: true });
		wrapper.addEventListener('touchend', function (e) {
			var diff = touchStartX - e.changedTouches[0].screenX;
			if (Math.abs(diff) > 40) goTo(diff > 0 ? current + 1 : current - 1);
		}, { passive: true });

		// Set initial tab colours and start
		tabs.forEach(function (tab, i) { applyTabStyle(tab, i === 0); });
		startAutoplay();
	}

	function initAll() {
		document.querySelectorAll('.mc-hero-slider').forEach(function (el) {
			initSlider(el);
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initAll);
	} else {
		initAll();
	}

	// Elementor editor live-reload
	window.addEventListener('elementor/frontend/init', function () {
		if (!window.elementorFrontend) return;
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/mc_hero_slider.default',
			function ($scope) {
				var el = $scope[0].querySelector('.mc-hero-slider');
				if (el) {
					el._mcInit = false;
					initSlider(el);
				}
			}
		);
	});

})();
