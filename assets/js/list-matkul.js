$(document).ready(function(){
    $('.modal').modal();
});


function processIntoDom(data){
    $('#collection-sesi').empty();
    data.forEach(function(d){
        var cItem = document.createElement('a');
        cItem.className = 'collection-item';
        cItem.innerHTML = d.sesi_nama;        
        cItem.setAttribute('href','/it-a/dashboard/jawab-soal/'+d.sesi_id);

        $('#collection-sesi').append(cItem);
    });
    $('.modal').modal('open');
}


function onListSesi(matkulId){
    $.get('/it-a/api/list-sesi/'+matkulId,
        function(apiResponse,statusText,xhr){
            processIntoDom(apiResponse.data);
        }
    );
}