$("#tambah-matkul-form").validate({
    rules:{
        matkul_nama:'required'
    },
    messages:{
        matkul_nama:'Nama matakuliah tidak boleh kosong'
    },
    success:function(label,validElement){},
    errorPlacement:function(error,element){
        var errorText = $(error).html();
        var inputElName = $(element).attr('name');
        var errorIdElement = "#error_"+inputElName;
    
        $(errorIdElement).html(errorText);
    },
    submitHandler:function(form){
        var matkulNamaVal = $('#matkul_nama').val();

        $.post('/it-a/api/buat-matkul'
        ,JSON.stringify({
            matkul_nama:matkulNamaVal
        })
        ,function(apiResponse, txtStatus , jqXhr){
            if(txtStatus === 'success') {
                alert(apiResponse.data);
                $('#matkul_nama').val('');    
            }
        });
    }
});