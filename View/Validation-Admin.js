
function verif() {
  var email = document.forms["userForm"]["email-form"].value;
  var password = document.getElementById("password-form").value;
  var firstName = document.forms["userForm"]["username"].value;
  var phone = document.forms["userForm"]["phone-form"].value;

  var letters = /^[A-Za-z]+$/;

  if (firstName == "") {
    var UsernameInput = document.getElementById("username");
    UsernameInput.style.border = "1px solid red ";
    UsernameInput.style.borderRadius = "9px";
    msg = "<p style='color:red; font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>Enter your Username!</p>";
    document.getElementById("username-msg").innerHTML = msg;
    return false;
  } else if (!(firstName.match(letters) && firstName.charAt(0).match(/^[A-Z]+$/))) {
    var UsernameInput = document.getElementById("username");
    UsernameInput.style.border = "1px solid red ";
    UsernameInput.style.borderRadius = "9px";
    msg = "<p style='color:red;font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>This Username is not Valid!</p>";
    document.getElementById("username-msg").innerHTML = msg;
    return false
  }else{
    var UsernameInput = document.getElementById("username");
    UsernameInput.style.border = "1px solid green ";
    UsernameInput.style.borderRadius = "9px";
    msg = "<p style='color:green;font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>This Username is valid!</p>";
    document.getElementById("username-msg").innerHTML = msg;
  }

  

  if (email == "") {
    var emailInput = document.getElementById("email-form");
    emailInput.style.border = "1px solid red ";
    emailInput.style.borderRadius = "9px";
    msg = "<p style='color:red;font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>veuillez entrer votre email.</p>";
    document.getElementById("email-msg").innerHTML = msg;
    return false;
  } else if (!email.match('@gmail.com')) {
    var emailInput = document.getElementById("email-form");
    emailInput.style.border = "1px solid red";
    emailInput.style.borderRadius = "9px";
    msg = "<p style='color:red;font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>Verifiez votre email.</p>";
    document.getElementById("email-msg").innerHTML = msg;
    return false;
  }else{
    var emailInput = document.getElementById("email-form");
    emailInput.style.border = "1px solid green";
    emailInput.style.borderRadius = "9px";
    msg = "<p style='color:green;font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>Email valid.</p>";
    document.getElementById("email-msg").innerHTML = msg;
  }

  
  if(password == ""){
    var passwordInput = document.getElementById("password-form");
    passwordInput.style.border = "1px solid red";
    passwordInput.style.borderRadius = "9px";
    msg = "<p style='color:red; font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>veuillez entrer votre mot de passe.</p>";
    document.getElementById("password-msg").innerHTML = msg;
    return false;
  }else if (password.match(/[0-9]/g) &&
    password.match(/[A-Z]/g) &&
    password.match(/[a-z]/g) &&
    password.match(/[^a-zA-Z\d]/g) &&
    password.length >= 10) {
    var passwordInput = document.getElementById("password-form");
    passwordInput.style.border = "1px solid green";
    passwordInput.style.borderRadius = "9px";
    msg = "<p style='color:green font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>Mot de passe fort.</p>";
    document.getElementById("password-msg").innerHTML = msg;
    return true;
  } else {
    var passwordInput = document.getElementById("password-form");
    passwordInput.style.border = "1px solid orange";
    passwordInput.style.borderRadius = "9px";
    var msg = "<p style='color:red; font-size:10px;  margin-top:-10px;margin-bottom:-12px;'>Mot de passe faible.</p>";
    document.getElementById("password-msg").innerHTML = msg;
    
    
  }
  if (phone == "") {
    var nomInput = document.getElementById("phone-form");
    nomInput.style.border = "1px solid red ";
    nomInput.style.borderRadius = "9px";
    msg = "<p style='color:red'>Veuillez entrer votre nom!</p>";
    document.getElementById("phone-msg").innerHTML = msg;
    return false;
  } else if (phone.value.length !=8) {
    var nomInput = document.getElementById("phone-form");
    nomInput.style.border = "1px solid red ";
    nomInput.style.borderRadius = "9px";
    msg = "<p style='color:red'>Phone number must have exactly 8 digits!</p>";
    document.getElementById("phone-msg").innerHTML = msg;
    return false;
  }else{
    var nomInput = document.getElementById("phone-form");
    nomInput.style.border = "1px solid green ";
    nomInput.style.borderRadius = "9px";
    msg = "<p style='color:green'>Phone number is Valid!</p>";
    document.getElementById("phone-msg").innerHTML = msg;
    return false;
  }

}

// Get references to the input fields
var emailInput = document.getElementById("email-form");
var passwordInput = document.getElementById("password-form");
var firstNameInput = document.getElementById("username");
var phoneInput = document.getElementById("phone-form");

// Add event listeners to the input fields
emailInput.addEventListener("blur", function() {
  // Call the verif() function when the user leaves the email field
  verif();
});

passwordInput.addEventListener("blur", function() {
  // Call the verif() function when the user leaves the password field
  verif();
});

firstNameInput.addEventListener("blur", function() {
  // Call the verif() function when the user leaves the first name field
  verif();
});

phoneInput.addEventListener("blur", function() {
  // Call the verif() function when the user leaves the phone field
  verif();
});
