<?php

namespace Models;
use Felis\Silvestris\Database;
use Ramsey\Uuid\Uuid;


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

    static function buatMatkul($matkul) {
        $webDb = self::getDb();
        $webDb->insert('mata_kuliah',array(
            'matkul_id'=>$matkul['matkul_id'],
            'matkul_nama'=>$matkul['matkul_nama'],
            'pengajar_id'=>$matkul['pengajar_id']
        ));
    }

    static function buatSoal($dataInput , $matkulId){
        $webDb = self::getDb();
        foreach ($dataInput as $v) {
            $v['soal_id'] = substr("S_".Uuid::uuid4()->toString() , 0 , 10);
            $v['matkul_id'] = $matkulId;
            $webDb->insert("soal_matkul",$v);   
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