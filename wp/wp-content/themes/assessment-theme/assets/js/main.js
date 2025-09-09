document.addEventListener('DOMContentLoaded', function () {
	var hamburger = document.getElementById('hamburger');
	var offcanvas = document.getElementById('mobile-menu');
	if (hamburger && offcanvas) {
		hamburger.addEventListener('click', function () {
			var isOpen = offcanvas.classList.toggle('open');
			offcanvas.hidden = !isOpen;
			hamburger.setAttribute('aria-expanded', String(isOpen));
		});
		offcanvas.addEventListener('click', function (e) {
			if (e.target === offcanvas) {
				offcanvas.classList.remove('open');
				offcanvas.hidden = true;
				hamburger.setAttribute('aria-expanded', 'false');
			}
		});
	}

	if (window.Swiper) {
		new Swiper('.swiper', {
			loop: true,
			autoplay: { delay: 3000, disableOnInteraction: false },
			pagination: { el: '.swiper-pagination', clickable: true },
			navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
		});

		// Testimonials slider
		var testimonials = document.querySelector('.testimonials-swiper');
		if (testimonials) {
			new Swiper('.testimonials-swiper', {
				loop: true,
				autoplay: { delay: 4000, disableOnInteraction: false },
				pagination: { el: '.testimonials-swiper .swiper-pagination', clickable: true },
			});
		}
	}

	// Scroll reveal for .reveal elements
	var revealItems = Array.prototype.slice.call(document.querySelectorAll('.reveal'));
	if ('IntersectionObserver' in window && revealItems.length) {
		var io = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('reveal-visible');
					io.unobserve(entry.target);
				}
			});
		}, { threshold: 0.2 });
		revealItems.forEach(function (el) { io.observe(el); });
	} else {
		revealItems.forEach(function (el) { el.classList.add('reveal-visible'); });
	}
});


