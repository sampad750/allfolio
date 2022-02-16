;(function ($) {
  "use strict";
  //*=============menu sticky js =============*//
  var $window = $(window);
  var didScroll,
    lastScrollTop = 0,
    delta = 5,
    $mainNav = $(".sticky-nav").filter(":visible"),
    $body = $("body"),
    $mainNavHeight = $mainNav.outerHeight() + 15,
    scrollTop;

  $window.on("scroll", function () {
    didScroll = true;
    scrollTop = $(this).scrollTop();
  });

  setInterval(function () {
    if (didScroll) {
      if (Math.abs(lastScrollTop - scrollTop) <= delta) {
        return;
      }
      if (scrollTop > lastScrollTop && scrollTop > $mainNavHeight) {
        $mainNav
          .removeClass("fadeInDown")
          .addClass("fadeInUp")
          .css("top", -$mainNavHeight);
        $body.removeClass("remove").addClass("add");
      } else {
        if (scrollTop + $(window).height() < $(document).height()) {
          $mainNav
            .removeClass("fadeInUp")
            .addClass("fadeInDown")
            .css("top", 0)
            .addClass("gap");
          $body.removeClass("add").addClass("remove");
        }
      }
      lastScrollTop = scrollTop;
      didScroll = false;
    }
  }, 200);

  if ($(".sticky-nav").length) {
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();
      if (scroll) {
        $(".sticky-nav").addClass("navbar_fixed");
        $(".sticky-nav-doc .body_fixed").addClass("body_navbar_fixed");
      } else {
        $(".sticky-nav").removeClass("navbar_fixed");
        $(".sticky-nav-doc .body_fixed").removeClass("body_navbar_fixed");
      }
    });
  }

  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(document).scrollTop() > 500) {
        $("body").addClass("test");
      } else {
        $("body").removeClass("test");
      }
    });
  });

  //* Navbar Fixed
  function navbarFixed() {
    if ($(".sticky_nav").length) {
      $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll) {
          $(".sticky_nav").addClass("navbar_fixed");
        } else {
          $(".sticky_nav").removeClass("navbar_fixed");
        }
      });
    }
  }
  navbarFixed();

  /*------------ Cookie functions and color js ------------*/
  function createCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
  }

  function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ") c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  function eraseCookie(name) {
    createCookie(name, "", -1);
  }

  var prefersDark =
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches;
  var selectedNightTheme = readCookie("body_dark");

  if (
    selectedNightTheme == "true" ||
    (selectedNightTheme === null && prefersDark)
  ) {
    applyNight();
    $(".dark_mode_switcher").prop("checked", true);
  } else {
    applyDay();
    $(".dark_mode_switcher").prop("checked", false);
  }

  // Dark Mode Switcher
  function applyNight() {
    if ($(".js-darkmode-btn .ball").length) {
      $(".js-darkmode-btn .ball").css("left", "39px");
    }
    $("body").addClass("body_dark");
  }

  function applyDay() {
    if ($(".js-darkmode-btn .ball").length) {
      $(".js-darkmode-btn .ball").css("left", "3px");
    }
    $("body").removeClass("body_dark");
  }

  $(".dark_mode_switcher").change(function () {
    if ($(this).is(":checked")) {
      applyNight();

      createCookie("body_dark", true, 999);
    } else {
      applyDay();
      createCookie("body_dark", false, 999);
    }
  });

  // Dark Mode Switcher 2
  function applyNight2() {
    if ($(".js-darkmode-btn2 .ball").length) {
      $(".js-darkmode-btn2 .ball").css("left", "52px");
    }
    $("body").addClass("body_dark");
  }

  function applyDay2() {
    if ($(".js-darkmode-btn2 .ball").length) {
      $(".js-darkmode-btn2 .ball").css("left", "0");
    }
    $("body").removeClass("body_dark");
  }

  $(".dark_mode_switcher").change(function () {
    if ($(this).is(":checked")) {
      applyNight2();

      createCookie("body_dark", true, 999);
    } else {
      applyDay2();
      createCookie("body_dark", false, 999);
    }
  });

  $(".mobile_menu_btn").on("click", function () {
    $(".side_menu").addClass("menu-opened");
    $("body").removeClass("menu-is-closed").addClass("menu-is-opened");
  });
  $(".close_nav").on("click", function (e) {
    if ($(".side_menu").hasClass("menu-opened")) {
      $(".side_menu").removeClass("menu-opened");
      $("body").removeClass("menu-is-opened");
    } else {
      $(".side_menu").addClass("menu-opened");
    }
  });

  $(window).on("load", function () {
    if ($(".scroll").length) {
      $(".scroll").mCustomScrollbar({
        mouseWheelPixels: 50,
        scrollInertia: 0,
      });
    }
  });

  if ($(".chapter-tab").length) {
    var triggerChapterTabList = [].slice.call(
      document.querySelectorAll(".chapter-tab .nav-link")
    );
    triggerChapterTabList.forEach(function (triggerEl) {
      var tabTrigger = new bootstrap.Tab(triggerEl);

      triggerEl.addEventListener("click", function (event) {
        $(".chapter-tab").find(".active").removeClass("active");
        event.preventDefault();
        tabTrigger.show();
      });
    });
  }

  if ($(".branding-slider").length) {
    $(".branding-slider").slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      speed: 1500,
      pauseOnHover: false,

      cssEase: "linear",
      autoplaySpeed: 10,
      responsive: [
        {
          breakpoint: 765,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  if ($(".branding-reverse-slider").length) {
    $(".branding-reverse-slider").slick({
      autoplay: true,
      infinite: true,
      rtl: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      speed: 1500,
      pauseOnHover: false,
      cssEase: "linear",
      autoplaySpeed: 10,
      responsive: [
        {
          breakpoint: 765,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  }

  if ($(".single-members-slider").length) {
    $(".single-members-slider").slick({
      autoplay: false,
      infinite: false,
      slidesToShow: 7,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
    });
  }

  if ($(".single-members-slider").length) {
    $(".single-members-slider .slick-track").addClass("nav");
  }

  if ($(".proccess-banner-slider").length) {
    $(".proccess-banner-slider").slick({
      autoplay: false,
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
    });
  }

  if ($(".trip-post .slider-photo").length) {
    $(".trip-post .slider-photo").slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      prevArrow:
        '<button type="button" class="nav-arrow prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow:
        '<button type="button" class="nav-arrow"><i class="fas fa-chevron-right"></i></button>',
    });
  }

  if ($(".instagram-feed-three").length) {
    $(".instagram-feed-three").slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 8,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
    });
  }

  if ($(".testimonial-slider").length) {
    $(".testimonial-slider").slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      nextArrow: '<div class="next"><span class="arrow"></span></div>',
    });

    var getSlickItem = $(".testimonial-slider").slick("getSlick");
    if (getSlickItem.currentSlide < 9) {
      $(".current_slide").text(`0${getSlickItem.currentSlide + 1}`);
    } else {
      $(".current_slide").text(getSlickItem.currentSlide + 1);
    }
    if (getSlickItem.getDotCount() < 9) {
      $(".total_slide").text(`0${getSlickItem.getDotCount() + 1}`);
    } else {
      $(".total_slide").text(getSlickItem.getDotCount() + 1);
    }

    $(".testimonial-slider").on(
      "beforeChange",
      function (event, slick, currentSlide, nextSlide) {
        if (nextSlide < 9) {
          $(".current_slide").text(`0${nextSlide + 1}`);
        } else {
          $(".current_slide").text(nextSlide + 1);
        }
      }
    );
  }

  if ($(".testimonial-slide-3").length) {
    $(".testimonial-slide-3").slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      centerMode: true,
      centerPadding: 0,
    });
  }

  if ($(".testimonial-slider-6").length) {
    $(".testimonial-slider-6").slick({
      autoplay: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
    });
  }

  //mixit up
  if ($("#team-filter").length) {
    var containerEl = document.querySelector("#team-filter");
    var mixer = mixitup(containerEl);
  }

  new WOW().init();


  if ($("#basicDate").length > 0) {
    $("#basicDate").flatpickr({
      enableTime: false,
      dateFormat: "F, d Y",
    });
  }

  if ($("#availability").length > 0) {
    $("#availability").flatpickr({
      enableTime: false,
      dateFormat: "F, d Y",
    });
  }

  if ($("#filterGalleryFrom").length > 0) {
    $("#filterGalleryFrom").flatpickr({
      enableTime: false,
      dateFormat: "d-m-Y",
    });
  }
  if ($("#filterGalleryTo").length > 0) {
    $("#filterGalleryTo").flatpickr({
      enableTime: false,
      dateFormat: "d-m-Y",
    });
  }
  if ($(".select").length) {
    $(".select").niceSelect();
  }

  if ($("[data-scroll-container]").length) {
    var loco_scroll = new LocomotiveScroll({
      el: document.querySelector("[data-scroll-container]"),
      smooth: true,
    });
  }

  if ($(".counter").length) {
    $(".counter").counterUp({
      delay: 10,
      time: 1000,
    });
  }
})(jQuery);

if (jQuery(".skill-slider").length) {
  var swiper = new Swiper(".skill-slider", {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 20,
    keyboard: {
      enabled: true,
    },
    freeMode: true,
    watchSlidesProgress: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 2,
      },
      992: {
        slidesPerView: 4,
      },
    },
  });
}

if (jQuery(".logo-slide-4").length) {
  var swiper2 = new Swiper(".logo-slide-4", {
    spaceBetween: 10,
    slidesPerView: 1,
    loop: true,
    watchSlidesProgress: true,
    breakpoints: {
      480: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 5,
      },
    },
  });
}

if (jQuery(".testimonial-slide-4").length) {
  var swiper3 = new Swiper(".testimonial-slide-4", {
    spaceBetween: 10,
    loop: true,
    navigation: false,
    thumbs: {
      swiper: swiper2,
    },

    breakpoints: {
      768: {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      },
    },
  });
}

// Homepage 6 Testimonial Section
if (jQuery(".testimonial-slide-5").length) {
  var swiper4 = new Swiper(".testimonial-slide-5", {
    spaceBetween: 10,
    loop: true,
    navigation: false,

    breakpoints: {
      768: {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      },
    },
  });
}

// Homepage 6 Testimonial Section
if (jQuery(".testimonial-slider-active").length) {
  var swiper5 = new Swiper(".testimonial-slider-active", {
    slidesPerView: 1,
    spaceBetween: 24,
    grabCursor: true,
    loop: true,
    speed: 500,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });
}

// Homepage 7 Banner Slider
if (jQuery(".banner-thumbs").length) {
  var bannerThumbs = new Swiper(".banner-thumbs", {
    slidesPerView: 1,
    loop: true,
    centeredSlides: true,
    watchSlidesProgress: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    breakpoints: {
      480: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 5,
      },
    },
  });
}

if (jQuery(".banner-main").length) {
  var bannerMain = new Swiper(".banner-main", {
    loop: true,
    navigation: false,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    thumbs: {
      swiper: bannerThumbs,
    },

    breakpoints: {
      768: {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      },
    },
  });
}

if (jQuery(".instagram-feed-active").length) {
  // Homepage 7 Portfolio Slider
  var portfolio = new Swiper(".instagram-feed-active", {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
    },
  });
}

if (jQuery(".instagram-feed-two").length) {
  var instagramTwo = new Swiper(".instagram-feed-two", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      480: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      992: {
        slidesPerView: 5,
      },
      1200: {
        slidesPerView: 8,
      },
    },
  });
}

if (jQuery(".case-study-swiper-init").length) {
  var case_study_swiper = new Swiper(".case-study-swiper-init", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}
var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["showcase"] = {
  once:
    RS_MODULES.modules["showcase"] !== undefined
      ? RS_MODULES.modules["showcase"].once
      : undefined,
  init: function () {
    window.revapi16 =
      window.revapi16 === undefined ||
      window.revapi16 === null ||
      window.revapi16.length === 0
        ? document.getElementById("showcase")
        : window.revapi16;
    if (
      window.revapi16 === null ||
      window.revapi16 === undefined ||
      window.revapi16.length == 0
    ) {
      window.revapi16initTry =
        window.revapi16initTry === undefined ? 0 : window.revapi16initTry + 1;
      if (window.revapi16initTry < 20)
        requestAnimationFrame(function () {
          RS_MODULES.modules["showcase"].init();
        });
      return;
    }
    window.revapi16 = jQuery(window.revapi16);
    if (window.revapi16.revolution == undefined) {
      revslider_showDoubleJqueryError("showcase");
      return;
    }
    revapi16.revolutionInit({
      revapi: "revapi16",
      DPR: "dpr",
      sliderLayout: "fullscreen",
      visibilityLevels: "1240,1240,1240,480",
      gridwidth: "1140,1140,1140,480",
      gridheight: "900,900,900,800",
      spinner: "spinner7",
      perspective: 600,
      perspectiveType: "local",
      spinnerclr: "#ff355b",
      editorheight: "900,768,960,800",
      responsiveLevels: "1240,1240,1240,480",
      ajaxUrl: "http://slider-revolution.local/wp-admin/admin-ajax.php",
      progressBar: { disableProgressBar: true },
      navigation: {
        onHoverStop: false,
      },
      sbtimeline: {
        set: true,
        speed: "0ms",
        fixed: true,
        fixStart: "1500ms",
        fixEnd: "3100ms",
      },
      viewPort: {
        global: false,
        globalDist: "-200px",
        enable: true,
      },
      fallbacks: {
        allowHTML5AutoPlayOnAndroid: true,
      },
    });
  },
}; // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
  window.RS_MODULES.checkMinimal();
}

var tpj = jQuery;
if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["portfolio"] = {
  once:
    RS_MODULES.modules["portfolio"] !== undefined
      ? RS_MODULES.modules["portfolio"].once
      : undefined,
  init: function () {
    window.revapi9 =
      window.revapi9 === undefined ||
      window.revapi9 === null ||
      window.revapi9.length === 0
        ? document.getElementById("portfolio")
        : window.revapi9;
    if (
      window.revapi9 === null ||
      window.revapi9 === undefined ||
      window.revapi9.length == 0
    ) {
      window.revapi9initTry =
        window.revapi9initTry === undefined ? 0 : window.revapi9initTry + 1;
      if (window.revapi9initTry < 20)
        requestAnimationFrame(function () {
          RS_MODULES.modules["portfolio"].init();
        });
      return;
    }
    window.revapi9 = jQuery(window.revapi9);
    if (window.revapi9.revolution == undefined) {
      revslider_showDoubleJqueryError("portfolio");
      return;
    }
    revapi9.revolutionInit({
      revapi: "revapi9",
      sliderType: "carousel",
      DPR: "dpr",
      sliderLayout: "fullwidth",
      visibilityLevels: "1240,1240,1240,480",
      gridwidth: "1140,1140,1140,480",
      gridheight: "1000,1000,1000,1000",
      spinner: "spinner7",
      perspective: 600,
      perspectiveType: "local",
      spinnerclr: "#ff355b",
      editorheight: "1000,768,960,1000",
      responsiveLevels: "1240,1240,1240,480",
      stopAtSlide: 1,
      stopAfterLoops: 0,
      stopLoop: true,
      ajaxUrl: "http://slider-revolution.local/wp-admin/admin-ajax.php",
      carousel: {
        speed: "2000ms",
        showLayersAllTime: "all",
        maxVisibleItems: 5,
      },
      progressBar: { disableProgressBar: true },
      navigation: {
        wheelCallDelay: 1000,
        onHoverStop: false,
        touch: {
          touchenabled: false,
          desktopCarousel: false,
        },
        bullets: {
          enable: true,
          tmp: "",
          style: "light-bars",
          hide_onmobile: true,
          hide_under: "600px",
          h_align: "right",
          h_offset: 80,
          v_offset: 100,
          container: "layergrid",
        },
      },
      viewPort: {
        global: false,
        globalDist: "-200px",
        enable: true,
      },
      fallbacks: {
        allowHTML5AutoPlayOnAndroid: true,
      },
    });
  },
}; // End of RevInitScript
if (window.RS_MODULES.checkMinimal !== undefined) {
  window.RS_MODULES.checkMinimal();
}
