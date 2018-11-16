<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Soal</title>
    <?php
        loadTop();
        loadCSS("dashboard.override.css");
        
    ?>
</head>
<body>

    <?php
        loadPengajarNavbar();
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
          <form id="buat-soal-form" class="card">
            <div class="card-content">
              <span class="card-title">Buat soal</span>
              <div class="row">
                <div class="input-field col s12 m12">
                  <select id="matkul-id" name="matkul-id">
                    <!-- <option value="TIDAK_ADA">Pilih matakuliah</option> -->
                  </select>
                  <label for="matkul-id">Pilih matakuliah</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m12">
                  <input type="text" name="sesi-nama" id="sesi-nama" class="validate">
                  <label for="sesi-nama">Nama sesi(atau materi) soal</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m12">
                  <select id="tipe-soal" name="tipe-soal">
                    <option value="pilgan" selected>Pilihan ganda</option></option>
                    <option value="essay">Essay</option>
                  </select>
                  <label for="tipe-soal">Pilih tipe soal</label>
                </div>
              </div>
              <!-- csrf token input -->
              <input id="csrf-token" type="hidden" value="<?= csrfToken(true)?>"/>
              <!-- csrf token input -->
              <div class="row">
                <div class="input-field col s12 m6">
                  <input type="number" name="jumlah-soal" id="jumlah-soal" class="validate">
                  <label for="jumlah-soal">Jumlah soal</label>
                </div>
                <div class="input-field col s12 m6">
                  <button id="btn-buat-soal" class="btn waves-effect waves-light">Buat soal</button>
                </div>
              </div>
              <div id="soal-container">

              </div>
              <div id="error-soal-container">

              </div>
            </div>
            <div class="card-action grey lighten-5">
              <button class="btn waves-effect waves-light my-btn-bgcolor" type="submit" name="action">Submit data
                <i class="material-icons right">send</i>
              </button>
            </div>
          </form>
        </div>
      </div>

</body>
    <?php
        loadBottom();
        loadJS("dashboard.override.js");
        loadJS("buat-soal.js");
    ?>
</html>