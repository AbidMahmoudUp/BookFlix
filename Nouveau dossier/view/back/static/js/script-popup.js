const openButton2 = document.querySelectorAll('.open-more-details');
const popupContainer = document.getElementById('popup-container');
const popupOverlay = document.getElementById('popup-overlay');
const closeButton = document.getElementById('close-popup');

openButton2.forEach(button => {
  button.addEventListener('click', () => {
    popupContainer.style.display = 'block';
    popupOverlay.style.display = 'block';
  });
});

closeButton.addEventListener('click', () => {
  popupContainer.style.display = 'none';
  popupOverlay.style.display = 'none';
});




		closeButton.addEventListener('click', () => {
		popupContainer.style.display = 'none';
		popupOverlay.style.display = 'none';
		});
        //-----------------------------------About PopUp----------------------------------
        const openButtonAbout = document.getElementById('open-popup-About');
		const closeButtonAbout = document.getElementById('close-popup-About');
		const popupContainerAbout = document.getElementById('popup-container-About');
		const popupOverlayAbout = document.getElementById('popup-overlay-About');

		openButtonAbout.addEventListener('click', () => {
		popupContainerAbout.style.display = 'block';
		popupOverlayAbout.style.display = 'block';
		});

		closeButtonAbout.addEventListener('click', () => {
		popupContainerAbout.style.display = 'none';
		popupOverlayAbout.style.display = 'none';
		});
        //-----------------------------------Else Where-------------------------------------------
		const openButtonElseWhere = document.querySelectorAll('.open-popup-ElseWhere');
		const closeButtonElseWhere = document.getElementById('close-popup-ElseWhere');
		const popupContainerElseWhere = document.getElementById('popup-container-ElseWhere');
		const popupOverlayElseWhere = document.getElementById('popup-overlay-ElseWhere');
		
		openButtonElseWhere.forEach(button => {
		  button.addEventListener('click', () => {
			popupContainerElseWhere.style.display = 'block';
			popupOverlayElseWhere.style.display = 'block';
		  });
		});
		
		closeButtonElseWhere.addEventListener('click', () => {
		  popupContainerElseWhere.style.display = 'none';
		  popupOverlayElseWhere.style.display = 'none';
		});
		

		//----------------------------------------------modify---------------------------------

