<?php

use Models\WebDb;
use Ramsey\Uuid\Uuid;
require_once __DIR__ . '/../vendor/autoload.php';

$matkulId = substr("M_".Uuid::uuid4()->toString() , 0 ,10);

$matkul = [
    'matkul_id'=>$matkulId,
    'matkul_nama'=>'Matkul baru',
    'pengajar_id'=>155689
];

$soal = [
    [
        'soal_no'=>2,
        'soal_text'=> 'dkqokwd',
        'soal_jawab'=>'B',
    ],
    [
        'soal_no'=>3,
        'soal_text'=> 'oajjoqw',
        'soal_jawab'=>'C',
    ],
    [
        'soal_no'=>4,
        'soal_text'=> 'ojojwei',
        'soal_jawab'=>'A',
    ],
    [
        'soal_no'=>5,
        'soal_text'=> 'lololo',
        'soal_jawab'=>'E',
    ],
    [
        'soal_no'=>8,
        'soal_text'=> 'qwert',
        'soal_jawab'=>'C',
    ]
];


WebDb::buatMatkul($matkul);
WebDb::buatSoal($soal,$matkulId);







