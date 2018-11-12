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
  <?php
    loadPengajarNavbar();
  ?>


  <div class="my-sidebar-right">
    <div class="my-row">
      <ul class="collection">
        <li class="collection-item">
          Nama
          <div class="secondary-content">
            <?= $pengajar_nama?>
          </div>
        </li>
        <li class="collection-item">
          No HP
          <div class="secondary-content">
            <?= $pengajar_nohp?>
          </div>
        </li>
        <li class="collection-item">
          Email
          <div class="secondary-content">
            <?= $pengajar_email?>
          </div>
        </li>
        <li class="collection-item">
          Alamat
          <div class="secondary-content">
            <?= $pengajar_alamat?>
          </div>
        </li>
        <li class="collection-item">
          Gender
          <div class="secondary-content">
            <?= $pengajar_gender?>
          </div>
        </li>
      </ul>
    </div>
  </div>



  
</body>

   <?php 
      loadBottom();
      loadJS("dashboard.override.js");
   ?>
  <!-- <script type="text/javascript" src="/it-a/assets/js/dashboard-new.js"></script> --> -->

</html>