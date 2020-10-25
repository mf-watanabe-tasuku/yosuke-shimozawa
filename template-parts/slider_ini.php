<?php $options = get_design_plus_option(); ?>

  var slideWrapper = $('#header_slider'),
      iframes = slideWrapper.find('.youtube-player'),
      ytPlayers = {},
      timers = {};

  // YouTube IFrame Player API script load
  if ($('#header_slider .youtube-player').length) {
    if (!$('script[src="//www.youtube.com/iframe_api"]').length) {
      var tag = document.createElement('script');
      tag.src = 'https://www.youtube.com/iframe_api';
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }
  }

  // YouTube IFrame Player API Ready
  window.onYouTubeIframeAPIReady = function(){
    slideWrapper.find('.youtube-player').each(function(){
      var ytPlayerId = $(this).attr('id');
      if (!ytPlayerId) return;
      var player = new YT.Player(ytPlayerId, {
        events: {
          onReady: function(e) {
            $('#'+ytPlayerId).css('opacity', 0);
            iframes = slideWrapper.find('.youtube-player');
            resizePlayer($('#'+ytPlayerId), 16/9);
            ytPlayers[ytPlayerId] = player;
            ytPlayers[ytPlayerId].mute();
            ytPlayers[ytPlayerId].lastStatus = -1;
            if ($('#'+ytPlayerId).closest('.item').hasClass('slick-current')) {
              playPauseVideo($('#'+ytPlayerId).closest('.item1'), 'play');
            }
          },
          onStateChange: function(e) {
            if (e.data === 0) { // ended
              $('#'+ytPlayerId).stop().css('opacity', 0);

              setTimeout(function(){
                  var slick = slideWrapper.slick('getSlick');
                  if (slick.paused) {
                    slideWrapper.slick('slickPlay');
                  }
              }, 1000);
            } else if (e.data === 1) { // play
              $('#'+ytPlayerId).not(':animated').css('opacity', 1);

              var slide = $(e.target.a).closest('.item');
              var slickIndex = slide.attr('data-slick-index') || 0;
              slideWrapper.slick('slickPause');
              clearInterval(timers[slickIndex]);
              timers[slickIndex] = setInterval(function(){
                var state = ytPlayers[ytPlayerId].getPlayerState();
                if (state != 1 && state != 3) {
                  clearInterval(timers[slickIndex]);
                } else if (ytPlayers[ytPlayerId].getDuration() - ytPlayers[ytPlayerId].getCurrentTime() < 1) {
                  clearInterval(timers[slickIndex]);
                  slideWrapper.slick('slickNext').slick('slickPlay');
                }
              }, 200);
            } else if (e.data === 3) { // buffering
              if (ytPlayers[ytPlayerId].lastStatus === -1) {
                $('#'+ytPlayerId).delay(100).animate({opacity: 1}, 400);
              }
            }
            ytPlayers[ytPlayerId].lastStatus = e.data;
          }
        }
      });
    });
  };

  // play or puase video
  function playPauseVideo(slide, control){
    if (!slide) {
      slide = slick.find('.slick-current');
    }
    if (slide.hasClass('youtube')) {
      var ytPlayerId = slide.find('.youtube-player').attr('id');
      if (ytPlayerId) {
        switch (control) {
          case 'play':
            if (ytPlayers[ytPlayerId]) {
              ytPlayers[ytPlayerId].seekTo(0, true);
              ytPlayers[ytPlayerId].playVideo();
            }
            break;
          case 'pause':
            if (ytPlayers[ytPlayerId]) {
              ytPlayers[ytPlayerId].pauseVideo();
            }
            break;
        }
      }
    } else if (slide.hasClass('video')) {
      var video = slide.children('video').get(0);
      if (video) {
        switch (control) {
          case 'play':
            video.currentTime = 0;
            video.play();
            var slickIndex = slide.attr('data-slick-index') || 0;
            clearInterval(timers[slickIndex]);
            timers[slickIndex] = setInterval(function(){
              if (video.paused) {
                clearInterval(timers[slickIndex]);
              } else if (video.duration - video.currentTime < 2) {
                clearInterval(timers[slickIndex]);
                if (timers.slickNext) {
                  clearTimeout(timers.slickNext);
                  timers.slickNext = null;
                }
                slideWrapper.slick('slickNext');
                setTimeout(function(){
                  video.currentTime = 0;
                }, 2000);
              }
            }, 200);
            break;
          case 'pause':
            video.pause();
            break;
        }
      }
    } else if (slide.hasClass('image_item')) {
      switch (control) {
        case 'play':
          if (timers.slickNext) {
            clearTimeout(timers.slickNext);
            timers.slickNext = null;
          }
          timers.slickNext = setTimeout(function(){
            slideWrapper.slick('slickNext');
          }, <?php echo absint($options['slider_time']); ?>);
          break;
        case 'pause':
          break;
      }
    }
  }

  // Resize player
  function resizePlayer(iframes, ratio) {
    if (!iframes[0]) return;
    var win = $('#header_slider'),
        width = win.width(),
        playerWidth,
        height = win.height(),
        playerHeight,
        ratio = ratio || 16/9;

    iframes.each(function(){
      var current = $(this);
      if (width / ratio < height) {
        playerWidth = Math.ceil(height * ratio);
        current.width(playerWidth).height(height).css({
          left: (width - playerWidth) / 2,
          top: 0
        });
      } else {
        playerHeight = Math.ceil(width / ratio);
        current.width(width).height(playerHeight).css({
          left: 0,
          top: (height - playerHeight) / 2
        });
      }
    });
  }

  // DOM Ready
  $(function() {
    // Initialize
    slideWrapper.on('init', function(slick){
      $('#header_slider .item1').addClass('first_active');
      $('#header_slider .item1').addClass('animate');
      resizePlayer(iframes, 16/9);
      playPauseVideo($('#header_slider .item1'), 'play');
    });

    slideWrapper.on('beforeChange', function(event, slick, currentSlide, nextSlide) {      if (currentSlide == nextSlide) return;
      slick.$slides.eq(nextSlide).addClass('animate');
      setTimeout(function(){
        playPauseVideo(slick.$slides.eq(currentSlide), 'pause');
      }, slick.options.speed);
      playPauseVideo(slick.$slides.eq(nextSlide), 'play');
    });
    slideWrapper.on('afterChange', function(event, slick, currentSlide) {
      slick.$slides.not(':eq(' + currentSlide + ')').removeClass('animate first_active');
    });
    slideWrapper.on('swipe', function(event, slick, direction){
      slideWrapper.slick('setPosition');
    });

    //start the slider
    slideWrapper.slick({
      infinite: true,
      dots: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      pauseOnFocus: false,
      pauseOnHover: false,
      autoplay: false,
      fade: true,
      autoplaySpeed:<?php echo absint($options['slider_time']); ?>,
      lazyLoad: 'progressive',
      speed:1500,
      easing: 'easeOutExpo'
    });

    // Resize event
    $(window).on('resize.slickVideoPlayer', function(){
      resizePlayer(iframes, 16/9);
    }).trigger('resize');
  });
