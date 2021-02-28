(function(factory)
{
    /// <summary>
    ///     s the specified factory.
    /// </summary>
    /// <param name="factory">The factory.</param>
    /// <returns></returns>
    if (typeof window.define === "function" && window.define.amd)
    {
        // AMD. Register as an anonymous module.
        window.define(["jquery"], factory);
    }
    else if (typeof exports === "object")
    {
        // Node/CommonJS
        module.exports = factory(require("jquery"));
    }
    else
    {
        // Browser globals
        factory(window.jQuery);
    }
}(function($)
{
    var pluginName = "multiAudioPlayer";
    var defaults = {
        type: "track",
        size: "",
        title: "Title",
        artist: "",
        artwork: "data:image/png;base64,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",
        trackUrl: "",
        playlistUrl: "",
        downloadable: false,
        autoplay: false,
        appleMusic: "",
        amazonMusic: "",
        grabRadioRds: false,
        grabId3Tag: true,
        grabLastFmPhoto: false,
        fmApiKey: "340d29088e62e353db85527756afe8c1",
        fmApiSecret: "f6140bd618f2ead4920e42b69e9c418b",
        pathToAjaxFiles: global_base_url + "assets/javascript/js/core/level-4/media/",
        nowPlayingInterval: 15,
        radioReaderAjaxInterval: ""
    };

    function Plugin(element, options)
    {
        this.objAudio = new Audio();
        this.objAudio.loop = false;

        this.element = element;
        this.$element = $(this.element);

        this.doc = $(document);
        this.win = $(window);

        // Playlist Variables
        /*----------------------------------------*/
        this.trackArray = [];
        this.currentTrack = "";
        this.currentIndex = 0;
        this.currentRow = 0;
        this.indexVal = 0;

        this.settings = $.extend({}, defaults, options);

        /*
         * Process and add data-attrs to settings as well for ease of use. Also, if
         * data-multiAudio is an object then use it as extra settings and if it's not
         * then use it as a title.
         */
        const msWebViewSettings = this.settings;
        if (typeof(this.$element.data("multiAudioPlayer")) === "object")
        {
            $.extend(msWebViewSettings, this.$element.data("multiAudioPlayer"));
        }

        const dataKeys = Object.keys(this.$element.data());
        const dataAttrs = {};
        for (var i = 0; i < dataKeys.length; i++)
        {
            var key = dataKeys[i].replace(pluginName, "");
            if (key === "")
            {
                continue;
            }

            //lowercase first letter
            key = key.charAt(0).toLowerCase() + key.slice(1);
            dataAttrs[key] = this.$element.data(dataKeys[i]);

            //We cannot use extend for data_attrs because they are automatically
            //lowercased. We need to do this manually and extend this.settings with
            //data_attrs
            for (var settingsKey in msWebViewSettings)
            {
                if (msWebViewSettings.hasOwnProperty(settingsKey))
                {
                    if (settingsKey.toLowerCase() === key)
                    {
                        msWebViewSettings[settingsKey] = dataAttrs[key];
                    }
                }
            }
        }

        this._defaults = defaults;
        this._name = pluginName;
        this._id = this.$element.attr("id");
        const hashVal = window.location.hash.toString();

        if (hashVal.search($(this.$element).attr("id")) !== "-1")
        {
            this.objAudio.autoplay = false;
        }

        this.init();
    }

    $.extend(Plugin.prototype,
        {
            init: function()
            {
                const obj = this;
                const $e = this.$element;
                // ReSharper disable once UnusedLocals
                const $doc = this.doc;
                const objAudio = this.objAudio;

                // Playlist values
                /*----------------------------------------*/

                if (obj.settings.autoplay === true)
                {
                    objAudio.autoplay = true;
                }

                // append whole html style
                obj.appendMultiAudioPlayer();

                // Create and initiate track seeker add uniq ID
                const seekerId = `playerSeeker_${$e.attr("id")}`;
                $e.find(".maPlayer-seekbar").attr("id", seekerId);

                obj.createTrackSeeker(seekerId);

                // Player style default, medium, small
                obj.styleMultiAudioPlayer(seekerId);

                // Set player values like title, artist, artwork use lastFM and read radio stream
                obj.playerContent();

                if (obj.settings.type === "playlist")
                {
                    obj.getXamlData();
                }

                obj.playerEventControlls();

                obj.playerEvents(seekerId);

                //createLinks($e, obj);
            },
            playerContent: function()
            {
                var obj = this;
                var $e = this.$element;
                var objAudio = this.objAudio;

                if (obj.settings.type === "radio")
                {
                    if (obj.settings.grabRadioRds)
                    {
                        if (obj.getRadioStationInfo() === false)
                        {
                            $(".maPlayer-trackTitle", $e).text(checkStrLendth(escapeRegExp(obj.settings.title), 30));
                            $(".maPlayer-trackArtist", $e).text(checkStrLendth(escapeRegExp(obj.settings.artist), 40));
                            $(".maPlayer-poster", $e).css("background-image", `url(${obj.settings.artwork})`);
                        }
                    }
                    else
                    {
                        $(".maPlayer-trackTitle", $e).text(checkStrLendth(escapeRegExp(obj.settings.title), 30));
                        $(".maPlayer-trackArtist", $e).text(checkStrLendth(escapeRegExp(obj.settings.artist), 40));
                        $(".maPlayer-poster", $e).css("background-image", `url(${obj.settings.artwork})`);
                    }

                    objAudio.src = obj.settings.trackUrl;
                    $($e).attr("data-trackId", $e.attr("id"));
                }
                else if (obj.settings.type === "playlist")
                {
                    $(".maPlayer-trackTitle", $e).text(checkStrLendth(escapeRegExp(obj.settings.title), 30));
                    $(".maPlayer-trackArtist", $e).text(checkStrLendth(escapeRegExp(obj.settings.artist), 40));
                    $($e).attr("data-playlistId", $e.attr("id"));
                }
                else
                {
                    if (obj.settings.grabId3Tag)
                    {
                        if (obj.getId3TagInfo() === false)
                        {
                            $(".maPlayer-trackTitle", $e).text(checkStrLendth(escapeRegExp(obj.settings.title), 30));
                            $(".maPlayer-trackArtist", $e).text(checkStrLendth(escapeRegExp(obj.settings.artist), 40));
                            $(".maPlayer-poster", $e).css("background-image", `url(${obj.settings.artwork})`);
                        }
                    }
                    else
                    {
                        $(".maPlayer-trackTitle", $e).text(checkStrLendth(escapeRegExp(obj.settings.title), 30));
                        $(".maPlayer-trackArtist", $e).text(checkStrLendth(escapeRegExp(obj.settings.artist), 40));
                        $(".maPlayer-poster", $e).css("background-image", `url(${obj.settings.artwork})`);
                    }

                    /*-------------------------------------??????????????????????????????????______________________________________________*/
                    if (obj.settings.grabLastFmPhoto)
                    {
                        if (obj.settings.size !== "small")
                        {
                            obj.getLastFmTrackInfo(checkStrLendth(obj.settings.artist, 30));
                        }
                    }

                    objAudio.src = obj.settings.trackUrl;
                    $($e).attr("data-trackId", $e.attr("id"));
                }
            },
            playerEvents: function(seekerId)
            {
                var obj = this;
                var $e = this.$element;
                var objAudio = this.objAudio;

                const currentRow = this.currentRow;

                $(objAudio)
                    .on("playing",
                        function()
                        {
                            if (!$(".maPlayer-mainSection", $e).hasClass("maPlayer-equaliser-container"))
                            {
                                $(".maPlayer-mainSection", $e)
                                    .append('<div class="maPlayer-equaliser-container">' +
                                        '<ol class="equaliser-column"><li class="colour-bar"></li></ol>' +
                                        '<ol class="equaliser-column"><li class="colour-bar"></li></ol>' +
                                        '<ol class="equaliser-column"><li class="colour-bar"></li></ol>' +
                                        '<ol class="equaliser-column"><li class="colour-bar"></li></ol>' +
                                        '<ol class="equaliser-column"><li class="colour-bar"></li></ol>' +
                                        "</div>");
                            }
                        });

                $(objAudio)
                    .on("timeupdate",
                        function()
                        {
                            $(".maPlayer-middle .maPlayer-play .maPlayer-frontTiming", $e).html(obj.trackPlaytime(this.currentTime) + " / " + obj.trackPlaytime(this.duration));
                            if (obj.settings.type === "playlist")
                            {
                                $(`li#maPlayer-row-${$e.attr("id")}-${currentRow} .maPlayer-rightBox .maPlayer-duration .maPlayer-cur`, $e).html(obj.trackPlaytime(this.currentTime));
                                $(`li#maPlayer-row-${$e.attr("id")}-${currentRow} .maPlayer-rightBox .maPlayer-duration .maPlayer-cur`, $e).css({ display: "inline" });
                                $(`li#maPlayer-row-${$e.attr("id")}-${currentRow} .maPlayer-rightBox .maPlayer-duration .maPlayer-slash`, $e).css({ display: "inline" });
                            }
                            obj.updateSeekTime(seekerId);
                        });

                $(objAudio)
                    .on("pause",
                        function()
                        {
                            $(".maPlayer-equaliser-container", $e).remove();
                        });

                $(objAudio)
                    .on("ended",
                        function()
                        {
                            objAudio.currentTime = 0;
                            $(".maPlayer-equaliser-container", $e).remove();
                            if ($(".maPlayer-playpausebtn", $e).hasClass("active"))
                            {
                                $(".maPlayer-playpausebtn", $e).removeClass("active");
                            }
                        });
            },
            playerEventControlls: function()
            {
                var obj = this;
                var $e = this.$element;
                var objAudio = this.objAudio;

                const currentRow = this.currentRow;

                $(".maPlayer-play", $e)
                    .hover(function()
                    {
                        closeSocialButtons($e);
                    });

                $(".maPlayer-playpausebtn", $e)
                    .on("click tap",
                        function()
                        {
                            $(this, $e).toggleClass("active");

                            obj.playTrack();
                        });

                $(".maPlayer-forward", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            removeCurSpan($e, currentRow);
                            obj.playNextTrack();
                        });

                $(".maPlayer-backward", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            removeCurSpan($e, currentRow);
                            obj.playPreviusTrack();
                        });

                $(".maPlayer-stop", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);

                            obj.stopTrack();
                            $(".maPlayer-equaliser-container", $e).remove();
                            if ($(".maPlayer-playpausebtn", $e).hasClass("active"))
                            {
                                $(".maPlayer-playpausebtn", $e).removeClass("active");
                            }
                        });

                $(".maPlayer-playlist", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            //$(".grid").toggleClass("open close");
                            $(".maPlayer-panel-1", $e).toggleClass("maPlayer-showPanel");
                            $(".maPlayer-panel-2", $e).toggleClass("maPlayer-showPanel");
                            $(this, $e).toggleClass("active");
    
                            $(".maPlayer-scroller").slimScroll({
                                height: "100%",
                                position: "right",
                                size: "4px",
                                wheelStep: 1,
                                touchScrollStep : 100,
                                color: "#f90"
                            });
                        });

                $(".maPlayer-sound", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            $(this, $e).toggleClass("active");

                            obj.muteSound();
                        });

                $(".maPlayer-repeat", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            $(this, $e).toggleClass("active");

                            obj.repeatTrack();
                        });

                $(".maPlayer-shuffle", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            $(this, $e).toggleClass("active");
                        });

                $(".maPlayer-radio-toggle", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            $(".maPlayer-panel-1", $e).toggleClass("maPlayer-showPanel");
                            $(".maPlayer-panel-3", $e).toggleClass("maPlayer-showPanel");
                        });

                $(".maPlayer-social-toggle", $e)
                    .on("click tap",
                        function()
                        {
                            $(this, $e).next().toggleClass("maPlayer-open-menu");
                            if ($(".maPlayer-links-toggle", $e).next().hasClass("maPlayer-open-menu"))
                            {
                                $(".maPlayer-links-toggle", $e).next().removeClass("maPlayer-open-menu");
                            }
                        });

                $(".maPlayer-links-toggle", $e)
                    .on("click tap",
                        function()
                        {
                            if ($(".maPlayer-social-toggle", $e).next().hasClass("maPlayer-open-menu"))
                            {
                                $(".maPlayer-social-toggle", $e).next().removeClass("maPlayer-open-menu");
                            }
                            $(this, $e).next().toggleClass("maPlayer-open-menu");
                        });

                $(".maPlayer-id3Tag-toggle", $e)
                    .on("click tap",
                        function()
                        {
                            closeSocialButtons($e);
                            $(".maPlayer-panel-1", $e).toggleClass("maPlayer-showPanel");
                            $(".maPlayer-panel-3", $e).toggleClass("maPlayer-showPanel");
                        });

                $(".maPlayer-panel-2", $e)
                    .on("click tap",
                        ".actualPlaylist li",
                        function(event)
                        {
                            closeSocialButtons($e);
    
                            removeCurSpan($e, currentRow);
    
                            $("#row" + currentRow + " .leftBox .title .eq").remove();
                            var indexValue = $(this).attr("id");
                            var res = indexValue.split("-");
    
                            for (var i = 0; i < res.length; i++)
                            {
                                if(i === 3)
                                {
                                    obj.playPlaylistTrack(res[i]);
                                }
                            }
                        });

                $(window)
                    .keypress(function(e)
                    {
                        if (e.keyCode === 0 || e.keyCode === 32)
                        {
                            e.preventDefault();
                            if (objAudio.paused)
                            {
                                objAudio.play();
                                $(".maPlayer-playpausebtn", $e).toggleClass("active");
                            }
                            else
                            {
                                objAudio.pause();
                                $(".maPlayer-playpausebtn", $e).toggleClass("active");
                            }
                        }
                    });
            },
            createTrackSeeker: function(seekerId)
            {
                var obj = this;

                $(`#${seekerId}`)
                    .roundSlider({
                        width: 8,
                        radius: "70",
                        handleSize: "+16",
                        handleShape: "dot",
                        value: 0,
                        max: "100",
                        startAngle: 90,
                        step: "0.005",
                        showTooltip: false,
                        editableTooltip: false,
                        sliderType: "min-range",
                        drag: function(args)
                        {
                            obj.manualSeek(args, seekerId);
                        },
                        change: function(args)
                        {
                            obj.manualSeek(args, seekerId);
                        }
                    });
            },
            getXamlData()
            {
                var obj = this;

                $.ajax({
                    url: obj.settings.playlistUrl,
                    dataType: "xml",
                    cache: false,
                    timeout: 5000,
                    success: function(result)
                    {
                        obj.parseXamlData(result);
                    },
                    error: function()
                    {
                        alert("Error: Something went wrong with loading the playlist!");
                    }
                });
            },
            parseXamlData(result)
            {
                const obj = this;
                var $e = this.$element;
                const objAudio = this.objAudio;

                const trackArray = this.trackArray;

                const radio = $(result).find("radio").text();
                const autoplay = $(result).find("autoplay").text();
                const shareButton = $(result).find("shareButton").text();
                const muteButton = $(result).find("muteButton").text();
                const repeatButton = $(result).find("repeatButton").text();
                const shuffleButton = $(result).find("shuffleButton").text();

                if (autoplay.length > 0 && autoplay === "true")
                {
                    objAudio.autoplay = true;
                }

                if (shareButton.length > 0 && shareButton === "false")
                {
                    $(".maPlayer-social-toggle", $e).remove();
                    $(".maPlayer-social-networks", $e).remove();
                }

                if (muteButton.length > 0 && muteButton === "false")
                {
                    $(".maPlayer-sound", $e).remove();
                }

                if (repeatButton.length > 0 && repeatButton === "false")
                {
                    $(".maPlayer-repeat", $e).remove();
                }

                if (shuffleButton.length > 0 && shuffleButton === "false")
                {
                    $(".maPlayer-shuffle", $e).remove();
                }

                $(result)
                    .find("track")
                    .each(function()
                    {
                        trackArray.push($(this).find("url").text());
                        const img = $(this).find("artwork").text();
                        const url = $(this).find("url").text();

                        $(".maPlayer-panel-2 .actualPlaylist", $e)
                            .append(
                                `<li id='maPlayer-row-${$e.attr("id")}-${trackArray.length}'><div class='maPlayer-leftBox'><div class='maPlayer-listNum'><span>${numberingStyle(trackArray.length)}</span></div><p class='maPlayer-title mt-2'>${checkStrLendth($(this).find("title").text(), 15)}</p><p class='maPlayer-singer'>${checkStrLendth($(this).find("artist").text(), 18)}</p></div><div class='maPlayer-rightBox'><div class='maPlayer-artwork' style='background-image: url(${img})'></div><p class='maPlayer-duration'><span class='maPlayer-cur'>00:00</span><span class='maPlayer-slash'> / </span><span class='maPlayer-due'>00:00</span></p><div class='maPlayer-resources'><a href='${$(this).find("apple").text()}' class='maPlayer-apple' target='_blank' title='Listen it on Apple Music'><i class='fab fa-apple fa-1x fa-fw text-white ml-3'></i></a><a href='${$(this).find("amazon").text()}' class='maPlayer-amazon' target='_blank' title='Listen it on Amazon'><i class='fab fa-amazon fa-1x fa-fw text-white ml-3'></i></a><a href='${url}' class='maPlayer-download download' target='_blank' title='Downlod it' download><i class='fas fa-download fa-1x fa-fw text-white ml-3'></i></a></div></div></li>`
                            );

                        $(`li#maPlayer-row-${$e.attr("id")}-${trackArray.length} .maPlayer-leftBox .maPlayer-title`, $e).attr("data-title", $(this).find("title").text());
                        $(`li#maPlayer-row-${$e.attr("id")}-${trackArray.length} .maPlayer-leftBox .maPlayer-singer`, $e).attr("data-artist", $(this).find("artist").text());
                    });


                obj.getCurrentTrack();
                obj.getPlaylistDurations();

                //$(objAudio).off("loadedmetadata");
            },
            getId3TagInfo: function()
            {
                var obj = this;
                var $e = this.$element;

                window.jsmediatags.read(obj.settings.trackUrl,
                    {
                        onSuccess: function(tag)
                        {
                            const tags = tag.tags;

                            $(".maPlayer-trackTitle", $e).text(checkStrLendth(tags.title, 30));
                            $(".maPlayer-trackArtist", $e).text(checkStrLendth(tags.artist, 40));

                            const image = tags.picture;

                            if (image)
                            {
                                var base64String = "";

                                for (var i = 0; i < image.data.length; i++)
                                {
                                    base64String += String.fromCharCode(image.data[i]);
                                }

                                const base64 = `data:${image.format};base64,${window.btoa(base64String)}`;

                                $(".maPlayer-poster", $e).css("background-image", `url(${base64})`);
                            }
                            else
                            {
                                $(".maPlayer-poster", $e).css("background-image", `url(${obj.settings.artwork})`);
                            }

                            return true;
                        },
                        onError: function(error)
                        {
                            if (error.type === "xhr")
                            {
                                console.log("There was a network error: ", error.xhr);
                            }
                            console.log(error);

                            return false;
                        }
                    });
            },
            getRadioStationInfo()
            {
                var obj = this;
                var $e = this.$element;

                clearInterval(obj.settings.radioReaderAjaxInterval);

                // now_playing interval call
                setTimeout(function()
                    {
                        obj.settings.radioReaderAjaxInterval = setInterval(function()
                            {
                                $.get(obj.settings.pathToAjaxFiles + "radioInfo.php",
                                    {
                                        the_stream: obj.settings.trackUrl
                                    },
                                    function(dataR)
                                    {
                                        if (dataR !== "")
                                        {
                                            const band = dataR.songData.split(" - ");
                                            $(".maPlayer-trackTitle", $e).text(checkStrLendth(band[0].trim(), 30));
                                            $(".maPlayer-trackArtist", $e).text(checkStrLendth(band[1].trim(), 40));

                                            if (obj.settings.grabLastFmPhoto)
                                            {
                                                if (obj.settings.size !== "small")
                                                {
                                                    obj.getLastFmRadioInfo(checkStrLendth(band[0], 30));
                                                }
                                            }
                                            else
                                            {
                                                $(".maPlayer-poster", $e).css("background-image", `url(${obj.settings.artwork})`);
                                            }
                                        }
                                    },
                                    "json");
                            },
                            obj.settings.nowPlayingInterval * 1000);
                    },
                    obj.settings.nowPlayingInterval * 1000);

                // now_playing first call start              
                $.get(obj.settings.pathToAjaxFiles + "radioInfo.php",
                    {
                        the_stream: obj.settings.trackUrl
                    },
                    function(dataR)
                    {
                        if (dataR !== "")
                        {
                            const band = dataR.songData.split(" - ");
                            $(".maPlayer-trackTitle", $e).text(checkStrLendth(band[0], 30));
                            $(".maPlayer-trackArtist", $e).text(checkStrLendth(band[1], 40));

                            if (obj.settings.grabLastFmPhoto)
                            {
                                if (obj.settings.size !== "small")
                                {
                                    obj.getLastFmRadioInfo(checkStrLendth(band[0], 30));
                                }
                            }
                            else
                            {
                                $(".maPlayer-poster", $e).css("background-image", `url(${obj.settings.artwork})`);
                            }
                        }

                        return true;
                    },
                    "json");

                return false;
            },
            getLastFmTrackInfo(artiste)
            {
                const obj = this;
                var $e = this.$element;

                var bio = "";

                $.ajax({
                    url: `http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=${encodeURI(artiste)}&api_key=${obj.settings.fmApiKey}&lang=en&format=json`,
                    dataType: "json",
                    cache: false,
                    timeout: 5000,
                    success: function(result)
                    { /*-------------------------------------??????????????????????????????????______________________________________________*/
                        if (result.artist.bio.summary !== "")
                        {
                            bio = result.artist.bio.summary.trim();
                            $(".maPlayer-id3Tag-toggle", $e).addClass("maPlayer-rtoggle");
                            $(".maPlayer-panel-3", $e).append(`<div class="maPlayer-id3Tag-container">${bio}</div>`);
                        }
                    },
                    error: function()
                    {
                        console.log("Error: Something went wrong with loading the LastFM Data!");
                    }
                });
            },
            getLastFmRadioInfo(artist)
            {
                const obj = this;
                var $e = this.$element;

                var photoPath = obj.settings.artwork;

                $.ajax({
                    url: `http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=${encodeURI(artist)}&api_key=${obj.settings.fmApiKey}&lang=en&format=json`,
                    dataType: "json",
                    cache: false,
                    timeout: 5000,
                    success: function(result)
                    {
                        const bio = result.artist.bio.summary;

                        if (bio !== "")
                        {
                            $(".maPlayer-radio-toggle", $e).addClass("maPlayer-rtoggle");
                        }

                        $(".maPlayer-panel-3", $e).append(`<div class="maPlayer-bio-container">${bio}</div`);

                        if (result.artist.image[3]["#text"].trim() !== "")
                        {
                            photoPath = result.artist.image[3]["#text"];
                            const index = photoPath.lastIndexOf(".") < 0 ? photoPath.length : photoPath.lastIndexOf(".");
                            $(".maPlayer-poster", $e).css("background-image", `url(${photoPath.substring(0, index) + ".jpg"})`);
                        }
                    },
                    error: function()
                    {
                        console.log("Error: Something went wrong with loading the LastFM Data!");
                    }
                });
            },
            playTrack: function()
            {
                const objAudio = this.objAudio;

                if (objAudio.paused)
                {
                    objAudio.play();
                }
                else
                {
                    objAudio.pause();
                }
            },
            playPreviusTrack()
            {
                const obj = this;
                const objAudio = this.objAudio;

                const trackArray = this.trackArray;
                var currentTrack = this.currentTrack;
                var currentIndex = this.currentIndex;
                var currentRow = this.currentRow;

                if (currentIndex <= 0)
                {
                    currentTrack = trackArray[trackArray.length - 1];
                    currentIndex = trackArray.indexOf(currentTrack);
                    currentRow = currentIndex + 1;
                }
                else
                {
                    currentTrack = trackArray[currentIndex - 1];
                    currentIndex = trackArray.indexOf(currentTrack);
                    currentRow = currentIndex + 1;
                }
    
                this.currentTrack = currentTrack;
                this.currentIndex = currentIndex;

                objAudio.src = currentTrack;
                objAudio.play();
                obj.changePlaylistAppearance(currentIndex + 1);
            },
            playNextTrack()
            {
                const obj = this;
                const objAudio = this.objAudio;

                const trackArray = this.trackArray;
                var currentTrack = this.currentTrack;
                var currentIndex = this.currentIndex;
                var currentRow = this.currentRow;

                if (trackArray.length <= currentIndex + 1)
                {
                    currentTrack = trackArray[0];
                    currentIndex = trackArray.indexOf(currentTrack);
                    currentRow = currentIndex + 1;
                }
                else
                {
                    currentTrack = trackArray[currentIndex + 1];
                    currentIndex = trackArray.indexOf(currentTrack);
                    currentRow = currentIndex + 1;
                }
    
                this.currentTrack = currentTrack;
                this.currentIndex = currentIndex;

                objAudio.src = currentTrack;
                objAudio.play();
                obj.changePlaylistAppearance(currentIndex + 1);
            },
            playPlaylistTrack(indexValue)
            {
                const obj = this;
                const objAudio = this.objAudio;

                const trackArray = this.trackArray;
                var currentTrack = this.currentTrack;
                var currentIndex = this.currentIndex;
                var currentRow = this.currentRow;

                currentIndex = indexValue - 1;
                currentTrack = trackArray[currentIndex];
                currentRow = currentIndex + 1;
                
                objAudio.src = currentTrack;
                objAudio.play();
                obj.changePlaylistAppearance(currentIndex + 1);
            },
            stopTrack: function()
            {
                const $e = this.$element;
                const objAudio = this.objAudio;

                objAudio.pause();
                objAudio.currentTime = 0;
                $(".maPlayer-playpausebtn", $e).toggleClass("active");
            },
            repeatTrack: function()
            {
                const objAudio = this.objAudio;

                objAudio.loop = objAudio.loop === false;
            },
            muteSound: function()
            {
                const objAudio = this.objAudio;

                objAudio.muted = !objAudio.muted;
            },
            getPlaylistDurations()
            {
                var obj = this;
                var $e = this.$element;
                const trackArray = this.trackArray;

                $.each(trackArray,function(i, val)
                    {
                        /*
                           $(`li#maPlayer-row-${$e.attr("id")}-${i} .maPlayer-rightBox .maPlayer-duration .maPlayer-due`, $e).text(getDuration(trackArray[i]));
                     
                        /*
                        const span = $(`li#maPlayer-row-${$e.attr("id")}-${i} .maPlayer-rightBox .maPlayer-duration .maPlayer-due`, $e).text;
                        getDuration(trackArray[i], span);
      
                        
                        */
                        //var span = document.getElementById(`li#maPlayer-row-${$e.attr("id")}-${i} .maPlayer-rightBox .maPlayer-duration .maPlayer-due`);
                        //getDuration(trackArray[i], span);
                        /**
                         * /
                         */
                        var audioPlaylist = document.createElement("audio");
                        $(audioPlaylist)[0].preload = "metadata";
                        $(audioPlaylist)[0].src = trackArray[i];
                        
                        $(audioPlaylist)
                            .on("loadedmetadata",
                                function()
                                {
                                    $(`li#maPlayer-row-${$e.attr("id")}-${i} .maPlayer-rightBox .maPlayer-duration .maPlayer-due`, $e).text(obj.trackPlaytime($(audioPlaylist)[0].duration));
                                    $(audioPlaylist).off("loadedmetadata");
                                });
                         i++;
                        audioPlaylist.remove();
                    });
            },
            getCurrentTrack()
            {
                const obj = this;
                const objAudio = this.objAudio;
                const trackArray = this.trackArray;
                
                var currentTrack = this.currentTrack;
                var currentIndex = this.currentIndex;
                var currentRow = this.currentRow;
                var indexVal = this.indexVal;

                const hash = window.location.hash;

                if (hash.length > 0)
                {
                    indexVal = hash.substr(4);
                }

                if (indexVal >= 0 && indexVal < trackArray.length)
                {
                    indexVal = parseInt(indexVal);
                    
                    currentTrack = trackArray[indexVal];
                    currentIndex = trackArray.indexOf(currentTrack);
                    currentRow = currentIndex + 1;
                    
                    objAudio.src = currentTrack;
                    obj.changePlaylistAppearance(currentIndex + 1);
                }
                else
                {
                    currentTrack = trackArray[0];
                    currentIndex = trackArray.indexOf(currentTrack);
                    currentRow = currentIndex + 1;
                    
                    objAudio.src = currentTrack;
                    obj.changePlaylistAppearance(currentIndex + 1);
                }
            },
            updateSeekTime(seekerId)
            {
                const objAudio = this.objAudio;
                const t = objAudio.currentTime * (100 / objAudio.duration);

                $(`#${seekerId}`).roundSlider("option", "value", t);
            },
            manualSeek(args, seekerId)
            {
                const objAudio = this.objAudio;
                const e = args.value;

                $(`#${seekerId}`).roundSlider("option", "value", e);

                objAudio.currentTime = objAudio.duration * (e / 100);
            },
            trackPlaytime(time)
            {
                if (time === "Infinity")
                {
                    return "<span class='maPlayer-infinity'>&infin;</span>";
                }

                var durmins = Math.floor(time / 60);
                var dursecs = Math.floor(time - durmins * 60);

                if (dursecs < 10)
                {
                    dursecs = `0${dursecs}`;
                }

                if (durmins < 10)
                {
                    durmins = `0${durmins}`;
                }

                return durmins + ":" + dursecs;
            },
            changePlaylistAppearance(i)
            {
                const $e = this.$element;

                i = `maPlayer-row-${$e.attr("id")}-${i}`;

                const bg = $(`#${i} .maPlayer-rightBox .maPlayer-artwork`, $e).css("background-image");
                $(".maPlayer-poster", $e).css("background-image", bg);

                const title = $(`#${i} .maPlayer-leftBox .maPlayer-title`, $e).attr("data-title");
                $(".maPlayer-trackTitle", $e).html(checkStrLendth(title, 27));

                const artist = $(`#${i} .maPlayer-leftBox .maPlayer-singer`, $e).attr("data-artist");
                $(".maPlayer-trackArtist", $e).html(checkStrLendth(artist, 27));
            },
            styleMultiAudioPlayer: function(seekerId)
            {
                const obj = this;
                const $e = this.$element;

                $e.addClass("multiAudioPlayer");
                $(".maPlayer-panel-1", $e).toggleClass("maPlayer-showPanel");

                if (obj.settings.size === "small")
                {
                    $e.addClass("maPlayer-small");

                    $(`#${seekerId}`)
                        .roundSlider({
                            radius: "30",
                            width: 4,
                            handleSize: "+8"
                        });
                }

                if (obj.settings.size === "medium")
                {
                    $e.addClass("maPlayer-medium");

                    $(`#${seekerId}`)
                        .roundSlider({
                            radius: "45",
                            width: 6,
                            handleSize: "+12"
                        });
                }

                if (obj.settings.type === "radio")
                {
                    const liveRadio = "<div class='maPlayer-live'></div>";
                    $(".maPlayer-repeat, .maPlayer-stop, .maPlayer-links-toggle, .maPlayer-links-networks", $e).remove();
                    $(".maPlayer-sound", $e).after(liveRadio);
                    $(".maPlayer-live", $e).append("<div class='maPlayer-bliking'></div><div class='maPlayer-icon'></div>");
                    $(".maPlayer-seekbar", $e).remove();
                    $(".maPlayer-id3Tag-toggle", $e).remove();
                    $(".maPlayer-dashboard", $e);
                }
                else if (obj.settings.type === "playlist")
                {
                    $(".maPlayer-stop", $e).remove();
                    $(".maPlayer-links-toggle", $e).remove();
                    $(".maPlayer-links-networks", $e).remove();
                    $(".maPlayer-id3Tag-toggle", $e).remove();
                    $(".maPlayer-dashboard", $e);
                }
                else
                {
                    $(".maPlayer-radio-toggle", $e).remove();
                    $(".maPlayer-dashboard", $e);
                }

                if (obj.settings.type !== "playlist")
                {
                    $(".maPlayer-shuffle", $e).remove();
                    $(".maPlayer-playlist", $e).remove();
                    $(".maPlayer-backward", $e).remove();
                    $(".maPlayer-forward", $e).remove();
                }
            },
            appendMultiAudioPlayer: function()
            {
                const $e = this.$element;

                $e.append('<section class="maPlayer-poster"></section>' +
                    '<div class="maPlayer-id3Tag-toggle"></div>' +
                    '<div class="maPlayer-mainSection">' +
                    '<div class="maPlayer-panel-1">' +
                    '<div class="maPlayer-middle">' +
                    '<div class="maPlayer-backward"></div>' +
                    '<div class="maPlayer-play">' +
                    '<div class="maPlayer-seekbar"></div>' +
                    '<div class="maPlayer-playpausebtn"></div>' +
                    '<div class="maPlayer-frontTiming">00:00 / 00:00</div>' +
                    "</div>" +
                    '<div class="maPlayer-forward"></div>' +
                    "</div>" +
                    "</div>" +
                    '<div class="maPlayer-panel-2 animated fadeIn">' +
                    '<div class="maPlayer-scroller">' +
                    '<ul class="actualPlaylist"></ul>' +
                    '</div></div>' +
                    '<div class="maPlayer-panel-3"></div>' +
                    "</div>" +
                    
                    '<div class="maPlayer-top">' +
                    '<div class="maPlayer-trackTitle text-warning">Track Title</div>' +
                    '<div class="maPlayer-trackArtist">Track Artist</div>' +
                    "</div>" +
                    
                    '<div class="maPlayer-dashboard d-flex justify-content-center align-items-center">' +
                    '<div class="maPlayer-repeat fa-fw"></div>' +
                    '<div class="maPlayer-sound fa-fw"></div>' +
                    '<div class="maPlayer-stop fa-fw"></div>' +
                    '<div class="maPlayer-playlist"><span class="maPlayer-open fa-fw"></span></div>' +
                    '<div class="maPlayer-shuffle fa-fw"></div>' +
                    '<div class="maPlayer-links-toggle fa-fw"></div>' +
                    
                    '<div class="maPlayer-links-networks"><ul>' +
                    '<li class="maPlayer-source-apple"><a href="#" class="maPlayer-apple" target="_blank" title="Listen it on Apple Music"><i class="fab fa-apple text-white"></i></a></li>' +
                    '<li class="maPlayer-source-amazon"><a href="#" class="maPlayer-amazon" target="_blank" title="Listen it on Amazon"><i class="fab fa-amazon text-white"></i></a></li>' +
                    '<li class="maPlayer-source-download"><a href="#" class="maPlayer-download" target="_blank" title="Downlod it" download><i class="fas fa-download text-white"></i></a></li>' +
                    "</ul></div>" +
                    
                    '<div class="maPlayer-social-toggle fa-fw"></div>' +
                    '<div class="maPlayer-social-networks"><ul>' +
                    '<li class="maPlayer-social-twitter"><a href="#" target="_blank" title="Share on Twitter"><i class="fab fa-twitter text-white"></i></a></li>' +
                    '<li class="maPlayer-social-facebook"><a href="#" target="_blank" title="Share on Facebook"><i class="fab fa-facebook text-white"></i></a></li>' +
                    '<li class="maPlayer-social-gplus"><a href="#" target="_blank" title="Share on Google Plus"><i class="fab fa-google-plus text-white"></i></a></li>' +
                    '<li class="maPlayer-social-email"><a href="#" title="Send Share email"><i class="fas fa-envelope text-white"></i></a></li>' +
                    "</ul></div>" +
                    '<div class="maPlayer-radio-toggle"></div>' +
                    "</div>");
            },
            update: function(key, value)
            {
                const obj = this;

                if (value)
                {
                    obj.settings[key] = value;
                }
                else
                {
                    return obj.settings[key];
                }

                return obj.settings[key];
            },
            destroy: function()
            {
                // ReSharper disable UnusedLocals
                const $e = this.$element;
                const $win = this.win;
                const $doc = this.doc;
                // ReSharper restore UnusedLocals
                $e.off(`.${pluginName}`);
            }
        });

    function closeSocialButtons(element)
    {
        if ($(".maPlayer-links-toggle", element).next().hasClass("maPlayer-open-menu"))
        {
            $(".maPlayer-links-toggle", element).next().removeClass("maPlayer-open-menu");
        }

        if ($(".maPlayer-social-toggle", element).next().hasClass("maPlayer-open-menu"))
        {
            $(".maPlayer-social-toggle", element).next().removeClass("maPlayer-open-menu");
        }
    }

    function removeCurSpan($e, currentRow)
    {
        $(`#maPlayer-row-${$e.attr("id")}-${currentRow} .maPlayer-rightBox .maPlayer-duration .maPlayer-cur`, $e)
            .css({
                display: "none"
            });

        $(`li#maPlayer-row-${$e.attr("id")}-${currentRow} .maPlayer-rightBox .maPlayer-duration .maPlayer-slash`, $e)
            .css({
                display: "none"
            });
    }

    function createLinks($e, obj)
    {
        const uri = getTrackUrl();

        if (obj.settings.downloadable === true)
        {
            $("li.maPlayer-source-download").find("a").attr("href", obj.settings.trackUrl);
        }

        if (obj.settings.amazonMusic.length > 0)
        {
            $("li.maPlayer-source-amazon").find("a").attr("href", obj.settings.amazonMusic);
        }

        if (obj.settings.appleMusic.length > 0)
        {
            $("li.maPlayer-source-apple").find("a").attr("href", obj.settings.appleMusic);
        }

        const facebook = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(uri)}`;
        $("li.maPlayer-social-facebook").find("a").attr("href", facebook);

        const twitter = `https://twitter.com/home?status=${encodeURIComponent(uri)}`;
        $("li.maPlayer-social-twitter").find("a").attr("href", twitter);

        const gplus = `https://plus.google.com/share?url=${encodeURIComponent(uri)}`;
        $("li.maPlayer-social-gplus").find("a").attr("href", gplus);

        createEmail($e, uri);
    }

    function getTrackUrl($e)
    {
        var t, e;

        $(".multiAudioPlayer")
            .each(function()
            {
                var idLength;
                if (t === $(this).attr("id"), e === window.location.hash, idLength === e.search(t), "-1" !== idLength)
                {
                    idLength = t.length + 1;
                    const i = e.indexOf(t.charAt(0)) - 1;
                    e = e.substring(i, idLength + i);
                    window.location.hash = window.location.hash.toString().replace(e, "");
                }
            });

        var p = window.location.hash.toString();

        return p = `#${$($e).attr("id")}`, window.location + p;
    }

    function createEmail($e, uri)
    {
        const e = k.artist;
        const i = k.title;

        const s = i + " by " + e;
        const n = `Check out the track ${i} by ${e} on ${uri}`;
        var a = `mailto:?subject=${s}&body=${n}`;
        $(".maPlayer-social-email > a", $e)
            .on("click",
                function()
                {
                    uri.preventDefault(), window.location = a;
                });
    }

    function checkStrLendth(str, lendth)
    {
        const val = str.length;
        if (val > lendth)
        {
            return str.substring(0, lendth - 1) + " ...";
        }
        else
        {
            return str;
        }
    }

    function getDuration(src)
    {

       var audioPlaylist = document.createElement("audio");
       $(audioPlaylist)[0].preload = "metadata";
       $(audioPlaylist)[0].src = src;
       $(audioPlaylist).on("loadedmetadata", function ()
       {
           console.log($(audioPlaylist)[0].duration);
           //destination.text = $(audioPlaylist)[0].duration;
           return $(audioPlaylist)[0].duration;
           // $(audioPlaylist).off("loadedmetadata");
       });
            //audioPlaylist.remove();
    }
    
    function numberingStyle(value)
    {
        if (value < 10)
        {
            value = `0${value}`;
        }
        return value;
    }

    function escapeRegExp(str)
    {
        return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
    }

    $[pluginName] = $.fn[pluginName] = function(options)
    {
        var args = arguments;
        if (options === undefined || typeof options === "object")
        {
            if (!(this instanceof $))
            {
                $.extend(defaults, options);
            }

            return this.each(function()
            {
                if (!$.data(this, `plugin_${pluginName}`))
                {
                    $.data(this, `plugin_${pluginName}`, new Plugin(this, options));
                }
            });
        }
        else if (typeof options === "string" && options[0] !== "_" && options !== "init")
        {
            var returns;
            this.each(function()
            {
                var instance = $.data(this, `plugin_${pluginName}`);
                if (!instance)
                {
                    instance = $.data(this, `plugin_${pluginName}`, new Plugin(this, options));
                }

                if (instance instanceof Plugin && typeof instance[options] === "function")
                {
                    returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                }

                if (options === "destroy")
                {
                    $.data(this, `plugin_${pluginName}`, null);
                }
            });

            return returns !== undefined ? returns : this;
        }

        return this.each(function()
        {
            if (!$.data(this, `plugin_${pluginName}`))
            {
                $.data(this, `plugin_${pluginName}`, new Plugin(this, options));
            }
        });
    };
}));