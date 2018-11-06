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