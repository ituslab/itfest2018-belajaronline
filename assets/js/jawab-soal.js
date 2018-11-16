document.addEventListener('DOMContentLoaded',function(){
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
        dismissible:false
    });
});




$('#soal-prev-btn').hide();
$('#soal-submit-btn').hide();


var freshSoalArr = [];
var inputSoalJawab = [];
var currentIdx = 0;

function processEssay(essays){
    essays.forEach(function(e){
        var eSoalId = e.soal_id;
        var eSoalNo = e.soal_no;
        var eSoalText = e.soal_text;
        var eMatkulId = e.matkul_id;
        var eSesiId = e.sesi_id;

        freshSoalArr.push({
            soal_id:eSoalId,
            soal_no:eSoalNo,
            soal_text:eSoalText
        });

        inputSoalJawab.push({
            soal_id:eSoalId,
            matkul_id:eMatkulId,
            sesi_id:eSesiId,
            soal_no:eSoalNo,
            jawab_text:null
        });
    });
    loadEssayIntoDom(freshSoalArr[currentIdx]);
}

function loadEssayIntoDom(currentSoal) {
    $('#soal-no-el').text('Soal no ' +currentSoal.soal_no);
    $('#soal-pertanyaan-el').text(currentSoal.soal_text);

    var currentJawabText = inputSoalJawab[currentIdx].jawab_text;

    if(currentJawabText) {
        $('#jawab-text').val(currentJawabText);
    } else {
        $('#jawab-text').val('');
    }
}


$('#jawab-text').on('input',function(){
    var thisVal = $(this).val().toString().trim();

    if(thisVal) {
        inputSoalJawab[currentIdx].jawab_text = thisVal;
    } else {
        inputSoalJawab[currentIdx].jawab_text = null;
    }
});


function processSoal(soals){
    var onlySoalId =
        soals.map(function(v){return v.soal_id;});
    var onlySoalNo = 
        soals.map(function(v){return v.soal_no;});
    var onlySoalText =
        soals.map(function(v){return v.soal_text; });
    var onlySoalOpsiAndSoalOpsiTextAndSoalNo =
        soals.map(function(v){
            return {
                soal_no:v.soal_no,
                soal_opsi:v.soal_opsi,
                soal_opsi_text:v.soal_opsi_text
            }
        });
    
    
    var uniqueSoalId = _.uniq(onlySoalId);
    var uniqueSoalNo = _.uniq(onlySoalNo);
    var uniqueSoalText = _.uniq(onlySoalText);

    for(var i =0; i<uniqueSoalNo.length; i++){
        var currSoalNo = uniqueSoalNo[i];
        
        var fWhere = _.where(onlySoalOpsiAndSoalOpsiTextAndSoalNo , {
            soal_no:currSoalNo
        });

        var fWhereMap = fWhere.map(function(v){
            return {
                soal_opsi:v.soal_opsi,
                soal_opsi_text:v.soal_opsi_text
            }
        });

        freshSoalArr.push({
            soal_id:uniqueSoalId[i],
            soal_no:currSoalNo,
            soal_pertanyaan:uniqueSoalText[i],
            soal_opsis:fWhereMap
        });

        inputSoalJawab.push({
            siswa_soalid:uniqueSoalId[i],
            siswa_jawaban:null
        });
    }
    loadIntoDom(freshSoalArr[currentIdx]);
}

function loadIntoDom(currentSoal){
    var pertanyaan = currentSoal.soal_pertanyaan;
    var soalNo = currentSoal.soal_no;
    var soalId = currentSoal.soal_id;

    var soalOpsiTextA = currentSoal.soal_opsis[0].soal_opsi_text;
    var soalOpsiTextB = currentSoal.soal_opsis[1].soal_opsi_text;
    var soalOpsiTextC = currentSoal.soal_opsis[2].soal_opsi_text;
    var soalOpsiTextD = currentSoal.soal_opsis[3].soal_opsi_text;
    var soalOpsiTextE = currentSoal.soal_opsis[4].soal_opsi_text;

    $('#soal-pertanyaan-el').text(pertanyaan);
    $('#soal-no-el').text('Soal no. ' +soalNo);

    $('#soal_opsi_text_A').text('A. ' +soalOpsiTextA);
    $('#soal_opsi_text_B').text('B. ' +soalOpsiTextB);
    $('#soal_opsi_text_C').text('C. ' +soalOpsiTextC);
    $('#soal_opsi_text_D').text('D. ' +soalOpsiTextD);
    $('#soal_opsi_text_E').text('E. ' +soalOpsiTextE);

    var currentJawabChecked = inputSoalJawab[currentIdx].siswa_jawaban;

    if(currentJawabChecked) {
        $("input[name=soal_opsi][value=" + currentJawabChecked + "]").prop('checked', true);
    } else {
        $('input[name=soal_opsi]').prop('checked',false);
    }

}

$('input[name=soal_opsi]').change(function(){
    var checkedOpsi = $(this).val();
    inputSoalJawab[currentIdx].siswa_jawaban = checkedOpsi;
});

$('#soal-submit-btn').click(function(){
    var splitted = window.location.pathname.split('/');
    var sesiIdParam = splitted[splitted.length - 2];
    var tipeSoalParam = splitted[splitted.length - 1];


    var currentModal = M.Modal.getInstance(document.querySelector('.modal'));
    currentModal.open();

    $.post('/it-a/api/jawab-soal',
        JSON.stringify({
            soal_jawab:inputSoalJawab,
            sesi_id:sesiIdParam,
            tipe_soal:tipeSoalParam
        }),
        function(apiResponse,statusText,xhr){
            currentModal.close();
            
            if(statusText === 'success') {
                window.location.href = '/it-a/dashboard/finish';
            }
        }
    );
});

$('#soal-next-btn').click(function(){
    var splitted = window.location.pathname.split('/');
    var tipeSoalParam = splitted[splitted.length - 1];



    ++currentIdx;

    if(tipeSoalParam === 'pilgan') {
        loadIntoDom(freshSoalArr[currentIdx]);
    } else {
        loadEssayIntoDom(freshSoalArr[currentIdx]);
    }


    if(currentIdx === freshSoalArr.length - 1) {
        $('#soal-submit-btn').show();
        $('#soal-prev-btn').show();

        $(this).hide();
        return;
    }

    if(currentIdx >= 1 && currentIdx < freshSoalArr.length - 1 ) {
        $('#soal-prev-btn').show();
    }
});

$('#soal-prev-btn').click(function(){
    var splitted = window.location.pathname.split('/');
    var tipeSoalParam = splitted[splitted.length - 1];
    --currentIdx;

    if(tipeSoalParam === 'pilgan') {
        loadIntoDom(freshSoalArr[currentIdx]);
    } else {
        loadEssayIntoDom(freshSoalArr[currentIdx]);
    }

   if(currentIdx === 0) {
       $('#soal-next-btn').show();
       $('#soal-submit-btn').hide();
       $(this).hide();
       return;
   }

   if(currentIdx >=1 && currentIdx < freshSoalArr.length - 1){
       $('#soal-submit-btn').hide();
       $('#soal-next-btn').show();
   }
});

function fetchSoal(){
    var splitted = window.location.pathname.split('/');
    var sesiIdParam = splitted[splitted.length - 2];
    var tipeSoalParam = splitted[splitted.length - 1];

        $.get("/it-a/api/jawab-soal/"+sesiIdParam+"/"+tipeSoalParam,
        function(apiResponse,statusText,xhr){
            if(statusText === 'success') {
                if(tipeSoalParam === 'pilgan') {
                    processSoal(apiResponse.data);
                } else {
                    processEssay(apiResponse.data);
                }
            }else{
                console.log('gagal load soal dari server');
            }
        });
}

fetchSoal();
