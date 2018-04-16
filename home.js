function viewAccount() {
	window.location.href='view_account.html';
}
function logout() {
	window.location.href='index.html';
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
/*function allowDrop(ev){
	ev.preventDefault();
}
function drag(ev){
	ev.dataTransfer.setData("text", ev.target.id);
}
function drop(ev){
	ev.preventDefault();
	var data = ev.dataTransfer.getData("text");
	ev.target.appendChild(document.getElementById(data));
}*/

