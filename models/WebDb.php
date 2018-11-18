<?php

namespace Models;
use Felis\Silvestris\Database;
use Ramsey\Uuid\Uuid;


class WebDb {
    private $db;
    private $pdo;

    static function getDb(){
        if(!isset($db)){
            $db = new Database("mysql:host=sekolah-db;dbname=sekolah_db","root","");
        }
        return $db;
    }

    static function getPdo(){
        if(!isset($pdo)) {
            $pdo = new \PDO("mysql:host=sekolah-db;dbname=sekolah_db","root","");
        }
        return $pdo;
    }

    static function handleLogin($username , $password , $loginSebagai) {
        $username = str_replace("'","",$username);

        $webDb = self::getDb();
        $getUser = $webDb->select($loginSebagai)->where([
            $loginSebagai."_id"=>['=' => $username]
        ]);

        
        // stdClass object return
        $data = $getUser->fetch()->get();
        
        if (password_verify($password, $data->{$loginSebagai."_password"})) {
          return $data;
        }
        return false;
    }

    static function checkField($tb, $field, $value){
      $webDb = self::getDb();
      $available = $webDb->select($tb)->where([
        $field => ['=' => $value]
      ])->fetch()->get();
      if ($available) return false;
      return true;
    }

    static function listPengajar(){
        $webDb = self::getDb();
        $selectPengajar = $webDb
                ->select("pengajar","pengajar_id,pengajar_nama,pengajar_nohp")
                ->fetchAll()
                ->get();
        return $selectPengajar;
    }

    static function countListSiswaYangMengambilMataKuliah($matkulId) {
        $webDb = self::getDb();
        $result = $webDb
            ->query("
            select count(s.siswa_id) as total from siswa s
            inner join siswa_matkul sm on
            s.siswa_id = sm.siswa_id
            inner join mata_kuliah m on
            sm.matkul_id = m.matkul_id
            where sm.matkul_id = :matkul_id
            ",[
                ':matkul_id'=>$matkulId
            ])
            ->fetch()
            ->get();

        return $result;
    }

    static function listSiswaYangMengambilMataKuliah($matkulId) {
        $webDb = self::getDb();
        $result = $webDb
            ->query("
            select s.siswa_id,s.siswa_nama,m.matkul_nama
            from siswa s inner join siswa_matkul sm
            on s.siswa_id = sm.siswa_id
            inner join mata_kuliah m on sm.matkul_id = m.matkul_id
            where sm.matkul_id = :matkul_id
            ",[
                ':matkul_id'=>$matkulId
            ])
            ->fetchAll()
            ->get();
        return $result;
    }


    // siswa to pengajar
    static function jawabEssay($soalJawab) {
        $webDb = self::getDb();
        $webDb->insert('jawab_essay',[
            'siswa_id'=>$soalJawab->siswa_id,
            'soal_id'=>$soalJawab->soal_id,
            'matkul_id'=>$soalJawab->matkul_id,
            'sesi_id'=>$soalJawab->sesi_id,
            'soal_no'=>$soalJawab->soal_no,
            'jawab_text'=>$soalJawab->jawab_text
        ]);
    }

    // list jawaban essay dari siswa
    static function countListJawabanEssayDariSiswaDanSesiId($siswaId,$sesiId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "
                select * from jawab_essay
                where siswa_id = :siswa_id
                and sesi_id = :sesi_id
            "
        ,[
            ':siswa_id'=>$siswaId,
            ':sesi_id'=>$sesiId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }


    // pengajar to siswa
    static function submitEssay($submitEssay) {
        $webDb = self::getDb();
        $webDb->insert('submit_essay',[
            'siswa_id'=>$submitEssay->siswa_id,
            'matkul_id'=>$submitEssay->matkul_id,
            'sesi_id'=>$submitEssay->sesi_id,
            'soal_id'=>$submitEssay->soal_id,
            'soal_no'=>$submitEssay->soal_no,
            'pernyataan'=>$submitEssay->pernyataan
        ]);
    }

    static function listSesiByMatkul($matkulId) {
        $webDb = self::getDb();
        $q = $webDb->query(
            "select
                sk.sesi_id,
                sk.sesi_nama ,
                sk.tipe_soal
                from sesi_kuliah sk
                inner join mata_kuliah m
                on m.matkul_id = sk.matkul_id
                where m.matkul_id = :matkul_id
            "
        ,[
            ':matkul_id'=>$matkulId
        ])
            ->fetchAll()
            ->get();
        return $q;
    }

    static function listMatkul() {
        $webDb = self::getDb();
        $findAll = $webDb
            ->query(
                "select
                m.matkul_id,
                m.matkul_nama,
                p.pengajar_nama,
                p.pengajar_email,
                p.pengajar_nohp,
                p.pengajar_alamat,
                (select count(s.soal_id) from soal_matkul s where s.matkul_id = m.matkul_id) as total_soal,
                (select count(se.soal_id) from soal_essay se where se.matkul_id = m.matkul_id) as total_essay,
                (select count(sk.sesi_id) from sesi_kuliah sk where sk.matkul_id = m.matkul_id) as total_sesi
                from mata_kuliah m
                inner join pengajar p
                on m.pengajar_id = p.pengajar_id
                "
            )
            ->fetchAll()
            ->get();
        return $findAll;
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
        return $selectMatakuliah;
    }

    static function listSoalEssayBySesi($sesiId) {
        $webDb = self::getDb();
        $result = $webDb
            ->query("
                select * from soal_essay
                where sesi_id = :sesi_id
                order by soal_no asc
            ",[
                ":sesi_id"=>$sesiId
            ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function listSoalBySesi($sesiId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select
                sm.soal_id,
                sm.soal_no,
                sm.soal_text,
                sd.soal_opsi,
                sd.soal_opsi_text
                from soal_matkul sm
            inner join soal_detail sd
            on sm.soal_id = sd.soal_id
            where sm.sesi_id = :sesi_id
            order by sm.soal_no asc"
        ,[
            ':sesi_id'=>$sesiId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }


    static function buatMatkul($matkulNama , $pengajarId) {
        $webDb = self::getDb();
        $result = $webDb->insert('mata_kuliah',array(
            'matkul_id'=>substr("M_".Uuid::uuid4()->toString() , 0 , 10),
            'matkul_nama'=>$matkulNama,
            'pengajar_id'=>$pengajarId
        ));
        return $result;
    }

    static function addNewMatkulToSiswa($matkulId , $siswaId){
        $webDb = self::getDb();

        $result = $webDb
            ->select('siswa_matkul')
            ->where([
                'matkul_id'=>['='=>$matkulId],
                'siswa_id'=>['='=>$siswaId]
            ])
            ->fetch()
            ->get();

        if($result) {
            return false;
        }

        $result = $webDb->insert('siswa_matkul',[
            'matkul_id'=>$matkulId,
            'siswa_id'=>$siswaId
        ]);
        return $result;
    }

    static function buatSoal($soalInput , $matkulId , $newSesi){
        $pdo = self::getPdo();

        $st = $pdo->prepare('insert into sesi_kuliah values (?,?,?,?)');
        $st->bindValue(1,$newSesi['sesi_id']);
        $st->bindValue(2,$newSesi['sesi_nama']);
        $st->bindValue(3,$newSesi['matkul_id']);
        $st->bindValue(4,$newSesi['tipe_soal']);

        $st->execute();

        $tipeSoal = $newSesi['tipe_soal'];

        if($tipeSoal === 'pilgan') {
            foreach ($soalInput as $v) {
                $newSoal = [
                    'soal_id'=>substr("S_".Uuid::uuid4()->toString() , 0 , 10),
                    'soal_no'=>$v->soal_no,
                    'soal_text'=>$v->soal_text,
                    'soal_jawab'=>$v->soal_jawab,
                    'matkul_id'=>$matkulId,
                    'sesi_id'=>$newSesi['sesi_id'],
                    'soal_jawab_text'=>$v->soal_jawab_text
                ];

                $pSt = $pdo->prepare('insert into soal_matkul values (?,?,?,?,?,?,?)');
                $pSt->bindValue(1,$newSoal['soal_id']);
                $pSt->bindValue(2,$newSoal['soal_no']);
                $pSt->bindValue(3,$newSoal['soal_text']);
                $pSt->bindValue(4,$newSoal['soal_jawab']);
                $pSt->bindValue(5,$newSoal['matkul_id']);
                $pSt->bindValue(6,$newSoal['soal_jawab_text']);
                $pSt->bindValue(7,$newSoal['sesi_id']);
                $pSt->execute();


                foreach($v->soal_detail as $eachSoalDetail) {
                    $eachSoalDetail->soal_id = $newSoal['soal_id'];
                    $eachSoalDetail->soal_no = $newSoal['soal_no'];
                    $pSt2 = $pdo->prepare('insert into soal_detail values (?,?,?,?)');

                    $pSt2->bindValue(1,$eachSoalDetail->soal_id);
                    $pSt2->bindValue(2,$eachSoalDetail->soal_opsi);
                    $pSt2->bindValue(3,$eachSoalDetail->soal_opsi_text);
                    $pSt2->bindValue(4,$eachSoalDetail->soal_no);
                    $pSt2->execute();
                }
            }
        } else {
            foreach($soalInput as $s) {
                $pSt = $pdo->prepare('insert into soal_essay values (?,?,?,?,?)');
                $pSt->bindValue(1,substr("S_".Uuid::uuid4()->toString() , 0 , 10));
                $pSt->bindValue(2,$s->soal_no);
                $pSt->bindValue(3,$matkulId);
                $pSt->bindValue(4,$newSesi['sesi_id']);
                $pSt->bindValue(5,$s->soal_text);

                $pSt->execute();
            }
        }

    }

    static function listSiswaJawabanBySiswaIdAndSoalSesiId($siswaId , $sesiId){
        $webDb = self::getDb();
        $result = $webDb->query(
            "select * from siswa_jawaban
            where siswa_id = :siswa_id
            and sesi_id = :sesi_id"
        ,[
            'siswa_id'=>$siswaId,
            'sesi_id'=>$sesiId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function jawabSoal($siswaId,$matkulId,$soalId,$siswaJawaban , $sesiId) {
        $webDb = self::getDb();
        $result = $webDb->insert('siswa_jawaban',[
            'siswa_id'=>$siswaId,
            'matkul_id'=>$matkulId,
            'siswa_soalid'=>$soalId,
            'siswa_jawaban'=>$siswaJawaban,
            'sesi_id'=>$sesiId
        ]);
        return $result;
    }


    static function ambilJawabanYangSalah($siswaId , $sesiId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select
            sm.soal_id,
            sm.soal_text,
            sm.soal_no,
            sm.soal_jawab,
            sm.soal_jawab_text,
            sj.siswa_jawaban,
            (
                select sd.soal_opsi_text
                from soal_detail sd
                where sd.soal_id = sm.soal_id
                and
                sd.soal_opsi = sj.siswa_jawaban
                and
                sd.soal_no = sm.soal_no
            ) as siswa_jawaban_text
            ,sm.matkul_id from
            soal_matkul sm
            inner join siswa_jawaban sj
            on sm.soal_id = sj.siswa_soalid
            where sj.siswa_id = :siswa_id and
            sj.sesi_id = :sesi_id
            and sm.soal_jawab != sj.siswa_jawaban"
        ,[
            ':siswa_id'=>$siswaId,
            ':sesi_id'=>$sesiId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function ambilJawabanYangBenar($siswaId ,$sesiId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select
            sm.soal_id,
            sm.soal_text,
            sm.soal_no,
            sm.soal_jawab,
            sm.soal_jawab_text,
            sj.siswa_jawaban,
            (
                select sd.soal_opsi_text
                from soal_detail sd
                where sd.soal_id = sm.soal_id
                and
                sd.soal_opsi = sj.siswa_jawaban
                and
                sd.soal_no = sm.soal_no
            ) as siswa_jawaban_text
            ,sm.matkul_id from
            soal_matkul sm
            inner join siswa_jawaban sj
            on sm.soal_id = sj.siswa_soalid
            where sj.siswa_id = :siswa_id and
            sj.sesi_id = :sesi_id
            and sm.soal_jawab = sj.siswa_jawaban"
        ,[
            ':siswa_id'=>$siswaId,
            ':sesi_id'=>$sesiId
        ])
            ->fetchAll()
            ->get();

        return $result;
    }


    static function listSubmitEssayBySiswaIdAndSesiId($siswaId, $sesiId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select * from submit_essay 
            where siswa_id = :s_id  
            and sesi_id = :ss_id 
            "
        ,[
            ':s_id'=>$siswaId,
            ':ss_id'=>$sesiId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }
    static function listReviewSoalEssay($siswaId,$sesiId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "
            select  
            js.siswa_id,
            js.soal_id, 
            js.soal_no, 
            se.soal_text, 
            js.jawab_text,
            js.matkul_id,
            js.sesi_id 
            from jawab_essay js 
            inner join soal_essay se 
            on js.soal_id = se.soal_id 
            and js.soal_no = se.soal_no  
            where js.siswa_id = :siswa_id 
            and js.sesi_id = :sesi_id
            order by js.soal_no asc
            "
        ,[
            ':sesi_id'=>$sesiId,
            ':siswa_id'=>$siswaId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function listSiswaSudahEssay($pengajarId){
        $webDb = self::getDb();
        $result = $webDb->query(
            "
            select 
                distinct(js.siswa_id), 
                js.matkul_id, 
                js.sesi_id,
                s.siswa_nama,
                m.matkul_nama,
                sk.sesi_nama 
                from jawab_essay js 
                inner join siswa s on 
                js.siswa_id = s.siswa_id 
                inner join mata_kuliah 
                m on 
                js.matkul_id = m.matkul_id 
                inner join sesi_kuliah 
                sk on js.sesi_id = sk.sesi_id  
                inner join pengajar p 
                on m.pengajar_id = p.pengajar_id 
                where m.pengajar_id = :pengajar_id
            "
        ,[
            ':pengajar_id'=>$pengajarId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function listSesiEssayYangSudahDijawabSiswa($siswaId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select  
            distinct(je.sesi_id), 
            m.matkul_id,
            ss.sesi_nama, 
            ss.tipe_soal,
            s.siswa_nama, 
            m.matkul_nama 
            from jawab_essay je 
            inner join sesi_kuliah ss 
            on je.sesi_id = ss.sesi_id 
            inner join siswa s 
            on je.siswa_id = s.siswa_id  
            inner join mata_kuliah m 
            on je.matkul_id = m.matkul_id 
            where je.siswa_id = :siswa_id"
        ,[
            ':siswa_id'=>$siswaId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function listSesiYangSudahDijawabSiswa($siswaId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select
                distinct(sj.sesi_id)
                ,sj.matkul_id,
                sj.siswa_id,
                s.siswa_nama,
                sk.tipe_soal,
                sk.sesi_nama,
                m.matkul_nama
                from siswa_jawaban sj
                inner join sesi_kuliah sk
                on sj.sesi_id = sk.sesi_id
                inner join mata_kuliah m
                on sj.matkul_id = m.matkul_id
                inner join siswa s
                on s.siswa_id = sj.siswa_id
                where s.siswa_id = :siswa_id"
        ,[
            ':siswa_id'=>$siswaId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function listMatkulInnerJoinSiswaJawaban($siswaId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select distinct m.*
            from mata_kuliah m inner join
            siswa_jawaban sj
            on m.matkul_id = sj.matkul_id
            where sj.siswa_id = :siswa_id"
        ,[
            ':siswa_id'=>$siswaId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function ambilJawabanSiswaDanPengajar($siswaId , $matkulId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select sj.siswa_soalid,sm.soal_no,sm.soal_text,
            sj.siswa_jawaban,sm.soal_jawab
            from siswa_jawaban sj
            inner join soal_matkul sm on
            sj.matkul_id = sm.matkul_id
            and sj.siswa_soalid = sm.soal_id
            where sj.siswa_id = :siswa_id
            and sj.matkul_id = :matkul_id"
        ,[
            ':siswa_id'=>$siswaId,
            ':matkul_id'=>$matkulId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function listMatkulYangDiambilSiswa($siswaId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "select
                s.siswa_id,
                s.siswa_nama,
                m.*,
                p.pengajar_nama,
                p.pengajar_nohp from siswa s
            inner join siswa_matkul
            sm on s.siswa_id = sm.siswa_id
            inner join mata_kuliah
            m on sm.matkul_id = m.matkul_id
            inner join pengajar
            p on m.pengajar_id = p.pengajar_id
            where s.siswa_id = :siswa_id ",[
                'siswa_id'=>$siswaId
            ])
            ->fetchAll()
            ->get();
        return $result;
    }

    static function onReviewEssay($siswaId, $sesiId) {
        $webDb = self::getDb();
        $result = $webDb->query(
            "
            select 
            se.siswa_id,
            m.matkul_nama,
            s.sesi_nama, 
            se.soal_no, 
            sy.soal_text, 
            je.jawab_text, 
            se.pernyataan 
            from submit_essay se 
            inner join soal_essay sy 
            on se.sesi_id = sy.sesi_id 
            and se.soal_id = sy.soal_id and se.soal_no = sy.soal_no  
            inner join jawab_essay je on 
            se.sesi_id = je.sesi_id 
            and se.soal_id = je.soal_id and  
            se.soal_no = je.soal_no  
            and se.siswa_id = je.siswa_id  
            inner join mata_kuliah m 
            on se.matkul_id = m.matkul_id 
            inner join sesi_kuliah s 
            on se.sesi_id = s.sesi_id 
            where se.siswa_id = :siswa_id
            and se.sesi_id = :sesi_id
            "
        ,[
            ':siswa_id'=>$siswaId,
            ':sesi_id'=>$sesiId
        ])
            ->fetchAll()
            ->get();
        return $result;
    }


    static function handleSaveDaftar($daftarSebagai , $nama , $userId , $password , $noHp , $email , $alamat , $gender) {
        $webDb = self::getDb();
        $result = false;
        if($daftarSebagai === "pengajar") {
            $result = $webDb->insert("pengajar",array(
                'pengajar_id'=>$userId,
                'pengajar_nama'=>$nama,
                'pengajar_password'=> \password_hash($password, PASSWORD_DEFAULT),
                'pengajar_nohp'=>$noHp,
                'pengajar_email'=>$email,
                'pengajar_gender'=>$gender,
                'pengajar_alamat'=>$alamat
            ));
        } else if ($daftarSebagai === "siswa") {
            $result = $webDb->insert("siswa",array(
                'siswa_id'=>$userId,
                'siswa_nama'=>$nama,
                'siswa_password'=>\password_hash($password, PASSWORD_DEFAULT),
                'siswa_nohp'=>$noHp,
                'siswa_email'=>$email,
                'siswa_gender'=>$gender,
                'siswa_alamat'=>$alamat
            ));
        }

        return $result;
    }
}
