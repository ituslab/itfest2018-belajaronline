## Database join queries
--- 


### List matakuliah yang diambil oleh siswa
```
select s.siswa_id,s.siswa_nama,m.*,p.pengajar_nama,p.pengajar_nohp from siswa s  inner join siswa_matkul sm on s.siswa_id = sm.siswa_id inner join mata_kuliah m on sm.matkul_id = m.matkul_id inner join pengajar p 
on m.pengajar_id = p.pengajar_id
where s.siswa_id = 'SISWA_ID_VALUE'
```


### Ambil jawaban dari siswa dan pengajar (Dari siswa dan sesi id)
```
select sm.soal_id,sm.soal_no,sm.soal_jawab,sj.siswa_jawaban,sm.matkul_id from soal_matkul sm inner join siswa_jawaban sj on sm.soal_id = sj.siswa_soalid  where sj.siswa_id = 'SISWA_ID_VALUE' and sj.sesi_id = 'SESI_ID_VALUE';
```


### Ambil jawaban yang salah (Dari siswa dan sesi id)
```
select sm.soal_id,sm.soal_text,sm.soal_no,sm.soal_jawab,sm.soal_jawab_text,sj.siswa_jawaban,
(
    select sd.soal_opsi_text
    from soal_detail sd
    where sd.soal_id = sm.soal_id
    and
    sd.soal_opsi = sj.siswa_jawaban
    and
    sd.soal_no = sm.soal_no
) as siswa_jawaban_text
,sm.matkul_id from soal_matkul sm inner join siswa_jawaban sj on sm.soal_id = sj.siswa_soalid  where sj.siswa_id = 'SISWA_ID_VALUE' and sj.sesi_id = 'SESI_ID_VALUE'
and sm.soal_jawab != sj.siswa_jawaban ;
```

### Ambil jawaban yang benar (Dari siswa id dan sesi id)
```
select sm.soal_id,sm.soal_text,sm.soal_no,sm.soal_jawab,sm.soal_jawab_text,sj.siswa_jawaban,
(
    select sd.soal_opsi_text
    from soal_detail sd
    where sd.soal_id = sm.soal_id
    and
    sd.soal_opsi = sj.siswa_jawaban
    and
    sd.soal_no = sm.soal_no
) as siswa_jawaban_text
,sm.matkul_id from soal_matkul sm inner join siswa_jawaban sj on sm.soal_id = sj.siswa_soalid  where sj.siswa_id = 'SISWA_ID_VALUE' and sj.sesi_id = 'SESI_ID_VALUE'
and sm.soal_jawab = sj.siswa_jawaban ;

```

### List siswa yang mengambil mata kuliah (Dari matkul_id)
```
select s.siswa_id,s.siswa_nama,m.matkul_nama from siswa s inner join siswa_matkul sm on s.siswa_id = sm.siswa_id  inner join mata_kuliah m on sm.matkul_id = m.matkul_id  where sm.matkul_id = 'MATKUL_ID_VALUE'
```


### Select matakuliah dan pengajar dengan total_soal (masing2 matakuliah)
```
select m.matkul_id,m.matkul_nama,p.pengajar_nama,p.pengajar_email,p.pengajar_nohp,p.pengajar_alamat,(select count(s.soal_id) from soal_matkul s where s.matkul_id = m.matkul_id) as total_soal  from mata_kuliah m inner join pengajar p  on m.pengajar_id = p.pengajar_id;
```

### Count List siswa yang mengambil mata kuliah (Dari matkul_id)
```
select count(s.siswa_id) as total from siswa s inner join siswa_matkul sm on s.siswa_id = sm.siswa_id  inner join mata_kuliah m on sm.matkul_id = m.matkul_id  where sm.matkul_id = 'MATKUL_ID_VALUE';
```

### Load soal from matkul_id
```
select  sm.soal_no,sm.soal_text,sd.soal_opsi,sd.soal_opsi_text from soal_matkul sm inner join soal_detail sd on sm.soal_id = sd.soal_id where sm.matkul_id = 'MATKUL_ID_VALUE' order by sm.soal_no asc;

```



### List sesi yang sudah dijawab oleh siswa
```
select distinct(sj.sesi_id),sj.matkul_id,sj.siswa_id,s.siswa_nama,sk.tipe_soal,sk.sesi_nama,m.matkul_nama from siswa_jawaban sj inner join sesi_kuliah sk on sj.sesi_id = sk.sesi_id  inner join mata_kuliah m on sj.matkul_id = m.matkul_id  inner join siswa s  on s.siswa_id = sj.siswa_id 
where s.siswa_id = 'SISWA_ID_VALUE';

```


### Review soal lebih detail
```
select distinct(sj.sesi_id),sm.soal_id,sm.soal_no,sm.soal_text,sj.siswa_jawaban,sm.soal_jawab,(
    select sd.soal_opsi_text
    from soal_detail sd
    where sd.soal_id = sm.soal_id
    and sd.soal_opsi = sj.siswa_jawaban
    and sd.soal_no = sm.soal_no
) as siswa_jawaban_text,sm.soal_jawab_text from siswa_jawaban sj inner join soal_matkul sm on sj.siswa_soalid = sm.soal_id where sj.siswa_id = 'SISWA_ID_VALUE' and sj.sesi_id = 'SESI_ID';
```

### list soal essay yang sudah dijawab oleh siswa by pengajar id 
```
select distinct(js.siswa_id), js.matkul_id, js.sesi_id,s.siswa_nama,m.matkul_nama,sk.sesi_nama from jawab_essay js inner join siswa s  on js.siswa_id = s.siswa_id inner join mata_kuliah m on js.matkul_id = m.matkul_id inner join sesi_kuliah sk on sk.matkul_id = m.matkul_id  inner join pengajar p on m.pengajar_id = p.pengajar_id where m.pengajar_id = 'PENGAJAR_ID_VALUE';
```


### list review essay dari siswa_id dan sesi_id
```
select  js.siswa_id,js.soal_id, js.soal_no, se.soal_text, js.jawab_text,js.matkul_id,js.sesi_id  from jawab_essay js inner join soal_essay se on js.soal_id = se.soal_id and js.soal_no = se.soal_no  where js.siswa_id = 'SISWA_ID_VALUE' and js.sesi_id = 'SESI_ID_VALUE'
order by js.soal_no asc;
```