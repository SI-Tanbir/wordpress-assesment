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
	}
});


