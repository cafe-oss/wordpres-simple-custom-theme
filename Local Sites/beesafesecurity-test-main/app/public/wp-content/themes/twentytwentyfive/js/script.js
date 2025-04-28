jQuery(document).ready(function($) {
  
         
    var mySwiper = new Swiper ('.swiper-container', {
      // speed: 400,
      // spaceBetween: 100,
      // initialSlide: 0,
      // direction: 'horizontal',
      // loop: true,
      spaceBetween: 24,
      centeredSlides: true,

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
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        //   nextEl: null,
        //   prevEl: null,
        },
 
      // "slide", "fade", "cube", "coverflow" or "flip"
      effect: 'slide',
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
    })        
 
  });

  