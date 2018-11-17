var arrSoalInput = [];


$(document).ready(function(){
    $('select').formSelect();
});

document.addEventListener('DOMContentLoaded',function(){
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {
        dismissible:false
    });
});



function createSoalPanel(soalTitleValue,soalNoValue){
    var soalCardPanel = document.createElement('div');
    soalCardPanel.className = 'card-panel';

    // child of soalCardPanel
    var soalTitle = document.createElement('div');
    soalTitle.innerHTML = soalTitleValue +' '+ soalNoValue;
    soalCardPanel.appendChild(soalTitle);


    // child of soalCardPanel
    var rowPertanyaanEl = document.createElement('div');
    rowPertanyaanEl.className = 'row';

    var inputPertanyaanEl = document.createElement('div');
    inputPertanyaanEl.className = 'input-field col s12 m12';

    var inputTextPertanyaanEl = document.createElement('textarea');
    // inputTextPertanyaanEl.setAttribute('type','text');
    inputTextPertanyaanEl.setAttribute('placeholder','');
    inputTextPertanyaanEl.setAttribute('data-soal_no',soalNoValue);
    inputTextPertanyaanEl.className = 'materialize-textarea my-soal-pertanyaan';

    var labelPertanyaanEl = document.createElement('label');
    labelPertanyaanEl.innerHTML = 'Masukkan pertanyaan';


    inputPertanyaanEl.appendChild(inputTextPertanyaanEl);
    inputPertanyaanEl.appendChild(labelPertanyaanEl);
    rowPertanyaanEl.appendChild(inputPertanyaanEl);

    soalCardPanel.appendChild(rowPertanyaanEl);

    (['A','B','C','D','E']).forEach(function(v){
        var rowJawabanEl = document.createElement('div');
        rowJawabanEl.className = 'row';

        // child of rowJawabanEl
        var inputJawabanEl = document.createElement('div');
        inputJawabanEl.className = 'input-field col s2 m2';
        var pJawabanEl = document.createElement('p');
        var labelJawabanEl = document.createElement('label');


        // child of labelJawabanEl
        var inputRadioEl = document.createElement('input');
        inputRadioEl.setAttribute('data-soal_no',soalNoValue);
        inputRadioEl.className = 'with-gap my-radio-soal';
        inputRadioEl.setAttribute('value',v);
        inputRadioEl.setAttribute('type','radio');
        inputRadioEl.setAttribute('name','my-radio-soal-'+soalNoValue);

        // child of labelJawabnEl
        var spanRadioEl = document.createElement('span');
        spanRadioEl.innerHTML = v +'.';

        labelJawabanEl.appendChild(inputRadioEl);
        labelJawabanEl.appendChild(spanRadioEl);




        pJawabanEl.appendChild(labelJawabanEl);
        inputJawabanEl.appendChild(pJawabanEl);
        
        
        var rowMySoalTextEl = document.createElement('div');
        rowMySoalTextEl.className = 'input-field col s10 m10';
        
        var inputMySoalTextEl = document.createElement('input');
        inputMySoalTextEl.setAttribute('type','text');
        inputMySoalTextEl.setAttribute('data-soal_no',soalNoValue);
        inputMySoalTextEl.className = 'my-soal-text';
        
        rowMySoalTextEl.appendChild(inputMySoalTextEl);
        
        rowJawabanEl.appendChild(inputJawabanEl);
        rowJawabanEl.appendChild(rowMySoalTextEl);

        soalCardPanel.appendChild(rowJawabanEl);

    });

    $('#soal-container').append(soalCardPanel);
}


function createOptionMatkulEl(value,innerHTML){
    var newOptionEl = document.createElement('option');
    newOptionEl.value = value;
    newOptionEl.innerHTML = innerHTML;
    $('#matkul-id').append(newOptionEl);
}

function loadListMatkul() {
    $.get('/it-a/api/list-matkul',function(apiResponse,textStatus , xhr){
        if(textStatus === 'success') {
            $('#matkul-id').empty()
            var data = apiResponse.data;
            data.forEach(function(d){
                createOptionMatkulEl(d.matkul_id, d.matkul_nama);
            }); 
        }
    });
}

loadListMatkul();



$('#btn-buat-soal').click(function(){
    var jumlahSoalValue = $('#jumlah-soal').val();
    // do process
    if(jumlahSoalValue >=5 && jumlahSoalValue <= 10) {
        if(arrSoalInput.length > 0) {
            arrSoalInput = [];
        }
        $('#soal-container').empty();
         for(var i =1; i<=jumlahSoalValue; i++){
             createSoalPanel('Soal no',i);
             arrSoalInput.push({
                 soal_no:i,
                 soal_jawab:null,
                 soal_text:null,
                 soal_jawab_text:null,
                 soal_detail:[]
             });
         }
    }


    return false;
});

function getSoalPertanyaanInput(){
    $('.my-soal-pertanyaan').each(function(i,el){
        var soalPertanyaanVal = $(el).val().trim();
        var soalNoVal = $(el).data('soal_no');
        
        if(soalPertanyaanVal) {
            currentSoal(soalNoVal)['soal_text'] = soalPertanyaanVal;
        } else {
            currentSoal(soalNoVal)['soal_text'] = null;
        }
    });
}

function currentSoal(soalNo){
    var mapToArrSoalNo = arrSoalInput.map(function(n){ return n.soal_no});
    var indexOfSoalNo = mapToArrSoalNo.indexOf(soalNo);

    return arrSoalInput[indexOfSoalNo];
}

function getRadioSoalInputVal(){
    $('input[name^="my-radio-soal"]:checked').each(function(i,el){
        var soalNo = $(el).data('soal_no');

        currentSoal(soalNo)['soal_jawab'] = $(el).attr('value');
    });
}



function getSoalTextInputVal(){
    $('.my-soal-text').each(function(i,el){
        var rowParentEl = $(el).closest('.row');
        var myRadioSoalEl = rowParentEl.find('.my-radio-soal');
        var checkedRadio = myRadioSoalEl.prop('checked');
        
        if(checkedRadio) {
            var soalTextVal = $(el).val();
            var trimIt = soalTextVal.toString().trim();
            var soalNo = $(el).data('soal_no');

            if(trimIt) {
                currentSoal(soalNo)['soal_jawab_text'] = trimIt;
            } else {
                currentSoal(soalNo)['soal_jawab_text'] = null;
            }

        }

    });
}


function validateSoal() {

    var banyakSoal = arrSoalInput.length;

    var arrSoalJawab = 
        arrSoalInput
            .map(function(v){return v.soal_jawab;})
            .filter(function(v){
                return v !== null;
            });

    var arrSoalJawabText  = 
        arrSoalInput
            .map(function(v){return v.soal_jawab_text;})
            .filter(function(v){
                return v !== null;
            });

    var arrSoalText = 
        arrSoalInput
            .map(function(v){return v.soal_text;})
            .filter(function(v){
                return v !== null;
            });
    
    var allSoalOpsiText = [];

    $('.my-soal-text').each(function(i,el){
        var elVal = $(el).val().toString().trim();
        if(elVal) {
            allSoalOpsiText.push(elVal);
        }
    });
        
    var totalSoalOpsiText = banyakSoal * 5;


    console.log(banyakSoal, 
        arrSoalJawab.length === banyakSoal, 
        arrSoalJawabText.length === banyakSoal, 
        arrSoalText.length === banyakSoal,
        totalSoalOpsiText === allSoalOpsiText.length
    );

    return (
        arrSoalJawab.length === banyakSoal &&
        arrSoalJawabText.length === banyakSoal && 
        arrSoalText.length === banyakSoal &&
        totalSoalOpsiText === allSoalOpsiText.length
    );
}


$('#buat-soal-form').submit(function(ev){
    
    getRadioSoalInputVal();
    getSoalPertanyaanInput();
    getSoalTextInputVal();

    
    
    $('.my-soal-text').each(function(i,el){
        var myRadioSoalEl = $(el).closest('.row').find('.my-radio-soal');
        
        var myRadioVal = myRadioSoalEl.attr('value');
        var soalNo = $(el).data('soal_no');
        var inputVal = $(el).val().toString().trim();
        
        if(inputVal) {
            currentSoal(soalNo).soal_detail.push({
                soal_opsi:myRadioVal,
                soal_opsi_text:inputVal
            });
        } else {
            currentSoal(soalNo).soal_detail.push({
                soal_opsi:myRadioVal,
                soal_opsi_text:null
            });
        }
        
    });
    
    
    
    var isValid = validateSoal();
    if(!isValid) {
        alert('soal tidak valid, silahkan diisi');
        ev.preventDefault();
        return;
    }
    
    var currentModal = M.Modal.getInstance(document.querySelector('.modal'));
    currentModal.open();

    $.post('/it-a/api/buat-soal',
    JSON.stringify({
        csrf_token:$('#csrf-token').val(),
        soal_input:arrSoalInput,
        matkul_id:$('#matkul-id').val(),
        sesi_nama:$('#sesi-nama').val()
    }),
    function(data,statusText,xhr){
        currentModal.close();
        // console.log(data,statusText,xhr);

        if(statusText === 'success') {
            console.log(data);
            arrSoalInput = [];
            $('#soal-container').empty();
            $('#jumlah-soal').val('');
            $('#sesi-nama').val('');
        }
    });


    ev.preventDefault();
});