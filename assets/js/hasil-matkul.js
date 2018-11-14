$(document).ready(function(){
    $('.modal').modal();
});

function onDetailMatakuliah(matkulId) {
    console.log(matkulId);
    $('.modal').modal('open');
    loadSiswaJawaban(matkulId);
}


function loadIntoDom(siswaJawaban) {
    console.log(siswaJawaban);
}

function loadSiswaJawaban(matkulId) {
    $.get('/it-a/api/ambil-jawaban/'+matkulId,
    function(apiResponse,statusText,xhr){
        if(statusText === 'success') {
            loadIntoDom(apiResponse.data);
        } else {
            console.log('gagal mengambil data dari server...');
        }
    });
}