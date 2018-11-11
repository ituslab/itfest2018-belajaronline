<?php use Felis\Silvestris\Session;?>
<div class="navbar-fixed">
    <nav style="padding: 0px 10px; " class="light-blue darken-1">
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-list-ul"></i></a>
      <div class="right">
        <a class="waves-effect waves-light btn padding-left"><i class="fa fa-user fa-fw"></i>&nbsp;
          <?= Session::get("user_id")?>
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