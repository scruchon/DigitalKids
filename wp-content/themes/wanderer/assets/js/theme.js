/**
 *  Custom JS Scripts
 *
 * @package Wanderer
 */

var wandererApp = (function() {

	return {

		scrollAnimations: function() {

			var arrow = document.createElement('div');
			var featuredContent = document.getElementById('featured');
			var entryTitle = document.getElementById('title');

			arrow.className = "arrow-top";
			arrow.innerHTML = "<a data-scroll href=\"#top\"><svg version=\"1.1\" width=\"25\" height=\"25\" viewBox=\"0 0 32 32\"><g id=\"icomoon-ignore\"><line stroke-width=\"1\" stroke=\"#449FDB\"></line></g><path class=\"arrow\" d=\"M27.869 23.038c0.434 0.429 1.134 0.429 1.566 0 0.434-0.429 0.434-1.122 0-1.55l-12.653-12.528c-0.432-0.429-1.133-0.429-1.565 0l-12.653 12.528c-0.432 0.429-0.434 1.122 0 1.55s1.133 0.429 1.566 0l11.869-11.426 11.869 11.426z\" fill=\"#525252\"></path></svg></a>";

			document.body.appendChild(arrow);


			onscroll = function() {

				var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
				
				if (scrollTop > 200) {
					if (arrow.classList || sliderContent.classList || featuredContent.classList) {
						arrow.classList.add('js-arrow-show');
						featuredContent.classList.add('js-featured-content');
					} 
				} else {
					if (arrow.classList || sliderContent.classList || featuredContent.classList) {
						arrow.classList.remove('js-arrow-show');
						featuredContent.classList.remove('js-featured-content');
					}
				}

				if (scrollTop > 300) {
					if (entryTitle.classList) {
						entryTitle.classList.add('js-entry-title');
					} 
				} else {
					if (entryTitle.classList) {
						entryTitle.classList.remove('js-entry-title');
					}
				}
			};
		},

		owlCarousel: function() {
			jQuery("#owl").owlCarousel({
		      	items : 3,
		      	itemsDesktop: [1200,2],
		      	itemsTablet: [992,2],
		      	itemsMobile: [650, 1],
		      	navigation: true,
		      	navigationText: [
			      "<i class='icon-chevron-left icon-white'></i>",
			      "<i class='icon-chevron-right icon-white'></i>"
			    ]
	        });
		},

		smoothScroll: function() {
			smoothScroll.init({
			speed: 500,
			easing: 'easeInOutCubic',
			offset: 0,
			updateURL: true,
			callbackBefore: function ( toggle, anchor ) {},
			});
		},

		fluidVids: function() {
			fluidvids.init({
				selector: ['iframe'],
				players: ['www.youtube.com', 'player.vimeo.com']
			}); 
		}
	};

})(); // end wandererApp

( function() {

	/**
	* Initialize wandererApp Functions
	*/
	wandererApp.scrollAnimations();
	wandererApp.owlCarousel();
	wandererApp.smoothScroll();
	wandererApp.fluidVids();

})();