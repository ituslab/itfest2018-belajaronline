
var arrBuatSoal = [];


$(document).ready(function(){
    $('select').formSelect();
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

    var inputTextPertanyaanEl = document.createElement('input');
    inputTextPertanyaanEl.setAttribute('type','text');
    inputTextPertanyaanEl.setAttribute('placeholder','');
    inputTextPertanyaanEl.className = 'validate my-soal-pertanyaan';

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
    $.get('/it-a/api/list-matkul',function(apiResponse){
        $('#matkul-id').empty()
        var data = apiResponse.data;
        data.forEach(function(d){
            createOptionMatkulEl(d.matkul_id, d.matkul_nama);
        }); 
    });
}

loadListMatkul();



$('#btn-buat-soal').click(function(){
    var jumlahSoalValue = $('#jumlah-soal').val();
    // do process
    if(jumlahSoalValue >=5 && jumlahSoalValue <= 10) {
        $('#soal-container').empty();
         for(var i =1; i<=jumlahSoalValue; i++){
             createSoalPanel('Soal no',i);
             arrBuatSoal.push({
                 soal_no:i,
                 soal_jawab:null
             });
         }
    }


    return false;
});

function getSoalPertanyaanInput(){
    $('.my-soal-pertanyaan').each(function(el){
        console.log(el);
    });
}

function getRadioSoalInputVal(){
    $('input[name^="my-radio-soal"]:checked').each(function(i,el){
        var soalNo = $(el).data('soal_no');

        var mapToArrSoalNo = arrBuatSoal.map(function(v){ return v.soal_no;});
        var indexOfSoalNo = mapToArrSoalNo.indexOf(soalNo);
        
        arrBuatSoal[indexOfSoalNo]['soal_jawab'] = $(el).attr('value');
    });
}

function getSoalTextInputVal(){
    $('.my-soal-text').each(function(el,i){
        var soalTextVal = $(el).val();
        var trimIt = soalTextVal.toString().trim();
        var soalNo = $(el).data('soal_no');
        
        console.log(trimIt);
    });
}

$('#buat-soal-form').submit(function(ev){
    // getRadioSoalInputVal();
    // console.log(arrBuatSoal);
    getSoalTextInputVal();

    arrBuatSoal = [];
    ev.preventDefault();
});