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
                <div class="input-field col s12 m6">
                  <input min="5" max="10" type="number" name="jumlah-soal" id="jumlah-soal" class="validate">
                  <label for="jumlah-soal">Jumlah soal</label>
                </div>
                <div class="input-field col s12 m6">
                  <button id="btn-buat-soal" class="btn waves-effect waves-light">Buat soal</button>
                </div>
              </div>
              <div id="soal-container">

                
                <!-- <div class="card-panel">
                  <div id="soal-no">Soal no 1</div>
                  
                  <div class="row">
                    <div class="input-field col s12 m12">
                      <input type="text" placeholder="" class="validate"/>
                      <label>Masukkan pertanyaan</label>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="input-field col s2 m2">
                      <p>
                        <label>
                          <input name="group1" class="with-gap" value="A"type="radio"  />
                          <span>A.</span>
                        </label>
                      </p>
                    </div>
                    
                    <div class="input-field col s10 m10">
                      <input type="text" class="my-soal-text" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s2 m2">
                      <p>
                        <label>
                          <input name="group1" class="with-gap" value="B" type="radio"  />
                          <span>B.</span>
                        </label>
                      </p>
                    </div>
                    
                    <div class="input-field col s10 m10">
                      <input type="text" class="my-soal-text" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s2 m2">
                      <p>
                        <label>
                          <input name="group1" class="with-gap" value="C" type="radio"  />
                          <span>C.</span>
                        </label>
                      </p>
                    </div>
                    
                    <div class="input-field col s10 m10">
                      <input type="text" class="my-soal-text" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s2 m2">
                      <p>
                        <label>
                          <input name="group1" class="with-gap" value="D" type="radio"  />
                          <span>D.</span>
                        </label>
                      </p>
                    </div>
                    
                    <div class="input-field col s10 m10">
                      <input type="text" class="my-soal-text" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s2 m2">
                      <p>
                        <label>
                          <input name="group1" class="with-gap" value="E" type="radio"  />
                          <span>E.</span>
                        </label>
                      </p>
                    </div>
                    
                    <div class="input-field col s10 m10">
                      <input type="text" class="my-soal-text" />
                    </div>
                  </div>


                </div> -->

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