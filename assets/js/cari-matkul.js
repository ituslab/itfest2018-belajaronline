function onTambahMatkul(matkulId) {
    $.post('/it-a/api/tambah-matkul',
    JSON.stringify({
        matkul_id:matkulId
    }),
    function(apiResponse,statusText,xhr){
        if(statusText === 'success') {
            alert(apiResponse.data);
        }
    });
}