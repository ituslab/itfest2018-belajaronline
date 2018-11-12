<!DOCTYPE html>
<html>
<head>
	<?php include_once __DIR__ . '/includes/top.php'; ?>
    <link rel="stylesheet" href="/it-a/assets/css/dashboard-siswa.css"/>
	<title>BelajarOnline</title>
</head>
<body>


  <!-- sidebar -->
  <div class="navbar-fixed">
  <nav style="padding: 0px 10px; " class="purple darken-1">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-list-ul"></i></a>
    <div class="right">
      <a class="waves-effect waves-light btn padding-left"><i class="fa fa-user fa-fw"></i>&nbsp;Username</a>
      <a href="landing-page.php" class="waves-effect waves-light btn"><i class="fas fa-sign-out-alt"></i></a>
    </div>
  </nav>
  </div>

<div class="row">
  <div class="container-dashboard col s12 m3">
    <ul id="slide-out" class="sidenav sidenav-fixed">
      <li class="center purple darken-3 white-color">Menu</li>
      <li class="center purple darken-3 li-height"><img src="/it-a/assets/img/avatar2.png" class="height-img  materialboxed"></li>
      <li><a href="#!" class="sidenav-close"><i class="fas fa-cog"></i>Profile</a></li>
      <li><a href="#!" class="sidenav-close"><i class="fas fa-search"></i>Cari Matakuliah</a></li>
      <li><a href="#!" class="sidenav-close"><i class="fas fa-swatchbook"></i>List Matakuliah</a></li>
      <li><a href="#!" class="sidenav-close"><i class="fas fa-plus"></i>Tambah Matakuliah</a></li>
    </ul>
  </div>
  <!-- sidebar -->


  <!-- profile -->
    <div class="col s12 m9 ">
      <!-- foto -->
      <div class="center margin-img">
        <img src="/it-a/assets/img/avatar2.png" class="height-profile">
        <p class="name-user">User</p>
      </div>
      
      <!-- data profile -->
      <div class="row row-data">
         <div class="col s12 m6"> 
          <ul class="collection"> <!-- profile kiri -->
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Nama
                </div>
                <div class="col s8 m8">
                  User
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  NIM
                </div>
                <div class="col s8 m8">
                  083182311
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Nomor
                </div>
                <div class="col s8 m8">
                  089231233456
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Email
                </div>
                <div class="col s8 m8">
                  itpolsri@gmail.com
                </div>
              </div>
            </li>
          </ul>
         </div>
          <div class="col s12 m6">
            <ul class="collection"> <!-- profile kanan -->
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Gender
                </div>
                <div class="col s8 m8">
                  laki -laki
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Tanggal Lahir
                </div>
                <div class="col s8 m8">
                  01-04-1998
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Tempat Lahir
                </div>
                <div class="col s8 m8">
                  Palembang
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Alamat
                </div>
                <div class="col s8 m8">
                  jl sukarela lrg swadaya 2 rt 43 rw 07 palembang
                </div>
              </div>
            </li>
          </ul>
            <a class="waves-effect waves-light btn right"><i class="fas fa-pen"></i> Edit</a>
          </div>
      </div>
      <!-- profile -->

      <!-- buat soal -->
      <div class="row height-soal">
        <div class="col s12"> 
          <div class="center padding-title">
            <h5>Buat Soal</h5>
          </div>
          <div class="col s12">
            <div class="input-field col s12 m5">
              <select>
                <option value="" disabled selected>Choose your option</option>
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

      <!-- List Matakuliah -->
      <div class="row height-soal">
        <div class="center padding-collapsible">
          <h5>List Matakuliah</h5>
        </div>
        <div class="col s12 m12">
          <ul class="collapsible">
            <li class="active">
              <div class="collapsible-header"><i class="fas fa-swatchbook icon-color"></i>Matakuliah 1</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="fas fa-swatchbook icon-color"></i>Matakuliah 2</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="fas fa-swatchbook icon-color"></i>Matakuliah 3</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
          </ul>
        </div>
      </div>
      

      <!-- tambah matakuliah -->
      <div class="row height-soal">
        <div class="center padding-title">
          <h5>Tambah Matakuliah</h5>
        </div>
        <div class="col s12"> 
          <div class="row">
          <div class="col s12 m4 margin-soal"> 
          <div class="card padding-soal">
            <div class="card-image">
              <a class="btn-floating halfway-fab waves-effect waves-light red" style="bottom: -5px;"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>
                Matakuliah Praktikum
              </p>
            </div>
          </div>
        </div>

        <div class="col s12 m4 margin-soal"> 
          <div class="card padding-soal">
            <div class="card-image">
              <a class="btn-floating halfway-fab waves-effect waves-light red" style="bottom: -5px;"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>
                Matakuliah Bahasa Inggris
              </p>
            </div>
          </div>
        </div>

        <div class="col s12 m4 margin-soal"> 
          <div class="card padding-soal">
            <div class="card-image">
              <a class="btn-floating halfway-fab waves-effect waves-light red " style="bottom: -5px;"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>
                Matakuliah Bahasa Indonesia
              </p>
            </div>
          </div>
        </div>

        <div class="col s12 m4 margin-soal"> 
          <div class="card padding-soal">
            <div class="card-image">
              <a class="btn-floating halfway-fab waves-effect waves-light red" style="bottom: -5px;"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>
                Matakuliah Teori Robotika
              </p>
            </div>
          </div>
        </div>

        <div class="col s12 m4 margin-soal"> 
          <div class="card padding-soal">
            <div class="card-image">
              <a class="btn-floating halfway-fab waves-effect waves-light red" style="bottom: -5px;"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>
                Matakuliah Pemograman
              </p>
            </div>
          </div>
        </div>

        <div class="col s12 m4 margin-soal"> 
          <div class="card padding-soal">
            <div class="card-image">
              <a class="btn-floating halfway-fab waves-effect waves-light red" style="bottom: -5px;"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
              <p>
                Matakuliah Matematika
              </p>
            </div>
          </div>
        </div>
          </div>
        </div>
      </div>

    </div>
  </div>


</body>

	<?php include_once __DIR__ . '/includes/bottom.php'; ?>
  <script type="text/javascript" src="/it-a/assets/js/dashboard-siswa.js"></script>

</html>