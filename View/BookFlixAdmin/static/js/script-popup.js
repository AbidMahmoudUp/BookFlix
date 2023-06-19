		const openButton = document.getElementById('open-popup');
		const closeButton = document.getElementById('close-popup');
		const popupContainer = document.getElementById('popup-container');
		const popupOverlay = document.getElementById('popup-overlay');

		openButton.addEventListener('click', () => {
		popupContainer.style.display = 'block';
		popupOverlay.style.display = 'block';
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
        const openButtonElseWhere = document.getElementById('open-popup-ElseWhere');
		const closeButtonElseWhere = document.getElementById('close-popup-ElseWhere');
		const popupContainerElseWhere = document.getElementById('popup-container-ElseWhere');
		const popupOverlayElseWhere = document.getElementById('popup-overlay-ElseWhere');

		openButtonElseWhere.addEventListener('click', () => {
		popupContainerElseWhere.style.display = 'block';
		popupOverlayElseWhere.style.display = 'block';
		});

		closeButtonElseWhere.addEventListener('click', () => {
		popupContainerElseWhere.style.display = 'none';
		popupOverlayElseWhere.style.display = 'none';
		});
		//--------------------------------Animation while writting-------------------------------------
		//--------------------------------About--------------------------------------------------------
		//--------------------------------address------------------------------------------------------
		const addressInput = document.getElementById('address');
		const addressIcon = document.getElementById('address-icon');
		 addressIcon.style.color ='#d9d9d9';
		addressInput.addEventListener('focus', () => {
		  addressIcon.style.color = '#4A8292';
		});
	  
		addressInput.addEventListener('blur', () => {
		  addressIcon.style.color = '#d9d9d9';});
		//-------------------------------Work-----------------------------------------------------------
		const workInput = document.getElementById('work');
		const workIcon = document.getElementById('work-icon');
		 workIcon.style.color ='#d9d9d9';
		workInput.addEventListener('focus', () => {
		  workIcon.style.color = '#4A8292';
		});
	  
		workInput.addEventListener('blur', () => {
		  workIcon.style.color = '#d9d9d9';});
		  //--------------------------------------Country-----------------------------------------------
		  const countryInput = document.getElementById('country');
		  const countryIcon = document.getElementById('country-icon');
		   countryIcon.style.color ='#d9d9d9';
		  countryInput.addEventListener('focus', () => {
			countryIcon.style.color = '#4A8292';
		  });
		
		  countryInput.addEventListener('blur', () => {
			countryIcon.style.color = '#d9d9d9';});