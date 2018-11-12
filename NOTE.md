## Database join queries
--- 


### List matakuliah yang diambil oleh siswa
```
select s.siswa_id,s.siswa_nama,m.*,p.pengajar_nama,p.pengajar_nohp from siswa s  inner join siswa_matkul sm on s.siswa_id = sm.siswa_id inner join mata_kuliah m on sm.matkul_id = m.matkul_id inner join pengajar p 
on m.pengajar_id = p.pengajar_id
where s.siswa_id = 'SISWA_ID_VALUE'
```


### Ambil jawaban yang salah 
```
select sm.matkul_id, sj.siswa_id,sm.soal_no,sj.siswa_jawaban,sm.soal_jawab from siswa_jawaban sj inner join soal_matkul sm on sj.siswa_soalid = sm.soal_id and sj.matkul_id = sm.matkul_id
where sj.siswa_id = 'SISWA_ID_VALUE' and 
and sj.matkul_id = 'MATKUL_ID_VALUE' and
sj.siswa_jawaban != sm.soal_jawab ;
```

### Ambil jawaban yang benar (Dari siswa id dan matkul id)
```
select sj.siswa_soalid,sm.soal_no, sj.siswa_jawaban,sm.soal_jawab from siswa_jawaban sj inner join soal_matkul sm on sj.matkul_id = sm.matkul_id and sj.siswa_soalid = sm.soal_id
where sj.siswa_jawaban = sm.soal_jawab
and sj.siswa_id = 'SISWA_ID_VALUE'
and sj.matkul_id = 'MATKUL_ID_VALUE'
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