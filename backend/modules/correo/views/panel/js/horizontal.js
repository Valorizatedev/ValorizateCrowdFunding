jQuery(function($){
	'use strict';

	// -------------------------------------------------------------
	//   Cycle By Pages
	// -------------------------------------------------------------
	(function () {
		var $frame = $('#cyclepages');
		var $wrap  = $frame.parent();

		// Call Sly on frame
		$frame.sly({
			horizontal: 1,
			itemNav: 'basic',
			smart: 1,
			activateOn: 'click',
			mouseDragging: 1,
			touchDragging: 1,
			releaseSwing: 1,
			startAt: 0,
			scrollBar: $wrap.find('.scrollbar'),
			scrollBy: 1,
			pagesBar: $wrap.find('.pages'),
			activatePageOn: 'click',
			speed: 300,
			elasticBounds: 1,
			easing: 'easeOutExpo',
			dragHandle: 1,
			dynamicHandle: 1,
			clickBar: 1,

			// Cycling
			cycleBy: 'pages',
			cycleInterval: 1000,
			pauseOnHover: 1,
			startPaused: 1,

			// Buttons
			prevPage: $wrap.find('.prevPage'),
			nextPage: $wrap.find('.nextPage')
		});

		// Pause button
		$wrap.find('.pause').on('click', function () {
			$frame.sly('pause');
		});

		// Resume button
		$wrap.find('.resume').on('click', function () {
			$frame.sly('resume');
		});

		// Toggle button
		$wrap.find('.toggle').on('click', function () {
			$frame.sly('toggle');
		});
	}());


});