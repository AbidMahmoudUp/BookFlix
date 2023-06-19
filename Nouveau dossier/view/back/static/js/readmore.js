

const closeButtonn = document.getElementById('close-popup');

const popupCcontainer = document.getElementById("popup-container");
const  popupoverlay = document.getElementById("popup-overlay");
popupCcontainer.style.display = "block";
popupoverlay.style.display = "block";

closeButtonn.addEventListener('click', () => {
  popupCcontainer.style.display = 'none';
  popupoverlay.style.display = 'none';
});




const books = document.getElementsByClassName("books-details")[0];
const movies = document.getElementsByClassName("movies-details")[0];
const voice = document.getElementsByClassName("voice-details")[0];
const cosplays = document.getElementsByClassName("cosplays-details")[0];

const authorr = document.getElementById("authorr");
const punlisherr = document.getElementById("punlisherr");
const directorr = document.getElementById("directorr");
const punlisherr2 = document.getElementById("punlisherr2");

const formatt = document.getElementById("formatt");
const durationn = document.getElementById("durationn");

const sizee = document.getElementById("sizee");
const colorr = document.getElementById("colorr");

function readmore(category, x, y) {
  console.log(x,y);
  if (category === "Books") {
    books.style.display = "block";
    authorr.innerHTML = x;
    punlisherr.innerHTML = y;  
  }
  else if (category === "Voice Over") {
    voice.style.display = "block";

    formatt.innerHTML = x;
    durationn.innerHTML = y;
  }
  else if (category === "Movies") {
    movies.style.display = "block";
    directorr.innerHTML = x;
    punlisherr2.innerHTML = y;
  }
  else if (category === "Cosplays") {
    cosplays.style.display = "block";
    sizee.innerHTML = x;
    colorr.innerHTML = y;
  }
}








