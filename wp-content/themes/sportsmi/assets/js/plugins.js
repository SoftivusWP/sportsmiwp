

jQuery(function ($) {
  "use strict";

  jQuery(document).ready(function () {
    // wow init
    new WOW().init();

    // training slider
    $(".training__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 3,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-training"),
        nextArrow: $(".next-training"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // odometer counter
    $(".odometer").each(function () {
      $(this).isInViewport(function (status) {
        if (status === "entered") {
          for (
            var i = 0;
            i < document.querySelectorAll(".odometer").length;
            i++
          ) {
            var el = document.querySelectorAll(".odometer")[i];
            el.innerHTML = el.getAttribute("data-odometer-final");
          }
        }
      });
    });

    // testimonial slider
    $(".testimonial__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 3,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-testimonial"),
        nextArrow: $(".next-testimonial"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // team slider
    $(".team__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 2,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-team"),
        nextArrow: $(".next-team"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // sponsor slider
    $(".sponsor__inner")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 7,
        speed: 900,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 5,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 424,
            settings: {
              slidesToShow: 2,
            },
          },
        ],
      });

    // facility slider
    $(".facility__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 4,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-facility"),
        nextArrow: $(".next-facility"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // training secondary slider
    $(".training__slider--secondary")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 4,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-training--secondary"),
        nextArrow: $(".next-training--secondary"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // team secondary slider
    $(".team__slider--secondary")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 4,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-team--secondary"),
        nextArrow: $(".next-team--secondary"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 768,
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

    // testimonial secondary slider
    $(".testimonial__slider--secondary")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 1,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-testimonial--secondary"),
        nextArrow: $(".next-testimonial--secondary"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // video modal
    if (document.querySelector(".play-btn") !== null) {
      $(".play-btn").magnificPopup({
        disableOn: 768,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
      });
    }

    // training tertiary slider
    $(".training__slider--tertiary")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 2,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-training--tertiary"),
        nextArrow: $(".next-training--tertiary"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // coutnry select
    $("select").niceSelect();

    // testimonial tertiary slider
    $(".testimonial__slider--tertiary")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 2,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-testimonial--tertiary"),
        nextArrow: $(".next-testimonial--tertiary"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // event secondary slider
    $(".event--secondary__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: false,
        focusOnSelect: true,
        slidesToShow: 5,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-event"),
        nextArrow: $(".next-event"),
        centerMode: true,
        centerPadding: "120px",
        responsive: [
          {
            breakpoint: 1800,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              centerPadding: "200px",
            },
          },
          {
            breakpoint: 660,
            settings: {
              slidesToShow: 1,
              centerPadding: "120px",
            },
          },
          {
            breakpoint: 450,
            settings: {
              slidesToShow: 1,
              centerPadding: "40px",
            },
          },
        ],
      });

    // gallery slider
    $(".gallery-slider__wrapper")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 5,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-gallery"),
        nextArrow: $(".next-gallery"),
        centerMode: true,
        centerPadding: "200px",
        responsive: [
          {
            breakpoint: 1800,
            settings: {
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
          {
            breakpoint: 660,
            settings: {
              slidesToShow: 2,
              centerPadding: "40px",
            },
          },
          {
            breakpoint: 450,
            settings: {
              slidesToShow: 1,
              centerPadding: "12px",
            },
          },
        ],
      });

    // facility testimonial slider
    $(".facility__slider--testimonial")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 1,
        speed: 700,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-facility-testimonial"),
        nextArrow: $(".next-facility-testimonial"),
        centerMode: true,
        centerPadding: "0px",
      });

    // related news slider
    $(".related-news__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 3,
        speed: 700,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-news"),
        nextArrow: $(".next-news"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // facility related slider
    $(".facility--main__slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 4,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-related-facility"),
        nextArrow: $(".next-related-facility"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 3,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

    // product related slider
    $(".product__main-slider")
      .not(".slick-initialized")
      .slick({
        infinite: true,
        autoplay: true,
        focusOnSelect: true,
        slidesToShow: 3,
        speed: 900,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        prevArrow: $(".prev-related-product"),
        nextArrow: $(".next-related-product"),
        centerMode: true,
        centerPadding: "0px",
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });
  });
});
