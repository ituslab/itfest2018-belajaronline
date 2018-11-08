<?php

require_once '../vendor/autoload.php';
use Tester\Assert;
use Models\WebDb;


Assert::exception(function(){
    WebDb::buatSoal(
        [
            'matkul_nama'=> 'Matkul001',
            'pengajar_id'=> '155689',
            'soal'=>[
                [
                    'soal_id'=> "S_".uniqid(),
                    'soal_no'=> 1,
                    'soal_text'=> 'Ini soal pertama kali',
                    'soal_jawab'=> 'A'
                ],
                [
                    'soal_id'=> "S_".uniqid(),
                    'soal_no'=> 2,
                    'soal_text'=> 'Ini soal kedua',
                    'soal_jawab'=> 'A'
                ]
            ]
        ]
    );
},PDOException::class , "Error");

