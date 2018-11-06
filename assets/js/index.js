// button share
document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.fixed-action-btn');
		var instances = M.FloatingActionButton.init(elems, {
		direction: 'top',
		hoverEnabled: false
	});
});

// sidenav
$(document).ready(function(){
	$('.sidenav').sidenav();
})

// parallax
$(document).ready(function(){
	$('.parallax').parallax();
});

// modal
$(document).ready(function(){
	$('.modal').modal();
});

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// smooth scroll
$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
        window.location.hash = hash;
      });
    } 
  });
});