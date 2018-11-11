<!DOCTYPE html>
<html>
<head>
	<?php 
include_once __DIR__ . '/includes/top.php'; ?>
    <link rel="stylesheet" href="/it-a/assets/css/dashboard-new.css"/>
	<title>BelajarOnline</title>
</head>
<body>


  <!-- sidebar -->
  <div class="navbar-fixed">
  <nav style="padding: 0px 10px; " class="light-blue darken-1">
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-list-ul"></i></a>
    <div class="right">
      <a class="waves-effect waves-light btn padding-left"><i class="fa fa-user fa-fw"></i>&nbsp;
        <?= $pengajar_id?>
      </a>
      <a href="/it-a/signout" class="waves-effect waves-light btn"><i class="fas fa-sign-out-alt"></i></a>
    </div>
  </nav>
  </div>

<div class="row">
  <div class="container-dashboard col s12 m3">
    <ul id="slide-out" class="sidenav sidenav-fixed">
      <li class="center light-blue darken-3 white-color">Menu</li>
      <li class="center light-blue darken-3 li-height"><img src="/it-a/assets/img/avatar2.png" class="height-img  materialboxed"></li>
      <li><a href="/it-a/dashboard" class="sidenav-close"><i class="fas fa-cog"></i>Profile</a></li>
      <li><a href="/it-a/dashboard/buat-soal" class="sidenav-close"><i class="fas fa-pen"></i>Buat Soal</a></li>
      <li><a href="/it-a/dashboard/list-matkul" class="sidenav-close"><i class="fas fa-swatchbook"></i>List Matakuliah</a></li>
      <li><a href="/it-a/dashboard/tambah-matkul" class="sidenav-close"><i class="fas fa-plus"></i>Tambah Matakuliah</a></li>
    </ul>
  </div>
  <!-- sidebar -->


  <!-- profile -->
    <div class="col s12 m9 ">
      <!-- foto -->
      <div class="center margin-img">
        <img src="/it-a/assets/img/avatar2.png" class="height-profile">
        <p class="name-user"><?= $pengajar_nama?></p>
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
                  <?= $pengajar_nama?>
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  NIM
                </div>
                <div class="col s8 m8">
                  <?= $pengajar_id?>
                </div>
              </div>
            </li>
            <li class="collection-item">
              <div class="row margin-row">
                <div class="col s4 m4">
                  Nomor
                </div>
                <div class="col s8 m8">
                  <?= $pengajar_nohp?>
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

      

      

    </div>
  </div>


</body>

	<?php include_once __DIR__ . '/includes/bottom.php'; ?>
  <script type="text/javascript" src="/it-a/assets/js/dashboard-new.js"></script>

</html>