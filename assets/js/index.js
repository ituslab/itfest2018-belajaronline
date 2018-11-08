$(document).ready(function(){
  $('.sidenav').sidenav();
  $('select').formSelect();
  $('.parallax').parallax();
  $('.modal').modal();
  $('.fixed-action-btn').floatingActionButton();
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

var modal = document.getElementById('id01');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

