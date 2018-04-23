//client_id: '87351024214-6uo99d69pt45k5vb396ablsqag059g8k.apps.googleusercontent.com',

function authenticate(googleUser) {
	
	console.log(googleUser);

	//console.log("authenticate");
	var profile = googleUser.getBasicProfile();

	console.log(profile);

	var email = profile.getEmail();
	var token = googleUser.getAuthResponse().id_token;
	//console.log(token);

	var auth;

	$.ajax({
		url:'php/authenticate.php',
		type:'POST',
		async: false,
		data: {
			email:email,
			token:token
		},
		success: function(data) { 
			//alert("completed"); 
			//console.log(data);
			auth = data;
			//console.log(auth);
		}
	});

	return auth;
}

function onSignIn(googleUser) {

	var auth = authenticate(googleUser);
	
	//console.log(auth);
	
	if (auth.trim() != 'invalid') {
	    
	    if (auth.trim() == "MA") {
		location.assign('MA_home.html');
	    } else {
		location.assign('home.html');
	    }
	    
	} else {
	    alert("User not authorizied. Contact Facilities for access.");
	    
	}
	 
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
