//daftar
 var initialSelectValue = $("#daftar-sebagai").prop("value");



$("#user-id-label").html("NIM " +initialSelectValue);


$("#form-daftar").validate({
  rules:{
    nama:{
      required:true
    },
    user_id:{
      required:true
    },
    user_password:{
      required:true,
      minlength: 6
    },
    no_hp:{
      required:true,
      digits:true
    },
    email:{
      required: true,
      email: true
    },
    alamat: {
      required: true
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
    nama:"Nama tidak boleh kosong",
    user_id: "User id anda tidak boleh kosong",
    user_password:{
      required:"Password tidak boleh kosong",
      minlength:"Password minimal 6 karakter"
    },
    no_hp:{
      required:"No hp tidak boleh kosong",
      digits:"Hanya angka yang diperbolehkan"
    },
    email:{
      required: 'Email tidak boleh kosong',
      email: 'Format email tidak cocok'
    },
    alamat: {
      required: 'Alamat tidak boleh kosong'
    }
  }
});

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
