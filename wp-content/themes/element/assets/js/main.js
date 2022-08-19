jQuery(document).ready(function ($) {
  $('.burger').click(function (e) {
    $('.header-menu').toggle()
    $('body').toggleClass('overflow-hidden')
  })

  $('.slick').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 780,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  })
})

AOS.init()
