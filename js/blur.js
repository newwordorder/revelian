(function() {
	var svg = document.getElementById('imagesvg');
	var maskCircle;
	var svgX, svgY, maskX, maskY;
	function updateMask(event) {
		var pointerX = event.clientX;
		var pointerY = event.clientY;

		svgX = svg.getBoundingClientRect().left;
		svgY = svg.getBoundingClientRect().top;

		maskX = pointerX - svgX;
		maskY = pointerY - svgY;

		maskCircle.setAttribute('cx', maskX);
		maskCircle.setAttribute('cy', maskY);
	}
	if (svg) {
		maskCircle = document.getElementById('mask-circle');
		svg.addEventListener('mousemove', updateMask);
	}
})();
