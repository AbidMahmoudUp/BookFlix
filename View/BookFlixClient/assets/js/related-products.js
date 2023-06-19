/* Created by Tivotal */

var swiper = new Swiper(".slider-content", {
    slidesPerView: 0,
    spaceBetween: 25,
    loop: "true",
    centerSlide: "true",
    fade: "false",
    grabCursor: "true",
    pagination: {
      el: ".swiper-pagination",
      clickable: "true",
      dynamicBullets: "true",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  
    breakpoints: {
      0: {
        slidesPerView: 1.5,
      },
      420: {
        slidesPerView: 2,
      },
      520: {
        slidesPerView: 2,
      },
      750: {
        slidesPerView: 2.5,
      },
      850: {
        slidesPerView: 3,
      },
      950: {
        slidesPerView: 3.5,
      },
      1200: {
        slidesPerView: 4,
      },
      1400: {
        slidesPerView: 4.5,
      },
      1450: {
        slidesPerView: 5,
      },
      1600: {
        slidesPerView: 5.5,
      },
      1600: {
        slidesPerView: 6,
      }

    },
  });
  

  const form = document.querySelector('form');
const commentList = document.querySelector('.comment-list');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  
  const name = form.elements['name'].value;
  const email = form.elements['email'].value;
  const comment = form.elements['comment'].value;
  
  const commentElement = document.createElement('div');
  commentElement.classList.add('comment');
  commentElement.innerHTML = `
    <h3>${name}</h3>
    <p>${email}</p>
    <p>${comment}</p>
  `;
  
  commentList.appendChild(commentElement);
  
  form.reset();
});
