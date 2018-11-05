document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.fixed-action-btn');
		var instances = M.FloatingActionButton.init(elems, {
		direction: 'top',
		hoverEnabled: false
	});
});

$(document).ready(function(){
	$('.sidenav').sidenav();
})

$(document).ready(function(){
	$('.parallax').parallax();
});