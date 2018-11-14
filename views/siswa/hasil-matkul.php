<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil matakuliah saya</title>
    <?php
        loadTop();
        loadCSS('dashboard.override.css');
        loadCSS('dashboard-siswa.css');
    ?>
</head>
<body>
    <?php
        loadSiswaNavbar();
    ?>

    <!--  modal here -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Detail matakuliah</h4>
                <div id="soal-review-container"></div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
            </div>
        </div>
    <!--  modal here -->

    <div class="my-sidebar-right">
        <div class="my-row">
        <?php if (gettype($list_matkul) !== 'boolean') {?>
                <ul class="collection">
                        <?php foreach($list_matkul as $l) {?>
                            <li class="collection-item avatar">
                                <i class="material-icons circle red">library_books</i>
                                <span class="title">Nama matakuliah</span>
                                <p><?= $l->matkul_nama?></p>
                                <a style="cursor: pointer;" onclick="onDetailMatakuliah('<?=$l->matkul_id?>')" class="secondary-content">
                                    <i class="material-icons">rate_review</i>
                                </a>
                            </li>
                        <?php }?>
                </ul>
            <?php }else{?>
                <div class="col s12 m12 card-panel">
                    Anda belum menjawab soal mata kuliah apa pun 
                </div>
            <?php }?>
        </div>
    </div>



</body>
    <?php
        loadBottom();
        loadJS('dashboard.override.js');
        loadJS('hasil-matkul.js');
    ?>
</html>