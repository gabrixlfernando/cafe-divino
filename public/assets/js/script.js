



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
      items: 1,
      itemsDesktop:[1000,1],
      itemsDesktopSmall:[979,1],
      itemsTablet:[769,1],
      pagination: true,  // Mostra as bolinhas de navegação (dots)
      autoPlay: true,    // Ativa o autoplay
      stopOnHover: true, // O autoplay para ao passar o mouse
      slideSpeed: 300,   // Velocidade da transição dos slides
      paginationSpeed: 400,  // Velocidade de transição das bolinhas
  });
});




// contador pagina sobre 

document.addEventListener("DOMContentLoaded", function() {
  const counters = document.querySelectorAll('.counter');
  let hasRun = false; // Variável para garantir que a contagem ocorre apenas uma vez

  const startCounting = () => {
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;

        // Calcular a velocidade da contagem
        const speed = target / 500; // Tempo total de contagem em milissegundos (ajustável)

        if (count < target) {
          counter.innerText = Math.ceil(count + speed);
          setTimeout(updateCount, 1); // Chama a função novamente após 1ms
        } else {
          counter.innerText = target; // Garante que o número final é exibido
        }
      };

      updateCount();
    });
  };

  // Configura o Intersection Observer
  const statsSection = document.querySelector('.stats-section');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !hasRun) {
        startCounting(); // Inicia a contagem quando a seção é visível
        hasRun = true;   // Evita que a contagem aconteça mais de uma vez
        observer.disconnect(); // Para de observar após iniciar a contagem
      }
    });
  }, {
    threshold: 0.5 // Define que a animação acontece quando 50% da seção estiver visível
  });

  observer.observe(statsSection); // Observa a seção
});


// filtro cardapio

document.addEventListener('DOMContentLoaded', function () {
  const filterButtons = document.querySelectorAll('.filter-button');
  const productSections = document.querySelectorAll('.products');
  
  // Adiciona evento de clique para cada botão de filtro
  filterButtons.forEach(button => {
    button.addEventListener('click', function () {
      const category = this.textContent.trim().toUpperCase();
      
      // Se já estiver ativo, remove o filtro
      if (this.classList.contains('active')) {
        // Remove a classe active de todos os botões
        filterButtons.forEach(btn => btn.classList.remove('active'));
        // Exibe todas as seções
        productSections.forEach(section => section.style.display = 'block');
      } else {
        // Remove a classe active de todos os botões e adiciona ao botão clicado
        filterButtons.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
        
        // Esconde todas as seções
        productSections.forEach(section => section.style.display = 'none');
        
        // Mostra apenas a seção correspondente ao filtro
        productSections.forEach(section => {
          const sectionTitle = section.querySelector('h2').textContent.toUpperCase();
          if (sectionTitle.includes(category)) {
            section.style.display = 'block';
          }
        });
      }
    });
  });
});


// digitando banner
var typed = new Typed('#element', {
  strings: [
    "Cappuccino.", 
    "Smoothie.",
    "Latte.",
    "Expresso.",
    "Macchiato.",
    "Shake.",
  ],
  backSpeed: 50,
  backDelay: 300,
  typeSpeed: 120,
  loop: true,
});


