<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Models\WebDb;
use Felis\Silvestris\Database;

$db = new Database("mysql:host=sekolah-db;dbname=sekolah_db","root","");
$matkulId = substr("M_".uniqid() , 0, 10);


$db->insert('mata_kuliah',[
    'matkul_id'=>$matkulId,
    'matkul_nama'=>'Matkul 001',
    'pengajar_id'=>'155689'
]);

$db->insert('soal_matkul',[
    'soal_id'=>'S_'.uniqid(),
    'soal_no'=>1,
    'soal_text'=> 'asd',
    'soal_jawab'=>'A',
    'matkul_id'=>$matkulId
]);




// $dataInput = array(
//     'matkul_nama'=>'Matkul001',
//     'matkul_id'=>substr("M_".uniqid() , 0 , 10),
//     'pengajar_id'=>'155689',
//     'soal'=>[
//         [
//             'soal_no'=> 1,
//             'soal_text'=> "Soal 001",
//             'soal_jawab'=> "A"
//         ],
//         [
//             'soal_no'=> 2,
//             'soal_text'=> "Soal 002",
//             'soal_jawab'=> "A"
//         ]
//     ]
// );

// WebDb::buatSoal($dataInput);



