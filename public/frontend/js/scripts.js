/*!
* Start Bootstrap - Blog Post v5.0.9 (https://startbootstrap.com/template/blog-post)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-blog-post/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project





$('.homeSlider').slick({
   slidesToShow: 1,
   infinite: true,
   slidesToScroll: 1, // Corrected from 'true' to '1'
   autoplay: true,
   autoplaySpeed: 2000, // Optional: Adjust the autoplay speed (in milliseconds)
   prevArrow: $('.prev'),
   nextArrow: $('.next'),
});
