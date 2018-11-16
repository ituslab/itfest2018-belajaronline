function onSubmitReview(){
    var submitEssay = [];

    $('.my-custom-card').each(function(i,el){
        var soalId = $(el).data('soal_id');
        var matkulId = $(el).data('matkul_id');
        var sesiId = $(el).data('sesi_id');
        var siswaId = $(el).data('siswa_id');

        var mySoalNoEl = $(el).find('.my-soal-no');
        var checkBoxEl = $(el).find('.filled-in');
        var isChecked = checkBoxEl.prop('checked');
        
        var dataInput = {
            siswa_id:siswaId,
            matkul_id:matkulId,
            sesi_id:sesiId,
            soal_id: soalId,
            soal_no:mySoalNoEl.text(),
            pernyataan: 'SALAH'
        };

        if(isChecked) {
            dataInput.pernyataan = 'BENAR';
        }
        submitEssay.push(dataInput);
    });

    $.post('/it-a/api/submit-essay',
    JSON.stringify(submitEssay)
    ,function(apiResp,textStatus ,xhr){
        console.log(apiResp);
    });
}