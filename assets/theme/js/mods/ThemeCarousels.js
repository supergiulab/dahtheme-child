import "owl.carousel";

export default class ThemeCarousels {

	constructor() {
		this.homeSlider();
		this.pressCarousel();
		this.galleryCarousel();
		this.featuredGalleryCarousel();
	}

	homeSlider() {
		(function($) {
			let slider   = $(".page-slider");
			let vertical = $(".v-slider");
			slider.owlCarousel({
				autoplay: true,
				animateOut: 'fadeOut',
				items: 1,
				smartSpeed: 450,
				dots: false
			});
			vertical.owlCarousel({
				autoWidth: true,
				autoplay: true,
				items: 1,
				dots: false,
			});
		})(jQuery);
	}

	pressCarousel() {
		(function($) {
			let press = $(".press-reviews");
			press.owlCarousel({
				loop: true,
				margin: 20,
				responsiveClass: true,
				nav: true,
				dots: false,
				responsive: {
					0 : {
						items: 1
					},
					768 : {
						items: 2
					},
					1200 : {
						items: 3
					}
				}
			});
		})(jQuery);
	}

	galleryCarousel() {
		(function($) {
			let gallery = $(".gallery-carousel").not(".gallery-featured");
			gallery.owlCarousel({
				loop: false,
				margin: 20,
				responsiveClass: true,
				nav: true,
				dots: true,
				responsive: {
					0 : {
						items: 1
					},
					768 : {
						items: 2
					},
					1200 : {
						items: 3
					}
				}
			});
		})(jQuery);
	}

	featuredGalleryCarousel() {
		(function($) {
			let gallery = $(".gallery-featured");
			gallery.owlCarousel({
				loop: false,
				margin: 20,
				responsiveClass: true,
				nav: true,
				dots: true,
				items: 1
			});
		})(jQuery);
	}

}