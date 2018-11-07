//daftar
 var initialSelectValue = $("#daftar-sebagai").prop("value");



$("#user-id-label").html("NIM " +initialSelectValue);


$('#daftar-sebagai').change(function(){
    var selectValue = $(this).prop("value");
    var prefix = "NIM";
    if(selectValue   ===  "Pengajar") {
        prefix = "NIP";
    }
    var finalValue = prefix + " " + selectValue;
    
    $('#user-id-label').html(finalValue);
});

//// smooth scroll
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