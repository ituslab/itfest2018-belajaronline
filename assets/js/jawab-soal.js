var soalData = [];
var inputJawab = [];
var currentIdx = 0;

$('#prev-btn').hide();
$('#submit-btn').hide();


function onResponse(apiResp){
    var data = apiResp.data;
    soalData = data;
    soalData.forEach(function(s){
        inputJawab.push({
            'siswa_soalid':s.soal_id,
            'matkul_id':s.matkul_id,
            'siswa_jawaban':null
        });
    });
    loadIntoDom(soalData[0]);
}


$('.soal-radio').click(function(){
    inputJawab[currentIdx].siswa_jawaban = $(this).attr('value');
});

function loadIntoDom(currentSoal){
    $('#soal-no-container').html('Soal no ' +currentSoal.soal_no);
    $('#soal-text-container').html(currentSoal.soal_text);

    var currentInputJawab = inputJawab[currentIdx].siswa_jawaban;

    if(currentInputJawab) {
        $('input[name=soal-radio][value=' + currentInputJawab + ']').prop('checked',true);
    } else {
        $('input[name=soal-radio]').prop('checked',false);
    }
}

$('#next-btn').click(function(){
    ++currentIdx;
    loadIntoDom(soalData[currentIdx]);
    if(currentIdx === soalData.length -1 ) {
        $('#submit-btn').show();
        $(this).hide();
        return;
    }

    if(currentIdx >=1 && currentIdx < soalData.length - 1 ){
        $('#prev-btn').show();
    }
});

$('#submit-btn').click(function(){
    console.log(inputJawab);
});

$('#prev-btn').click(function(){
    --currentIdx;
    loadIntoDom(soalData[currentIdx]);

    if(currentIdx === 0) {
        $(this).hide();
        return;
    }

    if(currentIdx >= 1 && currentIdx < soalData.length - 1) {
        $('#submit-btn').hide();
        $('#next-btn').show();
    }
});




function loadSoal(){
    $.get('/it-a/api/jawab-soal/'+'M_001',onResponse);
}

loadSoal();
