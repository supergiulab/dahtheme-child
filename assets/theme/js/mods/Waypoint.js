import "waypoints";

export default class Waypoint {

	constructor() {
		this.scrollAnimate();
	}

	scrollAnimate() {
		( function( $ ) {
			$('.is-animated').each(function(){
				$(this).waypoint(function(dir){
					let that = $('#' + this.element.id);
					var $animClass = that.attr("data-os-animation");
					if ( $animClass ) {
						that.toggleClass('animated').addClass($animClass);
					} else {
						if ( that.hasClass("ani-left") ) {
							that.toggleClass('animated').addClass('slideInLeft');
						} else if ( that.hasClass("ani-right") ) {
							that.toggleClass('animated').addClass('slideInRight');
						}
					}
				},
				{
					triggerOnce: true,
					offset: '90%'
				});
			});
		} )( jQuery );
	}

}