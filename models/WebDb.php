<?php

namespace Models;
use Felis\Silvestris\Database;


class WebDb {
    private $db;

    static function getDb(){
        if(!isset($db)){
            $db = new Database("mysql:host=sekolah-db;dbname=sekolah_db","root","");
        }
        return $db;
    }

    static function handleLogin($username , $password , $loginSebagai) {
        $username = str_replace("'","",$username);

        $webDb = self::getDb();
        $toMd5 = md5($password);
        $getUser = $webDb->select($loginSebagai)->where([
            $loginSebagai."_id"=>['=' => $username],
            $loginSebagai."_password"=>['=' => $toMd5]
        ]);
        // stdClass object return
        $data = $getUser->fetch()->get();  
        return $data;
    }

    static function listPengajar(){
        $webDb = self::getDb();
        $selectPengajar = $webDb
                ->select("pengajar","pengajar_id,pengajar_nama,pengajar_nohp")
                ->fetchAll()
                ->get();
    }

    static function listMatkulByPengajar($pengajarId) {
        $webDb = self::getDb();
        $selectMatakuliah = $webDb
                ->select("mata_kuliah","matkul_id,matkul_nama")
                ->where([
                    'pengajar_id'=>['=' => $pengajarId]
                ])
                ->fetchAll()
                ->get();
    }

    static function listSoalByMatkulId($matkulId) {
        $webDb = self::getDb();
        $selectMatakuliah = $webDb
                ->select("soal_matkul","soal_no,soal_text")
                ->where([
                    'matkul_id'=>['=' => $matkulId]
                ])
                ->fetchAll()
                ->get();
    }

    static function buatSoal($dataInput){
        $webDb = self::getDb();

        $insertMatkul = $webDb
            ->insert("mata_kuliah",array(
                'matkul_id'=>$dataInput['matkul_id'],
                'matkul_nama'=>$dataInput['matkul_nama'],
                'pengajar_id'=>$dataInput['pengajar_id']
            ));
        
        foreach ($dataInput['soal'] as $v) {
            $webDb
                ->insert("soal_matkul",array(
                    'soal_id'=>substr("S_".uniqid(), 0 , 10),
                    'soal_no'=>$v['soal_no'],
                    'soal_text'=>$v['soal_text'],
                    'soal_jawab'=>$v['soal_jawab'],
                    'matkul_id'=>$dataInput['matkul_id']
                ));   
        }   

    }

    static function handleSaveDaftar($daftarSebagai , $nama , $userId , $password , $noHp) {
        $webDb = self::getDb();
        $result = false;
        if($daftarSebagai === "pengajar") {
            $result = $webDb->insert("pengajar",array(
                'pengajar_id'=>$userId,
                'pengajar_nama'=>$nama,
                'pengajar_password'=>md5($password),
                'pengajar_nohp'=>$noHp
            ));
        } else if ($daftarSebagai === "mahasiswa") {
            $result = $webDb->insert("siswa",array(
                'siswa_id'=>$userId,
                'siswa_nama'=>$nama,
                'siswa_password'=>md5($password),
                'siswa_nohp'=>$noHp
            ));
        }

        return $result;
    }
}