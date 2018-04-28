//client_id: '87351024214-6uo99d69pt45k5vb396ablsqag059g8k.apps.googleusercontent.com',

function onSignIn(googleUser) {

	var profile = googleUser.getBasicProfile();
	var email = profile.getEmail();
	var token = googleUser.getAuthResponse().id_token;

	// ajax request to send account information to authenticate.php script
	// authenticate.php will verify if the user's email is in the users table
	// if yes, their token will be added if not already present
	//	and their account type is returned
	// if no, they are not given access to the site
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'php/authenticate.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		var auth = xhr.responseText;

		if (auth.trim() == 'MA') {
			
			// "redirect" to MA_home 
			document.getElementById("mainFrame").src = "MA_home.html";
			
			// hide login button and show menu
			document.getElementById("loginButton").style.display = "none";
			document.getElementById("menu").style.display = "flex";		

		} else if (auth.trim() == 'OA' || auth.trim() == 'SA') {
			
			// "redirect" to home
			document.getElementById("mainFrame").src = "home.html";
			
			// hide login button and show menu and upload buttons
			document.getElementById("loginButton").style.display = "none";
			document.getElementById("menu").style.display = "flex";
			document.getElementById("uploadButton").style.display = "block";		

			document.getElementById("cat_search").style.display = "table-row";		
			document.getElementById("ma_search").style.display = "table-row";	

			//if (auth.trim() == 'SA') {
				document.getElementById("_accounts").style.display = "table-row";
			//}

		} else {		
			
			// sign user out of google 
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function() { });

			alert("User not authorized. Contact UMBC Facilities for access.");
		}
	};
	xhr.send('token='+token+'&email='+email); 
}

function signOut() {
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function() {
		
		// "redirects" to login page 
		document.getElementById("mainFrame").src = "index.html";
		
		// enable the login button 
		document.getElementById("loginButton").style.display = "block";
		
		// hide buttons and menus 
		document.getElementById("menu").style.display = "none";
		document.getElementById("options").style.visibility = "hidden";
		document.getElementById("uploadButton").style.display = "none";
		document.getElementById("_accounts").style.display = "none";

		document.getElementById("cat_search").style.display = "none";		
		document.getElementById("ma_search").style.display = "none";		

	});
}

function toggle(element) {

	var id = "options";

	// upload button click
	if (element == "uploadButton" || element == "exitUpload") {
		id = "uploadForm";
	// search menu option selected
	} else if (element == "searchButton" || element == "exitSearch") {
		id = "searchForm";
		
		// close menu when overlay pops up
		if (element == "searchButton") {
			toggleMenu();
		}
		
	// accounts menu option selected
	} else if (element == "accountsButton" || element == "exitAccounts") {
		id = "accountsForm";
		
		// close menu when overlay pops up
		if (element == "accountsButton") {
			toggleMenu();
		}
		
	// menu icon click
	} else if (element == "menuToggle") {
		toggleMenu();
	}

	// toggle selected form and overlay 
	if (id != "options") {		
		if ( document.getElementById(id).style.display == "block" ) {
			document.getElementById(id).style.display = "none";
			document.getElementById("overlay").style.display = "none";			
		} else {
			document.getElementById(id).style.display = "block";
			document.getElementById("overlay").style.display = "block";
		}
	}
}

// menu uses visibility instead of display for style reasons 
function toggleMenu() {  
	
	if ( document.getElementById("options").style.visibility == "visible" ) {
		document.getElementById("options").style.visibility = "hidden";			
	} else {
		document.getElementById("options").style.visibility = "visible";
	}
}
