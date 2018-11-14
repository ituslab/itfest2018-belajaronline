document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
});


$(document).ready(function(){
    $('.modal').modal();
});


$('#li-benar').hide();
$('#li-salah').hide();



var arrJawabSalah = [];
var arrJawabBenar = [];


function onResponseJawabBenar(){

}

function onResponseJawabSalah(){

}


function onReviewSoal(sesiId){
    console.log('sesi_id',sesiId);

    $('.modal').modal('open');

    $.get('/it-a/api/jawab-benar/' +sesiId, 
    function(apiResponse,statusText,xhr){
        if(statusText === 'success') {
            if(apiResponse.data) {
                arrJawabBenar = apiResponse.data;
                $('#badge-benar').text('Ada ' +apiResponse.data.length + ' Yang benar');
            }
        }
    });
    $.get('/it-a/api/jawab-salah/' +sesiId, 
    function(apiResponse,statusText,xhr){
        if(statusText === 'success') {
            if(apiResponse.data) {
                arrJawabSalah = apiResponse.data;
                $('#badge-salah').text('Ada ' + apiResponse.data.length + ' Yang salah ');
            }
        }
    });
}
