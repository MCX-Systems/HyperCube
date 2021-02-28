/**
 * Timeago is a jQuery plugin that makes it easy to support automatically
 * updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago").
 *
 * @name timeago
 * @version 1.6.3
 * @requires jQuery v1.2.3+
 * @author Ryan McGeary
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 *
 * For usage and examples, visit:
 * http://timeago.yarp.com/
 *
 * Copyright (c) 2008-2017, Ryan McGeary (ryan -[at]- mcgeary [*dot*] org)
 */

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && typeof module.exports === 'object') {
    factory(require('jquery'));
  } else {
    // Browser globals
    factory(jQuery);
  }
}(function ($) {
  $.timeago = function(timestamp) {
    if (timestamp instanceof Date) {
      return inWords(timestamp);
    } else if (typeof timestamp === "string") {
      return inWords($.timeago.parse(timestamp));
    } else if (typeof timestamp === "number") {
      return inWords(new Date(timestamp));
    } else {
      return inWords($.timeago.datetime(timestamp));
    }
  };
  var $t = $.timeago;

  $.extend($.timeago, {
    settings: {
      refreshMillis: 60000,
      allowPast: true,
      allowFuture: false,
      localeTitle: false,
      cutoff: 0,
      autoDispose: true,
      strings: {
        prefixAgo: null,
        prefixFromNow: null,
        suffixAgo: "ago",
        suffixFromNow: "from now",
        inPast: 'any moment now',
        seconds: "less than a minute",
        minute: "about a minute",
        minutes: "%d minutes",
        hour: "about an hour",
        hours: "about %d hours",
        day: "a day",
        days: "%d days",
        month: "about a month",
        months: "%d months",
        year: "about a year",
        years: "%d years",
        wordSeparator: " ",
        numbers: []
      }
    },

    inWords: function(distanceMillis) {
      if (!this.settings.allowPast && ! this.settings.allowFuture) {
          throw 'timeago allowPast and allowFuture settings can not both be set to false.';
      }

      var $l = this.settings.strings;
      var prefix = $l.prefixAgo;
      var suffix = $l.suffixAgo;
      if (this.settings.allowFuture) {
        if (distanceMillis < 0) {
          prefix = $l.prefixFromNow;
          suffix = $l.suffixFromNow;
        }
      }

      if (!this.settings.allowPast && distanceMillis >= 0) {
        return this.settings.strings.inPast;
      }

      var seconds = Math.abs(distanceMillis) / 1000;
      var minutes = seconds / 60;
      var hours = minutes / 60;
      var days = hours / 24;
      var years = days / 365;

      function substitute(stringOrFunction, number) {
        var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
        var value = ($l.numbers && $l.numbers[number]) || number;
        return string.replace(/%d/i, value);
      }

      var words = seconds < 45 && substitute($l.seconds, Math.round(seconds)) ||
        seconds < 90 && substitute($l.minute, 1) ||
        minutes < 45 && substitute($l.minutes, Math.round(minutes)) ||
        minutes < 90 && substitute($l.hour, 1) ||
        hours < 24 && substitute($l.hours, Math.round(hours)) ||
        hours < 42 && substitute($l.day, 1) ||
        days < 30 && substitute($l.days, Math.round(days)) ||
        days < 45 && substitute($l.month, 1) ||
        days < 365 && substitute($l.months, Math.round(days / 30)) ||
        years < 1.5 && substitute($l.year, 1) ||
        substitute($l.years, Math.round(years));

      var separator = $l.wordSeparator || "";
      if ($l.wordSeparator === undefined) { separator = " "; }
      return $.trim([prefix, words, suffix].join(separator));
    },

    parse: function(iso8601) {
      var s = $.trim(iso8601);
      s = s.replace(/\.\d+/,""); // remove milliseconds
      s = s.replace(/-/,"/").replace(/-/,"/");
      s = s.replace(/T/," ").replace(/Z/," UTC");
      s = s.replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2"); // -04:00 -> -0400
      s = s.replace(/([\+\-]\d\d)$/," $100"); // +09 -> +0900
      return new Date(s);
    },
    datetime: function(elem) {
      var iso8601 = $t.isTime(elem) ? $(elem).attr("datetime") : $(elem).attr("title");
      return $t.parse(iso8601);
    },
    isTime: function(elem) {
      // jQuery's `is()` doesn't play well with HTML5 in IE
      return $(elem).get(0).tagName.toLowerCase() === "time"; // $(elem).is("time");
    }
  });

  // functions that can be called via $(el).timeago('action')
  // init is default when no action is given
  // functions are called with context of a single element
  var functions = {
    init: function() {
      functions.dispose.call(this);
      var refresh_el = $.proxy(refresh, this);
      refresh_el();
      var $s = $t.settings;
      if ($s.refreshMillis > 0) {
        this._timeagoInterval = setInterval(refresh_el, $s.refreshMillis);
      }
    },
    update: function(timestamp) {
      var date = (timestamp instanceof Date) ? timestamp : $t.parse(timestamp);
      $(this).data('timeago', { datetime: date });
      if ($t.settings.localeTitle) {
        $(this).attr("title", date.toLocaleString());
      }
      refresh.apply(this);
    },
    updateFromDOM: function() {
      $(this).data('timeago', { datetime: $t.parse( $t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title") ) });
      refresh.apply(this);
    },
    dispose: function () {
      if (this._timeagoInterval) {
        window.clearInterval(this._timeagoInterval);
        this._timeagoInterval = null;
      }
    }
  };

  $.fn.timeago = function(action, options) {
    var fn = action ? functions[action] : functions.init;
    if (!fn) {
      throw new Error("Unknown function name '"+ action +"' for timeago");
    }
    // each over objects here and call the requested function
    this.each(function() {
      fn.call(this, options);
    });
    return this;
  };

  function refresh() {
    var $s = $t.settings;

    //check if it's still visible
    if ($s.autoDispose && !$.contains(document.documentElement,this)) {
      //stop if it has been removed
      $(this).timeago("dispose");
      return this;
    }

    var data = prepareData(this);

    if (!isNaN(data.datetime)) {
      if ( $s.cutoff === 0 || Math.abs(distance(data.datetime)) < $s.cutoff) {
        $(this).text(inWords(data.datetime));
      } else {
        if ($(this).attr('title').length > 0) {
            $(this).text($(this).attr('title'));
        }
      }
    }
    return this;
  }

  function prepareData(element) {
    element = $(element);
    if (!element.data("timeago")) {
      element.data("timeago", { datetime: $t.datetime(element) });
      var text = $.trim(element.text());
      if ($t.settings.localeTitle) {
        element.attr("title", element.data('timeago').datetime.toLocaleString());
      } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
        element.attr("title", text);
      }
    }
    return element.data("timeago");
  }

  function inWords(date) {
    return $t.inWords(distance(date));
  }

  function distance(date) {
    return (new Date().getTime() - date.getTime());
  }

  // fix for IE6 suckage
  document.createElement("abbr");
  document.createElement("time");
}));

/*! jQuery Session Timeout - v0.1.0 - 2012-06-30
* https://github.com/asabaylus/jQuery-sessionTimeout
* Copyright (c) 2012 Asa Baylus; Licensed MIT, GPL */

(function ($) {

    var defaults,
        methods,
        logEvent,
        $global = {},
        _log = [], // contains plugin history
        _start = new Date(),
        _resourceId = 'sessionTimeout_' + _start.getTime(),
        _version = "0.0.1",
        _ready,
        _sessionTimeout,
        _beforeTimeout;

    $.fn.sessionTimeout = function (options, method) {


        // set plugin defaults
        defaults = {
            autoping : true,
            timeout : 3600000, // set the servers session timeout 1 hour
            resource: "https://hypercube.si/assets/favicon/favicon.ico", // set the asset to load from the server
            promptfor: 600000, // triggers beforetimeout 10 minutes before session timeout
            beforetimeout: $.noop, // callback which occurs prior to session timeout
            ontimeout : $.noop // callback which occurs upon session timeout
        };

        methods = {


            /**
             * Initializes the plugin
             * @return {void}
             * @private
             */
            _init: function () {

                // reset the session timer
                window.clearInterval(_sessionTimeout);

                // start counting down to session timeout
                _sessionTimeout = window.setInterval(function () {

                    // if autoping is not true session will eventualy timeout
                    if (options.autoping === false) { 

                        // handle the ontimeout callback
                        // first check that a function was passed in
                        if ($.isFunction(options.ontimeout)) {
                            options.ontimeout.call(this);
                            // stop the session timer
                            window.clearInterval(_sessionTimeout);
                            var d = new Date();
                            logEvent("$.fn.sessionTimeout status: session expired @" + d.toTimeString());
                            $(document).trigger('expired.sessionTimeout');

                        }
                        else {
                            $.error('The jQuery.sessionTimeout ontimeout parameter is expecting a function');
                        }

                    }
                    // if autoping is true,
                    // when countdown is complete ping the sever
                    else {
                        methods.ping.apply(this, arguments);
                    }               

                }, options.timeout); 
                
                // only run before time if autoping is not true
                if (!options.autoping) {
                    _beforeTimeout = window.setTimeout(function () {
                        var d = new Date();
                        logEvent("$.fn.sessionTimeout status: beforeTimeout triggered @" + d.toTimeString());
                        if ($.isFunction(options.beforetimeout)) {
                            options.beforetimeout.call(this);
                        } else {
                            $.error("The jQuery.sessionTimeout beforetimeout parameter is expecting a function");
                        }
                        $(document).trigger("prompt.sessionTimeout");   
                    }, options.timeout - options.promptfor);
                }
                
                // get the load time for plugin ready
                _ready = new Date();                
                logEvent("$.fn.sessionTimeout status: initialized");
                $(document).trigger("create.sessionTimeout", [_version, _start, (_ready - _start)]);
            },
            
            /**
             * Requests a file from target server
             * @return {void}
             * @public
             */
            ping: function () {

                var t = new Date(),
                    tstamp = t.getTime();


                // ping the server to keep alive
                // thanks to Jake Opines
                // http://www.atalasoft.com/cs/blogs/jake/archive/2008/12/19/creating-a-simple-ajax-sessionTimeout.aspx 
                // see http://docs.jquery.com/Release:jQuery_1.2/Internals for unique ids

                // if plugin was not initialized throw an error
                if (typeof _sessionTimeout === "undefined") {
                    $.error('Initialize $.fn.sessionTimeout before invoking method "ping".');
                    return;
                }

                // renew the session
                methods._fetch.apply();             
                logEvent("$.fn.sessionTimeout status: session restarted @ " + t.toTimeString());
                $(document).trigger("ping.sessionTimeout");
                
            },
            
            
            /**
             * Loads resource, PHP, ASPX, CFM, JSP or Image file etc
             * @return {void}
             * @private
             */
            _fetch: function () {

                var d = new Date(),
                    tstamp = d.getTime(),
                    reFileName = /^(.+)\.([^\.]*)?$/,
                    reImageExt = /^jpg|jpeg|png|gif|bmp$/,
                    file = options.resource.match(reFileName),
                    extension = file[2],
                    isImage = reImageExt.test(extension);

                // loads the resource used to ping target server
                // if the resource dosnt exist
                if (!$("#" + _resourceId).length) {


                    // handle loading the resource the first time
                    if (isImage) {
                        // get an image with a unique id
                        // fetching the image will keep the server from timeing out
                        // it's important that the file has a defined
                        // filesize ex no includes or scripts
                        $("body").append("<img id='" + _resourceId + "' src='" + options.resource + "?tstamp=" + tstamp  + "' style='position: \"absolute\", height: \"1px\", width: \"1px\"' alt='web page session management helper'>");
                    } else {
                        $("body").append("<iframe id='" + _resourceId + "' src='" + options.resource + "?tstamp=" + tstamp  + "' style='position: \"absolute\", height: \"1px\", width: \"1px\", display: \"none\"' alt='web page session management helper'></iframe>");
                    }

                } 
                else {

                    $("#" + _resourceId).attr("src", options.resource + "?timestamp=" + tstamp);
                }
            
            },
            
            
            /**
             * Callback function occurs when promt begins
             * @return {void}
             * @private
             */
            _beforeTimeout: function () {

                // if beforeTimeout is a function then start countdown to user prompt
                if ($.isFunction(options.beforetimeout)) {
                    _beforeTimeout = window.setTimeout(function () {
                        var d = new Date();
                        logEvent("$.fn.sessionTimeout status: beforeTimeout triggered @" + d.toTimeString());
                
                        options.beforetimeout.call(this);
                        $(document).trigger("prompt.sessionTimeout");   

                    }, options.timeout - options.promptfor);
                }
                else {
                    $.error("The jQuery.sessionTimeout beforetimeout parameter is expecting a function");
                }

            },


            /**
             * Returns session duration (ms)
             * @return {number}
             * @public
             */
            duration : function () {
                logEvent("$.fn.sessionTimeout status: duration " + options.timeout);
                return options.timeout;
            },



            /**
             * Returns time elapsed since session began
             * @return {date}
             * @public
             */
            elapsed : function () {
                var d = new Date() - _ready;                
                logEvent("$.fn.sessionTimeout status: elapsed " + d + " ms");
                return d;
            },
            
            

            /**
             * Returns time remaining before session expires
             * @return {date}
             * @public
             */         
            remaining : function () {
                var currentTime = new Date(),
                    expiresTime = new Date(_ready.getTime() + options.timeout),
                    // time until session expires in ms
                    // use 0 if no time session has already expired
                    remainingTime = (expiresTime - currentTime) > 0 ? expiresTime - currentTime : 0;
                logEvent("$.fn.sessionTimeout status: remaining " + remainingTime + " ms");
                return remainingTime;

            },


            /**
             * Resets plugin to default state
             * @return {void}
             * @public
             */
            destroy : function () {
                // before running cleanup check for plugin init
                if (typeof _ready !== "undefined") {
                    // remove ping image from DOM
                    $("#" + _resourceId).remove();
                    window.clearInterval(_sessionTimeout);
                    window.clearTimeout(_beforeTimeout);
                    _ready = undefined;         
                    logEvent("$.fn.sessionTimeout status: destroy");
                    $(document).trigger("destroy.sessionTimeout");          
                    // unbind all sessionTimeout events
                    $(document).unbind("sessionTimeout");
                    // delete the log
                    _log.length = 0;
                } else {
                    $.error("Could not destroy, initialize the plugin before calling destroy.");    
                }
            },
            
            

            /**
             * Returns log of plugin events
             * @return {array}
             * @public
             */         
            printLog : function () {
                // returns an array of all logged events
                return _log;

            }
        };


        // if the user specified an option which is also
        // a method then copy the options into the methods
        // this allow directly invoking a method like so 
        // $.fn.sessionTimeout("destroy");
        if (methods[options]) {
            method = options;
        }
        
        // set the options
        //options = $.extend(defaults, options);
        // thanks @ssoper   
        $.extend($global, options);
        options = $.extend(defaults, $global);


        // Method calling logic
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || ! method) {
            return methods._init.apply(this, arguments);
        } else {
            $.error('Method ' +  method + ' does not exist on jQuery.sessionTimeout');
        }


        // log event records events into an array
        // *note log event must occur before triggering the bindings
        function logEvent(str) {
            _log.push(str);
            $(document).trigger("eventLogged.sessionTimeout");
        }

        return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
    };


}(jQuery));
(function() {

  var AjaxMonitor, Bar, DocumentMonitor, ElementMonitor, ElementTracker, EventLagMonitor, Evented, Events, NoTargetError, Pace, RequestIntercept, SOURCE_KEYS, Scaler, SocketRequestTracker, XHRRequestTracker, animation, avgAmplitude, bar, cancelAnimation, cancelAnimationFrame, defaultOptions, extend, extendNative, getFromDOM, getIntercept, handlePushState, ignoreStack, init, now, options, requestAnimationFrame, result, runAnimation, scalers, shouldIgnoreURL, shouldTrack, source, sources, uniScaler, _WebSocket, _XDomainRequest, _XMLHttpRequest, _i, _intercept, _len, _pushState, _ref, _ref1, _replaceState,

    __slice = [].slice,

    __hasProp = {}.hasOwnProperty,

    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },

    __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };



  defaultOptions = {

    catchupTime: 100,

    initialRate: .03,

    minTime: 250,

    ghostTime: 100,

    maxProgressPerFrame: 20,

    easeFactor: 1.25,

    startOnPageLoad: true,

    restartOnPushState: true,

    restartOnRequestAfter: 500,

    target: 'body',

    elements: {

      checkInterval: 100,

      selectors: ['body']

    },

    eventLag: {

      minSamples: 10,

      sampleCount: 3,

      lagThreshold: 3

    },

    ajax: {

      trackMethods: ['GET'],

      trackWebSockets: true,

      ignoreURLs: []

    }

  };



  now = function() {

    var _ref;

    return (_ref = typeof performance !== "undefined" && performance !== null ? typeof performance.now === "function" ? performance.now() : void 0 : void 0) != null ? _ref : +(new Date);

  };



  requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;



  cancelAnimationFrame = window.cancelAnimationFrame || window.mozCancelAnimationFrame;



  if (requestAnimationFrame == null) {

    requestAnimationFrame = function(fn) {

      return setTimeout(fn, 50);

    };

    cancelAnimationFrame = function(id) {

      return clearTimeout(id);

    };

  }



  runAnimation = function(fn) {

    var last, tick;

    last = now();

    tick = function() {

      var diff;

      diff = now() - last;

      if (diff >= 33) {

        last = now();

        return fn(diff, function() {

          return requestAnimationFrame(tick);

        });

      } else {

        return setTimeout(tick, 33 - diff);

      }

    };

    return tick();

  };



  result = function() {

    var args, key, obj;

    obj = arguments[0], key = arguments[1], args = 3 <= arguments.length ? __slice.call(arguments, 2) : [];

    if (typeof obj[key] === 'function') {

      return obj[key].apply(obj, args);

    } else {

      return obj[key];

    }

  };



  extend = function() {

    var key, out, source, sources, val, _i, _len;

    out = arguments[0], sources = 2 <= arguments.length ? __slice.call(arguments, 1) : [];

    for (_i = 0, _len = sources.length; _i < _len; _i++) {

      source = sources[_i];

      if (source) {

        for (key in source) {

          if (!__hasProp.call(source, key)) continue;

          val = source[key];

          if ((out[key] != null) && typeof out[key] === 'object' && (val != null) && typeof val === 'object') {

            extend(out[key], val);

          } else {

            out[key] = val;

          }

        }

      }

    }

    return out;

  };



  avgAmplitude = function(arr) {

    var count, sum, v, _i, _len;

    sum = count = 0;

    for (_i = 0, _len = arr.length; _i < _len; _i++) {

      v = arr[_i];

      sum += Math.abs(v);

      count++;

    }

    return sum / count;

  };



  getFromDOM = function(key, json) {

    var data, e, el;

    if (key == null) {

      key = 'options';

    }

    if (json == null) {

      json = true;

    }

    el = document.querySelector("[data-pace-" + key + "]");

    if (!el) {

      return;

    }

    data = el.getAttribute("data-pace-" + key);

    if (!json) {

      return data;

    }

    try {

      return JSON.parse(data);

    } catch (_error) {

      e = _error;

      return typeof console !== "undefined" && console !== null ? console.error("Error parsing inline pace options", e) : void 0;

    }

  };



  Evented = (function() {

    function Evented() {}



    Evented.prototype.on = function(event, handler, ctx, once) {

      var _base;

      if (once == null) {

        once = false;

      }

      if (this.bindings == null) {

        this.bindings = {};

      }

      if ((_base = this.bindings)[event] == null) {

        _base[event] = [];

      }

      return this.bindings[event].push({

        handler: handler,

        ctx: ctx,

        once: once

      });

    };



    Evented.prototype.once = function(event, handler, ctx) {

      return this.on(event, handler, ctx, true);

    };



    Evented.prototype.off = function(event, handler) {

      var i, _ref, _results;

      if (((_ref = this.bindings) != null ? _ref[event] : void 0) == null) {

        return;

      }

      if (handler == null) {

        return delete this.bindings[event];

      } else {

        i = 0;

        _results = [];

        while (i < this.bindings[event].length) {

          if (this.bindings[event][i].handler === handler) {

            _results.push(this.bindings[event].splice(i, 1));

          } else {

            _results.push(i++);

          }

        }

        return _results;

      }

    };



    Evented.prototype.trigger = function() {

      var args, ctx, event, handler, i, once, _ref, _ref1, _results;

      event = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];

      if ((_ref = this.bindings) != null ? _ref[event] : void 0) {

        i = 0;

        _results = [];

        while (i < this.bindings[event].length) {

          _ref1 = this.bindings[event][i], handler = _ref1.handler, ctx = _ref1.ctx, once = _ref1.once;

          handler.apply(ctx != null ? ctx : this, args);

          if (once) {

            _results.push(this.bindings[event].splice(i, 1));

          } else {

            _results.push(i++);

          }

        }

        return _results;

      }

    };



    return Evented;



  })();



  Pace = window.Pace || {};



  window.Pace = Pace;



  extend(Pace, Evented.prototype);



  options = Pace.options = extend({}, defaultOptions, window.paceOptions, getFromDOM());



  _ref = ['ajax', 'document', 'eventLag', 'elements'];

  for (_i = 0, _len = _ref.length; _i < _len; _i++) {

    source = _ref[_i];

    if (options[source] === true) {

      options[source] = defaultOptions[source];

    }

  }



  NoTargetError = (function(_super) {

    __extends(NoTargetError, _super);



    function NoTargetError() {

      _ref1 = NoTargetError.__super__.constructor.apply(this, arguments);

      return _ref1;

    }



    return NoTargetError;



  })(Error);



  Bar = (function() {

    function Bar() {

      this.progress = 0;

    }



    Bar.prototype.getElement = function() {

      var targetElement;

      if (this.el == null) {

        targetElement = document.querySelector(options.target);

        if (!targetElement) {

          throw new NoTargetError;

        }

        this.el = document.createElement('div');

        this.el.className = "pace pace-active";

        document.body.className = document.body.className.replace(/pace-done/g, '');

        document.body.className += ' pace-running';

        this.el.innerHTML = '<div class="pace-progress">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>';

        if (targetElement.firstChild != null) {

          targetElement.insertBefore(this.el, targetElement.firstChild);

        } else {

          targetElement.appendChild(this.el);

        }

      }

      return this.el;

    };



    Bar.prototype.finish = function() {

      var el;

      el = this.getElement();

      el.className = el.className.replace('pace-active', '');

      el.className += ' pace-inactive';

      document.body.className = document.body.className.replace('pace-running', '');

      return document.body.className += ' pace-done';

    };



    Bar.prototype.update = function(prog) {

      this.progress = prog;

      return this.render();

    };



    Bar.prototype.destroy = function() {

      try {

        this.getElement().parentNode.removeChild(this.getElement());

      } catch (_error) {

        NoTargetError = _error;

      }

      return this.el = void 0;

    };



    Bar.prototype.render = function() {

      var el, key, progressStr, transform, _j, _len1, _ref2;

      if (document.querySelector(options.target) == null) {

        return false;

      }

      el = this.getElement();

      transform = "translate3d(" + this.progress + "%, 0, 0)";

      _ref2 = ['webkitTransform', 'msTransform', 'transform'];

      for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {

        key = _ref2[_j];

        el.children[0].style[key] = transform;

      }

      if (!this.lastRenderedProgress || this.lastRenderedProgress | 0 !== this.progress | 0) {

        el.children[0].setAttribute('data-progress-text', "" + (this.progress | 0) + "%");

        if (this.progress >= 100) {

          progressStr = '99';

        } else {

          progressStr = this.progress < 10 ? "0" : "";

          progressStr += this.progress | 0;

        }

        el.children[0].setAttribute('data-progress', "" + progressStr);

      }

      return this.lastRenderedProgress = this.progress;

    };



    Bar.prototype.done = function() {

      return this.progress >= 100;

    };



    return Bar;



  })();



  Events = (function() {

    function Events() {

      this.bindings = {};

    }



    Events.prototype.trigger = function(name, val) {

      var binding, _j, _len1, _ref2, _results;

      if (this.bindings[name] != null) {

        _ref2 = this.bindings[name];

        _results = [];

        for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {

          binding = _ref2[_j];

          _results.push(binding.call(this, val));

        }

        return _results;

      }

    };



    Events.prototype.on = function(name, fn) {

      var _base;

      if ((_base = this.bindings)[name] == null) {

        _base[name] = [];

      }

      return this.bindings[name].push(fn);

    };



    return Events;



  })();



  _XMLHttpRequest = window.XMLHttpRequest;



  _XDomainRequest = window.XDomainRequest;



  _WebSocket = window.WebSocket;



  extendNative = function(to, from) {

    var e, key, _results;

    _results = [];

    for (key in from.prototype) {

      try {

        if ((to[key] == null) && typeof from[key] !== 'function') {

          if (typeof Object.defineProperty === 'function') {

            _results.push(Object.defineProperty(to, key, {

              get: function() {

                return from.prototype[key];

              },

              configurable: true,

              enumerable: true

            }));

          } else {

            _results.push(to[key] = from.prototype[key]);

          }

        } else {

          _results.push(void 0);

        }

      } catch (_error) {

        e = _error;

      }

    }

    return _results;

  };



  ignoreStack = [];



  Pace.ignore = function() {

    var args, fn, ret;

    fn = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];

    ignoreStack.unshift('ignore');

    ret = fn.apply(null, args);

    ignoreStack.shift();

    return ret;

  };



  Pace.track = function() {

    var args, fn, ret;

    fn = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];

    ignoreStack.unshift('track');

    ret = fn.apply(null, args);

    ignoreStack.shift();

    return ret;

  };



  shouldTrack = function(method) {

    var _ref2;

    if (method == null) {

      method = 'GET';

    }

    if (ignoreStack[0] === 'track') {

      return 'force';

    }

    if (!ignoreStack.length && options.ajax) {

      if (method === 'socket' && options.ajax.trackWebSockets) {

        return true;

      } else if (_ref2 = method.toUpperCase(), __indexOf.call(options.ajax.trackMethods, _ref2) >= 0) {

        return true;

      }

    }

    return false;

  };



  RequestIntercept = (function(_super) {

    __extends(RequestIntercept, _super);



    function RequestIntercept() {

      var monitorXHR,

        _this = this;

      RequestIntercept.__super__.constructor.apply(this, arguments);

      monitorXHR = function(req) {

        var _open;

        _open = req.open;

        return req.open = function(type, url, async) {

          if (shouldTrack(type)) {

            _this.trigger('request', {

              type: type,

              url: url,

              request: req

            });

          }

          return _open.apply(req, arguments);

        };

      };

      window.XMLHttpRequest = function(flags) {

        var req;

        req = new _XMLHttpRequest(flags);

        monitorXHR(req);

        return req;

      };

      try {

        extendNative(window.XMLHttpRequest, _XMLHttpRequest);

      } catch (_error) {}

      if (_XDomainRequest != null) {

        window.XDomainRequest = function() {

          var req;

          req = new _XDomainRequest;

          monitorXHR(req);

          return req;

        };

        try {

          extendNative(window.XDomainRequest, _XDomainRequest);

        } catch (_error) {}

      }

      if ((_WebSocket != null) && options.ajax.trackWebSockets) {

        window.WebSocket = function(url, protocols) {

          var req;

          if (protocols != null) {

            req = new _WebSocket(url, protocols);

          } else {

            req = new _WebSocket(url);

          }

          if (shouldTrack('socket')) {

            _this.trigger('request', {

              type: 'socket',

              url: url,

              protocols: protocols,

              request: req

            });

          }

          return req;

        };

        try {

          extendNative(window.WebSocket, _WebSocket);

        } catch (_error) {}

      }

    }



    return RequestIntercept;



  })(Events);



  _intercept = null;



  getIntercept = function() {

    if (_intercept == null) {

      _intercept = new RequestIntercept;

    }

    return _intercept;

  };



  shouldIgnoreURL = function(url) {

    var pattern, _j, _len1, _ref2;

    _ref2 = options.ajax.ignoreURLs;

    for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {

      pattern = _ref2[_j];

      if (typeof pattern === 'string') {

        if (url.indexOf(pattern) !== -1) {

          return true;

        }

      } else {

        if (pattern.test(url)) {

          return true;

        }

      }

    }

    return false;

  };



  getIntercept().on('request', function(_arg) {

    var after, args, request, type, url;

    type = _arg.type, request = _arg.request, url = _arg.url;

    if (shouldIgnoreURL(url)) {

      return;

    }

    if (!Pace.running && (options.restartOnRequestAfter !== false || shouldTrack(type) === 'force')) {

      args = arguments;

      after = options.restartOnRequestAfter || 0;

      if (typeof after === 'boolean') {

        after = 0;

      }

      return setTimeout(function() {

        var stillActive, _j, _len1, _ref2, _ref3, _results;

        if (type === 'socket') {

          stillActive = request.readyState < 2;

        } else {

          stillActive = (0 < (_ref2 = request.readyState) && _ref2 < 4);

        }

        if (stillActive) {

          Pace.restart();

          _ref3 = Pace.sources;

          _results = [];

          for (_j = 0, _len1 = _ref3.length; _j < _len1; _j++) {

            source = _ref3[_j];

            if (source instanceof AjaxMonitor) {

              source.watch.apply(source, args);

              break;

            } else {

              _results.push(void 0);

            }

          }

          return _results;

        }

      }, after);

    }

  });



  AjaxMonitor = (function() {

    function AjaxMonitor() {

      var _this = this;

      this.elements = [];

      getIntercept().on('request', function() {

        return _this.watch.apply(_this, arguments);

      });

    }



    AjaxMonitor.prototype.watch = function(_arg) {

      var request, tracker, type, url;

      type = _arg.type, request = _arg.request, url = _arg.url;

      if (shouldIgnoreURL(url)) {

        return;

      }

      if (type === 'socket') {

        tracker = new SocketRequestTracker(request);

      } else {

        tracker = new XHRRequestTracker(request);

      }

      return this.elements.push(tracker);

    };



    return AjaxMonitor;



  })();



  XHRRequestTracker = (function() {

    function XHRRequestTracker(request) {

      var event, size, _j, _len1, _onreadystatechange, _ref2,

        _this = this;

      this.progress = 0;

      if (window.ProgressEvent != null) {

        size = null;

        request.addEventListener('progress', function(evt) {

          if (evt.lengthComputable) {

            return _this.progress = 100 * evt.loaded / evt.total;

          } else {

            return _this.progress = _this.progress + (100 - _this.progress) / 2;

          }

        }, false);

        _ref2 = ['load', 'abort', 'timeout', 'error'];

        for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {

          event = _ref2[_j];

          request.addEventListener(event, function() {

            return _this.progress = 100;

          }, false);

        }

      } else {

        _onreadystatechange = request.onreadystatechange;

        request.onreadystatechange = function() {

          var _ref3;

          if ((_ref3 = request.readyState) === 0 || _ref3 === 4) {

            _this.progress = 100;

          } else if (request.readyState === 3) {

            _this.progress = 50;

          }

          return typeof _onreadystatechange === "function" ? _onreadystatechange.apply(null, arguments) : void 0;

        };

      }

    }



    return XHRRequestTracker;



  })();



  SocketRequestTracker = (function() {

    function SocketRequestTracker(request) {

      var event, _j, _len1, _ref2,

        _this = this;

      this.progress = 0;

      _ref2 = ['error', 'open'];

      for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {

        event = _ref2[_j];

        request.addEventListener(event, function() {

          return _this.progress = 100;

        }, false);

      }

    }



    return SocketRequestTracker;



  })();



  ElementMonitor = (function() {

    function ElementMonitor(options) {

      var selector, _j, _len1, _ref2;

      if (options == null) {

        options = {};

      }

      this.elements = [];

      if (options.selectors == null) {

        options.selectors = [];

      }

      _ref2 = options.selectors;

      for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {

        selector = _ref2[_j];

        this.elements.push(new ElementTracker(selector));

      }

    }



    return ElementMonitor;



  })();



  ElementTracker = (function() {

    function ElementTracker(selector) {

      this.selector = selector;

      this.progress = 0;

      this.check();

    }



    ElementTracker.prototype.check = function() {

      var _this = this;

      if (document.querySelector(this.selector)) {

        return this.done();

      } else {

        return setTimeout((function() {

          return _this.check();

        }), options.elements.checkInterval);

      }

    };



    ElementTracker.prototype.done = function() {

      return this.progress = 100;

    };



    return ElementTracker;



  })();



  DocumentMonitor = (function() {

    DocumentMonitor.prototype.states = {

      loading: 0,

      interactive: 50,

      complete: 100

    };



    function DocumentMonitor() {

      var _onreadystatechange, _ref2,

        _this = this;

      this.progress = (_ref2 = this.states[document.readyState]) != null ? _ref2 : 100;

      _onreadystatechange = document.onreadystatechange;

      document.onreadystatechange = function() {

        if (_this.states[document.readyState] != null) {

          _this.progress = _this.states[document.readyState];

        }

        return typeof _onreadystatechange === "function" ? _onreadystatechange.apply(null, arguments) : void 0;

      };

    }



    return DocumentMonitor;



  })();



  EventLagMonitor = (function() {

    function EventLagMonitor() {

      var avg, interval, last, points, samples,

        _this = this;

      this.progress = 0;

      avg = 0;

      samples = [];

      points = 0;

      last = now();

      interval = setInterval(function() {

        var diff;

        diff = now() - last - 50;

        last = now();

        samples.push(diff);

        if (samples.length > options.eventLag.sampleCount) {

          samples.shift();

        }

        avg = avgAmplitude(samples);

        if (++points >= options.eventLag.minSamples && avg < options.eventLag.lagThreshold) {

          _this.progress = 100;

          return clearInterval(interval);

        } else {

          return _this.progress = 100 * (3 / (avg + 3));

        }

      }, 50);

    }



    return EventLagMonitor;



  })();



  Scaler = (function() {

    function Scaler(source) {

      this.source = source;

      this.last = this.sinceLastUpdate = 0;

      this.rate = options.initialRate;

      this.catchup = 0;

      this.progress = this.lastProgress = 0;

      if (this.source != null) {

        this.progress = result(this.source, 'progress');

      }

    }



    Scaler.prototype.tick = function(frameTime, val) {

      var scaling;

      if (val == null) {

        val = result(this.source, 'progress');

      }

      if (val >= 100) {

        this.done = true;

      }

      if (val === this.last) {

        this.sinceLastUpdate += frameTime;

      } else {

        if (this.sinceLastUpdate) {

          this.rate = (val - this.last) / this.sinceLastUpdate;

        }

        this.catchup = (val - this.progress) / options.catchupTime;

        this.sinceLastUpdate = 0;

        this.last = val;

      }

      if (val > this.progress) {

        this.progress += this.catchup * frameTime;

      }

      scaling = 1 - Math.pow(this.progress / 100, options.easeFactor);

      this.progress += scaling * this.rate * frameTime;

      this.progress = Math.min(this.lastProgress + options.maxProgressPerFrame, this.progress);

      this.progress = Math.max(0, this.progress);

      this.progress = Math.min(100, this.progress);

      this.lastProgress = this.progress;

      return this.progress;

    };



    return Scaler;



  })();



  sources = null;



  scalers = null;



  bar = null;



  uniScaler = null;



  animation = null;



  cancelAnimation = null;



  Pace.running = false;



  handlePushState = function() {

    if (options.restartOnPushState) {

      return Pace.restart();

    }

  };



  if (window.history.pushState != null) {

    _pushState = window.history.pushState;

    window.history.pushState = function() {

      handlePushState();

      return _pushState.apply(window.history, arguments);

    };

  }



  if (window.history.replaceState != null) {

    _replaceState = window.history.replaceState;

    window.history.replaceState = function() {

      handlePushState();

      return _replaceState.apply(window.history, arguments);

    };

  }



  SOURCE_KEYS = {

    ajax: AjaxMonitor,

    elements: ElementMonitor,

    document: DocumentMonitor,

    eventLag: EventLagMonitor

  };



  (init = function() {

    var type, _j, _k, _len1, _len2, _ref2, _ref3, _ref4;

    Pace.sources = sources = [];

    _ref2 = ['ajax', 'elements', 'document', 'eventLag'];

    for (_j = 0, _len1 = _ref2.length; _j < _len1; _j++) {

      type = _ref2[_j];

      if (options[type] !== false) {

        sources.push(new SOURCE_KEYS[type](options[type]));

      }

    }

    _ref4 = (_ref3 = options.extraSources) != null ? _ref3 : [];

    for (_k = 0, _len2 = _ref4.length; _k < _len2; _k++) {

      source = _ref4[_k];

      sources.push(new source(options));

    }

    Pace.bar = bar = new Bar;

    scalers = [];

    return uniScaler = new Scaler;

  })();



  Pace.stop = function() {

    Pace.trigger('stop');

    Pace.running = false;

    bar.destroy();

    cancelAnimation = true;

    if (animation != null) {

      if (typeof cancelAnimationFrame === "function") {

        cancelAnimationFrame(animation);

      }

      animation = null;

    }

    return init();

  };



  Pace.restart = function() {

    Pace.trigger('restart');

    Pace.stop();

    return Pace.start();

  };



  Pace.go = function() {

    var start;

    Pace.running = true;

    bar.render();

    start = now();

    cancelAnimation = false;

    return animation = runAnimation(function(frameTime, enqueueNextFrame) {

      var avg, count, done, element, elements, i, j, remaining, scaler, scalerList, sum, _j, _k, _len1, _len2, _ref2;

      remaining = 100 - bar.progress;

      count = sum = 0;

      done = true;

      for (i = _j = 0, _len1 = sources.length; _j < _len1; i = ++_j) {

        source = sources[i];

        scalerList = scalers[i] != null ? scalers[i] : scalers[i] = [];

        elements = (_ref2 = source.elements) != null ? _ref2 : [source];

        for (j = _k = 0, _len2 = elements.length; _k < _len2; j = ++_k) {

          element = elements[j];

          scaler = scalerList[j] != null ? scalerList[j] : scalerList[j] = new Scaler(element);

          done &= scaler.done;

          if (scaler.done) {

            continue;

          }

          count++;

          sum += scaler.tick(frameTime);

        }

      }

      avg = sum / count;

      bar.update(uniScaler.tick(frameTime, avg));

      if (bar.done() || done || cancelAnimation) {

        bar.update(100);

        Pace.trigger('done');

        return setTimeout(function() {

          bar.finish();

          Pace.running = false;

          return Pace.trigger('hide');

        }, Math.max(options.ghostTime, Math.max(options.minTime - (now() - start), 0)));

      } else {

        return enqueueNextFrame();

      }

    });

  };



  Pace.start = function(_options) {

    extend(options, _options);

    Pace.running = true;

    try {

      bar.render();

    } catch (_error) {

      NoTargetError = _error;

    }

    if (!document.querySelector('.pace')) {

      return setTimeout(Pace.start, 50);

    } else {

      Pace.trigger('start');

      return Pace.go();

    }

  };



  if (typeof define === 'function' && define.amd) {

    define(['pace'], function() {

      return Pace;

    });

  } else if (typeof exports === 'object') {

    module.exports = Pace;

  } else {

    if (options.startOnPageLoad) {

      Pace.start();

    }

  }



}).call(this);
/*! offline-js 0.7.19 */
(function() {
  var Offline, checkXHR, defaultOptions, extendNative, grab, handlers, init;
  extendNative = function(to, from) {
    var key, results, val;
    results = [];
    for (key in from.prototype) try {
      val = from.prototype[key], null == to[key] && "function" != typeof val ? results.push(to[key] = val) :results.push(void 0);
    } catch (_error) {
      _error;
    }
    return results;
  }, Offline = {}, Offline.options = window.Offline ? window.Offline.options || {} :{}, 
  defaultOptions = {
    checks:{
      xhr:{
        url:function() {
	        return "https://hypercube.si/assets/favicon/favicon.ico?_=" + new Date().getTime();
        },
        timeout:5e3,
        type:"HEAD"
      },
      image:{
        url:function() {
	        return "https://hypercube.si/assets/favicon/favicon.ico?_=" + new Date().getTime();
        }
      },
      active:"xhr"
    },
    checkOnLoad:!1,
    interceptRequests:!0,
    reconnect:!0,
    deDupBody:!1
  }, grab = function(obj, key) {
    var cur, i, j, len, part, parts;
    for (cur = obj, parts = key.split("."), i = j = 0, len = parts.length; j < len && (part = parts[i], 
    "object" == typeof (cur = cur[part])); i = ++j) ;
    return i === parts.length - 1 ? cur :void 0;
  }, Offline.getOption = function(key) {
    var ref, val;
    return val = null != (ref = grab(Offline.options, key)) ? ref :grab(defaultOptions, key), 
    "function" == typeof val ? val() :val;
  }, "function" == typeof window.addEventListener && window.addEventListener("online", function() {
    return setTimeout(Offline.confirmUp, 100);
  }, !1), "function" == typeof window.addEventListener && window.addEventListener("offline", function() {
    return Offline.confirmDown();
  }, !1), Offline.state = "up", Offline.markUp = function() {
    if (Offline.trigger("confirmed-up"), "up" !== Offline.state) return Offline.state = "up", 
    Offline.trigger("up");
  }, Offline.markDown = function() {
    if (Offline.trigger("confirmed-down"), "down" !== Offline.state) return Offline.state = "down", 
    Offline.trigger("down");
  }, handlers = {}, Offline.on = function(event, handler, ctx) {
    var e, events, j, len, results;
    if (events = event.split(" "), events.length > 1) {
      for (results = [], j = 0, len = events.length; j < len; j++) e = events[j], results.push(Offline.on(e, handler, ctx));
      return results;
    }
    return null == handlers[event] && (handlers[event] = []), handlers[event].push([ ctx, handler ]);
  }, Offline.off = function(event, handler) {
    var _handler, i, ref, results;
    if (null != handlers[event]) {
      if (handler) {
        for (i = 0, results = []; i < handlers[event].length; ) ref = handlers[event][i], 
        ref[0], _handler = ref[1], _handler === handler ? results.push(handlers[event].splice(i, 1)) :results.push(i++);
        return results;
      }
      return handlers[event] = [];
    }
  }, Offline.trigger = function(event) {
    var ctx, handler, j, len, ref, ref1, results;
    if (null != handlers[event]) {
      for (ref = handlers[event].slice(0), results = [], j = 0, len = ref.length; j < len; j++) ref1 = ref[j], 
      ctx = ref1[0], handler = ref1[1], results.push(handler.call(ctx));
      return results;
    }
  }, checkXHR = function(xhr, onUp, onDown) {
    var _onerror, _onload, _onreadystatechange, _ontimeout, checkStatus;
    return checkStatus = function() {
      return xhr.status && xhr.status < 12e3 ? onUp() :onDown();
    }, null === xhr.onprogress ? (_onerror = xhr.onerror, xhr.onerror = function() {
      return onDown(), "function" == typeof _onerror ? _onerror.apply(null, arguments) :void 0;
    }, _ontimeout = xhr.ontimeout, xhr.ontimeout = function() {
      return onDown(), "function" == typeof _ontimeout ? _ontimeout.apply(null, arguments) :void 0;
    }, _onload = xhr.onload, xhr.onload = function() {
      return checkStatus(), "function" == typeof _onload ? _onload.apply(null, arguments) :void 0;
    }) :(_onreadystatechange = xhr.onreadystatechange, xhr.onreadystatechange = function() {
      return 4 === xhr.readyState ? checkStatus() :0 === xhr.readyState && onDown(), "function" == typeof _onreadystatechange ? _onreadystatechange.apply(null, arguments) :void 0;
    });
  }, Offline.checks = {}, Offline.checks.xhr = function() {
    var xhr;
    xhr = new XMLHttpRequest(), xhr.offline = !1, xhr.open(Offline.getOption("checks.xhr.type"), Offline.getOption("checks.xhr.url"), !0), 
    null != xhr.timeout && (xhr.timeout = Offline.getOption("checks.xhr.timeout")), 
    checkXHR(xhr, Offline.markUp, Offline.markDown);
    try {
      xhr.send();
    } catch (_error) {
      _error, Offline.markDown();
    }
    return xhr;
  }, Offline.checks.image = function() {
    var img;
    img = document.createElement("img"), img.onerror = Offline.markDown, img.onload = Offline.markUp, 
    img.src = Offline.getOption("checks.image.url");
  }, Offline.checks.down = Offline.markDown, Offline.checks.up = Offline.markUp, Offline.check = function() {
    return Offline.trigger("checking"), Offline.checks[Offline.getOption("checks.active")]();
  }, Offline.confirmUp = Offline.confirmDown = Offline.check, Offline.onXHR = function(cb) {
    var _XDomainRequest, _XMLHttpRequest, monitorXHR;
    if (monitorXHR = function(req, flags) {
      var _open;
      return _open = req.open, req.open = function(type, url, async, user, password) {
        return cb({
          type:type,
          url:url,
          async:async,
          flags:flags,
          user:user,
          password:password,
          xhr:req
        }), _open.apply(req, arguments);
      };
    }, _XMLHttpRequest = window.XMLHttpRequest, window.XMLHttpRequest = function(flags) {
      var _overrideMimeType, _setRequestHeader, req;
      return req = new _XMLHttpRequest(flags), monitorXHR(req, flags), _setRequestHeader = req.setRequestHeader, 
      req.headers = {}, req.setRequestHeader = function(name, value) {
        return req.headers[name] = value, _setRequestHeader.call(req, name, value);
      }, _overrideMimeType = req.overrideMimeType, req.overrideMimeType = function(type) {
        return req.mimeType = type, _overrideMimeType.call(req, type);
      }, req;
    }, extendNative(window.XMLHttpRequest, _XMLHttpRequest), null != window.XDomainRequest) return _XDomainRequest = window.XDomainRequest, 
    window.XDomainRequest = function() {
      var req;
      return req = new _XDomainRequest(), monitorXHR(req), req;
    }, extendNative(window.XDomainRequest, _XDomainRequest);
  }, init = function() {
    if (Offline.getOption("interceptRequests") && Offline.onXHR(function(arg) {
      var xhr;
      if (xhr = arg.xhr, !1 !== xhr.offline) return checkXHR(xhr, Offline.markUp, Offline.confirmDown);
    }), Offline.getOption("checkOnLoad")) return Offline.check();
  }, setTimeout(init, 0), window.Offline = Offline;
}).call(this), function() {
  var down, next, nope, rc, reset, retryIntv, tick, tryNow, up;
  if (!window.Offline) throw new Error("Offline Reconnect brought in without offline.js");
  rc = Offline.reconnect = {}, retryIntv = null, reset = function() {
    var ref;
    return null != rc.state && "inactive" !== rc.state && Offline.trigger("reconnect:stopped"), 
    rc.state = "inactive", rc.remaining = rc.delay = null != (ref = Offline.getOption("reconnect.initialDelay")) ? ref :3;
  }, next = function() {
    var delay, ref;
    return delay = null != (ref = Offline.getOption("reconnect.delay")) ? ref :Math.min(Math.ceil(1.5 * rc.delay), 3600), 
    rc.remaining = rc.delay = delay;
  }, tick = function() {
    if ("connecting" !== rc.state) return rc.remaining -= 1, Offline.trigger("reconnect:tick"), 
    0 === rc.remaining ? tryNow() :void 0;
  }, tryNow = function() {
    if ("waiting" === rc.state) return Offline.trigger("reconnect:connecting"), rc.state = "connecting", 
    Offline.check();
  }, down = function() {
    if (Offline.getOption("reconnect")) return reset(), rc.state = "waiting", Offline.trigger("reconnect:started"), 
    retryIntv = setInterval(tick, 1e3);
  }, up = function() {
    return null != retryIntv && clearInterval(retryIntv), reset();
  }, nope = function() {
    if (Offline.getOption("reconnect")) return "connecting" === rc.state ? (Offline.trigger("reconnect:failure"), 
    rc.state = "waiting", next()) :void 0;
  }, rc.tryNow = tryNow, reset(), Offline.on("down", down), Offline.on("confirmed-down", nope), 
  Offline.on("up", up);
}.call(this), function() {
  var clear, flush, held, holdRequest, makeRequest, waitingOnConfirm;
  if (!window.Offline) throw new Error("Requests module brought in without offline.js");
  held = [], waitingOnConfirm = !1, holdRequest = function(req) {
    if (!1 !== Offline.getOption("requests")) return Offline.trigger("requests:capture"), 
    "down" !== Offline.state && (waitingOnConfirm = !0), held.push(req);
  }, makeRequest = function(arg) {
    var body, name, password, ref, type, url, user, val, xhr;
    if (xhr = arg.xhr, url = arg.url, type = arg.type, user = arg.user, password = arg.password, 
    body = arg.body, !1 !== Offline.getOption("requests")) {
      xhr.abort(), xhr.open(type, url, !0, user, password), ref = xhr.headers;
      for (name in ref) val = ref[name], xhr.setRequestHeader(name, val);
      return xhr.mimeType && xhr.overrideMimeType(xhr.mimeType), xhr.send(body);
    }
  }, clear = function() {
    return held = [];
  }, flush = function() {
    var body, i, key, len, request, requests, url;
    if (!1 !== Offline.getOption("requests")) {
      for (Offline.trigger("requests:flush"), requests = {}, i = 0, len = held.length; i < len; i++) request = held[i], 
      url = request.url.replace(/(\?|&)_=[0-9]+/, function(match, chr) {
        return "?" === chr ? chr :"";
      }), Offline.getOption("deDupBody") ? (body = request.body, body = "[object Object]" === body.toString() ? JSON.stringify(body) :body.toString(), 
      requests[request.type.toUpperCase() + " - " + url + " - " + body] = request) :requests[request.type.toUpperCase() + " - " + url] = request;
      for (key in requests) request = requests[key], makeRequest(request);
      return clear();
    }
  }, setTimeout(function() {
    if (!1 !== Offline.getOption("requests")) return Offline.on("confirmed-up", function() {
      if (waitingOnConfirm) return waitingOnConfirm = !1, clear();
    }), Offline.on("up", flush), Offline.on("down", function() {
      return waitingOnConfirm = !1;
    }), Offline.onXHR(function(request) {
      var _onreadystatechange, _send, async, hold, xhr;
      if (xhr = request.xhr, async = request.async, !1 !== xhr.offline && (hold = function() {
        return holdRequest(request);
      }, _send = xhr.send, xhr.send = function(body) {
        return request.body = body, _send.apply(xhr, arguments);
      }, async)) return null === xhr.onprogress ? (xhr.addEventListener("error", hold, !1), 
      xhr.addEventListener("timeout", hold, !1)) :(_onreadystatechange = xhr.onreadystatechange, 
      xhr.onreadystatechange = function() {
        return 0 === xhr.readyState ? hold() :4 === xhr.readyState && (0 === xhr.status || xhr.status >= 12e3) && hold(), 
        "function" == typeof _onreadystatechange ? _onreadystatechange.apply(null, arguments) :void 0;
      });
    }), Offline.requests = {
      flush:flush,
      clear:clear
    };
  }, 0);
}.call(this), function() {
  var base, i, len, ref, simulate, state;
  if (!Offline) throw new Error("Offline simulate brought in without offline.js");
  for (ref = [ "up", "down" ], i = 0, len = ref.length; i < len; i++) {
    state = ref[i];
    try {
      simulate = document.querySelector("script[data-simulate='" + state + "']") || ("undefined" != typeof localStorage && null !== localStorage ? localStorage.OFFLINE_SIMULATE :void 0) === state;
    } catch (_error) {
      _error, simulate = !1;
    }
  }
  simulate && (null == Offline.options && (Offline.options = {}), null == (base = Offline.options).checks && (base.checks = {}), 
  Offline.options.checks.active = state);
}.call(this), function() {
  var RETRY_TEMPLATE, TEMPLATE, _onreadystatechange, addClass, content, createFromHTML, el, flashClass, flashTimeouts, init, removeClass, render, roundTime;
  if (!window.Offline) throw new Error("Offline UI brought in without offline.js");
  TEMPLATE = '<div class="offline-ui"><div class="offline-ui-content"></div></div>', 
  RETRY_TEMPLATE = '<a href class="offline-ui-retry"></a>', createFromHTML = function(html) {
    var el;
    return el = document.createElement("div"), el.innerHTML = html, el.children[0];
  }, el = content = null, addClass = function(name) {
    return removeClass(name), el.className += " " + name;
  }, removeClass = function(name) {
    return el.className = el.className.replace(new RegExp("(^| )" + name.split(" ").join("|") + "( |$)", "gi"), " ");
  }, flashTimeouts = {}, flashClass = function(name, time) {
    return addClass(name), null != flashTimeouts[name] && clearTimeout(flashTimeouts[name]), 
    flashTimeouts[name] = setTimeout(function() {
      return removeClass(name), delete flashTimeouts[name];
    }, 1e3 * time);
  }, roundTime = function(sec) {
    var mult, unit, units, val;
    units = {
      day:86400,
      hour:3600,
      minute:60,
      second:1
    };
    for (unit in units) if (mult = units[unit], sec >= mult) return val = Math.floor(sec / mult), 
    [ val, unit ];
    return [ "now", "" ];
  }, render = function() {
    var button, handler;
    return el = createFromHTML(TEMPLATE), document.body.appendChild(el), null != Offline.reconnect && Offline.getOption("reconnect") && (el.appendChild(createFromHTML(RETRY_TEMPLATE)), 
    button = el.querySelector(".offline-ui-retry"), handler = function(e) {
      return e.preventDefault(), Offline.reconnect.tryNow();
    }, null != button.addEventListener ? button.addEventListener("click", handler, !1) :button.attachEvent("click", handler)), 
    addClass("offline-ui-" + Offline.state), content = el.querySelector(".offline-ui-content");
  }, init = function() {
    return render(), Offline.on("up", function() {
      return removeClass("offline-ui-down"), addClass("offline-ui-up"), flashClass("offline-ui-up-2s", 2), 
      flashClass("offline-ui-up-5s", 5);
    }), Offline.on("down", function() {
      return removeClass("offline-ui-up"), addClass("offline-ui-down"), flashClass("offline-ui-down-2s", 2), 
      flashClass("offline-ui-down-5s", 5);
    }), Offline.on("reconnect:connecting", function() {
      return addClass("offline-ui-connecting"), removeClass("offline-ui-waiting");
    }), Offline.on("reconnect:tick", function() {
      var ref, time, unit;
      return addClass("offline-ui-waiting"), removeClass("offline-ui-connecting"), ref = roundTime(Offline.reconnect.remaining), 
      time = ref[0], unit = ref[1], content.setAttribute("data-retry-in-value", time), 
      content.setAttribute("data-retry-in-unit", unit);
    }), Offline.on("reconnect:stopped", function() {
      return removeClass("offline-ui-connecting offline-ui-waiting"), content.setAttribute("data-retry-in-value", null), 
      content.setAttribute("data-retry-in-unit", null);
    }), Offline.on("reconnect:failure", function() {
      return flashClass("offline-ui-reconnect-failed-2s", 2), flashClass("offline-ui-reconnect-failed-5s", 5);
    }), Offline.on("reconnect:success", function() {
      return flashClass("offline-ui-reconnect-succeeded-2s", 2), flashClass("offline-ui-reconnect-succeeded-5s", 5);
    });
  }, "complete" === document.readyState ? init() :null != document.addEventListener ? document.addEventListener("DOMContentLoaded", init, !1) :(_onreadystatechange = document.onreadystatechange, 
  document.onreadystatechange = function() {
    return "complete" === document.readyState && init(), "function" == typeof _onreadystatechange ? _onreadystatechange.apply(null, arguments) :void 0;
  });
}.call(this);
/*!--------------------------------------------------------------------
JAVASCRIPT "Outdated Browser"
Version:    1.1.2 - 2015
author:     Burocratik
website:    http://www.burocratik.com
* @preserve
-----------------------------------------------------------------------*/
var outdatedBrowser = function(options) {

    //Variable definition (before ajax)
    var outdated = document.getElementById("outdated");

    // Default settings
    this.defaultOpts = {
        bgColor: '#000000',
        color: '#ffffff',
        lowerThan: 'transform',
        languagePath: '../outdatedbrowser/lang/en.html'
    }

    if (options) {
        //assign css3 property or js property to IE browser version
        if (options.lowerThan == 'IE8' || options.lowerThan == 'borderSpacing') {
            options.lowerThan = 'borderSpacing';
        } else if (options.lowerThan == 'IE9' || options.lowerThan == 'boxShadow') {
            options.lowerThan = 'boxShadow';
        } else if (options.lowerThan == 'IE10' || options.lowerThan == 'transform' || options.lowerThan == '' || typeof options.lowerThan === "undefined") {
            options.lowerThan = 'transform';
        } else if (options.lowerThan == 'IE11' || options.lowerThan == 'borderImage') {
            options.lowerThan = 'borderImage';
        }  else if (options.lowerThan == 'Edge' || options.lowerThan == 'js:Promise') {
            options.lowerThan = 'js:Promise';
        }

        //all properties
        this.defaultOpts.bgColor = options.bgColor;
        this.defaultOpts.color = options.color;
        this.defaultOpts.lowerThan = options.lowerThan;
        this.defaultOpts.languagePath = options.languagePath;

        bkgColor = this.defaultOpts.bgColor;
        txtColor = this.defaultOpts.color;
        cssProp = this.defaultOpts.lowerThan;
        languagePath = this.defaultOpts.languagePath;
    } else {
        bkgColor = this.defaultOpts.bgColor;
        txtColor = this.defaultOpts.color;
        cssProp = this.defaultOpts.lowerThan;
        languagePath = this.defaultOpts.languagePath;
    } //end if options


    //Define opacity and fadeIn/fadeOut functions
    var done = true;

    function function_opacity(opacity_value) {
        outdated.style.opacity = opacity_value / 100;
        outdated.style.filter = 'alpha(opacity=' + opacity_value + ')';
    }

    // function function_fade_out(opacity_value) {
    //     function_opacity(opacity_value);
    //     if (opacity_value == 1) {
    //         outdated.style.display = 'none';
    //         done = true;
    //     }
    // }

    function function_fade_in(opacity_value) {
        function_opacity(opacity_value);
        if (opacity_value == 1) {
            outdated.style.display = 'block';
        }
        if (opacity_value == 100) {
            done = true;
        }
    }

    //check if element has a particular class
    // function hasClass(element, cls) {
    //     return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
    // }

    var supports = ( function() {
        var div = document.createElement('div');
        var vendors = 'Khtml Ms O Moz Webkit'.split(' ');
        var len = vendors.length;

        return function(prop) {
            if (prop in div.style) return true;

            prop = prop.replace(/^[a-z]/, function(val) {
                return val.toUpperCase();
            });

            while (len--) {
                if (vendors[len] + prop in div.style) {
                    return true;
                }
            }
            return false;
        };
    } )();

    var validBrowser = false;

    // browser check by js props
    if(/^js:+/g.test(cssProp)) {
        var jsProp = cssProp.split(':')[1];
        if(!jsProp)
            return;

        switch (jsProp) {
			case 'Promise':
                validBrowser = window.Promise !== undefined && window.Promise !== null && Object.prototype.toString.call(window.Promise.resolve()) === '[object Promise]';
                break;
            default:
                validBrowser = false;
		}
    } else {
        // check by css3 property (transform=default)
        validBrowser = supports('' + cssProp + '');
    }


	if (!validBrowser) {
		if (done && outdated.style.opacity !== '1') {
			done = false;
			for (var i = 1; i <= 100; i++) {
				setTimeout((function (x) {
					return function () {
						function_fade_in(x);
					};
				})(i), i * 8);
			}
		}
	} else {
        return;
    } //end if


    //Check AJAX Options: if languagePath == '' > use no Ajax way, html is needed inside <div id="outdated">
    if (languagePath === ' ' || languagePath.length == 0) {
        startStylesAndEvents();
    } else {
        grabFile(languagePath);
    }

    //events and colors
    function startStylesAndEvents() {
        var btnClose = document.getElementById("btnCloseUpdateBrowser");
        var btnUpdate = document.getElementById("btnUpdateBrowser");

        //check settings attributes
        outdated.style.backgroundColor = bkgColor;
        //way too hard to put !important on IE6
        outdated.style.color = txtColor;
        outdated.children[0].style.color = txtColor;
        outdated.children[1].style.color = txtColor;

        //check settings attributes
        btnUpdate.style.color = txtColor;
        // btnUpdate.style.borderColor = txtColor;
        if (btnUpdate.style.borderColor) {
            btnUpdate.style.borderColor = txtColor;
        }
        btnClose.style.color = txtColor;

        //close button
        btnClose.onmousedown = function() {
            outdated.style.display = 'none';
            return false;
        };

        //Override the update button color to match the background color
        btnUpdate.onmouseover = function() {
            this.style.color = bkgColor;
            this.style.backgroundColor = txtColor;
        };
        btnUpdate.onmouseout = function() {
            this.style.color = txtColor;
            this.style.backgroundColor = bkgColor;
        };
    } //end styles and events


    // IF AJAX with request ERROR > insert english default
    var ajaxEnglishDefault = '<h6>Your browser is out-of-date!</h6>'
        + '<p>Update your browser to view this website correctly. <a id="btnUpdateBrowser" href="http://outdatedbrowser.com/">Update my browser now </a></p>'
        + '<p class="last"><a href="#" id="btnCloseUpdateBrowser" title="Close">&times;</a></p>';


    //** AJAX FUNCTIONS - Bulletproof Ajax by Jeremy Keith **
    function getHTTPObject() {
        var xhr = false;
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch ( e ) {
                try {
                    xhr = new ActiveXObject("Microsoft.XMLHTTP");
                } catch ( e ) {
                    xhr = false;
                }
            }
        }
        return xhr;
    }//end function

    function grabFile(file) {
        var request = getHTTPObject();
        if (request) {
            request.onreadystatechange = function() {
                displayResponse(request);
            };
            request.open("GET", file, true);
            request.send(null);
        }
        return false;
    } //end grabFile

    function displayResponse(request) {
        var insertContentHere = document.getElementById("outdated");
        if (request.readyState == 4) {
            if (request.status == 200 || request.status == 304) {
                insertContentHere.innerHTML = request.responseText;
            } else {
                insertContentHere.innerHTML = ajaxEnglishDefault;
            }
            startStylesAndEvents();
        }
        return false;
    }//end displayResponse

////////END of outdatedBrowser function
};
/*!
 * jQuery blockUI plugin
 * Version 2.70.0-2014.11.23
 * Requires jQuery v1.7 or later
 *
 * Examples at: http://malsup.com/jquery/block/
 * Copyright (c) 2007-2013 M. Alsup
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Thanks to Amir-Hossein Sobhi for some excellent contributions!
 */

;(function() {
/*jshint eqeqeq:false curly:false latedef:false */
"use strict";

	function setup($) {
		$.fn._fadeIn = $.fn.fadeIn;

		var noOp = $.noop || function() {};

		// this bit is to ensure we don't call setExpression when we shouldn't (with extra muscle to handle
		// confusing userAgent strings on Vista)
		var msie = /MSIE/.test(navigator.userAgent);
		var ie6  = /MSIE 6.0/.test(navigator.userAgent) && ! /MSIE 8.0/.test(navigator.userAgent);
		var mode = document.documentMode || 0;
		var setExpr = $.isFunction( document.createElement('div').style.setExpression );

		// global $ methods for blocking/unblocking the entire page
		$.blockUI   = function(opts) { install(window, opts); };
		$.unblockUI = function(opts) { remove(window, opts); };

		// convenience method for quick growl-like notifications  (http://www.google.com/search?q=growl)
		$.growlUI = function(title, message, timeout, onClose) {
			var $m = $('<div class="growlUI"></div>');
			if (title) $m.append('<h1>'+title+'</h1>');
			if (message) $m.append('<h2>'+message+'</h2>');
			if (timeout === undefined) timeout = 3000;

			// Added by konapun: Set timeout to 30 seconds if this growl is moused over, like normal toast notifications
			var callBlock = function(opts) {
				opts = opts || {};

				$.blockUI({
					message: $m,
					fadeIn : typeof opts.fadeIn  !== 'undefined' ? opts.fadeIn  : 700,
					fadeOut: typeof opts.fadeOut !== 'undefined' ? opts.fadeOut : 1000,
					timeout: typeof opts.timeout !== 'undefined' ? opts.timeout : timeout,
					centerY: false,
					showOverlay: false,
					onUnblock: onClose,
					css: $.blockUI.defaults.growlCSS
				});
			};

			callBlock();
			var nonmousedOpacity = $m.css('opacity');
			$m.mouseover(function() {
				callBlock({
					fadeIn: 0,
					timeout: 30000
				});

				var displayBlock = $('.blockMsg');
				displayBlock.stop(); // cancel fadeout if it has started
				displayBlock.fadeTo(300, 1); // make it easier to read the message by removing transparency
			}).mouseout(function() {
				$('.blockMsg').fadeOut(1000);
			});
			// End konapun additions
		};

		// plugin method for blocking element content
		$.fn.block = function(opts) {
			if ( this[0] === window ) {
				$.blockUI( opts );
				return this;
			}
			var fullOpts = $.extend({}, $.blockUI.defaults, opts || {});
			this.each(function() {
				var $el = $(this);
				if (fullOpts.ignoreIfBlocked && $el.data('blockUI.isBlocked'))
					return;
				$el.unblock({ fadeOut: 0 });
			});

			return this.each(function() {
				if ($.css(this,'position') === 'static') {
					this.style.position = 'relative';
					$(this).data('blockUI.static', true);
				}
				this.style.zoom = 1; // force 'hasLayout' in ie
				install(this, opts);
			});
		};

		// plugin method for unblocking element content
		$.fn.unblock = function(opts) {
			if ( this[0] === window ) {
				$.unblockUI( opts );
				return this;
			}
			return this.each(function() {
				remove(this, opts);
			});
		};

		$.blockUI.version = 2.70; // 2nd generation blocking at no extra cost!

		// override these in your code to change the default behavior and style
		$.blockUI.defaults = {
			// message displayed when blocking (use null for no message)
			message:  '<div class="row pr-5">' +
				'<div class="column-md-4 ml-5">' +
				'<div class="sk-cube-grid">' +
				'<div class="sk-cube sk-cube1"></div>' +
				'<div class="sk-cube sk-cube2"></div>' +
				'<div class="sk-cube sk-cube3"></div>' +
				'<div class="sk-cube sk-cube4"></div>' +
				'<div class="sk-cube sk-cube5"></div>' +
				'<div class="sk-cube sk-cube6"></div>' +
				'<div class="sk-cube sk-cube7"></div>' +
				'<div class="sk-cube sk-cube8"></div>' +
				'<div class="sk-cube sk-cube9"></div>' +
				'</div></div><div class="column-md-8">' +
				'<h1 class="blockUI-text ml-4">Please wait...</h1></div>' +
				'</div>',

			title: null,		// title string; only used when theme == true
			draggable: true,	// only used when theme == true (requires jquery-ui.js to be loaded)

			theme: false, // set to true to use with jQuery UI themes

			// styles for the message when blocking; if you wish to disable
			// these and use an external stylesheet then do this in your code:
			// $.blockUI.defaults.css = {};
			css: {
				padding:	0,
				margin:		0,
				top:		'40%',
				left:		'35%',
				opacity:	1,
				textAlign:	'center',
				verticalAlign:	'middle',
				color:		'#fff',
				borderRadius: 4,
				border:		'3px solid #fff',
				backgroundColor:'#8b100c',
				cursor:		'wait'
			},

			// minimal style set used when themes are used
			themedCSS: {
				width:	'30%',
				top:	'40%',
				left:	'35%'
			},

			// styles for the overlay
			overlayCSS:  {
				backgroundColor:	'#000',
				opacity:			0.8,
				cursor:				'wait'
			},

			// style to replace wait cursor before unblocking to correct issue
			// of lingering wait cursor
			cursorReset: 'default',

			// styles applied when using $.growlUI
			growlCSS: {
				width:		'350px',
				top:		'10px',
				left:		'0',
				right:		'10px',
				border:		'none',
				padding:	'5px',
				opacity:	1,
				cursor:		'default',
				color:		'#fff',
				backgroundColor:'#8b100c',
				'-webkit-border-radius':'10px',
				'-moz-border-radius':	'10px',
				'border-radius':		'10px'
			},

			// IE issues: 'about:blank' fails on HTTPS and javascript:false is s-l-o-w
			// (hat tip to Jorge H. N. de Vasconcelos)
			/*jshint scripturl:true */
			iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank',

			// force usage of iframe in non-IE browsers (handy for blocking applets)
			forceIframe: false,

			// z-index for the blocking overlay
			baseZ: 9999,

			// set these to true to have the message automatically centered
			centerX: true, // <-- only effects element blocking (page block controlled via css above)
			centerY: true,

			// allow body element to be stetched in ie6; this makes blocking look better
			// on "short" pages.  disable if you wish to prevent changes to the body height
			allowBodyStretch: true,

			// enable if you want key and mouse events to be disabled for content that is blocked
			bindEvents: true,

			// be default blockUI will supress tab navigation from leaving blocking content
			// (if bindEvents is true)
			constrainTabKey: true,

			// fadeIn time in millis; set to 0 to disable fadeIn on block
			fadeIn:  200,

			// fadeOut time in millis; set to 0 to disable fadeOut on unblock
			fadeOut:  400,

			// time in millis to wait before auto-unblocking; set to 0 to disable auto-unblock
			timeout: 0,

			// disable if you don't want to show the overlay
			showOverlay: true,

			// if true, focus will be placed in the first available input field when
			// page blocking
			focusInput: true,

            // elements that can receive focus
            focusableElements: ':input:enabled:visible',

			// suppresses the use of overlay styles on FF/Linux (due to performance issues with opacity)
			// no longer needed in 2012
			// applyPlatformOpacityRules: true,

			// callback method invoked when fadeIn has completed and blocking message is visible
			onBlock: null,

			// callback method invoked when unblocking has completed; the callback is
			// passed the element that has been unblocked (which is the window object for page
			// blocks) and the options that were passed to the unblock call:
			//	onUnblock(element, options)
			onUnblock: null,

			// callback method invoked when the overlay area is clicked.
			// setting this will turn the cursor to a pointer, otherwise cursor defined in overlayCss will be used.
			onOverlayClick: null,

			// don't ask; if you really must know: http://groups.google.com/group/jquery-en/browse_thread/thread/36640a8730503595/2f6a79a77a78e493#2f6a79a77a78e493
			quirksmodeOffsetHack: 4,

			// class name of the message block
			blockMsgClass: 'blockMsg',

			// if it is already blocked, then ignore it (don't unblock and reblock)
			ignoreIfBlocked: false
		};

		// private data and functions follow...

		var pageBlock = null;
		var pageBlockEls = [];

		function install(el, opts) {
			var css, themedCSS;
			var full = (el === window);
			var msg = (opts && opts.message !== undefined ? opts.message : undefined);
			opts = $.extend({}, $.blockUI.defaults, opts || {});

			if (opts.ignoreIfBlocked && $(el).data('blockUI.isBlocked'))
				return;

			opts.overlayCSS = $.extend({}, $.blockUI.defaults.overlayCSS, opts.overlayCSS || {});
			css = $.extend({}, $.blockUI.defaults.css, opts.css || {});
			if (opts.onOverlayClick)
				opts.overlayCSS.cursor = 'pointer';

			themedCSS = $.extend({}, $.blockUI.defaults.themedCSS, opts.themedCSS || {});
			msg = msg === undefined ? opts.message : msg;

			// remove the current block (if there is one)
			if (full && pageBlock)
				remove(window, {fadeOut:0});

			// if an existing element is being used as the blocking content then we capture
			// its current place in the DOM (and current display style) so we can restore
			// it when we unblock
			if (msg && typeof msg !== 'string' && (msg.parentNode || msg.jquery)) {
				var node = msg.jquery ? msg[0] : msg;
				var data = {};
				$(el).data('blockUI.history', data);
				data.el = node;
				data.parent = node.parentNode;
				data.display = node.style.display;
				data.position = node.style.position;
				if (data.parent)
					data.parent.removeChild(node);
			}

			$(el).data('blockUI.onUnblock', opts.onUnblock);
			var z = opts.baseZ;

			// blockUI uses 3 layers for blocking, for simplicity they are all used on every platform;
			// layer1 is the iframe layer which is used to supress bleed through of underlying content
			// layer2 is the overlay layer which has opacity and a wait cursor (by default)
			// layer3 is the message content that is displayed while blocking
			var lyr1, lyr2, lyr3, s;
			if (msie || opts.forceIframe)
				lyr1 = $('<iframe class="blockUI" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="'+opts.iframeSrc+'"></iframe>');
			else
				lyr1 = $('<div class="blockUI" style="display:none"></div>');

			if (opts.theme)
				lyr2 = $('<div class="blockUI blockOverlay ui-widget-overlay" style="z-index:'+ (z++) +';display:none"></div>');
			else
				lyr2 = $('<div class="blockUI blockOverlay" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');

			if (opts.theme && full) {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:fixed">';
				if ( opts.title ) {
					s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
				}
				s += '<div class="ui-widget-content ui-dialog-content"></div>';
				s += '</div>';
			}
			else if (opts.theme) {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:absolute">';
				if ( opts.title ) {
					s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
				}
				s += '<div class="ui-widget-content ui-dialog-content"></div>';
				s += '</div>';
			}
			else if (full) {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage" style="z-index:'+(z+10)+';display:none;position:fixed"></div>';
			}
			else {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement" style="z-index:'+(z+10)+';display:none;position:absolute"></div>';
			}
			lyr3 = $(s);

			// if we have a message, style it
			if (msg) {
				if (opts.theme) {
					lyr3.css(themedCSS);
					lyr3.addClass('ui-widget-content');
				}
				else
					lyr3.css(css);
			}

			// style the overlay
			if (!opts.theme /*&& (!opts.applyPlatformOpacityRules)*/)
				lyr2.css(opts.overlayCSS);
			lyr2.css('position', full ? 'fixed' : 'absolute');

			// make iframe layer transparent in IE
			if (msie || opts.forceIframe)
				lyr1.css('opacity',0.0);

			//$([lyr1[0],lyr2[0],lyr3[0]]).appendTo(full ? 'body' : el);
			var layers = [lyr1,lyr2,lyr3], $par = full ? $('body') : $(el);
			$.each(layers, function() {
				this.appendTo($par);
			});

			if (opts.theme && opts.draggable && $.fn.draggable) {
				lyr3.draggable({
					handle: '.ui-dialog-titlebar',
					cancel: 'li'
				});
			}

			// ie7 must use absolute positioning in quirks mode and to account for activex issues (when scrolling)
			var expr = setExpr && (!$.support.boxModel || $('object,embed', full ? null : el).length > 0);
			if (ie6 || expr) {
				// give body 100% height
				if (full && opts.allowBodyStretch && $.support.boxModel)
					$('html,body').css('height','100%');

				// fix ie6 issue when blocked element has a border width
				if ((ie6 || !$.support.boxModel) && !full) {
					var t = sz(el,'borderTopWidth'), l = sz(el,'borderLeftWidth');
					var fixT = t ? '(0 - '+t+')' : 0;
					var fixL = l ? '(0 - '+l+')' : 0;
				}

				// simulate fixed position
				$.each(layers, function(i,o) {
					var s = o[0].style;
					s.position = 'absolute';
					if (i < 2) {
						if (full)
							s.setExpression('height','Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.support.boxModel?0:'+opts.quirksmodeOffsetHack+') + "px"');
						else
							s.setExpression('height','this.parentNode.offsetHeight + "px"');
						if (full)
							s.setExpression('width','jQuery.support.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"');
						else
							s.setExpression('width','this.parentNode.offsetWidth + "px"');
						if (fixL) s.setExpression('left', fixL);
						if (fixT) s.setExpression('top', fixT);
					}
					else if (opts.centerY) {
						if (full) s.setExpression('top','(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"');
						s.marginTop = 0;
					}
					else if (!opts.centerY && full) {
						var top = (opts.css && opts.css.top) ? parseInt(opts.css.top, 10) : 0;
						var expression = '((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + '+top+') + "px"';
						s.setExpression('top',expression);
					}
				});
			}

			// show the message
			if (msg) {
				if (opts.theme)
					lyr3.find('.ui-widget-content').append(msg);
				else
					lyr3.append(msg);
				if (msg.jquery || msg.nodeType)
					$(msg).show();
			}

			if ((msie || opts.forceIframe) && opts.showOverlay)
				lyr1.show(); // opacity is zero
			if (opts.fadeIn) {
				var cb = opts.onBlock ? opts.onBlock : noOp;
				var cb1 = (opts.showOverlay && !msg) ? cb : noOp;
				var cb2 = msg ? cb : noOp;
				if (opts.showOverlay)
					lyr2._fadeIn(opts.fadeIn, cb1);
				if (msg)
					lyr3._fadeIn(opts.fadeIn, cb2);
			}
			else {
				if (opts.showOverlay)
					lyr2.show();
				if (msg)
					lyr3.show();
				if (opts.onBlock)
					opts.onBlock.bind(lyr3)();
			}

			// bind key and mouse events
			bind(1, el, opts);

			if (full) {
				pageBlock = lyr3[0];
				pageBlockEls = $(opts.focusableElements,pageBlock);
				if (opts.focusInput)
					setTimeout(focus, 20);
			}
			else
				center(lyr3[0], opts.centerX, opts.centerY);

			if (opts.timeout) {
				// auto-unblock
				var to = setTimeout(function() {
					if (full)
						$.unblockUI(opts);
					else
						$(el).unblock(opts);
				}, opts.timeout);
				$(el).data('blockUI.timeout', to);
			}
		}

		// remove the block
		function remove(el, opts) {
			var count;
			var full = (el === window);
			var $el = $(el);
			var data = $el.data('blockUI.history');
			var to = $el.data('blockUI.timeout');
			if (to) {
				clearTimeout(to);
				$el.removeData('blockUI.timeout');
			}
			opts = $.extend({}, $.blockUI.defaults, opts || {});
			bind(0, el, opts); // unbind events

			if (opts.onUnblock === null) {
				opts.onUnblock = $el.data('blockUI.onUnblock');
				$el.removeData('blockUI.onUnblock');
			}

			var els;
			if (full) // crazy selector to handle odd field errors in ie6/7
				els = $('body').children().filter('.blockUI').add('body > .blockUI');
			else
				els = $el.find('>.blockUI');

			// fix cursor issue
			if ( opts.cursorReset ) {
				if ( els.length > 1 )
					els[1].style.cursor = opts.cursorReset;
				if ( els.length > 2 )
					els[2].style.cursor = opts.cursorReset;
			}

			if (full)
				pageBlock = pageBlockEls = null;

			if (opts.fadeOut) {
				count = els.length;
				els.stop().fadeOut(opts.fadeOut, function() {
					if ( --count === 0)
						reset(els,data,opts,el);
				});
			}
			else
				reset(els, data, opts, el);
		}

		// move blocking element back into the DOM where it started
		function reset(els,data,opts,el) {
			var $el = $(el);
			if ( $el.data('blockUI.isBlocked') )
				return;

			els.each(function(i,o) {
				// remove via DOM calls so we don't lose event handlers
				if (this.parentNode)
					this.parentNode.removeChild(this);
			});

			if (data && data.el) {
				data.el.style.display = data.display;
				data.el.style.position = data.position;
				data.el.style.cursor = 'default'; // #59
				if (data.parent)
					data.parent.appendChild(data.el);
				$el.removeData('blockUI.history');
			}

			if ($el.data('blockUI.static')) {
				$el.css('position', 'static'); // #22
			}

			if (typeof opts.onUnblock === 'function')
				opts.onUnblock(el,opts);

			// fix issue in Safari 6 where block artifacts remain until reflow
			var body = $(document.body), w = body.width(), cssW = body[0].style.width;
			body.width(w-1).width(w);
			body[0].style.width = cssW;
		}

		// bind/unbind the handler
		function bind(b, el, opts) {
			var full = el === window, $el = $(el);

			// don't bother unbinding if there is nothing to unbind
			if (!b && (full && !pageBlock || !full && !$el.data('blockUI.isBlocked')))
				return;

			$el.data('blockUI.isBlocked', b);

			// don't bind events when overlay is not in use or if bindEvents is false
			if (!full || !opts.bindEvents || (b && !opts.showOverlay))
				return;

			// bind anchors and inputs for mouse and key events
			var events = 'mousedown mouseup keydown keypress keyup touchstart touchend touchmove';
			if (b)
				$(document).bind(events, opts, handler);
			else
				$(document).unbind(events, handler);

		// former impl...
		//		var $e = $('a,:input');
		//		b ? $e.bind(events, opts, handler) : $e.unbind(events, handler);
		}

		// event handler to suppress keyboard/mouse events when blocking
		function handler(e) {
			// allow tab navigation (conditionally)
			if (e.type === 'keydown' && e.keyCode && e.keyCode === 9) {
				if (pageBlock && e.data.constrainTabKey) {
					var els = pageBlockEls;
					var fwd = !e.shiftKey && e.target === els[els.length-1];
					var back = e.shiftKey && e.target === els[0];
					if (fwd || back) {
						setTimeout(function(){focus(back);},10);
						return false;
					}
				}
			}
			var opts = e.data;
			var target = $(e.target);
			if (target.hasClass('blockOverlay') && opts.onOverlayClick)
				opts.onOverlayClick(e);

			// allow events within the message content
			if (target.parents('div.' + opts.blockMsgClass).length > 0)
				return true;

			// allow events for content that is not being blocked
			return target.parents().children().filter('div.blockUI').length === 0;
		}

		function focus(back) {
			if (!pageBlockEls)
				return;
			var e = pageBlockEls[back===true ? pageBlockEls.length-1 : 0];
			if (e)
				e.focus();
		}

		function center(el, x, y) {
			var p = el.parentNode, s = el.style;
			var l = ((p.offsetWidth - el.offsetWidth)/2) - sz(p,'borderLeftWidth');
			var t = ((p.offsetHeight - el.offsetHeight)/2) - sz(p,'borderTopWidth');
			if (x) s.left = l > 0 ? (l+'px') : '0';
			if (y) s.top  = t > 0 ? (t+'px') : '0';
		}

		function sz(el, p) {
			return parseInt($.css(el,p),10)||0;
		}

	}

	/*global define:true */
	if (typeof define === 'function' && define.amd && define.amd.jQuery) {
		define(['jquery'], setup);
	} else {
		setup(jQuery);
	}

})();
/* PNotify modules included in this custom build file:
animate
buttons
callbacks
confirm
desktop
history
mobile
nonblock
*/
/*
PNotify 3.2.0 sciactive.com/pnotify/
(C) 2015 Hunter Perrin; Google, Inc.
license Apache-2.0
*/
/*
 * ====== PNotify ======
 *
 * http://sciactive.com/pnotify/
 *
 * Copyright 2009-2015 Hunter Perrin
 * Copyright 2015 Google, Inc.
 *
 * Licensed under Apache License, Version 2.0.
 * 	http://www.apache.org/licenses/LICENSE-2.0
 */

(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify', ['jquery'], function($){
      return factory($, root);
    });
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), global || root);
  } else {
    // Browser globals
    root.PNotify = factory(root.jQuery, root);
  }
}(typeof window !== "undefined" ? window : this, function($, root){
var init = function(root){
  var default_stack = {
    dir1: "down",
    dir2: "left",
    push: "bottom",
    spacing1: 36,
    spacing2: 36,
    context: $("body"),
    modal: false
  };
  var posTimer, // Position all timer.
    body,
    jwindow = $(root);
  // Set global variables.
  var do_when_ready = function(){
    body = $("body");
    PNotify.prototype.options.stack.context = body;
    jwindow = $(root);
    // Reposition the notices when the window resizes.
    jwindow.bind('resize', function(){
      if (posTimer) {
        clearTimeout(posTimer);
      }
      posTimer = setTimeout(function(){
        PNotify.positionAll(true);
      }, 10);
    });
  };
  var createStackOverlay = function(stack) {
    var overlay = $("<div />", {"class": "ui-pnotify-modal-overlay"});
    overlay.prependTo(stack.context);
    if (stack.overlay_close) {
      // Close the notices on overlay click.
      overlay.click(function(){
        PNotify.removeStack(stack);
      });
    }
    return overlay;
  };
  var PNotify = function(options){
    // === Class Variables ===
    this.state = "initializing"; // The state can be "initializing", "opening", "open", "closing", and "closed".
    this.timer = null; // Auto close timer.
    this.animTimer = null; // Animation timer.
    this.styles = null;
    this.elem = null;
    this.container = null;
    this.title_container = null;
    this.text_container = null;
    this.animating = false; // Stores what is currently being animated (in or out).
    this.timerHide = false; // Stores whether the notice was hidden by a timer.

    this.parseOptions(options);
    this.init();
  };
  $.extend(PNotify.prototype, {
    // The current version of PNotify.
    version: "3.2.0",

    // === Options ===

    // Options defaults.
    options: {
      // The notice's title.
      title: false,
      // Whether to escape the content of the title. (Not allow HTML.)
      title_escape: false,
      // The notice's text.
      text: false,
      // Whether to escape the content of the text. (Not allow HTML.)
      text_escape: false,
      // What styling classes to use. (Can be either "brighttheme", "bootstrap3", or "fontawesome".)
      styling: "fontawesome",
      // Additional classes to be added to the notice. (For custom styling.)
      addclass: "",
      // Class to be added to the notice for corner styling.
      cornerclass: "",
      // Display the notice when it is created.
      auto_display: true,
      // Width of the notice.
      width: "300px",
      // Minimum height of the notice. It will expand to fit content.
      min_height: "16px",
      // Type of the notice. "notice", "info", "success", or "error".
      type: "notice",
      // Set icon to true to use the default icon for the selected
      // style/type, false for no icon, or a string for your own icon class.
      icon: true,
      // The animation to use when displaying and hiding the notice. "none"
      // and "fade" are supported through CSS. Others are supported
      // through the Animate module and Animate.css.
      animation: "fade",
      // Speed at which the notice animates in and out. "slow", "normal",
      // or "fast". Respectively, 400ms, 250ms, 100ms.
      animate_speed: "normal",
      // Display a drop shadow.
      shadow: true,
      // After a delay, remove the notice.
      hide: true,
      // Delay in milliseconds before the notice is removed.
      delay: 8000,
      // Reset the hide timer if the mouse moves over the notice.
      mouse_reset: true,
      // Remove the notice's elements from the DOM after it is removed.
      remove: true,
      // Change new lines to br tags.
      insert_brs: true,
      // Whether to remove the notice from the global array when it is closed.
      destroy: true,
      // The stack on which the notices will be placed. Also controls the
      // direction the notices stack.
      stack: default_stack
    },

    // === Modules ===

    // This object holds all the PNotify modules. They are used to provide
    // additional functionality.
    modules: {},
    // This runs an event on all the modules.
    runModules: function(event, arg){
      var curArg;
      for (var module in this.modules) {
        curArg = ((typeof arg === "object" && module in arg) ? arg[module] : arg);
        if (typeof this.modules[module][event] === 'function') {
          this.modules[module].notice = this;
          this.modules[module].options = typeof this.options[module] === 'object' ? this.options[module] : {};
          this.modules[module][event](this, typeof this.options[module] === 'object' ? this.options[module] : {}, curArg);
        }
      }
    },

    // === Events ===

    init: function(){
      var that = this;

      // First and foremost, we don't want our module objects all referencing the prototype.
      this.modules = {};
      $.extend(true, this.modules, PNotify.prototype.modules);

      // Get our styling object.
      if (typeof this.options.styling === "object") {
        this.styles = this.options.styling;
      } else {
        this.styles = PNotify.styling[this.options.styling];
      }

      // Create our widget.
      // Stop animation, reset the removal timer when the user mouses over.
      this.elem = $("<div />", {
        "class": "ui-pnotify "+this.options.addclass,
        "css": {"display": "none"},
        "aria-live": "assertive",
        "aria-role": "alertdialog",
        "mouseenter": function(e){
          if (that.options.mouse_reset && that.animating === "out") {
            if (!that.timerHide) {
              return;
            }
            that.cancelRemove();
          }
          // Stop the close timer.
          if (that.options.hide && that.options.mouse_reset) {
            that.cancelRemove();
          }
        },
        "mouseleave": function(e){
          // Start the close timer.
          if (that.options.hide && that.options.mouse_reset && that.animating !== "out") {
            that.queueRemove();
          }
          PNotify.positionAll();
        }
      });
      // Maybe we need to fade in/out.
      if (this.options.animation === "fade") {
        this.elem.addClass("ui-pnotify-fade-"+this.options.animate_speed);
      }
      // Create a container for the notice contents.
      this.container = $("<div />", {
        "class": this.styles.container+" ui-pnotify-container "+(this.options.type === "error" ? this.styles.error : (this.options.type === "info" ? this.styles.info : (this.options.type === "success" ? this.styles.success : this.styles.notice))),
        "role": "alert"
      }).appendTo(this.elem);
      if (this.options.cornerclass !== "") {
        this.container.removeClass("ui-corner-all").addClass(this.options.cornerclass);
      }
      // Create a drop shadow.
      if (this.options.shadow) {
        this.container.addClass("ui-pnotify-shadow");
      }


      // Add the appropriate icon.
      if (this.options.icon !== false) {
        $("<div />", {"class": "ui-pnotify-icon"})
        .append($("<span />", {"class": this.options.icon === true ? (this.options.type === "error" ? this.styles.error_icon : (this.options.type === "info" ? this.styles.info_icon : (this.options.type === "success" ? this.styles.success_icon : this.styles.notice_icon))) : this.options.icon}))
        .prependTo(this.container);
      }

      // Add a title.
      this.title_container = $("<h4 />", {
        "class": "ui-pnotify-title"
      })
      .appendTo(this.container);
      if (this.options.title === false) {
        this.title_container.hide();
      } else if (this.options.title_escape) {
        this.title_container.text(this.options.title);
      } else {
        this.title_container.html(this.options.title);
      }

      // Add text.
      this.text_container = $("<div />", {
        "class": "ui-pnotify-text",
        "aria-role": "alert"
      })
      .appendTo(this.container);
      if (this.options.text === false) {
        this.text_container.hide();
      } else if (this.options.text_escape) {
        this.text_container.text(this.options.text);
      } else {
        this.text_container.html(this.options.insert_brs ? String(this.options.text).replace(/\n/g, "<br />") : this.options.text);
      }

      // Set width and min height.
      if (typeof this.options.width === "string") {
        this.elem.css("width", this.options.width);
      }
      if (typeof this.options.min_height === "string") {
        this.container.css("min-height", this.options.min_height);
      }


      // Add the notice to the notice array.
      if (this.options.stack.push === "top") {
        PNotify.notices = $.merge([this], PNotify.notices);
      } else {
        PNotify.notices = $.merge(PNotify.notices, [this]);
      }
      // Now position all the notices if they are to push to the top.
      if (this.options.stack.push === "top") {
        this.queuePosition(false, 1);
      }


      // Mark the stack so it won't animate the new notice.
      this.options.stack.animation = false;

      // Run the modules.
      this.runModules('init');

      // We're now initialized, but haven't been opened yet.
      this.state = "closed";

      // Display the notice.
      if (this.options.auto_display) {
        this.open();
      }
      return this;
    },

    // This function is for updating the notice.
    update: function(options){
      // Save old options.
      var oldOpts = this.options;
      // Then update to the new options.
      this.parseOptions(oldOpts, options);
      // Maybe we need to fade in/out.
      this.elem.removeClass("ui-pnotify-fade-slow ui-pnotify-fade-normal ui-pnotify-fade-fast");
      if (this.options.animation === "fade") {
        this.elem.addClass("ui-pnotify-fade-"+this.options.animate_speed);
      }
      // Update the corner class.
      if (this.options.cornerclass !== oldOpts.cornerclass) {
        this.container.removeClass("ui-corner-all "+oldOpts.cornerclass).addClass(this.options.cornerclass);
      }
      // Update the shadow.
      if (this.options.shadow !== oldOpts.shadow) {
        if (this.options.shadow) {
          this.container.addClass("ui-pnotify-shadow");
        } else {
          this.container.removeClass("ui-pnotify-shadow");
        }
      }
      // Update the additional classes.
      if (this.options.addclass === false) {
        this.elem.removeClass(oldOpts.addclass);
      } else if (this.options.addclass !== oldOpts.addclass) {
        this.elem.removeClass(oldOpts.addclass).addClass(this.options.addclass);
      }
      // Update the title.
      if (this.options.title === false) {
        this.title_container.slideUp("fast");
      } else if (this.options.title !== oldOpts.title) {
        if (this.options.title_escape) {
          this.title_container.text(this.options.title);
        } else {
          this.title_container.html(this.options.title);
        }
        if (oldOpts.title === false) {
          this.title_container.slideDown(200);
        }
      }
      // Update the text.
      if (this.options.text === false) {
        this.text_container.slideUp("fast");
      } else if (this.options.text !== oldOpts.text) {
        if (this.options.text_escape) {
          this.text_container.text(this.options.text);
        } else {
          this.text_container.html(this.options.insert_brs ? String(this.options.text).replace(/\n/g, "<br />") : this.options.text);
        }
        if (oldOpts.text === false) {
          this.text_container.slideDown(200);
        }
      }
      // Change the notice type.
      if (this.options.type !== oldOpts.type) {
        this.container.removeClass(
          this.styles.error+" "+this.styles.notice+" "+this.styles.success+" "+this.styles.info
        ).addClass(this.options.type === "error" ?
          this.styles.error :
          (this.options.type === "info" ?
            this.styles.info :
            (this.options.type === "success" ?
              this.styles.success :
              this.styles.notice
            )
          )
        );
      }
      if (this.options.icon !== oldOpts.icon || (this.options.icon === true && this.options.type !== oldOpts.type)) {
        // Remove any old icon.
        this.container.find("div.ui-pnotify-icon").remove();
        if (this.options.icon !== false) {
          // Build the new icon.
          $("<div />", {"class": "ui-pnotify-icon"})
          .append($("<span />", {"class": this.options.icon === true ? (this.options.type === "error" ? this.styles.error_icon : (this.options.type === "info" ? this.styles.info_icon : (this.options.type === "success" ? this.styles.success_icon : this.styles.notice_icon))) : this.options.icon}))
          .prependTo(this.container);
        }
      }
      // Update the width.
      if (this.options.width !== oldOpts.width) {
        this.elem.animate({width: this.options.width});
      }
      // Update the minimum height.
      if (this.options.min_height !== oldOpts.min_height) {
        this.container.animate({minHeight: this.options.min_height});
      }
      // Update the timed hiding.
      if (!this.options.hide) {
        this.cancelRemove();
      } else if (!oldOpts.hide) {
        this.queueRemove();
      }
      this.queuePosition(true);

      // Run the modules.
      this.runModules('update', oldOpts);
      return this;
    },

    // Display the notice.
    open: function(){
      this.state = "opening";
      // Run the modules.
      this.runModules('beforeOpen');

      var that = this;
      // If the notice is not in the DOM, append it.
      if (!this.elem.parent().length) {
        this.elem.appendTo(this.options.stack.context ? this.options.stack.context : body);
      }
      // Try to put it in the right position.
      if (this.options.stack.push !== "top") {
        this.position(true);
      }
      this.animateIn(function(){
        that.queuePosition(true);

        // Now set it to hide.
        if (that.options.hide) {
          that.queueRemove();
        }

        that.state = "open";

        // Run the modules.
        that.runModules('afterOpen');
      });

      return this;
    },

    // Remove the notice.
    remove: function(timer_hide) {
      this.state = "closing";
      this.timerHide = !!timer_hide; // Make sure it's a boolean.
      // Run the modules.
      this.runModules('beforeClose');

      var that = this;
      if (this.timer) {
        root.clearTimeout(this.timer);
        this.timer = null;
      }
      this.animateOut(function(){
        that.state = "closed";
        // Run the modules.
        that.runModules('afterClose');
        that.queuePosition(true);
        // If we're supposed to remove the notice from the DOM, do it.
        if (that.options.remove) {
          that.elem.detach();
        }
        // Run the modules.
        that.runModules('beforeDestroy');
        // Remove object from PNotify.notices to prevent memory leak (issue #49)
        // unless destroy is off
        if (that.options.destroy) {
          if (PNotify.notices !== null) {
            var idx = $.inArray(that, PNotify.notices);
            if (idx !== -1) {
              PNotify.notices.splice(idx,1);
            }
          }
        }
        // Run the modules.
        that.runModules('afterDestroy');
      });

      return this;
    },

    // === Class Methods ===

    // Get the DOM element.
    get: function(){
      return this.elem;
    },

    // Put all the options in the right places.
    parseOptions: function(options, moreOptions){
      this.options = $.extend(true, {}, PNotify.prototype.options);
      // This is the only thing that *should* be copied by reference.
      this.options.stack = PNotify.prototype.options.stack;
      var optArray = [options, moreOptions], curOpts;
      for (var curIndex=0; curIndex < optArray.length; curIndex++) {
        curOpts = optArray[curIndex];
        if (typeof curOpts === "undefined") {
          break;
        }
        if (typeof curOpts !== 'object') {
          this.options.text = curOpts;
        } else {
          for (var option in curOpts) {
            if (this.modules[option]) {
              // Avoid overwriting module defaults.
              $.extend(true, this.options[option], curOpts[option]);
            } else {
              this.options[option] = curOpts[option];
            }
          }
        }
      }
    },

    // Animate the notice in.
    animateIn: function(callback){
      // Declare that the notice is animating in.
      this.animating = "in";
      var that = this;
      var finished = function(){
        if (that.animTimer) {
          clearTimeout(that.animTimer);
        }
        if (that.animating !== "in") {
          return;
        }
        if (that.elem.is(":visible")) {
          if (callback) {
            callback.call();
          }
          // Declare that the notice has completed animating.
          that.animating = false;
        } else {
          that.animTimer = setTimeout(finished, 40);
        }
      };

      if (this.options.animation === "fade") {
        this.elem.one('webkitTransitionEnd mozTransitionEnd MSTransitionEnd oTransitionEnd transitionend', finished).addClass("ui-pnotify-in");
        this.elem.css("opacity"); // This line is necessary for some reason. Some notices don't fade without it.
        this.elem.addClass("ui-pnotify-fade-in");
        // Just in case the event doesn't fire, call it after 650 ms.
        this.animTimer = setTimeout(finished, 650);
      } else {
        this.elem.addClass("ui-pnotify-in");
        finished();
      }
    },

    // Animate the notice out.
    animateOut: function(callback){
      // Declare that the notice is animating out.
      this.animating = "out";
      var that = this;
      var finished = function(){
        if (that.animTimer) {
          clearTimeout(that.animTimer);
        }
        if (that.animating !== "out") {
          return;
        }
        if (that.elem.css("opacity") == "0" || !that.elem.is(":visible")) {
          that.elem.removeClass("ui-pnotify-in");
          if (that.options.stack.overlay) {
            // Go through the modal stack to see if any are left open.
            // TODO: Rewrite this cause it sucks.
            var stillOpen = false;
            $.each(PNotify.notices, function(i, notice){
              if (notice != that && notice.options.stack === that.options.stack && notice.state != "closed") {
                stillOpen = true;
              }
            });
            if (!stillOpen) {
              that.options.stack.overlay.hide();
            }
          }
          if (callback) {
            callback.call();
          }
          // Declare that the notice has completed animating.
          that.animating = false;
        } else {
          // In case this was called before the notice finished animating.
          that.animTimer = setTimeout(finished, 40);
        }
      };

      if (this.options.animation === "fade") {
        this.elem.one('webkitTransitionEnd mozTransitionEnd MSTransitionEnd oTransitionEnd transitionend', finished).removeClass("ui-pnotify-fade-in");
        // Just in case the event doesn't fire, call it after 650 ms.
        this.animTimer = setTimeout(finished, 650);
      } else {
        this.elem.removeClass("ui-pnotify-in");
        finished();
      }
    },

    // Position the notice. dont_skip_hidden causes the notice to
    // position even if it's not visible.
    position: function(dontSkipHidden){
      // Get the notice's stack.
      var stack = this.options.stack,
        elem = this.elem;
      if (typeof stack.context === "undefined") {
        stack.context = body;
      }
      if (!stack) {
        return;
      }
      if (typeof stack.nextpos1 !== "number") {
        stack.nextpos1 = stack.firstpos1;
      }
      if (typeof stack.nextpos2 !== "number") {
        stack.nextpos2 = stack.firstpos2;
      }
      if (typeof stack.addpos2 !== "number") {
        stack.addpos2 = 0;
      }
      var hidden = !elem.hasClass("ui-pnotify-in");
      // Skip this notice if it's not shown.
      if (!hidden || dontSkipHidden) {
        if (stack.modal) {
          if (stack.overlay) {
            stack.overlay.show();
          } else {
            stack.overlay = createStackOverlay(stack);
          }
        }
        // Add animate class by default.
        elem.addClass("ui-pnotify-move");
        var curpos1, curpos2;
        // Calculate the current pos1 value.
        var csspos1;
        switch (stack.dir1) {
          case "down":
            csspos1 = "top";
            break;
          case "up":
            csspos1 = "bottom";
            break;
          case "left":
            csspos1 = "right";
            break;
          case "right":
            csspos1 = "left";
            break;
        }
        curpos1 = parseInt(elem.css(csspos1).replace(/(?:\..*|[^0-9.])/g, ''));
        if (isNaN(curpos1)) {
          curpos1 = 0;
        }
        // Remember the first pos1, so the first visible notice goes there.
        if (typeof stack.firstpos1 === "undefined" && !hidden) {
          stack.firstpos1 = curpos1;
          stack.nextpos1 = stack.firstpos1;
        }
        // Calculate the current pos2 value.
        var csspos2;
        switch (stack.dir2) {
          case "down":
            csspos2 = "top";
            break;
          case "up":
            csspos2 = "bottom";
            break;
          case "left":
            csspos2 = "right";
            break;
          case "right":
            csspos2 = "left";
            break;
        }
        curpos2 = parseInt(elem.css(csspos2).replace(/(?:\..*|[^0-9.])/g, ''));
        if (isNaN(curpos2)) {
          curpos2 = 0;
        }
        // Remember the first pos2, so the first visible notice goes there.
        if (typeof stack.firstpos2 === "undefined" && !hidden) {
          stack.firstpos2 = curpos2;
          stack.nextpos2 = stack.firstpos2;
        }
        // Check that it's not beyond the viewport edge.
        if (
            (stack.dir1 === "down" && stack.nextpos1 + elem.height() > (stack.context.is(body) ? jwindow.height() : stack.context.prop('scrollHeight')) ) ||
            (stack.dir1 === "up" && stack.nextpos1 + elem.height() > (stack.context.is(body) ? jwindow.height() : stack.context.prop('scrollHeight')) ) ||
            (stack.dir1 === "left" && stack.nextpos1 + elem.width() > (stack.context.is(body) ? jwindow.width() : stack.context.prop('scrollWidth')) ) ||
            (stack.dir1 === "right" && stack.nextpos1 + elem.width() > (stack.context.is(body) ? jwindow.width() : stack.context.prop('scrollWidth')) )
          ) {
          // If it is, it needs to go back to the first pos1, and over on pos2.
          stack.nextpos1 = stack.firstpos1;
          stack.nextpos2 += stack.addpos2 + (typeof stack.spacing2 === "undefined" ? 25 : stack.spacing2);
          stack.addpos2 = 0;
        }
        if (typeof stack.nextpos2 === "number") {
          if (!stack.animation) {
            elem.removeClass("ui-pnotify-move");
            elem.css(csspos2, stack.nextpos2+"px");
            elem.css(csspos2);
            elem.addClass("ui-pnotify-move");
          } else {
            elem.css(csspos2, stack.nextpos2+"px");
          }
        }
        // Keep track of the widest/tallest notice in the column/row, so we can push the next column/row.
        switch (stack.dir2) {
          case "down":
          case "up":
            if (elem.outerHeight(true) > stack.addpos2) {
              stack.addpos2 = elem.height();
            }
            break;
          case "left":
          case "right":
            if (elem.outerWidth(true) > stack.addpos2) {
              stack.addpos2 = elem.width();
            }
            break;
        }
        // Move the notice on dir1.
        if (typeof stack.nextpos1 === "number") {
          if (!stack.animation) {
            elem.removeClass("ui-pnotify-move");
            elem.css(csspos1, stack.nextpos1+"px");
            elem.css(csspos1);
            elem.addClass("ui-pnotify-move");
          } else {
            elem.css(csspos1, stack.nextpos1+"px");
          }
        }
        // Calculate the next dir1 position.
        switch (stack.dir1) {
          case "down":
          case "up":
            stack.nextpos1 += elem.height() + (typeof stack.spacing1 === "undefined" ? 25 : stack.spacing1);
            break;
          case "left":
          case "right":
            stack.nextpos1 += elem.width() + (typeof stack.spacing1 === "undefined" ? 25 : stack.spacing1);
            break;
        }
      }
      return this;
    },
    // Queue the position all function so it doesn't run repeatedly and
    // use up resources.
    queuePosition: function(animate, milliseconds){
      if (posTimer) {
        clearTimeout(posTimer);
      }
      if (!milliseconds) {
        milliseconds = 10;
      }
      posTimer = setTimeout(function(){
        PNotify.positionAll(animate);
      }, milliseconds);
      return this;
    },


    // Cancel any pending removal timer.
    cancelRemove: function(){
      if (this.timer) {
        root.clearTimeout(this.timer);
      }
      if (this.animTimer) {
        root.clearTimeout(this.animTimer);
      }
      if (this.state === "closing") {
        // If it's animating out, stop it.
        this.state = "open";
        this.animating = false;
        this.elem.addClass("ui-pnotify-in");
        if (this.options.animation === "fade") {
          this.elem.addClass("ui-pnotify-fade-in");
        }
      }
      return this;
    },
    // Queue a removal timer.
    queueRemove: function(){
      var that = this;
      // Cancel any current removal timer.
      this.cancelRemove();
      this.timer = root.setTimeout(function(){
        that.remove(true);
      }, (isNaN(this.options.delay) ? 0 : this.options.delay));
      return this;
    }
  });
  // These functions affect all notices.
  $.extend(PNotify, {
    // This holds all the notices.
    notices: [],
    reload: init,
    removeAll: function(){
      $.each(PNotify.notices, function(i, notice){
        if (notice.remove) {
          notice.remove(false);
        }
      });
    },
    removeStack: function(stack){
      $.each(PNotify.notices, function(i, notice){
        if (notice.remove && notice.options.stack === stack) {
          notice.remove(false);
        }
      });
    },
    positionAll: function(animate){
      // This timer is used for queueing this function so it doesn't run
      // repeatedly.
      if (posTimer) {
        clearTimeout(posTimer);
      }
      posTimer = null;
      // Reset the next position data.
      if (PNotify.notices && PNotify.notices.length) {
        $.each(PNotify.notices, function(i, notice){
          var s = notice.options.stack;
          if (!s) {
            return;
          }
          if (s.overlay) {
            s.overlay.hide();
          }
          s.nextpos1 = s.firstpos1;
          s.nextpos2 = s.firstpos2;
          s.addpos2 = 0;
          s.animation = animate;
        });
        $.each(PNotify.notices, function(i, notice){
          notice.position();
        });
      } else {
        var s = PNotify.prototype.options.stack;
        if (s) {
          delete s.nextpos1;
          delete s.nextpos2;
        }
      }
    },
    styling: {
      brighttheme: {
        // Bright Theme doesn't require any UI libraries.
        container: "brighttheme",
        notice: "brighttheme-notice",
        notice_icon: "brighttheme-icon-notice",
        info: "brighttheme-info",
        info_icon: "brighttheme-icon-info",
        success: "brighttheme-success",
        success_icon: "brighttheme-icon-success",
        error: "brighttheme-error",
        error_icon: "brighttheme-icon-error"
      },
      bootstrap3: {
        container: "alert",
        notice: "alert-primary",
        notice_icon: "glyphicon glyphicon-exclamation-sign",
        info: "alert-info",
        info_icon: "glyphicon glyphicon-info-sign",
        success: "alert-success",
        success_icon: "glyphicon glyphicon-ok-sign",
        error: "alert-danger",
        error_icon: "glyphicon glyphicon-warning-sign"
      }
    }
  });
  /*
   * uses icons from http://fontawesome.io/
   * version 4.0.3
   */
  PNotify.styling.fontawesome = $.extend({}, PNotify.styling.bootstrap3);
  $.extend(PNotify.styling.fontawesome, {
    notice_icon: "fa fa-exclamation-circle",
    info_icon: "fa fa-info",
    success_icon: "fa fa-check",
    error_icon: "fa fa-warning"
  });

  if (root.document.body) {
    do_when_ready();
  } else {
    $(do_when_ready);
  }
  return PNotify;
};
return init(root);
}));

// Animate
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.animate', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  PNotify.prototype.options.animate = {
    // Use animate.css to animate the notice.
    animate: false,
    // The class to use to animate the notice in.
    in_class: "",
    // The class to use to animate the notice out.
    out_class: ""
  };
  PNotify.prototype.modules.animate = {
    init: function(notice, options){
      this.setUpAnimations(notice, options);

      notice.attention = function(aniClass, callback){
        notice.elem.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          notice.elem.removeClass(aniClass);
          if (callback) {
            callback.call(notice);
          }
        }).addClass("animated "+aniClass);
      };
    },

    update: function(notice, options, oldOpts){
      if (options.animate != oldOpts.animate) {
        this.setUpAnimations(notice, options)
      }
    },

    setUpAnimations: function(notice, options){
      if (options.animate) {
        notice.options.animation = "none";
        notice.elem.removeClass("ui-pnotify-fade-slow ui-pnotify-fade-normal ui-pnotify-fade-fast");
        if (!notice._animateIn) {
          notice._animateIn = notice.animateIn;
        }
        if (!notice._animateOut) {
          notice._animateOut = notice.animateOut;
        }
        notice.animateIn = this.animateIn.bind(this);
        notice.animateOut = this.animateOut.bind(this);
        var animSpeed = 400;
        if (notice.options.animate_speed === "slow") {
          animSpeed = 600;
        } else if (notice.options.animate_speed === "fast") {
          animSpeed = 200;
        } else if (notice.options.animate_speed > 0) {
          animSpeed = notice.options.animate_speed;
        }
        animSpeed = animSpeed / 1000;
        notice.elem.addClass("animated").css({
          "-webkit-animation-duration": animSpeed+"s",
          "-moz-animation-duration": animSpeed+"s",
          "animation-duration": animSpeed+"s"
        });
      } else if (notice._animateIn && notice._animateOut) {
        notice.animateIn = notice._animateIn;
        delete notice._animateIn;
        notice.animateOut = notice._animateOut;
        delete notice._animateOut;
        notice.elem.addClass("animated");
      }
    },

    animateIn: function(callback){
      // Declare that the notice is animating in.
      this.notice.animating = "in";
      var that = this;
      callback = (function(){
        that.notice.elem.removeClass(that.options.in_class);
        if (this) {
          this.call();
        }
        // Declare that the notice has completed animating.
        that.notice.animating = false;
      }).bind(callback);

      this.notice.elem.show().one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', callback).removeClass(this.options.out_class).addClass("ui-pnotify-in").addClass(this.options.in_class);
    },

    animateOut: function(callback){
      // Declare that the notice is animating out.
      this.notice.animating = "out";
      var that = this;
      callback = (function(){
        that.notice.elem.removeClass("ui-pnotify-in " + that.options.out_class);
        if (this) {
          this.call();
        }
        // Declare that the notice has completed animating.
        that.notice.animating = false;
      }).bind(callback);

      this.notice.elem.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', callback).removeClass(this.options.in_class).addClass(this.options.out_class);
    }
  };
  return PNotify;
}));

// Buttons
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.buttons', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  PNotify.prototype.options.buttons = {
    // Provide a button for the user to manually close the notice.
    closer: true,
    // Only show the closer button on hover.
    closer_hover: true,
    // Provide a button for the user to manually stick the notice.
    sticker: true,
    // Only show the sticker button on hover.
    sticker_hover: true,
    // Show the buttons even when the nonblock module is in use.
    show_on_nonblock: false,
    // The various displayed text, helps facilitating internationalization.
    labels: {
      close: "Close",
      stick: "Stick",
      unstick: "Unstick"
    },
    // The classes to use for button icons. Leave them null to use the classes from the styling you're using.
    classes: {
      closer: null,
      pin_up: null,
      pin_down: null
    }
  };
  PNotify.prototype.modules.buttons = {
    init: function(notice, options){
      var that = this;
      notice.elem.on({
        "mouseenter": function(e){
          // Show the buttons.
          if (that.options.sticker && (!(notice.options.nonblock && notice.options.nonblock.nonblock) || that.options.show_on_nonblock)) {
            that.sticker.trigger("pnotify:buttons:toggleStick").css("visibility", "visible");
          }
          if (that.options.closer && (!(notice.options.nonblock && notice.options.nonblock.nonblock) || that.options.show_on_nonblock)) {
            that.closer.css("visibility", "visible");
          }
        },
        "mouseleave": function(e){
          // Hide the buttons.
          if (that.options.sticker_hover) {
            that.sticker.css("visibility", "hidden");
          }
          if (that.options.closer_hover) {
            that.closer.css("visibility", "hidden");
          }
        }
      });

      // Provide a button to stick the notice.
      this.sticker = $("<div />", {
        "class": "ui-pnotify-sticker",
        "aria-role": "button",
        "aria-pressed": notice.options.hide ? "false" : "true",
        "tabindex": "0",
        "title": notice.options.hide ? options.labels.stick : options.labels.unstick,
        "css": {
          "cursor": "pointer",
          "visibility": options.sticker_hover ? "hidden" : "visible"
        },
        "click": function(){
          notice.options.hide = !notice.options.hide;
          if (notice.options.hide) {
            notice.queueRemove();
          } else {
            notice.cancelRemove();
          }
          $(this).trigger("pnotify:buttons:toggleStick");
        }
      })
      .bind("pnotify:buttons:toggleStick", function(){
        var pin_up = that.options.classes.pin_up === null ? notice.styles.pin_up : that.options.classes.pin_up;
        var pin_down = that.options.classes.pin_down === null ? notice.styles.pin_down : that.options.classes.pin_down;
        $(this)
        .attr("title", notice.options.hide ? that.options.labels.stick : that.options.labels.unstick)
        .children()
        .attr("class", "")
        .addClass(notice.options.hide ? pin_up : pin_down)
        .attr("aria-pressed", notice.options.hide ? "false" : "true");
      })
      .append("<span />")
      .trigger("pnotify:buttons:toggleStick")
      .prependTo(notice.container);
      if (!options.sticker || (notice.options.nonblock && notice.options.nonblock.nonblock && !options.show_on_nonblock)) {
        this.sticker.css("display", "none");
      }

      // Provide a button to close the notice.
      this.closer = $("<div />", {
        "class": "ui-pnotify-closer",
        "aria-role": "button",
        "tabindex": "0",
        "title": options.labels.close,
        "css": {"cursor": "pointer", "visibility": options.closer_hover ? "hidden" : "visible"},
        "click": function(){
          notice.remove(false);
          that.sticker.css("visibility", "hidden");
          that.closer.css("visibility", "hidden");
        }
      })
      .append($("<span />", {"class": options.classes.closer === null ? notice.styles.closer : options.classes.closer}))
      .prependTo(notice.container);
      if (!options.closer || (notice.options.nonblock && notice.options.nonblock.nonblock && !options.show_on_nonblock)) {
        this.closer.css("display", "none");
      }
    },
    update: function(notice, options){
      // Update the sticker and closer buttons.
      if (!options.closer || (notice.options.nonblock && notice.options.nonblock.nonblock && !options.show_on_nonblock)) {
        this.closer.css("display", "none");
      } else if (options.closer) {
        this.closer.css("display", "block");
      }
      if (!options.sticker || (notice.options.nonblock && notice.options.nonblock.nonblock && !options.show_on_nonblock)) {
        this.sticker.css("display", "none");
      } else if (options.sticker) {
        this.sticker.css("display", "block");
      }
      // Update the sticker icon.
      this.sticker.trigger("pnotify:buttons:toggleStick");
      // Update the close icon.
      this.closer.find("span").attr("class", "").addClass(options.classes.closer === null ? notice.styles.closer : options.classes.closer);
      // Update the hover status of the buttons.
      if (options.sticker_hover) {
        this.sticker.css("visibility", "hidden");
      } else if (!(notice.options.nonblock && notice.options.nonblock.nonblock && !options.show_on_nonblock)) {
        this.sticker.css("visibility", "visible");
      }
      if (options.closer_hover) {
        this.closer.css("visibility", "hidden");
      } else if (!(notice.options.nonblock && notice.options.nonblock.nonblock && !options.show_on_nonblock)) {
        this.closer.css("visibility", "visible");
      }
    }
  };
  $.extend(PNotify.styling.brighttheme, {
    closer: "brighttheme-icon-closer",
    pin_up: "brighttheme-icon-sticker",
    pin_down: "brighttheme-icon-sticker brighttheme-icon-stuck"
  });
  $.extend(PNotify.styling.bootstrap3, {
    closer: "glyphicon glyphicon-remove",
    pin_up: "glyphicon glyphicon-pause",
    pin_down: "glyphicon glyphicon-play"
  });
  $.extend(PNotify.styling.fontawesome, {
    closer: "fa fa-times ml-2",
    pin_up: "fa fa-pause ml-2",
    pin_down: "fa fa-play ml-2"
  });
  return PNotify;
}));

// Callbacks
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.callbacks', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  var _init   = PNotify.prototype.init,
      _open   = PNotify.prototype.open,
      _remove = PNotify.prototype.remove;
  PNotify.prototype.init = function(){
    if (this.options.before_init) {
      this.options.before_init(this.options);
    }
    _init.apply(this, arguments);
    if (this.options.after_init) {
      this.options.after_init(this);
    }
  };
  PNotify.prototype.open = function(){
    var ret;
    if (this.options.before_open) {
      ret = this.options.before_open(this);
    }
    if (ret !== false) {
      _open.apply(this, arguments);
      if (this.options.after_open) {
        this.options.after_open(this);
      }
    }
  };
  PNotify.prototype.remove = function(timer_hide){
    var ret;
    if (this.options.before_close) {
      ret = this.options.before_close(this, timer_hide);
    }
    if (ret !== false) {
      _remove.apply(this, arguments);
      if (this.options.after_close) {
        this.options.after_close(this, timer_hide);
      }
    }
  };
  return PNotify;
}));

// Confirm
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.confirm', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  PNotify.prototype.options.confirm = {
    // Make a confirmation box.
    confirm: false,
    // Make a prompt.
    prompt: false,
    // Classes to add to the input element of the prompt.
    prompt_class: "",
    // The default value of the prompt.
    prompt_default: "",
    // Whether the prompt should accept multiple lines of text.
    prompt_multi_line: false,
    // Where to align the buttons. (right, center, left, justify)
    align: "right",
    // The buttons to display, and their callbacks.
    buttons: [
      {
        text: "Ok",
        addClass: "",
        // Whether to trigger this button when the user hits enter in a single line prompt.
        promptTrigger: true,
        click: function(notice, value){
          notice.remove();
          notice.get().trigger("pnotify.confirm", [notice, value]);
        }
      },
      {
        text: "Cancel",
        addClass: "",
        click: function(notice){
          notice.remove();
          notice.get().trigger("pnotify.cancel", notice);
        }
      }
    ]
  };
  PNotify.prototype.modules.confirm = {
    init: function(notice, options){
      // The div that contains the buttons.
      this.container = $('<div class="ui-pnotify-action-bar" style="margin-top:5px;clear:both;" />').css('text-align', options.align).appendTo(notice.container);

      if (options.confirm || options.prompt)
        this.makeDialog(notice, options);
      else
        this.container.hide();
    },

    update: function(notice, options){
      if (options.confirm) {
        this.makeDialog(notice, options);
        this.container.show();
      } else {
        this.container.hide().empty();
      }
    },

    afterOpen: function(notice, options){
      if (options.prompt) {
        this.prompt.focus();
      }
    },

    makeDialog: function(notice, options) {
      var already = false, that = this, btn, elem;
      this.container.empty();
      if (options.prompt) {
        // The input element of a prompt.
        this.prompt = $('<'+(options.prompt_multi_line ? 'textarea rows="5"' : 'input type="text"')+' style="margin-bottom:5px;clear:both;" />')
        .addClass((typeof notice.styles.input === "undefined" ? "" : notice.styles.input)+" "+(typeof options.prompt_class === "undefined" ? "" : options.prompt_class))
        .val(options.prompt_default)
        .appendTo(this.container);
      }
      var customButtons = (options.buttons[0] && options.buttons[0] !== PNotify.prototype.options.confirm.buttons[0]);
      for (var i = 0; i < options.buttons.length; i++) {
        if (options.buttons[i] === null || (customButtons && PNotify.prototype.options.confirm.buttons[i] && PNotify.prototype.options.confirm.buttons[i] === options.buttons[i])) {
          continue;
        }
        btn = options.buttons[i];
        if (already) {
          this.container.append(' ');
        } else {
          already = true;
        }
        elem = $('<button type="button" class="ui-pnotify-action-button" />')
        .addClass((typeof notice.styles.btn === "undefined" ? "" : notice.styles.btn)+" "+(typeof btn.addClass === "undefined" ? "" : btn.addClass))
        .text(btn.text)
        .appendTo(this.container)
        .on("click", (function(btn){ return function(){
          if (typeof btn.click == "function") {
            btn.click(notice, options.prompt ? that.prompt.val() : null);
          }
        }})(btn));
        if (options.prompt && !options.prompt_multi_line && btn.promptTrigger)
          this.prompt.keypress((function(elem){ return function(e){
            if (e.keyCode == 13)
              elem.click();
          }})(elem));
        if (notice.styles.text) {
          elem.wrapInner('<span class="'+notice.styles.text+'"></span>');
        }
        if (notice.styles.btnhover) {
          elem.hover((function(elem){ return function(){
            elem.addClass(notice.styles.btnhover);
          }})(elem), (function(elem){ return function(){
            elem.removeClass(notice.styles.btnhover);
          }})(elem));
        }
        if (notice.styles.btnactive) {
          elem.on("mousedown", (function(elem){ return function(){
            elem.addClass(notice.styles.btnactive);
          }})(elem)).on("mouseup", (function(elem){ return function(){
            elem.removeClass(notice.styles.btnactive);
          }})(elem));
        }
        if (notice.styles.btnfocus) {
          elem.on("focus", (function(elem){ return function(){
            elem.addClass(notice.styles.btnfocus);
          }})(elem)).on("blur", (function(elem){ return function(){
            elem.removeClass(notice.styles.btnfocus);
          }})(elem));
        }
      }
    }
  };
  $.extend(PNotify.styling.bootstrap3, {
    btn: "btn btn-secondary",
    input: "form-control"
  });
  $.extend(PNotify.styling.fontawesome, {
    btn: "btn btn-secondary",
    input: "form-control"
  });
  return PNotify;
}));

// Desktop
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.desktop', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  var permission;
  var notify = function(title, options){
    // Memoize based on feature detection.
    if ("Notification" in window) {
      notify = function (title, options) {
        return new Notification(title, options);
      };
    } else if ("mozNotification" in navigator) {
      notify = function (title, options) {
        // Gecko < 22
        return navigator.mozNotification
          .createNotification(title, options.body, options.icon)
          .show();
      };
    } else if ("webkitNotifications" in window) {
      notify = function (title, options) {
        return window.webkitNotifications.createNotification(
          options.icon,
          title,
          options.body
        );
      };
    } else {
      notify = function (title, options) {
        return null;
      };
    }
    return notify(title, options);
  };


  PNotify.prototype.options.desktop = {
    // Display the notification as a desktop notification.
    desktop: false,
    // If desktop notifications are not supported or allowed, fall back to a regular notice.
    fallback: true,
    // The URL of the icon to display. If false, no icon will show. If null, a default icon will show.
    icon: null,
    // Using a tag lets you update an existing notice, or keep from duplicating notices between tabs.
    // If you leave tag null, one will be generated, facilitating the "update" function.
    // see: http://www.w3.org/TR/notifications/#tags-example
    tag: null,
    // Optionally display a different title for the desktop.
    title: null,
    // Optionally display different text for the desktop.
    text: null
  };
  PNotify.prototype.modules.desktop = {
    genNotice: function(notice, options){
      if (options.icon === null) {
        this.icon = "http://sciactive.com/pnotify/includes/desktop/"+notice.options.type+".png";
      } else if (options.icon === false) {
        this.icon = null;
      } else {
        this.icon = options.icon;
      }
      if (this.tag === null || options.tag !== null) {
        this.tag = options.tag === null ? "PNotify-"+Math.round(Math.random() * 1000000) : options.tag;
      }
      notice.desktop = notify(options.title || notice.options.title, {
        icon: this.icon,
        body: options.text || notice.options.text,
        tag: this.tag
      });
      if (!("close" in notice.desktop) && ("cancel" in notice.desktop)) {
        notice.desktop.close = function(){
          notice.desktop.cancel();
        };
      }
      notice.desktop.onclick = function(){
        notice.elem.trigger("click");
      };
      notice.desktop.onclose = function(){
        if (notice.state !== "closing" && notice.state !== "closed") {
          notice.remove();
        }
      };
    },
    init: function(notice, options){
      if (!options.desktop)
        return;
      permission = PNotify.desktop.checkPermission();
      if (permission !== 0) {
        // Keep the notice from opening if fallback is false.
        if (!options.fallback) {
          notice.options.auto_display = false;
        }
        return;
      }
      this.genNotice(notice, options);
    },
    update: function(notice, options, oldOpts){
      if ((permission !== 0 && options.fallback) || !options.desktop)
        return;
      this.genNotice(notice, options);
    },
    beforeOpen: function(notice, options){
      if ((permission !== 0 && options.fallback) || !options.desktop)
        return;
      notice.elem.css({'left': '-10000px'}).removeClass('ui-pnotify-in');
    },
    afterOpen: function(notice, options){
      if ((permission !== 0 && options.fallback) || !options.desktop)
        return;
      notice.elem.css({'left': '-10000px'}).removeClass('ui-pnotify-in');
      if ("show" in notice.desktop) {
        notice.desktop.show();
      }
    },
    beforeClose: function(notice, options){
      if ((permission !== 0 && options.fallback) || !options.desktop)
        return;
      notice.elem.css({'left': '-10000px'}).removeClass('ui-pnotify-in');
    },
    afterClose: function(notice, options){
      if ((permission !== 0 && options.fallback) || !options.desktop)
        return;
      notice.elem.css({'left': '-10000px'}).removeClass('ui-pnotify-in');
      if ("close" in notice.desktop) {
        notice.desktop.close();
      }
    }
  };
  PNotify.desktop = {
    permission: function(){
      if (typeof Notification !== "undefined" && "requestPermission" in Notification) {
        Notification.requestPermission();
      } else if ("webkitNotifications" in window) {
        window.webkitNotifications.requestPermission();
      }
    },
    checkPermission: function(){
      if (typeof Notification !== "undefined" && "permission" in Notification) {
        return (Notification.permission === "granted" ? 0 : 1);
      } else if ("webkitNotifications" in window) {
        return window.webkitNotifications.checkPermission() == 0 ? 0 : 1;
      } else {
        return 1;
      }
    }
  };
  permission = PNotify.desktop.checkPermission();
  return PNotify;
}));

// History
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.history', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  var history_menu,
      history_handle_top;
  $(function(){
    $("body").on("pnotify.history-all", function(){
      // Display all notices. (Disregarding non-history notices.)
      $.each(PNotify.notices, function(){
        if (this.modules.history.inHistory) {
          if (this.elem.is(":visible")) {
            // The hide variable controls whether the history pull down should
            // queue a removal timer.
            if (this.options.hide)
              this.queueRemove();
          } else if (this.open)
            this.open();
        }
      });
    }).on("pnotify.history-last", function(){
      var pushTop = (PNotify.prototype.options.stack.push === "top");

      // Look up the last history notice, and display it.
      var i = (pushTop ? 0 : -1);

      var notice;
      do {
        if (i === -1)
          notice = PNotify.notices.slice(i);
        else
          notice = PNotify.notices.slice(i, i+1);
        if (!notice[0])
          return false;

        i = (pushTop ? i + 1 : i - 1);
      } while (!notice[0].modules.history.inHistory || notice[0].elem.is(":visible"));
      if (notice[0].open)
        notice[0].open();
    });
  });
  PNotify.prototype.options.history = {
    // Place the notice in the history.
    history: true,
    // Display a pull down menu to redisplay previous notices.
    menu: false,
    // Make the pull down menu fixed to the top of the viewport.
    fixed: true,
    // Maximum number of notifications to have onscreen.
    maxonscreen: Infinity,
    // The various displayed text, helps facilitating internationalization.
    labels: {
      redisplay: "Redisplay",
      all: "All",
      last: "Last"
    }
  };
  PNotify.prototype.modules.history = {
    init: function(notice, options){
      // Make sure that no notices get destroyed.
      notice.options.destroy = false;

      // The history variable controls whether the notice gets redisplayed
      // by the history pull down.
      this.inHistory = options.history;

      if (options.menu) {
        // If there isn't a history pull down, create one.
        if (typeof history_menu === "undefined") {
          history_menu = $("<div />", {
            "class": "ui-pnotify-history-container "+notice.styles.hi_menu,
            "mouseleave": function(){
              history_menu.css("top", "-"+history_handle_top+"px");
            }
          })
          .append($("<div />", {"class": "ui-pnotify-history-header", "text": options.labels.redisplay}))
          .append($("<button />", {
            "class": "ui-pnotify-history-all "+notice.styles.hi_btn,
            "text": options.labels.all,
            "mouseenter": function(){
              $(this).addClass(notice.styles.hi_btnhov);
            },
            "mouseleave": function(){
              $(this).removeClass(notice.styles.hi_btnhov);
            },
            "click": function(){
              $(this).trigger("pnotify.history-all");
              return false;
            }
          }))
          .append($("<button />", {
            "class": "ui-pnotify-history-last "+notice.styles.hi_btn,
            "text": options.labels.last,
            "mouseenter": function(){
              $(this).addClass(notice.styles.hi_btnhov);
            },
            "mouseleave": function(){
              $(this).removeClass(notice.styles.hi_btnhov);
            },
            "click": function(){
              $(this).trigger("pnotify.history-last");
              return false;
            }
          }))
          .appendTo("body");

          // Make a handle so the user can pull down the history tab.
          var handle = $("<span />", {
            "class": "ui-pnotify-history-pulldown "+notice.styles.hi_hnd,
            "mouseenter": function(){
              history_menu.css("top", "0");
            }
          })
          .appendTo(history_menu);

          // Get the top of the handle.
          history_handle_top = handle.offset().top + 2;
          // Hide the history pull down up to the top of the handle.
          history_menu.css("top", "-"+history_handle_top+"px");

          // Apply the fixed styling.
          if (options.fixed) {
            history_menu.addClass('ui-pnotify-history-fixed');
          }
        }
      }
    },
    update: function(notice, options){
      // Update values for history menu access.
      this.inHistory = options.history;
      if (options.fixed && history_menu) {
        history_menu.addClass('ui-pnotify-history-fixed');
      } else if (history_menu) {
        history_menu.removeClass('ui-pnotify-history-fixed');
      }
    },
    beforeOpen: function(notice, options){
      // Remove oldest notifications leaving only options.maxonscreen on screen
      if (PNotify.notices && (PNotify.notices.length > options.maxonscreen)) {
        // Oldest are normally in front of array, or if stack.push=="top" then
        // they are at the end of the array! (issue #98)
        var el;
        if (notice.options.stack.push !== "top") {
          el = PNotify.notices.slice(0, PNotify.notices.length - options.maxonscreen);
        } else {
          el = PNotify.notices.slice(options.maxonscreen, PNotify.notices.length);
        }

        $.each(el, function(){
          if (this.remove) {
            this.remove();
          }
        });
      }
    }
  };
  $.extend(PNotify.styling.brighttheme, {
    hi_menu: "ui-pnotify-history-brighttheme",
    hi_btn: "",
    hi_btnhov: "",
    hi_hnd: ""
  });
  $.extend(PNotify.styling.bootstrap3, {
    hi_menu: "well",
    hi_btn: "btn btn-secondary",
    hi_btnhov: "",
    hi_hnd: "glyphicon glyphicon-chevron-down"
  });
  $.extend(PNotify.styling.fontawesome, {
    hi_menu: "well",
    hi_btn: "btn btn-secondary",
    hi_btnhov: "",
    hi_hnd: "fa fa-chevron-down"
  });
  return PNotify;
}));

// Mobile
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.mobile', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  PNotify.prototype.options.mobile = {
    // Let the user swipe the notice away.
    swipe_dismiss: true,
    // Styles the notice to look good on mobile.
    styling: true
  };
  PNotify.prototype.modules.mobile = {
    init: function(notice, options){
      var that = this,
          origX = null,
          diffX = null,
          noticeWidth = null;

      this.swipe_dismiss = options.swipe_dismiss;
      this.doMobileStyling(notice, options);

      notice.elem.on({
        "touchstart": function(e){
          if (!that.swipe_dismiss) {
            return;
          }

          origX = e.originalEvent.touches[0].screenX;
          noticeWidth = notice.elem.width();
          notice.container.css("left", "0");
        },
        "touchmove": function(e){
          if (!origX || !that.swipe_dismiss) {
            return;
          }

          var curX = e.originalEvent.touches[0].screenX;

          diffX = curX - origX;
          var opacity = (1 - (Math.abs(diffX) / noticeWidth)) * notice.options.opacity;

          notice.elem.css("opacity", opacity);
          notice.container.css("left", diffX);
        },
        "touchend": function() {
          if (!origX || !that.swipe_dismiss) {
            return;
          }

          if (Math.abs(diffX) > 40) {
            var goLeft = (diffX < 0) ? noticeWidth * -2 : noticeWidth * 2;
            notice.elem.animate({"opacity": 0}, 100);
            notice.container.animate({"left": goLeft}, 100);
            notice.remove();
          } else {
            notice.elem.animate({"opacity": notice.options.opacity}, 100);
            notice.container.animate({"left": 0}, 100);
          }
          origX = null;
          diffX = null;
          noticeWidth = null;
        },
        "touchcancel": function(){
          if (!origX || !that.swipe_dismiss) {
            return;
          }

          notice.elem.animate({"opacity": notice.options.opacity}, 100);
          notice.container.animate({"left": 0}, 100);
          origX = null;
          diffX = null;
          noticeWidth = null;
        }
      });
    },
    update: function(notice, options){
      this.swipe_dismiss = options.swipe_dismiss;
      this.doMobileStyling(notice, options);
    },
    doMobileStyling: function(notice, options){
      if (options.styling) {
        notice.elem.addClass("ui-pnotify-mobile-able");

        if ($(window).width() <= 480) {
          if (!notice.options.stack.mobileOrigSpacing1) {
            notice.options.stack.mobileOrigSpacing1 = notice.options.stack.spacing1;
            notice.options.stack.mobileOrigSpacing2 = notice.options.stack.spacing2;
          }
          notice.options.stack.spacing1 = 0;
          notice.options.stack.spacing2 = 0;
        } else if (notice.options.stack.mobileOrigSpacing1 || notice.options.stack.mobileOrigSpacing2) {
          notice.options.stack.spacing1 = notice.options.stack.mobileOrigSpacing1;
          delete notice.options.stack.mobileOrigSpacing1;
          notice.options.stack.spacing2 = notice.options.stack.mobileOrigSpacing2;
          delete notice.options.stack.mobileOrigSpacing2;
        }
      } else {
        notice.elem.removeClass("ui-pnotify-mobile-able");

        if (notice.options.stack.mobileOrigSpacing1) {
          notice.options.stack.spacing1 = notice.options.stack.mobileOrigSpacing1;
          delete notice.options.stack.mobileOrigSpacing1;
        }
        if (notice.options.stack.mobileOrigSpacing2) {
          notice.options.stack.spacing2 = notice.options.stack.mobileOrigSpacing2;
          delete notice.options.stack.mobileOrigSpacing2;
        }
      }
    }
  };
  return PNotify;
}));

// Nonblock
(function (root, factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as a module.
    define('pnotify.nonblock', ['jquery', 'pnotify'], factory);
  } else if (typeof exports === 'object' && typeof module !== 'undefined') {
    // CommonJS
    module.exports = factory(require('jquery'), require('./pnotify'));
  } else {
    // Browser globals
    factory(root.jQuery, root.PNotify);
  }
}(typeof window !== "undefined" ? window : this, function($, PNotify){
  // Some useful regexes.
  var re_on = /^on/,
      re_mouse_events = /^(dbl)?click$|^mouse(move|down|up|over|out|enter|leave)$|^contextmenu$/,
      re_ui_events = /^(focus|blur|select|change|reset)$|^key(press|down|up)$/,
      re_html_events = /^(scroll|resize|(un)?load|abort|error)$/;
  // Fire a DOM event.
  var dom_event = function(e, orig_e){
    var event_object;
    e = e.toLowerCase();
    if (document.createEvent && this.dispatchEvent) {
      // FireFox, Opera, Safari, Chrome
      e = e.replace(re_on, '');
      if (e.match(re_mouse_events)) {
        // This allows the click event to fire on the notice. There is
        // probably a much better way to do it.
        $(this).offset();
        event_object = document.createEvent("MouseEvents");
        event_object.initMouseEvent(
          e, orig_e.bubbles, orig_e.cancelable, orig_e.view, orig_e.detail,
          orig_e.screenX, orig_e.screenY, orig_e.clientX, orig_e.clientY,
          orig_e.ctrlKey, orig_e.altKey, orig_e.shiftKey, orig_e.metaKey, orig_e.button, orig_e.relatedTarget
        );
      } else if (e.match(re_ui_events)) {
        event_object = document.createEvent("UIEvents");
        event_object.initUIEvent(e, orig_e.bubbles, orig_e.cancelable, orig_e.view, orig_e.detail);
      } else if (e.match(re_html_events)) {
        event_object = document.createEvent("HTMLEvents");
        event_object.initEvent(e, orig_e.bubbles, orig_e.cancelable);
      }
      if (!event_object) return;
      this.dispatchEvent(event_object);
    } else {
      // Internet Explorer
      if (!e.match(re_on)) e = "on"+e;
      event_object = document.createEventObject(orig_e);
      this.fireEvent(e, event_object);
    }
  };


  // This keeps track of the last element the mouse was over, so
  // mouseleave, mouseenter, etc can be called.
  var nonblock_last_elem;
  // This is used to pass events through the notice if it is non-blocking.
  var nonblock_pass = function(notice, e, e_name){
    notice.elem.addClass("ui-pnotify-nonblock-hide");
    var element_below = document.elementFromPoint(e.clientX, e.clientY);
    notice.elem.removeClass("ui-pnotify-nonblock-hide");
    var jelement_below = $(element_below);
    var cursor_style = jelement_below.css("cursor");
    if (cursor_style === "auto" && element_below.tagName === "A") {
      cursor_style = "pointer";
    }
    notice.elem.css("cursor", cursor_style !== "auto" ? cursor_style : "default");
    // If the element changed, call mouseenter, mouseleave, etc.
    if (!nonblock_last_elem || nonblock_last_elem.get(0) != element_below) {
      if (nonblock_last_elem) {
        dom_event.call(nonblock_last_elem.get(0), "mouseleave", e.originalEvent);
        dom_event.call(nonblock_last_elem.get(0), "mouseout", e.originalEvent);
      }
      dom_event.call(element_below, "mouseenter", e.originalEvent);
      dom_event.call(element_below, "mouseover", e.originalEvent);
    }
    dom_event.call(element_below, e_name, e.originalEvent);
    // Remember the latest element the mouse was over.
    nonblock_last_elem = jelement_below;
  };


  PNotify.prototype.options.nonblock = {
    // Create a non-blocking notice. It lets the user click elements underneath it.
    nonblock: false
  };
  PNotify.prototype.modules.nonblock = {
    init: function(notice, options){
      var that = this;
      notice.elem.on({
        "mouseenter": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
          }
          if (that.options.nonblock) {
            // If it's non-blocking, animate to the other opacity.
            notice.elem.addClass("ui-pnotify-nonblock-fade");
          }
        },
        "mouseleave": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
          }
          nonblock_last_elem = null;
          notice.elem.css("cursor", "auto");
          // Animate back to the normal opacity.
          if (that.options.nonblock && notice.animating !== "out") {
            notice.elem.removeClass("ui-pnotify-nonblock-fade");
          }
        },
        "mouseover": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
          }
        },
        "mouseout": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
          }
        },
        "mousemove": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
            nonblock_pass(notice, e, "onmousemove");
          }
        },
        "mousedown": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
            e.preventDefault();
            nonblock_pass(notice, e, "onmousedown");
          }
        },
        "mouseup": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
            e.preventDefault();
            nonblock_pass(notice, e, "onmouseup");
          }
        },
        "click": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
            nonblock_pass(notice, e, "onclick");
          }
        },
        "dblclick": function(e){
          if (that.options.nonblock) {
            e.stopPropagation();
            nonblock_pass(notice, e, "ondblclick");
          }
        }
      });
    }
  };
  return PNotify;
}));


/*!
 * jQuery Mousewheel 3.1.12
 *
 * Copyright 2014 jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */

(function (factory) {
    if ( typeof define === 'function' && define.amd ) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node/CommonJS style for Browserify
        module.exports = factory;
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

    var toFix  = ['wheel', 'mousewheel', 'DOMMouseScroll', 'MozMousePixelScroll'],
        toBind = ( 'onwheel' in document || document.documentMode >= 9 ) ?
                    ['wheel'] : ['mousewheel', 'DomMouseScroll', 'MozMousePixelScroll'],
        slice  = Array.prototype.slice,
        nullLowestDeltaTimeout, lowestDelta;

    if ( $.event.fixHooks ) {
        for ( var i = toFix.length; i; ) {
            $.event.fixHooks[ toFix[--i] ] = $.event.mouseHooks;
        }
    }

    var special = $.event.special.mousewheel = {
        version: '3.1.12',

        setup: function() {
            if ( this.addEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.addEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = handler;
            }
            // Store the line height and page height for this particular element
            $.data(this, 'mousewheel-line-height', special.getLineHeight(this));
            $.data(this, 'mousewheel-page-height', special.getPageHeight(this));
        },

        teardown: function() {
            if ( this.removeEventListener ) {
                for ( var i = toBind.length; i; ) {
                    this.removeEventListener( toBind[--i], handler, false );
                }
            } else {
                this.onmousewheel = null;
            }
            // Clean up the data we added to the element
            $.removeData(this, 'mousewheel-line-height');
            $.removeData(this, 'mousewheel-page-height');
        },

        getLineHeight: function(elem) {
            var $elem = $(elem),
                $parent = $elem['offsetParent' in $.fn ? 'offsetParent' : 'parent']();
            if (!$parent.length) {
                $parent = $('body');
            }
            return parseInt($parent.css('fontSize'), 10) || parseInt($elem.css('fontSize'), 10) || 16;
        },

        getPageHeight: function(elem) {
            return $(elem).height();
        },

        settings: {
            adjustOldDeltas: true, // see shouldAdjustOldDeltas() below
            normalizeOffset: true  // calls getBoundingClientRect for each event
        }
    };

    $.fn.extend({
        mousewheel: function(fn) {
            return fn ? this.bind('mousewheel', fn) : this.trigger('mousewheel');
        },

        unmousewheel: function(fn) {
            return this.unbind('mousewheel', fn);
        }
    });


    function handler(event) {
        var orgEvent   = event || window.event,
            args       = slice.call(arguments, 1),
            delta      = 0,
            deltaX     = 0,
            deltaY     = 0,
            absDelta   = 0,
            offsetX    = 0,
            offsetY    = 0;
        event = $.event.fix(orgEvent);
        event.type = 'mousewheel';

        // Old school scrollwheel delta
        if ( 'detail'      in orgEvent ) { deltaY = orgEvent.detail * -1;      }
        if ( 'wheelDelta'  in orgEvent ) { deltaY = orgEvent.wheelDelta;       }
        if ( 'wheelDeltaY' in orgEvent ) { deltaY = orgEvent.wheelDeltaY;      }
        if ( 'wheelDeltaX' in orgEvent ) { deltaX = orgEvent.wheelDeltaX * -1; }

        // Firefox < 17 horizontal scrolling related to DOMMouseScroll event
        if ( 'axis' in orgEvent && orgEvent.axis === orgEvent.HORIZONTAL_AXIS ) {
            deltaX = deltaY * -1;
            deltaY = 0;
        }

        // Set delta to be deltaY or deltaX if deltaY is 0 for backwards compatabilitiy
        delta = deltaY === 0 ? deltaX : deltaY;

        // New school wheel delta (wheel event)
        if ( 'deltaY' in orgEvent ) {
            deltaY = orgEvent.deltaY * -1;
            delta  = deltaY;
        }
        if ( 'deltaX' in orgEvent ) {
            deltaX = orgEvent.deltaX;
            if ( deltaY === 0 ) { delta  = deltaX * -1; }
        }

        // No change actually happened, no reason to go any further
        if ( deltaY === 0 && deltaX === 0 ) { return; }

        // Need to convert lines and pages to pixels if we aren't already in pixels
        // There are three delta modes:
        //   * deltaMode 0 is by pixels, nothing to do
        //   * deltaMode 1 is by lines
        //   * deltaMode 2 is by pages
        if ( orgEvent.deltaMode === 1 ) {
            var lineHeight = $.data(this, 'mousewheel-line-height');
            delta  *= lineHeight;
            deltaY *= lineHeight;
            deltaX *= lineHeight;
        } else if ( orgEvent.deltaMode === 2 ) {
            var pageHeight = $.data(this, 'mousewheel-page-height');
            delta  *= pageHeight;
            deltaY *= pageHeight;
            deltaX *= pageHeight;
        }

        // Store lowest absolute delta to normalize the delta values
        absDelta = Math.max( Math.abs(deltaY), Math.abs(deltaX) );

        if ( !lowestDelta || absDelta < lowestDelta ) {
            lowestDelta = absDelta;

            // Adjust older deltas if necessary
            if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
                lowestDelta /= 40;
            }
        }

        // Adjust older deltas if necessary
        if ( shouldAdjustOldDeltas(orgEvent, absDelta) ) {
            // Divide all the things by 40!
            delta  /= 40;
            deltaX /= 40;
            deltaY /= 40;
        }

        // Get a whole, normalized value for the deltas
        delta  = Math[ delta  >= 1 ? 'floor' : 'ceil' ](delta  / lowestDelta);
        deltaX = Math[ deltaX >= 1 ? 'floor' : 'ceil' ](deltaX / lowestDelta);
        deltaY = Math[ deltaY >= 1 ? 'floor' : 'ceil' ](deltaY / lowestDelta);

        // Normalise offsetX and offsetY properties
        if ( special.settings.normalizeOffset && this.getBoundingClientRect ) {
            var boundingRect = this.getBoundingClientRect();
            offsetX = event.clientX - boundingRect.left;
            offsetY = event.clientY - boundingRect.top;
        }

        // Add information to the event object
        event.deltaX = deltaX;
        event.deltaY = deltaY;
        event.deltaFactor = lowestDelta;
        event.offsetX = offsetX;
        event.offsetY = offsetY;
        // Go ahead and set deltaMode to 0 since we converted to pixels
        // Although this is a little odd since we overwrite the deltaX/Y
        // properties with normalized deltas.
        event.deltaMode = 0;

        // Add event and delta to the front of the arguments
        args.unshift(event, delta, deltaX, deltaY);

        // Clearout lowestDelta after sometime to better
        // handle multiple device types that give different
        // a different lowestDelta
        // Ex: trackpad = 3 and mouse wheel = 120
        if (nullLowestDeltaTimeout) { clearTimeout(nullLowestDeltaTimeout); }
        nullLowestDeltaTimeout = setTimeout(nullLowestDelta, 200);

        return ($.event.dispatch || $.event.handle).apply(this, args);
    }

    function nullLowestDelta() {
        lowestDelta = null;
    }

    function shouldAdjustOldDeltas(orgEvent, absDelta) {
        // If this is an older event and the delta is divisable by 120,
        // then we are assuming that the browser is treating this as an
        // older mouse wheel event and that we should divide the deltas
        // by 40 to try and get a more usable deltaFactor.
        // Side note, this actually impacts the reported scroll distance
        // in older browsers and can cause scrolling to be slower than native.
        // Turn this off by setting $.event.special.mousewheel.settings.adjustOldDeltas to false.
        return special.settings.adjustOldDeltas && orgEvent.type === 'mousewheel' && absDelta % 120 === 0;
    }

}));

/*! Copyright (c) 2011 Piotr Rochala (http://rocha.la)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Version: 1.3.1
 *
 */
(function($) {

  jQuery.fn.extend({
    slimScroll: function(options) {

      var defaults = {
        // width in pixels of the visible scroll area
        width : 'auto',

        // height in pixels of the visible scroll area
        height : '250px',

        // width in pixels of the scrollbar and rail
        size : '7px',

        // scrollbar color, accepts any hex/color value
        color: '#000',

        // scrollbar position - left/right
        position : 'right',

        // distance in pixels between the side edge and the scrollbar
        distance : '1px',

        // default scroll position on load - top / bottom / $('selector')
        start : 'top',

        // sets scrollbar opacity
        opacity : .4,

        // enables always-on mode for the scrollbar
        alwaysVisible : false,

        // check if we should hide the scrollbar when user is hovering over
        disableFadeOut : false,

        // sets visibility of the rail
        railVisible : false,

        // sets rail color
        railColor : '#333',

        // sets rail opacity
        railOpacity : .2,

        // whether  we should use jQuery UI Draggable to enable bar dragging
        railDraggable : true,

        // defautlt CSS class of the slimscroll rail
        railClass : 'slimScrollRail',

        // defautlt CSS class of the slimscroll bar
        barClass : 'slimScrollBar',

        // defautlt CSS class of the slimscroll wrapper
        wrapperClass : 'slimScrollDiv',

        // check if mousewheel should scroll the window if we reach top/bottom
        allowPageScroll : false,

        // scroll amount applied to each mouse wheel step
        wheelStep : 20,

        // scroll amount applied when user is using gestures
        touchScrollStep : 200,

        // sets border radius
        borderRadius: '7px',

         // sets animation status on a given scroll
        animate: false,

        // sets border radius of the rail
        railBorderRadius : '7px'
      };

      var o = $.extend(defaults, options);

      // do it for every element that matches selector
      this.each(function(){

      var isOverPanel, isOverBar, isDragg, queueHide, touchDif,
        barHeight, percentScroll, lastScroll,
        divS = '<div></div>',
        minBarHeight = 30,
        releaseScroll = false;

        // used in event handlers and for better minification
        var me = $(this);

        // ensure we are not binding it again
        if (me.parent().hasClass(o.wrapperClass))
        {
            // start from last bar position
            var offset = me.scrollTop();

            // find bar and rail
            bar = me.parent().find('.' + o.barClass);
            rail = me.parent().find('.' + o.railClass);

            getBarHeight();

            // check if we should scroll existing instance
            if ($.isPlainObject(options))
            {
              // Pass height: auto to an existing slimscroll object to force a resize after contents have changed
              if ( 'height' in options && options.height == 'auto' ) {
                me.parent().css('height', 'auto');
                me.css('height', 'auto');
                var height = me.parent().parent().height();
                me.parent().css('height', height);
                me.css('height', height);
              }

              if ('scrollTo' in options)
              {
                // jump to a static point
                offset = parseInt(o.scrollTo);
              }
              else if ('scrollBy' in options)
              {
                // jump by value pixels
                offset += parseInt(o.scrollBy);
              }
              else if ('destroy' in options)
              {
                // remove slimscroll elements
                bar.remove();
                rail.remove();
                me.unwrap();
                return;
              }

              // scroll content by the given offset
              scrollContent(offset, false, true);
            }

            return;
        }

        // optionally set height to the parent's height
        o.height = (o.height == 'auto') ? me.parent().height() : o.height;

        // wrap content
        var wrapper = $(divS)
          .addClass(o.wrapperClass)
          .css({
            position: 'relative',
            overflow: 'hidden',
            width: o.width,
            height: o.height
          });

        // update style for the div
        me.css({
          overflow: 'hidden',
          width: o.width,
          height: o.height
        });

        // create scrollbar rail
        var rail = $(divS)
          .addClass(o.railClass)
          .css({
            width: o.size,
            height: '100%',
            position: 'absolute',
            top: 0,
            display: (o.alwaysVisible && o.railVisible) ? 'block' : 'none',
            'border-radius': o.railBorderRadius,
            background: o.railColor,
            opacity: o.railOpacity,
            zIndex: 10000
          });

        // create scrollbar
        var bar = $(divS)
          .addClass(o.barClass)
          .css({
            background: o.color,
            width: o.size,
            position: 'absolute',
            top: 0,
            opacity: o.opacity,
            display: o.alwaysVisible ? 'block' : 'none',
            'border-radius' : o.borderRadius,
            BorderRadius: o.borderRadius,
            MozBorderRadius: o.borderRadius,
            WebkitBorderRadius: o.borderRadius,
            zIndex: 10001
          });

        // set position
        var posCss = (o.position === 'right') ? { right: o.distance } : { left: o.distance };
        rail.css(posCss);
        bar.css(posCss);

        // wrap it
        me.wrap(wrapper);

        // append to parent div
        me.parent().append(bar);
        me.parent().append(rail);

        // make it draggable and no longer dependent on the jqueryUI
        if (o.railDraggable){
          bar.bind("mousedown", function(e) {
            var $doc = $(document);
            isDragg = true;
            t = parseFloat(bar.css('top'));
            pageY = e.pageY;

            $doc.bind("mousemove.slimscroll", function(e){
              currTop = t + e.pageY - pageY;
              bar.css('top', currTop);
              scrollContent(0, bar.position().top, false);// scroll content
            });

            $doc.bind("mouseup.slimscroll", function(e) {
              isDragg = false;hideBar();
              $doc.unbind('.slimscroll');
            });
            return false;
          }).bind("selectstart.slimscroll", function(e){
            e.stopPropagation();
            e.preventDefault();
            return false;
          });
        }

        // on rail over
        rail.hover(function(){
          showBar();
        }, function(){
          hideBar();
        });

        // on bar over
        bar.hover(function(){
          isOverBar = true;
        }, function(){
          isOverBar = false;
        });

        // show on parent mouseover
        me.hover(function(){
          isOverPanel = true;
          showBar();
          hideBar();
        }, function(){
          isOverPanel = false;
          hideBar();
        });

        // support for mobile
        me.bind('touchstart', function(e,b){
          if (e.originalEvent.touches.length)
          {
            // record where touch started
            touchDif = e.originalEvent.touches[0].pageY;
          }
        });

        me.bind('touchmove', function(e){
          // prevent scrolling the page if necessary
          if(!releaseScroll)
          {
  		      e.originalEvent.preventDefault();
		      }
          if (e.originalEvent.touches.length)
          {
            // see how far user swiped
            var diff = (touchDif - e.originalEvent.touches[0].pageY) / o.touchScrollStep;
            // scroll content
            scrollContent(diff, true);
            touchDif = e.originalEvent.touches[0].pageY;
          }
        });

        // set up initial height
        getBarHeight();

        // check start position
        if (o.start === 'bottom')
        {
          // scroll content to bottom
          bar.css({ top: me.outerHeight() - bar.outerHeight() });
          scrollContent(0, true);
        }
        else if (o.start !== 'top')
        {
          // assume jQuery selector
          scrollContent($(o.start).position().top, null, true);

          // make sure bar stays hidden
          if (!o.alwaysVisible) { bar.hide(); }
        }

        // attach scroll events
        attachWheel();

        function _onWheel(e)
        {
          // use mouse wheel only when mouse is over
          if (!isOverPanel) { return; }

          var e = e || window.event;

          var delta = 0;
          if (e.wheelDelta) { delta = -e.wheelDelta/120; }
          if (e.detail) { delta = e.detail / 3; }

          var target = e.target || e.srcTarget || e.srcElement;
          if ($(target).closest('.' + o.wrapperClass).is(me.parent())) {
            // scroll content
            scrollContent(delta, true);
          }

          // stop window scroll
          if (e.preventDefault && !releaseScroll) { e.preventDefault(); }
          if (!releaseScroll) { e.returnValue = false; }
        }

        function scrollContent(y, isWheel, isJump)
        {
          releaseScroll = false;
          var delta = y;
          var maxTop = me.outerHeight() - bar.outerHeight();

          if (isWheel)
          {
            // move bar with mouse wheel
            delta = parseInt(bar.css('top')) + y * parseInt(o.wheelStep) / 100 * bar.outerHeight();

            // move bar, make sure it doesn't go out
            delta = Math.min(Math.max(delta, 0), maxTop);

            // if scrolling down, make sure a fractional change to the
            // scroll position isn't rounded away when the scrollbar's CSS is set
            // this flooring of delta would happened automatically when
            // bar.css is set below, but we floor here for clarity
            delta = (y > 0) ? Math.ceil(delta) : Math.floor(delta);

            // scroll the scrollbar
            bar.css({ top: delta + 'px' });
          }

          // calculate actual scroll amount
          percentScroll = parseInt(bar.css('top')) / (me.outerHeight() - bar.outerHeight());
          delta = percentScroll * (me[0].scrollHeight - me.outerHeight());

          if (isJump)
          {
            delta = y;
            var offsetTop = delta / me[0].scrollHeight * me.outerHeight();
            offsetTop = Math.min(Math.max(offsetTop, 0), maxTop);
            bar.css({ top: offsetTop + 'px' });
          }

          // scroll content
    	  if (o.animate){
              me.animate({ scrollTop: delta });
    	  }else{
              me.scrollTop(delta);
    	  }

          // fire scrolling event
          me.trigger('slimscrolling', percentScroll);

          // ensure bar is visible
          showBar();

          // trigger hide when scroll is stopped
          hideBar();
        }

        function attachWheel()
        {
          if (window.addEventListener)
          {
            this.addEventListener('DOMMouseScroll', _onWheel, false );
            this.addEventListener('mousewheel', _onWheel, false );
            this.addEventListener('MozMousePixelScroll', _onWheel, false );
          }
          else
          {
            document.attachEvent("onmousewheel", _onWheel)
          }
        }

        function getBarHeight()
        {
          // calculate scrollbar height and make sure it is not too small
          barHeight = Math.max((me.outerHeight() / me[0].scrollHeight) * me.outerHeight(), minBarHeight);
          bar.css({ height: barHeight + 'px' });

          // hide scrollbar if content is not long enough
          var display = barHeight == me.outerHeight() ? 'none' : 'block';
          bar.css({ display: display });
        }

        function showBar()
        {
          // recalculate bar height
          getBarHeight();
          clearTimeout(queueHide);

          // when bar reached top or bottom
          if (percentScroll === ~~percentScroll)
          {
            //release wheel
            releaseScroll = o.allowPageScroll;

            // publish approporiate event
            if (lastScroll !== percentScroll)
            {
                var msg = (~~percentScroll === 0) ? 'top' : 'bottom';
                me.trigger('slimscroll', msg);
            }
          }
          else
          {
            releaseScroll = false;
          }
          lastScroll = percentScroll;

          // show only when required
          if(barHeight >= me.outerHeight()) {
            //allow window scroll
            releaseScroll = true;
            return;
          }
          bar.stop(true,true).fadeIn('fast');
          if (o.railVisible) { rail.stop(true,true).fadeIn('fast'); }
        }

        function hideBar()
        {
          // only hide when options allow it
          if (!o.alwaysVisible)
          {
            queueHide = setTimeout(function(){
              if (!(o.disableFadeOut && isOverPanel) && !isOverBar && !isDragg)
              {
                bar.fadeOut('slow');
                rail.fadeOut('slow');
              }
            }, 1000);
          }
        }

      });

      // maintain chainability
      return this;
    }
  });

  jQuery.fn.extend({
    slimscroll: jQuery.fn.slimScroll
  });

})(jQuery);
/*!
 * perfect-scrollbar v1.4.0
 * (c) 2018 Hyunje Jun
 * @license MIT
 */
(function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
	typeof define === 'function' && define.amd ? define(factory) :
	(global.PerfectScrollbar = factory());
}(this, (function () { 'use strict';

function get(element) {
  return getComputedStyle(element);
}

function set(element, obj) {
  for (var key in obj) {
    var val = obj[key];
    if (typeof val === 'number') {
      val = val + "px";
    }
    element.style[key] = val;
  }
  return element;
}

function div(className) {
  var div = document.createElement('div');
  div.className = className;
  return div;
}

var elMatches =
  typeof Element !== 'undefined' &&
  (Element.prototype.matches ||
    Element.prototype.webkitMatchesSelector ||
    Element.prototype.mozMatchesSelector ||
    Element.prototype.msMatchesSelector);

function matches(element, query) {
  if (!elMatches) {
    throw new Error('No element matching method supported');
  }

  return elMatches.call(element, query);
}

function remove(element) {
  if (element.remove) {
    element.remove();
  } else {
    if (element.parentNode) {
      element.parentNode.removeChild(element);
    }
  }
}

function queryChildren(element, selector) {
  return Array.prototype.filter.call(element.children, function (child) { return matches(child, selector); }
  );
}

var cls = {
  main: 'ps',
  element: {
    thumb: function (x) { return ("ps__thumb-" + x); },
    rail: function (x) { return ("ps__rail-" + x); },
    consuming: 'ps__child--consume',
  },
  state: {
    focus: 'ps--focus',
    clicking: 'ps--clicking',
    active: function (x) { return ("ps--active-" + x); },
    scrolling: function (x) { return ("ps--scrolling-" + x); },
  },
};

/*
 * Helper methods
 */
var scrollingClassTimeout = { x: null, y: null };

function addScrollingClass(i, x) {
  var classList = i.element.classList;
  var className = cls.state.scrolling(x);

  if (classList.contains(className)) {
    clearTimeout(scrollingClassTimeout[x]);
  } else {
    classList.add(className);
  }
}

function removeScrollingClass(i, x) {
  scrollingClassTimeout[x] = setTimeout(
    function () { return i.isAlive && i.element.classList.remove(cls.state.scrolling(x)); },
    i.settings.scrollingThreshold
  );
}

function setScrollingClassInstantly(i, x) {
  addScrollingClass(i, x);
  removeScrollingClass(i, x);
}

var EventElement = function EventElement(element) {
  this.element = element;
  this.handlers = {};
};

var prototypeAccessors = { isEmpty: { configurable: true } };

EventElement.prototype.bind = function bind (eventName, handler) {
  if (typeof this.handlers[eventName] === 'undefined') {
    this.handlers[eventName] = [];
  }
  this.handlers[eventName].push(handler);
  this.element.addEventListener(eventName, handler, false);
};

EventElement.prototype.unbind = function unbind (eventName, target) {
    var this$1 = this;

  this.handlers[eventName] = this.handlers[eventName].filter(function (handler) {
    if (target && handler !== target) {
      return true;
    }
    this$1.element.removeEventListener(eventName, handler, false);
    return false;
  });
};

EventElement.prototype.unbindAll = function unbindAll () {
    var this$1 = this;

  for (var name in this$1.handlers) {
    this$1.unbind(name);
  }
};

prototypeAccessors.isEmpty.get = function () {
    var this$1 = this;

  return Object.keys(this.handlers).every(
    function (key) { return this$1.handlers[key].length === 0; }
  );
};

Object.defineProperties( EventElement.prototype, prototypeAccessors );

var EventManager = function EventManager() {
  this.eventElements = [];
};

EventManager.prototype.eventElement = function eventElement (element) {
  var ee = this.eventElements.filter(function (ee) { return ee.element === element; })[0];
  if (!ee) {
    ee = new EventElement(element);
    this.eventElements.push(ee);
  }
  return ee;
};

EventManager.prototype.bind = function bind (element, eventName, handler) {
  this.eventElement(element).bind(eventName, handler);
};

EventManager.prototype.unbind = function unbind (element, eventName, handler) {
  var ee = this.eventElement(element);
  ee.unbind(eventName, handler);

  if (ee.isEmpty) {
    // remove
    this.eventElements.splice(this.eventElements.indexOf(ee), 1);
  }
};

EventManager.prototype.unbindAll = function unbindAll () {
  this.eventElements.forEach(function (e) { return e.unbindAll(); });
  this.eventElements = [];
};

EventManager.prototype.once = function once (element, eventName, handler) {
  var ee = this.eventElement(element);
  var onceHandler = function (evt) {
    ee.unbind(eventName, onceHandler);
    handler(evt);
  };
  ee.bind(eventName, onceHandler);
};

function createEvent(name) {
  if (typeof window.CustomEvent === 'function') {
    return new CustomEvent(name);
  } else {
    var evt = document.createEvent('CustomEvent');
    evt.initCustomEvent(name, false, false, undefined);
    return evt;
  }
}

var processScrollDiff = function(
  i,
  axis,
  diff,
  useScrollingClass,
  forceFireReachEvent
) {
  if ( useScrollingClass === void 0 ) useScrollingClass = true;
  if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

  var fields;
  if (axis === 'top') {
    fields = [
      'contentHeight',
      'containerHeight',
      'scrollTop',
      'y',
      'up',
      'down' ];
  } else if (axis === 'left') {
    fields = [
      'contentWidth',
      'containerWidth',
      'scrollLeft',
      'x',
      'left',
      'right' ];
  } else {
    throw new Error('A proper axis should be provided');
  }

  processScrollDiff$1(i, diff, fields, useScrollingClass, forceFireReachEvent);
};

function processScrollDiff$1(
  i,
  diff,
  ref,
  useScrollingClass,
  forceFireReachEvent
) {
  var contentHeight = ref[0];
  var containerHeight = ref[1];
  var scrollTop = ref[2];
  var y = ref[3];
  var up = ref[4];
  var down = ref[5];
  if ( useScrollingClass === void 0 ) useScrollingClass = true;
  if ( forceFireReachEvent === void 0 ) forceFireReachEvent = false;

  var element = i.element;

  // reset reach
  i.reach[y] = null;

  // 1 for subpixel rounding
  if (element[scrollTop] < 1) {
    i.reach[y] = 'start';
  }

  // 1 for subpixel rounding
  if (element[scrollTop] > i[contentHeight] - i[containerHeight] - 1) {
    i.reach[y] = 'end';
  }

  if (diff) {
    element.dispatchEvent(createEvent(("ps-scroll-" + y)));

    if (diff < 0) {
      element.dispatchEvent(createEvent(("ps-scroll-" + up)));
    } else if (diff > 0) {
      element.dispatchEvent(createEvent(("ps-scroll-" + down)));
    }

    if (useScrollingClass) {
      setScrollingClassInstantly(i, y);
    }
  }

  if (i.reach[y] && (diff || forceFireReachEvent)) {
    element.dispatchEvent(createEvent(("ps-" + y + "-reach-" + (i.reach[y]))));
  }
}

function toInt(x) {
  return parseInt(x, 10) || 0;
}

function isEditable(el) {
  return (
    matches(el, 'input,[contenteditable]') ||
    matches(el, 'select,[contenteditable]') ||
    matches(el, 'textarea,[contenteditable]') ||
    matches(el, 'button,[contenteditable]')
  );
}

function outerWidth(element) {
  var styles = get(element);
  return (
    toInt(styles.width) +
    toInt(styles.paddingLeft) +
    toInt(styles.paddingRight) +
    toInt(styles.borderLeftWidth) +
    toInt(styles.borderRightWidth)
  );
}

var env = {
  isWebKit:
    typeof document !== 'undefined' &&
    'WebkitAppearance' in document.documentElement.style,
  supportsTouch:
    typeof window !== 'undefined' &&
    ('ontouchstart' in window ||
      (window.DocumentTouch && document instanceof window.DocumentTouch)),
  supportsIePointer:
    typeof navigator !== 'undefined' && navigator.msMaxTouchPoints,
  isChrome:
    typeof navigator !== 'undefined' &&
    /Chrome/i.test(navigator && navigator.userAgent),
};

var updateGeometry = function(i) {
  var element = i.element;
  var roundedScrollTop = Math.floor(element.scrollTop);

  i.containerWidth = element.clientWidth;
  i.containerHeight = element.clientHeight;
  i.contentWidth = element.scrollWidth;
  i.contentHeight = element.scrollHeight;

  if (!element.contains(i.scrollbarXRail)) {
    // clean up and append
    queryChildren(element, cls.element.rail('x')).forEach(function (el) { return remove(el); }
    );
    element.appendChild(i.scrollbarXRail);
  }
  if (!element.contains(i.scrollbarYRail)) {
    // clean up and append
    queryChildren(element, cls.element.rail('y')).forEach(function (el) { return remove(el); }
    );
    element.appendChild(i.scrollbarYRail);
  }

  if (
    !i.settings.suppressScrollX &&
    i.containerWidth + i.settings.scrollXMarginOffset < i.contentWidth
  ) {
    i.scrollbarXActive = true;
    i.railXWidth = i.containerWidth - i.railXMarginWidth;
    i.railXRatio = i.containerWidth / i.railXWidth;
    i.scrollbarXWidth = getThumbSize(
      i,
      toInt(i.railXWidth * i.containerWidth / i.contentWidth)
    );
    i.scrollbarXLeft = toInt(
      (i.negativeScrollAdjustment + element.scrollLeft) *
        (i.railXWidth - i.scrollbarXWidth) /
        (i.contentWidth - i.containerWidth)
    );
  } else {
    i.scrollbarXActive = false;
  }

  if (
    !i.settings.suppressScrollY &&
    i.containerHeight + i.settings.scrollYMarginOffset < i.contentHeight
  ) {
    i.scrollbarYActive = true;
    i.railYHeight = i.containerHeight - i.railYMarginHeight;
    i.railYRatio = i.containerHeight / i.railYHeight;
    i.scrollbarYHeight = getThumbSize(
      i,
      toInt(i.railYHeight * i.containerHeight / i.contentHeight)
    );
    i.scrollbarYTop = toInt(
      roundedScrollTop *
        (i.railYHeight - i.scrollbarYHeight) /
        (i.contentHeight - i.containerHeight)
    );
  } else {
    i.scrollbarYActive = false;
  }

  if (i.scrollbarXLeft >= i.railXWidth - i.scrollbarXWidth) {
    i.scrollbarXLeft = i.railXWidth - i.scrollbarXWidth;
  }
  if (i.scrollbarYTop >= i.railYHeight - i.scrollbarYHeight) {
    i.scrollbarYTop = i.railYHeight - i.scrollbarYHeight;
  }

  updateCss(element, i);

  if (i.scrollbarXActive) {
    element.classList.add(cls.state.active('x'));
  } else {
    element.classList.remove(cls.state.active('x'));
    i.scrollbarXWidth = 0;
    i.scrollbarXLeft = 0;
    element.scrollLeft = 0;
  }
  if (i.scrollbarYActive) {
    element.classList.add(cls.state.active('y'));
  } else {
    element.classList.remove(cls.state.active('y'));
    i.scrollbarYHeight = 0;
    i.scrollbarYTop = 0;
    element.scrollTop = 0;
  }
};

function getThumbSize(i, thumbSize) {
  if (i.settings.minScrollbarLength) {
    thumbSize = Math.max(thumbSize, i.settings.minScrollbarLength);
  }
  if (i.settings.maxScrollbarLength) {
    thumbSize = Math.min(thumbSize, i.settings.maxScrollbarLength);
  }
  return thumbSize;
}

function updateCss(element, i) {
  var xRailOffset = { width: i.railXWidth };
  var roundedScrollTop = Math.floor(element.scrollTop);

  if (i.isRtl) {
    xRailOffset.left =
      i.negativeScrollAdjustment +
      element.scrollLeft +
      i.containerWidth -
      i.contentWidth;
  } else {
    xRailOffset.left = element.scrollLeft;
  }
  if (i.isScrollbarXUsingBottom) {
    xRailOffset.bottom = i.scrollbarXBottom - roundedScrollTop;
  } else {
    xRailOffset.top = i.scrollbarXTop + roundedScrollTop;
  }
  set(i.scrollbarXRail, xRailOffset);

  var yRailOffset = { top: roundedScrollTop, height: i.railYHeight };
  if (i.isScrollbarYUsingRight) {
    if (i.isRtl) {
      yRailOffset.right =
        i.contentWidth -
        (i.negativeScrollAdjustment + element.scrollLeft) -
        i.scrollbarYRight -
        i.scrollbarYOuterWidth;
    } else {
      yRailOffset.right = i.scrollbarYRight - element.scrollLeft;
    }
  } else {
    if (i.isRtl) {
      yRailOffset.left =
        i.negativeScrollAdjustment +
        element.scrollLeft +
        i.containerWidth * 2 -
        i.contentWidth -
        i.scrollbarYLeft -
        i.scrollbarYOuterWidth;
    } else {
      yRailOffset.left = i.scrollbarYLeft + element.scrollLeft;
    }
  }
  set(i.scrollbarYRail, yRailOffset);

  set(i.scrollbarX, {
    left: i.scrollbarXLeft,
    width: i.scrollbarXWidth - i.railBorderXWidth,
  });
  set(i.scrollbarY, {
    top: i.scrollbarYTop,
    height: i.scrollbarYHeight - i.railBorderYWidth,
  });
}

var clickRail = function(i) {
  i.event.bind(i.scrollbarY, 'mousedown', function (e) { return e.stopPropagation(); });
  i.event.bind(i.scrollbarYRail, 'mousedown', function (e) {
    var positionTop =
      e.pageY -
      window.pageYOffset -
      i.scrollbarYRail.getBoundingClientRect().top;
    var direction = positionTop > i.scrollbarYTop ? 1 : -1;

    i.element.scrollTop += direction * i.containerHeight;
    updateGeometry(i);

    e.stopPropagation();
  });

  i.event.bind(i.scrollbarX, 'mousedown', function (e) { return e.stopPropagation(); });
  i.event.bind(i.scrollbarXRail, 'mousedown', function (e) {
    var positionLeft =
      e.pageX -
      window.pageXOffset -
      i.scrollbarXRail.getBoundingClientRect().left;
    var direction = positionLeft > i.scrollbarXLeft ? 1 : -1;

    i.element.scrollLeft += direction * i.containerWidth;
    updateGeometry(i);

    e.stopPropagation();
  });
};

var dragThumb = function(i) {
  bindMouseScrollHandler(i, [
    'containerWidth',
    'contentWidth',
    'pageX',
    'railXWidth',
    'scrollbarX',
    'scrollbarXWidth',
    'scrollLeft',
    'x',
    'scrollbarXRail' ]);
  bindMouseScrollHandler(i, [
    'containerHeight',
    'contentHeight',
    'pageY',
    'railYHeight',
    'scrollbarY',
    'scrollbarYHeight',
    'scrollTop',
    'y',
    'scrollbarYRail' ]);
};

function bindMouseScrollHandler(
  i,
  ref
) {
  var containerHeight = ref[0];
  var contentHeight = ref[1];
  var pageY = ref[2];
  var railYHeight = ref[3];
  var scrollbarY = ref[4];
  var scrollbarYHeight = ref[5];
  var scrollTop = ref[6];
  var y = ref[7];
  var scrollbarYRail = ref[8];

  var element = i.element;

  var startingScrollTop = null;
  var startingMousePageY = null;
  var scrollBy = null;

  function mouseMoveHandler(e) {
    element[scrollTop] =
      startingScrollTop + scrollBy * (e[pageY] - startingMousePageY);
    addScrollingClass(i, y);
    updateGeometry(i);

    e.stopPropagation();
    e.preventDefault();
  }

  function mouseUpHandler() {
    removeScrollingClass(i, y);
    i[scrollbarYRail].classList.remove(cls.state.clicking);
    i.event.unbind(i.ownerDocument, 'mousemove', mouseMoveHandler);
  }

  i.event.bind(i[scrollbarY], 'mousedown', function (e) {
    startingScrollTop = element[scrollTop];
    startingMousePageY = e[pageY];
    scrollBy =
      (i[contentHeight] - i[containerHeight]) /
      (i[railYHeight] - i[scrollbarYHeight]);

    i.event.bind(i.ownerDocument, 'mousemove', mouseMoveHandler);
    i.event.once(i.ownerDocument, 'mouseup', mouseUpHandler);

    i[scrollbarYRail].classList.add(cls.state.clicking);

    e.stopPropagation();
    e.preventDefault();
  });
}

var keyboard = function(i) {
  var element = i.element;

  var elementHovered = function () { return matches(element, ':hover'); };
  var scrollbarFocused = function () { return matches(i.scrollbarX, ':focus') || matches(i.scrollbarY, ':focus'); };

  function shouldPreventDefault(deltaX, deltaY) {
    var scrollTop = Math.floor(element.scrollTop);
    if (deltaX === 0) {
      if (!i.scrollbarYActive) {
        return false;
      }
      if (
        (scrollTop === 0 && deltaY > 0) ||
        (scrollTop >= i.contentHeight - i.containerHeight && deltaY < 0)
      ) {
        return !i.settings.wheelPropagation;
      }
    }

    var scrollLeft = element.scrollLeft;
    if (deltaY === 0) {
      if (!i.scrollbarXActive) {
        return false;
      }
      if (
        (scrollLeft === 0 && deltaX < 0) ||
        (scrollLeft >= i.contentWidth - i.containerWidth && deltaX > 0)
      ) {
        return !i.settings.wheelPropagation;
      }
    }
    return true;
  }

  i.event.bind(i.ownerDocument, 'keydown', function (e) {
    if (
      (e.isDefaultPrevented && e.isDefaultPrevented()) ||
      e.defaultPrevented
    ) {
      return;
    }

    if (!elementHovered() && !scrollbarFocused()) {
      return;
    }

    var activeElement = document.activeElement
      ? document.activeElement
      : i.ownerDocument.activeElement;
    if (activeElement) {
      if (activeElement.tagName === 'IFRAME') {
        activeElement = activeElement.contentDocument.activeElement;
      } else {
        // go deeper if element is a webcomponent
        while (activeElement.shadowRoot) {
          activeElement = activeElement.shadowRoot.activeElement;
        }
      }
      if (isEditable(activeElement)) {
        return;
      }
    }

    var deltaX = 0;
    var deltaY = 0;

    switch (e.which) {
      case 37: // left
        if (e.metaKey) {
          deltaX = -i.contentWidth;
        } else if (e.altKey) {
          deltaX = -i.containerWidth;
        } else {
          deltaX = -30;
        }
        break;
      case 38: // up
        if (e.metaKey) {
          deltaY = i.contentHeight;
        } else if (e.altKey) {
          deltaY = i.containerHeight;
        } else {
          deltaY = 30;
        }
        break;
      case 39: // right
        if (e.metaKey) {
          deltaX = i.contentWidth;
        } else if (e.altKey) {
          deltaX = i.containerWidth;
        } else {
          deltaX = 30;
        }
        break;
      case 40: // down
        if (e.metaKey) {
          deltaY = -i.contentHeight;
        } else if (e.altKey) {
          deltaY = -i.containerHeight;
        } else {
          deltaY = -30;
        }
        break;
      case 32: // space bar
        if (e.shiftKey) {
          deltaY = i.containerHeight;
        } else {
          deltaY = -i.containerHeight;
        }
        break;
      case 33: // page up
        deltaY = i.containerHeight;
        break;
      case 34: // page down
        deltaY = -i.containerHeight;
        break;
      case 36: // home
        deltaY = i.contentHeight;
        break;
      case 35: // end
        deltaY = -i.contentHeight;
        break;
      default:
        return;
    }

    if (i.settings.suppressScrollX && deltaX !== 0) {
      return;
    }
    if (i.settings.suppressScrollY && deltaY !== 0) {
      return;
    }

    element.scrollTop -= deltaY;
    element.scrollLeft += deltaX;
    updateGeometry(i);

    if (shouldPreventDefault(deltaX, deltaY)) {
      e.preventDefault();
    }
  });
};

var wheel = function(i) {
  var element = i.element;

  function shouldPreventDefault(deltaX, deltaY) {
    var roundedScrollTop = Math.floor(element.scrollTop);
    var isTop = element.scrollTop === 0;
    var isBottom =
      roundedScrollTop + element.offsetHeight === element.scrollHeight;
    var isLeft = element.scrollLeft === 0;
    var isRight =
      element.scrollLeft + element.offsetWidth === element.scrollWidth;

    var hitsBound;

    // pick axis with primary direction
    if (Math.abs(deltaY) > Math.abs(deltaX)) {
      hitsBound = isTop || isBottom;
    } else {
      hitsBound = isLeft || isRight;
    }

    return hitsBound ? !i.settings.wheelPropagation : true;
  }

  function getDeltaFromEvent(e) {
    var deltaX = e.deltaX;
    var deltaY = -1 * e.deltaY;

    if (typeof deltaX === 'undefined' || typeof deltaY === 'undefined') {
      // OS X Safari
      deltaX = -1 * e.wheelDeltaX / 6;
      deltaY = e.wheelDeltaY / 6;
    }

    if (e.deltaMode && e.deltaMode === 1) {
      // Firefox in deltaMode 1: Line scrolling
      deltaX *= 10;
      deltaY *= 10;
    }

    if (deltaX !== deltaX && deltaY !== deltaY /* NaN checks */) {
      // IE in some mouse drivers
      deltaX = 0;
      deltaY = e.wheelDelta;
    }

    if (e.shiftKey) {
      // reverse axis with shift key
      return [-deltaY, -deltaX];
    }
    return [deltaX, deltaY];
  }

  function shouldBeConsumedByChild(target, deltaX, deltaY) {
    // FIXME: this is a workaround for <select> issue in FF and IE #571
    if (!env.isWebKit && element.querySelector('select:focus')) {
      return true;
    }

    if (!element.contains(target)) {
      return false;
    }

    var cursor = target;

    while (cursor && cursor !== element) {
      if (cursor.classList.contains(cls.element.consuming)) {
        return true;
      }

      var style = get(cursor);
      var overflow = [style.overflow, style.overflowX, style.overflowY].join(
        ''
      );

      // if scrollable
      if (overflow.match(/(scroll|auto)/)) {
        var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
        if (maxScrollTop > 0) {
          if (
            !(cursor.scrollTop === 0 && deltaY > 0) &&
            !(cursor.scrollTop === maxScrollTop && deltaY < 0)
          ) {
            return true;
          }
        }
        var maxScrollLeft = cursor.scrollWidth - cursor.clientWidth;
        if (maxScrollLeft > 0) {
          if (
            !(cursor.scrollLeft === 0 && deltaX < 0) &&
            !(cursor.scrollLeft === maxScrollLeft && deltaX > 0)
          ) {
            return true;
          }
        }
      }

      cursor = cursor.parentNode;
    }

    return false;
  }

  function mousewheelHandler(e) {
    var ref = getDeltaFromEvent(e);
    var deltaX = ref[0];
    var deltaY = ref[1];

    if (shouldBeConsumedByChild(e.target, deltaX, deltaY)) {
      return;
    }

    var shouldPrevent = false;
    if (!i.settings.useBothWheelAxes) {
      // deltaX will only be used for horizontal scrolling and deltaY will
      // only be used for vertical scrolling - this is the default
      element.scrollTop -= deltaY * i.settings.wheelSpeed;
      element.scrollLeft += deltaX * i.settings.wheelSpeed;
    } else if (i.scrollbarYActive && !i.scrollbarXActive) {
      // only vertical scrollbar is active and useBothWheelAxes option is
      // active, so let's scroll vertical bar using both mouse wheel axes
      if (deltaY) {
        element.scrollTop -= deltaY * i.settings.wheelSpeed;
      } else {
        element.scrollTop += deltaX * i.settings.wheelSpeed;
      }
      shouldPrevent = true;
    } else if (i.scrollbarXActive && !i.scrollbarYActive) {
      // useBothWheelAxes and only horizontal bar is active, so use both
      // wheel axes for horizontal bar
      if (deltaX) {
        element.scrollLeft += deltaX * i.settings.wheelSpeed;
      } else {
        element.scrollLeft -= deltaY * i.settings.wheelSpeed;
      }
      shouldPrevent = true;
    }

    updateGeometry(i);

    shouldPrevent = shouldPrevent || shouldPreventDefault(deltaX, deltaY);
    if (shouldPrevent && !e.ctrlKey) {
      e.stopPropagation();
      e.preventDefault();
    }
  }

  if (typeof window.onwheel !== 'undefined') {
    i.event.bind(element, 'wheel', mousewheelHandler);
  } else if (typeof window.onmousewheel !== 'undefined') {
    i.event.bind(element, 'mousewheel', mousewheelHandler);
  }
};

var touch = function(i) {
  if (!env.supportsTouch && !env.supportsIePointer) {
    return;
  }

  var element = i.element;

  function shouldPrevent(deltaX, deltaY) {
    var scrollTop = Math.floor(element.scrollTop);
    var scrollLeft = element.scrollLeft;
    var magnitudeX = Math.abs(deltaX);
    var magnitudeY = Math.abs(deltaY);

    if (magnitudeY > magnitudeX) {
      // user is perhaps trying to swipe up/down the page

      if (
        (deltaY < 0 && scrollTop === i.contentHeight - i.containerHeight) ||
        (deltaY > 0 && scrollTop === 0)
      ) {
        // set prevent for mobile Chrome refresh
        return window.scrollY === 0 && deltaY > 0 && env.isChrome;
      }
    } else if (magnitudeX > magnitudeY) {
      // user is perhaps trying to swipe left/right across the page

      if (
        (deltaX < 0 && scrollLeft === i.contentWidth - i.containerWidth) ||
        (deltaX > 0 && scrollLeft === 0)
      ) {
        return true;
      }
    }

    return true;
  }

  function applyTouchMove(differenceX, differenceY) {
    element.scrollTop -= differenceY;
    element.scrollLeft -= differenceX;

    updateGeometry(i);
  }

  var startOffset = {};
  var startTime = 0;
  var speed = {};
  var easingLoop = null;

  function getTouch(e) {
    if (e.targetTouches) {
      return e.targetTouches[0];
    } else {
      // Maybe IE pointer
      return e;
    }
  }

  function shouldHandle(e) {
    if (e.pointerType && e.pointerType === 'pen' && e.buttons === 0) {
      return false;
    }
    if (e.targetTouches && e.targetTouches.length === 1) {
      return true;
    }
    if (
      e.pointerType &&
      e.pointerType !== 'mouse' &&
      e.pointerType !== e.MSPOINTER_TYPE_MOUSE
    ) {
      return true;
    }
    return false;
  }

  function touchStart(e) {
    if (!shouldHandle(e)) {
      return;
    }

    var touch = getTouch(e);

    startOffset.pageX = touch.pageX;
    startOffset.pageY = touch.pageY;

    startTime = new Date().getTime();

    if (easingLoop !== null) {
      clearInterval(easingLoop);
    }
  }

  function shouldBeConsumedByChild(target, deltaX, deltaY) {
    if (!element.contains(target)) {
      return false;
    }

    var cursor = target;

    while (cursor && cursor !== element) {
      if (cursor.classList.contains(cls.element.consuming)) {
        return true;
      }

      var style = get(cursor);
      var overflow = [style.overflow, style.overflowX, style.overflowY].join(
        ''
      );

      // if scrollable
      if (overflow.match(/(scroll|auto)/)) {
        var maxScrollTop = cursor.scrollHeight - cursor.clientHeight;
        if (maxScrollTop > 0) {
          if (
            !(cursor.scrollTop === 0 && deltaY > 0) &&
            !(cursor.scrollTop === maxScrollTop && deltaY < 0)
          ) {
            return true;
          }
        }
        var maxScrollLeft = cursor.scrollLeft - cursor.clientWidth;
        if (maxScrollLeft > 0) {
          if (
            !(cursor.scrollLeft === 0 && deltaX < 0) &&
            !(cursor.scrollLeft === maxScrollLeft && deltaX > 0)
          ) {
            return true;
          }
        }
      }

      cursor = cursor.parentNode;
    }

    return false;
  }

  function touchMove(e) {
    if (shouldHandle(e)) {
      var touch = getTouch(e);

      var currentOffset = { pageX: touch.pageX, pageY: touch.pageY };

      var differenceX = currentOffset.pageX - startOffset.pageX;
      var differenceY = currentOffset.pageY - startOffset.pageY;

      if (shouldBeConsumedByChild(e.target, differenceX, differenceY)) {
        return;
      }

      applyTouchMove(differenceX, differenceY);
      startOffset = currentOffset;

      var currentTime = new Date().getTime();

      var timeGap = currentTime - startTime;
      if (timeGap > 0) {
        speed.x = differenceX / timeGap;
        speed.y = differenceY / timeGap;
        startTime = currentTime;
      }

      if (shouldPrevent(differenceX, differenceY)) {
        e.preventDefault();
      }
    }
  }
  function touchEnd() {
    if (i.settings.swipeEasing) {
      clearInterval(easingLoop);
      easingLoop = setInterval(function() {
        if (i.isInitialized) {
          clearInterval(easingLoop);
          return;
        }

        if (!speed.x && !speed.y) {
          clearInterval(easingLoop);
          return;
        }

        if (Math.abs(speed.x) < 0.01 && Math.abs(speed.y) < 0.01) {
          clearInterval(easingLoop);
          return;
        }

        applyTouchMove(speed.x * 30, speed.y * 30);

        speed.x *= 0.8;
        speed.y *= 0.8;
      }, 10);
    }
  }

  if (env.supportsTouch) {
    i.event.bind(element, 'touchstart', touchStart);
    i.event.bind(element, 'touchmove', touchMove);
    i.event.bind(element, 'touchend', touchEnd);
  } else if (env.supportsIePointer) {
    if (window.PointerEvent) {
      i.event.bind(element, 'pointerdown', touchStart);
      i.event.bind(element, 'pointermove', touchMove);
      i.event.bind(element, 'pointerup', touchEnd);
    } else if (window.MSPointerEvent) {
      i.event.bind(element, 'MSPointerDown', touchStart);
      i.event.bind(element, 'MSPointerMove', touchMove);
      i.event.bind(element, 'MSPointerUp', touchEnd);
    }
  }
};

var defaultSettings = function () { return ({
  handlers: ['click-rail', 'drag-thumb', 'keyboard', 'wheel', 'touch'],
  maxScrollbarLength: null,
  minScrollbarLength: null,
  scrollingThreshold: 1000,
  scrollXMarginOffset: 0,
  scrollYMarginOffset: 0,
  suppressScrollX: false,
  suppressScrollY: false,
  swipeEasing: true,
  useBothWheelAxes: false,
  wheelPropagation: true,
  wheelSpeed: 1,
}); };

var handlers = {
  'click-rail': clickRail,
  'drag-thumb': dragThumb,
  keyboard: keyboard,
  wheel: wheel,
  touch: touch,
};

var PerfectScrollbar = function PerfectScrollbar(element, userSettings) {
  var this$1 = this;
  if ( userSettings === void 0 ) userSettings = {};

  if (typeof element === 'string') {
    element = document.querySelector(element);
  }

  if (!element || !element.nodeName) {
    throw new Error('no element is specified to initialize PerfectScrollbar');
  }

  this.element = element;

  element.classList.add(cls.main);

  this.settings = defaultSettings();
  for (var key in userSettings) {
    this$1.settings[key] = userSettings[key];
  }

  this.containerWidth = null;
  this.containerHeight = null;
  this.contentWidth = null;
  this.contentHeight = null;

  var focus = function () { return element.classList.add(cls.state.focus); };
  var blur = function () { return element.classList.remove(cls.state.focus); };

  this.isRtl = get(element).direction === 'rtl';
  this.isNegativeScroll = (function () {
    var originalScrollLeft = element.scrollLeft;
    var result = null;
    element.scrollLeft = -1;
    result = element.scrollLeft < 0;
    element.scrollLeft = originalScrollLeft;
    return result;
  })();
  this.negativeScrollAdjustment = this.isNegativeScroll
    ? element.scrollWidth - element.clientWidth
    : 0;
  this.event = new EventManager();
  this.ownerDocument = element.ownerDocument || document;

  this.scrollbarXRail = div(cls.element.rail('x'));
  element.appendChild(this.scrollbarXRail);
  this.scrollbarX = div(cls.element.thumb('x'));
  this.scrollbarXRail.appendChild(this.scrollbarX);
  this.scrollbarX.setAttribute('tabindex', 0);
  this.event.bind(this.scrollbarX, 'focus', focus);
  this.event.bind(this.scrollbarX, 'blur', blur);
  this.scrollbarXActive = null;
  this.scrollbarXWidth = null;
  this.scrollbarXLeft = null;
  var railXStyle = get(this.scrollbarXRail);
  this.scrollbarXBottom = parseInt(railXStyle.bottom, 10);
  if (isNaN(this.scrollbarXBottom)) {
    this.isScrollbarXUsingBottom = false;
    this.scrollbarXTop = toInt(railXStyle.top);
  } else {
    this.isScrollbarXUsingBottom = true;
  }
  this.railBorderXWidth =
    toInt(railXStyle.borderLeftWidth) + toInt(railXStyle.borderRightWidth);
  // Set rail to display:block to calculate margins
  set(this.scrollbarXRail, { display: 'block' });
  this.railXMarginWidth =
    toInt(railXStyle.marginLeft) + toInt(railXStyle.marginRight);
  set(this.scrollbarXRail, { display: '' });
  this.railXWidth = null;
  this.railXRatio = null;

  this.scrollbarYRail = div(cls.element.rail('y'));
  element.appendChild(this.scrollbarYRail);
  this.scrollbarY = div(cls.element.thumb('y'));
  this.scrollbarYRail.appendChild(this.scrollbarY);
  this.scrollbarY.setAttribute('tabindex', 0);
  this.event.bind(this.scrollbarY, 'focus', focus);
  this.event.bind(this.scrollbarY, 'blur', blur);
  this.scrollbarYActive = null;
  this.scrollbarYHeight = null;
  this.scrollbarYTop = null;
  var railYStyle = get(this.scrollbarYRail);
  this.scrollbarYRight = parseInt(railYStyle.right, 10);
  if (isNaN(this.scrollbarYRight)) {
    this.isScrollbarYUsingRight = false;
    this.scrollbarYLeft = toInt(railYStyle.left);
  } else {
    this.isScrollbarYUsingRight = true;
  }
  this.scrollbarYOuterWidth = this.isRtl ? outerWidth(this.scrollbarY) : null;
  this.railBorderYWidth =
    toInt(railYStyle.borderTopWidth) + toInt(railYStyle.borderBottomWidth);
  set(this.scrollbarYRail, { display: 'block' });
  this.railYMarginHeight =
    toInt(railYStyle.marginTop) + toInt(railYStyle.marginBottom);
  set(this.scrollbarYRail, { display: '' });
  this.railYHeight = null;
  this.railYRatio = null;

  this.reach = {
    x:
      element.scrollLeft <= 0
        ? 'start'
        : element.scrollLeft >= this.contentWidth - this.containerWidth
          ? 'end'
          : null,
    y:
      element.scrollTop <= 0
        ? 'start'
        : element.scrollTop >= this.contentHeight - this.containerHeight
          ? 'end'
          : null,
  };

  this.isAlive = true;

  this.settings.handlers.forEach(function (handlerName) { return handlers[handlerName](this$1); });

  this.lastScrollTop = Math.floor(element.scrollTop); // for onScroll only
  this.lastScrollLeft = element.scrollLeft; // for onScroll only
  this.event.bind(this.element, 'scroll', function (e) { return this$1.onScroll(e); });
  updateGeometry(this);
};

PerfectScrollbar.prototype.update = function update () {
  if (!this.isAlive) {
    return;
  }

  // Recalcuate negative scrollLeft adjustment
  this.negativeScrollAdjustment = this.isNegativeScroll
    ? this.element.scrollWidth - this.element.clientWidth
    : 0;

  // Recalculate rail margins
  set(this.scrollbarXRail, { display: 'block' });
  set(this.scrollbarYRail, { display: 'block' });
  this.railXMarginWidth =
    toInt(get(this.scrollbarXRail).marginLeft) +
    toInt(get(this.scrollbarXRail).marginRight);
  this.railYMarginHeight =
    toInt(get(this.scrollbarYRail).marginTop) +
    toInt(get(this.scrollbarYRail).marginBottom);

  // Hide scrollbars not to affect scrollWidth and scrollHeight
  set(this.scrollbarXRail, { display: 'none' });
  set(this.scrollbarYRail, { display: 'none' });

  updateGeometry(this);

  processScrollDiff(this, 'top', 0, false, true);
  processScrollDiff(this, 'left', 0, false, true);

  set(this.scrollbarXRail, { display: '' });
  set(this.scrollbarYRail, { display: '' });
};

PerfectScrollbar.prototype.onScroll = function onScroll (e) {
  if (!this.isAlive) {
    return;
  }

  updateGeometry(this);
  processScrollDiff(this, 'top', this.element.scrollTop - this.lastScrollTop);
  processScrollDiff(
    this,
    'left',
    this.element.scrollLeft - this.lastScrollLeft
  );

  this.lastScrollTop = Math.floor(this.element.scrollTop);
  this.lastScrollLeft = this.element.scrollLeft;
};

PerfectScrollbar.prototype.destroy = function destroy () {
  if (!this.isAlive) {
    return;
  }

  this.event.unbindAll();
  remove(this.scrollbarX);
  remove(this.scrollbarY);
  remove(this.scrollbarXRail);
  remove(this.scrollbarYRail);
  this.removePsClasses();

  // unset elements
  this.element = null;
  this.scrollbarX = null;
  this.scrollbarY = null;
  this.scrollbarXRail = null;
  this.scrollbarYRail = null;

  this.isAlive = false;
};

PerfectScrollbar.prototype.removePsClasses = function removePsClasses () {
  this.element.className = this.element.className
    .split(' ')
    .filter(function (name) { return !name.match(/^ps([-_].+|)$/); })
    .join(' ');
};

return PerfectScrollbar;

})));

(function( $ ){
  var methods = {
    init: function(options) {
      var settings = {
        color: $(this).css("background-color"),
        reach: 20,
        speed: 1000,
        pause: 0,
        glow: true,
        repeat: true,
        onHover: false
      };
      $(this).css({
        "-moz-outline-radius": $(this).css("border-top-left-radius"),
        "-webkit-outline-radius": $(this).css("border-top-left-radius"),
        "outline-radius": $(this).css("border-top-left-radius")
      });

      if (options) {
        $.extend(settings, options);
      }
      settings.color = $("<div style='background:" + settings.color + "'></div>").css("background-color");
      if(settings.repeat !== true && !isNaN(settings.repeat) && settings.repeat > 0) {
        settings.repeat -=1;
      }

      return this.each(function() {
        if(settings.onHover) {
          $(this).bind("mouseover", function () {pulse(settings, this, 0);})
                 .bind("mouseout", function (){$(this).pulsate("destroy");});
        } else {
          pulse(settings, this, 0);
        }
      });
    },
    destroy: function() {
      return this.each(function() {
        clearTimeout(this.timer);
        $(this).css("outline",0);
      });
    }
  };

  var pulse = function(options, el, count) {
    var reach = options.reach,
        count = count>reach ? 0 : count,
        opacity = (reach-count)/reach,
        colorarr = options.color.split(","),
        color = "rgba(" + colorarr[0].split("(")[1] + "," + colorarr[1] + "," + colorarr[2].split(")")[0] + "," + opacity + ")",
        cssObj = {
          "outline": "2px solid " + color
        };
    if(options.glow) {
      cssObj["box-shadow"] = "0px 0px " + parseInt((count/1.5)) + "px " + color;
    }
    cssObj["outline-offset"] = count + "px";

    $(el).css(cssObj);

    var innerfunc = function () {
      if(count>=reach && !options.repeat) {
        $(el).pulsate("destroy");
        return false;
      } else if(count>=reach && options.repeat !== true && !isNaN(options.repeat) && options.repeat > 0) {
        options.repeat = options.repeat-1;
      } else if(options.pause && count>=reach) {
        pause(options, el, count+1);
        return false;
      }
      pulse(options, el, count+1);
    };

    if(el.timer){
      clearTimeout(el.timer);
    }
    el.timer = setTimeout(innerfunc, options.speed/reach);
  };

  var pause = function (options, el, count) {
    innerfunc = function () {
      pulse(options, el, count);
    };
    el.timer = setTimeout(innerfunc, options.pause);
  };

  $.fn.pulsate = function( method ) {
    // Method calling logic
    if ( methods[method] ) {
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.pulsate' );
    }

  };
})( jQuery );

///#source 1 1 /js/source/wheelnav.core.js
/* ======================================================================================= */
/*                                   wheelnav.js - v1.8.0                                  */
/* ======================================================================================= */
/* This is a small JavaScript library for animated SVG based wheel navigation.             */
/* Requires Raphaël JavaScript Vector Library (http://dmitrybaranovskiy.github.io/raphael/)*/
/* ======================================================================================= */
/* Check http://wheelnavjs.softwaretailoring.net for samples.                              */
/* Fork https://github.com/softwaretailoring/wheelnav for contribution.                    */
/* ======================================================================================= */
/* Copyright © 2014-2018 Gábor Berkesi (http://softwaretailoring.net)                      */
/* Licensed under MIT (https://github.com/softwaretailoring/wheelnav/blob/master/LICENSE)  */
/* ======================================================================================= */

/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/core.html          */
/* ======================================================================================= */

wheelnav = function (divId, raphael, divWidth, divHeight) {

    this.holderId = "wheel";

    if (divId !== undefined &&
        divId !== null) {
        this.holderId = divId;
    }

    var holderDiv = document.getElementById(divId);

    if ((holderDiv === null ||
        holderDiv === undefined) &&
        (raphael === undefined ||
        raphael === null)) {
        return this;
    }
    
    //Prepare raphael object and set the width
    var canvasWidth;
    var clearContent = true;

    if (raphael === undefined ||
        raphael === null) {

        var removeChildrens = [];
        for (var i = 0; i < holderDiv.children.length; i++) {
            if (holderDiv.children[i].localName === "svg") {
                removeChildrens.push(holderDiv.children[i]);
            }
        }

        for (var i = 0; i < removeChildrens.length; i++) {
            holderDiv.removeChild(removeChildrens[i]);
        }

        if (divWidth !== undefined &&
            divWidth !== null) {
            if (divHeight === undefined ||
                divHeight === null) {
                divHeight = divWidth;
            }
            this.raphael = new Raphael(divId, divWidth, divHeight);
            canvasWidth = divWidth;
        }
        else {
            this.raphael = new Raphael(divId);
            canvasWidth = holderDiv.clientWidth;
        }

        this.raphael.setViewBox(0, 0, this.raphael.width, this.raphael.height, true);
    }
    else {
        //The divId parameter has to be the identifier of the wheelnav in this case.
        this.raphael = raphael;
        canvasWidth = this.raphael.width;
        clearContent = false;
    }

    //Public properties
    this.centerX = canvasWidth / 2;
    this.centerY = canvasWidth / 2;
    this.wheelRadius = canvasWidth / 2;
    this.navAngle = 0;
    this.sliceAngle = null;
    this.titleRotateAngle = null;
    this.titleCurved = false;
    this.titleCurvedClockwise = null;
    this.titleCurvedByRotateAngle = false;
    this.initTitleRotate = false;
    this.clickModeRotate = true;
    this.rotateRound = false;
    this.rotateRoundCount = 0;
    this.clickModeSpreadOff = false;
    this.animatetimeCalculated = false; // In clickModeRotate, when animatetimeCalculated is true, the navItem.animatetime calculated by wheelnav.animatetime and current rotationAngle. In this case, the wheelnav.animatetime belongs to the full rotation.
    this.animateRepeatCount = 0;
    this.clockwise = true;
    this.multiSelect = false;
    this.hoverPercent = 1;
    this.selectedPercent = 1;
    this.clickablePercentMin = 0;
    this.clickablePercentMax = 1;
    this.currentPercent = null;
    this.cssMode = false;
    this.selectedToFront = true;
    this.selectedNavItemIndex = 0;
    this.hoverEnable = true;
    this.hoveredToFront = true;

    this.navItemCount = 0;
    this.navItemCountLabeled = false;
    this.navItemCountLabelOffset = 0;
    this.navItems = [];
    this.navItemsEnabled = true;
    this.animateFinishFunction = null;

    // These settings are useful when navItem.sliceAngle < 360 / this.navItemCount
    this.navItemsContinuous = false; 
    this.navItemsCentered = true; // This is reasoned when this.navItemsContinuous = false;

    this.colors = colorpalette.defaultpalette;
    this.titleSpreadScale = null;

    //Spreader settings
    this.spreaderEnable = false;
    this.spreaderRadius = 20;
    this.spreaderStartAngle = 0;
    this.spreaderSliceAngle = 360;
    this.spreaderPathFunction = spreaderPath().PieSpreader;
    this.spreaderPathCustom = null;
    this.spreaderInPercent = 1;
    this.spreaderOutPercent = 1;
    this.spreaderInTitle = "+";
    this.spreaderOutTitle = "-";
    this.spreaderTitleFont = null;
    this.spreaderPathInAttr = null;
    this.spreaderPathOutAttr = null;
    this.spreaderTitleInAttr = null;
    this.spreaderTitleOutAttr = null;
    this.spreaderInTitleWidth = null;
    this.spreaderInTitleHeight = null;
    this.spreaderOutTitleWidth = null;
    this.spreaderOutTitleHeight = null;

    //Percents
    this.minPercent = 0.01;
    this.maxPercent = 1;
    this.initPercent = 1;

    //Marker settings
    this.markerEnable = false;
    this.markerPathFunction = markerPath().TriangleMarker;
    this.markerPathCustom = null;

    //Private properties
    this.currentClick = 0;
    this.animateLocked = false;

    //NavItem default settings. These are configurable between initWheel() and createWheel().
    this.slicePathAttr = null;
    this.sliceHoverAttr = null;
    this.sliceSelectedAttr = null;
    
    this.titleFont = '18px Impact, Charcoal, sans-serif';
    this.titleAttr = null;
    this.titleHoverAttr = null;
    this.titleSelectedAttr = null;
    //When navTitle start with 'imgsrc:' it can parse as URL of image or data URI. These properties are available for images and paths.
    this.titleWidth = null;
    this.titleHeight = null;
    this.titleHoverWidth = null;
    this.titleHoverHeight = null;
    this.titleSelectedWidth = null;
    this.titleSelectedHeight = null;

    this.linePathAttr = null;
    this.lineHoverAttr = null;
    this.lineSelectedAttr = null;

    this.slicePathCustom = null;
    this.sliceClickablePathCustom = null;
    this.sliceSelectedPathCustom = null;
    this.sliceHoverPathCustom = null;
    this.sliceInitPathCustom = null;

    this.sliceTransformCustom = null;
    this.sliceSelectedTransformCustom = null;
    this.sliceHoverTransformCustom = null;
    this.sliceInitTransformCustom = null;

    this.animateeffect = null;
    this.animatetime = null;
    if (slicePath()["PieSlice"] !== undefined) {
        this.slicePathFunction = slicePath().PieSlice;
    }
    else {
        this.slicePathFunction = slicePath().NullSlice;
    }
    this.sliceClickablePathFunction = null;
    this.sliceTransformFunction = null;
    this.sliceSelectedPathFunction = null;
    this.sliceSelectedTransformFunction = null;
    this.sliceHoverPathFunction = null;
    this.sliceHoverTransformFunction = null;
    this.sliceInitPathFunction = null;
    this.sliceInitTransformFunction = null;

    this.keynavigateEnabled = false;
    this.keynavigateOnlyFocus = false;
    this.keynavigateDownCode = 37; // left arrow
    this.keynavigateDownCodeAlt = 40; // down arrow
    this.keynavigateUpCode = 39; // right arrow
    this.keynavigateUpCodeAlt = 38; // up arrow

    this.parseWheel(holderDiv);

    return this;
};

wheelnav.prototype.initWheel = function (titles) {

    //Init slices and titles
    this.styleWheel();

    var navItem;
    if (this.navItemCount === 0) {

        if (titles === undefined ||
            titles === null ||
            !Array.isArray(titles)) {
            titles = ["title-0", "title-1", "title-2", "title-3"];
        }

        this.navItemCount = titles.length;
    }
    else {
        titles = null;
    }

    for (i = 0; i < this.navItemCount; i++) {

        var itemTitle = "";

        if (this.navItemCountLabeled) {
            itemTitle = (i + this.navItemCountLabelOffset).toString();
        }
        else {
            if (titles !== null)
                { itemTitle = titles[i]; }
            else
                { itemTitle = ""; }
        }

        navItem = new wheelnavItem(this, itemTitle, i);
        this.navItems.push(navItem);
    }

    //Init colors
    var colorIndex = 0;
    for (i = 0; i < this.navItems.length; i++) {
        this.navItems[i].fillAttr = this.colors[colorIndex];
        colorIndex++;
        if (colorIndex === this.colors.length) { colorIndex = 0;}
    }
};

wheelnav.prototype.createWheel = function (titles, withSpread) {

    if (this.currentPercent === null) {
        if (withSpread) {
            this.currentPercent = this.minPercent;
        }
        else {
            this.currentPercent = this.maxPercent;
        }
    }

    if (this.navItems.length === 0) {
        this.initWheel(titles);
    }

    if (this.selectedNavItemIndex !== null) {
        this.navItems[this.selectedNavItemIndex].selected = true;
    }

    for (i = 0; i < this.navItemCount; i++) {
        this.navItems[i].createNavItem();
    }

    if (this.keynavigateEnabled) {
        var thiswheelnav = this;
        var keyelement = window;

        if (this.keynavigateOnlyFocus) {
            keyelement = document.getElementById(this.holderId);
            if (!keyelement.hasAttribute("tabindex")) {
                keyelement.setAttribute("tabindex", 0);
            }
        }

        keyelement.addEventListener("keydown", this.keyNavigateFunction =  function (e) {
            e = e || window.e;
            var keyCodeEvent = e.which || e.keyCode;
            if ([thiswheelnav.keynavigateDownCode, thiswheelnav.keynavigateDownCodeAlt, thiswheelnav.keynavigateUpCode, thiswheelnav.keynavigateUpCodeAlt].indexOf(e.keyCode) > -1) {
                e.preventDefault();
            }

            var keynavigate = null;

            if (keyCodeEvent === thiswheelnav.keynavigateUpCode || keyCodeEvent === thiswheelnav.keynavigateUpCodeAlt) {
                if (thiswheelnav.currentClick === thiswheelnav.navItemCount - 1) {
                    keynavigate = 0;
                }
                else {
                    keynavigate = thiswheelnav.currentClick + 1;
                }
            }
            if (keyCodeEvent === thiswheelnav.keynavigateDownCode || keyCodeEvent === thiswheelnav.keynavigateDownCodeAlt) {
                if (thiswheelnav.currentClick === 0) {
                    keynavigate = thiswheelnav.navItemCount - 1;
                }
                else {
                    keynavigate = thiswheelnav.currentClick - 1;
                }
            }

            if (keynavigate !== null) {
                thiswheelnav.navigateWheel(keynavigate);

                if (thiswheelnav.navItems[keynavigate].navigateFunction !== null) {
                    thiswheelnav.navItems[keynavigate].navigateFunction();
                }
            }
        });
    }

    this.spreader = new spreader(this);

    this.marker = new marker(this);

    this.refreshWheel();

    if (withSpread !== undefined) {
        this.spreadWheel();
    }

    return this;
};

wheelnav.prototype.removeWheel = function () {
    this.raphael.remove();

    if (this.keynavigateEnabled) {
        var keyelement = window;

        if (this.keynavigateOnlyFocus) {
            keyelement = document.getElementById(this.holderId);
            if (keyelement.hasAttribute("tabindex")) {
                keyelement.removeAttribute("tabindex");
            }
        }

        keyelement.removeEventListener("keydown", this.keyNavigateFunction);
    }
};

wheelnav.prototype.refreshWheel = function (withPathAndTransform) {

    for (i = 0; i < this.navItemCount; i++) {
        var navItem = this.navItems[i];
        navItem.setWheelSettings(withPathAndTransform);
        navItem.refreshNavItem(withPathAndTransform);
    }

    this.marker.setCurrentTransform();
    this.spreader.setCurrentTransform();
};

wheelnav.prototype.navigateWheel = function (clicked) {

    this.animateUnlock(true);

    if (this.clickModeRotate) {
        this.animateLocked = true;
    }

    var navItem;

    for (i = 0; i < this.navItemCount; i++) {
        navItem = this.navItems[i];

        navItem.hovered = false;

        if (i === clicked) {
            if (this.multiSelect) {
                navItem.selected = !navItem.selected;
            } else {
                navItem.selected = true;
                this.selectedNavItemIndex = i;
            }
        }
        else {
            if (!this.multiSelect) {
                navItem.selected = false;
            }
        }

        if (this.clickModeRotate) {
            var rotationAngle = this.navItems[clicked].navAngle - this.navItems[this.currentClick].navAngle;

            if (this.rotateRound) {
                if (this.clockwise && rotationAngle < 0) {
                    rotationAngle = 360 + rotationAngle;
                }
                if (!this.clockwise && rotationAngle > 0) {
                    rotationAngle = rotationAngle - 360;
                }
            }

            navItem.currentRotateAngle -= rotationAngle;
            var currentAnimateTime;
            if (this.animatetime != null) {
                currentAnimateTime = this.animatetime;
            }
            else {
                currentAnimateTime = 1500;
            }

            if (this.animatetimeCalculated &&
                clicked !== this.currentClick) {
                navItem.animatetime = currentAnimateTime * (Math.abs(rotationAngle) / 360);
            }

            if (this.rotateRoundCount > 0) {
                if (this.clockwise) { navItem.currentRotateAngle -= this.rotateRoundCount * 360; }
                else { navItem.currentRotateAngle += this.rotateRoundCount * 360; }

                navItem.animatetime = currentAnimateTime * (this.rotateRoundCount + 1);
            }
        }
    }

    for (i = 0; i < this.navItemCount; i++) {
        navItem = this.navItems[i];
        navItem.setCurrentTransform(true, true);
        navItem.refreshNavItem();
    }

    this.currentClick = clicked;

    if (this.clickModeSpreadOff) {
        this.currentPercent = this.maxPercent;
        this.spreadWheel();
    }
    else {
        if (clicked !== null &&
            !this.clickModeRotate) {
            this.marker.setCurrentTransform(this.navItems[this.currentClick].navAngle);
        }
        else {
            this.marker.setCurrentTransform();
        }
        this.spreader.setCurrentTransform(true);
    }
};

wheelnav.prototype.spreadWheel = function () {

    this.animateUnlock(true);
    this.animateLocked = true;

    if (this.currentPercent === this.maxPercent ||
        this.currentPercent === null) {
        this.currentPercent = this.minPercent;
    }
    else {
        this.currentPercent = this.maxPercent;
    }

    for (i = 0; i < this.navItemCount; i++) {
        var navItem = this.navItems[i];
        navItem.hovered = false;
        navItem.setCurrentTransform(true, false);
    }

    this.marker.setCurrentTransform();
    this.spreader.setCurrentTransform();

    return this;
};

wheelnav.prototype.animateUnlock = function (force, withFinishFunction) {

    if (force !== undefined && 
        force === true) {
        for (var f = 0; f < this.navItemCount; f++) {
            this.navItems[f].navSliceUnderAnimation = false;
            this.navItems[f].navTitleUnderAnimation = false;
            this.navItems[f].navTitlePathUnderAnimation = false;
            this.navItems[f].navLineUnderAnimation = false;
            this.navItems[f].navSlice.stop();
            this.navItems[f].navLine.stop();
            this.navItems[f].navTitle.stop();
            if (this.navItems[f].navTitlePath !== undefined) {
                this.navItems[f].navTitlePath.stop();
            }
        }
    }
    else {
        for (var i = 0; i < this.navItemCount; i++) {
            if (this.navItems[i].navSliceUnderAnimation === true ||
                this.navItems[i].navTitleUnderAnimation === true ||
                this.navItems[i].navTitlePathUnderAnimation === true ||
                this.navItems[i].navLineUnderAnimation === true) {
                return;
            }
        }

        this.animateLocked = false;
        if (this.animateFinishFunction !== null &&
            withFinishFunction !== undefined &&
            withFinishFunction === true) {
            this.animateFinishFunction();
        }
    }
};

wheelnav.prototype.setTooltips = function (tooltips) {
    if (tooltips !== undefined &&
        tooltips !== null &&
        Array.isArray(tooltips) &&
        tooltips.length <= this.navItems.length) {
        for (var i = 0; i < tooltips.length; i++) {
            this.navItems[i].setTooltip(tooltips[i]);
        }
    }
};

wheelnav.prototype.getItemId = function (index) {
    return "wheelnav-" + this.holderId + "-item-" + index;
};
wheelnav.prototype.getSliceId = function (index) {
    return "wheelnav-" + this.holderId + "-slice-" + index;
};
wheelnav.prototype.getClickableSliceId = function (index) {
    return "wheelnav-" + this.holderId + "-clickableslice-" + index;
};
wheelnav.prototype.getTitleId = function (index) {
    return "wheelnav-" + this.holderId + "-title-" + index;
};
wheelnav.prototype.getTitlePathId = function (index) {
    return "wheelnav-" + this.holderId + "-titlepath-" + index;
};
wheelnav.prototype.getLineId = function (index) {
    return "wheelnav-" + this.holderId + "-line-" + index;
};
wheelnav.prototype.getSpreaderId = function () {
    return "wheelnav-" + this.holderId + "-spreader";
};
wheelnav.prototype.getSpreaderTitleId = function () {
    return "wheelnav-" + this.holderId + "-spreadertitle";
};
wheelnav.prototype.getMarkerId = function () {
    return "wheelnav-" + this.holderId + "-marker";
};

///#source 1 1 /js/source/wheelnav.parse.js
/* ======================================================================================= */
/* Parse html5 data- attributes, the onmouseup events and anchor links                     */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/html5.html         */
/* ======================================================================================= */

wheelnav.prototype.parseWheel = function (holderDiv) {
    if (holderDiv !== undefined &&
        holderDiv !== null) {
        //data-wheelnav attribute is required
        var wheelnavData = holderDiv.hasAttribute("data-wheelnav");
        if (wheelnavData) {
            var parsedNavItems = [];
            var parsedNavItemsHref = [];
            var parsedNavItemsOnmouseup = [];
            var onlyInit = false;

            //data-wheelnav-slicepath
            var wheelnavSlicepath = holderDiv.getAttribute("data-wheelnav-slicepath");
            if (wheelnavSlicepath !== null) {
                if (slicePath()[wheelnavSlicepath] !== undefined) {
                    this.slicePathFunction = slicePath()[wheelnavSlicepath];
                }
            }
            //data-wheelnav-colors
            var wheelnavColors = holderDiv.getAttribute("data-wheelnav-colors");
            if (wheelnavColors !== null) {
                this.colors = wheelnavColors.split(',');
            }
            //data-wheelnav-wheelradius
            var wheelnavWheelradius = holderDiv.getAttribute("data-wheelnav-wheelradius");
            if (wheelnavWheelradius !== null) {
                this.wheelRadius = Number(wheelnavWheelradius);
            }
            //data-wheelnav-navangle
            var wheelnavNavangle = holderDiv.getAttribute("data-wheelnav-navangle");
            if (wheelnavNavangle !== null) {
                this.navAngle = Number(wheelnavNavangle);
            }
            //data-wheelnav-rotateoff
            var wheelnavRotateOff = holderDiv.getAttribute("data-wheelnav-rotateoff");
            if (wheelnavRotateOff !== null) {
                this.clickModeRotate = false;
            }
            //data-wheelnav-cssmode
            var wheelnavCssmode = holderDiv.getAttribute("data-wheelnav-cssmode");
            if (wheelnavCssmode !== null) {
                this.cssMode = true;
            }
            //data-wheelnav-spreader
            var wheelnavSpreader = holderDiv.getAttribute("data-wheelnav-spreader");
            if (wheelnavSpreader !== null) {
                this.spreaderEnable = true;
            }
            //data-wheelnav-spreaderradius
            var wheelnavSpreaderRadius = holderDiv.getAttribute("data-wheelnav-spreaderradius");
            if (wheelnavSpreaderRadius !== null) {
                this.spreaderRadius = Number(wheelnavSpreaderRadius);
            }
            //data-wheelnav-spreaderpath
            var wheelnavSpreaderPath = holderDiv.getAttribute("data-wheelnav-spreaderpath");
            if (wheelnavSpreaderPath !== null) {
                if (markerPath()[wheelnavSpreaderPath] !== undefined) {
                    this.spreaderPathFunction = spreaderPath()[wheelnavSpreaderPath];
                }
            }
            //data-wheelnav-marker
            var wheelnavMarker = holderDiv.getAttribute("data-wheelnav-marker");
            if (wheelnavMarker !== null) {
                this.markerEnable = true;
            }
            //data-wheelnav-markerpath
            var wheelnavMarkerPath = holderDiv.getAttribute("data-wheelnav-markerpath");
            if (wheelnavMarkerPath !== null) {
                if (markerPath()[wheelnavMarkerPath] !== undefined) {
                    this.markerPathFunction = markerPath()[wheelnavMarkerPath];
                }
            }
            //data-wheelnav-titlewidth
            var wheelnavTitleWidth = holderDiv.getAttribute("data-wheelnav-titlewidth");
            if (wheelnavTitleWidth !== null) {
                this.titleWidth = Number(wheelnavTitleWidth);
            }
            //data-wheelnav-titleheight
            var wheelnavTitleHeight = holderDiv.getAttribute("data-wheelnav-titleheight");
            if (wheelnavTitleHeight !== null) {
                this.titleHeight = Number(wheelnavTitleHeight);
            }
            //data-wheelnav-titlecurved
            var wheelnavTitleCurved = holderDiv.getAttribute("data-wheelnav-titlecurved");
            if (wheelnavTitleCurved !== null) {
                this.titleCurved = true;
            }
            //data-wheelnav-titlecurvedclockwise
            var wheelnavTitleCurvedClockwise = holderDiv.getAttribute("data-wheelnav-titlecurvedclockwise");
            if (wheelnavTitleCurvedClockwise !== null) {
                this.titleCurvedClockwise = true;
            }
            //data-wheelnav-titlecurvedbyrotateangle
            var wheelnavTitleCurvedByRotateAngle = holderDiv.getAttribute("data-wheelnav-titlecurvedbyrotateangle");
            if (wheelnavTitleCurvedByRotateAngle !== null) {
                this.titleCurvedByRotateAngle = true;
            }
            //data-wheelnav-keynav
            var wheelnavKeynav = holderDiv.getAttribute("data-wheelnav-keynav");
            if (wheelnavKeynav !== null) {
                this.keynavigateEnabled = true;
            }
            //data-wheelnav-keynavonlyfocus
            var wheelnavKeynavOnlyfocus = holderDiv.getAttribute("data-wheelnav-keynavonlyfocus");
            if (wheelnavKeynavOnlyfocus !== null) {
                this.keynavigateOnlyFocus = true;
            }
            //data-wheelnav-keynavdowncode
            var wheelnavKeynavDowncode = holderDiv.getAttribute("data-wheelnav-keynavdowncode");
            if (wheelnavKeynavDowncode !== null) {
                this.keynavigateDownCode = Number(wheelnavKeynavDowncode);
            }
            //data-wheelnav-keynavdowncodealt
            var wheelnavKeynavDowncodeAlt = holderDiv.getAttribute("data-wheelnav-keynavdowncodealt");
            if (wheelnavKeynavDowncodeAlt !== null) {
                this.keynavigateDownCodeAlt = Number(wheelnavKeynavDowncodeAlt);
            }
            //data-wheelnav-keynavupcode
            var wheelnavKeynavUpcode = holderDiv.getAttribute("data-wheelnav-keynavupcode");
            if (wheelnavKeynavUpcode !== null) {
                this.keynavigateUpCode = Number(wheelnavKeynavUpcode);
            }
            //data-wheelnav-keynavupcodealt
            var wheelnavKeynavUpcodeAlt = holderDiv.getAttribute("data-wheelnav-keynavupcodealt");
            if (wheelnavKeynavUpcodeAlt !== null) {
                this.keynavigateUpCodeAlt = Number(wheelnavKeynavUpcodeAlt);
            }

            //data-wheelnav-init
            var wheelnavOnlyinit = holderDiv.getAttribute("data-wheelnav-init");
            if (wheelnavOnlyinit !== null) {
                onlyInit = true;
            }

            for (var i = 0; i < holderDiv.children.length; i++) {

                var wheelnavNavitemtext = holderDiv.children[i].getAttribute("data-wheelnav-navitemtext");
                var wheelnavNavitemicon = holderDiv.children[i].getAttribute("data-wheelnav-navitemicon");
                var wheelnavNavitemimg = holderDiv.children[i].getAttribute("data-wheelnav-navitemimg");
                if (wheelnavNavitemtext !== null ||
                    wheelnavNavitemicon !== null ||
                    wheelnavNavitemimg !== null) {
                    //data-wheelnav-navitemtext
                    if (wheelnavNavitemtext !== null) {
                        parsedNavItems.push(wheelnavNavitemtext);
                    }
                    //data-wheelnav-navitemicon
                    else if (wheelnavNavitemicon !== null) {
                        if (icon[wheelnavNavitemicon] !== undefined) {
                            parsedNavItems.push(icon[wheelnavNavitemicon]);
                        }
                        else {
                            parsedNavItems.push(wheelnavNavitemicon);
                        }
                    }
                    else if (wheelnavNavitemimg !== null) {
                        parsedNavItems.push("imgsrc:" + wheelnavNavitemimg);
                    }
                    else {
                        //data-wheelnav-navitemtext or data-wheelnav-navitemicon or data-wheelnav-navitemimg is required
                        continue;
                    }

                    //onmouseup event of navitem element for call it in the navigateFunction
                    if (holderDiv.children[i].onmouseup !== undefined) {
                        parsedNavItemsOnmouseup.push(holderDiv.children[i].onmouseup);
                    }
                    else {
                        parsedNavItemsOnmouseup.push(null);
                    }

                    //parse inner <a> tag in navitem element for use href in navigateFunction
                    var foundHref = false;
                    for (var j = 0; j < holderDiv.children[i].children.length; j++) {
                        if (holderDiv.children[i].children[j].getAttribute('href') !== undefined) {
                            parsedNavItemsHref.push(holderDiv.children[i].children[j].getAttribute('href'));
                        }
                    }
                    if (!foundHref) {
                        parsedNavItemsHref.push(null);
                    }
                }
            }

            if (parsedNavItems.length > 0) {
                this.initWheel(parsedNavItems);

                for (var i = 0; i < parsedNavItemsOnmouseup.length; i++) {
                    this.navItems[i].navigateFunction = parsedNavItemsOnmouseup[i];
                    this.navItems[i].navigateHref = parsedNavItemsHref[i];
                }

                if (!onlyInit) {
                    this.createWheel();
                }
            }
        }

        var removeChildrens = [];
        for (var i = 0; i < holderDiv.children.length; i++) {
            if (holderDiv.children[i].localName !== "svg") {
                removeChildrens.push(holderDiv.children[i]);
            }
        }

        for (var i = 0; i < removeChildrens.length; i++) {
            holderDiv.removeChild(removeChildrens[i]);
        }
    }
};


///#source 1 1 /js/source/wheelnav.navItem.js
/* ======================================================================================= */
/* Navigation item                                                                         */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/navItem.html       */
/* ======================================================================================= */

wheelnavItem = function (wheelnav, title, itemIndex) {

    this.wheelnav = wheelnav;
    this.wheelItemIndex = itemIndex;
    if (wheelnav.clockwise) {
        this.itemIndex = itemIndex;
    }
    else {
        this.itemIndex = -itemIndex;
    }

    this.enabled = wheelnav.navItemsEnabled;
    this.selected = false;
    this.hovered = false;

    //Private properties
    this.navItem = null;
    this.navSlice = null;
    this.navTitle = null;
    this.navLine = null;
    this.navClickableSlice = null;

    this.navSliceCurrentTransformString = null;
    this.navTitleCurrentTransformString = null;
    this.navLineCurrentTransformString = null;

    this.navSliceUnderAnimation = false;
    this.navTitleUnderAnimation = false;
    this.navTitlePathUnderAnimation = false;
    this.navLineUnderAnimation = false;

    this.currentRotateAngle = 0;

    this.setTitle(title);
    this.tooltip = null;
    
    //Default settings
    this.fillAttr = "#CCC";
    this.titleFont = this.wheelnav.titleFont;
    this.navigateHref = null;
    this.navigateFunction = null;
    //When navTitle start with 'imgsrc:' it can parse as URL of image or data URI. These properties are available for images and paths. Use after initWheel(), before createWheel()
    this.titleWidth = null;
    this.titleHeight = null;
    this.titleHoverWidth = null;
    this.titleHoverHeight = null;
    this.titleSelectedWidth = null;
    this.titleSelectedHeight = null;

    //Wheelnav properties
    this.animateeffect = null;
    this.animatetime = null;

    this.sliceInitPathFunction = null;
    this.sliceClickablePathFunction = null;
    this.slicePathFunction = null;
    this.sliceSelectedPathFunction = null;
    this.sliceHoverPathFunction = null;

    this.sliceTransformFunction = null;
    this.sliceSelectedTransformFunction = null;
    this.sliceHoverTransformFunction = null;
    this.sliceInitTransformFunction = null;

    this.slicePathCustom = null;
    this.sliceClickablePathCustom = null;
    this.sliceSelectedPathCustom = null;
    this.sliceHoverPathCustom = null;
    this.sliceInitPathCustom = null;

    this.sliceTransformCustom = null;
    this.sliceSelectedTransformCustom = null;
    this.sliceHoverTransformCustom = null;
    this.sliceInitTransformCustom = null;

    this.initPercent = null;
    this.minPercent = null;
    this.maxPercent = null;
    this.hoverPercent = null;
    this.selectedPercent = null;
    this.clickablePercentMin = null;
    this.clickablePercentMax = null;

    this.titleSpreadScale = null;
    this.sliceAngle = null;
    this.titleRotateAngle = null;

    this.titleCurved = null;
    this.titleCurvedClockwise = null;
    this.titleCurvedByRotateAngle = null;

    //Default navitem styles
    this.styleNavItem();

    return this;
};

wheelnavItem.prototype.createNavItem = function () {

    //Wheel settings
    this.setWheelSettings(false);

    //Set href navigation
    if (this.navigateHref !== null) {
        this.navigateFunction = function () {
            window.location.href = this.navigateHref;
        };
    }

    //Set colors
    if (!this.wheelnav.cssMode) {
        this.slicePathAttr.fill = this.fillAttr;
        this.sliceHoverAttr.fill = this.fillAttr;
        this.sliceSelectedAttr.fill = this.fillAttr;
    }

    //Set attrs
    if (!this.enabled) {
        if (!this.wheelnav.cssMode) {
            this.slicePathAttr.cursor = "default";
            this.sliceHoverAttr.cursor = "default";
            this.titleAttr.cursor = "default";
            this.titleHoverAttr.cursor = "default";
            this.linePathAttr.cursor = "default";
            this.lineHoverAttr.cursor = "default";
        }

        this.sliceClickablePathAttr.cursor = "default";
        this.sliceClickableHoverAttr.cursor = "default";
    }

    //Set angles
    var prevItemIndex = this.wheelItemIndex - 1;
    var wheelSliceAngle = 360 / this.wheelnav.navItemCount;
    if (this.sliceAngle === null) {
        this.sliceAngle = 360 / this.wheelnav.navItemCount;
    }
    if (this.wheelnav.clockwise) {
        if (this.wheelnav.navItemsContinuous) {
            if (this.itemIndex === 0) {
                this.baseAngle = (this.itemIndex * this.sliceAngle) + ((-this.sliceAngle / 2) + this.wheelnav.navAngle);
            }
            else {
                this.baseAngle = this.wheelnav.navItems[prevItemIndex].baseAngle + this.wheelnav.navItems[prevItemIndex].sliceAngle;
            }
        }
        else {
            if (this.wheelnav.navItemsCentered) {
                this.baseAngle = (this.itemIndex * wheelSliceAngle) + ((-this.sliceAngle / 2) + this.wheelnav.navAngle);
            }
            else {
                this.baseAngle = (this.itemIndex * wheelSliceAngle) + ((-wheelSliceAngle / 2) + this.wheelnav.navAngle);
                this.currentRotateAngle += ((wheelSliceAngle / 2) - (this.wheelnav.navItems[0].sliceAngle / 2));
            }
        }
    }
    else {
        if (this.wheelnav.navItemsContinuous) {
            if (this.itemIndex === 0) {
                this.baseAngle = (this.itemIndex * this.sliceAngle) + ((-this.sliceAngle / 2) + this.wheelnav.navAngle);
            }
            else {
                this.baseAngle = this.wheelnav.navItems[prevItemIndex].baseAngle - this.wheelnav.navItems[this.wheelItemIndex].sliceAngle;
            }
        }
        else {
            if (this.wheelnav.navItemsCentered) {
                this.baseAngle = (this.itemIndex * wheelSliceAngle) + ((-this.sliceAngle / 2) + this.wheelnav.navAngle);
            }
            else {
                this.baseAngle = (this.itemIndex * wheelSliceAngle) + ((-wheelSliceAngle / 2) + this.wheelnav.navAngle) + (wheelSliceAngle - this.sliceAngle);
                this.currentRotateAngle -= ((wheelSliceAngle / 2) - (this.wheelnav.navItems[0].sliceAngle / 2));
            }
        }
    }

    this.navAngle = this.baseAngle + (this.sliceAngle / 2);

    if (this.wheelnav.animatetimeCalculated) {
        this.animatetime = this.wheelnav.animatetime / this.wheelnav.navItemCount;
    }

    this.initPathsAndTransforms();

    var sliceInitPath = this.sliceInitPath;

    //Create slice
    this.navSlice = this.wheelnav.raphael.path(sliceInitPath.slicePathString);
    this.navSlice.attr(this.slicePathAttr);
    this.navSlice.id = this.wheelnav.getSliceId(this.wheelItemIndex);
    this.navSlice.node.id = this.navSlice.id;

    //Create linepath
    this.navLine = this.wheelnav.raphael.path(sliceInitPath.linePathString);
    this.navLine.attr(this.linePathAttr);
    this.navLine.id = this.wheelnav.getLineId(this.wheelItemIndex);
    this.navLine.node.id = this.navLine.id;

    //Create title
    var currentTitle = this.initNavTitle;

    //Title defined by path
    if (wheelnavTitle().isPathTitle(this.title)) {
        this.navTitle = this.wheelnav.raphael.path(currentTitle.path);
    }
    //Title defined by image
    else if (wheelnavTitle().isImageTitle(this.title)) {
        this.navTitle = this.wheelnav.raphael.image(currentTitle.src, sliceInitPath.titlePosX - (this.titleWidth / 2), sliceInitPath.titlePosY - (this.titleHeight / 2), this.titleWidth, this.titleHeight);
    }
    //Title defined by text
    else {
        if (this.titleCurved) {
            this.navTitle = this.wheelnav.raphael.text(sliceInitPath.titlePosX, sliceInitPath.titlePosY, ".");
            if (currentTitle.title !== "") {
                this.addCurvedTitle(currentTitle.title);
            }
        }
        else {
            this.navTitle = this.wheelnav.raphael.text(sliceInitPath.titlePosX, sliceInitPath.titlePosY, currentTitle.title);
        }
    }

    this.navTitle.id = this.wheelnav.getTitleId(this.wheelItemIndex);
    this.navTitle.node.id = this.navTitle.id;
    this.navTitle.attr(this.titleAttr);

    //Tspan must be hide in case of curved text
    if (this.titleCurved) {
        var thisnode = document.getElementById(this.navTitle.node.id);
        if (thisnode !== null) {
            var tspans = thisnode.getElementsByTagName("tspan");
            if (tspans.length > 0) {
                tspans[0].setAttribute("fill", "transparent");
                tspans[0].setAttribute("stroke", "transparent");
            }
        }
    }

    //Set transforms
    this.navSliceCurrentTransformString = "";
    if (this.initTransform.sliceTransformString !== "") { this.navSliceCurrentTransformString += this.initTransform.sliceTransformString; }

    this.navLineCurrentTransformString = "";
    if (this.initTransform.lineTransformString !== "") { this.navLineCurrentTransformString += this.initTransform.lineTransformString; }

    this.navTitleCurrentTransformString = "";
    this.navTitleCurrentTransformString += this.getTitleRotateString(this.wheelnav.initTitleRotate);
    if (this.initTransform.titleTransformString !== "" && this.initTransform.titleTransformString !== undefined) { this.navTitleCurrentTransformString += this.initTransform.titleTransformString; }
    if (this.wheelnav.currentPercent < 0.05) {
        this.navTitleCurrentTransformString += ",s0.05";
    }
    if (this.navTitleSizeTransform !== undefined) {
        this.navTitleCurrentTransformString += this.navTitleSizeTransform;
    }

    this.navSlice.attr({ transform: this.navSliceCurrentTransformString });
    this.navLine.attr({ transform: this.navLineCurrentTransformString });
    this.navTitle.attr({ transform: this.navTitleCurrentTransformString });

    //Create item set
    this.navItem = this.wheelnav.raphael.set();

    if (this.sliceClickablePathFunction !== null) {
        //Create clickable slice
        var sliceClickablePath = this.getCurrentClickablePath();
        this.navClickableSlice = this.wheelnav.raphael.path(sliceClickablePath.slicePathString).attr(this.sliceClickablePathAttr).toBack();
        this.navClickableSlice.id = this.wheelnav.getClickableSliceId(this.wheelItemIndex);
        this.navClickableSlice.node.id = this.navClickableSlice.id;
        
        this.navItem.push(
            this.navSlice,
            this.navLine,
            this.navTitle,
            this.navClickableSlice
        );
    }
    else {
        this.navItem.push(
            this.navSlice,
            this.navLine,
            this.navTitle
        );
    }

    this.setTooltip(this.tooltip);
    this.navItem.id = this.wheelnav.getItemId(this.wheelItemIndex);

    var thisWheelNav = this.wheelnav;
    var thisNavItem = this;
    var thisItemIndex = this.wheelItemIndex;

    if (this.enabled) {
        this.navItem.mouseup(function () {
            if (thisNavItem.navigateFunction !== null) {
                thisNavItem.navigateFunction();
            }

            thisWheelNav.navigateWheel(thisItemIndex);
        });
        if (this.wheelnav.hoverEnable) {
            this.navItem.mouseover(function () {
                if (thisNavItem.hovered !== true) {
                    thisNavItem.hoverEffect(thisItemIndex, true);
                }
            });
            this.navItem.mouseout(function () {
                thisNavItem.hovered = false;
                thisNavItem.hoverEffect(thisItemIndex, false);
            });
        }
    }

    this.setCurrentTransform(true, false);
};

wheelnavItem.prototype.addCurvedTitle = function (text) {

    var pathString = [];
    if (this.sliceInitPath.titlePathString !== undefined && this.sliceInitPath.titlePathString !== "") {
        pathString = this.sliceInitPath.titlePathString;
    }
    else {
        this.sliceHelper.titleRadius = this.wheelnav.wheelRadius * 0.63;
        pathString = this.sliceHelper.getCurvedTitlePathString();
    }
 
    this.navTitle.node.id = this.wheelnav.getTitleId(this.wheelItemIndex);
    var pathid = this.wheelnav.getTitlePathId(this.wheelItemIndex);
    this.navTitlePath = this.wheelnav.raphael.path(pathString);
    this.navTitlePath.attr({ fill: "transparent", stroke: "transparent" });
    this.navTitlePath.node.id = pathid;

    var thisnode = document.getElementById(this.navTitle.node.id);
    var curvetextPath = window.document.createElementNS("http://www.w3.org/2000/svg", "textPath");
    curvetextPath.setAttribute("id", pathid + "-text");
    curvetextPath.setAttribute("href", "#" + pathid);
    curvetextPath.setAttribute("startOffset", "50%");
    curvetextPath.setAttribute("dominant-baseline", "middle");
    curvetextPath.setAttribute("alignment-baseline", "middle");
    curvetextPath.textContent = text;
    thisnode.appendChild(curvetextPath);

    if (!this.titleCurvedByRotateAngle) {
        this.titleRotateAngle = -this.navAngle;
    }
};

wheelnavItem.prototype.hoverEffect = function (hovered, isEnter) {

    if (this.wheelnav.animateLocked === false) {
        if (isEnter) {
            if (!this.selected) {
                this.hovered = true;
            }
        }

        this.refreshNavItem();

        if (this.hoverPercent !== 1 ||
            this.sliceHoverPathFunction !== null ||
            this.sliceHoverTransformFunction !== null ||
            this.titleHover !== this.title ||
            this.titleHoverWidth !== this.titleWidth ||
            this.titleHoverHeight !== this.titleHeight) {
            this.setCurrentTransform(false, false);
        }

        this.wheelnav.marker.setCurrentTransform();
        this.wheelnav.spreader.setCurrentTransform(true);
    }
};

wheelnavItem.prototype.setCurrentTransform = function (locked, withFinishFunction) {

    if (!this.wheelnav.clickModeRotate ||
        (!this.navSliceUnderAnimation &&
        !this.navTitleUnderAnimation &&
        !this.navTitlePathUnderAnimation &&
        !this.navLineUnderAnimation)) {

        if (locked !== undefined &&
            locked === true) {
            this.navSliceUnderAnimation = true;
            this.navTitleUnderAnimation = true;
            if (this.navTitlePath !== undefined) {
                this.navTitlePathUnderAnimation = true;
            }
            this.navLineUnderAnimation = true;
        }

        //Set transforms
        //  Slice
        this.navSliceCurrentTransformString = "";
        if (this.wheelnav.clickModeRotate) { this.navSliceCurrentTransformString += this.getItemRotateString(); }
        if (this.selected) {
            if (this.selectTransform.sliceTransformString !== undefined) { this.navSliceCurrentTransformString += this.selectTransform.sliceTransformString; }
        }
        else if (this.hovered) {
            if (this.hoverTransform.sliceTransformString !== undefined) { this.navSliceCurrentTransformString += this.hoverTransform.sliceTransformString; }
        }
        if (this.sliceTransform.sliceTransformString !== undefined) { this.navSliceCurrentTransformString += this.sliceTransform.sliceTransformString; }

        //  Line
        this.navLineCurrentTransformString = "";
        if (this.wheelnav.clickModeRotate) { this.navLineCurrentTransformString += this.getItemRotateString(); }
        if (this.selected) {
            if (this.selectTransform.lineTransformString !== undefined) { this.navLineCurrentTransformString += this.selectTransform.lineTransformString; }
        }
        else if (this.hovered) {
            if (this.hoverTransform.lineTransformString !== undefined) { this.navLineCurrentTransformString += this.hoverTransform.lineTransformString; }
        }
        if (this.sliceTransform.lineTransformString !== undefined) { this.navLineCurrentTransformString += this.sliceTransform.lineTransformString; }

        //  Title
        this.navTitleCurrentTransformString = "";
        this.navTitleCurrentTransformString += this.getTitleRotateString(true);

        if (this.selected) {
            if (this.navTitleSizeSelectedTransform !== undefined) {
                this.navTitleCurrentTransformString += this.navTitleSizeSelectedTransform;
            }
            if (this.selectTransform.titleTransformString === "" ||
                this.selectTransform.titleTransformString === undefined) {
                this.navTitleCurrentTransformString += ",s1";
            }
            else {
                this.navTitleCurrentTransformString += "," + this.selectTransform.titleTransformString;
            }
            if (this.wheelnav.currentPercent < 0.05) {
                this.navTitleCurrentTransformString += ",s0.05";
            }
        }
        else if (this.hovered) {
            if (this.navTitleSizeHoverTransform !== undefined) {
                this.navTitleCurrentTransformString += this.navTitleSizeHoverTransform;
            }
            if (this.hoverTransform.titleTransformString === "" ||
                this.hoverTransform.titleTransformString === undefined) {
                this.navTitleCurrentTransformString += ",s1";
            }
            else {
                this.navTitleCurrentTransformString += "," + this.hoverTransform.titleTransformString;
            }
        }
        else if (this.wheelnav.currentPercent < 0.05) {
            this.navTitleCurrentTransformString += ",s0.05";
        }
        else if (this.titleSpreadScale) {
            this.navTitleCurrentTransformString += ",s" + this.wheelnav.currentPercent;
        }
        else {
            if (this.navTitleSizeTransform !== undefined) {
                this.navTitleCurrentTransformString += this.navTitleSizeTransform;
            }
            if (this.sliceTransform.titleTransformString === "" ||
                this.sliceTransform.titleTransformString === undefined) {
                this.navTitleCurrentTransformString += ",s1";
            }
            else {
                this.navTitleCurrentTransformString += "," + this.sliceTransform.titleTransformString;
            }
        }

        //Set path
        var slicePath = this.getCurrentPath();

        var sliceTransformAttr = {};

        sliceTransformAttr = {
            path: slicePath.slicePathString,
            transform: this.navSliceCurrentTransformString
        };

        var sliceClickableTransformAttr = {};

        if (this.sliceClickablePathFunction !== null) {
            var sliceClickablePath = this.getCurrentClickablePath();

            sliceClickableTransformAttr = {
                path: sliceClickablePath.slicePathString,
                transform: this.navSliceCurrentTransformString
            };
        }

        var lineTransformAttr = {};

        lineTransformAttr = {
            path: slicePath.linePathString,
            transform: this.navLineCurrentTransformString
        };

        //Set title
        var currentTitle = this.getCurrentTitle();
        var titleTransformAttr = {};
        var titlePathTransformAttr = null;

        if (wheelnavTitle().isPathTitle(currentTitle.title)) {
            titleTransformAttr = {
                path: currentTitle.path,
                transform: this.navTitleCurrentTransformString
            };
        }
        else if (wheelnavTitle().isImageTitle(currentTitle.title)) {
            titleTransformAttr = {
                x: currentTitle.x,
                y: currentTitle.y,
                width: currentTitle.width,
                height: currentTitle.height,
                transform: this.navTitleCurrentTransformString
            };

            this.navTitle.attr({ src: currentTitle.src });
        }
        else {
            titleTransformAttr = {
                x: currentTitle.x,
                y: currentTitle.y,
                transform: this.navTitleCurrentTransformString
            };

            if (currentTitle.title !== null && currentTitle.title !== "") {
                if (!this.titleCurved) {
                    this.navTitle.attr({ text: currentTitle.title });
                }
                else if (slicePath.titlePathString !== undefined && slicePath.titlePathString !== "") {
                    titlePathTransformAttr = {
                        path: slicePath.titlePathString
                    };
                }
            }
        }

        var thisNavItem = this;
        var thisWheelnav = this.wheelnav;

        //Animate navitem
        this.animSlice = Raphael.animation(sliceTransformAttr, this.animatetime, this.animateeffect, function () {
            thisNavItem.navSliceUnderAnimation = false;
            thisWheelnav.animateUnlock(false, withFinishFunction);
        });
        this.animLine = Raphael.animation(lineTransformAttr, this.animatetime, this.animateeffect, function () {
            thisNavItem.navLineUnderAnimation = false;
            thisWheelnav.animateUnlock(false, withFinishFunction);
        });
        this.animTitle = Raphael.animation(titleTransformAttr, this.animatetime, this.animateeffect, function () {
            thisNavItem.navTitleUnderAnimation = false;
            thisWheelnav.animateUnlock(false, withFinishFunction);
        });
        if (this.titleCurved && this.navTitlePath !== undefined) {
            this.animTitlePath = Raphael.animation(titlePathTransformAttr, this.animatetime, this.animateeffect, function () {
                thisNavItem.navTitlePathUnderAnimation = false;
                thisWheelnav.animateUnlock(false, withFinishFunction);
            });
        }

        if (this.navClickableSlice !== null) {
            this.animClickableSlice = Raphael.animation(sliceClickableTransformAttr, this.animatetime, this.animateeffect);
        }

        var animateRepeatCount = this.wheelnav.animateRepeatCount;

        if (locked !== undefined &&
            locked === true) {
            if (this.wheelItemIndex === this.wheelnav.navItemCount - 1) {

                for (i = 0; i < this.wheelnav.navItemCount; i++) {
                    var navItemSlice = this.wheelnav.navItems[i];
                    navItemSlice.navSlice.animate(navItemSlice.animSlice.repeat(animateRepeatCount));
                }
                for (i = 0; i < this.wheelnav.navItemCount; i++) {
                    var navItemLine = this.wheelnav.navItems[i];
                    navItemLine.navLine.animate(navItemLine.animLine.repeat(animateRepeatCount));
                }
                for (i = 0; i < this.wheelnav.navItemCount; i++) {
                    var navItemTitle = this.wheelnav.navItems[i];
                    navItemTitle.navTitle.animate(navItemTitle.animTitle.repeat(animateRepeatCount));
                    if (navItemTitle.titleCurved && navItemTitle.navTitlePath !== undefined) {
                        navItemTitle.navTitlePath.animate(navItemTitle.animTitlePath.repeat(animateRepeatCount));
                    }
                }

                if (this.wheelnav.sliceClickablePathFunction !== null) {
                    for (i = 0; i < this.wheelnav.navItemCount; i++) {
                        var navItemClickableSlice = this.wheelnav.navItems[i];
                        if (navItemClickableSlice.navClickableSlice !== null) {
                            navItemClickableSlice.navClickableSlice.animate(navItemClickableSlice.animClickableSlice.repeat(animateRepeatCount));
                        }
                    }
                }
            }
        }
        else {
            this.navSlice.animate(this.animSlice.repeat(animateRepeatCount));
            this.navLine.animate(this.animLine.repeat(animateRepeatCount));
            this.navTitle.animate(this.animTitle.repeat(animateRepeatCount));
            if (this.titleCurved && this.navTitlePath !== undefined) {
                this.navTitlePath.animate(this.animTitlePath.repeat(animateRepeatCount));
            }

            if (this.navClickableSlice !== null) {
                this.navClickableSlice.animate(this.animClickableSlice.repeat(animateRepeatCount));
            }
        }
    }
};

wheelnavItem.prototype.setTitle = function (title) {
    if (title === undefined) {
        this.title = null;
    }
    else {
        this.title = title;
    }
    this.titleHover = this.title;
    this.titleSelected = this.title;
};

wheelnavItem.prototype.setTooltip = function (tooltip) {
    if (tooltip !== null) {
        this.navItem.attr({ title: tooltip });
    }
};

wheelnavItem.prototype.refreshNavItem = function (withPathAndTransform) {

    if (this.selected) {
        this.navSlice.attr(this.sliceSelectedAttr);
        this.navLine.attr(this.lineSelectedAttr);
        this.navTitle.attr(this.titleSelectedAttr);
        if (this.navClickableSlice !== null) { this.navClickableSlice.attr(this.sliceClickableSelectedAttr); }

        if (this.wheelnav.selectedToFront) {
            this.navSlice.toFront();
            this.navLine.toFront();
            this.navTitle.toFront();
            if (this.navClickableSlice !== null) { this.navClickableSlice.toFront(); }
        }
        else {
            if (this.navClickableSlice !== null) { this.navClickableSlice.toBack(); }
            this.navTitle.toBack();
            this.navLine.toBack();
            this.navSlice.toBack();
        }
    }
    else if (this.hovered) {
        if (this.wheelnav.hoverEnable) {
            this.navSlice.attr(this.sliceHoverAttr);
            this.navLine.attr(this.lineHoverAttr);
            this.navTitle.attr(this.titleHoverAttr);
            if (this.navClickableSlice !== null) { this.navClickableSlice.attr(this.sliceClickableHoverAttr); }

            if (this.wheelnav.hoveredToFront) {
                this.navSlice.toFront();
                this.navLine.toFront();
                this.navTitle.toFront();
            }
            if (this.navClickableSlice !== null) { this.navClickableSlice.toFront(); }
        }
    }
    else {
        this.navSlice.attr(this.slicePathAttr);
        this.navLine.attr(this.linePathAttr);
        this.navTitle.attr(this.titleAttr);
        if (this.navClickableSlice !== null) { this.navClickableSlice.attr(this.sliceClickablePathAttr); }

        if (this.navClickableSlice !== null) { this.navClickableSlice.toBack(); };
        this.navTitle.toBack();
        this.navLine.toBack();
        this.navSlice.toBack();
    }
    
    if (withPathAndTransform !== undefined &&
        withPathAndTransform === true) {
        this.initPathsAndTransforms();
        this.setCurrentTransform(false, false);
    }
};

wheelnavItem.prototype.setWheelSettings = function (force) {

    //Set slice from wheelnav
    if (this.wheelnav.slicePathAttr !== null) { this.slicePathAttr = JSON.parse(JSON.stringify(this.wheelnav.slicePathAttr)); }
    if (this.wheelnav.sliceHoverAttr !== null) { this.sliceHoverAttr = JSON.parse(JSON.stringify(this.wheelnav.sliceHoverAttr)); }
    if (this.wheelnav.sliceSelectedAttr !== null) { this.sliceSelectedAttr = JSON.parse(JSON.stringify(this.wheelnav.sliceSelectedAttr)); }
    
    //Set title from wheelnav
    if (this.wheelnav.titleAttr !== null) { this.titleAttr = JSON.parse(JSON.stringify(this.wheelnav.titleAttr)); }
    if (this.wheelnav.titleHoverAttr !== null) { this.titleHoverAttr = JSON.parse(JSON.stringify(this.wheelnav.titleHoverAttr)); }
    if (this.wheelnav.titleSelectedAttr !== null) { this.titleSelectedAttr = JSON.parse(JSON.stringify(this.wheelnav.titleSelectedAttr)); }
    if (this.wheelnav.titleRotateAngle !== null && this.titleRotateAngle === null) { this.titleRotateAngle = this.wheelnav.titleRotateAngle; }
    if (this.wheelnav.titleCurved !== null && this.titleCurved === null) { this.titleCurved = this.wheelnav.titleCurved; }
    if (this.wheelnav.titleCurvedClockwise !== null && this.titleCurvedClockwise === null) { this.titleCurvedClockwise = this.wheelnav.titleCurvedClockwise; }
    else if (this.titleCurvedClockwise === null) { this.titleCurvedClockwise = !this.wheelnav.clockwise; }
    if (this.wheelnav.titleCurvedByRotateAngle !== null && this.titleCurvedByRotateAngle === null) { this.titleCurvedByRotateAngle = this.wheelnav.titleCurvedByRotateAngle; }

    // Size
    if (this.wheelnav.titleWidth !== null && this.titleWidth === null) { this.titleWidth = this.wheelnav.titleWidth; }
    if (this.wheelnav.titleHeight !== null && this.titleHeight === null) { this.titleHeight = this.wheelnav.titleHeight; }
    if (this.titleWidth !== null && this.titleHeight === null) { this.titleHeight = this.titleWidth; }
    if (this.titleWidth === null && this.titleHeight !== null) { this.titleWidth = this.titleHeight; }
    if (wheelnavTitle().isImageTitle(this.title)) {
        // Image default value
        if (this.titleWidth === null) { this.titleWidth = 32; }
        if (this.titleHeight === null) { this.titleHeight = 32; }
    }

    if (this.wheelnav.titleHoverWidth !== null && this.titleHoverWidth === null) { this.titleHoverWidth = this.wheelnav.titleHoverWidth; }
    if (this.wheelnav.titleHoverHeight !== null && this.titleHoverHeight === null) { this.titleHoverHeight = this.wheelnav.titleHoverHeight; }
    if (this.titleHoverWidth !== null && this.titleHoverHeight === null) { this.titleHoverHeight = this.titleHoverWidth; }
    if (this.titleHoverWidth === null && this.titleHoverHeight !== null) { this.titleHoverWidth = this.titleHoverHeight; }

    if (this.wheelnav.titleSelectedWidth !== null && this.titleSelectedWidth === null) { this.titleSelectedWidth = this.wheelnav.titleSelectedWidth; }
    if (this.wheelnav.titleSelectedHeight !== null && this.titleSelectedHeight === null) { this.titleSelectedHeight = this.wheelnav.titleSelectedHeight; }
    if (this.titleSelectedWidth !== null && this.titleSelectedHeight === null) { this.titleSelectedHeight = this.titleSelectedWidth; }
    if (this.titleSelectedWidth === null && this.titleSelectedHeight !== null) { this.titleSelectedWidth = this.titleSelectedHeight; }

    if (this.titleHoverHeight === null) { this.titleHoverHeight = this.titleHeight; }
    if (this.titleHoverWidth === null) { this.titleHoverWidth = this.titleWidth; }
    if (this.titleSelectedHeight === null) { this.titleSelectedHeight = this.titleHeight; }
    if (this.titleSelectedWidth === null) { this.titleSelectedWidth = this.titleWidth; }

    //Set line from wheelnav
    if (this.wheelnav.linePathAttr !== null) { this.linePathAttr = JSON.parse(JSON.stringify(this.wheelnav.linePathAttr)); }
    if (this.wheelnav.lineHoverAttr !== null) { this.lineHoverAttr = JSON.parse(JSON.stringify(this.wheelnav.lineHoverAttr)); }
    if (this.wheelnav.lineSelectedAttr !== null) { this.lineSelectedAttr = JSON.parse(JSON.stringify(this.wheelnav.lineSelectedAttr)); }

    //Set animation from wheelnav
    if (this.animateeffect === null || force) {
        if (this.wheelnav.animateeffect !== null) { this.animateeffect = this.wheelnav.animateeffect; }
        else { this.animateeffect = "bounce"; }
    }
    if (this.animatetime === null || force) {
        if (this.wheelnav.animatetime !== null) { this.animatetime = this.wheelnav.animatetime; }
        else { this.animatetime = 1500; }
    }

    if (this.title !== null) {
        if (this.sliceInitPathFunction === null || force) { this.sliceInitPathFunction = this.wheelnav.sliceInitPathFunction; }
        if (this.sliceClickablePathFunction === null || force) { this.sliceClickablePathFunction = this.wheelnav.sliceClickablePathFunction; }
        if (this.slicePathFunction === null || force) { this.slicePathFunction = this.wheelnav.slicePathFunction; }
        if (this.sliceSelectedPathFunction === null || force) { this.sliceSelectedPathFunction = this.wheelnav.sliceSelectedPathFunction; }
        if (this.sliceHoverPathFunction === null || force) { this.sliceHoverPathFunction = this.wheelnav.sliceHoverPathFunction; }
            
        if (this.sliceTransformFunction === null || force) { this.sliceTransformFunction = this.wheelnav.sliceTransformFunction; }
        if (this.sliceSelectedTransformFunction === null || force) { this.sliceSelectedTransformFunction = this.wheelnav.sliceSelectedTransformFunction; }
        if (this.sliceHoverTransformFunction === null || force) { this.sliceHoverTransformFunction = this.wheelnav.sliceHoverTransformFunction; }
        if (this.sliceInitTransformFunction === null || force) { this.sliceInitTransformFunction = this.wheelnav.sliceInitTransformFunction; }
    }
    else {
        this.sliceInitPathFunction = slicePath().NullInitSlice;
        this.sliceClickablePathFunction = slicePath().NullSlice;
        this.slicePathFunction = slicePath().NullSlice;
        this.sliceSelectedPathFunction = null;
        this.sliceHoverPathFunction = null;
        this.sliceTransformFunction = null;
        this.sliceSelectedTransformFunction = null;
        this.sliceHoverTransformFunction = null;
        this.sliceInitTransformFunction = null;
    }

    if (this.slicePathCustom === null || force) { this.slicePathCustom = this.wheelnav.slicePathCustom; }
    if (this.sliceClickablePathCustom === null || force) { this.sliceClickablePathCustom = this.wheelnav.sliceClickablePathCustom; }
    if (this.sliceSelectedPathCustom === null || force) { this.sliceSelectedPathCustom = this.wheelnav.sliceSelectedPathCustom; }
    if (this.sliceHoverPathCustom === null || force) { this.sliceHoverPathCustom = this.wheelnav.sliceHoverPathCustom; }
    if (this.sliceInitPathCustom === null || force) { this.sliceInitPathCustom = this.wheelnav.sliceInitPathCustom; }

    if (this.sliceTransformCustom === null || force) { this.sliceTransformCustom = this.wheelnav.sliceTransformCustom; }
    if (this.sliceSelectedTransformCustom === null || force) { this.sliceSelectedTransformCustom = this.wheelnav.sliceSelectedTransformCustom; }
    if (this.sliceHoverTransformCustom === null || force) { this.sliceHoverTransformCustom = this.wheelnav.sliceHoverTransformCustom; }
    if (this.sliceInitTransformCustom === null || force) { this.sliceInitTransformCustom = this.wheelnav.sliceInitTransformCustom; }

    if (this.initPercent === null || force) { this.initPercent = this.wheelnav.initPercent; }
    if (this.minPercent === null || force) { this.minPercent = this.wheelnav.minPercent; }
    if (this.maxPercent === null || force) { this.maxPercent = this.wheelnav.maxPercent; }
    if (this.hoverPercent === null || force) { this.hoverPercent = this.wheelnav.hoverPercent; }
    if (this.selectedPercent === null || force) { this.selectedPercent = this.wheelnav.selectedPercent; }
    if (this.clickablePercentMin === null || force) { this.clickablePercentMin = this.wheelnav.clickablePercentMin; }
    if (this.clickablePercentMax === null || force) { this.clickablePercentMax = this.wheelnav.clickablePercentMax; }

    if (this.titleSpreadScale === null || force) {
        if (this.wheelnav.titleSpreadScale !== null) { this.titleSpreadScale = this.wheelnav.titleSpreadScale; }
        else { this.titleSpreadScale = false; }
    }
    if (this.sliceAngle === null || force) {
        if (this.wheelnav.sliceAngle !== null) { this.sliceAngle = this.wheelnav.sliceAngle; }
    }
};

wheelnavItem.prototype.initPathsAndTransforms = function () {

    this.sliceHelper = new pathHelper();
    this.sliceHelper.centerX = this.wheelnav.centerX;
    this.sliceHelper.centerY = this.wheelnav.centerY;
    this.sliceHelper.wheelRadius = this.wheelnav.wheelRadius;
    this.sliceHelper.startAngle = this.baseAngle;
    this.sliceHelper.sliceAngle = this.sliceAngle;
    this.sliceHelper.itemIndex = this.itemIndex;
    this.sliceHelper.titleCurvedClockwise = this.titleCurvedClockwise;
    
    //Set min/max sliecePaths
    //Default - min
    this.slicePathMin = this.slicePathFunction(this.sliceHelper, this.minPercent, this.slicePathCustom);

    //Default - max
    this.slicePathMax = this.slicePathFunction(this.sliceHelper, this.maxPercent, this.slicePathCustom);

    //Selected - min
    if (this.sliceSelectedPathFunction !== null) {
        this.selectedSlicePathMin = this.sliceSelectedPathFunction(this.sliceHelper, this.selectedPercent * this.minPercent, this.sliceSelectedPathCustom);
    }
    else {
        this.selectedSlicePathMin = this.slicePathFunction(this.sliceHelper, this.selectedPercent * this.minPercent, this.sliceSelectedPathCustom);
    }

    //Selected - max
    if (this.sliceSelectedPathFunction !== null) {
        this.selectedSlicePathMax = this.sliceSelectedPathFunction(this.sliceHelper, this.selectedPercent * this.maxPercent, this.sliceSelectedPathCustom);
    }
    else {
        this.selectedSlicePathMax = this.slicePathFunction(this.sliceHelper, this.selectedPercent * this.maxPercent, this.sliceSelectedPathCustom);
    }

    //Hovered - min
    if (this.sliceHoverPathFunction !== null) {
        this.hoverSlicePathMin = this.sliceHoverPathFunction(this.sliceHelper, this.hoverPercent * this.minPercent, this.sliceHoverPathCustom);
    }
    else {
        this.hoverSlicePathMin = this.slicePathFunction(this.sliceHelper, this.hoverPercent * this.minPercent, this.sliceHoverPathCustom);
    }

    //Hovered - max
    if (this.sliceHoverPathFunction !== null) {
        this.hoverSlicePathMax = this.sliceHoverPathFunction(this.sliceHelper, this.hoverPercent * this.maxPercent, this.sliceHoverPathCustom);
    }
    else {
        this.hoverSlicePathMax = this.slicePathFunction(this.sliceHelper, this.hoverPercent * this.maxPercent, this.sliceHoverPathCustom);
    }

    //Set min/max sliececlickablePaths
    
    if (this.sliceClickablePathFunction !== null) {
        //Default - min
        this.clickableSlicePathMin = this.sliceClickablePathFunction(this.sliceHelper, this.clickablePercentMin, this.sliceClickablePathCustom);
        //Default - max
        this.clickableSlicePathMax = this.sliceClickablePathFunction(this.sliceHelper, this.clickablePercentMax, this.sliceClickablePathCustom);
    }

    //Initial path
    if (this.sliceInitPathFunction !== null) {
        this.sliceInitPath = this.sliceInitPathFunction(this.sliceHelper, this.initPercent, this.sliceInitPathCustom);
    }
    else {
        if (this.wheelnav.currentPercent === this.wheelnav.maxPercent) {
            this.sliceInitPath = this.slicePathFunction(this.sliceHelper, this.maxPercent, this.sliceInitPathCustom);
        }
        else {
            this.sliceInitPath = this.slicePathFunction(this.sliceHelper, this.minPercent, this.sliceInitPathCustom);
        }
    }

    //Set sliceTransforms
    //Default
    if (this.sliceTransformFunction !== null) {
        this.sliceTransform = this.sliceTransformFunction(this.wheelnav.centerX, this.wheelnav.centerY, this.wheelnav.wheelRadius, this.baseAngle, this.sliceAngle, this.titleRotateAngle, this.itemIndex, this.sliceTransformCustom);
    }
    else {
        this.sliceTransform = sliceTransform().NullTransform;
    }

    //Selected
    if (this.sliceSelectedTransformFunction !== null) {
        this.selectTransform = this.sliceSelectedTransformFunction(this.wheelnav.centerX, this.wheelnav.centerY, this.wheelnav.wheelRadius, this.baseAngle, this.sliceAngle, this.titleRotateAngle, this.itemIndex, this.sliceSelectedTransformCustom);
    }
    else {
        this.selectTransform = sliceTransform().NullTransform;
    }

    //Hovered
    if (this.sliceHoverTransformFunction !== null) {
        this.hoverTransform = this.sliceHoverTransformFunction(this.wheelnav.centerX, this.wheelnav.centerY, this.wheelnav.wheelRadius, this.baseAngle, this.sliceAngle, this.titleRotateAngle, this.itemIndex, this.sliceHoverTransformCustom);
    }
    else {
        this.hoverTransform = sliceTransform().NullTransform;
    }

    //Initial transform
    if (this.sliceInitTransformFunction !== null) {
        this.initTransform = this.sliceInitTransformFunction(this.wheelnav.centerX, this.wheelnav.centerY, this.wheelnav.wheelRadius, this.baseAngle, this.sliceAngle, this.titleRotateAngle, this.itemIndex, this.sliceInitTransformCustom);
    }
    else {
        this.initTransform = sliceTransform().NullTransform;
    }

    //Set titles
    if (wheelnavTitle().isPathTitle(this.title)) {
        initNavTitle = new wheelnavTitle(this.title, this.wheelnav.raphael.raphael);
        basicNavTitleMin = new wheelnavTitle(this.title, this.wheelnav.raphael.raphael);
        basicNavTitleMax = new wheelnavTitle(this.title, this.wheelnav.raphael.raphael);
        hoverNavTitleMin = new wheelnavTitle(this.titleHover, this.wheelnav.raphael.raphael);
        hoverNavTitleMax = new wheelnavTitle(this.titleHover, this.wheelnav.raphael.raphael);
        selectedNavTitleMin = new wheelnavTitle(this.titleSelected, this.wheelnav.raphael.raphael);
        selectedNavTitleMax = new wheelnavTitle(this.titleSelected, this.wheelnav.raphael.raphael);
        this.navTitleSizeTransform = basicNavTitleMax.getTitleSizeTransform(this.titleWidth, this.titleHeight);
        this.navTitleSizeHoverTransform = hoverNavTitleMax.getTitleSizeTransform(this.titleHoverWidth, this.titleHoverHeight);
        this.navTitleSizeSelectedTransform = selectedNavTitleMax.getTitleSizeTransform(this.titleSelectedWidth, this.titleSelectedHeight);
    }
    else {
        initNavTitle = new wheelnavTitle(this.title);
        basicNavTitleMin = new wheelnavTitle(this.title);
        basicNavTitleMax = new wheelnavTitle(this.title);
        hoverNavTitleMin = new wheelnavTitle(this.titleHover);
        hoverNavTitleMax = new wheelnavTitle(this.titleHover);
        selectedNavTitleMin = new wheelnavTitle(this.titleSelected);
        selectedNavTitleMax = new wheelnavTitle(this.titleSelected);
    }

    this.initNavTitle = initNavTitle.getTitlePercentAttr(this.sliceInitPath.titlePosX, this.sliceInitPath.titlePosY, this.titleWidth, this.titleHeight);
    this.basicNavTitleMin = basicNavTitleMin.getTitlePercentAttr(this.slicePathMin.titlePosX, this.slicePathMin.titlePosY, this.titleWidth, this.titleHeight);
    this.basicNavTitleMax = basicNavTitleMax.getTitlePercentAttr(this.slicePathMax.titlePosX, this.slicePathMax.titlePosY, this.titleWidth, this.titleHeight);
    this.hoverNavTitleMin = hoverNavTitleMin.getTitlePercentAttr(this.hoverSlicePathMin.titlePosX, this.hoverSlicePathMin.titlePosY, this.titleHoverWidth, this.titleHoverHeight);
    this.hoverNavTitleMax = hoverNavTitleMax.getTitlePercentAttr(this.hoverSlicePathMax.titlePosX, this.hoverSlicePathMax.titlePosY, this.titleHoverWidth, this.titleHoverHeight);
    this.selectedNavTitleMin = selectedNavTitleMin.getTitlePercentAttr(this.selectedSlicePathMin.titlePosX, this.selectedSlicePathMin.titlePosY, this.titleSelectedWidth, this.titleSelectedHeight);
    this.selectedNavTitleMax = selectedNavTitleMax.getTitlePercentAttr(this.selectedSlicePathMax.titlePosX, this.selectedSlicePathMax.titlePosY, this.titleSelectedWidth, this.titleSelectedHeight);
};

wheelnavItem.prototype.getCurrentPath = function () {
    var slicePath;

    if (this.wheelnav.currentPercent === this.wheelnav.maxPercent) {
        if (this.selected) {
            slicePath = this.selectedSlicePathMax;
        }
        else {
            if (this.hovered) {
                slicePath = this.hoverSlicePathMax;
            }
            else {
                slicePath = this.slicePathMax;
            }
        }
    }
    else {
        if (this.selected) {
            slicePath = this.selectedSlicePathMin;
        }
        else {
            if (this.hovered) {
                slicePath = this.hoverSlicePathMin;
            }
            else {
                slicePath = this.slicePathMin;
            }
        }
    }

    return slicePath;
};

wheelnavItem.prototype.getCurrentClickablePath = function () {
    var sliceClickablePath;

    if (this.wheelnav.currentPercent === this.wheelnav.maxPercent) {
        sliceClickablePath = this.clickableSlicePathMax;
    }
    else {
        sliceClickablePath = this.clickableSlicePathMin;
    }

    return sliceClickablePath;
};

wheelnavItem.prototype.getCurrentTitle = function () {
    var currentTitle;

    if (this.wheelnav.currentPercent === this.wheelnav.maxPercent) {
        if (this.selected) {
            currentTitle = this.selectedNavTitleMax;
        }
        else {
            if (this.hovered) {
                currentTitle = this.hoverNavTitleMax;
            }
            else {
                currentTitle = this.basicNavTitleMax;
            }
        }
    }
    else {
        if (this.selected) {
            currentTitle = this.selectedNavTitleMin;
        }
        else {
            if (this.hovered) {
                currentTitle = this.hoverNavTitleMin;
            }
            else {
                currentTitle = this.basicNavTitleMin;
            }
        }
    }

    return currentTitle;
};

wheelnavItem.prototype.getItemRotateString = function () {
    return "r," + (this.currentRotateAngle).toString() + "," + this.wheelnav.centerX + "," + this.wheelnav.centerY;
};

wheelnavItem.prototype.getTitleRotateString = function (withTitleRotateAngle) {

    var titleRotate = "";
    titleRotate += this.getItemRotateString();

    if (this.titleRotateAngle !== null && withTitleRotateAngle) {
        titleRotate += ",r," + (this.navAngle + this.titleRotateAngle).toString();
    }
    else {
        titleRotate += ",r," + (-this.currentRotateAngle).toString();
    }

    return titleRotate;
};

wheelnavTitle = function (title, raphael) {
    this.title = title;
    //Calculate relative path
    if (title !== null) {
        if (raphael !== undefined) {
            this.relativePath = raphael.pathToRelative(title);
            var bbox = raphael.pathBBox(this.relativePath);
            this.centerX = bbox.cx;
            this.centerY = bbox.cy;
            this.width = bbox.width;
            this.height = bbox.height;
            this.startX = this.relativePath[0][1];
            this.startY = this.relativePath[0][2];
        }
        this.title = title;
    }
    else {
        this.title = "";
    }

    this.isPathTitle = function (title) {
        if (title !== null &&
            (title.substr(0, 1) === "m" ||
            title.substr(0, 1) === "M") &&
            (title.substr(title.length - 1, 1) === "z" ||
            title.substr(title.length - 1, 1) === "Z") &&
            (title.indexOf(",") > -1 ||
            title.indexOf(" ") > -1)){
            return true;
        }
        else {
            return false;
        }
    };

    this.isImageTitle = function (title) {
        if (title === undefined) { title = this.title;}
        if (title !== null &&
            title.substr(0, 7) === "imgsrc:") {
            return true;
        }
        else {
            return false;
        }
    };

    return this;
};

wheelnavTitle.prototype.getTitlePercentAttr = function (currentX, currentY, titlewidth, titleheight) {

    var transformAttr = {};

    if (this.relativePath !== undefined) {
        var pathCx = currentX + (this.startX - this.centerX);
        var pathCy = currentY + (this.startY - this.centerY);

        this.relativePath[0][1] = pathCx;
        this.relativePath[0][2] = pathCy;

        transformAttr = {
            path: this.relativePath,
            title: this.title
        };
    }
    else {
        if (this.isImageTitle()) {
            transformAttr = {
                x: currentX - (titlewidth / 2),
                y: currentY - (titleheight / 2),
                width: titlewidth,
                height: titleheight,
                title: this.title,
                src: this.title.substr(7, this.title.length)
            };
        }
        else {
            transformAttr = {
                x: currentX,
                y: currentY,
                title: this.title
            };
        }
    }

    return transformAttr;
};

wheelnavTitle.prototype.getTitleSizeTransform = function (titlewidth, titleheight) {

    var transformAttr = "";

    //Calculate path width & height
    if (titlewidth !== null && titleheight !== null) {
        transformAttr = "s";
        if (this.height > this.width) {
            transformAttr += (titlewidth / this.height).toString() + ",";
            transformAttr += (titleheight / this.height).toString();
        }
        else {
            transformAttr += (titlewidth / this.width).toString() + ",";
            transformAttr += (titleheight / this.width).toString();
        }
    }

    return transformAttr;
};

///#source 1 1 /js/source/wheelnav.style.js
/* ======================================================================================= */
/* Default styles and available css classes                                                */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/css3.html          */
/* ======================================================================================= */

wheelnav.prototype.styleWheel = function () {
    if (!this.cssMode) {
        if (this.spreaderPathInAttr === undefined || this.spreaderPathInAttr === null) {
            this.spreaderPathInAttr = { fill: "#f6bc53", stroke: "#f6bc53", "stroke-width": 2, cursor: 'pointer' };
        }
        if (this.spreaderPathOutAttr === undefined || this.spreaderPathOutAttr === null) {
            this.spreaderPathOutAttr = { fill: "#f6bc53", stroke: "#f6bc53", "stroke-width": 2, cursor: 'pointer' };
        }
        if (this.spreaderTitleInAttr === undefined || this.spreaderTitleInAttr === null) {
            this.spreaderTitleInAttr = { fill: "#e98b07", stroke: "#f6bc53", cursor: 'pointer' };
        }
        if (this.spreaderTitleOutAttr === undefined || this.spreaderTitleOutAttr === null) {
            this.spreaderTitleOutAttr = { fill: "#e98b07", stroke: "#f6bc53", cursor: 'pointer' };
        }
        if (this.markerAttr === undefined || this.markerAttr === null) {
            this.markerAttr = { stroke: "#f6bc53", "stroke-width": 3 };
        }
    }
    else {
        this.spreaderPathInAttr = { "class": this.getSpreaderCssClass("in") };
        this.spreaderPathOutAttr = { "class": this.getSpreaderCssClass("out") };
        this.spreaderTitleInAttr = { "class": this.getSpreaderTitleCssClass("in") };
        this.spreaderTitleOutAttr = { "class": this.getSpreaderTitleCssClass("out") };
        this.markerAttr = { "class": this.getMarkerCssClass() };
    }
};

wheelnavItem.prototype.styleNavItem = function () {
    if (!this.wheelnav.cssMode) {
        this.slicePathAttr = { stroke: "#333", "stroke-width": 0, cursor: 'pointer', "fill-opacity": 1 };
        this.sliceHoverAttr = { stroke: "#222", "stroke-width": 0, cursor: 'pointer', "fill-opacity": 0.77 };
        this.sliceSelectedAttr = { stroke: "#111", "stroke-width": 0, cursor: 'default', "fill-opacity": 1 };

        this.titleAttr = { font: this.titleFont, fill: "#333", stroke: "none", cursor: 'pointer' };
        this.titleHoverAttr = { font: this.titleFont, fill: "#222", cursor: 'pointer', stroke: "none" };
        this.titleSelectedAttr = { font: this.titleFont, fill: "#fff", cursor: 'default' };

        this.linePathAttr = { stroke: "#444", "stroke-width": 1, cursor: 'pointer' };
        this.lineHoverAttr = { stroke: "#222", "stroke-width": 2, cursor: 'pointer' };
        this.lineSelectedAttr = { stroke: "#444", "stroke-width": 1, cursor: 'default' };
    }
    else {
        this.slicePathAttr = { "class": this.wheelnav.getSliceCssClass(this.wheelItemIndex, "basic") };
        this.sliceHoverAttr = { "class": this.wheelnav.getSliceCssClass(this.wheelItemIndex, "hover") };
        this.sliceSelectedAttr = { "class": this.wheelnav.getSliceCssClass(this.wheelItemIndex, "selected") };

        this.titleAttr = { "class": this.wheelnav.getTitleCssClass(this.wheelItemIndex, "basic") };
        this.titleHoverAttr = { "class": this.wheelnav.getTitleCssClass(this.wheelItemIndex, "hover") };
        this.titleSelectedAttr = { "class": this.wheelnav.getTitleCssClass(this.wheelItemIndex, "selected") };

        this.linePathAttr = { "class": this.wheelnav.getLineCssClass(this.wheelItemIndex, "basic") };
        this.lineHoverAttr = { "class": this.wheelnav.getLineCssClass(this.wheelItemIndex, "hover") };
        this.lineSelectedAttr = { "class": this.wheelnav.getLineCssClass(this.wheelItemIndex, "selected") };
    }

    this.sliceClickablePathAttr = { fill: "#FFF", stroke: "#FFF", "stroke-width": 0, cursor: 'pointer', "fill-opacity": 0.01 };
    this.sliceClickableHoverAttr = { stroke: "#FFF", "stroke-width": 0, cursor: 'pointer' };
    this.sliceClickableSelectedAttr = { stroke: "#FFF", "stroke-width": 0, cursor: 'default' };
}

wheelnav.prototype.getSliceCssClass = function (index, subclass) {
    return "wheelnav-" + this.holderId + "-slice-" + subclass + "-" + index;
};
wheelnav.prototype.getTitleCssClass = function (index, subclass) {
    return "wheelnav-" + this.holderId + "-title-" + subclass + "-" + index;
};
wheelnav.prototype.getLineCssClass = function (index, subclass) {
    return "wheelnav-" + this.holderId + "-line-" + subclass + "-" + index;
};
wheelnav.prototype.getSpreaderCssClass = function (state) {
    return "wheelnav-" + this.holderId + "-spreader-" + state;
};
wheelnav.prototype.getSpreaderTitleCssClass = function (state) {
    return "wheelnav-" + this.holderId + "-spreadertitle-" + state;
};
wheelnav.prototype.getMarkerCssClass = function () {
    return "wheelnav-" + this.holderId + "-marker";
};

///#source 1 1 /js/source/wheelnav.pathHelper.js
/* ======================================================================================= */
/* Slice path helper functions                                                                  */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/slicePath.html     */
/* ======================================================================================= */

var pathHelper = function () {

    this.sliceRadius = 0;
    this.startAngle = 0;
    this.middleAngle = 0;
    this.endAngle = 0;
    this.sliceAngle = 0;
    this.startTheta = 0;
    this.middleTheta = 0;
    this.endTheta = 0;
    this.titlePosX = 0;
    this.titlePosY = 0;
    this.titleRadius = 0;
    this.titleTheta = 0;
    this.titleAngle = 0;
    this.custom = null;
    this.centerX = 0;
    this.centerY = 0;
    this.wheelRadius = 0;
    this.itemIndex = 0;
    this.navItemCount = 0;
    this.navAngle = 0;
    this.titleCurvedClockwise = false;

    this.setBaseValue = function (percent, custom) {

        if (custom === null) {
            custom = new slicePathCustomization();
        }
        else {
            this.custom = custom;
        }

        this.sliceRadius = this.wheelRadius * percent * 0.9;

        this.middleAngle = this.startAngle + this.sliceAngle / 2;
        this.endAngle = this.startAngle + this.sliceAngle;

        this.startTheta = this.getTheta(this.startAngle);
        this.middleTheta = this.getTheta(this.middleAngle);
        this.endTheta = this.getTheta(this.endAngle);

        if (custom !== null) {
            if (custom.titleRadiusPercent !== null) {
                this.titleRadius = this.sliceRadius * custom.titleRadiusPercent;
            }
            if (custom.titleSliceAnglePercent !== null) {
                this.titleTheta = this.getTheta(this.startAngle + this.sliceAngle * custom.titleSliceAnglePercent);
                this.titleAngle = this.startAngle + this.sliceAngle * custom.titleSliceAnglePercent;
            }
        }
        else {
            this.titleRadius = this.sliceRadius * 0.5;
            this.titleTheta = this.middleTheta;
            this.titleAngle = this.middleAngle;
        }

        this.setTitlePos();
    };

    this.setTitlePos = function () {
        this.titlePosX = this.titleRadius * Math.cos(this.titleTheta) + this.centerX;
        this.titlePosY = this.titleRadius * Math.sin(this.titleTheta) + this.centerY;
    };

    this.getX = function (angle, length) {
        return length * Math.cos(this.getTheta(angle)) + this.centerX;
    };

    this.getY = function (angle, length) {
        return length * Math.sin(this.getTheta(angle)) + this.centerY;
    };

    this.MoveTo = function (angle, length) {
        return ["M", this.getX(angle, length), this.getY(angle, length)];
    };

    this.MoveToXY = function (posX, posY) {
        return ["M", posX, posY];
    };

    this.MoveToCenter = function () {
        return ["M", this.centerX, this.centerY];
    };

    this.LineTo = function (angle, length, angleY, lengthY) {
        if (angleY === undefined) { angleY = angle; }
        if (lengthY === undefined) { lengthY = length; }
        return ["L", this.getX(angle, length), this.getY(angleY, lengthY)];
    };

    this.LineToXY = function (posX, posY) {
        return ["L", posX, posY];
    };

    this.ArcTo = function (arcRadius, angle, length) {
        return ["A", arcRadius, arcRadius, 0, 0, 1, this.getX(angle, length), this.getY(angle, length)];
    };

    this.ArcToXY = function (arcRadius, posX, posY) {
        return ["A", arcRadius, arcRadius, 0, 0, 1, posX, posY];
    };

    this.ArcBackTo = function (arcRadius, angle, length) {
        return ["A", arcRadius, arcRadius, 0, 0, 0, this.getX(angle, length), this.getY(angle, length)];
    };

    this.ArcBackToXY = function (arcRadius, posX, posY) {
        return ["A", arcRadius, arcRadius, 0, 0, 0, posX, posY];
    };

    this.CubicBezierTo = function (assist1Angle, assist1Length, assist2Angle, assist2Length, endAngle, endLength) {
        return ["C", this.getX(assist1Angle, assist1Length), this.getY(assist1Angle, assist1Length), this.getX(assist2Angle, assist2Length), this.getY(assist2Angle, assist2Length), this.getX(endAngle, endLength), this.getY(endAngle, endLength)];
    };
   
    this.CubicBezierToXY = function (assist1X, assist1Y, assist2X, assist2Y, endX, endY) {
        return ["C", assist1X, assist1Y, assist2X, assist2Y, endX, endY];
    };

    this.StartSpreader = function (spreaderPathString, angle, length) {
        if (this.endAngle - this.startAngle === 360) {
            spreaderPathString.push(this.MoveTo(angle, length));
        }
        else {
            spreaderPathString.push(this.MoveToCenter());
            spreaderPathString.push(this.LineTo(angle, length));
        }
    };

    this.getCurvedTitlePathString = function () {
        var startAngle = this.titleAngle - (this.sliceAngle / 2);
        var endAngle = this.titleAngle + (this.sliceAngle / 2);
        var pathString = [];
        if (this.titleCurvedClockwise) {
            pathString.push(this.MoveTo(startAngle, this.titleRadius));
            pathString.push(this.ArcTo(this.titleRadius, endAngle, this.titleRadius));
        }
        else {
            pathString.push(this.MoveTo(endAngle, this.titleRadius));
            pathString.push(this.ArcBackTo(this.titleRadius, startAngle, this.titleRadius));
        }
        return pathString;
    };

    this.Close = function () {
        return ["z"];
    };

    this.getTheta = function (angle) {
        return (angle % 360) * Math.PI / 180;
    };

    // Converts from degrees to radians.
    this.radians = function (degrees) {
        return degrees * Math.PI / 180;
    };

    // Converts from radians to degrees.
    this.degrees = function (radians) {
        return radians * 180 / Math.PI;
    };

    return this;
};

/* Custom properties
    - titleRadiusPercent
    - titleSliceAnglePercent
*/
var slicePathCustomization = function () {

    this.titleRadiusPercent = 0.5;
    this.titleSliceAnglePercent = 0.5;

    return this;
};

/* Custom properties
    - titleRadiusPercent
    - titleSliceAnglePercent
    - spreaderPercent
*/
var spreaderPathCustomization = function () {

    this.titleRadiusPercent = 0;
    this.titleSliceAnglePercent = 0.5;
    this.spreaderPercent = 1;

    return this;
};

/* Custom properties
    - titleRadiusPercent
    - titleSliceAnglePercent
    - markerPercent
*/
var markerPathCustomization = function () {

    this.titleRadiusPercent = 1;
    this.titleSliceAnglePercent = 0.5;
    this.markerPercent = 1.05;

    return this;
};


///#source 1 1 /js/source/slicePath/wheelnav.slicePath.js
///#source 1 1 /js/source/slicePath/wheelnav.slicePathStart.js
/* ======================================================================================= */
/* Slice path definitions.                                                                 */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/slicePath.html     */
/* ======================================================================================= */

slicePath = function () {

    this.NullSlice = function (helper, percent, custom) {

        helper.setBaseValue(percent, custom);
        titlePathString = helper.getCurvedTitlePathString();

        return {
            slicePathString: "",
            linePathString: "",
            titlePosX: helper.titlePosX,
            titlePosY: helper.titlePosY,
            titlePathString: titlePathString
        };
    };

    this.NullInitSlice = function (helper, percent, custom) {

        helper.setBaseValue(percent, custom);

        slicePathString = [helper.MoveToCenter(),
                 helper.Close()];
        titlePathString = helper.getCurvedTitlePathString();

        return {
            slicePathString: slicePathString,
            linePathString: slicePathString,
            titlePosX: helper.centerX,
            titlePosY: helper.centerY,
            titlePathString: titlePathString
        };
    };

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Pie.js

this.PieSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.6;
    custom.arcBaseRadiusPercent = 1;
    custom.arcRadiusPercent = 1;
    custom.startRadiusPercent = 0;
    return custom;
};

this.PieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    var arcBaseRadius = helper.sliceRadius * custom.arcBaseRadiusPercent;
    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;
    
    slicePathString = [];
    slicePathString.push(helper.MoveTo(helper.middleAngle, custom.startRadiusPercent * helper.sliceRadius));
    slicePathString.push(helper.LineTo(helper.startAngle, arcBaseRadius));
    if (helper.sliceAngle > 180) {
        slicePathString.push(helper.ArcTo(arcRadius, helper.middleAngle, arcBaseRadius));
    }
    slicePathString.push(helper.ArcTo(arcRadius, helper.endAngle, arcBaseRadius));
    slicePathString.push(helper.Close());

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.FlowerSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieSliceCustomization();
        custom.titleRadiusPercent = 0.5;
        custom.arcBaseRadiusPercent = 0.65;
        custom.arcRadiusPercent = 0.14;
    }

    var slicePath = PieSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.PieArrow.js

this.PieArrowSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.6;
    custom.arrowRadiusPercent = 1.1;

    return custom;
};

this.PieArrowSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieArrowSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;
    
    arrowAngleStart = helper.startAngle + helper.sliceAngle * 0.45;
    arrowAngleEnd = helper.startAngle + helper.sliceAngle * 0.55;

    var arrowRadius = r * custom.arrowRadiusPercent;

    slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.ArcTo(r, arrowAngleStart, r),
                 helper.LineTo(helper.middleAngle, arrowRadius),
                 helper.LineTo(arrowAngleEnd, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.PieArrowBasePieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieArrowSliceCustomization();
    }

    custom.arrowRadiusPercent = 1;
    var slicePath = PieArrowSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Donut.js

this.DonutSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.minRadiusPercent = 0.37;
    custom.maxRadiusPercent = 0.9;

    return custom;
};

this.DonutSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = DonutSliceCustomization();
    }

    maxRadius = helper.wheelRadius * percent * custom.maxRadiusPercent;
    minRadius = helper.wheelRadius * percent * custom.minRadiusPercent;

    helper.setBaseValue(percent, custom);

    helper.titleRadius = (maxRadius + minRadius) / 2;
    helper.setTitlePos();

    slicePathString = [helper.MoveTo(helper.startAngle, minRadius),
                 helper.LineTo(helper.startAngle, maxRadius),
                 helper.ArcTo(maxRadius, helper.middleAngle, maxRadius),
                 helper.ArcTo(maxRadius, helper.endAngle, maxRadius),
                 helper.LineTo(helper.endAngle, minRadius),
                 helper.ArcBackTo(minRadius, helper.middleAngle, minRadius),
                 helper.ArcBackTo(minRadius, helper.startAngle, minRadius),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Cog.js

this.CogSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.55;
    custom.isBasePieSlice = false;

    return custom;
};

this.CogSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = CogSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;
    rbase = helper.wheelRadius * percent * 0.83;

    percentAngle0625 = helper.startAngle + helper.sliceAngle * 0.0625;
    percentAngle1250 = helper.startAngle + helper.sliceAngle * 0.125;
    percentAngle1875 = helper.startAngle + helper.sliceAngle * 0.1875;
    percentAngle2500 = helper.startAngle + helper.sliceAngle * 0.25;
    percentAngle3125 = helper.startAngle + helper.sliceAngle * 0.3125;
    percentAngle3750 = helper.startAngle + helper.sliceAngle * 0.375;
    percentAngle4375 = helper.startAngle + helper.sliceAngle * 0.4375;
    percentAngle5000 = helper.startAngle + helper.sliceAngle * 0.5;
    percentAngle5625 = helper.startAngle + helper.sliceAngle * 0.5625;
    percentAngle6250 = helper.startAngle + helper.sliceAngle * 0.625;
    percentAngle6875 = helper.startAngle + helper.sliceAngle * 0.6875;
    percentAngle7500 = helper.startAngle + helper.sliceAngle * 0.75;
    percentAngle8125 = helper.startAngle + helper.sliceAngle * 0.8125;
    percentAngle8750 = helper.startAngle + helper.sliceAngle * 0.875;
    percentAngle9375 = helper.startAngle + helper.sliceAngle * 0.9375;
    percentAngle9687 = helper.startAngle + helper.sliceAngle * 0.96875;

    if (custom.isBasePieSlice) {
        r = rbase;
        slicePathString = [helper.MoveToCenter(),
            helper.LineTo(helper.startAngle, r),
            helper.ArcTo(r, percentAngle0625, r),
            helper.ArcTo(r, percentAngle1250, r),
            helper.ArcTo(r, percentAngle1875, r),
            helper.ArcTo(r, percentAngle2500, r),
            helper.ArcTo(r, percentAngle3125, r),
            helper.ArcTo(r, percentAngle3750, r),
            helper.ArcTo(r, percentAngle4375, r),
            helper.ArcTo(r, percentAngle5000, r),
            helper.ArcTo(r, percentAngle5625, r),
            helper.ArcTo(r, percentAngle6250, r),
            helper.ArcTo(r, percentAngle6875, r),
            helper.ArcTo(r, percentAngle7500, r),
            helper.ArcTo(r, percentAngle8125, r),
            helper.ArcTo(r, percentAngle8750, r),
            helper.ArcTo(r, percentAngle9375, r),
            helper.ArcTo(r, percentAngle9687, r),
            helper.ArcTo(r, helper.endAngle, r),
            helper.Close()];
    }
    else {
        slicePathString = [helper.MoveToCenter(),
            helper.LineTo(helper.startAngle, r),
            helper.ArcTo(r, percentAngle0625, r),
            helper.LineTo(percentAngle0625, rbase),
            helper.ArcTo(rbase, percentAngle1875, rbase),
            helper.LineTo(percentAngle1875, r),
            helper.ArcTo(r, percentAngle3125, r),
            helper.LineTo(percentAngle3125, rbase),
            helper.ArcTo(rbase, percentAngle4375, rbase),
            helper.LineTo(percentAngle4375, r),
            helper.ArcTo(r, percentAngle5625, r),
            helper.LineTo(percentAngle5625, rbase),
            helper.ArcTo(rbase, percentAngle6875, rbase),
            helper.LineTo(percentAngle6875, r),
            helper.ArcTo(r, percentAngle8125, r),
            helper.LineTo(percentAngle8125, rbase),
            helper.ArcTo(rbase, percentAngle9375, rbase),
            helper.LineTo(percentAngle9375, r),
            helper.ArcTo(r, helper.endAngle, r),
            helper.Close()];
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.CogBasePieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = CogSliceCustomization();
    }

    custom.isBasePieSlice = true;

    var slicePath = CogSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Star.js

this.StarSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.44;
    custom.minRadiusPercent = 0.5;
    custom.isBasePieSlice = false;

    return custom;
};

this.StarSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = StarSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.wheelRadius * percent;
    rbase = r * custom.minRadiusPercent;

    if (custom.isBasePieSlice) {
        r = helper.sliceRadius;
        slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.Close()];
    }
    else {
        slicePathString = [helper.MoveToCenter(),
                     helper.LineTo(helper.startAngle, rbase),
                     helper.LineTo(helper.middleAngle, r),
                     helper.LineTo(helper.endAngle, rbase),
                     helper.Close()];
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.StarBasePieSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = StarSliceCustomization();
    }

    custom.titleRadiusPercent = 0.6;
    custom.isBasePieSlice = true;

    var slicePath = StarSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Menu.js

this.MenuSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.menuRadius = 35;
    custom.titleRadiusPercent = 0.63;
    custom.isSelectedLine = false;
    custom.lineBaseRadiusPercent = 0;

    return custom;
};

this.MenuSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = MenuSliceCustomization();
    }

    helper.setBaseValue(percent, custom);
    x = helper.centerX;
    y = helper.centerY;

    var r = helper.wheelRadius * percent;
    helper.titleRadius = r * custom.titleRadiusPercent;
    helper.setTitlePos();

    var menuRadius = percent * custom.menuRadius;

    if (percent <= 0.05) { menuRadius = 10; }

    middleTheta = helper.middleTheta;

    slicePathString = [["M", helper.titlePosX - (menuRadius * Math.cos(middleTheta)), helper.titlePosY - (menuRadius * Math.sin(middleTheta))],
                ["A", menuRadius, menuRadius, 0, 0, 1, helper.titlePosX + (menuRadius * Math.cos(middleTheta)), helper.titlePosY + (menuRadius * Math.sin(middleTheta))],
                ["A", menuRadius, menuRadius, 0, 0, 1, helper.titlePosX - (menuRadius * Math.cos(middleTheta)), helper.titlePosY - (menuRadius * Math.sin(middleTheta))],
                ["z"]];

    if (percent <= 0.05) {
        linePathString = [["M", x, y],
                ["A", 1, 1, 0, 0, 1, x + 1, y + 1]];
    }
    else {
        if (!custom.isSelectedLine) {
            linePathString = [helper.MoveTo(helper.middleAngle, custom.lineBaseRadiusPercent * r),
                              helper.ArcTo(r / 2, helper.middleAngle, helper.titleRadius - menuRadius)];
        }
        else {
            linePathString = [helper.MoveTo(helper.middleAngle, custom.lineBaseRadiusPercent * r),
                              helper.ArcTo(r / 3, helper.middleAngle, helper.titleRadius - menuRadius)];
        }
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

this.MenuSliceSelectedLine = function (helper, percent, custom) {

    if (custom === null) {
        custom = MenuSliceCustomization();
    }

    custom.isSelectedLine = true;

    var slicePath = MenuSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: slicePath.linePathString,
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};

this.MenuSliceWithoutLine = function (helper, percent, custom) {

    var slicePath = MenuSlice(helper, percent, custom);

    return {
        slicePathString: slicePath.slicePathString,
        linePathString: "",
        titlePosX: slicePath.titlePosX,
        titlePosY: slicePath.titlePosY,
        titlePathString: slicePath.titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Line.js

this.LineSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;

    if (helper.sliceAngle > 60 &&
        helper.sliceAngle < 180) {
        helper.titleRadius = r * ((180 / helper.sliceAngle) / 5);
        helper.setTitlePos();
    }
    else {
        helper.titleRadius = r * 0.55;
        helper.setTitlePos();
    }

    if (helper.sliceAngle < 180) {
        slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.LineTo(helper.endAngle, r),
                 helper.Close()];
    }
    else {
        if (helper.startAngle === 180 ||
            helper.startAngle === 0 ||
            helper.startAngle === -180 ||
            helper.startAngle === 360) {
            slicePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r),
                 helper.LineTo(helper.startAngle, r, helper.middleAngle, r),
                 helper.LineTo(helper.endAngle, r, helper.middleAngle, r),
                 helper.LineTo(helper.endAngle, r),
                 helper.Close()];
        }
        else {
            slicePathString = [helper.MoveToCenter(),
             helper.LineTo(helper.startAngle, r),
             helper.LineTo(helper.middleAngle, r, helper.startAngle, r),
             helper.LineTo(helper.middleAngle, r, helper.endAngle, r),
             helper.LineTo(helper.endAngle, r),
             helper.Close()];
        }
    }

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Eye.js

this.EyeSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.68;

    return custom;
};

this.EyeSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = EyeSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    r = helper.wheelRadius * percent * 0.7;

    if (percent === 0) {
        r = 0.01;
    }

    startAngle = helper.startAngle;
    endAngle = helper.endAngle;

    if (helper.sliceAngle === 180) {
        startAngle = helper.startAngle + helper.sliceAngle / 4;
        endAngle = helper.startAngle + helper.sliceAngle - helper.sliceAngle / 4;
    }

    slicePathString = [helper.MoveTo(endAngle, r),
                 helper.ArcTo(r, startAngle, r),
                 helper.ArcTo(r, endAngle, r),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Wheel.js

this.WheelSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);
    x = helper.centerX;
    y = helper.centerY;

    r = helper.sliceRadius;

    startTheta = helper.startTheta;
    middleTheta = helper.middleTheta;
    endTheta = helper.endTheta;

    var innerRadiusPercent;
    var startendRadiusPercent;

    if (helper.sliceAngle < 120) {
        helper.titleRadius = r * 0.57;
        innerRadiusPercent = 0.9;
        middleRadiusPercent = 0.87;
        startendRadiusPercent = 0.87;
    }
    else if (helper.sliceAngle < 180) {
        helper.titleRadius = r * 0.52;
        innerRadiusPercent = 0.91;
        middleRadiusPercent = 0.87;
        startendRadiusPercent = 0.87;
    }
    else {
        helper.titleRadius = r * 0.45;
        innerRadiusPercent = 0.873;
        middleRadiusPercent = 0.87;
        startendRadiusPercent = 0.94;
    }

    slicePathString = [helper.MoveTo(helper.middleAngle, r * 0.07),
                 ["L", (r * 0.07) * Math.cos(middleTheta) + (r * startendRadiusPercent) * Math.cos(startTheta) + x, (r * 0.07) * Math.sin(middleTheta) + (r * startendRadiusPercent) * Math.sin(startTheta) + y],
                 ["A", (r * innerRadiusPercent), (r * innerRadiusPercent), 0, 0, 1, (r * 0.07) * Math.cos(middleTheta) + (r * middleRadiusPercent) * Math.cos(middleTheta) + x, (r * 0.07) * Math.sin(middleTheta) + (r * middleRadiusPercent) * Math.sin(middleTheta) + y],
                 ["A", (r * innerRadiusPercent), (r * innerRadiusPercent), 0, 0, 1, (r * 0.07) * Math.cos(middleTheta) + (r * startendRadiusPercent) * Math.cos(endTheta) + x, (r * 0.07) * Math.sin(middleTheta) + (r * startendRadiusPercent) * Math.sin(endTheta) + y],
                 helper.Close()];

    linePathString = [helper.MoveTo(helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.ArcBackTo(r, helper.middleAngle, r),
                 helper.ArcBackTo(r, helper.startAngle, r)];

    helper.setTitlePos();

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.OuterStroke.js

this.OuterStrokeSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);
    x = helper.centerX;
    y = helper.centerY;

    r = helper.sliceRadius;
    innerRadius = r / 4;

    if (helper.sliceAngle < 120) { helper.titleRadius = r * 0.57; }
    else if (helper.sliceAngle < 180) { helper.titleRadius = r * 0.52; }
    else { helper.titleRadius = r * 0.45; }

    linePathString = [helper.MoveTo(helper.startAngle, innerRadius),
                 helper.LineTo(helper.startAngle, r),
                 helper.MoveTo(helper.endAngle, innerRadius),
                 helper.LineTo(helper.endAngle, r)];

    slicePathString = [helper.MoveTo(helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.ArcBackTo(r, helper.middleAngle, r),
                 helper.ArcBackTo(r, helper.startAngle, r),
                 helper.MoveTo(helper.startAngle, innerRadius),
                 helper.ArcTo(innerRadius, helper.middleAngle, innerRadius),
                 helper.ArcTo(innerRadius, helper.endAngle, innerRadius),
                 helper.ArcBackTo(innerRadius, helper.middleAngle, innerRadius),
                 helper.ArcBackTo(innerRadius, helper.startAngle, innerRadius)];

    helper.setTitlePos();

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Tab.js

this.TabSlice = function (helper, percent, custom) {

    var rOriginal = helper.wheelRadius * 0.9;
    var navItemCount = 360 / helper.sliceAngle;
    var itemSize = 2 * rOriginal / navItemCount;

    x = helper.centerX;
    y = helper.centerY;
    itemIndex = helper.itemIndex;

    titlePosX = x;
    titlePosY = itemIndex * itemSize + y + (itemSize / 2) - rOriginal;

    slicePathString = [];
    slicePathString.push(helper.MoveToXY(x - (itemSize / 2), itemIndex * itemSize + y - rOriginal));
    slicePathString.push(helper.LineToXY((itemSize / 2) + x, itemIndex * itemSize + y - rOriginal));
    slicePathString.push(helper.LineToXY((itemSize / 2) + x, (itemIndex + 1) * itemSize + y - rOriginal));
    slicePathString.push(helper.LineToXY(x - (itemSize / 2), (itemIndex + 1) * itemSize + y - rOriginal));
    slicePathString.push(helper.Close());

    titlePathString = [];
    titlePathString.push(helper.MoveToXY(x - (itemSize / 2), (itemIndex + 1) * itemSize + y - rOriginal));
    titlePathString.push(helper.ArcToXY(itemSize * 2, (itemSize / 2) + x, itemIndex * itemSize + y - rOriginal));

    return {
        slicePathString: slicePathString,
        linePathString: "",
        titlePosX: titlePosX,
        titlePosY: titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.YinYang.js

this.YinYangSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;

    slicePathString = [helper.MoveToCenter(),
                 helper.ArcTo(r / 2, helper.startAngle, r),
                 helper.ArcTo(r, helper.middleAngle, r),
                 helper.ArcTo(r, helper.endAngle, r),
                 helper.ArcBackTo(r / 2, 0, 0),
                 helper.Close()];

    titlePosX = helper.getX(helper.startAngle, r / 2);
    titlePosY = helper.getY(helper.startAngle, r / 2);

    titlePathString = [helper.MoveToCenter(),
                 helper.ArcTo(r / 4, helper.startAngle + helper.sliceAngle * 0.2, r * 0.8)];

    return {
        slicePathString: slicePathString,
        linePathString: slicePathString,
        titlePosX: titlePosX,
        titlePosY: titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Web.js

this.WebSlice = function (helper, percent, custom) {

    helper.setBaseValue(percent, custom);

    r = helper.sliceRadius;

    helper.titleRadius = r * 0.55;
    helper.setTitlePos();

    linePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, r * 1.1),
                 helper.MoveToCenter(),
                 helper.LineTo(helper.endAngle, r * 1.1),
                 helper.MoveTo(helper.startAngle, r * 0.15),
                 helper.LineTo(helper.endAngle, r * 0.15),
                 helper.MoveTo(helper.startAngle, r * 0.35),
                 helper.LineTo(helper.endAngle, r * 0.35),
                 helper.MoveTo(helper.startAngle, r * 0.55),
                 helper.LineTo(helper.endAngle, r * 0.55),
                 helper.MoveTo(helper.startAngle, r * 0.75),
                 helper.LineTo(helper.endAngle, r * 0.75),
                 helper.MoveTo(helper.startAngle, r * 0.95),
                 helper.LineTo(helper.endAngle, r * 0.95),
                 helper.Close()];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: "",
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Winter.js

this.WinterSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.85;
    custom.arcRadiusPercent = 1;
    return custom;
};

this.WinterSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = WinterSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    sliceAngle = helper.sliceAngle;

    parallelAngle = helper.startAngle + sliceAngle / 4;
    parallelAngle2 = helper.startAngle + ((sliceAngle / 4) * 3);
    borderAngle1 = helper.startAngle + (sliceAngle / 200);
    borderAngle2 = helper.startAngle + (sliceAngle / 2) - (sliceAngle / 200);
    borderAngle3 = helper.startAngle + (sliceAngle / 2) + (sliceAngle / 200);
    borderAngle4 = helper.startAngle + sliceAngle - (sliceAngle / 200);

    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;

    slicePathString = [helper.MoveToCenter(),
                 helper.MoveTo(parallelAngle, arcRadius / 100),
                 helper.LineTo(borderAngle1, arcRadius / 2),
                 helper.LineTo(parallelAngle, arcRadius - (arcRadius / 100)),
                 helper.LineTo(borderAngle2, arcRadius / 2),
                 helper.LineTo(parallelAngle, arcRadius / 100),
                 helper.MoveTo(parallelAngle2, arcRadius / 100),
                 helper.LineTo(borderAngle4, arcRadius / 2),
                 helper.LineTo(parallelAngle2, arcRadius - (arcRadius / 100)),
                 helper.LineTo(borderAngle3, arcRadius / 2),
                 helper.LineTo(parallelAngle2, arcRadius / 100),
                 helper.Close()];

    linePathString = [helper.MoveTo(parallelAngle, arcRadius),
                 helper.LineTo(borderAngle2, arcRadius / 2),
                 helper.MoveTo(borderAngle3, arcRadius / 2),
                 helper.LineTo(parallelAngle2, arcRadius)];

    titlePathString = helper.getCurvedTitlePathString();

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePath.Tutorial.js

this.TutorialSliceCustomization = function () {

    var custom = new slicePathCustomization();
    custom.titleRadiusPercent = 0.6;
    custom.isMoveTo = false;
    custom.isLineTo = false;
    custom.isArcTo = false;
    custom.isArcBackTo = false;
    return custom;
};

this.TutorialSlice = function (helper, percent, custom) {

    if (custom === null) {
        custom = TutorialSliceCustomization();
    }

    helper.setBaseValue(percent, custom);

    slicePathString = [];
    titlePathString = [];

    slicePathString.push(helper.MoveToCenter());
    titlePathRadius1 = helper.titleRadius;
    titlePathRadius2 = helper.titleRadius;
    titlePathEndangle = helper.startAngle;
    titlePathStartRadius = 0;

    if (custom.isMoveTo === true) {
        slicePathString.push(helper.MoveTo(helper.middleAngle, helper.sliceRadius / 4));
        titlePathRadius1 *= 1.05;
        titlePathRadius2 *= 0.95;
        titlePathStartRadius += helper.sliceRadius / 16;
        titlePathEndangle = helper.startAngle + (helper.sliceAngle / 8);
    }
    if (custom.isLineTo) {
        slicePathString.push(helper.LineTo(helper.startAngle, helper.sliceRadius));
        titlePathRadius1 *= 1.1;
        titlePathRadius2 *= 0.9;
        titlePathStartRadius += helper.sliceRadius / 16;
        titlePathEndangle = helper.startAngle + (helper.sliceAngle / 4);
    }
    if (custom.isArcTo) {
        slicePathString.push(helper.ArcTo(helper.sliceRadius, helper.middleAngle, helper.sliceRadius));
        titlePathRadius1 *= 1.2;
        titlePathRadius2 *= 0.8;
        titlePathStartRadius += helper.sliceRadius / 8;
        titlePathEndangle = helper.middleAngle - (helper.sliceAngle / 8);
    }
    if (custom.isArcBackTo) {
        slicePathString.push(helper.ArcBackTo(helper.sliceRadius, helper.endAngle, helper.sliceRadius));
        titlePathRadius1 *= 1.3;
        titlePathRadius2 *= 0.7;
        titlePathStartRadius += helper.sliceRadius / 8;
        titlePathEndangle = helper.endAngle;
    }
    slicePathString.push(helper.Close());

    titlePathString.push(helper.MoveTo(helper.startAngle, titlePathStartRadius));
    titlePathString.push(helper.CubicBezierTo(helper.middleAngle - (helper.sliceAngle / 8), titlePathRadius1, helper.middleAngle + (helper.sliceAngle / 8), titlePathRadius2, titlePathEndangle, helper.sliceRadius));

    linePathString = [helper.MoveToCenter(),
                 helper.LineTo(helper.startAngle, helper.sliceRadius),
                 helper.ArcTo(helper.sliceRadius, helper.middleAngle, helper.sliceRadius),
                 helper.ArcTo(helper.sliceRadius, helper.endAngle, helper.sliceRadius),
                 helper.Close()];

    return {
        slicePathString: slicePathString,
        linePathString: linePathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY,
        titlePathString: titlePathString
    };
};

///#source 1 1 /js/source/slicePath/wheelnav.slicePathEnd.js

    return this;
};




///#source 1 1 /js/source/wheelnav.sliceTransform.js
/* ======================================================================================== */
/* Slice transform definitions                                                              */
/* ======================================================================================== */
/* ======================================================================================== */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/sliceTransform.html */
/* ======================================================================================== */


var sliceTransform = function () {

    this.startAngle = 0;
    this.startTheta = 0;
    this.middleTheta = 0;
    this.endTheta = 0;

    var setBaseValue = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {
        this.startAngle = baseAngle;
        this.startTheta = getTheta(startAngle);
        this.middleTheta = getTheta(startAngle + sliceAngle / 2);
        this.endTheta = getTheta(startAngle + sliceAngle);
    };

    var getTheta = function (angle) {
        return (angle % 360) * Math.PI / 180;
    };

    this.NullTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {
        return {
            sliceTransformString: "",
            lineTransformString: "",
            titleTransformString: ""
        };
    };

    this.MoveMiddleTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        setBaseValue(x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex);
        var sliceTransformString = "t" + (rOriginal / 10 * Math.cos(middleTheta)).toString() + "," + (rOriginal / 10 * Math.sin(middleTheta)).toString();

        var baseTheta;
        if (titleRotateAngle !== null) {
            baseTheta = getTheta(-titleRotateAngle);
        }
        else {
            var wheelBaseAngle = baseAngle - (itemIndex * sliceAngle);
            baseTheta = getTheta(wheelBaseAngle + sliceAngle / 2);
        }

        var titleTransformString = "s1,r0,t" + (rOriginal / 10 * Math.cos(baseTheta)).toString() + "," + (rOriginal / 10 * Math.sin(baseTheta)).toString();

        return {
            sliceTransformString: sliceTransformString,
            lineTransformString: sliceTransformString,
            titleTransformString: titleTransformString
        };
    };

    this.RotateTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        var sliceTransformString = "s1,r360";

        return {
            sliceTransformString: sliceTransformString,
            lineTransformString: sliceTransformString,
            titleTransformString: sliceTransformString
        };
    };

    this.RotateHalfTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        var sliceTransformString = "s1,r90";

        return {
            sliceTransformString: sliceTransformString,
            lineTransformString: sliceTransformString,
            titleTransformString: sliceTransformString
        };
    };

    this.RotateTitleTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        var titleTransformString = "s1,r360";

        return {
            sliceTransformString: "",
            lineTransformString: "",
            titleTransformString: titleTransformString
        };
    };

    this.ScaleTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        var sliceTransformString = "s1.2";

        return {
            sliceTransformString: sliceTransformString,
            lineTransformString: "",
            titleTransformString: sliceTransformString
        };
    };

    this.ScaleTitleTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        return {
            sliceTransformString: "",
            lineTransformString: "",
            titleTransformString: "s1.3"
        };
    };

    this.RotateScaleTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        var sliceTransformString = "r360,s1.3";

        return {
            sliceTransformString: sliceTransformString,
            lineTransformString: "",
            titleTransformString: sliceTransformString
        };
    };

    this.CustomTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        var sliceTransformString = custom.scaleString + "," + custom.rotateString;

        return {
            sliceTransformString: sliceTransformString,
            lineTransformString: sliceTransformString,
            titleTransformString: sliceTransformString
        };
    };

    this.CustomTitleTransform = function (x, y, rOriginal, baseAngle, sliceAngle, titleRotateAngle, itemIndex, custom) {

        var titleTransformString = custom.scaleString + "," + custom.rotateString;

        return {
            sliceTransformString: "",
            lineTransformString: "",
            titleTransformString: titleTransformString
        };
    };

    return this;
};

/* Custom properties
    - scaleString
    - rotateString
*/
var sliceTransformCustomization = function () {

    this.scaleString = "s1";
    this.rotateString = "r0";

    return this;
};




///#source 1 1 /js/source/spreader/wheelnav.spreader.js
///#source 1 1 /js/source/spreader/wheelnav.spreader.core.js
/* ======================================================================================= */
/* Spreader of wheel                                                                       */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/spreader.html      */
/* ======================================================================================= */

spreader = function (wheelnav) {

    this.wheelnav = wheelnav;
    if (this.wheelnav.spreaderEnable) {

        this.spreaderHelper = new pathHelper();
        this.spreaderHelper.centerX = this.wheelnav.centerX;
        this.spreaderHelper.centerY = this.wheelnav.centerY;
        this.spreaderHelper.navItemCount = this.wheelnav.navItemCount;
        this.spreaderHelper.navAngle = this.wheelnav.navAngle;
        this.spreaderHelper.wheelRadius = this.wheelnav.spreaderRadius;
        this.spreaderHelper.startAngle = this.wheelnav.spreaderStartAngle;
        this.spreaderHelper.sliceAngle = this.wheelnav.spreaderSliceAngle;

        var thisWheelNav = this.wheelnav;
        this.animateeffect = "bounce";
        this.animatetime = 1500;
        //Set animation from wheelnav
        if (this.wheelnav.animateeffect !== null) { this.animateeffect = this.wheelnav.animateeffect; }
        if (this.wheelnav.animatetime !== null) { this.animatetime = this.wheelnav.animatetime; }

        if (this.wheelnav.spreaderTitleFont !== null) { this.fontAttr = { font: this.wheelnav.spreaderTitleFont }; }
        else { this.fontAttr = { font: '18px Impact, Charcoal, sans-serif' }; }

        this.spreaderPathIn = this.wheelnav.spreaderPathFunction(this.spreaderHelper, this.wheelnav.spreaderInPercent, this.wheelnav.spreaderPathCustom);
        this.spreaderPathOut = this.wheelnav.spreaderPathFunction(this.spreaderHelper, this.wheelnav.spreaderOutPercent, this.wheelnav.spreaderPathCustom);

        var currentPath = this.spreaderPathOut;
        if (thisWheelNav.initPercent < thisWheelNav.maxPercent) {
            currentPath = this.spreaderPathIn;
        }

        this.spreaderPath = this.wheelnav.raphael.path(currentPath.spreaderPathString);
        this.spreaderPath.attr(thisWheelNav.spreaderPathAttr);
        this.spreaderPath.id = thisWheelNav.getSpreaderId();
        this.spreaderPath.node.id = this.spreaderPath.id;
        this.spreaderPath.click(function () {
            thisWheelNav.spreadWheel();
        });

        //Set titles
        this.inTitleWidth = this.wheelnav.spreaderInTitleWidth;
        this.inTitleHeight = this.wheelnav.spreaderInTitleHeight;
        this.outTitleWidth = this.wheelnav.spreaderOutTitleWidth;
        this.outTitleHeight = this.wheelnav.spreaderOutTitleHeight;

        if (this.inTitleWidth !== null && this.inTitleHeight === null) { this.inTitleHeight = this.inTitleWidth; }
        if (this.inTitleWidth === null && this.inTitleHeight !== null) { this.inTitleWidth = this.inTitleHeight; }
        if (this.outTitleWidth !== null && this.outTitleHeight === null) { this.outTitleHeight = this.outTitleWidth; }
        if (this.outTitleWidth === null && this.outTitleHeight !== null) { this.outTitleWidth = this.outTitleHeight; }

        if (wheelnavTitle().isImageTitle(this.wheelnav.spreaderOutTitle)) {
            // Image default value
            if (this.inTitleWidth === null) { this.inTitleWidth = 32; }
            if (this.inTitleHeight === null) { this.inTitleHeight = 32; }
            if (this.outTitleWidth === null) { this.outTitleWidth = 32; }
            if (this.outTitleHeight === null) { this.outTitleHeight = 32; }
        }

        if (wheelnavTitle().isPathTitle(this.wheelnav.spreaderInTitle)) {
            inTitle = new wheelnavTitle(this.wheelnav.spreaderInTitle, this.wheelnav.raphael.raphael);
        }
        else {
            inTitle = new wheelnavTitle(this.wheelnav.spreaderInTitle);
        }
        this.inTitleSizeTransform = inTitle.getTitleSizeTransform(this.inTitleWidth, this.inTitleHeight);
        this.inTitle = inTitle.getTitlePercentAttr(this.spreaderPathIn.titlePosX, this.spreaderPathIn.titlePosY, this.inTitleWidth, this.inTitleHeight);

        if (wheelnavTitle().isPathTitle(this.wheelnav.spreaderOutTitle)) {
            outTitle = new wheelnavTitle(this.wheelnav.spreaderOutTitle, this.wheelnav.raphael.raphael);
        }
        else {
            outTitle = new wheelnavTitle(this.wheelnav.spreaderOutTitle);
        }
        this.outTitleSizeTransform = outTitle.getTitleSizeTransform(this.outTitleWidth, this.outTitleHeight);
        this.outTitle = outTitle.getTitlePercentAttr(this.spreaderPathOut.titlePosX, this.spreaderPathOut.titlePosY, this.outTitleWidth, this.outTitleHeight);

        var currentTitle = this.outTitle;
        var currentTitleAttr = this.wheelnav.spreaderTitleOutAttr;
        var currentTitleWidth = this.outTitleWidth;
        var currentTitleHeight = this.outTitleHeight;
        var currentTitleSizeTransform = this.outTitleSizeTransform;
        if (thisWheelNav.initPercent < thisWheelNav.maxPercent) {
            currentTitle = this.inTitle;
            currentTitleAttr = this.wheelnav.spreaderTitleInAttr;
            currentTitleWidth = this.inTitleWidth;
            currentTitleHeight = this.inTitleHeight;
            currentTitleSizeTransform = this.inTitleSizeTransform;
        }

        if (wheelnavTitle().isPathTitle(this.wheelnav.spreaderOutTitle)) {
            this.spreaderTitle = thisWheelNav.raphael.path(currentTitle.path);
        }
        else if (wheelnavTitle().isImageTitle(this.wheelnav.spreaderOutTitle)) {
            this.spreaderTitle = this.wheelnav.raphael.image(currentTitle.src, currentPath.titlePosX - (currentTitleWidth / 2), currentPath.titlePosY - (currentTitleHeight / 2), currentTitleWidth, currentTitleHeight);
        }
        else {
            this.spreaderTitle = thisWheelNav.raphael.text(currentPath.titlePosX, currentPath.titlePosY, currentTitle.title);
        }
        
        this.spreaderTitle.attr(this.fontAttr);
        this.spreaderTitle.attr(currentTitleAttr);
        this.spreaderTitle.attr({ transform: currentTitleSizeTransform });
        this.spreaderTitle.id = thisWheelNav.getSpreaderTitleId();
        this.spreaderTitle.node.id = this.spreaderTitle.id;
        this.spreaderTitle.click(function () {
            thisWheelNav.spreadWheel();
        });

        this.setCurrentTransform();
    }

    return this;
};

spreader.prototype.setCurrentTransform = function (withoutAnimate) {
    if (this.wheelnav.spreaderEnable) {

        if (withoutAnimate === undefined ||
            withoutAnimate === false) {
            
            if (this.wheelnav.currentPercent > this.wheelnav.minPercent) {
                currentPath = this.spreaderPathOut.spreaderPathString;
            }
            else {
                currentPath = this.spreaderPathIn.spreaderPathString;
            }

            spreaderTransformAttr = {
                path: currentPath
            };

            //Animate spreader
            this.spreaderPath.animate(spreaderTransformAttr, this.animatetime, this.animateeffect);

            //titles
            var currentTitle;
            var titleTransformAttr;
            var titleSizeTransform;

            if (this.wheelnav.currentPercent === this.wheelnav.maxPercent) {
                currentTitle = this.outTitle;
                titleTransformAttr = this.wheelnav.spreaderTitleOutAttr;
                this.spreaderPath.attr(this.wheelnav.spreaderPathOutAttr);
                titleSizeTransform = this.outTitleSizeTransform;
            }
            else {
                currentTitle = this.inTitle;
                titleTransformAttr = this.wheelnav.spreaderTitleInAttr;
                this.spreaderPath.attr(this.wheelnav.spreaderPathInAttr);
                titleSizeTransform = this.inTitleSizeTransform;
            }

            if (wheelnavTitle().isPathTitle(currentTitle.title)) {
                titleTransformAttr.path = currentTitle.path;
                titleTransformAttr.transform = titleSizeTransform;
            }
            else if (wheelnavTitle().isImageTitle(currentTitle.title)) {
                titleTransformAttr.x = currentTitle.x;
                titleTransformAttr.y = currentTitle.y;
                titleTransformAttr.width = currentTitle.width;
                titleTransformAttr.height = currentTitle.height;
                this.spreaderTitle.attr({ src: currentTitle.src });
            }
            else {
                //Little hack for proper appearance of "-" sign
                offYOffset = 0;
                if (currentTitle.title === "-") { offYOffset = 3; };

                titleTransformAttr.x = currentTitle.x;
                titleTransformAttr.y = currentTitle.y - offYOffset;

                if (currentTitle.title !== null) {
                    this.spreaderTitle.attr({ text: currentTitle.title });
                }
            }

            //Animate title
            this.spreaderTitle.animate(titleTransformAttr, this.animatetime, this.animateeffect);
        }

        this.spreaderPath.toFront();
        this.spreaderTitle.toFront();
    }
};

///#source 1 1 /js/source/spreader/wheelnav.spreaderPathStart.js
/* ======================================================================================= */
/* Spreader path definitions.                                                              */
/* ======================================================================================= */

spreaderPath = function () {

    this.NullSpreader = function (helper, custom) {

        if (custom === null) {
            custom = new spreaderPathCustomization();
        }

        helper.setBaseValue(custom.spreaderPercent, custom);

        return {
            spreaderPathString: "",
            titlePosX: helper.titlePosX,
            titlePosY: helper.titlePosY
        };
    };



///#source 1 1 /js/source/spreader/wheelnav.spreaderPath.Pie.js

this.PieSpreaderCustomization = function () {

    var custom = new spreaderPathCustomization();
    custom.spreaderRadius = 25;
    custom.arcBaseRadiusPercent = 1;
    custom.arcRadiusPercent = 1;
    custom.startRadiusPercent = 0;
    return custom;
};

this.PieSpreader = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieSpreaderCustomization();
    }

    helper.setBaseValue(custom.spreaderPercent * percent, custom);

    var arcBaseRadius = helper.sliceRadius * custom.arcBaseRadiusPercent;
    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;

    spreaderPathString = [];
    helper.StartSpreader(spreaderPathString, helper.startAngle, arcBaseRadius);
    spreaderPathString.push(helper.ArcTo(arcRadius, helper.middleAngle, arcBaseRadius));
    spreaderPathString.push(helper.ArcTo(arcRadius, helper.endAngle, arcBaseRadius));
    spreaderPathString.push(helper.Close());

    return {
        spreaderPathString: spreaderPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};

///#source 1 1 /js/source/spreader/wheelnav.spreaderPath.Star.js

this.StarSpreaderCustomization = function () {

    var custom = new spreaderPathCustomization();
    custom.minRadiusPercent = 0.5;

    return custom;
};

this.StarSpreader = function (helper, percent, custom) {

    if (custom === null) {
        custom = StarSpreaderCustomization();
    }

    helper.setBaseValue(custom.spreaderPercent * percent, custom);
    rbase = helper.wheelRadius * custom.spreaderPercent * custom.minRadiusPercent * percent;
    r = helper.sliceRadius;

    spreaderPathString = [];

    sliceAngle = helper.sliceAngle / helper.navItemCount;
    baseAngle = helper.navAngle;
    if (helper.endAngle - helper.startAngle < 360) { baseAngle = helper.startAngle; }

    helper.StartSpreader(spreaderPathString, baseAngle, r);

    for (var i = 0; i < helper.navItemCount; i++) {
        startAngle = i * sliceAngle + (baseAngle + sliceAngle / 2);
        middleAngle = startAngle + (sliceAngle / 2);
        endAngle = startAngle + sliceAngle;
        if (helper.endAngle - helper.startAngle < 360) {
            if (i === helper.navItemCount - 1) { endAngle = middleAngle; }
        }
        spreaderPathString.push(helper.LineTo(startAngle, rbase));
        spreaderPathString.push(helper.LineTo(middleAngle, r));
        spreaderPathString.push(helper.LineTo(endAngle, rbase));
    }

    spreaderPathString.push(helper.Close());

    return {
        spreaderPathString: spreaderPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/spreader/wheelnav.spreaderPath.AntiStar.js

this.AntiStarSpreaderCustomization = function () {

    var custom = new spreaderPathCustomization();
    custom.minRadiusPercent = 0.21;

    return custom;
};

this.AntiStarSpreader = function (helper, percent, custom) {

    if (custom === null) {
        custom = AntiStarSpreaderCustomization();
    }

    helper.setBaseValue(custom.spreaderPercent * percent, custom);
    rbase = helper.wheelRadius * custom.spreaderPercent * custom.minRadiusPercent * percent;
    r = helper.sliceRadius;

    spreaderPathString = [];

    sliceAngle = helper.sliceAngle / helper.navItemCount;
    baseAngle = helper.navAngle;
    if (helper.endAngle - helper.startAngle < 360) {
        baseAngle = helper.startAngle;
        helper.StartSpreader(spreaderPathString, baseAngle, rbase);
    }
    else {
        spreaderPathString.push(helper.MoveTo(helper.startAngle + (helper.navAngle + sliceAngle / 2), rbase));
    }

    for (var i = 0; i < helper.navItemCount; i++) {
        startAngle = i * sliceAngle + (baseAngle + sliceAngle / 2);
        middleAngle = startAngle + (sliceAngle / 2);
        endAngle = startAngle + sliceAngle;

        if (helper.endAngle - helper.startAngle < 360) {
            if (i === helper.navItemCount - 1) { endAngle = middleAngle; }
        }

        spreaderPathString.push(helper.LineTo(startAngle, r));
        spreaderPathString.push(helper.LineTo(middleAngle, rbase));
        spreaderPathString.push(helper.LineTo(endAngle, r));
    }

    spreaderPathString.push(helper.Close());

    return {
        spreaderPathString: spreaderPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/spreader/wheelnav.spreaderPath.Flower.js

this.FlowerSpreaderCustomization = function () {

    var custom = new spreaderPathCustomization();
    custom.minRadiusPercent = 0.63
    custom.menuRadius = 7;;

    return custom;
};

this.FlowerSpreader = function (helper, percent, custom) {

    if (custom === null) {
        custom = FlowerSpreaderCustomization();
    }

    helper.setBaseValue(custom.spreaderPercent * percent, custom);
    rbase = helper.wheelRadius * custom.spreaderPercent * custom.minRadiusPercent * percent;
    r = helper.sliceRadius;

    spreaderPathString = [];

    sliceAngle = helper.sliceAngle / helper.navItemCount;
    baseAngle = helper.navAngle;
    if (helper.endAngle - helper.startAngle < 360) {
        baseAngle = helper.startAngle;
        helper.StartSpreader(spreaderPathString, baseAngle, rbase);
    }
    else {
        spreaderPathString.push(helper.MoveTo(helper.startAngle + (helper.navAngle + sliceAngle / 2), rbase));
    }
    
    for (var i = 0; i < helper.navItemCount; i++) {
        startAngle = i * sliceAngle + (baseAngle + sliceAngle / 2);
        middleAngle = startAngle + (sliceAngle / 2);
        endAngle = startAngle + sliceAngle;

        if (helper.endAngle - helper.startAngle < 360) {
            if (i === 0) { spreaderPathString.push(helper.ArcTo(custom.menuRadius, startAngle, rbase)); }
            if (i === helper.navItemCount - 1) { endAngle = middleAngle; }
        }
        else {
            spreaderPathString.push(helper.LineTo(startAngle, rbase));
        }

        spreaderPathString.push(helper.ArcTo(custom.menuRadius, endAngle, rbase));
    }

    spreaderPathString.push(helper.Close());

    return {
        spreaderPathString: spreaderPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/spreader/wheelnav.spreaderPath.Holder.js

this.HolderSpreaderCustomization = function () {

    var custom = new spreaderPathCustomization();
    custom.minRadiusPercent = 0.5;
    custom.menuRadius = 37;

    return custom;
};

this.HolderSpreader = function (helper, percent, custom) {

    if (custom === null) {
        custom = HolderSpreaderCustomization();
    }

    helper.setBaseValue(custom.spreaderPercent * percent, custom);
    rbase = helper.wheelRadius * custom.spreaderPercent * custom.minRadiusPercent * percent;
    r = helper.sliceRadius;

    spreaderPathString = [];

    sliceAngle = helper.sliceAngle / helper.navItemCount;
    baseAngle = helper.navAngle;
    if (helper.endAngle - helper.startAngle < 360) {
        baseAngle = helper.startAngle;
        helper.StartSpreader(spreaderPathString, baseAngle, rbase);
    }
    else {
        spreaderPathString.push(helper.MoveTo(helper.startAngle + (helper.navAngle + sliceAngle / 2), rbase));
    }

    for (var i = 0; i < helper.navItemCount; i++) {
        startAngle = i * sliceAngle + (baseAngle + sliceAngle / 2);
        middleAngle = startAngle + (sliceAngle / 4);
        endAngle = startAngle + sliceAngle;

        if (helper.endAngle - helper.startAngle < 360) {
            if (i === helper.navItemCount - 1) { endAngle = middleAngle; }
        }
        else {
            spreaderPathString.push(helper.LineTo(startAngle, rbase));
        }

        spreaderPathString.push(helper.LineTo(startAngle, r));
        spreaderPathString.push(helper.ArcBackTo(custom.menuRadius, middleAngle, rbase));
        spreaderPathString.push(helper.ArcTo(custom.menuRadius, endAngle, r));
    }

    spreaderPathString.push(helper.Close());

    return {
        spreaderPathString: spreaderPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/spreader/wheelnav.spreaderPath.Line.js

this.LineSpreaderCustomization = function () {

    var custom = new spreaderPathCustomization();
    custom.minRadiusPercent = 0.5;

    return custom;
};

this.LineSpreader = function (helper, percent, custom) {

    if (custom === null) {
        custom = LineSpreaderCustomization();
    }

    helper.setBaseValue(custom.spreaderPercent * percent, custom);
    rbase = helper.wheelRadius * custom.spreaderPercent * custom.minRadiusPercent * percent;
    r = helper.sliceRadius;

    spreaderPathString = [];

    sliceAngle = helper.sliceAngle / helper.navItemCount;
    baseAngle = helper.navAngle;
    if (helper.endAngle - helper.startAngle < 360) { baseAngle = helper.startAngle; }

    spreaderPathString.push(helper.MoveTo(baseAngle + sliceAngle / 2, r));

    for (var i = 0; i < helper.navItemCount; i++) {
        startAngle = i * sliceAngle + (baseAngle + sliceAngle / 2);
        endAngle = startAngle + sliceAngle;
        if (helper.navItemCount === 2) {
            endAngle -= 90;
        }

        spreaderPathString.push(helper.LineTo(startAngle, r));
        spreaderPathString.push(helper.LineTo(endAngle, r));
    }

    spreaderPathString.push(helper.Close());

    return {
        spreaderPathString: spreaderPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/spreader/wheelnav.spreaderPathEnd.js

    return this;
};




///#source 1 1 /js/source/marker/wheelnav.marker.js
///#source 1 1 /js/source/marker/wheelnav.marker.core.js
/* ======================================================================================= */
/* Marker of wheel                                                                         */
/* ======================================================================================= */
/* ======================================================================================= */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/marker.html        */
/* ======================================================================================= */

marker = function (wheelnav) {

    this.wheelnav = wheelnav;
    if (this.wheelnav.markerEnable) {

        this.markerHelper = new pathHelper();
        this.markerHelper.centerX = this.wheelnav.centerX;
        this.markerHelper.centerY = this.wheelnav.centerY;
        this.markerHelper.navItemCount = this.wheelnav.navItemCount;
        this.markerHelper.navAngle = this.wheelnav.navAngle;
        this.markerHelper.wheelRadius = this.wheelnav.wheelRadius * this.wheelnav.maxPercent;
        this.markerHelper.sliceAngle = this.wheelnav.navItems[0].sliceAngle;
        this.markerHelper.startAngle = this.markerHelper.navAngle - (this.markerHelper.sliceAngle / 2);

        this.animateeffect = "bounce";
        this.animatetime = 1500;
        //Set animation from wheelnav
        if (this.wheelnav.animateeffect !== null) { this.animateeffect = this.wheelnav.animateeffect; }
        if (this.wheelnav.animatetime !== null) { this.animatetime = this.wheelnav.animatetime; }

        this.markerPathMin = this.wheelnav.markerPathFunction(this.markerHelper, this.wheelnav.minPercent, this.wheelnav.markerPathCustom);
        this.markerPathMax = this.wheelnav.markerPathFunction(this.markerHelper, this.wheelnav.maxPercent, this.wheelnav.markerPathCustom);
        this.marker = this.wheelnav.raphael.path(this.markerPathMax.markerPathString);
        this.marker.attr(this.wheelnav.markerAttr);
        this.marker.id = this.wheelnav.getMarkerId();
        this.marker.node.id = this.marker.id;
    }

    return this;
};

marker.prototype.setCurrentTransform = function (navAngle) {

    if (this.wheelnav.markerEnable) {
        var currentPath = "";

        if (this.wheelnav.currentPercent === this.wheelnav.maxPercent) {
            currentPath = this.markerPathMax.markerPathString;
        }
        else {
            currentPath = this.markerPathMin.markerPathString;
        }

        if (navAngle !== undefined) {
            var rotationAngle = navAngle - this.markerHelper.navAngle;

            markerTransformAttr = {
                transform: "r," + (rotationAngle).toString() + "," + this.wheelnav.centerX + "," + this.wheelnav.centerY,
                path: currentPath
            };
        }
        else {
            markerTransformAttr = {
                path: currentPath
            };
        }

        //Animate marker
        this.marker.animate(markerTransformAttr, this.animatetime, this.animateeffect);
        this.marker.toFront();
    }
};



///#source 1 1 /js/source/marker/wheelnav.markerPathStart.js
/* ======================================================================================= */
/* Marker path definitions.                                                                */
/* ======================================================================================= */

markerPath = function () {

    this.NullMarker = function (helper, custom) {

        if (custom === null) {
            custom = new markerPathCustomization();
        }

        helper.setBaseValue(custom);

        return {
            markerPathString: "",
            titlePosX: helper.titlePosX,
            titlePosY: helper.titlePosY
        };
    };



///#source 1 1 /js/source/marker/wheelnav.markerPath.Triangle.js

this.TriangleMarkerCustomization = function () {

    var custom = new markerPathCustomization();
    custom.arcBaseRadiusPercent = 1.09;
    custom.arcRadiusPercent = 1.2;
    custom.startRadiusPercent = 0;
    return custom;
};

this.TriangleMarker = function (helper, percent, custom) {

    if (custom === null) {
        custom = TriangleMarkerCustomization();
    }

    helper.setBaseValue(custom.markerPercent * percent, custom);

    var arcBaseRadius = helper.sliceRadius * custom.arcBaseRadiusPercent;
    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;
    var startAngle = helper.startAngle + helper.sliceAngle * 0.46;
    var endAngle = helper.startAngle + helper.sliceAngle * 0.54;

    markerPathString = [helper.MoveTo(helper.navAngle, arcBaseRadius),
                 helper.LineTo(startAngle, arcRadius),
                 helper.LineTo(endAngle, arcRadius),
                 helper.Close()];
    
    return {
        markerPathString: markerPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/marker/wheelnav.markerPath.PieLine.js

this.PieLineMarkerCustomization = function () {

    var custom = new markerPathCustomization();
    custom.arcBaseRadiusPercent = 1;
    custom.arcRadiusPercent = 1;
    custom.startRadiusPercent = 0;
    custom.sliceAngle = null;
    return custom;
};

this.PieLineMarker = function (helper, percent, custom) {

    if (custom === null) {
        custom = PieLineMarkerCustomization();
    }

    helper.setBaseValue(custom.markerPercent * percent, custom);

    var arcBaseRadius = helper.sliceRadius * custom.arcBaseRadiusPercent;
    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;

    if (custom.sliceAngle !== null) {
        helper.startAngle = helper.navAngle - (custom.sliceAngle / 2);
        helper.endAngle = helper.navAngle + (custom.sliceAngle / 2);
    }

    markerPathString = [helper.MoveTo(helper.startAngle, arcBaseRadius),
                 helper.ArcTo(arcRadius, helper.endAngle, arcBaseRadius),
                 helper.ArcBackTo(arcRadius, helper.startAngle, arcBaseRadius),
                 helper.Close()];

    return {
        markerPathString: markerPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};




///#source 1 1 /js/source/marker/wheelnav.markerPath.Menu.js

this.MenuMarkerCustomization = function () {

    var custom = new markerPathCustomization();
    custom.menuRadius = 40;
    custom.titleRadiusPercent = 0.63;
    custom.lineBaseRadiusPercent = 0;
    return custom;
};

this.MenuMarker = function (helper, percent, custom) {

    if (custom === null) {
        custom = MenuMarkerCustomization();
    }

    helper.setBaseValue(custom.markerPercent * percent, custom);

    x = helper.centerX;
    y = helper.centerY;

    helper.titleRadius = helper.wheelRadius * custom.titleRadiusPercent * percent;
    helper.setTitlePos();

    var menuRadius = custom.menuRadius * percent;
    if (percent <= 0.05) { menuRadius = 11; }

    middleTheta = helper.middleTheta;

    markerPathString = [["M", helper.titlePosX - (menuRadius * Math.cos(middleTheta)), helper.titlePosY - (menuRadius * Math.sin(middleTheta))],
                ["A", menuRadius, menuRadius, 0, 0, 1, helper.titlePosX + (menuRadius * Math.cos(middleTheta)), helper.titlePosY + (menuRadius * Math.sin(middleTheta))],
                ["A", menuRadius, menuRadius, 0, 0, 1, helper.titlePosX - (menuRadius * Math.cos(middleTheta)), helper.titlePosY - (menuRadius * Math.sin(middleTheta))],
                ["z"]];
    
    return {
        markerPathString: markerPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/marker/wheelnav.markerPath.Line.js

this.LineMarkerCustomization = function () {

    var custom = new markerPathCustomization();
    custom.arcBaseRadiusPercent = 1.05;
    custom.arcRadiusPercent = 1.2;
    custom.startRadiusPercent = 0;
    return custom;
};

this.LineMarker = function (helper, percent, custom) {

    if (custom === null) {
        custom = LineMarkerCustomization();
    }

    helper.setBaseValue(custom.markerPercent * percent, custom);

    var arcBaseRadius = helper.sliceRadius * custom.arcBaseRadiusPercent;
    var arcRadius = helper.sliceRadius * custom.arcRadiusPercent;

    markerPathString = [helper.MoveTo(helper.navAngle, arcBaseRadius),
                 helper.LineTo(helper.navAngle, arcRadius),
                 helper.Close()];
    
    return {
        markerPathString: markerPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/marker/wheelnav.markerPath.Drop.js

this.DropMarkerCustomization = function () {

    var custom = new markerPathCustomization();
    custom.dropBaseRadiusPercent = 0;
    custom.dropRadiusPercent = 0.15;
    return custom;
};

this.DropMarker = function (helper, percent, custom) {

    if (custom === null) {
        custom = DropMarkerCustomization();
    }

    helper.setBaseValue(custom.markerPercent * percent, custom);

    var arcBaseRadius = helper.sliceRadius * custom.dropBaseRadiusPercent;
    var startAngle = helper.startAngle + helper.sliceAngle * 0.2;
    var startAngle2 = helper.startAngle;
    var endAngle = helper.startAngle + helper.sliceAngle * 0.8;
    var endAngle2 = helper.startAngle + helper.sliceAngle;
    var dropRadius = helper.sliceRadius * custom.dropRadiusPercent;

    markerPathString = [helper.MoveTo(0, dropRadius),
        helper.ArcTo(dropRadius, 180, dropRadius),
        helper.ArcTo(dropRadius, 360, dropRadius),
        helper.MoveTo(helper.navAngle, arcBaseRadius),
                helper.LineTo(startAngle, dropRadius),
                 helper.LineTo(startAngle2, dropRadius),
                 helper.LineTo(helper.navAngle, dropRadius * 1.6),
                helper.LineTo(endAngle2, dropRadius),
                 helper.LineTo(endAngle, dropRadius),
                 helper.Close()];
    return {
        markerPathString: markerPathString,
        titlePosX: helper.titlePosX,
        titlePosY: helper.titlePosY
    };
};


///#source 1 1 /js/source/marker/wheelnav.markerPathEnd.js

    return this;
};




///#source 1 1 /js/source/wheelnav.colorPalettes.js
/* ======================================================================================== */
/* Color palettes for slices from http://www.colourlovers.com                               */
/* ======================================================================================== */
/* ======================================================================================== */
/* Documentation: http://wheelnavjs.softwaretailoring.net/documentation/colorPalettes.html  */
/* ======================================================================================== */

var colorpalette = {
    defaultpalette: new Array("#2D9E46", "#F5BE41", "#F77604", "#D63C22", "#006BA6", "#92ADAF"),
    purple: new Array("#4F346B", "#623491", "#9657D6", "#AD74E7", "#CBA3F3"),
    greenred: new Array("#17B92A", "#FF3D00", "#17B92A", "#FF3D00"),
    greensilver: new Array("#1F700A", "#79CC3C", "#D4E178", "#E6D5C3", "#AC875D"),
    oceanfive: new Array("#00A0B0", "#6A4A3C", "#CC333F", "#EB6841", "#EDC951"),
    garden: new Array("#648A4F", "#2B2B29", "#DF6126", "#FFA337", "#F57C85"),
    gamebookers: new Array("#FF9900", "#DCDCDC", "#BCBCBC", "#3299BB", "#727272"),
    parrot: new Array("#D80351", "#F5D908", "#00A3EE", "#929292", "#3F3F3F"),
    pisycholand: new Array("#FF1919", "#FF5E19", "#FF9F19", "#E4FF19", "#29FF19"),
    makeLOVEnotWAR: new Array("#2C0EF0", "#B300FF", "#6751F0", "#FF006F", "#8119FF"),
    theworldismine: new Array("#F21D1D", "#FF2167", "#B521FF", "#7E2AA8", "#000000"),
    fractalloveone: new Array("#002EFF", "#00FFF7", "#00FF62", "#FFAA00", "#FFF700"),
    fractallovetwo: new Array("#FF9500", "#FF0000", "#FF00F3", "#AA00FF", "#002EFF"),
    fractallove: new Array("#002EFF", "#00FFF7", "#00FF62", "#FFAA00", "#F5D908", "#FF0000", "#FF00F3", "#AA00FF"),
    sprinkles: new Array("#272523", "#FFACAC", "#FFD700", "#00590C", "#08006D"),
    goldenyellow: new Array("#D8B597", "#8C4006", "#B6690F", "#E3C57F", "#FFEDBE"),
    hotaru: new Array("#364C4A", "#497C7F", "#92C5C0", "#858168", "#CCBCA5")
};

/*!
* metismenu - v2.7.9
* A jQuery menu plugin
* https://github.com/onokumus/metismenu#readme
*
* Made by Osman Nuri Okumus <onokumus@gmail.com> (https://github.com/onokumus)
* Under MIT License
*/
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('jquery')) :
  typeof define === 'function' && define.amd ? define(['jquery'], factory) :
  (global.metisMenu = factory(global.jQuery));
}(this, (function ($) { 'use strict';

  $ = $ && $.hasOwnProperty('default') ? $['default'] : $;

  function _defineProperty(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true
      });
    } else {
      obj[key] = value;
    }

    return obj;
  }

  function _objectSpread(target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i] != null ? arguments[i] : {};
      var ownKeys = Object.keys(source);

      if (typeof Object.getOwnPropertySymbols === 'function') {
        ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) {
          return Object.getOwnPropertyDescriptor(source, sym).enumerable;
        }));
      }

      ownKeys.forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    }

    return target;
  }

  var Util = function ($$$1) {
    // eslint-disable-line no-shadow
    var TRANSITION_END = 'transitionend';
    var Util = {
      // eslint-disable-line no-shadow
      TRANSITION_END: 'mmTransitionEnd',
      triggerTransitionEnd: function triggerTransitionEnd(element) {
        $$$1(element).trigger(TRANSITION_END);
      },
      supportsTransitionEnd: function supportsTransitionEnd() {
        return Boolean(TRANSITION_END);
      }
    };

    function getSpecialTransitionEndEvent() {
      return {
        bindType: TRANSITION_END,
        delegateType: TRANSITION_END,
        handle: function handle(event) {
          if ($$$1(event.target).is(this)) {
            return event.handleObj.handler.apply(this, arguments); // eslint-disable-line prefer-rest-params
          }

          return undefined;
        }
      };
    }

    function transitionEndEmulator(duration) {
      var _this = this;

      var called = false;
      $$$1(this).one(Util.TRANSITION_END, function () {
        called = true;
      });
      setTimeout(function () {
        if (!called) {
          Util.triggerTransitionEnd(_this);
        }
      }, duration);
      return this;
    }

    function setTransitionEndSupport() {
      $$$1.fn.mmEmulateTransitionEnd = transitionEndEmulator; // eslint-disable-line no-param-reassign
      // eslint-disable-next-line no-param-reassign

      $$$1.event.special[Util.TRANSITION_END] = getSpecialTransitionEndEvent();
    }

    setTransitionEndSupport();
    return Util;
  }($);

  var MetisMenu = function ($$$1) {
    // eslint-disable-line no-shadow
    var NAME = 'metisMenu';
    var DATA_KEY = 'metisMenu';
    var EVENT_KEY = "." + DATA_KEY;
    var DATA_API_KEY = '.data-api';
    var JQUERY_NO_CONFLICT = $$$1.fn[NAME];
    var TRANSITION_DURATION = 350;
    var Default = {
      toggle: true,
      preventDefault: true,
      activeClass: 'active',
      collapseClass: 'collapse',
      collapseInClass: 'in',
      collapsingClass: 'collapsing',
      triggerElement: 'a',
      parentTrigger: 'li',
      subMenu: 'ul'
    };
    var Event = {
      SHOW: "show" + EVENT_KEY,
      SHOWN: "shown" + EVENT_KEY,
      HIDE: "hide" + EVENT_KEY,
      HIDDEN: "hidden" + EVENT_KEY,
      CLICK_DATA_API: "click" + EVENT_KEY + DATA_API_KEY
    };

    var MetisMenu =
    /*#__PURE__*/
    function () {
      // eslint-disable-line no-shadow
      function MetisMenu(element, config) {
        this.element = element;
        this.config = _objectSpread({}, Default, config);
        this.transitioning = null;
        this.init();
      }

      var _proto = MetisMenu.prototype;

      _proto.init = function init() {
        var self = this;
        var conf = this.config;
        $$$1(this.element).find(conf.parentTrigger + "." + conf.activeClass).has(conf.subMenu).children(conf.subMenu).addClass(conf.collapseClass + " " + conf.collapseInClass);
        $$$1(this.element).find(conf.parentTrigger).not("." + conf.activeClass).has(conf.subMenu).children(conf.subMenu).addClass(conf.collapseClass);
        $$$1(this.element).find(conf.parentTrigger).has(conf.subMenu).children(conf.triggerElement).on(Event.CLICK_DATA_API, function (e) {
          // eslint-disable-line func-names
          var eTar = $$$1(this);
          var paRent = eTar.parent(conf.parentTrigger);
          var sibLings = paRent.siblings(conf.parentTrigger).children(conf.triggerElement);
          var List = paRent.children(conf.subMenu);

          if (conf.preventDefault) {
            e.preventDefault();
          }

          if (eTar.attr('aria-disabled') === 'true') {
            return;
          }

          if (paRent.hasClass(conf.activeClass)) {
            eTar.attr('aria-expanded', false);
            self.hide(List);
          } else {
            self.show(List);
            eTar.attr('aria-expanded', true);

            if (conf.toggle) {
              sibLings.attr('aria-expanded', false);
            }
          }

          if (conf.onTransitionStart) {
            conf.onTransitionStart(e);
          }
        });
      };

      _proto.show = function show(element) {
        var _this = this;

        if (this.transitioning || $$$1(element).hasClass(this.config.collapsingClass)) {
          return;
        }

        var elem = $$$1(element);
        var startEvent = $$$1.Event(Event.SHOW);
        elem.trigger(startEvent);

        if (startEvent.isDefaultPrevented()) {
          return;
        }

        elem.parent(this.config.parentTrigger).addClass(this.config.activeClass);

        if (this.config.toggle) {
          this.hide(elem.parent(this.config.parentTrigger).siblings().children(this.config.subMenu + "." + this.config.collapseInClass));
        }

        elem.removeClass(this.config.collapseClass).addClass(this.config.collapsingClass).height(0);
        this.setTransitioning(true);

        var complete = function complete() {
          // check if disposed
          if (!_this.config || !_this.element) {
            return;
          }

          elem.removeClass(_this.config.collapsingClass).addClass(_this.config.collapseClass + " " + _this.config.collapseInClass).height('');

          _this.setTransitioning(false);

          elem.trigger(Event.SHOWN);
        };

        elem.height(element[0].scrollHeight).one(Util.TRANSITION_END, complete).mmEmulateTransitionEnd(TRANSITION_DURATION);
      };

      _proto.hide = function hide(element) {
        var _this2 = this;

        if (this.transitioning || !$$$1(element).hasClass(this.config.collapseInClass)) {
          return;
        }

        var elem = $$$1(element);
        var startEvent = $$$1.Event(Event.HIDE);
        elem.trigger(startEvent);

        if (startEvent.isDefaultPrevented()) {
          return;
        }

        elem.parent(this.config.parentTrigger).removeClass(this.config.activeClass); // eslint-disable-next-line no-unused-expressions

        elem.height(elem.height())[0].offsetHeight;
        elem.addClass(this.config.collapsingClass).removeClass(this.config.collapseClass).removeClass(this.config.collapseInClass);
        this.setTransitioning(true);

        var complete = function complete() {
          // check if disposed
          if (!_this2.config || !_this2.element) {
            return;
          }

          if (_this2.transitioning && _this2.config.onTransitionEnd) {
            _this2.config.onTransitionEnd();
          }

          _this2.setTransitioning(false);

          elem.trigger(Event.HIDDEN);
          elem.removeClass(_this2.config.collapsingClass).addClass(_this2.config.collapseClass);
        };

        if (elem.height() === 0 || elem.css('display') === 'none') {
          complete();
        } else {
          elem.height(0).one(Util.TRANSITION_END, complete).mmEmulateTransitionEnd(TRANSITION_DURATION);
        }
      };

      _proto.setTransitioning = function setTransitioning(isTransitioning) {
        this.transitioning = isTransitioning;
      };

      _proto.dispose = function dispose() {
        $$$1.removeData(this.element, DATA_KEY);
        $$$1(this.element).find(this.config.parentTrigger).has(this.config.subMenu).children(this.config.triggerElement).off('click');
        this.transitioning = null;
        this.config = null;
        this.element = null;
      };

      MetisMenu.jQueryInterface = function jQueryInterface(config) {
        // eslint-disable-next-line func-names
        return this.each(function () {
          var $this = $$$1(this);
          var data = $this.data(DATA_KEY);

          var conf = _objectSpread({}, Default, $this.data(), typeof config === 'object' && config ? config : {});

          if (!data && /dispose/.test(config)) {
            this.dispose();
          }

          if (!data) {
            data = new MetisMenu(this, conf);
            $this.data(DATA_KEY, data);
          }

          if (typeof config === 'string') {
            if (data[config] === undefined) {
              throw new Error("No method named \"" + config + "\"");
            }

            data[config]();
          }
        });
      };

      return MetisMenu;
    }();
    /**
     * ------------------------------------------------------------------------
     * jQuery
     * ------------------------------------------------------------------------
     */


    $$$1.fn[NAME] = MetisMenu.jQueryInterface; // eslint-disable-line no-param-reassign

    $$$1.fn[NAME].Constructor = MetisMenu; // eslint-disable-line no-param-reassign

    $$$1.fn[NAME].noConflict = function () {
      // eslint-disable-line no-param-reassign
      $$$1.fn[NAME] = JQUERY_NO_CONFLICT; // eslint-disable-line no-param-reassign

      return MetisMenu.jQueryInterface;
    };

    return MetisMenu;
  }($);

  return MetisMenu;

})));
(function($) {
	var	aux		= {
			// navigates left / right
			navigate	: function( dir, $el, $wrapper, opts, cache ) {
				
				var scroll		= opts.scroll,
					factor		= 1,
					idxClicked	= 0;
					
				if( cache.expanded ) {
					scroll		= 1; // scroll is always 1 in full mode
					factor		= 3; // the width of the expanded item will be 3 times bigger than 1 collapsed item	
					idxClicked	= cache.idxClicked; // the index of the clicked item
				}
				
				// clone the elements on the right / left and append / prepend them according to dir and scroll
				if( dir === 1 ) {
					$wrapper.find('div.tm-item:lt(' + scroll + ')').each(function(i) {
						$(this).clone(true).css( 'left', ( cache.totalItems - idxClicked + i ) * cache.itemW * factor + 'px' ).appendTo( $wrapper );
					});
				}
				else {
					var $first	= $wrapper.children().eq(0);
					
					$wrapper.find('div.tm-item:gt(' + ( cache.totalItems  - 1 - scroll ) + ')').each(function(i) {
						// insert before $first so they stay in the right order
						$(this).clone(true).css( 'left', - ( scroll - i + idxClicked ) * cache.itemW * factor + 'px' ).insertBefore( $first );
					});
				}
				
				// animate the left of each item
				// the calculations are dependent on dir and on the cache.expanded value
				$wrapper.find('div.tm-item').each(function(i) {
					var $item	= $(this);
					$item.stop().animate({
						left	:  ( dir === 1 ) ? '-=' + ( cache.itemW * factor * scroll ) + 'px' : '+=' + ( cache.itemW * factor * scroll ) + 'px'
					}, opts.sliderSpeed, opts.sliderEasing, function() {
						if( ( dir === 1 && $item.position().left < - idxClicked * cache.itemW * factor ) || ( dir === -1 && $item.position().left > ( ( cache.totalItems - 1 - idxClicked ) * cache.itemW * factor ) ) ) {
							// remove the item that was cloned
							$item.remove();
						}						
						cache.isAnimating	= false;
					});
				});
				
			},
			// opens an item (animation) -> opens all the others
			openItem	: function( $wrapper, $item, opts, cache ) {
				cache.idxClicked	= $item.index();
				// the item's position (1, 2, or 3) on the viewport (the visible items) 
				cache.winpos		= aux.getWinPos( $item.position().left, cache );
				$wrapper.find('div.tm-item').not( $item ).hide();
				$item.find('div.tm-content-wrapper').css( 'left', cache.itemW + 'px' ).stop().animate({
					width	: cache.itemW * 2 + 'px',
					left	: cache.itemW + 'px'
				}, opts.itemSpeed, opts.itemEasing)
				.end()
				.stop()
				.animate({
					left	: '0px'
				}, opts.itemSpeed, opts.itemEasing, function() {
					cache.isAnimating	= false;
					cache.expanded		= true;
					
					aux.openItems( $wrapper, $item, opts, cache );
				});
						
			},
			// opens all the items
			openItems	: function( $wrapper, $openedItem, opts, cache ) {
				var openedIdx	= $openedItem.index();
				
				$wrapper.find('div.tm-item').each(function(i) {
					var $item	= $(this),
						idx		= $item.index();
					
					if( idx !== openedIdx ) {
						$item.css( 'left', - ( openedIdx - idx ) * ( cache.itemW * 3 ) + 'px' ).show().find('div.tm-content-wrapper').css({
							left	: cache.itemW + 'px',
							width	: cache.itemW * 2 + 'px'
						});
						
						// hide more link
						aux.toggleMore( $item, false );
					}
				});
			},
			// show / hide the item's more button
			toggleMore	: function( $item, show ) {
				( show ) ? $item.find('a.tm-more').show() : $item.find('a.tm-more').hide();
			},
			// close all the items
			// the current one is animated
			closeItems	: function( $wrapper, $openedItem, opts, cache ) {
				var openedIdx	= $openedItem.index();
				
				$openedItem.find('div.tm-content-wrapper').stop().animate({
					width	: '0px'
				}, opts.itemSpeed, opts.itemEasing)
				.end()
				.stop()
				.animate({
					left	: cache.itemW * ( cache.winpos - 1 ) + 'px'
				}, opts.itemSpeed, opts.itemEasing, function() {
					cache.isAnimating	= false;
					cache.expanded		= false;
				});
				
				// show more link
				aux.toggleMore( $openedItem, true );
				
				$wrapper.find('div.tm-item').each(function(i) {
					var $item	= $(this),
						idx		= $item.index();
					
					if( idx !== openedIdx ) {
						$item.find('div.tm-content-wrapper').css({
							width	: '0px'
						})
						.end()
						.css( 'left', ( ( cache.winpos - 1 ) - ( openedIdx - idx ) ) * cache.itemW + 'px' )
						.show();
						
						// show more link
						aux.toggleMore( $item, true );
					}
				});
			},
			// gets the item's position (1, 2, or 3) on the viewport (the visible items)
			// val is the left of the item
			getWinPos	: function( val, cache ) {
				switch( val ) {
					case 0 					: return 1; break;
					case cache.itemW 		: return 2; break;
					case cache.itemW * 2 	: return 3; break;
				}
			}
		},
		methods = {
			init 		: function( options ) {
				
				if( this.length ) {
					
					var settings = {
						sliderSpeed		: 500,			// speed for the sliding animation
						sliderEasing	: 'easeOutExpo',// easing for the sliding animation
						itemSpeed		: 500,			// speed for the item animation (open / close)
						itemEasing		: 'easeOutExpo',// easing for the item animation (open / close)
						scroll			: 1				// number of items to scroll at a time
					};
					
					return this.each(function() {
						
						// if options exist, lets merge them with our default settings
						if ( options ) {
							$.extend( settings, options );
						}
						
						var $el 			= $(this),
							$wrapper		= $el.find('div.tm-wrapper'),
							$items			= $wrapper.children('div.tm-item'),
							cache			= {};
						
						// save the with of one item	
						cache.itemW			= $items.width();
						// save the number of total items
						cache.totalItems	= $items.length;
						
						// add navigation buttons
						if( cache.totalItems > 3 )	
							$el.prepend('<div class="tm-nav"><i class="fa fa-chevron-left tm-nav-prev"></i><i class="fa fa-chevron-right tm-nav-next"></i></div>')
						
						// control the scroll value
						if( settings.scroll < 1 )
							settings.scroll = 1;
						else if( settings.scroll > 3 )
							settings.scroll = 3;	
						
						var $navPrev		= $el.find('i.tm-nav-prev'),
							$navNext		= $el.find('i.tm-nav-next');
						
						// hide the items except the first 3
						$wrapper.css( 'overflow', 'hidden' );
						
						// the items will have position absolute 
						// calculate the left of each item
						$items.each(function(i) {
							$(this).css({
								position	: 'absolute',
								left		: i * cache.itemW + 'px'
							});
						});
						
						// click to open the item(s)
						$el.find('a.tm-more').on('click.topMenu', function( event ) {
							if( cache.isAnimating ) return false;
							cache.isAnimating	= true;
							$(this).hide();
							var $item	= $(this).closest('div.ca-item');
							aux.openItem( $wrapper, $item, settings, cache );
							return false;
						});
						
						// click to close the item(s)
						$el.find('a.tm-close').on('click.topMenu', function( event ) {
							if( cache.isAnimating ) return false;
							cache.isAnimating	= true;
							var $item	= $(this).closest('div.ca-item');
							aux.closeItems( $wrapper, $item, settings, cache );
							return false;
						});
						
						// navigate left
						$navPrev.bind('click.topMenu', function( event ) {
							if( cache.isAnimating ) return false;
							cache.isAnimating	= true;
							aux.navigate( -1, $el, $wrapper, settings, cache );
						});
						
						// navigate right
						$navNext.bind('click.topMenu', function( event ) {
							if( cache.isAnimating ) return false;
							cache.isAnimating	= true;
							aux.navigate( 1, $el, $wrapper, settings, cache );
						});
						
						// adds events to the mouse
						$el.bind('mousewheel.topMenu', function(e, delta) {
							if(delta > 0) {
								if( cache.isAnimating ) return false;
								cache.isAnimating	= true;
								aux.navigate( -1, $el, $wrapper, settings, cache );
							}	
							else {
								if( cache.isAnimating ) return false;
								cache.isAnimating	= true;
								aux.navigate( 1, $el, $wrapper, settings, cache );
							}	
							return false;
						});
						
					});
				}
			}
		};
	
	$.fn.topMenu = function(method) {
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.topMenu' );
		}
	};
	
})(jQuery);
(function($)
{
    var isWebkit = !!~window.navigator.userAgent.indexOf('AppleWebKit/');

    $.fn.console = function(config)
    {
        ////////////////////////////////////////////////////////////////////////
        // Constants
        // Some are enums, data types, others just for optimisation
        var keyCodes = {
            // left
            37: moveBackward,
            // right
            39: moveForward,
            // up
            38: previousHistory,
            // down
            40: nextHistory,
            // backspace
            8: backDelete,
            // delete
            46: forwardDelete,
            // end
            35: moveToEnd,
            // start
            36: moveToStart,
            // return
            13: commandTrigger,
            // tab
            18: doNothing,
            // tab
            9: doComplete
        };
        var ctrlCodes = {
            // C-a
            65: moveToStart,
            // C-e
            69: moveToEnd,
            // C-d
            68: forwardDelete,
            // C-n
            78: nextHistory,
            // C-p
            80: previousHistory,
            // C-b
            66: moveBackward,
            // C-f
            70: moveForward,
            // C-k
            75: deleteUntilEnd,
            // C-l
            76: clearScreen,
            // C-u
            85: clearCurrentPrompt
        };
        if (config.ctrlCodes)
        {
            $.extend(ctrlCodes, config.ctrlCodes);
        }
        var altCodes = {
            // M-f
            70: moveToNextWord,
            // M-b
            66: moveToPreviousWord,
            // M-d
            68: deleteNextWord
        };
        var shiftCodes = {
            // return
            13: newLine
        };
        var cursor = '<span class="console-cursor">&nbsp;</span>';

        ////////////////////////////////////////////////////////////////////////
        // Globals
        var container = $(this);
        var inner = $('<div class="console-inner"></div>');
        // erjiang: changed this from a text input to a textarea so we
        // can get pasted newlines
        var typer = $(
            '<textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="console-typer"></textarea>');
        // Prompt
        var promptBox;
        var prompt;
        var continuedPromptLabel = config && config.continuedPromptLabel ? config.continuedPromptLabel : "> ";
        var column = 0;
        var promptText = '';
        var restoreText = '';
        var continuedText = '';
        var fadeOnReset = config.fadeOnReset !== undefined ? config.fadeOnReset : true;
        // Prompt history stack
        var history = [];
        var ringn = 0;
        // For reasons unknown to The Sword of Michael himself, Opera
        // triggers and sends a key character when you hit various
        // keys like PgUp, End, etc. So there is no way of knowing
        // when a user has typed '#' or End. My solution is in the
        // typer.keydown and typer.keypress functions; I use the
        // variable below to ignore the keypress event if the keydown
        // event succeeds.
        var cancelKeyPress = 0;
        // When this value is false, the prompt will not respond to input
        var acceptInput = true;
        // When this value is true, the command has been canceled
        var cancelCommand = false;

        // External exports object
        var extern = {};

        ////////////////////////////////////////////////////////////////////////
        // Main entry point
        (function()
        {
            extern.promptLabel = config && config.promptLabel ? config.promptLabel : "> ";
            container.append(inner);
            inner.append(typer);
            typer.css({ position: 'absolute', top: 0, left: '-9999px' });
            if (config.welcomeMessage)
            {
                message(config.welcomeMessage, 'console-welcome');
            }
            newPromptBox();
            if (config.autofocus)
            {
                inner.addClass('console-focus');
                typer.focus();
                setTimeout(function()
                    {
                        inner.addClass('console-focus');
                        typer.focus();
                    },
                    100);
            }
            extern.inner = inner;
            extern.typer = typer;
            extern.scrollToBottom = scrollToBottom;
            extern.report = report;
            extern.showCompletion = showCompletion;
            extern.clearScreen = clearScreen;
        })();

        ////////////////////////////////////////////////////////////////////////
        // Reset terminal
        extern.reset = function()
        {
            var welcome = (typeof config.welcomeMessage !== 'undefined');

            var removeElements = function()
            {
                inner.find('div').each(function()
                {
                    if (!welcome)
                    {
                        $(this).remove();
                    }
                    else
                    {
                        welcome = false;
                    }
                });
            };

            if (fadeOnReset)
            {
                inner.parent().fadeOut(function()
                {
                    removeElements();
                    newPromptBox();
                    inner.parent().fadeIn(focusConsole);
                });
            }
            else
            {
                removeElements();
                newPromptBox();
                focusConsole();
            }
        };

        var focusConsole = function()
        {
            inner.addClass('console-focus');
            typer.focus();
        };

        extern.focus = function()
        {
            focusConsole();
        }

        ////////////////////////////////////////////////////////////////////////
        // Reset terminal
        extern.notice = function(msg, style)
        {
            var n = $('<div class="notice"></div>').append($('<div></div>').text(msg))
                .css({ visibility: 'hidden' });
            container.append(n);
            var focused = true;
            if (style === 'fadeout')
            {
                setTimeout(function()
                    {
                        n.fadeOut(function()
                        {
                            n.remove();
                        });
                    },
                    4000);
            }
            else if (style === 'prompt')
            {
                var a = $('<br/><div class="action"><a href="javascript:">OK</a><div class="clear"></div></div>');
                n.append(a);
                focused = false;
                a.click(function()
                {
                    n.fadeOut(function()
                    {
                        n.remove();
                        inner.css({ opacity: 1 })
                    });
                });
            }
            var h = n.height();
            n.css({ height: '0px', visibility: 'visible' })
                .animate({ height: h + 'px' },
                    function()
                    {
                        if (!focused)
                        {
                            inner.css({ opacity: 0.5 });
                        }
                    });
            n.css('cursor', 'default');
            return n;
        };

        ////////////////////////////////////////////////////////////////////////
        // Make a new prompt box
        function newPromptBox()
        {
            column = 0;
            promptText = '';
            ringn = 0; // Reset the position of the history ring
            enableInput();
            promptBox = $('<div class="console-prompt-box"></div>');
            var label = $('<span class="console-prompt-label"></span>');
            var labelText = extern.continuedPrompt ? continuedPromptLabel : extern.promptLabel;
            promptBox.append(label.text(labelText).show());
            label.html(label.html().replace(' ', '&nbsp;'));
            prompt = $('<span class="console-prompt"></span>');
            promptBox.append(prompt);
            inner.append(promptBox);
            updatePromptDisplay();
        };

        ////////////////////////////////////////////////////////////////////////
        // Handle setting focus
        container.click(function()
        {
            // Don't mess with the focus if there is an active selection
            if (window.getSelection().toString())
            {
                return false;
            }

            inner.addClass('console-focus');
            inner.removeClass('console-nofocus');
            if (isWebkit)
            {
                typer.focusWithoutScrolling();
            }
            else
            {
                typer.css('position', 'fixed').focus();
            }
            scrollToBottom();
            return false;
        });

        ////////////////////////////////////////////////////////////////////////
        // Handle losing focus
        typer.blur(function()
        {
            inner.removeClass('console-focus');
            inner.addClass('console-nofocus');
        });

        ////////////////////////////////////////////////////////////////////////
        // Bind to the paste event of the input box so we know when we
        // get pasted data
        typer.bind('paste',
            function(e)
            {
                // wipe typer input clean just in case
                typer.val("");
                // this timeout is required because the onpaste event is
                // fired *before* the text is actually pasted
                setTimeout(function()
                    {
                        typer.consoleInsert(typer.val());
                        typer.val("");
                    },
                    0);
            });

        ////////////////////////////////////////////////////////////////////////
        // Handle key hit before translation
        // For picking up control characters like up/left/down/right

        typer.keydown(function(e)
        {
            cancelKeyPress = 0;
            var keyCode = e.keyCode;
            // C-c: cancel the execution
            if (e.ctrlKey && keyCode === 67)
            {
                cancelKeyPress = keyCode;
                cancelExecution();
                return false;
            }
            if (acceptInput)
            {
                if (e.shiftKey && keyCode in shiftCodes)
                {
                    cancelKeyPress = keyCode;
                    (shiftCodes[keyCode])();
                    return false;
                }
                else if (e.altKey && keyCode in altCodes)
                {
                    cancelKeyPress = keyCode;
                    (altCodes[keyCode])();
                    return false;
                }
                else if (e.ctrlKey && keyCode in ctrlCodes)
                {
                    cancelKeyPress = keyCode;
                    (ctrlCodes[keyCode])();
                    return false;
                }
                else if (keyCode in keyCodes)
                {
                    cancelKeyPress = keyCode;
                    (keyCodes[keyCode])();
                    return false;
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////
        // Handle key press
        typer.keypress(function(e)
        {
            var keyCode = e.keyCode || e.which;
            if (isIgnorableKey(e))
            {
                return false;
            }
            // C-v: don't insert on paste event
            if ((e.ctrlKey || e.metaKey) && String.fromCharCode(keyCode).toLowerCase() === 'v')
            {
                return true;
            }
            if (acceptInput && cancelKeyPress !== keyCode && keyCode >= 32)
            {
                if (cancelKeyPress)
                {
                    return false;
                }
                if (
                    typeof config.charInsertTrigger === 'undefined' ||
                    (
                        typeof config.charInsertTrigger === 'function' &&
                            config.charInsertTrigger(keyCode, promptText)
                    )
                )
                {
                    typer.consoleInsert(keyCode);
                }
            }
            if (isWebkit)
            {
                return false;
            }
        });

        function isIgnorableKey(e)
        {
            // for now just filter alt+tab that we receive on some platforms when
            // user switches windows (goes away from the browser)
            return ((e.keyCode === keyCodes.tab || e.keyCode === 192) && e.altKey);
        };

        ////////////////////////////////////////////////////////////////////////
        // Rotate through the command history
        function rotateHistory(n)
        {
            if (history.length === 0)
            {
                return;
            }
            ringn += n;
            if (ringn < 0)
            {
                ringn = history.length;
            }
            else if (ringn > history.length)
            {
                ringn = 0;
            }
            var prevText = promptText;
            if (ringn === 0)
            {
                promptText = restoreText;
            }
            else
            {
                promptText = history[ringn - 1];
            }
            if (config.historyPreserveColumn)
            {
                if (promptText.length < column + 1)
                {
                    column = promptText.length;
                }
                else if (column === 0)
                {
                    column = promptText.length;
                }
            }
            else
            {
                column = promptText.length;
            }
            updatePromptDisplay();
        };

        function previousHistory()
        {
            rotateHistory(-1);
        };

        function nextHistory()
        {
            rotateHistory(1);
        };

        // Add something to the history ring
        function addToHistory(line)
        {
            history.push(line);
            restoreText = '';
        };

        // Delete the character at the current position
        function deleteCharAtPos()
        {
            if (column < promptText.length)
            {
                promptText =
                    promptText.substring(0, column) +
                    promptText.substring(column + 1);
                restoreText = promptText;
                return true;
            }
            else
            {
                return false;
            }
        };

        function backDelete()
        {
            if (moveColumn(-1))
            {
                deleteCharAtPos();
                updatePromptDisplay();
            }
        };

        function forwardDelete()
        {
            if (deleteCharAtPos())
            {
                updatePromptDisplay();
            }
        };

        function deleteUntilEnd()
        {
            while (deleteCharAtPos())
            {
                updatePromptDisplay();
            }
        };

        function clearCurrentPrompt()
        {
            extern.promptText("");
        };

        function clearScreen()
        {
            inner.children(".console-prompt-box, .console-message").slice(0, -1).remove();
            extern.report(" ");
            extern.focus();
        };

        function deleteNextWord()
        {
            // A word is defined within this context as a series of alphanumeric
            // characters.
            // Delete up to the next alphanumeric character
            while (
                column < promptText.length &&
                    !isCharAlphanumeric(promptText[column])
            )
            {
                deleteCharAtPos();
                updatePromptDisplay();
            }
            // Then, delete until the next non-alphanumeric character
            while (
                column < promptText.length &&
                    isCharAlphanumeric(promptText[column])
            )
            {
                deleteCharAtPos();
                updatePromptDisplay();
            }
        };

        function newLine()
        {
            var lines = promptText.split("\n");
            var last_line = lines.slice(-1)[0];
            var spaces = last_line.match(/^(\s*)/g)[0];
            var new_line = "\n" + spaces;
            promptText += new_line;
            moveColumn(new_line.length);
            updatePromptDisplay();
        };

        ////////////////////////////////////////////////////////////////////////
        // Validate command and trigger it if valid, or show a validation error
        function commandTrigger()
        {
            var line = promptText;
            if (typeof config.commandValidate === 'function')
            {
                var ret = config.commandValidate(line);
                if (ret === true || ret === false)
                {
                    if (ret)
                    {
                        handleCommand();
                    }
                }
                else
                {
                    commandResult(ret, "console-message-error");
                }
            }
            else
            {
                handleCommand();
            }
        };

        // Scroll to the bottom of the view
        function scrollToBottom()
        {
            var version = jQuery.fn.jquery.split('.');
            var major = parseInt(version[0]);
            var minor = parseInt(version[1]);

            // check if we're using jquery > 1.6
            if ((major === 1 && minor > 6) || major > 1)
            {
                inner.prop({ scrollTop: inner.prop("scrollHeight") });
            }
            else
            {
                inner.attr({ scrollTop: inner.attr("scrollHeight") });
            }
        };

        function cancelExecution()
        {
            if (typeof config.cancelHandle === 'function')
            {
                config.cancelHandle();
            }
        }

        ////////////////////////////////////////////////////////////////////////
        // Handle a command
        function handleCommand()
        {
            if (typeof config.commandHandle === 'function')
            {
                disableInput();
                addToHistory(promptText);
                var text = promptText;
                if (extern.continuedPrompt)
                {
                    if (continuedText)
                    {
                        continuedText += '\n' + promptText;
                    }
                    else
                    {
                        continuedText = promptText;
                    }
                }
                else
                {
                    continuedText = undefined;
                }
                if (continuedText)
                {
                    text = continuedText;
                }
                var ret = config.commandHandle(text,
                    function(msgs)
                    {
                        commandResult(msgs);
                    });
                if (extern.continuedPrompt && !continuedText)
                {
                    continuedText = promptText;
                }
                if (typeof ret === 'boolean')
                {
                    if (ret)
                    {
                        // Command succeeded without a result.
                        commandResult();
                    }
                    else
                    {
                        commandResult(
                            'Command failed.',
                            "console-message-error"
                        );
                    }
                }
                else if (typeof ret === "string")
                {
                    commandResult(ret, "console-message-success");
                }
                else if (typeof ret === 'object' && ret.length)
                {
                    commandResult(ret);
                }
                else if (extern.continuedPrompt)
                {
                    commandResult();
                }
            }
        };

        ////////////////////////////////////////////////////////////////////////
        // Disable input
        function disableInput()
        {
            acceptInput = false;
        };

        // Enable input
        function enableInput()
        {
            acceptInput = true;
        }

        ////////////////////////////////////////////////////////////////////////
        // Reset the prompt in invalid command
        function commandResult(msg, className)
        {
            column = -1;
            updatePromptDisplay();
            if (typeof msg === 'string')
            {
                message(msg, className);
            }
            else if ($.isArray(msg))
            {
                for (var x in msg)
                {
                    var ret = msg[x];
                    message(ret.msg, ret.className);
                }
            }
            else
            { // Assume it's a DOM node or jQuery object.
                inner.append(msg);
            }
            newPromptBox();
        };

        ////////////////////////////////////////////////////////////////////////
        // Report some message into the console
        function report(msg, className)
        {
            var text = promptText;
            promptBox.remove();
            commandResult(msg, className);
            extern.promptText(text);
        };

        ////////////////////////////////////////////////////////////////////////
        // Display a message
        function message(msg, className)
        {
            var mesg = $('<div class="console-message"></div>');
            if (className)
            {
                mesg.addClass(className);
            }
            mesg.filledText(msg).hide();
            inner.append(mesg);
            mesg.show();
        };

        ////////////////////////////////////////////////////////////////////////
        // Handle normal character insertion
        // data can either be a number, which will be interpreted as the
        // numeric value of a single character, or a string
        typer.consoleInsert = function(data)
        {
            // TODO: remove redundant indirection
            var text = (typeof data === 'number') ? String.fromCharCode(data) : data;
            var before = promptText.substring(0, column);
            var after = promptText.substring(column);
            promptText = before + text + after;
            moveColumn(text.length);
            restoreText = promptText;
            updatePromptDisplay();
        };

        ////////////////////////////////////////////////////////////////////////
        // Move to another column relative to this one
        // Negative means go back, positive means go forward.
        function moveColumn(n)
        {
            if (column + n >= 0 && column + n <= promptText.length)
            {
                column += n;
                return true;
            }
            else
            {
                return false;
            }
        };

        function moveForward()
        {
            if (moveColumn(1))
            {
                updatePromptDisplay();
                return true;
            }
            return false;
        };

        function moveBackward()
        {
            if (moveColumn(-1))
            {
                updatePromptDisplay();
                return true;
            }
            return false;
        };

        function moveToStart()
        {
            if (moveColumn(-column))
            {
                updatePromptDisplay();
            }
        };

        function moveToEnd()
        {
            if (moveColumn(promptText.length - column))
            {
                updatePromptDisplay();
            }
        };

        function moveToNextWord()
        {
            while (
                column < promptText.length &&
                    !isCharAlphanumeric(promptText[column]) &&
                    moveForward()
            )
            {
                //
            }

            while (
                column < promptText.length &&
                    isCharAlphanumeric(promptText[column]) &&
                    moveForward()
            )
            {
                //
            }
        };

        function moveToPreviousWord()
        {
            // Move backward until we find the first alphanumeric
            while (
                column - 1 >= 0 &&
                    !isCharAlphanumeric(promptText[column - 1]) &&
                    moveBackward()
            )
            {
                //
            }

            // Move until we find the first non-alphanumeric
            while (
                column - 1 >= 0 &&
                    isCharAlphanumeric(promptText[column - 1]) &&
                    moveBackward()
            )
            {
                //
            }
        };

        function isCharAlphanumeric(charToTest)
        {
            if (typeof charToTest === 'string')
            {
                var code = charToTest.charCodeAt();
                return (code >= 'A'.charCodeAt() && code <= 'Z'.charCodeAt()) ||
                    (code >= 'a'.charCodeAt() && code <= 'z'.charCodeAt()) ||
                    (code >= '0'.charCodeAt() && code <= '9'.charCodeAt());
            }
            return false;
        };

        function doComplete()
        {
            if (typeof config.completeHandle === 'function')
            {
                doCompleteDirectly();
            }
            else
            {
                issueComplete();
            }
        };

        function doCompleteDirectly()
        {
            if (typeof config.completeHandle === 'function')
            {
                var completions = config.completeHandle(promptText);
                var len = completions.length;
                if (len === 1)
                {
                    extern.promptText(promptText + completions[0]);
                }
                else if (len > 1 && config.cols)
                {
                    var prompt = promptText;
                    // Compute the number of rows that will fit in the width
                    var max = 0;
                    for (var i = 0; i < len; i++)
                    {
                        max = Math.max(max, completions[i].length);
                    }
                    max += 2;
                    var n = Math.floor(config.cols / max);
                    var buffer = "";
                    var col = 0;
                    for (i = 0; i < len; i++)
                    {
                        var completion = completions[i];
                        buffer += completions[i];
                        for (var j = completion.length; j < max; j++)
                        {
                            buffer += " ";
                        }
                        if (++col >= n)
                        {
                            buffer += "\n";
                            col = 0;
                        }
                    }
                    commandResult(buffer, "console-message-value");
                    extern.promptText(prompt);
                }
            }
        };

        function issueComplete()
        {
            if (typeof config.completeIssuer === 'function')
            {
                config.completeIssuer(promptText);
            }
        };

        function showCompletion(promptText, completions)
        {
            var len = completions.length;
            if (len === 1)
            {
                extern.promptText(promptText + completions[0]);
            }
            else if (len > 1 && config.cols)
            {
                var prompt = promptText;
                // Compute the number of rows that will fit in the width
                var max = 0;
                for (var i = 0; i < len; i++)
                {
                    max = Math.max(max, completions[i].length);
                }
                max += 2;
                var n = Math.floor(config.cols / max);
                var buffer = "";
                var col = 0;
                for (i = 0; i < len; i++)
                {
                    var completion = completions[i];
                    buffer += completions[i];
                    for (var j = completion.length; j < max; j++)
                    {
                        buffer += " ";
                    }
                    if (++col >= n)
                    {
                        buffer += "\n";
                        col = 0;
                    }
                }
                commandResult(buffer, "console-message-value");
                extern.promptText(prompt);
            }
        };

        function doNothing()
        {
        };

        extern.promptText = function(text)
        {
            if (typeof text === 'string')
            {
                promptText = text;
                column = promptText.length;
                updatePromptDisplay();
            }
            return promptText;
        };

        ////////////////////////////////////////////////////////////////////////
        // Update the prompt display
        function updatePromptDisplay()
        {
            var line = promptText;
            var html = '';
            if (column > 0 && line === '')
            {
                // When we have an empty line just display a cursor.
                html = cursor;
            }
            else if (column === promptText.length)
            {
                // We're at the end of the line, so we need to display
                // the text *and* cursor.
                html = htmlEncode(line) + cursor;
            }
            else
            {
                // Grab the current character, if there is one, and
                // make it the current cursor.
                var before = line.substring(0, column);
                var current = line.substring(column, column + 1);
                if (current)
                {
                    current =
                        '<span class="console-cursor">' +
                        htmlEncode(current) +
                        '</span>';
                }
                var after = line.substring(column + 1);
                html = htmlEncode(before) + current + htmlEncode(after);
            }
            prompt.html(html);
            scrollToBottom();
        };

        // Simple HTML encoding
        // Simply replace '<', '>' and '&'
        // TODO: Use jQuery's .html() trick, or grab a proper, fast
        // HTML encoder.
        function htmlEncode(text)
        {
            return (
                text.replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/</g, '&lt;')
                    .replace(/ /g, '&nbsp;')
                    .replace(/\n/g, '<br />')
            );
        };

        return extern;
    };
    // Simple utility for printing messages
    $.fn.filledText = function(txt)
    {
        $(this).text(txt);
        $(this).html($(this).html().replace(/\t/g, '&nbsp;&nbsp;').replace(/\n/g, '<br/>'));
        return this;
    };

    // Alternative method for focus without scrolling
    $.fn.focusWithoutScrolling = function()
    {
        var x = window.scrollX, y = window.scrollY;
        $(this).focus();
        window.scrollTo(x, y);
    };
})(jQuery);
/*! gridmanager - v0.3.1 - 2014-09-22
* http://neokoenig.github.io/jQuery-gridmanager/
* Copyright (c) 2014 Tom King; Licensed MIT */
(function($  ){

      /**
      * Main Gridmanager function
      * @method gridmanager
      * @returns gridmanager
     * @class gridmanager
     * @memberOf jQuery.fn
     */
    $.gridmanager = function(el, options){
        var gm = this;
        gm.$el = $(el);
        gm.el = el;
        gm.$el.data("gridmanager", gm);

         /**
         * API
         * @method appendHTMLSelectedCols
         * @param {string} html - HTML to append to selected columns
         * @returns null
         */
        gm.appendHTMLSelectedCols = function(html) {
          var canvas=gm.$el.find("#" + gm.options.canvasId);
          var cols = canvas.find(gm.options.colSelector);
          $.each(cols, function(){
            if($(this).hasClass(gm.options.gmEditClassSelected)) {
              $('.'+gm.options.gmEditRegion, this).append(html);
            }
          });
        };
         /**
         * INIT - Main initialising function to create the canvas, controls and initialise all click handlers
         * @method init
         * @returns null
         */
        gm.init = function(){
            gm.options = $.extend({},$.gridmanager.defaultOptions, options);
            gm.log("INIT");
            gm.addCSS(gm.options.cssInclude);
            gm.rteControl("init");
            gm.createCanvas();
            gm.createControls();
            gm.initControls();
            gm.initDefaultButtons();
            gm.initCanvas();
            gm.log("FINISHED");
        };

/*------------------------------------------ Canvas & Controls ---------------------------------------*/


        /**
         * Build and append the canvas, making sure existing HTML in the user's div is wrapped. Will also trigger Responsive classes to existing markup if specified
         * @method createCanvas
         * @returns null
         */
        gm.createCanvas = function(){
          gm.log("+ Create Canvas");
           var html=gm.$el.html();
                gm.$el.html("");
                $('<div/>', {'id': gm.options.canvasId, 'html':html }).appendTo(gm.$el);
                // Add responsive classes after initial loading of HTML, otherwise we lose the rows
                if(gm.options.addResponsiveClasses) {
                   gm.addResponsiveness(gm.$el.find("#" + gm.options.canvasId));
                }
                // Add default editable regions: we try and do this early on, as then we don't need to replicate logic to add regions
                if(gm.options.autoEdit){
                   gm.initMarkup(
                   gm.$el.find("#" + gm.options.canvasId)
                         .find("."+gm.options.colClass)
                         .not("."+gm.options.rowClass)
                      );
                }

        };

        /**
         * Looks for and wraps non gm commented markup
         * @method initMarkup
         * @returns null
         */
        gm.initMarkup = function(cols){
        var cTagOpen = '<!--'+gm.options.gmEditRegion+'-->',
            cTagClose = '<!--\/'+gm.options.gmEditRegion+'-->';

               // Loop over each column
               $.each(cols, function(i, col){
                    var hasGmComment = false,
                        hasNested = $(col).children().hasClass(gm.options.rowClass);

                      // Search for comments within column contents
                      // NB, at the moment this is just finding "any" comment for testing, but should search for <!--gm-*
                      $.each($(col).contents(), function(x, node){
                        if($(node)[0].nodeType === 8){
                            hasGmComment = true;
                        }
                      });

                    // Apply default commenting markup
                    if(!hasGmComment){
                        if(hasNested){
                           // Apply nested wrap
                           $.each($(col).contents(), function(i, val){
                             if($(val).hasClass(gm.options.rowClass)){
                                var prev=Array.prototype.reverse.call($(val).prevUntil("."+gm.options.rowClass)),
                                    after=$(val).nextUntil("."+gm.options.rowClass);

                                if(!$(prev).hasClass(gm.options.gmEditRegion)){
                                    $(prev).first().before(cTagOpen).end()
                                           .last().after(cTagClose);
                                }
                                if(!$(after).hasClass(gm.options.gmEditRegion)){
                                    $(after).first().before(cTagOpen).end()
                                            .last().after(cTagClose);
                                }
                             }
                           });

                        }
                        else {
                           // Is there anything to wrap?
                            if($(col).contents().length !== 0){
                              // Apply default comment wrap
                              $(col).html(cTagOpen+$(col).html()+cTagClose);
                            }
                        }
                      }
                  });
                  gm.log("initMarkup ran");
            };

        /*
          Init global default buttons on cols, rows or both
         */

        gm.initDefaultButtons = function(){
          if(gm.options.colSelectEnabled) {
            gm.options.customControls.global_col.push({callback: gm.selectColClick, loc: 'top', iconClass: 'fas fa-columns', title: 'Select Column'});
          }
          if(gm.options.editableRegionEnabled) {
            gm.options.customControls.global_col.push({callback: gm.addEditableAreaClick, loc: 'top', iconClass: 'fas fa-edit', title: 'Add Editable Region'});
          }
        };


        /**
         * Add missing reponsive classes to existing HTML
         * @method addResponsiveness
         * @param {} html
         * @returns CallExpression
         */
        gm.addResponsiveness = function(html) {
          if(html === '') { return; }
          var desktopRegex = gm.options.colDesktopClass+'(\\d+)',
              tabletRegex = gm.options.colTabletClass+'(\\d+)',
              phoneRegex = gm.options.colPhoneClass+'(\\d+)',
              desktopRegexObj = new RegExp(desktopRegex,'i'),
              tabletRegexObj = new RegExp(tabletRegex, 'i'),
              phoneRegexObj = new RegExp(phoneRegex, 'i');
              //new_html = '';
          return $(html).find(':regex(class,'+desktopRegex+'|'+tabletRegex+'|'+phoneRegex+')').each(function(i, el) {
            var elClasses = $(this).attr('class'), colNum = 2;
            var hasDesktop = desktopRegexObj.test(elClasses), hasPhone = phoneRegexObj.test(elClasses), hasTablet = tabletRegexObj.test(elClasses);

            colNum = (colNum = desktopRegexObj.exec(elClasses))? colNum[1] : ( (colNum = tabletRegexObj.exec(elClasses))? colNum[1] : phoneRegexObj.exec(elClasses)[1] );

            if(!hasDesktop) {
              $(this).addClass(gm.options.colDesktopClass+colNum);
            }
            if(!hasPhone) {
              $(this).addClass(gm.options.colPhoneClass+colNum);
            }
            if(!hasTablet) {
              $(this).addClass(gm.options.colTabletClass+colNum);
            }
            // Adds default column classes - probably shouldn't go here, but since we're doing an expensive search to add the responsive classes, it'll do for now.
            if(gm.options.addDefaultColumnClass){
              if(!$(this).hasClass(gm.options.colClass)){
                $(this).addClass(gm.options.colClass);
              }
            }
          });
        };

        /**
         * Build and prepend the control panel
         * @method createControls
         * @returns null
         */
        gm.createControls = function(){
          gm.log("+ Create Controls");
            var buttons=[];
            // Dynamically generated row template buttons
            $.each(gm.options.controlButtons, function(i, val){
              var _class=gm.generateButtonClass(val);
              buttons.push("<a title='Add Row " + _class + "' class='" + gm.options.controlButtonClass + " add" + _class + "'><span class='" + gm.options.controlButtonSpanClass + "'></span> " + _class + "</a>");
              gm.generateClickHandler(val);
            });

         /*
          Generate the control bar markup
        */
         gm.$el.prepend(
              $('<div/>',
                  {'id': gm.options.controlId, 'class': gm.options.gmClearClass }
              ).prepend(
                    $('<div/>', {"class": gm.options.rowClass}).html(
                       $('<div/>', {"class": gm.options.colDesktopClass + gm.options.colMax}).addClass(gm.options.colAdditionalClass).html(
                          $('<div/>', {'id': 'gm-addnew'})
                          .addClass(gm.options.gmBtnGroup)
                          .addClass(gm.options.gmFloatLeft).html(
                            buttons.join("")
                          )
                        ).append(gm.options.controlAppend)
                     )
                  )
              );
            };

        /**
         * Adds a CSS file or CSS Framework required for specific customizations
         * @method addCSS
         * @param {} myStylesLocation
         * @returns string
         */
        gm.addCSS = function(myStylesLocation) {
          if(myStylesLocation !== '') {
            $('<link rel="stylesheet" href="'+myStylesLocation+'">').appendTo("head");
          }
        };

        /**
         * Clean all occurrences of a substring
         * @method cleanSubstring
         * @param {} regex
         * @param {} source
         * @param {} replacement
         * @returns CallExpression
         */
        gm.cleanSubstring = function(regex, source, replacement) {
          return source.replace(new RegExp(regex, 'g'), replacement);
        };

        /**
         * Switches the layout mode for Desktop, Tablets or Mobile Phones
         * @method switchLayoutMode
         * @param {} mode
         * @returns null
         */
        gm.switchLayoutMode = function(mode) {
          var canvas=gm.$el.find("#" + gm.options.canvasId), temp_html = canvas.html(), regex1 = '', regex2 = '', uimode = '';
          // Reset previous changes
          temp_html = gm.cleanSubstring(gm.options.classRenameSuffix, temp_html, '');
          uimode = $('div.gm-layout-mode > button > span');
          // Do replacements
          switch (mode) {
            case 768:
              regex1 = '(' + gm.options.colDesktopClass  + '\\d+)';
              regex2 = '(' + gm.options.colPhoneClass + '\\d+)';
              gm.options.currentClassMode = gm.options.colTabletClass;
              gm.options.colSelector = gm.options.colTabletSelector;
              $(uimode).attr('class', 'fas fa-tablet').attr('title', 'Tablet');
              break;
            case 640:
              regex1 = '(' + gm.options.colDesktopClass  + '\\d+)';
              regex2 = '(' + gm.options.colTabletClass + '\\d+)';
              gm.options.currentClassMode = gm.options.colPhoneClass;
              gm.options.colSelector = gm.options.colPhoneSelector;
              $(uimode).attr('class', 'fas fa-mobile').attr('title', 'Phone');
              break;
            default:
              regex1 = '(' + gm.options.colPhoneClass  + '\\d+)';
              regex2 = '(' + gm.options.colTabletClass + '\\d+)';
              gm.options.currentClassMode = gm.options.colDesktopClass;
              gm.options.colSelector = gm.options.colDesktopSelector;
              $(uimode).attr('class', 'fas fa-desktop').attr('title', 'Desktop');
          }
          gm.options.layoutDefaultMode = mode;
          temp_html = temp_html.replace(new RegExp((regex1+'(?=[^"]*">)'), 'gm'), '$1'+gm.options.classRenameSuffix);
          temp_html = temp_html.replace(new RegExp((regex2+'(?=[^"]*">)'), 'gm'), '$1'+gm.options.classRenameSuffix);
          canvas.html(temp_html);
        };



        /**
         * Add click functionality to the buttons
         * @method initControls
         * @returns null
         */
        gm.initControls = function(){
          var canvas=gm.$el.find("#" + gm.options.canvasId);
           gm.log("+ InitControls Running");

           // Turn editing on or off
           gm.$el.on("click", ".gm-preview", function(){
               if(gm.status){
                gm.deinitCanvas();
                 $(this).parent().find(".gm-edit-mode").prop('disabled', true);
              } else {
                gm.initCanvas();
                 $(this).parent().find(".gm-edit-mode").prop('disabled', false);
              }
              $(this).toggleClass(gm.options.gmDangerClass);

            // Switch Layout Mode
            }).on("click", ".gm-layout-mode a", function() {
              gm.switchLayoutMode($(this).data('width'));

            // Switch editing mode
            }).on("click", ".gm-edit-mode", function(){
              if(gm.mode === "visual"){
                 gm.deinitCanvas();
                 canvas.html($('<textarea/>').attr("cols", 130).attr("rows", 25).val(canvas.html()));
                 gm.mode="html";
                 $(this).parent().find(".gm-preview, .gm-layout-mode > button").prop('disabled', true);
              } else {
                var editedSource=canvas.find("textarea").val();
                 canvas.html(editedSource);
                 gm.initCanvas();
                 gm.mode="visual";
                 $(this).parent().find(".gm-preview, .gm-layout-mode > button").prop('disabled', false);
              }
              $(this).toggleClass(gm.options.gmDangerClass);

            // Make region editable
            }).on("click", "." + gm.options.gmEditRegion + ' .'+gm.options.gmContentRegion, function(){
              //gm.log("clicked editable");
                if(!$(this).attr("contenteditable")){
                    $(this).attr("contenteditable", true);
                    gm.rteControl("attach", $(this) );
                }

            // Save Function
            }).on("click", "a.gm-save", function(){
                gm.deinitCanvas();
                gm.saveremote();

            /* Row settings */
            }).on("click", "a.gm-rowSettings", function(){
                 var row=$(this).closest(gm.options.rowSelector);
                 var drawer=row.find(".gm-rowSettingsDrawer");
                    if(drawer.length > 0){
                      drawer.remove();
                    } else {
                      row.prepend(gm.generateRowSettings(row));
                    }

            // Change Row ID via rowsettings
            }).on("blur", "input.gm-rowSettingsID", function(){
                var row=$(this).closest(gm.options.rowSelector);
                    row.attr("id", $(this).val());

            // Remove a class from a row via rowsettings
            }).on("click", ".gm-toggleRowClass", function(){
                var row=$(this).closest(gm.options.rowSelector);
                var theClass=$(this).text().trim();
                    row.toggleClass(theClass);
                    if(row.hasClass(theClass)){
                        $(this).addClass(gm.options.gmDangerClass);
                    } else {
                        $(this).removeClass(gm.options.gmDangerClass);
                    }

             /* Col settings */
            }).on("click", "a.gm-colSettings", function(){
                 var col=$(this).closest(gm.options.colSelector);
                 var drawer=col.find(".gm-colSettingsDrawer");
                    if(drawer.length > 0){
                      drawer.remove();
                    } else {
                      col.prepend(gm.generateColSettings(col));
                    }

              // Change Col ID via colsettings
            }).on("blur", "input.gm-colSettingsID", function(){
                 var col=$(this).closest(gm.options.colSelector);
                    col.attr("id", $(this).val());

            // Remove a class from a row via rowsettings
            }).on("click", ".gm-togglecolClass", function(){
                 var col=$(this).closest(gm.options.colSelector);
                var theClass=$(this).text().trim();
                    col.toggleClass(theClass);
                    if(col.hasClass(theClass)){
                        $(this).addClass(gm.options.gmDangerClass);
                    } else {
                        $(this).removeClass(gm.options.gmDangerClass);
                    }

            // Add new column to existing row
            }).on("click", "a.gm-addColumn", function(){
                $(this).parent().after(gm.createCol(2));
                gm.switchLayoutMode(gm.options.layoutDefaultMode);
                gm.reset();

            // Add a nested row
            }).on("click", "a.gm-addRow", function(){
               gm.log("Adding nested row");
               $(this).closest("." +gm.options.gmEditClass).append(
                  $("<div>").addClass(gm.options.rowClass)
                            .html(gm.createCol(6))
                            .append(gm.createCol(6)));
               gm.reset();

            // Decrease Column Size
            }).on("click", "a.gm-colDecrease", function(){
              var col = $(this).closest("." +gm.options.gmEditClass);
              var t=gm.getColClass(col);
                   if(t.colWidth > parseInt(gm.options.colResizeStep, 10)){
                       t.colWidth=(parseInt(t.colWidth, 10) - parseInt(gm.options.colResizeStep, 10));
                       col.switchClass(t.colClass, gm.options.currentClassMode + t.colWidth, 200);
                   }

            // Increase Column Size
            }).on("click", "a.gm-colIncrease", function(){
               var col = $(this).closest("." +gm.options.gmEditClass);
               var t=gm.getColClass(col);
                if(t.colWidth < gm.options.colMax){
                    t.colWidth=(parseInt(t.colWidth, 10) + parseInt(gm.options.colResizeStep, 10));
                    col.switchClass(t.colClass, gm.options.currentClassMode + t.colWidth, 200);
                }

            // Reset all teh things
            }).on("click", "a.gm-resetgrid", function(){
                canvas.html("");
                gm.reset();

            // Remove a col or row
            }).on("click", "a.gm-removeCol", function(){
               $(this).closest("." +gm.options.gmEditClass).animate({opacity: 'hide', width: 'hide', height: 'hide'}, 400, function(){$(this).remove();});
                 gm.log("Column Removed");

            }).on("click", "a.gm-removeRow", function(){
               gm.log($(this).closest("." +gm.options.colSelector));
               $(this).closest("." +gm.options.gmEditClass).animate({opacity: 'hide', height: 'hide'}, 400, function(){
                  $(this).remove();
                 // Check for multiple editable regions and merge?

                });
                 gm.log("Row Removed");

            // For all the above, prevent default.
            }).on("click", "a.gm-resetgrid, a.gm-remove, a.gm-removeRow, a.gm-save, button.gm-preview, a.gm-viewsource, a.gm-addColumn, a.gm-colDecrease, a.gm-colIncrease", function(e){
               gm.log("Clicked: "   + $.grep((this).className.split(" "), function(v){
                 return v.indexOf('gm-') === 0;
               }).join());
               e.preventDefault();
            });

        };

        /**
         * Add any custom buttons globally on all rows / cols
         * returns void
         * @method initGlobalCustomControls
         * @returns null
         */
        gm.initGlobalCustomControls=function(){
          var canvas=gm.$el.find("#" + gm.options.canvasId),
              elems=[],
              callback = null,
              btnClass = '';

          $.each(['row','col'], function(i, control_type) {
            if(typeof gm.options.customControls['global_'+control_type] !== 'undefined') {
              elems=canvas.find(gm.options[control_type+'Selector']);
              $.each(gm.options.customControls['global_'+control_type], function(i, curr_control) {
                // controls with no valid callbacks set are skipped
                if(typeof curr_control.callback === 'undefined') { return; }

                if(typeof curr_control.loc === 'undefined') {
                  curr_control.loc = 'top';
                }
                if(typeof curr_control.iconClass === 'undefined') {
                  curr_control.iconClass = 'fas fa-file-code';
                }
                if(typeof curr_control.btnLabel === 'undefined') {
                  curr_control.btnLabel = '';
                }
                if(typeof curr_control.title === 'undefined') {
                  curr_control.title = '';
                }

                btnClass = (typeof curr_control.callback === 'function')? (i+'_btn') : (curr_control.callback);

                btnObj = {
                  element: 'a',
                  btnClass: 'gm-'+btnClass,
                  iconClass: curr_control.iconClass,
                  btnLabel: curr_control.btnLabel,
                  title: curr_control.title
                };

                $.each(elems, function(i, current_elem) {
                  gm.setupCustomBtn(current_elem, curr_control.loc, 'window', curr_control.callback, btnObj);
                });
              });
            }
          });
        };

        /**
         * Add any custom buttons configured on the data attributes
         * returns void
         * @method initCustomControls
         * @returns null
         */
        gm.initCustomControls=function(){
          var canvas=gm.$el.find("#" + gm.options.canvasId),
              callbackParams = '',
              callbackScp = '',
              callbackFunc = '',
              btnLoc = '',
              btnObj = {},
              iconClass = '',
              btnLabel = '';

          $( ('.'+gm.options.colClass+':data,'+' .'+gm.options.rowClass+':data'), canvas).each(function(){
            for(prop in $(this).data()) {
              if(prop.indexOf('gmButton') === 0) {
                callbackFunc = prop.replace('gmButton','');
                callbackParams = $(this).data()[prop].split('|');
                // Cannot accept 0 params or empty callback function name
                if(callbackParams.length === 0 || callbackFunc === '') { break; }

                btnLoc =    (typeof callbackParams[3] !== 'undefined')? callbackParams[3] : 'top';
                iconClass = (typeof callbackParams[2] !== 'undefined')? callbackParams[2] : 'fas fa-file-code';
                btnLabel =  (typeof callbackParams[1] !== 'undefined')? callbackParams[1] : '';
                callbackScp = callbackParams[0];
                btnObj = {
                  element: 'a',
                  btnClass: ('gm-'+callbackFunc),
                  iconClass:  iconClass,
                  btnLabel: btnLabel
                };
                gm.setupCustomBtn(this, btnLoc, callbackScp, callbackFunc, btnObj);
                break;
              }
            }
          });
        };



        /**
         * Configures custom button click callback function
         * returns bool, true on success false on failure
         * @container - container element that wraps the toolbar
         * @btnLoc - button location: "top" for the upper toolbar and "bottom" for the lower one
         * @callbackScp - function scope to use. "window" for global scope
         * @callbackFunc - function name to call when the user clicks the custom button
         * @btnObj - button object that contains properties for: tag name, title, icon class, button class and label
         * @method setupCustomBtn
         * @param {} container
         * @param {} btnLoc
         * @param {} callbackScp
         * @param {} callbackFunc
         * @param {} btnObj
         * @returns Literal
         */
        gm.setupCustomBtn=function(container, btnLoc, callbackScp, callbackFunc, btnObj) {
          var callback = null;

          // Ensure we have a valid callback, if not skip
          if(typeof callbackFunc === 'string') {
            callback = gm.isValidCallback(callbackScp, callbackFunc.toLowerCase());
          } else if(typeof callbackFunc === 'function') {
            callback = callbackFunc;
          } else {
            return false;
          }
          // Set default button location to the top toolbar
          btnLoc = (btnLoc === 'bottom')? ':last' : ':first';

          // Add the button to the selected toolbar
          $( ('.'+gm.options.gmToolClass+btnLoc), container).append(gm.buttonFactory([btnObj])).find(':last').on('click', function(e) {
            callback(container, this);
            e.preventDefault();
          });
          return true;
        };

        /*
          Clears any comments inside a given element

          @elem - element to clear html comments on

          returns void
         */

        gm.clearComments = function(elem) {
          $(elem, '#'+gm.options.canvasId).contents().filter(function() {
            return this.nodeType === 8;
          }).remove();
        };

        /**
         * Checks that a callback exists and returns it if available
         * returns function
         * @callbackScp - function scope to use. "window" for global scope
         * @callbackFunc - function name to call when the user clicks the custom button
         * @method isValidCallback
         * @param {} callbackScp
         * @param {} callbackFunc
         * @returns callback
         */
        gm.isValidCallback=function(callbackScp, callbackFunc){
          var callback = null;

          if(callbackScp === 'window') {
            if(typeof window[callbackFunc] === 'function') {
              callback = window[callbackFunc];
            } else { // If the global function is not valid there is nothing to do
              return false;
            }
          } else if(typeof window[callbackScp][callbackFunc] === 'function') {
            callback = window[callbackScp][callbackFunc];
          } else { // If there is no valid callback there is nothing to do
            return false;
          }
          return callback;
        };

      /**
         * Get the col-md-6 class, returning 6 as well from column
         * returns colDesktopClass: the full col-md-6 class
         * colWidth: just the last integer of classname
         * @col - column to look at
         * @method getColClass
         * @param {} col
         * @return ObjectExpression
         */
        gm.getColClass=function(col){
            var colClass=$.grep(col.attr("class").split(" "), function(v){
                return v.indexOf(gm.options.currentClassMode) === 0;
                }).join();
            var colWidth=colClass.replace(gm.options.currentClassMode, "");
                return {colClass:colClass, colWidth:colWidth};
        };

        /*
          Run (if set) any custom init/deinit filters on the gridmanager canvas
            @canvasElem - canvas wrapper container with the entire layout html
            @isInit - flag that indicates if the method is running during init or deinit.
                      true - if its running during the init process, or false - during the deinit (cleanup) process

            returns void
         */

        gm.runFilter=function(canvasElem, isInit){
          if(typeof gm.options.filterCallback === 'function') {
            gm.options.filterCallback(canvasElem, isInit);
          }
          if(gm.options.editableRegionEnabled) {
            gm.editableAreaFilter(canvasElem, isInit);
          }
        };

        /**
         * Turns canvas into gm-editing mode - does most of the hard work here
         * @method initCanvas
         * @returns null
         */
        gm.initCanvas = function(){
          // cache canvas
          var canvas=gm.$el.find("#" + gm.options.canvasId);
          gm.switchLayoutMode(gm.options.layoutDefaultMode);
          var cols=canvas.find(gm.options.colSelector);
          var rows=canvas.find(gm.options.rowSelector);
           gm.log("+ InitCanvas Running");
              // Show the template controls
              gm.$el.find("#gm-addnew").show();
              // Sort Rows First
              gm.activateRows(rows);
              // Now Columns
              gm.activateCols(cols);
              // Run custom init callback filter
              gm.runFilter(canvas, true);
              // Get cols & rows again after filter execution
              cols=canvas.find(gm.options.colSelector);
              rows=canvas.find(gm.options.rowSelector);
              // Make Rows sortable
              canvas.sortable({
                items: rows,
                axis: 'y',
                placeholder: gm.options.rowSortingClass,
                handle: ".gm-moveRow",
                forcePlaceholderSize: true,   opacity: 0.7,  revert: true,
                tolerance: "pointer",
                cursor: "move"
               });
              /*
              Make columns sortable
              This needs to be applied to each element, otherwise containment leaks
              */
              $.each(rows, function(i, val){
                  $(val).sortable({
                  items: $(val).find(gm.options.colSelector),
                  axis: 'x',
                  handle: ".gm-moveCol",
                  forcePlaceholderSize: true,   opacity: 0.7,  revert: true,
                  tolerance: "pointer",
                  containment: $(val),
                  cursor: "move"
                });
              });
              /* Make rows sortable
              cols.sortable({
                items: gm.options.rowSelector,
                axis: 'y',
                handle: ".gm-moveRow",
                forcePlaceholderSize: true,   opacity: 0.7,  revert: true,
                tolerance: "pointer",
                cursor: "move"
              }); */
            gm.status=true;
            gm.mode="visual";
            gm.initCustomControls();
            gm.initGlobalCustomControls();
            gm.initNewContentElem();
        };

        /**
         * Removes canvas editing mode
         * @method deinitCanvas
         * @returns null
         */
        gm.deinitCanvas = function(){
          // cache canvas
          var canvas=gm.$el.find("#" + gm.options.canvasId);
          var cols=canvas.find(gm.options.colSelector);
          var rows=canvas.find(gm.options.rowSelector);

           gm.log("- deInitCanvas Running");
              // Hide template control
              gm.$el.find("#gm-addnew").hide();
              // Sort Rows First
              gm.deactivateRows(rows);
              // Now Columns
              gm.deactivateCols(cols);
              // Clean markup
              gm.cleanup();
              gm.runFilter(canvas, false);
              gm.status=false;
        };

        /**
         * Push cleaned div content somewhere to save it
         * @method saveremote
         * @returns null
         */
        gm.saveremote =  function(){
        var canvas=gm.$el.find("#" + gm.options.canvasId);
            $.ajax({
              type: "POST",
              url:  gm.options.remoteURL,
              data: {content: canvas.html()}
            });
            gm.log("Save Function Called");
        };


/*------------------------------------------ ROWS ---------------------------------------*/
        /**
         * Look for pre-existing rows and add editing tools as appropriate
         * @rows: elements to act on
         * @method activateRows
         * @param {object} rows - rows to act on
         * @returns null
         */
        gm.activateRows = function(rows){
           gm.log("++ Activate Rows");
           rows.addClass(gm.options.gmEditClass)
               .prepend(gm.toolFactory(gm.options.rowButtonsPrepend))
               .append(gm.toolFactory(gm.options.rowButtonsAppend));
        };

         /**
         * Look for pre-existing rows and remove editing classes as appropriate
         * @rows: elements to act on
         * @method deactivateRows
         * @param {object} rows - rows to act on
         * @returns null
         */
        gm.deactivateRows = function(rows){
           gm.log("-- DeActivate Rows");
           rows.removeClass(gm.options.gmEditClass)
               .removeClass("ui-sortable")
               .removeAttr("style");
        };

        /**
         * Create a single row with appropriate editing tools & nested columns
         * @method createRow
         * @param {array} colWidths - array of css class integers, i.e [2,4,5]
         * @returns row
         */
        gm.createRow = function(colWidths){
          var row= $("<div/>", {"class": gm.options.rowClass + " " + gm.options.gmEditClass});
             $.each(colWidths, function(i, val){
                row.append(gm.createCol(val));
              });
                gm.log("++ Created Row");
          return row;
        };

        /**
         * Create the row specific settings box
         * @method generateRowSettings
         * @param {object} row - row to act on
         * @return MemberExpression
         */
        gm.generateRowSettings = function(row){
         // Row class toggle buttons
          var classBtns=[];
              $.each(gm.options.rowCustomClasses, function(i, val){
                  var btn=$("<button/>")
                  .addClass("gm-toggleRowClass")
                  .addClass(gm.options.controlButtonClass)
                  .append(
                    $("<span/>")
                    .addClass(gm.options.controlButtonSpanClass)
                  ).append(" " + val);

                   if(row.hasClass(val)){
                       btn.addClass(gm.options.gmDangerClass);
                    }
                   classBtns.push(btn[0].outerHTML);
             });
          // Row settings drawer
          var html=$("<div/>")
              .addClass("gm-rowSettingsDrawer")
              .addClass(gm.options.gmToolClass)
              .addClass(gm.options.gmClearClass)
              .prepend($("<div />")
                .addClass(gm.options.gmBtnGroup)
                .addClass(gm.options.gmFloatLeft)
                .html(classBtns.join("")))
              .append($("<div />").addClass("pull-right").html(
                $("<label />").html("Row ID ").append(
                $("<input>").addClass("gm-rowSettingsID").attr({type: 'text', placeholder: 'Row ID', value: row.attr("id")})
                )
              ));

          return html[0].outerHTML;
        };

         /**
         * Create the col specific settings box
         * @method generateColSettings
         * @param {object} col - Column to act on
         * @return MemberExpression
         */
        gm.generateColSettings = function(col){
         // Col class toggle buttons
          var classBtns=[];
              $.each(gm.options.colCustomClasses, function(i, val){
                  var btn=$("<button/>")
                  .addClass("gm-togglecolClass")
                  .addClass(gm.options.controlButtonClass)
                  .append(
                    $("<span/>")
                    .addClass(gm.options.controlButtonSpanClass)
                  ).append(" " + val);
                   if(col.hasClass(val)){
                       btn.addClass(gm.options.gmDangerClass);
                    }
                   classBtns.push(btn[0].outerHTML);
             });
          // col settings drawer
          var html=$("<div/>")
              .addClass("gm-colSettingsDrawer")
              .addClass(gm.options.gmToolClass)
              .addClass(gm.options.gmClearClass)
              .prepend($("<div />")
                .addClass(gm.options.gmBtnGroup)
                .addClass(gm.options.gmFloatLeft)
                .html(classBtns.join("")))
              .append($("<div />").addClass("pull-right").html(
                $("<label />").html("col ID ").append(
                $("<input>")
                  .addClass("gm-colSettingsID")
                  .attr({type: 'text', placeholder: 'col ID', value: col.attr("id")})
                )
              ));

          return html[0].outerHTML;
        };

/*------------------------------------------ COLS ---------------------------------------*/



        /**
         * Look for pre-existing columns and add editing tools as appropriate
         * @method activateCols
         * @param {object} cols - elements to act on
         * @returns null
         */
        gm.activateCols = function(cols){
         cols.addClass(gm.options.gmEditClass);
            // For each column,
            $.each(cols, function(i, column){
              $(column).prepend(gm.toolFactory(gm.options.colButtonsPrepend));
              $(column).append(gm.toolFactory(gm.options.colButtonsAppend));
            });
           gm.log("++ Activate Cols Ran");
        };

        /**
         * Look for pre-existing columns and removeediting tools as appropriate
         * @method deactivateCols
         * @param {object} cols - elements to act on
         * @returns null
         */
        gm.deactivateCols = function(cols){
           cols.removeClass(gm.options.gmEditClass)
               .removeClass(gm.options.gmEditClassSelected)
               .removeClass("ui-sortable");
           $.each(cols.children(), function(i, val){
            // Grab contents of editable regions and unwrap
            if($(val).hasClass(gm.options.gmEditRegion)){
              if($(val).html() !== ''){
                $(val).contents().unwrap();
              } else {
                // Deals with empty editable regions
                $(val).remove();
              }
            }
           });
           gm.log("-- deActivate Cols Ran");
        };

        /**
          * Create a single column with appropriate editing tools
          * @method createCol
          * @param {integer} size - width of the column to create, i.e 6
          * @returns null
          */
         gm.createCol =  function(size){
         var col= $("<div/>")
            .addClass(gm.options.colClass)
            .addClass(gm.options.colDesktopClass + size)
            .addClass(gm.options.colTabletClass + size)
            .addClass(gm.options.colPhoneClass + size)
            .addClass(gm.options.gmEditClass)
            .addClass(gm.options.colAdditionalClass)
            .html(gm.toolFactory(gm.options.colButtonsPrepend))
            .prepend(gm.toolFactory(gm.options.colButtonsPrepend))
            .append(gm.toolFactory(gm.options.colButtonsAppend));
            gm.log("++ Created Column " + size);
            return col;
        };


/*------------------------------------------ Editable Regions ---------------------------------------*/

        /*
          Callback called when a the new editable area button is clicked

            @container - container element that wraps the select button
            @btn       - button element that was clicked

            returns void
         */
        gm.addEditableAreaClick = function(container, btn) {
          var cTagOpen = '<!--'+gm.options.gmEditRegion+'-->',
              cTagClose = '<!--\/'+gm.options.gmEditRegion+'-->',
              elem = null;
          $(('.'+gm.options.gmToolClass+':last'),container)
          .before(elem = $('<div>').addClass(gm.options.gmEditRegion+' '+gm.options.contentDraggableClass)
            .append(gm.options.controlContentElem+'<div class="'+gm.options.gmContentRegion+'"><p>New Content</p></div>')).before(cTagClose).prev().before(cTagOpen);
          gm.initNewContentElem(elem);
        };

          /*
          Prepares any new content element inside columns so inner toolbars buttons work
          and any drag & drop functionality.
            @newElem  - Container of the new content element added into a col
            returns void
         */

        gm.initNewContentElem = function(newElem) {
          var parentCols = null;

          if(typeof newElem === 'undefined') {
            parentCols = gm.$el.find('.'+gm.options.colClass);
          } else {
            parentCols = newElem.closest('.'+gm.options.colClass);
          }

          $.each(parentCols, function(i, col) {
            $(col).on('click', '.gm-delete', function(e) {
              $(this).closest('.'+gm.options.gmEditRegion).remove();
              gm.resetCommentTags(col);
              e.preventDefault();
            });
            $(col).sortable({
              items: '.'+gm.options.contentDraggableClass,
              axis: 'y',
              placeholder: gm.options.rowSortingClass,
              handle: "."+gm.options.controlMove,
              forcePlaceholderSize: true, opacity: 0.7, revert: true,
              tolerance: "pointer",
              cursor: "move",
              stop: function(e, ui) {
                gm.resetCommentTags($(ui.item).parent());
              }
             });
          });

        };

        /*
          Resets the comment tags for editable elements
          @elem - Element to reset the editable comments on
          returns void
         */

        gm.resetCommentTags = function(elem) {
          var cTagOpen = '<!--'+gm.options.gmEditRegion+'-->',
              cTagClose = '<!--\/'+gm.options.gmEditRegion+'-->';
          // First remove all existing comments
          gm.clearComments(elem);
          // Now replace these comment tags
          $('.'+gm.options.gmEditRegion, elem).before(cTagOpen).after(cTagClose);
        };

        /*
          Callback called when a the column selection button is clicked
            @container - container element that wraps the select button
            @btn       - button element that was clicked
            returns void
         */

        gm.selectColClick = function(container, btn) {
          $(btn).toggleClass('fas fa-square fas fa-check-square');
          if($(btn).hasClass('fa-check-square')) {
            $(container).addClass(gm.options.gmEditClassSelected);
          } else {
            $(container).removeClass(gm.options.gmEditClassSelected);
          }
        };


        /*
          Filter method to restore editable regions in edit mode.
         */
        gm.editableAreaFilter = function(canvasElem, isInit) {
          if(isInit) {
            var cTagOpen = '<!--'+gm.options.gmEditRegion+'-->',
                cTagClose = '<!--\/'+gm.options.gmEditRegion+'-->',
                regex = new RegExp('(?:'+cTagOpen+')\\s*([\\s\\S]+?)\\s*(?:'+cTagClose+')', 'g'),
                html = $(canvasElem).html(),
                rep = cTagOpen+'<div class="'+gm.options.gmEditRegion+' '+gm.options.contentDraggableClass+'">'+gm.options.controlContentElem +'<div class="'+gm.options.gmContentRegion+'">$1</div></div>'+cTagClose;

            html = html.replace(regex, rep);
            $(canvasElem).html(html);
            gm.log("editableAreaFilter init ran");
          } else {
            $('.'+gm.options.controlNestedEditable, canvasElem).remove();
            $('.'+gm.options.gmContentRegion).contents().unwrap();

            gm.log("editableAreaFilter deinit ran");
          }
        };

/*------------------------------------------ BTNs ---------------------------------------*/
        /**
         * Returns an editing div with appropriate btns as passed in
         * @method toolFactory
         * @param {array} btns - Array of buttons (see options)
         * @return MemberExpression
         */
        gm.toolFactory=function(btns){
           var tools=$("<div/>")
              .addClass(gm.options.gmToolClass)
              .addClass(gm.options.gmClearClass)
              .html(gm.buttonFactory(btns));
           return tools[0].outerHTML;
        };

        /**
         * Returns html string of buttons
         * @method buttonFactory
         * @param {array} btns - Array of button configurations (see options)
         * @return CallExpression
         */
        gm.buttonFactory=function(btns){
          var buttons=[];
          $.each(btns, function(i, val){
            val.btnLabel = (typeof val.btnLabel === 'undefined')? '' : val.btnLabel;
            val.title = (typeof val.title === 'undefined')? '' : val.title;
            buttons.push("<" + val.element +" title='" + val.title + "' class='" + val.btnClass + "'><span class='"+val.iconClass+"'></span>&nbsp;" + val.btnLabel + "</" + val.element + "> ");
          });
          return buttons.join("");
        };

        /**
         * Basically just turns [2,4,6] into 2-4-6
         * @method generateButtonClass
         * @param {array} arr - An array of widths
         * @return string
         */
        gm.generateButtonClass=function(arr){
            var string="";
              $.each(arr, function( i , val ) {
                    string=string + "-" + val;
              });
              return string;
        };

        /**
         * click handlers for dynamic row template buttons
         * @method generateClickHandler
         * @param {array} colWidths - array of column widths, i.e [2,3,2]
         * @returns null
         */
        gm.generateClickHandler= function(colWidths){
          var string="a.add" + gm.generateButtonClass(colWidths);
          var canvas=gm.$el.find("#" + gm.options.canvasId);
              gm.$el.on("click", string, function(e){
                gm.log("Clicked " + string);
                canvas.prepend(gm.createRow(colWidths));
                gm.reset();
                e.preventDefault();
            });
        };


/*------------------------------------------ RTEs ---------------------------------------*/
        /**
         * Starts, stops, looks for and  attaches RTEs
         * @method rteControl
         * @param {string} action  - options are init, attach, stop
         * @param {object} element  - object to attach an RTE to
         * @returns null
         */
        gm.rteControl=function(action, element){
          gm.log("RTE " + gm.options.rte + ' ' +action);

          switch (action) {
            case 'init':
                if(typeof window.CKEDITOR !== 'undefined'){
                    gm.options.rte='ckeditor';
                    gm.log("++ CKEDITOR Found");
                    window.CKEDITOR.disableAutoInline = true;
               }
                if(typeof window.tinymce !== 'undefined'){
                    gm.options.rte='tinymce';
                    gm.log("++ TINYMCE Found");
                }
                break;
             case 'attach':
                switch (gm.options.rte) {
                    case 'tinymce':
                    if(!(element).hasClass("mce-content-body")){
                      element.tinymce(gm.options.tinymce.config);
                    }
                    break;

                    case 'ckeditor':
                      $(element).ckeditor(gm.options.ckeditor);

                    break;
                    default:
                        gm.log("No RTE specified for attach");
                }
                break; //end Attach
            case 'stop':
                switch (gm.options.rte) {
                    case 'tinymce':
                      // destroy TinyMCE
                      window.tinymce.remove();
                         gm.log("-- TinyMCE destroyed");
                    break;

                    case 'ckeditor':
                      // destroy ckeditor
                         for(var name in window.CKEDITOR.instances)
                        {
                          window.CKEDITOR.instances[name].destroy();
                        }
                         gm.log("-- CKEDITOR destroyed");
                    break;

                    default:
                        gm.log("No RTE specified for stop");
                }
              break; //end stop

              default:
                  gm.log("No RTE Action specified");
            }
        };


/*------------------------------------------ Useful functions ---------------------------------------*/

        /**
         * Quick reset - deinit & init the canvas
         * @method reset
         * @returns null
         */
        gm.reset=function(){
            gm.log("~~RESET~~");
            gm.deinitCanvas();
            gm.initCanvas();
        };

        /**
         * Remove all extraneous markup
         * @method cleanup
         * @returns null
         */

        gm.cleanup =  function(){

          var canvas,
              content;

              // cache canvas
              canvas = gm.$el.find("#" + gm.options.canvasId);

              /**
               * Determine the current edit mode and get the content based upon the resultant
               * context to prevent content in source mode from being lost on save, as such:
               *
               * edit mode (source): canvas.find('textarea').val()
               * edit mode (visual): canvas.html()
               */
              content = gm.mode !== "visual" ? canvas.find('textarea').val() : canvas.html();

              // Clean any temp class strings
              canvas.html(gm.cleanSubstring(gm.options.classRenameSuffix, content, ''));

              // Clean column markup
              canvas.find(gm.options.colSelector)
                  .removeAttr("style")
                  .removeAttr("spellcheck")
                  .removeClass("mce-content-body").end()
              // Clean img markup
                  .find("img")
                  .removeAttr("style")
                  .addClass("img-responsive")
                  .removeAttr("data-cke-saved-src")
                  .removeAttr("data-mce-src").end()
              // Remove Tools
                  .find("." + gm.options.gmToolClass).remove();
              // Destroy any RTEs
                  gm.rteControl("stop");
              gm.log("~~Cleanup Ran~~");
        };

        /**
         * Generic logging function
         * @method log
         * @param {object} logvar - The Object or string you want to pass to the console
         * @returns null
         * @property {boolean} gm.options.debug
         */
        gm.log = function(logvar){
          if(gm.options.debug){
            if ((window['console'] !== undefined)) {
              window.console.log(logvar);
              }
            }
        };
        // Run initializer
        gm.init();
    };



    /**
     Options which can be overridden by the .gridmanager() call on the requesting page------------------------------------------------------
    */
    $.gridmanager.defaultOptions = {
     /*
     General Options---------------
    */

        debug: 0,

        // Are you columns selectable
        colSelectEnabled: true,

        // Can add editable regions?
        editableRegionEnabled: true,

        // Should we try and automatically create editable regions?
        autoEdit: true,

        // URL to save to
        remoteURL: "/replace-with-your-url",

        // Custom CSS to load
        cssInclude: "",

        // Filter callback. Callback receives two params: the template grid element and whether is called from the init or deinit method
        filterCallback: null,
  /*
     Canvas---------------
    */
        // Canvas ID
        canvasId: "gm-canvas",

  /*
     Control Bar---------------
  */
        // Top Control Row ID
        controlId:  "gm-controls",

        // Move handle class
        controlMove: 'gm-move',

        // Editable element toolbar class
        controlNestedEditable: 'gm-controls-element',

        // Array of buttons for row templates
        controlButtons: [[12], [6,6], [4,4,4], [3,3,3,3], [2,2,2,2,2,2], [2,8,2], [3,6,3], [4,8], [8,4]],

        // Custom Global Controls for rows & cols - available props: global_row, global_col
        customControls: { global_row: [], global_col: [] },

        // Default control button class
        controlButtonClass: "btn btn-sm btn-info",

        // Default control button icon
        controlButtonSpanClass: "fas fa-plus-circle",

        // Control bar RH dropdown markup
        controlAppend: "<div class='btn-group float-right'>" +
            "<button title='Edit Source Code' type='button' class='btn btn-sm btn-info gm-edit-mode'><i class='fas fa-code'></i></button>" +
            "<button title='Preview' type='button' class='btn btn-sm btn-info gm-preview'><i class='fas fa-eye'></i></button>" +
            "<div class='dropdown pull-left gm-layout-mode'><button type='button' class='btn btn-sm btn-info dropdown-toggle' data-toggle='dropdown'><span class='caret'></span></button>" +
            "<ul class='dropdown-menu' role='menu'>" +
            "<li><a data-width='auto' title='Desktop'><span class='fas fa-desktop mr-2'></span> Desktop</a></li>" +
            "<li><a title='Tablet' data-width='768'><span class='fas fa-tablet mr-2'></span> Tablet</a></li>" +
            "<li><a title='Phone' data-width='640'><span class='fas fa-mobile mr-2'></span> Phone</a></li>" +
            "</ul></div></div>",

        // Controls for content elements
        controlContentElem: '<div class="gm-controls-element"><a class="gm-move fas fa-arrows-alt" href="#" title="Move"></a><a class="gm-delete fas fa-times" href="#" title="Delete"></a></div>',
   /*
     General editing classes---------------
  */
        // Standard edit class, applied to active elements
        gmEditClass: "gm-editing",

        // Applied to the currently selected element
        gmEditClassSelected: "gm-editing-selected",

        // Editable region class
        gmEditRegion: "gm-editable-region",

        // Editable container class
        gmContentRegion: "gm-content",

        // Tool bar class which are inserted dynamically
        gmToolClass: "gm-tools",

        // Clearing class, used on most toolbars
        gmClearClass: "clearfix",

        // generic float left and right
        gmFloatLeft: "float-left",
        gmFloatRight: "float-right",
        gmBtnGroup:  "btn-group",
        gmDangerClass: "btn-danger",


  /*
     Rows---------------
  */
        // Generic row class. change to row--fluid for fluid width in Bootstrap
        rowClass: "row-fluid",

        // Used to find rows - change to div.row-fluid for fluid width
        rowSelector: "div.row-fluid",

        // class of background element when sorting rows
        rowSortingClass: "alert-warning",

        // Buttons at the top of each row
        rowButtonsPrepend: [
                {
                 title:"Move",
                 element: "a",
                 btnClass: "gm-moveRow float-left",
                 iconClass: "fas fa-arrows-alt"
              },
                {
                   title:"New Column",
                   element: "a",
                   btnClass: "gm-addColumn float-left  ",
                   iconClass: "fas fa-plus"
                },
                 {
                   title:"Row Settings",
                   element: "a",
                   btnClass: "float-right gm-rowSettings",
                   iconClass: "fas fa-cog"
                }

            ],

        // Buttons at the bottom of each row
        rowButtonsAppend: [
                {
                 title:"Remove row",
                 element: "a",
                 btnClass: "float-right gm-removeRow",
                 iconClass: "fas fa-trash"
                }
            ],


        // CUstom row classes - add your own to make them available in the row settings
        rowCustomClasses: ["example-class", "test-class"],

  /*
     Columns--------------
  */
        // Column Class
        colClass: "column float-left",

        // Class to allow content to be draggable
        contentDraggableClass: 'gm-content-draggable',

        // Adds any missing classes in columns for muti-device support.
        addResponsiveClasses: true,

        // Adds "colClass" to columns if missing: addResponsiveClasses must be true for this to activate
        addDefaultColumnClass: true,

       // Generic desktop size layout class
        colDesktopClass: "col-lg-",

        // Generic tablet size layout class
        colTabletClass: "col-md-",

        // Generic phone size layout class
        colPhoneClass: "col-xs-",

        // Wild card column desktop selector
        colDesktopSelector: "div[class*=col-lg-]",

        // Wildcard column tablet selector
        colTabletSelector: "div[class*=col-md-]",

        // Wildcard column phone selector
        colPhoneSelector: "div[class*=col-xs-]",

        // String used to temporarily rename column classes not in use
        classRenameSuffix: "-clsstmp",

        // Default layout mode loaded after init
        layoutDefaultMode: "auto",

        // Current layout column mode
        currentClassMode: "",

        // Additional column class to add (foundation needs columns, bs3 doesn't)
        colAdditionalClass: "",

        // Buttons to prepend to each column
        colButtonsPrepend: [
              {
                 title:"Move",
                 element: "a",
                 btnClass: "gm-moveCol float-left",
                 iconClass: "fas fa-arrows-alt"
              },
              {
                   title:"Column Settings",
                   element: "a",
                   btnClass: "float-right gm-colSettings",
                   iconClass: "fas fa-cog"
                },
               {
                 title:"Make Column Narrower",
                 element: "a",
                 btnClass: "gm-colDecrease float-left",
                 iconClass: "fas fa-minus"
              },
              {
               title:"Make Column Wider",
               element: "a",
               btnClass: "gm-colIncrease float-left",
               iconClass: "fas fa-plus"
              }
            ],

        // Buttons to append to each column
        colButtonsAppend: [
                {
                 title:"Add Nested Row",
                 element: "a",
                 btnClass: "float-left gm-addRow",
                 iconClass: "fas fa-plus-square"
                },
                {
                 title:"Remove Column",
                 element: "a",
                 btnClass: "float-right gm-removeCol",
                 iconClass: "fas fa-trash"
                }
            ],

        // CUstom col classes - add your own to make them available in the col settings
        colCustomClasses: ["example-col-class", "test-class"],

        // Maximum column span value: if you've got a 24 column grid via customised bootstrap, you could set this to 24.
        colMax: 12,

        // Column resizing +- value: this is also the colMin value, as columns won't be able to go smaller than this number (otherwise you hit zero and all hell breaks loose)
        colResizeStep: 1,

  /*
     Rich Text Editors---------------
  */
        tinymce: {
            config: {
                theme: "modern",
                skin: "custom",
              inline: true,
              plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            }
        },

        // Path to CK custom comfiguration
        ckeditor: {
              customConfig: ""
        }
    };

    /**
     * Exposes gridmanager as jquery function
     * @method gridmanager
     * @param {object} options
     * @returns CallExpression
     */
    $.fn.gridmanager = function(options){
        return this.each(function(){
          var element = $(this);
          var gridmanager = new $.gridmanager(this, options);
          element.data('gridmanager', gridmanager);
        });
    };

    /**
     * General Utility Regex function used to get custom callback attributes
     * @method regex
     * @param {} elem
     * @param {} index
     * @param {} match
     * @returns CallExpression
     */
    $.expr[':'].regex = function(elem, index, match) {
      var matchParams = match[3].split(','),
        validLabels = /^(data|css):/,
        attr = {
            method: matchParams[0].match(validLabels) ?
                        matchParams[0].split(':')[0] : 'attr',
            property: matchParams.shift().replace(validLabels,'')
        },
        regexFlags = 'ig',
        regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
        return regex.test(jQuery(elem)[attr.method](attr.property));
    };
})(jQuery );
/*! flip - v1.1.2 - 2016-10-20
* https://github.com/nnattawat/flip
* Copyright (c) 2016 Nattawat Nonsung; Licensed MIT */
(function( $ ) {
  /*
   * Private attributes and method
   */

  // Function from David Walsh: http://davidwalsh.name/css-animation-callback licensed with http://opensource.org/licenses/MIT
  var whichTransitionEvent = function() {
    var t, el = document.createElement("fakeelement"),
    transitions = {
      "transition"      : "transitionend",
      "OTransition"     : "oTransitionEnd",
      "MozTransition"   : "transitionend",
      "WebkitTransition": "webkitTransitionEnd"
    };

    for (t in transitions) {
      if (el.style[t] !== undefined) {
        return transitions[t];
      }
    }
  };

  /*
   * Model declaration
   */
  var Flip = function($el, options, callback) {
    // Define default setting
    this.setting = {
      axis: "y",
      reverse: false,
      trigger: "click",
      speed: 500,
      forceHeight: false,
      forceWidth: false,
      autoSize: true,
      front: '.front',
      back: '.back'
    };

    this.setting = $.extend(this.setting, options);

    if (typeof options.axis === 'string' && (options.axis.toLowerCase() === 'x' || options.axis.toLowerCase() === 'y')) {
      this.setting.axis = options.axis.toLowerCase();
    }

    if (typeof options.reverse === "boolean") {
      this.setting.reverse = options.reverse;
    }

    if (typeof options.trigger === 'string') {
      this.setting.trigger = options.trigger.toLowerCase();
    }

    var speed = parseInt(options.speed);
    if (!isNaN(speed)) {
      this.setting.speed = speed;
    }

    if (typeof options.forceHeight === "boolean") {
      this.setting.forceHeight = options.forceHeight;
    }

    if (typeof options.forceWidth === "boolean") {
      this.setting.forceWidth = options.forceWidth;
    }

    if (typeof options.autoSize === "boolean") {
      this.setting.autoSize = options.autoSize;
    }

    if (typeof options.front === 'string' || options.front instanceof $) {
      this.setting.front = options.front;
    }

    if (typeof options.back === 'string' || options.back instanceof $) {
      this.setting.back = options.back;
    }

    // Other attributes
    this.element = $el;
    this.frontElement = this.getFrontElement();
    this.backElement = this.getBackElement();
    this.isFlipped = false;

    this.init(callback);
  };

  /*
   * Public methods
   */
  $.extend(Flip.prototype, {

    flipDone: function(callback) {
      var self = this;
      // Providing a nicely wrapped up callback because transform is essentially async
      self.element.one(whichTransitionEvent(), function() {
        self.element.trigger('flip:done');
        if (typeof callback === 'function') {
          callback.call(self.element);
        }
      });
    },

    flip: function(callback) {
      if (this.isFlipped) {
        return;
      }

      this.isFlipped = true;

      var rotateAxis = "rotate" + this.setting.axis;
      this.frontElement.css({
        transform: rotateAxis + (this.setting.reverse ? "(-180deg)" : "(180deg)"),
        "z-index": "0"
      });

      this.backElement.css({
        transform: rotateAxis + "(0deg)",
        "z-index": "1"
      });
      this.flipDone(callback);
    },

    unflip: function(callback) {
      if (!this.isFlipped) {
        return;
      }

      this.isFlipped = false;

      var rotateAxis = "rotate" + this.setting.axis;
      this.frontElement.css({
        transform: rotateAxis + "(0deg)",
        "z-index": "1"
      });

      this.backElement.css({
        transform: rotateAxis + (this.setting.reverse ? "(180deg)" : "(-180deg)"),
        "z-index": "0"
      });
      this.flipDone(callback);
    },

    getFrontElement: function() {
      if (this.setting.front instanceof $) {
        return this.setting.front;
      } else {
        return this.element.find(this.setting.front);
      }
    },

    getBackElement: function() {
      if (this.setting.back instanceof $) {
        return this.setting.back;
      } else {
        return this.element.find(this.setting.back);
      }
    },

    init: function(callback) {
      var self = this;

      var faces = self.frontElement.add(self.backElement);
      var rotateAxis = "rotate" + self.setting.axis;
      var perspective = self.element["outer" + (rotateAxis === "rotatex" ? "Height" : "Width")]() * 2;
      var elementCss = {
        'perspective': perspective,
        'position': 'relative'
      };
      var backElementCss = {
        "transform": rotateAxis + "(" + (self.setting.reverse ? "180deg" : "-180deg") + ")",
        "z-index": "0",
        "position": "relative"
      };
      var faceElementCss = {
        "backface-visibility": "hidden",
        "transform-style": "preserve-3d",
        "position": "absolute",
        "z-index": "1"
      };

      if (self.setting.forceHeight) {
        faces.outerHeight(self.element.height());
      } else if (self.setting.autoSize) {
        faceElementCss.height = '100%';
      }

      if (self.setting.forceWidth) {
        faces.outerWidth(self.element.width());
      } else if (self.setting.autoSize) {
        faceElementCss.width = '100%';
      }

      // Back face always visible on Chrome #39
      if ((window.chrome || (window.Intl && Intl.v8BreakIterator)) && 'CSS' in window) {
        //Blink Engine, add preserve-3d to self.element
        elementCss["-webkit-transform-style"] = "preserve-3d";
      }


      faces.css(faceElementCss).find('*').css({
        "backface-visibility": "hidden"
      });

      self.element.css(elementCss);
      self.backElement.css(backElementCss);

      // #39
      // not forcing width/height may cause an initial flip to show up on
      // page load when we apply the style to reverse the backface...
      // To prevent self we first apply the basic styles and then give the
      // browser a moment to apply them. Only afterwards do we add the transition.
      setTimeout(function() {
        // By now the browser should have applied the styles, so the transition
        // will only affect subsequent flips.
        var speedInSec = self.setting.speed / 1000 || 0.5;
        faces.css({
          "transition": "all " + speedInSec + "s ease-out"
        });

        // This allows flip to be called for setup with only a callback (default settings)
        if (typeof callback === 'function') {
          callback.call(self.element);
        }

        // While this used to work with a setTimeout of zero, at some point that became
        // unstable and the initial flip returned. The reason for this is unknown but we
        // will temporarily use a short delay of 20 to mitigate this issue.
      }, 20);

      self.attachEvents();
    },

    clickHandler: function(event) {
      if (!event) { event = window.event; }
      if (this.element.find($(event.target).closest('button, a, input[type="submit"]')).length) {
        return;
      }

      if (this.isFlipped) {
        this.unflip();
      } else {
        this.flip();
      }
    },

    hoverHandler: function() {
      var self = this;
      self.element.off('mouseleave.flip');

      self.flip();

      setTimeout(function() {
        self.element.on('mouseleave.flip', $.proxy(self.unflip, self));
        if (!self.element.is(":hover")) {
          self.unflip();
        }
      }, (self.setting.speed + 150));
    },

    attachEvents: function() {
      var self = this;
      if (self.setting.trigger === "click") {
        self.element.on($.fn.tap ? "tap.flip" : "click.flip", $.proxy(self.clickHandler, self));
      } else if (self.setting.trigger === "hover") {
        self.element.on('mouseenter.flip', $.proxy(self.hoverHandler, self));
        self.element.on('mouseleave.flip', $.proxy(self.unflip, self));
      }
    },

    flipChanged: function(callback) {
      this.element.trigger('flip:change');
      if (typeof callback === 'function') {
        callback.call(this.element);
      }
    },

    changeSettings: function(options, callback) {
      var self = this;
      var changeNeeded = false;

      if (options.axis !== undefined && self.setting.axis !== options.axis.toLowerCase()) {
        self.setting.axis = options.axis.toLowerCase();
        changeNeeded = true;
      }

      if (options.reverse !== undefined && self.setting.reverse !== options.reverse) {
        self.setting.reverse = options.reverse;
        changeNeeded = true;
      }

      if (changeNeeded) {
        var faces = self.frontElement.add(self.backElement);
        var savedTrans = faces.css(["transition-property", "transition-timing-function", "transition-duration", "transition-delay"]);

        faces.css({
          transition: "none"
        });

        // This sets up the first flip in the new direction automatically
        var rotateAxis = "rotate" + self.setting.axis;

        if (self.isFlipped) {
          self.frontElement.css({
            transform: rotateAxis + (self.setting.reverse ? "(-180deg)" : "(180deg)"),
            "z-index": "0"
          });
        } else {
          self.backElement.css({
            transform: rotateAxis + (self.setting.reverse ? "(180deg)" : "(-180deg)"),
            "z-index": "0"
          });
        }
        // Providing a nicely wrapped up callback because transform is essentially async
        setTimeout(function() {
          faces.css(savedTrans);
          self.flipChanged(callback);
        }, 0);
      } else {
        // If we didnt have to set the axis we can just call back.
        self.flipChanged(callback);
      }
    }

  });

  /*
   * jQuery collection methods
   */
  $.fn.flip = function (options, callback) {
    if (typeof options === 'function') {
      callback = options;
    }

    if (typeof options === "string" || typeof options === "boolean") {
      this.each(function() {
        var flip = $(this).data('flip-model');

        if (options === "toggle") {
          options = !flip.isFlipped;
        }

        if (options) {
          flip.flip(callback);
        } else {
          flip.unflip(callback);
        }
      });
    } else {
      this.each(function() {
        if ($(this).data('flip-model')) { // The element has been initiated, all we have to do is change applicable settings
          var flip = $(this).data('flip-model');

          if (options && (options.axis !== undefined || options.reverse !== undefined)) {
            flip.changeSettings(options, callback);
          }
        } else { // Init
          $(this).data('flip-model', new Flip($(this), (options || {}), callback));
        }
      });
    }

    return this;
  };

}( jQuery ));
/**
 * Name:    Highslide JS
 * Version: 5.0.0 (2016-05-24)
 * Config:  default +events +unobtrusive +imagemap +slideshow +positioning +transitions +viewport +thumbstrip +inline +ajax +iframe +flash
 * Author:  Torstein HĂ¸nsi
 * Support: www.highslide.com/support
 * License: MIT
 */
if (!hs) { var hs = {
// Language strings
	lang : {
		cssDirection: 'ltr',
		loadingText : 'Loading...',
		loadingTitle : 'Click to cancel',
		focusTitle : 'Click to bring to front',
		fullExpandTitle : 'Expand to actual size (f)',
		creditsText : 'Powered by <i>Highslide JS</i>',
		creditsTitle : 'Go to the Highslide JS homepage',
		previousText : 'Previous',
		nextText : 'Next',
		moveText : 'Move',
		closeText : 'Close',
		closeTitle : 'Close (esc)',
		resizeTitle : 'Resize',
		playText : 'Play',
		playTitle : 'Play slideshow (spacebar)',
		pauseText : 'Pause',
		pauseTitle : 'Pause slideshow (spacebar)',
		previousTitle : 'Previous (arrow left)',
		nextTitle : 'Next (arrow right)',
		moveTitle : 'Move',
		fullExpandText : '1:1',
		number: 'Image %1 of %2',
		restoreTitle : 'Click to close image, click and drag to move. Use arrow keys for next and previous.'
	},
// See http://highslide.com/ref for examples of settings
	graphicsDir : 'highslide/graphics/',
	expandCursor : 'zoomin.cur', // null disables
	restoreCursor : 'zoomout.cur', // null disables
	expandDuration : 250, // milliseconds
	restoreDuration : 250,
	marginLeft : 15,
	marginRight : 15,
	marginTop : 15,
	marginBottom : 15,
	zIndexCounter : 1001, // adjust to other absolutely positioned elements
	loadingOpacity : 0.75,
	allowMultipleInstances: true,
	numberOfImagesToPreload : 5,
	outlineWhileAnimating : 2, // 0 = never, 1 = always, 2 = HTML only
	outlineStartOffset : 3, // ends at 10
	padToMinWidth : false, // pad the popup width to make room for wide caption
	fullExpandPosition : 'bottom right',
	fullExpandOpacity : 1,
	showCredits : true, // you can set this to false if you want
	creditsHref : 'http://highslide.com/',
	creditsTarget : '_self',
	enableKeyListener : true,
	openerTagNames : ['a', 'area'], // Add more to allow slideshow indexing
	transitions : [],
	transitionDuration: 250,
	dimmingOpacity: 0, // Lightbox style dimming background
	dimmingDuration: 50, // 0 for instant dimming

	allowWidthReduction : false,
	allowHeightReduction : true,
	preserveContent : true, // Preserve changes made to the content and position of HTML popups.
	objectLoadTime : 'before', // Load iframes 'before' or 'after' expansion.
	cacheAjax : true, // Cache ajax popups for instant display. Can be overridden for each popup.
	anchor : 'auto', // where the image expands from
	align : 'auto', // position in the client (overrides anchor)
	targetX: null, // the id of a target element
	targetY: null,
	dragByHeading: true,
	minWidth: 200,
	minHeight: 200,
	allowSizeReduction: true, // allow the image to reduce to fit client size. If false, this overrides minWidth and minHeight
	outlineType : 'drop-shadow', // set null to disable outlines
	skin : {
		controls:
			'<div class="highslide-controls"><ul>'+
			'<li class="highslide-previous">'+
			'<a href="#" title="{hs.lang.previousTitle}">'+
			'<span>{hs.lang.previousText}</span></a>'+
			'</li>'+
			'<li class="highslide-play">'+
			'<a href="#" title="{hs.lang.playTitle}">'+
			'<span>{hs.lang.playText}</span></a>'+
			'</li>'+
			'<li class="highslide-pause">'+
			'<a href="#" title="{hs.lang.pauseTitle}">'+
			'<span>{hs.lang.pauseText}</span></a>'+
			'</li>'+
			'<li class="highslide-next">'+
			'<a href="#" title="{hs.lang.nextTitle}">'+
			'<span>{hs.lang.nextText}</span></a>'+
			'</li>'+
			'<li class="highslide-move">'+
			'<a href="#" title="{hs.lang.moveTitle}">'+
			'<span>{hs.lang.moveText}</span></a>'+
			'</li>'+
			'<li class="highslide-full-expand">'+
			'<a href="#" title="{hs.lang.fullExpandTitle}">'+
			'<span>{hs.lang.fullExpandText}</span></a>'+
			'</li>'+
			'<li class="highslide-close">'+
			'<a href="#" title="{hs.lang.closeTitle}" >'+
			'<span>{hs.lang.closeText}</span></a>'+
			'</li>'+
			'</ul></div>'
		,
		contentWrapper:
			'<div class="highslide-header"><ul>'+
			'<li class="highslide-previous">'+
			'<a href="#" title="{hs.lang.previousTitle}" onclick="return hs.previous(this)">'+
			'<span>{hs.lang.previousText}</span></a>'+
			'</li>'+
			'<li class="highslide-next">'+
			'<a href="#" title="{hs.lang.nextTitle}" onclick="return hs.next(this)">'+
			'<span>{hs.lang.nextText}</span></a>'+
			'</li>'+
			'<li class="highslide-move">'+
			'<a href="#" title="{hs.lang.moveTitle}" onclick="return false">'+
			'<span>{hs.lang.moveText}</span></a>'+
			'</li>'+
			'<li class="highslide-close">'+
			'<a href="#" title="{hs.lang.closeTitle}" onclick="return hs.close(this)">'+
			'<span>{hs.lang.closeText}</span></a>'+
			'</li>'+
			'</ul></div>'+
			'<div class="highslide-body"></div>'+
			'<div class="highslide-footer"><div>'+
			'<span class="highslide-resize" title="{hs.lang.resizeTitle}"><span></span></span>'+
			'</div></div>'
	},
// END OF YOUR SETTINGS


// declare internal properties
	preloadTheseImages : [],
	continuePreloading: true,
	expanders : [],
	overrides : [
		'allowSizeReduction',
		'useBox',
		'anchor',
		'align',
		'targetX',
		'targetY',
		'outlineType',
		'outlineWhileAnimating',
		'captionId',
		'captionText',
		'captionEval',
		'captionOverlay',
		'headingId',
		'headingText',
		'headingEval',
		'headingOverlay',
		'creditsPosition',
		'dragByHeading',
		'autoplay',
		'numberPosition',
		'transitions',
		'dimmingOpacity',

		'width',
		'height',

		'contentId',
		'allowWidthReduction',
		'allowHeightReduction',
		'preserveContent',
		'maincontentId',
		'maincontentText',
		'maincontentEval',
		'objectType',
		'cacheAjax',
		'objectWidth',
		'objectHeight',
		'objectLoadTime',
		'swfOptions',
		'wrapperClassName',
		'minWidth',
		'minHeight',
		'maxWidth',
		'maxHeight',
		'pageOrigin',
		'slideshowGroup',
		'easing',
		'easingClose',
		'fadeInOut',
		'src'
	],
	overlays : [],
	idCounter : 0,
	oPos : {
		x: ['leftpanel', 'left', 'center', 'right', 'rightpanel'],
		y: ['above', 'top', 'middle', 'bottom', 'below']
	},
	mouse: {},
	headingOverlay: {},
	captionOverlay: {},
	swfOptions: { flashvars: {}, params: {}, attributes: {} },
	timers : [],

	slideshows : [],

	pendingOutlines : {},
	sleeping : [],
	preloadTheseAjax : [],
	cacheBindings : [],
	cachedGets : {},
	clones : {},
	onReady: [],
	uaVersion: document.documentMode ||	parseFloat((navigator.userAgent.toLowerCase().match( /.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1]),
	ie : (document.all && !window.opera),
//ie : navigator && /MSIE [678]/.test(navigator.userAgent), // ie9 compliant?
	safari : /Safari/.test(navigator.userAgent),
	geckoMac : /Macintosh.+rv:1\.[0-8].+Gecko/.test(navigator.userAgent),

	$ : function (id) {
		if (id) return document.getElementById(id);
	},

	push : function (arr, val) {
		arr[arr.length] = val;
	},

	createElement : function (tag, attribs, styles, parent, nopad) {
		var el = document.createElement(tag);
		if (attribs) hs.extend(el, attribs);
		if (nopad) hs.setStyles(el, {padding: 0, border: 'none', margin: 0});
		if (styles) hs.setStyles(el, styles);
		if (parent) parent.appendChild(el);
		return el;
	},

	extend : function (el, attribs) {
		for (var x in attribs) el[x] = attribs[x];
		return el;
	},

	setStyles : function (el, styles) {
		for (var x in styles) {
			if (hs.ieLt9 && x == 'opacity') {
				if (styles[x] > 0.99) el.style.removeAttribute('filter');
				else el.style.filter = 'alpha(opacity='+ (styles[x] * 100) +')';
			}
			else el.style[x] = styles[x];
		}
	},
	animate: function(el, prop, opt) {
		var start,
			end,
			unit;
		if (typeof opt != 'object' || opt === null) {
			var args = arguments;
			opt = {
				duration: args[2],
				easing: args[3],
				complete: args[4]
			};
		}
		if (typeof opt.duration != 'number') opt.duration = 250;
		opt.easing = Math[opt.easing] || Math.easeInQuad;
		opt.curAnim = hs.extend({}, prop);
		for (var name in prop) {
			var e = new hs.fx(el, opt , name );

			start = parseFloat(hs.css(el, name)) || 0;
			end = parseFloat(prop[name]);
			unit = name != 'opacity' ? 'px' : '';

			e.custom( start, end, unit );
		}
	},
	css: function(el, prop) {
		if (el.style[prop]) {
			return el.style[prop];
		} else if (document.defaultView) {
			return document.defaultView.getComputedStyle(el, null).getPropertyValue(prop);

		} else {
			if (prop == 'opacity') prop = 'filter';
			var val = el.currentStyle[prop.replace(/\-(\w)/g, function (a, b){ return b.toUpperCase(); })];
			if (prop == 'filter')
				val = val.replace(/alpha\(opacity=([0-9]+)\)/,
					function (a, b) { return b / 100 });
			return val === '' ? 1 : val;
		}
	},

	getPageSize : function () {
		var d = document, w = window, iebody = d.compatMode && d.compatMode != 'BackCompat'
			? d.documentElement : d.body,
			ieLt9 = hs.ie && (hs.uaVersion < 9 || typeof pageXOffset == 'undefined');

		var width = ieLt9 ? iebody.clientWidth :
			(d.documentElement.clientWidth || self.innerWidth),
			height = ieLt9 ? iebody.clientHeight : self.innerHeight;
		hs.page = {
			width: width,
			height: height,
			scrollLeft: ieLt9 ? iebody.scrollLeft : pageXOffset,
			scrollTop: ieLt9 ? iebody.scrollTop : pageYOffset
		};
		return hs.page;
	},

	getPosition : function(el)	{
		if (/area/i.test(el.tagName)) {
			var imgs = document.getElementsByTagName('img');
			for (var i = 0; i < imgs.length; i++) {
				var u = imgs[i].useMap;
				if (u && u.replace(/^.*?#/, '') == el.parentNode.name) {
					el = imgs[i];
					break;
				}
			}
		}
		var p = { x: el.offsetLeft, y: el.offsetTop };
		while (el.offsetParent)	{
			el = el.offsetParent;
			p.x += el.offsetLeft;
			p.y += el.offsetTop;
			if (el != document.body && el != document.documentElement) {
				p.x -= el.scrollLeft;
				p.y -= el.scrollTop;
			}
		}
		return p;
	},

	expand : function(a, params, custom, type) {
		if (!a) a = hs.createElement('a', null, { display: 'none' }, hs.container);
		if (typeof a.getParams == 'function') return params;
		if (type == 'html') {
			for (var i = 0; i < hs.sleeping.length; i++) {
				if (hs.sleeping[i] && hs.sleeping[i].a == a) {
					hs.sleeping[i].awake();
					hs.sleeping[i] = null;
					return false;
				}
			}
			hs.hasHtmlExpanders = true;
		}
		try {
			new hs.Expander(a, params, custom, type);
			return false;
		} catch (e) { return true; }
	},

	htmlExpand : function(a, params, custom) {
		return hs.expand(a, params, custom, 'html');
	},

	getSelfRendered : function() {
		return hs.createElement('div', {
			className: 'highslide-html-content',
			innerHTML: hs.replaceLang(hs.skin.contentWrapper)
		});
	},
	getElementByClass : function (el, tagName, className) {
		var els = el.getElementsByTagName(tagName);
		for (var i = 0; i < els.length; i++) {
			if ((new RegExp(className)).test(els[i].className)) {
				return els[i];
			}
		}
		return null;
	},
	replaceLang : function(s) {
		s = s.replace(/\s/g, ' ');
		var re = /{hs\.lang\.([^}]+)\}/g,
			matches = s.match(re),
			lang;
		if (matches) for (var i = 0; i < matches.length; i++) {
			lang = matches[i].replace(re, "$1");
			if (typeof hs.lang[lang] != 'undefined') s = s.replace(matches[i], hs.lang[lang]);
		}
		return s;
	},


	setClickEvents : function () {
		var els = document.getElementsByTagName('a');
		for (var i = 0; i < els.length; i++) {
			var type = hs.isUnobtrusiveAnchor(els[i]);
			if (type && !els[i].hsHasSetClick) {
				(function(){
					var t = type;
					if (hs.fireEvent(hs, 'onSetClickEvent', { element: els[i], type: t })) {
						els[i].onclick =(type == 'image') ?function() { return hs.expand(this) }:
							function() { return hs.htmlExpand(this, { objectType: t } );};
					}
				})();
				els[i].hsHasSetClick = true;
			}
		}
		hs.getAnchors();
	},
	isUnobtrusiveAnchor: function(el) {
		if (el.rel == 'highslide') return 'image';
		else if (el.rel == 'highslide-ajax') return 'ajax';
		else if (el.rel == 'highslide-iframe') return 'iframe';
		else if (el.rel == 'highslide-swf') return 'swf';
	},

	getCacheBinding : function (a) {
		for (var i = 0; i < hs.cacheBindings.length; i++) {
			if (hs.cacheBindings[i][0] == a) {
				var c = hs.cacheBindings[i][1];
				hs.cacheBindings[i][1] = c.cloneNode(1);
				return c;
			}
		}
		return null;
	},

	preloadAjax : function (e) {
		var arr = hs.getAnchors();
		for (var i = 0; i < arr.htmls.length; i++) {
			var a = arr.htmls[i];
			if (hs.getParam(a, 'objectType') == 'ajax' && hs.getParam(a, 'cacheAjax'))
				hs.push(hs.preloadTheseAjax, a);
		}

		hs.preloadAjaxElement(0);
	},

	preloadAjaxElement : function (i) {
		if (!hs.preloadTheseAjax[i]) return;
		var a = hs.preloadTheseAjax[i];
		var cache = hs.getNode(hs.getParam(a, 'contentId'));
		if (!cache) cache = hs.getSelfRendered();
		var ajax = new hs.Ajax(a, cache, 1);
		ajax.onError = function () { };
		ajax.onLoad = function () {
			hs.push(hs.cacheBindings, [a, cache]);
			hs.preloadAjaxElement(i + 1);
		};
		ajax.run();
	},

	focusTopmost : function() {
		var topZ = 0,
			topmostKey = -1,
			expanders = hs.expanders,
			exp,
			zIndex;
		for (var i = 0; i < expanders.length; i++) {
			exp = expanders[i];
			if (exp) {
				zIndex = exp.wrapper.style.zIndex;
				if (zIndex && zIndex > topZ) {
					topZ = zIndex;
					topmostKey = i;
				}
			}
		}
		if (topmostKey == -1) hs.focusKey = -1;
		else expanders[topmostKey].focus();
	},

	getParam : function (a, param) {
		a.getParams = a.onclick;
		var p = a.getParams ? a.getParams() : null;
		a.getParams = null;

		return (p && typeof p[param] != 'undefined') ? p[param] :
			(typeof hs[param] != 'undefined' ? hs[param] : null);
	},

	getSrc : function (a) {
		var src = hs.getParam(a, 'src');
		if (src) return src;
		return a.href;
	},

	getNode : function (id) {
		var node = hs.$(id), clone = hs.clones[id], a = {};
		if (!node && !clone) return null;
		if (!clone) {
			clone = node.cloneNode(true);
			clone.id = '';
			hs.clones[id] = clone;
			return node;
		} else {
			return clone.cloneNode(true);
		}
	},

	discardElement : function(d) {
		if (d) hs.garbageBin.appendChild(d);
		hs.garbageBin.innerHTML = '';
	},
	dim : function(exp) {
		if (!hs.dimmer) {
			isNew = true;
			hs.dimmer = hs.createElement ('div', {
				className: 'highslide-dimming highslide-viewport-size',
				owner: '',
				onclick: function() {
					if (hs.fireEvent(hs, 'onDimmerClick'))

						hs.close();
				}
			}, {
				visibility: 'visible',
				opacity: 0
			}, hs.container, true);

			if (/(Android|iPad|iPhone|iPod)/.test(navigator.userAgent)) {
				var body = document.body;
				function pixDimmerSize() {
					hs.setStyles(hs.dimmer, {
						width: body.scrollWidth +'px',
						height: body.scrollHeight +'px'
					});
				}
				pixDimmerSize();
				hs.addEventListener(window, 'resize', pixDimmerSize);
			}
		}
		hs.dimmer.style.display = '';

		var isNew = hs.dimmer.owner == '';
		hs.dimmer.owner += '|'+ exp.key;

		if (isNew) {
			if (hs.geckoMac && hs.dimmingGeckoFix)
				hs.setStyles(hs.dimmer, {
					background: 'url('+ hs.graphicsDir + 'geckodimmer.png)',
					opacity: 1
				});
			else
				hs.animate(hs.dimmer, { opacity: exp.dimmingOpacity }, hs.dimmingDuration);
		}
	},
	undim : function(key) {
		if (!hs.dimmer) return;
		if (typeof key != 'undefined') hs.dimmer.owner = hs.dimmer.owner.replace('|'+ key, '');

		if (
			(typeof key != 'undefined' && hs.dimmer.owner != '')
			|| (hs.upcoming && hs.getParam(hs.upcoming, 'dimmingOpacity'))
		) return;

		if (hs.geckoMac && hs.dimmingGeckoFix) hs.dimmer.style.display = 'none';
		else hs.animate(hs.dimmer, { opacity: 0 }, hs.dimmingDuration, null, function() {
			hs.dimmer.style.display = 'none';
		});
	},
	transit : function (adj, exp) {
		var last = exp || hs.getExpander();
		exp = last;
		if (hs.upcoming) return false;
		else hs.last = last;
		hs.removeEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);
		try {
			hs.upcoming = adj;
			adj.onclick();
		} catch (e){
			hs.last = hs.upcoming = null;
		}
		try {
			if (!adj || exp.transitions[1] != 'crossfade')
				exp.close();
		} catch (e) {}
		return false;
	},

	previousOrNext : function (el, op) {
		var exp = hs.getExpander(el);
		if (exp) return hs.transit(exp.getAdjacentAnchor(op), exp);
		else return false;
	},

	previous : function (el) {
		return hs.previousOrNext(el, -1);
	},

	next : function (el) {
		return hs.previousOrNext(el, 1);
	},

	keyHandler : function(e) {
		if (!e) e = window.event;
		if (!e.target) e.target = e.srcElement; // ie
		if (typeof e.target.form != 'undefined') return true; // form element has focus
		if (!hs.fireEvent(hs, 'onKeyDown', e)) return true;
		var exp = hs.getExpander();

		var op = null;
		switch (e.keyCode) {
			case 70: // f
				if (exp) exp.doFullExpand();
				return true;
			case 32: // Space
				op = 2;
				break;
			case 34: // Page Down
			case 39: // Arrow right
			case 40: // Arrow down
				op = 1;
				break;
			case 8:  // Backspace
			case 33: // Page Up
			case 37: // Arrow left
			case 38: // Arrow up
				op = -1;
				break;
			case 27: // Escape
			case 13: // Enter
				op = 0;
		}
		if (op !== null) {if (op != 2)hs.removeEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);
			if (!hs.enableKeyListener) return true;

			if (e.preventDefault) e.preventDefault();
			else e.returnValue = false;
			if (exp) {
				if (op == 0) {
					exp.close();
				} else if (op == 2) {
					if (exp.slideshow) exp.slideshow.hitSpace();
				} else {
					if (exp.slideshow) exp.slideshow.pause();
					hs.previousOrNext(exp.key, op);
				}
				return false;
			}
		}
		return true;
	},


	registerOverlay : function (overlay) {
		hs.push(hs.overlays, hs.extend(overlay, { hsId: 'hsId'+ hs.idCounter++ } ));
	},


	addSlideshow : function (options) {
		var sg = options.slideshowGroup;
		if (typeof sg == 'object') {
			for (var i = 0; i < sg.length; i++) {
				var o = {};
				for (var x in options) o[x] = options[x];
				o.slideshowGroup = sg[i];
				hs.push(hs.slideshows, o);
			}
		} else {
			hs.push(hs.slideshows, options);
		}
	},

	getWrapperKey : function (element, expOnly) {
		var el, re = /^highslide-wrapper-([0-9]+)$/;
		// 1. look in open expanders
		el = element;
		while (el.parentNode)	{
			if (el.hsKey !== undefined) return el.hsKey;
			if (el.id && re.test(el.id)) return el.id.replace(re, "$1");
			el = el.parentNode;
		}
		// 2. look in thumbnail
		if (!expOnly) {
			el = element;
			while (el.parentNode)	{
				if (el.tagName && hs.isHsAnchor(el)) {
					for (var key = 0; key < hs.expanders.length; key++) {
						var exp = hs.expanders[key];
						if (exp && exp.a == el) return key;
					}
				}
				el = el.parentNode;
			}
		}
		return null;
	},

	getExpander : function (el, expOnly) {
		if (typeof el == 'undefined') return hs.expanders[hs.focusKey] || null;
		if (typeof el == 'number') return hs.expanders[el] || null;
		if (typeof el == 'string') el = hs.$(el);
		return hs.expanders[hs.getWrapperKey(el, expOnly)] || null;
	},

	isHsAnchor : function (a) {
		return (a.onclick && a.onclick.toString().replace(/\s/g, ' ').match(/hs.(htmlE|e)xpand/));
	},

	reOrder : function () {
		for (var i = 0; i < hs.expanders.length; i++)
			if (hs.expanders[i] && hs.expanders[i].isExpanded) hs.focusTopmost();
	},
	fireEvent : function (obj, evt, args) {
		return obj && obj[evt] ? (obj[evt](obj, args) !== false) : true;
	},

	mouseClickHandler : function(e)
	{
		if (!e) e = window.event;
		if (e.button > 1) return true;
		if (!e.target) e.target = e.srcElement;

		var el = e.target;
		while (el.parentNode
		&& !(/highslide-(image|move|html|resize)/.test(el.className)))
		{
			el = el.parentNode;
		}
		var exp = hs.getExpander(el);
		if (exp && (exp.isClosing || !exp.isExpanded)) return true;

		if (exp && e.type == 'mousedown') {
			if (e.target.form) return true;
			var match = el.className.match(/highslide-(image|move|resize)/);
			if (match) {
				hs.dragArgs = {
					exp: exp ,
					type: match[1],
					left: exp.x.pos,
					width: exp.x.size,
					top: exp.y.pos,
					height: exp.y.size,
					clickX: e.clientX,
					clickY: e.clientY
				};


				hs.addEventListener(document, 'mousemove', hs.dragHandler);
				if (e.preventDefault) e.preventDefault(); // FF

				if (/highslide-(image|html)-blur/.test(exp.content.className)) {
					exp.focus();
					hs.hasFocused = true;
				}
				return false;
			}
			else if (/highslide-html/.test(el.className) && hs.focusKey != exp.key) {
				exp.focus();
				exp.doShowHide('hidden');
			}
		} else if (e.type == 'mouseup') {

			hs.removeEventListener(document, 'mousemove', hs.dragHandler);

			if (hs.dragArgs) {
				if (hs.styleRestoreCursor && hs.dragArgs.type == 'image')
					hs.dragArgs.exp.content.style.cursor = hs.styleRestoreCursor;
				var hasDragged = hs.dragArgs.hasDragged;

				if (!hasDragged &&!hs.hasFocused && !/(move|resize)/.test(hs.dragArgs.type)) {
					if (hs.fireEvent(exp, 'onImageClick'))
						exp.close();
				}
				else if (hasDragged || (!hasDragged && hs.hasHtmlExpanders)) {
					hs.dragArgs.exp.doShowHide('hidden');
				}

				if (hs.dragArgs.exp.releaseMask)
					hs.dragArgs.exp.releaseMask.style.display = 'none';

				if (hasDragged) hs.fireEvent(hs.dragArgs.exp, 'onDrop', hs.dragArgs);
				hs.hasFocused = false;
				hs.dragArgs = null;

			} else if (/highslide-image-blur/.test(el.className)) {
				el.style.cursor = hs.styleRestoreCursor;
			}
		}
		return false;
	},

	dragHandler : function(e)
	{
		if (!hs.dragArgs) return true;
		if (!e) e = window.event;
		var a = hs.dragArgs, exp = a.exp;
		if (exp.iframe) {
			if (!exp.releaseMask) exp.releaseMask = hs.createElement('div', null,
				{ position: 'absolute', width: exp.x.size+'px', height: exp.y.size+'px',
					left: exp.x.cb+'px', top: exp.y.cb+'px', zIndex: 4,	background: (hs.ieLt9 ? 'white' : 'none'),
					opacity: 0.01 },
				exp.wrapper, true);
			if (exp.releaseMask.style.display == 'none')
				exp.releaseMask.style.display = '';
		}

		a.dX = e.clientX - a.clickX;
		a.dY = e.clientY - a.clickY;

		var distance = Math.sqrt(Math.pow(a.dX, 2) + Math.pow(a.dY, 2));
		if (!a.hasDragged) a.hasDragged = (a.type != 'image' && distance > 0)
			|| (distance > (hs.dragSensitivity || 5));

		if (a.hasDragged && e.clientX > 5 && e.clientY > 5) {
			if (!hs.fireEvent(exp, 'onDrag', a)) return false;

			if (a.type == 'resize') exp.resize(a);
			else {
				exp.moveTo(a.left + a.dX, a.top + a.dY);
				if (a.type == 'image') exp.content.style.cursor = 'move';
			}
		}
		return false;
	},

	wrapperMouseHandler : function (e) {
		try {
			if (!e) e = window.event;
			var over = /mouseover/i.test(e.type);
			if (!e.target) e.target = e.srcElement; // ie
			if (!e.relatedTarget) e.relatedTarget =
				over ? e.fromElement : e.toElement; // ie
			var exp = hs.getExpander(e.target);
			if (!exp.isExpanded) return;
			if (!exp || !e.relatedTarget || hs.getExpander(e.relatedTarget, true) == exp
				|| hs.dragArgs) return;
			hs.fireEvent(exp, over ? 'onMouseOver' : 'onMouseOut', e);
			for (var i = 0; i < exp.overlays.length; i++) (function() {
				var o = hs.$('hsId'+ exp.overlays[i]);
				if (o && o.hideOnMouseOut) {
					if (over) hs.setStyles(o, { visibility: 'visible', display: '' });
					hs.animate(o, { opacity: over ? o.opacity : 0 }, o.dur);
				}
			})();
		} catch (e) {}
	},
	addEventListener : function (el, event, func) {
		if (el == document && event == 'ready') {
			hs.push(hs.onReady, func);
		}
		try {
			el.addEventListener(event, func, false);
		} catch (e) {
			try {
				el.detachEvent('on'+ event, func);
				el.attachEvent('on'+ event, func);
			} catch (e) {
				el['on'+ event] = func;
			}
		}
	},

	removeEventListener : function (el, event, func) {
		try {
			el.removeEventListener(event, func, false);
		} catch (e) {
			try {
				el.detachEvent('on'+ event, func);
			} catch (e) {
				el['on'+ event] = null;
			}
		}
	},

	preloadFullImage : function (i) {
		if (hs.continuePreloading && hs.preloadTheseImages[i] && hs.preloadTheseImages[i] != 'undefined') {
			var img = document.createElement('img');
			img.onload = function() {
				img = null;
				hs.preloadFullImage(i + 1);
			};
			img.src = hs.preloadTheseImages[i];
		}
	},
	preloadImages : function (number) {
		if (number && typeof number != 'object') hs.numberOfImagesToPreload = number;

		var arr = hs.getAnchors();
		for (var i = 0; i < arr.images.length && i < hs.numberOfImagesToPreload; i++) {
			hs.push(hs.preloadTheseImages, hs.getSrc(arr.images[i]));
		}

		// preload outlines
		if (hs.outlineType)	new hs.Outline(hs.outlineType, function () { hs.preloadFullImage(0)} );
		else

			hs.preloadFullImage(0);

		// preload cursor
		if (hs.restoreCursor) var cur = hs.createElement('img', { src: hs.graphicsDir + hs.restoreCursor });
	},


	init : function () {
		if (!hs.container) {

			hs.ieLt7 = hs.ie && hs.uaVersion < 7;
			hs.ieLt9 = hs.ie && hs.uaVersion < 9;

			hs.getPageSize();
			hs.ie6SSL = hs.ieLt7 && location.protocol == 'https:';
			for (var x in hs.langDefaults) {
				if (typeof hs[x] != 'undefined') hs.lang[x] = hs[x];
				else if (typeof hs.lang[x] == 'undefined' && typeof hs.langDefaults[x] != 'undefined')
					hs.lang[x] = hs.langDefaults[x];
			}

			hs.container = hs.createElement('div', {
					className: 'highslide-container'
				}, {
					position: 'absolute',
					left: 0,
					top: 0,
					width: '100%',
					zIndex: hs.zIndexCounter,
					direction: 'ltr'
				},
				document.body,
				true
			);
			hs.loading = hs.createElement('a', {
					className: 'highslide-loading',
					title: hs.lang.loadingTitle,
					innerHTML: hs.lang.loadingText,
					href: 'javascript:;'
				}, {
					position: 'absolute',
					top: '-9999px',
					opacity: hs.loadingOpacity,
					zIndex: 1
				}, hs.container
			);
			hs.garbageBin = hs.createElement('div', null, { display: 'none' }, hs.container);
			hs.viewport = hs.createElement('div', {
					className: 'highslide-viewport highslide-viewport-size'
				}, {
					visibility: (hs.safari && hs.uaVersion < 525) ? 'visible' : 'hidden'
				}, hs.container, 1
			);
			hs.clearing = hs.createElement('div', null,
				{ clear: 'both', paddingTop: '1px' }, null, true);

			// http://www.robertpenner.com/easing/
			Math.linearTween = function (t, b, c, d) {
				return c*t/d + b;
			};
			Math.easeInQuad = function (t, b, c, d) {
				return c*(t/=d)*t + b;
			};
			Math.easeOutQuad = function (t, b, c, d) {
				return -c *(t/=d)*(t-2) + b;
			};

			hs.hideSelects = hs.ieLt7;
			hs.hideIframes = ((window.opera && hs.uaVersion < 9) || navigator.vendor == 'KDE'
				|| (hs.ieLt7 && hs.uaVersion < 5.5));
			hs.fireEvent(this, 'onActivate');
		}
	},
	ready : function() {
		if (hs.isReady) return;
		hs.isReady = true;
		for (var i = 0; i < hs.onReady.length; i++) hs.onReady[i]();
	},

	updateAnchors : function() {
		var el, els, all = [], images = [], htmls = [],groups = {}, re;

		for (var i = 0; i < hs.openerTagNames.length; i++) {
			els = document.getElementsByTagName(hs.openerTagNames[i]);
			for (var j = 0; j < els.length; j++) {
				el = els[j];
				re = hs.isHsAnchor(el);
				if (re) {
					hs.push(all, el);
					if (re[0] == 'hs.expand') hs.push(images, el);
					else if (re[0] == 'hs.htmlExpand') hs.push(htmls, el);
					var g = hs.getParam(el, 'slideshowGroup') || 'none';
					if (!groups[g]) groups[g] = [];
					hs.push(groups[g], el);
				}
			}
		}
		hs.anchors = { all: all, groups: groups, images: images, htmls: htmls };
		return hs.anchors;

	},

	getAnchors : function() {
		return hs.anchors || hs.updateAnchors();
	},


	close : function(el) {
		var exp = hs.getExpander(el);
		if (exp) exp.close();
		return false;
	}
}; // end hs object
	hs.fx = function( elem, options, prop ){
		this.options = options;
		this.elem = elem;
		this.prop = prop;

		if (!options.orig) options.orig = {};
	};
	hs.fx.prototype = {
		update: function(){
			(hs.fx.step[this.prop] || hs.fx.step._default)(this);

			if (this.options.step)
				this.options.step.call(this.elem, this.now, this);

		},
		custom: function(from, to, unit){
			this.startTime = (new Date()).getTime();
			this.start = from;
			this.end = to;
			this.unit = unit;// || this.unit || "px";
			this.now = this.start;
			this.pos = this.state = 0;

			var self = this;
			function t(gotoEnd){
				return self.step(gotoEnd);
			}

			t.elem = this.elem;

			if ( t() && hs.timers.push(t) == 1 ) {
				hs.timerId = setInterval(function(){
					var timers = hs.timers;

					for ( var i = 0; i < timers.length; i++ )
						if ( !timers[i]() )
							timers.splice(i--, 1);

					if ( !timers.length ) {
						clearInterval(hs.timerId);
					}
				}, 13);
			}
		},
		step: function(gotoEnd){
			var t = (new Date()).getTime();
			if ( gotoEnd || t >= this.options.duration + this.startTime ) {
				this.now = this.end;
				this.pos = this.state = 1;
				this.update();

				this.options.curAnim[ this.prop ] = true;

				var done = true;
				for ( var i in this.options.curAnim )
					if ( this.options.curAnim[i] !== true )
						done = false;

				if ( done ) {
					if (this.options.complete) this.options.complete.call(this.elem);
				}
				return false;
			} else {
				var n = t - this.startTime;
				this.state = n / this.options.duration;
				this.pos = this.options.easing(n, 0, 1, this.options.duration);
				this.now = this.start + ((this.end - this.start) * this.pos);
				this.update();
			}
			return true;
		}

	};

	hs.extend( hs.fx, {
		step: {

			opacity: function(fx){
				hs.setStyles(fx.elem, { opacity: fx.now });
			},

			_default: function(fx){
				try {
					if ( fx.elem.style && fx.elem.style[ fx.prop ] != null )
						fx.elem.style[ fx.prop ] = fx.now + fx.unit;
					else
						fx.elem[ fx.prop ] = fx.now;
				} catch (e) {}
			}
		}
	});

	hs.Outline =  function (outlineType, onLoad) {
		this.onLoad = onLoad;
		this.outlineType = outlineType;
		var v = hs.uaVersion, tr;

		this.hasAlphaImageLoader = hs.ie && hs.uaVersion < 7;
		if (!outlineType) {
			if (onLoad) onLoad();
			return;
		}

		hs.init();
		this.table = hs.createElement(
			'table', {
				cellSpacing: 0
			}, {
				visibility: 'hidden',
				position: 'absolute',
				borderCollapse: 'collapse',
				width: 0
			},
			hs.container,
			true
		);
		var tbody = hs.createElement('tbody', null, null, this.table, 1);

		this.td = [];
		for (var i = 0; i <= 8; i++) {
			if (i % 3 == 0) tr = hs.createElement('tr', null, { height: 'auto' }, tbody, true);
			this.td[i] = hs.createElement('td', null, null, tr, true);
			var style = i != 4 ? { lineHeight: 0, fontSize: 0} : { position : 'relative' };
			hs.setStyles(this.td[i], style);
		}
		this.td[4].className = outlineType +' highslide-outline';

		this.preloadGraphic();
	};

	hs.Outline.prototype = {
		preloadGraphic : function () {
			var src = hs.graphicsDir + (hs.outlinesDir || "outlines/")+ this.outlineType +".png";

			var appendTo = hs.safari && hs.uaVersion < 525 ? hs.container : null;
			this.graphic = hs.createElement('img', null, { position: 'absolute',
				top: '-9999px' }, appendTo, true); // for onload trigger

			var pThis = this;
			this.graphic.onload = function() { pThis.onGraphicLoad(); };

			this.graphic.src = src;
		},

		onGraphicLoad : function () {
			var o = this.offset = this.graphic.width / 4,
				pos = [[0,0],[0,-4],[-2,0],[0,-8],0,[-2,-8],[0,-2],[0,-6],[-2,-2]],
				dim = { height: (2*o) +'px', width: (2*o) +'px' };
			for (var i = 0; i <= 8; i++) {
				if (pos[i]) {
					if (this.hasAlphaImageLoader) {
						var w = (i == 1 || i == 7) ? '100%' : this.graphic.width +'px';
						var div = hs.createElement('div', null, { width: '100%', height: '100%', position: 'relative', overflow: 'hidden'}, this.td[i], true);
						hs.createElement ('div', null, {
								filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale, src='"+ this.graphic.src + "')",
								position: 'absolute',
								width: w,
								height: this.graphic.height +'px',
								left: (pos[i][0]*o)+'px',
								top: (pos[i][1]*o)+'px'
							},
							div,
							true);
					} else {
						hs.setStyles(this.td[i], { background: 'url('+ this.graphic.src +') '+ (pos[i][0]*o)+'px '+(pos[i][1]*o)+'px'});
					}

					if (window.opera && (i == 3 || i ==5))
						hs.createElement('div', null, dim, this.td[i], true);

					hs.setStyles (this.td[i], dim);
				}
			}
			this.graphic = null;
			if (hs.pendingOutlines[this.outlineType]) hs.pendingOutlines[this.outlineType].destroy();
			hs.pendingOutlines[this.outlineType] = this;
			if (this.onLoad) this.onLoad();
		},

		setPosition : function (pos, offset, vis, dur, easing) {
			var exp = this.exp,
				stl = exp.wrapper.style,
				offset = offset || 0,
				pos = pos || {
					x: exp.x.pos + offset,
					y: exp.y.pos + offset,
					w: exp.x.get('wsize') - 2 * offset,
					h: exp.y.get('wsize') - 2 * offset
				};
			if (vis) this.table.style.visibility = (pos.h >= 4 * this.offset)
				? 'visible' : 'hidden';
			hs.setStyles(this.table, {
				left: (pos.x - this.offset) +'px',
				top: (pos.y - this.offset) +'px',
				width: (pos.w + 2 * this.offset) +'px'
			});

			pos.w -= 2 * this.offset;
			pos.h -= 2 * this.offset;
			hs.setStyles (this.td[4], {
				width: pos.w >= 0 ? pos.w +'px' : 0,
				height: pos.h >= 0 ? pos.h +'px' : 0
			});
			if (this.hasAlphaImageLoader) this.td[3].style.height
				= this.td[5].style.height = this.td[4].style.height;

		},

		destroy : function(hide) {
			if (hide) this.table.style.visibility = 'hidden';
			else hs.discardElement(this.table);
		}
	};

	hs.Dimension = function(exp, dim) {
		this.exp = exp;
		this.dim = dim;
		this.ucwh = dim == 'x' ? 'Width' : 'Height';
		this.wh = this.ucwh.toLowerCase();
		this.uclt = dim == 'x' ? 'Left' : 'Top';
		this.lt = this.uclt.toLowerCase();
		this.ucrb = dim == 'x' ? 'Right' : 'Bottom';
		this.rb = this.ucrb.toLowerCase();
		this.p1 = this.p2 = 0;
	};
	hs.Dimension.prototype = {
		get : function(key) {
			switch (key) {
				case 'loadingPos':
					return this.tpos + this.tb + (this.t - hs.loading['offset'+ this.ucwh]) / 2;
				case 'loadingPosXfade':
					return this.pos + this.cb+ this.p1 + (this.size - hs.loading['offset'+ this.ucwh]) / 2;
				case 'wsize':
					return this.size + 2 * this.cb + this.p1 + this.p2;
				case 'fitsize':
					return this.clientSize - this.marginMin - this.marginMax;
				case 'maxsize':
					return this.get('fitsize') - 2 * this.cb - this.p1 - this.p2 ;
				case 'opos':
					return this.pos - (this.exp.outline ? this.exp.outline.offset : 0);
				case 'osize':
					return this.get('wsize') + (this.exp.outline ? 2*this.exp.outline.offset : 0);
				case 'imgPad':
					return this.imgSize ? Math.round((this.size - this.imgSize) / 2) : 0;

			}
		},
		calcBorders: function() {
			// correct for borders
			this.cb = (this.exp.content['offset'+ this.ucwh] - this.t) / 2;

			this.marginMax = hs['margin'+ this.ucrb];
		},
		calcThumb: function() {
			this.t = this.exp.el[this.wh] ? parseInt(this.exp.el[this.wh]) :
				this.exp.el['offset'+ this.ucwh];
			this.tpos = this.exp.tpos[this.dim];
			this.tb = (this.exp.el['offset'+ this.ucwh] - this.t) / 2;
			if (this.tpos == 0 || this.tpos == -1) {
				this.tpos = (hs.page[this.wh] / 2) + hs.page['scroll'+ this.uclt];
			};
		},
		calcExpanded: function() {
			var exp = this.exp;
			this.justify = 'auto';

			// get alignment
			if (exp.align == 'center') this.justify = 'center';
			else if (new RegExp(this.lt).test(exp.anchor)) this.justify = null;
			else if (new RegExp(this.rb).test(exp.anchor)) this.justify = 'max';


			// size and position
			this.pos = this.tpos - this.cb + this.tb;

			if (this.maxHeight && this.dim == 'x')
				exp.maxWidth = Math.min(exp.maxWidth || this.full, exp.maxHeight * this.full / exp.y.full);

			this.size = Math.min(this.full, exp['max'+ this.ucwh] || this.full);
			this.minSize = exp.allowSizeReduction ?
				Math.min(exp['min'+ this.ucwh], this.full) :this.full;
			if (exp.isImage && exp.useBox)	{
				this.size = exp[this.wh];
				this.imgSize = this.full;
			}
			if (this.dim == 'x' && hs.padToMinWidth) this.minSize = exp.minWidth;
			this.target = exp['target'+ this.dim.toUpperCase()];
			this.marginMin = hs['margin'+ this.uclt];
			this.scroll = hs.page['scroll'+ this.uclt];
			this.clientSize = hs.page[this.wh];
		},
		setSize: function(i) {
			var exp = this.exp;
			if (exp.isImage && (exp.useBox || hs.padToMinWidth)) {
				this.imgSize = i;
				this.size = Math.max(this.size, this.imgSize);
				exp.content.style[this.lt] = this.get('imgPad')+'px';
			} else
				this.size = i;

			exp.content.style[this.wh] = i +'px';
			exp.wrapper.style[this.wh] = this.get('wsize') +'px';
			if (exp.outline) exp.outline.setPosition();
			if (exp.releaseMask) exp.releaseMask.style[this.wh] = i +'px';
			if (this.dim == 'y' && exp.iDoc && exp.body.style.height != 'auto') try {
				exp.iDoc.body.style.overflow = 'auto';
			} catch (e) {}
			if (exp.isHtml) {
				var d = exp.scrollerDiv;
				if (this.sizeDiff === undefined)
					this.sizeDiff = exp.innerContent['offset'+ this.ucwh] - d['offset'+ this.ucwh];
				d.style[this.wh] = (this.size - this.sizeDiff) +'px';

				if (this.dim == 'x') exp.mediumContent.style.width = 'auto';
				if (exp.body) exp.body.style[this.wh] = 'auto';
			}
			if (this.dim == 'x' && exp.overlayBox) exp.sizeOverlayBox(true);
			if (this.dim == 'x' && exp.slideshow && exp.isImage) {
				if (i == this.full) exp.slideshow.disable('full-expand');
				else exp.slideshow.enable('full-expand');
			}
		},
		setPos: function(i) {
			this.pos = i;
			this.exp.wrapper.style[this.lt] = i +'px';

			if (this.exp.outline) this.exp.outline.setPosition();

		}
	};

	hs.Expander = function(a, params, custom, contentType) {
		if (document.readyState && hs.ie && !hs.isReady) {
			hs.addEventListener(document, 'ready', function() {
				new hs.Expander(a, params, custom, contentType);
			});
			return;
		}
		this.a = a;
		this.custom = custom;
		this.contentType = contentType || 'image';
		this.isHtml = (contentType == 'html');
		this.isImage = !this.isHtml;

		hs.continuePreloading = false;
		this.overlays = [];
		this.last = hs.last;
		hs.last = null;
		hs.init();
		var key = this.key = hs.expanders.length;
		// override inline parameters
		for (var i = 0; i < hs.overrides.length; i++) {
			var name = hs.overrides[i];
			this[name] = params && typeof params[name] != 'undefined' ?
				params[name] : hs[name];
		}
		if (!this.src) this.src = a.href;

		// get thumb
		var el = (params && params.thumbnailId) ? hs.$(params.thumbnailId) : a;
		el = this.thumb = el.getElementsByTagName('img')[0] || el;
		this.thumbsUserSetId = el.id || a.id;
		if (!hs.fireEvent(this, 'onInit')) return true;

		// check if already open
		for (var i = 0; i < hs.expanders.length; i++) {
			if (hs.expanders[i] && hs.expanders[i].a == a
				&& !(this.last && this.transitions[1] == 'crossfade')) {
				hs.expanders[i].focus();
				return false;
			}
		}

		// cancel other
		if (!hs.allowSimultaneousLoading) for (var i = 0; i < hs.expanders.length; i++) {
			if (hs.expanders[i] && hs.expanders[i].thumb != el && !hs.expanders[i].onLoadStarted) {
				hs.expanders[i].cancelLoading();
			}
		}
		hs.expanders[key] = this;
		if (!hs.allowMultipleInstances && !hs.upcoming) {
			if (hs.expanders[key-1]) hs.expanders[key-1].close();
			if (typeof hs.focusKey != 'undefined' && hs.expanders[hs.focusKey])
				hs.expanders[hs.focusKey].close();
		}

		// initiate metrics
		this.el = el;
		this.tpos = this.pageOrigin || hs.getPosition(el);
		hs.getPageSize();
		var x = this.x = new hs.Dimension(this, 'x');
		x.calcThumb();
		var y = this.y = new hs.Dimension(this, 'y');
		y.calcThumb();
		if (/area/i.test(el.tagName)) this.getImageMapAreaCorrection(el);
		this.wrapper = hs.createElement(
			'div', {
				id: 'highslide-wrapper-'+ this.key,
				className: 'highslide-wrapper '+ this.wrapperClassName
			}, {
				visibility: 'hidden',
				position: 'absolute',
				zIndex: hs.zIndexCounter += 2
			}, null, true );

		this.wrapper.onmouseover = this.wrapper.onmouseout = hs.wrapperMouseHandler;
		if (this.contentType == 'image' && this.outlineWhileAnimating == 2)
			this.outlineWhileAnimating = 0;

		// get the outline
		if (!this.outlineType
			|| (this.last && this.isImage && this.transitions[1] == 'crossfade')) {
			this[this.contentType +'Create']();

		} else if (hs.pendingOutlines[this.outlineType]) {
			this.connectOutline();
			this[this.contentType +'Create']();

		} else {
			this.showLoading();
			var exp = this;
			new hs.Outline(this.outlineType,
				function () {
					exp.connectOutline();
					exp[exp.contentType +'Create']();
				}
			);
		}
		return true;
	};

	hs.Expander.prototype = {
		error : function(e) {
			if (hs.debug) alert ('Line '+ e.lineNumber +': '+ e.message);
			else window.location.href = this.src;
		},

		connectOutline : function() {
			var outline = this.outline = hs.pendingOutlines[this.outlineType];
			outline.exp = this;
			outline.table.style.zIndex = this.wrapper.style.zIndex - 1;
			hs.pendingOutlines[this.outlineType] = null;
		},

		showLoading : function() {
			if (this.onLoadStarted || this.loading) return;

			this.loading = hs.loading;
			var exp = this;
			this.loading.onclick = function() {
				exp.cancelLoading();
			};


			if (!hs.fireEvent(this, 'onShowLoading')) return;
			var exp = this,
				l = this.x.get('loadingPos') +'px',
				t = this.y.get('loadingPos') +'px';
			if (!tgt && this.last && this.transitions[1] == 'crossfade')
				var tgt = this.last;
			if (tgt) {
				l = tgt.x.get('loadingPosXfade') +'px';
				t = tgt.y.get('loadingPosXfade') +'px';
				this.loading.style.zIndex = hs.zIndexCounter++;
			}
			setTimeout(function () {
					if (exp.loading) hs.setStyles(exp.loading, { left: l, top: t, zIndex: hs.zIndexCounter++ })}
				, 100);
		},

		imageCreate : function() {
			var exp = this;

			var img = document.createElement('img');
			this.content = img;
			img.onload = function () {
				if (hs.expanders[exp.key]) exp.contentLoaded();
			};
			if (hs.blockRightClick) img.oncontextmenu = function() { return false; };
			img.className = 'highslide-image';
			hs.setStyles(img, {
				visibility: 'hidden',
				display: 'block',
				position: 'absolute',
				maxWidth: '9999px',
				zIndex: 3
			});
			img.title = hs.lang.restoreTitle;
			if (hs.safari && hs.uaVersion < 525) hs.container.appendChild(img);
			if (hs.ie && hs.flushImgSize) img.src = null;
			img.src = this.src;

			this.showLoading();
		},

		htmlCreate : function () {
			if (!hs.fireEvent(this, 'onBeforeGetContent')) return;

			this.content = hs.getCacheBinding(this.a);
			if (!this.content)
				this.content = hs.getNode(this.contentId);
			if (!this.content)
				this.content = hs.getSelfRendered();
			this.getInline(['maincontent']);
			if (this.maincontent) {
				var body = hs.getElementByClass(this.content, 'div', 'highslide-body');
				if (body) body.appendChild(this.maincontent);
				this.maincontent.style.display = 'block';
			}
			hs.fireEvent(this, 'onAfterGetContent');

			var innerContent = this.innerContent = this.content;

			if (/(swf|iframe)/.test(this.objectType)) this.setObjContainerSize(innerContent);

			// the content tree
			hs.container.appendChild(this.wrapper);
			hs.setStyles( this.wrapper, {
				position: 'static',
				padding: '0 '+ hs.marginRight +'px 0 '+ hs.marginLeft +'px'
			});
			this.content = hs.createElement(
				'div', {
					className: 'highslide-html'
				}, {
					position: 'relative',
					zIndex: 3,
					height: 0,
					overflow: 'hidden'
				},
				this.wrapper
			);
			this.mediumContent = hs.createElement('div', null, null, this.content, 1);
			this.mediumContent.appendChild(innerContent);

			hs.setStyles (innerContent, {
				position: 'relative',
				display: 'block',
				direction: hs.lang.cssDirection || ''
			});
			if (this.width) innerContent.style.width = this.width +'px';
			if (this.height) hs.setStyles(innerContent, {
				height: this.height +'px',
				overflow: 'hidden'
			});
			if (innerContent.offsetWidth < this.minWidth)
				innerContent.style.width = this.minWidth +'px';



			if (this.objectType == 'ajax' && !hs.getCacheBinding(this.a)) {
				this.showLoading();
				var exp = this;
				var ajax = new hs.Ajax(this.a, innerContent);
				ajax.src = this.src;
				ajax.onLoad = function () {	if (hs.expanders[exp.key]) exp.contentLoaded(); };
				ajax.onError = function () { location.href = exp.src; };
				ajax.run();
			}
			else

			if (this.objectType == 'iframe' && this.objectLoadTime == 'before') {
				this.writeExtendedContent();
			}
			else
				this.contentLoaded();
		},

		contentLoaded : function() {
			try {
				if (!this.content) return;
				this.content.onload = null;
				if (this.onLoadStarted) return;
				else this.onLoadStarted = true;

				var x = this.x, y = this.y;

				if (this.loading) {
					hs.setStyles(this.loading, { top: '-9999px' });
					this.loading = null;
					hs.fireEvent(this, 'onHideLoading');
				}
				if (this.isImage) {
					x.full = this.content.width;
					y.full = this.content.height;

					hs.setStyles(this.content, {
						width: x.t +'px',
						height: y.t +'px'
					});
					this.wrapper.appendChild(this.content);
					hs.container.appendChild(this.wrapper);
				} else if (this.htmlGetSize) this.htmlGetSize();

				x.calcBorders();
				y.calcBorders();

				hs.setStyles (this.wrapper, {
					left: (x.tpos + x.tb - x.cb) +'px',
					top: (y.tpos + x.tb - y.cb) +'px'
				});


				this.initSlideshow();
				this.getOverlays();

				var ratio = x.full / y.full;
				x.calcExpanded();
				this.justify(x);

				y.calcExpanded();
				this.justify(y);
				if (this.isHtml) this.htmlSizeOperations();
				if (this.overlayBox) this.sizeOverlayBox(0, 1);


				if (this.allowSizeReduction) {
					if (this.isImage)
						this.correctRatio(ratio);
					else this.fitOverlayBox();
					var ss = this.slideshow;
					if (ss && this.last && ss.controls && ss.fixedControls) {
						var pos = ss.overlayOptions.position || '', p;
						for (var dim in hs.oPos) for (var i = 0; i < 5; i++) {
							p = this[dim];
							if (pos.match(hs.oPos[dim][i])) {
								p.pos = this.last[dim].pos
									+ (this.last[dim].p1 - p.p1)
									+ (this.last[dim].size - p.size) * [0, 0, .5, 1, 1][i];
								if (ss.fixedControls == 'fit') {
									if (p.pos + p.size + p.p1 + p.p2 > p.scroll + p.clientSize - p.marginMax)
										p.pos = p.scroll + p.clientSize - p.size - p.marginMin - p.marginMax - p.p1 - p.p2;
									if (p.pos < p.scroll + p.marginMin) p.pos = p.scroll + p.marginMin;
								}
							}
						}
					}
					if (this.isImage && this.x.full > (this.x.imgSize || this.x.size)) {
						this.createFullExpand();
						if (this.overlays.length == 1) this.sizeOverlayBox();
					}
				}
				this.show();

			} catch (e) {
				this.error(e);
			}
		},


		setObjContainerSize : function(parent, auto) {
			var c = hs.getElementByClass(parent, 'DIV', 'highslide-body');
			if (/(iframe|swf)/.test(this.objectType)) {
				if (this.objectWidth) c.style.width = this.objectWidth +'px';
				if (this.objectHeight) c.style.height = this.objectHeight +'px';
			}
		},

		writeExtendedContent : function () {
			if (this.hasExtendedContent) return;
			var exp = this;
			this.body = hs.getElementByClass(this.innerContent, 'DIV', 'highslide-body');
			if (this.objectType == 'iframe') {
				this.showLoading();
				var ruler = hs.clearing.cloneNode(1);
				this.body.appendChild(ruler);
				this.newWidth = this.innerContent.offsetWidth;
				if (!this.objectWidth) this.objectWidth = ruler.offsetWidth;
				var hDiff = this.innerContent.offsetHeight - this.body.offsetHeight,
					h = this.objectHeight || hs.page.height - hDiff - hs.marginTop - hs.marginBottom,
					onload = this.objectLoadTime == 'before' ?
						' onload="if (hs.expanders['+ this.key +']) hs.expanders['+ this.key +'].contentLoaded()" ' : '';
				this.body.innerHTML += '<iframe name="hs'+ (new Date()).getTime() +'" frameborder="0" key="'+ this.key +'" '
					+' style="width:'+ this.objectWidth +'px; height:'+ h +'px" '
					+ onload +' src="'+ this.src +'" allowfullscreen></iframe>';
				this.ruler = this.body.getElementsByTagName('div')[0];
				this.iframe = this.body.getElementsByTagName('iframe')[0];

				if (this.objectLoadTime == 'after') this.correctIframeSize();

			}
			if (this.objectType == 'swf') {
				this.body.id = this.body.id || 'hs-flash-id-' + this.key;
				var a = this.swfOptions;
				if (!a.params) a.params = {};
				if (typeof a.params.wmode == 'undefined') a.params.wmode = 'transparent';
				if (swfobject) swfobject.embedSWF(this.src, this.body.id, this.objectWidth, this.objectHeight,
					a.version || '7', a.expressInstallSwfurl, a.flashvars, a.params, a.attributes);
			}
			this.hasExtendedContent = true;
		},
		htmlGetSize : function() {
			if (this.iframe && !this.objectHeight) { // loadtime before
				this.iframe.style.height = this.body.style.height = this.getIframePageHeight() +'px';
			}
			this.innerContent.appendChild(hs.clearing);
			if (!this.x.full) this.x.full = this.innerContent.offsetWidth;
			this.y.full = this.innerContent.offsetHeight;
			this.innerContent.removeChild(hs.clearing);
			if (hs.ie && this.newHeight > parseInt(this.innerContent.currentStyle.height)) { // ie css bug
				this.newHeight = parseInt(this.innerContent.currentStyle.height);
			}
			hs.setStyles( this.wrapper, { position: 'absolute',	padding: '0'});
			hs.setStyles( this.content, { width: this.x.t +'px', height: this.y.t +'px'});

		},

		getIframePageHeight : function() {
			var h;
			try {
				var doc = this.iDoc = this.iframe.contentDocument || this.iframe.contentWindow.document;
				var clearing = doc.createElement('div');
				clearing.style.clear = 'both';
				doc.body.appendChild(clearing);
				h = clearing.offsetTop;
				if (hs.ie) h += parseInt(doc.body.currentStyle.marginTop)
					+ parseInt(doc.body.currentStyle.marginBottom) - 1;
			} catch (e) { // other domain
				h = 300;
			}
			return h;
		},
		correctIframeSize : function () {
			var wDiff = this.innerContent.offsetWidth - this.ruler.offsetWidth;
			hs.discardElement(this.ruler);
			if (wDiff < 0) wDiff = 0;

			var hDiff = this.innerContent.offsetHeight - this.iframe.offsetHeight;
			if (this.iDoc && !this.objectHeight && !this.height && this.y.size == this.y.full) try {
				this.iDoc.body.style.overflow = 'hidden';
			} catch (e) {}
			hs.setStyles(this.iframe, {
				width: Math.abs(this.x.size - wDiff) +'px',
				height: Math.abs(this.y.size - hDiff) +'px'
			});
			hs.setStyles(this.body, {
				width: this.iframe.style.width,
				height: this.iframe.style.height
			});

			this.scrollingContent = this.iframe;
			this.scrollerDiv = this.scrollingContent;

		},
		htmlSizeOperations : function () {

			this.setObjContainerSize(this.innerContent);


			if (this.objectType == 'swf' && this.objectLoadTime == 'before') this.writeExtendedContent();

			// handle minimum size
			if (this.x.size < this.x.full && !this.allowWidthReduction) this.x.size = this.x.full;
			if (this.y.size < this.y.full && !this.allowHeightReduction) this.y.size = this.y.full;
			this.scrollerDiv = this.innerContent;
			hs.setStyles(this.mediumContent, {
				position: 'relative',
				width: this.x.size +'px'
			});
			hs.setStyles(this.innerContent, {
				border: 'none',
				width: 'auto',
				height: 'auto'
			});
			var node = hs.getElementByClass(this.innerContent, 'DIV', 'highslide-body');
			if (node && !/(iframe|swf)/.test(this.objectType)) {
				var cNode = node; // wrap to get true size
				node = hs.createElement(cNode.nodeName, null, {overflow: 'hidden'}, null, true);
				cNode.parentNode.insertBefore(node, cNode);
				node.appendChild(hs.clearing); // IE6
				node.appendChild(cNode);

				var wDiff = this.innerContent.offsetWidth - node.offsetWidth;
				var hDiff = this.innerContent.offsetHeight - node.offsetHeight;
				node.removeChild(hs.clearing);

				var kdeBugCorr = hs.safari || navigator.vendor == 'KDE' ? 1 : 0; // KDE repainting bug
				hs.setStyles(node, {
						width: (this.x.size - wDiff - kdeBugCorr) +'px',
						height: (this.y.size - hDiff) +'px',
						overflow: 'auto',
						position: 'relative'
					}
				);
				if (kdeBugCorr && cNode.offsetHeight > node.offsetHeight)	{
					node.style.width = (parseInt(node.style.width) + kdeBugCorr) + 'px';
				}
				this.scrollingContent = node;
				this.scrollerDiv = this.scrollingContent;
			}
			if (this.iframe && this.objectLoadTime == 'before') this.correctIframeSize();
			if (!this.scrollingContent && this.y.size < this.mediumContent.offsetHeight) this.scrollerDiv = this.content;

			if (this.scrollerDiv == this.content && !this.allowWidthReduction && !/(iframe|swf)/.test(this.objectType)) {
				this.x.size += 17; // room for scrollbars
			}
			if (this.scrollerDiv && this.scrollerDiv.offsetHeight > this.scrollerDiv.parentNode.offsetHeight) {
				setTimeout("try { hs.expanders["+ this.key +"].scrollerDiv.style.overflow = 'auto'; } catch(e) {}",
					hs.expandDuration);
			}
		},

		getImageMapAreaCorrection : function(area) {
			var c = area.coords.split(',');
			for (var i = 0; i < c.length; i++) c[i] = parseInt(c[i]);

			if (area.shape.toLowerCase() == 'circle') {
				this.x.tpos += c[0] - c[2];
				this.y.tpos += c[1] - c[2];
				this.x.t = this.y.t = 2 * c[2];
			} else {
				var maxX, maxY, minX = maxX = c[0], minY = maxY = c[1];
				for (var i = 0; i < c.length; i++) {
					if (i % 2 == 0) {
						minX = Math.min(minX, c[i]);
						maxX = Math.max(maxX, c[i]);
					} else {
						minY = Math.min(minY, c[i]);
						maxY = Math.max(maxY, c[i]);
					}
				}
				this.x.tpos += minX;
				this.x.t = maxX - minX;
				this.y.tpos += minY;
				this.y.t = maxY - minY;
			}
		},
		justify : function (p, moveOnly) {
			var tgtArr, tgt = p.target, dim = p == this.x ? 'x' : 'y';

			if (tgt && tgt.match(/ /)) {
				tgtArr = tgt.split(' ');
				tgt = tgtArr[0];
			}
			if (tgt && hs.$(tgt)) {
				p.pos = hs.getPosition(hs.$(tgt))[dim];
				if (tgtArr && tgtArr[1] && tgtArr[1].match(/^[-]?[0-9]+px$/))
					p.pos += parseInt(tgtArr[1]);
				if (p.size < p.minSize) p.size = p.minSize;

			} else if (p.justify == 'auto' || p.justify == 'center') {

				var hasMovedMin = false;

				var allowReduce = p.exp.allowSizeReduction;
				if (p.justify == 'center')
					p.pos = Math.round(p.scroll + (p.clientSize + p.marginMin - p.marginMax - p.get('wsize')) / 2);
				else
					p.pos = Math.round(p.pos - ((p.get('wsize') - p.t) / 2));
				if (p.pos < p.scroll + p.marginMin) {
					p.pos = p.scroll + p.marginMin;
					hasMovedMin = true;
				}
				if (!moveOnly && p.size < p.minSize) {
					p.size = p.minSize;
					allowReduce = false;
				}
				if (p.pos + p.get('wsize') > p.scroll + p.clientSize - p.marginMax) {
					if (!moveOnly && hasMovedMin && allowReduce) {
						p.size = Math.min(p.size, p.get(dim == 'y' ? 'fitsize' : 'maxsize'));
					} else if (p.get('wsize') < p.get('fitsize')) {
						p.pos = p.scroll + p.clientSize - p.marginMax - p.get('wsize');
					} else { // image larger than viewport
						p.pos = p.scroll + p.marginMin;
						if (!moveOnly && allowReduce) p.size = p.get(dim == 'y' ? 'fitsize' : 'maxsize');
					}
				}

				if (!moveOnly && p.size < p.minSize) {
					p.size = p.minSize;
					allowReduce = false;
				}


			} else if (p.justify == 'max') {
				p.pos = Math.floor(p.pos - p.size + p.t);
			}


			if (p.pos < p.marginMin) {
				var tmpMin = p.pos;
				p.pos = p.marginMin;

				if (allowReduce && !moveOnly) p.size = p.size - (p.pos - tmpMin);

			}
		},

		correctRatio : function(ratio) {
			var x = this.x,
				y = this.y,
				changed = false,
				xSize = Math.min(x.full, x.size),
				ySize = Math.min(y.full, y.size),
				useBox = (this.useBox || hs.padToMinWidth);

			if (xSize / ySize > ratio) { // width greater
				xSize = ySize * ratio;
				if (xSize < x.minSize) { // below minWidth
					xSize = x.minSize;
					ySize = xSize / ratio;
				}
				changed = true;

			} else if (xSize / ySize < ratio) { // height greater
				ySize = xSize / ratio;
				changed = true;
			}

			if (hs.padToMinWidth && x.full < x.minSize) {
				x.imgSize = x.full;
				y.size = y.imgSize = y.full;
			} else if (this.useBox) {
				x.imgSize = xSize;
				y.imgSize = ySize;
			} else {
				x.size = xSize;
				y.size = ySize;
			}
			changed = this.fitOverlayBox(this.useBox ? null : ratio, changed);
			if (useBox && y.size < y.imgSize) {
				y.imgSize = y.size;
				x.imgSize = y.size * ratio;
			}
			if (changed || useBox) {
				x.pos = x.tpos - x.cb + x.tb;
				x.minSize = x.size;
				this.justify(x, true);

				y.pos = y.tpos - y.cb + y.tb;
				y.minSize = y.size;
				this.justify(y, true);
				if (this.overlayBox) this.sizeOverlayBox();
			}


		},
		fitOverlayBox : function(ratio, changed) {
			var x = this.x, y = this.y;
			if (this.overlayBox && (this.isImage || this.allowHeightReduction)) {
				while (y.size > this.minHeight && x.size > this.minWidth
				&&  y.get('wsize') > y.get('fitsize')) {
					y.size -= 10;
					if (ratio) x.size = y.size * ratio;
					this.sizeOverlayBox(0, 1);
					changed = true;
				}
			}
			return changed;
		},

		reflow : function () {
			if (this.scrollerDiv) {
				var h = /iframe/i.test(this.scrollerDiv.tagName) ? (this.getIframePageHeight() + 1) +'px' : 'auto';
				if (this.body) this.body.style.height = h;
				this.scrollerDiv.style.height = h;
				this.y.setSize(this.innerContent.offsetHeight);
			}
		},

		show : function () {
			var x = this.x, y = this.y;
			this.doShowHide('hidden');
			hs.fireEvent(this, 'onBeforeExpand');
			if (this.slideshow && this.slideshow.thumbstrip) this.slideshow.thumbstrip.selectThumb();

			// Apply size change
			this.changeSize(
				1, {
					wrapper: {
						width : x.get('wsize'),
						height : y.get('wsize'),
						left: x.pos,
						top: y.pos
					},
					content: {
						left: x.p1 + x.get('imgPad'),
						top: y.p1 + y.get('imgPad'),
						width:x.imgSize ||x.size,
						height:y.imgSize ||y.size
					}
				},
				hs.expandDuration
			);
		},

		changeSize : function(up, to, dur) {
			// transition
			var trans = this.transitions,
				other = up ? (this.last ? this.last.a : null) : hs.upcoming,
				t = (trans[1] && other
					&& hs.getParam(other, 'transitions')[1] == trans[1]) ?
					trans[1] : trans[0];

			if (this[t] && t != 'expand') {
				this[t](up, to);
				return;
			}

			if (this.outline && !this.outlineWhileAnimating) {
				if (up) this.outline.setPosition();
				else this.outline.destroy(
					(this.isHtml && this.preserveContent));
			}


			if (!up) this.destroyOverlays();

			var exp = this,
				x = exp.x,
				y = exp.y,
				easing = this.easing;
			if (!up) easing = this.easingClose || easing;
			var after = up ?
				function() {

					if (exp.outline) exp.outline.table.style.visibility = "visible";
					setTimeout(function() {
						exp.afterExpand();
					}, 50);
				} :
				function() {
					exp.afterClose();
				};
			if (up) hs.setStyles( this.wrapper, {
				width: x.t +'px',
				height: y.t +'px'
			});
			if (up && this.isHtml) {
				hs.setStyles(this.wrapper, {
					left: (x.tpos - x.cb + x.tb) +'px',
					top: (y.tpos - y.cb + y.tb) +'px'
				});
			}
			if (this.fadeInOut) {
				hs.setStyles(this.wrapper, { opacity: up ? 0 : 1 });
				hs.extend(to.wrapper, { opacity: up });
			}
			hs.animate( this.wrapper, to.wrapper, {
				duration: dur,
				easing: easing,
				step: function(val, args) {
					if (exp.outline && exp.outlineWhileAnimating && args.prop == 'top') {
						var fac = up ? args.pos : 1 - args.pos;
						var pos = {
							w: x.t + (x.get('wsize') - x.t) * fac,
							h: y.t + (y.get('wsize') - y.t) * fac,
							x: x.tpos + (x.pos - x.tpos) * fac,
							y: y.tpos + (y.pos - y.tpos) * fac
						};
						exp.outline.setPosition(pos, 0, 1);
					}
					if (exp.isHtml) {
						if (args.prop == 'left')
							exp.mediumContent.style.left = (x.pos - val) +'px';
						if (args.prop == 'top')
							exp.mediumContent.style.top = (y.pos - val) +'px';
					}
				}
			});
			hs.animate( this.content, to.content, dur, easing, after);
			if (up) {
				this.wrapper.style.visibility = 'visible';
				this.content.style.visibility = 'visible';
				if (this.isHtml) this.innerContent.style.visibility = 'visible';
				this.a.className += ' highslide-active-anchor';
			}
		},



		fade : function(up, to) {
			this.outlineWhileAnimating = false;
			var exp = this,	t = up ? hs.expandDuration : 0;

			if (up) {
				hs.animate(this.wrapper, to.wrapper, 0);
				hs.setStyles(this.wrapper, { opacity: 0, visibility: 'visible' });
				hs.animate(this.content, to.content, 0);
				this.content.style.visibility = 'visible';

				hs.animate(this.wrapper, { opacity: 1 }, t, null,
					function() { exp.afterExpand(); });
			}

			if (this.outline) {
				this.outline.table.style.zIndex = this.wrapper.style.zIndex;
				var dir = up || -1,
					offset = this.outline.offset,
					startOff = up ? 3 : offset,
					endOff = up? offset : 3;
				for (var i = startOff; dir * i <= dir * endOff; i += dir, t += 25) {
					(function() {
						var o = up ? endOff - i : startOff - i;
						setTimeout(function() {
							exp.outline.setPosition(0, o, 1);
						}, t);
					})();
				}
			}


			if (up) {}//setTimeout(function() { exp.afterExpand(); }, t+50);
			else {
				setTimeout( function() {
					if (exp.outline) exp.outline.destroy(exp.preserveContent);

					exp.destroyOverlays();

					hs.animate( exp.wrapper, { opacity: 0 }, hs.restoreDuration, null, function(){
						exp.afterClose();
					});
				}, t);
			}
		},
		crossfade : function (up, to, from) {
			if (!up) return;
			var exp = this,
				last = this.last,
				x = this.x,
				y = this.y,
				lastX = last.x,
				lastY = last.y,
				wrapper = this.wrapper,
				content = this.content,
				overlayBox = this.overlayBox;
			hs.removeEventListener(document, 'mousemove', hs.dragHandler);

			hs.setStyles(content, {
				width: (x.imgSize || x.size) +'px',
				height: (y.imgSize || y.size) +'px'
			});
			if (overlayBox) overlayBox.style.overflow = 'visible';
			this.outline = last.outline;
			if (this.outline) this.outline.exp = exp;
			last.outline = null;
			var fadeBox = hs.createElement('div', {
					className: 'highslide-'+ this.contentType
				}, {
					position: 'absolute',
					zIndex: 4,
					overflow: 'hidden',
					display: 'none'
				}
			);
			var names = { oldImg: last, newImg: this };
			for (var n in names) {
				this[n] = names[n].content.cloneNode(!names[n].iframe); // #11
				hs.setStyles(this[n], {
					position: 'absolute',
					border: 0,
					visibility: 'visible'
				});
				fadeBox.appendChild(this[n]);
			}
			wrapper.appendChild(fadeBox);
			if (this.isHtml) hs.setStyles(this.mediumContent, {
				left: 0,
				top: 0
			});
			if (overlayBox) {
				overlayBox.className = '';
				wrapper.appendChild(overlayBox);
			}
			fadeBox.style.display = '';
			last.content.style.display = 'none';


			if (hs.safari && hs.uaVersion < 525) {
				this.wrapper.style.visibility = 'visible';
			}
			hs.animate(wrapper, {
				width: x.size
			}, {
				duration: hs.transitionDuration,
				step: function(val, args) {
					var pos = args.pos,
						invPos = 1 - pos;
					var prop,
						size = {},
						props = ['pos', 'size', 'p1', 'p2'];
					for (var n in props) {
						prop = props[n];
						size['x'+ prop] = Math.round(invPos * lastX[prop] + pos * x[prop]);
						size['y'+ prop] = Math.round(invPos * lastY[prop] + pos * y[prop]);
						size.ximgSize = Math.round(
							invPos * (lastX.imgSize || lastX.size) + pos * (x.imgSize || x.size));
						size.ximgPad = Math.round(invPos * lastX.get('imgPad') + pos * x.get('imgPad'));
						size.yimgSize = Math.round(
							invPos * (lastY.imgSize || lastY.size) + pos * (y.imgSize || y.size));
						size.yimgPad = Math.round(invPos * lastY.get('imgPad') + pos * y.get('imgPad'));
					}
					if (exp.outline) exp.outline.setPosition({
						x: size.xpos,
						y: size.ypos,
						w: size.xsize + size.xp1 + size.xp2 + 2 * x.cb,
						h: size.ysize + size.yp1 + size.yp2 + 2 * y.cb
					});
					last.wrapper.style.clip = 'rect('
						+ (size.ypos - lastY.pos)+'px, '
						+ (size.xsize + size.xp1 + size.xp2 + size.xpos + 2 * lastX.cb - lastX.pos) +'px, '
						+ (size.ysize + size.yp1 + size.yp2 + size.ypos + 2 * lastY.cb - lastY.pos) +'px, '
						+ (size.xpos - lastX.pos)+'px)';

					hs.setStyles(content, {
						top: (size.yp1 + y.get('imgPad')) +'px',
						left: (size.xp1 + x.get('imgPad')) +'px',
						marginTop: (y.pos - size.ypos) +'px',
						marginLeft: (x.pos - size.xpos) +'px'
					});
					hs.setStyles(wrapper, {
						top: size.ypos +'px',
						left: size.xpos +'px',
						width: (size.xp1 + size.xp2 + size.xsize + 2 * x.cb)+ 'px',
						height: (size.yp1 + size.yp2 + size.ysize + 2 * y.cb) + 'px'
					});
					hs.setStyles(fadeBox, {
						width: (size.ximgSize || size.xsize) + 'px',
						height: (size.yimgSize || size.ysize) +'px',
						left: (size.xp1 + size.ximgPad)  +'px',
						top: (size.yp1 + size.yimgPad) +'px',
						visibility: 'visible'
					});

					hs.setStyles(exp.oldImg, {
						top: (lastY.pos - size.ypos + lastY.p1 - size.yp1 + lastY.get('imgPad') - size.yimgPad)+'px',
						left: (lastX.pos - size.xpos + lastX.p1 - size.xp1 + lastX.get('imgPad') - size.ximgPad)+'px'
					});

					hs.setStyles(exp.newImg, {
						opacity: pos,
						top: (y.pos - size.ypos + y.p1 - size.yp1 + y.get('imgPad') - size.yimgPad) +'px',
						left: (x.pos - size.xpos + x.p1 - size.xp1 + x.get('imgPad') - size.ximgPad) +'px'
					});
					if (overlayBox) hs.setStyles(overlayBox, {
						width: size.xsize + 'px',
						height: size.ysize +'px',
						left: (size.xp1 + x.cb)  +'px',
						top: (size.yp1 + y.cb) +'px'
					});
				},
				complete: function () {
					wrapper.style.visibility = content.style.visibility = 'visible';
					content.style.display = 'block';
					hs.discardElement(fadeBox);
					exp.afterExpand();
					if (last.isHtml) last.htmlPrepareClose(); // #11
					last.afterClose();
					exp.last = null;
				}

			});
		},
		reuseOverlay : function(o, el) {
			if (!this.last) return false;
			for (var i = 0; i < this.last.overlays.length; i++) {
				var oDiv = hs.$('hsId'+ this.last.overlays[i]);
				if (oDiv && oDiv.hsId == o.hsId) {
					this.genOverlayBox();
					oDiv.reuse = this.key;
					hs.push(this.overlays, this.last.overlays[i]);
					return true;
				}
			}
			return false;
		},


		afterExpand : function() {
			this.isExpanded = true;
			this.focus();

			if (this.isHtml && this.objectLoadTime == 'after') this.writeExtendedContent();
			if (this.iframe) {
				try {
					var exp = this,
						doc = this.iframe.contentDocument || this.iframe.contentWindow.document;
					hs.addEventListener(doc, 'mousedown', function () {
						if (hs.focusKey != exp.key) exp.focus();
					});
				} catch(e) {}
				if (hs.ie && typeof this.isClosing != 'boolean') // first open
					this.iframe.style.width = (this.objectWidth - 1) +'px'; // hasLayout
			}
			if (this.dimmingOpacity) hs.dim(this);
			if (hs.upcoming && hs.upcoming == this.a) hs.upcoming = null;
			this.prepareNextOutline();
			var p = hs.page, mX = hs.mouse.x + p.scrollLeft, mY = hs.mouse.y + p.scrollTop;
			this.mouseIsOver = this.x.pos < mX && mX < this.x.pos + this.x.get('wsize')
				&& this.y.pos < mY && mY < this.y.pos + this.y.get('wsize');
			if (this.overlayBox) this.showOverlays();
			hs.fireEvent(this, 'onAfterExpand');

		},


		prepareNextOutline : function() {
			var key = this.key;
			var outlineType = this.outlineType;
			new hs.Outline(outlineType,
				function () { try { hs.expanders[key].preloadNext(); } catch (e) {} });
		},


		preloadNext : function() {
			var next = this.getAdjacentAnchor(1);
			if (next && next.onclick.toString().match(/hs\.expand/))
				var img = hs.createElement('img', { src: hs.getSrc(next) });
		},


		getAdjacentAnchor : function(op) {
			var current = this.getAnchorIndex(), as = hs.anchors.groups[this.slideshowGroup || 'none'];
			if (as && !as[current + op] && this.slideshow && this.slideshow.repeat) {
				if (op == 1) return as[0];
				else if (op == -1) return as[as.length-1];
			}
			return (as && as[current + op]) || null;
		},

		getAnchorIndex : function() {
			var arr = hs.getAnchors().groups[this.slideshowGroup || 'none'];
			if (arr) for (var i = 0; i < arr.length; i++) {
				if (arr[i] == this.a) return i;
			}
			return null;
		},


		getNumber : function() {
			if (this[this.numberPosition]) {
				var arr = hs.anchors.groups[this.slideshowGroup || 'none'];
				if (arr) {
					var s = hs.lang.number.replace('%1', this.getAnchorIndex() + 1).replace('%2', arr.length);
					this[this.numberPosition].innerHTML =
						'<div class="highslide-number">'+ s +'</div>'+ this[this.numberPosition].innerHTML;
				}
			}
		},
		initSlideshow : function() {
			if (!this.last) {
				for (var i = 0; i < hs.slideshows.length; i++) {
					var ss = hs.slideshows[i], sg = ss.slideshowGroup;
					if (typeof sg == 'undefined' || sg === null || sg === this.slideshowGroup)
						this.slideshow = new hs.Slideshow(this.key, ss);
				}
			} else {
				this.slideshow = this.last.slideshow;
			}
			var ss = this.slideshow;
			if (!ss) return;
			var key = ss.expKey = this.key;

			ss.checkFirstAndLast();
			ss.disable('full-expand');
			if (ss.controls) {
				this.createOverlay(hs.extend(ss.overlayOptions || {}, {
					overlayId: ss.controls,
					hsId: 'controls',
					zIndex: 5
				}));
			}
			if (ss.thumbstrip) ss.thumbstrip.add(this);
			if (!this.last && this.autoplay) ss.play(true);
			if (ss.autoplay) {
				ss.autoplay = setTimeout(function() {
					hs.next(key);
				}, (ss.interval || 500));
			}
		},

		cancelLoading : function() {
			hs.discardElement (this.wrapper);
			hs.expanders[this.key] = null;
			if (hs.upcoming == this.a) hs.upcoming = null;
			hs.undim(this.key);
			if (this.loading) hs.loading.style.left = '-9999px';
			hs.fireEvent(this, 'onHideLoading');
		},

		writeCredits : function () {
			if (this.credits) return;
			this.credits = hs.createElement('a', {
				href: hs.creditsHref,
				target: hs.creditsTarget,
				className: 'highslide-credits',
				innerHTML: hs.lang.creditsText,
				title: hs.lang.creditsTitle
			});
			this.createOverlay({
				overlayId: this.credits,
				position: this.creditsPosition || 'top left',
				hsId: 'credits'
			});
		},

		getInline : function(types, addOverlay) {
			for (var i = 0; i < types.length; i++) {
				var type = types[i], s = null;
				if (type == 'caption' && !hs.fireEvent(this, 'onBeforeGetCaption')) return;
				else if (type == 'heading' && !hs.fireEvent(this, 'onBeforeGetHeading')) return;
				if (!this[type +'Id'] && this.thumbsUserSetId)
					this[type +'Id'] = type +'-for-'+ this.thumbsUserSetId;
				if (this[type +'Id']) this[type] = hs.getNode(this[type +'Id']);
				if (!this[type] && !this[type +'Text'] && this[type +'Eval']) try {
					s = eval(this[type +'Eval']);
				} catch (e) {}
				if (!this[type] && this[type +'Text']) {
					s = this[type +'Text'];
				}
				if (!this[type] && !s) {
					this[type] = hs.getNode(this.a['_'+ type + 'Id']);
					if (!this[type]) {
						var next = this.a.nextSibling;
						while (next && !hs.isHsAnchor(next)) {
							if ((new RegExp('highslide-'+ type)).test(next.className || null)) {
								if (!next.id) this.a['_'+ type + 'Id'] = next.id = 'hsId'+ hs.idCounter++;
								this[type] = hs.getNode(next.id);
								break;
							}
							next = next.nextSibling;
						}
					}
				}
				if (!this[type] && !s && this.numberPosition == type) s = '\n';

				if (!this[type] && s) this[type] = hs.createElement('div',
					{ className: 'highslide-'+ type, innerHTML: s } );

				if (addOverlay && this[type]) {
					var o = { position: (type == 'heading') ? 'above' : 'below' };
					for (var x in this[type+'Overlay']) o[x] = this[type+'Overlay'][x];
					o.overlayId = this[type];
					this.createOverlay(o);
				}
			}
		},


// on end move and resize
		doShowHide : function(visibility) {
			if (hs.hideSelects) this.showHideElements('SELECT', visibility);
			if (hs.hideIframes) this.showHideElements('IFRAME', visibility);
			if (hs.geckoMac) this.showHideElements('*', visibility);
		},
		showHideElements : function (tagName, visibility) {
			var els = document.getElementsByTagName(tagName);
			var prop = tagName == '*' ? 'overflow' : 'visibility';
			for (var i = 0; i < els.length; i++) {
				if (prop == 'visibility' || (document.defaultView.getComputedStyle(
					els[i], "").getPropertyValue('overflow') == 'auto'
					|| els[i].getAttribute('hidden-by') != null)) {
					var hiddenBy = els[i].getAttribute('hidden-by');
					if (visibility == 'visible' && hiddenBy) {
						hiddenBy = hiddenBy.replace('['+ this.key +']', '');
						els[i].setAttribute('hidden-by', hiddenBy);
						if (!hiddenBy) els[i].style[prop] = els[i].origProp;
					} else if (visibility == 'hidden') { // hide if behind
						var elPos = hs.getPosition(els[i]);
						elPos.w = els[i].offsetWidth;
						elPos.h = els[i].offsetHeight;
						if (!this.dimmingOpacity) { // hide all if dimming

							var clearsX = (elPos.x + elPos.w < this.x.get('opos')
								|| elPos.x > this.x.get('opos') + this.x.get('osize'));
							var clearsY = (elPos.y + elPos.h < this.y.get('opos')
								|| elPos.y > this.y.get('opos') + this.y.get('osize'));
						}
						var wrapperKey = hs.getWrapperKey(els[i]);
						if (!clearsX && !clearsY && wrapperKey != this.key) { // element falls behind image
							if (!hiddenBy) {
								els[i].setAttribute('hidden-by', '['+ this.key +']');
								els[i].origProp = els[i].style[prop];
								els[i].style[prop] = 'hidden';

							} else if (hiddenBy.indexOf('['+ this.key +']') == -1) {
								els[i].setAttribute('hidden-by', hiddenBy + '['+ this.key +']');
							}
						} else if ((hiddenBy == '['+ this.key +']' || hs.focusKey == wrapperKey)
							&& wrapperKey != this.key) { // on move
							els[i].setAttribute('hidden-by', '');
							els[i].style[prop] = els[i].origProp || '';
						} else if (hiddenBy && hiddenBy.indexOf('['+ this.key +']') > -1) {
							els[i].setAttribute('hidden-by', hiddenBy.replace('['+ this.key +']', ''));
						}

					}
				}
			}
		},

		focus : function() {
			this.wrapper.style.zIndex = hs.zIndexCounter += 2;
			// blur others
			for (var i = 0; i < hs.expanders.length; i++) {
				if (hs.expanders[i] && i == hs.focusKey) {
					var blurExp = hs.expanders[i];
					blurExp.content.className += ' highslide-'+ blurExp.contentType +'-blur';
					if (blurExp.isImage) {
						blurExp.content.style.cursor = hs.ieLt7 ? 'hand' : 'pointer';
						blurExp.content.title = hs.lang.focusTitle;
					}
					hs.fireEvent(blurExp, 'onBlur');
				}
			}

			// focus this
			if (this.outline) this.outline.table.style.zIndex
				= this.wrapper.style.zIndex - 1;
			this.content.className = 'highslide-'+ this.contentType;
			if (this.isImage) {
				this.content.title = hs.lang.restoreTitle;

				if (hs.restoreCursor) {
					hs.styleRestoreCursor = window.opera ? 'pointer' : 'url('+ hs.graphicsDir + hs.restoreCursor +'), pointer';
					if (hs.ieLt7 && hs.uaVersion < 6) hs.styleRestoreCursor = 'hand';
					this.content.style.cursor = hs.styleRestoreCursor;
				}
			}
			hs.focusKey = this.key;
			hs.addEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);
			hs.fireEvent(this, 'onFocus');
		},
		moveTo: function(x, y) {
			this.x.setPos(x);
			this.y.setPos(y);
		},
		resize : function (e) {
			var w, h, r = e.width / e.height;
			w = Math.max(e.width + e.dX, Math.min(this.minWidth, this.x.full));
			if (this.isImage && Math.abs(w - this.x.full) < 12) w = this.x.full;
			h = this.isHtml ? e.height + e.dY : w / r;
			if (h < Math.min(this.minHeight, this.y.full)) {
				h = Math.min(this.minHeight, this.y.full);
				if (this.isImage) w = h * r;
			}
			this.resizeTo(w, h);
		},
		resizeTo: function(w, h) {
			this.y.setSize(h);
			this.x.setSize(w);
			this.wrapper.style.height = this.y.get('wsize') +'px';
		},

		close : function() {
			if (this.isClosing || !this.isExpanded) return;
			if (this.transitions[1] == 'crossfade' && hs.upcoming) {
				hs.getExpander(hs.upcoming).cancelLoading();
				hs.upcoming = null;
			}
			if (!hs.fireEvent(this, 'onBeforeClose')) return;
			this.isClosing = true;
			if (this.slideshow && !hs.upcoming) this.slideshow.pause();

			hs.removeEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);

			try {
				if (this.isHtml) this.htmlPrepareClose();
				this.content.style.cursor = 'default';
				this.changeSize(
					0, {
						wrapper: {
							width : this.x.t,
							height : this.y.t,
							left: this.x.tpos - this.x.cb + this.x.tb,
							top: this.y.tpos - this.y.cb + this.y.tb
						},
						content: {
							left: 0,
							top: 0,
							width: this.x.t,
							height: this.y.t
						}
					}, hs.restoreDuration
				);
			} catch (e) { this.afterClose(); }
		},

		htmlPrepareClose : function() {
			if (hs.geckoMac) { // bad redraws
				if (!hs.mask) hs.mask = hs.createElement('div', null,
					{ position: 'absolute' }, hs.container);
				hs.setStyles(hs.mask, { width: this.x.size +'px', height: this.y.size +'px',
					left: this.x.pos +'px', top: this.y.pos +'px', display: 'block' });
			}
			if (this.objectType == 'swf') try { hs.$(this.body.id).StopPlay(); } catch (e) {}

			if (this.objectLoadTime == 'after' && !this.preserveContent) this.destroyObject();
			if (this.scrollerDiv && this.scrollerDiv != this.scrollingContent)
				this.scrollerDiv.style.overflow = 'hidden';
		},

		destroyObject : function () {
			if (hs.ie && this.iframe)
				try {
					this.iframe.contentWindow.document.body.innerHTML = '';
				} catch (e) {
					this.iframe.src = '';
				}
			if (this.objectType == 'swf') swfobject.removeSWF(this.body.id);
			this.body.innerHTML = '';
		},

		sleep : function() {
			if (this.outline) this.outline.table.style.display = 'none';
			this.releaseMask = null;
			this.wrapper.style.display = 'none';
			this.isExpanded = false;
			hs.push(hs.sleeping, this);
		},

		awake : function() {try {

			hs.expanders[this.key] = this;

			if (!hs.allowMultipleInstances &&hs.focusKey != this.key) {
				try { hs.expanders[hs.focusKey].close(); } catch (e){}
			}

			var z = hs.zIndexCounter++, stl = { display: '', zIndex: z };
			hs.setStyles (this.wrapper, stl);
			this.isClosing = false;

			var o = this.outline || 0;
			if (o) {
				if (!this.outlineWhileAnimating) stl.visibility = 'hidden';
				hs.setStyles (o.table, stl);
			}
			if (this.slideshow) {
				this.initSlideshow();
			}

			this.show();
		} catch (e) {}


		},

		createOverlay : function (o) {
			var el = o.overlayId,
				relToVP = (o.relativeTo == 'viewport' && !/panel$/.test(o.position));
			if (typeof el == 'string') el = hs.getNode(el);
			if (o.html) el = hs.createElement('div', { innerHTML: o.html });
			if (!el || typeof el == 'string') return;
			if (!hs.fireEvent(this, 'onCreateOverlay', { overlay: el })) return;
			el.style.display = 'block';
			o.hsId = o.hsId || o.overlayId;
			if (this.transitions[1] == 'crossfade' && this.reuseOverlay(o, el)) return;
			this.genOverlayBox();
			var width = o.width && /^[0-9]+(px|%)$/.test(o.width) ? o.width : 'auto';
			if (/^(left|right)panel$/.test(o.position) && !/^[0-9]+px$/.test(o.width)) width = '200px';
			var overlay = hs.createElement(
				'div', {
					id: 'hsId'+ hs.idCounter++,
					hsId: o.hsId
				}, {
					position: 'absolute',
					visibility: 'hidden',
					width: width,
					direction: hs.lang.cssDirection || '',
					opacity: 0
				},
				relToVP ? hs.viewport :this.overlayBox,
				true
			);
			if (relToVP) overlay.hsKey = this.key;

			overlay.appendChild(el);
			hs.extend(overlay, {
				opacity: 1,
				offsetX: 0,
				offsetY: 0,
				dur: (o.fade === 0 || o.fade === false || (o.fade == 2 && hs.ie)) ? 0 : 250
			});
			hs.extend(overlay, o);


			if (this.gotOverlays) {
				this.positionOverlay(overlay);
				if (!overlay.hideOnMouseOut || this.mouseIsOver)
					hs.animate(overlay, { opacity: overlay.opacity }, overlay.dur);
			}
			hs.push(this.overlays, hs.idCounter - 1);
		},
		positionOverlay : function(overlay) {
			var p = overlay.position || 'middle center',
				relToVP = (overlay.relativeTo == 'viewport'),
				offX = overlay.offsetX,
				offY = overlay.offsetY;
			if (relToVP) {
				hs.viewport.style.display = 'block';
				overlay.hsKey = this.key;
				if (overlay.offsetWidth > overlay.parentNode.offsetWidth)
					overlay.style.width = '100%';
			} else
			if (overlay.parentNode != this.overlayBox) this.overlayBox.appendChild(overlay);
			if (/left$/.test(p)) overlay.style.left = offX +'px';

			if (/center$/.test(p))	hs.setStyles (overlay, {
				left: '50%',
				marginLeft: (offX - Math.round(overlay.offsetWidth / 2)) +'px'
			});

			if (/right$/.test(p)) overlay.style.right = - offX +'px';

			if (/^leftpanel$/.test(p)) {
				hs.setStyles(overlay, {
					right: '100%',
					marginRight: this.x.cb +'px',
					top: - this.y.cb +'px',
					bottom: - this.y.cb +'px',
					overflow: 'auto'
				});
				this.x.p1 = overlay.offsetWidth;

			} else if (/^rightpanel$/.test(p)) {
				hs.setStyles(overlay, {
					left: '100%',
					marginLeft: this.x.cb +'px',
					top: - this.y.cb +'px',
					bottom: - this.y.cb +'px',
					overflow: 'auto'
				});
				this.x.p2 = overlay.offsetWidth;
			}
			var parOff = overlay.parentNode.offsetHeight;
			overlay.style.height = 'auto';
			if (relToVP && overlay.offsetHeight > parOff)
				overlay.style.height = hs.ieLt7 ? parOff +'px' : '100%';

			if (/^top/.test(p)) overlay.style.top = offY +'px';
			if (/^middle/.test(p))	hs.setStyles (overlay, {
				top: '50%',
				marginTop: (offY - Math.round(overlay.offsetHeight / 2)) +'px'
			});
			if (/^bottom/.test(p)) overlay.style.bottom = - offY +'px';
			if (/^above$/.test(p)) {
				hs.setStyles(overlay, {
					left: (- this.x.p1 - this.x.cb) +'px',
					right: (- this.x.p2 - this.x.cb) +'px',
					bottom: '100%',
					marginBottom: this.y.cb +'px',
					width: 'auto'
				});
				this.y.p1 = overlay.offsetHeight;

			} else if (/^below$/.test(p)) {
				hs.setStyles(overlay, {
					position: 'relative',
					left: (- this.x.p1 - this.x.cb) +'px',
					right: (- this.x.p2 - this.x.cb) +'px',
					top: '100%',
					marginTop: this.y.cb +'px',
					width: 'auto'
				});
				this.y.p2 = overlay.offsetHeight;
				overlay.style.position = 'absolute';
			}
		},

		getOverlays : function() {
			this.getInline(['heading', 'caption'], true);
			this.getNumber();
			if (this.caption) hs.fireEvent(this, 'onAfterGetCaption');
			if (this.heading) hs.fireEvent(this, 'onAfterGetHeading');
			if (this.heading && this.dragByHeading) this.heading.className += ' highslide-move';
			if (hs.showCredits) this.writeCredits();
			for (var i = 0; i < hs.overlays.length; i++) {
				var o = hs.overlays[i], tId = o.thumbnailId, sg = o.slideshowGroup;
				if ((!tId && !sg) || (tId && tId == this.thumbsUserSetId)
					|| (sg && sg === this.slideshowGroup)) {
					if (this.isImage || (this.isHtml && o.useOnHtml))
						this.createOverlay(o);
				}
			}
			var os = [];
			for (var i = 0; i < this.overlays.length; i++) {
				var o = hs.$('hsId'+ this.overlays[i]);
				if (/panel$/.test(o.position)) this.positionOverlay(o);
				else hs.push(os, o);
			}
			for (var i = 0; i < os.length; i++) this.positionOverlay(os[i]);
			this.gotOverlays = true;
		},
		genOverlayBox : function() {
			if (!this.overlayBox) this.overlayBox = hs.createElement (
				'div', {
					className: this.wrapperClassName
				}, {
					position : 'absolute',
					width: (this.x.size || (this.useBox ? this.width : null)
						|| this.x.full) +'px',
					height: (this.y.size || this.y.full) +'px',
					visibility : 'hidden',
					overflow : 'hidden',
					zIndex : hs.ie ? 4 : 'auto'
				},
				hs.container,
				true
			);
		},
		sizeOverlayBox : function(doWrapper, doPanels) {
			var overlayBox = this.overlayBox,
				x = this.x,
				y = this.y;
			hs.setStyles( overlayBox, {
				width: x.size +'px',
				height: y.size +'px'
			});
			if (doWrapper || doPanels) {
				for (var i = 0; i < this.overlays.length; i++) {
					var o = hs.$('hsId'+ this.overlays[i]);
					var ie6 = (hs.ieLt7 || document.compatMode == 'BackCompat');
					if (o && /^(above|below)$/.test(o.position)) {
						if (ie6) {
							o.style.width = (overlayBox.offsetWidth + 2 * x.cb
								+ x.p1 + x.p2) +'px';
						}
						y[o.position == 'above' ? 'p1' : 'p2'] = o.offsetHeight;
					}
					if (o && ie6 && /^(left|right)panel$/.test(o.position)) {
						o.style.height = (overlayBox.offsetHeight + 2* y.cb) +'px';
					}
				}
			}
			if (doWrapper) {
				hs.setStyles(this.content, {
					top: y.p1 +'px'
				});
				hs.setStyles(overlayBox, {
					top: (y.p1 + y.cb) +'px'
				});
			}
		},

		showOverlays : function() {
			var b = this.overlayBox;
			b.className = '';
			hs.setStyles(b, {
				top: (this.y.p1 + this.y.cb) +'px',
				left: (this.x.p1 + this.x.cb) +'px',
				overflow : 'visible'
			});
			if (hs.safari) b.style.visibility = 'visible';
			this.wrapper.appendChild (b);
			for (var i = 0; i < this.overlays.length; i++) {
				var o = hs.$('hsId'+ this.overlays[i]);
				o.style.zIndex = o.zIndex || 4;
				if (!o.hideOnMouseOut || this.mouseIsOver) {
					o.style.visibility = 'visible';
					hs.setStyles(o, { visibility: 'visible', display: '' });
					hs.animate(o, { opacity: o.opacity }, o.dur);
				}
			}
		},

		destroyOverlays : function() {
			if (!this.overlays.length) return;
			if (this.slideshow) {
				var c = this.slideshow.controls;
				if (c && hs.getExpander(c) == this) c.parentNode.removeChild(c);
			}
			for (var i = 0; i < this.overlays.length; i++) {
				var o = hs.$('hsId'+ this.overlays[i]);
				if (o && o.parentNode == hs.viewport && hs.getExpander(o) == this) hs.discardElement(o);
			}
			if (this.isHtml && this.preserveContent) {
				this.overlayBox.style.top = '-9999px';
				hs.container.appendChild(this.overlayBox);
			} else
				hs.discardElement(this.overlayBox);
		},



		createFullExpand : function () {
			if (this.slideshow && this.slideshow.controls) {
				this.slideshow.enable('full-expand');
				return;
			}
			this.fullExpandLabel = hs.createElement(
				'a', {
					href: 'javascript:hs.expanders['+ this.key +'].doFullExpand();',
					title: hs.lang.fullExpandTitle,
					className: 'highslide-full-expand'
				}
			);
			if (!hs.fireEvent(this, 'onCreateFullExpand')) return;

			this.createOverlay({
				overlayId: this.fullExpandLabel,
				position: hs.fullExpandPosition,
				hideOnMouseOut: true,
				opacity: hs.fullExpandOpacity
			});
		},

		doFullExpand : function () {
			try {
				if (!hs.fireEvent(this, 'onDoFullExpand')) return;
				if (this.fullExpandLabel) hs.discardElement(this.fullExpandLabel);

				this.focus();
				var xSize = this.x.size,
					ySize = this.y.size;
				this.resizeTo(this.x.full, this.y.full);

				var xpos = this.x.pos - (this.x.size - xSize) / 2;
				if (xpos < hs.marginLeft) xpos = hs.marginLeft;

				var ypos = this.y.pos - (this.y.size - ySize) / 2;
				if (ypos < hs.marginTop) ypos = hs.marginTop;

				this.moveTo(xpos, ypos);
				this.doShowHide('hidden');

			} catch (e) {
				this.error(e);
			}
		},


		afterClose : function () {
			this.a.className = this.a.className.replace('highslide-active-anchor', '');

			this.doShowHide('visible');

			if (this.isHtml && this.preserveContent
				&& this.transitions[1] != 'crossfade') {
				this.sleep();
			} else {
				if (this.outline && this.outlineWhileAnimating) this.outline.destroy();
				if (this.iframe && this.objectLoadTime != 'after') this.destroyObject();
				hs.discardElement(this.wrapper);
			}
			if (hs.mask) hs.mask.style.display = 'none';
			this.destroyOverlays();
			if (!hs.viewport.childNodes.length) hs.viewport.style.display = 'none';

			if (this.dimmingOpacity) hs.undim(this.key);
			hs.fireEvent(this, 'onAfterClose');
			hs.expanders[this.key] = null;
			hs.reOrder();
		}

	};


// hs.Ajax object prototype
	hs.Ajax = function (a, content, pre) {
		this.a = a;
		this.content = content;
		this.pre = pre;
	};

	hs.Ajax.prototype = {
		run : function () {
			var xhr;
			if (!this.src) this.src = hs.getSrc(this.a);
			if (this.src.match('#')) {
				var arr = this.src.split('#');
				this.src = arr[0];
				this.id = arr[1];
			}
			if (hs.cachedGets[this.src]) {
				this.cachedGet = hs.cachedGets[this.src];
				if (this.id) this.getElementContent();
				else this.loadHTML();
				return;
			}
			try { xhr = new XMLHttpRequest(); }
			catch (e) {
				try { xhr = new ActiveXObject("Msxml2.XMLHTTP"); }
				catch (e) {
					try { xhr = new ActiveXObject("Microsoft.XMLHTTP"); }
					catch (e) { this.onError(); }
				}
			}
			var pThis = this;
			xhr.onreadystatechange = function() {
				if(pThis.xhr.readyState == 4) {
					if (pThis.id) pThis.getElementContent();
					else pThis.loadHTML();
				}
			};
			var src = this.src;
			this.xhr = xhr;
			if (hs.forceAjaxReload)
				src = src.replace(/$/, (/\?/.test(src) ? '&' : '?') +'dummy='+ (new Date()).getTime());
			xhr.open('GET', src, true);
			xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.send(null);
		},

		getElementContent : function() {
			hs.init();
			var attribs = window.opera || hs.ie6SSL ? { src: 'about:blank' } : null;

			this.iframe = hs.createElement('iframe', attribs,
				{ position: 'absolute', top: '-9999px' }, hs.container);

			this.loadHTML();
		},

		loadHTML : function() {
			var s = this.cachedGet || this.xhr.responseText,
				regBody;
			if (this.pre) hs.cachedGets[this.src] = s;
			if (!hs.ie || hs.uaVersion >= 5.5) {
				s = s.replace(new RegExp('<link[^>]*>', 'gi'), '')
				.replace(new RegExp('<script[^>]*>.*?</script>', 'gi'), '');
				if (this.iframe) {
					var doc = this.iframe.contentDocument;
					if (!doc && this.iframe.contentWindow) doc = this.iframe.contentWindow.document;
					if (!doc) { // Opera
						var pThis = this;
						setTimeout(function() {	pThis.loadHTML(); }, 25);
						return;
					}
					doc.open();
					doc.write(s);
					doc.close();
					try { s = doc.getElementById(this.id).innerHTML; } catch (e) {
						try { s = this.iframe.document.getElementById(this.id).innerHTML; } catch (e) {} // opera
					}
					hs.discardElement(this.iframe);
				} else {
					regBody = /(<body[^>]*>|<\/body>)/ig;
					if (regBody.test(s)) s = s.split(regBody)[hs.ieLt9 ? 1 : 2];

				}
			}
			hs.getElementByClass(this.content, 'DIV', 'highslide-body').innerHTML = s;
			this.onLoad();
			for (var x in this) this[x] = null;
		}
	};


	hs.Slideshow = function (expKey, options) {
		if (hs.dynamicallyUpdateAnchors !== false) hs.updateAnchors();
		this.expKey = expKey;
		for (var x in options) this[x] = options[x];
		if (this.useControls) this.getControls();
		if (this.thumbstrip) this.thumbstrip = hs.Thumbstrip(this);
	};
	hs.Slideshow.prototype = {
		getControls: function() {
			this.controls = hs.createElement('div', { innerHTML: hs.replaceLang(hs.skin.controls) },
				null, hs.container);

			var buttons = ['play', 'pause', 'previous', 'next', 'move', 'full-expand', 'close'];
			this.btn = {};
			var pThis = this;
			for (var i = 0; i < buttons.length; i++) {
				this.btn[buttons[i]] = hs.getElementByClass(this.controls, 'li', 'highslide-'+ buttons[i]);
				this.enable(buttons[i]);
			}
			this.btn.pause.style.display = 'none';
			//this.disable('full-expand');
		},
		checkFirstAndLast: function() {
			if (this.repeat || !this.controls) return;
			var exp = hs.expanders[this.expKey],
				cur = exp.getAnchorIndex(),
				re = /disabled$/;
			if (cur == 0)
				this.disable('previous');
			else if (re.test(this.btn.previous.getElementsByTagName('a')[0].className))
				this.enable('previous');
			if (cur + 1 == hs.anchors.groups[exp.slideshowGroup || 'none'].length) {
				this.disable('next');
				this.disable('play');
			} else if (re.test(this.btn.next.getElementsByTagName('a')[0].className)) {
				this.enable('next');
				this.enable('play');
			}
		},
		enable: function(btn) {
			if (!this.btn) return;
			var sls = this, a = this.btn[btn].getElementsByTagName('a')[0], re = /disabled$/;
			a.onclick = function() {
				sls[btn]();
				return false;
			};
			if (re.test(a.className)) a.className = a.className.replace(re, '');
		},
		disable: function(btn) {
			if (!this.btn) return;
			var a = this.btn[btn].getElementsByTagName('a')[0];
			a.onclick = function() { return false; };
			if (!/disabled$/.test(a.className)) a.className += ' disabled';
		},
		hitSpace: function() {
			if (this.autoplay) this.pause();
			else this.play();
		},
		play: function(wait) {
			if (this.btn) {
				this.btn.play.style.display = 'none';
				this.btn.pause.style.display = '';
			}

			this.autoplay = true;
			if (!wait) hs.next(this.expKey);
		},
		pause: function() {
			if (this.btn) {
				this.btn.pause.style.display = 'none';
				this.btn.play.style.display = '';
			}

			clearTimeout(this.autoplay);
			this.autoplay = null;
		},
		previous: function() {
			this.pause();
			hs.previous(this.btn.previous);
		},
		next: function() {
			this.pause();
			hs.next(this.btn.next);
		},
		move: function() {},
		'full-expand': function() {
			hs.getExpander().doFullExpand();
		},
		close: function() {
			hs.close(this.btn.close);
		}
	};
	hs.Thumbstrip = function(slideshow) {
		function add (exp) {
			hs.extend(options || {}, {
				overlayId: dom,
				hsId: 'thumbstrip',
				className: 'highslide-thumbstrip-'+ mode +'-overlay ' + (options.className || '')
			});
			if (hs.ieLt7) options.fade = 0;
			exp.createOverlay(options);
			hs.setStyles(dom.parentNode, { overflow: 'hidden' });
		};

		function scroll (delta) {
			selectThumb(undefined, Math.round(delta * dom[isX ? 'offsetWidth' : 'offsetHeight'] * 0.7));
		};

		function selectThumb (i, scrollBy) {
			if (i === undefined) for (var j = 0; j < group.length; j++) {
				if (group[j] == hs.expanders[slideshow.expKey].a) {
					i = j;
					break;
				}
			}
			if (i === undefined) return;
			var as = dom.getElementsByTagName('a'),
				active = as[i],
				cell = active.parentNode,
				left = isX ? 'Left' : 'Top',
				right = isX ? 'Right' : 'Bottom',
				width = isX ? 'Width' : 'Height',
				offsetLeft = 'offset' + left,
				offsetWidth = 'offset' + width,
				overlayWidth = div.parentNode.parentNode[offsetWidth],
				minTblPos = overlayWidth - table[offsetWidth],
				curTblPos = parseInt(table.style[isX ? 'left' : 'top']) || 0,
				tblPos = curTblPos,
				mgnRight = 20;
			if (scrollBy !== undefined) {
				tblPos = curTblPos - scrollBy;

				if (minTblPos > 0) minTblPos = 0;
				if (tblPos > 0) tblPos = 0;
				if (tblPos < minTblPos) tblPos = minTblPos;


			} else {
				for (var j = 0; j < as.length; j++) as[j].className = '';
				active.className = 'highslide-active-anchor';
				var activeLeft = i > 0 ? as[i - 1].parentNode[offsetLeft] : cell[offsetLeft],
					activeRight = cell[offsetLeft] + cell[offsetWidth] +
						(as[i + 1] ? as[i + 1].parentNode[offsetWidth] : 0);
				if (activeRight > overlayWidth - curTblPos) tblPos = overlayWidth - activeRight;
				else if (activeLeft < -curTblPos) tblPos = -activeLeft;
			}
			var markerPos = cell[offsetLeft] + (cell[offsetWidth] - marker[offsetWidth]) / 2 + tblPos;
			hs.animate(table, isX ? { left: tblPos } : { top: tblPos }, null, 'easeOutQuad');
			hs.animate(marker, isX ? { left: markerPos } : { top: markerPos }, null, 'easeOutQuad');
			scrollUp.style.display = tblPos < 0 ? 'block' : 'none';
			scrollDown.style.display = (tblPos > minTblPos)  ? 'block' : 'none';

		};


		// initialize
		var group = hs.anchors.groups[hs.expanders[slideshow.expKey].slideshowGroup || 'none'],
			options = slideshow.thumbstrip,
			mode = options.mode || 'horizontal',
			floatMode = (mode == 'float'),
			tree = floatMode ? ['div', 'ul', 'li', 'span'] : ['table', 'tbody', 'tr', 'td'],
			isX = (mode == 'horizontal'),
			dom = hs.createElement('div', {
				className: 'highslide-thumbstrip highslide-thumbstrip-'+ mode,
				innerHTML:
					'<div class="highslide-thumbstrip-inner">'+
					'<'+ tree[0] +'><'+ tree[1] +'></'+ tree[1] +'></'+ tree[0] +'></div>'+
					'<div class="highslide-scroll-up"><div></div></div>'+
					'<div class="highslide-scroll-down"><div></div></div>'+
					'<div class="highslide-marker"><div></div></div>'
			}, {
				display: 'none'
			}, hs.container),
			domCh = dom.childNodes,
			div = domCh[0],
			scrollUp = domCh[1],
			scrollDown = domCh[2],
			marker = domCh[3],
			table = div.firstChild,
			tbody = dom.getElementsByTagName(tree[1])[0],
			tr;
		for (var i = 0; i < group.length; i++) {
			if (i == 0 || !isX) tr = hs.createElement(tree[2], null, null, tbody);
			(function(){
				var a = group[i],
					cell = hs.createElement(tree[3], null, null, tr),
					pI = i;
				hs.createElement('a', {
					href: a.href,
					title: a.title,
					onclick: function() {
						if (/highslide-active-anchor/.test(this.className)) return false;
						hs.getExpander(this).focus();
						return hs.transit(a);
					},
					innerHTML: hs.stripItemFormatter ? hs.stripItemFormatter(a) : a.innerHTML
				}, null, cell);
			})();
		}
		if (!floatMode) {
			scrollUp.onclick = function () { scroll(-1); };
			scrollDown.onclick = function() { scroll(1); };
			hs.addEventListener(tbody, document.onmousewheel !== undefined ?
				'mousewheel' : 'DOMMouseScroll', function(e) {
				var delta = 0;
				e = e || window.event;
				if (e.wheelDelta) {
					delta = e.wheelDelta/120;
					if (hs.opera) delta = -delta;
				} else if (e.detail) {
					delta = -e.detail/3;
				}
				if (delta) scroll(-delta * 0.2);
				if (e.preventDefault) e.preventDefault();
				e.returnValue = false;
			});
		}

		return {
			add: add,
			selectThumb: selectThumb
		}
	};
	hs.langDefaults = hs.lang;
// history
	var HsExpander = hs.Expander;
	if (hs.ie && window == window.top) {
		(function () {
			try {
				document.documentElement.doScroll('left');
			} catch (e) {
				setTimeout(arguments.callee, 50);
				return;
			}
			hs.ready();
		})();
	}
	hs.addEventListener(document, 'DOMContentLoaded', hs.ready);
	hs.addEventListener(window, 'load', hs.ready);

// set handlers
	hs.addEventListener(document, 'ready', function() {
		if (hs.expandCursor || hs.dimmingOpacity) {
			var style = hs.createElement('style', { type: 'text/css' }, null,
				document.getElementsByTagName('HEAD')[0]),
				backCompat = document.compatMode == 'BackCompat';


			function addRule(sel, dec) {
				if (hs.ie && (hs.uaVersion < 9 || backCompat)) {
					var last = document.styleSheets[document.styleSheets.length - 1];
					if (typeof(last.addRule) == "object") last.addRule(sel, dec);
				} else {
					style.appendChild(document.createTextNode(sel + " {" + dec + "}"));
				}
			}
			function fix(prop) {
				return 'expression( ( ( ignoreMe = document.documentElement.'+ prop +
					' ? document.documentElement.'+ prop +' : document.body.'+ prop +' ) ) + \'px\' );';
			}
			if (hs.expandCursor) addRule ('.highslide img',
				'cursor: url('+ hs.graphicsDir + hs.expandCursor +'), pointer !important;');
			addRule ('.highslide-viewport-size',
				hs.ie && (hs.uaVersion < 7 || backCompat) ?
					'position: absolute; '+
					'left:'+ fix('scrollLeft') +
					'top:'+ fix('scrollTop') +
					'width:'+ fix('clientWidth') +
					'height:'+ fix('clientHeight') :
					'position: fixed; width: 100%; height: 100%; left: 0; top: 0');
		}
	});
	hs.addEventListener(window, 'resize', function() {
		hs.getPageSize();
		if (hs.viewport) for (var i = 0; i < hs.viewport.childNodes.length; i++) {
			var node = hs.viewport.childNodes[i],
				exp = hs.getExpander(node);
			exp.positionOverlay(node);
			if (node.hsId == 'thumbstrip') exp.slideshow.thumbstrip.selectThumb();
		}
	});
	hs.addEventListener(document, 'mousemove', function(e) {
		hs.mouse = { x: e.clientX, y: e.clientY	};
	});
	hs.addEventListener(document, 'mousedown', hs.mouseClickHandler);
	hs.addEventListener(document, 'mouseup', hs.mouseClickHandler);
	hs.addEventListener(document, 'ready', hs.setClickEvents);
	hs.addEventListener(window, 'load', hs.preloadImages);
	hs.addEventListener(window, 'load', hs.preloadAjax);
}
(function(f){if(typeof exports==="object"&&typeof module!=="undefined"){module.exports=f()}else if(typeof define==="function"&&define.amd){define([],f)}else{var g;if(typeof window!=="undefined"){g=window}else if(typeof global!=="undefined"){g=global}else if(typeof self!=="undefined"){g=self}else{g=this}g.jsmediatags = f()}})(function(){var define,module,exports;return (function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){

},{}],2:[function(require,module,exports){
module.exports = XMLHttpRequest;

},{}],3:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var MediaFileReader = require('./MediaFileReader');

var ArrayFileReader = function (_MediaFileReader) {
  _inherits(ArrayFileReader, _MediaFileReader);

  function ArrayFileReader(array) {
    _classCallCheck(this, ArrayFileReader);

    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(ArrayFileReader).call(this));

    _this._array = array;
    _this._size = array.length;
    _this._isInitialized = true;
    return _this;
  }

  _createClass(ArrayFileReader, [{
    key: 'init',
    value: function init(callbacks) {
      setTimeout(callbacks.onSuccess, 0);
    }
  }, {
    key: 'loadRange',
    value: function loadRange(range, callbacks) {
      setTimeout(callbacks.onSuccess, 0);
    }
  }, {
    key: 'getByteAt',
    value: function getByteAt(offset) {
      if (offset >= this._array.length) {
        throw new Error("Offset " + offset + " hasn't been loaded yet.");
      }
      return this._array[offset];
    }
  }], [{
    key: 'canReadFile',
    value: function canReadFile(file) {
      return Array.isArray(file) || typeof Buffer === 'function' && Buffer.isBuffer(file);
    }
  }]);

  return ArrayFileReader;
}(MediaFileReader);

module.exports = ArrayFileReader;

},{"./MediaFileReader":11}],4:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ChunkedFileData = require('./ChunkedFileData');
var MediaFileReader = require('./MediaFileReader');

var BlobFileReader = function (_MediaFileReader) {
  _inherits(BlobFileReader, _MediaFileReader);

  function BlobFileReader(blob) {
    _classCallCheck(this, BlobFileReader);

    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(BlobFileReader).call(this));

    _this._blob = blob;
    _this._fileData = new ChunkedFileData();
    return _this;
  }

  _createClass(BlobFileReader, [{
    key: '_init',
    value: function _init(callbacks) {
      this._size = this._blob.size;
      setTimeout(callbacks.onSuccess, 1);
    }
  }, {
    key: 'loadRange',
    value: function loadRange(range, callbacks) {
      var self = this;
      // $FlowIssue - flow isn't aware of mozSlice or webkitSlice
      var blobSlice = this._blob.slice || this._blob.mozSlice || this._blob.webkitSlice;
      var blob = blobSlice.call(this._blob, range[0], range[1] + 1);
      var browserFileReader = new FileReader();

      browserFileReader.onloadend = function (event) {
        var intArray = new Uint8Array(Number(browserFileReader.result));
        self._fileData.addData(range[0], intArray);
        callbacks.onSuccess();
      };
      browserFileReader.onerror = browserFileReader.onabort = function (event) {
        if (callbacks.onError) {
          callbacks.onError({ "type": "blob", "info": browserFileReader.error });
        }
      };

      browserFileReader.readAsArrayBuffer(blob);
    }
  }, {
    key: 'getByteAt',
    value: function getByteAt(offset) {
      return this._fileData.getByteAt(offset);
    }
  }], [{
    key: 'canReadFile',
    value: function canReadFile(file) {
      return typeof Blob !== "undefined" && file instanceof Blob ||
      // File extends Blob but it seems that File instanceof Blob doesn't
      // quite work as expected in Cordova/PhoneGap.
      typeof File !== "undefined" && file instanceof File;
    }
  }]);

  return BlobFileReader;
}(MediaFileReader);

module.exports = BlobFileReader;

},{"./ChunkedFileData":5,"./MediaFileReader":11}],5:[function(require,module,exports){
/**
 * This class represents a file that might not have all its data loaded yet.
 * It is used when loading the entire file is not an option because it's too
 * expensive. Instead, parts of the file are loaded and added only when needed.
 * From a reading point of view is as if the entire file is loaded. The
 * exception is when the data is not available yet, an error will be thrown.
 * This class does not load the data, it just manages it. It provides operations
 * to add and read data from the file.
 *
 * 
 */
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var NOT_FOUND = -1;

var ChunkedFileData = function () {
  _createClass(ChunkedFileData, null, [{
    key: 'NOT_FOUND',

    // $FlowIssue - get/set properties not yet supported
    get: function () {
      return NOT_FOUND;
    }
  }]);

  function ChunkedFileData() {
    _classCallCheck(this, ChunkedFileData);

    this._fileData = [];
  }

  /**
   * Adds data to the file storage at a specific offset.
   */


  _createClass(ChunkedFileData, [{
    key: 'addData',
    value: function addData(offset, data) {
      var offsetEnd = offset + data.length - 1;
      var chunkRange = this._getChunkRange(offset, offsetEnd);

      if (chunkRange.startIx === NOT_FOUND) {
        this._fileData.splice(chunkRange.insertIx || 0, 0, {
          offset: offset,
          data: data
        });
      } else {
        // If the data to add collides with existing chunks we prepend and
        // append data from the half colliding chunks to make the collision at
        // 100%. The new data can then replace all the colliding chunkes.
        var firstChunk = this._fileData[chunkRange.startIx];
        var lastChunk = this._fileData[chunkRange.endIx];
        var needsPrepend = offset > firstChunk.offset;
        var needsAppend = offsetEnd < lastChunk.offset + lastChunk.data.length - 1;

        var chunk = {
          offset: Math.min(offset, firstChunk.offset),
          data: data
        };

        if (needsPrepend) {
          var slicedData = this._sliceData(firstChunk.data, 0, offset - firstChunk.offset);
          chunk.data = this._concatData(slicedData, data);
        }

        if (needsAppend) {
          // Use the lastChunk because the slice logic is easier to handle.
          var slicedData = this._sliceData(chunk.data, 0, lastChunk.offset - chunk.offset);
          chunk.data = this._concatData(slicedData, lastChunk.data);
        }

        this._fileData.splice(chunkRange.startIx, chunkRange.endIx - chunkRange.startIx + 1, chunk);
      }
    }
  }, {
    key: '_concatData',
    value: function _concatData(dataA, dataB) {
      // TypedArrays don't support concat.
      if (typeof ArrayBuffer !== "undefined" && ArrayBuffer.isView && ArrayBuffer.isView(dataA)) {
        // $FlowIssue - flow thinks dataAandB is a string but it's not
        var dataAandB = new dataA.constructor(dataA.length + dataB.length);
        // $FlowIssue - flow thinks dataAandB is a string but it's not
        dataAandB.set(dataA, 0);
        // $FlowIssue - flow thinks dataAandB is a string but it's not
        dataAandB.set(dataB, dataA.length);
        return dataAandB;
      } else {
        // $FlowIssue - flow thinks dataAandB is a TypedArray but it's not
        return dataA.concat(dataB);
      }
    }
  }, {
    key: '_sliceData',
    value: function _sliceData(data, begin, end) {
      // Some TypeArray implementations do not support slice yet.
      if (data.slice) {
        return data.slice(begin, end);
      } else {
        // $FlowIssue - flow thinks data is a string but it's not
        return data.subarray(begin, end);
      }
    }

    /**
     * Finds the chunk range that overlaps the [offsetStart-1,offsetEnd+1] range.
     * When a chunk is adjacent to the offset we still consider it part of the
     * range (this is the situation of offsetStart-1 or offsetEnd+1).
     * When no chunks are found `insertIx` denotes the index where the data
     * should be inserted in the data list (startIx == NOT_FOUND and endIX ==
     * NOT_FOUND).
     */

  }, {
    key: '_getChunkRange',
    value: function _getChunkRange(offsetStart, offsetEnd) {
      var startChunkIx = NOT_FOUND;
      var endChunkIx = NOT_FOUND;
      var insertIx = 0;

      // Could use binary search but not expecting that many blocks to exist.
      for (var i = 0; i < this._fileData.length; i++, insertIx = i) {
        var chunkOffsetStart = this._fileData[i].offset;
        var chunkOffsetEnd = chunkOffsetStart + this._fileData[i].data.length;

        if (offsetEnd < chunkOffsetStart - 1) {
          // This offset range doesn't overlap with any chunks.
          break;
        }
        // If it is adjacent we still consider it part of the range because
        // we're going end up with a single block with all contiguous data.
        if (offsetStart <= chunkOffsetEnd + 1 && offsetEnd >= chunkOffsetStart - 1) {
          startChunkIx = i;
          break;
        }
      }

      // No starting chunk was found, meaning that the offset is either before
      // or after the current stored chunks.
      if (startChunkIx === NOT_FOUND) {
        return {
          startIx: NOT_FOUND,
          endIx: NOT_FOUND,
          insertIx: insertIx
        };
      }

      // Find the ending chunk.
      for (var i = startChunkIx; i < this._fileData.length; i++) {
        var chunkOffsetStart = this._fileData[i].offset;
        var chunkOffsetEnd = chunkOffsetStart + this._fileData[i].data.length;

        if (offsetEnd >= chunkOffsetStart - 1) {
          // Candidate for the end chunk, it doesn't mean it is yet.
          endChunkIx = i;
        }
        if (offsetEnd <= chunkOffsetEnd + 1) {
          break;
        }
      }

      if (endChunkIx === NOT_FOUND) {
        endChunkIx = startChunkIx;
      }

      return {
        startIx: startChunkIx,
        endIx: endChunkIx
      };
    }
  }, {
    key: 'hasDataRange',
    value: function hasDataRange(offsetStart, offsetEnd) {
      for (var i = 0; i < this._fileData.length; i++) {
        var chunk = this._fileData[i];
        if (offsetEnd < chunk.offset) {
          return false;
        }

        if (offsetStart >= chunk.offset && offsetEnd < chunk.offset + chunk.data.length) {
          return true;
        }
      }

      return false;
    }
  }, {
    key: 'getByteAt',
    value: function getByteAt(offset) {
      var dataChunk;

      for (var i = 0; i < this._fileData.length; i++) {
        var dataChunkStart = this._fileData[i].offset;
        var dataChunkEnd = dataChunkStart + this._fileData[i].data.length - 1;

        if (offset >= dataChunkStart && offset <= dataChunkEnd) {
          dataChunk = this._fileData[i];
          break;
        }
      }

      if (dataChunk) {
        return dataChunk.data[offset - dataChunk.offset];
      }

      throw new Error("Offset " + offset + " hasn't been loaded yet.");
    }
  }]);

  return ChunkedFileData;
}();

module.exports = ChunkedFileData;

},{}],6:[function(require,module,exports){
"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var MediaTagReader = require('./MediaTagReader');

/* The first 4 bytes of a FLAC file describes the header for the file. If these
 * bytes respectively read "fLaC", we can determine it is a FLAC file.
 */
var FLAC_HEADER_SIZE = 4;

/* FLAC metadata is stored in blocks containing data ranging from STREAMINFO to
 * VORBIS_COMMENT, which is what we want to work with.
 *
 * Each metadata header is 4 bytes long, with the first byte determining whether
 * it is the last metadata block before the audio data and what the block type is.
 * This first byte can further be split into 8 bits, with the first bit being the
 * last-metadata-block flag, and the last three bits being the block type.
 *
 * Since the specification states that the decimal value for a VORBIS_COMMENT block
 * type is 4, the two possibilities for the comment block header values are:
 * - 00000100 (Not a last metadata comment block, value of 4)
 * - 10000100 (A last metadata comment block, value of 132)
 *
 * Similarly, the picture block header values are 6 and 128.
 *
 * All values for METADATA_BLOCK_HEADER can be found here.
 * https://xiph.org/flac/format.html#metadata_block_header
 */
var COMMENT_HEADERS = [4, 132];
var PICTURE_HEADERS = [6, 134];

// These are the possible image types as defined by the FLAC specification.
var IMAGE_TYPES = ["Other", "32x32 pixels 'file icon' (PNG only)", "Other file icon", "Cover (front)", "Cover (back)", "Leaflet page", "Media (e.g. label side of CD)", "Lead artist/lead performer/soloist", "Artist/performer", "Conductor", "Band/Orchestra", "Composer", "Lyricist/text writer", "Recording Location", "During recording", "During performance", "Movie/video screen capture", "A bright coloured fish", "Illustration", "Band/artist logotype", "Publisher/Studio logotype"];

/**
 * Class representing a MediaTagReader that parses FLAC tags.
 */
var FLACTagReader = function (_MediaTagReader) {
  _inherits(FLACTagReader, _MediaTagReader);

  function FLACTagReader() {
    _classCallCheck(this, FLACTagReader);

    return _possibleConstructorReturn(this, Object.getPrototypeOf(FLACTagReader).apply(this, arguments));
  }

  _createClass(FLACTagReader, [{
    key: "_loadData",


    /**
     * Function called to load the data from the file.
     *
     * To begin processing the blocks, the next 4 bytes after the initial 4 bytes
     * (bytes 4 through 7) are loaded. From there, the rest of the loading process
     * is passed on to the _loadBlock function, which will handle the rest of the
     * parsing for the metadata blocks.
     *
     * @param {MediaFileReader} mediaFileReader - The MediaFileReader used to parse the file.
     * @param {LoadCallbackType} callbacks - The callback to call once _loadData is completed.
     */
    value: function _loadData(mediaFileReader, callbacks) {
      var self = this;
      mediaFileReader.loadRange([4, 7], {
        onSuccess: function () {
          self._loadBlock(mediaFileReader, 4, callbacks);
        }
      });
    }

    /**
     * Special internal function used to parse the different FLAC blocks.
     *
     * The FLAC specification doesn't specify a specific location for metadata to resign, but
     * dictates that it may be in one of various blocks located throughout the file. To load the
     * metadata, we must locate the header first. This can be done by reading the first byte of
     * each block to determine the block type. After the block type comes a 24 bit integer that stores
     * the length of the block as big endian. Using this, we locate the block and store the offset for
     * parsing later.
     *
     * After each block has been parsed, the _nextBlock function is called in order
     * to parse the information of the next block. All blocks need to be parsed in order to find
     * all of the picture and comment blocks.
     *
     * More info on the FLAC specification may be found here:
     * https://xiph.org/flac/format.html
     * @param {MediaFileReader} mediaFileReader - The MediaFileReader used to parse the file.
     * @param {number} offset - The offset to start checking the header from.
     * @param {LoadCallbackType} callbacks - The callback to call once the header has been found.
     */

  }, {
    key: "_loadBlock",
    value: function _loadBlock(mediaFileReader, offset, callbacks) {
      var self = this;
      /* As mentioned above, this first byte is loaded to see what metadata type
       * this block represents.
       */
      var blockHeader = mediaFileReader.getByteAt(offset);
      /* The last three bytes (integer 24) contain a value representing the length
       * of the following metadata block. The 1 is added in order to shift the offset
       * by one to get the last three bytes in the block header.
       */
      var blockSize = mediaFileReader.getInteger24At(offset + 1, true);
      /* This conditional checks if blockHeader (the byte retrieved representing the
       * type of the header) is one the headers we are looking for.
       *
       * If that is not true, the block is skipped over and the next range is loaded:
       * - offset + 4 + blockSize adds 4 to skip over the initial metadata header and
       * blockSize to skip over the block overall, placing it at the head of the next
       * metadata header.
       * - offset + 4 + 4 + blockSize does the same thing as the previous block with
       * the exception of adding another 4 bytes to move it to the end of the new metadata
       * header.
       */
      if (COMMENT_HEADERS.indexOf(blockHeader) !== -1) {
        /* 4 is added to offset to move it to the head of the actual metadata.
         * The range starting from offsetMatadata (the beginning of the block)
         * and offsetMetadata + blockSize (the end of the block) is loaded.
         */
        var offsetMetadata = offset + 4;
        mediaFileReader.loadRange([offsetMetadata, offsetMetadata + blockSize], {
          onSuccess: function () {
            self._commentOffset = offsetMetadata;
            self._nextBlock(mediaFileReader, offset, blockHeader, blockSize, callbacks);
          }
        });
      } else if (PICTURE_HEADERS.indexOf(blockHeader) !== -1) {
        var offsetMetadata = offset + 4;
        mediaFileReader.loadRange([offsetMetadata, offsetMetadata + blockSize], {
          onSuccess: function () {
            self._pictureOffset = offsetMetadata;
            self._nextBlock(mediaFileReader, offset, blockHeader, blockSize, callbacks);
          }
        });
      } else {
        self._nextBlock(mediaFileReader, offset, blockHeader, blockSize, callbacks);
      }
    }

    /**
     * Internal function used to load the next range and respective block.
     *
     * If the metadata block that was identified is not the last block before the
     * audio blocks, the function will continue loading the next blocks. If it is
     * the last block (identified by any values greater than 127, see FLAC spec.),
     * the function will determine whether a comment block had been identified.
     *
     * If the block does not exist, the error callback is called. Otherwise, the function
     * will call the success callback, allowing data parsing to begin.
     * @param {MediaFileReader} mediaFileReader - The MediaFileReader used to parse the file.
     * @param {number} offset - The offset that the existing header was located at.
     * @param {number} blockHeader - An integer reflecting the header type of the block.
     * @param {number} blockSize - The size of the previously processed header.
     * @param {LoadCallbackType} callbacks - The callback functions to be called.
     */

  }, {
    key: "_nextBlock",
    value: function _nextBlock(mediaFileReader, offset, blockHeader, blockSize, callbacks) {
      var self = this;
      if (blockHeader > 127) {
        if (!self._commentOffset) {
          callbacks.onError({
            "type": "loadData",
            "info": "Comment block could not be found."
          });
        } else {
          callbacks.onSuccess();
        }
      } else {
        mediaFileReader.loadRange([offset + 4 + blockSize, offset + 4 + 4 + blockSize], {
          onSuccess: function () {
            self._loadBlock(mediaFileReader, offset + 4 + blockSize, callbacks);
          }
        });
      }
    }

    /**
     * Parses the data and returns the tags.
     *
     * This is an overview of the VorbisComment format and what this function attempts to
     * retrieve:
     * - First 4 bytes: a long that contains the length of the vendor string.
     * - Next n bytes: the vendor string encoded in UTF-8.
     * - Next 4 bytes: a long representing how many comments are in this block
     * For each comment that exists:
     * - First 4 bytes: a long representing the length of the comment
     * - Next n bytes: the comment encoded in UTF-8.
     * The comment string will usually appear in a format similar to:
     * ARTIST=me
     *
     * Note that the longs and integers in this block are encoded in little endian
     * as opposed to big endian for the rest of the FLAC spec.
     * @param {MediaFileReader} data - The MediaFileReader to parse the file with.
     * @param {Array<string>} [tags] - Optional tags to also be retrieved from the file.
     * @return {TagType} - An object containing the tag information for the file.
     */

  }, {
    key: "_parseData",
    value: function _parseData(data, tags) {
      var vendorLength = data.getLongAt(this._commentOffset, false);
      var offsetVendor = this._commentOffset + 4;
      /* This line is able to retrieve the vendor string that the VorbisComment block
       * contains. However, it is not part of the tags that JSMediaTags normally retrieves,
       * and is therefore commented out.
       */
      // var vendor = data.getStringWithCharsetAt(offsetVendor, vendorLength, "utf-8").toString();
      var offsetList = vendorLength + offsetVendor;
      /* To get the metadata from the block, we first get the long that contains the
       * number of actual comment values that are existent within the block.
       *
       * As we loop through all of the comment blocks, we get the data length in order to
       * get the right size string, and then determine which category that string falls under.
       * The dataOffset variable is constantly updated so that it is at the beginning of the
       * comment that is currently being parsed.
       *
       * Additions of 4 here are used to move the offset past the first 4 bytes which only contain
       * the length of the comment.
       */
      var numComments = data.getLongAt(offsetList, false);
      var dataOffset = offsetList + 4;
      var title, artist, album, track, genre, picture;
      for (var i = 0; i < numComments; i++) {
        var _dataLength = data.getLongAt(dataOffset, false);
        var s = data.getStringWithCharsetAt(dataOffset + 4, _dataLength, "utf-8").toString();
        var d = s.indexOf("=");
        var split = [s.slice(0, d), s.slice(d + 1)];
        switch (split[0]) {
          case "TITLE":
            title = split[1];
            break;
          case "ARTIST":
            artist = split[1];
            break;
          case "ALBUM":
            album = split[1];
            break;
          case "TRACKNUMBER":
            track = split[1];
            break;
          case "GENRE":
            genre = split[1];
            break;
        }
        dataOffset += 4 + _dataLength;
      }

      /* If a picture offset was found and assigned, then the reader will start processing
       * the picture block from that point.
       *
       * All the lengths for the picture data can be found online here:
       * https://xiph.org/flac/format.html#metadata_block_picture
       */
      if (this._pictureOffset) {
        var imageType = data.getLongAt(this._pictureOffset, true);
        var offsetMimeLength = this._pictureOffset + 4;
        var mimeLength = data.getLongAt(offsetMimeLength, true);
        var offsetMime = offsetMimeLength + 4;
        var mime = data.getStringAt(offsetMime, mimeLength);
        var offsetDescriptionLength = offsetMime + mimeLength;
        var descriptionLength = data.getLongAt(offsetDescriptionLength, true);
        var offsetDescription = offsetDescriptionLength + 4;
        var description = data.getStringWithCharsetAt(offsetDescription, descriptionLength, "utf-8").toString();
        var offsetDataLength = offsetDescription + descriptionLength + 16;
        var dataLength = data.getLongAt(offsetDataLength, true);
        var offsetData = offsetDataLength + 4;
        var imageData = data.getBytesAt(offsetData, dataLength, true);
        picture = {
          format: mime,
          type: IMAGE_TYPES[imageType],
          description: description,
          data: imageData
        };
      }

      var tag = {
        type: "FLAC",
        version: "1",
        tags: {
          "title": title,
          "artist": artist,
          "album": album,
          "track": track,
          "genre": genre,
          "picture": picture
        }
      };
      return tag;
    }
  }], [{
    key: "getTagIdentifierByteRange",


    /**
     * Gets the byte range for the tag identifier.
     *
     * Because the Vorbis comment block is not guaranteed to be in a specified
     * location, we can only load the first 4 bytes of the file to confirm it
     * is a FLAC first.
     *
     * @return {ByteRange} The byte range that identifies the tag for a FLAC.
     */
    value: function getTagIdentifierByteRange() {
      return {
        offset: 0,
        length: FLAC_HEADER_SIZE
      };
    }

    /**
     * Determines whether or not this reader can read a certain tag format.
     *
     * This checks that the first 4 characters in the file are fLaC, which
     * according to the FLAC file specification should be the characters that
     * indicate a FLAC file.
     *
     * @return {boolean} True if the header is fLaC, false otherwise.
     */

  }, {
    key: "canReadTagFormat",
    value: function canReadTagFormat(tagIdentifier) {
      var id = String.fromCharCode.apply(String, tagIdentifier.slice(0, 4));
      return id === 'fLaC';
    }
  }]);

  return FLACTagReader;
}(MediaTagReader);

module.exports = FLACTagReader;

},{"./MediaTagReader":12}],7:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var MediaTagReader = require('./MediaTagReader');
var MediaFileReader = require('./MediaFileReader');

var ID3v1TagReader = function (_MediaTagReader) {
  _inherits(ID3v1TagReader, _MediaTagReader);

  function ID3v1TagReader() {
    _classCallCheck(this, ID3v1TagReader);

    return _possibleConstructorReturn(this, Object.getPrototypeOf(ID3v1TagReader).apply(this, arguments));
  }

  _createClass(ID3v1TagReader, [{
    key: '_loadData',
    value: function _loadData(mediaFileReader, callbacks) {
      var fileSize = mediaFileReader.getSize();
      mediaFileReader.loadRange([fileSize - 128, fileSize - 1], callbacks);
    }
  }, {
    key: '_parseData',
    value: function _parseData(data, tags) {
      var offset = data.getSize() - 128;

      var title = data.getStringWithCharsetAt(offset + 3, 30).toString();
      var artist = data.getStringWithCharsetAt(offset + 33, 30).toString();
      var album = data.getStringWithCharsetAt(offset + 63, 30).toString();
      var year = data.getStringWithCharsetAt(offset + 93, 4).toString();

      var trackFlag = data.getByteAt(offset + 97 + 28);
      var track = data.getByteAt(offset + 97 + 29);
      if (trackFlag == 0 && track != 0) {
        var version = "1.1";
        var comment = data.getStringWithCharsetAt(offset + 97, 28).toString();
      } else {
        var version = "1.0";
        var comment = data.getStringWithCharsetAt(offset + 97, 30).toString();
        track = 0;
      }

      var genreIdx = data.getByteAt(offset + 97 + 30);
      if (genreIdx < 255) {
        var genre = GENRES[genreIdx];
      } else {
        var genre = "";
      }

      var tag = {
        "type": "ID3",
        "version": version,
        "tags": {
          "title": title,
          "artist": artist,
          "album": album,
          "year": year,
          "comment": comment,
          "genre": genre
        }
      };

      if (track) {
        // $FlowIssue - flow is not happy with adding properties
        tag.tags.track = track;
      }

      return tag;
    }
  }], [{
    key: 'getTagIdentifierByteRange',
    value: function getTagIdentifierByteRange() {
      // The identifier is TAG and is at offset: -128. However, to avoid a
      // fetch for the tag identifier and another for the data, we load the
      // entire data since it's so small.
      return {
        offset: -128,
        length: 128
      };
    }
  }, {
    key: 'canReadTagFormat',
    value: function canReadTagFormat(tagIdentifier) {
      var id = String.fromCharCode.apply(String, tagIdentifier.slice(0, 3));
      return id === "TAG";
    }
  }]);

  return ID3v1TagReader;
}(MediaTagReader);

var GENRES = ["Blues", "Classic Rock", "Country", "Dance", "Disco", "Funk", "Grunge", "Hip-Hop", "Jazz", "Metal", "New Age", "Oldies", "Other", "Pop", "R&B", "Rap", "Reggae", "Rock", "Techno", "Industrial", "Alternative", "Ska", "Death Metal", "Pranks", "Soundtrack", "Euro-Techno", "Ambient", "Trip-Hop", "Vocal", "Jazz+Funk", "Fusion", "Trance", "Classical", "Instrumental", "Acid", "House", "Game", "Sound Clip", "Gospel", "Noise", "AlternRock", "Bass", "Soul", "Punk", "Space", "Meditative", "Instrumental Pop", "Instrumental Rock", "Ethnic", "Gothic", "Darkwave", "Techno-Industrial", "Electronic", "Pop-Folk", "Eurodance", "Dream", "Southern Rock", "Comedy", "Cult", "Gangsta", "Top 40", "Christian Rap", "Pop/Funk", "Jungle", "Native American", "Cabaret", "New Wave", "Psychadelic", "Rave", "Showtunes", "Trailer", "Lo-Fi", "Tribal", "Acid Punk", "Acid Jazz", "Polka", "Retro", "Musical", "Rock & Roll", "Hard Rock", "Folk", "Folk-Rock", "National Folk", "Swing", "Fast Fusion", "Bebob", "Latin", "Revival", "Celtic", "Bluegrass", "Avantgarde", "Gothic Rock", "Progressive Rock", "Psychedelic Rock", "Symphonic Rock", "Slow Rock", "Big Band", "Chorus", "Easy Listening", "Acoustic", "Humour", "Speech", "Chanson", "Opera", "Chamber Music", "Sonata", "Symphony", "Booty Bass", "Primus", "Porn Groove", "Satire", "Slow Jam", "Club", "Tango", "Samba", "Folklore", "Ballad", "Power Ballad", "Rhythmic Soul", "Freestyle", "Duet", "Punk Rock", "Drum Solo", "Acapella", "Euro-House", "Dance Hall"];

module.exports = ID3v1TagReader;

},{"./MediaFileReader":11,"./MediaTagReader":12}],8:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var MediaFileReader = require('./MediaFileReader');
var StringUtils = require('./StringUtils');
var ArrayFileReader = require('./ArrayFileReader');

var FRAME_DESCRIPTIONS = {
  // v2.2
  "BUF": "Recommended buffer size",
  "CNT": "Play counter",
  "COM": "Comments",
  "CRA": "Audio encryption",
  "CRM": "Encrypted meta frame",
  "ETC": "Event timing codes",
  "EQU": "Equalization",
  "GEO": "General encapsulated object",
  "IPL": "Involved people list",
  "LNK": "Linked information",
  "MCI": "Music CD Identifier",
  "MLL": "MPEG location lookup table",
  "PIC": "Attached picture",
  "POP": "Popularimeter",
  "REV": "Reverb",
  "RVA": "Relative volume adjustment",
  "SLT": "Synchronized lyric/text",
  "STC": "Synced tempo codes",
  "TAL": "Album/Movie/Show title",
  "TBP": "BPM (Beats Per Minute)",
  "TCM": "Composer",
  "TCO": "Content type",
  "TCR": "Copyright message",
  "TDA": "Date",
  "TDY": "Playlist delay",
  "TEN": "Encoded by",
  "TFT": "File type",
  "TIM": "Time",
  "TKE": "Initial key",
  "TLA": "Language(s)",
  "TLE": "Length",
  "TMT": "Media type",
  "TOA": "Original artist(s)/performer(s)",
  "TOF": "Original filename",
  "TOL": "Original Lyricist(s)/text writer(s)",
  "TOR": "Original release year",
  "TOT": "Original album/Movie/Show title",
  "TP1": "Lead artist(s)/Lead performer(s)/Soloist(s)/Performing group",
  "TP2": "Band/Orchestra/Accompaniment",
  "TP3": "Conductor/Performer refinement",
  "TP4": "Interpreted, remixed, or otherwise modified by",
  "TPA": "Part of a set",
  "TPB": "Publisher",
  "TRC": "ISRC (International Standard Recording Code)",
  "TRD": "Recording dates",
  "TRK": "Track number/Position in set",
  "TSI": "Size",
  "TSS": "Software/hardware and settings used for encoding",
  "TT1": "Content group description",
  "TT2": "Title/Songname/Content description",
  "TT3": "Subtitle/Description refinement",
  "TXT": "Lyricist/text writer",
  "TXX": "User defined text information frame",
  "TYE": "Year",
  "UFI": "Unique file identifier",
  "ULT": "Unsychronized lyric/text transcription",
  "WAF": "Official audio file webpage",
  "WAR": "Official artist/performer webpage",
  "WAS": "Official audio source webpage",
  "WCM": "Commercial information",
  "WCP": "Copyright/Legal information",
  "WPB": "Publishers official webpage",
  "WXX": "User defined URL link frame",
  // v2.3
  "AENC": "Audio encryption",
  "APIC": "Attached picture",
  "ASPI": "Audio seek point index",
  "CHAP": "Chapter",
  "CTOC": "Table of contents",
  "COMM": "Comments",
  "COMR": "Commercial frame",
  "ENCR": "Encryption method registration",
  "EQU2": "Equalisation (2)",
  "EQUA": "Equalization",
  "ETCO": "Event timing codes",
  "GEOB": "General encapsulated object",
  "GRID": "Group identification registration",
  "IPLS": "Involved people list",
  "LINK": "Linked information",
  "MCDI": "Music CD identifier",
  "MLLT": "MPEG location lookup table",
  "OWNE": "Ownership frame",
  "PRIV": "Private frame",
  "PCNT": "Play counter",
  "POPM": "Popularimeter",
  "POSS": "Position synchronisation frame",
  "RBUF": "Recommended buffer size",
  "RVA2": "Relative volume adjustment (2)",
  "RVAD": "Relative volume adjustment",
  "RVRB": "Reverb",
  "SEEK": "Seek frame",
  "SYLT": "Synchronized lyric/text",
  "SYTC": "Synchronized tempo codes",
  "TALB": "Album/Movie/Show title",
  "TBPM": "BPM (beats per minute)",
  "TCOM": "Composer",
  "TCON": "Content type",
  "TCOP": "Copyright message",
  "TDAT": "Date",
  "TDLY": "Playlist delay",
  "TDRC": "Recording time",
  "TDRL": "Release time",
  "TDTG": "Tagging time",
  "TENC": "Encoded by",
  "TEXT": "Lyricist/Text writer",
  "TFLT": "File type",
  "TIME": "Time",
  "TIPL": "Involved people list",
  "TIT1": "Content group description",
  "TIT2": "Title/songname/content description",
  "TIT3": "Subtitle/Description refinement",
  "TKEY": "Initial key",
  "TLAN": "Language(s)",
  "TLEN": "Length",
  "TMCL": "Musician credits list",
  "TMED": "Media type",
  "TMOO": "Mood",
  "TOAL": "Original album/movie/show title",
  "TOFN": "Original filename",
  "TOLY": "Original lyricist(s)/text writer(s)",
  "TOPE": "Original artist(s)/performer(s)",
  "TORY": "Original release year",
  "TOWN": "File owner/licensee",
  "TPE1": "Lead performer(s)/Soloist(s)",
  "TPE2": "Band/orchestra/accompaniment",
  "TPE3": "Conductor/performer refinement",
  "TPE4": "Interpreted, remixed, or otherwise modified by",
  "TPOS": "Part of a set",
  "TPRO": "Produced notice",
  "TPUB": "Publisher",
  "TRCK": "Track number/Position in set",
  "TRDA": "Recording dates",
  "TRSN": "Internet radio station name",
  "TRSO": "Internet radio station owner",
  "TSOA": "Album sort order",
  "TSOP": "Performer sort order",
  "TSOT": "Title sort order",
  "TSIZ": "Size",
  "TSRC": "ISRC (international standard recording code)",
  "TSSE": "Software/Hardware and settings used for encoding",
  "TSST": "Set subtitle",
  "TYER": "Year",
  "TXXX": "User defined text information frame",
  "UFID": "Unique file identifier",
  "USER": "Terms of use",
  "USLT": "Unsychronized lyric/text transcription",
  "WCOM": "Commercial information",
  "WCOP": "Copyright/Legal information",
  "WOAF": "Official audio file webpage",
  "WOAR": "Official artist/performer webpage",
  "WOAS": "Official audio source webpage",
  "WORS": "Official internet radio station homepage",
  "WPAY": "Payment",
  "WPUB": "Publishers official webpage",
  "WXXX": "User defined URL link frame"
};

var ID3v2FrameReader = function () {
  function ID3v2FrameReader() {
    _classCallCheck(this, ID3v2FrameReader);
  }

  _createClass(ID3v2FrameReader, null, [{
    key: 'getFrameReaderFunction',
    value: function getFrameReaderFunction(frameId) {
      if (frameId in frameReaderFunctions) {
        return frameReaderFunctions[frameId];
      } else if (frameId[0] === "T") {
        // All frame ids starting with T are text tags.
        return frameReaderFunctions["T*"];
      } else if (frameId[0] === "W") {
        // All frame ids starting with W are url tags.
        return frameReaderFunctions["W*"];
      } else {
        return null;
      }
    }
    /**
     * All the frames consists of a frame header followed by one or more fields
     * containing the actual information.
     * The frame ID made out of the characters capital A-Z and 0-9. Identifiers
     * beginning with "X", "Y" and "Z" are for experimental use and free for
     * everyone to use, without the need to set the experimental bit in the tag
     * header. Have in mind that someone else might have used the same identifier
     * as you. All other identifiers are either used or reserved for future use.
     * The frame ID is followed by a size descriptor, making a total header size
     * of ten bytes in every frame. The size is calculated as frame size excluding
     * frame header (frame size - 10).
     */

  }, {
    key: 'readFrames',
    value: function readFrames(offset, end, data, id3header, tags) {
      var frames = {};
      var frameHeaderSize = this._getFrameHeaderSize(id3header);
      // console.log('header', id3header);
      while (
      // we should be able to read at least the frame header
      offset < end - frameHeaderSize) {
        var header = this._readFrameHeader(data, offset, id3header);
        var frameId = header.id;

        // No frame ID sometimes means it's the last frame (GTFO).
        if (!frameId) {
          break;
        }

        var flags = header.flags;
        var frameSize = header.size;
        var frameDataOffset = offset + header.headerSize;
        var frameData = data;

        // console.log(offset, frameId, header.size + header.headerSize, flags && flags.format.unsynchronisation);
        // advance data offset to the next frame data
        offset += header.headerSize + header.size;

        // skip unwanted tags
        if (tags && tags.indexOf(frameId) === -1) {
          continue;
        }
        // Workaround: MP3ext V3.3.17 places a non-compliant padding string at
        // the end of the ID3v2 header. A string like "MP3ext V3.3.19(ansi)"
        // is added multiple times at the end of the ID3 tag. More information
        // about this issue can be found at
        // https://github.com/aadsm/jsmediatags/issues/58#issuecomment-313865336
        if (frameId === 'MP3e' || frameId === '\x00MP3' || frameId === '\x00\x00MP' || frameId === ' MP3') {
          break;
        }

        var unsyncData;
        if (flags && flags.format.unsynchronisation) {
          frameData = this.getUnsyncFileReader(frameData, frameDataOffset, frameSize);
          frameDataOffset = 0;
          frameSize = frameData.getSize();
        }

        // the first 4 bytes are the real data size
        // (after unsynchronisation && encryption)
        if (flags && flags.format.data_length_indicator) {
          // var frameDataSize = frameData.getSynchsafeInteger32At(frameDataOffset);
          frameDataOffset += 4;
          frameSize -= 4;
        }

        var readFrameFunc = ID3v2FrameReader.getFrameReaderFunction(frameId);
        var parsedData = readFrameFunc ? readFrameFunc.apply(this, [frameDataOffset, frameSize, frameData, flags, id3header]) : null;
        var desc = this._getFrameDescription(frameId);

        var frame = {
          id: frameId,
          size: frameSize,
          description: desc,
          data: parsedData
        };

        if (frameId in frames) {
          if (frames[frameId].id) {
            frames[frameId] = [frames[frameId]];
          }
          frames[frameId].push(frame);
        } else {
          frames[frameId] = frame;
        }
      }

      return frames;
    }
  }, {
    key: '_getFrameHeaderSize',
    value: function _getFrameHeaderSize(id3header) {
      var major = id3header.major;

      if (major == 2) {
        return 6;
      } else if (major == 3 || major == 4) {
        return 10;
      } else {
        return 0;
      }
    }
  }, {
    key: '_readFrameHeader',
    value: function _readFrameHeader(data, offset, id3header) {
      var major = id3header.major;
      var flags = null;
      var frameHeaderSize = this._getFrameHeaderSize(id3header);

      switch (major) {
        case 2:
          var frameId = data.getStringAt(offset, 3);
          var frameSize = data.getInteger24At(offset + 3, true);
          break;

        case 3:
          var frameId = data.getStringAt(offset, 4);
          var frameSize = data.getLongAt(offset + 4, true);
          break;

        case 4:
          var frameId = data.getStringAt(offset, 4);
          var frameSize = data.getSynchsafeInteger32At(offset + 4);
          break;
      }

      if (frameId == String.fromCharCode(0, 0, 0) || frameId == String.fromCharCode(0, 0, 0, 0)) {
        frameId = "";
      }

      // if frameId is empty then it's the last frame
      if (frameId) {
        // read frame message and format flags
        if (major > 2) {
          flags = this._readFrameFlags(data, offset + 8);
        }
      }

      return {
        "id": frameId || "",
        "size": frameSize || 0,
        "headerSize": frameHeaderSize || 0,
        "flags": flags
      };
    }
  }, {
    key: '_readFrameFlags',
    value: function _readFrameFlags(data, offset) {
      return {
        message: {
          tag_alter_preservation: data.isBitSetAt(offset, 6),
          file_alter_preservation: data.isBitSetAt(offset, 5),
          read_only: data.isBitSetAt(offset, 4)
        },
        format: {
          grouping_identity: data.isBitSetAt(offset + 1, 7),
          compression: data.isBitSetAt(offset + 1, 3),
          encryption: data.isBitSetAt(offset + 1, 2),
          unsynchronisation: data.isBitSetAt(offset + 1, 1),
          data_length_indicator: data.isBitSetAt(offset + 1, 0)
        }
      };
    }
  }, {
    key: '_getFrameDescription',
    value: function _getFrameDescription(frameId) {
      if (frameId in FRAME_DESCRIPTIONS) {
        return FRAME_DESCRIPTIONS[frameId];
      } else {
        return 'Unknown';
      }
    }
  }, {
    key: 'getUnsyncFileReader',
    value: function getUnsyncFileReader(data, offset, size) {
      var frameData = data.getBytesAt(offset, size);
      for (var i = 0; i < frameData.length - 1; i++) {
        if (frameData[i] === 0xff && frameData[i + 1] === 0x00) {
          frameData.splice(i + 1, 1);
        }
      }

      return new ArrayFileReader(frameData);
    }
  }]);

  return ID3v2FrameReader;
}();

;

var frameReaderFunctions = {};

frameReaderFunctions['APIC'] = function readPictureFrame(offset, length, data, flags, id3header) {
  var start = offset;
  var charset = getTextEncoding(data.getByteAt(offset));
  switch (id3header && id3header.major) {
    case 2:
      var format = data.getStringAt(offset + 1, 3);
      offset += 4;
      break;

    case 3:
    case 4:
      var format = data.getStringWithCharsetAt(offset + 1, length - 1);
      offset += 1 + format.bytesReadCount;
      break;

    default:
      throw new Error("Couldn't read ID3v2 major version.");
  }
  var bite = data.getByteAt(offset);
  var type = PICTURE_TYPE[bite];
  var desc = data.getStringWithCharsetAt(offset + 1, length - (offset - start) - 1, charset);

  offset += 1 + desc.bytesReadCount;

  return {
    "format": format.toString(),
    "type": type,
    "description": desc.toString(),
    "data": data.getBytesAt(offset, start + length - offset)
  };
};

// ID3v2 chapters according to http://id3.org/id3v2-chapters-1.0
frameReaderFunctions['CHAP'] = function readChapterFrame(offset, length, data, flags, id3header) {
  var originalOffset = offset;
  var result = {};
  var id = StringUtils.readNullTerminatedString(data.getBytesAt(offset, length));
  result.id = id.toString();
  offset += id.bytesReadCount;
  result.startTime = data.getLongAt(offset, true);
  offset += 4;
  result.endTime = data.getLongAt(offset, true);
  offset += 4;
  result.startOffset = data.getLongAt(offset, true);
  offset += 4;
  result.endOffset = data.getLongAt(offset, true);
  offset += 4;

  var remainingLength = length - (offset - originalOffset);
  result.subFrames = this.readFrames(offset, offset + remainingLength, data, id3header);
  return result;
};

// ID3v2 table of contents according to http://id3.org/id3v2-chapters-1.0
frameReaderFunctions['CTOC'] = function readTableOfContentsFrame(offset, length, data, flags, id3header) {
  var originalOffset = offset;
  var result = { childElementIds: [], id: undefined, topLevel: undefined, ordered: undefined, entryCount: undefined, subFrames: undefined };
  var id = StringUtils.readNullTerminatedString(data.getBytesAt(offset, length));
  result.id = id.toString();
  offset += id.bytesReadCount;
  result.topLevel = data.isBitSetAt(offset, 1);
  result.ordered = data.isBitSetAt(offset, 0);
  offset++;
  result.entryCount = data.getByteAt(offset);
  offset++;
  for (var i = 0; i < result.entryCount; i++) {
    var childId = StringUtils.readNullTerminatedString(data.getBytesAt(offset, length - (offset - originalOffset)));
    result.childElementIds.push(childId.toString());
    offset += childId.bytesReadCount;
  }

  var remainingLength = length - (offset - originalOffset);
  result.subFrames = this.readFrames(offset, offset + remainingLength, data, id3header);
  return result;
};

frameReaderFunctions['COMM'] = function readCommentsFrame(offset, length, data, flags, id3header) {
  var start = offset;
  var charset = getTextEncoding(data.getByteAt(offset));
  var language = data.getStringAt(offset + 1, 3);
  var shortdesc = data.getStringWithCharsetAt(offset + 4, length - 4, charset);

  offset += 4 + shortdesc.bytesReadCount;
  var text = data.getStringWithCharsetAt(offset, start + length - offset, charset);

  return {
    language: language,
    short_description: shortdesc.toString(),
    text: text.toString()
  };
};

frameReaderFunctions['COM'] = frameReaderFunctions['COMM'];

frameReaderFunctions['PIC'] = function (offset, length, data, flags, id3header) {
  return frameReaderFunctions['APIC'](offset, length, data, flags, id3header);
};

frameReaderFunctions['PCNT'] = function readCounterFrame(offset, length, data, flags, id3header) {
  // FIXME: implement the rest of the spec
  return data.getLongAt(offset, false);
};

frameReaderFunctions['CNT'] = frameReaderFunctions['PCNT'];

frameReaderFunctions['T*'] = function readTextFrame(offset, length, data, flags, id3header) {
  var charset = getTextEncoding(data.getByteAt(offset));

  return data.getStringWithCharsetAt(offset + 1, length - 1, charset).toString();
};

frameReaderFunctions['TXXX'] = function readTextFrame(offset, length, data, flags, id3header) {
  var charset = getTextEncoding(data.getByteAt(offset));

  return getUserDefinedFields(offset, length, data, charset);
};

frameReaderFunctions['W*'] = function readUrlFrame(offset, length, data, flags, id3header) {
  // charset is only defined for user-defined URL link frames (http://id3.org/id3v2.3.0#User_defined_URL_link_frame)
  // for the other URL link frames it is always iso-8859-1
  var charset = getTextEncoding(data.getByteAt(offset));

  if (charset !== undefined) {
    return getUserDefinedFields(offset, length, data, charset);
  } else {
    return data.getStringWithCharsetAt(offset, length, charset).toString();
  }
};

frameReaderFunctions['TCON'] = function readGenreFrame(offset, length, data, flags) {
  var text = frameReaderFunctions['T*'].apply(this, arguments);
  return text.replace(/^\(\d+\)/, '');
};

frameReaderFunctions['TCO'] = frameReaderFunctions['TCON'];

frameReaderFunctions['USLT'] = function readLyricsFrame(offset, length, data, flags, id3header) {
  var start = offset;
  var charset = getTextEncoding(data.getByteAt(offset));
  var language = data.getStringAt(offset + 1, 3);
  var descriptor = data.getStringWithCharsetAt(offset + 4, length - 4, charset);

  offset += 4 + descriptor.bytesReadCount;
  var lyrics = data.getStringWithCharsetAt(offset, start + length - offset, charset);

  return {
    language: language,
    descriptor: descriptor.toString(),
    lyrics: lyrics.toString()
  };
};

frameReaderFunctions['ULT'] = frameReaderFunctions['USLT'];

frameReaderFunctions['UFID'] = function readLyricsFrame(offset, length, data, flags, id3header) {
  var ownerIdentifier = StringUtils.readNullTerminatedString(data.getBytesAt(offset, length));
  offset += ownerIdentifier.bytesReadCount;
  var identifier = data.getBytesAt(offset, length - ownerIdentifier.bytesReadCount);

  return {
    ownerIdentifier: ownerIdentifier.toString(),
    identifier: identifier
  };
};

function getTextEncoding(bite) {
  var charset;

  switch (bite) {
    case 0x00:
      charset = 'iso-8859-1';
      break;

    case 0x01:
      charset = 'utf-16';
      break;

    case 0x02:
      charset = 'utf-16be';
      break;

    case 0x03:
      charset = 'utf-8';
      break;

    default:
      charset = 'iso-8859-1';
  }

  return charset;
}

// Handles reading description/data from either http://id3.org/id3v2.3.0#User_defined_text_information_frame
// and http://id3.org/id3v2.3.0#User_defined_URL_link_frame
function getUserDefinedFields(offset, length, data, charset) {
  var userDesc = data.getStringWithCharsetAt(offset + 1, length - 1, charset);
  var userDefinedData = data.getStringWithCharsetAt(offset + 1 + userDesc.bytesReadCount, length - 1 - userDesc.bytesReadCount);

  return {
    user_description: userDesc.toString(),
    data: userDefinedData.toString()
  };
}

var PICTURE_TYPE = ["Other", "32x32 pixels 'file icon' (PNG only)", "Other file icon", "Cover (front)", "Cover (back)", "Leaflet page", "Media (e.g. label side of CD)", "Lead artist/lead performer/soloist", "Artist/performer", "Conductor", "Band/Orchestra", "Composer", "Lyricist/text writer", "Recording Location", "During recording", "During performance", "Movie/video screen capture", "A bright coloured fish", "Illustration", "Band/artist logotype", "Publisher/Studio logotype"];

module.exports = ID3v2FrameReader;

},{"./ArrayFileReader":3,"./MediaFileReader":11,"./StringUtils":13}],9:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var MediaTagReader = require('./MediaTagReader');
var MediaFileReader = require('./MediaFileReader');
var ID3v2FrameReader = require('./ID3v2FrameReader');

var ID3_HEADER_SIZE = 10;

var ID3v2TagReader = function (_MediaTagReader) {
  _inherits(ID3v2TagReader, _MediaTagReader);

  function ID3v2TagReader() {
    _classCallCheck(this, ID3v2TagReader);

    return _possibleConstructorReturn(this, Object.getPrototypeOf(ID3v2TagReader).apply(this, arguments));
  }

  _createClass(ID3v2TagReader, [{
    key: '_loadData',
    value: function _loadData(mediaFileReader, callbacks) {
      mediaFileReader.loadRange([6, 9], {
        onSuccess: function () {
          mediaFileReader.loadRange(
          // The tag size does not include the header size.
          [0, ID3_HEADER_SIZE + mediaFileReader.getSynchsafeInteger32At(6) - 1], callbacks);
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: '_parseData',
    value: function _parseData(data, tags) {
      var offset = 0;
      var major = data.getByteAt(offset + 3);
      if (major > 4) {
        return { "type": "ID3", "version": ">2.4", "tags": {} };
      }
      var revision = data.getByteAt(offset + 4);
      var unsynch = data.isBitSetAt(offset + 5, 7);
      var xheader = data.isBitSetAt(offset + 5, 6);
      var xindicator = data.isBitSetAt(offset + 5, 5);
      var size = data.getSynchsafeInteger32At(offset + 6);
      offset += 10;

      if (xheader) {
        // TODO: support 2.4
        var xheadersize = data.getLongAt(offset, true);
        // The 'Extended header size', currently 6 or 10 bytes, excludes itself.
        offset += xheadersize + 4;
      }

      var id3 = {
        "type": "ID3",
        "version": '2.' + major + '.' + revision,
        "major": major,
        "revision": revision,
        "flags": {
          "unsynchronisation": unsynch,
          "extended_header": xheader,
          "experimental_indicator": xindicator,
          // TODO: footer_present
          "footer_present": false
        },
        "size": size,
        "tags": {}
      };

      if (tags) {
        var expandedTags = this._expandShortcutTags(tags);
      }

      var offsetEnd = size + 10 /*header size*/;
      // When this flag is set the entire tag needs to be un-unsynchronised
      // before parsing each individual frame. Individual frame sizes might not
      // take unsynchronisation into consideration when it's set on the tag
      // header.
      if (id3.flags.unsynchronisation) {
        data = ID3v2FrameReader.getUnsyncFileReader(data, offset, size);
        offset = 0;
        offsetEnd = data.getSize();
      }

      var frames = ID3v2FrameReader.readFrames(offset, offsetEnd, data, id3, expandedTags);
      // create shortcuts for most common data.
      for (var name in SHORTCUTS) {
        if (SHORTCUTS.hasOwnProperty(name)) {
          var frameData = this._getFrameData(frames, SHORTCUTS[name]);
          if (frameData) {
            id3.tags[name] = frameData;
          }
        }
      }for (var frame in frames) {
        if (frames.hasOwnProperty(frame)) {
          id3.tags[frame] = frames[frame];
        }
      }return id3;
    }
  }, {
    key: '_getFrameData',
    value: function _getFrameData(frames, ids) {
      var frame;
      for (var i = 0, id; id = ids[i]; i++) {
        if (id in frames) {
          if (frames[id] instanceof Array) {
            frame = frames[id][0];
          } else {
            frame = frames[id];
          }
          return frame.data;
        }
      }
    }
  }, {
    key: 'getShortcuts',
    value: function getShortcuts() {
      return SHORTCUTS;
    }
  }], [{
    key: 'getTagIdentifierByteRange',
    value: function getTagIdentifierByteRange() {
      // ID3 header
      return {
        offset: 0,
        length: ID3_HEADER_SIZE
      };
    }
  }, {
    key: 'canReadTagFormat',
    value: function canReadTagFormat(tagIdentifier) {
      var id = String.fromCharCode.apply(String, tagIdentifier.slice(0, 3));
      return id === 'ID3';
    }
  }]);

  return ID3v2TagReader;
}(MediaTagReader);

var SHORTCUTS = {
  "title": ["TIT2", "TT2"],
  "artist": ["TPE1", "TP1"],
  "album": ["TALB", "TAL"],
  "year": ["TYER", "TYE"],
  "comment": ["COMM", "COM"],
  "track": ["TRCK", "TRK"],
  "genre": ["TCON", "TCO"],
  "picture": ["APIC", "PIC"],
  "lyrics": ["USLT", "ULT"]
};

module.exports = ID3v2TagReader;

},{"./ID3v2FrameReader":8,"./MediaFileReader":11,"./MediaTagReader":12}],10:[function(require,module,exports){
/**
 * Support for iTunes-style m4a tags
 * See:
 *   http://atomicparsley.sourceforge.net/mpeg-4files.html
 *   http://developer.apple.com/mac/library/documentation/QuickTime/QTFF/Metadata/Metadata.html
 * Authored by Joshua Kifer <joshua.kifer gmail.com>
 * 
 */
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var MediaTagReader = require('./MediaTagReader');
var MediaFileReader = require('./MediaFileReader');

var MP4TagReader = function (_MediaTagReader) {
  _inherits(MP4TagReader, _MediaTagReader);

  function MP4TagReader() {
    _classCallCheck(this, MP4TagReader);

    return _possibleConstructorReturn(this, Object.getPrototypeOf(MP4TagReader).apply(this, arguments));
  }

  _createClass(MP4TagReader, [{
    key: '_loadData',
    value: function _loadData(mediaFileReader, callbacks) {
      // MP4 metadata isn't located in a specific location of the file. Roughly
      // speaking, it's composed of blocks chained together like a linked list.
      // These blocks are called atoms (or boxes).
      // Each atom of the list can have its own child linked list. Atoms in this
      // situation do not possess any data and are called "container" as they only
      // contain other atoms.
      // Other atoms represent a particular set of data, like audio, video or
      // metadata. In order to find and load all the interesting atoms we need
      // to traverse the entire linked list of atoms and only load the ones
      // associated with metadata.
      // The metadata atoms can be find under the "moov.udta.meta.ilst" hierarchy.

      var self = this;
      // Load the header of the first atom
      mediaFileReader.loadRange([0, 16], {
        onSuccess: function () {
          self._loadAtom(mediaFileReader, 0, "", callbacks);
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: '_loadAtom',
    value: function _loadAtom(mediaFileReader, offset, parentAtomFullName, callbacks) {
      if (offset >= mediaFileReader.getSize()) {
        callbacks.onSuccess();
        return;
      }

      var self = this;
      // 8 is the size of the atomSize and atomName fields.
      // When reading the current block we always read 8 more bytes in order
      // to also read the header of the next block.
      var atomSize = mediaFileReader.getLongAt(offset, true);
      if (atomSize == 0 || isNaN(atomSize)) {
        callbacks.onSuccess();
        return;
      }
      var atomName = mediaFileReader.getStringAt(offset + 4, 4);
      // console.log(parentAtomFullName, atomName, atomSize);
      // Container atoms (no actual data)
      if (this._isContainerAtom(atomName)) {
        if (atomName == "meta") {
          // The "meta" atom breaks convention and is a container with data.
          offset += 4; // next_item_id (uint32)
        }
        var atomFullName = (parentAtomFullName ? parentAtomFullName + "." : "") + atomName;
        if (atomFullName === "moov.udta.meta.ilst") {
          mediaFileReader.loadRange([offset, offset + atomSize], callbacks);
        } else {
          mediaFileReader.loadRange([offset + 8, offset + 8 + 8], {
            onSuccess: function () {
              self._loadAtom(mediaFileReader, offset + 8, atomFullName, callbacks);
            },
            onError: callbacks.onError
          });
        }
      } else {
        mediaFileReader.loadRange([offset + atomSize, offset + atomSize + 8], {
          onSuccess: function () {
            self._loadAtom(mediaFileReader, offset + atomSize, parentAtomFullName, callbacks);
          },
          onError: callbacks.onError
        });
      }
    }
  }, {
    key: '_isContainerAtom',
    value: function _isContainerAtom(atomName) {
      return ["moov", "udta", "meta", "ilst"].indexOf(atomName) >= 0;
    }
  }, {
    key: '_canReadAtom',
    value: function _canReadAtom(atomName) {
      return atomName !== "----";
    }
  }, {
    key: '_parseData',
    value: function _parseData(data, tagsToRead) {
      var tags = {};

      tagsToRead = this._expandShortcutTags(tagsToRead);
      this._readAtom(tags, data, 0, data.getSize(), tagsToRead);

      // create shortcuts for most common data.
      for (var name in SHORTCUTS) {
        if (SHORTCUTS.hasOwnProperty(name)) {
          var tag = tags[SHORTCUTS[name]];
          if (tag) {
            if (name === "track") {
              tags[name] = tag.data.track;
            } else {
              tags[name] = tag.data;
            }
          }
        }
      }return {
        "type": "MP4",
        "ftyp": data.getStringAt(8, 4),
        "version": data.getLongAt(12, true),
        "tags": tags
      };
    }
  }, {
    key: '_readAtom',
    value: function _readAtom(tags, data, offset, length, tagsToRead, parentAtomFullName, indent) {
      indent = indent === undefined ? "" : indent + "  ";

      var seek = offset;
      while (seek < offset + length) {
        var atomSize = data.getLongAt(seek, true);
        if (atomSize == 0) {
          return;
        }
        var atomName = data.getStringAt(seek + 4, 4);

        // console.log(seek, parentAtomFullName, atomName, atomSize);
        if (this._isContainerAtom(atomName)) {
          if (atomName == "meta") {
            seek += 4; // next_item_id (uint32)
          }
          var atomFullName = (parentAtomFullName ? parentAtomFullName + "." : "") + atomName;
          this._readAtom(tags, data, seek + 8, atomSize - 8, tagsToRead, atomFullName, indent);
          return;
        }

        // Value atoms
        if ((!tagsToRead || tagsToRead.indexOf(atomName) >= 0) && parentAtomFullName === "moov.udta.meta.ilst" && this._canReadAtom(atomName)) {
          tags[atomName] = this._readMetadataAtom(data, seek);
        }

        seek += atomSize;
      }
    }
  }, {
    key: '_readMetadataAtom',
    value: function _readMetadataAtom(data, offset) {
      // 16: name + size + "data" + size (4 bytes each)
      var METADATA_HEADER = 16;

      var atomSize = data.getLongAt(offset, true);
      var atomName = data.getStringAt(offset + 4, 4);

      var klass = data.getInteger24At(offset + METADATA_HEADER + 1, true);
      var type = TYPES[klass];
      var atomData;

      if (atomName == "trkn") {
        atomData = {
          "track": data.getByteAt(offset + METADATA_HEADER + 11),
          "total": data.getByteAt(offset + METADATA_HEADER + 13)
        };
      } else if (atomName == "disk") {
        atomData = {
          "disk": data.getByteAt(offset + METADATA_HEADER + 11),
          "total": data.getByteAt(offset + METADATA_HEADER + 13)
        };
      } else {
        // 4: atom version (1 byte) + atom flags (3 bytes)
        // 4: NULL (usually locale indicator)
        var atomHeader = METADATA_HEADER + 4 + 4;
        var dataStart = offset + atomHeader;
        var dataLength = atomSize - atomHeader;
        var atomData;

        // Workaround for covers being parsed as 'uint8' type despite being an 'covr' atom
        if (atomName === 'covr' && type === 'uint8') {
          type = 'jpeg';
        }

        switch (type) {
          case "text":
            atomData = data.getStringWithCharsetAt(dataStart, dataLength, "utf-8").toString();
            break;

          case "uint8":
            atomData = data.getShortAt(dataStart, false);
            break;

          case "int":
          case "uint":
            // Though the QuickTime spec doesn't state it, there are 64-bit values
            // such as plID (Playlist/Collection ID). With its single 64-bit floating
            // point number type, these are hard to parse and pass in JavaScript.
            // The high word of plID seems to always be zero, so, as this is the
            // only current 64-bit atom handled, it is parsed from its 32-bit
            // low word as an unsigned long.
            //
            var intReader = type == 'int' ? dataLength == 1 ? data.getSByteAt : dataLength == 2 ? data.getSShortAt : dataLength == 4 ? data.getSLongAt : data.getLongAt : dataLength == 1 ? data.getByteAt : dataLength == 2 ? data.getShortAt : data.getLongAt;
            // $FlowFixMe - getByteAt doesn't receive a second argument
            atomData = intReader.call(data, dataStart + (dataLength == 8 ? 4 : 0), true);
            break;

          case "jpeg":
          case "png":
            atomData = {
              "format": "image/" + type,
              "data": data.getBytesAt(dataStart, dataLength)
            };
            break;
        }
      }

      return {
        id: atomName,
        size: atomSize,
        description: ATOM_DESCRIPTIONS[atomName] || "Unknown",
        data: atomData
      };
    }
  }, {
    key: 'getShortcuts',
    value: function getShortcuts() {
      return SHORTCUTS;
    }
  }], [{
    key: 'getTagIdentifierByteRange',
    value: function getTagIdentifierByteRange() {
      // The tag identifier is located in [4, 8] but since we'll need to reader
      // the header of the first block anyway, we load it instead to avoid
      // making two requests.
      return {
        offset: 0,
        length: 16
      };
    }
  }, {
    key: 'canReadTagFormat',
    value: function canReadTagFormat(tagIdentifier) {
      var id = String.fromCharCode.apply(String, tagIdentifier.slice(4, 8));
      return id === "ftyp";
    }
  }]);

  return MP4TagReader;
}(MediaTagReader);

/*
 * https://developer.apple.com/library/content/documentation/QuickTime/QTFF/Metadata/Metadata.html#//apple_ref/doc/uid/TP40000939-CH1-SW35
*/


var TYPES = {
  "0": "uint8",
  "1": "text",
  "13": "jpeg",
  "14": "png",
  "21": "int",
  "22": "uint"
};

var ATOM_DESCRIPTIONS = {
  "©alb": "Album",
  "©ART": "Artist",
  "aART": "Album Artist",
  "©day": "Release Date",
  "©nam": "Title",
  "©gen": "Genre",
  "gnre": "Genre",
  "trkn": "Track Number",
  "©wrt": "Composer",
  "©too": "Encoding Tool",
  "©enc": "Encoded By",
  "cprt": "Copyright",
  "covr": "Cover Art",
  "©grp": "Grouping",
  "keyw": "Keywords",
  "©lyr": "Lyrics",
  "©cmt": "Comment",
  "tmpo": "Tempo",
  "cpil": "Compilation",
  "disk": "Disc Number",
  "tvsh": "TV Show Name",
  "tven": "TV Episode ID",
  "tvsn": "TV Season",
  "tves": "TV Episode",
  "tvnn": "TV Network",
  "desc": "Description",
  "ldes": "Long Description",
  "sonm": "Sort Name",
  "soar": "Sort Artist",
  "soaa": "Sort Album",
  "soco": "Sort Composer",
  "sosn": "Sort Show",
  "purd": "Purchase Date",
  "pcst": "Podcast",
  "purl": "Podcast URL",
  "catg": "Category",
  "hdvd": "HD Video",
  "stik": "Media Type",
  "rtng": "Content Rating",
  "pgap": "Gapless Playback",
  "apID": "Purchase Account",
  "sfID": "Country Code",
  "atID": "Artist ID",
  "cnID": "Catalog ID",
  "plID": "Collection ID",
  "geID": "Genre ID",
  "xid ": "Vendor Information",
  "flvr": "Codec Flavor"
};

var UNSUPPORTED_ATOMS = {
  "----": 1
};

var SHORTCUTS = {
  "title": "©nam",
  "artist": "©ART",
  "album": "©alb",
  "year": "©day",
  "comment": "©cmt",
  "track": "trkn",
  "genre": "©gen",
  "picture": "covr",
  "lyrics": "©lyr"
};

module.exports = MP4TagReader;

},{"./MediaFileReader":11,"./MediaTagReader":12}],11:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var StringUtils = require('./StringUtils');

var MediaFileReader = function () {
  function MediaFileReader(path) {
    _classCallCheck(this, MediaFileReader);

    this._isInitialized = false;
    this._size = 0;
  }

  /**
   * Decides if this media file reader is able to read the given file.
   */


  _createClass(MediaFileReader, [{
    key: 'init',


    /**
     * This function needs to be called before any other function.
     * Loads the necessary initial information from the file.
     */
    value: function init(callbacks) {
      var self = this;

      if (this._isInitialized) {
        setTimeout(callbacks.onSuccess, 1);
      } else {
        return this._init({
          onSuccess: function () {
            self._isInitialized = true;
            callbacks.onSuccess();
          },
          onError: callbacks.onError
        });
      }
    }
  }, {
    key: '_init',
    value: function _init(callbacks) {
      throw new Error("Must implement init function");
    }

    /**
     * @param range The start and end indexes of the range to load.
     *        Ex: [0, 7] load bytes 0 to 7 inclusive.
     */

  }, {
    key: 'loadRange',
    value: function loadRange(range, callbacks) {
      throw new Error("Must implement loadRange function");
    }

    /**
     * @return The size of the file in bytes.
     */

  }, {
    key: 'getSize',
    value: function getSize() {
      if (!this._isInitialized) {
        throw new Error("init() must be called first.");
      }

      return this._size;
    }
  }, {
    key: 'getByteAt',
    value: function getByteAt(offset) {
      throw new Error("Must implement getByteAt function");
    }
  }, {
    key: 'getBytesAt',
    value: function getBytesAt(offset, length) {
      var bytes = new Array(length);
      for (var i = 0; i < length; i++) {
        bytes[i] = this.getByteAt(offset + i);
      }
      return bytes;
    }
  }, {
    key: 'isBitSetAt',
    value: function isBitSetAt(offset, bit) {
      var iByte = this.getByteAt(offset);
      return (iByte & 1 << bit) != 0;
    }
  }, {
    key: 'getSByteAt',
    value: function getSByteAt(offset) {
      var iByte = this.getByteAt(offset);
      if (iByte > 127) {
        return iByte - 256;
      } else {
        return iByte;
      }
    }
  }, {
    key: 'getShortAt',
    value: function getShortAt(offset, isBigEndian) {
      var iShort = isBigEndian ? (this.getByteAt(offset) << 8) + this.getByteAt(offset + 1) : (this.getByteAt(offset + 1) << 8) + this.getByteAt(offset);
      if (iShort < 0) {
        iShort += 65536;
      }
      return iShort;
    }
  }, {
    key: 'getSShortAt',
    value: function getSShortAt(offset, isBigEndian) {
      var iUShort = this.getShortAt(offset, isBigEndian);
      if (iUShort > 32767) {
        return iUShort - 65536;
      } else {
        return iUShort;
      }
    }
  }, {
    key: 'getLongAt',
    value: function getLongAt(offset, isBigEndian) {
      var iByte1 = this.getByteAt(offset),
          iByte2 = this.getByteAt(offset + 1),
          iByte3 = this.getByteAt(offset + 2),
          iByte4 = this.getByteAt(offset + 3);

      var iLong = isBigEndian ? (((iByte1 << 8) + iByte2 << 8) + iByte3 << 8) + iByte4 : (((iByte4 << 8) + iByte3 << 8) + iByte2 << 8) + iByte1;

      if (iLong < 0) {
        iLong += 4294967296;
      }

      return iLong;
    }
  }, {
    key: 'getSLongAt',
    value: function getSLongAt(offset, isBigEndian) {
      var iULong = this.getLongAt(offset, isBigEndian);

      if (iULong > 2147483647) {
        return iULong - 4294967296;
      } else {
        return iULong;
      }
    }
  }, {
    key: 'getInteger24At',
    value: function getInteger24At(offset, isBigEndian) {
      var iByte1 = this.getByteAt(offset),
          iByte2 = this.getByteAt(offset + 1),
          iByte3 = this.getByteAt(offset + 2);

      var iInteger = isBigEndian ? ((iByte1 << 8) + iByte2 << 8) + iByte3 : ((iByte3 << 8) + iByte2 << 8) + iByte1;

      if (iInteger < 0) {
        iInteger += 16777216;
      }

      return iInteger;
    }
  }, {
    key: 'getStringAt',
    value: function getStringAt(offset, length) {
      var string = [];
      for (var i = offset, j = 0; i < offset + length; i++, j++) {
        string[j] = String.fromCharCode(this.getByteAt(i));
      }
      return string.join("");
    }
  }, {
    key: 'getStringWithCharsetAt',
    value: function getStringWithCharsetAt(offset, length, charset) {
      var bytes = this.getBytesAt(offset, length);
      var string;

      switch ((charset || '').toLowerCase()) {
        case "utf-16":
        case "utf-16le":
        case "utf-16be":
          string = StringUtils.readUTF16String(bytes, charset === "utf-16be");
          break;

        case "utf-8":
          string = StringUtils.readUTF8String(bytes);
          break;

        default:
          string = StringUtils.readNullTerminatedString(bytes);
          break;
      }

      return string;
    }
  }, {
    key: 'getCharAt',
    value: function getCharAt(offset) {
      return String.fromCharCode(this.getByteAt(offset));
    }

    /**
     * The ID3v2 tag/frame size is encoded with four bytes where the most
     * significant bit (bit 7) is set to zero in every byte, making a total of 28
     * bits. The zeroed bits are ignored, so a 257 bytes long tag is represented
     * as $00 00 02 01.
     */

  }, {
    key: 'getSynchsafeInteger32At',
    value: function getSynchsafeInteger32At(offset) {
      var size1 = this.getByteAt(offset);
      var size2 = this.getByteAt(offset + 1);
      var size3 = this.getByteAt(offset + 2);
      var size4 = this.getByteAt(offset + 3);
      // 0x7f = 0b01111111
      var size = size4 & 0x7f | (size3 & 0x7f) << 7 | (size2 & 0x7f) << 14 | (size1 & 0x7f) << 21;

      return size;
    }
  }], [{
    key: 'canReadFile',
    value: function canReadFile(file) {
      throw new Error("Must implement canReadFile function");
    }
  }]);

  return MediaFileReader;
}();

module.exports = MediaFileReader;

},{"./StringUtils":13}],12:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var MediaFileReader = require('./MediaFileReader');

var MediaTagReader = function () {
  function MediaTagReader(mediaFileReader) {
    _classCallCheck(this, MediaTagReader);

    this._mediaFileReader = mediaFileReader;
    this._tags = null;
  }

  /**
   * Returns the byte range that needs to be loaded and fed to
   * _canReadTagFormat in order to identify if the file contains tag
   * information that can be read.
   */


  _createClass(MediaTagReader, [{
    key: 'setTagsToRead',
    value: function setTagsToRead(tags) {
      this._tags = tags;
      return this;
    }
  }, {
    key: 'read',
    value: function read(callbacks) {
      var self = this;

      this._mediaFileReader.init({
        onSuccess: function () {
          self._loadData(self._mediaFileReader, {
            onSuccess: function () {
              try {
                var tags = self._parseData(self._mediaFileReader, self._tags);
              } catch (ex) {
                if (callbacks.onError) {
                  callbacks.onError({
                    "type": "parseData",
                    "info": ex.message
                  });
                  return;
                }
              }

              // TODO: destroy mediaFileReader
              callbacks.onSuccess(tags);
            },
            onError: callbacks.onError
          });
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: 'getShortcuts',
    value: function getShortcuts() {
      return {};
    }

    /**
     * Load the necessary bytes from the media file.
     */

  }, {
    key: '_loadData',
    value: function _loadData(mediaFileReader, callbacks) {
      throw new Error("Must implement _loadData function");
    }

    /**
     * Parse the loaded data to read the media tags.
     */

  }, {
    key: '_parseData',
    value: function _parseData(mediaFileReader, tags) {
      throw new Error("Must implement _parseData function");
    }
  }, {
    key: '_expandShortcutTags',
    value: function _expandShortcutTags(tagsWithShortcuts) {
      if (!tagsWithShortcuts) {
        return null;
      }

      var tags = [];
      var shortcuts = this.getShortcuts();
      for (var i = 0, tagOrShortcut; tagOrShortcut = tagsWithShortcuts[i]; i++) {
        tags = tags.concat(shortcuts[tagOrShortcut] || [tagOrShortcut]);
      }

      return tags;
    }
  }], [{
    key: 'getTagIdentifierByteRange',
    value: function getTagIdentifierByteRange() {
      throw new Error("Must implement");
    }

    /**
     * Given a tag identifier (read from the file byte positions speficied by
     * getTagIdentifierByteRange) this function checks if it can read the tag
     * format or not.
     */

  }, {
    key: 'canReadTagFormat',
    value: function canReadTagFormat(tagIdentifier) {
      throw new Error("Must implement");
    }
  }]);

  return MediaTagReader;
}();

module.exports = MediaTagReader;

},{"./MediaFileReader":11}],13:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var InternalDecodedString = function () {
  function InternalDecodedString(value, bytesReadCount) {
    _classCallCheck(this, InternalDecodedString);

    this._value = value;
    this.bytesReadCount = bytesReadCount;
    this.length = value.length;
  }

  _createClass(InternalDecodedString, [{
    key: "toString",
    value: function toString() {
      return this._value;
    }
  }]);

  return InternalDecodedString;
}();

var StringUtils = {
  readUTF16String: function (bytes, bigEndian, maxBytes) {
    var ix = 0;
    var offset1 = 1,
        offset2 = 0;

    maxBytes = Math.min(maxBytes || bytes.length, bytes.length);

    if (bytes[0] == 0xFE && bytes[1] == 0xFF) {
      bigEndian = true;
      ix = 2;
    } else if (bytes[0] == 0xFF && bytes[1] == 0xFE) {
      bigEndian = false;
      ix = 2;
    }
    if (bigEndian) {
      offset1 = 0;
      offset2 = 1;
    }

    var arr = [];
    for (var j = 0; ix < maxBytes; j++) {
      var byte1 = bytes[ix + offset1];
      var byte2 = bytes[ix + offset2];
      var word1 = (byte1 << 8) + byte2;
      ix += 2;
      if (word1 == 0x0000) {
        break;
      } else if (byte1 < 0xD8 || byte1 >= 0xE0) {
        arr[j] = String.fromCharCode(word1);
      } else {
        var byte3 = bytes[ix + offset1];
        var byte4 = bytes[ix + offset2];
        var word2 = (byte3 << 8) + byte4;
        ix += 2;
        arr[j] = String.fromCharCode(word1, word2);
      }
    }
    return new InternalDecodedString(arr.join(""), ix);
  },

  readUTF8String: function (bytes, maxBytes) {
    var ix = 0;
    maxBytes = Math.min(maxBytes || bytes.length, bytes.length);

    if (bytes[0] == 0xEF && bytes[1] == 0xBB && bytes[2] == 0xBF) {
      ix = 3;
    }

    var arr = [];
    for (var j = 0; ix < maxBytes; j++) {
      var byte1 = bytes[ix++];
      if (byte1 == 0x00) {
        break;
      } else if (byte1 < 0x80) {
        arr[j] = String.fromCharCode(byte1);
      } else if (byte1 >= 0xC2 && byte1 < 0xE0) {
        var byte2 = bytes[ix++];
        arr[j] = String.fromCharCode(((byte1 & 0x1F) << 6) + (byte2 & 0x3F));
      } else if (byte1 >= 0xE0 && byte1 < 0xF0) {
        var byte2 = bytes[ix++];
        var byte3 = bytes[ix++];
        arr[j] = String.fromCharCode(((byte1 & 0xFF) << 12) + ((byte2 & 0x3F) << 6) + (byte3 & 0x3F));
      } else if (byte1 >= 0xF0 && byte1 < 0xF5) {
        var byte2 = bytes[ix++];
        var byte3 = bytes[ix++];
        var byte4 = bytes[ix++];
        var codepoint = ((byte1 & 0x07) << 18) + ((byte2 & 0x3F) << 12) + ((byte3 & 0x3F) << 6) + (byte4 & 0x3F) - 0x10000;
        arr[j] = String.fromCharCode((codepoint >> 10) + 0xD800, (codepoint & 0x3FF) + 0xDC00);
      }
    }
    return new InternalDecodedString(arr.join(""), ix);
  },

  readNullTerminatedString: function (bytes, maxBytes) {
    var arr = [];
    maxBytes = maxBytes || bytes.length;
    for (var i = 0; i < maxBytes;) {
      var byte1 = bytes[i++];
      if (byte1 == 0x00) {
        break;
      }
      arr[i - 1] = String.fromCharCode(byte1);
    }
    return new InternalDecodedString(arr.join(""), i);
  }
};

module.exports = StringUtils;

},{}],14:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ChunkedFileData = require('./ChunkedFileData');
var MediaFileReader = require('./MediaFileReader');

var CHUNK_SIZE = 1024;

var XhrFileReader = function (_MediaFileReader) {
  _inherits(XhrFileReader, _MediaFileReader);

  function XhrFileReader(url) {
    _classCallCheck(this, XhrFileReader);

    var _this = _possibleConstructorReturn(this, Object.getPrototypeOf(XhrFileReader).call(this));

    _this._url = url;
    _this._fileData = new ChunkedFileData();
    return _this;
  }

  _createClass(XhrFileReader, [{
    key: '_init',
    value: function _init(callbacks) {
      if (XhrFileReader._config.avoidHeadRequests) {
        this._fetchSizeWithGetRequest(callbacks);
      } else {
        this._fetchSizeWithHeadRequest(callbacks);
      }
    }
  }, {
    key: '_fetchSizeWithHeadRequest',
    value: function _fetchSizeWithHeadRequest(callbacks) {
      var self = this;

      this._makeXHRRequest("HEAD", null, {
        onSuccess: function (xhr) {
          var contentLength = self._parseContentLength(xhr);
          if (contentLength) {
            self._size = contentLength;
            callbacks.onSuccess();
          } else {
            // Content-Length not provided by the server, fallback to
            // GET requests.
            self._fetchSizeWithGetRequest(callbacks);
          }
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: '_fetchSizeWithGetRequest',
    value: function _fetchSizeWithGetRequest(callbacks) {
      var self = this;
      var range = this._roundRangeToChunkMultiple([0, 0]);

      this._makeXHRRequest("GET", range, {
        onSuccess: function (xhr) {
          var contentRange = self._parseContentRange(xhr);
          var data = self._getXhrResponseContent(xhr);

          if (contentRange) {
            if (contentRange.instanceLength == null) {
              // Last resort, server is not able to tell us the content length,
              // need to fetch entire file then.
              self._fetchEntireFile(callbacks);
              return;
            }
            self._size = contentRange.instanceLength;
          } else {
            // Range request not supported, we got the entire file
            self._size = data.length;
          }

          self._fileData.addData(0, data);
          callbacks.onSuccess();
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: '_fetchEntireFile',
    value: function _fetchEntireFile(callbacks) {
      var self = this;
      this._makeXHRRequest("GET", null, {
        onSuccess: function (xhr) {
          var data = self._getXhrResponseContent(xhr);
          self._size = data.length;
          self._fileData.addData(0, data);
          callbacks.onSuccess();
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: '_getXhrResponseContent',
    value: function _getXhrResponseContent(xhr) {
      return xhr.responseBody || xhr.responseText || "";
    }
  }, {
    key: '_parseContentLength',
    value: function _parseContentLength(xhr) {
      var contentLength = this._getResponseHeader(xhr, "Content-Length");

      if (contentLength == null) {
        return contentLength;
      } else {
        return parseInt(contentLength, 10);
      }
    }
  }, {
    key: '_parseContentRange',
    value: function _parseContentRange(xhr) {
      var contentRange = this._getResponseHeader(xhr, "Content-Range");

      if (contentRange) {
        var parsedContentRange = contentRange.match(/bytes (\d+)-(\d+)\/(?:(\d+)|\*)/i);
        if (!parsedContentRange) {
          throw new Error("FIXME: Unknown Content-Range syntax: " + contentRange);
        }

        return {
          firstBytePosition: parseInt(parsedContentRange[1], 10),
          lastBytePosition: parseInt(parsedContentRange[2], 10),
          instanceLength: parsedContentRange[3] ? parseInt(parsedContentRange[3], 10) : null
        };
      } else {
        return null;
      }
    }
  }, {
    key: 'loadRange',
    value: function loadRange(range, callbacks) {
      var self = this;

      if (self._fileData.hasDataRange(range[0], Math.min(self._size, range[1]))) {
        setTimeout(callbacks.onSuccess, 1);
        return;
      }

      // Always download in multiples of CHUNK_SIZE. If we're going to make a
      // request might as well get a chunk that makes sense. The big cost is
      // establishing the connection so getting 10bytes or 1K doesn't really
      // make a difference.
      range = this._roundRangeToChunkMultiple(range);

      // Upper range should not be greater than max file size
      range[1] = Math.min(self._size, range[1]);

      this._makeXHRRequest("GET", range, {
        onSuccess: function (xhr) {
          var data = self._getXhrResponseContent(xhr);
          self._fileData.addData(range[0], data);
          callbacks.onSuccess();
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: '_roundRangeToChunkMultiple',
    value: function _roundRangeToChunkMultiple(range) {
      var length = range[1] - range[0] + 1;
      var newLength = Math.ceil(length / CHUNK_SIZE) * CHUNK_SIZE;
      return [range[0], range[0] + newLength - 1];
    }
  }, {
    key: '_makeXHRRequest',
    value: function _makeXHRRequest(method, range, callbacks) {
      var xhr = this._createXHRObject();
      xhr.open(method, this._url);

      var onXHRLoad = function () {
        // 200 - OK
        // 206 - Partial Content
        // $FlowIssue - xhr will not be null here
        if (xhr.status === 200 || xhr.status === 206) {
          callbacks.onSuccess(xhr);
        } else if (callbacks.onError) {
          callbacks.onError({
            "type": "xhr",
            "info": "Unexpected HTTP status " + xhr.status + ".",
            "xhr": xhr
          });
        }
        xhr = null;
      };

      if (typeof xhr.onload !== 'undefined') {
        xhr.onload = onXHRLoad;
        xhr.onerror = function () {
          if (callbacks.onError) {
            callbacks.onError({
              "type": "xhr",
              "info": "Generic XHR error, check xhr object.",
              "xhr": xhr
            });
          }
        };
      } else {
        xhr.onreadystatechange = function () {
          // $FlowIssue - xhr will not be null here
          if (xhr.readyState === 4) {
            onXHRLoad();
          }
        };
      }

      if (XhrFileReader._config.timeoutInSec) {
        xhr.timeout = XhrFileReader._config.timeoutInSec * 1000;
        xhr.ontimeout = function () {
          if (callbacks.onError) {
            callbacks.onError({
              "type": "xhr",
              // $FlowIssue - xhr.timeout will not be null
              "info": "Timeout after " + xhr.timeout / 1000 + "s. Use jsmediatags.Config.setXhrTimeout to override.",
              "xhr": xhr
            });
          }
        };
      }

      xhr.overrideMimeType("text/plain; charset=x-user-defined");
      if (range) {
        this._setRequestHeader(xhr, "Range", "bytes=" + range[0] + "-" + range[1]);
      }
      this._setRequestHeader(xhr, "If-Modified-Since", "Sat, 01 Jan 1970 00:00:00 GMT");
      xhr.send(null);
    }
  }, {
    key: '_setRequestHeader',
    value: function _setRequestHeader(xhr, headerName, headerValue) {
      if (XhrFileReader._config.disallowedXhrHeaders.indexOf(headerName.toLowerCase()) < 0) {
        xhr.setRequestHeader(headerName, headerValue);
      }
    }
  }, {
    key: '_hasResponseHeader',
    value: function _hasResponseHeader(xhr, headerName) {
      var allResponseHeaders = xhr.getAllResponseHeaders();

      if (!allResponseHeaders) {
        return false;
      }

      var headers = allResponseHeaders.split("\r\n");
      var headerNames = [];
      for (var i = 0; i < headers.length; i++) {
        headerNames[i] = headers[i].split(":")[0].toLowerCase();
      }

      return headerNames.indexOf(headerName.toLowerCase()) >= 0;
    }
  }, {
    key: '_getResponseHeader',
    value: function _getResponseHeader(xhr, headerName) {
      if (!this._hasResponseHeader(xhr, headerName)) {
        return null;
      }

      return xhr.getResponseHeader(headerName);
    }
  }, {
    key: 'getByteAt',
    value: function getByteAt(offset) {
      var character = this._fileData.getByteAt(offset);
      return character.charCodeAt(0) & 0xff;
    }
  }, {
    key: '_isWebWorker',
    value: function _isWebWorker() {
      return typeof WorkerGlobalScope !== 'undefined' && self instanceof WorkerGlobalScope;
    }
  }, {
    key: '_createXHRObject',
    value: function _createXHRObject() {
      if (typeof window === "undefined" && !this._isWebWorker()) {
        // $FlowIssue - flow is not able to recognize this module.
        return new (require("xhr2").XMLHttpRequest)();
      }

      if (typeof XMLHttpRequest !== "undefined") {
        return new XMLHttpRequest();
      }

      throw new Error("XMLHttpRequest is not supported");
    }
  }], [{
    key: 'canReadFile',
    value: function canReadFile(file) {
      return typeof file === 'string' && /^[a-z]+:\/\//i.test(file);
    }
  }, {
    key: 'setConfig',
    value: function setConfig(config) {
      for (var key in config) {
        if (config.hasOwnProperty(key)) {
          this._config[key] = config[key];
        }
      }var disallowedXhrHeaders = this._config.disallowedXhrHeaders;
      for (var i = 0; i < disallowedXhrHeaders.length; i++) {
        disallowedXhrHeaders[i] = disallowedXhrHeaders[i].toLowerCase();
      }
    }
  }]);

  return XhrFileReader;
}(MediaFileReader);

XhrFileReader._config = {
  avoidHeadRequests: false,
  disallowedXhrHeaders: [],
  timeoutInSec: 30
};

module.exports = XhrFileReader;

},{"./ChunkedFileData":5,"./MediaFileReader":11,"xhr2":2}],15:[function(require,module,exports){
'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var MediaFileReader = require("./MediaFileReader");
var NodeFileReader = require("./NodeFileReader");
var XhrFileReader = require("./XhrFileReader");
var BlobFileReader = require("./BlobFileReader");
var ArrayFileReader = require("./ArrayFileReader");
var MediaTagReader = require("./MediaTagReader");
var ID3v1TagReader = require("./ID3v1TagReader");
var ID3v2TagReader = require("./ID3v2TagReader");
var MP4TagReader = require("./MP4TagReader");
var FLACTagReader = require("./FLACTagReader");

var mediaFileReaders = [];
var mediaTagReaders = [];

function read(location, callbacks) {
  new Reader(location).read(callbacks);
}

function isRangeValid(range, fileSize) {
  var invalidPositiveRange = range.offset >= 0 && range.offset + range.length >= fileSize;

  var invalidNegativeRange = range.offset < 0 && (-range.offset > fileSize || range.offset + range.length > 0);

  return !(invalidPositiveRange || invalidNegativeRange);
}

var Reader = function () {
  function Reader(file) {
    _classCallCheck(this, Reader);

    this._file = file;
  }

  _createClass(Reader, [{
    key: "setTagsToRead",
    value: function setTagsToRead(tagsToRead) {
      this._tagsToRead = tagsToRead;
      return this;
    }
  }, {
    key: "setFileReader",
    value: function setFileReader(fileReader) {
      this._fileReader = fileReader;
      return this;
    }
  }, {
    key: "setTagReader",
    value: function setTagReader(tagReader) {
      this._tagReader = tagReader;
      return this;
    }
  }, {
    key: "read",
    value: function read(callbacks) {
      var FileReader = this._getFileReader();
      var fileReader = new FileReader(this._file);
      var self = this;

      fileReader.init({
        onSuccess: function () {
          self._getTagReader(fileReader, {
            onSuccess: function (TagReader) {
              new TagReader(fileReader).setTagsToRead(self._tagsToRead).read(callbacks);
            },
            onError: callbacks.onError
          });
        },
        onError: callbacks.onError
      });
    }
  }, {
    key: "_getFileReader",
    value: function _getFileReader() {
      if (this._fileReader) {
        return this._fileReader;
      } else {
        return this._findFileReader();
      }
    }
  }, {
    key: "_findFileReader",
    value: function _findFileReader() {
      for (var i = 0; i < mediaFileReaders.length; i++) {
        if (mediaFileReaders[i].canReadFile(this._file)) {
          return mediaFileReaders[i];
        }
      }

      throw new Error("No suitable file reader found for " + this._file);
    }
  }, {
    key: "_getTagReader",
    value: function _getTagReader(fileReader, callbacks) {
      if (this._tagReader) {
        var tagReader = this._tagReader;
        setTimeout(function () {
          callbacks.onSuccess(tagReader);
        }, 1);
      } else {
        this._findTagReader(fileReader, callbacks);
      }
    }
  }, {
    key: "_findTagReader",
    value: function _findTagReader(fileReader, callbacks) {
      // We don't want to make multiple fetches per tag reader to get the tag
      // identifier. The strategy here is to combine all the tag identifier
      // ranges into one and make a single fetch. This is particularly important
      // in file readers that have expensive loads like the XHR one.
      // However, with this strategy we run into the problem of loading the
      // entire file because tag identifiers might be at the start or end of
      // the file.
      // To get around this we divide the tag readers into two categories, the
      // ones that read their tag identifiers from the start of the file and the
      // ones that read from the end of the file.
      var tagReadersAtFileStart = [];
      var tagReadersAtFileEnd = [];
      var fileSize = fileReader.getSize();

      for (var i = 0; i < mediaTagReaders.length; i++) {
        var range = mediaTagReaders[i].getTagIdentifierByteRange();
        if (!isRangeValid(range, fileSize)) {
          continue;
        }

        if (range.offset >= 0 && range.offset < fileSize / 2 || range.offset < 0 && range.offset < -fileSize / 2) {
          tagReadersAtFileStart.push(mediaTagReaders[i]);
        } else {
          tagReadersAtFileEnd.push(mediaTagReaders[i]);
        }
      }

      var tagsLoaded = false;
      var loadTagIdentifiersCallbacks = {
        onSuccess: function () {
          if (!tagsLoaded) {
            // We're expecting to load two sets of tag identifiers. This flag
            // indicates when the first one has been loaded.
            tagsLoaded = true;
            return;
          }

          for (var i = 0; i < mediaTagReaders.length; i++) {
            var range = mediaTagReaders[i].getTagIdentifierByteRange();
            if (!isRangeValid(range, fileSize)) {
              continue;
            }

            try {
              var tagIndentifier = fileReader.getBytesAt(range.offset >= 0 ? range.offset : range.offset + fileSize, range.length);
            } catch (ex) {
              if (callbacks.onError) {
                callbacks.onError({
                  "type": "fileReader",
                  "info": ex.message
                });
              }
              return;
            }

            if (mediaTagReaders[i].canReadTagFormat(tagIndentifier)) {
              callbacks.onSuccess(mediaTagReaders[i]);
              return;
            }
          }

          if (callbacks.onError) {
            callbacks.onError({
              "type": "tagFormat",
              "info": "No suitable tag reader found"
            });
          }
        },
        onError: callbacks.onError
      };

      this._loadTagIdentifierRanges(fileReader, tagReadersAtFileStart, loadTagIdentifiersCallbacks);
      this._loadTagIdentifierRanges(fileReader, tagReadersAtFileEnd, loadTagIdentifiersCallbacks);
    }
  }, {
    key: "_loadTagIdentifierRanges",
    value: function _loadTagIdentifierRanges(fileReader, tagReaders, callbacks) {
      if (tagReaders.length === 0) {
        // Force async
        setTimeout(callbacks.onSuccess, 1);
        return;
      }

      var tagIdentifierRange = [Number.MAX_VALUE, 0];
      var fileSize = fileReader.getSize();

      // Create a super set of all ranges so we can load them all at once.
      // Might need to rethink this approach if there are tag ranges too far
      // a part from each other. We're good for now though.
      for (var i = 0; i < tagReaders.length; i++) {
        var range = tagReaders[i].getTagIdentifierByteRange();
        var start = range.offset >= 0 ? range.offset : range.offset + fileSize;
        var end = start + range.length - 1;

        tagIdentifierRange[0] = Math.min(start, tagIdentifierRange[0]);
        tagIdentifierRange[1] = Math.max(end, tagIdentifierRange[1]);
      }

      fileReader.loadRange(tagIdentifierRange, callbacks);
    }
  }]);

  return Reader;
}();

var Config = function () {
  function Config() {
    _classCallCheck(this, Config);
  }

  _createClass(Config, null, [{
    key: "addFileReader",
    value: function addFileReader(fileReader) {
      mediaFileReaders.push(fileReader);
      return Config;
    }
  }, {
    key: "addTagReader",
    value: function addTagReader(tagReader) {
      mediaTagReaders.push(tagReader);
      return Config;
    }
  }, {
    key: "removeTagReader",
    value: function removeTagReader(tagReader) {
      var tagReaderIx = mediaTagReaders.indexOf(tagReader);

      if (tagReaderIx >= 0) {
        mediaTagReaders.splice(tagReaderIx, 1);
      }

      return Config;
    }
  }, {
    key: "EXPERIMENTAL_avoidHeadRequests",
    value: function EXPERIMENTAL_avoidHeadRequests() {
      XhrFileReader.setConfig({
        avoidHeadRequests: true
      });
    }
  }, {
    key: "setDisallowedXhrHeaders",
    value: function setDisallowedXhrHeaders(disallowedXhrHeaders) {
      XhrFileReader.setConfig({
        disallowedXhrHeaders: disallowedXhrHeaders
      });
    }
  }, {
    key: "setXhrTimeoutInSec",
    value: function setXhrTimeoutInSec(timeoutInSec) {
      XhrFileReader.setConfig({
        timeoutInSec: timeoutInSec
      });
    }
  }]);

  return Config;
}();

Config.addFileReader(XhrFileReader).addFileReader(BlobFileReader).addFileReader(ArrayFileReader).addTagReader(ID3v2TagReader).addTagReader(ID3v1TagReader).addTagReader(MP4TagReader).addTagReader(FLACTagReader);

if (typeof process !== "undefined" && !process.browser) {
  Config.addFileReader(NodeFileReader);
}

module.exports = {
  "read": read,
  "Reader": Reader,
  "Config": Config
};

},{"./ArrayFileReader":3,"./BlobFileReader":4,"./FLACTagReader":6,"./ID3v1TagReader":7,"./ID3v2TagReader":9,"./MP4TagReader":10,"./MediaFileReader":11,"./MediaTagReader":12,"./NodeFileReader":1,"./XhrFileReader":14}]},{},[15])(15)
});