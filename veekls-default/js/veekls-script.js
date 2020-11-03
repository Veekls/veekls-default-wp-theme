/**
 * Theme main script.
 *
 * @package Veekls
 */

// Run when the DOM ready.
jQuery(function ($) {
	'use strict';

	var clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';
	var $window = $(window);
	var $body = $('body');

	/**
	 * Scroll to top
	 */
	function scrollToTop () {
		var $button = $('.scroll-to-top');

		$window.scroll(function () {
			$button[$window.scrollTop() > 100 ? 'removeClass' : 'addClass']('hidden');
		});

		$button.on('click', function (e) {
			e.preventDefault();

			$('body, html').animate({
				scrollTop: 0
			}, 500);
		});
	}

	function toggleMobileMenu () {
		var transitionEnd = 'transitionend webkitTransitionEnd otransitionend MSTransitionEnd';
		var clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click';
		var mobileClass = 'mobile-menu-open';
		var $body = $('body');

		// Click to show mobile menu.
		$('.menu-toggle').on(clickEvent, function (event) {
			event.preventDefault();
			event.stopPropagation(); // Do not trigger click event on '.wrapper' below.

			if ($body.hasClass(mobileClass)) {
				return;
			}

			$body.addClass(mobileClass);
		});

		// When mobile menu is open, click on page content will close it.
		$('.site').on(clickEvent, function (event) {
			if (!$body.hasClass(mobileClass)) {
				return;
			}

			event.preventDefault();

			$body.removeClass(mobileClass).addClass('animating');
		}).on(transitionEnd, function () {
			$body.removeClass('animating');
		});
	}

	/**
	 * Add toggle dropdown icon for mobile menu.
	 *
	 * @param $container
	 */
	function initMobileNavigation ($container) {
		// Add dropdown toggle that displays child menu items.
		var $dropdownToggle = $('<i class="dropdown-toggle icofont icofont-rounded-down"></i>');

		$container.find('.menu-item-has-children > a').after($dropdownToggle);

		// Toggle buttons and sub menu items with active children menu items.
		$container.find('.current-menu-ancestor > .sub-menu').show();
		$container.find('.current-menu-ancestor > .dropdown-toggle').addClass('toggled-on');
		$container.on(clickEvent, '.dropdown-toggle', function (e) {
			e.preventDefault();

			$(this).toggleClass('toggled-on');
			$(this).next('ul').toggle();
		});
	}

	$window.on('resize', function () {
		if ($window.width() > 992) {
			$body.removeClass('mobile-menu-open');
		}
	});

	/**
	 * Move tag html in search form.
	 */
	function moveTagSearchForm () {
		$('.search-content .odometer').prependTo('.search-content .area-wrap');
		$('.search-content .condition-wrap').prependTo('#veekls-search');
		$('.search-content .search-form__title').prependTo('#veekls-search');
	}

	/**
	 * Homepage featured content slider.
	 */
	function initFeaturedContentSlider () {
		var $slider = $('.featured-post__content.slider');
		var $sliderSpeed = $slider.data('speed');

		$('.featured-posts').removeClass('is-hidden');

		$slider.slick({
			speed: 1000,
			autoplay: true,
			autoplaySpeed: $sliderSpeed,
			arrows: true,
			fade: true,
			dots: false,
			nextArrow: '',
			prevArrow: '',
			pauseOnHover: false,
			cssEase: 'linear',
			adaptiveHeight: false
		});

		if ($sliderSpeed == 0) {
			$slider.slick('pause');
			$slider.find($('.slick-arrow')).hide();
		}
	}

	/**
	 * Search box
	 */
	function veeklsSearchBox () {
		$('#veekls-search select').SumoSelect();

		$('.veekls-search').on('click', 'a.refine', function (e) {
			$('.extras-wrap').slideToggle(200);
			$(this).toggleClass('shown');
		});
	}

	/**
	 * ================================= FUNCTIONS =======================================
	 */

	/**
	 * Ordering
	 */
	function veeklsOrdering () {
		$('.veekls-ordering select.orderby').SumoSelect();
		$('.veekls-ordering').on('change', 'select.orderby', function () {
			$(this).closest('form').submit();
		});
	}

	/**
	 * View switcher
	 */
	function veeklsViewSwitcher () {
		$('.veekls-view-switcher div').click(function () {
			var view = $(this).attr('id');

			set_cookie(view);
			switch_view(view);
		});

		if (!get_cookie('view') || get_cookie('view') === 'grid') {
			switch_view('grid');
		} else {
			switch_view('list');
		}

		function switch_view (to) {
			var from = (to == 'list') ? 'grid' : 'list';
			var $listings = $('.veekls-items li');

			$.each($listings, function (index, listing) {
				$('.veekls-items').removeClass(from + '-view');
				$('.veekls-items').addClass(to + '-view');
			});
		}

		function set_cookie (value) {
			var days = 30; // set cookie duration

			if (days) {
				var date = new Date();

				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));

				var expires = "; expires=" + date.toGMTString();
			} else {
				var expires = "";
			}

			document.cookie = "view=" + value + expires + "; path=/";
		}

		function get_cookie (name) {
			var value = "; " + document.cookie;
			var parts = value.split("; " + name + "=");

			if (parts.length == 2) {
				return parts.pop().split(";").shift();
			}
		}
	}

	/**
	 * Slider
	 */
	function veeklsSlider () {
		if ($("#image-gallery").length < 1) {
			return;
		}

		var $gallery = $('#image-gallery');

		$gallery.lightSlider({
			auto: $gallery.data().hasOwnProperty('mode') ? Boolean($gallery.data('mode')) : true,
			speed: parseInt($gallery.data('slide-duration')) || 1000,
			thumbItem: parseInt($gallery.data('thumbs-shown')) || 4,
			pause: parseInt($gallery.data('slide-delay')) || 3000,
			mode: $gallery.data('mode') || 'slide',

			nextHtml: '<i class="fas fa-angle-right"></i>',
			prevHtml: '<i class="fas fa-angle-left"></i>',
			currentPagerPosition: 'left',
			addClass: 'listing-gallery',
			galleryMargin: 10,
			enableDrag: false,
			autoWidth: false,
			thumbMargin: 10,
			slideMargin: 0,
			controls: true,
			gallery: true,
			pager: true,
			loop: true,
			item: 1,

			onSliderLoad: function (el) {
				el.lightGallery({
					selector: '#image-gallery .lslide'
				});
			}
		});
	}

	/**
	 * Tabs
	 */
	function veeklsTabs () {
		$('body').on('init', '.al-tabs-wrapper, .veekls-tabs', function () {
			$('.al-tab, .veekls-tabs .panel:not(.panel .panel)').hide();

			var $tabs = $(this).find('.al-tabs, ul.tabs').first();

			$tabs.find('li:first a').click();

			// show reset password tab
			if ($('.al-tab').hasClass('resetpass')) {
				$tabs.find('li:last a').click();
			}
		}).on('click', '.al-tabs li a, ul.tabs li a', function (e) {
			e.preventDefault();

			var $tab = $(this);
			var $tabs_wrapper = $tab.closest('.al-tabs-wrapper, .veekls-tabs');
			var $tabs = $tabs_wrapper.find('.al-tabs, ul.tabs');

			$tabs.find('li').removeClass('active');
			$tabs_wrapper.find('.al-tab, .panel:not(.panel .panel)').hide();

			$tab.closest('li').addClass('active');
			$tabs_wrapper.find($tab.attr('href')).show();
		});

		$('.al-tabs-wrapper, .veekls-tabs').trigger('init');
	}

	scrollToTop();
	toggleMobileMenu();
	initMobileNavigation($('.mobile-menu'));
	moveTagSearchForm();

	if ($('body').hasClass('home')) {
		initFeaturedContentSlider();
		veeklsViewSwitcher();
		veeklsOrdering();
	}

	if ($('body').hasClass('archive')) {
		veeklsViewSwitcher();
		veeklsOrdering();
	}

	if ($('body').hasClass('page-template-page-vehicle')) {
		veeklsSlider();
	}

	if ($('.veekls-search').length > 0) {
		veeklsSearchBox();
	}

	veeklsTabs();
});
