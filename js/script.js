//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


// remover seta banner
document.addEventListener("DOMContentLoaded", function() {
  const arrowDown = document.querySelector(".banner-seta");
  window.addEventListener("scroll", function() {
    const scrollPosition = window.scrollY;
    if (scrollPosition > 100) {
      arrowDown.style.opacity = "0";
    } else {
      arrowDown.style.opacity = "1";
    }
  });
});


// Testimonials carousel
$(".testimonial-carousel").owlCarousel({
  autoplay: true,
  smartSpeed: 1500,
  margin: 30,
  dots: true,
  loop: true,
  center: true,
  responsive: {
      0:{
          items:1
      },
      576:{
          items:1
      },
      768:{
          items:2
      },
      992:{
          items:3
      }
  }
});