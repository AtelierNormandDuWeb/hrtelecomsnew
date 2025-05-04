const slider = document.querySelector('.slider');

function nextSlide() {
  const items = document.querySelectorAll('.item-img');
  if (!items.length) return;
  slider.append(items[0]);
}

function prevSlide() {
  const items = document.querySelectorAll('.item-img');
  if (!items.length) return;
  slider.prepend(items[items.length - 1]);
}

// Click Manuel
document.addEventListener('click', function(e) {
  if (e.target.matches('.next')) {
    nextSlide();
  }
  if (e.target.matches('.prev')) {
    prevSlide();
  }
});

// Défilement Automatique toutes les 2500 ms
setInterval(nextSlide, 6000);