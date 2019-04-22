jQuery.noConflict();

(function ($) {
	$(document).ready(function () {
		$("#back-to-top").hide();
		/* removes text from search form on focus and replaces it on unfocus - if text is entered then it does not get replaced with default on unfocus */
		$('#SearchForm_SearchForm_action_results').val('L');
		let searchField = $('#SearchForm_SearchForm_Search');
		let default_value = searchField.val();
		searchField.focus(function () {
			$(this).addClass('active');
			if (searchField.val() == default_value) {
				searchField.val('');
			}
		});
		searchField.blur(function () {
			if (searchField.val() == '') {
				searchField.val(default_value);
			}
		});

		if (!$.browser.msie || ($.browser.msie && (parseInt($.browser.version, 10) > 8))) {
			let searchBarButton = $("span.search-dropdown-icon");
			let searchBar = $('div.search-bar');
			let menuButton = $("span.nav-open-button");
			let menu = $('.header .primary ul');
			let mobile = false;
			let changed = false;

			$('body').append('<div id="media-query-trigger"></div>');

			function menuWidthCheck() {
				let header_w = $('header .inner').width();
				let elements_w = menu.width() + $('.brand').width();

				if ((header_w < elements_w) || ($(window).width() <= 768)) {
					$('body').addClass('tablet-nav');
				}
				else {
					$('body').removeClass('tablet-nav');
				}

				mobile_old = mobile;
				if ($('#media-query-trigger').css('visibility') == 'hidden') {
					mobile = false;
				}
				else {
					mobile = true;
				}

				if (mobile_old != mobile) {
					changed = true;
				}
				else {
					changed = false;
				}
			}

			menuWidthCheck();

			$(window).resize(function () {
				menuWidthCheck();

				if (!mobile) {
					menu.show();
					searchBar.show();
				}
				else {
					if (changed) {
						menu.hide();
						searchBar.hide();
					}
				}
			});

			/* toggle navigation and search in mobile view */
			searchBarButton.click(function () {
				menu.slideUp();
				searchBar.slideToggle(200);
			});

			menuButton.click(function () {
				searchBar.slideUp();
				menu.slideToggle(200);
			});
		}

		/**************************************/
		/******** Custom Part *****************/
		/**************************************/

		// Flexslider

		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: false,
		});

		// Responsive Navigation

		$('#myTopnav').click(function () {
			console.log("funzt");
			if ($('#myTopnav').hasClass("responsive")) {
				$('#myTopnav').removeClass("responsive")
			} else {
				$('#myTopnav').addClass("responsive")
			}
		})

		// Back to top
		jQuery(function ($) {
			let offset = 500;
			let duration = 500;
			$(window).scroll(function () {
				if ($(this).scrollTop() > offset) {
					$('#back-to-top').fadeIn(duration);
				}
				else {
					$('#back-to-top').fadeOut(duration);
				}
			});
			$('#back-to-top').unbind('click.smoothscroll').bind('click', function (e) {
				e.preventDefault();
				$('html, body').animate({scrollTop: 0}, duration);
				return false;
			})
		});

		// Navbar background on scroll
		jQuery(function ($) {
			let offset = 200;
			$(window).scroll(function () {
				if ($(this).scrollTop() > offset) {
					$('#myTopnav').addClass("topnav-scrolled");
				}
				else {
					$('#myTopnav').removeClass("topnav-scrolled");
				}
			});
			e.preventDefault();
			return false;
		});

		// animate burger menu on click

		jQuery(function ($) {
			$("#burger").click(function () {
				$(this).toggleClass("change");
				$("nav#mobile-nav").toggleClass("main-navigation-hidden");
				$("nav#mobile-nav").toggleClass("main-navigation-visible");
			})
		});

		// show/hide sub-menu on click
		jQuery(function ($) {
			$("li.menu-item-has-children").click(function () {
				$(this).toggleClass("menu-item-active");
			});

			$("a.menu-link-with-children").click(function (event) {
				event.preventDefault();
			})
		})
	});

// ---------------------------------------------------------
// Use of jQuery.browser is frowned upon.
// More details: http://api.jquery.com/jQuery.browser
// jQuery.uaMatch maintained for back-compat

	jQuery.uaMatch = function (ua) {
		ua = ua.toLowerCase();

		let match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
			/(webkit)[ \/]([\w.]+)/.exec(ua) ||
			/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
			/(msie) ([\w.]+)/.exec(ua) ||
			ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) ||
			[];

		return {
			browser: match[1] || "",
			version: match[2] || "0"
		};
	};

	matched = jQuery.uaMatch(navigator.userAgent);
	browser = {};

	if (matched.browser) {
		browser[matched.browser] = true;
		browser.version = matched.version;
	}

	// Chrome is Webkit, but Webkit is also Safari.
	if (browser.chrome) {
		browser.webkit = true;
	} else if (browser.webkit) {
		browser.safari = true;
	}

	jQuery.browser = browser;

	jQuery.sub = function () {
		function jQuerySub(selector, context) {
			return new jQuerySub.fn.init(selector, context);
		}

		jQuery.extend(true, jQuerySub, this);
		jQuerySub.superclass = this;
		jQuerySub.fn = jQuerySub.prototype = this();
		jQuerySub.fn.constructor = jQuerySub;
		jQuerySub.sub = this.sub;
		jQuerySub.fn.init = function init(selector, context) {
			if (context && context instanceof jQuery && !(context instanceof jQuerySub)) {
				context = jQuerySub(context);
			}

			return jQuery.fn.init.call(this, selector, context, rootjQuerySub);
		};
		jQuerySub.fn.init.prototype = jQuerySub.fn;
		let rootjQuerySub = jQuerySub(document);
		return jQuerySub;
	};
// ---------------------------------------------------------

}(jQuery));
