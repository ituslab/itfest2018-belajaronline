<?php use Felis\Silvestris\Session;?>
<div class="navbar-fixed">
  <nav style="padding: 0px 10px; " class="purple darken-1">
    <a id="my-sidenav-toggler" class="sidenav-trigger"><i class="fas fa-list-ul"></i></a>
    <div class="right">
      <a class="waves-effect waves-light btn padding-left"><i class="fa fa-user fa-fw"></i>
        &nbsp; <?= Session::get("user_id")?>
      </a>
      <a href="/it-a/signout" class="waves-effect waves-light btn"><i class="fas fa-sign-out-alt"></i></a>
    </div>
  </nav>
</div>

<div id="my-overlay"></div>

<nav id="my-sidebar-nav">
  <div id="my-sidebar-header">
    <div id="my-sidebar-title" class="center-align">Menu</div>
    <img id="my-sidebar-img" src="/it-a/assets/img/avatar2.png"/>
  </div>

  <div id="my-sidebar-content">
    <div class="my-sidebar-item">
      <i class="fas fa-cog fa-fw fa-lg my-icons-default"></i>
      <a href="/it-a/dashboard" class="my-sidebar-link">Profile</a>
    </div>
    <div class="my-sidebar-item">
      <i class="fas fa-pen fa-fw fa-lg my-icons-default"></i>
      <a href="/it-a/dashboard/cari-matkul" class="my-sidebar-link">Cari matakuliah</a>
    </div>
    <div class="my-sidebar-item">
      <i class="fas fa-swatchbook fa-fw fa-lg my-icons-default"></i>
      <a href="/it-a/dashboard/matkul-saya" class="my-sidebar-link">Matakuliah saya</a>
    </div>
    <div class="my-sidebar-item">
      <i class="fas fa-bookmark fa-fw fa-lg my-icons-default"></i>
      <a href="/it-a/dashboard/hasil-matkul" class="my-sidebar-link">Hasil matakuliah saya</a>
    </div>
  </div>
</nav>