<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Soal</title>
    <?php
        loadTop();
        loadCSS("dashboard-new.css");
    ?>
</head>
<body>
    <!-- buat soal -->
    <div class="row height-soal">
        <div class="col s12"> 
          <div class="center padding-title">
            <h5>Buat Soal</h5>
          </div>
          <div class="col s12">
            <div class="input-field col s12 m5">
              <select>
                <option value="TIDAK_ADA" disabled selected>Choose your option</option>
                <option value="1">Matakuliah Praktikum</option>
                <option value="2">Matakuliah Bahasa Indonesia</option>
                <option value="3">Matakuliah Bahasa Inggrris</option>
              </select>
              <label>Select Matakuliah</label>
            </div>
          </div>
          <div class="col s12">
            <div class="input-field col s12 m5">
              <input placeholder="Masukkan Jumlah Soal Min 5 dan Max 10" id="soal" type="number" class="validate" min="5" max="10">
              <label for="soal">Banyak Soal</label>
            </div>
          </div>

            <form class="padding-form" method="POST"> <!-- form soal -->
              <div class="center">
                <h5>Form Soal</h5>
              </div>
              <label>
                Jangan Lupa untuk mengisi jawabannya !!!
              </label>
              <div class="row">
                <div class="input-field col s1 m1">
                  <h6 class="right">1.</h6>
                </div>
                <div class="input-field col s11 m11">
                  <textarea id="textarea1" class="materialize-textarea"></textarea>
                  <label for="textarea1">Soal Anda</label>
                </div>
              </div>
              <div class="row">
                <div class="col s1 m1"></div>
                <div class="col s11 m11">
                  <label>
                    <input name="group1" type="radio" class="with-gap" value="A" checked />
                    <span>A. </span>
                    <input type="text" name="jawab" placeholder="Jawaban A">
                  </label>
                </div>
                <div class="col s1 m1"></div>
                <div class="col s11 m11">
                  <label>
                    <input name="group1" type="radio" class="with-gap" value="B" />
                    <span>B. </span>
                    <input type="text" name="jawab" placeholder="Jawaban B">
                  </label>
                </div>
                <div class="col s1 m1"></div>
                <div class="col s11 m11">
                  <label>
                    <input name="group1" type="radio" class="with-gap" value="C" />
                    <span>C. </span>
                    <input type="text" name="jawab" placeholder="Jawaban C">
                  </label>
                </div>
                <div class="col s1 m1"></div>
                <div class="col s11 m11">
                  <label>
                    <input name="group1" type="radio" class="with-gap" value="D" />
                    <span>D. </span>
                    <input type="text" name="jawab" placeholder="Jawaban D">
                  </label>
                </div>
      
              </div>
            </form> 

        </div>
      </div>
</body>
    <?php
        loadBottom();
        loadJS("dashboard-new.js");
    ?>
</html>