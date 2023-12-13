// После загрузки контента
// После загрузки контента
window.addEventListener('load', () => {
  const cardContainer = document.querySelector('.card-container');
  const numberOfCards = cardContainer.querySelectorAll('.card').length;
  const cardWidth = cardContainer.querySelector('.card').offsetWidth;

  // Установка начального скролла в конец контейнера
  cardContainer.scrollTo({
    left: cardWidth * numberOfCards,
    behavior: 'smooth',
  });

  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');
  
  let isAnimating = false;
  
  prevBtn.addEventListener('click', () => {
    if (isAnimating) return;
    isAnimating = true;
  
    const scrollPosition = cardContainer.scrollLeft - cardContainer.offsetWidth;
    cardContainer.scrollTo({
      left: scrollPosition,
      behavior: 'smooth',
    });
  
    setTimeout(() => {
      isAnimating = false;
    }, 300); 
  });
  
  nextBtn.addEventListener('click', () => {
    if (isAnimating) return;
    isAnimating = true;
  
    const scrollPosition = cardContainer.scrollLeft + cardContainer.offsetWidth;
    cardContainer.scrollTo({
      left: scrollPosition,
      behavior: 'smooth',
    });
  
    setTimeout(() => {
      isAnimating = false;
    }, 300); 
  });
});
