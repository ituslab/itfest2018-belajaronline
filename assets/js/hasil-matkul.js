document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instancesCollapsible = M.Collapsible.init(elems);


    var modalElems = document.querySelectorAll('.modal');
    var instancesModal = M.Modal.init(modalElems, {
        onCloseEnd:function(){
            $('#li-benar').hide();
            $('#li-salah').hide();
        }
    });
});




$('#li-benar').hide();
$('#li-salah').hide();



function onResponseJawabBenar(jawabanBenar){
    console.log('BENAR',jawabanBenar);
    // green darken-1
    $('#cb-benar').empty();
    jawabanBenar.forEach(function(v){
        var soalText = v.soal_text;
        var soalNo = v.soal_no;
        var siswaJawab = v.siswa_jawaban;
        var siswaJawabText = v.siswa_jawaban_text;        

        var newCardPanel = document.createElement('div');
        newCardPanel.className = 'card-panel green darken-1 white-text'

        var newP = document.createElement('p');
        newP.innerHTML = 'Soal no ' +soalNo;

        var newP1 = document.createElement('p');
        newP1.innerHTML = soalText;

        var newP2 = document.createElement('p');
        newP2.innerHTML = 'Anda menjawab dengan pilihan ' + siswaJawab + '. ' +siswaJawabText;


        newCardPanel.append(newP);
        newCardPanel.append(newP1);
        newCardPanel.append(newP2);

        $('#cb-benar').append(newCardPanel);
    });

    $('#li-benar').show();

}

function onResponseJawabSalah(jawabanSalah){
    console.log('SALAH',jawabanSalah);
    // red darken-1
    $('#cb-salah').empty();
    jawabanSalah.forEach(function(v){
        var soalText = v.soal_text;
        var soalNo = v.soal_no;

        var soalJawab = v.soal_jawab;
        var soalJawabText = v.soal_jawab_text;

        var siswaJawab = v.siswa_jawaban;
        var siswaJawabText = v.siswa_jawaban_text;

        var newCardPanel = document.createElement('div');
        newCardPanel.className = 'card-panel red darken-1 white-text'

        var newP = document.createElement('p');
        newP.innerHTML = 'Soal no ' +soalNo;

        var newP1 = document.createElement('p');
        newP1.innerHTML = soalText;

        var newP2 = document.createElement('p');
        newP2.innerHTML = 'Anda menjawab dengan pilihan ' + siswaJawab + '. ' +siswaJawabText;


        var newP3 = document.createElement('p');
        newP3.innerHTML = 'Yang benar adalah pilihan ' + soalJawab + '. ' + soalJawabText;

        newCardPanel.append(newP);
        newCardPanel.append(newP1);
        newCardPanel.append(newP2);  
        newCardPanel.append(newP3);
        
        $('#cb-salah').append(newCardPanel);
    });
    $('#li-salah').show();
}



function onReviewEssay(sesiId){
    console.log('on review essay...');
    $('#soal-review-container').empty();


    $.get('/it-a/api/review-essay/'+sesiId,
    function(apiResponse,statusText,xhr){
        if(apiResponse.data) {
            console.log(apiResponse.data);
            
            apiResponse.data.forEach(function(d){
                
                var isBenar = d.pernyataan === 'BENAR' ? 'teal' : 'red';
                var n = d.pernyataan === 'BENAR' ? 'Selamat jawaban anda benar' : 'Maaf, jawaban anda salah';
                $('#soal-review-container').append(`
                        <div class="card-panel ${isBenar} white-text">
                            <p>Soal no. ${d.soal_no}</p>
                            <p>
                                ${d.soal_text}
                            </p>
                            <p>${n}</p>
                            <p>Anda menjawab: ${d.jawab_text}</p>
                        </div>`);                
            });
        }
    });

    $('.modal').modal('open');
}

function onReviewSoal(sesiId){
    console.log('sesi_id',sesiId);

    $('.modal').modal('open');

    $.get('/it-a/api/jawab-benar/' +sesiId, 
    function(apiResponse,statusText,xhr){
        if(statusText === 'success') {
            if(apiResponse.data) {
                onResponseJawabBenar(apiResponse.data);
                $('#badge-benar').text('Ada ' +apiResponse.data.length + ' Yang benar');
            }
        }
    });
    $.get('/it-a/api/jawab-salah/' +sesiId, 
    function(apiResponse,statusText,xhr){
        if(statusText === 'success') {
            if(apiResponse.data) {
                onResponseJawabSalah(apiResponse.data);
                $('#badge-salah').text('Ada ' + apiResponse.data.length + ' Yang salah ');
            }
        }
    });
}
