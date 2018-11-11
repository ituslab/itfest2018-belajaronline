<!DOCTYPE html>
<html>
<head>
  <?php
    loadTop();
    loadCSS("dashboard.override.css");
  ?>
	<title>BelajarOnline</title>
</head>
<body>


  <!-- sidebar -->
  <?php
    loadPengajarNavbar();
  ?>
  <!-- sidebar -->


  <!-- profile -->
    <div class="col s12 m9 ">
      <!-- foto -->
      <div class="center margin-img">
        <!-- <img src="/it-a/assets/img/avatar2.png" class="height-img"> -->
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