function authenticate(googleUser) {
	
	//console.log("authenticate");
	var profile = googleUser.getBasicProfile();
	var email = profile.getEmail();
	var token = googleUser.getAuthResponse().id_token;
	//console.log(token);

	var auth = "false";

	$.ajax({
		url:'php/authenticate.php',
		type:'POST',
		data: {
			email:email,
			token:token
		},
		success: function(data) { 
			//alert("completed"); 
			//console.log(data);
			auth = data;
		}
	});

	console.log(auth);
}
function onSignIn(googleUser) {

	//console.log("signIn func");

	var profile = googleUser.getBasicProfile();
 	//console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
	//console.log('Name: ' + profile.getName());
	//console.log('Image URL: ' + profile.getImageUrl());
	//console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
	
	authenticate(googleUser);
}
function viewAccount() {
	window.location.href='view_account.html';
}
function logout() {
	window.location.href='index.html';
}
function home() {
	window.location.href = 'home.html';
}
function uploadWO() {
	toggleUpload();
}
function toggleOverlay() {
	if ( document.getElementById("overlay").style.display == "block" ) {
		document.getElementById("overlay").style.display = "none";
	} else {
		
		document.getElementById("overlay").style.display = "block";
	}
}
function toggleUpload() {
	toggleOverlay();
	if ( document.getElementById("uploadForm").style.display == "block" ) {
		document.getElementById("uploadForm").style.display = "none";
	} else {
		
		document.getElementById("uploadForm").style.display = "block";
	}
}
function toggleSearch() {
	toggleOverlay();
	if ( document.getElementById("searchForm").style.display == "block" ) {
		document.getElementById("searchForm").style.display = "none";
	} else {
		
		document.getElementById("searchForm").style.display = "block";
	}
}
function toggleMenu() {
	
	console.log("clicked");
	
	if ( document.getElementById("options").style.visibility == "hidden" ) {		
		document.getElementById("options").style.visibility = "visible";

	} else {
		document.getElementById("options").style.visibility = "hidden";
	}
}
function togglePassword() {
	toggleOverlay();
	if ( document.getElementById("changePassword").style.display == "block" ) {
		document.getElementById("changePassword").style.display = "none";
	} else {				
		document.getElementById("changePassword").style.display = "block";
	}
} 
