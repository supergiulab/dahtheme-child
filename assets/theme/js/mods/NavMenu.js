export default class NavMenu {

	constructor() {
		const _self = this;

		(function($) {
			let toggle = $("#nav-toggle");
			let menu   = $("#main-navigation");

			toggle.click(_self.toggleNavMenu);
		})(jQuery);
	}

	toggleNavMenu(e) {
		(function($) {
			let menu   = $("#main-navigation");
			let height = $(window).height();

			e.preventDefault();
			$(e.currentTarget).toggleClass("close");
			menu.toggleClass("show");

			if(menu.hasClass("show")) {
				$("body").css( "overflow" , "hidden" );
				menu.animate({ width : "100%", height : height });
			} else {
				$("body").css( "overflow-y" , "auto" );
				menu.animate({ width : 0, height : 0 })
			}
		})(jQuery);
	}

}