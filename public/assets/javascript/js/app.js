;(function (window)
{
	"use strict";
	
	// Is Modernizr defined on the global scope
	var Modernizr = typeof Modernizr !== "undefined" ? Modernizr : false;
	
	// whether or not is a touch device
	var isTouchDevice = Modernizr ? Modernizr.touch : ("ontouchstart" in window || "onmsgesturechange" in window);
	
	// Are we expecting a touch or a click?
	var buttonPressedEvent = (isTouchDevice) ? "touchstart" : "click";
	var HyperCube = function ()
	{
		this.init();
	};
	
	// Initialization method
	HyperCube.prototype.init = function ()
	{
		this.isTouchDevice = isTouchDevice;
		this.buttonPressedEvent = buttonPressedEvent;
	};
	
	// Creates a HyperCube object.
	window.HyperCube = new HyperCube();
})(this);

(function (window, document, JQuery, HyperCube)
{
	"use strict";

	var cookieData;
	var cookieName = "hyperCube";
	/**********************************/

	var players = [];

	var playerId = null;
	var navWheel = null;
	var cubePlayer = null;

	// Require X clicks in Y seconds to trigger secret action
	var secondsForClicks = 1;
	var numClicksRequired = 5;
	var clickTimestamps = [numClicksRequired];
	var oldestIndex = 0;
	var nextIndex = 0;

	/*******************************************/
	/* Initiate HyperCube Engine               */

	/*******************************************/
	function init()
	{
		var width = $(window).width();

		/* ===== This is for resizing window ===== */

		if (width < 575)
		{
			$('.navbar-collapse').toggleClass('collapse');
			$('#left').toggleClass('collapse');

			cookieData.leftMenu = "closed";
			HyperCube.updateSiteCookie(cookieData);
		}
		else if (width > 576 && width < 1170)
		{
			$("#main-wrapper").toggleClass("container-margin-right", 200, "easeInQuint");
			$("#right").toggleClass("sidebar-right", 200, "easeInQuint");

			$("body").toggleClass("is-mini");
			$(".sidebar-nav, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");

			cookieData.leftMenu = "closed";
			cookieData.rightMenu = "closed";
			HyperCube.updateSiteCookie(cookieData);
		}
        else
		{
			if (cookieData.leftMenu === "open")
			{
				if($("body").hasClass("is-mini"))
				{
					$(".sidebar-nav, .slimScrollDiv").css("overflow", "hidden").parent().css("overflow", "visible");
					$("body").toggleClass("is-mini", 200, "easeInQuint");
				}
			}
			else if(cookieData.leftMenu === "closed")
			{
				if(!$("body").hasClass("is-mini"))
				{
					$(".sidebar-nav, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
					$("body").toggleClass("is-mini", 200, "easeInQuint");
				}
			}

			if (cookieData.rightMenu === "open")
			{
				if($("#right").hasClass("sidebar-right"))
				{
					$("#main-wrapper").toggleClass("container-margin-right", 200, "easeInQuint");
					$("#right").toggleClass("sidebar-right", 200, "easeInQuint");
				}
			}
			else if(cookieData.rightMenu === "closed")
			{
				if(!$("#right").hasClass("sidebar-right"))
				{
					$("#main-wrapper").toggleClass("container-margin-right", 200, "easeInQuint");
					$("#right").toggleClass("sidebar-right", 200, "easeInQuint");
				}
			}

			if (cookieData.topMenu === "open")
			{
				if($("#topMenu").is(":hidden"))
				{
					$("#breadcrumb").toggle("slow");
					$("#topMenu").toggle("slow");
				}
			}
			else if (cookieData.topMenu === "closed")
			{
				if($("#topMenu").is(":visible"))
				{
					$("#topMenu").toggle("slow");
					$("#breadcrumb").toggle("slow");
				}
			}

			if (cookieData.secretSensor === "open")
			{
				if($("#left-sensors").is(":hidden"))
				{
					HyperCube.secretSensorMenu();
				}
			}
			else
			{
				if($("#left-sensors").is(":visible"))
				{
					HyperCube.secretSensorMenu();
				}
			}

			if (cookieData.secretMenu === "open")
			{
				if($("#right-inner-menu").is(":hidden"))
				{
					HyperCube.secretPrimaryMenu();
				}
			}
			else
			{
				if($("#right-inner-menu").is(":visible"))
				{
					HyperCube.secretPrimaryMenu();
				}
			}

			$("#Setting1").prop('checked', cookieData.setting1);
			$("#Setting2").prop('checked', cookieData.setting2);
			$("#Setting3").prop('checked', cookieData.setting3);
			$("#Setting4").prop('checked', cookieData.setting4);
			$("#Setting5").prop('checked', cookieData.setting5);
			$("#Setting6").prop('checked', cookieData.setting6);
		}
	}

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.initiateHyperCube = function ()
	{
		var loadTime = new Date();
		var countDown = 0;

		outdatedBrowser({
			bgColor: '#000000',
			color: '#f6bc53',
			lowerThan: 'transform',
			languagePath: ''
		});

		var offlineTest = function ()
		{
			if (Offline.state === "up")
			{
				Offline.check();
			}
		};
		setInterval(offlineTest, 60000);

		if (location.protocol === 'https:')
		{
			$('#sensorSSL').toggleClass("badge-primary badge-success");
			$("#sensorSSL").pulsate({
				color: "#0099ff",                       // set the color of the pulse
				reach: 10,                              // how far the pulse goes in px
				speed: 1000,                            // how long one pulse takes in ms
				pause: 0,                               // how long the pause between pulses is in ms
				glow: true,                             // if the glow should be shown too
				repeat: true,                           // will repeat forever if true, if given a number will repeat for that many times
				onHover: false                          // if true only pulsate if user hovers over the element
			});
		}

		if (window.screenfull.enabled)
		{
			window.screenfull.on('error', function(event)
			{
				console.error('Failed to enable fullscreen', event);
			});
			window.screenfull.on('change', function(event)
			{
				window.screenfull.isFullscreen ? $("#site-fullScreen").toggleClass("fa-compress fa-expand") : $("#site-fullScreen").toggleClass("fa-expand fa-compress");
			});
		}

		if ($.isFunction($.fn.gridmanager))
		{
			$("#gridCanvas").gridmanager();
		}
		/*--------------------------------------------------------------------------------------------------*/

		/* Set transition */
		$.support.transition = HyperCube.transitionEnd();

		if ($.isFunction($.fn.window))
		{
			// Prepare customized static attributes for windows, see static attributes
			// Note: you should call this method before starting to create window instances, or windows might display wrong.
			$.window.prepare({
				dock: 'bottom',       // change the dock direction: 'left', 'right', 'top', 'bottom'
				animationSpeed: 200,  // set animation speed
				minWinLong: 180,      // set minimized window long dimension width in pixel
				showRoundCorner: true
			});
		}

		if ($.isFunction($.fn.passy))
		{
			/* Initiate passy minimum password length */
			$.passy.requirements.length.min = 4;
		}

		if ($.isFunction($.fn.PNotify))
		{
			/* Notify messages delay defaults */
			$.PNotify.prototype.options.delay = 5000;
			//PNotify.prototype.options.confirm.buttons = [];
			$.PNotify.prototype.options.styling = "bootstrap3"; // Bootstrap version 4
			$.PNotify.prototype.options.icons = "fontawesome5"; // Font Awesome 5
		}
		
		if ($.isFunction($.ripple))
		{
			$.ripple(".btn", {
				debug: false, // Turn Ripple.js logging on/off
				on: 'click', // The event to trigger a ripple effect
				
				opacity: 0.4, // The opacity of the ripple
				color: "auto", // Set the background color. If set to "auto", it will use the text color
				multi: false, // Allow multiple ripples per element
				
				duration: 0.7, // The duration of the ripple
				
				// Filter function for modifying the speed of the ripple
				rate: function (pxPerSecond)
				{
					return pxPerSecond;
				},
				
				easing: 'linear' // The CSS3 easing function of the ripple
			});
		}

		if ($.isFunction($.fn.select2))
		{
			$.fn.select2.defaults.set("theme", "bootstrap");
		}

		if ($.isFunction($.fn.editable))
		{
			/* XEditable defaults */
			$.fn.editable.defaults.mode = "inline";
			$.fn.editable.defaults.url = "/post";
		}

		if ($.isFunction($.fn.ripple))
		{
			/* Initiate ripple button hover effect */
			$.ripple(".ripple-click-effect", {
				debug: true, // Turn Ripple.js logging on/off
				on: "mousedown", // The event to trigger a ripple effect

				opacity: 0.8, // The opacity of the ripple
				color: "#F6BC53", // Set the background color. If set to "auto", it will use the text color
				multi: false, // Allow multiple ripples per element

				duration: 0.7, // The duration of the ripple

				// Filter function for modifying the speed of the ripple
				rate: function (pxPerSecond)
				{
					return pxPerSecond;
				},

				easing: "linear" // The CSS3 easing function of the ripple
			});
		}

		if ($.isFunction($.fn.sessionTimeout))
		{
			// Setup the sessionTimeout plugin
			$.fn.sessionTimeout({
				autoping: false,
				timeout: 3600000, // 1 hour
				promptfor: 600000, // 10 minutes
				beforetimeout: function ()
				{
					// Reset the countdown
					var notice;
					clearTimeout(countDown);

					// get the current session duration
					// you could also use $.fn.sessionTimeout('duration');
					// but you'd get an extra console.log entry in the demo
					var timeRemaining = $.fn.sessionTimeout("remaining"); // returns time left until session expires in ms

					// Countdown to session timeout
					countDown = setInterval(function ()
					{
						(timeRemaining -= 1000);
						if (timeRemaining >= 0)
						{
							// update the display with the time remaining
							const timePassed = $.timeago(loadTime);
							$("#timeAgo").text(timePassed);
							$("#remaining").text(Math.ceil(timeRemaining / 1000) + " sec.");
						}
					}, 1000);

					// Notify
					notice = new PNotify({
						title: 'This page was loaded:<br /><span id="timeAgo" class="text-warning"></span>',
						text: 'Your session will expire in <span id="remaining">0</span>',
						hide: false,
						type: 'info',
						icon: 'fas fa-info-circle',
						history: {
							history: false
						},
						animate: {
							animate: true,
							in_class: 'rollIn',
							out_class: 'fadeOut'
						},
						confirm: {
							confirm: true,
							buttons: [{
								text: 'Extend my Session',
								addClass: 'btn-danger btn-sm',
								click: function (notice)
								{
									$.fn.sessionTimeout('init');
									notice.remove();
								}
							}, null]
						},
						buttons: {
							closer: false,
							sticker: false
						},
					});
				},
				ontimeout: function ()
				{
					window.PNotify.removeAll();
					window.location.href = "https://www.mcx-systems.net";
				},
				after_close: function ()
				{
				}
			});
		}

		i18next.use(i18nextXHRBackend).init({
			lng: cookieData.language, // set language on init
			// allow keys to be phrases having `:`, `.`
			debug: true,
			fallbackLng: "en",
			ns: ["core"],
			defaultNS: "core",
			backend: {
				crossDomain: true,
				loadPath: global_base_url + "assets/locales/{{lng}}/{{ns}}.json"
			}
		}, function (err, t)
		{
			console.log("Translated value = " + i18next.t("core:app.name"));
			jqueryI18next.init(i18next, $, {
				tName: 't', // --> appends $.t = i18next.t
				i18nName: 'i18n', // --> appends $.i18n = i18next
				handleName: 'localize', // --> appends $(selector).localize(opts);
				selectorAttr: 'data-i18n', // selector for translating elements
				targetAttr: 'i18n-target', // data-() attribute to grab target element to translate (if diffrent then itself)
				optionsAttr: 'i18n-options', // data-() attribute that contains options, will load/set if useOptionsAttr = true
				useOptionsAttr: false, // see optionsAttr
				parseDefaultValueFromContent: true // parses default values from content ele.val or ele.text
			});

			$("body").localize();
			window.moment.locale(cookieData.language);
			if ($.isFunction($.fn.bootstrapTable))
			{
				$(".table").bootstrapTable("changeLocale", cookieData.language);
				$("#sLangEn, #sLangDe, #sLangRu, #sLangSi").removeClass("active");
			}

			switch (cookieData.language)
			{
				case "en":
					$("#sLangEn").addClass("active");
					break;

				case "si":
					$("#sLangSi").addClass("active");
					break;

				case "ru":
					$("#sLangRu").addClass("active");
					break;

				case "de":
					$("#sLangDe").addClass("active");
					break;
			}
		});

		if ($.isFunction($.fn.bootstrapTable))
		{
			/* Initiate Bootstrap table plugin */
			var BootstrapTable = $.fn.bootstrapTable;
			BootstrapTable.Constructor.prototype.changeTitle = function (locale)
			{
				$.each(this.options.columns, function (idx, columnList)
				{
					$.each(columnList, function (idx, column)
					{
						if (column.field)
						{
							column.title = locale[column.field];
						}
					});
				});
				this.initHeader();
				this.initBody();
				this.initToolbar();
			};

			/* Set Bootstrap table language */
			BootstrapTable.Constructor.prototype.changeLocale = function (localeId)
			{
				this.options.locale = localeId;
				this.initLocale();
				this.initPagination();
				this.initBody();
				this.initToolbar();
			};

			BootstrapTable.methods.push("changeTitle");
			BootstrapTable.methods.push("changeLocale");
		}

		hs.graphicsDir = global_base_url + 'assets/images/highSlide/';
		hs.outlineType = 'outer-glow';
		hs.wrapperClassName = 'dark';
		hs.numberOfImagesToPreload = 0;
		hs.showCredits = false;
		hs.dimmingOpacity = 0.60;
		hs.outlineWhileAnimating = false;
		hs.align = 'center';
		hs.transitions = ['expand', 'crossfade'];
		hs.transitionDuration = 1000;
		hs.captionEval = 'this.a.title';
		hs.numberPosition = 'caption';
		hs.fadeInOut = true;

		$('#main-wrapper-content').imagesLoaded()
		.always(function( instance )
		{
			console.log('all images loaded');
		})
		.done(function( instance )
		{
			console.log('all images successfully loaded');
		})
		.fail(function()
		{
			console.log('all images loaded, at least one is broken');
		})
		.progress(function( instance, image )
		{
			var result = image.isLoaded ? 'loaded' : 'broken';
			console.log( 'image is ' + result + ' for ' + image.img.src );
		});

		/*------------------------------------------*/

		$("#extended-list li").each(function (i)
		{
			i = i + 1;
			$(this).addClass("extended-item" + i);
		});

		$('.extended-description, .extended-top').css("display", "none");
		$('.extended-description, .extended-top').animate({
			'opacity': "0.9"
		});

		$('.extended-item').hover(function ()
		{
			$(this).children('.extended-description, .extended-top').slideDown("fast");
		}, function ()
		{
			$(this).children('.extended-description, .extended-top').slideUp("fast");
		});

		/*------------------------------------------*/

		/* Determine the available player IDs */
		for (var x = 0; x < Object.keys(videojs.players).length; x++)
		{
			// Assign the player name to setPlayer
			var setPlayer = Object.keys(videojs.players)[x];

			// Define the ready event for the player
			videojs(setPlayer).ready(function ()
			{
				// Assign this player to a variable
				var myPlayer;
				myPlayer = this;

				// Assign and event listener for play event
				myPlayer.on("play", HyperCube.stopOtherPlayers);

				// Push the player to the players array
				players.push(myPlayer);
			});
		}

		/*------------------------------------------*/

		var form = document.getElementById('needs-validation');
		if(form)
		{
			form.addEventListener('submit', function(event)
			{
				if (form.checkValidity() === false)
				{
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		}

		if (window.localStorage)
		{
			$('#sensorLocalStorage').toggleClass("badge-dark badge-success");
		}
		else
		{
			$('#sensorLocalStorage').toggleClass("badge-success badge-dark");
		}

		// Load selected skin color from cookie
		HyperCube.loadCssFile(cookieData.theme, false);

		HyperCube.createChatWidget();

		setInterval(HyperCube.showTime, 1000);

		/*------------------------------------------*/

		// Allow CSS transitions when page is loaded
		$(window).on("load", function ()
		{
			$("body").removeClass("no-transitions");
			if(cookieData.setting6)
			{
				if (window.jQuery)
				{
                    // jQuery is available.
					$("#debugTagcount").html(document.getElementsByTagName("*").length);
					$("#debugStylecount").html($("link[rel*=stylesheet]").length);
					$("#debugScriptcount").html($("script[src]").length);
					$("#debugLinkcount").html($("a[href]").length);
					$("#debugImgcount").html($("img[src]").length);
					$("#versionJQuery").html(window.jQuery.fn.jquery);
					$("#versionJQuery-ui").html($.ui.version);
					$("#versionBootstrap").html($.fn.tooltip.Constructor.VERSION);
					$("#versionHyperCube").html(HyperCube.hyperCubeVersion);
					$("#versionVideoJS").html(videojs.VERSION);
					$("#versionWindow").html($.window.getVersion());
					$("#versionPNotify").html(PNotify.prototype.version);
					$("#versionSWFObject").html(swfobject.version);
				}
			}
		});

		// Init HyperCube when page is first time loaded
		init();

		var resizeTimer;
		// Init HyperCube when page is resized
		$(window).on("resize", function ()
		{
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(HyperCube.init(), 250);
		}).trigger("resize");
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.toggleTopBar = function ()
	{
		if ($("#topMenu").is(":visible"))
		{
			$("#breadcrumb").toggle("slow");
			$("#topMenu").toggle("slow");

			cookieData.topMenu = "closed";
			HyperCube.updateSiteCookie(cookieData);
		}
		else
		{
			$("#topMenu").toggle("slow");
			$("#breadcrumb").toggle("slow");

			cookieData.topMenu = "open";
			HyperCube.updateSiteCookie(cookieData);
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.toggleLeftSideBar = function ()
	{
		if ($("body").hasClass("is-mini"))
		{
			$(".sidebar-nav, .slimScrollDiv").css("overflow", "hidden").parent().css("overflow", "visible");
			$("body").toggleClass("is-mini", 200, "easeInQuint");

			cookieData.leftMenu = "open";
			HyperCube.updateSiteCookie(cookieData);
		}
		else
		{
			$(".sidebar-nav, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
			$("body").toggleClass("is-mini", 200, "easeInQuint");

			cookieData.leftMenu = "closed";
			HyperCube.updateSiteCookie(cookieData);
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.toggleRightSideBar = function ()
	{
		if ($("#right").hasClass("sidebar-right"))
		{
			$("#main-wrapper").toggleClass("container-margin-right", 200, "easeInQuint");
			$("#right").toggleClass("sidebar-right", 200, "easeInQuint");

			cookieData.rightMenu = "open";
			HyperCube.updateSiteCookie(cookieData);
		}
		else
		{
			$("#main-wrapper").toggleClass("container-margin-right", 200, "easeInQuint");
			$("#right").toggleClass("sidebar-right", 200, "easeInQuint");

			cookieData.rightMenu = "closed";
			HyperCube.updateSiteCookie(cookieData);
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.toggleMobile = function ()
	{
		$("#left").toggle();

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.toggleFullScreen = function ()
	{
		if (window.screenfull.enabled)
		{
			window.screenfull.toggle();
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.automationAccessMenu = function (location)
	{
		switch (location)
		{
			case "lights":
				alert("lights");
				break;

			case "thermostat":
				alert("thermostat");
				break;

			case "electricity":
				alert("electricity");
				break;

			case "water":
				alert("water");
				break;

			case "control":
				alert("control");
				break;

			case "air":
				alert("air");
				break;

			case "surveillance":
				alert("surveillance");
				break;

			case "appliances":
				alert("appliances");
				break;

			case "automation":
				alert("automation");
				break;

			default:
				return;
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/













	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.playCubeMedia = function (videoSrc, image, videoTitle, videoPlaylist)
	{
		var poster = null;
		var thumb = null;

		var width = $(window).width();
		var timeInterval = null;

		if (width > 768)
		{
			$(".sidebar-right-inner").toggleClass("collapse");
			$(".sidebar-right-inner-player-controls").toggleClass("collapse");

			var exts = ["mp3"];
			// split file name at dot
			var get_ext = videoSrc.split(".");
			// reverse name to check extension
			get_ext = get_ext.reverse();

			// Check file type is mp3
			if ($.inArray(get_ext[0].toLowerCase(), exts) > -1)
			{
				$("#audiowWrapper").append("<div class=\"vz-wrapper\">" +
					"<audio id=\"audioArea\" src=\"" + videoSrc + "\" data-author=\"Beethoven\" data-title=\"Allegro\"></audio>" +
					"<div class=\"vz-wrapper -canvas\">" +
					"<canvas id=\"audioCanvas\" width=\"200\" height=\"200\"></canvas>" +
					"</div>" +
					"</div>");
			}
			else
			{
				$(playerId).remove();
				$(".playlistCubeWrapper").remove();

				if (videoPlaylist)
				{
					playerId = "videoCubePlaylist";
				}
				else
				{
					playerId = "videoArea";
				}

				if (videoPlaylist)
				{
					$(".main-content-box").append("<div class=\"main-playlist-player playlistCubeWrapper\">" +
						"<video id=\"" + playerId + "\" class=\"video-js vjs-default-skin video-cube-playlist-player\" preload=\"auto\" ><p class=\"vjs-no-js\">" +
						"To view this video please enable JavaScript, and consider upgrading to a web browser that" +
						"<a href=\"https://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a>" +
						"</p></video><div class=\"playlist-container\">" +
						"<input id=\"vjs-playlist-handle-cube\" type=\"checkbox\" class=\"vjs-playlist-handle\" />" +
						"<label for=\"vjs-playlist-handle-cube\" class=\"vjs-playlist-handle-label\"></label>" +
						"<div class=\"vjs-playlist cube-vjs-playlist\"></div></div></div>");

					console.log("We have new video playlist to play so, video playlist element was created!");

					$("#vjs-playlist-handle-cube").change(function()
					{
						var $elem = $(".vjs-playlist-item-list");

						if ($(this).is(':checked'))
						{
							$elem.slimScroll({
								height: "100%",
								position: "right",
								size: "6px",
								wheelStep: 1,
								color: "#f90"
							});
						}
						else
						{
							$elem.slimScroll({
								destroy: true
							});

							var	events = $._data($elem[0], "events");

							if (events)
							{
								$._removeData($elem[0], "events");
							}
						}
					});

					$.ajax({
						url: $.base64("decode", videoPlaylist),
						dataType: "json",
						cache: false,
						timeout: 5000,
						success: function (result)
						{
							window.videojs.log("Playlist was successfully loaded and playlist was created!");

							cubePlayer.playlist(result, {
								getVideoSource: function (vid, cb)
								{
									cb(vid.src, vid.poster);
								}
							});

							cubePlayer.playlist.currentItem(0);
							// Play through the playlist automatically.
							cubePlayer.playlist.autoadvance();

							cubePlayer.on("playlistitem", function ()
							{
								var pl = cubePlayer.playlist();
								var item = pl[cubePlayer.playlist.currentItem()];

								videoTitle = item.name;
								$(".playerWheelMediaTitle").html(item.name);
								$("#videoThumb").attr("src", item.poster).click(function(){return false;});
								$("#videoDesc").html(item.description);
								window.videojs.log("Video playlist data was, successfully set!");
							});

							var pl = cubePlayer.playlist();
							var item = pl[cubePlayer.playlist.currentItem()];

							videoTitle = item.name;
							$(".playerWheelMediaTitle").html(item.name);
							$("#videoThumb").attr("src", item.poster).click(function(){return false;});
							$("#videoDesc").html(item.description);
							window.videojs.log("Video data for current video, was successfully set!");

							// Initialize the playlist-ui plugin with no option (i.e. the defaults).
							cubePlayer.playlistUi({
								playOnSelect: true,
								className: "cube-vjs-playlist"
							});
						},
						error: function ()
						{
							window.videojs.log("Error: Something went wrong with loading the playlist!");
						}
					});
				}
				else
				{
					if (videoSrc)
					{
						if (image)
						{
							thumb = image;
							poster = "poster=\"" + image + "\" ";
						}
						else
						{
							thumb = global_base_url + "assets/images/no-image.png";
							poster = "poster=\"" + global_base_url + "assets/images/no-image.png\" ";
						}

						$(".main-content-box").append("<video id=\"" + playerId + "\" " + poster +
							"class=\"video-js vjs-default-skin video-cube-player\" preload=\"auto\">" +
							"<source src=\"" + videoSrc + "\" type=\"video/mp4\" /><p class=\"vjs-no-js\">" +
							"To view this video please enable JavaScript, and consider upgrading to a web browser that" +
							"<a href=\"https://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a>" +
							"</p></video>");

						console.log("We have new single video to play so, video element was created!");

						$(".playerWheelMediaTitle").html(videoTitle);
						$("#videoThumb").attr("src", thumb).click(function(){return false;});
						$("#videoDesc").html("No descriptions exists for single videos. Descriptions are working only in playlist's.");

						console.log("Video data was, successfully set!");
					}
				}

				/*---------- Initiate video player -----------------*/

				var options = [{"nativeControlsForTouch": true, "language": "en"}];
				cubePlayer = videojs(playerId, options, function onPlayerReady()
				{
					HyperCube.controlVolume(100);
					window.videojs.log("Your player is ready!");
				});

				/*---------------------------------------------------*/

				navWheel = new wheelnav("playerWheelControls");
				navWheel.clickModeRotate = false;
				navWheel.spreaderRadius = navWheel.wheelRadius * 0.325;
				navWheel.wheelRadius = navWheel.wheelRadius * 0.8;
				navWheel.slicePathFunction = slicePath().DonutSlice;
				navWheel.colors = ["#036edc"];
				navWheel.spreaderEnable = true;
				navWheel.markerEnable = true;
				navWheel.markerPathFunction = markerPath().PieLineMarker;
				navWheel.animatetime = 600;
				navWheel.animateeffect = "easeOutQuint";
				navWheel.spreaderInTitle = icon.list;
				navWheel.spreaderOutTitle = icon.power;
				navWheel.navAngle = 270;
				navWheel.rotateRound = true;
				navWheel.navItemsContinuous = true;
				navWheel.clickModeRotate = false;
				navWheel.initWheel([icon.stop, icon.end, icon.ff, icon.play, icon.rw, icon.start]);

				if (playerId === "videoArea")
				{
					navWheel.navItems[1].enabled = false;
					navWheel.navItems[5].enabled = false;
				}

				navWheel.createWheel();

				navWheel.navItems[0].navigateFunction = function ()
				{
					HyperCube.controlVideoPlayer(1);
				};

				navWheel.navItems[1].navigateFunction = function ()
				{
					HyperCube.controlVideoPlayer(7);
				};

				navWheel.navItems[2].navigateFunction = function ()
				{
					HyperCube.controlVideoPlayer(2);
				};

				navWheel.navItems[3].navigateFunction = function ()
				{
					HyperCube.controlVideoPlayer(3);
				};

				navWheel.navItems[4].navigateFunction = function ()
				{
					HyperCube.controlVideoPlayer(4);
				};

				navWheel.navItems[5].navigateFunction = function ()
				{
					HyperCube.controlVideoPlayer(6);
				};

				window.videojs.log("Docked player wheel controls were created!");

				var wheel_spreader = document.getElementById("wheelnav-playerWheelControls-spreader");
				var wheel_spreader_title = document.getElementById("wheelnav-playerWheelControls-spreadertitle");

				wheel_spreader.onmouseup = function ()
				{
					clearInterval(timeInterval);
					$(".sidebar-right-inner").toggleClass("collapse");
					$(".sidebar-right-inner-player-controls").toggleClass("collapse");

					if (playerId === "videoCubePlaylist")
					{
						$(".playlistCubeWrapper").remove();
						//myPlayer.playlistMenu.dispose();
					}

					videojs(playerId).dispose();
					$(".videoKnob").remove();

					window.videojs.log("Docked player controls and video element were successfully disposed!");
				};

				wheel_spreader_title.onmouseup = function ()
				{
					clearInterval(timeInterval);
					$(".sidebar-right-inner").toggleClass("collapse");
					$(".sidebar-right-inner-player-controls").toggleClass("collapse");

					if (playerId === "videoCubePlaylist")
					{
						$(".playlistCubeWrapper").remove();
						//myPlayer.playlistMenu.dispose();
					}

					videojs(playerId).dispose();
					$(".videoKnob").remove();

					window.videojs.log("Docked player controls and video element were successfully disposed!");
				};

				/*-------------------------------------------------------------------------------------------------------------------------*/

				$("#videoTimeLapse").knob({
					width: "60",
					cursor: false,
					displayInput: false,
					thickness:".16",
					bgColor: "#333",
					fgColor: "#036edc",
					step: "1",
					min: "0",
					max: "100",
					change: function (value)
					{
						HyperCube.skipToTrackTime(value);
					},
					release: function (value)
					{
					},
					cancel: function ()
					{
						console.log("cancel : ", this);
					}
				});

				/*-------------------------------------------------------------------------------------------------------------------------*/

				cubePlayer.on("pause", function ()
				{
					navWheel.navigateWheel(0);
				});

				cubePlayer.on("playing", function ()
				{
					navWheel.navigateWheel(3);
				});

				cubePlayer.on("ended", function ()
				{
					window.videojs.log("Video will soon be over...");
					cubePlayer.posterImage.show();
					cubePlayer.bigPlayButton.show();
					cubePlayer.currentTime(0);
				});

				cubePlayer.on("loadedmetadata", function ()
				{
					var time = cubePlayer.duration();
					$(".playerWheelTimeTo").html(HyperCube.calculateVideoTime(time));
				});

				// Calculate current video time playback
				timeInterval = setInterval(function ()
				{
					var time = cubePlayer.currentTime();

					HyperCube.updateSeekTime();

					$(".playerWheelTime").html(HyperCube.calculateVideoTime(time));
				}, 1000);
			}
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.controlVideoPlayer = function (control)
	{
		var now = 0;
		switch (control)
		{
			case 1:
				cubePlayer.pause();
				window.videojs.log("Docked Player pause!");
				break;

			case 2:
				now = cubePlayer.currentTime();
				cubePlayer.currentTime(now + 10);
				cubePlayer.play();
				navWheel.navigateWheel(3);
				window.videojs.log("Docked Player fast forward!");
				break;

			case 3:
				cubePlayer.play();
				window.videojs.log("Docked Player play!");
				break;

			case 4:
				now = cubePlayer.currentTime();
				cubePlayer.currentTime(now - 10);
				cubePlayer.play();
				navWheel.navigateWheel(3);
				window.videojs.log("Docked Player fast backward!");
				break;

			case 5:
				cubePlayer.stop();
				window.videojs.log("Docked Player pause!");
				break;

			case 6:
				cubePlayer.playlist.previous();
				cubePlayer.play();
				navWheel.navigateWheel(3);
				window.videojs.log("Docked Player previous video!");
				break;

			case 7:
				cubePlayer.playlist.next();
				cubePlayer.play();
				navWheel.navigateWheel(3);
				window.videojs.log("Docked Player next video!");
				break;

			default:
				cubePlayer.play();
				window.videojs.log("Docked Player play - default!");
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.updateSeekTime = function ()
	{
		const t = cubePlayer.currentTime() * (100 / cubePlayer.duration());
		$("#videoTimeLapse").val(t).trigger('change');
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.skipToTrackTime = function (arg)
	{
		if(arg > 0)
		{
			const g = cubePlayer.duration() * (arg / 100);
			cubePlayer.currentTime(g);
			window.videojs.log("You skipped video track to " + g);
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.controlVolume = function (arg)
	{
		console.log("Current volume is: " + $("#videoVolume").val());
		//var volume = $("input#volumeKnob").val();

		cubePlayer.volume((arg / 100));
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.unMuteSound = function ()
	{
		cubePlayer.muted(false);
		$("#videoVolume").val(100).trigger("change");
		window.videojs.log("Docked Player was un-muted!");

		$("#videoUnMute").removeClass("btn-dark").addClass("btn-success");
		$("#videoMute").removeClass("btn-danger").addClass("btn-dark");
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.muteSound = function ()
	{
		cubePlayer.muted(true);
		$("#videoVolume").val(0).trigger("change");
		window.videojs.log("Docked Player was muted!");

		$("#videoUnMute").removeClass("btn-success").addClass("btn-dark");
		$("#videoMute").removeClass("btn-dark").addClass("btn-danger");
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.downloadVideo = function ()
	{
		window.open(cubePlayer.currentSrc(), "download");
		cubePlayer.trigger("download");
	};

	/*-----------------------------------------------------------------------------------------------*/
	
	HyperCube.stopOtherPlayers = function (e)
	{
		// Determine which player the event is coming from
		var id = e.target.id;
		// Loop through the array of players
		for (var i = 0; i < players.length; i++)
		{
			// Get the player(s) that did not trigger the play event
			if (players[i].id() !== id)
			{
				// Pause the other player(s)
				videojs(players[i].id()).pause();
			}
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.calculateVideoTime = function (time)
	{
		var minutes = Math.floor(time / 60);
		var seconds = Math.floor(time - minutes * 60);
		var x = minutes < 10 ? "0" + minutes : minutes;
		var y = seconds < 10 ? "0" + seconds : seconds;
		
		return (x + ":" + y);
	};

	/*-----------------------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showRadioWidget = function ()
	{
		$("#radioWidget").append('<audio id="radio_player" class="video-js vjs-sublime-skin">' +
			'<source src="http://208.77.21.33:12310/;" type="audio/mp3" />' +
			'</audio>');

		videojs("radio_player", {
			"controls": true,
			"autoplay": false,
			"preload": "auto",
			"poster": global_base_url + 'assets/images/radio.png',
			"width": 200,
			"height": 180
		});
		videojs("radio_player").ready(function(){});

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.disposeRadioWidget = function ()
	{
		videojs("radio_player").dispose();

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.secretPrimaryClicks = function ()
	{
		var timeMillis = (new Date()).getTime();

		//If we have at least the min number of clicks on record
		if(nextIndex === (numClicksRequired - 1) || oldestIndex > 0)
		{
			//Check that all required clicks were in required time
			var diff = timeMillis - clickTimestamps[oldestIndex];
			if(diff < secondsForClicks * 1000)
			{
				HyperCube.secretPrimaryMenu();
			}

			oldestIndex++;
		}

		//If not done, record click time, and bump indices
		clickTimestamps[nextIndex] = timeMillis;
		nextIndex++;

		if(nextIndex === numClicksRequired)
		{
			nextIndex = 0;
		}

		if(oldestIndex === numClicksRequired)
		{
			oldestIndex = 0;
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.secretPrimaryMenu = function ()
	{
		var right = $("#right-inner-menu");
		if(right.is(":visible"))
		{
			cookieData.secretMenu = "closed";
			HyperCube.updateSiteCookie(cookieData);
		}
		else{
			cookieData.secretMenu = "open";
			HyperCube.updateSiteCookie(cookieData);
		}

		$("#right-inner-banner").toggleClass("collapse");
		right.toggleClass("collapse");

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.secretSensorClicks = function ()
	{
		var timeMillis = (new Date()).getTime();

		//If we have at least the min number of clicks on record
		if(nextIndex === (numClicksRequired - 1) || oldestIndex > 0)
		{
			//Check that all required clicks were in required time
			var diff = timeMillis - clickTimestamps[oldestIndex];
			if(diff < secondsForClicks * 1000)
			{
				HyperCube.secretSensorMenu();
			}

			oldestIndex++;
		}

		//If not done, record click time, and bump indices
		clickTimestamps[nextIndex] = timeMillis;
		nextIndex++;

		if(nextIndex === numClicksRequired)
		{
			nextIndex = 0;
		}

		if(oldestIndex === numClicksRequired)
		{
			oldestIndex = 0;
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.secretSensorMenu = function ()
	{
		var left = $("#left-sensors");
		if(left.is(":visible"))
		{
			cookieData.secretSensor = "closed";
			HyperCube.updateSiteCookie(cookieData);
		}
		else
		{
			cookieData.secretSensor = "open";
			HyperCube.updateSiteCookie(cookieData);
		}

		left.toggle(1200, "easeInQuint");
		$("#left-banner").toggle(1200, "easeInQuint");

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.createChatWidget = function ()
	{
		var chatUsers = $('.chat-users');
		var chatTalk = $('.chat-talk');
		var chatMessages = $('.chat-talk-messages');
		var chatInput = $('#sidebar-chat-message');
		var chatMsg = '';

		// Initialize scrolling on chat talk list
		chatUsers.slimScroll({ height: 400, color: '#ff9900', size: '3px', position: 'left', touchScrollStep: 100 });
		chatMessages.slimScroll({ height: 320, color: '#37db5a', size: '3px', position: 'left', touchScrollStep: 100 });

		// If a chat user is clicked show the chat talk
		$('a', chatUsers).click(function()
		{
			chatUsers.slideToggle();
			chatTalk.slideToggle();
			chatInput.focus();

			return false;
		});

		// If chat talk close button is clicked show the chat user list
		$('#chat-talk-close-btn').click(function()
		{
			chatTalk.slideUp();
			chatUsers.slideDown();

			return false;
		});

		// When the chat message form is submitted
		$('#sidebar-chat-form').submit(function(e)
		{
			// Get text from message input
			chatMsg = chatInput.val();

			// If the user typed a message
			if (chatMsg)
			{
				// Add it to the message list
				chatMessages.append('<li class="chat-talk-msg chat-talk-msg-highlight animated slideInLeft">' +
					'<img src="' + global_base_url + 'assets/Avatars/avatar6.png" alt="Avatar" class="rounded-circle chat-talk-msg-avatar float-left mr-2" />' +
					$('<div />').text(chatMsg).html() +
					'</li>');

				// Scroll the message list to the bottom
				chatMessages.slimScroll({scrollTo: chatMessages[0].scrollHeight, animate: true});
				// Reset the message input
				chatInput.val('');
			}

			// Don't submit the message form
			e.preventDefault();
		});

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showDebugWidget = function ()
	{
		$(".main-scroller").window({
			icon: global_base_url + 'assets/images/window/wrench.png',
			title: "Site Debuger",
			content: '<div class="window-content p-0 m-0"><div id="debugConsole" class="console p-0 m-0"></div></div>',
			footerContent: '<i class="fas fa-list-alt mr-2 text-primary"></i><span class="text-success">Connected</span>',
			width: 500,
			height: 300,
			maxWidth: 500,
			maxHeight: 300,
			closable: true,
			scrollable: true,
			draggable: true,
			resizable: true,
			checkBoundary: true,
			createRandomOffset: {x:300, y:150},
			onClose: function(wnd)
			{
			}
		});

		var controller = $('#debugConsole').console({
			promptLabel: 'Debug Console> ',
			commandValidate:function(line)
			{
				/*
				if (line === "") return false;
				else return true;
				*/
				return true;
			},
			commandHandle:function(line)
			{
				var message = "";

				switch(line)
				{
					case "test":
						message = "Console Test function.";
						break;
					case "video":
						message = "Video debugger ready.";
						break;
					case "google":
						message = "Google is running.";
						break;
					case "list":
						message = "List not found.";
						break;
					default:
						message = "HyperCube v" + HyperCube.hyperCubeVersion;
						break;
				}

				return [{ msg: "Info => " + message, className:"console-message-type" }]
			},
			autofocus: true,
			animateScroll: true,
			promptHistory: true
		});

		// Adding info method from our console object
		window.console.error = function(text)
		{
			var errors = $('#sensorErrors');
			controller.report([{msg: text, className:"console-message-error"}]);
			if(errors.hasClass("badge-dark"))
			{
				errors.toggleClass("badge-dark badge-danger");
				errors.pulsate({
					color:"#ff0218",     // set the color of the pulse
					reach: 10,           // how far the pulse goes in px
					speed: 1000,         // how long one pulse takes in ms
					pause: 0,            // how long the pause between pulses is in ms
					glow: true,          // if the glow should be shown too
					repeat: true,        // will repeat forever if true, if given a number will repeat for that many times
					onHover: false       // if true only pulsate if user hovers over the element
				});
			}
		};

		// Adding info method from our console object
		window.console.log = function(text)
		{
			controller.report([{msg: text, className:"console-message-type"}]);
		};

		// Adding info method from our console object
		window.console.warning = function(text)
		{
			controller.report([{msg: text, className:"console-message-value"}]);
			if($('#sensorError').hasClass("badge-dark"))
			{
				this.toggleClass("badge-dark badge-warning");
			}
		};

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showProfilerWidget = function ()
	{
		$(".main-scroller").window({
			icon: global_base_url + 'assets/images/window/toolbox.png',
			title: "Site Profiler",
			content: '<div class="window-content"><div id="profilerOutput" class="row p-0 m-0">' +
				'<div class="col-12 p-0"><span class="text-warning">Refresh browser window for newest data.</span><hr /></div>' +
				'<div class="col-6 p-0">' +
				'Tags: <span id="debugTagcount"></span><br />' +
		        'Stylesheet Files: <span id="debugStylecount" class="text-warning"></span><br />' +
		        'Javascript Files: <span id="debugScriptcount" class="text-warning"></span><br />' +
		        'Links: <span id="debugLinkcount" class="text-warning"></span><br />' +
		        'Images: <span id="debugImgcount" class="text-warning"></span><br />' +
				'</div><div class="col-6 p-0">' +
				'JQuery Version: <span id="versionJQuery" class="text-warning"></span><br />' +
				'JQuery-UI Version: <span id="versionJQuery-ui" class="text-warning"></span><br />' +
				'Bootstrap Version: <span id="versionBootstrap" class="text-warning"></span><br />' +
				'VideoJS Version: <span id="versionVideoJS" class="text-warning"></span><br />' +
				'Window Version: <span id="versionWindow" class="text-warning"></span><br />' +
				'PNotify Version: <span id="versionPNotify" class="text-warning"></span><br />' +
				'SWFObject Version: <span id="versionSWFObject" class="text-warning"></span><br />' +
				'HyperCube Version:: <span id="versionHyperCube" class="text-warning"></span><br />' +
				'</div><div class="col-12 p-0"><pre class="text-warning"><hr /></pre></div></div>',
			footerContent: '<a onClick="HyperCube.showDebugWidget();"><i class="fas fa-wrench mr-2"></i>Open Debugging Window</a>',
			width: 600,
		    height: 550,
			maxWidth: 600,
			maxHeight: 550,
			closable: false,
			scrollable: true,
			draggable: true,
			resizable: true,
			checkBoundary: true,
			createRandomOffset: {x:300, y:150},
			onClose: function(wnd)
			{
			}
		});

		// Adding info method from our console object
		window.console.info = function(text)
		{
			const element = document.createElement("div");
			const txt = document.createTextNode(text);

			element.append(text);
			$('#profilerOutput pre').append(element);
			$('#profilerOutput pre div:nth-child(odd)').addClass('odd');
		};


		console.log("Site profiler was open.");

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.hideProfilerWidget = function ()
	{
		$.window.closeAll(); // close all windows

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showWeatherWidget = function ()
	{
		if (navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(HyperCube.createWeatherWidget, HyperCube.showLocationError);
		}
		else
		{
			if(notifications)
			{
				HyperCube.showHyperCubeMessage("Geolocation is not supported by this browser.", "error", true);
			}
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.createWeatherWidget = function (position)
	{
		$(".weather-temperature").openWeather({
			key: weather_api_key,
			lat: position.coords.latitude,
			lng: position.coords.longitude,
			descriptionTarget: '.weather-description',
			windSpeedTarget: '.weather-wind-speed',
			minTemperatureTarget: '.weather-min-temperature',
			maxTemperatureTarget: '.weather-max-temperature',
			humidityTarget: '.weather-humidity',
			sunriseTarget: '.weather-sunrise',
			sunsetTarget: '.weather-sunset',
			placeTarget: '.weather-place',
			iconTarget: '.weather-icon',
			customIcons: true,
			units: 'c',
			success: function(data)
			{
				// Show weather
				$('.weather-wrapper').show();
				$('#sensorWeather').toggleClass("badge-dark badge-success");
				//console.log(data);
				console.log("Weather data acquired.");
				if(notifications)
				{
					HyperCube.showHyperCubeMessage("Weather data acquired.", "info", true);
				}
			},
			error: function(data)
			{
				console.log(data.error);
				$('.weather-wrapper').remove();
				$('#sensorError').toggleClass("badge-dark badge-danger");
			}
		});

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showHyperCubeDesktopMessage = function (text, type)
	{
		PNotify.desktop.permission();
		var title = "HyperCube Info Notice";
		var icon = global_base_url + "assets/images/pnotify/info.png";

		switch (type)
		{
			case "error":
				icon = global_base_url + "assets/images/pnotify/danger.png";
				title = "HyperCube Error Notice!";
				break;

			case "info":
				icon = global_base_url + "assets/images/pnotify/info.png";
				title = "HyperCube Info Notice!";
				break;

			case "success":
				icon = global_base_url + "assets/images/pnotify/success.png";
				title = "HyperCube Success Notice!";
				break;

			case "warning":
				icon = global_base_url + "assets/images/pnotify/warning.png";
				title = "HyperCube Warning Notice!";
				break;
		}

		(new PNotify({
				title: title,
				text: text,
				type: type,
				desktop: {
					desktop: true,
					fallback: true,
					icon: icon
				}
			})
		).get().click(function (e)
		{
			if ($(".ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *").is(e.target))
			{

			}
		});

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showHyperCubeMessage = function (text, type, sticky, animation, attension)
	{
		var att = false;
		var anim = false;
		var in_class = "bounceInLeft";
		var out_class = "bounceInRight";
		var att_class = "bounce";

		switch (animation)
		{
			case 0:
				anim = false;
				break;

			case 1:
				anim = true;
				in_class = "slideInDown";
				out_class = "slideOutUp";
				break;

			case 2:
				anim = true;
				in_class = "zoomInLeft";
				out_class = "zoomOutRight";
				break;

			case 3:
				anim = true;
				in_class = "bounceInLeft";
				out_class = "bounceOutRight";
				break;

			case 4:
				anim = true;
				in_class = "bounceInDown";
				out_class = "hinge";
				break;

			case 5:
				anim = true;
				in_class = "rotateInDownLeft";
				out_class = "rotateOutUpRight";
				break;

			default:
				anim = true;
				in_class = "rollIn";
				out_class = "lightSpeedOut";
				break;
		}

		switch (attension)
		{
			case 0:
				att = false;
				break;

			case 1:
				att = true;
				att_class = "bounce";
				break;

			case 2:
				att = true;
				att_class = "flash";
				break;

			case 3:
				att = true;
				att_class = "pulse";
				break;

			case 4:
				att = true;
				att_class = "rubberBand";
				break;

			case 5:
				att = true;
				att_class = "tada";
				break;

			case 6:
				att = true;
				att_class = "wobble";
				break;

			case 7:
				att = true;
				att_class = "jello";
				break;

			case 8:
				att = true;
				att_class = "swing";
				break;

			default:
				att = false;
				break;
		}

		const opts = {
			hide: sticky,
			animate: {
				animate: anim,
				in_class: in_class,
				out_class: out_class
			},
			after_init: function (notice)
			{
				if (att)
				{
					notice.attention(att_class);
				}
			}
		};

		switch (type)
		{
			case "error":
				opts.title = "Error:";
				opts.text = text;
				opts.icon = "fas fa-exclamation-triangle";
				opts.type = "error";
				break;

			case "info":
				opts.title = "Info:";
				opts.text = text;
				opts.icon = "fas fa-info-circle";
				opts.type = "info";
				break;

			case "success":
				opts.title = "Success:";
				opts.text = text;
				opts.icon = "fas fa-check-circle";
				opts.type = "success";
				break;
			default:
				opts.title = "Info:";
				opts.text = text;
				opts.icon = "fas fa-flag";
				break;
		}

		const pNotify = new PNotify(opts);

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showLocationError = function(error)
	{
		var message;
		switch(error.code)
		{
			case error.PERMISSION_DENIED:
				message = "User denied the request for GeoLocation.";
				break;
			case error.POSITION_UNAVAILABLE:
				message = "Location information is unavailable.";
				break;
			case error.TIMEOUT:
				message = "The request to get user location timed out.";
				break;
			case error.UNKNOWN_ERR:
				message = "An unknown error occurred.";
				break;
		}

		console.error(message);
		if(notifications)
		{
			HyperCube.showHyperCubeMessage(message, "error", true);
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.toggleFooterContact = function ()
	{
		$("#footer-contact-area").toggle(1000, "easeInQuint");

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showTime = function ()
	{
		var time = window.moment().format("HH:mm:ss / DD-MM-YYYY");
		$("#headerTime").html(time);

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.moveCards = function ()
	{
		var element = ".main-content-box";
		var handle = ".draggableCard";
		var connect = ".main-content-box";
		$(element).sortable({
			handle: handle,
			connectWith: connect,
			tolerance: "pointer",
			forcePlaceholderSize: true,
			opacity: 0.8
		}).disableSelection();

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.getCookie = function ()
	{
		var data;
		// Load selected skin color from cookie
		const c = window.Cookies.get(cookieName);

		if (c)
		{
			data = $.base64("decode", c);
		}

		cookieData = JSON.parse(data);

		return cookieData;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.createSiteCookie = function ()
	{
		var secure = false;
		if (location.protocol === 'https:')
		{
			secure = true;
		}

		const options = {
			path: "/",
			secure: secure,
			domain: location.host
		};

		const data = {
			theme: "dark",
			language: "en",
			topMenu: "closed",
			leftMenu: "open",
			rightMenu: "open",
			secretMenu: "closed",
			secretSensors: "closed",
			setting1: true,
			setting2: false,
			setting3: false,
			setting4: false,
			setting5: false,
			setting6: false
		};

		window.Cookies.set(cookieName, $.base64("encode", JSON.stringify(data), options));

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.updateSiteCookie = function (data)
	{
		var secure = false;
		if (location.protocol === 'https:')
		{
			secure = true;
		}

		const options = {
			path: "/",
			secure: secure,
			domain: location.host,
		};

		//alert(data.theme + data.setting1);
		window.Cookies.set(cookieName, $.base64("encode", JSON.stringify(data), options));
		cookieData = data;

		return true;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.removeSiteCookie = function ()
	{
		window.Cookies.remove(cookieName, { path: '/', domain: location.host });

		return true;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.readFromLocalStorage = function ()
	{
		if (typeof (Storage) !== 'undefined')
		{
			return JSON.parse(localStorage.getItem(cookieName));
		}
		else
		{
			window.alert('Please use a modern browser to properly view this template!')
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.saveToLocalStorage = function (data)
	{
		if (typeof (Storage) !== 'undefined')
		{
			try
			{
				localStorage.setItem(cookieName, JSON.stringify(data));
			}
			catch (e)
			{
				if (e === QUOTA_EXCEEDED_ERR)
				{
					alert('Storage limit exceeded');
				}
			}

			return false;
		}
		else
		{
			window.alert('Please use a modern browser to properly view this template!')
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.deleteFromLocalStorage = function ()
	{
		if (typeof (Storage) !== 'undefined')
		{
			localStorage.removeItem(cookieName);

			return false;
		}
		else
		{
			window.alert('Please use a modern browser to properly view this template!')
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.updateLocalStorage = function ()
	{


		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.loadCssFile = function (theme, message)
	{
		$("#theme").attr("href", global_base_url + "assets/stylesheet/theme/" + theme + ".css");

		if(message)
		{
			cookieData.theme = theme;
			if(HyperCube.updateSiteCookie(cookieData))
			{
				if (notifications)
				{
					HyperCube.showHyperCubeMessage("Color Theme changed to " + theme, "info", true);
				}
			}
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.setLanguage = function (language)
	{
		window.i18next.changeLanguage(language, function() {
			$("body").localize();

			window.moment.locale(language);
			$(".table").bootstrapTable("changeLocale", language);
		});

		cookieData.language = language;
		if(HyperCube.updateSiteCookie(cookieData))
		{
			var lang = "English";

			$("#sLangEn, #sLangDe, #sLangRu, #sLangSi").removeClass("active");

			switch (language)
			{
				case "en":
					lang = "English";
					$("#sLangEn").addClass("active");
					break;

				case "si":
					lang = "Slovenian";
					$("#sLangSi").addClass("active");
					break;

				case "ru":
					lang = "Russian";
					$("#sLangRu").addClass("active");
					break;

				case "de":
					lang = "German";
					$("#sLangDe").addClass("active");
					break;
			}

			if (notifications)
			{
				HyperCube.showHyperCubeMessage("Language changed to " + lang, "info", true);
			}
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.getMediaUrl = function(type)
	{
		const name = "id";

		switch(type)
		{
			case "game":
				return global_base_url + "uploads/games/game-" + HyperCube.urlParam(name) + ".swf";
			case "video":
				return global_base_url + "uploads/video/video-" + HyperCube.urlParam(name) + ".mp4";
			case "audio":
				return global_base_url + "uploads/audio/audio-" + HyperCube.urlParam(name) + ".mp3";
			default:
				return global_base_url + "uploads/games/game-" + HyperCube.urlParam(name) + ".swf";
		}
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.urlParam = function(name)
	{
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);

		return results ? decodeURIComponent(results[1].replace(/\+/g, '%20')) : null;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.callAjaxJson = function (url, type)
	{
		var post = "POST";
		if(type)
		{
			post = "GET";
		}

		$('#main-wrapper-content').block();
		$.ajax({
			url: url,
			type: post,
			dataType: "json",
			contentType: "application/json",
			responseTime: 750,
			success: function(data)
			{
				$("#ajax-content").html(JSON.stringify(data, null, 2));
				$('#main-wrapper-content').unblock();
			},
			error: function(jqXhr, textStatus, errorThrown)
			{
				var errorText = 'errorThrown: ' + errorThrown + '\nerror code: ' + jqXhr.status;
				$('#ajax-message-content').val(errorText);
				$('#main-wrapper-content').unblock();
			}
		});
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.callAjax = function (url, type)
	{
		var post = "POST";
		if(type)
		{
			post = "GET";
		}

		$('#main-wrapper-content').block();
		$.ajax({
			url: url,
			type: post,
			responseTime: 750,
			success: function(data)
			{
				$("#ajax-content").html(data);
				$('#main-wrapper-content').unblock();
			},
			error: function(jqXhr, textStatus, errorThrown)
			{
				var errorText = 'errorThrown: ' + errorThrown + '\nerror code: ' + jqXhr.status;
				$('#ajax-message-content').val(errorText);
				$('#main-wrapper-content').unblock();
			}
		});
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.setCursorToTextEnd = function ()
	{
		const $initialVal = this.val();
		this.val($initialVal);

		return this;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.transitionEnd = function ()
	{
		var el = document.createElement("bootstrap");

		var transEndEventNames = {
			WebkitTransition: "webkitTransitionEnd",
			MozTransition: "transitionend",
			OTransition: "oTransitionEnd otransitionend",
			transition: "transitionend"
		};

		for (var name in transEndEventNames)
		{
			if (el.style[name] !== undefined)
			{
				return {end: transEndEventNames[name]};
			}
		}

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.emulateTransitionEnd = function (duration)
	{
		var called = false, $el = this;
		$(this).one($.support.transition.end, function ()
		{
			called = true;
		});

		var callback = function ()
		{
			if (!called)
			{
				$($el).trigger($.support.transition.end);
			}
		};
		setTimeout(callback, duration);

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.createUUID = function ()
	{
		var d = new Date().getTime();
		if (window.performance && typeof window.performance.now === "function")
		{
			d += performance.now(); //use high-precision timer if available
		}

		var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c)
		{
			var r = (d + Math.random() * 16) % 16 | 0;
			d = Math.floor(d / 16);

			return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
		});
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.privacyPopup = function ()
	{
		var html = '<div id="privacyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="privacyModal" aria-hidden="true">';
		html += '<div class="modal-dialog" role="document">';
		html += '<div class="modal-content">';
		html += '<div class="modal-header">';
		html += '<h5 class="modal-title">Privacy Protection</h5>';
		html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
		html += '<span aria-hidden="true">&times;</span>';
		html += '</button>';
		html += '</div>';
		html += '<div class="modal-body">';
		html += '<p>';
		html += 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, excepturi, expedita illo in';
		html += 'labore maiores modi mollitia nulla officiis perferendis quam qui quos rem repellendus';
		html += 'repudiandae sapiente temporibus velit vero!';
		html += '</p>';
		html += '<p>';
		html += 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, excepturi, expedita illo in';
		html += 'labore maiores modi mollitia nulla officiis perferendis quam qui quos rem repellendus';
		html += 'repudiandae sapiente temporibus velit vero!';
		html += '</p>';
		html += '</div>';
		html += '<div class="modal-footer">';
		html += '<span class="btn btn-primary" data-dismiss="modal">Close</span>';
		html += '</div>';  // content
		html += '</div>';  // dialog
		html += '</div>';  // footer
		html += '</div>';  // modalWindow
		$('body').append(html);
		$("#privacyModal").modal('show');

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.showVersion = function ()
	{
		$("#hyperCubeVersion").html(HyperCube.hyperCubeVersion);

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.scrollUp = function ()
	{
		$(".main-scroller").slimScroll({scrollTo: "0px", animate: true});

		return false;
	};

	/*-----------------------------------------------------------------------------------------------*/

	HyperCube.hyperCubeVersion = "1.4.130";
})(window, document, jQuery, HyperCube || {});