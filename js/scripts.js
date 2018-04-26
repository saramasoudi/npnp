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
			document.getElementById("mainFrame").src = "MA_home.html";
			document.getElementById("loginButton").style.display = "none";

			document.getElementById("menu").style.display = "flex";		

		} else if (auth.trim() == 'OA' || auth.trim() == 'SA') {
			document.getElementById("mainFrame").src = "home.html";
			document.getElementById("loginButton").style.display = "none";

			document.getElementById("menu").style.display = "flex";
			document.getElementById("uploadButton").style.display = "block";		

		} else {		
			
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function() {
				console.log('User signed out.');
			});

			alert("User not authorized. Contact UMBC Facilities for access.");
		}
	};
	xhr.send('token='+token+'&email='+email); 
}

function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function() {
		document.getElementById("mainFrame").src = "index.html";
		document.getElementById("loginButton").style.display = "block";
		document.getElementById("menu").style.display = "none";
		document.getElementById("options").style.visibility = "hidden";
		document.getElementById("uploadButton").style.display = "none";
	});
}

function toggle(element) {

	var id;
	var _id;

	if (element == "uploadButton" || element == "exitUpload") {
		id = "uploadForm";
	} else if (element == "searchButton" || element == "exitSearch") {
		id = "searchForm";
		
		// close menu when search overlay pops up
		if (element == "searchButton") {
			_id = "options";
		}

	} else if (element == "menuToggle") {
		id = "options";
	}  

	if (id == "options") {
		toggleMenu();		
	} else { 
	
		if ( document.getElementById(id).style.display == "block" ) {
			document.getElementById(id).style.display = "none";
			document.getElementById("overlay").style.display = "none";			
		} else {
			document.getElementById(id).style.display = "block";
			document.getElementById("overlay").style.display = "block";
		}

		if (_id == "options") {
			toggleMenu();
		}
	}
}

function toggleMenu() {  

	if ( document.getElementById("options").style.visibility == "visible" ) {
		document.getElementById("options").style.visibility = "hidden";			
	} else {
		document.getElementById("options").style.visibility = "visible";
	}
}
