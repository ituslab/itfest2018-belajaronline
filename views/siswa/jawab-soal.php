<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jawab soal</title>
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

    <!-- progress bar modal here -->
    <div id="modal1" class="modal">
        <div class="modal-content">
          <h5>Please wait...</h5>
          <div class="preloader-wrapper active">
            <div class="spinner-layer spinner-red-only">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
        </div>
    </div>
      <!-- progress bar modal here -->



    <div class="my-sidebar-right">
        <div class="my-row">
            <div class="row">
                <div class="col s12 m12">
                    <?php if (!$list_siswa_jawaban) {?>
                        <!-- my-soal-card -->
                            <div id="my-soal-card" class="card">
                                <div class="card-content">
                                    <span id="soal-no-el" class="card-title"></span>
                                    <p id="soal-pertanyaan-el"></p>
                                    <p>
                                        <label>
                                            <input name="soal_opsi" class="with-gap" type="radio" value="A"/>
                                            <span id="soal_opsi_text_A"></span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="soal_opsi" class="with-gap" type="radio" value="B"/>
                                            <span id="soal_opsi_text_B"></span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="soal_opsi" class="with-gap" type="radio" value="C"/>
                                            <span id="soal_opsi_text_C"></span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="soal_opsi" class="with-gap" type="radio" value="D"/>
                                            <span id="soal_opsi_text_D"></span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="soal_opsi" class="with-gap" type="radio" value="E"/>
                                            <span id="soal_opsi_text_E"></span>
                                        </label>
                                    </p>
                                </div>
                                <div class="card-action">
                                    <a id="soal-prev-btn" class="waves-effect waves-light btn">Previous</a>
                                    <a id="soal-next-btn" class="waves-effect waves-light btn">Next</a>

                                    <a id="soal-submit-btn" class="waves-effect waves-light btn">Submit</a>
                                </div>
                            </div>
                        <!-- my-soal-card -->
                    <?php }else{?>
                        <div class="card-panel teal white-text">
                            Anda sudah menyelesaikan soal '<?= $getInfo->matkul_nama?>' dengan nama sesi '<?= $getInfo->sesi_nama?>' <br/>
                            <a href='/it-a/dashboard/hasil-matkul' class="white-text">Lihat hasil di matakuliah saya</a>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
    </div>

</body>
    <script src="http://underscorejs.org/underscore-min.js"></script>
    <?php
        loadBottom();
        loadJS("dashboard.override.js");
        if(!$list_siswa_jawaban) {
            loadJS('jawab-soal.js');
        }
    ?>
</html>