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
    ?>
</head>
<body>
    <?php
        loadSiswaNavbar();
    ?>


    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>List sesi matakuliah ini</h4>
            <p>Klik sesi untuk menjawab soal</p>
            <div class="row">
                <div class="col s12 m12">
                    <div class="collection" id="collection-sesi">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
        </div>
    </div>

    <div class="my-sidebar-right">
        <div class="my-row">
            <?php if (gettype($list_matkul) !== 'boolean') {?>
                <ul class="collection">
                        <?php foreach($list_matkul as $l) {?>
                            <li class="collection-item avatar">
                                <i class="material-icons circle red">library_books</i>
                                <span class="title">Nama matakuliah</span>
                                <p><?= $l->matkul_nama?></p>
                                <a style="cursor: pointer;" onclick="onListSesi('<?= $l->matkul_id?>')" class="secondary-content">
                                    <i class="material-icons">details</i>
                                </a>
                            </li>
                        <?php }?>
                </ul>
            <?php }else{?>
                <div class="col s12 m12 card-panel">
                    Untuk menambahkan matakuliah anda, soal harus minimal 5 
                    <br/> 
                    Anda belum mempunyai mata kuliah <a href='/it-a/dashboard/cari-matkul'>Silahkan cari disini</a>
                </div>
            <?php }?>
        </div>
    </div>

</body>
    <?php
        loadBottom();
        loadJS("dashboard.override.js");
        loadJS('list-matkul.js');
    ?>
</div>