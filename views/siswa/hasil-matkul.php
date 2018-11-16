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
                <div id="soal-review-container">
                    <ul class="collapsible popout">
                        <li>
                            <div class="collapsible-header teal white-text">Hasil soal yang anda jawab</div>
                            <div id="soal-review-content" class="collapsible-body">
                                <div class="collection">
                                    <a href='#!' id='link-benar' class="collection-item">
                                        <span class="badge teal white-text" id="badge-benar"></span>
                                        Total jawaban yang benar
                                    </a>
                                    <a href='#!' id='link-salah' class="collection-item">
                                        <span class="badge red white-text" id="badge-salah"></span>
                                        Total jawaban yang salah
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li id='li-benar'>
                            <div class="collapsible-header teal white-text">Review soal yang benar</div>
                            <div id="cb-benar" class="collapsible-body">

                            </div>
                        </li>
                        <li id='li-salah'>
                            <div class="collapsible-header teal white-text">Review soal yang salah</div>
                            <div id="cb-salah" class="collapsible-body">

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
            </div>
        </div>
    <!--  modal here -->


    <!-- modal essay -->
    <div id="modal2" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Detail matakuliah (essay)</h4>
                <div id="soal-review-container-essay">
                    
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
            </div>
        </div>
        <!-- modal essay -->

    
    <div class="my-sidebar-right">
        <div class="my-row">
            <?php if($list_sesi || $list_sesi_essay) {?>
                
                <?php if($list_sesi_essay) {?>
                    <?php foreach($list_sesi_essay as $l) {?>
                        <ul class="collapsible popout">
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
                                    <i class="material-icons">layers</i>Tipe soal
                                </div>
                                <div class="collapsible-body">
                                    <?= $l->tipe_soal?>
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
                                    <a onclick="onReviewEssay('<?= $l->sesi_id?>')" class="waves-effect waves-light btn">review</a>
                                </div>
                            </li>
                        </ul>
                    <?php }?>
                <?php }?>
                
                <?php if($list_sesi) {?>
                    <?php foreach($list_sesi as $l) {?>
                        <ul class="collapsible popout">
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
                                    <a onclick="onReviewSoal('<?= $l->sesi_id?>')" class="waves-effect waves-light btn">review</a>
                                </div>
                            </li>
                        </ul>
                    <?php }?>
                <?php }?>


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