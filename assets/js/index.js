
function onLoginClick(){
  $('.modal').modal('open');
}


$('#form-login').validate({
  rules:{
    username:'required',
    password:{
      required:true,
      minlength:6
    }
  },
  errorPlacement:function(error,element){
    var errorText = $(error).html();
    var inputElName = $(element).attr('name');
    var errorIdElement = "#error_"+inputElName;
    
    $(errorIdElement).html(errorText);

  },
  success:function(label,validElement){},
  messages:{
    username:'Username tidak boleh kosong',
    password:{
      required:'Password tidak boleh kosong',
      minlength:'Password minimal 6 karakter'
    }
  }
});


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


