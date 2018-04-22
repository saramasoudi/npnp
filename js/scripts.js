function viewAccount() {
	window.location.href='view_account.html';
}
function logout() {
	window.location.href='index.html';
}
function home() {
	window.location.href = 'home.html';
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

