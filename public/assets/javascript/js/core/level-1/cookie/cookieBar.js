/*!
 * Cookie Bar component (https://github.com/kovarp/jquery.cookieBar)
 * Version 1.2.0
 *
 * Copyright 2018 Pavel Kovář - Frontend developer [www.pavelkovar.cz]
 * @license: MIT (https://github.com/kovarp/jquery.cookieBar/blob/master/LICENSE)
 */

if (typeof jQuery === 'undefined') {
	throw new Error('Cookie Bar component requires jQuery')
}

/**
 * ------------------------------------------------------------------------
 * Cookie Bar component
 * ------------------------------------------------------------------------
 */

(function ($)
{
	// Global variables
	var cookieBar, config;

	// Cookie Bar translations
	var translation = [];

	translation['en'] = {
		message:     'We use cookies to provide our services. By using this website, you agree to this.',
		acceptText:  'OK',
		infoText:    'More information',
		privacyText: 'Privacy protection'
	};

	translation['sl'] = {
		message:     'Za zagotavljanje naših storitev uporabljamo piškotke. Z uporabo te spletne strani se strinjate s tem.',
		acceptText:  'V redu',
		infoText:    'Več Informacij',
		privacyText: 'Varstvo zasebnosti'
	};

	translation['de'] = {
		message:     'Zur Bereitstellung von Diensten verwenden wir Cookies. Durch die Nutzung dieser Website stimmen Sie zu.',
		acceptText:  'OK',
		infoText:    'Mehr Informationen',
		privacyText: 'Datenschutz'
	};

	translation['cs'] = {
		message:     'K poskytování služeb využíváme soubory cookie. Používáním tohoto webu s&nbsp;tím souhlasíte.',
		acceptText:  'V pořádku',
		infoText:    'Více informací',
		privacyText: 'Ochrana soukromí'
	};

	translation['sk'] = {
		message:     'Na poskytovanie služieb využívame súbory cookie. Používaním tohto webu s&nbsp;tým súhlasíte.',
		acceptText:  'V poriadku',
		infoText:    'Viac informácií',
		privacyText: 'Ochrana súkromia'
	};

	translation['ru'] = {
		message:     'Данный сайт использует для предоставления услуг, персонализации объявлений и анализа трафика печенье. Используя этот сайт, вы соглашаетесь.',
		acceptText:  'Я согласен',
		infoText:    'Больше информации',
		privacyText: 'Конфиденциальность'
	};

	var methods	= {
		init : function(options) {
			cookieBar = '#cookie-bar';

			var defaults = {
				infoLink:       'https://www.google.com/policies/technologies/cookies/',
				infoTarget:     '_blank',
				wrapper:        'body',
				expireDays:     365,
				style:          'top',
				language:       $('html').attr('lang') || 'en',
				privacy:        false,
				privacyTarget:  '_blank',
				privacyContent: null
			};

			config = $.extend(defaults, options);

			if(methods.getCookie('hyperCube') !== 'accepted')
			{
				methods.displayBar();
			}

			// Accept cookies
			$(document).on('click', cookieBar + ' .cookie-bar__btn', function(e) {
				e.preventDefault();

				methods.setCookie('hyperCube', 'accepted', config.expireDays);

				$.profile.start();

				HyperCube.getCookie();

				$('#top, #bottom, #right, #left, #main-wrapper').unblock();

				// Template setup
				jQuery(document.body).applyTemplateSetup();

				$.profile.done();

				methods.hideBar();
			});

			// Open privacy info popup
			$(document).on('click', '[data-toggle="cookieBarPrivacyPopup"]', function(e) {
				e.preventDefault();

				methods.showPopup();
			});

			// Close privacy info popup
			$(document).on('click', '.cookie-bar-privacy-popup, .cookie-bar-privacy-popup__dialog__close', function(e) {
				methods.hidePopup();
			});

			$(document).on('click', '.cookie-bar-privacy-popup__dialog', function(e) {
				e.stopPropagation();
			});
		},
		displayBar : function() {
			// Display Cookie Bar on page
			var acceptButton = '<button type="button" class="cookie-bar__btn">' + translation[config.language].acceptText + '</button>';
			var infoLink = '<a href="' + config.infoLink + '" target="' + config.infoTarget + '" class="cookie-bar__link cookie-bar__link--cookies-info">' + translation[config.language].infoText + '</a>';

			var privacyButton = '';
			if (config.privacy)
			{
				if (config.privacy === 'link')
				{
					privacyButton = '<a href="' + config.privacyContent + '" target="' + config.privacyTarget + '" class="cookie-bar__link cookie-bar__link--privacy-info">' + translation[config.language].privacyText + '</a>';
				}
				else if (config.privacy === 'bs_modal')
				{
					privacyButton = '<a href="#" onclick="HyperCube.privacyPopup();" class="cookie-bar__link cookie-bar__link--privacy-info">' + translation[config.language].privacyText + '</a>';
				}
				else if (config.privacy === 'popup')
				{
					methods.renderPopup();
					privacyButton = '<a href="#" data-toggle="cookieBarPrivacyPopup" class="cookie-bar__link cookie-bar__link--privacy-info">' + translation[config.language].privacyText + '</a>';
				}
			}

			var template = '<div id="cookie-bar" class="cookie-bar cookie-bar--' + config.style + '"><div class="cookie-bar__inner"><span class="cookie-bar__message">' + translation[config.language].message + '</span><span class="cookie-bar__buttons">' + acceptButton + infoLink + privacyButton + '</span></div></div>';

			$(config.wrapper).prepend(template);
		},
		hideBar : function() {
			// Hide Cookie Bar
			$(cookieBar).slideUp();
		},
		renderPopup : function()
		{
			var popup = $('<div id="cookieBarPrivacyPopup" class="cookie-bar-privacy-popup cookie-bar-privacy-popup--hidden"><div class="cookie-bar-privacy-popup__dialog"><button type="button" class="cookie-bar-privacy-popup__dialog__close"></button></div></div>');
			$('body').append(popup);
			$('.cookie-bar-privacy-popup__dialog', popup).append(config.privacyContent);
		},
		showPopup : function() {
			$('#cookieBarPrivacyPopup').removeClass('cookie-bar-privacy-popup--hidden');
		},
		hidePopup : function() {
			$('#cookieBarPrivacyPopup').addClass('cookie-bar-privacy-popup--hidden');
		},
		addTranslation : function(lang, translate) {
			translation[lang] = translate;
		},
		setCookie : function(cname, cvalue, exdays) {
			// Helpful method for set cookies
			var secure = false;
			if (location.protocol === 'https:')
			{
				secure = true;
			}

			const options = {
				expires: 365,
				path: "/",
				secure: secure,
				domain: location.host
			};

			var data = {
				privacy: cvalue,
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

			//$.cookie(cookieName, $.base64("encode", "dark,en,open,open,closed"), options);
			window.Cookies.set(cname, $.base64("encode", JSON.stringify(data), options));
		},
		getCookie : function(cname) {
			// Helpful method for get cookies
			const c = window.Cookies.get(cname);

			if(c)
			{
				var cookieData = $.base64("decode", c);
				var parsed = JSON.parse(cookieData);

				if (parsed.privacy)
				{
					return parsed.privacy;
				}

				return '';
			}

			return '';
		}
	};

	// Create jQuery cookieBar function
	$.cookieBar = function (methodOrOptions) {
		if ( methods[methodOrOptions] ) {
			return methods[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  methodOrOptions + ' does not exist on Cookie Bar component' );
		}
	};
}(jQuery));