//client_id: '87351024214-6uo99d69pt45k5vb396ablsqag059g8k.apps.googleusercontent.com',

function onSignIn(googleUser) {

	var profile = googleUser.getBasicProfile();
	var email = profile.getEmail();
	var token = googleUser.getAuthResponse().id_token;

	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'php/authenticate.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		console.log('Signed in as: ' + xhr.responseText);
		var auth = xhr.responseText;

		if (auth.trim() == 'MA') {
			window.location.href = 'MA_home.html';
		} else if (auth.trim() == 'OA' || auth.trim() == 'SA') {
			window.location.href = 'home.html';
		} else {		
			signOut();
			alert("User not authorized. Contact UMBC Facilities for access.");
			window.location.href = 'index.html';
		}
	};
	xhr.send('token='+token+'&email='+email); 
}


function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function() {
		console.log('User signed out.');
	});
}

function authenticate() {

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
	if ( document.getElementById("options").style.visibility == "visible" ) {		
		document.getElementById("options").style.visibility = "hidden";
	} else {
		document.getElementById("options").style.visibility = "visible";
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
