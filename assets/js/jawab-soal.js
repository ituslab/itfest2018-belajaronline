var soalData = [];
var inputJawab = [];
var currentIdx = 0;

$('#prev-btn').hide();
$('#submit-btn').hide();


function onResponse(apiResp){
    var data = apiResp.data;
    soalData = data;
    loadIntoDom(soalData[0]);
}


$('.soal-radio').click(function(){
    console.log(currentIdx , $(this).attr('value'));

    inputJawab.push({
        'siswa_soalid':soalData[currentIdx].soal_id,
        'matkul_id':soalData[currentIdx].matkul_id,
        'siswa_jawaban':$(this).attr('value')
    });
});

function loadIntoDom(currentSoal){
    $('#soal-no-container').html('Soal no ' +currentSoal.soal_no);
    $('#soal-text-container').html(currentSoal.soal_text);

    var currentInputJawab = inputJawab[currentIdx];

    if(currentInputJawab) {
        console.log(currentInputJawab);
        $('input[name=soal-radio][value=' + currentInputJawab.siswa_jawaban + ']').prop('checked',true);
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
