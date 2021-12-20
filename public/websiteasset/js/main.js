$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        nav: true,
        items: 5,
        autoplayTimeout:2000,
        autoplaySpeed: 1000,
        animateIn: 'linear',
        animateOut: 'linear'
    });

});

var scrollSpy = new bootstrap.ScrollSpy(document.body, {
    target: '#main-nav'
  })