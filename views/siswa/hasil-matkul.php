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
        <?php if ($list_sesi) {?>
                <ul class="collapsible popout">
                    <?php foreach($list_sesi as $l) {?>
                        <li>
                            <div class="collapsible-header teal white-text">
                                <i class="material-icons">account_circle</i>Nama siswa
                            </div>
                            <div class="collapsible-body">
                                <?= $l->siswa_nama?>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header teal white-text">
                                <i class="material-icons">layers</i>Nama sesi matakuliah
                            </div>
                            <div class="collapsible-body">
                                <?= $l->sesi_nama?>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header teal white-text">
                                <i class="material-icons">book</i>Nama matakuliah
                            </div>
                            <div class="collapsible-body">
                                <?= $l->matkul_nama?>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header teal white-text">
                                <i class="material-icons">rate_review</i>Review soal
                            </div>
                            <div class="collapsible-body">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Check jawaban yang benar
                                    <i class="material-icons right">check</i>
                                </button>
                                <button class="btn waves-effect waves-light" type="submit" name="action">Check jawaban yang salah
                                    <i class="material-icons right">clear</i>
                                </button>
                            </div>
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