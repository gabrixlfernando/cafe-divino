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

// carrousel depoimentos
$(document).ready(function(){
  $("#testimonial-slider").owlCarousel({
      items:1,
      itemsDesktop:[1000,1],
      itemsDesktopSmall:[979,1],
      itemsTablet:[769,1],
      pagination:true,
      autoplay:true
  });
});

// contador pagina sobre 

document.addEventListener("DOMContentLoaded", function() {
  const counters = document.querySelectorAll('.counter');
  
  counters.forEach(counter => {
      const updateCount = () => {
          const target = +counter.getAttribute('data-target');
          const count = +counter.innerText;
          
          // Calcular a velocidade da contagem
          const speed = target / 400; // Tempo total de contagem em milissegundos (200)

          if (count < target) {
              // Incrementa o número
              counter.innerText = Math.ceil(count + speed);
              setTimeout(updateCount, 1); // Chama a função novamente após 1ms
          } else {
              counter.innerText = target; // Garante que o número final é exibido
          }
      };

      updateCount();
  });
});

// filtro cardapio

