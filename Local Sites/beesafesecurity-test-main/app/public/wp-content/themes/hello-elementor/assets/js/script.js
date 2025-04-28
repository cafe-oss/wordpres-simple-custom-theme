document.addEventListener("DOMContentLoaded", (event) => {
  gsap.registerPlugin(ScrollTrigger);

  ScrollTrigger.matchMedia({
    "(min-width: 769px)": function () {
      const toggleActions = "play reset play reset";
      function createScrollTrigger(child) {
        return {
          trigger: child,
          start: "bottom bottom",
          end: "top top",
          // toggleActions: toggleActions,
          markers: false,
        };
      }

      const hero_buttons = gsap.utils.toArray(
        ".hero-text-container .custom-button-container .custom-button"
      );
      if (hero_buttons.length > 0) {
        gsap.utils.toArray(hero_buttons).forEach((child, index) => {
          gsap.from(child, {
            opacity: 0,
            x: -50,
            duration: 1,
            ease: "power2.out",
            delay: index * 0.3,
            scrollTrigger: createScrollTrigger(child),
          });
        });
      }

      const footer_buttons = gsap.utils.toArray(
        ".footer-banner .custom-button-container .custom-button"
      );
      if (footer_buttons.length > 0) {
        gsap.utils.toArray(footer_buttons).forEach((child, index) => {
          gsap.from(child, {
            opacity: 0,
            x: -50,
            duration: 1,
            ease: "power2.out",
            delay: index * 0.3,
            scrollTrigger: createScrollTrigger(child),
          });
        });
      }

      const dtc_header = gsap.utils.toArray(".default-text-col1 h2");
      if (dtc_header.length > 0) {
        gsap.utils.toArray(dtc_header).forEach((child) => {
          gsap.from(child, {
            opacity: 0,
            x: "-100vw",
            duration: 1,
            ease: "power2.out",
            scrollTrigger: createScrollTrigger(child),
          });
        });
      }

      const dtc_text = gsap.utils.toArray(
        ".default-text-col2 .elementor-widget-container p"
      );
      if (dtc_text.length > 0) {
        gsap.utils.toArray(dtc_text).forEach((child) => {
          gsap.from(child, {
            opacity: 0,
            x: "100vw",
            duration: 1,
            ease: "power2.out",
            scrollTrigger: createScrollTrigger(child),
          });
        });
      }

      const overlay_list = gsap.utils.toArray(".hero-overlay-info-list li");
      if (overlay_list.length > 0) {
        gsap.utils.toArray(overlay_list).forEach((child, index) => {
          gsap.from(child, {
            opacity: 0,
            y: 30,
            duration: 1,
            ease: "power2.out",
            delay: index * 0.3,
            scrollTrigger: createScrollTrigger(child),
          });
        });
      }

      const service_container = document.querySelector(".service-container");
      if (service_container) {
        gsap.from(service_container, {
          y: 70,
          opacity: 0,
          duration: 1.5,
          ease: "power2.out",
          scrollTrigger: {
            trigger: service_container,
            // start: "top center",
            // end: "bottom center",
            // toggleActions: "play reset play reset",
            markers: false,
          },
        });
      }

      ScrollTrigger.refresh();
    },
  });
});

jQuery(document).ready(function ($) {
  var mySwiper = new Swiper(".swiper-container", {
    // speed: 400,
    // spaceBetween: 100,
    // initialSlide: 0,
    // direction: 'horizontal',
    // loop: true,
    spaceBetween: 24,
    edSlides: true,

    // autoplay: {
    //    delay: 5000,
    //  },
    autoplayStopOnLast: false,

    // If you need pagination
    pagination: {
      //   el: '.swiper-pagination',
      clickable: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
      //   nextEl: null,
      //   prevEl: null,
    },

    // "slide", "fade", "cube", "coverflow" or "flip"
    effect: "slide",
    // Distance between slides in px.

    slidesPerView: 3,
    breakpoints: {
      1025: {
        slidesPerView: 3,
      },
      769: {
        slidesPerView: 2,
      },
      564: {
        slidesPerView: 1,
      },
      0: {
        slidesPerView: 1,
      },
    },
    grabCursor: true,
  });

  $(".custom-button > a").hover(
    function () {
      // Add classes on hover
      $(this).find(".button__icons").addClass("active");
      $(this).find(".button__icon-anim").addClass("active");
      $(this).find(".button__bg").addClass("active");
      $(this).find(".button__text-anim").addClass("active");
    },
    function () {
      // Remove classes correctly
      $(this).find(".button__icons").removeClass("active");
      $(this).find(".button__icon-anim").removeClass("active");
      $(this).find(".button__bg").removeClass("active");
      $(this).find(".button__text-anim").removeClass("active");
    }
  );
});

window.addEventListener("scroll", function () {
  const header = document.querySelector("header");
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});
