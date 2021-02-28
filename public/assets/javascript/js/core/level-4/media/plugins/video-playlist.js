/*! @name videojs-playlist @version 4.2.6 @license Apache-2.0 */
(function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('video.js')) :
		typeof define === 'function' && define.amd ? define(['video.js'], factory) :
			(global.videojsPlaylist = factory(global.videojs));
}(this, (function (videojs) { 'use strict';

	videojs = videojs && videojs.hasOwnProperty('default') ? videojs['default'] : videojs;

	/**
	 * Validates a number of seconds to use as the auto-advance delay.
	 *
	 * @private
	 * @param   {number} s
	 *          The number to check
	 *
	 * @return  {boolean}
	 *          Whether this is a valid second or not
	 */
	var validSeconds = function validSeconds(s) {
		return typeof s === 'number' && !isNaN(s) && s >= 0 && s < Infinity;
	};
	/**
	 * Resets the auto-advance behavior of a player.
	 *
	 * @param {Player} player
	 *        The player to reset the behavior on
	 */


	var reset = function reset(player) {
		var aa = player.playlist.autoadvance_;

		if (aa.timeout) {
			player.clearTimeout(aa.timeout);
		}

		if (aa.trigger) {
			player.off('ended', aa.trigger);
		}

		aa.timeout = null;
		aa.trigger = null;
	};
	/**
	 * Sets up auto-advance behavior on a player.
	 *
	 * @param  {Player} player
	 *         the current player
	 *
	 * @param  {number} delay
	 *         The number of seconds to wait before each auto-advance.
	 *
	 * @return {undefined}
	 *         Used to short circuit function logic
	 */


	var setup = function setup(player, delay) {
		reset(player); // Before queuing up new auto-advance behavior, check if `seconds` was
		// called with a valid value.

		if (!validSeconds(delay)) {
			player.playlist.autoadvance_.delay = null;
			return;
		}

		player.playlist.autoadvance_.delay = delay;

		player.playlist.autoadvance_.trigger = function () {
			// This calls setup again, which will reset the existing auto-advance and
			// set up another auto-advance for the next "ended" event.
			var cancelOnPlay = function cancelOnPlay() {
				return setup(player, delay);
			}; // If there is a "play" event while we're waiting for an auto-advance,
			// we need to cancel the auto-advance. This could mean the user seeked
			// back into the content or restarted the content. This is reproducible
			// with an auto-advance > 0.


			player.one('play', cancelOnPlay);
			player.playlist.autoadvance_.timeout = player.setTimeout(function () {
				reset(player);
				player.off('play', cancelOnPlay);
				player.playlist.next();
			}, delay * 1000);
		};

		player.one('ended', player.playlist.autoadvance_.trigger);
	};

	/**
	 * Removes all remote text tracks from a player.
	 *
	 * @param  {Player} player
	 *         The player to clear tracks on
	 */

	var clearTracks = function clearTracks(player) {
		var tracks = player.remoteTextTracks();
		var i = tracks && tracks.length || 0; // This uses a `while` loop rather than `forEach` because the
		// `TextTrackList` object is a live DOM list (not an array).

		while (i--) {
			player.removeRemoteTextTrack(tracks[i]);
		}
	};
	/**
	 * Plays an item on a player's playlist.
	 *
	 * @param  {Player} player
	 *         The player to play the item on
	 *
	 * @param  {Object} item
	 *         A source from the playlist.
	 *
	 * @return {Player}
	 *         The player that is now playing the item
	 */


	var playItem = function playItem(player, item) {
		var replay = !player.paused() || player.ended();
		player.trigger('beforeplaylistitem', item);
		player.poster(item.poster || '');
		player.src(item.sources);
		clearTracks(player);
		player.ready(function () {
			(item.textTracks || []).forEach(player.addRemoteTextTrack.bind(player));
			player.trigger('playlistitem', item);

			if (replay) {
				var playPromise = player.play(); // silence error when a pause interrupts a play request
				// on browsers which return a promise

				if (typeof playPromise !== 'undefined' && typeof playPromise.then === 'function') {
					playPromise.then(null, function (e) {});
				}
			}

			setup(player, player.playlist.autoadvance_.delay);
		});
		return player;
	};

	/**
	 * Given two sources, check to see whether the two sources are equal.
	 * If both source urls have a protocol, the protocols must match, otherwise, protocols
	 * are ignored.
	 *
	 * @private
	 * @param {string|Object} source1
	 *        The first source
	 *
	 * @param {string|Object} source2
	 *        The second source
	 *
	 * @return {boolean}
	 *         The result
	 */

	var sourceEquals = function sourceEquals(source1, source2) {
		var src1 = source1;
		var src2 = source2;

		if (typeof source1 === 'object') {
			src1 = source1.src;
		}

		if (typeof source2 === 'object') {
			src2 = source2.src;
		}

		if (/^\/\//.test(src1)) {
			src2 = src2.slice(src2.indexOf('//'));
		}

		if (/^\/\//.test(src2)) {
			src1 = src1.slice(src1.indexOf('//'));
		}

		return src1 === src2;
	};
	/**
	 * Look through an array of playlist items for a specific `source`;
	 * checking both the value of elements and the value of their `src`
	 * property.
	 *
	 * @private
	 * @param   {Array} arr
	 *          An array of playlist items to look through
	 *
	 * @param   {string} src
	 *          The source to look for
	 *
	 * @return  {number}
	 *          The index of that source or -1
	 */


	var indexInSources = function indexInSources(arr, src) {
		for (var i = 0; i < arr.length; i++) {
			var sources = arr[i].sources;

			if (Array.isArray(sources)) {
				for (var j = 0; j < sources.length; j++) {
					var source = sources[j];

					if (source && sourceEquals(source, src)) {
						return i;
					}
				}
			}
		}

		return -1;
	};
	/**
	 * Randomize the contents of an array.
	 *
	 * @private
	 * @param  {Array} arr
	 *         An array.
	 *
	 * @return {Array}
	 *         The same array that was passed in.
	 */


	var randomize = function randomize(arr) {
		var index = -1;
		var lastIndex = arr.length - 1;

		while (++index < arr.length) {
			var rand = index + Math.floor(Math.random() * (lastIndex - index + 1));
			var value = arr[rand];
			arr[rand] = arr[index];
			arr[index] = value;
		}

		return arr;
	};
	/**
	 * Factory function for creating new playlist implementation on the given player.
	 *
	 * API summary:
	 *
	 * playlist(['a', 'b', 'c']) // setter
	 * playlist() // getter
	 * playlist.currentItem() // getter, 0
	 * playlist.currentItem(1) // setter, 1
	 * playlist.next() // 'c'
	 * playlist.previous() // 'b'
	 * playlist.first() // 'a'
	 * playlist.last() // 'c'
	 * playlist.autoadvance(5) // 5 second delay
	 * playlist.autoadvance() // cancel autoadvance
	 *
	 * @param  {Player} player
	 *         The current player
	 *
	 * @param  {Array=} initialList
	 *         If given, an initial list of sources with which to populate
	 *         the playlist.
	 *
	 * @param  {number=}  initialIndex
	 *         If given, the index of the item in the list that should
	 *         be loaded first. If -1, no video is loaded. If omitted, The
	 *         the first video is loaded.
	 *
	 * @return {Function}
	 *         Returns the playlist function specific to the given player.
	 */


	function factory(player, initialList, initialIndex) {
		if (initialIndex === void 0) {
			initialIndex = 0;
		}

		var list = null;
		var changing = false;
		/**
		 * Get/set the playlist for a player.
		 *
		 * This function is added as an own property of the player and has its
		 * own methods which can be called to manipulate the internal state.
		 *
		 * @param  {Array} [newList]
		 *         If given, a new list of sources with which to populate the
		 *         playlist. Without this, the function acts as a getter.
		 *
		 * @param  {number}  [newIndex]
		 *         If given, the index of the item in the list that should
		 *         be loaded first. If -1, no video is loaded. If omitted, The
		 *         the first video is loaded.
		 *
		 * @return {Array}
		 *         The playlist
		 */

		var playlist = player.playlist = function (newList, newIndex) {
			if (newIndex === void 0) {
				newIndex = 0;
			}

			if (changing) {
				throw new Error('do not call playlist() during a playlist change');
			}

			if (Array.isArray(newList)) {
				// @todo - Simplify this to `list.slice()` for v5.
				var previousPlaylist = Array.isArray(list) ? list.slice() : null;
				list = newList.slice(); // Mark the playlist as changing during the duringplaylistchange lifecycle.

				changing = true;
				player.trigger({
					type: 'duringplaylistchange',
					nextIndex: newIndex,
					nextPlaylist: list,
					previousIndex: playlist.currentIndex_,
					// @todo - Simplify this to simply pass along `previousPlaylist` for v5.
					previousPlaylist: previousPlaylist || []
				});
				changing = false;

				if (newIndex !== -1) {
					playlist.currentItem(newIndex);
				} // The only time the previous playlist is null is the first call to this
				// function. This allows us to fire the `duringplaylistchange` event
				// every time the playlist is populated and to maintain backward
				// compatibility by not firing the `playlistchange` event on the initial
				// population of the list.
				//
				// @todo - Remove this condition in preparation for v5.


				if (previousPlaylist) {
					player.setTimeout(function () {
						player.trigger('playlistchange');
					}, 0);
				}
			} // Always return a shallow clone of the playlist list.


			return list.slice();
		}; // On a new source, if there is no current item, disable auto-advance.


		player.on('loadstart', function () {
			if (playlist.currentItem() === -1) {
				reset(player);
			}
		});
		playlist.currentIndex_ = -1;
		playlist.player_ = player;
		playlist.autoadvance_ = {};
		playlist.repeat_ = false;
		/**
		 * Get or set the current item in the playlist.
		 *
		 * During the duringplaylistchange event, acts only as a getter.
		 *
		 * @param  {number} [index]
		 *         If given as a valid value, plays the playlist item at that index.
		 *
		 * @return {number}
		 *         The current item index.
		 */

		playlist.currentItem = function (index) {
			// If the playlist is changing, only act as a getter.
			if (changing) {
				return playlist.currentIndex_;
			}

			if (typeof index === 'number' && playlist.currentIndex_ !== index && index >= 0 && index < list.length) {
				playlist.currentIndex_ = index;
				playItem(playlist.player_, list[playlist.currentIndex_]);
			} else {
				playlist.currentIndex_ = playlist.indexOf(playlist.player_.currentSrc() || '');
			}

			return playlist.currentIndex_;
		};
		/**
		 * Checks if the playlist contains a value.
		 *
		 * @param  {string|Object|Array} value
		 *         The value to check
		 *
		 * @return {boolean}
		 *         The result
		 */


		playlist.contains = function (value) {
			return playlist.indexOf(value) !== -1;
		};
		/**
		 * Gets the index of a value in the playlist or -1 if not found.
		 *
		 * @param  {string|Object|Array} value
		 *         The value to find the index of
		 *
		 * @return {number}
		 *         The index or -1
		 */


		playlist.indexOf = function (value) {
			if (typeof value === 'string') {
				return indexInSources(list, value);
			}

			var sources = Array.isArray(value) ? value : value.sources;

			for (var i = 0; i < sources.length; i++) {
				var source = sources[i];

				if (typeof source === 'string') {
					return indexInSources(list, source);
				} else if (source.src) {
					return indexInSources(list, source.src);
				}
			}

			return -1;
		};
		/**
		 * Get the index of the current item in the playlist. This is identical to
		 * calling `currentItem()` with no arguments.
		 *
		 * @return {number}
		 *         The current item index.
		 */


		playlist.currentIndex = function () {
			return playlist.currentItem();
		};
		/**
		 * Get the index of the last item in the playlist.
		 *
		 * @return {number}
		 *         The index of the last item in the playlist or -1 if there are no
		 *         items.
		 */


		playlist.lastIndex = function () {
			return list.length - 1;
		};
		/**
		 * Get the index of the next item in the playlist.
		 *
		 * @return {number}
		 *         The index of the next item in the playlist or -1 if there is no
		 *         current item.
		 */


		playlist.nextIndex = function () {
			var current = playlist.currentItem();

			if (current === -1) {
				return -1;
			}

			var lastIndex = playlist.lastIndex(); // When repeating, loop back to the beginning on the last item.

			if (playlist.repeat_ && current === lastIndex) {
				return 0;
			} // Don't go past the end of the playlist.


			return Math.min(current + 1, lastIndex);
		};
		/**
		 * Get the index of the previous item in the playlist.
		 *
		 * @return {number}
		 *         The index of the previous item in the playlist or -1 if there is
		 *         no current item.
		 */


		playlist.previousIndex = function () {
			var current = playlist.currentItem();

			if (current === -1) {
				return -1;
			} // When repeating, loop back to the end of the playlist.


			if (playlist.repeat_ && current === 0) {
				return playlist.lastIndex();
			} // Don't go past the beginning of the playlist.


			return Math.max(current - 1, 0);
		};
		/**
		 * Plays the first item in the playlist.
		 *
		 * @return {Object|undefined}
		 *         Returns undefined and has no side effects if the list is empty.
		 */


		playlist.first = function () {
			if (changing) {
				return;
			}

			if (list.length) {
				return list[playlist.currentItem(0)];
			}

			playlist.currentIndex_ = -1;
		};
		/**
		 * Plays the last item in the playlist.
		 *
		 * @return {Object|undefined}
		 *         Returns undefined and has no side effects if the list is empty.
		 */


		playlist.last = function () {
			if (changing) {
				return;
			}

			if (list.length) {
				return list[playlist.currentItem(playlist.lastIndex())];
			}

			playlist.currentIndex_ = -1;
		};
		/**
		 * Plays the next item in the playlist.
		 *
		 * @return {Object|undefined}
		 *         Returns undefined and has no side effects if on last item.
		 */


		playlist.next = function () {
			if (changing) {
				return;
			}

			var index = playlist.nextIndex();

			if (index !== playlist.currentIndex_) {
				return list[playlist.currentItem(index)];
			}
		};
		/**
		 * Plays the previous item in the playlist.
		 *
		 * @return {Object|undefined}
		 *         Returns undefined and has no side effects if on first item.
		 */


		playlist.previous = function () {
			if (changing) {
				return;
			}

			var index = playlist.previousIndex();

			if (index !== playlist.currentIndex_) {
				return list[playlist.currentItem(index)];
			}
		};
		/**
		 * Set up auto-advance on the playlist.
		 *
		 * @param  {number} [delay]
		 *         The number of seconds to wait before each auto-advance.
		 */


		playlist.autoadvance = function (delay) {
			setup(playlist.player_, delay);
		};
		/**
		 * Sets `repeat` option, which makes the "next" video of the last video in
		 * the playlist be the first video in the playlist.
		 *
		 * @param  {boolean} [val]
		 *         The value to set repeat to
		 *
		 * @return {boolean}
		 *         The current value of repeat
		 */


		playlist.repeat = function (val) {
			if (val === undefined) {
				return playlist.repeat_;
			}

			if (typeof val !== 'boolean') {
				videojs.log.error('videojs-playlist: Invalid value for repeat', val);
				return;
			}

			playlist.repeat_ = !!val;
			return playlist.repeat_;
		};
		/**
		 * Sorts the playlist array.
		 *
		 * @see {@link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/sort}
		 * @fires playlistsorted
		 *
		 * @param {Function} compare
		 *        A comparator function as per the native Array method.
		 */


		playlist.sort = function (compare) {
			// Bail if the array is empty.
			if (!list.length) {
				return;
			}

			list.sort(compare); // If the playlist is changing, don't trigger events.

			if (changing) {
				return;
			}
			/**
			 * Triggered after the playlist is sorted internally.
			 *
			 * @event playlistsorted
			 * @type {Object}
			 */


			player.trigger('playlistsorted');
		};
		/**
		 * Reverses the playlist array.
		 *
		 * @see {@link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/reverse}
		 * @fires playlistsorted
		 */


		playlist.reverse = function () {
			// Bail if the array is empty.
			if (!list.length) {
				return;
			}

			list.reverse(); // If the playlist is changing, don't trigger events.

			if (changing) {
				return;
			}
			/**
			 * Triggered after the playlist is sorted internally.
			 *
			 * @event playlistsorted
			 * @type {Object}
			 */


			player.trigger('playlistsorted');
		};
		/**
		 * Shuffle the contents of the list randomly.
		 *
		 * @see   {@link https://github.com/lodash/lodash/blob/40e096b6d5291a025e365a0f4c010d9a0efb9a69/shuffle.js}
		 * @fires playlistsorted
		 * @todo  Make the `rest` option default to `true` in v5.0.0.
		 * @param {Object} [options]
		 *        An object containing shuffle options.
		 *
		 * @param {boolean} [options.rest = false]
		 *        By default, the entire playlist is randomized. However, this may
		 *        not be desirable in all cases, such as when a user is already
		 *        watching a video.
		 *
		 *        When `true` is passed for this option, it will only shuffle
		 *        playlist items after the current item. For example, when on the
		 *        first item, will shuffle the second item and beyond.
		 */


		playlist.shuffle = function (_temp) {
			var _ref = _temp === void 0 ? {} : _temp,
				rest = _ref.rest;

			var index = 0;
			var arr = list; // When options.rest is true, start randomization at the item after the
			// current item.

			if (rest) {
				index = playlist.currentIndex_ + 1;
				arr = list.slice(index);
			} // Bail if the array is empty or too short to shuffle.


			if (arr.length <= 1) {
				return;
			}

			randomize(arr); // When options.rest is true, splice the randomized sub-array back into
			// the original array.

			if (rest) {
				var _list;

				(_list = list).splice.apply(_list, [index, arr.length].concat(arr));
			} // If the playlist is changing, don't trigger events.


			if (changing) {
				return;
			}
			/**
			 * Triggered after the playlist is sorted internally.
			 *
			 * @event playlistsorted
			 * @type {Object}
			 */


			player.trigger('playlistsorted');
		}; // If an initial list was given, populate the playlist with it.


		if (Array.isArray(initialList)) {
			playlist(initialList.slice(), initialIndex); // If there is no initial list given, silently set an empty array.
		} else {
			list = [];
		}

		return playlist;
	}

	var version = "4.2.6";

	var registerPlugin = videojs.registerPlugin || videojs.plugin;
	/**
	 * The video.js playlist plugin. Invokes the playlist-maker to create a
	 * playlist function on the specific player.
	 *
	 * @param {Array} list
	 *        a list of sources
	 *
	 * @param {number} item
	 *        The index to start at
	 */

	var plugin = function plugin(list, item) {
		factory(this, list, item);
	};

	registerPlugin('playlist', plugin);
	plugin.VERSION = version;

	return plugin;

})));

/*! @name videojs-playlist-ui @version 3.5.2 @license Apache-2.0 */
(function (global, factory) {
	typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory(require('global/document'), require('video.js')) :
		typeof define === 'function' && define.amd ? define(['global/document', 'video.js'], factory) :
			(global.videojsPlaylistUi = factory(global.document,global.videojs));
}(this, (function (document,videojs) { 'use strict';

	document = document && document.hasOwnProperty('default') ? document['default'] : document;
	videojs = videojs && videojs.hasOwnProperty('default') ? videojs['default'] : videojs;

	function _inheritsLoose(subClass, superClass) {
		subClass.prototype = Object.create(superClass.prototype);
		subClass.prototype.constructor = subClass;
		subClass.__proto__ = superClass;
	}

	var version = "3.5.2";

	var dom = videojs.dom || videojs;
	var registerPlugin = videojs.registerPlugin || videojs.plugin; // Array#indexOf analog for IE8

	var indexOf = function indexOf(array, target) {
		for (var i = 0, length = array.length; i < length; i++) {
			if (array[i] === target) {
				return i;
			}
		}

		return -1;
	}; // see https://github.com/Modernizr/Modernizr/blob/master/feature-detects/css/pointerevents.js


	var supportsCssPointerEvents = function () {
		var element = document.createElement('x');
		element.style.cssText = 'pointer-events:auto';
		return element.style.pointerEvents === 'auto';
	}();

	var defaults = {
		className: 'vjs-playlist',
		playOnSelect: false,
		supportsCssPointerEvents: supportsCssPointerEvents
	}; // we don't add `vjs-playlist-now-playing` in addSelectedClass
	// so it won't conflict with `vjs-icon-play
	// since it'll get added when we mouse out

	var addSelectedClass = function addSelectedClass(el) {
		el.addClass('vjs-selected');
	};

	var removeSelectedClass = function removeSelectedClass(el) {
		el.removeClass('vjs-selected');

		if (el.thumbnail) {
			dom.removeClass(el.thumbnail, 'vjs-playlist-now-playing');
		}
	};

	var upNext = function upNext(el) {
		el.addClass('vjs-up-next');
	};

	var notUpNext = function notUpNext(el) {
		el.removeClass('vjs-up-next');
	};

	var createThumbnail = function createThumbnail(thumbnail) {
		if (!thumbnail) {
			var placeholder = document.createElement('div');
			placeholder.className = 'vjs-playlist-thumbnail vjs-playlist-thumbnail-placeholder';
			return placeholder;
		}

		var picture = document.createElement('picture');
		picture.className = 'vjs-playlist-thumbnail';

		if (typeof thumbnail === 'string') {
			// simple thumbnails
			var img = document.createElement('img');
			img.src = thumbnail;
			img.alt = '';
			picture.appendChild(img);
		} else {
			// responsive thumbnails
			// additional variations of a <picture> are specified as
			// <source> elements
			for (var i = 0; i < thumbnail.length - 1; i++) {
				var _variant = thumbnail[i];
				var source = document.createElement('source'); // transfer the properties of each variant onto a <source>

				for (var prop in _variant) {
					source[prop] = _variant[prop];
				}

				picture.appendChild(source);
			} // the default version of a <picture> is specified by an <img>


			var variant = thumbnail[thumbnail.length - 1];

			var _img = document.createElement('img');

			_img.alt = '';

			for (var _prop in variant) {
				_img[_prop] = variant[_prop];
			}

			picture.appendChild(_img);
		}

		return picture;
	};

	var Component = videojs.getComponent('Component');

	var PlaylistMenuItem =
		/*#__PURE__*/
		function (_Component) {
			_inheritsLoose(PlaylistMenuItem, _Component);

			function PlaylistMenuItem(player, playlistItem, settings) {
				var _this;

				if (!playlistItem.item) {
					throw new Error('Cannot construct a PlaylistMenuItem without an item option');
				}

				_this = _Component.call(this, player, playlistItem) || this;
				_this.item = playlistItem.item;
				_this.playOnSelect = settings.playOnSelect;

				_this.emitTapEvents();

				_this.on(['click', 'tap'], _this.switchPlaylistItem_);

				_this.on('keydown', _this.handleKeyDown_);

				return _this;
			}

			var _proto = PlaylistMenuItem.prototype;

			_proto.handleKeyDown_ = function handleKeyDown_(event) {
				// keycode 13 is <Enter>
				// keycode 32 is <Space>
				if (event.which === 13 || event.which === 32) {
					this.switchPlaylistItem_();
				}
			};

			_proto.switchPlaylistItem_ = function switchPlaylistItem_(event) {
				this.player_.playlist.currentItem(indexOf(this.player_.playlist(), this.item));

				if (this.playOnSelect) {
					this.player_.play();
				}
			};

			_proto.createEl = function createEl() {
				var li = document.createElement('li');
				var item = this.options_.item;

				if (typeof item.data === 'object') {
					var dataKeys = Object.keys(item.data);
					dataKeys.forEach(function (key) {
						var value = item.data[key];
						li.dataset[key] = value;
					});
				}

				li.className = 'vjs-playlist-item';
				li.setAttribute('tabIndex', 0); // Thumbnail image

				this.thumbnail = createThumbnail(item.thumbnail);
				li.appendChild(this.thumbnail); // Duration

				if (item.duration) {
					var duration = document.createElement('time');
					var time = videojs.formatTime(item.duration);
					duration.className = 'vjs-playlist-duration';
					duration.setAttribute('datetime', 'PT0H0M' + item.duration + 'S');
					duration.appendChild(document.createTextNode(time));
					li.appendChild(duration);
				} // Now playing


				var nowPlayingEl = document.createElement('span');
				var nowPlayingText = this.localize('Now Playing');
				nowPlayingEl.className = 'vjs-playlist-now-playing-text';
				nowPlayingEl.appendChild(document.createTextNode(nowPlayingText));
				nowPlayingEl.setAttribute('title', nowPlayingText);
				this.thumbnail.appendChild(nowPlayingEl); // Title container contains title and "up next"

				var titleContainerEl = document.createElement('div');
				titleContainerEl.className = 'vjs-playlist-title-container';
				this.thumbnail.appendChild(titleContainerEl); // Up next

				var upNextEl = document.createElement('span');
				var upNextText = this.localize('Up Next');
				upNextEl.className = 'vjs-up-next-text';
				upNextEl.appendChild(document.createTextNode(upNextText));
				upNextEl.setAttribute('title', upNextText);
				titleContainerEl.appendChild(upNextEl); // Video title

				var titleEl = document.createElement('cite');
				var titleText = item.name || this.localize('Untitled Video');
				titleEl.className = 'vjs-playlist-name';
				titleEl.appendChild(document.createTextNode(titleText));
				titleEl.setAttribute('title', titleText);
				titleContainerEl.appendChild(titleEl);
				return li;
			};

			return PlaylistMenuItem;
		}(Component);

	var PlaylistMenu =
		/*#__PURE__*/
		function (_Component2) {
			_inheritsLoose(PlaylistMenu, _Component2);

			function PlaylistMenu(player, options) {
				var _this2;

				if (!player.playlist) {
					throw new Error('videojs-playlist is required for the playlist component');
				}

				_this2 = _Component2.call(this, player, options) || this;
				_this2.items = [];

				if (options.horizontal) {
					_this2.addClass('vjs-playlist-horizontal');
				} else {
					_this2.addClass('vjs-playlist-vertical');
				} // If CSS pointer events aren't supported, we have to prevent
				// clicking on playlist items during ads with slightly more
				// invasive techniques. Details in the stylesheet.


				if (options.supportsCssPointerEvents) {
					_this2.addClass('vjs-csspointerevents');
				}

				_this2.createPlaylist_();

				if (!videojs.browser.TOUCH_ENABLED) {
					_this2.addClass('vjs-mouse');
				}

				_this2.on(player, ['loadstart', 'playlistchange', 'playlistsorted'], function (event) {
					_this2.update();
				}); // Keep track of whether an ad is playing so that the menu
				// appearance can be adapted appropriately


				_this2.on(player, 'adstart', function () {
					_this2.addClass('vjs-ad-playing');
				});

				_this2.on(player, 'adend', function () {
					_this2.removeClass('vjs-ad-playing');
				});

				_this2.on('dispose', function () {
					_this2.empty_();

					player.playlistMenu = null;
				});

				_this2.on(player, 'dispose', function () {
					_this2.dispose();
				});

				return _this2;
			}

			var _proto2 = PlaylistMenu.prototype;

			_proto2.createEl = function createEl() {
				return dom.createEl('div', {
					className: this.options_.className
				});
			};

			_proto2.empty_ = function empty_() {
				if (this.items && this.items.length) {
					this.items.forEach(function (i) {
						return i.dispose();
					});
					this.items.length = 0;
				}
			};

			_proto2.createPlaylist_ = function createPlaylist_() {
				var playlist = this.player_.playlist() || [];
				var list = this.el_.querySelector('.vjs-playlist-item-list');
				var overlay = this.el_.querySelector('.vjs-playlist-ad-overlay');

				if (!list) {
					list = document.createElement('ol');
					list.className = 'vjs-playlist-item-list';
					this.el_.appendChild(list);
				}

				this.empty_(); // create new items

				for (var i = 0; i < playlist.length; i++) {
					var item = new PlaylistMenuItem(this.player_, {
						item: playlist[i]
					}, this.options_);
					this.items.push(item);
					list.appendChild(item.el_);
				} // Inject the ad overlay. IE<11 doesn't support "pointer-events:
				// none" so we use this element to block clicks during ad
				// playback.


				if (!overlay) {
					overlay = document.createElement('li');
					overlay.className = 'vjs-playlist-ad-overlay';
					list.appendChild(overlay);
				} else {
					// Move overlay to end of list
					list.appendChild(overlay);
				} // select the current playlist item


				var selectedIndex = this.player_.playlist.currentItem();

				if (this.items.length && selectedIndex >= 0) {
					addSelectedClass(this.items[selectedIndex]);
					var thumbnail = this.items[selectedIndex].$('.vjs-playlist-thumbnail');

					if (thumbnail) {
						dom.addClass(thumbnail, 'vjs-playlist-now-playing');
					}
				}
			};

			_proto2.update = function update() {
				// replace the playlist items being displayed, if necessary
				var playlist = this.player_.playlist();

				if (this.items.length !== playlist.length) {
					// if the menu is currently empty or the state is obviously out
					// of date, rebuild everything.
					this.createPlaylist_();
					return;
				}

				for (var i = 0; i < this.items.length; i++) {
					if (this.items[i].item !== playlist[i]) {
						// if any of the playlist items have changed, rebuild the
						// entire playlist
						this.createPlaylist_();
						return;
					}
				} // the playlist itself is unchanged so just update the selection


				var currentItem = this.player_.playlist.currentItem();

				for (var _i = 0; _i < this.items.length; _i++) {
					var item = this.items[_i];

					if (_i === currentItem) {
						addSelectedClass(item);

						if (document.activeElement !== item.el()) {
							dom.addClass(item.thumbnail, 'vjs-playlist-now-playing');
						}

						notUpNext(item);
					} else if (_i === currentItem + 1) {
						removeSelectedClass(item);
						upNext(item);
					} else {
						removeSelectedClass(item);
						notUpNext(item);
					}
				}
			};

			return PlaylistMenu;
		}(Component);
	/**
	 * Returns a boolean indicating whether an element has child elements.
	 *
	 * Note that this is distinct from whether it has child _nodes_.
	 *
	 * @param  {HTMLElement} el
	 *         A DOM element.
	 *
	 * @return {boolean}
	 *         Whether the element has child elements.
	 */


	var hasChildEls = function hasChildEls(el) {
		for (var i = 0; i < el.childNodes.length; i++) {
			if (dom.isEl(el.childNodes[i])) {
				return true;
			}
		}

		return false;
	};
	/**
	 * Finds the first empty root element.
	 *
	 * @param  {string} className
	 *         An HTML class name to search for.
	 *
	 * @return {HTMLElement}
	 *         A DOM element to use as the root for a playlist.
	 */


	var findRoot = function findRoot(className) {
		var all = document.querySelectorAll('.' + className);
		var el;

		for (var i = 0; i < all.length; i++) {
			if (!hasChildEls(all[i])) {
				el = all[i];
				break;
			}
		}

		return el;
	};
	/**
	 * Initialize the plugin on a player.
	 *
	 * @param  {Object} [options]
	 *         An options object.
	 *
	 * @param  {HTMLElement} [options.el]
	 *         A DOM element to use as a root node for the playlist.
	 *
	 * @param  {string} [options.className]
	 *         An HTML class name to use to find a root node for the playlist.
	 *
	 * @param  {boolean} [options.playOnSelect = false]
	 *         If true, will attempt to begin playback upon selecting a new
	 *         playlist item in the UI.
	 */


	var playlistUi = function playlistUi(options) {
		var player = this;

		if (!player.playlist) {
			throw new Error('videojs-playlist plugin is required by the videojs-playlist-ui plugin');
		}

		if (dom.isEl(options)) {
			videojs.log.warn('videojs-playlist-ui: Passing an element directly to playlistUi() is deprecated, use the "el" option instead!');
			options = {
				el: options
			};
		}

		options = videojs.mergeOptions(defaults, options); // If the player is already using this plugin, remove the pre-existing
		// PlaylistMenu, but retain the element and its location in the DOM because
		// it will be re-used.

		if (player.playlistMenu) {
			var el = player.playlistMenu.el(); // Catch cases where the menu may have been disposed elsewhere or the
			// element removed from the DOM.

			if (el) {
				var parentNode = el.parentNode;
				var nextSibling = el.nextSibling; // Disposing the menu will remove `el` from the DOM, but we need to
				// empty it ourselves to be sure.

				player.playlistMenu.dispose();
				dom.emptyEl(el); // Put the element back in its place.

				if (nextSibling) {
					parentNode.insertBefore(el, nextSibling);
				} else {
					parentNode.appendChild(el);
				}

				options.el = el;
			}
		}

		if (!dom.isEl(options.el)) {
			options.el = findRoot(options.className);
		}

		player.playlistMenu = new PlaylistMenu(player, options);
	}; // register components


	videojs.registerComponent('PlaylistMenu', PlaylistMenu);
	videojs.registerComponent('PlaylistMenuItem', PlaylistMenuItem); // register the plugin

	registerPlugin('playlistUi', playlistUi);
	playlistUi.VERSION = version;

	return playlistUi;

})));