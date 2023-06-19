const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

function navigateToPHPFunction() {
	console.log("we are here now!");
	var username = document.getElementById("username").value;
	console.log(username);
    fetch('./now-ui-dashboard-master/examples/dashboard.php', {
        method: 'POST',
        body: JSON.stringify({param1: username}),
		headers : { 
			'Content-Type': 'application/json',
			'Accept': 'application/json'
		   }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    });
}