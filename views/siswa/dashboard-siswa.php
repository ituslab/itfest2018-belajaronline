<!DOCTYPE html>
<html>
<head>
  <?php 
      loadTop();
      loadCSS("dashboard.override.css");
      loadCSS("dashboard-siswa.css");
  ?>
	<title>BelajarOnline</title>
</head>
<body>


    <?php 
      loadSiswaNavbar();
    ?>

    <div class="my-sidebar-right">
      <div class="my-row">
        <ul class="collection">
          <li class="collection-item">
            Nama
            <div class="secondary-content">
              <?= $siswa_nama?>
            </div>
          </li>
          <li class="collection-item">
            No HP
            <div class="secondary-content">
              <?= $siswa_nohp?>
            </div>
          </li>
          <li class="collection-item">
            Email
            <div class="secondary-content">
              <?= $siswa_email?>
            </div>
          </li>
          <li class="collection-item">
            Alamat
            <div class="secondary-content">
              <?= $siswa_alamat?>
            </div>
          </li>
          <li class="collection-item">
            Gender
            <div class="secondary-content">
              <?= $siswa_gender?>
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

</html>