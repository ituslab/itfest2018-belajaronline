<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Review siswa</title>
    <?php 
        loadTop();
        loadCSS("dashboard.override.css");
        loadCSS('review-siswa.css');
    ?>
</head>
<body>

    <?php
        loadPengajarNavbar();
    ?>

    <div class="my-sidebar-right">
        <div class="my-row">
            <?php if(!$list_submit_essay) {?>
                <?php if($list_review) {?>
                    <?php foreach($list_review as $l) {?>
                        <div 
                            data-soal_id="<?= $l->soal_id?>" 
                            data-matkul_id="<?= $l->matkul_id?>"
                            data-sesi_id="<?= $l->sesi_id?>"
                            data-siswa_id="<?= $l->siswa_id?>"
                            class="card-panel my-custom-card">
                            <p>Soal no <span class="my-soal-no"><?= $l->soal_no?></span></p>
                            <p>
                                <div>Soal text</div>
                                <?= $l->soal_text?>
                            </p>
                            <p>
                                <div>Jawaban siswa</div>
                                <?= $l->jawab_text?>
                            </p>
                            <p class="my-custom-p">
                                <label>
                                    <input type="checkbox" class="filled-in" />
                                    <span>Tandai ini menjadi jawaban benar</span>
                                </label>
                            </p>
                        </div>
                    <?php }?>
                    <a onclick="onSubmitReview()" class="waves-effect waves-light btn">Submit</a>
                <?php }else{?>
                    <div class="card-panel teal white-text">
                        Tidak ada review soal...
                    </div>
                <?php }?>
            <?php }else{?>
                <div class="card-panel teal white-text">
                    Soal ini sudah di review...
                </div>
            <?php }?>
        </div>
    </div>
    
</body>
    <?php
        loadBottom();
        loadJS("dashboard.override.js");
        if(!$list_submit_essay) {
            loadJS('review-siswa.js');
        }
    ?>
</html>