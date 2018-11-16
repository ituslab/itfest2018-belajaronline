<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cari matakuliah</title>
    <?php
        loadTop();
        loadCSS("dashboard.override.css");
        loadCSS("dashboard-siswa.css");
        loadCSS("cari-matkul.css");
    ?>
</head>
<body>
    <?php
        loadSiswaNavbar();
    ?>

    <div class="my-sidebar-right">
        <div class="my-row">
            <?php if (gettype($cari_matkul) !== 'boolean') {?>
                <?php foreach($cari_matkul as $c) {?>
                    <div class="row">
                        <div class="col s12 m12">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title"><?= $c->matkul_nama?></span>
                                    <ul class="collection">
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle teal">account_circle</i>
                                            <span class="title">Nama pengajar</span>
                                            <p><?= $c->pengajar_nama?></p>
                                        </li>
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle teal">contact_phone</i>
                                            <span class="title">No HP</span>
                                            <p><?= $c->pengajar_nohp?></p>
                                        </li>
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle teal">streetview</i>
                                            <span class="title">Alamat</span>
                                            <p><?= $c->pengajar_alamat?></p>
                                        </li>
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle teal">email</i>
                                            <span class="title">Email</span>
                                            <p><?= $c->pengajar_email?></p>
                                        </li>
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle teal">library_books</i>
                                            <span class="title">Total soal (pilihan ganda)</span>
                                            <p><?= $c->total_soal?></p>
                                        </li>
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle teal">library_books</i>
                                            <span class="title">Total soal (essay)</span>
                                            <p><?= $c->total_essay?></p>
                                        </li>
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle teal">layers</i>
                                            <span class="title">Total sesi / pertemuan</span>
                                            <p><?= $c->total_sesi?></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-action">
                                    <?php if($c->total_soal >= 5 || $c->total_essay >= 1) {?>
                                        <button class="btn waves-effect waves-light" onclick="onTambahMatkul('<?php echo($c->matkul_id);?>')">Tambahkan ke matakuliah saya
                                            <i class="material-icons right">add</i>
                                        </button>
                                    <?php }else {?>
                                        <button class="btn waves-effect waves-light teal">Menunggu soal</button>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php }else{?>
                <div class="row">
                    <div class="col s12 m12 card-panel">
                        Belum ada matakuliah saat ini...
                    </div>
                </div>
            <?php }?>
        </div>
    </div>

</body>
    <?php
        loadBottom();
        loadJS("dashboard.override.js");
        loadJS("cari-matkul.js");
    ?>
</html>