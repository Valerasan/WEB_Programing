jQuery( document ).ready(function( $ ) {

$('.one-time').slick({
  dots: true,
  infinite: true,
  speed: 5000,
  slidesToShow: 1,
  adaptiveHeight: true,
  autoplay: true,
  fade: true,
  autoplaySpeed: 900,
  cssEase: 'cubic-bezier(0.7, 0, 0.5, 1)',
    });		
});


jQuery( document ).ready(function( $ ) {
$('.responsive').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
});