<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Essay siswa</title>
    <?php 
        loadTop();
        loadCSS("dashboard.override.css");
    ?>
</head>
<body>

    <?php
        loadPengajarNavbar();
    ?>

    <div class="my-sidebar-right">
        <div class="my-row">
            <?php if($list_siswa) {?>
                <ul class="collection">
                    <?php foreach($list_siswa as $l) {?>
                        <li class="collection-item avatar">
                            <i class="material-icons circle red">library_books</i>
                            <span class="title">Nama siswa</span>
                            <p><?= $l->siswa_nama?></p>
                            <p>
                                <a href='/it-a/dashboard/review-siswa/<?= $l->siswa_id?>/sesi/<?= $l->sesi_id?>'>Klik disini</a> untuk melihat jawaban dari siswa ini
                            </p>
                        </li>
                    <?php }?>
                </ul>
            <?php }else{?>
                <div class="card-panel teal white-text">
                    Belum ada siswa yang menjawab soal essay anda...
                </div>
            <?php }?>
        </div>
    </div>
    
</body>
    <?php
        loadBottom();
        loadJS("dashboard.override.js");
    ?>
</html>