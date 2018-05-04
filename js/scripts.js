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

		console.log("auth "+auth);

		if (auth.trim() != "invalid") {

			document.getElementById("loginContainer").style.display = "none";
			document.getElementById("homeContainer").style.display = "initial";		

			if (auth.trim() == 'OA' || auth.trim() == 'SA') {
					
				console.log("elevated permission");

				document.getElementById("uploadButton").style.display = "block";		
	
				document.getElementById("cat_search").style.display = "table-row";		
				document.getElementById("ma_search").style.display = "table-row";	
				//document.getElementById("_column").style.display = "block";

				if (auth.trim() == 'SA') {
					document.getElementById("_accounts").style.display = "table-row";
				}
			}

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
		document.getElementById("homeContainer").style.display = "none";
		document.getElementById("loginContainer").style.display = "initial";
		
		document.getElementById("options").style.visibility = "hidden";

		// hide elevated permission 
		document.getElementById("uploadButton").style.display = "none";
		document.getElementById("_accounts").style.display = "none";
		document.getElementById("cat_search").style.display = "none";		
		document.getElementById("ma_search").style.display = "none";		
		//document.getElementById("_column").style.display = "none";

	});
}

function uploadWO() {
	
	var pdf = document.getElementById("pdf_wo").files[0];
	var id = document.getElementById("wo_id").value;
	
	console.log(pdf);

	var pdfPath = document.getElementById("pdf_wo").value;

	// verify pdf selection 
	var ext = pdfPath.substring(pdfPath.lastIndexOf('.')+1);
	if (ext != "pdf") {
		alert("File type not supported.");
	} else { 		
	
		if (id == 0) {
			alert("Not a valid WO id number.");
		} else {
		        var data = new FormData();
			data.append('pdf_wo', pdf);
			//data.append('wo_id', id);
			console.log(data);

			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'php/upload_wo.php');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				var auth = xhr.responseText;
				console.log(auth);

				// reload unassigned iframe
				document.getElementById("openFrame").contentWindow.location.reload();
				toggle("uploadButton");
				//document.getElementById("pdf_wo").value = "";
				//document.getElementById("wo_id").value = "";
			}
			console.log(pdf);
			xhr.send('pdf_wo='+data+'&wo_id='+id); 
			//xhr.send(data);
		}
	}
}

function display() {
    var auth2 = gapi.auth2.getAuthInstance();
    var user = auth2.currentUser.get().email;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/display_unassigned.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
	var auth = xhr.responseText;
    }
 
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/display_assigned.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
	var auth = xhr.responseText;
    }
    xhr.send('user='+user);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/display_submitted.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
	var auth = xhr.responseText;
    }
    xhr.send('user='+user);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/display_approved.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
	var auth = xhr.responseText;
    }
    xhr.send('user='+user);
}

function toggle(element) {

	var id = "options";
	var className = document.getElementById(element).className;

	// upload button click
	if (element == "uploadButton" || element == "exitUpload") {
		id = "uploadForm";

		document.getElementById("pdf_wo").value = "";
		document.getElementById("wo_id").value = "";

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
		
	// pdf preview
	} else if (className == "workOrder" || element == "exitPreview") { 
		id = "previewForm";	

	// menu icon click
	} else if (element == "menuToggle") {
		toggleMenu();
	}

	//console.log("Element: "+element);
	//console.log("Id: "+id);

	// toggle selected form and overlay 
	if (id != "options") {		
		if ( document.getElementById(id).style.display == "block" ) {
			document.getElementById(id).style.display = "none";
			document.getElementById("overlay").style.display = "none";			
		} else {

			if (id == "previewForm") {
				showPreview(element);
			}

			document.getElementById(id).style.display = "block";
			document.getElementById("overlay").style.display = "block";
		}
	}
}

function addUser() {

	var email = document.getElementById("newUserEmail").value;
	var accountType = document.getElementById("newUserAccount").value;

	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'php/add_user.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
		    var auth = xhr.responseText;
		    console.log(auth);
		}
	xhr.send('user_email'+email+'&acct_type'+accountType); 
}

function showPreview(element) {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'php/get_pdf.php');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
		    var auth = xhr.responseText;
		    console.log(auth);
		    var pdf = JSON.parse(auth);
		    console.log(pdf);
		}
	xhr.send('order_id='+element); 

}

// menu uses visibility instead of display for style reasons 
function toggleMenu() {  
	
	if ( document.getElementById("options").style.visibility == "visible" ) {
		document.getElementById("options").style.visibility = "hidden";			
	} else {
		document.getElementById("options").style.visibility = "visible";
	}
}
