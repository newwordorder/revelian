// Open the full screen search box

jQuery('.search-open a').click(function() {
	document.getElementById('myOverlay').style.display = 'block';
	document.getElementById('s').focus();
});

function openSearch() {
	document.getElementById('myOverlay').style.display = 'block';
	document.getElementById('s').focus();
}

// Close the full screen search box
function closeSearch() {
	document.getElementById('myOverlay').style.display = 'none';
}
