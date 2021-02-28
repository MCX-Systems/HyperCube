;(function($)
{
	"use strict";
	
	// List styles setup
	$.fn.addTemplateSetup(function()
	{
		this.find(".test").html("Test cookie fake data");

		var icons = new Skycons(), list = ["clear-day", "clear-night", "partly-cloudy-day", "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind", "fog"], i;
		for(i = list.length; i--; )
		{
			icons.set(list[i], list[i]);
		}
		icons.play();
	
	}, true);
})(jQuery);