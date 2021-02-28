!function (t)
{
	"use strict";

	function e(t)
	{
		return null !== t && t === t.window;
	}

	function n(t)
	{
		return e(t) ? t : 9 === t.nodeType && t.defaultView;
	}

	function a(t)
	{
		var e, a, i = {top: 0, left: 0}, o = t && t.ownerDocument;
		return e = o.documentElement, "undefined" != typeof t.getBoundingClientRect && (i = t.getBoundingClientRect()), a = n(o), {
			top: i.top + a.pageYOffset - e.clientTop,
			left: i.left + a.pageXOffset - e.clientLeft
		};
	}

	function i(t)
	{
		var e = "";
		for (var n in t)
		{
			t.hasOwnProperty(n) && (e += n + ":" + t[n] + ";");
		}
		return e;
	}

	function o(t)
	{
		if (d.allowEvent(t) === !1)
		{
			return null;
		}
		for (var e = null, n = t.target || t.srcElement; null !== n.parentElement;)
		{
			if (!(n instanceof SVGElement || -1 === n.className.indexOf("waves-effect")))
			{
				e = n;
				break;
			}
			if (n.classList.contains("waves-effect"))
			{
				e = n;
				break;
			}
			n = n.parentElement;
		}
		return e;
	}

	function r(e)
	{
		var n = o(e);
		null !== n && (c.show(e, n), "ontouchstart" in t && (n.addEventListener("touchend", c.hide, !1), n.addEventListener("touchcancel", c.hide, !1)), n.addEventListener("mouseup", c.hide, !1), n.addEventListener("mouseleave", c.hide, !1));
	}
}(window);