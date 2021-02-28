;(function(window, document, $)
{
	"use strict";

	/**
	 * List of functions required to enable template effects/hacks
	 * @var array
	 */
	const templateSetup = [];

	// Document initial setup
	jQuery(document).ready(function ()
	{
		$('body').addClass('has-js');

		/*------------------------------------------*/

		$.cookieBar({
			wrapper: '#top',
			style: 'top',
			privacy: 'bs_modal',
			privacyContent: '#privacyModal'
		});

		if($.cookieBar('getCookie', 'hyperCube') !== 'accepted')
		{
			$('#top, #bottom, #right, #left, #main-wrapper').block({ message: null });
			$('#sensorCookie').toggleClass("badge-success badge-dark");
		}
		else
		{
			$.profile.start();

			HyperCube.getCookie();

			// Template setup
			jQuery(document.body).applyTemplateSetup();

			$.profile.done();
		}

		/*------------------------------------------*/
	});

	/*
	 * Add a new template function
	 * @param function func the function to be called on a jQuery object
	 * @param boolean prioritary set to true to call the function before all others (optional)
	 * @return void
	 */
	$.fn.addTemplateSetup = function (func, prioritary)
	{
		if (prioritary)
		{
			templateSetup.unshift(func);
		}
		else
		{
			templateSetup.push(func);
		}
	};

	/*
	 * Call every template function over a jQuery object (for instance : $('body').applyTemplateSetup())
	 * @return void
	 */
	$.fn.applyTemplateSetup = function ()
	{
		const max = templateSetup.length;
		for (var i = 0; i < max; ++i)
		{
			templateSetup[i].apply(this);
		}
	};

	/* Common (mobile and standard) template setup */
	$.fn.addTemplateSetup(function ()
	{
		/*--------------------------------------------------------------------------*/

		HyperCube.initiateHyperCube();

		HyperCube.moveCards();

		/*----------------------------------------------------*/

		// Initialize plugins
		this.find("#topMenu").topMenu();

		this.find('#slide-menu').slinky();

		this.find("#side-menu").metisMenu({
			collapseClass: 'collapse',
			collapseInClass: 'in',
			collapsingClass: 'collapsing',
			preventDefault: false,
			toggle: true
		});

		/* -------------------
           List item active
           -------------------*/
		/*
		$('ul#side-menu li').on('click', function() {
			$("ul#side-menu li.active").removeClass("active");
			$("ul#side-menu a.active").removeClass("active");
			$(this).addClass('active');
		});
		*/

		this.find("ul#side-menu a").each(function()
		{
			this.href === window.location.href && ($(this).addClass("active"),
				$(this).parent().addClass("active"),
				$(this).parent().parent().addClass("in"),
				$(this).parent().parent().prev().addClass("active"),
				$(this).parent().parent().parent().addClass("active"),
				$(this).parent().parent().parent().parent().addClass("in"),
				$(this).parent().parent().parent().parent().parent().addClass("active"))
		});

		this.find('#newsWidget').easyTicker({
			direction: 'up',
			visible: 2,
			interval: 8000,
			easing: 'easeOutQuad'
		});

		this.find(".counter-value").each(function ()
		{
			$(this).prop("Counter", 0).animate({
				Counter: $(this).text()
			}, {
				duration: 3500,
				easing: "swing",
				step: function (now)
				{
					$(this).text(Math.ceil(now));
				}
			});
		});

		this.find('#right-slideShow').cycle({
			timeout: 10000,
			caption: "#galleryCaption",
			captionTemplate: '{{alt}}',
			pauseOnHover: true
		});

		/*----------------------------------------------------*/

		const backToTop = '[data-hyperCube="backToTop"]';
		const sLangSi = '[data-hyperCube="languageSi"]';
		const sLangDe = '[data-hyperCube="languageDe"]';
		const sLangEn = '[data-hyperCube="languageEn"]';
		const sLangRu = '[data-hyperCube="languageRu"]';

		const linkContact = '[data-hyperCube="linkContact"]';
		const linkDeveloper = '[data-hyperCube="linkDeveloper"]';
		
		/*----------------------------------------------------*/

		this.find(backToTop).on("click touchstart", function (e)
		{
			HyperCube.scrollUp();
			$("#scrollProgress").css({"width": 0});

			e.preventDefault();
		});

		this.find(sLangSi).on("click touchstart", function (e)
		{
			HyperCube.setLanguage('si');

			e.preventDefault();
		});

		this.find(sLangRu).on("click touchstart", function (e)
		{
			HyperCube.setLanguage('ru');

			e.preventDefault();
		});

		this.find(sLangDe).on("click touchstart", function (e)
		{
			HyperCube.setLanguage('de');

			e.preventDefault();
		});

		this.find(sLangEn).on("click touchstart", function (e)
		{
			HyperCube.setLanguage('en');

			e.preventDefault();
		});

		this.find(linkContact).on("click touchstart", function (e)
		{
			HyperCube.toggleFooterContact();

			e.preventDefault();
		});

		this.find(linkDeveloper).on("click touchstart", function (e)
		{
			window.location.href='https://www.mcx-systems.net';

			e.preventDefault();
		});
		
		/*----------------------------------------------------*/
		
		this.find("#bottom").on("click touchstart", function (e)
		{
			HyperCube.secretSensorClicks();

			e.preventDefault();
		});

		this.find("#top").on("click touchstart", function (e)
		{
			HyperCube.secretPrimaryClicks();

			e.preventDefault();
		});

		this.find(".toggler").on("click touchstart", function (e)
		{
			HyperCube.toggleLeftSideBar();

			e.preventDefault();
		});

		/* ===== Open-Close Right Sidebar ===== */
		this.find("#right-side-toggle").on("click touchstart", function (e)
		{
			HyperCube.toggleRightSideBar();

			e.preventDefault();
		});

		// Mobile
		this.find(".navbar-toggler").on("click touchstart", function (e)
		{
			HyperCube.toggleMobile();

			e.preventDefault();
		});

		this.find("#switch-topMenu").on("click touchstart", function (e)
		{
			HyperCube.toggleTopBar();

			e.preventDefault();
		});

		this.find("#autoButton1").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('automation');

			e.preventDefault();
		});

		this.find("#autoButton2").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('appliances');

			e.preventDefault();
		});

		this.find("#autoButton3").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('surveillance');

			e.preventDefault();
		});

		this.find("#autoButton4").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('air');

			e.preventDefault();
		});

		this.find("#autoButton5").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('control');

			e.preventDefault();
		});

		this.find("#autoButton6").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('water');

			e.preventDefault();
		});

		this.find("#autoButton7").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('electricity');

			e.preventDefault();
		});

		this.find("#autoButton8").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('thermostat');

			e.preventDefault();
		});

		this.find("#autoButton9").on("click touchstart", function (e)
		{
			HyperCube.automationAccessMenu('lights');

			e.preventDefault();
		});

		if (this.find("#topMenu").hasClass("hidden-menu") && HyperCube.getCookie.topMenu)
		{
			$("#breadcrumb").toggle("slow");
			$("#topMenu").toggle("slow").removeClass("hidden-menu");
		}

		// Header search bar functionality
		this.find(".search-item a, .search-item .app-search .btn").on("click touchstart", function ()
		{
			$(".app-search").toggle(200);
		});

		this.find('.widget-file-manager-content-view-control').on('click touchstart', function ()
		{
			$('.widget-file-manager-content-view-control').removeClass('is-active');

			var view = $(this).data('view');

			if (view === 'grid')
			{
				$('.widget-file-manager-content-body').removeClass('widget-file-manager-content-compact-mode');
			}
			else if (view === 'list')
			{
				$('.widget-file-manager-content-body').addClass('widget-file-manager-content-compact-mode');
			}

			$(this).addClass('is-active');

			return false;
		});
		
		// Open
		this.find(".dropdown-fade, .btn-group-fade").on("show.bs.dropdown",
			function ()
			{
				$(this).find(".dropdown-menu").fadeIn(250);
			});

		// Close
		this.find(".dropdown-fade, .btn-group-fade").on("hide.bs.dropdown",
			function ()
			{
				$(this).find(".dropdown-menu").fadeOut(250);
			});

		this.find("#table-toolbar").find("select").change(function ()
		{
			$(".table").bootstrapTable("destroy").bootstrapTable({
				exportDataType: $(this).val()
			});
		});

		//-----------------------------------------//
		// Card Toolbar
		//-----------------------------------------//

		// Hide if collapsed by default
		this.find('.card-collapsed').children('.card-header').nextAll().hide();

		// Rotate icon if collapsed by default
		this.find('.card-collapsed').find('.fa-chevron-down').addClass('fa-rotate-180');

		// Collapse on click
		this.find('.card [data-action=collapse]').on("click touchstart", function (e)
		{
			e.preventDefault();

			var $cardCollapse = $(this).parent().parent().parent().parent().nextAll();
			$(this).parents('.card').toggleClass('card-collapsed');
			$(this).find(".fa-chevron-down").toggleClass('fa-rotate-180');

			$cardCollapse.slideToggle(150);
		});

		// Expand on click
		this.find('.card [data-action=expand]').on("click touchstart", function (e)
		{
			e.preventDefault();
/*
			var cardClose = $(this).parent().parent().parent().parent().parent();

			$(this).parent().parent().parent().parent().parent().toggleClass('card-fullScreen');
			$(this).closest('.card').find('[data-action="expand"] i').toggleClass('fa-expand-arrows-alt fa-compress');*/

		});

		// Close on click
		this.find('.card [data-action=close]').click(function (e)
		{
			e.preventDefault();
			
			var $cardClose = $(this).parent().parent().parent().parent().parent();
			$cardClose.slideUp(150, function()
			{
				$(this).remove();
			});
		});

		// Reload on click
		this.find('.card [data-action=reload]').click(function (e)
		{
			e.preventDefault();

			var block = $(this).parent().parent().parent().parent().parent();
			$(block).block({
				message: '<div class="sk-cube-grid">' +
				'<div class="sk-cube sk-cube1"></div>' +
				'<div class="sk-cube sk-cube2"></div>' +
				'<div class="sk-cube sk-cube3"></div>' +
				'<div class="sk-cube sk-cube4"></div>' +
				'<div class="sk-cube sk-cube5"></div>' +
				'<div class="sk-cube sk-cube6"></div>' +
				'<div class="sk-cube sk-cube7"></div>' +
				'<div class="sk-cube sk-cube8"></div>' +
				'<div class="sk-cube sk-cube9"></div>' +
				'</div>',
				overlayCSS: {
					backgroundColor: '#000',
					opacity: 0.8,
					cursor: "wait",
					'box-shadow': "0 0 0 1px #ddd"
				},
				css: {
					border: 0,
					padding: 0,
					backgroundColor: 'none'
				}
			});

			// For demo purposes
			setTimeout(function ()
			{
				$(block).unblock();
			}, 2000);
		});

		/* Some media player controls*/
		this.find("#videoMute").on("click touchstart", function (e)
		{
			HyperCube.muteSound();

			e.preventDefault();
		});

		this.find("#videoUnMute").on("click touchstart", function (e)
		{
			HyperCube.unMuteSound();

			e.preventDefault();
		});

		this.find("#videoDownload").on("click touchstart", function (e)
		{
			HyperCube.downloadVideo();

			e.preventDefault();
		});

		/*-------------------------------------------------------------------------------------------------------*/

		const effect = ["fadeIn"];
		var effectToUse = effect[Math.floor(Math.random() * effect.length)];
		this.find("#main-wrapper").animo({animation: effectToUse, duration: 2, keep: true});

		this.find(".lorem-one").Lorem({"length": "one"});
		this.find(".lorem-two").Lorem({"length": "two"});
		this.find(".lorem-three").Lorem({"length": "three"});
		this.find(".lorem-full").Lorem({"length": "full"});

		if (this.find('[data-toggle="tooltip"]').length !== 0)
		{
			/* ===== Tooltip Initialization ===== */
			this.find('[data-toggle="tooltip"]').tooltip({
				animation: false
			});
		}

		if (this.find('[data-toggle="popover"]').length !== 0)
		{
			/* ===== Popover Initialization ===== */
			this.find('[data-toggle="popover"]').popover({
				container: 'body',
				animation: false
			});
		}

		this.find(".textLimiter").maxlength({
			alwaysShow: false,
			threshold: 10,
			warningClass: "badge badge-info",
			limitReachedClass: "badge badge-danger",
			placement: "bottom-right-inside",
			message: "used %charsTyped% of %charsTotal% chars."
		});

		this.find('[data-plugin="knob"]').knob();
		this.find('.select2').select2();
		
		// Inhibits null links
		this.find("a[href=\"#\"]").on('click touchstart', function(e)
		{
			e.preventDefault();
		});

		if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
		{
			$(".main-scroller").css("overflow-x", "scroll");
			$(".slim-scroll-sidebarL").css("overflow-x", "scroll");
			$(".slim-scroll-sidebarR").css("overflow-x", "scroll");
			$(".vjs-playlist-item-list").css("overflow-x", "scroll");
		}
		else
		{
			this.find(".main-scroller").slimScroll({
				height: "100%",
				position: "right",
				size: '6px',
				wheelStep: 2,
				touchScrollStep : 100,
				color: "#f90"
			}).bind('slimscrolling', function(e, pos)
			{
				var scrollPercent = pos * 100;
				$("#scrollProgress").css({"width": scrollPercent + "%"});
			});

			this.find(".slim-scroll-sidebarL").slimScroll({
				height: "100%",
				position: "right",
				size: "0px",
				wheelStep: 1,
				touchScrollStep : 100,
				color: "#f90"
			});

			this.find(".slim-scroll-sidebarR").slimScroll({
				height: "100%",
				position: "right",
				size: "0px",
				wheelStep: 1,
				touchScrollStep : 100,
				color: "#f90"
			});

			this.find(".vjs-playlist-item-list").slimScroll({
				height: "100%",
				position: "right",
				size: "4px",
				wheelStep: 1,
				touchScrollStep : 100,
				color: "#f90"
			});

			this.find(".widget-file-manager-scroll").slimScroll({
				height: "100%",
				position: "right",
				size: "4px",
				wheelStep: 1,
				touchScrollStep : 100,
				color: "#f90"
			});

			this.find(".vjs-playlist-handle").change(function ()
			{
				if ($(this).is(":checked"))
				{
					$(".vjs-playlist-item-list").slimScroll({
						height: "100%",
						position: "right",
						size: "6px",
						wheelStep: 1,
						touchScrollStep : 100,
						color: "#f90"
					});
				}
				else
				{
					var $elem = $(".vjs-playlist-item-list"),
						events = $._data($elem[0], "events");

					$elem.slimScroll({
						destroy: true
					});

					if (events)
					{
						$._removeData($elem[0], "events");
					}
				}
			});
		}

		const pwOptions = {};
		pwOptions.ui = {
			bootstrap4: true,
			container: "#pwd-container",
			showStatus: false,
			showProgressBar: true,
			viewports: {
				progress: ".pwstrength_viewport_progress"
			},
			showVerdictsInsideProgressBar: true
		};
		pwOptions.common = {
			debug: true,
			onLoad: function ()
			{
			}
		};

		this.find(":password, #GeneratedPassword").pwstrength(pwOptions);

		this.find('#sensorCookie').toggleClass("badge-dark badge-success");

		this.find("#passwordGenerate").on("click touchstart", function (e)
		{
			$("#GeneratedPassword").passy("generate", 8);

			e.preventDefault();
		});

		/*-------------------------------------------------------------------------------------------------*/

		/* Modal Animations */
		this.find("#register").on("click touchstart", function (e)
		{
			$("#RegistrationModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		this.find("#login").on("click touchstart", function (e)
		{
			$("#LogInModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		this.find("#contact").on("click touchstart", function (e)
		{
			$("#ContactModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		this.find("#payment").on("click touchstart", function (e)
		{
			$("#PaymentModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		this.find("#review").on("click touchstart", function (e)
		{
			$("#ReviewModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		this.find("#subscribe").on("click touchstart", function (e)
		{
			$("#SubscribeModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		this.find("#forgot").on("click touchstart", function (e)
		{
			$("#ForgotModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		this.find("#reset").on("click touchstart", function (e)
		{
			$("#ResetModal").animo({animation: "zoomIn", duration: 0.8, keep: false});

			e.preventDefault();
		});

		/*-------------------------------------------------------------------------------------*/

		if(this.find("#Setting1").is(':checked'))
		{
			notifications = true;
		}

		if(this.find("#Setting2").is(':checked'))
		{
			$("#chatSetting").toggleClass("collapse");
			$("#chatSidebar").toggleClass("collapse");
		}

		if(this.find("#Setting3").is(':checked'))
		{
			if(!weather_api_key)
			{
				if (notifications)
				{
					HyperCube.showHyperCubeMessage('No api key set. Get one from <a href="https://openweathermap.org/">Open Weather</a>', 'error', true);
				}
				console.info("No api key set.");
				$("#Setting3").prop("checked", false);

				return;
			}
			$("#right-banner").toggleClass("collapse");
			$("#weather-section").toggleClass("collapse");
			HyperCube.showWeatherWidget();
		}

		if(this.find("#Setting4").is(':checked'))
		{
			$("#newsSetting").toggleClass("collapse");
			$("#newsSidebar").toggleClass("collapse");
		}

		if(this.find("#Setting5").is(':checked'))
		{
			$("#right-banner").toggleClass("collapse");
			$("#fm-radio").toggleClass("collapse");
			HyperCube.showRadioWidget();
		}

		if(this.find("#Setting6").is(':checked'))
		{
			HyperCube.showProfilerWidget();
		}

		/*-----------------------*/

		this.find("#Setting1").change(function()
		{
			var cookieData = HyperCube.getCookie();
			if($(this).is(':checked'))
			{
				notifications = true;
				HyperCube.showHyperCubeMessage("Site wide notifications are <b>ENABLED</b>.", "info", true);

				cookieData.setting1 = true;
				HyperCube.updateSiteCookie(cookieData);
			}
			else
			{
				cookieData.setting1 = false;
				HyperCube.updateSiteCookie(cookieData);
				notifications = false;
				HyperCube.showHyperCubeMessage("Site wide notifications are <b>DISABLED</b>.", "info", true);
			}
		});

		this.find("#Setting2").change(function()
		{
			var cookieData = HyperCube.getCookie();
			if($(this).is(':checked'))
			{
				$("#chatSetting").toggleClass("collapse");
				$("#chatSidebar").toggleClass("collapse");
				
				cookieData.setting2 = true;
				HyperCube.updateSiteCookie(cookieData);
			}
			else
			{
				$("#chatSidebar").toggleClass("collapse");
				$("#chatSetting").toggleClass("collapse");

				cookieData.setting2 = false;
				HyperCube.updateSiteCookie(cookieData);
			}
		});

		this.find("#Setting3").change(function()
		{
			var cookieData = HyperCube.getCookie();
			if($(this).is(':checked'))
			{
				if(!weather_api_key)
				{
					if (notifications)
					{
						HyperCube.showHyperCubeMessage('No api key set. Get one from <a href="https://openweathermap.org/">Open Weather</a>', 'error', true);
					}
                    window.console.error("No weather api key set.");
					$("#Setting3").prop("checked", false);
					
					cookieData.setting3 = false;
					HyperCube.updateSiteCookie(cookieData);

					return;
				}

				var isVisible = $("#fm-radio");
				if(isVisible.is(":visible"))
				{
					HyperCube.disposeRadioWidget();
					isVisible.toggleClass("collapse");
				}
				else
				{
					$("#right-banner").toggleClass("collapse");
				}

				$("#weather-section").toggleClass("collapse");
				$("#Setting5").prop("checked", false);

				HyperCube.showWeatherWidget();

				cookieData.setting5 = false;
				cookieData.setting3 = true;
				HyperCube.updateSiteCookie(cookieData);
			}
			else
			{
				$("#right-banner").toggleClass("collapse");
				$("#weather-section").toggleClass("collapse");
				$('#sensorWeather').toggleClass("badge-success badge-dark");
				
				cookieData.setting3 = false;
				HyperCube.updateSiteCookie(cookieData);
			}
		});

		this.find("#Setting4").change(function()
		{
			var cookieData = HyperCube.getCookie();
			if($(this).prop('checked'))
			{
				$("#newsSetting").toggleClass("collapse");
				$("#newsSidebar").toggleClass("collapse");

				cookieData.setting4 = true;
				HyperCube.updateSiteCookie(cookieData);
			}
			else
			{
				$("#newsSidebar").toggleClass("collapse");
				$("#newsSetting").toggleClass("collapse");

				cookieData.setting4 = false;
				HyperCube.updateSiteCookie(cookieData);
			}
		});

		this.find("#Setting5").change(function()
		{
			var cookieData = HyperCube.getCookie();
			if($(this).prop('checked'))
			{
				var isVisible = $("#weather-section");
				if(isVisible.is(":visible"))
				{
					isVisible.toggleClass("collapse");
				}
				else
				{
					$("#right-banner").toggleClass("collapse");
				}
				$("#Setting3").prop("checked", false);
				$("#fm-radio").toggleClass("collapse");

				HyperCube.showRadioWidget();
				
				cookieData.setting3 = false;
				cookieData.setting5 = true;
				HyperCube.updateSiteCookie(cookieData);
			}
			else
			{
				HyperCube.disposeRadioWidget();
				$("#right-banner").toggleClass("collapse");
				$("#fm-radio").toggleClass("collapse");

				cookieData.setting5 = false;
				HyperCube.updateSiteCookie(cookieData);
			}
		});

		this.find("#Setting6").change(function()
		{
			var cookieData;
			if($(this).prop('checked'))
			{
				HyperCube.showProfilerWidget();

				cookieData = HyperCube.getCookie();
				cookieData.setting6 = true;
				HyperCube.updateSiteCookie(cookieData);
			}
			else
			{
				HyperCube.hideProfilerWidget();

				cookieData = HyperCube.getCookie();
				cookieData.setting6 = false;
				HyperCube.updateSiteCookie(cookieData);
			}
		});

		var widgetHeartRateMaleChartDom = document.getElementById("widget-male-chart");
		if (widgetHeartRateMaleChartDom) {
			var widgetHeartRateMaleChart = window.echarts.init(widgetHeartRateMaleChartDom);
			var widgetHeartRateMaleChartOptions = {
				title: null,
				legend: null,
				toolbox: null,
				tooltip: {
					show: false
				},
				grid: {
					left: 0,
					right: 0,
					bottom: 0,
					top: 0
				},
				label: false,
				xAxis: {
					type: 'category',
					show: false,
					boundaryGap: false,
					data : [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44]
				},
				yAxis: {
					type: 'value',
					show: false
				},
				series: [
					{
						type:'line',
						showSymbol: false,
						lineStyle: {
							normal: {
								color: '#38c5d8',
								width: 3
							}
						},
						data:[0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,0]
					}
				]
			};
			widgetHeartRateMaleChart.setOption(widgetHeartRateMaleChartOptions, true);
		}

		var widgetHeartRateFemaleChartDom = document.getElementById("widget-female-chart");
		if (widgetHeartRateFemaleChartDom) {
			var widgetHeartRateFemaleChart = window.echarts.init(widgetHeartRateFemaleChartDom);
			var widgetHeartRateFemaleChartOptions = {
				title: null,
				legend: null,
				toolbox: null,
				tooltip: {
					show: false
				},
				grid: {
					left: 0,
					right: 0,
					bottom: 0,
					top: 0
				},
				label: false,
				xAxis: {
					type: 'category',
					show: false,
					boundaryGap: false,
					data : [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44]
				},
				yAxis: {
					type: 'value',
					show: false
				},
				series: [
					{
						type:'line',
						showSymbol: false,
						lineStyle: {
							normal: {
								color: '#fe6f60',
								width: 3
							}
						},
						data:[0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,0]
					}
				]
			};
			widgetHeartRateFemaleChart.setOption(widgetHeartRateFemaleChartOptions, true);
		}

		var widgetHeartRateBloodPressureChartDom = document.getElementById("widget-blood-pressure-chart");
		if (widgetHeartRateBloodPressureChartDom) {
			var widgetHeartRateBloodPressureChart = window.echarts.init(widgetHeartRateBloodPressureChartDom);
			var widgetHeartRateBloodPressureChartOptions = {
				title: null,
				legend: null,
				toolbox: null,
				tooltip: {
					show: false
				},
				grid: {
					left: 0,
					right: 0,
					bottom: 0,
					top: 0
				},
				label: false,
				xAxis: {
					type: 'category',
					show: false,
					boundaryGap: false,
					data : [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44]
				},
				yAxis: {
					type: 'value',
					show: false
				},
				series: [
					{
						type:'line',
						showSymbol: false,
						lineStyle: {
							normal: {
								color: '#ffaf50',
								width: 3
							}
						},
						data:[0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,14,0,0,-50,74,-34,0,0,24,0,0,0,0,0]
					}
				]
			};
			widgetHeartRateBloodPressureChart.setOption(widgetHeartRateBloodPressureChartOptions, true);
		}

		var widgetTemperatureLeftSideChartDom = document.getElementById("widget-temperature-left-side-chart");
		if (widgetTemperatureLeftSideChartDom) {
			var widgetTemperatureLeftSideChart = window.echarts.init(widgetTemperatureLeftSideChartDom);
			var widgetTemperatureLeftSideChartOptions = {
				title: null,
				legend: null,
				toolbox: null,
				tooltip: {
					show: false
				},
				grid: {
					left: 0,
					right: 0,
					bottom: 0,
					top: 0
				},
				label: false,
				xAxis: {
					type: 'category',
					show: false,
					boundaryGap: false,
					data : [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]
				},
				yAxis: {
					type: 'value',
					show: false
				},
				series: [
					{
						type:'line',
						showSymbol: false,
						lineStyle: {
							normal: {
								color: '#4F9BF3',
								width: 3
							}
						},
						data:[0,0,0,0,14,0,0,-50,84,-34,0,0,24,0,0,0,0,14,0,0,0,0, 12]
					}
				]
			};
			widgetTemperatureLeftSideChart.setOption(widgetTemperatureLeftSideChartOptions, true);
		}

		var widgetTemperatureRightSideChartDom = document.getElementById("widget-temperature-right-side-chart");
		if (widgetTemperatureRightSideChartDom) {
			var widgetTemperatureRightSideChart = window.echarts.init(widgetTemperatureRightSideChartDom);
			var widgetTemperatureRightSideChartOptions = {
				title: null,
				legend: null,
				toolbox: null,
				tooltip: {
					show: false
				},
				grid: {
					left: 0,
					right: 0,
					bottom: 0,
					top: 0
				},
				label: false,
				xAxis: {
					type: 'category',
					show: false,
					boundaryGap: false,
					data : [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]
				},
				yAxis: {
					type: 'value',
					show: false
				},
				series: [
					{
						type:'line',
						showSymbol: false,
						lineStyle: {
							normal: {
								color: '#F145B5',
								width: 3
							}
						},
						data:[0,0,0,0,14,0,0,-50,84,-34,0,0,24,0,0,0,0,14,0,0,0,0, 12]
					}
				]
			};
			widgetTemperatureRightSideChart.setOption(widgetTemperatureRightSideChartOptions, true);
		}
	});
})(window, document, jQuery);