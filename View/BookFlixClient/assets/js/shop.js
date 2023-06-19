
  


  //submit filter button on click 
  function checkPrices() {
  
    const minValue = parseInt(document.getElementById("min-value").value);
    const maxValue = parseInt(document.getElementById("max-value").value);
    const minLabel = document.querySelector('label[for="min-value"]');
    const maxLabel = document.querySelector('label[for="max-value"]');
  
    if (minValue >= 0 && maxValue >= 0 && minValue < maxValue) {
      minLabel.style.color = "green";
      maxLabel.style.color = "green";
      minLabel.textContent = `Min Value (Success: ${minValue})`;
      maxLabel.textContent = `Max Value (Success: ${maxValue})`;
    } else {
      minLabel.style.color = "red";
      maxLabel.style.color = "red";
      minLabel.textContent = `Min Value (Error: ${minValue})`;
      maxLabel.textContent = `Max Value (Error: ${maxValue})`;
    }
  }







  const filterMenu = document.querySelector(".filter_box");
  const filterTrigger = document.querySelector(".filter-trigger");
  const filterClose = document.querySelector(".filter-close");

  //show the filter menu
  filterTrigger.addEventListener("click", function() {
    filterMenu.classList.add("filterBoxShow");
  });
//close the filter menu
filterClose.addEventListener("click", function() {
    filterMenu.classList.remove("filterBoxShow");
  });




// Get all product card elements
const container = document.querySelector('.container-product');
const products = document.querySelectorAll('.product-card');

function annimationScroll(){
  products.forEach(product => {
   const rect=product.getBoundingClientRect();
   if(rect.top< window.pageYOffset+window.innerHeight*0.8)
    {
      product.classList.add('annimate');
    }
    else
    {
      product.classList.remove('annimate');

    }


  });
}

container.addEventListener("scroll",annimationScroll);


function LoadWdishlist(array) {
  array.forEach(id => {
    console.log("zab");
    console.log(typeof id,"and id = ",id);
    const productCard = document.getElementById(id);
    const heartIcon = productCard.querySelector('.fa-heart');
    heartIcon.classList.add('like-clicked');
  });
}

