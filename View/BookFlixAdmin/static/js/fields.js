
const Img1=document.querySelectorAll(".img1-field");
const Img2 =document.querySelectorAll(".img2-field");
const Img3 =document.querySelectorAll(".img3-field");
const Img4 =document.querySelectorAll(".img4-field");
Img1.forEach(input => {
    input.style.display="block";
    });
  
    Img2.forEach(input => {
    input.style.display="none";
    });
       
    Img3.forEach(input => {
    input.style.display="none";
    });
  
    Img4.forEach(input => {
    input.style.display="none";
    });

function showFields2() {
    var photosnumber = document.getElementById("photosnumber").value;
    console.log(photosnumber);

    switch(photosnumber){
      case "1":           
      Img1.forEach(input => {
         input.style.display="block";
         });
       
         Img2.forEach(input => {
         input.style.display="none";
         });
            
         Img3.forEach(input => {
         input.style.display="none";
         });
       
         Img4.forEach(input => {
         input.style.display="none";
         });
      break;
      case "2":
           
      Img1.forEach(input => {
        input.style.display="block";
        });
      
        Img2.forEach(input => {
        input.style.display="block";
        });
           
        Img3.forEach(input => {
        input.style.display="none";
        });
      
        Img4.forEach(input => {
        input.style.display="none";
        });
      break;
      case "3":
           
      Img1.forEach(input => {
        input.style.display="block";
        });
      
        Img2.forEach(input => {
        input.style.display="block";
        });
           
        Img3.forEach(input => {
        input.style.display="block";
        });
      
        Img4.forEach(input => {
        input.style.display="none";
        });
      break;
      case "4":
           
      Img1.forEach(input => {
        input.style.display="block";
        });
      
        Img2.forEach(input => {
        input.style.display="block";
        });
           
        Img3.forEach(input => {
        input.style.display="block";
        });
      
        Img4.forEach(input => {
        input.style.display="block";
        });
      break;
      default:
        // handle invalid type
        break;
    }
}   