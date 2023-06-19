		//--------------------------------Pop up add Admin------------------------------------------------------
		const openButtonAdmin = document.getElementById('open-popup-Admin');
    const openButtonAdmin2 = document.getElementById('update-button');

		const closeButtonAdmin = document.getElementById('close-popup-Admin');
    //add popup
		const popupContainerAdmin = document.getElementById('popup-container-Admin');
		const popupOverlayAdmin = document.getElementById('popup-overlay-Admin');
// modify popup
const popupContainerAdmin2 = document.getElementById('popup-container-Admin2');
const popupOverlayAdmin2 = document.getElementById('popup-overlay-Admin2');

//k thel hutton fiels kol display none initialistaion 
		openButtonAdmin.addEventListener('click', () => {
	    // Add a delay of 500ms (0.5s) before showing the popup
      //category selected set all display none
      const bookInputs=document.querySelectorAll(".book-field");
      const movieInputs =document.querySelectorAll(".movie-field");
      const cosplaysInputs =document.querySelectorAll(".cosplays-field");
      const voiceInputs =document.querySelectorAll(".voice-field");

    
       movieInputs.forEach(input => {
         input.style.display="none";
       });
    
       cosplaysInputs.forEach(input => {
         input.style.display="none";
       });
    
       voiceInputs.forEach(input => {
         input.style.display="none";
       });
       
      setTimeout(() => {
        popupContainerAdmin.style.opacity = '0';
        popupContainerAdmin.style.transform='translate(-50%, -50%) scale(0)';
        popupContainerAdmin.style.display = 'block';
        popupOverlayAdmin.style.display = 'block';
        // Add an animation to the popup window using CSS transitions
        setTimeout(() => {
            popupContainerAdmin.style.opacity = '1';
            popupContainerAdmin.style.transform='translate(-50%, -50%) scale(1)';
        }, 200); // Wait for 50ms before starting the animation
    }, 200);

		});

		closeButtonAdmin.addEventListener('click', () => {
      setTimeout(() => {
        popupContainerAdmin.style.opacity = '1';
        popupContainerAdmin.style.display = 'block';
        popupOverlayAdmin.style.display = 'block';
        popupContainerAdmin.style.transform='translate(-50%, -50%) scale(1)';
        setTimeout(() => {
            popupContainerAdmin.style.opacity = '0';
            popupContainerAdmin.style.display = 'none';
            popupOverlayAdmin.style.display = 'none';
            popupContainerAdmin.style.transform='translate(-50%, -50%) scale(0)';
        }, 100); 
    }, 150);
		});
















    
   //-----------------------------------------------------------------
   const emailInput = document.getElementById('reference');
   const emailIcon = document.getElementById('reference-icon');
   emailIcon.style.color ='#d9d9d9';

   emailInput.addEventListener('focus', () => {
     emailIcon.style.color = '#4A8292';
   });
 
   emailInput.addEventListener('blur', () => {
     emailIcon.style.color = '#d9d9d9';});
     //-----------------------------------------------------------------
     const nameInput = document.getElementById('name');
     const nameIcon = document.getElementById('name-icon');
     nameIcon.style.color ='#d9d9d9';
     nameInput.addEventListener('focus', () => {
       nameIcon.style.color = '#4A8292';
     });
   
     nameInput.addEventListener('blur', () => {
       nameIcon.style.color = '#d9d9d9';});
       //-------------------------------------------------------
       const passwordInput = document.getElementById('quantity');
       const passwordIcon = document.getElementById('quantity-icon');
        passwordIcon.style.color ='#d9d9d9';
       passwordInput.addEventListener('focus', () => {
         passwordIcon.style.color = '#4A8292';
       });
     
       passwordInput.addEventListener('blur', () => {
         passwordIcon.style.color = '#d9d9d9';});
         //----------------------------------------------------------
         const phoneNumberInput = document.getElementById('phoneNumber');
         const phoneNumberIcon = document.getElementById('phoneNumber-icon');
         phoneNumberIcon.style.color ='#d9d9d9';
         phoneNumberInput.addEventListener('focus', () => {
           phoneNumberIcon.style.color = '#4A8292';
         });
       
         phoneNumberInput.addEventListener('blur', () => {
           phoneNumberIcon.style.color = '#d9d9d9';});
           // Open the popup




  //category selected 



  function showFields() {

    var category = document.getElementById("category").value;
  
    // Hide all fields first
   const bookInputs=document.querySelectorAll(".book-field");
   const movieInputs =document.querySelectorAll(".movie-field");
   const cosplaysInputs =document.querySelectorAll(".cosplays-field");
   const voiceInputs =document.querySelectorAll(".voice-field");
   


   bookInputs.forEach(input => {
    input.style.display="none";
    });

    movieInputs.forEach(input => {
      input.style.display="none";
    });

    cosplaysInputs.forEach(input => {
      input.style.display="none";
    });

    voiceInputs.forEach(input => {
      input.style.display="none";
    });
  
    // Show fields for selected category
    if (category == "Books") {
      bookInputs.forEach(input => {
        input.style.display="block";
      });
      console.log("books");
    } else if (category == "Movies") {
      movieInputs.forEach(input => {
        input.style.display="block";
      });
      console.log("movies");
    } else if (category == "Cosplays") {
      cosplaysInputs.forEach(input => {
        input.style.display="block";
      });
      console.log("cosplays");
    }
   else if (category == "Voice Over") {
    voiceInputs.forEach(input => {
      input.style.display="block";
    });
   }  
  }
  
   
  


  